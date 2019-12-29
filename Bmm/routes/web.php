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



Route::get('/introduction_received', 'HomeController@introduction_received');

Route::get('/listing', 'HomeController@listing');

Route::POST('/get_response', 'HomeController@get_response');

Route::get('/response', 'HomeController@response');
Route::get('/horoscope', 'HomeController@horoscope');

Route::get('/registration', 'HomeController@registration');

Route::POST('/get_hash', 'HomeController@get_hash');


Route::POST('/get_hash', 'HomeController@get_hash');

Route::get('/plan', 'HomeController@plan');

Route::POST('/save_registration', 'HomeController@save_registration');
Route::get('/user_login', 'HomeController@user_login');

Route::POST('/user_login', 'HomeController@login_user');

Route::get('/profiles', 'HomeController@profile');
Route::get('/logout', 'HomeController@logout');

Route::get('/Basic-Details', 'HomeController@Basic_Details');

Route::POST('/save_basic_details', 'HomeController@save_basic_details');

Route::get('/share_education_details', 'HomeController@share_education_details');
Route::POST('/save_education_details', 'HomeController@save_education_details');

Route::get('/share_family_details', 'HomeController@share_family_details');
Route::POST('/save_family_details', 'HomeController@save_family_details');

Route::get('/partner_preferences', 'HomeController@partner_preferences');
Route::POST('/update_partner_preferences', 'HomeController@update_partner_preferences');

Route::get('/view_profile/{id}', 'HomeController@view_profile');
Route::get('/details/{id}', 'HomeController@details');

Route::get('/share_documents', 'HomeController@share_documents');
Route::POST('/save_share_documents', 'HomeController@save_share_documents');

Route::get('/upload_photos', 'HomeController@upload_photos');
Route::get('/download', 'HomeController@download');



Route::POST('/shortlist', 'HomeController@shortlist');

Route::POST('/acceptintest', 'HomeController@acceptintest');

Route::POST('/blockusers', 'HomeController@blockusers');
Route::POST('/verify-profile', 'HomeController@verify_profile');

Route::POST('/upload_photos_users', 'HomeController@upload_photos_users');
Route::POST('/get_chat', 'HomeController@get_chat');

Route::POST('/sent_msg', 'HomeController@sent_msg');
Route::POST('/update_profile_picture', 'HomeController@update_profile_picture');



Route::get('/contact-us', 'HomeController@contactus');

Route::get('/help', 'HomeController@help');

Route::get('/user-login', 'HomeController@user_login');

Route::get('/user-register', 'HomeController@user_register');
Route::get('/hot-tiffines', 'HomeController@hot_tiffines');
Route::get('/blog', 'HomeController@blog');
Route::get('/contact-us', 'HomeController@contact_us');

Route::get('/about-us', 'HomeController@about_us');

Route::POST('/save_contact', 'HomeController@save_contact');
Route::get('/livesupport', 'HomeController@livesupport');





/*end Frontend*/
Route::get('/product-list/{id}', 'HomeController@product');
Route::get('/product-list/{id}/{id1}', 'HomeController@product');
Route::post('/product-download', 'HomeController@download');
Route::post('/product-like', 'HomeController@like');

Route::get('/signin', 'HomeController@user_login');
Route::get('/singnup', 'HomeController@user_register');
Route::POST('/check_login', 'HomeController@check_login');
Route::POST('/get_sub_category', 'HomeController@get_sub_category');
Route::POST('/get_sub_category2', 'HomeController@get_sub_category2');
Route::POST('/change_password', 'HomeController@change_password');
Route::POST('/check_mobile_no', 'HomeController@check_mobile_no');
Route::POST('/check_otp_fr', 'HomeController@check_otp_fr');
Route::POST('/forgot_password', 'HomeController@forgot_password');
Route::post('/get_product_lead', 'HomeController@get_product_lead');

Route::get('/add_to_cart', 'HomeController@add_to_cart');
Route::get('/remove_cart/{id}', 'HomeController@remove_cart');
Route::get('/checkout', 'HomeController@checkout');



