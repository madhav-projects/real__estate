<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RealtronController;
use App\Http\Controllers\SellerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[IndexController::class,'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//register part
Route::get('/home',[HomeController::class,'index']);
Route::get('/realtronregister',[RealtronController::class,'viewregister'])->name('register.agentregistration');
Route::post('/createregister',[RealtronController::class,'createregister']);
Route::post('/createagentregister',[RealtronController::class,'createagentregister']);

//adminpart
Route::get('/Realtrondetail',[AdminController::class,'realtrondetails']);//realtron details fetch by admin site
Route::post('/Approve_detail/{id}',[RealtronController::class,'approve_detail']);//approve and reject written in realtron controller
Route::post('/Reject_detail/{id}',[RealtronController::class,'reject_detail']);
Route::get('/Agentdetails',[AdminController::class,'agentdetails']);
Route::get('/propertydetails',[AdminController::class,'properties']);


//realtron part
Route::get('/showagentregister', [RealtronController::class, 'showagent']);//here fetch the agent details in realtron page
Route::post('/Approve_detailagent/{id}',[RealtronController::class,'approve_detailagent']);//approve and reject written in realtron controller
Route::post('/Reject_detailagent/{id}',[RealtronController::class,'reject_detailagent']);
Route::delete('/deleteAgent/{id}', [RealtronController::class, 'deleteAgent']);

Route::get('/viewuser_request',[RealtronController::class,'userrequest'])->name('viewuser_request');//usersite request will be show in companysite
Route::post('/assign_agent', [RealtronController::class, 'assignAgent'])->name('assign_agent');//here taske will be assing to particular agent in that company


//agent part
Route::get('/selecttype',[AdminController::class,'selecttype']);//this for view page
Route::post('/addcategory',[AdminController::class,'addcategory']);
Route::get('/show_category',[AdminController::class,'showcategory']);
Route::delete('/delete_category/{id}', [RealtronController::class, 'deleteCategory']);
Route::get('/generate/{id}', [AgentController::class, 'showGeneratePage'])->name('generate.page');
// web.php
Route::post('/property/save', [AgentController::class, 'saveProperty'])->name('property.save');




Route::get('/view_properties', [AdminController::class, 'view_properties']);
Route::post('/add_property',[AdminController::class,'addproperty'])->name('add_property');
Route::get('/show_properties',[AdminController::class,'show_properties']);
Route::get('/edit_property/{id}', [AgentController::class, 'editProperty'])->name('edit.property');
Route::post('/update_property/{id}', [AgentController::class, 'update'])->name('update_property');


// Route::get('/property/{id}', [AgentController::class, 'edit'])->name('property.edit');


//user controller
Route::get('/view_seller',[SellerController::class,'viewseller']);
Route::get('/seller_contact/{id}',[SellerController::class,'sellercontact']);
Route::post('/create_selleruser',[SellerController::class,'createseller']);
Route::get('/fetch_agent_property',[HomeController::class,'fetch_agent_property']);


Route::get('/show_allproperties/{id}', [HomeController::class, 'all_properties']);
Route::get('/get-property-images/{property}', [HomeController::class, 'get_property_images']);
Route::get('/user_contact', [AgentController::class, 'showContactPage'])->name('user_contact');
Route::post('/agent_Message', [AgentController::class, 'sendAgentMessage']);

// agebt
Route::get('/fetch_task',[AgentController::class,'fetchtask']);
require __DIR__.'/auth.php';
