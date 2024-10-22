<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
class Main extends BaseController
{   
    protected $request;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->prod_model = new Product;
        $this->tran_model = new Transaction;
        $this->tran_item_model = new TransactionItem;
        $this->data = ['session' => $this->session,'request'=>$this->request];
    }

    public function index()
    {
        $this->data['page_title']="Home";
        return view('Dashboard/dash', $this->data);
    }
    public function products(){
        $this->data['page_title']="Products";
        $this->data['page'] =  !empty($this->request->getVar('page')) ? $this->request->getVar('page') : 2 ;
        $this->data['perPage'] =  10;
        $this->data['total'] =  $this->prod_model->countAllResults();
        $this->data['products'] = $this->prod_model->paginate($this->data['perPage']);
        $this->data['total_res'] = is_array($this->data['products'])? count($this->data['products']) : 0;
        $this->data['pager'] = $this->prod_model->pager;
        return view('dashboard/pages/products/list', $this->data);
    }
    public function product_add() {
        if ($this->request->getMethod() === 'post') {
            // Access post data directly
            $code = $this->request->getPost('code');
            $name = $this->request->getPost('name');
            $description = $this->request->getPost('description');
            $quantity = $this->request->getPost('quantity');
            $price = $this->request->getPost('price');
            
            // Get uploaded file
            $prodpic = $this->request->getFile('prodpic');
            $udata = [
                'code' => $code,
                'name' => $name,
                'description' => $description,
                'quantity' => $quantity,
                'price' => $price,
            ];
    
            // Check for existing product code
            $checkCode = $this->prod_model->where('code', $code)->countAllResults();
    
            // File upload handling
            if ($prodpic->isValid() && !$prodpic->hasMoved()) {
                $newName = $prodpic->getRandomName(); // Use random name for uniqueness
                if ($prodpic->move(ROOTPATH . 'public/upload/product', $newName)) {
                    $udata['prodpic'] = $newName;
                } else {
                    $this->session->setFlashdata('error', "Failed to move the uploaded file.");
                    return redirect()->back()->withInput(); // Redirect back with input
                }
            }
    
            // Check if code is already taken
            if ($checkCode) {
                $this->session->setFlashdata('error', "Product Code Already Taken.");
            } else {
                // Save product data
                if ($this->prod_model->save($udata)) {
                    $this->session->setFlashdata('main_success', "Product Details have been updated successfully.");
                    return redirect()->to('Main/products/');
                } else {
                    $this->session->setFlashdata('error', "Product Details failed to update.");
                }
            }
        }
    
        $this->data['page_title'] = "Add New Product";
        return view('dashboard/pages/products/add', $this->data);
    }
    
