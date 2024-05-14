<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Emb;
use App\Models\Workmaster;
use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\Local\LocalFilesystemAdapter;

// Your code that uses LocalFilesystemAdapter

// ... your code


// ... your code


class MaterialConsController extends Controller
{

    public function materialcon(Request $request)
    {



$workid=$request->workid;
//dd($workid);
$tbillid=$request->t_bill_Id;
return view('materialcon');
}

public function royaltycons(Request $request)
{

    $workid=$request->workid;
    //dd($workid);
    $tbillid=$request->t_bill_Id;
    //dd($tbillid);
    
        $mbstatusSo=DB::table('bills')->where('t_bill_Id',$tbillid)->value('mbstatus_so');
    // dd($mbstatusSo);
    if ($mbstatusSo <= 4) {

    $UpdatembstatusSO=DB::table('bills')
    ->where('work_id',$workid)->update(['mbstatus_so'=>4]);
    // dd($UpdatembstatusSO);
    }


DB::table('royal_d')->where('t_bill_id' , $tbillid)->delete();
DB::table('royal_m')->where('t_bill_id' , $tbillid)->delete();

 //dd($matconsd);
  


 $Billitems=DB::table('bil_item')->where('t_bill_id' , $tbillid)->get();

    /// material consumption data added 

    $srno=1;
    $filteredBillItems = DB::table('bil_item')
    ->where('t_bill_id', $tbillid)
    ->whereIn('t_item_id', function ($query) {
        $query->select('t_item_id')
            ->from('itemcons');
    })
   ->get();
    
   //dd($Billitems , $filteredBillItems);

   $uniquebillitems=$filteredBillItems = DB::table('bil_item')
   ->where('t_bill_id', $tbillid)
   ->whereIn('t_item_id', function ($query) {
       $query->select('t_item_id')
           ->from('itemcons');
   })
  ->get();

   //dd($uniquebillitems);

 $lastSixBillItemId='';
 
 $billrt=null;

 $act_rt = null; // Initialize act_rt variable
 $id=00;
 $Id=00;
 
 foreach($filteredBillItems as $billitem)
{
    //dd($filteredBillItems);
    //$itemid= "0190004340";

    $firstfouricode = '';
    $firsttwoicode = '';
    
    $dsrdata = DB::table('dsr')->where('item_id', $billitem->item_id)->first();
    $schitem = $billitem->sch_item;
    
    //echo $billitem->item_id;
    
    if ($dsrdata) {
        if ($schitem == 1) {
            $firstfouricode = substr($dsrdata->i_code, 0, 4);
            $firsttwoicode = substr($dsrdata->i_code, 0, 2);
        }

        $dsrdata->item = strtoupper($dsrdata->item);
//dd($dsrdata->item);
$firstTwentyChars = substr($dsrdata->item, 0, 20);//dd($leftTwentyChars);

    }
    




if((($firstfouricode == 'BD-A' || $firstfouricode == 'MST1' || $firstfouricode == 'MOST' || $firsttwoicode == 'RD' || $firsttwoicode == 'BR') && strpos($firstTwentyChars, 'EXCAVATION') !== false)
|| (($firsttwoicode == 'RD' || $firstfouricode == 'MST1' || $firstfouricode == 'MOST') && strpos($dsrdata->item, 'EXCAVATION') !== false && strpos($firstTwentyChars, 'CONVEYING') !== false)
)
{
   // dd($firstfouricode , $firsttwoicode);
   //echo('ghhfggh');
   break; // Breaks the loop when the condition is met
}
else{
//echo('exit');
$itemconsdata=DB::table('itemcons')->where('t_item_id' , $billitem->t_item_id)->get();
//dd($itemconsdata , $billitem->t_item_id);
//dd($firstfouricode , $dsrdata->i_code);

 //dd($itemconsdata , $billitem->t_item_id);
 $bmatid='';
 foreach($itemconsdata as $itemacon)
 {


    $matdata=DB::table('mat_mast')->where('mat_id' , $itemacon->mat_id)->first();
     $matqty = $billitem->exec_qty * $itemacon->pc_qty;
   // dd($matdata);
   if (($matdata->mat_gr  == 'Quarrying Material') && ($matdata->royal_rt >= 0 && $matdata->act_royal >= 0)) {
   
    //dd($matdata);
    $lastFourMatId = substr($matdata->mat_id, -4);
   //dd($lastFourMatId);
 //dd($lastSixBillItemId);
//$billrt=null;
if (in_array($lastFourMatId, ['0002', '0895', '1886', '1887'])) {

      
    $firstSixBillItemId = '004349';
    $secondSixBillItemId = '001992';
    
    $firstBillRt = DB::table('bil_item')
        ->where('t_bill_id', $tbillid)
        ->whereRaw("RIGHT(item_id, 6) = ?", [$firstSixBillItemId])
        ->value('bill_rt');
    
    if ($firstBillRt !== null) {
        $billrt = $firstBillRt; // Use the first bill_rt value
        if ($billrt !== null) {
            $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();

           // $newbmatid=$billitem->b_item_id.$itemacon->mat_id;

          


        //$bmatid=$billitem->b_item_id.$Id;

            if ($tmpmatdata->isEmpty()) {
               
                $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatid=$tbillid.$Id;

                DB::table('tmp_mat')->insert([
                    'mat_id' => $matdata->mat_id,
                    'material' => $itemacon->material,
                    't_mat_qty' => $matqty,
                    'mat_rt' =>  $billrt,
                    'mat_unit' => $itemacon->mat_unit,
                    'b_mat_id' => $bmatid
                ]);
        
        
                DB::table('royal_m')->insert([
                        
                    'work_id' => $workid,
                    't_bill_id' =>  $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    'mat_id' => $itemacon->mat_id,
                    'b_mat_id' => $tbillid.$Id,
                    'material' => $itemacon->material,
                    'royal_m' =>  'R',
                    'sr_no' =>  $srno,
                    'mat_unit' =>$itemacon->mat_unit,
                    'royal_rt' =>$billrt,
                    'royal_amt' => null,
                    'tot_m_qty' =>null,
                ]);
                $srno++;
        
        
            }
            else{
                $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();
    
                $bmatid=$bmatdata->b_mat_id;
               }
        
            DB::table('loc_roy')->insert([
                'mat_id' => $itemacon->mat_id,
                'material' => $itemacon->material,
                'mat_qty' => $matqty,
                'pc_qty' => $itemacon->pc_qty,
                't_item_id' => $itemacon->t_item_id,
            ]);
        
                //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
                $pcqty=$itemacon->pc_qty;
        
                $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatdid=$bmatid.$id;
                DB::table('royal_d')->insert([
                    'b_mat_d_id' => $bmatdid,
                    'b_mat_id' => $bmatid,
                    't_bill_id' => $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    't_item_no' => $billitem->t_item_no,
                    'mat_id' =>  $itemacon->mat_id,
                    'sub_no'  => $billitem->sub_no || '',
                    'exs_nm' => $billitem->exs_nm,
                    'exec_qty' => $billitem->exec_qty,
                    'pc_qty' => $itemacon->pc_qty,
                    'mat_qty' => $matqty,
        
                ]);
        
        
                
               
              }
    } else {
        $secondBillRt = DB::table('bil_item')
            ->where('t_bill_id', $tbillid)
            ->whereRaw("RIGHT(item_id, 6) = ?", [$secondSixBillItemId])
            ->value('bill_rt');
    
        if ($secondBillRt !== null) {
            $billrt = $secondBillRt; // Use the second bill_rt value
            if ($billrt !== null) {
                $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();
            


                //$bmatid=$tbillid.$Id;
        
               
            if ($tmpmatdata->isEmpty()) {
               
                $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatid=$tbillid.$Id;

                DB::table('tmp_mat')->insert([
                    'mat_id' => $matdata->mat_id,
                    'material' => $itemacon->material,
                    't_mat_qty' => $matqty,
                    'mat_rt' =>  $billrt,
                    'mat_unit' => $itemacon->mat_unit,
                    'b_mat_id' => $bmatid
                ]);
        
        
                DB::table('royal_m')->insert([
                        
                    'work_id' => $workid,
                    't_bill_id' =>  $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    'mat_id' => $itemacon->mat_id,
                    'b_mat_id' => $tbillid.$Id,
                    'material' => $itemacon->material,
                    'royal_m' =>  'R',
                    'sr_no' =>  $srno,
                    'mat_unit' =>$itemacon->mat_unit,
                    'royal_rt' =>$billrt,
                    'royal_amt' => null,
                    'tot_m_qty' =>null,
                ]);
                $srno++;
        
        
            }
            else{
                $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();
    
                $bmatid=$bmatdata->b_mat_id;
               }
        
            DB::table('loc_roy')->insert([
                'mat_id' => $itemacon->mat_id,
                'material' => $itemacon->material,
                'mat_qty' => $matqty,
                'pc_qty' => $itemacon->pc_qty,
                't_item_id' => $itemacon->t_item_id,
            ]);
        
                //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
                $pcqty=$itemacon->pc_qty;
        
                $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatdid=$bmatid.$id;
                DB::table('royal_d')->insert([
                    'b_mat_d_id' => $bmatdid,
                    'b_mat_id' => $bmatid,
                    't_bill_id' => $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    't_item_no' => $billitem->t_item_no,
                    'mat_id' =>  $itemacon->mat_id,
                    'sub_no'  => $billitem->sub_no || '',
                    'exs_nm' => $billitem->exs_nm,
                    'exec_qty' => $billitem->exec_qty,
                    'pc_qty' => $itemacon->pc_qty,
                    'mat_qty' => $matqty,
        
                ]);
        

            
                

            
                    
                   
                  }
        } else {
            // Both conditions failed, handle the scenario here if needed
           break; // Or set a default value
        }
    }
    

} elseif (in_array($lastFourMatId, ['1883', '1884'])) {
     
    $firstSixBillItemId = '003229';
    
    $firstBillRt = DB::table('bil_item')
        ->where('t_bill_id', $tbillid)
        ->whereRaw("RIGHT(item_id, 6) = ?", [$firstSixBillItemId])
        ->value('bill_rt');
    
    if ($firstBillRt !== null) {
        $billrt = $firstBillRt; // Use the first bill_rt value
        if ($billrt !== null) {
            $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();
        
           


            $bmatid=$billitem->b_item_id.$Id;
    
          
            if ($tmpmatdata->isEmpty()) {
               
                $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatid=$tbillid.$Id;

                DB::table('tmp_mat')->insert([
                    'mat_id' => $matdata->mat_id,
                    'material' => $itemacon->material,
                    't_mat_qty' => $matqty,
                    'mat_rt' =>  $billrt,
                    'mat_unit' => $itemacon->mat_unit,
                    'b_mat_id' => $bmatid
                ]);
        
        
                DB::table('royal_m')->insert([
                        
                    'work_id' => $workid,
                    't_bill_id' =>  $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    'mat_id' => $itemacon->mat_id,
                    'b_mat_id' => $tbillid.$Id,
                    'material' => $itemacon->material,
                    'royal_m' =>  'R',
                    'sr_no' =>  $srno,
                    'mat_unit' =>$itemacon->mat_unit,
                    'royal_rt' =>$billrt,
                    'royal_amt' => null,
                    'tot_m_qty' =>null,
                ]);
                $srno++;
        
        
            }
            else{
                $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();
    
                $bmatid=$bmatdata->b_mat_id;
               }
        
            DB::table('loc_roy')->insert([
                'mat_id' => $itemacon->mat_id,
                'material' => $itemacon->material,
                'mat_qty' => $matqty,
                'pc_qty' => $itemacon->pc_qty,
                't_item_id' => $itemacon->t_item_id,
            ]);
        
                //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
                $pcqty=$itemacon->pc_qty;
        
                $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatdid=$bmatid.$id;
                DB::table('royal_d')->insert([
                    'b_mat_d_id' => $bmatdid,
                    'b_mat_id' => $bmatid,
                    't_bill_id' => $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    't_item_no' => $billitem->t_item_no,
                    'mat_id' =>  $itemacon->mat_id,
                    'sub_no'  => $billitem->sub_no || '',
                    'exs_nm' => $billitem->exs_nm,
                    'exec_qty' => $billitem->exec_qty,
                    'pc_qty' => $itemacon->pc_qty,
                    'mat_qty' => $matqty,
        
                ]);
        

            
        

        
                
               
              }
    } else {
       
           break; // Or set a default value
        
    }
    

} elseif (in_array($lastFourMatId, ['0001', '0013', '0905', '0012', '0018', '0014', '1396', '1402', '1410', '1415'])) {
//dd($uniquebillitems);
$firstSixBillItemId = '001992';
    
$firstBillRt = DB::table('bil_item')
    ->where('t_bill_id', $tbillid)
    ->whereRaw("RIGHT(item_id, 6) = ?", [$firstSixBillItemId])
    ->value('bill_rt');

if ($firstBillRt !== null) {
    $billrt = $firstBillRt; // Use the first bill_rt value
    if ($billrt !== null) {
        $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();
    


        $bmatid=$billitem->b_item_id.$Id;

      
        if ($tmpmatdata->isEmpty()) {
               
            $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
            $bmatid=$tbillid.$Id;

            DB::table('tmp_mat')->insert([
                'mat_id' => $matdata->mat_id,
                'material' => $itemacon->material,
                't_mat_qty' => $matqty,
                'mat_rt' =>  $billrt,
                'mat_unit' => $itemacon->mat_unit,
                'b_mat_id' => $bmatid
            ]);
    
    
            DB::table('royal_m')->insert([
                    
                'work_id' => $workid,
                't_bill_id' =>  $tbillid,
                'b_item_id' => $billitem->b_item_id,
                'mat_id' => $itemacon->mat_id,
                'b_mat_id' => $tbillid.$Id,
                'material' => $itemacon->material,
                'royal_m' =>  'R',
                'sr_no' =>  $srno,
                'mat_unit' =>$itemacon->mat_unit,
                'royal_rt' =>$billrt,
                'royal_amt' => null,
                'tot_m_qty' =>null,
            ]);
            $srno++;
    
    
        }
        else{
            $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();

            $bmatid=$bmatdata->b_mat_id;
           }
    
        DB::table('loc_roy')->insert([
            'mat_id' => $itemacon->mat_id,
            'material' => $itemacon->material,
            'mat_qty' => $matqty,
            'pc_qty' => $itemacon->pc_qty,
            't_item_id' => $itemacon->t_item_id,
        ]);
    
            //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
            $pcqty=$itemacon->pc_qty;
    
            $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
            $bmatdid=$bmatid.$id;
            DB::table('royal_d')->insert([
                'b_mat_d_id' => $bmatdid,
                'b_mat_id' => $bmatid,
                't_bill_id' => $tbillid,
                'b_item_id' => $billitem->b_item_id,
                't_item_no' => $billitem->t_item_no,
                'mat_id' =>  $itemacon->mat_id,
                'sub_no'  => $billitem->sub_no || '',
                'exs_nm' => $billitem->exs_nm,
                'exec_qty' => $billitem->exec_qty,
                'pc_qty' => $itemacon->pc_qty,
                'mat_qty' => $matqty,
    
            ]);
    

    
    
            
           
          }
} else {
   
       break; // Or set a default value
    
}

}


    //dd($matdata);
  } 


 }
    //$matdata=DB::table('mat_mast')->where('t_item_id' , $billitem->t_item_id)


}
}

$roundof = DB::table('loc_roy')
    ->select('mat_id', DB::raw('SUM(mat_qty) as total_qty'))
    ->groupBy('mat_id')
    ->get();

foreach($roundof as $sum) {
    $roundedQty = round($sum->total_qty, 2);

    DB::table('tmp_mat')->where('mat_id' , $sum->mat_id)->update([
        't_mat_qty' => $roundedQty,
    ]);

    DB::table('royal_m')->where('mat_id' , $sum->mat_id)->update([
        'tot_m_qty' => $roundedQty,
        // You can calculate 'royal_amt' here if needed
    ]);
}


    DB::table('tmp_mat')->delete();
    DB::table('loc_roy')->delete();
//dd($summedQty);



// //---------------------------------------------------------------------------------------------------------------------------
// //check all process for surcharge royalty items









// Array to store the last 6 digits of item IDs
$lastSixDigits = [];

// Extracting the last 6 digits of each item ID
foreach ($Billitems as $item) {
    $itemId = substr($item->item_id, -6); // Assuming 'itemid' is the column name
    $lastSixDigits[] = $itemId;
}

// Array containing the required last 6 digit values to check
$requiredDigits = ['004346', '004347', '004348'];

// Checking if any required digit is present
$anyDigitPresent = false;
foreach ($requiredDigits as $digit) {
    if (in_array($digit, $lastSixDigits)) {
        $anyDigitPresent = true;
        break;
    }
}

// Outputting the result based on the check



$billrate=null;

$billitemdata=DB::table('bil_item')->where('t_bill_id' , $tbillid)->get();



//dd($anyDigitPresent);


if ($anyDigitPresent) {
 


foreach($filteredBillItems as $billitem)
{

    
    //dd($Billitems);
    //$itemid= "0190004340";
    $firstfouricode = '';
    $firsttwoicode = '';
    
    $dsrdata = DB::table('dsr')->where('item_id', $billitem->item_id)->first();
    $schitem = $billitem->sch_item;
    
   // echo $billitem->item_id;
    
    if ($dsrdata) {
        if ($schitem == 1) {
            $firstfouricode = substr($dsrdata->i_code, 0, 4);
            $firsttwoicode = substr($dsrdata->i_code, 0, 2);
        }

        $dsrdata->item = strtoupper($dsrdata->item);
//dd($dsrdata->item);
$firstTwentyChars = substr($dsrdata->item, 0, 20);//dd($leftTwentyChars);

    }
    
    

if((($firstfouricode == 'BD-A' || $firstfouricode == 'MST1' || $firstfouricode == 'MOST' || $firsttwoicode == 'RD' || $firsttwoicode == 'BR') && strpos($firstTwentyChars, 'EXCAVATION') !== false)
|| (($firsttwoicode == 'RD' || $firstfouricode == 'MST1' || $firstfouricode == 'MOST') && strpos($dsrdata->item, 'EXCAVATION') !== false && strpos($firstTwentyChars, 'CONVEYING') !== false)
)
{
    //dd($firstfouricode , $firsttwoicode);
   //echo('ghhfggh');
   break; // Breaks the loop when the condition is met
}
else{
//echo('exit');
$itemconsdata=DB::table('itemcons')->where('t_item_id' , $billitem->t_item_id)->get();
//dd($itemconsdata , $billitem->t_item_id);
//dd($firstfouricode , $dsrdata->i_code);

 //dd($itemconsdata , $billitem->t_item_id);
 $bmatid='';

 foreach($itemconsdata as $itemacon)
 {
    $matdata=DB::table('mat_mast')->where('mat_id' , $itemacon->mat_id)->first();

                    $matqty = $billitem->exec_qty * $itemacon->pc_qty;

   // dd($matdata);
   if (($matdata->mat_gr == 'Quarrying Material') && ($matdata->royal_rt >= 0 && $matdata->act_royal >= 0)) {
   
  
    //dd($matdata);
    $lastFourMatId = substr($matdata->mat_id, -4);
   //dd($lastFourMatId);
 //dd($lastSixBillItemId);
//$billrt=null;
if (in_array($lastFourMatId, ['0002', '0895', '1886', '1887'])) {


   
    $firstSixBillItemId = '004347';
    $secondSixBillItemId = '004346';
    
    $firstBillRt = DB::table('bil_item')
        ->where('t_bill_id', $tbillid)
        ->whereRaw("RIGHT(item_id, 6) = ?", [$firstSixBillItemId])
        ->value('bill_rt');
    
    if ($firstBillRt !== null) {
        $billrate = $firstBillRt; // Use the first bill_rt value
        if ($billrate !== null) {
            $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();
        
             if ($tmpmatdata->isEmpty()) {
               
                $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatid=$tbillid.$Id;

                DB::table('tmp_mat')->insert([
                    'mat_id' => $matdata->mat_id,
                    'material' => $itemacon->material,
                    't_mat_qty' => $matqty,
                    'mat_rt' =>  $billrate,
                    'mat_unit' => $itemacon->mat_unit,
                    'b_mat_id' => $bmatid
                ]);
        
        
                DB::table('royal_m')->insert([
                        
                    'work_id' => $workid,
                    't_bill_id' =>  $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    'mat_id' => $itemacon->mat_id,
                    'b_mat_id' => $tbillid.$Id,
                    'material' => $itemacon->material,
                    'royal_m' =>  'S',
                    'sr_no' =>  $srno,
                    'mat_unit' =>$itemacon->mat_unit,
                    'royal_rt' =>$billrate,
                    'royal_amt' => null,
                    'tot_m_qty' =>null,
                ]);
                $srno++;
        
        
            }
            else{
                $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();
    
                $bmatid=$bmatdata->b_mat_id;
               }
        
            DB::table('loc_roy')->insert([
                'mat_id' => $itemacon->mat_id,
                'material' => $itemacon->material,
                'mat_qty' => $matqty,
                'pc_qty' => $itemacon->pc_qty,
                't_item_id' => $itemacon->t_item_id,
            ]);
        
                //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
                $pcqty=$itemacon->pc_qty;
        
                $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatdid=$bmatid.$id;
                DB::table('royal_d')->insert([
                    'b_mat_d_id' => $bmatdid,
                    'b_mat_id' => $bmatid,
                    't_bill_id' => $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    't_item_no' => $billitem->t_item_no,
                    'mat_id' =>  $itemacon->mat_id,
                    'sub_no'  => $billitem->sub_no || '',
                    'exs_nm' => $billitem->exs_nm,
                    'exec_qty' => $billitem->exec_qty,
                    'pc_qty' => $itemacon->pc_qty,
                    'mat_qty' => $matqty,
        
                ]);
        
                
               
              }
    } else {
        $secondBillRt = DB::table('bil_item')
            ->where('t_bill_id', $tbillid)
            ->whereRaw("RIGHT(item_id, 6) = ?", [$secondSixBillItemId])
            ->value('bill_rt');
    
        if ($secondBillRt !== null) {
            $billrate = $secondBillRt; // Use the second bill_rt value
            if ($billrate !== null) {
                $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();
            
                if ($tmpmatdata->isEmpty()) {
               
                    $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
                    $bmatid=$tbillid.$Id;
    
                    DB::table('tmp_mat')->insert([
                        'mat_id' => $matdata->mat_id,
                        'material' => $itemacon->material,
                        't_mat_qty' => $matqty,
                        'mat_rt' =>  $billrate,
                        'mat_unit' => $itemacon->mat_unit,
                        'b_mat_id' => $bmatid
                    ]);
            
            
                    DB::table('royal_m')->insert([
                            
                        'work_id' => $workid,
                        't_bill_id' =>  $tbillid,
                        'b_item_id' => $billitem->b_item_id,
                        'mat_id' => $itemacon->mat_id,
                        'b_mat_id' => $tbillid.$Id,
                        'material' => $itemacon->material,
                        'royal_m' =>  'S',
                        'sr_no' =>  $srno,
                        'mat_unit' =>$itemacon->mat_unit,
                        'royal_rt' =>$billrate,
                        'royal_amt' => null,
                        'tot_m_qty' =>null,
                    ]);
                    $srno++;
            
            
                }
                else{
                    $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();
        
                    $bmatid=$bmatdata->b_mat_id;
                   }
            
                DB::table('loc_roy')->insert([
                    'mat_id' => $itemacon->mat_id,
                    'material' => $itemacon->material,
                    'mat_qty' => $matqty,
                    'pc_qty' => $itemacon->pc_qty,
                    't_item_id' => $itemacon->t_item_id,
                ]);
            
                    //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
                    $pcqty=$itemacon->pc_qty;
            
                    $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
                    $bmatdid=$bmatid.$id;
                    DB::table('royal_d')->insert([
                        'b_mat_d_id' => $bmatdid,
                        'b_mat_id' => $bmatid,
                        't_bill_id' => $tbillid,
                        'b_item_id' => $billitem->b_item_id,
                        't_item_no' => $billitem->t_item_no,
                        'mat_id' =>  $itemacon->mat_id,
                        'sub_no'  => $billitem->sub_no || '',
                        'exs_nm' => $billitem->exs_nm,
                        'exec_qty' => $billitem->exec_qty,
                        'pc_qty' => $itemacon->pc_qty,
                        'mat_qty' => $matqty,
            
                    ]);
            
            
                    
                   
                  }
        } else {
            // Both conditions failed, handle the scenario here if needed
           break; // Or set a default value
        }
    }
    

} elseif (in_array($lastFourMatId, ['1883', '1884'])) {
     

   
    $firstSixBillItemId = '004348';
    
    $firstBillRt = DB::table('bil_item')
        ->where('t_bill_id', $tbillid)
        ->whereRaw("RIGHT(item_id, 6) = ?", [$firstSixBillItemId])
        ->value('bill_rt');
    
    if ($firstBillRt !== null) {
        $billrate = $firstBillRt; // Use the first bill_rt value
        if ($billrate !== null) {
            $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();
        
            if ($tmpmatdata->isEmpty()) {
               
                $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatid=$tbillid.$Id;

                DB::table('tmp_mat')->insert([
                    'mat_id' => $matdata->mat_id,
                    'material' => $itemacon->material,
                    't_mat_qty' => $matqty,
                    'mat_rt' =>  $billrate,
                    'mat_unit' => $itemacon->mat_unit,
                    'b_mat_id' => $bmatid
                ]);
        
        
                DB::table('royal_m')->insert([
                        
                    'work_id' => $workid,
                    't_bill_id' =>  $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    'mat_id' => $itemacon->mat_id,
                    'b_mat_id' => $tbillid.$Id,
                    'material' => $itemacon->material,
                    'royal_m' =>  'S',
                    'sr_no' =>  $srno,
                    'mat_unit' =>$itemacon->mat_unit,
                    'royal_rt' =>$billrate,
                    'royal_amt' => null,
                    'tot_m_qty' =>null,
                ]);
                $srno++;
        
        
            }
            else{
                $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();
    
                $bmatid=$bmatdata->b_mat_id;
               }
        
            DB::table('loc_roy')->insert([
                'mat_id' => $itemacon->mat_id,
                'material' => $itemacon->material,
                'mat_qty' => $matqty,
                'pc_qty' => $itemacon->pc_qty,
                't_item_id' => $itemacon->t_item_id,
            ]);
        
                //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
                $pcqty=$itemacon->pc_qty;
        
                $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatdid=$bmatid.$id;
                DB::table('royal_d')->insert([
                    'b_mat_d_id' => $bmatdid,
                    'b_mat_id' => $bmatid,
                    't_bill_id' => $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    't_item_no' => $billitem->t_item_no,
                    'mat_id' =>  $itemacon->mat_id,
                    'sub_no'  => $billitem->sub_no || '',
                    'exs_nm' => $billitem->exs_nm,
                    'exec_qty' => $billitem->exec_qty,
                    'pc_qty' => $itemacon->pc_qty,
                    'mat_qty' => $matqty,
        
                ]);
        
                
               
              }
    } else {
       
           break; // Or set a default value
        
    }
    
} elseif (in_array($lastFourMatId, ['0001', '0013', '0905', '0012', '0018', '0014', '1396', '1402', '1410', '1415'])) {
//dd($uniquebillitems);
$firstSixBillItemId = '004346';
    
$firstBillRt = DB::table('bil_item')
    ->where('t_bill_id', $tbillid)
    ->whereRaw("RIGHT(item_id, 6) = ?", [$firstSixBillItemId])
    ->value('bill_rt');

if ($firstBillRt !== null) {
    $billrate = $firstBillRt; // Use the first bill_rt value
    if ($billrate !== null) {
        $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();
    
        if ($tmpmatdata->isEmpty()) {
               
            $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
            $bmatid=$tbillid.$Id;

            DB::table('tmp_mat')->insert([
                'mat_id' => $matdata->mat_id,
                'material' => $itemacon->material,
                't_mat_qty' => $matqty,
                'mat_rt' =>  $billrate,
                'mat_unit' => $itemacon->mat_unit,
                'b_mat_id' => $bmatid
            ]);
    
    
            DB::table('royal_m')->insert([
                    
                'work_id' => $workid,
                't_bill_id' =>  $tbillid,
                'b_item_id' => $billitem->b_item_id,
                'mat_id' => $itemacon->mat_id,
                'b_mat_id' => $tbillid.$Id,
                'material' => $itemacon->material,
                'royal_m' =>  'S',
                'sr_no' =>  $srno,
                'mat_unit' =>$itemacon->mat_unit,
                'royal_rt' =>$billrate,
                'royal_amt' => null,
                'tot_m_qty' =>null,
            ]);
            $srno++;
    
    
        }
        else{
            $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();

            $bmatid=$bmatdata->b_mat_id;
           }
    
        DB::table('loc_roy')->insert([
            'mat_id' => $itemacon->mat_id,
            'material' => $itemacon->material,
            'mat_qty' => $matqty,
            'pc_qty' => $itemacon->pc_qty,
            't_item_id' => $itemacon->t_item_id,
        ]);
    
            //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
            $pcqty=$itemacon->pc_qty;
    
            $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
            $bmatdid=$bmatid.$id;
            DB::table('royal_d')->insert([
                'b_mat_d_id' => $bmatdid,
                'b_mat_id' => $bmatid,
                't_bill_id' => $tbillid,
                'b_item_id' => $billitem->b_item_id,
                't_item_no' => $billitem->t_item_no,
                'mat_id' =>  $itemacon->mat_id,
                'sub_no'  => $billitem->sub_no || '',
                'exs_nm' => $billitem->exs_nm,
                'exec_qty' => $billitem->exec_qty,
                'pc_qty' => $itemacon->pc_qty,
                'mat_qty' => $matqty,
    
            ]);
    
    
            
           
          }
} else {
   
       break; // Or set a default value
    
}

}


    //dd($matdata);
  } 


 }
    //$matdata=DB::table('mat_mast')->where('t_item_id' , $billitem->t_item_id)


}
}


$roundof = DB::table('loc_roy')
    ->select('mat_id', DB::raw('SUM(mat_qty) as total_qty'))
    ->groupBy('mat_id')
    ->get();

foreach($roundof as $sum) {
    $roundedQty = round($sum->total_qty, 2);

    DB::table('tmp_mat')->where('mat_id' , $sum->mat_id)->update([
        't_mat_qty' => $roundedQty,
    ]);

    DB::table('royal_m')->where('mat_id' , $sum->mat_id)->update([
        'tot_m_qty' => $roundedQty,
        // You can calculate 'royal_amt' here if needed
    ]);
}
    DB::table('tmp_mat')->delete();
    DB::table('loc_roy')->delete();


} 


////DMF royalty items rate


// Array to store the last 6 digits of item IDs
$SixDigits = [];

// Extracting the last 6 digits of each item ID
foreach ($Billitems as $item) {
    $itemId = substr($item->item_id, -6); // Assuming 'itemid' is the column name
    $SixDigits[] = $itemId;
}

// Array containing the required last 6 digit values to check
$REQUIREDDigits = ['003940', '003941', '004350'];

// Checking if any required digit is present
$ANYDigitPresent = false;
foreach ($REQUIREDDigits as $digit) {
    if (in_array($digit, $lastSixDigits)) {
        $ANYDigitPresent = true;
        break;
    }
}

$billitemdataDMF=DB::table('bil_item')->where('t_bill_id' , $tbillid)->get();



//dd($billitemdataDMF , $filteredBillItems);

$billRt=null;
if ($ANYDigitPresent) {
 


foreach($filteredBillItems as $billitem)
{

    
    //dd($filteredBillItems);
    //$itemid= "0190004340";
    $firstfouricode = '';
    $firsttwoicode = '';
    
    $dsrdata = DB::table('dsr')->where('item_id', $billitem->item_id)->first();
    $schitem = $billitem->sch_item;
    
   // echo $billitem->item_id;
    
    if ($dsrdata) {
        if ($schitem == 1) {
            $firstfouricode = substr($dsrdata->i_code, 0, 4);
            $firsttwoicode = substr($dsrdata->i_code, 0, 2);
        }

        $dsrdata->item = strtoupper($dsrdata->item);
//dd($dsrdata->item);
$firstTwentyChars = substr($dsrdata->item, 0, 20);//dd($leftTwentyChars);

    }
    
if (!(
    ($firstfouricode == 'BD-A' || $firstfouricode == 'MST1' || $firstfouricode == 'MOST' || $firsttwoicode == 'RD' || $firsttwoicode == 'BR')
    && strpos($firstTwentyChars, 'EXCAVATION') !== false
) && !(
    ($firsttwoicode == 'RD' || $firstfouricode == 'MST1' || $firstfouricode == 'MOST')
    && strpos($dsrdata->item, 'EXCAVATION') !== false
    && strpos($firstTwentyChars, 'CONVEYING') !== false
)) {
    // Code for the exact opposite scenario
//echo($billitem->t_item_id);
$itemconsdata=DB::table('itemcons')->where('t_item_id' , $billitem->t_item_id)->get();
//dd($itemconsdata , $billitem->t_item_id);
//dd($firstfouricode , $dsrdata->i_code);

 //dd($itemconsdata , $billitem->t_item_id);
 $bmatid='';

 foreach($itemconsdata as $itemacon)
 {
    $matdata=DB::table('mat_mast')->where('mat_id' , $itemacon->mat_id)->first();
   // dd($matdata);
   if (($matdata->mat_gr == 'Quarrying Material') && ($matdata->royal_rt >= 0 && $matdata->act_royal >= 0)) {
   
    $matqty = $billitem->exec_qty * $itemacon->pc_qty;
    //dd($matdata);
    $lastFourMatId = substr($matdata->mat_id, -4);
   //dd($lastFourMatId);
 //dd($lastSixBillItemId);
//$billrt=null;
if (in_array($lastFourMatId, ['0002', '0895', '1886', '1887'])) {

   // echo($lastFourMatId);
    
   //echo($matdata->mat_id);

   
    $firstSixBillItemId = '004350';
    $secondSixBillItemId = '003940';
    
    $firstBillRt = DB::table('bil_item')
        ->where('t_bill_id', $tbillid)
        ->whereRaw("RIGHT(item_id, 6) = ?", [$firstSixBillItemId])
        ->value('bill_rt');
    
        
        // echo($firstSixBillItemId);

    if ($firstBillRt !== null) {
        $billRt = $firstBillRt; // Use the first bill_rt value
        if ($billRt !== null) {
            $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();
        
            if ($tmpmatdata->isEmpty()) {
               
                $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatid=$tbillid.$Id;

                DB::table('tmp_mat')->insert([
                    'mat_id' => $matdata->mat_id,
                    'material' => $itemacon->material,
                    't_mat_qty' => $matqty,
                    'mat_rt' =>  $billRt,
                    'mat_unit' => $itemacon->mat_unit,
                    'b_mat_id' => $bmatid
                ]);
        
        
                DB::table('royal_m')->insert([
                        
                    'work_id' => $workid,
                    't_bill_id' =>  $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    'mat_id' => $itemacon->mat_id,
                    'b_mat_id' => $tbillid.$Id,
                    'material' => $itemacon->material,
                    'royal_m' =>  'D',
                    'sr_no' =>  $srno,
                    'mat_unit' =>$itemacon->mat_unit,
                    'royal_rt' =>$billRt,
                    'royal_amt' => null,
                    'tot_m_qty' =>null,
                ]);
                $srno++;
        
        
            }
            else{
                $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();
    
                $bmatid=$bmatdata->b_mat_id;
               }
        
            DB::table('loc_roy')->insert([
                'mat_id' => $itemacon->mat_id,
                'material' => $itemacon->material,
                'mat_qty' => $matqty,
                'pc_qty' => $itemacon->pc_qty,
                't_item_id' => $itemacon->t_item_id,
            ]);
        
                //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
                $pcqty=$itemacon->pc_qty;
        
                $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
                $bmatdid=$bmatid.$id;
                DB::table('royal_d')->insert([
                    'b_mat_d_id' => $bmatdid,
                    'b_mat_id' => $bmatid,
                    't_bill_id' => $tbillid,
                    'b_item_id' => $billitem->b_item_id,
                    't_item_no' => $billitem->t_item_no,
                    'mat_id' =>  $itemacon->mat_id,
                    'sub_no'  => $billitem->sub_no || '',
                    'exs_nm' => $billitem->exs_nm,
                    'exec_qty' => $billitem->exec_qty,
                    'pc_qty' => $itemacon->pc_qty,
                    'mat_qty' => $matqty,
        
                ]);
        
                
               
              }
        
    } else {
        $secondBillRt = DB::table('bil_item')
            ->where('t_bill_id', $tbillid)
            ->whereRaw("RIGHT(item_id, 6) = ?", [$secondSixBillItemId])
            ->value('bill_rt');
        if ($secondBillRt !== null) {
            $billRt = $secondBillRt; // Use the second bill_rt value

            //echo($secondSixBillItemId);
            if ($billRt !== null) {
                $tmpmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->get();
            
              

                if ($tmpmatdata->isEmpty()) {
               
                    $Id = str_pad(intval($Id) + 1, 2, '0', STR_PAD_LEFT); 
                    $bmatid=$tbillid.$Id;
    
                    DB::table('tmp_mat')->insert([
                        'mat_id' => $matdata->mat_id,
                        'material' => $itemacon->material,
                        't_mat_qty' => $matqty,
                        'mat_rt' =>  $billRt,
                        'mat_unit' => $itemacon->mat_unit,
                        'b_mat_id' => $bmatid
                    ]);
            
            
                    DB::table('royal_m')->insert([
                            
                        'work_id' => $workid,
                        't_bill_id' =>  $tbillid,
                        'b_item_id' => $billitem->b_item_id,
                        'mat_id' => $itemacon->mat_id,
                        'b_mat_id' => $tbillid.$Id,
                        'material' => $itemacon->material,
                        'royal_m' =>  'D',
                        'sr_no' =>  $srno,
                        'mat_unit' =>$itemacon->mat_unit,
                        'royal_rt' =>$billRt,
                        'royal_amt' => null,
                        'tot_m_qty' =>null,
                    ]);
                    $srno++;
            
            
                }
                else{
                    $bmatdata = DB::table('tmp_mat')->where('mat_id', $matdata->mat_id)->first();
        
                    $bmatid=$bmatdata->b_mat_id;
                   }
            
                DB::table('loc_roy')->insert([
                    'mat_id' => $itemacon->mat_id,
                    'material' => $itemacon->material,
                    'mat_qty' => $matqty,
                    'pc_qty' => $itemacon->pc_qty,
                    't_item_id' => $itemacon->t_item_id,
                ]);
            
                    //$bmatid=$billitem->b_item_id.$itemacon->mat_id;
                    $pcqty=$itemacon->pc_qty;
            
                    $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
                    $bmatdid=$bmatid.$id;
                    DB::table('royal_d')->insert([
                        'b_mat_d_id' => $bmatdid,
                        'b_mat_id' => $bmatid,
                        't_bill_id' => $tbillid,
                        'b_item_id' => $billitem->b_item_id,
                        't_item_no' => $billitem->t_item_no,
                        'mat_id' =>  $itemacon->mat_id,
                        'sub_no'  => $billitem->sub_no || '',
                        'exs_nm' => $billitem->exs_nm,
                        'exec_qty' => $billitem->exec_qty,
                        'pc_qty' => $itemacon->pc_qty,
                        'mat_qty' => $matqty,
            
                    ]);
            
                    
                   
                  }
            

        } else {
            // Both conditions failed, handle the scenario here if needed
           break; // Or set a default value
        }
    }
    
 
    


} 
 

    //dd($matdata);
  } 


 }
    //$matdata=DB::table('mat_mast')->where('t_item_id' , $billitem->t_item_id)


}
}

$roundof = DB::table('loc_roy')
    ->select('mat_id', DB::raw('SUM(mat_qty) as total_qty'))
    ->groupBy('mat_id')
    ->get();

foreach($roundof as $sum) {
    $roundedQty = round($sum->total_qty, 2);

    DB::table('tmp_mat')->where('mat_id' , $sum->mat_id)->update([
        't_mat_qty' => $roundedQty,
    ]);

    DB::table('royal_m')->where('mat_id' , $sum->mat_id)->update([
        'tot_m_qty' => $roundedQty,
        // You can calculate 'royal_amt' here if needed
    ]);
}

    DB::table('tmp_mat')->delete();
    DB::table('loc_roy')->delete();


} 

$royalamts=DB::table('royal_m')->where('t_bill_id' , $tbillid)->get();
foreach($royalamts as $royalamt)
{
$royamt=$royalamt->tot_m_qty*$royalamt->royal_rt;


DB::table('royal_m')->where('b_mat_id' , $royalamt->b_mat_id)->update([
    'royal_amt' => $royamt
]);
}

$royalm=DB::table('royal_m')->where('t_bill_id' , $tbillid)->get();

if ($royalm->isEmpty()) 
{
   // dd($royalm);
    // If $royalm is empty, display an alert and return the view
    alert()->info('No Royalty Data Found', 'No royalty item is present in the list.');
    return back();
}
$royalmfirst=DB::table('royal_m')->where('t_bill_id' , $tbillid)->first();


$royald=DB::table('royal_d')->where('t_bill_id' , $tbillid)->where('b_mat_id' , $royalmfirst->b_mat_id)->first();
//dd($royald);

$royaldfirst=DB::table('royal_d')->where('b_mat_id' , $royald->b_mat_id)->get();


return view('Royalconsumption' , compact('royalm' , 'royald' , 'royalmfirst' , 'royaldfirst' , 'workid','tbillid'));
}

      


