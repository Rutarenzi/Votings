<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContestantController;
use App\Http\ControllerS\front\frontendController;
use App\Http\Controllers\pay\paymentController;
use App\Http\Controllers\Auth\RegisterController;

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


Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    
Route::get('branch/create',[BranchController::class, 'BCreate'])->name('createBracnh');
Route::post('branch/store', [BranchController::class,'Bstore'])->name('storeBranch');
Route::get('branch/branch/{id}/edit',[BranchController::class,'Bedit'])->name('editBranch');
Route::put('branch/{id}',[BranchController::class,'Bupdate'])->name('updateBranch');
// Route::get('branch/{id}',[BranchController::class,'Bsingle'])->name('singleBranch');
Route::delete('branch/branch/{id}',[BranchController::class, 'Bdestroy'])->name('destroyBranch');


//  admin route Event


Route::get('events',[EventController::class, 'AllEvent'])->name('AllEvent');
Route::get('event/create',[EventController::class, 'Ecreate'])->name('createEvent');
Route::post('event/store',[EventController::class, 'Estore'])->name('storeEvent');
Route::delete('event/delete/{id}', [EventController::class,'Eventdelete'])->name('deleteEvent');
Route::get('event/edit/{id}',[EventController::class,'Eventedit'])->name('eventedit');    
Route::put('event/update/{id}',[EventController::class,'Eventupdate'])->name('Eventupdate');
// Admin Route Contestant
Route::get('contestant/create',[ContestantController::class,'Contcreate'])->name('createPeople');
Route::post('contestant/store',[ContestantController::class,'Contstore'])->name('storeCont');
Route::get('contestantList/{id}',[ContestantController::class,'ContList'])->name('ListCont');
Route::delete('contestant/delete/{id}',[ContestantController::class,'Contdelete'])->name('deleteCont');
Route::get('contestant/edit/{id}',[ContestantController::class,'Contedit'])->name('editCont');
Route::put('contestant/update/{id}',[ContestantController::class,'Contupdate'])->name('updateCont');
Route::get('contestant/category/alljson/{id}',[CategoryController::class,'getCatjson'])->name('getCatjson');
Route::get('contestant/edit/category/alljson/{id}',[CategoryController::class,'getCatjson']);
// admin route cetegory


Route::get('category/create/{id}',[CategoryController::class, 'CCreate'])->name('CreateCategory');
Route::post('category/store',[CategoryController::class,'CStore'])->name('StoreCategory');
Route::delete('category/{id}',[CategoryController::class,'Cdelete'])->name('DeleteCategory');
Route::get('category/edit/{id}/{ider}',[CategoryController::class,'Cedit'])->name('EditCategory');

    
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
// payment controller
Route::Post('/payment', [paymentController::class,'payinit'])->name('payment');
Route::post('/payments/callback',[paymentController::class,'callbacker'])->name("callbacker");
// front view route
Route::get('/',[frontendController::class,'index'])->name('index');
Route::get('/contestants/{id}', [frontendController::class, 'content'])->name('content');
Route::get('contestants/single/{id}',[frontendController::class,'singleCont'])->name('singleCont');

// end of front view route