public function product_edit($id)
{
    if (empty($id)) {
        return redirect()->to('Main/products');
    }

    // Fetch the existing product
    $prod = $this->prod_model->find($id);

    $currentProfileImg = $prod['prodpic'];

    if (!$prod) {
        // Handle case where product does not exist
        $this->session->setFlashdata('error', 'Product not found.');
        return redirect()->to('Main/products');
    }

    if ($this->request->getMethod() === 'post') {
        $postData = $this->request->getPost();
        
        // Prepare data for update
        $prodpic = $this->request->getFile('Prodpic');
        
        $udata = [
            'code' => $postData['code'],
            'name' => $postData['name'],
            'description' => $postData['description'],
            'price' => $postData['price'],
            'quantity' => $prod['quantity'] + ($postData['addstock'] ?? 0) // Add stock to current quantity
        ];

        if ($prodpic->isValid() && !$prodpic->hasMoved()) {
            $newName = $prodpic->getName();
            $prodpic->move(ROOTPATH . 'public/upload/product', $newName);
            $udata['prodpic'] = $newName;

            // Delete the old profile image if it's not the default image
            if ($currentProfileImg !== $prod['prodpic'] && file_exists(ROOTPATH . 'public/upload/product' . $currentProfileImg)) {
                unlink(ROOTPATH . 'public/upload/product' . $currentProfileImg);
            }
        }


      
        // Check if the code already exists
        $checkCode = $this->prod_model->where('code', $udata['code'])->where('id !=', $id)->countAllResults();
        if ($checkCode) {
            $this->session->setFlashdata('error', "Product Code Already Taken.");
        } else {
            // Update product details
            $update = $this->prod_model->update($id, $udata);
            if ($update) {
                $this->session->setFlashdata('success', "Product Details have been updated successfully.");
                return redirect()->to('Main/product_edit/' . $id);
            } else {
                $this->session->setFlashdata('error', "Product Details failed to update.");
            }
        }
    }

    $this->data['page_title'] = "Edit Product";
    $this->data['product'] = $prod; // Use the fetched product
    return view('dashboard/pages/products/edit', $this->data);
}

    
    public function product_delete($id=''){
        if(empty($id)){
                $this->session->setFlashdata('main_error',"Product Deletion failed due to unknown ID.");
                return redirect()->to('Main/products');
        }
        $delete = $this->prod_model->where('id', $id)->delete();
        if($delete){
            $this->session->setFlashdata('main_success',"Product has been deleted successfully.");
        }else{
            $this->session->setFlashdata('main_error',"Product Deletion failed due to unknown ID.");
        }
        return redirect()->to('Main/products');
    }
    public function pos(){
        $this->data['page_title']="New Transaction";
        $this->data['products'] =  $this->prod_model->findAll();
     
        return view('dashboard/pages/pos/add', $this->data);
    }

    public function save_transaction() {
        extract($this->request->getPost());
    
        $pref = date("Ymd");
        $code = sprintf("%'.05d", 1);
        while(true){
            if($this->tran_model->where("code = '{$pref}{$code}'")->countAllResults() > 0){
                $code = sprintf("%'.05d", ceil($code) + 1);
            } else {
                $code = $pref.$code;
                break;
            }
        }
    
        $data['code'] = $code;
        foreach($this->request->getPost() as $k => $v){
            if(!is_array($this->request->getPost($k)) && !in_array($k, ['id'])){
                $data[$k] = htmlspecialchars($v);
            }
        }
        $save_transaction = $this->tran_model->save($data);
        if($save_transaction){
            $transaction_id = $this->tran_model->insertID();
            foreach($product_id as $k => $v){
                $data2['transaction_id'] = $transaction_id;
                $data2['product_id'] = $v;
                $data2['price'] = $price[$k];
                $data2['quantity'] = $quantity[$k];
                $this->tran_item_model->save($data2);
    
                // Retrieve the current quantity from the database
                $current_product = $this->prod_model->find($v);
                if($current_product && isset($current_product['quantity'])){
                    $prod_quantity = $current_product['quantity'];
    
                    // Calculate the new quantity
                    $changequan = $prod_quantity - $quantity[$k];
    
                    // Update the product quantity
                    $this->prod_model->update($v, ['quantity' => $changequan]);
                } else {
                    // Handle the case where the product is not found or the quantity is not set
                    $this->session->setFlashdata('main_error', "Product with ID $v not found or quantity not set.");
                    return redirect()->to('Main/pos');
                }
            }
            
            $this->session->setFlashdata('main_success', "Transaction has been saved successfully.");
            return redirect()->to('Main/pos');
        }
    }
    
    public function transactions(){
        $this->data['page_title']="Transactions";
        $this->data['page'] =  !empty($this->request->getVar('page')) ? $this->request->getVar('page') : 1;
        $this->data['perPage'] =  10;
        $this->data['total'] =  $this->tran_model->countAllResults();
        $this->data['transactions'] = $this->tran_model
                                    ->select(" transactions.*, COALESCE((SELECT SUM(transaction_items.quantity) FROM transaction_items where transaction_id = transactions.id ), 0) as total_items")
                                    ->paginate($this->data['perPage']);
        $this->data['total_res'] = is_array($this->data['transactions'])? count($this->data['transactions']) : 0;
        $this->data['pager'] = $this->tran_model->pager;
        return view('dashboard/pages/pos/list', $this->data);
    }

    public function transaction_delete($id=''){
        if(empty($id)){
                $this->session->setFlashdata('main_error',"Transaction Deletion failed due to unknown ID.");
                return redirect()->to('Main/transactions');
        }
        $delete = $this->tran_model->where('id', $id)->delete();
        if($delete){
            $this->session->setFlashdata('main_success',"Transaction has been deleted successfully.");
        }else{
            $this->session->setFlashdata('main_error',"Transaction Deletion failed due to unknown ID.");
        }
        return redirect()->to('Main/transactions');
    }
    public function transaction_view($id=''){
        if(empty($id)){
            $this->session->setFlashdata('main_error',"Transaction Details failed to load due to unknown ID.");
            return redirect()->to('Main/transactions');
        }
        $this->data['page_title']="Transactions";
        $this->data['details'] = $this->tran_model->where('id', $id)->first();
        if(!$this->data['details']){
            $this->session->setFlashdata('main_error',"Transaction Details failed to load due to unknown ID.");
            return redirect()->to('Main/transactions');
        }
        $this->data['items'] = $this->tran_item_model
                                ->select("transaction_items.*, CONCAT(products.code,'-',products.name) as product")
                                ->where('transaction_id', $id)
                                ->join('products', " transaction_items.product_id = products.id ", 'inner')
                                ->findAll();
        return view('dashboard/pages/pos/view', $this->data);
    }
}
