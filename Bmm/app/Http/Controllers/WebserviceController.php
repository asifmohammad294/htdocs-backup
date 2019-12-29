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



/*Wedding*/


/*Ragister*/

public function UserAppRegister(Request $request)
{
  
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];

  if(isset($_POST) && !empty($_POST))
  {
     
      $email         =(@$_POST['email']) ?: '';
      $password      =(@$_POST['password']) ?: '';
      $firstname     =(@$_POST['firstname'])?: '';
      $lastname      =(@$_POST['lastname']) ?: '';

      $gender        =(@$_POST['gender']) ?: '';
      $dob           =(@$_POST['dob']) ?: '';
      $mobile        =(@$_POST['mobile'])?: '';
      $state         =(@$_POST['state']) ?: '';
      $religion      =(@$_POST['religion']) ?: '';
      $mother_tongue =(@$_POST['mother_tongue']) ?: '';

      $emailchk = DB::table('users')
                      ->select('email')
                      ->where('email',$email)
                      ->first();

      if (!empty($emailchk)) 
      {
         return response()->json([
          'status' => '0',
          'message' => 'email already exites'
         ]); 
      }else{

              $insert =DB::table('users')
               ->insertGetId(array
                (
                   'email'         => $email,
                   'password'      => $password,
                   'fname'         => $firstname,
                   'lname'         => $lastname,
                   'gender'        => $gender,
                   'dob'           => $dob,
                   'phone'         => $mobile,
                   'state'         => $state,
                   'religion'      => $religion,
                   'MotherTongue'  => $mother_tongue

                ));


  $insert_patner =DB::table('partner_preferences')
               ->insert(array
                (
                   'agefrom'         => '',
                   'ageto'      => '',
                   'marital_status'  => '',
                   'caste'         => '',
                   'hightfrom'        => '',
                   'hightto'           => '',
                   'Religion'         => '',
                   'Mother_Tongue'         => '',
                   'Country_of_Residence'      => '',
                   'State_of_Residence'  => '',
                   'uid'=>$insert

                ));


              return response()->json([
              'status' => '1',
              'message' => ' Registrar Successfully'
              ]);

          }
      }
}


/*login*/

public function UserApplogin(Request $request)
{

     header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];

    if (isset($_POST) && !empty($_POST)) {
      
         $email    = (@$_POST['email'])?: '';
         $password = (@$_POST['password'])?: '';

         $login =DB::table('users')
                      ->where('email',$email)
                      ->where('password',$password)
                      ->first();

                      //print_r($login->id);die();

          if (!empty($login)) {

if ($login->status==1) {
  # code...

            $userdta=array(
              'email'=>$login->email,
              'password'=>$login->password,
              'fname'=>$login->fname,
              'lname'=>$login->lname,
              'gender'=>$login->gender,
              'dob'=>$login->dob,
              'phone'=>$login->phone,
              'state'=>$login->state,
              'religion'=>$login->religion,
              'MotherTongue'=>$login->MotherTongue,
              'login_status'=>$login->login_status
            );
              $dob=$login->dob;
              $diff = (date('Y') - date('Y',strtotime($dob)));


  $userpre = DB::table('partner_preferences')
          ->where('uid', $login->id)
          ->first();

        $user_doc = DB::table('documents')
          ->where('uid', $login->id)
          ->first(); 

           $user_photos = DB::table('user_photos')
          ->where('uid', $login->id)
          ->first();

    $maxvalue  = 100;
    $point = 0;

     if($login->email)
        {
                $point1  = $point+10;
        }
        else
        {
          $point1  = $point+0;
        }
         
         if ($login->phone) {

           $point2  = $point+10;
        }
         else
        {
          $point2  = $point+0;
        }

         if ($user_doc) {
      
         $point3  = $point+30;
         
        }
          else
        {
          $point3  = $point+0;
        }

         if ($user_photos) {
      
          $point4  = $point+10;
         
        }
          else
        {
          $point4  = $point+0;
        }

          if ($login->facebook) {

           $point5  = $point+10;
        }
          else
        {
          $point5  = $point+0;
        }
          if ($login->google) {

           $point6  = $point+10;
        }
          else
        {
          $point6  = $point+0;
        }

           if ($userpre) {
      
          $point7  = $point+20;
         
        }
          else
        {
          $point7  = $point+0;
        }

        
      $pint  = $point1+$point2+$point3+$point4+$point5+$point6+$point7;
      $percentage = ($pint*100)/100;



               
        $maxvalue1  = 100;
        $points = 0;


if($login->email && $login->phone)
        {
                $points1  = $points+20;
        }
        else
        {
          $points1  = $points+0;
        }
         
         if ($user_doc) {

           $points2  = $points+30;
        }
         else
        {
          $points2  = $points+0;
        }

         if ($user_photos) {
      
         $points3  = $points+20;
         
        }
          else
        {
          $points3  = $points+0;
        }

      

if($login->Educational && $login->College && $login->Working && $login->Working_As && $login->Income)
{
           $points4  = $points+30;
        }
          else
        {
          $points4  = $points+0;
        }
          

         

        
      $pints  = $points1+$points2+$points3+$points4;
      $percentages = ($pints*100)/100;

            $update1=DB::table('users')
            ->where('id',$login->id)
            ->update(array(
              'user_account' =>  0,
               'login_status' =>  1,
              'trust_score' =>  $percentage,
              'profile_com' =>  $percentages,
              'age' =>  $diff,

          
      ));


              return response()->json([
              'status' => '1',
              'message' => 'login Successfully',
              'UserId' => $login->id,
              'userdata'=>$userdta
              
              ]);
          }
          else{
            
            return response()->json([
              'status' => '0',
              'message' => 'Your profile is block by admin!for help go to our help center!',
              
              ]);
          }
          
        }
          else{
            return response()->json([
              'status' => '0',
              'message' => 'login detail are wrong',
              
              ]);
          }
    }

}


/*update basic detail*/

public function UpdateBesicDetails(Request $request){

  //echo "string";die();
    header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
    'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];

    $About=(@$_POST['About'])?: '';
    $Hieght=(@$_POST['Hieght'])?: '';
    $Marital_Status=(@$_POST['Marital_Status'])?: '';
    $Religion=(@$_POST['Religion'])?: '';
    $Caste=(@$_POST['Caste'])?: '';
    $Sub_Caste=(@$_POST['Sub_Caste'])?: '';
    $Mother_Tongue=(@$_POST['Mother_Tongue'])?: '';
    $Complexion=(@$_POST['Complexion'])?: '';
    $Manglik=(@$_POST['Manglik'])?: '';
    $Gotra=(@$_POST['Gotra'])?: '';
    $DOB=(@$_POST['DOB'])?: '';

    $Time_of_Birth=(@$_POST['Time_of_Birth'])?: '';
    $Place_of_Birth=(@$_POST['Place_of_Birth'])?: '';
    $aboutfamily=(@$_POST['aboutfamily'])?: '';
    $Father_occupation=(@$_POST['Father_occupation'])?: '';
    $Mother_occupation=(@$_POST['Mother_occupation'])?: '';
    $Married_Sister=(@$_POST['Married_Sister'])?: '';
    $Unmarried_Sister=(@$_POST['Unmarried_Sister'])?: '';
    $Married_brother=(@$_POST['Married_brother'])?: '';
    $unMarried_brother=(@$_POST['unMarried_brother'])?: '';
    $native_country=(@$_POST['native_country'])?: '';
    $State=(@$_POST['State'])?: '';

    $Family_Value=(@$_POST['Family_Value'])?: '';
    $Affluence_level=(@$_POST['Affluence_level'])?: '';
    $Educatonal_Qualification=(@$_POST['Educatonal_Qualification'])?: '';
    $Employed_As=(@$_POST['Employed_As'])?: '';
    $Area=(@$_POST['Area'])?: '';
    $Employed_with=(@$_POST['Employed_with'])?: '';
    $Annual_income=(@$_POST['Annual_income'])?: '';
    $Adress1=(@$_POST['Adress1'])?: '';
    $Adress2=(@$_POST['Adress2'])?: '';
    $Country=(@$_POST['Country'])?: '';
    $State=(@$_POST['State'])?: '';
    $City=(@$_POST['City'])?: '';

    $ZipCode=(@$_POST['ZipCode'])?: '';
    $Professional_goals=(@$_POST['Professional_goals'])?: '';
    $Personal_goals=(@$_POST['Personal_goals'])?: '';
    $Special_Cases=(@$_POST['Special_Cases'])?: '';
    $smoker=(@$_POST['smoker'])?: '';
    $alcohol=(@$_POST['alcohol'])?: '';
    $criminal=(@$_POST['criminal'])?: '';
    $vegiterian=(@$_POST['vegiterian'])? : '';
    $P_desired_partner=(@$_POST['P_desired_partner']) ?: '';
    $P_Hight_from=(@$_POST['P_Hight_from']) ?: '';
    $P_Hight_to=(@$_POST['P_Hight_to']) ?: '';
    $P_Age_From=(@$_POST['P_Age_From']) ?: '';
    $P_Age_To=(@$_POST['P_Age_To']) ?: '';

    $P_Material_Status=(@$_POST['P_Material_Status']) ?: '';
    $P_Complexion=(@$_POST['P_Complexion']) ?: '';
    $P_Health=(@$_POST['P_Health']) ?: '';
    $P_Country_Residence=(@$_POST['P_Country_Residence']) ?: '';
    $P_State_Residence=(@$_POST['P_State_Residence']) ?: '';
    $P_Residence_Status=(@$_POST['P_Residence_Status']) ?: '';
    $P_Country_itizenship=(@$_POST['P_Country_itizenship']) ?: '';
    $P_Educatonal_Qualification=(@$_POST['P_Educatonal_Qualification']) ?: '';
    $P_Area=(@$_POST['P_Area']) ?: '';
    $P_Employed_With=(@$_POST['P_Employed_With']) ?: '';
    $P_Employed_As=(@$_POST['P_Employed_As']) ?: '';
    $P_Annual_income=(@$_POST['P_Annual_income']) ?: '';
    $P_Religion=(@$_POST['P_Religion']) ?: '';
    $P_Caste=(@$_POST['P_Caste']) ?: '';

    $P_Mother_Tongue=(@$_POST['P_Mother_Tongue']) ?: '';
    $P_Sub_Caste=(@$_POST['P_Sub_Caste']) ?: '';
    $P_Cast_Bar=(@$_POST['P_Cast_Bar']) ?: '';
    $P_Gotra_Bar=(@$_POST['P_Gotra_Bar']) ?: '';
    $P_Diet=(@$_POST['P_Diet']) ?: '';
    $P_Smoke=(@$_POST['P_Smoke']) ?: '';
    $P_Drink=(@$_POST['P_Drink']) ?: '';
    $P_Hobbies=(@$_POST['P_Hobbies']) ?: '';
    $userid = (@$_POST['userid']) ?: '';


    $chkid =DB::table('users')
                ->where('id',$userid)
                ->first();

/*    print_r($chkid);die();*/

                $updatedata =DB::table('users')
                             ->where('id',$userid)
                             ->update(array(
                               'about'=>$About,
                               'Height'=>$Hieght,
                               'Marital_Status'=>$Marital_Status,
                               'religion'=>$Religion,
                               'Caste'=>$Caste,
                               'subcaste'=>$Sub_Caste,
                               'MotherTongue'=>$Mother_Tongue,
                               'complexion'=>$Complexion,
                               'Manglik'=>$Manglik,
                               'Gotra'=>$Gotra,
                               'dob'=>$DOB,
                               'Time_of_Birth'=>$Time_of_Birth,
                               'Place_of_Birth'=>$Place_of_Birth,
                               'About_Family'=>$aboutfamily,
                               'Father_Occupation'=>$Father_occupation,
                               'Mother_Occupation'=>$Mother_occupation,
                               'married_sister'=>$Married_Sister,
                               'unmarried_sister'=>$Unmarried_Sister,
                               'married_brother'=>$Married_brother,
                               'unmarried_brother'=>$unMarried_brother,
                               'Native_Country'=>$native_country,
                               'Native_State'=>$State,
                               'Family_Value'=>$Family_Value,
                                'afflence_level'=>$Affluence_level,
                               'Educational'=>$Educatonal_Qualification,
                               'Working'=>$Employed_As,
                               'area'=>$Area,
                               'Working_As'=>$Employed_with,
                               'annual_income'=>$Annual_income,
                               'address1'=>$Adress1,
                               'address2'=>$Adress2,
                               'country'=>$Country,
                               'state'=>$State,
                               'city'=>$City,
                               'pin'=>$ZipCode,
                               'professional_goals'=>$Professional_goals,
                               'personal_goals'=>$Personal_goals,
                               'criminal_records'=>$criminal,
                               'Special_Cases'=>$Special_Cases,
                               'smoker'=>$smoker,
                               'alcohol'=>$alcohol,
                               'Diet'=>$vegiterian

                             ));


                               $insert_patner =DB::table('partner_preferences')
                       ->where('uid',$userid)
                        ->update(array
                        (
                           'agefrom'         => $P_Age_From,
                           'ageto'      => $P_Age_To,
                           'marital_status'  => $P_Material_Status,
                           'caste'         => $P_Caste,
                           'hightfrom'        => $P_Hight_from,
                           'hightto'           => $P_Hight_to,
                           'Religion'         => $P_Religion,
                           'Mother_Tongue'         => $P_Mother_Tongue,
                           'Country_of_Residence'      => $P_Country_Residence,
                           'State_of_Residence'  => $P_State_Residence,
                            'complexion'         => $P_Complexion,
                           'health'      => $P_Health,
                           'drink'  => $P_Drink,
                           'hobbies'         => $P_Hobbies,
                           'residency_status'        => $P_Residence_Status,
                           'county_of_citizenship'           => $P_Country_itizenship,
                           'education_qualifiction'         => $P_Educatonal_Qualification,
                           'area'         => $P_Area,
                           'employed_with'      => $P_Employed_With,
                           'employed_as'  => $P_Employed_As,
                           'annual_income'  => $P_Annual_income,
                           'sub_cast'  => $P_Sub_Caste,
                           'cast_no_bar'  => $P_Cast_Bar,
                           'gotra'  => $P_Gotra_Bar,
                           'diet'  => $P_Diet,
                           'smoke'  => $P_Smoke,
                           'P_About'=>$P_desired_partner
                        ));



         return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);

                      

             

}


