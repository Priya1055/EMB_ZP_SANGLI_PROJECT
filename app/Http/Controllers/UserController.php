<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subdivms;
use Illuminate\Http\Request;
use App\Helpers\PublicDivisionId;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
 

class UserController extends Controller
{
    //Grid Display join users an subdivms table  
    public function indexleftjoin() 
    {

        $users = DB::table('users')
        ->leftJoin('subdivms','users.Sub_Div_id','=','subdivms.Sub_Div_Id')
        ->select('users.name','users.usertypes','users.Designation','subdivms.Sub_Div_M')
        ->get();
//    dd($users);
         return view('viewuser', ['users' => $users]);

     } 

     public function leftjoinuser(Request $request) 
     {
        dd($request);
        $users = DB::table('subdivms')
        // ->leftJoin('subdivms','users.Sub_Div_id','=','subdivms.Sub_Div_Id')
         ->where('subdivms.Sub_Div_Id',$request->Sub_Div_Id)
         ->where('subdivms.Sub_Div_M',$request->Sub_Div_M)
         ->where('subdivms.designation',$request->designation)
         ->select('subdivms.Sub_Div_Id','subdivms.Sub_Div_M','subdivms.designation')

         ->get();
    //   dd($users);

          return view('user', ['users' => $users]);
    }