    public function updatematerialcon(Request $request)
    {
        $workid=$request->workid;
        //dd($workid);
        $tbillid=$request->t_bill_Id;
        //dd($tbillid);

        $mbstatusSo=DB::table('bills')->where('t_bill_Id',$tbillid)->value('mbstatus_so');
        // dd($mbstatusSo);
        if ($mbstatusSo <= 1) 
        {
        $updatembstatusSO=DB::table('bills')->where('work_id',$workid)->where('t_bill_id',$tbillid)
        ->update(['mbstatus_so' =>1]);
        // dd($updatembstatusSO);
        }

        


        $matconsdata=DB::table('mat_cons_m')->where('t_bill_id' , $tbillid)->get();

        if($matconsdata->count() > 0)
        {
            $cons_mdata=DB::table('mat_cons_m')->where('t_bill_id' , $tbillid)->get();

            $cons_mdatafirst=DB::table('mat_cons_m')->where('t_bill_id' , $tbillid)->first();
     //dd( $cons_mdata);
     $additionalMaterialData = DB::table('mat_cons_d')->where('b_mat_id', $cons_mdatafirst->b_mat_id)->get();
    
        }
        
        else
        {

// DB::table('mat_cons_d')->where('t_bill_id' , $tbillid)->delete();
// DB::table('mat_cons_m')->where('t_bill_id' , $tbillid)->delete();


$datacons=[];
$Billitems=DB::table('bil_item')->where('t_bill_id' , $tbillid)->get();
$id=00;
//dd($Billitems);
foreach($Billitems as $billitem)
{
    
     if($billitem->exec_qty != 0)
    {

    $distinctData = DB::table('itemcons')
    ->leftjoin('mat_mast', 'itemcons.mat_id', '=', 'mat_mast.mat_id')
    ->where('itemcons.t_item_id', $billitem->t_item_id)
    ->where('mat_mast.sch_a', 'Yes')
    ->first();
    //dd($distinctData);
    if($distinctData !== null)
    {
        //dd($distinctData);
        $APCQTY=$distinctData->pc_qty;
        $bmatid=$tbillid.$distinctData->mat_id;
        $pcqty=$distinctData->pc_qty;
        $matqty=$billitem->exec_qty* $pcqty;
        $Amatqty=$billitem->exec_qty* $pcqty;
        $id = str_pad(intval($id) + 1, 2, '0', STR_PAD_LEFT); 
        
        $lastFourDigits = substr($distinctData->mat_id, -4);
        // dd($lastFourDigits);
        if ($lastFourDigits == '0008')        
        {
            // dd($lastFourDigits);

                $Step1 = round($matqty * 20, 0);
                $Amatqty= $Step1 / 20;
                // dd($Step1,$ActualMaterialQty);
                $APCQTY= $Amatqty / $billitem->exec_qty;
            
        }


        $bmatdid=$bmatid.$id;
        DB::table('mat_cons_d')->insert([
            'b_mat_d_id' => $bmatdid,
            'b_mat_id' => $bmatid,
            't_bill_id' => $tbillid,
            'b_item_id' => $billitem->b_item_id,
            't_item_no' => $billitem->t_item_no,
            'mat_id' =>  $distinctData->mat_id,
            'sub_no'  => $billitem->sub_no,
            'exs_nm' => $billitem->exs_nm,
            'exec_qty' => $billitem->exec_qty,
            'pc_qty' => $distinctData->pc_qty,
            'mat_qty' => $matqty,
            'A_pc_qty' => $APCQTY,
            'A_mat_qty' => $Amatqty,
            'remark' => null

        ]);

        //dd($pcqty , $distinctData->t_item_no);

        $datacons[]=$distinctData;

    }

    }
}


$matconsd = DB::table('mat_cons_d')
    ->select('b_mat_id')
    ->where('t_bill_id', $tbillid)
    ->distinct()
    ->get();
 //dd($matconsd);
    $Srno=1;
    foreach($matconsd as $matid)
    {
 //dd($matconsd);
    $matdatad=DB::table('mat_cons_d')->where('b_mat_id' , $matid->b_mat_id)->first();
    //dd($matdatad);
     
    $sumMatQty = DB::table('mat_cons_d')
    ->where('t_bill_id', $tbillid)
    ->where('b_mat_id' , $matid->b_mat_id)
    ->sum('mat_qty');

$sumAMatQty = DB::table('mat_cons_d')
    ->where('t_bill_id', $tbillid)
    ->where('b_mat_id' , $matid->b_mat_id)
    ->sum('A_mat_qty');

    $itemconsdata=DB::table('itemcons')->where('work_id' , $workid)->where('mat_id' , $matdatad->mat_id)->first();

    ///dd($itemconsdata);
    
    if ($itemconsdata !== null) {
//dd($matdatad->mat_id);
DB::table('mat_cons_m')->insert([

    'work_id' => $workid,
    't_bill_id' =>  $tbillid,
    'b_item_id' => $billitem->b_item_id,
    'mat_id' => $matdatad->mat_id,
    'b_mat_id' => $matdatad->b_mat_id,
    'material' => $itemconsdata->material,
    'sr_no' =>  $Srno,
    'mat_unit' =>$itemconsdata->mat_unit,
    'tot_t_qty' =>$sumMatQty,
    'tot_a_qty' =>$sumAMatQty,
]);
$Srno++;

    }
    //dd($itemconsdata);
    }


        $cons_mdata=DB::table('mat_cons_m')->where('t_bill_id' , $tbillid)->get();

        if ($cons_mdata->isEmpty()) {
            // dd($royalm);
         
             // If $royalm is empty, display an alert and return the view
             alert()->info('No material consumption Data Found', 'No material consumption item is present in the list.');
             return back();
         }
         

        $cons_mdatafirst=DB::table('mat_cons_m')->where('t_bill_id' , $tbillid)->first();
 //dd( $cons_mdata);
 $additionalMaterialData = DB::table('mat_cons_d')->where('b_mat_id', $cons_mdatafirst->b_mat_id)->get();
        }
        
 return view('updatematerial' , compact('workid' , 'cons_mdata' , 'cons_mdatafirst' , 'additionalMaterialData','tbillid'));
    }