//---user profile- type post//
public function Myprofile(request $request){
  //echo "string";die()
  header('Access-Control-Allow-Origin: *');
    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];

     $userid     = (@$_POST['userid']) ?: '';
    $myid     = (@$_POST['myid']) ?: '';


   $userprofile=DB::table('users')
       ->where('id',$myid)
     ->first();

     $package=DB::table('package')
       ->where('id',$userprofile->package)
     ->first();

     if (!$package) {
         return response()->json([
                    'status' => '0',
                    'message' => 'Please upgrade your package!',
                    
                ]);
     }
     else
     {
      $tortalinterts=$package->Profile;
      /*  $shortlist=DB::table('shortlist')
          ->where('uid',$userid)
          ->count();*/

            $intest=DB::table('view_profile')
          ->where('uid',$myid)
          ->count();

          if($tortalinterts >=$intest)
          {
            $view_status=1;
          }
          else
          {
            $view_status=0;
          }
        }

  if(isset($userid)){

    $user = DB::table('users')
          ->where('id', $userid)
          ->get();

          foreach ($user as $key => $value) {

       /*  $dob=$value->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/
     
        $userpre = DB::table('partner_preferences')
          ->where('uid', $userid)
          ->first();

        $user_doc = DB::table('documents')
          ->where('uid', $userid)
          ->first(); 

           $user_photos = DB::table('user_photos')
          ->where('uid', $userid)
          ->first();

    


            $response['Profile']['id']=$value->id;
            $response['Profile']['fname']=$value->fname;
            $response['Profile']['lname']=$value->lname;
            $response['Profile']['email']=$value->email;
            $response['Profile']['phone']=$value->phone;
            $response['Profile']['gender']=$value->gender;
            $response['Profile']['dob']=$value->dob;
            $response['Profile']['country']=$value->country;
            $response['Profile']['city']=$value->city;
            $response['Profile']['state']=$value->state;
            $response['Profile']['religion']=$value->religion;
            $response['Profile']['MotherTongue']=$value->MotherTongue;
            $response['Profile']['complexion']=$value->complexion;
            $response['Profile']['about']=$value->about;
            $response['Profile']['Height']=$value->Height;
            $response['Profile']['Marital_Status']=$value->Marital_Status;
          /*  $response['Profile']['profile_photo']=$value->image;*/
            $response['Profile']['age']=$value->age;
             $response['Profile']['trust_score']=$value->trust_score;

               $userphotos = DB::table('user_photos')
          ->where('uid', $userid)
          ->where('status', 1)
          ->get();

if($myid==$value->id)
{
                  $response['Profile']['profile_photo']=$value->image;

}
else
{


              if($value->photo_status==1)
            {
              if ($value->verfy_photo==0) {
                
                $response['Profile']['profile_photo']=$value->image;

            }
            else
            {
                $response['Profile']['profile_photo']='';

            }
 
            
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$myid)
            ->where('status',1)
            ->Where('sid',$value->id)
            ->first();
            if ($intestchexk) {

            if ($value->verfy_photo==0) {
                
                $response['Profile']['profile_photo']=$value->image;

            }
            else
            {
                $response['Profile']['profile_photo']='';

            }

            }
            else
            {


               $intestchexk1= DB::table('intest')
            ->where('sid',$myid)
            ->where('status',1)
            ->Where('uid',$value->id)
            ->first();

            if($intestchexk1)
            {
               if ($value->verfy_photo==0) {
                
                $response['Profile']['profile_photo']=$value->image;

            }
            else
            {
                $response['Profile']['profile_photo']='';

            }

            }
            else
            {
                if($userprofile->gender=='Male')
                {
                   $response['Profile']['profile_photo']='img.jpg';

                }
                else
                {
                    $response['Profile']['profile_photo']='img_1.jpg';

                }
            }
          }
}
            }
                  define('UPLOAD_DIR', 'http://oakbells.com/Bharatiy_Matrimony/public/photos/');


  foreach ($userphotos as $key => $valuephotos) {
              
              $response['Profile']['photos'][$key]['id']=$valuephotos->id;

              $response['Profile']['photos'][$key]['image']=UPLOAD_DIR.$valuephotos->image;

          }

            $response['Basicinfo']['Height']=$value->Height;
            $response['Basicinfo']['Marital_Status']=$value->Marital_Status;
            $response['Basicinfo']['Having_Kids']=$value->having_kids;
            $response['Basicinfo']['Living_Me']=$value->living_with_me;
            $response['Basicinfo']['religion']=$value->religion;
            $response['Basicinfo']['Caste']=$value->Caste;
            $response['Basicinfo']['subcaste']=$value->subcaste;
            $response['Basicinfo']['MotherTongue']=$value->MotherTongue;
            $response['Basicinfo']['Manglik']=$value->Manglik;
            $response['Basicinfo']['gotra']=$value->Gotra;
             $response['Basicinfo']['dob']=$value->dob;
            $response['Basicinfo']['Place_of_Birth']=$value->Place_of_Birth;
            $response['Basicinfo']['Time_of_Birth']=$value->Time_of_Birth;
            $response['Basicinfo']['about']=$value->about;

               /*$response['Basicinfo']['Having_Kids']=$value->having_kids;
            $response['Basicinfo']['Living_WithMe']=$value->living_with_me;*/

             $response['EduInfo']['Educational']=$value->Educational;
            $response['EduInfo']['Working']=$value->Working;
             $response['EduInfo']['Working_As']=$value->Working_As;
            $response['EduInfo']['area']=$value->area;
            $response['EduInfo']['Income']=$value->annual_income;

               $response['address']['address1']=$value->address1;
            $response['address']['address2']=$value->address2;
             $response['address']['country']=$value->country;
            $response['address']['city']=$value->city;
            $response['address']['state']=$value->state;
              $response['address']['zip_code']=$value->pin;

               $response['future_plan']['personal_goals']=$value->personal_goals;
            $response['future_plan']['professional_goals']=$value->professional_goals;

               $response['fair_disclosure']['criminal_records']=$value->criminal_records;
            $response['fair_disclosure']['Special_Cases']=$value->Special_Cases;
             $response['fair_disclosure']['smoker']=$value->smoker;
            $response['fair_disclosure']['alcohol']=$value->alcohol;
            $response['fair_disclosure']['Diet']=$value->Diet;


            $response['Family']['Father_Occupation']=$value->Father_Occupation;
            $response['Family']['Mother_Occupation']=$value->Mother_Occupation;
            $response['Family']['married_brother']=$value->married_brother;
            $response['Family']['unmarried_brother']=$value->unmarried_brother;
            $response['Family']['married_sister']=$value->married_sister;
             $response['Family']['unmarried_sister']=$value->married_sister;
            $response['Family']['Native_Country']=$value->Native_Country;
            $response['Family']['Native_State']=$value->Native_State;
            $response['Family']['Family_Value']=$value->Family_Value;
            $response['Family']['afflence_level']=$value->afflence_level;
            $response['Family']['About_Family']=$value->About_Family;



            $response['Preferance_Basic']['agefrom']=$userpre->agefrom.' To '.$userpre->ageto;
            $response['Preferance_Basic']['hight']=$userpre->hightfrom.' To '.$userpre->hightto;
            $response['Preferance_Basic']['marital_status']=$userpre->marital_status;
            $response['Preferance_Basic']['complexion']=$userpre->complexion;
            $response['Preferance_Basic']['health']=$userpre->health;
            $response['Preferance_Basic']['Manglik']=$userpre->P_Manglik;
            $response['Preferance_Basic']['special_cases']=$userpre->P_SpecialCases;
            $response['Preferance_Basic']['about']=$userpre->P_About;


            

            $response['Preferance_edu']['education_qualifiction']=$userpre->education_qualifiction;
            $response['Preferance_edu']['employed_with']=$userpre->employed_with;
            $response['Preferance_edu']['employed_as']=$userpre->employed_as;
            $response['Preferance_edu']['area']=$userpre->area;
            $response['Preferance_edu']['annual_income']=$userpre->annual_income;


              $response['Preferance_social']['Religion']=$userpre->Religion;
            $response['Preferance_social']['Mother_Tongue']=$userpre->Mother_Tongue;
            $response['Preferance_social']['caste']=$userpre->caste;
            $response['Preferance_social']['sub_cast']=$userpre->sub_cast;
            $response['Preferance_social']['cast_no_bar']=$userpre->cast_no_bar;
            $response['Preferance_social']['gotra']=$userpre->gotra;

            $response['Preferance_country_of_residence']['Country_of_Residence']=$userpre->Country_of_Residence;
            $response['Preferance_country_of_residence']['State_of_Residence']=$userpre->State_of_Residence;
            $response['Preferance_country_of_residence']['residency_status']=$userpre->residency_status;
            $response['Preferance_country_of_residence']['county_of_citizenship']=$userpre->county_of_citizenship;

            $response['Preferance_life_style']['diet']=$userpre->diet;
            $response['Preferance_life_style']['smoke']=$userpre->smoke;
            $response['Preferance_life_style']['drink']=$userpre->drink;
            $response['Preferance_life_style']['hobbies']=$userpre->hobbies;



          
           
          
            



           


          }

             $user['Shortlist'] = DB::table('shortlist')
              ->leftJoin('users', 'users.id', '=', 'shortlist.sid')
              ->select('users.id','users.fname','users.lname')
              ->where('shortlist.uid', $userid)
              ->get();

    //echo "<pre>"; print_r($user['like']); die;
    if(!empty($response)){  
      return response()->json([
          'status' => '1',
          'message' => 'Success',
          'data' => $response,
          'view_status'=>(string)$view_status
      ]);
    }else{
       return response()->json([
        'status' => '0',
        'message' => 'user not exist!'
      ]);
    }
  }else{
    return response()->json([
        'status' => '0',
        'message' => 'Some error found !'
    ]);
  }
}



