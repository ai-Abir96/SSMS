<?php

namespace App\Http\Controllers;
use App\Orderdetails;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReportController extends Controller
{
  public function daily(){

      return view('Admin.Reports.Daily_Sales');

  }

  public function dateinput(Request $request){

    $dailyreport = Orderdetails::where('created_at',$request-> date)->get();
    return view('Admin.Reports.Daily_Sales',compact('dailyreport'));


  }


  public function monthly(){

      return view('Admin.Reports.Monthly_Sales');

  }

}