Route::POST('/admin/get_sub_cat', 'PageController@get_sub_category');
Route::POST('/regiser_user', 'HomeController@regiser_user');
Route::get('/listing/{category}', 'HomeController@listing');

Route::get('/listing', 'HomeController@listing');
Route::POST('/category_by_city', 'HomeController@category_by_city');
Route::POST('/category_by_sub', 'HomeController@category_by_sub');
Route::POST('/get_lead', 'HomeController@get_lead');
Route::get('/signout', 'HomeController@signout');

Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/update-profile', 'HomeController@update_profile');
Route::POST('/save_profile', 'HomeController@save_profile');

Route::get('/mylead', 'HomeController@mylead');
Route::post('/delete_lead', 'HomeController@delete_lead');

Route::get('/setting', 'HomeController@setting');
Route::post('/save_setting', 'HomeController@save_setting');
Route::post('/services_by_city', 'HomeController@services_by_city');
Route::get('/contact', 'HomeController@contact');

Route::get('/otp', 'HomeController@otp');
Route::POST('/check_otp', 'HomeController@check_otp');
Route::POST('/verify_otp', 'HomeController@verify_otp');
Route::POST('/set_password', 'HomeController@set_password');
Route::POST('/verify-photo', 'HomeController@verify_photo');
Route::POST('/delete-photo', 'HomeController@delete_photo');

Route::get('/inbox','HomeController@inbox');
Route::POST('/get_country','HomeController@get_country');
Route::POST('/get_city','HomeController@get_city');



Route::get('/add-product', 'HomeController@add_product');
Route::POST('/save_product', 'HomeController@save_product');
Route::get('/manage-product', 'HomeController@product');
Route::post('/delete_product', 'HomeController@delete_product');
Route::get('/blog', 'HomeController@blog');

Route::get('admin/manage_ref/{id}', 'PageController@manage_ref');


Route::get('admin/add-plan', 'PageController@add_plan');
Route::get('admin/package', 'PageController@package');


Route::post('/admin/save-plan', 'PageController@save_plan');

Route::get('admin/edit-plan/{id}', 'PageController@edit_plan');
Route::post('/admin/update-plan', 'PageController@update_plan');

Route::get('admin/referral', 'PageController@referral');



Route::get('admin/view-profile/{id}', 'PageController@view_profile');
Route::get('/admin/manage-weddings', 'PageController@weddings');
Route::get('/admin/add-wedding', 'PageController@add_wedding');
Route::post('/admin/save-wedding', 'PageController@save_wedding');



Route::get('/admin/manage-subadmin', 'PageController@manage_subadmin');
Route::get('/admin/add_admin', 'PageController@add_admin');
Route::post('/admin/save-admin', 'PageController@save_admin');

Route::get('/admin/manage-menu', 'PageController@menu');
Route::get('/admin/add-menu', 'PageController@add_menu');
Route::post('/admin/save-menu', 'PageController@save_menu');


Route::get('/admin/manage-menu-type', 'PageController@manage_menu_type');
Route::get('/admin/add-menu-type', 'PageController@add_menu_type');
Route::post('/admin/save-menu-type', 'PageController@save_menu_type');


Route::get('/admin/edit-admin/{id}', 'PageController@edit_admin');
Route::post('/admin/update-admin', 'PageController@update_admin');

Route::post('/admin/remove-admin', 'PageController@remove_admin');



Route::get('/admin/edit-ads/{id}', 'PageController@edit_ads');
Route::post('/admin/update-ads', 'PageController@update_ads');
Route::get('/admin/manage-setting', 'PageController@setting');

Route::post('/admin/update-setting', 'PageController@update_setting');
Route::post('/admin/Verifyall', 'PageController@Verifyall');



Route::get('/admin/leads', 'PageController@leads');
Route::POST('/admin/update_status', 'PageController@update_status');


Route::get('/blog-details/{id}', 'HomeController@blog_details');
//---category--//
Route::get('/admin/manage-category', 'PageController@manage_category');
Route::get('/admin/manage-sub-category/{id}', 'PageController@manage_sub_category');

