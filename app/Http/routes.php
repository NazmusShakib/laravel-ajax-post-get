<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

# Start tutorial Route

Route::get('/',function(){

    return view('ajaxTest');

});

Route::get('/getRequest',function(){
    if(Request::ajax()){
        return 'get request from ajax call';
    }
});

Route::post('/register', function(){
    if(Request::ajax()){
        return var_dump(Response::json(Request::all()));
    }
});












# End tutorial Route


Route::get('user/activation/{token}', 'AuthController@activateUser')->name('user.activate');

Route::get('/alert',function () {
    return redirect()->route('main')->with('message', 'This is a Test Message!');
});


Route::group(['middleware' => 'web'], function () {
    Route::get('/homee', function () {
        return view('index');
    })->name('main');

    Route::get('/author', [
        'uses' => 'AppController@getAuthorPage',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin', 'Author']
    ]);

    Route::get('user/{user}', [
        'middleware' => ['roles'], // A 'roles' middleware must be specified
        'uses' => 'AppController@getAuthorPage',
        'roles' => ['Admin', 'Author'] // Only an administrator, or a manager can access this route
    ]);

    Route::get('/author/generate-article', [
        'uses' => 'AppController@getGenerateArticle',
        'as' => 'author.article',
        'middleware' => 'roles',
        'roles' => ['Author']
    ]);


    Route::get('/admin', [
        'uses' => 'AppController@getAdminPage',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('/admin/assign-roles', [
        'uses' => 'AppController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('/admin/add-user-from-admin', [
        'uses' => 'AuthController@postAdminAddUser',
        'as' => 'admin.adduser',
        'middleware' => 'roles',
        'roles' => ['Admin'],
    ]);

    Route::get('/admin/edit-user-by-admin/{id}', [
        'uses' => 'AuthController@edit',
        'as' => 'users.edit',
        'middleware' => 'roles',
        'roles' => ['Admin'],
    ]);
    Route::patch('/admin/update-user-by-admin/{id}', [
        'uses' => 'AuthController@update',
        'as' => 'users.update',
        'middleware' => 'roles',
        'roles' => ['Admin'],
    ]);

    Route::delete('/admin/delete-user-by-admin/{id}', [
        'uses' => 'AuthController@destroy',
        'as' => 'user.destroy',
        'middleware' => 'roles',
        'roles' => ['Admin'],
    ]);

    Route::get('/signup', [
        'uses' => 'AuthController@getSignUpPage',
        'as' => 'signup'
    ]);

    Route::post('/signup', [
        'uses' => 'AuthController@postSignUp',
        'as' => 'signup'
    ]);

    Route::get('/signin', [
        'uses' => 'AuthController@getSignInPage',
        'as' => 'signin'
    ]);

    Route::post('/signin', [
        'uses' => 'AuthController@postSignIn',
        'as' => 'signin'
    ]);

    Route::get('/logout', [
        'uses' => 'AuthController@getLogout',
        'as' => 'logout'
    ]);

    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'account',
        'middleware' => 'roles'
    ]);

    Route::post('/upateaccount', [
        'uses' => 'UserController@postSaveAccount',
        'as' => 'account.save',
        'middleware' => 'roles'
    ]);

});


# Profile
Route::resource('profile', 'ProfilesController', ['only' => ['show', 'edit', 'update']]);
Route::get('/{username}', ['as' => 'profile', 'uses' => 'ProfilesController@show']);

# Reset Password
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');