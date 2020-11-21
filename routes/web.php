<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/demo','DashboardController@demo')->name('demo');

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth']],function(){
  //////////////////////////////////////////////////////////////////////////////////
  // -----------------------------------------------------------------------------//
  // -----------------------------------------------------------------------------//
  //////////////////////////////////////////////////////////////////////////////////
//---------------------------------------------ADMIN Area--------------------------------------------------------------

  Route::group(['middleware'=>['_admin']],function(){
    Route::get('/admin_dashboard', 'DashboardController@admin_dashboard')->name('admin_dashboard');

    /////////admin/////////
    //employeeinfo//
    Route::get('/employee/information/nameinfo', 'Employee\E_infoController@nameinfo')->name('emp_nameinfo');
    Route::get('/employee/information/contactinfo', 'Employee\E_infoController@contactinfo')->name('emp_contactinfo');
    Route::get('/employee/information/emergancyinfo', 'Employee\E_infoController@emergancyinfo')->name('emp_emergancyinfo');
    Route::get('/employee/information/jobstatus', 'Employee\E_jobController@jobstatus')->name('jobstatus');
    Route::get('/employee/information/jobinfo', 'Employee\E_jobController@jobinfo')->name('emp_jobinfo');

    //////////////////////////////////////////
    //Roles
    Route::get('/user/roles/index', 'RoleController@index')->name('role_index');

    Route::get('/user/roles/create', 'RoleController@RoleCreate')->name('role_create_page');
    Route::post('/user/roles/create', 'RoleController@create')->name('role_create');

    Route::get('/user/roles/{id}/update', 'RoleController@RoleUpdate')->name('role_update_page');
    Route::PATCH('/user/roles/update/{id}', 'RoleController@update')->name('role_update');

    Route::DELETE('/user/roles/delete/{id}', 'RoleController@delete')->name('role_delete');
    //roles end


    //Users
    Route::get('/user/index', 'UserController@index')->name('user_index');

    Route::get('/user/assignrole/{user}/update', 'UserController@UserUpdate')->name('user_update_page');
    Route::PATCH('/user/assignrole/update/{user}','UserController@update')->name('user_update');

    Route::DELETE('/user/delete/{user}', 'UserController@delete')->name('user_delete');

    //users end



    //employee job position
    Route::get('/employee/position/index', 'Employee\E_positionController@index')->name('Eposition_index');

    Route::get('/employee/position/create', 'Employee\E_positionController@create')->name('Eposition_create_page');
    Route::post('/employee/position/create', 'Employee\E_positionController@store')->name('Epostion_create');

    Route::get('/employee/job/position/{id}/update', 'Employee\E_positionController@edit')->name('Epostion_update_page');
    Route::PATCH('/employee/job/position/update/{id}', 'Employee\E_positionController@update')->name('Epostion_update');

  //Route::PATCH('/employee/job/position/delete/{id}', 'Employee\E_positionController@destroy')->name('Epostion_delete');
    //employee job position end


    //employee information
    //Route::get('/employee/information/index', 'Employee\E_infoController@index')->name('Einfo_index');

    //Route::get('/employee/information/create', 'Employee\E_infoController@create')->name('Einfo_create_page');
    //Route::post('/employee/information/create/created', 'Employee\E_infoController@store')->name('Einfo_create');

    // Route::get('/employee/information/{id}/update', 'Employee\E_infoController@edit')->name('Einfo_update_page');
    // Route::PATCH('/employee/information/update/{id}', 'Employee\E_infoController@update')->name('Einfo_update');

    //Route::PATCH('/employee/information/delete/{id}', 'Employee\E_infoController@destroy')->name('Einfo_delete');
    //employee information end

    //employee job information
    Route::get('/employee/job/information/index', 'Employee\E_jobController@index')->name('Ejob_index');

    Route::get('/employee/job/information/create', 'Employee\E_jobController@create')->name('Ejob_create_page');
    Route::post('/employee/job/information/create/created', 'Employee\E_jobController@store')->name('Ejob_create');

    //Route::get('/employee/job/information/{id}/update', 'Employee\E_jobController@edit')->name('Ejob_update_page');
    Route::PATCH('/employee/job/information/status/update', 'Employee\E_jobController@statusupdate')->name('status_update');
    Route::PATCH('/employee/job/information/salary/update', 'Employee\E_jobController@salaryupdate')->name('salary_update');
    Route::PATCH('/employee/job/information/resign/update', 'Employee\E_jobController@resignupdate')->name('resign_update');

    //Route::PATCH('/employee/job/information/delete/{id}', 'Employee\E_jobController@destroy')->name('Ejob_delete');
    //employee information end



    //Supplier
    Route::get('/supplier/information/index', 'SupplierController@index')->name('sup_index');

    Route::get('/supplier/information/create', 'SupplierController@create')->name('sup_create_page');
    Route::post('/supplier/information/create/created', 'SupplierController@store')->name('sup_create');

    Route::get('/supplier/information/{id}/update', 'SupplierController@edit')->name('sup_update_page');
    Route::PATCH('/supplier/information/update/{id}', 'SupplierController@update')->name('sup_update');

    Route::PATCH('/supplier/information/delete/{id}', 'SupplierController@destroy')->name('sup_delete');

    //supplier end

    //Reports
    Route::get('/report/monthly', 'ReportController@monthly')->name('r_monthly');
    Route::post('/report/monthinput', 'ReportController@monthinput')->name('monthinput');
    Route::get('/report/stock', 'ReportController@r_stock')->name('r_stock');
    Route::get('/report/refund', 'ReportController@r_refund')->name('r_refund');
    Route::post('/report/refund/dateinput', 'ReportController@refundbydate')->name('refundbydate');


  });

  //////////////////////////////////////////////////////////////////////////////////
  // -----------------------------------------------------------------------------//
  // -----------------------------------------------------------------------------//
  //////////////////////////////////////////////////////////////////////////////////
