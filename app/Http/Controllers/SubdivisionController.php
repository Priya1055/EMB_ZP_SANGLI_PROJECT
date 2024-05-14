<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subdivms;
use RealRashid\SweetAlert\Facades\Alert;
use DB;


class SubdivisionController extends Controller
{

    
public function getDivisions(Request $request)
{
    $DSdivision = DB::table('divisions')
        ->where('div_id', 147)
        ->select('div_m')
        ->get();
// Add debugging code
    dd($DSdivision);
    return response()->json($DSdivision);
}
    
    public function getSubDivision()
    {
        $DSdivision = DB::table('subdivms')
        ->where('Div_Id',147)
         ->select('Sub_Div_M')
         ->get();
         // dd($circle,$DSdivision);
     return response()->json($DSdivision);

    }


    public function funCreate(Request $data)
    {
        $RegionId = DB::table('regions')
            ->where('Reg_Id', 1)
            ->value('Reg_Id');
    
        $circleId = DB::table('circles')
            ->where('Cir_Id', 14)
            ->value('Cir_Id');
    
        $divisionId = DB::table('divisions')
            ->where('div_id', 147)
            ->value('div_id');
    
        $selectedsubdiv = $data->input('Sub_Div_Id');
        $subdivisionId = DB::table('subdivms')
            ->where('Sub_Div_M', $selectedsubdiv)
            ->value('Sub_Div_Id');
    
        // Create the Subdivms record
        $subdivision = DB::table('subdivms')->insert([
            'Reg_Id' => $RegionId,
            'Cir_Id' => $circleId,
            'Div_Id' => $divisionId,
            'Sub_Div_Id' => $subdivisionId,
            'Sub_Div' => $data->Sub_Div_Id,
            'address1' => $data->address1,
            'address2' => $data->address2,
            'place' => $data->place,
            'email' => $data->email,
            'phone_no' => $data->phone_no,
            'designation' => $data->designation
        ]);
    
        // Debugging output
        // dd($subdivision);
    
        // Display success message and return view
        Alert::success('Success', 'You\'ve Successfully Registered');
        return view('subdivision', compact('RegionId', 'circleId', 'divisionId', 'subdivisionId'));
    }
    

    
    public function index() 
    {

        $div=DB::table('divisions')
        ->select('div')
        ->where('div_id',147)
        ->get();
        $subdiv=DB::table('subdivms')
        ->select('Sub_Div')
        ->where('Div_Id',147)
        ->get();


// dd($subdiv);
        $users = Subdivms::paginate(10);

        $users = DB::table('subdivms')
        ->where('Div_Id',147)
        ->get()->toArray();
        //    dd($users);
            foreach ($users as $user) {
                $div_id = $user->Div_Id; // Accessing div_id for the current user
                $subdiv_id = $user->Sub_Div_Id; // Accessing subdiv_id for the current user
            // For example, you might want to retrieve related division and subdivision names
                $division = DB::table('divisions')->where('div_id', $div_id)->value('div');
                $subdivision = DB::table('subdivms')->where('Sub_Div_Id', $subdiv_id)->value('Sub_Div');
            // dd($division,$subdivision);
                $user->division_name = $division;
                $user->subdivision_name = $subdivision;
            }
    
//   dd($users);
         return view('viewsubdivision', compact('users','div','subdiv'));
        //  return $users;
 

     }

     public function FunEditSubdivision($Sub_Div_Id)
     {
        // dd($Sub_Div_Id);
        $subdiv=DB::table('subdivms')
        ->select('Sub_Div')
        ->where('Sub_Div_Id' ,$Sub_Div_Id)
        ->get();
        $subdivlist=DB::table('subdivms')
        ->select('Sub_Div')
        ->where('div_id', 147)
        ->get();
        // dd($subdiv,$subdivlist);
        $div = DB::table('divisions')
        ->select('div')
        ->where('div_id', 147)
        ->get();

    
    $user = Subdivms::where('Sub_Div_Id', $Sub_Div_Id)->first();
    
    return view('updatesubdivision', [
        'user' => $user,
        'div' => $div, 
        'subdiv'=>$subdiv,
        'subdivlist'=>$subdivlist,
        
        ]);
     }





public function update(Request $request, $Sub_Div_Id)
    {
        $regionId=1;
        $CircleId=14;
        $divisionname = $request->input('division_name');
        // dd($divisionname);
        $DivId=DB::table('divisions')
        ->select('div_id')
        ->where('div',$divisionname)
        ->value('div_id');
        // dd($DivId);
        $subdiv=$request->input('subdivision_name');
        // dd($subdiv);
        $subdivid=DB::table('subdivms')
        ->select('Sub_Div_Id')
        ->where('Sub_Div',$subdiv)
        ->value('Sub_Div_Id');
        // dd($subdivid);
        $subdivname = $request->input('subdivision_name');
        $subdivnameM = $request->input('subdivision_nameM');

        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $place = $request->input('place');
        $email = $request->input('email');
        $phone_no = $request->input('phone_no');
        $designation = $request->input('designation');



        $user = DB::table('subdivms')
        ->where('Sub_Div_Id', $Sub_Div_Id)
        ->update([
            'Reg_Id'=>$regionId,
            'Cir_Id'=>$CircleId,
            'Div_Id'=>$DivId,
            'Sub_Div_Id'=>$subdivid,
            'Sub_Div' => $subdivname,
            // 'Sub_Div_M'=>$subdivnameM,
            'address1' => $address1,
            'address2' => $address2,
            'place' => $place,
            'email' => $email,
            'phone_no' => $phone_no,
            'designation' => $designation,
        ]);
        // $user->update();
        dd($user);


        Alert::success('Success', 'You\'ve Successfully Registered');

        return redirect('listsubdivisions');

    }

    public function show($Sub_Div_Id)
    {
       $user=Subdivms::where('Sub_Div_Id' ,$Sub_Div_Id)->first();
       // return $user;
       return view('showsubdivision',['user'=>$user]);
    }




    public function funDeleteSubdivision($Sub_Div_Id)
    {
        Subdivms::where('Sub_Div_Id', $Sub_Div_Id)->delete();

        // Subdivision::find($id)->delete();
        return back();
    }






// DB::delete('delete from subdivisions where id=?' ,[$id]);
// return redirect('listsubdivisions')->with('success','Record Deleted');



   }





