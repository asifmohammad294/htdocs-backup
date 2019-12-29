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
class PageController extends Controller
{
     public function __construct()
    {
       $this->middleware('auth', ['except' => ['forgot_password', 'save_password']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function index(Request $request)
    {
        
             $users=DB::table('users')
              ->count();

           $admin=DB::table('admin')
         ->where('role',2)
          ->count();



      //echo "sdsds";die();
       $active = "Dashboard";
       $active_menu = "Dashboard";
       return view('page/index', compact('active','active_menu','users','admin'));
    }


/*========================My Work===============================*/

public function referral($value='')
{
 $user = Auth::user();
      $user_id = $user->referral;
      $pages=array();
    $id = Session::get('user_id');
    $profile=array();
    $partner_preferences=array();

      
        $permission=DB::table('permission')
        ->get();

        $paginationlimit=10;


        $pages = DB::table('users')
        ->where('ref',$user_id)
        ->orderBy('users.id','DESC');

        if(isset($_GET['limit']) && !empty($_GET['limit'])){
        $paginationlimit = $_GET['limit'];
        }

        $pages = $pages->paginate($paginationlimit);

        $active = "Sub";
        $active_menu = "Sub";

       return view('page/referral', compact('active','active_menu','permission','pages'));

}
public function manage_ref($ids=null)
{
    $pages=array();
    $id = Session::get('user_id');
    $profile=array();
    $partner_preferences=array();

      
        $permission=DB::table('permission')
        ->get();

        $paginationlimit=10;


        $pages = DB::table('users')
        ->where('ref',$ids)
        ->orderBy('users.id','DESC');

        if(isset($_GET['limit']) && !empty($_GET['limit'])){
        $paginationlimit = $_GET['limit'];
        }

        $pages = $pages->paginate($paginationlimit);

        $active = "Sub";
        $active_menu = "Sub";

       return view('page/manage_ref', compact('active','active_menu','permission','pages'));

}




public function add_plan($value='')
{
 
  $pages=array();
    $id = Session::get('user_id');
    $profile=array();
    $partner_preferences=array();

        $profile = DB::table('users')
        ->where('id', $id)
        ->first();

        $permission=DB::table('permission')
        ->get();

        $active = "Sub";
        $active_menu = "Sub";

       return view('page/add_plan', compact('active','active_menu','profile','permission','pages'));

}


public function save_plan(Request $request)
{

    $type=$_POST['type'];
    $chat=$_POST['chat'];
    $title=$_POST['title'];
    $days=$_POST['days'];
    $Contact=$_POST['Contact'];
    $Profile=$_POST['Profile'];
    $Interest=$_POST['Interest'];
    $Massage=$_POST['Massage'];
    $Price=$_POST['Price'];
    $description=$_POST['description']; 

/*    $permission=implode(",",$_POST['permission']);
*/

/*      $password  = Hash::make($password1);*/

     $insert = DB::table('package')
            ->insert(array(

            'title'  =>$title,
            'Days'   =>$days,
            'Contact'  =>$Contact,
            'Profile'  =>$Profile,
            'Interest'   =>$Interest,
            'Massage'=>$Massage,
            'Price'  =>$Price,
            'Chat'  =>$chat,
            'Description'   =>$description,
            'type'=>$type,
           
            
             ));

$request->session()->flash('success', 'Added Successfully');
     return Redirect::to('/admin/package');
}
public function package($value='')
{
    $pages=array();
    $id = Session::get('user_id');
    $profile=array();
    $partner_preferences=array();

        $profile = DB::table('users')
        ->where('id', $id)
        ->first();

        $permission=DB::table('permission')
        ->get();

        $pages=DB::table('package')
        ->get();

        $active = "Sub";
        $active_menu = "Sub";

       return view('page/package', compact('active','active_menu','profile','permission','pages'));
}

public function edit_plan($ids=null)
{
  
  $pages=array();
    $id = Session::get('user_id');
    $profile=array();
    $partner_preferences=array();

        $profile = DB::table('users')
        ->where('id', $id)
        ->first();

        $permission=DB::table('permission')
        ->get();

        $plan=DB::table('package')
        ->where('id',$ids)
        ->first();

        $active = "Sub";
        $active_menu = "Sub";
       

       return view('page/edit_plan', compact('active','active_menu','profile','permission','pages','plan'));
}

public function update_plan(Request $request)
{
   $id=$_POST['id'];
   $type=$_POST['type'];
    $chat=$_POST['chat'];
    $title=$_POST['title'];
    $days=$_POST['days'];
    $Contact=$_POST['Contact'];
    $Profile=$_POST['Profile'];
    $Interest=$_POST['Interest'];
    $Massage=$_POST['Massage'];
    $Price=$_POST['Price'];
    $description=$_POST['description']; 

/*$permission=implode(",",$_POST['permission']);
*/

/*      $password  = Hash::make($password1);
*/
     $insert = DB::table('package')
            ->where('id',$id)
            ->update(array(

            'title'  =>$title,
            'Days'   =>$days,
            'Contact'  =>$Contact,
            'Profile'  =>$Profile,
            'Interest'   =>$Interest,
            'Massage'=>$Massage,
            'Price'  =>$Price,
            'Chat'  =>$chat,
            'Description'   =>$description,
            'type'=>$type,
           
            
             ));

$request->session()->flash('success', 'Added Successfully');
     return Redirect::to('/admin/package');
}
  public function add_admin()
  {



    $pages=array();
    $id = Session::get('user_id');
    $profile=array();
    $partner_preferences=array();

        $profile = DB::table('users')
        ->where('id', $id)
        ->first();

        $permission=DB::table('permission')
        ->get();

        $active = "Sub";
        $active_menu = "Sub";


  

       return view('page/add_admin', compact('active','active_menu','profile','permission','pages'));
  }

  public function save_admin(Request $request)
  {
    
      $username          = $_POST['username'];
      $email          = $_POST['email'];
      $phone    = $_POST['phone']; 
      $password1           = $_POST['password'];


      $permission=implode(",",$_POST['permission']);


      $password  = Hash::make($password1);

      $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $res = "";
      for ($i = 0; $i < 5; $i++) {
      $res .= $chars[mt_rand(0, strlen($chars)-1)];
      }


      $insert = DB::table('admin')
      ->insert(array(
      'name'  =>$username,
      'email'   =>$email,
      'password'  =>$password,
      'role'  =>2,
      'permission'   =>$permission,
      'phone'=>$phone,
      'referral'=>$res


      ));

      $request->session()->flash('success', 'Added Successfully');
      return Redirect::to('/admin/manage-subadmin');
  }

public function manage_subadmin($value='')
{
  $paginationlimit=10;

      
      $pages = DB::table('admin')
        ->where('role',2)
       ->orderBy('id','DESC');

           if(isset($_GET['limit']) && !empty($_GET['limit'])){
      $paginationlimit = $_GET['limit'];
      }

      $pages = $pages->paginate($paginationlimit);
       $active = "Sub";
       $active_menu = "Sub";

       return view('page/manage_subadmin', compact('active','active_menu','pages'));
}

public function edit_admin($id=null)
{
   
    $profile=array();
    $partner_preferences=array();

        $pages = DB::table('admin')
        ->where('id', $id)
        ->first();


        $permission=DB::table('permission')
        ->get();

        $active = "Sub";
        $active_menu = "Sub";

       

       return view('page/edit_admin', compact('active','active_menu','profile','permission','pages'));
}

function update_admin(Request $request)
{
$username          = $_POST['username'];
$email          = $_POST['email'];
$phone    = $_POST['phone']; 
$password1           = $_POST['password'];
$id           = $_POST['id'];


$permission=implode(",",$_POST['permission']);


      $password  = Hash::make($password1);

     $insert = DB::table('admin')
     ->where('id',$id)
      ->update(array(
            'name'  =>$username,
            'email'   =>$email,
            'password'  =>$password,
            'role'  =>2,
            'permission'   =>$permission,
            'phone'=>$phone,
           
            
             ));


$request->session()->flash('success', 'updated Successfully');
     return Redirect::to('/admin/manage-subadmin');
}

public function remove_admin(Request $request)
{
     $teams = $_POST['clients'];
      $teams=DB::table('admin')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Sub-Admin has been deleted');
      return redirect()->back();
}
public function view_profile($id=null)
{

    $myprofile=array();
        $myprofile = DB::table('users')
        ->where('id', $id)
        ->first();
        $photos = DB::table('user_photos')
        ->where('uid', $id)
        ->get();

        

        $partner_preferences=DB::table('partner_preferences')
        ->where('uid',$id)
        ->first();

        $documents=DB::table('documents')
        ->where('uid',$id)
        ->first();

         $shortlist=DB::table('shortlist')
          ->where('sid',$id)
           ->orWhere('uid',$id)
          ->count();

            $intest=DB::table('intest')
          ->where('sid',$id)
          ->count();

           $connection=DB::table('intest')
          ->where('sid',$id)
          ->orWhere('uid',$id)
          ->where('status',1)
          ->count();

           $view=DB::table('view_profile')
          ->where('uid',$id)
          ->count();


  $pages=array();

  $active = "Users";
  $active_menu = "Users";

  return view('page/view_profile', compact('active','active_menu','pages','partner_preferences','myprofile','shortlist','intest','connection','view','documents','photos'));
}
public function update_status_users(Request $request)
{
    $status    = $_POST['status'];
  $id        = $_POST['id'];
$table=$_POST['table'];
  if ($status==1)
    {
     $update = DB::table($table)
              ->where('id', $id)
              ->update(array(
        'status' =>0,
        
               ));
       echo 0;       
    }else{
      
         $update = DB::table($table)
              ->where('id', $id)
              ->update(array(
        'status' =>1,
        
               ));
             echo 1;           
          }
 } 



public function add_wedding($value='')
{
 $pages=array();
    $id = Session::get('user_id');
    $profile=array();
    $partner_preferences=array();

        $profile = DB::table('users')
        ->where('id', $id)
        ->first();

        $partner_preferences=DB::table('partner_preferences')
        ->where('uid',$id)
        ->first();

        $active = "venue";
        $active_menu = "venue";

       return view('page/add_wedding', compact('active','active_menu','profile','partner_preferences','pages'));

}

public function save_wedding(Request $request)
{

$title          = $_POST['title'];
$bname          = $_POST['bname'];
$description    = $_POST['description']; 
$date           = $_POST['date'];
$location       = $_POST['location'];

    


          if(!empty($_FILES['image']['name'])){
        $image1 = $_FILES['image']['name'];
        $temp_anme1 = $_FILES["image"]["tmp_name"];

        $ext = pathinfo($image1, PATHINFO_EXTENSION);

        $name1 = rand(10,99999).'.'.$ext;

        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/Bharatiy_Matrimony/public/uploads/';
        $imagePath1 = $uploadfile1. $name1;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name1;
        }

            $insert = DB::table('wedding')
            ->insert(array(
            'title'  =>$title,
            'couple'   =>$bname,
            'des'  =>$description,
            'wed_date'  =>$date,
            'image'   =>$hm_image1,
            'location'=>$location,
           
            
             ));

$request->session()->flash('success', 'Added Successfully');
     return Redirect::to('/admin/manage-weddings');
}

public function weddings($value=''){
  $paginationlimit=10;

      
      $pages = DB::table('wedding')
       ->orderBy('id','DESC');

           if(isset($_GET['limit']) && !empty($_GET['limit'])){
      $paginationlimit = $_GET['limit'];
      }

      $pages = $pages->paginate($paginationlimit);
       $active = "venue";
       $active_menu = "venue";
       return view('page/manage-weddings', compact('active','active_menu','pages'));
}

public function add_venue($value='')
{
  
      $active = "venue";
       $active_menu = "venue";
       return view('page/add_venue', compact('active','active_menu'));
}

public function edit_venue($id=null)
{
      $pages=DB::table('venue')
      ->where('id',$id)
      ->first();

      $active = "venue";
      $active_menu = "venue";

      return view('page/edit_venue', compact('active','active_menu','pages'));
}

public function edit_weddings($id=null)
{
      $pages=DB::table('wedding')
      ->where('id',$id)
      ->first();

      $active = "venue";
      $active_menu = "venue";

      return view('page/edit_weddings', compact('active','active_menu','pages'));
}




public function update_weddings(Request $request)
{
   
$title          = $_POST['title'];
$id          = $_POST['id'];

$bname          = $_POST['bname'];
$description    = $_POST['description']; 
$date           = $_POST['date'];
$location       = $_POST['location'];
  $pages=DB::table('venue')
      ->where('id',$id)
      ->first();
$hm_image1=$pages->image;
    


          if(!empty($_FILES['image']['name'])){
        $image1 = $_FILES['image']['name'];
        $temp_anme1 = $_FILES["image"]["tmp_name"];

        $ext = pathinfo($image1, PATHINFO_EXTENSION);

        $name1 = rand(10,99999).'.'.$ext;

        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/Bharatiy_Matrimony/public/uploads/';
        $imagePath1 = $uploadfile1. $name1;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name1;
        }

            $insert = DB::table('wedding')
            ->where('id',$id)
            ->update(array(
            'title'  =>$title,
            'couple'   =>$bname,
            'des'  =>$description,
            'wed_date'  =>$date,
            'image'   =>$hm_image1,
            'location'=>$location,
           
            
             ));

$request->session()->flash('success', 'Updated Successfully');
     return Redirect::to('/admin/manage-weddings');
}


public function update_venue(Request $request)
{
    $title=$_POST['title'];
     $id=$_POST['id'];
    $location=$_POST['location'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $short=$_POST['short'];
    $description=$_POST['description']; 
     $pages=DB::table('venue')
      ->where('id',$id)
      ->first();
    $hm_image1=$pages->image;

          if(!empty($_FILES['image']['name'])){

        $image1 = $_FILES['image']['name'];
        $temp_anme1 = $_FILES["image"]["tmp_name"];

        $ext = pathinfo($image1, PATHINFO_EXTENSION);

        $name1 = rand(10,99999).'.'.$ext;

        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/Bharatiy_Matrimony/public/uploads/';
        $imagePath1 = $uploadfile1. $name1;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name1;

        }

            $insert = DB::table('venue')
            ->where('id',$id)
            ->update(array(
            'title'  =>$title,
            'location'   =>$location,
            'city'  =>$city,
            'pincode'  =>$pincode,
            'image'   =>$hm_image1,
            'short'  =>$short,
            'dis'   =>$description,
             ));

$request->session()->flash('success', 'Updated Successfully');
      return Redirect::to('/admin/manage-venue');
}

public function save_venue(Request $request)
{
    $title=$_POST['title'];
    $location=$_POST['location'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $short=$_POST['short'];
    $description=$_POST['description']; 
    $hm_image1='';

          if(!empty($_FILES['image']['name'])){

        $image1 = $_FILES['image']['name'];
        $temp_anme1 = $_FILES["image"]["tmp_name"];

        $ext = pathinfo($image1, PATHINFO_EXTENSION);

        $name1 = rand(10,99999).'.'.$ext;

        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/Bharatiy_Matrimony/public/uploads/';
        $imagePath1 = $uploadfile1. $name1;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name1;

        }

            $insert = DB::table('venue')
            ->insert(array(
            'title'  =>$title,
            'location'   =>$location,
            'city'  =>$city,
            'pincode'  =>$pincode,
            'image'   =>$hm_image1,
            'short'  =>$short,
            'dis'   =>$description,
             ));

$request->session()->flash('success', 'Added Successfully');
      return Redirect::to('/admin/manage-venue');
}

/*public function manage_venue($value='')
{
        $active = "venue";
       $active_menu = "venue";
       return view('page/main_category', compact('active','active_menu'));  
}*/
  public function manage_venue(){


 $paginationlimit=10;

      
      $pages = DB::table('venue')
       ->orderBy('venue.id','DESC');

           if(isset($_GET['limit']) && !empty($_GET['limit'])){
      $paginationlimit = $_GET['limit'];
      }

      $pages = $pages->paginate($paginationlimit);
  	   $active = "venue";
       $active_menu = "venue";
       return view('page/manage_venue', compact('active','active_menu','pages'));
  }


public function remove_wedding(Request $request)
{
   $teams = $_POST['clients'];
      $teams=DB::table('wedding')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Wedding has been deleted');
      return redirect()->back();
}

public function remove_vendor(Request $request)
{
   $teams = $_POST['clients'];
      $teams=DB::table('users')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'User has been deleted');
      return redirect()->back();
}



public function remove_venue(Request $request)
{
   $teams = $_POST['clients'];
      $teams=DB::table('venue')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Venue has been deleted');
      return redirect()->back();
}

public function Verifyall(Request $request)
{
   $teams = $_POST['clients'];

    $insert = DB::table('users')
            ->where('id',$teams)
            ->update(array(
            'verfy_photo'  =>1,
            'user_account'   =>0,
            'verfiy'  =>1,
            'status'  =>1,
             ));
/*
      $teams=DB::table('venue')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Venue has been deleted');
      return redirect()->back();*/
}




public function about_us(){

$pages=DB::table('about_us')
->first();
       $active = "Pages";
         $active_menu = "Pages";

       return view('page/about_us', compact('active','active_menu','pages'));
}

public function save_about(Request $request)
{

  $descrition=$_POST['descrition'];
          $hm_image1='';

          if(!empty($_FILES['file']['name'])){

        $image1 = $_FILES['file']['name'];
        $temp_anme1 = $_FILES["file"]["tmp_name"];

        $ext = pathinfo($image1, PATHINFO_EXTENSION);

        $name1 = rand(10,99999).'.'.$ext;

        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/Bharatiy_Matrimony/public/uploads/';
        $imagePath1 = $uploadfile1. $name1;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name1;

        }


            $insert = DB::table('about_us')
            ->where('id',1)
            ->update(array(
            'image'   =>$hm_image1,
            'data'  =>$descrition,
            
             ));

 $request->session()->flash('success', 'Updated successfully');
      return Redirect::to('/admin/about-us');
}


public function help($value='')
{
    $pages=DB::table('help')
    ->first();
    $active = "Pages";
    $active_menu = "Pages";

       return view('page/help', compact('active','active_menu','pages'));
}

public function save_help(Request $request)
{

  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $timing=$_POST['timing'];

  $descrition=$_POST['descrition'];
         
          $hm_image1='';

          if(!empty($_FILES['file']['name'])){

        $image1 = $_FILES['file']['name'];
        $temp_anme1 = $_FILES["file"]["tmp_name"];

        $ext = pathinfo($image1, PATHINFO_EXTENSION);

        $name1 = rand(10,99999).'.'.$ext;

        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/Bharatiy_Matrimony/public/uploads/';
        $imagePath1 = $uploadfile1. $name1;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name1;

        }


            $insert = DB::table('help')
            ->where('id',1)
            ->update(array(
          
            'data'  =>$descrition,
            'email'  =>$email,
            'phone'  =>$phone,
            'timing'  =>$timing,
            
             ));

 $request->session()->flash('success', 'Updated successfully');
      return Redirect::to('/admin/help');
}


public function inquiries($value='')
{
   $pages=DB::table('inquiries')
    ->get();
    $active = "Pages";
    $active_menu = "Pages";

       return view('page/inquiries', compact('active','active_menu','pages'));
}

   public function users()
    {
        
        $paginationlimit=10;
  
     
        $pages = DB::table('users')
          ->orderBy('users.id','DESC');
           $pages = $pages->paginate($paginationlimit);
          if(isset($_GET['limit']) && !empty($_GET['limit'])){
      $paginationlimit = $_GET['limit'];
      }

     //echo '<pre>';print_r($pages);die();
          $active = "Users";

          //print_r($pages);

        $active_menu = "Users";
        return view('page/manage_users',compact('pages','active','active_menu'));
      
    }
  public function save_category(Request $request){

      $title = $_POST['title'];

            if(!empty($_FILES['image']['name'])){
          $image1 = $_FILES['image']['name'];
          $temp_anme1 = $_FILES["image"]["tmp_name"];
          $name1 = rand(10,99999).$image1;
          $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
          $imagePath1 = $uploadfile1. $name1;
          move_uploaded_file($temp_anme1,$imagePath1);
          $hm_image1 = $name1;
      }else{
        $name1 ='dummy.png';
      }
 
 $insert = DB::table('category')
           ->insert(array(
               
               'category'=>$title,
               'image'=>$name1,
               
              ));
 $request->session()->flash('success', 'Category has been added');
      return Redirect::to('/admin/main_category');
    }


public function sub_category(){

	$page =DB::table('category')
	        ->where('pid',0)
	        ->where('status',1)
	        ->get();

	$active = "Dashboard";
       $active_menu = "Dashboard";
       return view('page/sub_category', compact('active','active_menu','page'));
}

public function save_sub_category(Request $request){

		$category = $_POST['category'];
		$title    = $_POST['title'];

				if(!empty($_FILES['image']['name'])){
				$image1 = $_FILES['image']['name'];
				$temp_anme1 = $_FILES["image"]["tmp_name"];
				$name1 = rand(10,99999).$image1;
				$uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
				$imagePath1 = $uploadfile1. $name1;
				move_uploaded_file($temp_anme1,$imagePath1);
				$hm_image1 = $name1;
				}else{
          $name1 ='dummy.png';
        }

 $insert =DB::table('category')
             ->insert(array(
             	'pid'       =>$category,
             	'category'  =>$title,
             	'image'     =>$name1,
         ));

	$request->session()->flash('success', 'Sub Category has been added');
      return Redirect::to('/admin/sub_category');
}

public function category_list(){

$paginationlimit=10;

           $pages = DB::table('category')
                        ->where('pid',0)
                        ->orderBy('id','DESC');



        if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }

          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

       $pages = $pages->paginate($paginationlimit);

      
         $active = "Dashboard";
         $active_menu = "Dashboard";
         

       return view('page/all_category', compact('active','active_menu','pages'));

}


public function add_slider(){


	     $active = "Dashboard";
       $active_menu = "Dashboard";

        $pages = DB::table('banners')
        ->first();
       return view('page/add_slider', compact('active','active_menu','pages'));
}

public function save_slider(Request $request){

  $title = $_POST['title'];
  $text  = $_POST['text'];

          if(!empty($_FILES['image']['name'])){
        $image1 = $_FILES['image']['name'];
        $temp_anme1 = $_FILES["image"]["tmp_name"];

        $ext = pathinfo($image1, PATHINFO_EXTENSION);

        $name1 = rand(10,99999).'.'.$ext;

        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/Bharatiy_Matrimony/public/uploads/';
        $imagePath1 = $uploadfile1. $name1;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name1;
        }

            $insert = DB::table('banners')
            ->where('id',1)
            ->update(array(

            'title'  =>$title,
            'text'   =>$text,
            'image'  =>$hm_image1,

            ));

$request->session()->flash('success', 'Banner has been updated');
      return Redirect::to('/admin/add_slider');
}



public function slider_list(){

  $paginationlimit=10;

           $pages = DB::table('slider')
                       
                        ->orderBy('id','DESC');



        if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }

          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

       $pages = $pages->paginate($paginationlimit);

      
         $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/slider_list', compact('active','active_menu','pages'));
}



public function home_section1(){

$pages =DB::table('home_section1')->where('id','1')->first();

   $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/home_section1', compact('active','active_menu','pages'));
}

public function save_homesection1(Request $request){

    $title       = $_POST['title'];
    $link        = $_POST['link'];
    $descrition  = $_POST['descrition'];
 
 $pages =DB::table('home_section1')->where('id','1')->first();

                  if(!empty($_FILES['image1']['name'])){
        $image1 = $_FILES['image1']['name'];
        $temp_anme1 = $_FILES["image1"]["tmp_name"];
        $name1 = rand(10,99999).$image1;
        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
        $imagePath1 = $uploadfile1. $name1;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name1;
        }else{
             
             $name1 = $pages->image1;
        }

                 if(!empty($_FILES['image2']['name'])){
        $image1 = $_FILES['image2']['name'];
        $temp_anme1 = $_FILES["image2"]["tmp_name"];
        $name2 = rand(10,99999).$image1;
        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
        $imagePath1 = $uploadfile1. $name2;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name2;
        }else{
          $name2 = $pages->image2;
        }

    $update=DB::table('home_section1')
              ->where('id', 1)
              ->update(array(
              'title'  => $title,
              'link'  =>   $link,
              'descrition'  => $descrition,
              'image1'  => $name1,
              'image2'  => $name2,  
          ));

        $request->session()->flash('success', 'Home Section Update successfully');
      return Redirect::to('/admin/home-section-1');
}

public function promostion(){

$category    =DB::table('category')->where('pid',0)->get();
$subcategory =DB::table('category')->where('pid','!=',0)->get();


        $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/special_promostion', compact('active','active_menu','category','subcategory'));
}

public function category(Request $request){

   $id =  $_POST['value'];

   $subc = DB::table('category')->where('pid',$id)->get();
   foreach ($subc as $key => $value) { ?>
            
            <option value="<?php echo $value->id ?>"><?php echo $value->category ?></option>
  <?php }
}

public function save_promostion(Request $request){

$title       =$_POST['title'];
$category    =$_POST['category'];
$subcategory =$_POST['subcategory'];
$link        =$_POST['link'];
$rate        =$_POST['rate'];

                  if(!empty($_FILES['image']['name'])){
        $image1 = $_FILES['image']['name'];
        $temp_anme1 = $_FILES["image"]["tmp_name"];
        $name = rand(10,99999).$image1;
        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
        $imagePath1 = $uploadfile1. $name;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name;
        }else{
          $name = $pages->image2;
        }
  $insert =DB::table('special_promotion') 
               ->insert(array(
                'title'    => $title,
                'cid'      => $category,
                'scid'     => $subcategory,
                'link'     => $link,
                'rate'     => $rate,
                'image'    => $name,

                ));

        $request->session()->flash('success', 'Special Promotion has been Added successfully');
      return Redirect::to('/admin/promostion');       
}


public function addchef(){

$pages =DB::table('main_menu')->where('status',1)->get();
         $active      = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/addchef', compact('active','active_menu','pages'));
}

public function savechef(Request $request){
  $chefname       = $_POST['chefname'];
  $link           = $_POST['link'];
  $menu           = $_POST['menu'];
  $descrition     = $_POST['descrition'];

                        if(!empty($_FILES['image']['name'])){
        $image1 = $_FILES['image']['name'];
        $temp_anme1 = $_FILES["image"]["tmp_name"];
        $name = rand(10,99999).$image1;
        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
        $imagePath1 = $uploadfile1. $name;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name;
        }else{
          $name ='dummy.png';
        }

   $insert = DB::table('chef')
            ->insert(array(
              'name'         =>$chefname,
              'link'         =>$link,
              'menu'         =>$menu,
              'description'  =>$descrition,
              'image'        =>$name,
             ));   
   $request->session()->flash('success', 'Chef has been Added');
      return Redirect::to('/admin/addchef');                
}

public function cheflist(){

  $paginationlimit=10;

           $pages = DB::table('chef')
                    ->leftJoin('main_menu', 'main_menu.id', '=', 'chef.menu')
                    ->select('chef.*', 'main_menu.title')
                       
                        ->orderBy('id','DESC');



        if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }

          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

       $pages = $pages->paginate($paginationlimit);

      
         $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/cheflist', compact('active','active_menu','pages'));
}


public function add_blog(){


	$active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/add_blog', compact('active','active_menu','pages'));
}

public function save_blog(Request $request){


$title       =$_POST['title'];
$status       =$_POST['status'];

         
                           if(!empty($_FILES['image']['name'])){
        $image1 = $_FILES['image']['name'];
        $temp_anme1 = $_FILES["image"]["tmp_name"];
        $name = rand(10,99999).$image1;
        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
        $imagePath1 = $uploadfile1. $name;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name;
        }else{
          $name ='dummy.png';;
        }

$insert =DB::table('blog')
           ->insert(array(
             
             'title'        =>$title,
             'image'        =>$name,
             'status'       =>$status,

            ));
$request->session()->flash('success', 'Blog has been Added');
      return Redirect::to('/admin/bloglist');      
}

public function bloglist(){

	$paginationlimit=10;

           $pages = DB::table('blog')
                        ->orderBy('id','DESC');



        if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }

          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

       $pages = $pages->paginate($paginationlimit);

      
         $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/bloglist', compact('active','active_menu','pages'));
}

public function promostionlist(){

	$paginationlimit=10;

           $pages = DB::table('special_promotion')
                    ->leftJoin('category', 'category.id', '=', 'special_promotion.cid')
                    ->select('special_promotion.*', 'category.category')
                    ->orderBy('id','DESC');



        if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }

          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