Route::get('/admin/add-category', 'PageController@add_category');
Route::post('/admin/save-categories', 'PageController@save_category');
Route::get('/admin/edit-category/{id}', 'PageController@edit_category');
Route::post('/admin/update-category', 'PageController@update_category');
Route::post('/admin/remove-category', 'PageController@remove_category');
Route::post('/admin/update_users', 'PageController@update_users');


//---subcategory--//

//---product--//
Route::get('/admin/manage-product', 'PageController@product');
Route::get('/admin/add-product', 'PageController@add_product');
Route::post('/admin/save-product', 'PageController@save_product');
Route::get('/admin/edit-product/{id}', 'PageController@edit_product');
Route::post('/admin/update-product', 'PageController@update_product');
Route::post('/admin/remove-product', 'PageController@remove_product');
Route::post('/get-sucategory', 'PageController@get_sucategory');

Route::get('/admin/upload-vendor', 'PageController@upload_cv');
Route::POST('/admin/upload-CSV', 'PageController@upload_vendor');

Route::post('/admin/remove-lead', 'PageController@remove_lead');


//---users--//
Route::get('/admin/manage-users', 'PageController@users');


Route::get('/admin/add_blog', 'PageController@add_blog');

Route::post('/admin/save-blog', 'PageController@save_blog');
Route::get('/admin/edit-blog/{id}', 'PageController@edit_blog');
Route::post('/admin/update-blog', 'PageController@update_blog');
Route::post('/admin/remove-blog', 'PageController@remove_blog');
Route::get('/admin/manage-blog', 'PageController@manage_blog');

//---vendors--//
Route::get('/admin/manage-vendor', 'PageController@manage_vendor');
Route::get('/admin/add-blog', 'PageController@add_blog');
Route::post('/admin/save-blog', 'PageController@save_blog');
Route::get('/admin/edit-blog/{id}', 'PageController@edit_blog');
Route::post('/admin/update-blog', 'PageController@update_blog');
Route::post('/admin/remove-users', 'PageController@remove_vendor');

Route::post('/admin/city_by_state', 'PageController@city_by_state');
Route::post('/admin/delete_users', 'PageController@delete_users');

Route::get('/admin/add_banner', 'PageController@add_banner');
Route::POST('/admin/save-banner', 'PageController@save_banner');
Route::get('/admin/edit-banner/{id}', 'PageController@edit_banner');
Route::POST('/admin/update-banner', 'PageController@update_banner');

Route::get('/admin/edit-user/{id}', 'PageController@edit_user');

Route::POST('/admin/update-user', 'PageController@update_user');


Route::get('/admin/user', 'PageController@user');

//--Admin-setting--//
Route::get('/profile', 'PageController@profile');
Route::post('/update-profile', 'PageController@update_profile');
Route::post('/upload', 'PageController@upload_profile');


Route::get('/forgot-password', 'PageController@forgot_password');
Route::post('/save-password', 'PageController@save_password');
/*api*/

Route::get('/verify-url/{id}/{device_id}', 'WebserviceController@verify_url');

Route::post('/register', 'WebserviceController@register');
Route::post('/invite', 'WebserviceController@profile');
Route::post('/offers', 'WebserviceController@listing');
Route::post('/completeProfile', 'WebserviceController@completeProfile');
Route::get('/verifi/{id}', 'WebserviceController@verifiaccount');
Route::post('/balanceHistory', 'WebserviceController@balanceHistory');
Route::post('/checkInproductCompleted', 'WebserviceController@checkInproductCompleted');
Route::post('/watchCompleted', 'WebserviceController@watchCompleted');
Route::post('/FantasticOfferCompleted', 'WebserviceController@FantasticOfferCompleted');
Route::post('/wow_offer_wallCompleted', 'WebserviceController@wow_offer_wallCompleted');

Route::post('/awesome_offer_wallCompeted', 'WebserviceController@awesome_offer_wallCompeted');
Route::post('/paymentRequest', 'WebserviceController@paymentRequest');
Route::post('/paymentHisotry', 'WebserviceController@paymentHisotry');