//---user update-profile -type POST//
public function Listings()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();
           $ids=array();

          $userid = (@$_POST['userid']) ?: '';
           $currentuserss=DB::table('users')
            ->where('id',$userid)
            ->first();

 $partner_preferences = DB::table('partner_preferences')
          ->where('uid', $userid)
          ->first();
        
        $agrfrom=0;
        $ageto=0;
        if ($partner_preferences) {
          # code...
          $agrfrom=$partner_preferences->agefrom;
        $ageto=$partner_preferences->ageto;
        }
        


 $date1= date("Y-m-d",strtotime("-$agrfrom year"));

 $date2= date("Y-m-d",strtotime("-$ageto year"));

         

          $ids=array();
          $blockprofile= DB::table('block_list')
          ->where('uid',$userid)
          ->get();
          foreach ($blockprofile as $key => $value) {
           
           $ids[]=$value->block_id;

          }

            if ($currentuserss->gender=='Male') {
              
              $gender='Female';
            }
            else{
               $gender='Male';
            }



          $usersdatas= DB::table('users')
          ->where('id','!=',$userid)
           ->where('user_account',0)
           ->where('gender',$gender)
          ->whereNotIn('id', $ids)
          ->whereBetween('dob', [$date2, $date1])
          ->where('profile_setting',1)
          ->count();


          

          $dstatus=0;
          $document=DB::table('documents')
            ->where('uid',$userid)
            ->first();

            

      
           //print_r($document);

          if ($document && $currentuserss->verfiy==0) {

            $dstatus=0;
          }
          else if($document && $currentuserss->verfiy==1)
          {
             $dstatus=1;
          }
          else
          {
             $dstatus=2;
          }

          $ids=array();
          $blockprofile= DB::table('block_list')
          ->where('uid',$userid)
          ->get();
          foreach ($blockprofile as $key => $value) {
           
           $ids[]=$value->block_id;

          }



          $users= DB::table('users')
          ->where('id','!=',$userid)
           ->where('user_account',0)
            ->where('profile_setting',1)
            ->where('gender',$gender)
          ->whereNotIn('id', $ids)
          ->limit(15)
          ->get();

            $recent_join= DB::table('users')
          ->where('id','!=',$userid)
           ->where('user_account',0)
            ->where('profile_setting',1)
            ->where('gender',$gender)
           ->whereNotIn('id', $ids)
          ->orderBy('id','DESC')
          ->limit(15)
          ->get();

        $user = DB::table('users')
          ->where('id', $userid)
           ->where('user_account',0)
          ->get();

          foreach ($user as $key => $value) {

        /* $dob=$value->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/
      
      $shortlist=DB::table('shortlist')
          ->where('uid',$userid)
          
          ->count();

            $intest=DB::table('intest')
          ->where('sid',$userid)
           ->where('status',0)
          ->count();

           $connection=DB::table('intest')
          ->where('sid',$userid)
          ->orWhere('uid',$userid)
          ->where('status',1)
          ->count();

           $view=DB::table('view_profile')
          ->where('uid',$userid)
          ->count();


           $package=DB::table('package')
          ->where('id',$value->package)
          ->first();

          


            $response['Profile']['id']=$value->id;
            $response['Profile']['fname']=$value->fname;
            $response['Profile']['lname']=$value->lname;
            $response['Profile']['email']=$value->email;
            $response['Profile']['phone']=$value->phone;
            $response['Profile']['gender']=$value->gender;
            $response['Profile']['dob']=$value->dob;
            $response['Profile']['country']=$value->country;
            $response['Profile']['city']=$value->city;
            $response['Profile']['state']=$value->state;
            $response['Profile']['religion']=$value->religion;
            $response['Profile']['MotherTongue']=$value->MotherTongue;
            $response['Profile']['complexion']=$value->complexion;
            $response['Profile']['about']=$value->about;
            $response['Profile']['Height']=$value->Height;
            $response['Profile']['Marital_Status']=$value->Marital_Status;
            if ($value->verfy_photo==0) {
                
                $response['Profile']['profile_photo']=$value->image;

            }
            else
            {
                           $response['Profile']['profile_photo']='';

            }

            $response['Profile']['age']=$value->age;
            $response['Profile']['profile_completiton']=(string)$value->profile_com;
            $response['Profile']['trust_score']=(string)$value->trust_score;

            $response['Profile']['ShortList']=(string)$shortlist;
            $response['Profile']['interst']=(string)$intest;
            $response['Profile']['connection']=(string)$connection;
            $response['Profile']['view']=(string)$view;
            $response['Profile']['al_macth']=(string)$usersdatas;
            $response['Profile']['Userpackage']=$package->title;

                     


              


          }


       /* echo "<pre>";
        print_r($users);die();*/
          foreach ($users as $key => $value) {

      /*  $dob=$value->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/
     

        $response['New_matches'][$key]['id']=$value->id;
        $response['New_matches'][$key]['fname']=$value->fname;
        $response['New_matches'][$key]['lname']=$value->lname;
        $response['New_matches'][$key]['email']=$value->email;
        $response['New_matches'][$key]['phone']=$value->phone;
        $response['New_matches'][$key]['gender']=$value->gender;
        $response['New_matches'][$key]['dob']=$value->dob;
        $response['New_matches'][$key]['country']=$value->country;
        $response['New_matches'][$key]['city']=$value->city;
        $response['New_matches'][$key]['state']=$value->state;
        $response['New_matches'][$key]['religion']=$value->religion;
        $response['New_matches'][$key]['MotherTongue']=$value->MotherTongue;
        $response['New_matches'][$key]['complexion']=$value->complexion;
        $response['New_matches'][$key]['about']=$value->about;
        $response['New_matches'][$key]['Height']=$value->Height;
        $response['New_matches'][$key]['Marital_Status']=$value->Marital_Status;
       
        $response['New_matches'][$key]['age']=$value->age;

        $response['New_matches'][$key]['Educational']=$value->Educational;
        $response['New_matches'][$key]['trust_score']=$value->trust_score;
        $response['New_matches'][$key]['photo_status']=$value->photo_status;
        $response['New_matches'][$key]['Working_As']=$value->Working_As;
         
         $currentdata= DB::table('users')
            ->where('id',$value->id)
            ->first();


            if($currentdata->photo_status==1)
            {
              //print_r($currentdata);

                //  $response['New_matches'][$key]['rrtr']=$value->verfy_photo;
                if ($value->verfy_photo==0) {
            
                     // $response['New_matches'][$key]['rrtr']=$currentdata->verfy_photo;

                $response['New_matches'][$key]['profile_photo']=$value->image;

            }
            else
            {
                $response['New_matches'][$key]['profile_photo']='img1.png';

            }
             
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$value->id)
            ->first();
            if ($intestchexk) {

   if ($currentdata->verfy_photo==1) {
                
                $response['New_matches'][$key]['profile_photo']=$value->image;

            }
            else
            {
                           $response['New_matches'][$key]['profile_photo']='';

            }
            }
            else
            {
                if($currentuserss->gender=='Male')
                {
                                  $response['New_matches'][$key]['profile_photo']='img.jpg';

                }
                else
                {
                    $response['New_matches'][$key]['profile_photo']='img_1.jpg';

                }
                

            }

            }
          

          }

          foreach ($recent_join as $key => $value) {
    /* $dob=$value->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/
     
          $response['recent_join'][$key]['id']=$value->id;
          $response['recent_join'][$key]['fname']=$value->fname;
          $response['recent_join'][$key]['lname']=$value->lname;
           $response['recent_join'][$key]['email']=$value->email;
          $response['recent_join'][$key]['phone']=$value->phone;
          $response['recent_join'][$key]['gender']=$value->gender;
           $response['recent_join'][$key]['dob']=$value->dob;
          $response['recent_join'][$key]['country']=$value->country;
          $response['recent_join'][$key]['city']=$value->city;
          $response['recent_join'][$key]['state']=$value->state;
          $response['recent_join'][$key]['religion']=$value->religion;
          $response['recent_join'][$key]['MotherTongue']=$value->MotherTongue;
           $response['recent_join'][$key]['complexion']=$value->complexion;
          $response['recent_join'][$key]['about']=$value->about;
          $response['recent_join'][$key]['Height']=$value->Height;
           $response['recent_join'][$key]['Marital_Status']=$value->Marital_Status;
           $response['recent_join'][$key]['profile_photo']=$value->image;
            $response['recent_join'][$key]['age']=$value->age;

             $response['recent_join'][$key]['Educational']=$value->Educational;
        $response['recent_join'][$key]['trust_score']=$value->trust_score;
        $response['recent_join'][$key]['photo_status']=$value->photo_status;
                $response['recent_join'][$key]['Working_As']=$value->Working_As;

          $currentdata= DB::table('users')
            ->where('id',$value->id)
            ->first();


            if($currentdata->photo_status==1)
            {
             
     if ($currentdata->verfy_photo==0) {
                
                $response['recent_join'][$key]['profile_photo']=$value->image;

            }
            else
            {
                           $response['recent_join'][$key]['profile_photo']='';

            }

            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$value->id)
            ->first();
            if ($intestchexk) {
  $response['recent_join'][$key]['profile_photo']=$value->image;

            }
            else
            {
if ($currentdata->verfy_photo==1) {
                
                $response['recent_join'][$key]['profile_photo']=$value->image;

            }
            else
            {
                  if($currentuserss->gender=='Male')
                {
                                  $response['recent_join'][$key]['profile_photo']='img.jpg';

                }
                else
                {
                    $response['recent_join'][$key]['profile_photo']='img_1.jpg';

                }

            }
            }

            }
        
          

          }
         
          if(!empty($users['0']))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'dstatus'=>(string)$dstatus,
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}



//---user update-profile -type POST//
public function DiscoverMatchs()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();
           $ids=array();

    $userid = (@$_POST['userid']) ?: '';

$id = $userid;

        $profile = DB::table('users')
        ->where('id', $id)
        ->first();

         $partner_preferences = DB::table('partner_preferences')
          ->where('uid', $id)
          ->first();
        
        $agrfrom=0;
        $ageto=0;
        if ($partner_preferences) {
          # code...
          $agrfrom=$partner_preferences->agefrom;
        $ageto=$partner_preferences->ageto;
        }
        


 $date1= date("Y-m-d",strtotime("-$agrfrom year"));

 $date2= date("Y-m-d",strtotime("-$ageto year"));

         

          $ids=array();
          $blockprofile= DB::table('block_list')
          ->where('uid',$userid)
          ->get();
          foreach ($blockprofile as $key => $value) {
           
           $ids[]=$value->block_id;

          }

            if ($profile->gender=='Male') {
              
              $gender='Female';
            }
            else{
               $gender='Male';
            }



          $users= DB::table('users')
          ->where('id','!=',$userid)
           ->where('user_account',0)
           ->where('gender',$gender)
          ->whereNotIn('id', $ids)
          ->whereBetween('dob', [$date2, $date1])
          ->where('profile_setting',1)
          ->limit(15)
          ->get();

            $recent_join= DB::table('users')
          ->where('id','!=',$userid)
           ->where('user_account',0)
           ->whereNotIn('id', $ids)
          ->orderBy('id','DESC')
          ->limit(15)
          ->get();

        $user = DB::table('users')
          ->where('id', $userid)
          ->where('user_account',0)
          ->whereBetween('dob', [$date2, $date1])

          ->get();



       /* echo "<pre>";
        print_r($users);die();*/
          foreach ($users as $key => $value) {

      /*  $dob=$value->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/
     

        $response['Intest_Sent'][$key]['id']=$value->id;
        $response['Intest_Sent'][$key]['fname']=$value->fname;
        $response['Intest_Sent'][$key]['lname']=$value->lname;
        $response['Intest_Sent'][$key]['email']=$value->email;
        $response['Intest_Sent'][$key]['phone']=$value->phone;
        $response['Intest_Sent'][$key]['gender']=$value->gender;
        $response['Intest_Sent'][$key]['dob']=$value->dob;
        $response['Intest_Sent'][$key]['country']=$value->country;
        $response['Intest_Sent'][$key]['city']=$value->city;
        $response['Intest_Sent'][$key]['state']=$value->state;
        $response['Intest_Sent'][$key]['religion']=$value->religion;
        $response['Intest_Sent'][$key]['MotherTongue']=$value->MotherTongue;
        $response['Intest_Sent'][$key]['complexion']=$value->complexion;
        $response['Intest_Sent'][$key]['about']=$value->about;
        $response['Intest_Sent'][$key]['Height']=$value->Height;
        $response['Intest_Sent'][$key]['Marital_Status']=$value->Marital_Status;
/*        $response['Intest_Sent'][$key]['profile_photo']=$value->image;
*/        $response['Intest_Sent'][$key]['age']=$value->age;
  $response['Intest_Sent'][$key]['Educational']=$value->Educational;
        $response['Intest_Sent'][$key]['trust_score']=$value->trust_score;
        $response['Intest_Sent'][$key]['photo_status']=$value->photo_status;
          $response['Intest_Sent'][$key]['Working_As']=$value->Working_As;
             if($value->photo_status==1)
            {
             
  $response['Intest_Sent'][$key]['profile_photo']=$value->image;
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$value->id)
            ->first();
            if ($intestchexk) {
  $response['Intest_Sent'][$key]['profile_photo']=$value->image;

            }
            else
            {
          if($profile->gender=='Male')
                {
                                  $response['Intest_Sent'][$key]['profile_photo']='img.jpg';

                }
                else
                {
                    $response['Intest_Sent'][$key]['profile_photo']='img_1.jpg';

                }

            }

            }

        
          

          }

        
          if(!empty($users['0']))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}