       $pages = $pages->paginate($paginationlimit);

      
         $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/promostionlist', compact('active','active_menu','pages'));
}

public function contactus(){
$pages =DB::table('contactus')->where('id','1')->first();

	 $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/contactus', compact('active','active_menu','pages'));
}


public function save_contactus(Request $request){

$title          = $_POST['title'];
$email          = $_POST['email']; 
$contactnumber  = $_POST['contactnumber']; 
$location     = $_POST['location'];
$fb             = $_POST['fb']; 
$twitter        = $_POST['twitter']; 
$googleplus     = $_POST['googleplus'];
$insta          = $_POST['insta']; 
$youtube        = $_POST['youtube'];

		

$update = DB::table('contactus')
              ->where('id', 1)
             ->update(array(
				'title'         =>$title,
				'email'         =>$email,
				'phone' =>$contactnumber,
				'location'       =>$location,
				'fb'            =>$fb,
				'twitter'       =>$twitter,
				'googleplus'    =>$googleplus,
				'insta'          =>$insta,
				'youtube'          =>$youtube,
               ));

$request->session()->flash('success', 'Contact has been Update');
      return Redirect::to('/admin/contactus');      
}


public function save_aboutsection(Request $request){

    $title       = $_POST['title'];
    $link        = $_POST['link'];
    $descrition  = $_POST['descrition'];
 
 $pages =DB::table('home_section1')->where('id','2')->first();

                  if(!empty($_FILES['image1']['name'])){
        $image1 = $_FILES['image1']['name'];
        $temp_anme1 = $_FILES["image1"]["tmp_name"];
        $name1 = rand(10,99999).$image1;
        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
        $imagePath1 = $uploadfile1. $name1;
        move_uploaded_file($temp_anme1,$imagePath1);
        $hm_image1 = $name1;
        }else{
             
             $name1 = $pages->image1;
        }



    $update=DB::table('home_section1')
              ->where('id', 2)
              ->update(array(
              'title'  => $title,
              'link'  =>   $link,
              'descrition'  => $descrition,
              'image1'  => $name1,
              
          ));

        $request->session()->flash('success', 'About Section Update successfully');
      return Redirect::to('/admin/aboutus_section');
}



