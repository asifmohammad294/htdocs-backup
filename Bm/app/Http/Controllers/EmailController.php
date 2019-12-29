<?php

namespace App\Http\Controllers;

//use App\Http\Requests\PageFormRequest;
use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Components\FlashMessages;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $pages = DB::table('d6f4fad3ds20d1c_templates')->orderBy('temp_id','DESC')->get();
      // echo "<pr>"; print_r($pages);
      $active = "Templates";
      $active_menu = "Contents";
      return view('email/index',compact('pages','active','active_menu'));
    }

    public function edit_page($id)
    {
      $pages=DB::table('d6f4fad3ds20d1c_templates')
            ->where('temp_key', $id)->get();
      // echo "<pr>"; print_r($pages);
      $active = "Templates";
      $active_menu = "Contents";
      return view('email/edit_page',compact('pages','active','active_menu'));
    }
    public function update_page(Request $request)
    {
      $temp_id=$_POST['temp_id'];
      $temp_title=$_POST['temp_title'];
      $temp_subject=$_POST['temp_subject'];
      $temp_text=$_POST['temp_text'];
      $today = date("Y-m-d h:i:sa"); 
     $update=DB::table('d6f4fad3ds20d1c_templates')
            ->where('temp_id', $temp_id)
            ->update(array(
            'temp_title'  => $temp_title,
            'temp_subject'  => $temp_subject,
            'temp_text' =>  $temp_text,
            'temp_updated_on' =>  $today
            
        ));

      $request->session()->flash('success', 'Your Email-templates has been updated');
       return Redirect::to('/email-templates');
    }



  
}
