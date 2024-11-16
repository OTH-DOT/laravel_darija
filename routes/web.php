<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\informationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SayHello;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Services\Calcul;
use Faker\Guesser\Name;
use Illuminate\Http\Response;

Route::get('/login', [LoginController::class, 'show'])->name(name:'login.show')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name(name:'login');  
Route::get('/logout', [LoginController::class, 'logout'])->name(name:'login.logout');

Route::middleware('auth')->prefix('profiles')->name('profile.')->group(function(){
  Route::controller(ProfileController::class)->group(function(){
    Route::get('/', 'index' )->name(name:'index');
    Route::get('/create', 'create')->name(name:'create');
    Route::post('/store','store')->name(name:'store');
    Route::get('/{profile:id}','show')->where('profile','\d+')->name(name:'show');
    Route::delete('/{profile}','destroy')->name(name:'destroy');
    Route::get('/{profile}/edit','edit')->name(name:'edit');
    Route::put('/{profile}','update')->name(name:'update');
  });
});

// Route::resource('profiles',ProfileController::class);
Route::resource('publications',PublicationController::class)->middleware('auth');

Route::get('/settings', [informationsController::class, 'index'])->name(name:'settings.index');


//bach tsadar bnadam l chi site 
Route::get('/google', function(){
  return redirect()->away('https://www.google.com');
});

Route::get('/somme/{a}/{b}', function($a,$b,Calcul $calcul){
  return $calcul->somme($a,$b);
});

Route::view('/form', 'form');
Route::post('/form', function(Request $request){
  //only
  //except
  // dd($request->except('input_field'));

  $request->mergeIfMissing(['input_field'=>date('Y-m-d')]);
  dd($request->input('input_field',));

})->name(name:'form');


//Response (download,afficher)

Route::get('/salam',function(){
  // $response = new Response('salam',200);
  // return $response;


  return response()->download('storage/profile/hello.jpg',disposition:'inline');
});

//Cookies (create, destroy)

Route::get('/cookie/get',function(Request $request) {
  return $request->cookie('age'); 
}); 

Route::get('/cookie/set/{cookie}',function($cookie) {
  $response = new Response();
  // $cookieObject = cookie('age',$cookie,2);
  $cookieObject = cookie()->forever('age',$cookie);
  return $response->withCookie($cookieObject);
});

//Header

Route::get('/header',function(Request $request) {
  $response = new Response(['data' => 'ok']);
  return $response->withHeaders([
    'Content-type' => 'Application/json'
  ]);
}); 


/////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/', [App\Http\Controllers\StoreController::class, 'index']);

Route::resource('products',ProductController::class);

Route::resource('categories', CategoryController::class);



