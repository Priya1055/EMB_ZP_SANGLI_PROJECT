<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JuniorEngineer;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\PublicDivisionId;


class JuniorEngineerController extends Controller
{
//list divisions
    public function getDivisions()
    {
        $divisions = DB::table('divisions')->where('div_id', '=', 147)->select('div')->get();
        //dd($divisions);
        return response()->json($divisions);
    }


    //list subdivisions
    public function getSubdivisions(Request $request)
    {
        $division = $request->input('division');
        //dd($division);
        $divid=DB::table('divisions')->where('div' , $division)->get()->value('div_id');
        $subdivisions = DB::table('subdivms')
            ->where('Div_Id', 147)
            ->select('Sub_Div')
            ->get();
            //dd($subdivisions);
        return response()->json($subdivisions);
    }
    // insert data in junior engineer
    public function FunDropdownselectInsert(Request $request)
    {
        $divisionId = PublicDivisionId::DIVISION_ID;
        // dd($divisionId);
        $DBDivlist=DB::table('divisions')
        ->where('div_id',$divisionId)
        ->value('div');
        // dd($DBDivlist);
        $DBSubDivlist=DB::table('subdivms')
        ->select('Sub_Div')
        ->where('Div_Id',$divisionId)
        ->get();
        // dd($DBSubDivlist);
        $DBDesignation = DB::table('designations')
        ->select('Designation')
        ->where('Designation_code', 3)
        ->get();
        // dd( $DBDesignation);

        // dd($request);
       return view('juniorengineer',compact('DBDivlist','DBSubDivlist','DBDesignation'));
    }





    public function insertjuniorengineer(Request $request)
    {


              $division=$request->divname;
            //  dd($division);
             $subdivision=$request->Subdivname;
            //  dd($subdivision);

        $divid=DB::table('divisions')->where('div' ,  $division)->get()->value('div_id');
//dd($divid);
$subdivid=DB::table('subdivms')->where('Sub_Div' ,  $subdivision)->get()->value('Sub_Div_Id');
// dd($subdivid);
$maxjeid = DB::table('jemasters')->max('jeid');
// dd($maxjeid);

if ($maxjeid !== null && is_numeric($maxjeid)) {
    // Extract the last three digits, increment, and pad with zeros
    $incrementedLastThreeDigits = str_pad((int)substr($maxjeid, -3) + 1, 3, '0', STR_PAD_LEFT);
    // dd($incrementedLastThreeDigits);

    // Assuming $subdivid is defined somewhere in your code
    $FinalJe_id = $subdivid . $incrementedLastThreeDigits;
} else {
    // If max value is not found or is not numeric, set a default value
    $FinalJe_id = $subdivid . '001';
}
// dd($FinalJe_id);


// $previousjeid=DB::table('jemasters')
// ->where('subdiv_id' , $subdivid)
// ->orderBy('jeid', 'desc')
// ->first();
// //dd($previousjeid);

// if ($previousjeid) {
//     // Generate new bill ID
//     $lastFourDigits = substr($previousjeid->jeid, -4);
//     $newLastFourDigits = str_pad((intval($lastFourDigits) + 1), 4, '0', STR_PAD_LEFT);
//     $newjeId = substr_replace($previousjeid->jeid, $newLastFourDigits, -4);

// }
// else
// {
//     $newjeId = $subdivid.'0001';
// }
//dd($newjeId);


    $pfnumber=$request->pf_number;


    $ispfno=$request->pf_number_value;

    
   // dd($has_pf_number);
    if($ispfno == 0)
    {
          $previouspfnumber=DB::table('jemasters')
          ->where('div_id' , $divid)
          ->where('ispfno' , 0)
          ->orderBy('pf_no', 'desc')
          ->first('pf_no');
       //dd($previouspfnumber);

       if ($previouspfnumber) {
        // Generate new bill ID
        $lastFourDigits = substr($previouspfnumber->pf_no, -4);
        $newLastFourDigits = str_pad((intval($lastFourDigits) + 1), 4, '0', STR_PAD_LEFT);
        $newpfnumber = substr_replace($previouspfnumber->pf_no, $newLastFourDigits, -4);
    
            }
        else
        {
               $newpfnumber = $divid.'0001';
               //dd($newpfnumber);
         }


    }

    else
    {

       
        $newpfnumber= $pfnumber;
        //dd($newpfnumber);
    }
    //dd($newpfnumber);


        $Juniorengineer=DB::table('jemasters')->insert([
           
            
            'div_id'=>$divid,
            'subdiv_id'=>$subdivid,
            'jeid' => $FinalJe_id,
            'designation'=>$request->designation, 
            'period_from'=>$request->chargefrom,
            'period_upto'=>$request->chargeupto,
            'pf_no' => $newpfnumber,
            'phone_no'=>$request->mobileno,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>$request->password,
            'name'=>$request->name,
            'ispfno' => $ispfno
        ]);

        Alert::success('Congrats', 'You\'ve Succesfully add the data');
        // return redirect('juniorengineer');
        // $users=DB::select('select * from jemasters');
        return redirect('listjuniorengineer');

        // return view('listjuniorengineer',['users'=>$users]);

    }