//---user all detail-video GET//
public function AddtoShortlist($id= null){

  header('Access-Control-Allow-Origin: *');
    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid     = (@$_POST['userid']) ?: '';
      $patner_id     = (@$_POST['patner_id']) ?: ''; 
   
   $userprofile=DB::table('users')
       ->where('id',$userid)
     ->first();

     $package=DB::table('package')
       ->where('id',$userprofile->package)
     ->first();
     if (!$package) {
         return response()->json([
                    'status' => '0',
                    'message' => 'Please upgrade your package!',
                    
                ]);
     }
     else
     {
      $tortalinterts=$package->Days;
      /*  $shortlist=DB::table('shortlist')
          ->where('uid',$userid)
          ->count();*/

            $intest=DB::table('shortlist')
          ->where('uid',$userid)
          ->count();

          if($tortalinterts >=$intest)
          {

       $checkblock=DB::table('block_list')
       ->where('uid',$userid)
        ->where('block_id',$patner_id)
       ->first();
       if ($checkblock) {

         return response()->json([
                    'status' => '0',
                    'message' => 'You Are Already Block This User!',
                    
                ]);

       }
       else
       {


       $shortlist=DB::table('shortlist')
       ->where('uid',$userid)
        ->where('sid',$patner_id)
       ->first();



       if($shortlist)
       {
           return response()->json([
                    'status' => '0',
                    'message' => 'Already Sent',
                    
                ]);
       }
       else
       {

$update=DB::table('shortlist')
     ->insert(array(
        'uid' =>  $userid,
        'sid' =>  $patner_id
      ));

        return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    
                ]);

       }

     

       }
     }
     else
     {
      return response()->json([
                    'status' => '0',
                    'message' => 'Please upgrade your package!',
                    
                ]);
     }
       
       

}
}

public function NewMatchList()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();
           $ids=array();

    $userid = (@$_POST['userid']) ?: '';
$profile= DB::table('users')
          ->where('id',$userid)
          ->first();

$blockprofile= DB::table('block_list')
          ->where('uid',$userid)
          ->get();
          foreach ($blockprofile as $key => $value) {
           
           $ids[]=$value->block_id;

          }

if ($profile->gender=='Male') {
              
              $gender='Female';
            }
            else{
               $gender='Male';
            }


          $users= DB::table('users')
          ->where('id','!=',$userid)
           ->where('user_account',0)
           ->where('gender',$gender)
            ->whereNotIn('id', $ids)
             ->where('profile_setting',1)
          ->get();



       /* echo "<pre>";
        print_r($users);die();*/
          foreach ($users as $key => $value) {

       /* $dob=$value->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/
     

        $response['New_matches'][$key]['id']=$value->id;
        $response['New_matches'][$key]['fname']=$value->fname;
        $response['New_matches'][$key]['lname']=$value->lname;
        $response['New_matches'][$key]['email']=$value->email;
        $response['New_matches'][$key]['phone']=$value->phone;
        $response['New_matches'][$key]['gender']=$value->gender;
        $response['New_matches'][$key]['dob']=$value->dob;
        $response['New_matches'][$key]['country']=$value->country;
        $response['New_matches'][$key]['city']=$value->city;
        $response['New_matches'][$key]['state']=$value->state;
        $response['New_matches'][$key]['religion']=$value->religion;
        $response['New_matches'][$key]['MotherTongue']=$value->MotherTongue;
        $response['New_matches'][$key]['complexion']=$value->complexion;
        $response['New_matches'][$key]['about']=$value->about;
        $response['New_matches'][$key]['Height']=$value->Height;
        $response['New_matches'][$key]['Marital_Status']=$value->Marital_Status;
        $response['New_matches'][$key]['profile_photo']=$value->image;
        $response['New_matches'][$key]['age']=$value->age;
         $response['New_matches'][$key]['Educational']=$value->Educational;
        $response['New_matches'][$key]['trust_score']=$value->trust_score;
        $response['New_matches'][$key]['photo_status']=$value->photo_status;
          $response['New_matches'][$key]['Working_As']=$value->Working_As;
         
        
          

          }

        
         
          if(!empty($users['0']))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}

public function RecentJoinList()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();
          $ids=array();
    $userid = (@$_POST['userid']) ?: '';
$blockprofile= DB::table('block_list')
          ->where('uid',$userid)
          ->get();
          foreach ($blockprofile as $key => $value) {
           
           $ids[]=$value->block_id;

          }

          $profile= DB::table('users')
          ->where('id',$userid)
          ->first();
if ($profile->gender=='Male') {
              
              $gender='Female';
            }
            else{
               $gender='Male';
            }

          $users= DB::table('users')
          ->where('id','!=',$userid)
           ->where('user_account',0)
           ->where('gender',$gender)
            ->whereNotIn('id', $ids)
             ->where('profile_setting',1)
          ->orderBy('id','DESC')
         ->get();




       /* echo "<pre>";
        print_r($users);die();*/
          foreach ($users as $key => $value) {

    /*  $dob=$value->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/
     
          $response['recent_join'][$key]['id']=$value->id;
          $response['recent_join'][$key]['fname']=$value->fname;
          $response['recent_join'][$key]['lname']=$value->lname;
           $response['recent_join'][$key]['email']=$value->email;
          $response['recent_join'][$key]['phone']=$value->phone;
          $response['recent_join'][$key]['gender']=$value->gender;
           $response['recent_join'][$key]['dob']=$value->dob;
          $response['recent_join'][$key]['country']=$value->country;
          $response['recent_join'][$key]['city']=$value->city;
          $response['recent_join'][$key]['state']=$value->state;
          $response['recent_join'][$key]['religion']=$value->religion;
          $response['recent_join'][$key]['MotherTongue']=$value->MotherTongue;
           $response['recent_join'][$key]['complexion']=$value->complexion;
          $response['recent_join'][$key]['about']=$value->about;
          $response['recent_join'][$key]['Height']=$value->Height;
           $response['recent_join'][$key]['Marital_Status']=$value->Marital_Status;
           $response['recent_join'][$key]['profile_photo']=$value->image;
            $response['recent_join'][$key]['age']=$value->age;
             $response['recent_join'][$key]['Educational']=$value->Educational;
        $response['recent_join'][$key]['trust_score']=$value->trust_score;
        $response['recent_join'][$key]['photo_status']=$value->photo_status;
         $response['recent_join'][$key]['Working_As']=$value->Working_As;
         
        
         
         
        
          

          }

        
         
          if(!empty($users['0']))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}


public function Send_Interst($id= null){

  header('Access-Control-Allow-Origin: *');
    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid     = (@$_POST['userid']) ?: '';
      $patner_id     = (@$_POST['patner_id']) ?: ''; 


   $userprofile=DB::table('users')
       ->where('id',$userid)
     ->first();

     $package=DB::table('package')
       ->where('id',$userprofile->package)
     ->first();
     if (!$package) {
         return response()->json([
                    'status' => '0',
                    'message' => 'Please upgrade your package!',
                    
                ]);
     }
     else
     {
      $tortalinterts=$package->Interest;
      /*  $shortlist=DB::table('shortlist')
          ->where('uid',$userid)
          ->count();*/

            $intest=DB::table('intest')
          ->where('uid',$userid)
          ->count();

          if($tortalinterts >=$intest)
          {
    $checkblock=DB::table('block_list')
       ->where('uid',$userid)
        ->where('block_id',$patner_id)
       ->first();
       if ($checkblock) {

         return response()->json([
                    'status' => '0',
                    'message' => 'You Are Already Block This User!',
                    
                ]);

       }
       else
       {


       $intest=DB::table('intest')
       ->where('uid',$userid)
        ->where('sid',$patner_id)
       ->first();

       if($intest)
       {
           return response()->json([
                    'status' => '0',
                    'message' => 'Already Sent',
                    
                ]);
       }
       else
       {

    $update=DB::table('intest')
     ->insert(array(
        'uid' =>  $userid,
        'sid' =>  $patner_id
      ));

        return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    
                ]);

       }

     }
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Please upgrade your Package!',
                    
                ]);
          }

           /*$connection=DB::table('intest')
           ->where('status',1)
          ->where('uid',$userid)
          ->count();
*/
         /*  $view=DB::table('view_profile')
          ->where('uid',$userid)
          ->count();*/


     }

    

       
       
       

}


