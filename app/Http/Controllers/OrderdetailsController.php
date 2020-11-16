<?php

namespace App\Http\Controllers;
use App\Product;
use App\Stock;
use App\Customer;
use App\Order;
use App\Orderdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Carbon\Carbon;


class OrderdetailsController extends Controller
{


    public function store(Request $request)
    {
          $user = Auth::user()-> id;
          $customer = new Customer;
          $input = $request-> all();
          $customer -> c_name = $request-> get('c_name');
          $customer -> c_email =$request-> get('c_email');
          $customer -> c_phone =$request-> get('c_phone');
          $customer -> c_address = $request-> get('c_address');
          $customer ->save();
          $cus = $customer-> id;
          if($cus > 0)
          {
              $orders = new Order;
              $orders -> user_id = $user;
              $orders -> customer_id = $cus;
              $orders -> totalamount = $request-> get('totalamount');
              $orders ->save();
              $ordr = $orders ->id;

            if($ordr > 0)
            {
              for($id = 0; $id < count($input['p_id']); $id++)
                {
                        $orderdetail = new Orderdetails;

                        $orderdetail -> order_id = $ordr;
                        $orderdetail -> product_id = $input['p_code'][$id];
                        $orderdetail -> quantity = $input['qty'][$id];
                        $orderdetail -> unitprice = $input['p_price'][$id];
                        $orderdetail -> discount = $input['p_discount'][$id];
                        $orderdetail -> amount = $input['amount'][$id];

                        $p_id =   $orderdetail -> product_id ;
                        $q = $orderdetail -> quantity;
                        $stock_quantity = Stock::where('id', $p_id)->pluck('quantity')->first();
                        $updated_quantity = $stock_quantity - $q;

                        if($updated_quantity>=0)
                            {
                                $orderdetail -> save();
                                Stock::where('id', $p_id)->update([
                                    'quantity' => $updated_quantity,

                                      ]);
                            }
                        else
                            {
                                return back()->with('error','Product is not available');
                            }

                      }


                }
              }



  		$orderdetails = Orderdetails::where('order_id', $orders->id)->get();
  	  $customerdetails = Customer::where('id', $customer->id)->get();
      $ordersall = Order::where('id', $orders->id)->first();

      return view('Invoice.o_invoice',compact('orderdetails','customerdetails','ordersall'));

    }



    public function edit(Orderdetails $orderdetails)
    {

    }


    public function update(Request $request, Orderdetails $orderdetails)
    {

    }


    public function destroy(Orderdetails $orderdetails)
    {

    }
}