Route::post('/userEranPoint', 'WebserviceController@userEranPoint');


/*   ====================My Work================================             */

/*Category*/


Route::post('admin/remove-wedding', 'PageController@remove_wedding');
Route::post('admin/remove-venue', 'PageController@remove_venue');

Route::get('admin/add_venue', 'PageController@add_venue');
Route::get('admin/edit_venue/{id}', 'PageController@edit_venue');
Route::post('admin/update-venue', 'PageController@update_venue');

Route::get('admin/edit-weddings/{id}', 'PageController@edit_weddings');
Route::post('admin/update-weddings', 'PageController@update_weddings');


Route::post('admin/save-venue', 'PageController@save_venue');

Route::post('admin/save-venue', 'PageController@save_venue');

Route::get('admin/manage-venue', 'PageController@manage_venue');
Route::get('admin/about-us', 'PageController@about_us');
Route::post('admin/save_about', 'PageController@save_about');
Route::get('admin/help', 'PageController@help');
Route::post('admin/save_help', 'PageController@save_help');
Route::get('admin/inquiries', 'PageController@inquiries');
Route::post('admin/update_status_users', 'PageController@update_status_users');




Route::get('admin/main_category', 'PageController@main_category');
Route::post('admin/save-main-category', 'PageController@save_category');

Route::get('admin/sub_category', 'PageController@sub_category');
Route::post('admin/save-sub-category', 'PageController@save_sub_category');

Route::get('admin/all_category', 'PageController@category_list');

Route::get('admin/add_slider', 'PageController@add_slider');
Route::post('admin/save-slider', 'PageController@save_slider');

Route::get('admin/slider-list', 'PageController@slider_list');

Route::get('admin/home-section-1', 'PageController@home_section1');
Route::post('admin/save_homesection1', 'PageController@save_homesection1');

Route::get('admin/promostion', 'PageController@promostion');

Route::post('admin/save-promostion', 'PageController@save_promostion');
Route::get('admin/promostionlist', 'PageController@promostionlist');

Route::post('admin/category', 'PageController@category');

Route::get('admin/addchef', 'PageController@addchef');
Route::post('admin/savechef', 'PageController@savechef');

Route::get('admin/cheflist', 'PageController@cheflist');
Route::get('admin/add_blog', 'PageController@add_blog');

Route::post('admin/save-blog', 'PageController@save_blog');

Route::get('admin/bloglist', 'PageController@bloglist');
Route::get('admin/contactus', 'PageController@contactus');

Route::post('admin/save_contactus', 'PageController@save_contactus');



Route::get('admin/addtestimoniyal', 'PageController@addtestimoniyal');
Route::post('admin/save-testimoniyal', 'PageController@save_testimoniyal');

Route::get('admin/testimoniyal_list', 'PageController@testimoniyal_list');
Route::get('admin/edit-testimonial/{id}', 'PageController@edit_testimonial');
Route::post('admin/update-testimonial', 'PageController@update_testimonial');

Route::get('admin/subcategorylist/{id}', 'PageController@subcategorylist');

Route::post('/admin/remove-menu', 'PageController@remove_category');

Route::post('/admin/remove-sub-category','PageController@remove_sub_category');

Route::post('/admin/remove-slider','PageController@remove_slider');

Route::post('/admin/remove-user','PageController@remove_user');

Route::post('/admin/remove-promostion', 'PageController@remove_promostion');

Route::post('/admin/remove-chef', 'PageController@remove_chef');
Route::post('/admin/remove-blog', 'PageController@remove_blog');
Route::post('/admin/remove-testimoniyal', 'PageController@remove_testimoniyal');



Route::post('/admin/update_status_category', 'PageController@update_status_category');

Route::post('/admin/update_status_subcategory', 'PageController@update_status_subcategory');

Route::post('/admin/update_status_slider', 'PageController@update_status_slider');

Route::post('/admin/update_status_user', 'PageController@update_status_user');



Route::post('/admin/update_status_promostion', 'PageController@update_status_promostion');

