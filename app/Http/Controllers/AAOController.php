<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\PublicDivisionId;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class AAOController extends Controller
{
    public function FunindexAAO(Request $request)
    {
        // dd('ok');
        $users=DB::table('daomasters')->get();
        // dd($users);
        $divNames = [];
        $SubdivNames = [];
        $designationNames=[];
        
        foreach ($users as $user) {
            $userDivName = DB::table('divisions')
                ->where('div_id', $user->div_id)
                ->value('div');
        
            // Add the division name to the array
            $divNames[] = $userDivName;
        
            $userSubDivName = DB::table('subdivms')
                ->where('Div_Id', $user->div_id)
                ->value('Sub_Div');
        
            // Add the subdivision name to the array
            $SubdivNames[] = $userSubDivName;


            $userDEsignationName=DB::table('designations')
            ->where('designationid', $user->designation)
            ->value('Designation');
            $designationNames[]=$userDEsignationName;
     
        }
        
        // Pass both arrays to the view
        return view('listAAO', ['users' => $users, 'divNames' => $divNames,
         'SubdivNames' => $SubdivNames,
        'designationNames'=>$designationNames]);
    }


    public function FunDropdownselectInsertAAO(Request $data)
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
       ->where('Designation_code', 2)
       ->get();
       // dd( $DBDesignation);
       return view('deputy',compact('DBDivlist','DBSubDivlist','DBDesignation'));

       // dd('ok');
    }

    
    public function FunEditAAO(Request $data,$DAO_id)
    {

// dd($DAO_id);

$divisionId = PublicDivisionId::DIVISION_ID;
// dd($divisionId);

$user = DB::table('daomasters')->where('DAO_id', $DAO_id)->first();
// dd($user);

$Div=DB::table('divisions')
->select('div')
->where('div_id',$divisionId)
->get();
// dd($Div);

// dd($SubDiv,$SubDivList);
// dd($user->Designation);
$SelectedDesignation=$user->designation;
// $SelectedDesignation=DB::table('designations')
// ->where('designationid',$designationid)
// ->value('designation');


// dd($SelectedDesignation);

$designationList=DB::table('designations')
->where('Designation_code',4)
->select('Designation')
->get();
// dd($SelectedDesignation,$designationList);


return view('UpdateAAO',['user'=>$user,
'Div'=>$Div,
'designationList'=>$designationList,
'SelectedDesignation'=>$SelectedDesignation ]);
    }

    
    public function FunUpdateAAO(Request $request,$DAO_id)
    {
        // dd($DAO_id);
        $divisionId = PublicDivisionId::DIVISION_ID;
        // dd($divisionId);
 
 
        $user = DB::table('daomasters')->where('DAO_id', $DAO_id)->first();
 
        //  dd($user);
         
         $Divname=$request->input('division_name');
                 // dd($Divname);
         $divId=DB::table('divisions')
         ->select('div_id')
         ->where('div',$Divname)
         ->value('div_id');
         // dd($Divname,$divId);
         
         
        //  dd($request->input('name'));
         $DAO_id=$user->DAO_id;
         // dd($DAO_id);
        //  dd($request->input('designation'));
$Designationname=$request->input('designation');

// dd($Designationname);


         DB::table('daomasters')->where('DAO_id', $DAO_id)->update([
             'div_id'=>$divId,
             'subname'=>$request->input('subname'),
             'name' => $request->input('name'),
             'name_m' => $request->input('AAO_M'),
            //  'designation' => $request->input('designation'),
            'designation' => $Designationname,
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
 
         return redirect('listAAO');
 
 
    }

    public function FunshowAAO(Request $request ,$DAO_id)
    {
        // dd($DAO_id);
        $divisionId = PublicDivisionId::DIVISION_ID;
        // dd($divisionId);

        $user = DB::table('daomasters')->where('DAO_id', $DAO_id)->first();
        // dd($user);
        // dd($user,$user->divid);
        $Div=DB::table('divisions')
        ->where('div_id',$user->div_id)
        ->value('div');
        // dd($user,$user->div_id,$Div);

        return view('showAAO',['user'=>$user,'Div'=>$Div]);


    }

    
    public function  FunDeleteAAO(Request $request, $DAO_id)
    {
// dd($DAO_id);

DB::table('daomasters')->where('DAO_id', $DAO_id)->delete();
return redirect('listAAO');

    }
}
