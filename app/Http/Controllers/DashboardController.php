<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

  public function denied()
  {
      return view('auth.permissiondenied');
  }

}
