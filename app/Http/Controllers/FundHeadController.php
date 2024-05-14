<?php

namespace App\Http\Controllers;

use App\Models\Fundhead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FundHeadController extends Controller
{

    // insert fund head function
    
    public function insertfundhead(Request $request)
    {
        $fundhead=Fundhead::create([
       'fhcode'=>$request->fhcode,
       'fundhead'=>$request->fundhead,
       'fundhead_m'=>$request->fundhead_m
        ]);

        Alert::success('Congrats', 'You\'ve Succesfully add the data');
        return redirect('fundhead');
    }


    // list data of fund head function

    public function listfundhead()
    {
       
        $listfundhead=DB::select('select * from fundheads');

        return view('listfundhead',compact('listfundhead'));
    }


    //edit and update fund head functions

    // edit fund head page get the data
    
    public function editfundhead($id)
    {
        $editfundhead=DB::table('fundhdms')->where('F_H_CODE', $id)->first();
    
        return view('editfundhead', compact('editfundhead'));
    }

    // update fund head page function

    public function updatefundhead(Request $request , $id)
    {

        $updatefundhead=Fundhead::find($id);
        $updatefundhead->fhcode = $request->input('fhcode');
        $updatefundhead->fundhead=$request->input('fundhead');
        $updatefundhead->fundhead_m=$request->input('fundhead_m');

        if($updatefundhead->update())
        {
            Alert::success('Congrats', 'You\'ve Succesfully Edit the data'); 
        }
        return redirect()->back();

    }



    // view fund head function

    public function viewfundhead($id)
    {
       $viewfundhead=DB::table('fundhdms')->where('F_H_CODE' , $id)->first();

       return view('view_fundhead', compact('viewfundhead'));
    }



    // delete  fund head function



    // get all table rows for delete function

    public function getalltablerowsfundhead(Request $request)
    {
        $listfundhead = DB::table('fundhdms')->select("*")->where('is_delete','=',1)->paginate(8);
        return view('listfundhead', compact('listfundhead'))->with('no', 1);

       
        
    }
    


    // delete the data row function
    public function deletefundhead($id)
    {
        if($id)
        {
            $query = DB::table('fundhdms')
            ->where('F_H_CODE', $id)
            ->update(['is_delete' => 0]);

            return back();
        }
    } 
}
