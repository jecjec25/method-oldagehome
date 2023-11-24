<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductsModel;

class ProductsController extends BaseController{

    public function products(){
        return view('admin/shop');
    }
}
?>