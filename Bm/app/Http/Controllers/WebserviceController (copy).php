<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageFormRequest;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Components\FlashMessages;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class WebserviceController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //--- Home-page-portfolios-//
    public function index()
    {
     header('Access-Control-Allow-Origin: *');

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
     $trending = DB::table('d6f4f0d1c_homepage_portfolios')
            ->where('hpp_type', 'trending')
            ->first();
     $discover = DB::table('d6f4f0d1c_homepage_portfolios')
            ->where('hpp_type', 'discover')
            ->first();
      $trending = explode(',', $trending->hpp_portfolio);
      foreach ($trending as $key => $value) {
        if($key < 6) {
        $trendingdata = DB::table('d6f4fad3ds20d1c_portfolio')
                ->leftJoin('d6f4fad3ds20d1c_portfolio_images', 'd6f4fad3ds20d1c_portfolio.portfolio_id', '=', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id')
                ->select('d6f4fad3ds20d1c_portfolio.portfolio_id','d6f4fad3ds20d1c_portfolio.portfolio_title', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id', 'd6f4fad3ds20d1c_portfolio_images.p_image_name')
                ->where('p_image_status', "1")
                ->where('portfolio_id', $value)
                ->where('portfolio_complete_status', '1')
                ->first();
          $trending_r['trending'][$key]['portfolio_id'] = $trendingdata->portfolio_id;
          $trending_r['trending'][$key]['portfolio_title'] = $trendingdata->portfolio_title;
          $trending_r['trending'][$key]['p_image_name'] = "http://orioninfosolutions.org/Wedding/public/portfolio/".$trendingdata->p_image_name;
        }
      }
      $discover = explode(',',$discover->hpp_portfolio);
      foreach ($discover as $key1 => $value1) {
        //echo "<pre>"; print_r($value1); 
        if($key1 < 6) {
        $discoverdata = DB::table('d6f4fad3ds20d1c_portfolio')
              ->leftJoin('d6f4fad3ds20d1c_portfolio_images', 'd6f4fad3ds20d1c_portfolio.portfolio_id', '=', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id')
              ->select('d6f4fad3ds20d1c_portfolio.portfolio_id','d6f4fad3ds20d1c_portfolio.portfolio_title', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id', 'd6f4fad3ds20d1c_portfolio_images.p_image_name')
              ->where('p_image_status', "1")
              ->where('portfolio_id', $value1)
              ->where('portfolio_complete_status', '1')
              ->first();
               //echo "<pre>"; print_r($discoverdata);
          $trending_r['discover'][$key1]['portfolio_id'] = $discoverdata->portfolio_id;
          $trending_r['discover'][$key1]['portfolio_title'] = $discoverdata->portfolio_title;
          $trending_r['discover'][$key1]['p_image_name'] = "http://orioninfosolutions.org/Wedding/public/portfolio/".$discoverdata->p_image_name;
        }
      }
      $category = DB::table('d6f4fad3ds20d1c_category')
              ->select('d6f4fad3ds20d1c_category.category_id','d6f4fad3ds20d1c_category.category_title', 'd6f4fad3ds20d1c_category.category_image')
              ->where('category_home_status', "1")
              ->get();
      foreach ($category as $key2 => $categorie) {
          if($key2 < 6) {
              $trending_r['category'][$key2]['category_id'] = $categorie->category_id;
              $trending_r['category'][$key2]['category_title'] = $categorie->category_title;
              $trending_r['category'][$key2]['category_image'] = "http://orioninfosolutions.org/Wedding/public/category/".$categorie->category_image;
            }
        }      
      //echo "<pre>"; print_r($trending_r); die;
      if(isset($trending_r['trending']) && !empty($trending_r['trending'])){
          return response()->json([
            'status' => '201',
            'message' => 'Successfully',
            'data' => $trending_r
          ]);
      }else{
          return response()->json([
              'status' => '201',
              'message' => 'Data not found !'
          ]);
      }
    }
    //---pages-get-//
    public function pages($id)
    {
     
     $pages = DB::table('d6f4fad3ds20d1c_pages')
            ->where('page_title', $id)
            ->first();
      if(isset($pages) && !empty($pages)){
          return response()->json([
            'status' => '201',
            'message' => 'Successfully',
            'data' => $pages
          ]);
      }else{
          return response()->json([
              'status' => '201',
              'message' => 'Data not found !'
          ]);
      }
    }
    //---contact-send mail-//
    public function contact(Request $request)
    {
    	header('Access-Control-Allow-Origin: *');

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
      if(isset($_POST) && !empty($_POST)){
        $name    = $_POST['name'];
        $email   = $_POST['email'];
        $mobile  = $_POST['mobile'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $contact_us_user = DB::table('d6f4fad3ds20d1c_templates')
              ->where('temp_key', 'contact_us_user')
              ->first();
        $contact_us_admin = DB::table('d6f4fad3ds20d1c_templates')
              ->where('temp_key', 'contact_us_admin')
              ->first();
        $admin = DB::table('users')
              ->where('id', '1')
              ->first();
        $site_title =  config('app.name');
        //echo "<pre>"; print_r($contact_us_user);  print_r($contact_us_admin);
        $admin_sub  = $contact_us_admin->temp_subject;
        $temp_text    = $contact_us_admin->temp_text;
        $user_sub     =  $contact_us_user->temp_subject;
        $user_text    = $contact_us_user->temp_text;
        $user_text = str_replace("{user_name}",$name,$user_text);
        $user_text = str_replace("{site_title}",$site_title,$user_text);
        //echo $user_text;
        $to = $email;
        $subject = $user_sub;
        $from = $admin->email;
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
                  'Reply-To: '.$from."\r\n" .
                  'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $user_text, $headers);

        $temp_text = str_replace("{user_name}",$admin->name,$temp_text);
        $temp_text = str_replace("{site_title}",$site_title,$temp_text);
        $temp_text = str_replace("{guest_name}",$name,$temp_text);
        $temp_text = str_replace("{guest_email}",$email,$temp_text);
        $temp_text = str_replace("{guest_phone}",$mobile,$temp_text);
        $temp_text = str_replace("{guest_subject}",$subject,$temp_text);
        $temp_text = str_replace("{guest_message}",$message,$temp_text);
        //echo $temp_text;
        $to1 = $admin->email;
        $subject1 = $admin_sub;
        $from1 = $email;
        // To send HTML mail, the Content-type header must be set
        $headers1  = 'MIME-Version: 1.0' . "\r\n";
        $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers1 .= 'From: '.$from1."\r\n".
          'Reply-To: '.$from1."\r\n" .
          'X-Mailer: PHP/' . phpversion();
        mail($to1, $subject1, $temp_text, $headers1);
        return response()->json([
            'status' => '200',
            'message' => 'Successfully'
        ]);
      }else{
        return response()->json([
            'status' => '201',
            'message' => 'Same error found !'
        ]);
      }
    }
    //---design category -//
    public function category($id)
    {
      header('Access-Control-Allow-Origin: *');

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
      if(isset($id) && !empty($id)){
        $portfolios = DB::table('d6f4fad3ds20d1c_portfolio')
                ->leftJoin('d6f4fad3ds20d1c_portfolio_images', 'd6f4fad3ds20d1c_portfolio.portfolio_id', '=', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id')
                ->select('d6f4fad3ds20d1c_portfolio.portfolio_id','d6f4fad3ds20d1c_portfolio.portfolio_title','d6f4fad3ds20d1c_portfolio.portfolio_description', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id', 'd6f4fad3ds20d1c_portfolio_images.p_image_name')
                ->where('p_image_status', "1")
                ->where('portfolio_complete_status', '1')
                ->where('portfolio_category',$id)
                ->get();
            foreach ($portfolios as $key => $value) {
              $trending_r[$key]['portfolio_id'] = $value->portfolio_id;
              $trending_r[$key]['portfolio_title'] = $value->portfolio_title;
              $trending_r[$key]['portfolio_description'] = $value->portfolio_description;
              $trending_r[$key]['p_image_name'] = "http://orioninfosolutions.org/Wedding/public/portfolio/".$value->p_image_name;
            }
          if(isset($trending_r) && !empty($trending_r)){
            return response()->json([
              'status' => '200',
              'message' => 'Data list!',
              'result'  => $trending_r
            ]);
          }else{
            return response()->json([
              'status' => '201',
              'message' => 'Same error found !'
            ]);
          }
      }else{
            return response()->json([
              'status' => '201',
              'message' => 'Same error found !'
            ]);
      }
    }
    //---design ideas list-//
    public function design_ideas(Request $request)
    {
      header('Access-Control-Allow-Origin: *');

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
      if(isset($_POST) && !empty($_POST)){
        $title = (@$_POST['title'] != "") ? $_POST['title'] : '';
        $category = (@$_POST['category'] != "") ? $_POST['category'] : '';
        $portfolios = DB::table('d6f4fad3ds20d1c_portfolio')
                ->leftJoin('d6f4fad3ds20d1c_portfolio_images', 'd6f4fad3ds20d1c_portfolio.portfolio_id', '=', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id')
                ->select('d6f4fad3ds20d1c_portfolio.portfolio_id','d6f4fad3ds20d1c_portfolio.portfolio_title','d6f4fad3ds20d1c_portfolio.portfolio_description', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id', 'd6f4fad3ds20d1c_portfolio_images.p_image_name')
                ->where('p_image_status', "1")
                ->where('portfolio_complete_status', '1')
                ->where('portfolio_title','LIKE',"%{$title}%")
                ->where('portfolio_category','LIKE',"%{$category}%")
                ->get();
          if(isset($portfolios) && !empty($portfolios)){
            return response()->json([
              'status' => '200',
              'message' => 'Data list!',
              'result'  => $portfolios
            ]);
          }else{
            return response()->json([
              'status' => '201',
              'message' => 'Same error found !'
            ]);
          }
      }else{
          $portfolios = DB::table('d6f4fad3ds20d1c_portfolio')
                ->leftJoin('d6f4fad3ds20d1c_portfolio_images', 'd6f4fad3ds20d1c_portfolio.portfolio_id', '=', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id')
                ->select('d6f4fad3ds20d1c_portfolio.portfolio_id','d6f4fad3ds20d1c_portfolio.portfolio_title','d6f4fad3ds20d1c_portfolio.portfolio_description', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id', 'd6f4fad3ds20d1c_portfolio_images.p_image_name')
                ->where('p_image_status', "1")
                ->where('portfolio_complete_status', '1')
                ->get();
          if(isset($portfolios) && !empty($portfolios)){
            return response()->json([
              'status' => '200',
              'message' => 'Data list!',
              'data'  => $portfolios
            ]);
          }else{
            return response()->json([
              'status' => '201',
              'message' => 'Same error found !'
            ]);
          }
      }
    }
    //---design view-//
    public function design($id){

      $portfolios = DB::table('d6f4fad3ds20d1c_portfolio')
                ->leftJoin('d6f4fad3ds20d1c_portfolio_images', 'd6f4fad3ds20d1c_portfolio.portfolio_id', '=', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id')
                ->leftJoin('fe270ce0e_clients', 'd6f4fad3ds20d1c_portfolio.portfolio_user_id', '=', 'fe270ce0e_clients.dd9cbbf_client_id')
                ->select('d6f4fad3ds20d1c_portfolio.*','d6f4fad3ds20d1c_portfolio_images.p_image_name','fe270ce0e_clients.dd9cbbf_client_first_name', 'fe270ce0e_clients.dd9cbbf_client_last_name', 'fe270ce0e_clients.dd9cbbf_client_picture')
                ->where('portfolio_id', $id)
                ->get();
          if(isset($portfolios) && !empty($portfolios)){
            foreach ($portfolios as $key => $value) {
              if($key == 0){
                $portfolio['portfolio_id'] = $value->portfolio_id;
                $portfolio['portfolio_title'] = $value->portfolio_title;
                //$portfolio[$key]['portfolio_description'] = $value->portfolio_description;
                $portfolio['portfolio_location'] = $value->portfolio_location;
                $portfolio['portfolio_added_date'] = $value->portfolio_added_date;
                $portfolio['client_first_name'] = $value->dd9cbbf_client_first_name;
                $portfolio['client_last_name'] = $value->dd9cbbf_client_last_name;
                $portfolio['client_picture'] = $value->dd9cbbf_client_picture;
              }
              $portfolio['portfolio_image'][$key] = "http://orioninfosolutions.org/Wedding/public/portfolio/".$value->p_image_name;
            }
            //echo "<pre>"; print_r($portfolio); die;
            return response()->json([
              'status' => '200',
              'message' => 'Data list!',
              'data'  => $portfolio
            ]);
          }else{
            return response()->json([
              'status' => '201',
              'message' => 'Same error found !'
            ]);
          }
    }
    //---design latest-//
    public function latest_design(){
        $portfolios = DB::table('d6f4fad3ds20d1c_portfolio')
                ->leftJoin('d6f4fad3ds20d1c_portfolio_images', 'd6f4fad3ds20d1c_portfolio.portfolio_id', '=', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id')
                ->select('d6f4fad3ds20d1c_portfolio.*', 'd6f4fad3ds20d1c_portfolio_images.p_portfolio_id', 'd6f4fad3ds20d1c_portfolio_images.p_image_name')
                ->where('p_image_status', "1")
                ->orderBy('portfolio_id','DESC')
                ->limit(3)
                ->get();
          if(isset($portfolios) && !empty($portfolios)){
            return response()->json([
              'status' => '200',
              'message' => 'Data list!',
              'data'  => $portfolios
            ]);
          }else{
            return response()->json([
              'status' => '201',
              'message' => 'Same error found !'
            ]);
          }
    }
    //---user register-//
    public function register(Request $request)
    {
    	header('Access-Control-Allow-Origin: *');

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
      if(isset($_POST) && !empty($_POST)){
        $type     = $_POST['type'];
        $fname    = $_POST['fname'];
        $lname    = $_POST['lname'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $code   = $_POST['code'];
        $mobile   = $_POST['mobile'];
        $agree    = $_POST['agree'];
        $register = DB::table('fe270ce0e_clients')
              ->where('dd9cbbf_client_email', $email)
              ->first();
        //echo "<pre>"; print_r($register);  die;
        if(empty($register)){
          $register_template = DB::table('d6f4fad3ds20d1c_templates')
                ->where('temp_key', 'register_template')
                ->first();
          $admin = DB::table('users')
                ->where('id', '1')
                ->first();
          $site_title =  config('app.name');
          //echo "<pre>"; print_r($register_template);  die;
          $user_sub     =  $register_template->temp_subject;
          $user_text    = $register_template->temp_text;
          $user_text = str_replace("{user_name}",$fname,$user_text);
          $user_text = str_replace("{site_title}",$site_title,$user_text);
          //echo $user_text; die;
          $to = $email;
          $subject = $user_sub;
          $from = $admin->email;
          // To send HTML mail, the Content-type header must be set
          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
          mail($to, $subject, $user_text, $headers);
          $update=DB::table('fe270ce0e_clients')
            ->insert(array(
            'dd9cbbf_client_type'  => $type,
            'dd9cbbf_client_email' =>  $email,
            'dd9cbbf_client_password' =>  md5($password),
            'dd9cbbf_client_first_name' =>  $fname,
            'dd9cbbf_client_last_name' =>  $lname,
            'dd9cbbf_client_contact_number' =>  $mobile,
            'dd9cbbf_client_agree' =>  $agree,
            'dd9cbbf_client_status' => '1'
          ));
          return response()->json([
              'status' => '200',
              'message' => 'Successfully'
          ]);
        }else{
           return response()->json([
            'status' => '201',
            'message' => 'already exit!'
          ]);
        }
      }else{
        return response()->json([
            'status' => '201',
            'message' => 'Same error found !'
        ]);
      }
    }
    //---user login-//
    public function login(Request $request){
      header('Access-Control-Allow-Origin: *');

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
      if(isset($_POST) && !empty($_POST)){
        $type     = $_POST['type'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);
        $register = DB::table('fe270ce0e_clients')
              ->where('dd9cbbf_client_email', $email)
              ->where('dd9cbbf_client_password', $password)
              ->first();
        //echo "<pre>"; print_r($register);  die;
        if(!empty($register)){
          return response()->json([
              'status' => '1',
              'message' => 'Successfully',
              'data' => $register
          ]);
        }else{
           return response()->json([
            'status' => '0',
            'message' => 'not exit!'
          ]);
        }
      }else{
        return response()->json([
            'status' => '0',
            'message' => 'Same error found !'
        ]);
      }
    }
    //---user account seting-//
    public function account_seting(Request $request)
    {
      if(isset($_POST) && !empty($_POST)){
        $id       = $_POST['id'];
        $fname    = $_POST['fname'];
        $lname    = $_POST['lname'];
        $mobile   = $_POST['mobile'];
        $address  = $_POST['address'];
        $country  = $_POST['country'];
        $register = DB::table('fe270ce0e_clients')
              ->where('dd9cbbf_client_id', $id)
              ->first();
        //echo "<pre>"; print_r($register);  die;
        if(!empty($register)){
          $update=DB::table('fe270ce0e_clients')
            ->where('dd9cbbf_client_id', $id)
            ->update(array(
            'dd9cbbf_client_first_name'     =>  $fname,
            'dd9cbbf_client_last_name'      =>  $lname,
            'dd9cbbf_client_contact_number' =>  $mobile,
            'dd9cbbf_client_address'        =>  $address,
            'dd9cbbf_client_country'        =>  $country
          ));
          return response()->json([
              'status'  => '200',
              'message' => 'Successfully updated',
              'data'    => $_POST
          ]);
        }else{
           return response()->json([
            'status'  => '201',
            'message' => 'Not exit!'
          ]);
        }
      }else{
        return response()->json([
            'status'  => '201',
            'message' => 'Same error found !'
        ]);
      }
    }
    //---user profile-//
    public function profile($id)
    {
      header('Access-Control-Allow-Origin: *');

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
      if(isset($id) && !empty($id)){
        $register = DB::table('fe270ce0e_clients')
              ->where('dd9cbbf_client_id', $id)
              ->first();
        //echo "<pre>"; print_r($register);  die;
        // $register['data']['profile'] = "http://orioninfosolutions.org/Wedding/public/portfolio/".$register->dd9cbbf_client_picture;
        if(!empty($register)){
          return response()->json([
              'status'  => '200',
              'message' => 'Successfully updated',
              'data'    => $register
          ]);
        }else{
           return response()->json([
            'status'  => '201',
            'message' => 'Not exit!'
          ]);
        }
      }else{
        return response()->json([
            'status'  => '201',
            'message' => 'Same error found !'
        ]);
      }
    }
    //---user change password-//
    public function change_password(Request $request)
    {
      if(isset($_POST) && !empty($_POST)){
        $id       = $_POST['id'];
        $oldpass  = $_POST['old_pass'];
        $newpass1  = $_POST['new_pass'];
        $oldpass = md5($oldpass);
        $newpass = md5($newpass1);
        $register = DB::table('fe270ce0e_clients')
              ->where('dd9cbbf_client_id', $id)
              ->where('dd9cbbf_client_password', $oldpass)
              ->first();
        if(!empty($register)){
           $update=DB::table('fe270ce0e_clients')
            ->where('dd9cbbf_client_id', $id)
            ->update(array(
            'dd9cbbf_client_password'     =>  $newpass,
          ));
          return response()->json([
              'status'  => '200',
              'message' => 'Successfully updated',
              'data'    => $newpass1
          ]);
        }else{
           return response()->json([
            'status'  => '201',
            'message' => 'Password not match!'
          ]);
        }
      }else{
        return response()->json([
            'status'  => '201',
            'message' => 'Same error found !'
        ]);
      }
    }
}
