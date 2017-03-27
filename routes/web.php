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
Route::get('/',[
    'uses' => 'HomeController@index_redirect',
]);

Route::get('/{local}/',[
    'uses' => 'HomeController@index',
    'as'  => 'index'
]);

Route::get('/{local}/clients',[
    'uses' => 'HomeController@clients',
]);

Route::get('/{local}/about',[
    'uses' => 'HomeController@about',
]);

Route::get('/{local}/contacts',[
    'uses' => 'HomeController@contacts',
]);

Route::get('/{local}/services',[
    'uses' => 'HomeController@services',
]);

// Ajax Routing
Route::group(['prefix' => '{local}/ajax'], function () {
    Route::get('/getImages',[
        'uses' => 'HomeController@getImages',
        'as' => 'getImages'
    ]);
    Route::get('/get_about_text',[
        'uses' => 'HomeController@get_about_text',
        'as' => 'get_about_text'
    ]);
});
// sending form message
Route::post('/send_sms',[
    'uses' => 'HomeController@send_sms',
    'as' => 'send_sms'
]);

// Admin Routing
Route::group(['prefix' => 'gh-admin'], function () {
    Route::get('/',[
        'uses' => 'AdminController@index',
        'as' => 'index'
    ]);
    Route::post('/admin_login',[
        'uses' => 'AdminController@admin_login',
        'as' => 'admin_login'
    ]);
    Route::get('/admin_login',[
        'uses' => 'AdminController@getadmin_login',
        'as' => 'getadmin_login'
    ]);
    Route::get('/logout',[
        'uses' => 'AdminController@logout',
        'as' => 'logout'
    ]);
    // Admin add section routing
    //youtube link routing
    Route::post('/add_you_link',[
        'uses' => 'AdminController@add_you_link',
        'as' => 'add_you_link'
    ]);
    Route::get('/add_you_link',[
        'uses' => 'AdminController@getadd_you_link',
        'as' => 'getadd_you_link'
    ]);
    //latest works routing
    Route::post('/add_latest_work',[
        'uses' => 'AdminController@add_latest_work',
        'as' => 'add_latest_work'
    ]);
    Route::get('/add_latest_work',[
        'uses' => 'AdminController@getadd_latest_work',
        'as' => 'getlatest_work'
    ]);
    //latest works routing
    Route::post('/add_clietns',[
        'uses' => 'AdminController@add_clietns',
        'as' => 'add_clietns'
    ]);
    Route::get('/add_clietns',[
        'uses' => 'AdminController@getadd_clietns',
        'as' => 'getadd_clietns'
    ]);
    //Images By Category routing
    Route::post('/add_img_category',[
        'uses' => 'AdminController@add_img_category',
        'as' => 'add_img_category'
    ]);
    Route::get('/add_img_category',[
        'uses' => 'AdminController@getadd_img_category',
        'as' => 'getadd_img_category'
    ]);
    // delete clients 
    Route::get('/delete_clients/{id}',[
        'uses' => 'AdminController@delete_current_client',
        'as' => 'delete_current_client'
    ]);
    Route::get('/delete_clients',[
        'uses' => 'AdminController@delete_clients',
        'as' => 'delete_clients'
    ]);
    // latest works
    Route::get('/delete_works/{id}',[
        'uses' => 'AdminController@delete_current_works',
        'as' => 'delete_current_works'
    ]);
    Route::get('/delete_works',[
        'uses' => 'AdminController@delete_works',
        'as' => 'delete_works'
    ]);
    // youtube delete
    Route::get('/delete_youtube/{id}',[
        'uses' => 'AdminController@delete_current_youtube',
        'as' => 'delete_current_youtube'
    ]);
    Route::get('/delete_youtube',[
        'uses' => 'AdminController@delete_youtube',
        'as' => 'delete_youtube'
    ]);
    //  delete image by category
    Route::get('/delete_category/{id}',[
        'uses' => 'AdminController@delete_current_category',
        'as' => 'delete_current_category'
    ]);
    Route::get('/delete_category',[
        'uses' => 'AdminController@delete_category',
        'as' => 'delete_category'
    ]);
    //  update about us 
    Route::get('/update_aboutus',[
        'uses' => 'AdminController@update_aboutus',
        'as' => 'update_aboutus'
    ]);
    Route::post('/update_text',[
        'uses' => 'AdminController@update_text',
        'as' => 'update_text'
    ]);
    //  update slider
    Route::get('/update_slider',[
        'uses' => 'AdminController@getupdate_slider',
        'as' => 'getupdate_slider'
    ]);
    Route::post('/update_slider',[
        'uses' => 'AdminController@update_slider',
        'as' => 'update_slider'
    ]);
});









