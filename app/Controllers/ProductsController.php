<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\UserbookingModel;
use CodeIgniter\RESTful\ResourceController;
class ProductsController extends ResourceController
{

    private $pro;
    private $userbooking;

    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->prod = new Product();
    }
    public function index()
    {
        $model = new Product();
        $products = $model->getProducts();  // Fetch all products
        return $this->respond($products);  // Return products as JSON
    }

    public function products()
    {
        return view('admin/shop');
    }

    public function delete($Id = null)
    {
        $main = new Product();
        $data = $main->where('Id', $Id)->delete($Id);
        return $this->response->redirect(site_url('/show'));
    }

    public function editprod($Id = null)
    {
        // Fetch the user data from the database
        $data = [
            'notif' => $this->userbooking->where('status', 'pending')->first(),
            'getnotif' => $this->userbooking
                ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
                    userbooking.middlename, userbooking.contactnum, userbooking.event, 
                    userbooking.time, userbooking.prefferdate, userbooking.equipment, 
                    userbooking.comments, userbooking.status, userbooking.usersignsId, 
                    user.userID, user.LastName, user.FirstName')
                ->join('user', 'user.userID = userbooking.usersignsId')
                ->where('userbooking.status', 'Accepted')
                ->orWhere('userbooking.status', 'Pending')
                ->findAll(),
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
        $main  = new Product();

        $data['prod'] = $main->find($Id);
        return view('dashboard/editproduct', $data);
    }
    public function updateprod($Id)
    {
        $session = session();

        $main = new Product();
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
                
                $picture = $this->request->getFile('ProdPic');
                $imagePath = $_SERVER['DOCUMENT_ROOT'];
                
                if ($picture && $picture->isValid() && !$picture->hasMoved()) {
                    // Handle file upload
                    $newFileName = $picture->getRandomName();
                    $picture->move($imagePath . '/upload/product/', $newFileName);
                    $data['ProdPic'] = $newFileName;
                    $main->update($Id, $data);
                } 

                elseif(empty($picture)){
                    $data = [
                        'ProdName' => $this->request->getVar('ProdName'),
                        'Quantity' => $newQuantity,
                        'ProdPrice' => $this->request->getVar('ProdPrice'),
                        'ProdDescription' => $this->request->getVar('ProdDescription'),
                        'ProfPic' => $this->request->getVar('ProfPic'),
                    ];
                    $main->update($Id, $data);
                }
                
                $products = new Product();

                $main->update($Id, $data);
                
                return $this->response->redirect('/show');
    }
    

    public function searchprod()
    {
        $main = new Product();
        $searchprod = $this->request->getVar('searchprod');
        if ($searchprod) {
            $data = [
                'notif' => $this->userbooking->where('status', 'pending')->first(),
                'getnotif' => $this->userbooking
                ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
                    userbooking.middlename, userbooking.contactnum, userbooking.event, 
                    userbooking.time, userbooking.prefferdate, userbooking.equipment, 
                    userbooking.comments, userbooking.status, userbooking.usersignsId, 
                    user.userID, user.LastName, user.FirstName')
                ->join('user', 'user.userID = userbooking.usersignsId')
                ->where('userbooking.status', 'Accepted')
                ->orWhere('userbooking.status', 'Pending')
                ->findAll(),
                'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults(),
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
