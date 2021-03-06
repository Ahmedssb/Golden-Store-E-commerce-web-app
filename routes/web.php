<?php

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
  return redirect(route('UserIndex'));
});

Route::get('/AdminLog','Admin\Main\Main_cont@login')->name('AdminLog');
Route::post('/AdminLog','Admin\Main\Main_cont@login')->name('AdminLog');

// start Admin route 
Route::prefix('Admin')->middleware('AdminLogin')->group(function(){ 

    Route::get('/AdminDash','Admin\Main\Main_cont@index')->name('AdminDashboard');
    Route::get('/logout','Admin\Main\Main_cont@logout')->name('logoutt');
    Route::get('/Settings','Admin\Main\Main_cont@settings')->name('Settings');
    Route::post('/Settings','Admin\Main\Main_cont@settings')->name('Settings');
    Route::post('/check-password','Admin\Main\Main_cont@checkPassword')->name('checkPassword');
    Route::get('/Users','Admin\User\User_cont@getRegisteredUsers')->name('Admin.Users');

    //category route 
    Route::prefix('Category')->group(function(){

        Route::get('Index','Category_cont@index')->name('Category.Index');
        Route::get('Add','Category_cont@add')->name('Category.Add');
        Route::post('Add','Category_cont@add')->name('Category.Add');
        Route::get('Update/{id}','Category_cont@update')->name('Category.Update');
        Route::post('Update/{id}','Category_cont@update')->name('Category.Update');
        Route::get('Delete/{id}','Category_cont@delete')->name('Category.Delete');
        Route::post('Delete/{id}','Category_cont@delete')->name('Category.Delete');
     });

       //product route 
    Route::prefix('Product')->group(function(){

        Route::get('Index','Admin\Product_cont@index')->name('Product.Index');
        Route::get('Add','Admin\Product_cont@add')->name('Product.Add');
        Route::post('Add','Admin\Product_cont@add')->name('Product.Add');
        Route::get('Update/{id}','Admin\Product_cont@update')->name('Product.Update');
        Route::post('Update/{id}','Admin\Product_cont@update')->name('Product.Update');
        Route::get('Delete/{id}','Admin\Product_cont@delete')->name('Product.Delete');
         
        Route::get('AddImages/{id}','Admin\Product_cont@addProductImages')->name('Product.AddImages');
        Route::post('AddImages/{id}','Admin\Product_cont@addProductImages')->name('Product.AddImages');
        Route::get('DeleteImages/{id}','Admin\Product_cont@deleteProductImage')->name('Product.deleteImages');


         // start of product attributes route 
        Route::prefix('Attribute')->group(function(){
            Route::get('Add/{id}','Admin\Product_cont@addAttributes')->name('ProductAttributes.Add');
            Route::post('Add/{id}','Admin\Product_cont@addAttributes')->name('ProductAttributes.Add');
            Route::get('Delete/{id}','Admin\Product_cont@deleteAttributes')->name('ProductAttributes.Delete');
            Route::post('Update','Admin\Product_cont@updateAttributes')->name('ProductAttributes.Update');


          }); // end of product attributes route 
         
     }); // end of product route 
   // Admin Orders route 
   Route::get('/AdminOrders','Admin\Order\order_cont@viewOrders')->name('Admin.Orders');
    // Admin Order products 
    Route::get('/AdminOrderProducts/{id}','Admin\Order\order_cont@ordersDetails')->name('Admin.Order.Products');
    //update order satus route
    Route::post('/AdminOrderUpdate','Admin\Order\order_cont@orderUpdateStatus')->name('Admin.Order.Update');


}); 
      //-------------------end of admin route  -----------------------



   /* 
   ******* ************* User Routes *************************** 
    */
 
Route::get('/logout','Admin\Main\Main_cont@logout')->name('logoutt');

 
 

Route::get('/UserIndex','User\Main_cont@index')->name('UserIndex');

// user routes

Route::get('SpecificCategory/{id}','User\Product_cont@showCategoryProducts')->name('Categort.Products');

Route::get('ProductDeatils/{id}','User\Product_cont@productDetails')->name('Categort.Product.Details');

// get product price 
Route::get('product-price','User\Product_cont@getPrice');

// product search
Route::post('product-search','User\Main_cont@productSearch')->name('Product.Search');

// user login form
Route::post('User-Login','User\User_cont@login')->name('User.Login');
Route::get('User-Login','User\User_cont@login')->name('User.Login');
//user register form
Route::post('User-Register','User\User_cont@register')->name('User.Register');
Route::get('User-Register','User\User_cont@register')->name('User.Register');

Route::get('Check-Email','User\User_cont@checkEmail')->name('User.Check-Email');

Route::get('User-Logout','User\User_cont@logout')->name('User.Logout');



//cart routes 
    
Route::get('product-cart','User\Cart_cont@addToCart')->name('Product.AddToCart');
Route::post('product-cart','User\Cart_cont@addToCart')->name('Product.AddToCart');

Route::get('cart-Index','User\Cart_cont@index')->name('Cart.Index');

Route::get('cart-Delete/{id}','User\Cart_cont@deleteCartItem')->name('Cart.Delete');

Route::get('cart-Update/{id}/{quantity}','User\Cart_cont@UpdateCartItem')->name('Cart.Update');



Route::prefix('User')->middleware('UserLogin')->group(function(){

  // user account page 
    Route::match(['get', 'post'],'User-Account','User\User_cont@account')->name('User.Account');
      // check current passowrd is correct 
   Route::post('check-password','User\User_cont@checkPassword')->name('password.check');
      // update password
   Route::post('update-password','User\User_cont@updatePassword')->name('password.update');

    

        
        //checkout routes 
        Route::prefix('Checkout')->group(function(){

          Route::match(['get', 'post'],'CheckoutPage','User\Checkout_cont@checkout')->name('Checkout');
          
             // order review routes
          Route::match(['get', 'post'],'OrderReview','User\Checkout_cont@orderReview')->name('Order.Review');
        
              // place order   routes
           Route::match(['get', 'post'],'PlaceOrder','User\Checkout_cont@placeOrder')->name('Place.Order');
             // thanks page route after user plce the order 
           Route::get('Thanks','User\Checkout_cont@thanks')->name('Thanks');
          


           
        }); // end of checkout route 
         
        //orders 
        Route::prefix('Orders')->group(function(){
          // all user orders 
          Route::get('Orders','User\Order_cont@userOrders')->name('Orders');
          // all order Details 
          Route::get('OrdersDetails/{order_id}','User\Order_cont@userOrdersDetails')->name('Orders.Details');

        });


  });



