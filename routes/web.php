<?php


use App\Http\Middleware\auth2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\giumeController;
use App\Http\Controllers\ServiceController;

Route::get('/',[giumeController::class,'index'])->name('giume.index');
Route::get('/user-panel',[giumeController::class,'panel'])->name('giume.panel');
Route::put('/user-panel/edit/{id}',[giumeController::class,'edituser'])->name('giume.panel.edit');
Route::get('/giume/about',[giumeController::class,'about'])->name('giume.about');
Route::get('/giume/learn',[giumeController::class,'learn'])->name('giume.learn');



Route::get('/giume/register',[giumeController::class,'register'])->name('giume.register');
Route::post('/giume/store',[giumeController::class,'store'])->name('giume.store');
Route::get('/giume/login',[giumeController::class,'login'])->name('giume.login');
Route::post('/giume/logout',[giumeController::class,'logout'])->name('giume.logout');
Route::post('/giume/check',[giumeController::class,'check'])->name('giume.check');


Route::get('/giume/admin',[giumeController::class,'admin'])->name('giume.admin');
Route::delete('/giume/admin/remove/{id}',[giumeController::class,'remove'])->name('giume.admin.remove');
Route::put('/giume/admin/update/{id}',[giumeController::class,'update'])->name('giume.admin.update');
Route::put('/giume/admin/gateupdate/{id}',[giumeController::class,'gate'])->name('giume.admin.gate');
Route::put('/giume/admin/update-serv/{id}',[giumeController::class,'servedit'])->name('giume.admin.update-serv');
Route::delete('/giume/admin/delete/{id}',[ServiceController::class,'create'])->name('giume.admin.delete');
Route::put('/giume/admin/edit/{id}',[ServiceController::class,'edit'])->name('giume.admin.edit');




Route::get('/giume/service',[ServiceController::class,'service'])->name('giume.service')->middleware([auth2::class]);





Route::get('/giume/show/{id}',[TypeController::class,'show'])->name('giume.show')->middleware([auth2::class]);;
Route::post('/giume/req',[TypeController::class,'req'])->name('giume.req');




Route::delete('/giume/comment/remove/{id}',[TypeController::class,'remove'])->name('giume.comment.remove');
Route::post('/giume/comment/create',[TypeController::class,'create'])->name('giume.comment.create');
Route::put('/giume/comment/update/{id}',[TypeController::class,'update'])->name('giume.comment.update');