public function BlockProfile($id= null){

  header('Access-Control-Allow-Origin: *');
    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid     = (@$_POST['userid']) ?: '';
      $patner_id     = (@$_POST['patner_id']) ?: ''; 
   
       $block_list=DB::table('block_list')
       ->where('uid',$userid)
        ->where('block_id',$patner_id)
       ->first();

       if($block_list)
       {
           return response()->json([
                    'status' => '0',
                    'message' => 'Already Sent',
                    
                ]);
       }
       else
       {

    $update=DB::table('block_list')
     ->insert(array(
        'uid' =>  $userid,
        'block_id' =>  $patner_id
      ));

        return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    
                ]);

       }

     

       
       
       

}


//---user ShortlistProfile -type POST//
public function ShortlistProfile()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();
          $ids=array();
    $userid = (@$_POST['userid']) ?: '';

          $users= DB::table('shortlist')
          ->where('uid',$userid)
         ->get();

          $currentusers= DB::table('users')
          ->where('id',$userid)
         ->first();

           
            $blockprofile= DB::table('block_list')
            ->where('uid',$userid)
            ->get();

          foreach ($blockprofile as $key => $value) {
           
           $ids[]=$value->block_id;

          }
 

          foreach ($users as $key => $value) {

     
      
      $userprofile=DB::table('users')
          ->where('id',$value->sid)
           ->where('user_account',0)
           ->whereNotIn('id', $ids)
            ->where('profile_setting',1)
          ->first();

          if($userprofile)
          {


/*
              $dob=$userprofile->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));

          */
            $response['Profile'][$key]['id']=$userprofile->id;
            $response['Profile'][$key]['fname']=$userprofile->fname;
            $response['Profile'][$key]['lname']=$userprofile->lname;
            $response['Profile'][$key]['email']=$userprofile->email;
            $response['Profile'][$key]['phone']=$userprofile->phone;
            $response['Profile'][$key]['gender']=$userprofile->gender;
            $response['Profile'][$key]['dob']=$userprofile->dob;
            $response['Profile'][$key]['country']=$userprofile->country;
            $response['Profile'][$key]['city']=$userprofile->city;
            $response['Profile'][$key]['state']=$userprofile->state;
            $response['Profile'][$key]['religion']=$userprofile->religion;
            $response['Profile'][$key]['MotherTongue']=$userprofile->MotherTongue;
            $response['Profile'][$key]['complexion']=$userprofile->complexion;
            $response['Profile'][$key]['about']=$userprofile->about;
            $response['Profile'][$key]['Height']=$userprofile->Height;
            $response['Profile'][$key]['Marital_Status']=$userprofile->Marital_Status;
           // $response['Profile'][$key]['profile_photo']=$userprofile->image;
            $response['Profile'][$key]['age']=$userprofile->age;
              $response['Profile'][$key]['Educational']=$userprofile->Educational;
        $response['Profile'][$key]['trust_score']=$userprofile->trust_score;
        $response['Profile'][$key]['photo_status']=$userprofile->photo_status;
         $response['Profile'][$key]['Working_As']=$userprofile->Working_As;

             if($userprofile->photo_status==1)
            {
             
  $response['Profile'][$key]['profile_photo']=$userprofile->image;
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$userprofile->id)
            ->first();
            if ($intestchexk) {
  $response['Profile'][$key]['profile_photo']=$userprofile->image;

            }
            else
            {
if($currentusers->gender=='Male')
                {
                                  $response['Profile'][$key]['profile_photo']='img.jpg';

                }
                else
                {
                    $response['Profile'][$key]['profile_photo']='img_1.jpg';

                }
            }

            }
    
          
          }
          else{
            return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          }


      
         
          if(!empty($response))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}



//---user ShortlistProfile -type POST//
public function BlocklList()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();

    $userid = (@$_POST['userid']) ?: '';
   $currentusers= DB::table('users')
          ->where('id',$userid)
         ->first();
          $users= DB::table('block_list')
          ->where('uid',$userid)
         ->get();

         
          foreach ($users as $key => $value) {

     
      
      $userprofile=DB::table('users')
          ->where('id',$value->block_id)
           ->where('user_account',0)
            ->where('profile_setting',1)
          ->first();

            /*  $dob=$userprofile->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/

          
            $response['Profile'][$key]['id']=$userprofile->id;
            $response['Profile'][$key]['fname']=$userprofile->fname;
            $response['Profile'][$key]['lname']=$userprofile->lname;
            $response['Profile'][$key]['email']=$userprofile->email;
            $response['Profile'][$key]['phone']=$userprofile->phone;
            $response['Profile'][$key]['gender']=$userprofile->gender;
            $response['Profile'][$key]['dob']=$userprofile->dob;
            $response['Profile'][$key]['country']=$userprofile->country;
            $response['Profile'][$key]['city']=$userprofile->city;
            $response['Profile'][$key]['state']=$userprofile->state;
            $response['Profile'][$key]['religion']=$userprofile->religion;
            $response['Profile'][$key]['MotherTongue']=$userprofile->MotherTongue;
            $response['Profile'][$key]['complexion']=$userprofile->complexion;
            $response['Profile'][$key]['about']=$userprofile->about;
            $response['Profile'][$key]['Height']=$userprofile->Height;
            $response['Profile'][$key]['Marital_Status']=$userprofile->Marital_Status;
/*            $response['Profile'][$key]['profile_photo']=$userprofile->image;
*/            $response['Profile'][$key]['age']=$userprofile->age;
  $response['Profile'][$key]['Educational']=$userprofile->Educational;
        $response['Profile'][$key]['trust_score']=$userprofile->trust_score;
        $response['Profile'][$key]['photo_status']=$userprofile->photo_status;
         $response['Profile'][$key]['Working_As']=$userprofile->Working_As;

 if($userprofile->photo_status==1)
            {
             
  $response['Profile'][$key]['profile_photo']=$userprofile->image;
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$userprofile->id)
            ->first();
            if ($intestchexk) {
  $response['Profile'][$key]['profile_photo']=$userprofile->image;

            }
            else
            {
if($currentusers->gender=='Male')
                {
                                  $response['Profile'][$key]['profile_photo']='img.jpg';

                }
                else
                {
                    $response['Profile'][$key]['profile_photo']='img_1.jpg';

                }

            }

            }
    
          


          }


      
         
          if(!empty($response))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}


 public function InterstProfile()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();
        $ids=array();
     $userid = (@$_POST['userid']) ?: '';
  $userscurrent= DB::table('users')
            ->where('id',$userid)
            ->first();

            $users= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',0)
            ->get();

  $blockprofile= DB::table('block_list')
            ->where('uid',$userid)
            ->get();

          foreach ($blockprofile as $key => $value) {
           
           $ids[]=$value->block_id;

          }

            //print_r($users);die();

             $users1= DB::table('intest')
            ->where('sid',$userid)
            ->where('status',0)
            ->get();

         
          foreach ($users as $key => $value) {

     
      
          $userprofile=DB::table('users')
          ->where('id',$value->sid)
          ->where('user_account',0)
          ->whereNotIn('id', $ids)
           ->where('profile_setting',1)
          ->first();

          if ($userprofile) {
            # code...
          

       /*   $dob=$userprofile->dob;
          $diff = (date('Y') - date('Y',strtotime($dob)));*/

          
            $response['Intest_Sent'][$key]['id']=$userprofile->id;
            $response['Intest_Sent'][$key]['fname']=$userprofile->fname;
            $response['Intest_Sent'][$key]['lname']=$userprofile->lname;
            $response['Intest_Sent'][$key]['email']=$userprofile->email;
            $response['Intest_Sent'][$key]['phone']=$userprofile->phone;
            $response['Intest_Sent'][$key]['gender']=$userprofile->gender;
            $response['Intest_Sent'][$key]['dob']=$userprofile->dob;
            $response['Intest_Sent'][$key]['country']=$userprofile->country;
            $response['Intest_Sent'][$key]['city']=$userprofile->city;
            $response['Intest_Sent'][$key]['state']=$userprofile->state;
            $response['Intest_Sent'][$key]['religion']=$userprofile->religion;
            $response['Intest_Sent'][$key]['MotherTongue']=$userprofile->MotherTongue;
            $response['Intest_Sent'][$key]['complexion']=$userprofile->complexion;
            $response['Intest_Sent'][$key]['about']=$userprofile->about;
            $response['Intest_Sent'][$key]['Height']=$userprofile->Height;
            $response['Intest_Sent'][$key]['Marital_Status']=$userprofile->Marital_Status;
/*            $response['Intest_Sent'][$key]['profile_photo']=$userprofile->image;
*/            $response['Intest_Sent'][$key]['age']=$userprofile->age;
            $response['Intest_Sent'][$key]['Educational']=$userprofile->Educational;
            $response['Intest_Sent'][$key]['trust_score']=$userprofile->trust_score;
           $response['Intest_Sent'][$key]['photo_status']=$userprofile->photo_status;
           $response['Intest_Sent'][$key]['Working_As']=$userprofile->Working_As;
      

 if($userprofile->photo_status==1)
            {
             
  $response['Intest_Sent'][$key]['profile_photo']=$userprofile->image;
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$userprofile->id)
            ->first();
            if ($intestchexk) {
  $response['Intest_Sent'][$key]['profile_photo']=$userprofile->image;

            }
            else
            {
if($userscurrent->gender=='Male')
                {
                                  $response['Intest_Sent'][$key]['profile_photo']='img.jpg';

                }
                else
                {
                    $response['Intest_Sent'][$key]['profile_photo']='img_1.jpg';

                }
            }

            }

          }
          else{
            return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }


          }


          foreach ($users1 as $key => $value) {

     
      
          $userprofile=DB::table('users')
          ->where('id',$value->uid)
          ->where('user_account',0)
           ->where('profile_setting',1)
          ->whereNotIn('id', $ids)
          ->first();

        /*  $dob=$userprofile->dob;
          $diff = (date('Y') - date('Y',strtotime($dob)));
*/
          if ($userprofile) {
            # code...
          
            $response['Intest_recived'][$key]['id']=$userprofile->id;
            $response['Intest_recived'][$key]['fname']=$userprofile->fname;
            $response['Intest_recived'][$key]['lname']=$userprofile->lname;
            $response['Intest_recived'][$key]['email']=$userprofile->email;
            $response['Intest_recived'][$key]['phone']=$userprofile->phone;
            $response['Intest_recived'][$key]['gender']=$userprofile->gender;
            $response['Intest_recived'][$key]['dob']=$userprofile->dob;
            $response['Intest_recived'][$key]['country']=$userprofile->country;
            $response['Intest_recived'][$key]['city']=$userprofile->city;
            $response['Intest_recived'][$key]['state']=$userprofile->state;
            $response['Intest_recived'][$key]['religion']=$userprofile->religion;
            $response['Intest_recived'][$key]['MotherTongue']=$userprofile->MotherTongue;
            $response['Intest_recived'][$key]['complexion']=$userprofile->complexion;
            $response['Intest_recived'][$key]['about']=$userprofile->about;
            $response['Intest_recived'][$key]['Height']=$userprofile->Height;
            $response['Intest_recived'][$key]['Marital_Status']=$userprofile->Marital_Status;
/*            $response['Intest_recived'][$key]['profile_photo']=$userprofile->image;
*/            $response['Intest_recived'][$key]['age']=$userprofile->age;
 $response['Intest_recived'][$key]['Educational']=$userprofile->Educational;
        $response['Intest_recived'][$key]['trust_score']=$userprofile->trust_score;
        $response['Intest_recived'][$key]['photo_status']=$userprofile->photo_status;
         $response['Intest_recived'][$key]['Working_As']=$userprofile->Working_As;

 if($userprofile->photo_status==1)
            {
             
  $response['Intest_recived'][$key]['profile_photo']=$userprofile->image;
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$userprofile->id)
            ->first();
            if ($intestchexk) {
  $response['Intest_recived'][$key]['profile_photo']=$userprofile->image;

            }
            else
            {
if($userscurrent->gender=='Male')
                {
                                  $response['Intest_Sent'][$key]['profile_photo']='img.jpg';

                }
                else
                {
                    $response['Intest_Sent'][$key]['profile_photo']='img_1.jpg';

                }
            }

            }
     }
          else{
            return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }
          


          }


      
         
          if(!empty($response))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}


