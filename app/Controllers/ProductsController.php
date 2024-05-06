<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use CodeIgniter\RESTful\ResourceController;

class ProductsController extends ResourceController
{

    private $pro;
    public function __construct()
    {
        $this->prod = new ProductsModel();
    }
    public function index()
    {
        $model = new ProductsModel();
        $products = $model->getProducts();  // Fetch all products
        return $this->respond($products);  // Return products as JSON
    }

    public function products()
    {
        return view('admin/shop');
    }

    public function delete($Id = null)
    {
        $main = new ProductsModel();
        $data = $main->where('Id', $Id)->delete($Id);
        return $this->response->redirect(site_url('/show'));
    }

    public function editprod($Id = null)
    {
        // Fetch the user data from the database

        $main  = new ProductsModel();

        $data['prod'] = $main->find($Id);
        return view('dashboard/editproduct', $data);
    }
    public function updateprod($Id)
    {
        $main = new ProductsModel();
        $hello = $main->where('Id', $Id)->first();
        
        $newQuantity = $hello['Quantity'];
    
        if ($this->request->getVar('addQuantity')) {
            $newQuantity += $this->request->getVar('addQuantity');
        }
    
        if ($this->request->getVar('DeducQuantity')) {
            $newQuantity -= $this->request->getVar('DeducQuantity');
        }
    
        $data = [
            'ProdName' => $this->request->getVar('ProdName'),
            'Quantity' => $newQuantity,
            'ProdPrice' => $this->request->getVar('ProdPrice'),
            'ProdDescription' => $this->request->getVar('ProdDescription'),
            'ProfPic' => $this->request->getVar('ProfPic'),
        ];
    
        $main->update($Id, $data);
        return $this->response->redirect('/show');
    }
    

    public function searchprod()
    {
        $main = new ProductsModel();
        $searchprod = $this->request->getVar('searchprod');
        if ($searchprod) {
            $data = [
                'product' => $main->like('ProdName', $searchprod)->findAll()
            ];
            return view('dashboard/searchprod', $data);
        }
    }

    public function myStock($stockID)
    {
        $updateStock = $this->viewStock($stockID);

                       $this->newStock($updateStock, $stockID);
    }

    private function viewStock($stockID)
    {
        $updateStock = $this->prod->find($stockID);

        return $updateStock;
    }

    private function newStock($updateStock, $stockID)
    {

        $addStock = $this->request->getPost('newStock');
    }   
}
