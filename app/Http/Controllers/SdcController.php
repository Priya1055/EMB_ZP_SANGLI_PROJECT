<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\PublicDivisionId;
use Illuminate\Support\Facades\DB;
// use RealRashid\SweetAlert\Facades\Alert;
// use App\Helpers\PublicDivisionId;
use RealRashid\SweetAlert\Facades\Alert;



class SdcController extends Controller
{
    //
    public function FunindexSDC(Request $request)
    {
        // dd('ok');
        $users=DB::table('sdcmasters')->get();
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
        return view('listsdc', ['users' => $users, 'divNames' => $divNames, 'SubdivNames' => $SubdivNames]);
    
    }

    
    public function FunDropdownselectInsertsdc(Request $request)
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
       return view('sdc',compact('DBDivlist','DBSubDivlist','DBDesignation'));

    }

    
    public function FuninsertSDCengineer(Request $request)
    {


              $division=$request->divname;
            //  dd($division);
             $subdivision=$request->Subdivname;
            //  dd($subdivision);

        $divid=DB::table('divisions')->where('div' ,  $division)->get()->value('div_id');
        //dd($divid);
        $subdivid=DB::table('subdivms')->where('Sub_Div' ,  $subdivision)->get()->value('Sub_Div_Id');
        // dd($subdivid);
        $maxsdcid = DB::table('sdcmasters')
        ->where('subdiv_id',$subdivid)
        ->max('SDC_id');
        // dd($maxsdcid);

        if ($maxsdcid !== null && is_numeric($maxsdcid)) {
            // Extract the last three digits, increment, and pad with zeros
            $incrementedLastThreeDigits = str_pad((int)substr($maxsdcid, -2) + 1, 2, '0', STR_PAD_LEFT);
            // dd($incrementedLastThreeDigits);

            // Assuming $subdivid is defined somewhere in your code
            $FinalJe_id = $subdivid . $incrementedLastThreeDigits;
        } else {
            // If max value is not found or is not numeric, set a default value
            $FinalJe_id = $subdivid . '01';
        }
        // dd($FinalJe_id);


        $password=$request->password;
        // dd($password);

        $pfnumber=$request->pf_number;


        $ispfno=$request->pf_number_value;

        
        // dd($has_pf_number);
        if($ispfno == 0)
        {
          $previouspfnumber=DB::table('sdcmasters')
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


        $Juniorengineer=DB::table('sdcmasters')->insert([
           
            
            'div_id'=>$divid,
            'subdiv_id'=>$subdivid,
            'SDC_id' => $FinalJe_id,
            'designation'=>$request->designation, 
            'period_from'=>$request->chargefrom,
            'period_upto'=>$request->chargeupto,
            'pf_no' => $newpfnumber,
            'phone_no'=>$request->mobileno,
            'email'=>$request->email,
            'username'=>$request->username,
            // 'password'=>$request->password,
            'name'=>$request->name,
            'ispfno' => $ispfno
        ]);

        Alert::success('Congrats', 'You\'ve Succesfully add the data');
        // return redirect('juniorengineer');
        // $users=DB::select('select * from jemasters');
        return redirect('listSDC');

        // return view('listjuniorengineer',['users'=>$users]);

    }


    
                    // FuneditSDCengineer
    public function FuneditSDCengineer(Request $request,$SDC_id)
    {
        // dd("ok......");


        $user=DB::table('sdcmasters')->where('SDC_id' ,$SDC_id)->first();
       // dd($user);
        $Div=DB::table('divisions')
        ->select('div')
        ->where('div_id',$user->div_id)
        ->get();
    //   / dd($Div);


        $SubDiv=DB::table('subdivms')
        ->select('Sub_Div')
        ->where('Sub_Div_Id',$user->subdiv_id)
        ->get();
       //dd($SubDiv);

        $SubDivList=DB::table('subdivms')
        ->select('Sub_Div')
        ->where('div_id',147)
        ->get();
        //   /dd($SubDiv,$SubDivList);

        // dd($user->designation);
        $designationList = DB::table('designations')->where('Designation_code', 6)->get();
        //dd($designationList);
        
        $selectedDesignation = $user->designation ?? '';
       //dd($selectedDesignation);

       return view('UpdateSdc',['user' => $user, 'Div' => $Div, 'SubDivList'=>$SubDivList,'SubDiv' => $SubDiv,'designationList'=>$designationList,'selectedDesignation'=>$selectedDesignation]);
    }


    public function FunSdcUpdate(Request $request,$SDC_id)
    {
        // /dd($request);
        $user=DB::table('sdcmasters')->where('SDC_id' ,$SDC_id)->first();
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
       //dd($subDivname,$subdivId);

        $SDC_id=$user->SDC_id;

// sdc masters field  to be updated........

        DB::table('sdcmasters')->where('SDC_id' ,$SDC_id)->update([
            'subdiv_id'=>$subdivId,
            'SDC_id' => $SDC_id,
            'subname' => $request->input('subname'),
            'name' => $request->input('ex_name'),
            'name_m' => $request->input('sdc_name_M'),
            'period_from' => $request->input('charge_from'),
            'period_upto' => $request->input('charge_upto'),
            'phone_no' => $request->input('phone_no'),
            'email' => $request->input('email'),
            'pf_no' => $request->input('PF_no'),
            'designation' => $request->input('designation'),
            'username' => $request->input('user_name'),
        ]);
                // $user->update();

                // Alert::success('Success', 'Successfully Updated....')->toToast();
                Alert::success('Success', 'Successfully Updated....')->autoclose(30000);



        return redirect('listSDC');
    }

        public function FunSdcDelete(Request $request,$SDC_id)
        {   
        // dd("OKKKKKKKK delete");
        $query = DB::table('sdcmasters')
        ->where('SDC_id', $SDC_id)
        ->delete();
        return back();

        }



        public function FunViewSdc($SDC_id)
        {
            // /dd("Ok view");
            $user=DB::table('sdcmasters')->where('SDC_id' ,$SDC_id)->first();
           //dd($user    pf_no);
             $Div=DB::table('divisions')
             ->select('div')
             ->where('div_id',$user->div_id)
             ->first();
            //dd($Div->div);
     
     
             $SubDiv=DB::table('subdivms')
             ->select('Sub_Div')
             ->where('Sub_Div_Id',$user->subdiv_id)
             ->first();
            // /dd($SubDiv);
    
           return view('viewSdc',['user'=>$user,'Div'=>$Div,'SubDiv'=>$SubDiv]);
        }
    }