public function aboutsection_2(){

	$pages =DB::table('aboutsection_2')->where('id','1')->first();

	 $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/aboutsection-2', compact('active','active_menu','pages'));
}

public function save_aboutsection_2(Request $request){

	$dailyemeal    = $_POST['dailyemeal'];
	$happyclients  = $_POST['happyclients'];
	$percel        = $_POST['percel'];
	$onlinestore   = $_POST['onlinestore'];

$update = DB::table('aboutsection_2')
              ->where('id', 1)
              ->update(array(
				'dailyemeal'        =>$dailyemeal,
				'happyclients'      =>$happyclients,
				'perceltoday'       =>$percel,
				'onlinestore'       =>$onlinestore,
				
               ));
  $request->session()->flash('success', 'About Section Update successfully');
      return Redirect::to('/admin/aboutsection_2');

}


public function addtestimoniyal(){

	

	 $active = "Tst";
         $active_menu = "Tst";

       return view('page/testimoniyal', compact('active','active_menu','pages'));
}

public function save_testimoniyal(Request $request){


   $title         = $_POST['title'];
   $designation   = $_POST['designation'];
   $description   = $_POST['description'];
   $location      = $_POST['location'];
   
$insert = DB::table('testimoniyal')
           ->insert(array(
              
              'titile'        =>$title,
              'designation' =>$designation,
              'description'=>$description,
              'location'=>$location
         

           ));
$request->session()->flash('success', 'Testimonial has been Added');
      return Redirect::to('/admin/testimoniyal_list'); 

}

