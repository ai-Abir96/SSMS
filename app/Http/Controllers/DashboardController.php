<?php

namespace App\Http\Controllers;


use App\Emp_info;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{

  public function admin_dashboard()
  {


      return view('Dashboard.admin_dashboard');
  }


  public function salesman_dashboard()
  {
      return view('Dashboard.salesman_dashboard');
  }

  public function demo()
  {
      return view('Employee.Personal_info.create1');
  }



  public function denied()
  {
      return view('auth.permissiondenied');
  }

}
