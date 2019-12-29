<?php

namespace App;
//use Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\PageFormRequest;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Page extends Model
{
   // protected $fillable = ['name', 'url', 'title', 'content'];

 //   	public static function like_portfolio($id)
	// {
	//     $pages = DB::table('d6f4f0d1c_liked_portfolios')
 //            ->where('like_portfolio_id', $id)
 //            ->count();
 //            return $pages;
	// }
	// public static function favourite($id)
	// {
	//     $pages = DB::table('d6f4f0d1c_favourite')
 //            ->where('fav_portfolio_id', $id)
 //            ->count();
 //            return $pages;
	// }
 //   public static function image_portfolio($id)
 //   {
 //       $pages = DB::table('d6f4fad3ds20d1c_portfolio_images')
 //            ->where('p_portfolio_id', $id)
 //            ->get();
 //      //echo "<pre>"; print_r($pages); die;
 //      return $pages;
 //   }
 //   public static function checked_portfolio()
 //   {
 //       $pages = DB::table('d6f4f0d1c_homepage_portfolios')
 //            ->where('hpp_type', 'trending')
 //            ->first();
 //      //echo "<pre>"; print_r($pages); die;
 //      return $pages;
 //   }
   public static function reg_details($id=null)
   {
       $pricechart = DB::table('users')
            ->where('ref', $id)
            ->count();
      //echo "<pre>"; print_r($pages); die;
      return $pricechart;
   }

   public static function get_price($id=null)
   {
       $pricechart = DB::table('product_size')
            ->where('pid', $id)
            ->get();
      //echo "<pre>"; print_r($pages); die;
      return $pricechart;
   }
   public static function admin_details()
   {
      $user = Auth::user();
      $user_id = $user->id;
      $pages = DB::table('admin')
            ->where('id', $user_id)
            ->first();
      //echo "<pre>"; print_r($pages); die;
      return $pages;
   }

    public static function get_category($id=null)
   {

       $pages = DB::table('category')
            ->where('pid', $id)
            ->count();
  
      return $pages;
   }

    public static function check_inter($id=null,$uid=null)
   {

       


        $checkintrest = DB::table('intest')
        ->where('uid', $uid)
        ->where('sid', $id)
        ->first();

  
      return $checkintrest;


   }

    public static function shortlist($id=null,$uid=null)
   {

          $checkshortlist = DB::table('shortlist')
        ->where('uid', $uid)
        ->where('sid', $id)
        ->first();
  
      return $checkshortlist;
   }
}
