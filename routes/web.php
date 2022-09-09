<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::post('login',[EmployeeController::class, 'loginEmployee'])->name('employeeLogin');
Route::post('store',[EmployeeController::class, 'store'])->name('store');

Route::get('/',[EmployeeController::class, 'viewLogin'])->name('login');
Route::get('about', [EmployeeController::class, 'viewAbout'])->name('aboutPage');
Route::get('create',[EmployeeController::class, 'create'])->name('addData');

//middleware group
Route::group(['middleware'=> 'isLoggedIn', 'prefix' => 'employee'],function(){

    //Route Prefix
    //Route::prefix('employee')->group(function () {
        Route::post('update',[EmployeeController::class, 'update'])->name('update');

        Route::get('employeesList', [EmployeeController::class, 'show'])->name('index');
        Route::get('delete/{id}', [EmployeeController::class, 'destroy'])->name('delete');
        Route::get('edit/{id}', [EmployeeController::class, 'edit']);//This will return data to edit page 
        Route::get('logout',[EmployeeController::class, 'logout'])->name('logout');
        
        //search
        Route::get('search',[EmployeeController::class, 'viewSearch'])->name('search');
        Route::get('searchEmployee',[EmployeeController::class, 'searchEmployee'])->name('searchEmployee');
//});
});