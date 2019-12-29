<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageFormRequest;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Components\FlashMessages;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
	// public function __construct()
 //    {
 //       $this->middleware('auth', ['except' => ['index']]);
 //    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


      $special_promotion = 'test';
 $venue=DB::table('venue')
          ->get();

       $wedding=DB::table('wedding')
        ->get();

        $testimonial=DB::table('testimoniyal')
        ->get();


		return view('home/index',compact('special_promotion','venue','wedding','testimonial'));
    }

    
public function registration($value='')
{
     return view('home/registration');
}

public function save_registration(Request $request)
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $code=$_POST['code'];
    $phone=$_POST['phone'];
    $profile=$_POST['profile'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $customRadio=$_POST['customRadio'];
    $dob=$_POST['dob'];
    $location=$_POST['location'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pin=$_POST['pin'];
    $country=$_POST['country'];
    $religion=$_POST['religion'];
    $mt=$_POST['mt'];

    $ref=$_POST['ref'];

    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$res = "";
for ($i = 0; $i < 5; $i++) {
    $res .= $chars[mt_rand(0, strlen($chars)-1)];
}

    $update=DB::table('users')
          ->insertGetId(array(
            'fname'     => $fname,
            'lname' => $lname,
            'email'           => $email,
            'phone'           => $phone,
            'profile'   => $profile,
            'password'   => $password,
            'gender'     => $customRadio,
            'dob' => $dob,
            'country'           => $country,
            'religion'           => $religion,
            'MotherTongue'   => $mt,
            'city'   => $city,
            'state'     => $state,
            'pin'     => $pin,
            'ref'     => $ref,
            'referral'=>$res
          
      ));

          $update1=DB::table('documents')
          ->insert(array(
            'type'     => 1,
            'uid'=>$update
          ));
          $update2=DB::table('documents')
          ->insert(array(
            'type'     => 2,
            'uid'=>$update
          ));
          $update3=DB::table('documents')
          ->insert(array(
            'type'     => 3,
            'uid'=>$update
          ));
          $update4=DB::table('documents')
          ->insert(array(
            'type'     => 4,
            'uid'=>$update
          ));

             $partner_preferences=DB::table('partner_preferences')
          ->insert(array(
            'uid'=>$update
          ));

          
      $insert_patner =DB::table('partner_preferences')
               ->insert(array
                (
                   'agefrom'         => '18',
                   'ageto'      => '80',
                   'marital_status'  => '',
                   'caste'         => '',
                   'hightfrom'        => '',
                   'hightto'           => '',
                   'Religion'         => '',
                   'Mother_Tongue'         => '',
                   'Country_of_Residence'      => '',
                   'State_of_Residence'  => '',
                   'uid'=>$update

                ));


      return Redirect::to('/');
}


public function logout($value='')
{
  Session::forget('user_id');

return Redirect::to('/user_login');


}


     public function contactus()
   {
        $special_promotion = 'test';


    return view('home/contact_us',compact('special_promotion'));
   }

     public function help()
   {
        $special_promotion = 'test';

$help = DB::table('help')
       ->first();

    return view('home/help',compact('special_promotion','help'));
   }

   


  public function about_us($value='')
{
    

  $about_us = DB::table('about_us')
    ->first();
  return view('home/about_us',compact('about_us'));
}

    public function contact_us($value='')
{
      return view('home/contact_us');

}
  
    
}
