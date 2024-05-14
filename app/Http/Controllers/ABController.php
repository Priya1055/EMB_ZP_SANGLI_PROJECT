<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\PublicDivisionId;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class ABController extends Controller
{
    public function FunindexAB(Request $request)
    {
        // dd('ok');
        $users=DB::table('abmasters')->get();
        // dd($users);
        $divNames = [];
        $SubdivNames = [];
        
        foreach ($users as $user) {
            $userDivName = DB::table('divisions')
                ->where('div_id', $user->div_id)
                ->value('div');
        
            // Add the division name to the array
            $divNames[] = $userDivName;
        
            $userSubDivName = DB::table('subdivms')
                ->where('Div_Id', $user->div_id)
                ->where('Sub_Div_Id', $user->subdiv_id)
                ->value('Sub_Div');
        
            // Add the subdivision name to the array
            $SubdivNames[] = $userSubDivName;
        }
        
        // Pass both arrays to the view
        return view('listAB', ['users' => $users, 'divNames' => $divNames, 'SubdivNames' => $SubdivNames]);
    
    }

    public function FunEditAB(Request $request,$id)
    {
// dd($id);

$divisionId = PublicDivisionId::DIVISION_ID;
$DivisionOffer = $divisionId ."0";

// dd($divisionId,$DivisionOffer);

 $user = DB::table('abmasters')->where('AB_Id', $id)->first();
//  dd($user);

 $Div=DB::table('divisions')
 ->select('div')
 ->where('div_id',$user->div_id)
 ->get();
 // dd($Div);

 // dd($user->Designation);
 $SelectedDesignation=$user->designation;
 // dd($SelectedDesignation);
 $designatioid=DB::table('designations')
 ->where('designation',$user->designation)
 ->value('designationid');

 $designationList=DB::table('designations')
 ->where('Designation_code',5)
 ->get();

  //dd($designatioid,$designationList,$SelectedDesignation);


 return view('UpdateAB',['user'=>$user,
 'Div'=>$Div,
//  'SubDiv'=>$SubDiv,
//  'SubDivList'=>$SubDivList,
 'designationList'=>$designationList,
 'SelectedDesignation'=>$SelectedDesignation

]);

return view('UpdateAB');
    
}

public function FunUpdateauditor(Request $request, $abid)
{

    $divisionId = PublicDivisionId::DIVISION_ID;
    // dd($divisionId);


     $user=DB::table('abmasters')->where('AB_Id' ,$abid)->first();

     $Divname=$request->input('division_name');
     // dd($Divname);
$divId=DB::table('divisions')
->select('div_id')
->where('div',$Divname)
->value('div_id');
// dd($Divname,$divId);



$abid=$user->AB_Id;
// dd($ee_id);
DB::table('abmasters')->where('AB_Id', $abid)->update([
 'div_id'=>$divId,
 'subname'=>$request->input('subname'),
 'name' => $request->input('ex_name'),
 'name_m' => $request->input('ee_name_M'),
 'designation' => $request->input('designation'),
 'period_from' => $request->input('charge_from'),
 'period_upto' => $request->input('charge_upto'),
 'pf_no' => $request->input('PF_no'),
 'phone_no' => $request->input('phone_no'),
 'email' => $request->input('email'),
 'username' => $request->input('user_name'),
]);

// $user->update();
// dd($ee_id);
Alert::success('Success', 'Record updated successfully');

return redirect('listAB');
}



public function FunViewAB(Request $request,$id)
{
// dd($id);

$divisionId = PublicDivisionId::DIVISION_ID;
$DivisionOffer = $divisionId ."0";

// dd($divisionId,$DivisionOffer);

$user = DB::table('abmasters')->where('AB_Id', $id)->first();
//  dd($user);

$Div=DB::table('divisions')
->select('div')
->where('div_id',$user->div_id)
->get();
// dd($Div);

// dd($user->Designation);
$SelectedDesignation=$user->designation;
// dd($SelectedDesignation);
$designatioid=DB::table('designations')
->where('designation',$user->designation)
->value('designationid');

$designationList=DB::table('designations')
->where('Designation_code',5)
->get();

//dd($designatioid,$designationList,$SelectedDesignation);


return view('ViewAb',['user'=>$user,
'Div'=>$Div,
//  'SubDiv'=>$SubDiv,
//  'SubDivList'=>$SubDivList,
'designationList'=>$designationList,
'SelectedDesignation'=>$SelectedDesignation

]);


}


}