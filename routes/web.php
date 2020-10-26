<?php

use Illuminate\Support\Facades\Route;
use App\Models\Company;

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
    return view('index', ['companies' => Company::all()]);
})->name('home');

/* Route::middleware(['auth:sanctum', 'verified'])->get('/edit', function () {
    return view('edit', ['companies' => Company::all()]);
})->name('edit'); */

Route::middleware('auth')->group(function () {
    //Route::get('/edit', 'App\Http\Controllers\CompanyController@index')->name('edit');
    //Route::post('/edit', 'App\Http\Controllers\CompanyController@store');
    //Route::delete('/edit', 'App\Http\Controllers\CompanyController@destroy')->name('delete/{id}');
    Route::resource('/edit', 'App\Http\Controllers\CompanyController', [
        'names'=>[
            'index'     =>  'company.index',
            'store'     =>  'company.new',
            'update'    =>  'company.update',
            'edit'      =>  'company.edit',
            'destroy'   =>  'company.destroy',
        ]   
    ]);
    //Route::patch('/edit/{id}', 'CompanyController@update')->name('company.update');
});

