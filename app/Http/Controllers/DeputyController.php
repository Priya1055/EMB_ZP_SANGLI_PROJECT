<?php

namespace App\Http\Controllers;

use App\Models\Deputy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; 
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\PublicDivisionId;



class DeputyController extends Controller
{
    public function funindexdeputyEng() 
    {


        // $users =DB::table('dyemasters')->paginate(5);
        $users = DB::table('dyemasters')->get()->toArray();
        //    dd($users);
            foreach ($users as $user) {
                $div_id = $user->div_id; // Accessing div_id for the current user
                $subdiv_id = $user->subdiv_id; // Accessing subdiv_id for the current user
            // For example, you might want to retrieve related division and subdivision names
                $division = DB::table('divisions')->where('div_id', $div_id)->value('div');
                $subdivision = DB::table('subdivms')->where('Sub_Div_Id', $subdiv_id)->value('Sub_Div');
            // dd($division,$subdivision);
                $user->division_name = $division;
                $user->subdivision_name = $subdivision;
            }
            // dd($users);
    
  
         return view('viewdeputy', ['users' => $users]);
         return $users;


     }

     public function funDropdowndeputyEng(Request $data)
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

     public function funCreateDeputyEng(Request $data)
     {
        //  dd($data);
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

        $dye_id = DB::table('dyemasters')->max('dye_id');
        // dd($eeid);
        if ($dye_id !== null && is_numeric($dye_id)) {
            $incrementedLastTwoDigit = str_pad((int)substr($dye_id, -2) + 1, 2, '0', STR_PAD_LEFT);
            // dd($incrementedLastTwoDigit);
            $FinalDyeid = $SubDivId . $incrementedLastTwoDigit;
        } else {
            // If max value is not found or is not numeric, set a default value
            $FinalDyeid = $SubDivId . '01';
        }        
        // dd($FinalEEid);

// dd($DSdivision);
    // Create the ExecutiveEng record
    DB::table('dyemasters')->insert([


             'div_id' => $divid,
             'subdiv_id' => $SubDivId,
            'dye_id'=>$FinalDyeid,
             'Subname' => $data->dename_categary,
             'name'=>$data->dpt_name,
             'name_m'=>$data->dpt_name_marathi,
             'designation'=>$data->designation,
             'period_from' => $data->charge_from,
             'period_upto'=>$data->charge_upto,
             'phone_no'=>$data->phone_no,
             'email'=>$data->email,
             'user_name'=>$data->user_name,
             'pwd'=>$data->pwd,
         ]);
 
         //event(new Registered($user));
         Alert::success('Success', 'You\'ve Successfully Registered');
        //  return view('viewdeputy');
        return redirect('listdeputy');
                //  return view('deputy');


 
 
 
     }
 
 
 
     public function funEditDeputyEng($id)
     {
        $user=DB::table('dyemasters')->where('dye_id' ,$id)->first();
        // dd($user);
        $Div=DB::table('divisions')
        ->select('div')
        ->where('div_id',$user->div_id)
        ->get();
        // dd($Div);


        $SubDiv=DB::table('subdivms')
        ->select('Sub_Div')
        ->where('Sub_Div_Id',$user->subdiv_id)
        ->get();
        // dd($SubDiv);

        $SubDivList=DB::table('subdivms')
        ->select('Sub_Div')
        ->where('div_id',147)
        ->get();
        // dd($SubDiv,$SubDivList);

        // dd($user->designation);
        $designationList = DB::table('designations')->where('Designation_code', 2)->get();
        $selectedDesignation = $user->designation ?? '';

        // return $user;
        return view('updatedeputy',['user'=>$user,
        'Div'=>$Div,
        'SubDiv'=>$SubDiv,
        'SubDivList'=>$SubDivList,
        'designationList'=>$designationList,
        'selectedDesignation'=>$selectedDesignation
    ]);
     }





public function FunDeputyUpdate(Request $request, $dye_id)
    {
        $user=DB::table('dyemasters')->where('dye_id' ,$dye_id)->first();

// dd($user);

        $Divname=$request->input('division_name');
        // dd($Divname);
$divId=DB::table('divisions')
->select('div_id')
->where('div',$Divname)
->value('div_id');
// dd($Divname,$divId);


$subDivname=$request->input('subdivision_name');
// dd($subDivname);
$subdivId=DB::table('subdivms')
->select('Sub_Div_Id')
->where('Sub_Div',$subDivname)
->value('div_id');
// dd($subDivname,$subdivId);

$dye_id=$user->dye_id;
// dd($dye_id);


DB::table('dyemasters')->where('dye_id', $dye_id)->update([
    'div_id'=>$divId,
    'subdiv_id'=>$subdivId,
    'name' => $request->input('dpt_name'),
    'name_m' => $request->input('dpt_name_M'),
    'designation' => $request->input('designation'),
    'period_from' => $request->input('charge_from'),
    'period_upto' => $request->input('charge_upto'),
    'pf_no' => $request->input('PF'),
    'phone_no' => $request->input('phone_no'),
    'email' => $request->input('email'),
    'user_name' => $request->input('user_name'),
    'pwd' => $request->input('pwd'),
]);
        // $user->update();

        Alert::success('Success', 'You\'ve Successfully Registered');

        return redirect('listdeputy');

    }




    public function FunShowDeputyEng($id)
    {
       $user=DB::table('dyemasters')->where('dye_id' ,$id)->first();
;       $Div=DB::table('divisions')
       ->where('div_id',$user->div_id)
       ->value('div');
    //    dd($Div);


       $SubDiv=DB::table('subdivms')
       ->where('Sub_Div_Id',$user->subdiv_id)
       ->value('Sub_Div');
    //    dd($SubDiv);



       return view('showdeputy',['user'=>$user,'Div'=>$Div,'SubDiv'=>$SubDiv]);
    }


    













     public function funDeleteDeputyEng($id)
     {
        // dd($id);
        $query = DB::table('dyemasters')
        ->where('dye_id', $id)
        ->delete();
        return back();

    
        // Deputy::find($id)->delete();
        //  return back();
     }



}