public function AcceptInterst($id= null){

  header('Access-Control-Allow-Origin: *');
    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid     = (@$_POST['userid']) ?: '';
      $patner_id     = (@$_POST['patner_id']) ?: ''; 
   
    $update=DB::table('intest')
      ->where('uid',$userid)
      ->where('sid',$patner_id)
      ->update(array(
        'status' =>  1,
       ));

      if($update)
      {

        return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    
                ]);

       }
       else
       {
        return response()->json([
                    'status' => '0',
                    'message' => 'Someting Went Wrong',
                    
                ]);
       }

     

       
       
       

}

 public function Connections()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();

     $userid = (@$_POST['userid']) ?: '';

            $users= DB::table('intest')
            ->where('uid',$userid)
            ->orWhere('sid',$userid)
            ->where('status',1)
            ->get();

          //  print_r($users);die();

  $blockprofile= DB::table('block_list')
            ->where('uid',$userid)
            ->get();
            $ids=array();
          foreach ($blockprofile as $key => $value) {
           
           $ids[]=$value->block_id;

          }

         
          foreach ($users as $key => $value) {

     
          if($value->uid==$userid)
          {
            $id=$value->sid;
          }
          else
          {
            $id=$value->uid;
          }
          $userprofile=DB::table('users')
          ->where('id',$id)
          ->where('user_account',0)
          ->whereNotIn('id', $ids)
          ->where('profile_setting',1)
          ->first();


          /*$dob=$userprofile->dob;
          $diff = (date('Y') - date('Y',strtotime($dob)));*/
          if ($value->status==1) {
            # code...
          
          
            $response['Connections'][$key]['id']=$userprofile->id;
            $response['Connections'][$key]['fname']=$userprofile->fname;
            $response['Connections'][$key]['lname']=$userprofile->lname;
            $response['Connections'][$key]['email']=$userprofile->email;
            $response['Connections'][$key]['phone']=$userprofile->phone;
            $response['Connections'][$key]['gender']=$userprofile->gender;
            $response['Connections'][$key]['dob']=$userprofile->dob;
            $response['Connections'][$key]['country']=$userprofile->country;
            $response['Connections'][$key]['city']=$userprofile->city;
            $response['Connections'][$key]['state']=$userprofile->state;
            $response['Connections'][$key]['religion']=$userprofile->religion;
            $response['Connections'][$key]['MotherTongue']=$userprofile->MotherTongue;
            $response['Connections'][$key]['complexion']=$userprofile->complexion;
            $response['Connections'][$key]['about']=$userprofile->about;
            $response['Connections'][$key]['Height']=$userprofile->Height;
            $response['Connections'][$key]['Marital_Status']=$userprofile->Marital_Status;
            $response['Connections'][$key]['profile_photo']=$userprofile->image;
            $response['Connections'][$key]['age']=$userprofile->age;
             $response['Connections'][$key]['Educational']=$userprofile->Educational;
        $response['Connections'][$key]['trust_score']=$userprofile->trust_score;
        $response['Connections'][$key]['photo_status']=$userprofile->photo_status;
         $response['Connections'][$key]['Working_As']=$userprofile->Working_As;
    }
          


          }


          


      
         
          if(!empty($response))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}



public function ChangePasswprd($id= null){

  header('Access-Control-Allow-Origin: *');
    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid     = (@$_POST['userid']) ?: '';
      $oldpassword     = (@$_POST['oldpassword']) ?: ''; 
      $newpassword     = (@$_POST['newpassword']) ?: ''; 
   
    $checkquery=DB::table('users')
    ->where('id',$userid)
    ->where('password',$oldpassword)
    ->first();
    if($checkquery)
    {
 $update=DB::table('users')
      ->where('id',$userid)
      ->update(array(
        'password' =>  $newpassword
       ));

        return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    
                ]);

    }
    else
    {
        return response()->json([
                    'status' => '0',
                    'message' => 'Old Password Not Match',
                    
                ]);
    }
   
 

     

       
       
       

}


public function AccountBlock($id= null){

  header('Access-Control-Allow-Origin: *');
    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid     = (@$_POST['userid']) ?: '';
     
   
    $update=DB::table('users')
      ->where('id',$userid)
     ->update(array(
        'user_account' =>  1
       ));
      if($update)
      {

        return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    
                ]);

       }
       else
       {
         return response()->json([
                    'status' => '0',
                    'message' => 'Someting Went Wrong',
                    
                ]);
       }

     

       
       
       

}

public function Plans()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();

     $userid = (@$_POST['userid']) ?: '';

            $users= DB::table('package')
            ->get();

          foreach ($users as $key => $value) {
            $response['package'][$key]['id']=$value->id;
            $response['package'][$key]['title']=$value->title;
            $response['package'][$key]['Days']=$value->Days;
            $response['package'][$key]['Contact']=$value->Contact;
            $response['package'][$key]['Profile']=$value->Profile;
            $response['package'][$key]['Interest']=$value->Interest;
            $response['package'][$key]['Massage']=$value->Massage;
            $response['package'][$key]['Price']=$value->Price;
            $response['package'][$key]['Chat']=$value->Chat;
            $response['package'][$key]['Description']=$value->Description;
        
          }

          if(!empty($response))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}

public function ViewProfile($id= null){

  header('Access-Control-Allow-Origin: *');
    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid     = (@$_POST['userid']) ?: '';
      $patner_id     = (@$_POST['patner_id']) ?: '';

     
       $check=DB::table('view_profile')
       ->where('uid',$userid)
       ->where('sid',$patner_id)
       ->first();

       if(!$check)
       {
          $update=DB::table('view_profile')
          ->insert(array(
          'uid' =>  $userid,
          'sid' =>  $patner_id
          ));

      return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    
                ]);

       }
       else
       {
        return response()->json([
                    'status' => '0',
                    'message' => 'Already View',
                    
                ]);
       }




     

       
       
       

}


public function UnblockUsers($id= null){

  header('Access-Control-Allow-Origin: *');
    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid     = (@$_POST['userid']) ?: '';
      $patner_id     = (@$_POST['patner_id']) ?: '';

     
       $update=DB::table('block_list')
       ->where('uid',$userid)
       ->where('block_id',$patner_id)
       ->delete();  


       if(!$update)
       {
        
      return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    
                ]);

       }
       else
       {
         return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    
                ]);

       }

}


     

       
       //---user update-profile -type POST//
public function Search()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();
          $ids=array();
        $userid = (@$_POST['userid']) ?: '';
        $age_min = (@$_POST['age_min']) ?: '';
        $age_max = (@$_POST['age_max']) ?: '';

        $hight_min = (@$_POST['hight_min']) ?: '';
        $might_max = (@$_POST['might_max']) ?: '';
        $religion = (@$_POST['religion']) ?: '';
        $cast = (@$_POST['cast']) ?: '';
        $mother = (@$_POST['mother']) ?: '';

        $country = (@$_POST['country']) ?: '';
        $state = (@$_POST['state']) ?: '';
        $marital = (@$_POST['marital']) ?: '';
        $manglik = (@$_POST['manglik']) ?: '';
        $edu = (@$_POST['edu']) ?: '';
        $emplo = (@$_POST['emplo']) ?: '';
        $annual = (@$_POST['annual']) ?: '';
        $image = (@$_POST['image']) ?: '';
          $age2=$age_min.','.$age_max;
        if (isset($age_min) && isset($age_max)  && isset($hight_min)  && isset($might_max)  && isset($religion)  && isset($cast)  && isset($mother)  && isset($country)  && isset($state)  && isset($marital)  && isset($manglik)  && isset($edu)  && isset($emplo)  && isset($annual)) {
          
          //echo $age2;
        $ageww=explode(',',$age2);
         //$ageww=array(18,25);
         // print_r($ageww);

      $currentuserss=DB::table('users')
          ->where('id',$userid)
          ->first();

            if ($currentuserss->gender=='Male') {
              
              $gender='Female';
            }
            else{
               $gender='Male';
            }


          $users= DB::table('users')
          ->where('id','!=',$userid)
          ->where('user_account',0)
          ->whereBetween('age', $ageww)
          ->where('Height', 'like', "%$hight_min%")
          ->where('religion', 'like', "%$religion%")
          ->where('Caste', 'like', "%$cast%")
          ->where('MotherTongue', 'like', "%$mother%")
          ->where('Marital_Status', 'like', "%$marital%")
          ->where('Manglik', 'like', "%$manglik%")
          ->where('Educational', 'like', "%$edu%")
          ->where('Working', 'like', "%$emplo%")
           ->where('Income', 'like', "%$annual%")
            ->where('profile_setting',1)
             ->where('gender',$gender)
          ->get();
        }
         
      foreach ($users as $key => $value) {

        /* $dob=$value->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/
      
      $shortlist=DB::table('shortlist')
          ->where('sid',$userid)
          ->count();

            $intest=DB::table('intest')
          ->where('sid',$userid)
          ->count();

           $connection=DB::table('intest')
          ->where('sid',$userid)
          ->count();

           $view=DB::table('view_profile')
          ->where('uid',$userid)
          ->count();

          


            $response['Profile'][$key]['id']=$value->id;
            $response['Profile'][$key]['fname']=$value->fname;
            $response['Profile'][$key]['lname']=$value->lname;
            $response['Profile'][$key]['email']=$value->email;
            $response['Profile'][$key]['phone']=$value->phone;
            $response['Profile'][$key]['gender']=$value->gender;
            $response['Profile'][$key]['dob']=$value->dob;
            $response['Profile'][$key]['country']=$value->country;
            $response['Profile'][$key]['city']=$value->city;
            $response['Profile'][$key]['state']=$value->state;
            $response['Profile'][$key]['religion']=$value->religion;
            $response['Profile'][$key]['MotherTongue']=$value->MotherTongue;
            $response['Profile'][$key]['complexion']=$value->complexion;
            $response['Profile'][$key]['about']=$value->about;
            $response['Profile'][$key]['Height']=$value->Height;
            $response['Profile'][$key]['Marital_Status']=$value->Marital_Status;
/*            $response['Profile'][$key]['profile_photo']=$value->image;
*/            $response['Profile'][$key]['age']=$value->age;
            $response['Profile'][$key]['profile_completiton']=(string)$value->profile_com;
            $response['Profile'][$key]['trust_score']=(string)$value->trust_score;

            $response['Profile'][$key]['ShortList']=(string)$shortlist;
            $response['Profile'][$key]['interst']=(string)$intest;
            $response['Profile'][$key]['connection']=(string)$connection;
            $response['Profile'][$key]['view']=(string)$view;
            $response['Profile'][$key]['al_macth']='1';
                 $response['Profile'][$key]['Educational']=$value->Educational;
        $response['Profile'][$key]['photo_status']=$value->photo_status;
         $response['Profile'][$key]['Working_As']=$value->Working_As;

                if($value->photo_status==1)
            {
             
  $response['Profile'][$key]['profile_photo']=$value->image;
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$value->id)
            ->first();
            if ($intestchexk) {
  $response['Profile'][$key]['profile_photo']=$value->image;

            }
            else
            {
if($currentuserss->gender=='Male')
                {
                                  $response['Profile'][$key]['profile_photo']='img.jpg';

                }
                else
                {
                    $response['Profile'][$key]['profile_photo']='img_1.jpg';

                }
            }

            }

          


          }
         if ($response) {
           return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'response'=>$response
                    
                ]);
         }
         else{
          return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
         }
          

      

}



