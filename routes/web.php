<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\File;
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
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $count = User::where('status','=','2')->count();
    $files = File::get()->count();
    return view('backend.dashboard',[
        'count' =>  $count,
        'files'     =>  $files
    ]);
})->name('dashboard');

//Admin Route
Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard/users', [AdminController::class, 'index'])->name('index.users');
    Route::post('/user-store', [AdminController::class, 'store'])->name('user.store');
    Route::get('/user-destroy/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
    Route::get('/user-edit/{id}', [AdminController::class, 'edit'])->name('user.edit');
    Route::post('/user-update', [AdminController::class, 'update'])->name('user.update');
    Route::get('/user-status/{id}', [AdminController::class, 'statusUpdate'])->name('user.status');

//    User Routes
    Route::get('/dashboard/allfiles', [FilesController::class, 'allFiles'])->name('all.files');
    Route::get('/dashboard/uploadfile', [FilesController::class, 'uploadFile'])->name('upload.file');
    Route::post('/dashboard/storefile', [FilesController::class, 'store'])->name('store.file');

    Route::get('/dashboard/group/{id}', [FilesController::class, 'group'])->name('all.group');
    Route::get('/dashboard/group-view/{name}', [FilesController::class, 'groupView'])->name('group.view');


});