public function testimoniyal_list(){

		$paginationlimit=10;

           $pages = DB::table('testimoniyal')
                        ->orderBy('id','DESC');



        if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }

          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

       $pages = $pages->paginate($paginationlimit);

      
         $active = "Tst";
         $active_menu = "Tst";

       return view('page/testimoniyallist', compact('active','active_menu','pages'));
}

public function edit_testimonial($id=null)
{
  //echo $id;die();
      $pages = DB::table('testimoniyal')
      ->where('id',$id)
      ->first();



      $active = "Tst";
      $active_menu = "Tst";

      return view('page/edit_testimonial', compact('active','active_menu','pages'));
}

public function update_testimonial(Request $request)
{
  
   $title         = $_POST['title'];
   $designation   = $_POST['designation'];
   $description   = $_POST['description'];
   $location      = $_POST['location'];
   $id=$_POST['id'];
$insert = DB::table('testimoniyal')
          ->where('id',$id)
           ->update(array(
              
              'titile'        =>$title,
              'designation' =>$designation,
              'description'=>$description,
              'location'=>$location
         

           ));
$request->session()->flash('success', 'Testimonial has been Updated');
      return Redirect::to('/admin/testimoniyal_list'); 
}
public function subcategorylist($id=''){

 $paginationlimit=10;

           $pages = DB::table('category')
                        ->where('pid',$id)
                        ->orderBy('id','DESC');



        if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }

          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

       $pages = $pages->paginate($paginationlimit);

      
         $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/all_subcategory', compact('active','active_menu','pages'));
}