    public function addForm()
    {
// dd('ok');
        
        $rsDiv=DB::table('divisions')->get();
        // dd($rsDiv);
        $rsSubDiv=DB::table('subdivms')->get();
        $rsDesignation=DB::table('designations')->get();
        //dd($rsDiv);
        // You can pass any data you need to the view here
        return view('User.add' , compact('rsDiv' , 'rsSubDiv' , 'rsDesignation')); //
    }

public function register(Request $request)
{
    $name = $request->input('name');
    $email = $request->input('email');
    $usertypes = $request->input('usertypes');

    $divid = $request->input('Div_id');
    $subdivid = $request->input('Sub_Div_id');
    $designation = $request->input('Designation');

    $mbno = $request->input('mobileno');
    $usernm = $request->input('Usernm');
    $passwrd = $request->input('password');

    $passwrdconfm = $request->input('password_confirmation');
   
 DB::table('users')->insert([

    
 ]);

}

public function FunGetRelatedDesignation(Request $request)
{
    // dd('ok');
    $usertypes = $request->input('usertypes');
    // dd($usertypes);
    $rsDesignation = null;
    if($usertypes === "EE" || $usertypes === "PA")
    {
    // $rsDesignation = DB::table('designations')
    // ->whereIn('Designation_code', 1)
    // ->get();

    $rsDesignation = DB::table('designations')
    ->select('Designation')
    ->where('Designation_code', 1)
    ->get();
     } 
     elseif ($usertypes === "DYE"){
        // dd('ok');

            // $rsDesignation = DB::table('designations')
            // ->whereIn('Designation_code', 2)
            // ->get();

            $rsDesignation = DB::table('designations')
            ->select('Designation')
            ->where('Designation_code', 2)
            ->get();
             } 

             elseif ($usertypes === "PO"){
                // dd('ok');
        
                    // $rsDesignation = DB::table('designations')
                    // ->whereIn('Designation_code', 2)
                    // ->get();
        
                    $rsDesignation = DB::table('designations')
                    ->select('Designation')
                    ->where('Designation_code', 3)
                    ->get();
                     } 

                     elseif ($usertypes === "SO")
                     {
                        // dd('ok');
                
                            // $rsDesignation = DB::table('designations')
                            // ->whereIn('Designation_code', 2)
                            // ->get();
                
                            $rsDesignation = DB::table('designations')
                            ->select('Designation')
                            ->where('Designation_code', 3)
                            ->get();
                             } 
        



                     elseif ($usertypes === "AAO"){
                        // dd('ok');
                
                            // $rsDesignation = DB::table('designations')
                            // ->whereIn('Designation_code', 2)
                            // ->get();
                
                            $rsDesignation = DB::table('designations')
                            ->select('Designation')
                            ->where('Designation_code', 4)
                            ->get();
                             } 

                             elseif ($usertypes === "audit"){
                                // dd('ok');
                        
                                    // $rsDesignation = DB::table('designations')
                                    // ->whereIn('Designation_code', 2)
                                    // ->get();
                        
                                    $rsDesignation = DB::table('designations')
                                    ->select('Designation')
                                    ->where('Designation_code', 5)
                                    ->get();
                                     } 

                                     elseif ($usertypes === "SDC"){
                                        // dd('ok');
                                
                                            // $rsDesignation = DB::table('designations')
                                            // ->whereIn('Designation_code', 2)
                                            // ->get();
                                
                                            $rsDesignation = DB::table('designations')
                                            ->select('Designation')
                                            ->where('Designation_code', 6)
                                            ->get();
                                             } 
             elseif($usertypes === "Agency")
             {
                // $rsDesignation = DB::table('designations')
                // ->whereIn('Designation_code', 7)
                // ->get();

                $rsDesignation = DB::table('designations')
                ->select('Designation')
                ->where('Designation_code', 7)
                ->get();
                 } 
    // dd($rsDesignation);
    // return view('User.add',['rsDesignation'=>$rsDesignation]);
    return response()->json(['designations' => $rsDesignation]);

}



public function createview()
{
    // dd('ok');
     // login user session Data----------------------------
     $usercode = auth()->user()->usercode;
     $divid = auth()->user()->Div_id;
     $subdivid = auth()->user()->Sub_Div_id;
     $usertypes = auth()->user()->usertypes;
     // login user session Data----------------------------
//   dd($usertypes);

//   dd('ok');

    $rsDiv=DB::table('divisions')->where('div_id' , $divid)->get();

    // if($usertypes === "EE" || $usertypes === "PA")
    // {

    // // $rsDesignation = DB::table('designations')
    // // ->whereIn('Designation_code', 1)
    // // ->get();

    // $rsDesignation = DB::table('designations')
    // ->select('Designation')
    // ->where('Designation_code', 1)
    // ->get();


    //  } 

    
    //  elseif ($usertypes === "DYE"){
    //     // dd('ok');

    //         // $rsDesignation = DB::table('designations')
    //         // ->whereIn('Designation_code', 2)
    //         // ->get();

    //         $rsDesignation = DB::table('designations')
    //         ->select('Designation')
    //         ->where('Designation_code', 2)
    //         ->get();
        
            
    //          } 

    //          elseif($usertypes === "Agency")
    //          {

    //             // $rsDesignation = DB::table('designations')
    //             // ->whereIn('Designation_code', 7)
    //             // ->get();

    //             $rsDesignation = DB::table('designations')
    //             ->select('Designation')
    //             ->where('Designation_code', 7)
    //             ->get();
            
                
    //              } 
    //              else
    //              {

    //              }
        
    // dd($rsDesignation);
  
   $rsAllUserList = User::get()->whereNotIn('usertypes', ['EE','PA']);
       $rsFundedList = DB::table('fundhdms')->get();
       $rsSubDevisionList = DB::table('subdivms')
       ->where('Div_Id','=',$divid)->get();
       $rsWorkMaster =DB::table('workmasters')
       ->where('Sub_Div_Id','=',$subdivid)->get();



 
     return view('User.add',['rsUser'=>$rsAllUserList,'rsFund'=>$rsFundedList,'rsSubDiv'=>$rsSubDevisionList,'rsWorkMaster'=>$rsWorkMaster , 'rsDiv'=>$rsDiv , 
    //  'rsDesignation'=>$rsDesignation
    ]);
}


public function storeUsersData(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'Usernm' => 'required|regex:/^\S*$/u|string|max:15|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'mobileno'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'password' => 'required|string|confirmed|min:6',
             'signature' => 'required|file|mimes:jpeg,jpg|max:2048', // Adjust file validation as needed
        ]);

        $divisionId = PublicDivisionId::DIVISION_ID;

        // Check Division Or SubDivision ID
        if($request->Div_id){
          $concatDivORSubDivID = $request->Div_id;
        }
        if($request->Sub_Div_id){
          $concatDivORSubDivID = $request->Sub_Div_id;
        }


        $DivisionIDLength = strlen($concatDivORSubDivID);
        if((int)$DivisionIDLength === 1){
            $DivisionID = $concatDivORSubDivID."000";
        }else if((int)$DivisionIDLength === 2){
            $DivisionID = $concatDivORSubDivID."00";
        }else if((int)$DivisionIDLength === 3){
            $DivisionID = $concatDivORSubDivID."0";
        }else if((int)$DivisionIDLength === 4){
            $DivisionID = $concatDivORSubDivID;
        }


        //User code Genration Functionality
        $SQLNewPKID = DB::table('users')
        ->selectRaw(" MAX(CAST(right(IFNULL(usercode,'0'),4)AS UNSIGNED)) as usercode ")
        ->limit(1)
        ->get();
        $RSNewPKID = json_decode($SQLNewPKID);
        if(isset($RSNewPKID[0]->usercode) && !empty($RSNewPKID[0]->usercode)){
            $PrimaryNumber=$RSNewPKID[0]->usercode + 1;
        }else{
            $PrimaryNumber='1';
        }
        $lenght = strlen($PrimaryNumber);  //Calculate Lenght
        if((int)$lenght === 1){ //Places Zero Functionality
            $placezero = '000';
        }else if((int)$lenght === 2){
            $placezero = '00';
        }else if((int)$lenght === 3){
            $placezero = '0';
        }else{
            $placezero = '';
        }

        // $file = $request->file('signature');
        // //dd($file);
        // // Use storeAs to generate a unique filename
        // $filePath = time() . '_' . $file->getClientOriginalName();
        // //dd($filePath);
        // // Move the file to the desired directory
        // $file->move(public_path('Uploads/signature'), $filePath);
                // $filePath='';
        if ($request->hasFile('signature')) {
            $file = $request->file('signature');
           // dd($file);
           $filePath = time() . '_' . $file->getClientOriginalName();

           //dd($filePath);
           $file->move(public_path('Uploads/signature'), $filePath);// Adjust storage path as needed
           
            // Save $filePath to the database or associate it with the user record as needed
            // For example: $user->signature_path = $filePath; $user->save();
        }
        $role=$request->usertypes;
        // dd($role);
        if($role === 'PA' || $role === 'EE' ||  $role === 'AAO' || $role === 'audit' || $role === 'PO' || $role === 'Agency')
        {
          $subDivid=$divisionId ."0";
        }
        else
        {
            $subDivid=$request->Sub_Div_id;
        }
