<?php

namespace App\Http\Controllers;
use App\Models\Agency;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\PublicDivisionId;


class AgencyController extends Controller
{
    public function funcreateagency(Request $request)
    {

        $divisionId = PublicDivisionId::DIVISION_ID;
        // dd($divisionId);

        $Agencyid=$maxId = DB::table('agencies')->max('id');
        // dd($Agencyid);
        if ($Agencyid !== null && is_numeric($Agencyid)) {
            $incrementedLastTwoDigit = str_pad((int)substr($Agencyid, -2) + 1, 2, '0', STR_PAD_LEFT);
            // dd($incrementedLastTwoDigit);
            $FinalAgencyid = $divisionId . $incrementedLastTwoDigit;
        } else {
            // If max value is not found or is not numeric, set a default value
            $FinalAgencyid = $divisionId . '01';
        }        
        // dd($FinalAgencyid);


         $agency=
            DB::table('agencies')->insert([

            'id'=>$FinalAgencyid,
            'agency_nm' => $request-> agency_nm,
            'Agency_Ad1'=> $request-> Agency_Ad1,
            'Agency_Ad2' => $request-> Agency_Ad2,
            'Agency_Pl' => $request-> Agency_Pl,
            'Agency_Mail' => $request-> Agency_Mail,
            'Agency_Phone' => $request-> Agency_Phone,	
            'User_Name' => $request-> User_Name,
            'Password' => $request-> Password,
            'Regi_No_Local' => $request-> Regi_No_Local,
            'Gst_no' => $request-> Gst_no,
            'Regi_Class' => $request-> Regi_Class,
            'Pan_no' => $request-> Pan_no,
            'Regi_Dt_Local' => $request-> Regi_Dt_Local,
            'Bank_nm' => $request-> Bank_nm,
            'Ifsc_no' => $request-> Ifsc_no,
            'Bank_br' => $request-> Bank_br,
            'Micr_no' => $request-> Micr_no,
            'Bank_acc_no' => $request-> Bank_acc_no,
            'Contact_Person1' => $request-> Contact_Person1,
            'C_P1_Phone' => $request-> C_P1_Phone,
            'C_P1_Mail' => $request-> C_P1_Mail

         ]);

         Alert::success('Congrats', 'You\'ve Succesfully add the data');
         return redirect('agency');
    }


    
    public function index() {
         $users = DB::select('select * from agencies');
        return view('listagencies',['users'=>$users]);

        // $users = DB::table('agencies')->where('agency_nm','sandeep')->first();
        // // dd($users);
        // return $users->Agency_Phone;

        // $user = DB::table('agencies')->find(3);


        // $titles = DB::table('agencies')->pluck('agency_nm');
        //     foreach ($titles as $title) {
        //     echo $title;


        // $titles = DB::table('agencies')->pluck('agency_nm','C_P1_Phone');
        //    foreach ($titles as $title) {
        //      echo $title;
        //     }
       
        // DB::table('agencies')->orderBy('Agency_Ad1')->chunk(100, function (Collection $users) {
        //     // Process the records...
         
        //     return false;
        // });



        // DB::table('agencies')->where('agency_nm', false)
        //       ->chunkById(5, function (Collection $users) {
        //           foreach ($users as $user) {
        //                 DB::table('agencies')
        //                 ->where('Agency_id', $user->Agency_id)
        //              ->update(['agencies' => true]);
        //             }
        //  });
        

        // DB::table('agencies')->orderBy('Agency_Id')->lazy()->each(function (object $user) {
        //     // ...
        // });



        // $users = DB::table('agencies')->count();
        // $price = DB::table('agencies')->max('agency_nm');
        //  return $price;



        // if (DB::table('agencies')->where('agency_nm', 'sandeep')->doesntExist()) {
            
        //     return true;
        // }


    //     $users = DB::table('agencies')
    //     ->select('agency_nm', 'Agency_Mail as user_email')
    //     ->get();
    //     dd($users);
    //   return $users;



    // $users = DB::table('agencies')->distinct()->get();
    // return $users;


    // $query = DB::table('agencies')->select('agency_nm');
    //  $users = $query->addSelect('agency_nm')->get();
    //    return $users;

    // $users = DB::table('divisions')
    // ->select(DB::raw('count(*) as user_count, status'))
    // ->where('status', '<>', 1)
    // ->groupBy('status')
    // ->get();

    }



// Edit agency


    public function edit($id)
    {
        $users = Agency::find($id);
        // return $users;
    
     return view('editagency',['users'=>$users]);  
        // ['users'=>$users]
    }

    public function update(Request $request, $id)
    {
        $users = Agency::find($id);
        $users->agency_nm = $request->input('agency_nm');
        $users->Agency_Ad1 = $request->input('Agency_Ad1');
        $users->Agency_Ad2 = $request->input('Agency_Ad2');
        $users->Agency_Pl = $request->input('Agency_Pl');
        $users->Agency_Mail = $request->input('Agency_Mail');
        $users->Agency_Phone = $request->input('Agency_Phone');
        $users->User_Name = $request->input('User_Name');
        $users->Password = $request->input('Password');
        $users->Regi_No_Local = $request->input('Regi_No_Local'); 
        $users->Gst_no = $request->input('Gst_no');
        $users->Regi_Class = $request->input('Regi_Class');
        $users->Pan_no = $request->input('Pan_no');
        $users->Regi_Dt_Local = $request->input('Regi_Dt_Local');
        $users->Bank_nm = $request->input('Bank_nm');
        $users->Ifsc_no = $request->input('Ifsc_no');
        $users->Bank_br = $request->input('Bank_br');
        $users->Micr_no = $request->input('Micr_no');
        $users->Bank_acc_no = $request->input('Bank_acc_no');
        $users->Contact_Person1 = $request->input('Contact_Person1');
        $users->C_P1_Phone = $request->input('C_P1_Phone');
        $users->C_P1_Mail = $request->input('C_P1_Mail');

        // $users->update();
         if($users->update())
        {
            Alert::success('Congrats', 'You\'ve Successfully Edit the data');
        }
       
        return redirect()->back();


}


//view


public function viewagencydata($id)
{
    $users = Agency::find($id);
    //dd($users);
    // return $users;
 return view('view_agency',['users'=>$users]);  
    // ['users'=>$users]
}


//Delete

public function del(Request $request)
    {
        $users = Agency::select("*")->where('isdelete','=',1)->paginate(8);
        return view('listagencies', compact('users'))->with('no', 1);
    }



    // public function deleteagency($id)
    // {
    //     if($isdelete=1)
    //     {
    //     Agency::find($id)->delete();
    //     }

    //     return back();   
    // }
    public function deleteagency($id)
    { 
        
        
        // $query = "UPDATE agencies SET isdelete = $isdelete WHERE id = $id";
        if($id)
        {
        $query = DB::table('agencies')
              ->where('id', $id)
              ->update(['isdelete' => 0]);

       
        return back();
        }
        // $query = "delete agencies SET isdelete = 0 WHERE id = $id";
        // DB::statement($query);
    
        // return back();
        
    }




}