    //material data for edit
    public function fetchMaterialData(Request $request)
    {
        $materialId = $request->input('material_id');
       // dd($materialId);
 // Fetch master material data
 $masterMaterialData = DB::table('mat_cons_m')->where('b_mat_id', $materialId)->first();

 // Fetch additional material data
 $additionalMaterialData = DB::table('mat_cons_d')->where('b_mat_id', $materialId)->get();

        // Prepare and return the data as JSON
        //dd($materialData);

        return response()->json(['master_material_data' => $masterMaterialData ,
        'additional_material_data' => $additionalMaterialData]);
    }





    //update material quantity 
    public function updatematqty(Request $request)
    {
        $amatqty = $request->input('A_mat_qty');
        $execqty = $request->input('exec_qty');
        //dd($execqty);
        $remark = $request->input('remark');
        $bMatDId = $request->input('b_mat_d_id');
    
        $tbillid=DB::table('mat_cons_d')->where('b_mat_d_id' , $bMatDId)->value('t_bill_id');
        $bmatid=DB::table('mat_cons_d')->where('b_mat_d_id' , $bMatDId)->value('b_mat_id');

        // Check if $execqty is not zero to avoid division by zero
        if ($execqty != 0) {
            $apcqty = $amatqty / $execqty;

             // Format result to three decimal places
    $apcqty = number_format($apcqty, 6);
        } else {
            // Handle the division by zero scenario (if needed)
            $apcqty = 0; // Set a default value or handle the scenario accordingly
        }       // dd($apcqty);
         // Retrieve b_mat_d_id specifically
    $bMatDId = $request->input('b_mat_d_id');
    DB::table('mat_cons_d')->where('b_mat_d_id' , $bMatDId)
    ->update([

        'A_pc_qty'=> $apcqty,
        'A_mat_qty'=>$amatqty,
        'remark'=>$remark,
    ]);



    $sumMatQty = DB::table('mat_cons_d')
    ->where('b_mat_id', $bmatid)
    ->sum('mat_qty');

  $sumAMatQty = DB::table('mat_cons_d')
    ->where('b_mat_id', $bmatid)
    ->sum('A_mat_qty');


    DB::table('mat_cons_m')->where('b_mat_id' , $bmatid)
    ->update([

        'tot_t_qty' =>$sumMatQty,
    'tot_a_qty' =>$sumAMatQty,
    ]);


    $matdata= DB::table('mat_cons_m')->where('b_mat_id' , $bmatid)->first();
$mateditdata=DB::table('mat_cons_d')->where('b_mat_id' , $bmatid)->get();


    //dd($bMatDId);
    return response()->json(['matdata' => $matdata, 'mateditdata' => $mateditdata]); // Return your response
    }







