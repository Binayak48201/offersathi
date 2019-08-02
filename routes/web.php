 <?php
// Route::group(array('middleware' => 'forceSSL'), function() {
 Route::get('/','HomeController@view');
	 Auth::routes();
	
 Route::get('/latest_deals','AdvertismentController@latest');
 Route::get('/news','NewsController@index');
 Route::get('/news/{new}','NewsController@show');
 Route::get('/contact','SupportController@create');
 Route::post('/contact','SupportController@store');
 Route::get('/about_us','AboutController@index');
 Route::get('/deals/{advertisment}','AdvertismentController@show');
 Route::post('/deals/{advertisment}/replies','RepliesController@store');
 Route::patch('/replies/{reply}','RepliesController@update');
 Route::delete('/replies/{reply}','RepliesController@destroy');

 Route::get('/{carousel}','CarouselController@show');
	
	 // Cart
	 Route::get('/cart','CartController@index');
	 Route::post('/add-cart','CartController@store');
	 Route::delete('/cart/{cart}','CartController@destroy');
	 // brands
 Route::get('/store_view','BrandController@view');
 Route::get('/show_brand/{brand}','BrandController@show');
 Route::get('/profiles/{user}','UserprofileController@show');
 Route::get('/{channel}','AdvertismentController@view');
 Route::get('/latest_deals/{channel}','AdvertismentController@latest');
 
 Route::prefix('admin')->group( function() {

	// DASHBOARD
 	Route::get('/dashboard','AdminController@index')->name('admin.dashboard');
 	Route::post('/dashboard','AdminController@store');
 	Route::patch('/dashboard/{task}','AdminController@update');

	// Advertisement Route

 	Route::get('/advertisement','AdvertismentController@index');

 	Route::get('/add','AdvertismentController@create');

 	Route::post('/add','AdvertismentController@store');

 	Route::get('/edit-advertisement/{adv}','AdvertismentController@edit');

 	Route::post('/edit-advertisement/{adv}','AdvertismentController@update');

 	Route::delete('/advertisement/{adv}','AdvertismentController@destroy');



	// Category Route

 	Route::get('/category','ChannelController@index');

 	Route::get('/add_category','ChannelController@create');

 	Route::post('/add_category','ChannelController@store');



	// Brand Routing

 	Route::get('/view_brands','BrandController@index');

 	Route::get('/add_brands','BrandController@create');

 	Route::post('/add_brands','BrandController@store');

 	Route::get('/edit_brands/{brand}','BrandController@edit');

 	Route::post('/edit_brands/{brand}','BrandController@update');

 	Route::delete('/delete_brands','BrandController@destroy');



		// FOR ADMINS LISTS

 	Route::get('/adminlist', 'AdminController@view');

 	Route::get('/adminregister', 'AdminController@create');

 	Route::post('/adminregister', 'AdminController@store');

 	Route::delete('/delete_admins/{admin}','AdminController@destroy');



	// CAROUSEL ROUTING add_carousel

 	Route::get('/carousel','CarouselController@index');

 	Route::get('/add_carousel','CarouselController@create');

 	Route::post('/add_carousel','CarouselController@store');

 	Route::get('/edit_carousel/{carousel}','CarouselController@edit');

 	Route::patch('/edit_carousel/{carousel}','CarouselController@update');

 	Route::delete('/delete_carousel/{carousel}','CarouselController@destroy');
 	

	// NEWS ROUTING

 	Route::get('/view-news','NewsController@view');

 	Route::get('/add-news','NewsController@create');

 	Route::post('/add-news','NewsController@store'); 

 	Route::get('/edit-news/{new}','NewsController@edit');

 	Route::patch('/edit-news/{new}','NewsController@update');

 	Route::delete('/delete_news/{new}','NewsController@destroy');



	// Support us routing

 	Route::get('/support','SupportController@index');





 	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');



 	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');



 	Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

		// OWN PASSWORD RESET ROUTES DAMN



	// Password reset routes

 	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

 	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

 	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');

 	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

 });


// });
