<?php

Route::get('/', 'HomeController@index')->name('home');


Route::get('/product/{slug}', 'HomeController@single')->name('product.single');
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/','CartController@index')->name('index');
    Route::post('add','CartController@add')->name('add');
    Route::get('remove/{slug}','CartController@remove')->name('remove');
    Route::get('cancel','CartController@cancel')->name('cancel');

});

Route::prefix('checkout')->name('checkout.')->group(function(){

Route::get('/','CheckoutController@index')->name('index');

});


Route::group(['middleware'=>['auth']], function (){

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){


         Route::resource('stores','StoreController');
         Route::resource('products','ProdController');
         Route::resource('categories','CategoryController');

        Route::post('photos/remove','ProductPhotoController@removePhoto')->name('photo.remove');


    });

});




Auth::routes();




//

//
//



//Route::get('/product',function (){
//
//
//    return $store = \App\Product::find(1);
//});


//Route::get('/model',function (){

  //  return $products = \App\User::all();

    // $user = new \App\User();

    //$user = \App\User::find(81);
//
////
//    $user->name ='JOSE DE ANGELIS DOS SANTOS';
//    $user->email ='teste@teste1.com';
//    $user->password=bcrypt('3132132');
//    $user->save();

// retorna boleano

    //return $user->save();
    //  return  \App\User::all(); // retorna todos os usuários
    //  return  \App\User::find(15); // retorna o usuário com o id passado
    //  return \App\User::where('name','Serenity Ledner')->get(); // condição
//return \App\User::paginate(2); resultado paginado


    // atribuição em massa

    /* $user = \App\User::create(
         [
             'name'=>'jose de angelis santos',
                 'email'=>'diangelisj.br@outlook.com',
     'password'=>bcrypt('123')
         ]
     );


     dd($user);*/

    // mass update
//
//    $user= \App\User::find(42);
//    $user->update(['name'=>'dfdsafdsf dsa fdssa']);

    //retorna true ou false



    //  dd($user);
    //  return \App\User::all();

    // return $products;
//});

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

//$name ="JOSE DE ANGELIS ";

// Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

//    Route::prefix('stores')->name('stores.')->group(function(){
//
//        Route::get('/','StoreController@index')->name('index');
//        Route::get('/create','StoreController@create')->name('create');
//        Route::post('/store','StoreController@store')->name('store');
//
//        Route::get('/{store}/edit','StoreController@edit')->name('edit');
//        Route::post('/update/{store}','StoreController@update')->name('update');
//        Route::get('/destroy/{store}','StoreController@destroy')->name('destroy');
//    });


//   Route::resource('stores','StoreController');
//   Route::resource('products','ProdController');


//    Route::prefix('stores')->name('stores.')->group(function(){
//
//        Route::get('/','StoreController@index')->name('index');
//        Route::get('/create','StoreController@create')->name('create');
//        Route::post('/store','StoreController@store')->name('store');
//
//        Route::get('/{store}/edit','StoreController@edit')->name('edit');
//        Route::post('/update/{store}','StoreController@update')->name('update');
//        Route::get('/destroy/{store}','StoreController@destroy')->name('destroy');
//    });