// dd($request);
        $usercode = $DivisionID.$placezero.$PrimaryNumber;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobileno'=>$request->mobileno,
            'password' => Hash::make($request->password),
            'Div_id'=>$request->Div_id,
            'Sub_Div_id'=>$subDivid,
            'Designation'=>$request->Designation,
            'usercode'=>$usercode,
            'usertypes'=>$request->usertypes,
            'Usernm'=>$request->Usernm,
            'period_from'=>$request->period_from,
        ]);

        $lastInsertedUserId = $user->id; 
      // dd($lastInsertedUserId);
//      dd($role);
// dd($request);

    if($role === 'Agency')
    {
    //    dd('ok');
    $DivID = $request->Div_id;
    //$SubDivID = $request->Sub_Div_id;
    // dd($DivID,$SubDivID);

    //    dd($lastid);
    $lastid = DB::table('agencies')->max('id');

// dd($lastid);
    // if ($lastid) {
    //     $numericPart = $lastid->AB_Id;
    //     $newid = str_pad($numericPart + 1, 3, '0', STR_PAD_LEFT);
    // } else {
    //     $newid = '001';
    // }
if ($lastid !== null && is_numeric($lastid)) {
    $incrementedLastTwoDigit = str_pad((int)substr($lastid, -4) + 1, 4, '0', STR_PAD_LEFT);
    // dd($incrementedLastTwoDigit);
    $newid = $DivID . $incrementedLastTwoDigit;
} else {
    // If max value is not found or is not numeric, set a default value
    $newid = $DivID . '0001';
}        
// dd($newid);

               DB::table('agencies')->insert([
               'id'=> $newid,
               'agency_nm' => $request->name,
               'Agency_Mail' => $request->email,
               'Contact_Person1'=>$request->mobileno,
               'User_Name'=>$request->Usernm,
               'agencysign'=>$filePath,
               'userid'=>$lastInsertedUserId,
           ]);
    }


     if($role === 'EE')
     {
        $Designation=$request->Designation;
        // dd($Designation);

        // $lasteeid = DB::table('eemasters')->orderBy('eeid', 'desc')->first();

        $DivID = $request->Div_id;
        $SubDivID = $request->Sub_Div_id;
        // dd($DivID,$SubDivID);

    // $lastid = DB::table('sdcmasters')->orderBy('SDC_id', 'desc')->first();
    $lastid = DB::table('eemasters')
    ->where('divid',$DivID)
    ->max('eeid');
// dd($lastid);

    if ($lastid !== null && is_numeric($lastid)) {
        $incrementedLastTwoDigit = str_pad((int)substr($lastid, -2) + 1, 2, '0', STR_PAD_LEFT);
        // dd($incrementedLastTwoDigit);
        $newid = $DivID . $incrementedLastTwoDigit;
    } else {
        // If max value is not found or is not numeric, set a default value
        $newid = $DivID . '01';
    }        


//       if ($lasteeid) {
//     $numericPart = $lasteeid->eeid; // Extract last two digits
//     $neweeid = $numericPart + 1; // Increment and ensure two digits
// } else {
//     $neweeid = 1; // If no record exists, start with 1
// }
        
                DB::table('eemasters')->insert([
                'eeid'=> $newid,
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'divid'=>$request->Div_id,
                // 'subdiv_id'=>$subDivid,
                'Designation'=>$request->Designation,
                'user_name'=>$request->Usernm,
                'sign'=>$filePath,
                'userid'=>$lastInsertedUserId,
                'period_from'=>$request->period_from,
            ]);
     }


     if($role === 'DYE' || $role === 'PA')
     {
        // $lastid = DB::table('dyemasters')->orderBy('dye_id', 'desc')->first();

        $DivID = $request->Div_id;
        //$SubDivID = $request->Sub_Div_id;
        // dd($DivID,$SubDivID);

    // $lastid = DB::table('sdcmasters')->orderBy('SDC_id', 'desc')->first();
    $lastid = DB::table('dyemasters')
    ->where('div_id',$DivID)
    ->where('subdiv_id',$subDivid)
    ->max('dye_id');
// dd($lastid);

    if ($lastid !== null && is_numeric($lastid)) {
        $incrementedLastTwoDigit = str_pad((int)substr($lastid, -2) + 1, 2, '0', STR_PAD_LEFT);
        // dd($incrementedLastTwoDigit);
        $newid = $subDivid . $incrementedLastTwoDigit;
    } else {
        // If max value is not found or is not numeric, set a default value
        $newid = $subDivid . '01';
    }        


        // if ($lastid) {
        //     $numericPart = $lastid->dye_id;
        //     $newid = str_pad($numericPart + 1, 3, '0', STR_PAD_LEFT);
        // } else {
        //     $newid = '001';
        // }
        
        // if($role === 'PA')
        // {
        //   $subdivid=1470;
        // }
        // else
        // {
        //     $subdivid=$request->Sub_Div_id;
        // }
       // dd($subdivid);
                DB::table('dyemasters')->insert([
                'dye_id'=> $newid,
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                'subdiv_id'=> $subDivid,
                'designation'=>$request->Designation,
                'user_name'=>$request->Usernm,
                'sign'=>$filePath,
                'userid'=>$lastInsertedUserId,
                'period_from'=>$request->period_from,
            ]);
     }

     if($role === 'SO' || $role === 'PO')
     {
        // $lastid = DB::table('jemasters')->orderBy('jeid', 'desc')->first();

        $DivID = $request->Div_id;

        
        // dd($DivID,$SubDivID);

    // $lastid = DB::table('sdcmasters')->orderBy('SDC_id', 'desc')->first();
    $lastid = DB::table('jemasters')
    ->where('div_id',$DivID)
    ->where('subdiv_id',$subDivid)
    ->max('jeid');
// dd($lastid);

    if ($lastid !== null && is_numeric($lastid)) {
        $incrementedLastTwoDigit = str_pad((int)substr($lastid, -3) + 1, 3, '0', STR_PAD_LEFT);
        // dd($incrementedLastTwoDigit);
        $newid = $subDivid . $incrementedLastTwoDigit;
    } else {
        // If max value is not found or is not numeric, set a default value
        $newid = $subDivid . '001';
    }        
        // if ($lastid) {
        //     $numericPart = $lastid->jeid;
        //     $newid = str_pad($numericPart + 1, 4, '0', STR_PAD_LEFT);
        // } else {
        //     $newid = '0001';
        // }
        
                DB::table('jemasters')->insert([
                'jeid'=> $newid,
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                'subdiv_id'=>$subDivid,
                'designation'=>$request->Designation,
                'username'=>$request->Usernm,
                'sign'=>$filePath,
                'userid'=>$lastInsertedUserId,
                'period_from'=>$request->period_from,
            ]);
     }


     if($role === 'AAO')
     {

        $DivID = $request->Div_id;
        // $SubDivID = $request->Sub_Div_id;
        // dd($DivID,$SubDivID);

        // $lastid = DB::table('daomasters')->orderBy('DAO_id', 'desc')->first();
        $lastid = DB::table('daomasters')
        ->where('div_id',$DivID)
        ->max('DAO_id');


        if ($lastid !== null && is_numeric($lastid)) {
            $incrementedLastTwoDigit = str_pad((int)substr($lastid, -2) + 1, 2, '0', STR_PAD_LEFT);
            // dd($incrementedLastTwoDigit);
            $newid = $DivID . $incrementedLastTwoDigit;
        } else {
            // If max value is not found or is not numeric, set a default value
            $newid = $DivID . '01';
        }        
    // dd($newid);
    


        // if ($lastid) {
        //     $numericPart = $lastid->DAO_id;
        //     $newid = str_pad($numericPart + 1, 3, '0', STR_PAD_LEFT);
        // } else {
        //     $newid = '001';
        // }
        
                DB::table('daomasters')->insert([
                'DAO_id'=> $newid,
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                // 'subdiv_id'=>$request->Sub_Div_id,
                'designation'=>$request->Designation,
                'username'=>$request->Usernm,
                'sign'=>$filePath,
                'userid'=>$lastInsertedUserId,
                'period_from'=>$request->period_from,
            ]);
     }


     
     if($role === 'audit')
     {
        $DivID = $request->Div_id;
        // $SubDivID = $request->Sub_Div_id;
        // dd($DivID,$SubDivID);

        // $lastid = DB::table('abmasters')->orderBy('AB_Id', 'desc')->first();
        $lastid = DB::table('abmasters')
        ->where('div_id',$DivID)
        ->max('AB_Id');

// dd($lastid);
        // if ($lastid) {
        //     $numericPart = $lastid->AB_Id;
        //     $newid = str_pad($numericPart + 1, 3, '0', STR_PAD_LEFT);
        // } else {
        //     $newid = '001';
        // }
    if ($lastid !== null && is_numeric($lastid)) {
        $incrementedLastTwoDigit = str_pad((int)substr($lastid, -2) + 1, 2, '0', STR_PAD_LEFT);
        // dd($incrementedLastTwoDigit);
        $newid = $DivID . $incrementedLastTwoDigit;
    } else {
        // If max value is not found or is not numeric, set a default value
        $newid = $DivID . '01';
    }        
// dd($newid);

        
                DB::table('abmasters')->insert([
                'AB_Id'=> $newid,
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                'subdiv_id'=>$subDivid,
                'designation'=>$request->Designation,
                'username'=>$request->Usernm,
                'sign'=>$filePath,
                'userid'=>$lastInsertedUserId,
                'period_from'=>$request->period_from,
            ]);
     }

     if($role === 'SDC')
     {
            $DivID = $request->Div_id;
            //$SubDivID = $request->Sub_Div_id;
            // dd($DivID,$SubDivID);
  
        // $lastid = DB::table('sdcmasters')->orderBy('SDC_id', 'desc')->first();
        $lastid = DB::table('sdcmasters')
        ->where('subdiv_id',$subDivid)
        ->max('SDC_id');
// dd($lastid);

        if ($lastid !== null && is_numeric($lastid)) {
            $incrementedLastTwoDigit = str_pad((int)substr($lastid, -2) + 1, 2, '0', STR_PAD_LEFT);
            // dd($incrementedLastTwoDigit);
            $newid = $subDivid . $incrementedLastTwoDigit;
        } else {
            // If max value is not found or is not numeric, set a default value
            $newid = $subDivid . '01';
        }        
// dd($newid);


        // if ($lastid) {
        //     $numericPart = $lastid->SDC_id;
        //     $newid = str_pad($numericPart + 1, 2, '0', STR_PAD_LEFT);
        // } else {
        //     $newid = '01';
        // }

        
                DB::table('sdcmasters')->insert([
                'SDC_id'=> $newid,
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                'subdiv_id'=>$subDivid,
                'designation'=>$request->Designation,
                'username'=>$request->Usernm,
                'sign'=>$filePath,
                'userid'=>$lastInsertedUserId,
                'period_from'=>$request->period_from,
            ]);
     }
        //event(new Registered($user));
        return redirect('userslist')->with('success','Record save successfully.');
    }


    // Retrive All Records