public function SearchByid()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();
          $ids=array();
        $userid = (@$_POST['userid']) ?: '';
        $search_id = (@$_POST['search_id']) ?: '';
       
          
         //$ageww=array(18,25);
         // print_r($ageww);
          $users= DB::table('users')
          ->where('id','!=',$userid)
           ->where('id','=',$search_id)
         ->get();
        
         
      foreach ($users as $key => $value) {

        /* $dob=$value->dob;
        $diff = (date('Y') - date('Y',strtotime($dob)));*/
      
      $shortlist=DB::table('shortlist')
          ->where('sid',$userid)
          ->count();

            $intest=DB::table('intest')
          ->where('sid',$userid)
          ->count();

           $connection=DB::table('intest')
          ->where('sid',$userid)
          ->count();

           $view=DB::table('view_profile')
          ->where('uid',$userid)
          ->count();

          


            $response['Profile'][$key]['id']=$value->id;
            $response['Profile'][$key]['fname']=$value->fname;
            $response['Profile'][$key]['lname']=$value->lname;
            $response['Profile'][$key]['email']=$value->email;
            $response['Profile'][$key]['phone']=$value->phone;
            $response['Profile'][$key]['gender']=$value->gender;
            $response['Profile'][$key]['dob']=$value->dob;
            $response['Profile'][$key]['country']=$value->country;
            $response['Profile'][$key]['city']=$value->city;
            $response['Profile'][$key]['state']=$value->state;
            $response['Profile'][$key]['religion']=$value->religion;
            $response['Profile'][$key]['MotherTongue']=$value->MotherTongue;
            $response['Profile'][$key]['complexion']=$value->complexion;
            $response['Profile'][$key]['about']=$value->about;
            $response['Profile'][$key]['Height']=$value->Height;
            $response['Profile'][$key]['Marital_Status']=$value->Marital_Status;
/*            $response['Profile'][$key]['profile_photo']=$value->image;
*/            $response['Profile'][$key]['age']=$value->age;
            $response['Profile'][$key]['profile_completiton']=(string)$value->profile_com;
            $response['Profile'][$key]['trust_score']=(string)$value->trust_score;

            $response['Profile'][$key]['ShortList']=(string)$shortlist;
            $response['Profile'][$key]['interst']=(string)$intest;
            $response['Profile'][$key]['connection']=(string)$connection;
            $response['Profile'][$key]['view']=(string)$view;
            $response['Profile'][$key]['al_macth']='1';


                if($value->photo_status==1)
            {
             
  $response['Profile'][$key]['profile_photo']=$value->image;
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$value->id)
            ->first();
            if ($intestchexk) {
  $response['Profile'][$key]['profile_photo']=$value->image;

            }
            else
            {
  $response['Profile'][$key]['profile_photo']='';

            }

            }

          
}

          
         if ($response) {
           return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'response'=>$response
                    
                ]);
         }
         else{
          return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
         }
          

      

}
       


public function EditProfilePhoto(Request $request){

  //echo "string";die();
    header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
    'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    $image=(@$_POST['image'])?: '';
    $userid=(@$_POST['userid'])?: '';





      define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'].'/Bharatiy_Matrimony/public/users/');
    $image_parts = explode(";base64,", $image);

    $image_type_aux = explode("image/", $image_parts[0]);
       //print_r($image_type_aux);die();
    $image_type = $image_type_aux[0];
    $image_base64 = base64_decode($image_parts[0]);
    $imagename=uniqid() . '.png';
    $file = UPLOAD_DIR .$imagename;
    file_put_contents($file, $image_base64);

                         $updatedata =DB::table('users')
                             ->where('id',$userid)
                             ->update(array(
                               'image'=>$imagename,
                            
                             ));

                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);



  }



public function   upload_photos (Request $request){

  //echo "string";die();
    header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
    'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    $image=(@$_POST['image'])?: '';
    $userid=(@$_POST['userid'])?: '';





      define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'].'/Bharatiy_Matrimony/public/photos/');

    if($request->hasfile('image'))
         {
//echo "string";die();
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();

                $image->move(UPLOAD_DIR, $name);  

                 $updatedata =DB::table('user_photos')
                            ->insert(array(
                               'image'=>$name,
                               'uid'=>$userid
                            
                             ));

             

            }
                              return response()->json([
          'status' => '1',
          'message' => 'Upload Successfully',

          ]);
         }


  }


/*update basic detail*/

