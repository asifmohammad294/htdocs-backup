<?php
Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/admin', 'PageController@index');
Route::get('page/add', 'PageController@create');
Route::get('page/{page}/delete', [
    'as'   => 'page.delete',
    'uses' => 'PageController@destroy',
]);
/*Front End*/




Route::get('/registration', 'HomeController@registration');


Route::POST('/save_registration', 'HomeController@save_registration');
Route::get('/user_login', 'HomeController@user_login');

Route::POST('/user_login', 'HomeController@login_user');


Route::get('/logout', 'HomeController@logout');




Route::get('/contact-us', 'HomeController@contactus');

Route::get('/help', 'HomeController@help');

Route::get('/user-login', 'HomeController@user_login');

Route::get('/user-register', 'HomeController@user_register');

Route::get('/blog', 'HomeController@blog');
Route::get('/contact-us', 'HomeController@contact_us');

Route::get('/about-us', 'HomeController@about_us');


Route::get('/signin', 'HomeController@user_login');
Route::get('/singnup', 'HomeController@user_register');




function is_active_sorter($key, $direction = 'ASC')
{
    if (request('sortby') == $key && request('sortdir') == $direction) {
        return true;
    }

    return false;
}


