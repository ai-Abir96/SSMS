<?php

namespace App\Http\Controllers\Product_category;
use App\Http\Controllers\Controller;

use App\Return_Product;
use App\Order;
use App\Orderdetails;
use Illuminate\Http\Request;
use Auth;

class R_productController extends Controller
{
  protected function validator(Request $request)
  {
      return Validator::make($request, [
        'customer_Name'=>['required','string'],
        'product_id'=> ['required','string'],
        'cause'=> ['required','string','max:1000'],
        'purchase_date'=> ['required','date','max:50'],

      ]);
    }



    public function index()
    {
        $rproducts= Return_Product::all();
        return view('Admin.ReturnProducts.index',compact('rproducts'));
    }





    public function rpindex()
    {
        return view('Admin.ReturnProducts.rpindex');
    }

    public function getorderid(Request $request)
    {
        $id = $request-> id;
        $orders = Order::where('id',$id)->first();
        $orderdetails = Orderdetails::where('order_id',$id)->get();
        return view('Admin.ReturnProducts.rpindex',compact('orders','orderdetails'));
    }




    public function store(Request $request)
    {
        $refunderid = Auth::user()-> id;
        $input = $request-> all();

        $orderid = $request-> o_id ;
        $customerid = $request -> c_id;
        $sellerid = $request -> s_id;


        for($ide = 0; $ide < count($input['p_code']); $ide++){
          $rp = new Return_Product;
          $rp -> order_id = $orderid;
          $rp -> customer_id = $customerid;
          $rp -> seller_id =  $sellerid;
          $rp -> refunder_id = $refunderid;
          $rp -> product_id = $input['p_code'][$ide];
          $rp -> unitprice = $input['p_price'][$ide];
          $rp -> discount =$input['p_discount'][$ide];
          $rp -> cause = $input['cause'][$ide];
          $rp -> quantity = $input['qty'][$ide];
          $rp -> amount = $input['amount'][$ide];
          $rp -> total = $request-> get('totalamount');
          $rp -> save();

        }

        	$rp = Return_Product::where('order_id', $orderid)->first();
          $rpall = Return_Product::where('order_id', $orderid)->get();

        return view('Invoice.r_invoice',compact('rp','rpall'));

    }








}