    public function fetchroyaldata(Request $request)
    {

        $materialId = $request->input('material_id');
        // dd($materialId);
  // Fetch master material data
  $masterMaterialData = DB::table('royal_m')->where('b_mat_id', $materialId)->first();
 
  // Fetch additional material data
  $additionalMaterialData = DB::table('royal_d')->where('b_mat_id', $materialId)->get();
 
         // Prepare and return the data as JSON
         //dd($materialData);
 
         return response()->json(['master_material_data' => $masterMaterialData ,
         'additional_material_data' => $additionalMaterialData]);
    }
    
    public function FunCloseMaterial(Request $request)
    {
            // dd($request);
            $workid=$request->input('workid');
            // dd($request,$workid);
            $action = $request->input('action');
            // dd($action);
        if($action ==='CloseMaterial')
        {
            $tbillid = $request->input('tbillid');
            // dd($tbillid);
            $workid=DB::table('bills')->where('t_bill_Id',$tbillid)->value('work_id');
            // dd($tbillid,$workid);
            $mbstatusSo=DB::table('bills')->where('t_bill_Id',$tbillid)->value('mbstatus_so');
            // dd($mbstatusSo);
            if ($mbstatusSo <= 1) {
            $updatembstatusSO=DB::table('bills')->where('work_id',$workid)->where('t_bill_id',$tbillid)
            ->update(['mbstatus_so' =>1]);
            // dd($updatembstatusSO);
            }
        }

                // Retrieve values from the form
    // Display values for debugging
    // dd($workid, $tbillid, $action);
    if($action === 'CloseRoyalty')
    {
        $workid = $request->input('workid');
        $tbillid = $request->input('tbillid'); // Corrected name
        $mbstatusSo=DB::table('bills')->where('t_bill_Id',$tbillid)->value('mbstatus_so');
        // dd($mbstatusSo);
        if ($mbstatusSo <= 4) 
        {
        $updatembstatusSO=DB::table('bills')->where('work_id',$workid)->where('t_bill_id',$tbillid)
        ->update(['mbstatus_so' =>4]);
        // dd($updatembstatusSO);
        }
        // dd('Royaltypage');
    }
            return redirect()->route('billlist', ['workid' => $workid]);
    }



}