    //view data in list format 
    
    public function listjunioreengineer(Request $request)
    {
        dd('ok');
        // $users=DB::select('select * from junior_engineers');
                $users=DB::table('jemasters')->get();
                dd($users);

        return view('listjuniorengineer',['users'=>$users]);

    }


// edit and update the data inside the junior engineer

// edit view page
public function editjuniorengineer($id)
{
    
  $users=DB::table('jemasters')->where('jeid' , $id)->first();
//  dd($users,$users->designation);
  $div=DB::table('divisions')->where('div_id' , $users->div_id)->get()->value('div');
  //dd( $div);
  $selecteddesignation =$users->designation;
  $designationlist=DB::table('designations')
  ->where('Designation_code',3)
  ->select('Designation')->get();
  $subdiv=DB::table('subdivms')->where('Sub_Div_Id' , $users->subdiv_id)->get()->value('Sub_Div');
    return view('editjuniorengineer',['users'=>$users , 'div'=>$div , 'subdiv'=>$subdiv,
'designationlist'=>$designationlist,'selecteddesignation'=>$selecteddesignation]);
}



// update fuction of  junior engineer edit page

public function updatejuniorengineer(Request $request , $id)
{ 

    $division=$request->division_name;
    // dd($division);
    $subdivision=$request->subdivision_name;
$divid=DB::table('divisions')->where('div' ,  $division)->get()->value('div_id');
//dd($divid);
$subdivid=DB::table('subdivms')->where('Sub_Div' ,  $subdivision)->get()->value('Sub_Div_Id');



   $users=DB::table('jemasters')->where('jeid' , $id)->update([


    'div_id'=> $divid,
   'subdiv_id' => $subdivid,
   'jeid' => $id,

   'designation'=>$request->designation, 
   'period_from'=>$request->chargefrom,
   'period_upto'=>$request->chargeupto,
   'phone_no'=>$request->mobileno,
   'email'=>$request->email,
   'username'=>$request->username,
   
   'name'=>$request->name,
   

//    $users->pf_no  = $request->input('pf_number');
//    $users->designation = $request->input('designation');
//    $users->chargefrom = $request->input('chargefrom');
//    $users->chargeupto = $request->input('chargeupto');
//    $users->mobileno = $request->input('mobileno');
//    $users->email = $request->input('email');
//    $users->username = $request->input('username');
//    $users->password = $request->input('password');
]);


    Alert::success('Congrats', 'You\'ve Successfully Edit the data');


return redirect()->back();
}



// view data of junior engineer
public function viewjuniorengineer($id)
{
    
    $users=DB::table('jemasters')->where('jeid' , $id)->first();
    //dd( $users);
    $div_id = $users->div_id; // Accessing div_id for the current user
    $subdiv_id = $users->subdiv_id; // Accessing subdiv_id for the current user

    $division = DB::table('divisions')->where('div_id', $div_id)->value('div');
    $subdivision = DB::table('subdivms')->where('Sub_Div_Id', $subdiv_id)->value('Sub_Div');

    $users->divisionname= $division;
    $users->subdivisionname= $subdivision;

    return view('view_juniorengineer',compact('users'));
}

// get and delete data function of junior engineer

// get function
public function getalltablerows(Request $request)
    {
        // $users = JuniorEngineer::select("*")->where('isdelete','=',1)->paginate(8);
        // $divid=DB::table('jemasters')->get()->value('div_id');
        // $div=DB::table('divisions')->where('div_id' ,  $divid)->get('div');
        //dd($div);
        // $users = DB::table('jemasters')
        //  ->join('divisions', 'jemasters.div_id', '=', 'divisions.div_id')
        //  ->join('subdivms', 'jemasters.subdiv_id', '=', 'subdivms.Sub_Div_Id')
        // ->where('jemasters.isdelete', '=', 1)
        //->where('');
        // ->select('jemasters.*', 'divisions.div', 'subdivms.Sub_Div')
        // ->get();

        $users = DB::table('jemasters')->get()->toArray();
    //    dd($users);
        foreach ($users as $user) {
            $div_id = $user->div_id; // Accessing div_id for the current user
            $subdiv_id = $user->subdiv_id; // Accessing subdiv_id for the current user
        // For example, you might want to retrieve related division and subdivision names
            $division = DB::table('divisions')->where('div_id', $div_id)->value('div');
            $subdivision = DB::table('subdivms')->where('Sub_Div_Id', $subdiv_id)->value('Sub_Div');
        
            $user->division_name = $division;
            $user->subdivision_name = $subdivision;
        //    $user->designation =
        //      $user->period_from 
        //      $user->period_upto 
        //      $user->phone_no 
        //       $user->email 
        //      $user->username

        }

// Now $users will contain the jemasters data with related division and subdivm data

    
        //dd($users);
        //->paginate(8);

        //dd($users);
        //dd($users->div_id);
        return view('listjuniorengineer', ['users' => $users]);
    }


// delete function
public function deletejuniorengineer($id)
{
    // dd($id);
if($id)
{
    $query = DB::table('jemasters')
    ->where('jeid', $id)
    ->delete();
    // ->update(['isdelete' => 0]);
    return back();
}

}

}
