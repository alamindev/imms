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

 
// for login rigester system
Auth::routes();
     
Route::get('/admin/users', 'Auth\RegisterController@index')->name('User');
Route::get('/admin/users/add', 'Auth\RegisterController@showRegistrationForm')->name('addUser')->middleware("admin");
Route::post('/admin/users/insert', 'Auth\RegisterController@register'); 
Route::get('/admin/users/view/{id}', 'Auth\RegisterController@show')->name('viewUser'); 
Route::get('/admin/users/edit/{id}', 'Auth\RegisterController@edit')->name('editUser')->middleware("admin"); 
Route::post('/admin/users/update', 'Auth\RegisterController@update')->middleware("admin"); 
Route::get('/admin/users/delete/{id}', 'Auth\RegisterController@delete')->middleware("admin"); 
/*for admin */
Route::get('/admin','AdminController@index')->name('dashboard');

Route::get('/admin/employees','EmployeeController@index')->name('employees');
Route::get('/admin/employee','EmployeeController@create')->name('add-employee')->middleware("admin");
Route::post('/admin/employee/store','EmployeeController@store')->name('store-employee')->middleware("admin");
Route::get('/admin/employee/view/{id}','EmployeeController@show')->name('view-employee');
Route::get('/admin/employee/edit/{id}','EmployeeController@edit')->name('edit-employee')->middleware("admin");
Route::post('/admin/employee/update','EmployeeController@update')->name('update-employee') ;
Route::get('/admin/employee/delete/{id}','EmployeeController@destroy')->name('delete-employee')->middleware("admin");

// route for search
Route::get('/admin/employees/search','EmployeeController@searchShow')->name('search-employee'); 
Route::get('/admin/employees/search/show', 'EmployeeController@search')->name('show');
Route::get('/admin/employee/download-pdf/{id}','EmployeeController@download')->name('download-pdf-employees'); 
Route::get('/admin/employee/visa/download-pdf/{id}','EmployeeController@visaPDF')->name('visa_pdf'); 
 

/* route for asal */
Route::get('/admin/employee/asal', 'AsalController@index')->name('asals');
Route::get('/admin/employee/asal/add/{id}', 'AsalController@create')->name('asal_create');
Route::post('/admin/employee/asal/add/store', 'AsalController@store')->name('asal_store');
Route::get('/admin/employee/asal/view/{id}', 'AsalController@show')->name('asal_show');
Route::get('/admin/employee/asal/edit/{id}', 'AsalController@edit')->name('asal_edit');
Route::post('/admin/employee/asal/Update', 'AsalController@update')->name('asal_update'); 
Route::get('/admin/employee/asal/delete/{id}','AsalController@destroy')->name('delete-asal')->middleware("admin");
Route::get('/admin/employee/asal/download-pdf/{id}','AsalController@download')->name('asal_download'); 

//CODING FOR ASALBILL
Route::get('/admin/employee/asalbill', 'AsalBillController@index')->name('asalbills');
Route::get('/admin/employee/asalbill/add/{id}', 'AsalBillController@create')->name('asalbill_create');
Route::post('/admin/employee/asalbill/add/store', 'AsalBillController@store')->name('asalbill_store');
Route::get('/admin/employee/asalbill/view/{id}', 'AsalBillController@show')->name('asalbill_show');
Route::get('/admin/employee/asalbill/edit/{id}', 'AsalBillController@edit')->name('asalbill_edit');
Route::post('/admin/employee/asalbill/Update', 'AsalBillController@update')->name('asalbill_update'); 
Route::get('/admin/employee/asalbill/delete/{id}','AsalBillController@destroy')->name('delete-asalbill')->middleware("admin");


 /*======================
 	coding for recycle bin
 ======================*/
 Route::get('/admin/user/recycle', 'RecycleController@userRecycle')->name('user_re');
 Route::get('/admin/user/recycle/search', 'RecycleController@searchUser')->name('re_search');
 Route::get('/admin/user/recycle/restore/{id}', 'RecycleController@restoreUser')->name('user_restore');
 Route::get('/admin/user/recycle/forece/{id}', 'RecycleController@permanentDeleteUser')->name('user_forcedelete');
 //employee recycle
 Route::get('/admin/employee/recycle','RecycleController@employeeRecycle')->name('employee_re'); 
 Route::get('/admin/employee/recycle/search','RecycleController@searchEmployee')->name('eym_search'); 
 Route::get('/admin/employee/recycle/restore/{id}', 'RecycleController@restoreEmployee')->name('eym_restore');
 Route::get('/admin/employee/recycle/forece/{id}', 'RecycleController@permanentDeleteEmployee')->name('eym_forcedelete');   
 // asal bill recycle
 Route::get('/admin/employee/asalbill/recycle','RecycleController@asalBillRecycle')->name('asalbill_re'); 
 Route::get('/admin/employee/asalbill/recycle/search','RecycleController@searchAsalBill')->name('asalbill_search'); 
 Route::get('/admin/employee/asalbill/recycle/restore/{id}', 'RecycleController@restoreAsalBill')->name('asalbill_restore');
 Route::get('/admin/employee/asalbill/recycle/forece/{id}', 'RecycleController@permanentDeleteAsalBill')->name('asalbill_forcedelete');
 /**============
 for web site route
 =================*/
 Route::get('/','homeController@index')->name('home');
 Route::any('search','homeController@search')->name('search');