<?php

namespace App\Http\Controllers;

use App\Models\ExecutiveEng;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\PublicDivisionId;





class ExecutiveEngController extends Controller
{
    // public $divisionId = 147;
    
    public function funBeforCreateExecutiveEng(Request $data)
    {
        // dd('ok');
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
        ->where('Designation_code', 1)
        ->get();
        // dd( $DBDesignation);
        return view('executive',compact('DBDivlist','DBSubDivlist','DBDesignation'));

    }

    public function funCreateExecutiveEng(Request $data)
    {
        // $divisionId = PublicDivisionId::DIVISION_ID;
        // dd($divisionId);
        $divname=$data->divname;
        // dd($divname);
        $divid=DB::table('divisions')
        ->where('div',$divname)
        ->value('div_id');
        // dd($divid);
        $DBSubDivname=$data->Subdivname;
        // dd($DBSubDivname);
        $SubDivId=DB::table('subdivms')
        ->where('Div_Id',$divid)
        ->where('Sub_Div',$DBSubDivname)
        ->value('Sub_Div_Id');
        // dd($SubDivId);
        // $users = DB::table('eemasters')->get()->toArray();
        // $DBDivisions=DB::table('divisions')
        // ->select('div')
        // ->where('div_id',$divisionId)
        // ->get();
            // foreach ($users as $user) {
            //     $div_id = $user->divid; // Accessing div_id for the current user
            //     $subdiv_id = $user->subdiv_id;
            //     // dd($subdiv_id); // Accessing subdiv_id for the current user
            // // For example, you might want to retrieve related division and subdivision names
            //     $division = DB::table('divisions')->where('div_id', $div_id)->value('div');
            //     $subdivision = DB::table('subdivms')->where('Sub_Div_Id', $subdiv_id)->value('Sub_Div');
            // // dd($division,$subdivision);
            //     $user->division_name = $division;
            //     $user->subdivision_name = $subdivision;
            // }
    

        // $DBDivisionslist=DB::table('divisions')
        // ->select('div')
        // ->where('div_id',$divisionId)
        // ->get();
        // // dd( $DBDivisionslist);
        // $DSdivision = DB::table('divisions')
        //     ->select('div_m')
        //     ->where('div_id', $divisionId)
        //     ->get();
            $eeid=$maxId = DB::table('eemasters')->max('eeid');
            // dd($eeid);
            if ($eeid !== null && is_numeric($eeid)) {
                $incrementedLastTwoDigit = str_pad((int)substr($eeid, -2) + 1, 2, '0', STR_PAD_LEFT);
                // dd($incrementedLastTwoDigit);
                $FinalEEid = $divid . $incrementedLastTwoDigit;
            } else {
                // If max value is not found or is not numeric, set a default value
                $FinalEEid = $divid . '01';
            }        
            // dd($FinalEEid);

    // dd($DSdivision);
        // Create the ExecutiveEng record
        DB::table('eemasters')->insert([
            'divid'=>$divid,
            // 'subdiv_id'=>$SubDivId,
            'eeid'=>$FinalEEid,
            'subname' => $data->exname_categary,
            'name' => $data->ex_name,
            'name_m'=>$data->ex_name_M,
            'period_from' => $data->charge_from,
            'period_upto' => $data->charge_upto,
            'pf_no'=>$data->pf_no,
            'phone_no' => $data->phone_no,
            'email' => $data->email,
            'user_name' => $data->user_name,
            'Designation'=>$data->designation,
            'pwd' => $data->pwd,
        ]);    
        // Flash a success message and redirect to the view
        Alert::success('Success', 'You\'ve Successfully Registered');
        // return view('viewexecutive')->with(compact('DSdivision','DBDivisionslist','users'));
        return redirect('listexecutive');

    }
    