public function remove_category(Request $request){
   $teams = $_POST['clients'];
      $teams=DB::table('category')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Category has been deleted');
      return redirect()->back();

}

public function remove_sub_category(Request $request){
	$teams = $_POST['clients'];
      $teams=DB::table('category')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Sub Category has been deleted');
      return redirect()->back();
}

public function remove_slider(Request $request){

	$teams = $_POST['clients'];
      $teams=DB::table('slider')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Slider has been deleted');
      return redirect()->back();
}

public function remove_user(Request $request){
	 $teams = $_POST['clients'];
      $teams=DB::table('users')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'User has been deleted');
      return redirect()->back();
}

public function remove_promostion(Request $request){
	 $teams = $_POST['clients'];
      $teams=DB::table('special_promotion')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Promotion has been deleted');
      return redirect()->back();
}

public function remove_chef(Request $request){
	 $teams = $_POST['clients'];
      $teams=DB::table('chef')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Chef has been deleted');
      return redirect()->back();
}

public function remove_blog(Request $request){

 $teams = $_POST['clients'];
      $teams=DB::table('blog')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Blog has been deleted');
      return redirect()->back();

}

public function remove_testimoniyal(Request $request){
	$teams = $_POST['clients'];
      $teams=DB::table('testimoniyal')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'Testimoniyal has been deleted');
      return redirect()->back();
}
public function update_status_category(Request $request)
{
    $status    = $_POST['status'];
	$id        = $_POST['id'];

	if ($status==1)
	  {
		 $update = DB::table('category')
              ->where('id', $id)
              ->update(array(
				'status' =>0,
				
               ));
		   echo 0;       
	  }else{
		     $update = DB::table('category')
              ->where('id', $id)
              ->update(array(
				'status' =>1,
				
               ));
             echo 1;		       
	        }
 } 

 public function update_status_subcategory(Request $request){
 	    $status    = $_POST['status'];
	    $id        = $_POST['id'];

	if ($status==1)
	  {
		 $update = DB::table('category')
              ->where('id', $id)
              ->update(array(
				'status' =>0,
				
               ));
		   echo 0;       
	  }else{
		     $update = DB::table('category')
              ->where('id', $id)
              ->update(array(
				'status' =>1,
				
               ));
             echo 1;		       
	        }
 }

