<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LandingPageController@index');

Auth::routes();

Route::get('/home', 'LandingPageController@index')->name('home');
Route::get('/indexPersonalizado/{categoria}', 'LandingPageController@indexPersonalizado')->name('indexPersonalizado');
Route::resource('dashboard/producto', 'dashboard\ProductController');
Route::resource('dashboard/cat', 'dashboard\CategoriaController');
Route::get('dashboard/main', 'MainController@index')->name('main.index');
Route::resource('dashboard/user', 'dashboard\UserController');
Route::post('dashboard/producto/estado/{estado}','dashboard\ProductController@estadoProducto')->name('producto.estado');

//imagenes rutas
Route::post('dashboard/producto{producto}/image', 'dashboard\ProductController@image')->name('producto.image');
Route::get('dashboard/producto/image-download/{image}', 'dashboard\ProductController@imageDownload')->name('producto.imageDownload');
Route::delete('dashboard/producto/image-delete/{image}', 'dashboard\ProductController@imagedelete')->name('producto.imagedelete');
Route::post('dashboard/comment','dashboard\CommentController@guardar')->name('comment');
Route::post('dashboard/comprar','dashboard\TransaccionesController@comprar')->name('comprar');
Route::post('dashboard/producto/rechazado','dashboard\ProductController@rechazado')->name('comentrechazado');
Route::get('dashboard/ventas','dashboard\ProductController@ventas')->name('ventas.contador');
Route::post('dashboard/venta/cambiarestado/{estad}','dashboard\ProductController@cambiarestado');


Route::get('dashboard/coments/{product}','dashboard\ProductController@comments')->name('producto.comments');
Route::post('dashboard/respuesta','dashboard\ProductController@respondercoment')->name('respondercoment');

Route::get('dashboard/historial','dashboard\ProductController@historialcomprados')->name('comprados');
Route::get('dashboard/contador/pagados','dashboard\ProductController@pagados')->name('pagados');





Route::get('principal',function () {
    return view('dashboard/vista_general/accesorios');
});
Route::get('principal/filtro', 'dashboard\ProductController@index2')->name('producto.index2');
Route::post('verificar','AjaxControler@verificarCorreo')->name('verificar');

