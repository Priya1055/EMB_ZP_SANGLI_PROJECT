<?php

namespace App\Http\Controllers;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\PublicDivisionId;


class DivisionController extends Controller
{

//for region find
    public function getRegions() {
        $regions = DB::table('regions')->select('Region')->get();
       // dd($regions);
        return response()->json($regions); // Return the regions as JSON
    }
    
    public function getCircles(Request $request)
    {
        $region = $request->input('region');
       // dd($region);
       $regionid=DB::table('regions')->where('Region', '=', $region)->get()->value('Reg_Id');
        $circles = DB::table('circles')
            ->where('Reg_Id', $regionid)
            ->get();
           // dd($circles);
        return response()->json($circles);
    }

    public function getDivisions(Request $request)
    {
        $circle = $request->input('circle');
        
        $circleid=DB::table('circles')->where('Circle', '=', $circle)->get()->value('Cir_Id');
        $divisions = DB::table('divisions')
            ->where('cir_id', $circleid)
            ->get();
            
        return response()->json($divisions);
    }

    
    // data inserting function
    public function funCreate(Request $request)
    {
        // dd($request);
    // ['users'=>$users]
   $region=$request->input('region');

   $circle=$request->input('circle');
   //dd($region);
   
   //dd($request->division_name);
   $regid=DB::table('regions')->where('Region', '=', $region)->get()->value('Reg_Id');

   $cirid=DB::table('circles')->where('Circle', '=', $circle)->get()->value('Cir_Id');
   //dd($cirid);
    $sub_division = DB::table('divisions')->insert([
        'reg_id' => $regid,
        'cir_id' => $cirid,
        'div' => $request->division_name,
        'address1' => $request->address1,
        'address2' => $request->address2,
        'place' => $request->place,
        'email' => $request->email,
        'phoneno' => $request->phoneno,
        'designation' => $request->designation
    ]);

        Alert::success('Congrats', 'You\'ve Succesfully add the data');
        return redirect('division');
    }

    public function index1() {

        $divregid=DB::table('divisions')->get()->value('reg_id');
        //dd($divregid); 

        $regid=DB::table('regions')->where('Reg_Id', '=', $divregid)->value('Region');
        //dd($regid);

        $divcircleid=DB::table('divisions')->get()->value('cir_id');
        //dd($divregid); 

        $cirid=DB::table('circles')->where('Cir_Id', '=', $divcircleid)->value('Circle');
        //dd($cirid);
       
        $users = DB::table('divisions')
        ->join('regions', 'divisions.reg_id', '=', 'regions.Reg_Id')
        ->join('circles', 'divisions.cir_id', '=', 'circles.Cir_Id')
        ->where('div_id' ,'=', '147')
        ->select('divisions.*', 'regions.Region', 'circles.Circle')
        ->get();
          //dd($users);
          return view('listdivision',['users'=>$users]);



        // $users = DB::table('divisions')
        //      ->select(DB::raw('count(*) as user_count, division_name'))
        //      ->where('division_name', '<>', 1)
        //      ->groupBy('division_name')
        //      ->get();

        //      return $users;


        // $user = DB::table('divisions')->first();
        // return $user;



     }

//Edit division


     public function edit($id)
    {
        // dd($id);
        $divisionId = PublicDivisionId::DIVISION_ID;

        $users = DB::table('divisions')->where('div_id', $id)->first();
// dd($users);
$Div=DB::table('divisions')
->select('div')
->where('div_id',$divisionId)
->get();
// dd($Div);


     return view('editdivision',['users'=>$users,'Div'=>$Div]);  
        // ['users'=>$users]
    }
    public function update(Request $request, $id)
    {
        DB::table('divisions')->where('div_id', $id)->update([
        'div' => $request->input('division_name'),
    'address1'=> $request->input('address1'),
    'address2'=>$request->input('address2'),
        'place'=>$request->input('place'),
       'email'=> $request->input('email'),
        'phoneno'=> $request->input('phoneno'),
       'designation'=> $request->input('designation')
    ]);

        // $users->update();
       
        return redirect('listdivision');


}

//view data division
public function viewdivisiondata($div_id)
{
    //dd($div_id);
    $users = DB::table('divisions')
    ->join('regions', 'divisions.reg_id', '=', 'regions.Reg_Id')
    ->join('circles', 'divisions.cir_id', '=', 'circles.Cir_Id')
    ->where('div_id', '=', $div_id)
    ->get();
    //dd($users);
    // return $users;
 return view('view_division',['users'=>$users]);  
    // ['users'=>$users]
}


// public function deletedivision($id)
// {
//     $users = Division::find($id);

//     if ($users) {
//         $users->delete();
//         // Division deleted successfully, perform any additional actions if needed.
//         return redirect()->back()->with('success', 'Division deleted successfully.');
//     } else {
//         // Division not found, handle the error or show a message.
//         return redirect()->back()->with('error', 'Division not found.');
//     }
// }
// public function del(Request $request)
//     {
//         $users = Division::select("*")->where('isdelete','=',1)->paginate(8);
//         return view('listdivision', compact('users'))->with('no', 1);
//     }

public function deletedivision($id)
{
    // dd($id);
    DB::table('divisions')->where('div_id', $id)->delete();

    // If you have a Division model, you can use the following instead:
    // Division::where('div_id', $id)->delete();

    return back();
}
    // public function deletedivision($id)
    // {
    //     if($id)
    //     {
    //    $query = DB::table('divisions')
    //           ->where('id', $id)
    //           ->update(['isdelete' => 0]);

    //           return back();
    //      }

// }
}
