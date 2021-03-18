<?php
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\HomeController;

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

Route::get('/',function(){
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@authenticate');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('todo', 'TodoController');

Route::prefix('/tarefas')->group(function (){
   Route::get('/', 'TarefasController@list')->name('tarefas.list');
   Route::get('add', 'TarefasController@add')->name('tarefas.add');
   Route::post('add', 'TarefasController@addAction');
   Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit');
   Route::post('edit/{id}', 'TarefasController@editAction');
   Route::get('delete/{id}', 'TarefasController@delete')->name('tarefas.delete');
   Route::get('check/{id}', 'TarefasController@done')->name('tarefas.done');
});
