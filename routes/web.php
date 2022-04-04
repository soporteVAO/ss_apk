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
// Route::get('prueba',function(){
// 	$limit = 500;                                                                         
//     $offset = 0;
//         $method = 'getFields';                                                                 
//         $params = array('where' => []);          
        
//         $requestID = session_id();       
//         $accountID = '3A056D84D4774EAAB8DEC40DE4509B49';
//         $secretKey = '79E38414892D035F75A571590CF934FC';                                                     
//         $data = array(                                                                                
//             'method' => $method,                                                                      
//             'params' => $params,                                                                      
//             'id' => $requestID,                                                                       
//         );                                                                                            
                                                                                                 
//         $queryString = http_build_query(array('accountID' => $accountID, 'secretKey' => $secretKey)); 
//         $url = "http://api.sharpspring.com/pubapi/v1/?$queryString";                             
                                                                                                        
//         $data = json_encode($data);                                                                   
//         $ch = curl_init($url);                                                                        
//         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                              
//         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                  
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                               
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                   
//             'Content-Type: application/json',                                                         
//             'Content-Length: ' . strlen($data),
//             'Expect: '                                                        
//         ));                                                                                           
                                                                                                        
//         $result = curl_exec($ch);                                                                     
//         curl_close($ch);                                                                 
//         $result = json_decode($result);
//         dd($result);
//         // echo var_dump($result->result->field[0]->systemName);
// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');


//PROFILE
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile',['as'=>'profile.index','uses'=>'App\Http\Controllers\ProfileController@index']);
	Route::get('edit', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//EMPRESAS
Route::group(['middleware' => 'auth'], function () {
	
    Route::get('empresas', ['as' => 'empresas.index', 'uses' => 'App\Http\Controllers\EmpresaController@index']);
    Route::get('empresas/create', ['as'=>'empresas.create', 'uses'=> 'App\Http\Controllers\EmpresaController@create']);
    Route::post('empresas/store',['as'=>'empresas.store', 'uses'=>'App\Http\Controllers\EmpresaController@store']);
    Route::get('empresas/edit/{empresa}', ['as'=>'empresas.edit', 'uses'=>'App\Http\Controllers\EmpresaController@edit']);
    Route::post('empresas/update/{empresa}',['as'=>'empresas.update', 'uses'=>'App\Http\Controllers\EmpresaController@update']);
    Route::get('empresas/show/{empresa}',['as'=>'empresas.show','uses'=>'App\Http\Controllers\EmpresaController@show']);
    Route::delete('empresas/delete/{empresa}', ['as'=>'empresas.destroy','uses'=>'App\Http\Controllers\EmpresaController@destroy']);

    // Route::get('oportunidades/edit/{oportunidad_id}', ['as'=>'oportunidades.edit', 'uses'=>'App\Http\Controllers\OportunidadController@show']);
    // Route::post('oportunidades/update',['as'=>'oportunidades.update','uses'=>'App\Http\Controllers\OportunidadController@updateOpportunity']);
});

//USUARIOS
Route::group(['middleware' => 'auth'], function () {
	// Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	
    Route::get('users', ['as' => 'users.index', 'uses' => 'App\Http\Controllers\UserController@index']);
    Route::get('users/create',['as'=>'users.create','uses'=>'App\Http\Controllers\UserController@create']);
    Route::post('users/store',['as'=>'users.store','uses'=>'App\Http\Controllers\UserController@store']);
    Route::get('users/show/{user}',['as'=>'users.show', 'uses'=>'App\Http\Controllers\UserController@show']);
    Route::get('users/edit/{user}',['as'=>'users.edit','uses'=>'App\Http\Controllers\UserController@edit']);
    Route::post('users/update/{user}',['as'=>'users.update','uses'=>'App\Http\Controllers\UserController@update']);
    Route::delete('users/delete/{user}',['as'=>'users.delete','uses'=>'App\Http\Controllers\UserController@destroy']);
    
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('accounts',['as'=>'account.index','uses'=>'App\Http\Controllers\AccountController@index']);
    Route::get('accounts/show/{account}',['as'=>'account.show','uses'=>'App\Http\Controllers\AccountController@show']);

});
//GUIONES - ENTREVISTAS
Route::group(['middleware'=>['auth','FieldsTableExists']], function(){
    Route::get('guiones',['as'=>'guiones.index','uses'=>'App\Http\Controllers\GuionController@index']);
    Route::get('guiones/create', ['as'=>'guiones.create', 'uses'=>'App\Http\Controllers\GuionController@create']);
    Route::post('guiones/store',['as'=>'guiones.store', 'uses'=>'App\Http\Controllers\GuionController@store']);
    Route::get('guiones/show/{guion}',['as'=>'guiones.show','uses'=>'App\Http\Controllers\GuionController@show']);
    Route::get('guiones/edit/{guion}',['as'=>'guiones.edit','uses'=>'App\Http\Controllers\GuionController@edit']);
    Route::post('guiones/update/{guion}',['as'=>'guiones.update', 'uses'=>'App\Http\Controllers\GuionController@update']);
    Route::delete('guiones/delete/{guion}',['as'=>'guiones.destroy','uses'=>'App\Http\Controllers\GuionController@destroy']);
    Route::get('entrevista/init',['as'=>'entrevista.oportunidad','uses'=>'App\Http\Controllers\GuionController@initEntrevista']);
    Route::get('entrevista/{guion}',['as'=>'startEntrevista','uses'=>'App\Http\Controllers\GuionController@startEntrevista']);



    
});

//GUIONES ERROR
Route::get('/error',['as'=>'guion.error','middlware'=>'auth','uses'=>'App\Http\Controllers\GuionController@showError']);

//OPORTUNIDADES
Route::group(['middleware' => 'auth'], function () {
	Route::get('oportunidades', ['as' => 'oportunidades.index', 'uses' => 'App\Http\Controllers\OportunidadController@index']);
    Route::get('oportunidades/edit/{oportunidad_id}', ['as'=>'oportunidades.edit', 'uses'=>'App\Http\Controllers\OportunidadController@show']);
    Route::post('oportunidades/update',['as'=>'oportunidades.update','uses'=>'App\Http\Controllers\OportunidadController@updateOpportunity']);
});

//FIELDS
Route::group(['middleware' => 'auth'], function () {
    Route::get('fields',['as'=>'fields.index', 'uses'=>'App\Http\Controllers\FieldController@index']);
    Route::post('fields/update',['as'=>'fields.update','uses'=>'App\Http\Controllers\FieldController@update']);
	Route::get('syncData', ['as' => 'fields.sync', 'uses' => 'App\Http\Controllers\FieldController@getFieldsSS']);
});


Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

Route::get('pruebalist',['as'=>'prueba','uses'=>'App\Http\Controllers\FieldController@index']);