public function update_status_slider(Request $request){

	  $status    = $_POST['status'];
	    $id        = $_POST['id'];

	if ($status==1)
	  {
		 $update = DB::table('slider')
                    ->where('id', $id)
                    ->update(array(
				    'status' =>0,
				
               ));
		   echo 0;       
	  }else{
		     $update = DB::table('slider')
              ->where('id', $id)
              ->update(array(
				'status' =>1,
				
               ));
             echo 1;		       
	        }
}


public function update_status_user(Request $request){

	  $status      = $_POST['status'];
	    $id        = $_POST['id'];

	if ($status==1)
	  {
		 $update = DB::table('users')
                    ->where('id', $id)
                    ->update(array(
				    'status' =>0,
				
               ));
		   echo 0;       
	  }else{
		     $update = DB::table('users')
              ->where('id', $id)
              ->update(array(
				'status' =>1,
				
               ));
             echo 1;		       
	        }
}


public function update_status_promostion(Request $request){

		  $status      = $_POST['status'];
	      $id          = $_POST['id'];

	if ($status==1)
	  {
		 $update = DB::table('special_promotion')
                    ->where('id', $id)
                    ->update(array(
				    'status' =>0,
				
               ));
		   echo 0;       
	  }else{
		     $update = DB::table('special_promotion')
              ->where('id', $id)
              ->update(array(
				'status' =>1,
				
               ));
             echo 1;		       
	        }
}

public function update_status_chef(Request $request){


	      $status      = $_POST['status'];
	      $id          = $_POST['id'];

	if ($status==1)
	  {
		 $update = DB::table('chef')
                    ->where('id', $id)
                    ->update(array(
				    'status' =>0,
				
               ));
		   echo 0;       
	  }else{
		     $update = DB::table('chef')
              ->where('id', $id)
              ->update(array(
				'status' =>1,
				
               ));
             echo 1;		       
	        }
}


public function update_status_blog(Request $request){

		      $status      = $_POST['status'];
	      $id          = $_POST['id'];

	if ($status==1)
	  {
		 $update = DB::table('blog')
                    ->where('id', $id)
                    ->update(array(
				    'status' =>0,
				
               ));
		   echo 0;       
	  }else{
		     $update = DB::table('blog')
              ->where('id', $id)
              ->update(array(
				'status' =>1,
				
               ));
             echo 1;		       
	        }
}

public function update_status_testimoniyal(Request $request){

			      $status      = $_POST['status'];
	      $id          = $_POST['id'];

	if ($status==1)
	  {
		 $update = DB::table('testimoniyal')
                    ->where('id', $id)
                    ->update(array(
				    'status' =>0,
				
               ));
		   echo 0;       
	  }else{
		     $update = DB::table('testimoniyal')
              ->where('id', $id)
              ->update(array(
				'status' =>1,
				
               ));
             echo 1;		       
	        }
}


