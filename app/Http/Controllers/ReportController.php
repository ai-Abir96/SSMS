<?php

namespace App\Http\Controllers;
use App\Orderdetails;
use Carbon\Carbon;
use PDF;
use App\Stock;
use App\Return_product;

use Illuminate\Http\Request;

class ReportController extends Controller
{
  public function daily(){

      return view('Admin.Reports.Daily_Sales');

  }

  public function dateinput(Request $request){

    $dailyreport = Orderdetails::where('created_at',$request-> date)->get();
    $sum = Orderdetails::where('created_at',$request-> date)->sum('amount');

    return view('Admin.Reports.Daily_Sales',compact('dailyreport','sum'));

  }



  public function monthly(){

      return view('Admin.Reports.Monthly_Sales');

  }
  public function monthinput(Request $request){
    $from = $request -> from;
    $to = $request -> to;
    $monthlyreport = Orderdetails::whereBetween('created_at',[$from, $to])->get();
    $sum = Orderdetails::whereBetween('created_at',[$from, $to])->sum('amount');

    return view('Admin.Reports.Monthly_Sales',compact('monthlyreport','sum'));

  }



public function r_stock(){
  $stockdetails = Stock::where("quantity",0)->get();
  return view('Admin.Reports.stockdetails',compact('stockdetails'));
}

public function r_refund(){
  //$rps = Return_product::all();
  return view('Admin.Reports.refunddetails');
}

public function refundbydate(Request $request){
  $rps = Return_product::where('created_at',$request-> date)->get();
  return view('Admin.Reports.refunddetails',compact('rps'));
}
}
