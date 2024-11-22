<?php

use App\Http\Controllers\AgentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RealtronController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//register part
Route::get('/realtronregister',[RealtronController::class,'viewregister'])->name('register.agentregistration');
Route::post('/createregister',[RealtronController::class,'createregister']);//realtron register
Route::post('/createagentregister',[RealtronController::class,'createagentregister']);//agent register
Route::get('/showregister',[RealtronController::class,'showrealtron']);

//adminpart
Route::get('/Realtrondetail',[AdminController::class,'realtrondetails']);
Route::get('/view_properties',[AdminController::class,'view_properties']);
Route::post('/addcategory',[AdminController::class,'addcategory']);
Route::get('/show_category',[AdminController::class,'showcategory']);
Route::delete('/delete_category/{id}', [AdminController::class, 'deleteCategory']);
Route::get('/Agentdetails',[AdminController::class,'agentdetails']);
Route::get('/propertydetails',[AdminController::class,'properties']);

//realtron part
Route::get('/showagentregister', [RealtronController::class, 'showagent']);//here fetch the agent details in realtron page
Route::get('/viewuser_request',[RealtronController::class,'userrequest']);//usersite request will be show in companysite
Route::delete('/deleteAgent/{id}', [RealtronController::class, 'deleteAgent']);

Route::post('/assign_agent', [RealtronController::class, 'assignAgent'])->name('assign_agent');//here taske will be assing to particular agent in that company

//property parts
Route::get('/view_properties',[AdminController::class,'view_properties']);
Route::post('/add_property',[AdminController::class,'addproperty']);
Route::get('/show_properties',[AdminController::class,'show_properties']);
Route::get('/edit_property/{id}', [AgentController::class, 'editProperty'])->name('edit.property');

// Route::get('/property/{id}', [AgentController::class, 'edit'])->name('property.edit');


Route::get('/update_property/{id}',[AdminController::class,'updateProperty']);

Route::post('/property/save', [AgentController::class, 'store'])->name('property.store');
//user part
Route::get('/view_seller',[SellerController::class,'viewseller']);
Route::post('/create_selleruser',[SellerController::class,'createseller']);
Route::get('/fetch_agent_property',[HomeController::class,'fetch_agent_property']);
Route::get('/get-property-images/{property}', [HomeController::class, 'get-property-images']);

Route::get('/show_allproperties/{id}', [HomeController::class, 'all_properties']);
Route::post('/update_property/{id}', [AgentController::class, 'update'])->name('update_property');
Route::get('/generate/{id}', [AgentController::class, 'showGeneratePage'])->name('generate.page');

Route::get('/user_contact', [AgentController::class, 'showContactPage']);
Route::post('/agent_Message', [AgentController::class, 'sendAgentMessage']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
