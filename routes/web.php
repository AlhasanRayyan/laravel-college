<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks' , compact('tasks'));
});

Route::post('create', function () {
    $name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $name ]);
    return redirect()->back();

});


Route::post('delete/{id}' , function($id){
    DB::table('tasks')->where('id' , $id)->delete();
    return redirect()->back();
});

Route::post('edit/{id}' , function ($id){
    $task = DB::table('tasks')->where('id' , $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks' , compact('task' , 'tasks'));
});

Route::post('update', function () {
    $id = $_POST['id'];
    DB::table('tasks')->where('id', $id)->update(['name' => $_POST['name'] ]);
    return redirect('tasks');
});