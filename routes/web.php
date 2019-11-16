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


//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth']],function(){

  Route::group(['middleware'=>['_admin']],function(){
    Route::get('/admin_dashboard', 'DashboardController@admin_dashboard')->name('admin_dashboard');
  });

});

Route::group(['middleware'=>['auth']],function(){

  Route::group(['middleware'=>['_salesman']],function(){
    Route::get('/salesman_dashboard', 'DashboardController@salesman_dashboard')->name('salesman_dashboard');
  });

});





// Route::get('/admin_dashboard', 'DashboardController@admin_dashboard')->name('admin_dashboard');
// Route::get('/salesman_dashboard', 'DashboardController@salesman_dashboard')->name('salesman_dashboard');
Route::get('/denied', 'DashboardController@denied')->name('denied');



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

Route::PATCH('/employee/job/position/delete/{id}', 'Employee\E_positionController@destroy')->name('Epostion_delete');
//employee job position end

//employee job status
Route::get('/employee/status/index', 'Employee\E_statusController@index')->name('Estatus_index');

Route::get('/employee/status/create', 'Employee\E_statusController@create')->name('Estatus_create_page');
Route::post('/employee/status/create', 'Employee\E_statusController@store')->name('Estatus_create');

Route::get('/employee/status/{id}/update', 'Employee\E_statusController@edit')->name('Estatus_update_page');
Route::PATCH('/employee/status/update/{id}', 'Employee\E_statusController@update')->name('Estatus_update');

Route::PATCH('/employee/status/delete/{id}', 'Employee\E_statusController@destroy')->name('Estatus_delete');
//employee job status end

//employee information
Route::get('/employee/information/index', 'Employee\E_infoController@index')->name('Einfo_index');

Route::get('/employee/information/create', 'Employee\E_infoController@create')->name('Einfo_create_page');
Route::post('/employee/information/create/created', 'Employee\E_infoController@store')->name('Einfo_create');

Route::get('/employee/information/{id}/update', 'Employee\E_infoController@edit')->name('Einfo_update_page');
Route::PATCH('/employee/information/update/{id}', 'Employee\E_infoController@update')->name('Einfo_update');

Route::PATCH('/employee/information/delete/{id}', 'Employee\E_infoController@destroy')->name('Einfo_delete');
//employee information end

//employee information
Route::get('/employee/job/information/index', 'Employee\E_jobController@index')->name('Ejob_index');

Route::get('/employee/job/information/create', 'Employee\E_jobController@create')->name('Ejob_create_page');
Route::post('/employee/job/information/create/created', 'Employee\E_jobController@store')->name('Ejob_create');

Route::get('/employee/job/information/{id}/update', 'Employee\E_jobController@edit')->name('Ejob_update_page');
Route::PATCH('/employee/job/information/update/{id}', 'Employee\E_jobController@update')->name('Ejob_update');

Route::PATCH('/employee/job/information/delete/{id}', 'Employee\E_jobController@destroy')->name('Ejob_delete');
//employee information end


/////////admin/////////
//employeeinfo//
Route::get('/employee/information/nameinfo', 'Employee\E_infoController@nameinfo')->name('emp_nameinfo');
Route::get('/employee/information/contactinfo', 'Employee\E_infoController@contactinfo')->name('emp_contactinfo');
Route::get('/employee/information/emergancyinfo', 'Employee\E_infoController@emergancyinfo')->name('emp_emergancyinfo');

//////
