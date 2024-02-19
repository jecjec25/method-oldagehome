<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductsModel;

class ProductsController extends BaseController
{

    public function products(){
        return view('admin/shop');
    }   

    public function delete($Id = null){
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

    public function updateprod($Id){
        $main = new ProductsModel();
     
        $data = [
            'ProdName' => $this->request->getVar('ProdName'),
            'Quantity' => $this->request->getVar('Quantity'),
            'ProdPrice' => $this->request->getVar('ProdPrice'),
            'ProdDescription' => $this->request->getVar('ProdDescription'),
            'ProfPic' => $this->request->getVar('ProfPic'),
        ];
        $main->update($Id, $data);
        return $this->response->redirect('/show');
    }
}
?>