    public function funindexexecutiveEng() 
    {

        $divisionId = PublicDivisionId::DIVISION_ID;
        // dd($divisionId);
        // $users = DB::table('eemasters')->paginate(5);  

        $users = DB::table('eemasters')->get()->toArray();
    //    dd($users);
    $DBDivisions=DB::table('divisions')
    ->where('div_id',$divisionId)
    ->value('div');
    // dd($DBDivisions);
        foreach ($users as $user) {
            $div_id = $user->divid; // Accessing div_id for the current user
            // $subdiv_id = $user->subdiv_id;
            // dd($subdiv_id); // Accessing subdiv_id for the current user
        // For example, you might want to retrieve related division and subdivision names
            $division = DB::table('divisions')->where('div_id', $div_id)->value('div');
            $subdivision = DB::table('subdivms')->value('Sub_Div');
        // dd($division,$subdivision);
            $user->division_name = $division;
            $user->subdivision_name = $subdivision;
        }
        // dd($users);

         return view('viewexecutive', ['users' => $users,'DBDivisions'=>$DBDivisions]);


     }




     public function FunEditExecutiveEng($id)
     {
        $divisionId = PublicDivisionId::DIVISION_ID;
       // dd($divisionId);

        $user = DB::table('eemasters')->where('eeid', $id)->first();
        // return $user;
        // dd($user);

        $Div=DB::table('divisions')
        ->select('div')
        ->where('div_id',$user->divid)
        ->get();
        // dd($Div);


        $SubDiv=DB::table('subdivms')
        ->select('Sub_Div')
        // ->where('Sub_Div_Id',$user->subdiv_id)
        ->get();
        // dd($SubDiv);

        $SubDivList=DB::table('subdivms')
        ->select('Sub_Div')
        ->where('div_id',$divisionId)
        ->get();
        // dd($SubDiv,$SubDivList);
        // dd($user->Designation);
        $SelectedDesignation=$user->Designation;
        // dd($SelectedDesignation);
        $designatioid=DB::table('designations')
        ->where('designation',$user->Designation)
        ->value('designationid');

        $designationList=DB::table('designations')
        ->where('Designation_code',1)
        ->get();

        // dd($user->Designation,$designatioid,$designationList);


        return view('updateexecutive',['user'=>$user,
        'Div'=>$Div,
        'SubDiv'=>$SubDiv,
        'SubDivList'=>$SubDivList,
        'designationList'=>$designationList,
        'SelectedDesignation'=>$SelectedDesignation
    
    ]);
     }

     public function FunUpdateExecutiveEng(Request $request, $ee_id)
    {
        $divisionId = PublicDivisionId::DIVISION_ID;
       // dd($divisionId);


        $user=DB::table('eemasters')->where('eeid' ,$ee_id)->first();

        // dd($user);
        
                $Divname=$request->input('division_name');
                // dd($Divname);
        $divId=DB::table('divisions')
        ->select('div_id')
        ->where('div',$Divname)
        ->value('div_id');
        // dd($Divname,$divId);
        
        
        
        $ee_id=$user->eeid;
        // dd($ee_id);
        DB::table('eemasters')->where('eeid', $ee_id)->update([
            'divid'=>$divId,
            'subname'=>$request->input('subname'),
            'name' => $request->input('ex_name'),
            'name_m' => $request->input('ee_name_M'),
            'Designation' => $request->input('designation'),
            'period_from' => $request->input('charge_from'),
            'period_upto' => $request->input('charge_upto'),
            'pf_no' => $request->input('PF_no'),
            'phone_no' => $request->input('phone_no'),
            'email' => $request->input('email'),
            'user_name' => $request->input('user_name'),
            'pwd' => $request->input('pwd'),
        ]);
        
        // $user->update();
        // dd($ee_id);
        Alert::success('Success', 'Record updated successfully');

        return redirect('listexecutive');

    }

    public function FunshowExecutiveEng($id)
    {
        $divisionId = PublicDivisionId::DIVISION_ID;
        // dd($divisionId);

        $user = DB::table('eemasters')->where('eeid', $id)->first();
        // dd($user,$user->divid);
        $Div=DB::table('divisions')
        ->where('div_id',$user->divid)
        ->value('div');
        // dd($user,$user->divid,$Div);

        // dd($Div);


       return view('showexecutive',['user'=>$user,'Div'=>$Div]);
    }














     public function funDeleteExecutiveEng($id)
     {
        DB::table('eemasters')->where('eeid', $id)->delete();
        return redirect('listexecutive');
     }
 

}