public function edit_category($id=''){
    
    $pages=DB::table('category')
                ->where('id',$id)
                ->first();


      $active = "Dashboard";
         $active_menu = "Dashboard";

       return view('page/main_category', compact('active','active_menu','pages'));          
}






    public function forgot_password(Request $request){
       return view('page/email');
    }
    public function save_password(Request $request){
      //echo "<pre>"; print_r($_POST); die;
      $email=$_POST['email'];
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $password1 = '';
      $length = 8;
      for ($i = 0; $i < $length; $i++) {
          $password1 .= $characters[rand(0, $charactersLength - 1)];
      }
      $password  = Hash::make($password1);
      // $password = md5($password1);
      $pages = DB::table('admin')->where('email',$email)->first();
      if(isset($pages) && !empty($pages)) {
        $pages->name;
        $password1;
        $user_text = "<html><head></head><body style='font-family: Arial; font-size: 12px;'><div>
        Hello $pages->name<p>
        You have requested a Forget password, Your new password $password1</p><p>
        Please ignore this email if you did not request a gorget password.</p></div></body></html>";
        //echo $user_text; die;
        $to = $email;
        $subject = 'Forgot-password jatt-juliet';
        $from = $email;
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
                  'Reply-To: '.$from."\r\n" .
                  'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $user_text, $headers);
        $update=DB::table('admin')
              ->where('email', $email)
              ->update(array(
              'password'  => $password,  
          ));
        $request->session()->flash('status', 'Your password send your email successfully');
        return Redirect::to('/forgot-password');
      }else{
        $request->session()->flash('error', 'Invalid credentials');
        return Redirect::to('/forgot-password');
      }
    }
   
    // This function use for manage-category START --
  public function add_tiffins($value='')
  {
    $pages=DB::table('main_menu')
     ->get();
          $active = "Tiffins";
          $active_menu = "Tiffins";

          return view('page/add_tiffins',compact('active','active_menu','pages'));

  }

  public function save_tiffins(Request $request)
  {
    //echo "<pre>"; print_r($_POST); print_r($_FILES); die;
      $category_title  = $_POST['title'];
      $description  = $_POST['description'];
      $short  = $_POST['short'];
      $status  = $_POST['status'];
      $price=$_POST['price'];
      $type=$_POST['type'];
      $today = date("Y-m-d h:i:sa"); 
      $menu=$_POST['menu'];

      $menu=implode(",",$menu);


      
      if(!empty($_FILES['image']['name'])){
          $image1 = $_FILES['image']['name'];
          $temp_anme1 = $_FILES["image"]["tmp_name"];
          $name1 = rand(10,99999).$image1;
          $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
          $imagePath1 = $uploadfile1. $name1;
          move_uploaded_file($temp_anme1,$imagePath1);
          $hm_image1 = $name1;
      }else{
          $hm_image1 = "";
      }
      $update=DB::table('product')
          ->insert(array(
          'title'     => $category_title,
          'short' => $short,
          'description' => $description,
          'price'           => $price,
          'image'           => $hm_image1,
          'created'   => $today,
          'status'   => $status,
          'ptype'   => $type,
          'menu'=>$menu,
           'menu_type'=>1

      ));
      $request->session()->flash('success', 'Food has been added');
      return Redirect::to('/admin/manage-tiffins');
  }


     public function tiffins()
    {
 
          $paginationlimit=10;
          $pages = DB::table('product')
          ->where('menu_type',1)
          ->orderBy('id','DESC');
          if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }
          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

        
          $pages = $pages->paginate($paginationlimit);
          //echo "<pre>"; print_r($pages); die;

       

          $active = "Tiffins";
          $active_menu = "Tiffins";
          
          return view('page/manage_tiffins',compact('pages','active','active_menu'));
      
    }


public function add_menu($value='')
{
  $pages=DB::table('main_menu')
     ->get();
          $active = "Menu";
          $active_menu = "Menu";

          return view('page/add-menu',compact('active','active_menu','pages'));
}

public function save_menu(Request $request)
{
  
    //echo "<pre>"; print_r($_POST); print_r($_FILES); die;
      $category_title  = $_POST['title'];
      $description  = $_POST['description'];
      $short  = $_POST['short'];
      $status  = $_POST['status'];
      $price=$_POST['price'];
      $type=$_POST['type'];
      $day=$_POST['day'];
      $today = date("Y-m-d h:i:sa"); 

      $menu=$_POST['menu'];

      $menu=implode(",",$menu);


      
      if(!empty($_FILES['image']['name'])){
          $image1 = $_FILES['image']['name'];
          $temp_anme1 = $_FILES["image"]["tmp_name"];
          $name1 = rand(10,99999).$image1;
          $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
          $imagePath1 = $uploadfile1. $name1;
          move_uploaded_file($temp_anme1,$imagePath1);
          $hm_image1 = $name1;
      }else{
          $hm_image1 = "";
      }
      $update=DB::table('special_menu')
          ->insert(array(
          'title'     => $category_title,
          'short' => $short,
          'description' => $description,
          'price'           => $price,
          'image'           => $hm_image1,
          'created'   => $today,
          'status'   => $status,
          'ptype'   => $type,
          'day'=>$day,
         

      ));
      $request->session()->flash('success', 'Menu has been added');
      return Redirect::to('/admin/manage-menu');
}

public function menu($value='')
{
  
   $paginationlimit=10;
          $pages = DB::table('special_menu')
           ->orderBy('id','DESC');
          if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }
          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

        
          $pages = $pages->paginate($paginationlimit);
          //echo "<pre>"; print_r($pages); die;

       

          $active = "Menu";
          $active_menu = "Menu";
          
          return view('page/manage_menu',compact('pages','active','active_menu'));
}


    
    public function add_menu_type()
    {

    	 $pages=DB::table('category')
      ->where('status', 1)
      ->where('pid', 0)
      ->get();
	        $active = "MainMenu";
	        $active_menu = "MainMenu";

	        return view('page/add_menu_type',compact('active','active_menu','pages'));
	    
    }

    public function save_menu_type(Request $request)
    {
       //echo "<pre>"; print_r($_POST); print_r($_FILES); die;
      $category_title  = $_POST['title'];
      $description  = $_POST['description'];
      $short  = $_POST['short'];
  
      $type=$_POST['type'];
      $Size=$_POST['Size'];
      $price=$_POST['price'];


      
      if(!empty($_FILES['image']['name'])){
          $image1 = $_FILES['image']['name'];
          $temp_anme1 = $_FILES["image"]["tmp_name"];
          $name1 = rand(10,99999).$image1;
          $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/resturent/public/uploads/';
          $imagePath1 = $uploadfile1. $name1;
          move_uploaded_file($temp_anme1,$imagePath1);
          $hm_image1 = $name1;
      }else{
          $hm_image1 = "";
      }
      $update=DB::table('main_menu')
          ->insertGetId(array(
          'title'     => $category_title,
          'short' => $short,
          'long' => $description,
          'image'           => $hm_image1,
          'type'   => $type

      ));
for ($i=0; $i <count($Size) ; $i++) { 
  $update2=DB::table('product_size')
          ->insert(array(
          'pid'     => $update,
          'size' => $Size[$i],
          'price' => $price[$i]

      ));

}

      $request->session()->flash('success', 'Menu has been added');
      return Redirect::to('/admin/manage-menu-type');
    }

    public function manage_menu_type($value='')
    {
     $paginationlimit=10;
          $pages = DB::table('main_menu')
              ->orderBy('id','DESC');
          if(isset($_GET['limit']) && !empty($_GET['limit'])){
            $paginationlimit = $_GET['limit'];
          }
          if(isset($_GET['username']) && !empty($_GET['username'])){
            $name = $_GET['username'];
            $pages = $pages->where('Institute_Name', 'like', "%$name%");
          }

        
          $pages = $pages->paginate($paginationlimit);
          //echo "<pre>"; print_r($pages); die;

       

          $active = "MainMenu";
          $active_menu = "MainMenu";
          
          return view('page/manage_menu_type',compact('pages','active','active_menu'));
    }