public function EditProfile(Request $request){

  //echo "string";die();
    header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
    'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    $image=(@$_POST['image'])?: '';




      define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'].'/Bharatiy_Matrimony/public/users/');
    $image_parts = explode(";base64,", $image);

    $image_type_aux = explode("image/", $image_parts[0]);
       //print_r($image_type_aux);die();
    $image_type = $image_type_aux[0];
    $image_base64 = base64_decode($image_parts[0]);
    $imagename=uniqid() . '.png';
    $file = UPLOAD_DIR .$imagename;
    file_put_contents($file, $image_base64);

        $About=(@$_POST['About'])?: '';
        $Hieght=(@$_POST['Hieght'])?: '';
        $Marital_Status=(@$_POST['Marital_Status'])?: '';
        $Religion=(@$_POST['Religion'])?: '';
        $Caste=(@$_POST['Caste'])?: '';
        $Sub_Caste=(@$_POST['Sub_Caste'])?: '';
        $Mother_Tongue=(@$_POST['Mother_Tongue'])?: '';
        $Complexion=(@$_POST['Complexion'])?: '';
        $Manglik=(@$_POST['Manglik'])?: '';
        $Gotra=(@$_POST['Gotra'])?: '';
        $DOB=(@$_POST['DOB'])?: '';
        $Time_of_Birth=(@$_POST['Time_of_Birth'])?: '';
        $Place_of_Birth=(@$_POST['Place_of_Birth'])?: '';
        $Educatonal_Qualification=(@$_POST['Educatonal_Qualification'])?: '';
        $Employed_As=(@$_POST['Employed_As'])?: '';
        $Area=(@$_POST['Area'])?: '';
        $Employed_with=(@$_POST['Employed_with'])?: '';
        $Annual_income=(@$_POST['Annual_income'])?: '';
        $Country=(@$_POST['Country'])?: '';
        $State=(@$_POST['State'])?: '';
        $City=(@$_POST['City'])?: '';
        $Adress1=(@$_POST['Adress1'])?: '';
        $Adress2=(@$_POST['Adress2'])?: '';
        $ZipCode=(@$_POST['ZipCode'])?: '';
        $Professional_goals=(@$_POST['Professional_goals'])?: '';
        $Personal_goals=(@$_POST['Personal_goals'])?: '';
        $Special_Cases=(@$_POST['Special_Cases'])?: '';
        $smoker=(@$_POST['smoker'])?: '';
        $alcohol=(@$_POST['alcohol'])?: '';
        $criminal=(@$_POST['criminal'])?: '';
        $vegiterian=(@$_POST['vegiterian'])? : '';



/*famly*/
      $aboutfamily=(@$_POST['aboutfamily'])?: '';
      $Father_occupation=(@$_POST['Father_occupation'])?: '';
      $Mother_occupation=(@$_POST['Mother_occupation'])?: '';
      $Married_Sister=(@$_POST['Married_Sister'])?: '';
      $Unmarried_Sister=(@$_POST['Unmarried_Sister'])?: '';
      $Married_brother=(@$_POST['Married_brother'])?: '';
      $unMarried_brother=(@$_POST['unMarried_brother'])?: '';
      $native_country=(@$_POST['native_country'])?: '';
      $native_state=(@$_POST['native_state'])?: '';
      $Family_Value=(@$_POST['Family_Value'])?: '';
      $Affluence_level=(@$_POST['Affluence_level'])?: '';
   
   
  
        $P_desired_partner=(@$_POST['P_desired_partner']) ?: '';
        $P_Hight_from=(@$_POST['P_Hight_from']) ?: '';
        $P_Hight_to=(@$_POST['P_Hight_to']) ?: '';
        $P_Age_From=(@$_POST['P_Age_From']) ?: '';
        $P_Age_To=(@$_POST['P_Age_To']) ?: '';

        $P_Material_Status=(@$_POST['P_Material_Status']) ?: '';
        $P_Complexion=(@$_POST['P_Complexion']) ?: '';
        $P_Health=(@$_POST['P_Health']) ?: '';
        $P_Country_Residence=(@$_POST['P_Country_Residence']) ?: '';
        $P_State_Residence=(@$_POST['P_State_Residence']) ?: '';
        $P_Residence_Status=(@$_POST['P_Residence_Status']) ?: '';
        $P_Country_itizenship=(@$_POST['P_Country_itizenship']) ?: '';
        $P_Educatonal_Qualification=(@$_POST['P_Educatonal_Qualification']) ?: '';
        $P_Area=(@$_POST['P_Area']) ?: '';
        $P_Employed_With=(@$_POST['P_Employed_With']) ?: '';
        $P_Employed_As=(@$_POST['P_Employed_As']) ?: '';
        $P_Annual_income=(@$_POST['P_Annual_income']) ?: '';
        $P_Religion=(@$_POST['P_Religion']) ?: '';
        $P_Caste=(@$_POST['P_Caste']) ?: '';

        $P_Mother_Tongue=(@$_POST['P_Mother_Tongue']) ?: '';
        $P_Sub_Caste=(@$_POST['P_Sub_Caste']) ?: '';
        $P_Cast_Bar=(@$_POST['P_Cast_Bar']) ?: '';
        $P_Gotra_Bar=(@$_POST['P_Gotra_Bar']) ?: '';
        $P_Diet=(@$_POST['P_Diet']) ?: '';
        $P_Smoke=(@$_POST['P_Smoke']) ?: '';
        $P_Drink=(@$_POST['P_Drink']) ?: '';
        $P_Hobbies=(@$_POST['P_Hobbies']) ?: '';
        $userid = (@$_POST['userid']) ?: '';

        $method = (@$_POST['method']) ?: '';

         $Having_Kids = (@$_POST['Having_Kids']) ?: '';

          $Living_WithMe = (@$_POST['Living_WithMe']) ?: '';


          $P_About = (@$_POST['P_About']) ?: '';

         $P_Manglik = (@$_POST['P_Manglik']) ?: '';

          $P_SpecialCases = (@$_POST['P_SpecialCases']) ?: '';

        


        switch ($method) {

case 'Basic_info':

           $updatedata =DB::table('users')
                             ->where('id',$userid)
                             ->update(array(
                               'about'=>$About,
                               'Height'=>$Hieght,
                               'Marital_Status'=>$Marital_Status,
                               'religion'=>$Religion,
                               'Caste'=>$Caste,
                               'subcaste'=>$Sub_Caste,
                               'MotherTongue'=>$Mother_Tongue,
                               'Manglik'=>$Manglik,
                               'Gotra'=>$Gotra,
                               'dob'=>$DOB,
                               'Time_of_Birth'=>$Time_of_Birth,
                               'Place_of_Birth'=>$Place_of_Birth,
                                'having_kids'=>$Having_Kids,
                               'living_with_me'=>$Living_WithMe,
                               'about'=>$About
                               

                             ));

                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);


  break;
          case 'Education':
          
            $updatedata =DB::table('users')
                             ->where('id',$userid)
                             ->update(array(
                           
                               'Educational'=>$Educatonal_Qualification,
                               'Working'=>$Employed_As,
                               'area'=>$Area,
                               'Working_As'=>$Employed_with,
                               'annual_income'=>$Annual_income,
                               
                               

                             ));

                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);


            break;

            case 'Address':
          
            $updatedata =DB::table('users')
                             ->where('id',$userid)
                             ->update(array(
                               
                               'address1'=>$Adress1,
                               'address2'=>$Adress2,
                               'country'=>$Country,
                               'state'=>$State,
                               'city'=>$City,
                               'pin'=>$ZipCode,
                               
                               

                             ));

                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);


            break;

             case 'Future_Plan':
          
            $updatedata =DB::table('users')
                             ->where('id',$userid)
                             ->update(array(
                              
                               'professional_goals'=>$Professional_goals,
                               'personal_goals'=>$Personal_goals,
                               
                               

                             ));

                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);


            break;

             case 'Fair_disclosure':
          
            $updatedata =DB::table('users')
                             ->where('id',$userid)
                             ->update(array(
                              
                               'criminal_records'=>$criminal,
                               'Special_Cases'=>$Special_Cases,
                               'smoker'=>$smoker,
                               'alcohol'=>$alcohol,
                               'Diet'=>$vegiterian,
                              
                               

                             ));

                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);


            break;

             case 'Social_Media':
          
           

                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);


            break;

            case 'Family':
             
              $updatedata =DB::table('users')
                             ->where('id',$userid)
                             ->update(array(
                            
                               'About_Family'=>$aboutfamily,
                               'Father_Occupation'=>$Father_occupation,
                               'Mother_Occupation'=>$Mother_occupation,
                               'married_sister'=>$Married_Sister,
                               'unmarried_sister'=>$Unmarried_Sister,
                               'married_brother'=>$Married_brother,
                               'unmarried_brother'=>$unMarried_brother,
                               'Native_Country'=>$native_country,
                               'Native_State'=>$State,
                               'Family_Value'=>$Family_Value,
                                'afflence_level'=>$Affluence_level,
                              

                             ));
                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);

              break;


              case 'Partner_Education':

            
                               $insert_patner =DB::table('partner_preferences')
                       ->where('uid',$userid)
                        ->update(array
                        (
                          
                           'education_qualifiction'         => $P_Educatonal_Qualification,
                           'area'         => $P_Area,
                           'employed_with'      => $P_Employed_With,
                           'employed_as'  => $P_Employed_As,
                           'annual_income'  => $P_Annual_income,
                           
                           


                        ));
                          return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);


                break;

                 case 'Partner_Besic_Info':

            
                               $insert_patner =DB::table('partner_preferences')
                       ->where('uid',$userid)
                        ->update(array
                        (
                          'hightfrom'        => $P_Hight_from,
                          'hightto'           => $P_Hight_to,
                          'agefrom'         => $P_Age_From,
                          'ageto'      => $P_Age_To,
                          'marital_status'  => $P_Material_Status,
                          'complexion'         => $P_Complexion,
                          'health'      => $P_Health,
                          'P_About'  => $P_About,
                          'P_Manglik'  => $P_Manglik,
                          'P_SpecialCases'  => $P_SpecialCases,

                        ));
                                    return response()->json([
                    'status' => '1',
                    'message' => 'Update Successfully',

                    ]);


                break;

                case 'Partner_Social':

                    $insert_patner =DB::table('partner_preferences')
                       ->where('uid',$userid)
                        ->update(array
                        (
                         
                           'caste'         => $P_Caste,
                            'Religion'         => $P_Religion,
                           'Mother_Tongue'         => $P_Mother_Tongue,
                            'sub_cast'  => $P_Sub_Caste,
                           'cast_no_bar'  => $P_Cast_Bar,
                           'gotra'  => $P_Gotra_Bar,
                           
                        ));
                          return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);
                  break;

                  case 'Country_of_residence':
                    $insert_patner =DB::table('partner_preferences')
                       ->where('uid',$userid)
                        ->update(array
                        (
                           
                           'Country_of_Residence'      => $P_Country_Residence,
                           'State_of_Residence'  => $P_State_Residence,
                        
                           'residency_status'        => $P_Residence_Status,
                           'county_of_citizenship'           => $P_Country_itizenship,
                           
                        ));
                          return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);

                    break;



               case 'Lifestyle':
             
            
                               $insert_patner =DB::table('partner_preferences')
                       ->where('uid',$userid)
                        ->update(array
                        (
                          
                           'drink'  => $P_Drink,
                           'hobbies'         => $P_Hobbies,
                          
                           'diet'  => $P_Diet,
                           'smoke'  => $P_Smoke,
                       

                           


                        ));
                          return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);


              break;


          
          default:
            # code...
            break;
        }

       
                      

             

}



 public function ViewProfileList()
{
  header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    
         $response=array();

        $userid = (@$_POST['userid']) ?: '';

            $users= DB::table('view_profile')
            ->where('sid',$userid)
            ->get();

        $blockprofile= DB::table('block_list')
            ->where('uid',$userid)
            ->get();
            $ids=array();
          foreach ($blockprofile as $key => $value) {
           
           $ids[]=$value->block_id;

          }

         
          foreach ($users as $key => $value) {

     
          if($value->uid==$userid)
          {
            $id=$value->sid;
          }
          else
          {
            $id=$value->uid;
          }

          $userprofile=DB::table('users')
          ->where('id',$id)
          ->where('user_account',0)
          ->whereNotIn('id', $ids)
          /* ->where('profile_setting',1)*/
          ->first();

         /* print_r($userprofile);die();*/


          /*$dob=$userprofile->dob;
          $diff = (date('Y') - date('Y',strtotime($dob)));*/

          
            $response['New_matches'][$key]['id']=$userprofile->id;
            $response['New_matches'][$key]['fname']=$userprofile->fname;
            $response['New_matches'][$key]['lname']=$userprofile->lname;
            $response['New_matches'][$key]['email']=$userprofile->email;
            $response['New_matches'][$key]['phone']=$userprofile->phone;
            $response['New_matches'][$key]['gender']=$userprofile->gender;
            $response['New_matches'][$key]['dob']=$userprofile->dob;
            $response['New_matches'][$key]['country']=$userprofile->country;
            $response['New_matches'][$key]['city']=$userprofile->city;
            $response['New_matches'][$key]['state']=$userprofile->state;
            $response['New_matches'][$key]['religion']=$userprofile->religion;
            $response['New_matches'][$key]['MotherTongue']=$userprofile->MotherTongue;
            $response['New_matches'][$key]['complexion']=$userprofile->complexion;
            $response['New_matches'][$key]['about']=$userprofile->about;
            $response['New_matches'][$key]['Height']=$userprofile->Height;
            $response['New_matches'][$key]['Marital_Status']=$userprofile->Marital_Status;
            $response['New_matches'][$key]['profile_photo']=$userprofile->image;
            $response['New_matches'][$key]['age']=$userprofile->age;
              $response['New_matches'][$key]['Educational']=$userprofile->Educational;
        $response['New_matches'][$key]['trust_score']=$userprofile->trust_score;
        $response['New_matches'][$key]['photo_status']=$userprofile->photo_status;
                 $response['New_matches'][$key]['Working_As']=$userprofile->Working_As;

    
          
 if($userprofile->photo_status==1)
            {
             
  $response['New_matches'][$key]['profile_photo']=$userprofile->image;
            }
            else
            {
              $intestchexk= DB::table('intest')
            ->where('uid',$userid)
            ->where('status',1)
            ->Where('sid',$value->id)
            ->first();
            if ($intestchexk) {
  $response['New_matches'][$key]['profile_photo']=$userprofile->image;

            }
            else
            {
  $response['New_matches'][$key]['profile_photo']='';

            }

            }

          }


          


      
         
          if(!empty($response))
          {
            return response()->json([
                    'status' => '1',
                    'message' => 'Success',
                    'data' => $response
                ]);
          }
          else
          {
             return response()->json([
                    'status' => '0',
                    'message' => 'Data not found',
                    
                ]);
          }

          

      

}


public function UploadDocument(Request $request){

  //echo "string";die();
    header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
    'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    $image=(@$_POST['image'])?: '';
    $userid=(@$_POST['userid'])?: '';




$imagename='';
      define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'].'/Bharatiy_Matrimony/public/users/');
    $image_parts = explode(";base64,", $image);

    $image_type_aux = explode("image/", $image_parts[0]);
       //print_r($image_type_aux);die();
    $image_type = $image_type_aux[0];
    $image_base64 = base64_decode($image_parts[0]);
    $imagename=uniqid() . '.png';
    $file = UPLOAD_DIR .$imagename;
    file_put_contents($file, $image_base64);

                         $updatedata =DB::table('documents')
                            ->insert(array(
                               'document'=>$imagename,
                               'uid'=>$userid,
                            
                             ));

                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);



  }

  public function UpdateSetting(Request $request){

  //echo "string";die();
    header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
    'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid=(@$_POST['userid'])?: '';
      $photo_status=(@$_POST['photo_status'])?: '';

      $profile=(@$_POST['profile'])?: '';

      $contact=(@$_POST['contact'])?: '';

      $email=(@$_POST['email'])?: '';






                         $updatedata =DB::table('users')
                         ->where('id',$userid)
                            ->update(array(
                               'photo_status'=>$photo_status,
                               'profile_setting'=>$profile,
                               'contact_statting'=>$contact,
                               'email_'=>$email,
                            
                             ));

                               return response()->json([
          'status' => '1',
          'message' => 'Update Successfully',

          ]);



  }


 public function User_Settings(Request $request){

  //echo "string";die();
    header('Access-Control-Allow-Origin: *');

    // ALLOW OPTIONS METHOD
    $headers = [
    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
    'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
    ];
      $userid=(@$_POST['userid'])?: '';
 






                         $updatedata =DB::table('users')
                         ->where('id',$userid)
                           ->get();
                          foreach ($updatedata as $key => $value) {
                            $response['id']=$value->id;
                            $response['photo_status']=$value->photo_status;
                            $response['profile']=$value->profile_setting;
                            $response['contact']=$value->contact_statting;
                            $response['email']=$value->email_;
                          }

                               return response()->json([
          'status' => '1',
          'message' => 'Success',
          'response'=>$response

          ]);



  }


public function deletephotos(Request $request)
    {
     $id=$_POST['id'];
       $teams1=DB::table('user_photos')->where('id', $id)->delete();
                    return response()->json([
          'status' => '1',
          'message' => 'Success',
        

          ]);


    }





}
