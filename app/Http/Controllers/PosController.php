<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PosController extends Controller
{

    public function index(){
      $products =Product::all();
      return view('Admin.POS.index',compact('products'));
    }
    public function index2(){
      $products =Product::all();
      return view('Admin.POS.index2',compact('products'));
    }
}