function allrecords(){
    // dd('ok');
    // login user session Data----------------------------

    $usercode = auth()->user()->usercode;
    $divid = auth()->user()->Div_id;
    $subdivid = auth()->user()->Sub_Div_id;

    $usertype = auth()->user()->usertypes;
    //dd($usertype);
    // login user session Data----------------------------
    if($usertype === 'EE' || $usertype === 'PA')
    {
        $data= User::select('*')
    ->whereIn('usertypes', ['EE','PA','AAO','audit','PO','DYE'])
    ->where('Div_id', '=', $divid)
    ->get();

    }
    if($usertype === 'DYE')
    {
        $data= User::select('*')
    ->whereIn('usertypes', ['DYE','JE','SDC','SO'])
    ->where('Div_id', '=', $divid)
    ->Where('Sub_Div_id','=', $subdivid)
    ->get();

    }
    //dd($data);
    return view('User.userslist',['users'=>$data]);
}



public function editUsersData($id)
{ 
//    dd('ok');
     // login user session Data----------------------------
     $usercode = auth()->user()->usercode;
     $divid = auth()->user()->Div_id;
     $subdivid = auth()->user()->Sub_Div_id;
    //  $usertypes = auth()->user()->usertypes;

     // login user session Data----------------------------
//   dd($usertypes,$id);

    $rsDiv=DB::table('divisions')->where('div_id' , $divid)->get();


    // if($usertypes === "EE" || $usertypes === "PA")
    // {
    // // $rsDesignation = DB::table('designations')
    // // ->whereIn('Designation_code', 1)
    // // ->get();

    // $rsDesignation = DB::table('designations')
    // ->select('Designation')
    // ->where('Designation_code', 1)
    // ->get();
    //  } 
    //  elseif ($usertypes === "DYE"){
    //     // dd('ok');

    //         // $rsDesignation = DB::table('designations')
    //         // ->whereIn('Designation_code', 2)
    //         // ->get();

    //         $rsDesignation = DB::table('designations')
    //         ->select('Designation')
    //         ->where('Designation_code', 2)
    //         ->get();
    //          } 

    //          elseif ($usertypes === "PO"){
    //             // dd('ok');
        
    //                 // $rsDesignation = DB::table('designations')
    //                 // ->whereIn('Designation_code', 2)
    //                 // ->get();
        
    //                 $rsDesignation = DB::table('designations')
    //                 ->select('Designation')
    //                 ->where('Designation_code', 3)
    //                 ->get();
    //                  } 

    //                  elseif ($usertypes === "SO")
    //                  {
    //                     // dd('ok');
                
    //                         // $rsDesignation = DB::table('designations')
    //                         // ->whereIn('Designation_code', 2)
    //                         // ->get();
                
    //                         $rsDesignation = DB::table('designations')
    //                         ->select('Designation')
    //                         ->where('Designation_code', 3)
    //                         ->get();
    //                          } 
        



    //                  elseif ($usertypes === "AAO"){
    //                     // dd('ok');
                
    //                         // $rsDesignation = DB::table('designations')
    //                         // ->whereIn('Designation_code', 2)
    //                         // ->get();
                
    //                         $rsDesignation = DB::table('designations')
    //                         ->select('Designation')
    //                         ->where('Designation_code', 4)
    //                         ->get();
    //                          } 

    //                          elseif ($usertypes === "audit"){
    //                             // dd('ok');
                        
    //                                 // $rsDesignation = DB::table('designations')
    //                                 // ->whereIn('Designation_code', 2)
    //                                 // ->get();
                        
    //                                 $rsDesignation = DB::table('designations')
    //                                 ->select('Designation')
    //                                 ->where('Designation_code', 5)
    //                                 ->get();
    //                                  } 

    //                                  elseif ($usertypes === "SDC"){
    //                                     // dd('ok');
                                
    //                                         // $rsDesignation = DB::table('designations')
    //                                         // ->whereIn('Designation_code', 2)
    //                                         // ->get();
                                
    //                                         $rsDesignation = DB::table('designations')
    //                                         ->select('Designation')
    //                                         ->where('Designation_code', 6)
    //                                         ->get();
    //                                          } 
    //          elseif($usertypes === "Agency")
    //          {
    //             // $rsDesignation = DB::table('designations')
    //             // ->whereIn('Designation_code', 7)
    //             // ->get();

    //             $rsDesignation = DB::table('designations')
    //             ->select('Designation')
    //             ->where('Designation_code', 7)
    //             ->get();
    //              } 
    // dd($rsDesignation);





    // if($usertypes === "EE" || $usertypes === "PA"){

    // $rsDesignation = DB::table('designations')
    // ->whereIn('designationid', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 19])
    // ->get();

    //  } 

    //  if($usertypes === "EE" || $usertypes === "PA"){

    //     $rsDesignation = DB::table('designations')
    //     ->whereIn('designationid', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 19])
    //     ->get();
        
    //      } 
    
        //  if($usertypes === "DYE"){

        //     $rsDesignation = DB::table('designations')
        //     ->whereIn('designationid', [12, 13, 14, 15, 16 , 20])
        //     ->get();
            
        //      } 
//     //dd($rsDesignation);
$selectedDesignationname=DB::table('users')
->where('id',$id)
->value('Designation');
// dd($selectedDesignationname);

$Designationcode=DB::table('designations')
->where('Designation',$selectedDesignationname)
->value('Designation_code');
// dd($selectedDesignationname,$Designationcode);

$designationlist=DB::table('designations')
->select('Designation')
->where('Designation_code',$Designationcode)
->get('Designation');
// dd($selectedDesignationname,$Designationcode,$designationlist);




   $rsAllUserList = User::get()->whereNotIn('usertypes', ['EE','PA']);
       $rsFundedList = DB::table('fundhdms')->get();
       $rsSubDevisionList = DB::table('subdivms')
       ->where('Div_Id','=',$divid)->get();
       $rsWorkMaster =DB::table('workmasters')
       ->where('Sub_Div_Id','=',$subdivid)->get();

       $user = User::find($id);
       $usertype= $user->usertypes;
    // dd($usertype , $id);
      if($usertype === 'SDC')
      {
        $sign=DB::table('sdcmasters')->where('userid' , $user->id)->value('sign');
      }
      if($usertype === 'audit')
      {
        $sign=DB::table('abmasters')->where('userid' , $user->id)->value('sign');
      }
      if($usertype === 'AAO')
      {
        // dd($usertype);
        $sign=DB::table('daomasters')->where('userid' , $user->id)->value('sign');
      }
      if($usertype === 'SO' || $usertype === 'PO') 
      {
        $sign=DB::table('jemasters')->where('userid' , $user->id)->value('sign');
        //dd($sign);
      }
      if($usertype === 'DYE' || $usertype === 'PA')
      {
        // dd('ok');
        $sign=DB::table('dyemasters')->where('userid' , $user->id)->value('sign');
        // dd($sign);
      }
      if($usertype === 'EE')
      {
        $sign=DB::table('eemasters')->where('userid' , $user->id)->value('sign');
      }
      if($usertype === 'Agency')
      {
        $sign=DB::table('agencies')->where('userid' , $user->id)->value('agencysign');
      }
     //dd($sign);
   $imagePath =  $sign;
   $imageUrl = url('Uploads/signature/' . $imagePath);
   //$imageData = base64_encode(file_get_contents($imagePath));
   //$imageSrc = 'data:image/jpeg;base64,' . $imageData;
//   dd($imageUrl);
    return view('User.edituser',['user'=>$user ,
     'rsUser'=>$rsAllUserList,
    'rsFund'=>$rsFundedList,
    'rsSubDiv'=>$rsSubDevisionList,
    'rsWorkMaster'=>$rsWorkMaster , 
    'rsDiv'=>$rsDiv , 
    'imagePath' => $imageUrl,
    'selectedDesignationname'=>$selectedDesignationname,
    'designationlist'=>$designationlist]);
}