Route::post('/admin/update_status_chef', 'PageController@update_status_chef');



Route::post('/admin/update_status_blog', 'PageController@update_status_blog');
Route::post('/admin/update_status_testimoniyal', 'PageController@update_status_testimoniyal');


/*Edit*/

Route::get('admin/edit_category/{id}', 'PageController@edit_category');

/*chat start here*/
Route::post('/check_chat', 'HomeController@check_chat');





/*api*/

/*Api Of wedding*/

/**/

// Route::post('/register', 'WebserviceController@register');

Route::post('/invite', 'WebserviceController@profile');
Route::post('/offers', 'WebserviceController@listing');
Route::post('/completeProfile', 'WebserviceController@completeProfile');
Route::get('/verifi/{id}', 'WebserviceController@verifiaccount');
Route::post('/balanceHistory', 'WebserviceController@balanceHistory');
Route::post('/checkInproductCompleted', 'WebserviceController@checkInproductCompleted');
Route::post('/watchCompleted', 'WebserviceController@watchCompleted');
Route::post('/FantasticOfferCompleted', 'WebserviceController@FantasticOfferCompleted');
Route::post('/wow_offer_wallCompleted', 'WebserviceController@wow_offer_wallCompleted');

Route::post('/awesome_offer_wallCompeted', 'WebserviceController@awesome_offer_wallCompeted');
Route::post('/paymentRequest', 'WebserviceController@paymentRequest');
Route::post('/paymentHisotry', 'WebserviceController@paymentHisotry');

Route::post('/userEranPoint', 'WebserviceController@userEranPoint');

/*Api */

Route::POST('/UserAppRagister','WebserviceController@UserAppRegister');
Route::POST('/UserApplogin','WebserviceController@UserApplogin');

Route::POST('/UpdateBesicDetails','WebserviceController@UpdateBesicDetails');

Route::POST('/Listings','WebserviceController@Listings');
Route::POST('/Myprofile','WebserviceController@Myprofile');

Route::POST('/AddtoShortlist','WebserviceController@AddtoShortlist');


Route::POST('/Send_Interst','WebserviceController@Send_Interst');

Route::POST('/BlockProfile','WebserviceController@BlockProfile');

Route::POST('/ShortlistProfile','WebserviceController@ShortlistProfile');

Route::POST('/InterstProfile','WebserviceController@InterstProfile');

Route::POST('/NewMatchList','WebserviceController@NewMatchList');


Route::POST('/RecentJoinList','WebserviceController@RecentJoinList');
Route::POST('/AcceptInterst','WebserviceController@AcceptInterst');
Route::POST('/Connections','WebserviceController@Connections');
Route::POST('/ChangePasswprd','WebserviceController@ChangePasswprd');
Route::POST('/BlocklList','WebserviceController@BlocklList');
Route::POST('/AccountBlock','WebserviceController@AccountBlock');
Route::POST('/Plans','WebserviceController@Plans');
Route::POST('/ViewProfile','WebserviceController@ViewProfile');
Route::POST('/UnblockUsers','WebserviceController@UnblockUsers');


Route::POST('/Search','WebserviceController@Search');
Route::POST('/EditProfile','WebserviceController@EditProfile');

Route::POST('/EditProfilePhoto','WebserviceController@EditProfilePhoto');
Route::POST('/DiscoverMatchs','WebserviceController@DiscoverMatchs');
Route::POST('/ViewProfileList','WebserviceController@ViewProfileList');
Route::POST('/UploadDocument','WebserviceController@UploadDocument');
Route::POST('/UpdateSetting','WebserviceController@UpdateSetting');
Route::POST('/User_Settings','WebserviceController@User_Settings');

Route::POST('/upload_photos','WebserviceController@upload_photos');

Route::POST('/deletephotos','WebserviceController@deletephotos');
Route::POST('/SearchByid','WebserviceController@SearchByid');



function is_active_sorter($key, $direction = 'ASC')
{
    if (request('sortby') == $key && request('sortdir') == $direction) {
        return true;
    }

    return false;
}