//---------------------------------------------ADMIN Area--------------------------------------------------------------

  Route::group(['middleware'=>['_salesman']],function(){
     Route::get('/salesman_dashboard', 'DashboardController@salesman_dashboard')->name('salesman_dashboard');


  });

  //employee
  Route::get('/employee/information/view', 'Employee\E_infoController@show')->name('Einfo_show');
  Route::get('/employee/information/update', 'Employee\E_infoController@edit')->name('Einfo_update_page');
  Route::post('/employee/information/update', 'Employee\E_infoController@update')->name('Einfo_update');
  //employee end

  //Category
  Route::get('/category/index', 'Product_category\CategoryController@index')->name('cat_index');
  Route::post('/category/create/created', 'Product_category\CategoryController@store')->name('cat_create');
  Route::PATCH('/category/update', 'Product_category\CategoryController@update')->name('cat_update');
  Route::PATCH('/category/delete', 'Product_category\CategoryController@destroy')->name('cat_delete');

  //Category end
  //Sub category
  Route::get('/subcategory/index', 'Product_category\SubcategoryController@index')->name('scat_index');
  Route::post('/subcategory/create/created', 'Product_category\SubcategoryController@store')->name('scat_create');
  Route::PATCH('/subcategory/update', 'Product_category\SubcategoryController@update')->name('scat_update');
  Route::PATCH('/subcategory/delete', 'Product_category\SubcategoryController@destroy')->name('scat_delete');

  //Sub category end

  //Stock
  Route::get('/stocks/index', 'Product_category\StockController@index')->name('stock_index');

  Route::get('/stocks/create', 'Product_category\StockController@create')->name('stock_create_page');
  Route::post('/stocks/create/created', 'Product_category\StockController@store')->name('stock_create');

  Route::get('/stocks/{id}/update', 'Product_category\StockController@edit')->name('stock_update_page');
  Route::PATCH('/stocks/update/{id}', 'Product_category\StockController@update')->name('stock_update');
  Route::post('/stocks/quantity_price/update', 'Product_category\StockController@update_quantity_price')->name('update_quantity_price');

  Route::PATCH('/stocks/delete/{id}', 'Product_category\StockController@destroy')->name('stock_delete');

  //Stock end


  //Product
  Route::get('/products/index', 'Product_category\ProductController@index')->name('product_index');

  Route::get('/products/create', 'Product_category\ProductController@create')->name('product_create_page');
  Route::post('/products/create/created', 'Product_category\ProductController@store')->name('product_create');

  Route::get('/products/{id}/update', 'Product_category\ProductController@edit')->name('product_update_page');
  Route::PATCH('/products/update/{id}', 'Product_category\ProductController@update')->name('product_update');

  Route::PATCH('/products/delete/{id}', 'Product_category\ProductController@destroy')->name('product_delete');

  //Product end
  Route::get('/pos/index', 'PosController@index')->name('pos_index');
  Route::get('/pos/index2', 'PosController@index2')->name('pos_index2');

  //order
  Route::POST('/order/created', 'OrderdetailsController@store')->name('order_create');



  //return products
  Route::get('/rp/index', 'Product_category\R_productController@index')->name('rp_index');


  Route::post('/rp/create/created', 'Product_category\R_productController@store')->name('rp_create');


  Route::get('/rp/index2', 'Product_category\R_productController@rpindex')->name('rp_index');
  Route::post('/rp/orderid', 'Product_category\R_productController@getorderid')->name('rp_getorderid');
  //return products end

  Route::get('/report/daily', 'ReportController@daily')->name('r_daily');
  Route::post('/report/dateinput', 'ReportController@dateinput')->name('dateinput');



});



// Route::get('/admin_dashboard', 'DashboardController@admin_dashboard')->name('admin_dashboard');
// Route::get('/salesman_dashboard', 'DashboardController@salesman_dashboard')->name('salesman_dashboard');

Route::get('/denied', 'DashboardController@denied')->name('denied');

//employee information

Route::get('/employee/information/create', 'Employee\E_infoController@create')->name('Einfo_create_page');
Route::post('/employee/information/create/created', 'Employee\E_infoController@store')->name('Einfo_create');