//edit user data    

public function storeeditUsersData(Request $request)
    {
        // $request->validate([
        //     //'name' => 'required|string|max:255',
        //     //'Usernm' => 'required|regex:/^\S*$/u|string|max:15|unique:users',
        //     //'email' => 'required|string|email|max:255|unique:users',
        //     //'mobileno'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
        //     //'password' => 'required|string|confirmed|min:6',
        //      //'signature' => 'required|file|mimes:jpeg,jpg|max:2048', // Adjust file validation as needed
        // ]);
// dd($request);


$divisionId = PublicDivisionId::DIVISION_ID;
// dd($divisionId);
        // Check Division Or SubDivision ID
        if($request->Div_id){
          $concatDivORSubDivID = $request->Div_id;
        }
        if($request->Sub_Div_id){
          $concatDivORSubDivID = $request->Sub_Div_id;
        }


        $DivisionIDLength = strlen($concatDivORSubDivID);
        if((int)$DivisionIDLength === 1){
            $DivisionID = $concatDivORSubDivID."000";
        }else if((int)$DivisionIDLength === 2){
            $DivisionID = $concatDivORSubDivID."00";
        }else if((int)$DivisionIDLength === 3){
            $DivisionID = $concatDivORSubDivID."0";
        }else if((int)$DivisionIDLength === 4){
            $DivisionID = $concatDivORSubDivID;
        }


        //User code Genration Functionality
        $SQLNewPKID = DB::table('users')
        ->selectRaw(" MAX(CAST(right(IFNULL(usercode,'0'),4)AS UNSIGNED)) as usercode ")
        ->limit(1)
        ->get();
        $RSNewPKID = json_decode($SQLNewPKID);
        if(isset($RSNewPKID[0]->usercode) && !empty($RSNewPKID[0]->usercode)){
            $PrimaryNumber=$RSNewPKID[0]->usercode + 1;
        }else{
            $PrimaryNumber='1';
        }
        $lenght = strlen($PrimaryNumber);  //Calculate Lenght
        if((int)$lenght === 1){ //Places Zero Functionality
            $placezero = '000';
        }else if((int)$lenght === 2){
            $placezero = '00';
        }else if((int)$lenght === 3){
            $placezero = '0';
        }else{
            $placezero = '';
        }


       
        $filePath = null;       // $filePath='';
        if ($request->hasFile('signature')) {
                    $file = $request->file('signature');
                    //dd($file);
                    // Use storeAs to generate a unique filename
                    $filePath = time() . '_' . $file->getClientOriginalName();
                    //dd($filePath);
                    // Move the file to the desired directory
                    $file->move(public_path('Uploads/signature'), $filePath);
                            //dd($filePath);
                            // Save $filePath to the database or associate it with the user record as needed
                            // For example: $user->signature_path = $filePath; $user->save();
        }
       

        $role=$request->usertypes;

        if($role === 'PA' || $role === 'EE' ||  $role === 'AAO' || $role === 'audit' || $role === 'PO' || $role === 'Agency')
        {

           

          $subDivid=$divisionId ."0";
        }
        else
        {
            $subDivid=$request->Sub_Div_id;
        }

    //dd($request);
        $usercode = $DivisionID.$placezero.$PrimaryNumber;
        $user = User::where('id', $request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobileno'=>$request->mobileno,
            'Div_id'=>$request->Div_id,
            'Sub_Div_id'=>$subDivid,
            'Designation'=>$request->Designation,
            'usercode'=>$usercode,
            'usertypes'=>$request->usertypes,
            'Usernm'=>$request->Usernm,
            'period_from'=>$request->period_from,
        ]);

        
       
      // dd($lastInsertedUserId);
     //dd($role);
     if($role === 'EE')
     {
       

        $previousSignaturePath= DB::table('eemasters')->where('userid', $request->user_id)->value('sign');
        if ($filePath == null) {
            //dd($filePath);
            $filePath = $previousSignaturePath;
        }
        
        
                DB::table('eemasters')->where('userid', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'divid'=>$request->Div_id,
                // 'subdiv_id'=>$request->Sub_Div_id,
                'Designation'=>$request->Designation,
                'user_name'=>$request->Usernm,
                'sign'=>$filePath,
            
                'period_from'=>$request->period_from,
            ]);
     }


     if($role === 'DYE' || $role === 'PA')
     {
        $lastid = DB::table('dyemasters')->orderBy('dye_id', 'desc')->first();

        $previousSignaturePath= DB::table('dyemasters')->where('userid', $request->user_id)->value('sign');
        if ($filePath == null) {
            //dd($filePath);
            $filePath = $previousSignaturePath;
        }
        
       
                DB::table('dyemasters')->where('userid', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                'subdiv_id'=>$subDivid,
                'designation'=>$request->Designation,
                'user_name'=>$request->Usernm,
                'sign'=>$filePath,
              
                'period_from'=>$request->period_from,
            ]);
     }



     if($role === 'SO' || $role === 'PO')
     {

        $previousSignaturePath= DB::table('jemasters')->where('userid', $request->user_id)->value('sign');
        if ($filePath == null) {
            //dd($filePath);
            $filePath = $previousSignaturePath;
        }
       // dd($filePath);
                DB::table('jemasters')->where('userid', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                'subdiv_id'=>$subDivid,
                'designation'=>$request->Designation,
                'username'=>$request->Usernm,
                'sign'=>$filePath,
                'period_from'=>$request->period_from,
            ]);
     }


     if($role === 'AAO')
     {
       
        $previousSignaturePath= DB::table('daomasters')->where('userid', $request->user_id)->value('sign');
        if ($filePath == null) {
            //dd($filePath);
            $filePath = $previousSignaturePath;
        }
                DB::table('daomasters')->where('userid', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                // 'subdiv_id'=>$subDivid,
                'designation'=>$request->Designation,
                'username'=>$request->Usernm,
                'sign'=>$filePath,
                'period_from'=>$request->period_from,
            ]);
     }


     
     if($role === 'audit')
     {

        $previousSignaturePath= DB::table('abmasters')->where('userid', $request->user_id)->value('sign');
        if ($filePath == null) {
            //dd($filePath);
            $filePath = $previousSignaturePath;
        }
        
                DB::table('abmasters')->where('userid', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                'subdiv_id'=>$subDivid,
                'designation'=>$request->Designation,
                'username'=>$request->Usernm,
                'sign'=>$filePath,
                'period_from'=>$request->period_from,
            ]);
     }

     if($role === 'SDC')
     {
        
        $previousSignaturePath= DB::table('sdcmasters')->where('userid', $request->user_id)->value('sign');
        if ($filePath == null) {
            //dd($filePath);
            $filePath = $previousSignaturePath;
        }

                DB::table('sdcmasters')->where('userid', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no'=>$request->mobileno,
                'div_id'=>$request->Div_id,
                'subdiv_id'=>$subDivid,
                'designation'=>$request->Designation,
                'username'=>$request->Usernm,
                'sign'=>$filePath,
                'period_from'=>$request->period_from,
            ]);
     }




     



        //event(new Registered($user));
        return redirect('userslist')->with('success','Record save successfully.');
    }

    public function FunDeleteUser(Request $request, $id)
    {      
        // dd($id);
        $selectdetailuser = DB::table('users')
        ->where('id', $id)
        ->first();

    // Check if the user is of type 'EE' or 'AAO'
    if ($selectdetailuser->usertypes === 'EE') {
        // Delete from 'eemasters'
        $del=DB::table('eemasters')
            ->where('userid', $id)
            ->delete();
// dd($del);
    }
    elseif ($selectdetailuser->usertypes === 'PA') {
        // Delete from 'daomasters'
        DB::table('dyemasters')
            ->where('userid', $id)
            ->delete();
    }
 elseif ($selectdetailuser->usertypes === 'DYE') {
    // Delete from 'daomasters'
    DB::table('dyemasters')
        ->where('userid', $id)
        ->delete();
}
elseif ($selectdetailuser->usertypes === 'PO') {
    // Delete from 'daomasters'
    DB::table('jemasters')
        ->where('userid', $id)
        ->delete();
}

elseif ($selectdetailuser->usertypes === 'SO') {
    // Delete from 'daomasters'
    DB::table('jemasters')
        ->where('userid', $id)
        ->delete();
}

elseif ($selectdetailuser->usertypes === 'audit') {
    // Delete from 'daomasters'
    DB::table('abmasters')
        ->where('userid', $id)
        ->delete();
}

     elseif ($selectdetailuser->usertypes === 'AAO') {
        // Delete from 'daomasters'
        DB::table('daomasters')
            ->where('userid', $id)
            ->delete();
    }

    elseif ($selectdetailuser->usertypes === 'Agency') {
        // Delete from 'daomasters'
        DB::table('agencies')
            ->where('userid', $id)
            ->delete();
    }
    
        elseif ($selectdetailuser->usertypes === 'SDC') {
        // Delete from 'daomasters'
        DB::table('sdcmasters')
            ->where('userid', $id)
            ->delete();
    }

    

        $deleteUser=DB::table('users')
        ->where('id',$id)
        ->delete();
        // dd($deleteUser);
        return redirect('userslist');


    }



}
