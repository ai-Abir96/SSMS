<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderdetails;
use App\Product;

class PosController extends Controller
{

    public function index(){
      $products =Product::all();
      return view('Admin.POS.index',compact('products'));
    }




}