/*USer*/

    public function user($value='')
    {
       $active = "Categories";
      $active_menu = "SoundC";
        $user  = DB::table('users')->get();
      
        return view('page/userlist',compact('user','active','active_menu'));
    }

    public function edit_menu_type($id)
    {
    	
			$pages=DB::table('category')
			->where('id', $id)->get();

      $category=DB::table('category')
      ->where('status', 1)
      ->where('pid', 0)
      ->get();
			// echo "<pr>"; print_r($pages);
			$active = "Categories";
			$active_menu = "SoundC";
			return view('page/edit_category',compact('pages','active','active_menu','category'));
  		
      }
    public function update_menu_type(Request $request)
    {
      //echo "<pre>"; print_r($_POST); die;
      $category_id  = $_POST['id'];
      $category_title  = $_POST['title'];
      $status  = $_POST['status'];
      $today = date("Y-m-d h:i:sa"); 
       $pid    = (@$_POST['cat']) ?: '';
      $update=DB::table('category')
         ->where('id', $category_id)
          ->update(array(
          'category'      => $category_title,
          'status'      => $status,
          'pid'      => $pid
          
      ));
      $request->session()->flash('success', 'Your category has been updated');
      return Redirect::to('/admin/manage-category');
    }
    public function remove_menu_type(Request $request)
    {
      $teams = $_POST['clients'];
      $teams1=DB::table('category')->whereIn('id', $teams)->delete();
  
      //echo "<pre>"; print_r($_POST); die;
      $request->session()->flash('success', 'Your category has been deleted');
      //return Redirect::to('/manage-category');
      return redirect()->back();
    }
    // This function use for manage-category END START --

   

    // This function use for manage-product START --
    public function product()
    {
        
        $paginationlimit=10;
  
     
  			$pages = DB::table('product')
    			->leftJoin('vendors', 'vendors.id', '=', 'product.vid')
          ->select('product.*', 'vendors.name')
    			->orderBy('product.id','DESC');
           $pages = $pages->paginate($paginationlimit);
          if(isset($_GET['limit']) && !empty($_GET['limit'])){
      $paginationlimit = $_GET['limit'];
      }

     //echo '<pre>';print_r($pages);die();
          $active = "product";

          //print_r($pages);

  			$active_menu = "Manageproduct";
  			return view('page/manage_product',compact('pages','active','active_menu'));
		  
    }


    public function add_product()
    {
    	
			
			$active = "Product";
			$active_menu = "ManageProduct";
			return view('page/add_product',compact('active','active_menu'));
		  
    }

    public function get_sucategory(Request $request)
    {
      if(isset($_POST) && !empty($_POST)){
        $id = $_POST['id'];
        $category=DB::table('sub_category')
        ->where('category_id', $id)
        ->where('status', '1')->get();
        $category_list = "";
        if(isset($category) && !empty($category)){
          foreach ($category as $key => $value) {
              $category_list .= "<option value='$value->id'>$value->title</option>";
          }
          return $category_list;
        }else{
            return "<option value=''>Select Sub-category</option>";
        }
      }else{
          return "<option value=''>Select Sub-category</option>";
      }
    }
    public function save_product(Request $request)
    {
      //echo "<pre>"; print_r($_POST); print_r($_FILES); die;
      $category_title  = $_POST['title'];
      $description  = $_POST['description'];
      $status  = $_POST['status'];
      $price=$_POST['price'];
      $today = date("Y-m-d h:i:sa"); 

      
      if(!empty($_FILES['image']['name'])){
          $image1 = $_FILES['image']['name'];
          $temp_anme1 = $_FILES["image"]["tmp_name"];
          $name1 = rand(10,99999).$image1;
          $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/';
          $imagePath1 = $uploadfile1. $name1;
          move_uploaded_file($temp_anme1,$imagePath1);
          $hm_image1 = $name1;
      }else{
          $hm_image1 = "";
      }
      $update=DB::table('product')
          ->insert(array(
          'title'     => $category_title,
          'description' => $description,
          'price'           => $price,
          'image'           => $hm_image1,
          'created'   => $today,
          'status'   => $status,

      ));
      $request->session()->flash('success', 'product has been added');
      return Redirect::to('/admin/manage-product');
    }
    public function edit_product($id)
    {
      
       
        $product=DB::table('product')
          ->where('id', $id)->first();
        $active = "Product";
        $active_menu = "ManageProduct";
      return view('page/edit_product',compact('active','active_menu','product'));
      
    }
    public function update_product(Request $request)
    {
      //echo "<pre>"; print_r($_FILES); die;
      $id  = $_POST['id'];
      $category_title  = $_POST['title'];
      $description  = $_POST['description'];
      $status  = $_POST['status'];
      $price=$_POST['price'];
      $today = date("Y-m-d h:i:sa"); 

      $old_image  = $_POST['old_image'];
      $today = date("Y-m-d h:i:sa"); 
      if(!empty($_FILES['image']['name'])){
          $image1 = $_FILES['image']['name'];
          $temp_anme1 = $_FILES["image"]["tmp_name"];
          $name1 = rand(10,99999).$image1;
          $uploadfile1 = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/';
          $imagePath1 = $uploadfile1. $name1;
          move_uploaded_file($temp_anme1,$imagePath1);
          @unlink($uploadfile1.$old_image);
          $hm_image1 = $name1;
      }else{
          $hm_image1 = $old_image;
      }
      $update=DB::table('product')
          ->where('id', $id)
          ->update(array(
          'title'     => $category_title,
          'description' => $description,
          'price'           => $price,
          'image'           => $hm_image1,
          'status'   => $status,

      ));
      $request->session()->flash('success', 'product has been updated');
      return Redirect::to('/admin/manage-product');
    }
    public function remove_product(Request $request)
    {
      $teams = $_POST['clients'];
      $teams=DB::table('product')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'product has been deleted');
      return redirect()->back();
    }

     public function remove_lead(Request $request)
    {
      $teams = $_POST['clients'];
      $teams=DB::table('leads')->whereIn('id', $teams)->delete();
      $request->session()->flash('success', 'leads has been deleted');
      return redirect()->back();
    }





  
    // This function use for Admin-setting End --
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageFormRequest $request)
    {
        $page = Page::create($request->all());

        alert()->success('Page has been added.');

        return redirect()->route('page.edit', $page->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('page/show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('page/edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageFormRequest $request, Page $page)
    {
        $page->update($request->all());

        alert()->success('Page has been updated.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::destroy($id);

        alert()->success('Page has been deleted.');

        return redirect('/page');
    }
}
