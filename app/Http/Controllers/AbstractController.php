<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use Illuminate\Support\Collection; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;

class AbstractController extends Controller
{
    public function FunAbstractcalculation(Request $request,$t_bill_Id)
    {
        // Fetch the work details based on the $workId
        
        // dd($t_bill_Id);
        $workId = substr($t_bill_Id, 0, -4);

// dd($workId);
        $DBEMBdetails=DB::table('workmasters')
        ->select('Work_Id','Work_Nm','Div','Sub_Div','F_H_Code','Agency_Nm','jeid')
        ->where('Work_Id',$workId)
        ->first();
        // dd($DBEMBdetails);
        // $DBFHcode=DB::table('workmasters')
        // ->select('F_H_Code')
        // ->where('Work_Id',$workId)
        // ->first();
        // dd($DBFHcode);
        $DBFHcode_M=DB::table('fundhdms')
        ->where('F_H_CODE', $DBEMBdetails->F_H_Code)
        ->value('Fund_Hd_M');
        // dd($DBFHcode_M);
        $DBSectionEngNames=DB::table('jemasters')
        ->where('jeid',$DBEMBdetails->jeid)
        ->value('name');
        // dd( $DBSectionEngNames);

        // $DBsectionEng=DB::table('workmasters')
        // ->select('SO_Id')
        // ->where('Work_Id',$workId)
        // ->get();
        // dd($DBsectionEng);
        // $DBSectionEngNames = [];

// foreach ($DBsectionEng as $item) 
// {
//     $sectionEngName = DB::table('jemasters')
//         ->select('name')
//         ->where('jeid', $item->SO_Id)
//         ->first();

//     if ($sectionEngName) {
//         $DBSectionEngNames[] = $sectionEngName->name;
//     }
// }
// dd($DBSectionEngNames);

$billDataDropdown = DB::table('bills')
->select('t_bill_No', 'final_bill','is_current')
->where('Work_Id', $workId)
->where('t_bill_Id',$t_bill_Id)
->orderBy('t_bill_No', 'desc')
->first();
// dd($billDataDropdown);
// Retrieve the latest record for display
$latestBill = DB::table('bills')
    ->select('t_bill_No', 'final_bill','is_current')
    ->where('Work_Id', $workId)
    ->where('t_bill_Id',$t_bill_Id)
    ->orderBy('t_bill_No', 'desc')
    ->first();

// dd($latestBill);
// $t_bill_Id = $latestBill->t_bill_Id;
// dd($t_bill_id);

// Inside your controller method
// Pass the work details and dropdown data to the view
return view('Abstract', compact('workId', 'DBEMBdetails', 'DBFHcode_M', 'DBSectionEngNames',
 'latestBill', 'billDataDropdown','t_bill_Id'));
}

public function FunshowdataRelatedbillno(Request $request)
{
    $tBillNo = $request->input('t_bill_No');
    $tBillId = $request->input('t_bill_Id');
    // dd($tBillId);
    $issscurrent = $request->input('isCurrent');
    $workId = substr($tBillId, 0, 12);
    
        $mbstatusSo=DB::table('bills')->where('t_bill_Id',$tBillId)->value('mbstatus_so');
    // dd($mbstatusSo);
    if ($mbstatusSo <= 6) {

        $UpdatembstatusSO=DB::table('bills')
->where('work_id',$workId)->update(['mbstatus_so'=>6]);
// dd($UpdatembstatusSO);

}
    // dd($tBillNo,$tBillId,$workId,$issscurrent);
    $billItem=DB::table('bil_item')
    ->select('t_item_no','sub_no','exec_qty','bill_rt','tnd_rt','b_item_amt','cur_qty','exs_nm','cur_amt','previous_amt','item_id','exsave_Remks')
    ->where('t_bill_id',$tBillId)
    ->orderBy('t_item_no', 'asc')
    ->get();
// dd($billItem);


$royaltylab = ["001992", "003229", "002047", "002048", "004349", "001991", "004345", "002566",
                "004350", "003940", "003941", "004346", "004348", "004347"];

                $royaltylabarr = [];
                $normalItemsarr = [];
                
                foreach ($billItem as $item) {
                    $itemId = $item->item_id;
                
                    // Check if the item_id ends with one of the specified values
                    $endsWithRoyaId = in_array(substr($itemId, -6), $royaltylab) || substr($itemId, 0, 4) === "TEST";
                    
                                $remarks = $item->exsave_Remks !== null ? $item->exsave_Remks : ''; 

                
                    $message = "Item No: " . $item->t_item_no . 
                    " | Sub No: " . $item->sub_no . 
                    " | Exec Qty: " . $item->exec_qty . 
                     " | Description: " . $item->exs_nm .   
                     " | Bill Rate: " . $item->bill_rt . 
                     " | Tender Rate: " . $item->tnd_rt . 
                     " | Bill Item Amount: " . $item->b_item_amt .  
                     " | Current Amount: " . $item->cur_amt . 
                     " | Remarks: ".$remarks ;

                    //  " (Item ID: " . $itemId . ")";  

                    if ($endsWithRoyaId) {
                        // Store the message in the steelItems array
                        $royaltylabarr[] = $message;
                    } else {
                        // Store the message in the normalItems array
                        $normalItemsarr[] = $message;
                    }
                }
                
                // Use dd to inspect the contents of the arrays
                // dd($royaltylabarr, $normalItemsarr);


$DBGrossAmount=DB::table('bills')
->select('gross_amt','a_b_effect','bill_amt','gst_base','gst_amt','gst_rt','bill_amt_ro','p_bill_amt_ro','c_billamtro',
'bill_amt_gt','p_bill_amt_gt','net_amt','c_netamt',
         'p_gross_amt','p_a_b_effect','p_bill_amt','p_gst_amt','p_gst_base','p_gst_rt','p_net_amt','part_a_amt','c_part_a_amt'
         ,'c_abeffect','c_gstbase','c_gstamt','c_billamtgt','part_b_amt','c_part_b_amt','part_a_gstamt','c_part_a_gstamt','tot_recovery',
         'chq_amt','p_chq_amt',
         'tot_ded','p_tot_ded',
         'tot_recovery','p_tot_recovery')
->where('t_bill_Id',$tBillId)
->first();
// dd($DBGrossAmount);
$DBTotaldeducheckAmt=DB::table('bills')
->select('chq_amt','tot_ded','tot_recovery','c_netamt')
->where('t_bill_Id', $tBillId)
->first();

$checkAmt = round($DBTotaldeducheckAmt->c_netamt - $DBTotaldeducheckAmt->tot_ded , 2);
// dd($DBTotaldeducheckAmt,$checkAmt);

$updateCheckAmt = DB::table('bills')
    ->where('t_bill_Id', $tBillId)
    ->update(['chq_amt' => $checkAmt]);

    $DBGrossAmount=DB::table('bills')
->select('gross_amt','a_b_effect','bill_amt','gst_base','gst_amt','gst_rt','bill_amt_ro','p_bill_amt_ro','c_billamtro',
'bill_amt_gt','p_bill_amt_gt','net_amt','c_netamt',
         'p_gross_amt','p_a_b_effect','p_bill_amt','p_gst_amt','p_gst_base','p_gst_rt','p_net_amt','part_a_amt','c_part_a_amt'
         ,'c_abeffect','c_gstbase','c_gstamt','c_billamtgt','part_b_amt','c_part_b_amt','part_a_gstamt','c_part_a_gstamt','tot_recovery',
         'chq_amt','p_chq_amt',
         'tot_ded','p_tot_ded',
         'tot_recovery','p_tot_recovery')
->where('t_bill_Id',$tBillId)
->first();
// dd($DBGrossAmount);





if (!str_ends_with($tBillId, '01')) { // Check if $tBillId does not end with '01'
    $previousBillId = DB::table('bills')
        ->where('t_bill_Id', '<', $tBillId)
        ->max('t_bill_Id');

    // dd($previousBillId); // Debugging to see the value of $previousBillId

    // Get the data for the previous "tBillId" if available
    if ($previousBillId !== null) 
    {
        $previousTotDeducheckAmt = DB::table('bills')
            ->select('chq_amt', 'tot_ded')
            ->where('t_bill_Id', $previousBillId)
            ->first();
    } 
    
    else
     {
        $previousTotDeducheckAmt = null; // Set it to null or handle it as needed when there is no previous data
    }
} 
else
 {
    $previousTotDeducheckAmt = null; // Set it to null when $tBillId ends with '01'
}
// dd($previousTotDeducheckAmt);

$ABPC=DB::table('workmasters')
->select('Above_Below','A_B_Pc')
->where('Work_Id',$workId)
->first();
// dd($ABPC);

$WOAmt=DB::table('workmasters')
->select('WO_Amt')
->where('Work_Id',$workId)
->value('WO_Amt');
// dd($WOAmt);

$mbstatus=DB::table('bills')
->where('t_bill_Id',$tBillId)->value('mb_status');
// dd($mbstatus);


$user = Auth::user();
$usertype=$user->usertypes;


return response()->json
(['billItem' => $billItem,
'DBGrossAmount'=> $DBGrossAmount,
'DBTotaldeducheckAmt'=>$DBTotaldeducheckAmt,
'ABPC'=>$ABPC,
'WOAmt'=>$WOAmt,
'normalItemsarr'=>$normalItemsarr,
'royaltylabarr'=>$royaltylabarr,
'previousTotDeducheckAmt'=>$previousTotDeducheckAmt,
'usertype'=>$usertype,
'mbstatus'=>$mbstatus

// 'DBexs_nm'=>$DBexs_nm,
// 'ABper'=>$ABper
]);

}

 public function FunDeduction(Request $request)
 {
    $workid = $request->input('workid');
    $t_billid = $request->input('tBillId');
        $worknm = $request->input('worknm');
        $t_bill_no = $request->input('tBillNo');
        $NETAMT = $request->input('net_amt');
        $iscurrrent=$request->input('iscurrent');
    
        // dd($t_billid,$t_bill_no);
            // dd($workid, $t_billid, $worknm, $t_bill_no ,$NETAMT);
// dd($iscurrrent);
        // dd($NETAMT);
    // $NETAMT=DB::table('bills')
    // ->select('net_amt')
    // ->where('t_bill_Id',$t_billid)
    // // ->where('t_bill_No',$t_bill_no)
    // ->first();
    // dd($NETAMT);

    $deductions = DB::table('billdeds')
    ->where('T_Bill_Id', $t_billid)
    ->get();
// dd($deductions);
$dedHead = []; // Initialize arrays to store values
$dedPc = [];
$dedAmt = [];
$tBillIdArray = [];
$tDedIdArray = [];

foreach ($deductions as $deduction) {
    $dedHead[] = $deduction->Ded_Head; // Append values to arrays
    $dedPc[] = $deduction->Ded_pc;
    $dedAmt[] = $deduction->Ded_Amt;
    $tBillIdArray[] = $deduction->T_Bill_Id; // Add T_Bill_Id to the array
    $tDedIdArray[] = $deduction->T_Ded_Id;  
}

// dd($dedHead, $dedPc, $dedAmt,$tBillIdArray,$tDedIdArray);




$DBtotaldedcheckamt=DB::table('bills')
->select('chq_amt','tot_ded')
->where('t_bill_Id', $t_billid)
->first();
// dd($DBtotaldedcheckamt);


return view('Deduction',
     [
        'workid' => $workid,
        't_billid' => $t_billid,
        'worknm'=>$worknm,
        't_bill_no'=>$t_bill_no,
        'NETAMT'=>$NETAMT,
        'iscurrrent'=>$iscurrrent,
        'dedHead' => $dedHead, // Pass the arrays to the view
        'dedPc' => $dedPc,
        'dedAmt' => $dedAmt,
        'tBillIdArray' => $tBillIdArray, // Pass the arrays to the view
        'tDedIdArray' => $tDedIdArray,
        'DBtotaldedcheckamt'=>$DBtotaldedcheckamt,
    ]);

}
public function FunDeductionDropdown(Request $request)
{
 $billId = $request->input('bill_Id');    
    $selectedOption = $request->input('selectedOption');
// dd($selectedOption);
$perded=DB::table('dedmasters')
->select('Ded_pc','Ded_Head')
->where('Ded_Head',$selectedOption)
->first();
// dd($perded);
return response()->json($perded);

}

public function FunTotdedchequeAmt(Request $request)
{

    // Retrieve data from the request
    $workId = $request->input('workId');
    // dd($workId);
    $bill_id = $request->input('bill_Id');
    $totalDeduction = $request->input('totalDeduction');
    // dd($totalDeduction);
    // Instantiate CommonHelper
    $commonHelper = new CommonHelper();
    // Call the customRound method on the instance
    $totalDeduction = $commonHelper->customRound($totalDeduction); 
    // dd($totalDeduction);
    
    // $chequeAmount = $request->input('chequeAmount');
    $bno=$request->input('bill_no');
    // dd($bno,$workId,$bill_id,$totalDeduction,$chequeAmount);


    $updateworkmaster = DB::table('workmasters')
    ->where('Work_Id', $workId) 
    ->update(['Tot_Exp' => $totalDeduction]);    

    $updatebills = DB::table('bills')
    ->where('Work_Id', $workId) 
    ->where('t_bill_Id' ,$bill_id)
    ->update(['tot_ded' => $totalDeduction]);   
    // dd($updatebills);

    $DBc_netamt=DB::table('bills')
    ->where('t_bill_Id' ,$bill_id)
    ->value('c_netamt');
    $DBTotDeduction=DB::table('bills')
    ->where('t_bill_Id' ,$bill_id)
    ->value('tot_ded');
    $DBTotRecovery=DB::table('bills')
    ->where('t_bill_Id' ,$bill_id)
    ->value('tot_recovery');
    // dd($DBc_netamt,$DBTotDeduction,$DBTotRecovery);
// $chequeAmount=$DBc_netamt-$DBTotDeduction-$DBTotRecovery;
$chequeAmount = $DBc_netamt - $DBTotDeduction;


// dd($DBc_netamt,$DBTotDeduction,$DBTotRecovery,$chequeAmount);

$updatebillscheckamt = DB::table('bills')
->where('Work_Id', $workId) 
->where('t_bill_Id' ,$bill_id)
->update(['chq_amt' => $chequeAmount]);   
// dd($updatebills);



    $DBEMBdetails=DB::table('workmasters')
    ->select('Work_Id','Work_Nm','Div','Sub_Div','F_H_Code','Agency_Nm',)
    ->where('Work_Id',$workId)
    ->first();
    // dd($DBEMBdetails);
    $DBFHcode=DB::table('workmasters')
    ->select('F_H_Code')
    ->where('Work_Id',$workId)
    ->first();
    // dd($DBFHcode);
    $DBFHcode_M=DB::table('fundhdms')
    ->select('Fund_Hd_M')
    ->where('F_H_CODE', $DBFHcode->F_H_Code)
    ->get();
    // dd($DBFHcode_M);
$DBsectionEng=DB::table('workmasters')
->select('SO_Id')
->where('Work_Id',$workId)
->get();
// dd($DBsectionEng);
$DBSectionEngNames = [];

foreach ($DBsectionEng as $item) {
$sectionEngName = DB::table('jemasters')
    ->select('name')
    ->where('jeid', $item->SO_Id)
    ->first();

if ($sectionEngName) {
    $DBSectionEngNames[] = $sectionEngName->name;
}
}
    $latestBill = DB::table('bills')
        ->select('t_bill_No', 'final_bill', 't_bill_Id','is_current')
        ->where('Work_Id', $workId)
        ->where('t_bill_Id', $bill_id)
        ->orderBy('t_bill_No', 'desc')
        ->first();

    // dd($latestBill);
    $t_bill_id = $latestBill->t_bill_Id;

    $billDataDropdown = DB::table('bills')
        ->select('t_bill_No', 'final_bill','is_current')
        ->where('Work_Id', $workId)
        ->where('t_bill_Id', $bill_id)
        ->orderBy('t_bill_No', 'desc')
        ->get();

    // $dbupdaedded = DB::table('bills')
    //     ->where('t_bill_Id', $bill_id)
    //     ->update([
    //         'tot_ded' => $totalDeduction,
    //         // 'chq_amt' => $chequeAmount
    //     ]);
        $DBupdatedvalueget=DB::table('bills')
        ->where('t_bill_Id', $bill_id)
        ->first();


        // $DBeditdata=DB::table('billdeds')
        // ->where('T_Bill_Id',$bill_id)
        // ->delete();
        // dd($DBeditdata);

        // dd($request->all());
        $formData = $request->all();
    // dd($formData);
        $deductionOptions = $formData['deductionOption'];
        $deductionRates = $formData['deductionRate'];
        $calculatedDeductions = $formData['calculatedDeduction'];
        $NameDeductions = $formData['customDeductionName'];
// dd($deductionOptions,$deductionRates,$calculatedDeductions,$NameDeductions);
        $tbillid = $formData['bill_Id'];
        // dd($tbillid);
            $dedMIdForDeductionOption = DB::table('dedmasters')
            ->where('Ded_Head', $deductionOptions)
            ->value('Ded_M_Id');
// dd($dedMIdForDeductionOption);

        // dd($deductionOptions);
        // $additionalDeductionOption = $formData['additionalDeductionOption'];
        // $additionalDeductionRate = $formData['additionalDeductionRate'];
        // $additionalCalculatedDeduction = $formData['additionalCalculatedDeduction'];
        // $additionalcustomDeductionName=$formData['additionalcustomDeductionName'];
// dd($additionalDeductionOption,$additionalDeductionRate,$additionalCalculatedDeduction,$additionalcustomDeductionName);
// dd($additionalcustomDeductionName);  

$totalDeduction = $formData['totalDeduction'];
// $chequeAmount = $formData['chequeAmount'];

// Check the values
// dd($totalDeduction, $chequeAmount);



// other option selct for loop
$head = [];
for ($i = 0; $i < count($deductionOptions); $i++) 
{
    $singlehead = mb_strtolower(trim($deductionOptions[$i]));

    $singledeductionHead = ($singlehead === 'other')
        ? $NameDeductions[$i]
        : $deductionOptions[$i];
    // Push the $deductionHead value into the $head array
    $head[] = $singledeductionHead;
}
// dd($head);
// other option select for loop

for ($i = 1; $i < count($deductionOptions); $i++) 
{
    $cleanOption = mb_strtolower(trim($deductionOptions[$i]));
    // dd('additionalDeductionOption: ' . $cleanOption, 
    //    'additionalcustomDeductionName: ' . $additionalcustomDeductionName[$i]);
    $deductionHead = ($cleanOption === 'other')
        ? $NameDeductions[$i]
        : $deductionOptions[$i];
    // Push the $deductionHead value into the $head array
    $head[] = $deductionHead;
}
// other option select for loop

//plus click after all DMId generated
$AdditionalDed_M_Id_array = [];
for ($i = 0; $i < count($deductionOptions); $i++) 
{

    $AdditionalDed_M_Id = DB::table('dedmasters')
        ->where('Ded_Head', $deductionOptions[$i])
        ->pluck('Ded_M_Id')->first();

    $AdditionalDed_M_Id_array[] = $AdditionalDed_M_Id;
}
// dd($AdditionalDed_M_Id_array);
//plus click after all DMId generated


//insert for loop
$data = [];
$FinalTItemId=[];
for ($i = 0; $i < count($deductionOptions); $i++) 
{
    // dd('deductionHead: ', $head[$i]);
    $SinglecDedHead = isset($head[$i]) ? $head[$i] : '';
//plus click after all DMId generated
    // $tbillid = $formData['bill_Id'];
    $dedMId = isset($AdditionalDed_M_Id_array[$i]) ? $AdditionalDed_M_Id_array[$i] : '';
//plus click after all DMId generated

    $singleDed_M_Id = DB::table('dedmasters')
        ->where('Ded_Head', $deductionOptions)
        ->value('Ded_M_Id');
// dd($singleDed_M_Id);
    // dd($tbillid);


    // $tbillidtttt = DB::table('bills')->max('t_bill_Id');
    //     dd($tbillidtttt);

    $tbillidbilltable = DB::table('billdeds')
    ->where('T_Bill_Id','=', $tbillid)
    ->max('T_Ded_Id');

    // $tbillidbilltable = DB::table('bills')
    // ->where('t_bill_Id', $bill_id)
    // ->orderBy('t_bill_Id','desc')
    // ->value('t_bill_Id');
// dd($tbillidbilltable);
// $lastT_Ded_Id = DB::table('billdeds')
//     ->where('T_Bill_Id', $tbillidbilltable)
//     ->orderBy('T_Ded_Id', 'desc')
//     ->value('T_Ded_Id');
// dd($lastT_Ded_Id);
if (isset($tbillidbilltable)) 
{
    $lastFourDigits = substr($tbillidbilltable, -2);
    // dd($lastFourDigits);
    $incrementedLastFourDigits = str_pad(intval($lastFourDigits) + 1, 2, '0', STR_PAD_LEFT);
    // dd($incrementedLastFourDigits);
    $FinalTItemId = $tbillid . $incrementedLastFourDigits;
    // dd($FinalTItemId);
    //  $FinalTItemIds[] = $FinalTItemId;
} 
else 
{
    $FinalTItemId = $tbillid . '01';
    // $FinalTItemIds[] = $FinalTItemId;


}
        // dd($FinalTItemId);
        
    if ($i == 0) 
    {
        $data[] = [
            'T_Bill_Id'=>$tbillid,
            'T_Ded_Id'=>$FinalTItemId,
            'Ded_M_Id'=>$dedMId,
            'Ded_Head' => $SinglecDedHead,
            'Ded_pc' => $deductionRates[0],
            'Ded_Amt' => $calculatedDeductions[0],
        ];

        // DB::table('billdeds')->insert($data);

        $existingData = DB::table('billdeds')->where('T_Bill_Id', $tbillid)->get();
        // dd($existingData);
        if ($existingData->isEmpty()) 
        {
            // If no data exists, insert $data
            DB::table('billdeds')->insert($data);
        } 
        else 
        {
            // If data exists, delete the existing data and insert $data
            DB::table('billdeds')->where('T_Bill_Id', $bill_id)->delete();
            DB::table('billdeds')->insert($data);
        }

    }
    
    else 
    {
        if (isset($head[$i])) 
            {
            $currentDedHead = $head[$i];
        $data[] = [
            'T_Bill_Id'=>$tbillid,
            'T_Ded_Id'=>$FinalTItemId,
            'Ded_M_Id' => $dedMId,
            'Ded_Head' =>$SinglecDedHead,
            'Ded_pc' => $deductionRates[$i],
            'Ded_Amt' => $calculatedDeductions[$i],
                    ];


                    $existingData = DB::table('billdeds')->where('T_Bill_Id', $tbillid)->get();
                    // dd($existingData);
                    if ($existingData->isEmpty()) 
                    {
                        // If no data exists, insert $data
                        DB::table('billdeds')->insert($data);
                    } 
                    else {
                        // If data exists, delete the existing data and insert $data
                        DB::table('billdeds')->where('T_Bill_Id', $bill_id)->delete();
                        DB::table('billdeds')->insert($data);
                    }
            
            

           }

        //    DB::table('billdeds')->insert($data);
    }
        //$FinalTItemIds[] = $FinalTItemId;

}
$t_bill_Id=$bill_id;
// dd($data);
//dd($FinalTItemId);
        // Redirect to the abstract page after the update
    return view('Abstract', [
        'workId' => $workId,
        't_bill_Id'=>$t_bill_Id,
        'bill_id'=>$bill_id,
        'bnod'=>$bno,
        'latestBill' => $latestBill,
        'billDataDropdown' => $billDataDropdown,
        'DBEMBdetails' =>$DBEMBdetails,
        'DBFHcode_M'=>$DBFHcode_M, 
        'DBSectionEngNames'=>$DBSectionEngNames,
        'totalDeduction'=>$totalDeduction,
        'chequeAmount'=>$chequeAmount,
        'DBupdatedvalueget'=>$DBupdatedvalueget
    ]);
    }






//     public function Funshowdedremoverow(Request $request)

// {

//     $tDedID = $request->input('tDedID');
//     $tBillID = $request->input('tBillID');
//     $workid=$request->input('workId');
//     $iscurrrent=$request->input('iscurrent');
//         dd($tDedID,$tBillID,$workid,$iscurrrent);

//     $worknm=$request->input('worknm');
//     $t_bill_no = $request->input('bill_no');
//     $t_billid = $request->input('bill_Id');
//     $NETAMT=$request->input('NETAMT');

//     // dd($workid,$t_bill_no,$t_billid);

//     $deductions = DB::table('billdeds')
//     ->where('T_Bill_Id', $tBillID)
//     ->get();
// // dd($deductions);
// $dedHead = []; // Initialize arrays to store values
// $dedPc = [];
// $dedAmt = [];
// $tBillIdArray = [];
// $tDedIdArray = [];

// foreach ($deductions as $deduction) 
// {
//     $dedHead[] = $deduction->Ded_Head; // Append values to arrays
//     $dedPc[] = $deduction->Ded_pc;
//     $dedAmt[] = $deduction->Ded_Amt;
//     $tBillIdArray[] = $deduction->T_Bill_Id; // Add T_Bill_Id to the array
//     $tDedIdArray[] = $deduction->T_Ded_Id;  
// }

// // dd($dedHead, $dedPc, $dedAmt,$tBillIdArray,$tDedIdArray);



// $DBtotaldedcheckamt=DB::table('bills')
// ->select('chq_amt','tot_ded')
// ->where('t_bill_Id', $t_billid)
// ->first();
// // dd($DBtotaldedcheckamt);


// $index = $request->input('index');
// // dd($index);

//     //here get indivisual id 
//     $tDedID = $request->input('tDedID');
//     // dd($tDedID);
//         //here get indivisual id 


//     $deletebilldeds = DB::table('billdeds')
//         ->where('T_Ded_Id', $tDedID)
//         ->delete();
        
//         // dd($deletebilldeds);

//     // Assuming the deletion was successful, return a JSON response.
//     if ($deletebilldeds) 
//     {
//         // If the deletion was successful
//         return response()->json(['success' => true]);
//     } else 
//     {
//         // If there was an error during deletion
//         return response()->json(['success' => false]);
//     }

// }



// Excsess saving function start
  public function FunExcesssave(Request $request, $tbiilid)
  {
    // dd($tbiilid);

    $workid = substr($tbiilid, 0, -4);
    // dd($workid);
    $DBWorkName=DB::table('workmasters')
    ->where('Work_Id',$workid)
    ->value('Work_Nm');
    $DBTbillNO=DB::table('bills')
    ->select('t_bill_No','final_bill')
    ->where('t_bill_Id',$tbiilid)
    ->first(); 
    
    // dd($DBTbillNO);
    
        $mbstatusSo=DB::table('bills')->where('t_bill_Id',$tbiilid)->value('mbstatus_so');
    // dd($mbstatusSo);
    if ($mbstatusSo <= 3) {
            $UpdatembstatusSO=DB::table('bills')
            ->where('work_id',$workid)->update(['mbstatus_so'=>3]);
            // dd($UpdatembstatusSO);
    }

    $gettitemid=DB::table('bil_item')
    ->select('b_item_id')
    ->where('t_bill_id',$tbiilid)
    ->distinct()
    ->get();
    // dd($gettitemid);
    $billItemIds = $gettitemid->pluck('b_item_id')->toArray();
    // dd($billItemIds);

    $tndDB_Itemid_RelatedData = collect(); // Initialize as a Collection
    $totalTItemAmt = 0; // Initialize total amount variable
    $savingQuantities = [];
    $excessQuantities = [];
    $savingAmounts = [];
    $excessAmounts = [];
    
    $totalsavingQuantity = 0;
    $totalexcessQuantity = 0;
    $totalExcessAmount = 0;
    $totalSavingAmount = 0;

    foreach ($billItemIds as $itemId) {
        $result = DB::table('tnditems')
            ->select('tnditems.t_item_no', 'tnditems.sub_no', 'tnditems.work_Id', 'tnditems.t_item_amt', 'tnditems.exs_nm', 'tnditems.item_unit', 'tnditems.tnd_qty', 'tnditems.tnd_rt', 'bil_item.exec_qty', 'bil_item.b_item_amt', 'bil_item.bill_rt', 'bil_item.b_item_id', 'bil_item.exsave_Remks', 'bil_item.t_bill_Id')
            ->join('bil_item', 'tnditems.t_item_id', '=', 'bil_item.t_item_id')
            ->where('bil_item.b_item_id', $itemId)
            ->where('tnditems.work_Id', $workid)
            ->where('bil_item.t_bill_id', $tbiilid)
            ->orderBy('tnditems.t_item_no', 'asc')
            ->get();

        $tndDB_Itemid_RelatedData = $tndDB_Itemid_RelatedData->concat($result);
        $totalTItemAmt += $result->sum('t_item_amt');

        $savingQuantities[$itemId] = 0;
        $excessQuantities[$itemId] = 0;
        $savingAmounts[$itemId] = 0;
        $excessAmounts[$itemId] = 0;

        foreach ($result as $innerItem) {
            $ResultQuantity = $innerItem->tnd_qty - $innerItem->exec_qty;
            $resultAmount = $innerItem->t_item_amt - $innerItem->b_item_amt;

            if ($ResultQuantity > 0) 
            {
                $savingQuantities[$itemId] += $ResultQuantity;
                $totalsavingQuantity += $ResultQuantity;
            } elseif ($ResultQuantity < 0) 
            {
                $excessQuantities[$itemId] += -$ResultQuantity;
                $totalexcessQuantity += -$ResultQuantity;
            }

            if ($resultAmount > 0) 
            {
                $savingAmounts[$itemId] += $resultAmount;
                $totalSavingAmount += $resultAmount;
            } elseif ($resultAmount < 0) 
            {
                $excessAmounts[$itemId] += -$resultAmount;
                $totalExcessAmount += -$resultAmount;
            }
        }
    }
    $totalsavingAmount = array_sum($savingAmounts);
    $totalexcessAmount = array_sum($excessAmounts);
    // dd($totalsavingAmount,$totalexcessAmount);
    // dd($billItemIds);
    // dd($savingQuantities, $excessQuantities, $billItemIds);
    // dd($savingQuantities, $excessQuantities, $savingAmounts, $excessAmounts, $billItemIds);
    // Calculate net effect
$netEffect = $totalSavingAmount - $totalExcessAmount;
    // dd($netEffect);
    // dd($totalTItemAmt);
    // dd($savingAmount,$excessAmount);
    // dd($savingQuantity, $excessQuantity);
// dd($totalSavingAmount,$totalExcessAmount);
// dd($totalsavingQuantity,$totalexcessQuantity);
    
    $perPage = 10; // Adjust the number of items per page as needed
    
    // Use Laravel's built-in paginate() method
    $currentPage = request()->get('page', 1);

    // Use Laravel's built-in paginate() method
    $tndItems = new LengthAwarePaginator(
        $tndDB_Itemid_RelatedData->forPage($currentPage, $perPage),
        $tndDB_Itemid_RelatedData->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );    
    return view('ExcessStatement', compact('tndItems', 'workid','tbiilid', 'totalTItemAmt', 'excessQuantities', 'savingQuantities', 'savingAmounts', 'excessAmounts', 'totalExcessAmount', 'totalSavingAmount', 'totalexcessQuantity', 'totalsavingQuantity','netEffect','DBTbillNO','DBWorkName'));

}


public function saveRemark(Request $request, $tbiilid)
{

    $workid = substr($tbiilid, 0, -4);
    // dd($workid);
    // $tbiilid=$request->input('tbillidValue');
    // dd($tbiilid);
    
        $DBWorkName=DB::table('workmasters')
    ->where('Work_Id',$workid)
    ->value('Work_Nm');
    // dd($DBWorkName);
    $DBTbillNO=DB::table('bills')
    ->select('t_bill_No','final_bill')
    ->where('t_bill_Id',$tbiilid)
    ->first(); 
    
    // dd($DBTbillNO);

    $gettitemid=DB::table('bil_item')
    ->select('t_item_id')
    ->where('t_bill_id',$tbiilid)
    ->distinct()
    ->get();
    // dd($gettitemid);
        // dd($gettitemid);
        $billItemIds = $gettitemid->pluck('t_item_id')->toArray();
        // dd($billItemIds);
    
    $tndDB_Itemid_RelatedData = collect(); // Initialize as a Collection
    $totalTItemAmt = 0; // Initialize total amount variable
    $savingQuantity = 0;
    $excessQuantity = 0;
    $excessAmount = 0;
    $savingAmount = 0;
    $totalsavingQuantity = 0;
    $totalexcessQuantity = 0;
    $totalExcessAmount = 0;
    $totalSavingAmount = 0;



    foreach ($billItemIds as $item) {
        $result = DB::table('tnditems')
            ->select('tnditems.t_item_no', 'tnditems.sub_no', 'tnditems.work_Id', 'tnditems.t_item_amt', 'tnditems.exs_nm', 'tnditems.item_unit', 'tnditems.tnd_qty', 'tnditems.tnd_rt', 'bil_item.exec_qty', 'bil_item.b_item_amt', 'bil_item.bill_rt', 'bil_item.b_item_id', 'bil_item.exsave_Remks', 'bil_item.t_bill_Id')
            ->join('bil_item', 'tnditems.t_item_id', '=', 'bil_item.t_item_id')
            ->where('bil_item.t_item_id', $item)
            ->where('tnditems.work_Id', $workid)
            ->where('bil_item.t_bill_id', $tbiilid)
            ->orderBy('tnditems.t_item_no', 'asc')
            ->get();

        $tndDB_Itemid_RelatedData = $tndDB_Itemid_RelatedData->concat($result);
        $totalTItemAmt += $result->sum('t_item_amt');

        foreach ($result as $item) {
            $ResultQuantity = $item->tnd_qty - $item->exec_qty;
            $resultAmount = $item->t_item_amt - $item->b_item_amt;

            if ($ResultQuantity > 0) 
            {
                $savingQuantity = $ResultQuantity;
                $totalsavingQuantity += $savingQuantity;
            } 
            elseif ($ResultQuantity < 0) 
            {
                $excessQuantity = -$ResultQuantity;
                $totalexcessQuantity += $excessQuantity;
            }


            if ($resultAmount > 0) 
            {
                $savingAmount=$resultAmount;
                $totalSavingAmount += $resultAmount;
            
            } 
            elseif ($resultAmount < 0) 
            {
                $excessAmount=-$resultAmount;
                $totalExcessAmount += $excessAmount;
            }
        }
    }

    // Calculate net effect
$netEffect = $totalSavingAmount - $totalExcessAmount;
    // dd($netEffect);
    // dd($totalTItemAmt);
    // dd($savingAmount,$excessAmount);
    // dd($savingQuantity, $excessQuantity);
// dd($totalSavingAmount,$totalExcessAmount);
// dd($totalsavingQuantity,$totalexcessQuantity);
    
    $perPage = 10; // Adjust the number of items per page as needed
    // Use Laravel's built-in paginate() method
    $currentPage = request()->get('page', 1);

    // Use Laravel's built-in paginate() method
    $tndItems = new LengthAwarePaginator(
        $tndDB_Itemid_RelatedData->forPage($currentPage, $perPage),
        $tndDB_Itemid_RelatedData->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );    

    // dd('ok');
    $bItemId = $request->input('b_item_id');
    $remarkValue = $request->input('remark');
    // dd($bItemId,$remarkValue,$tbiilid);
    //Update Remark
 DB::table('bil_item')
 ->where('b_item_id', $bItemId)
 ->update(['exsave_Remks' => $remarkValue]);

 $updatedData = DB::table('bil_item')
    ->where('b_item_id', $bItemId)
    ->first();
// dd($updatedData);

return view('ExcessStatement', compact('tndItems', 'tbiilid', 'totalTItemAmt', 'excessQuantity', 'savingQuantity', 'savingAmount', 'excessAmount', 'totalExcessAmount', 'totalSavingAmount', 'totalexcessQuantity', 'totalsavingQuantity','netEffect' , 'workid','DBWorkName','DBTbillNO'));
}



public function FunRecoverystatementIndex(Request $request)
{
    // dd($tbiilid);
    $tbiilid = $request->input('t_bill_Id');

    $workid = substr($tbiilid, 0, -4);

// dd($tbiilid,$workid);
    // dd('ok');

$DBrecoveriesGet=DB::table('recoveries')
->where('t_bill_id',$tbiilid)
->get();
// dd($DBrecoveriesGet);


    $countDBrecoveriesGet=$DBrecoveriesGet->count();

$royaltylab = [ "001991","001992","002048","004349","002047","003229","004346","004347","004348","004350"];

// Get items where the last 6 digits of item_id match values in $royaltylab
$matchTnditem = DB::table('bil_item')
->select('bil_item.t_item_id', 'bil_item.t_item_no', 'bil_item.exec_qty', 'bil_item.prv_bill_qty', 'bil_item.bill_rt', 'bil_item.b_item_amt', 'bil_item.item_id', 'tnditems.tnd_qty', 'tnditems.tnd_rt', 'tnditems.t_item_amt', 'tnditems.item_id')
->join('tnditems', 'bil_item.t_item_id', '=', 'tnditems.t_item_id')
->where('bil_item.t_bill_id', $tbiilid)
->whereIn(DB::raw("SUBSTRING(bil_item.item_id, -6)"), $royaltylab)
->orderBy('bil_item.t_item_no', 'asc')
->get();

$countmatchTnditem = $matchTnditem->count();
// dd($countmatchTnditem);

$sumCurMAmt = "0.00"; // Manually set to 0.00 if collection is empty
if ($DBrecoveriesGet->count() > 0) 
{
    // Collection is not empty
    // dd('ok');
    // $sumCurMAmt = $DeleteDBrecoveriesGet->sum('Cur_M_Amt');
    // $sumCurMAmt = number_format(round($DBrecoveriesGet->sum('Cur_M_Amt'), 1), 2);
                                $commonHelper = new CommonHelper();
                // Call the customRound function to round the sum of 'Cur_M_Amt' values
                $sumCurMAmt = $commonHelper->customRound($DBrecoveriesGet->sum('Cur_M_Amt'));

    
} 



return view('viewRecoveryStatement',compact('DBrecoveriesGet','workid','tbiilid','matchTnditem','countDBrecoveriesGet','countmatchTnditem','sumCurMAmt'));

}

public function FunTotalRecovery(Request $request, $tbiilid,$workid)
{
    // Access $tbiilid here
    // dd($tbiilid);
    // dd($workid);
    $Work_Id=$workid;
    // dd($Work_Id);
    $TotalproRecovery=$request->input('TotalproRecovery');
    // dd($TotalproRecovery);

    // $commonHelper = new CommonHelper();
    // // Call the customRound method on the instance
    // $TotalproRecovery = $commonHelper->customRound($TotalproRecovery); 
    // dd($TotalproRecovery);

    $getc_netamt=DB::table('bills')
    ->where('t_bill_Id', $tbiilid)
    ->value('c_netamt');

    $getTotDeduction=DB::table('bills')
    ->where('t_bill_Id', $tbiilid)
    ->value('tot_ded');
     
    // $chequeAmtResult=$getc_netamt - $getTotDeduction -$TotalproRecovery;
    $chequeAmtResult = $getc_netamt - $getTotDeduction ;

// dd($getc_netamt,$getTotDeduction,$TotalproRecovery,$chequeAmtResult);
    $UpdateTotRecovery=DB::table('bills')
    ->where('t_bill_Id', $tbiilid)
    ->update([
    // 'tot_recovery' => $TotalproRecovery,
    'chq_amt'=>$chequeAmtResult]);    
    // dd($UpdateTotRecovery);


    $t_bill_Id=$tbiilid;
    // dd($t_bill_Id);
        $mbstatusSo=DB::table('bills')->where('t_bill_Id',$t_bill_Id)->value('mbstatus_so');
    // dd($mbstatusSo);
    if ($mbstatusSo <= 2) {
        $UpdatembstatusSO=DB::table('bills')
    ->where('t_bill_Id',$t_bill_Id)->where('work_id',$Work_Id)
    ->update(['mbstatus_so'=>2]);
    // dd($UpdatembstatusSO);
}
    return redirect()->route('billlist', ['workid' => $Work_Id]);
}

public function saveRecovery(Request $request)
    {
// dd('ok');
// dd($request->all());
        // Retrieve data from the AJAX request
        // $workid = $request->input('workid');

        // $tbiilid = $request->input('tbiilid');
        // $workid = substr($tbiilid, 0, -4);
        $workid = $request->input('workid');
        $tbiilid = $request->input('tbiilid');
        $Material = $request->input('material');
        // dd($material);
        $Mat_Unit = '';
        $AsperQty = $request->input('asperQty');
        $AsperRt = $request->input('asperRt');
        $AsperAmt = $request->input('asperAmt');
// dd($AsperQty,$AsperRt,$AsperAmt);
        $uptodateQty = $request->input('uptodateQty');
        $UptodateAmt = $request->input('uptodateAmt');
        $allreadyQty = $request->input('allreadyQty');
        $allreadyAmt = $request->input('allreadyAmt');

        $PropoQty = $request->input('propoQty');
        $PropoAmt = $request->input('propoAmt');
        $balQty = $request->input('balQty');
        $balAmt = $request->input('balAmt');

        $Remark = $request->input('remark');
        // dd($tot_recovery);
        if ($Remark === null) {
            $Remark = ''; // Set it to an empty string
        }
        $Maxbil_mat_id= DB::table('recoveries')
        ->where('t_bill_id','=', $tbiilid)
        ->max('Bil_Mat_Id');

        if (isset($Maxbil_mat_id)) 
        {
            $lastsevenDigits = substr($Maxbil_mat_id, -7);
            // dd($lastsevenDigits);
            $incrementedLastFourDigits = str_pad(intval($lastsevenDigits) + 1, 7, '0', STR_PAD_LEFT);
            // dd($incrementedLastFourDigits);
            $FinalBill_mat_Id = $tbiilid . $incrementedLastFourDigits;
            // dd($FinalBill_mat_Id);
        } 
        else 
        {
            $FinalBill_mat_Id = $tbiilid . '0000001'; 
        }
        

        $MaxSrNO= DB::table('recoveries')
        ->where('t_bill_id','=', $tbiilid)
        ->max('Sr_no');
        // dd($MaxSrNO);

        if (isset($MaxSrNO)) 
        {
            $lastDigits = substr($MaxSrNO, -1);
            // dd($lastDigits);
            $SRNO = str_pad(intval($lastDigits) + 1, STR_PAD_LEFT);
            // dd($SRNO);
        } 
        
        else 
        {
            $SRNO = '1'; 
        }

        // dd('ok');
        // Perform database insertion

          $insertrecovery= DB::table('recoveries')->insert([
                'work_Id' =>$workid,
                't_bill_id' =>$tbiilid,
                // 'Unique_id' =>$tbiiiid,
                'Sr_no' => $SRNO,
                'Bil_Mat_Id' => $FinalBill_mat_Id,
                // 'Sub_Id' => $tbiiiid,
                'Material' =>$Material,
                'Mat_Qty'=>$AsperQty ,
                'Mat_Unit'=>$Mat_Unit ,
                'Mat_Rt' => $AsperRt,
                'Mat_Amt' => $AsperAmt,
                'UptoDt_m_Qty' => $uptodateQty,
                'UptoDt_m_Amt'=>$UptodateAmt ,
                'pre_m_Qty'=> $allreadyQty,
                'pre_M_Amt' =>$allreadyAmt ,
                'Cur_M_Qty' => $PropoQty,
                'Cur_M_Amt' => $PropoAmt,
                'Bal_M_Qty'=> $balQty,
                'Bal_M_Amt' => $balAmt ,
                'Remark'=> $Remark

            ]);

            $DBrecoveriesGet = DB::table('recoveries')
            ->where('t_bill_id',$tbiilid)
            ->get();
            $countDBrecoveriesGet=$DBrecoveriesGet->count();
    // dd($DBrecoveriesGet);

return response()->json([
    'DBrecoveriesGet' => $DBrecoveriesGet,
]);
}

public function Funbillitemrecordinsert(Request $request)
{
    // dd('ok');
    $workid = $request->input('workid');
    $tbiilid = $request->input('tbiilid');
    // dd($workid,$tbiilid);


    $DBrecoveriesGet = DB::table('recoveries')
    ->where('t_bill_id', $tbiilid)
    ->get();
$countDBrecoveriesGet=$DBrecoveriesGet->count();
// dd($countDBrecoveriesGet);

if ($countDBrecoveriesGet == 0) {

    
    $groupOfRoyaltyIds = array(
        "0" => "001991,TEST",
        "1" => "001992,002048",
        "2" => "004349,002047",
        "3" => "004350,003940,003941",
        "4" => "003229",
        "5" => "004346",
        "6" => "004347",
        "7" => "004348"
    );   
    
    $royaltylab = [];

    foreach ($groupOfRoyaltyIds as $value) 
    {
        // Explode the string into an array separated by ,
        $subArray = explode(",", $value);
    
        // Flag to check if a match is found in the current group
        $matchFoundInGroup = false;
    
        // Add individual elements to the $royaltylab array
        foreach ($subArray as $element) {
            // Calculate the length of each element
            $elementLength = strlen($element);
    
            // Check if the last 6 characters of $element match
            if ($elementLength === 6) 
            {
                // Perform your DB query to get the item_id
                $result = DB::table('bil_item')
                ->select('bil_item.t_item_id', 'bil_item.t_item_no', 'bil_item.exec_qty', 'bil_item.prv_bill_qty', 'bil_item.bill_rt', 'bil_item.b_item_amt', 'bil_item.item_id', 'tnditems.tnd_qty', 'tnditems.tnd_rt', 'tnditems.t_item_amt', 'tnditems.item_id')
                ->join('tnditems', 'bil_item.t_item_id', '=', 'tnditems.t_item_id')
                
                ->where('bil_item.t_bill_id', $tbiilid)
                    ->whereIn(DB::raw("SUBSTRING(bil_item.item_id, -6)"), [$element])
                    ->orderBy('bil_item.t_item_no', 'asc')
                    ->first();
    
            } 
            elseif ($element === "TEST" && !$matchFoundInGroup) 
            {
                // Perform your DB query to get the item_id for "TEST" condition
                $result = DB::table('bil_item')
                ->select('bil_item.t_item_id', 'bil_item.t_item_no', 'bil_item.exec_qty', 'bil_item.prv_bill_qty', 'bil_item.bill_rt', 'bil_item.b_item_amt', 'bil_item.item_id', 'tnditems.tnd_qty', 'tnditems.tnd_rt', 'tnditems.t_item_amt', 'tnditems.item_id')
                ->join('tnditems', 'bil_item.t_item_id', '=', 'tnditems.t_item_id')
                
                ->where('bil_item.t_bill_id', $tbiilid)
                    ->where(DB::raw("SUBSTRING(bil_item.item_id, 1, 4)"), 'LIKE', 'TEST%')
                    ->orderBy('bil_item.t_item_no', 'asc')
                    ->first();
    
            }
            if ($result !== null) {
                $royaltylab[] = $result;
                $matchFoundInGroup = true;
                break; // Stop checking the next elements in the group
            }
        }
        // dd($value, $subArray, $royaltylab);
    }
// dd($value, $subArray, $royaltylab);

    // dd($royaltylab);
$royaltylabArraysix=[];
foreach ($royaltylab as $calAmt) 
{
// dd($calAmt);
    $item_id = $calAmt->item_id ?? null;
    $lastSixDigits = substr($item_id, -6);
    $firstFourDigits = substr($item_id, 0, 4);

    if ($firstFourDigits !== "TEST") 
    {
        if ($lastSixDigits) {
            $royaltylabMaterial = [
                "001991" => "Recovery Of Quality Control Test Shortfall",
                "001992" => "Recovery Of  Rayalty Charges at the  rate of Rs.$calAmt->tnd_rt per Cubic Metre",
                "002048" => "Recovery Of  Rayalty Charges at the  rate of Rs.$calAmt->tnd_rt per Cubic Metre",
                "004349" => "Recovery Of Royalty Charges For Natural Sand at the Rate of Rs.$calAmt->tnd_rt per Cubic Metre ",
                "002047" => "Recovery Of Royalty Charges For Natural Sand at the Rate of Rs.$calAmt->tnd_rt per Cubic Metre",
                "003229" => "Recovery Of Royalty charges For laterite at the .$calAmt->tnd_rt",
                "004346" => "Recovery Of  surchange On Royalty charges at the Rate  of Rs..$calAmt->tnd_rt per Cubic Metre",
                "004347" => "Recovery Of  surchange On Royalty charges for Natural sand at the Rate Of Rs.$calAmt->tnd_rt per Cubic Metre",
                "004348" => "Recovery Of  surchange On Royalty charges for laterite at the rate  of Rs.$calAmt->tnd_rt per Cubic Metre",
                "004350" => "Recovery Of District Mineral Foundation on Royalty Charges for Natural Sand at the rate of Rs.$calAmt->tnd_rt per Cubic Metre",
                "003940" => "Recovery Of District Mineral Foundation on Royalty Charges for Natural Sand at the rate of Rs.$calAmt->tnd_rt per Cubic Metre",
                "003941" => "Recovery Of District Mineral Foundation on Royalty Charges for Natural Sand at the rate of Rs.$calAmt->tnd_rt per Cubic Metre",
            ];

            if (isset($royaltylabMaterial[$lastSixDigits])) {
                $materialName = $royaltylabMaterial[$lastSixDigits];

                $royaltylabArraysix[] = [
                    'last_six_digits' => $lastSixDigits,
                    'item_id' => $item_id,
                    'material_name' => $materialName,
                ];
            }
        }
    } elseif ($firstFourDigits === "TEST") 
    {
        $royaltylabMaterial = [
            "TEST" => "Recovery Of Quality Control Test Shortfall",
        ];

        if (isset($royaltylabMaterial[$firstFourDigits])) 
        {
            $materialName = $royaltylabMaterial[$firstFourDigits];

            $royaltylabArraysix[] = [
                'last_six_digits' => $lastSixDigits,
                'item_id' => $item_id,
                'material_name' => $materialName,
            ];
        }
         else 
         {
            // Handle the case when there is no match for "TEST"
            // You can add specific logic here if needed
            // dd("No match for TEST: $firstFourDigits");
        }
    }
    if($lastSixDigits === '001991' ||  $firstFourDigits === "TEST")
    {
        $calAmt->tnd_qty=0;
        $calAmt->tnd_rt=0;
    }

    $AspertenderAmt = $calAmt->tnd_qty * $calAmt->tnd_rt;
    // dd($calAmt->tnd_qty,$calAmt->tnd_rt,$AspertenderAmt);
    $UptodateAmt=$calAmt->exec_qty * $calAmt->tnd_rt;
    // dd($calAmt->exec_qty,$calAmt->tnd_rt,$UptodateAmt);
    $allreadyRecAmt=$calAmt->prv_bill_qty * $calAmt->tnd_rt;
// dd($calAmt->prv_bill_qty,$calAmt->tnd_rt,$allreadyRecAmt);
    $proposedUty = $calAmt->exec_qty - $calAmt->prv_bill_qty;
    $proposedUtyAmt = $proposedUty * $calAmt->tnd_rt;
// dd($calAmt->exec_qty,$calAmt->prv_bill_qty, $proposedUty,$proposedUtyAmt);

$balRecQnty = $calAmt->exec_qty - $calAmt->prv_bill_qty - $proposedUty ;
$balRecAmount= $balRecQnty * $calAmt->tnd_rt ;
// $balRecAmountArray[]=$balRecAmount;
// dd($calAmt->exec_qty,$calAmt->prv_bill_qty,$proposedUty,$balRecQnty,$balRecAmount);
// Set $Mat_Unit based on the item_id
$Mat_Unit = ($lastSixDigits == "001991") ? "L.M" : "Cu.M";
// dd($Mat_Unit);

$Maxbil_mat_id= DB::table('recoveries')
->where('t_bill_id','=', $tbiilid)
->max('Bil_Mat_Id');

            if (isset($Maxbil_mat_id)) 
            {
                $lastsevenDigits = substr($Maxbil_mat_id, -7);
                // dd($lastsevenDigits);
                $incrementedLastFourDigits = str_pad(intval($lastsevenDigits) + 1, 7, '0', STR_PAD_LEFT);
                // dd($incrementedLastFourDigits);
                $FinalBill_mat_Id = $tbiilid . $incrementedLastFourDigits;
                // dd($FinalBill_mat_Id);
            } 
            else 
            {
                $FinalBill_mat_Id = $tbiilid . '0000001'; 
            }
                           
            // dd($FinalBill_mat_Id);


        $MaxSrNO= DB::table('recoveries')
        ->where('t_bill_id','=', $tbiilid)
        ->max('Sr_no');
        // dd($MaxSrNO);

        if (isset($MaxSrNO)) 
        {
            $lastDigits = substr($MaxSrNO, -1);
            // dd($lastDigits);
            $SRNO = str_pad(intval($lastDigits) + 1, STR_PAD_LEFT);
            // dd($SRNO);
        } 
        else 
        {
            $SRNO = '1'; 
        }
                  
        // dd($SRNO);
        $Remark='';
        $Sub_Id='';

        if ($countDBrecoveriesGet == 0) 
        {
            $insertrecovery= DB::table('recoveries')->insert([
                  'work_Id' =>$workid,
                  't_bill_id' =>$tbiilid,
                  // 'Unique_id' =>$tbiiiid,
                  'Sr_no' => $SRNO,
                  'Bil_Mat_Id' => $FinalBill_mat_Id,
                  'Sub_Id' => $Sub_Id,
                  'Material' =>  $materialName,
                  'Mat_Qty'=>$calAmt->tnd_qty ,
                  'Mat_Unit'=>$Mat_Unit ,
                  'Mat_Rt' => $calAmt->tnd_rt,
                  'Mat_Amt' => $AspertenderAmt,
                  'UptoDt_m_Qty' => $calAmt->exec_qty,
                  'UptoDt_m_Amt'=>$UptodateAmt ,
                  'pre_m_Qty'=> $calAmt->prv_bill_qty,
                  'pre_M_Amt' =>$allreadyRecAmt ,
                  'Cur_M_Qty' => $proposedUty,
                  'Cur_M_Amt' => $proposedUtyAmt,
                  'Bal_M_Qty'=> $balRecQnty,
                  'Bal_M_Amt' => $balRecAmount ,
                  'Remark'=> $Remark
          
              ]);
            //   dd($insertrecovery);
              }
          

}
// dd($royaltylabArraysix);
    $materialName="Recovery Of Labour Insurance";
    $Insurancetnd_qty=0;
    $Insurancetnd_rttt=0;
    $InsuranceAspertenderAmt = 0;
// dd($calAmt->tnd_qty,$calAmt->tnd_rt,$AspertenderAmt);
$exec_qty = 0;
$prv_bill_qt =0;
$UptodateAmt=0;
// dd($calAmt->exec_qty,$calAmt->tnd_rt,$UptodateAmt);
$prv_bill_qty=0;
$allreadyRecAmt=0 ;
// dd($calAmt->prv_bill_qty,$calAmt->tnd_rt,$allreadyRecAmt);
$proposedUty = 0;
$proposedUtyAmt = 0;
// dd($calAmt->exec_qty,$calAmt->prv_bill_qty, $proposedUty,$proposedUtyAmt);

$balRecQnty = 0 ;
$balRecAmount= 0 ;

// $balRecAmountArray[]=$balRecAmount;
// dd($calAmt->exec_qty,$calAmt->prv_bill_qty,$proposedUty,$balRecQnty,$balRecAmount);
// Set $Mat_Unit based on the item_id
// $Mat_Unit = ($lastSixDigits == "001991") ? "L.M" : "Cu.M";
$Mat_Unit="L.M";
// dd($Mat_Unit);


$Maxbil_mat_id= DB::table('recoveries')
->where('t_bill_id','=', $tbiilid)
->max('Bil_Mat_Id');

        if (isset($Maxbil_mat_id)) 
        {
            $lastsevenDigits = substr($Maxbil_mat_id, -7);
            // dd($lastsevenDigits);
            $incrementedLastFourDigits = str_pad(intval($lastsevenDigits) + 1, 7, '0', STR_PAD_LEFT);
            // dd($incrementedLastFourDigits);
            $FinalBill_mat_Id = $tbiilid . $incrementedLastFourDigits;
            // dd($FinalBill_mat_Id);
        } 
        else 
        {
            $FinalBill_mat_Id = $tbiilid . '0000001'; 
        }
                       
        // dd($FinalBill_mat_Id);


    $MaxSrNO= DB::table('recoveries')
    ->where('t_bill_id','=', $tbiilid)
    ->max('Sr_no');
    // dd($MaxSrNO);

    if (isset($MaxSrNO)) 
    {
        $lastDigits = substr($MaxSrNO, -1);
        // dd($lastDigits);
        $SRNO = str_pad(intval($lastDigits) + 1, STR_PAD_LEFT);
        // dd($SRNO);
    } 
    else 
    {
        $SRNO = '1'; 
    }
              
    // dd($SRNO);
    $Remark='';
    $Sub_Id='';

        $insertrecovery= DB::table('recoveries')->insert([
              'work_Id' =>$workid,
              't_bill_id' =>$tbiilid,
              // 'Unique_id' =>$tbiiiid,
              'Sr_no' => $SRNO,
              'Bil_Mat_Id' => $FinalBill_mat_Id,
              'Sub_Id' => $Sub_Id,
              'Material' =>  $materialName,
              'Mat_Qty'=>$Insurancetnd_qty ,
              'Mat_Unit'=>$Mat_Unit ,
              'Mat_Rt' => $Insurancetnd_rttt,
              'Mat_Amt' => $InsuranceAspertenderAmt,
              'UptoDt_m_Qty' => $exec_qty,
              'UptoDt_m_Amt'=>$UptodateAmt ,
              'pre_m_Qty'=> $prv_bill_qty,
              'pre_M_Amt' =>$allreadyRecAmt ,
              'Cur_M_Qty' => $proposedUty,
              'Cur_M_Amt' => $proposedUtyAmt,
              'Bal_M_Qty'=> $balRecQnty,
              'Bal_M_Amt' => $balRecAmount ,
              'Remark'=> $Remark
      
          ]);
        //   dd($insertrecovery);

}

    $DBrecoveriesGet = DB::table('recoveries')
    ->where('t_bill_id', $tbiilid)
    ->get();
    $countDBrecoveriesGet=$DBrecoveriesGet->count();

   
    // dd($DeleteDBrecoveriesGet->count());
// dd($DeleteDBrecoveriesGet);
    $sumCurMAmt = "0.00"; // Manually set to 0.00 if collection is empty
    if ($DBrecoveriesGet->count() > 0) 
    {
        // Collection is not empty
        // dd('ok');
        // $sumCurMAmt = $DeleteDBrecoveriesGet->sum('Cur_M_Amt');
        // $sumCurMAmt = number_format(round($DBrecoveriesGet->sum('Cur_M_Amt'), 1), 2);
                            $commonHelper = new CommonHelper();
                // Call the customRound function to round the sum of 'Cur_M_Amt' values
                $sumCurMAmt = $commonHelper->customRound($DBrecoveriesGet->sum('Cur_M_Amt'));

    } 
    
    return view('viewRecoveryStatement',compact('workid','tbiilid','DBrecoveriesGet','countDBrecoveriesGet',
     'sumCurMAmt',
    // 'countmatchTnditem'
));
}

public function FunEditRecovery(Request $request, $uniqueId, $tbiilid)
{
    // dd($uniqueId, $tbiilid);
    
    $workid = substr($tbiilid, 0, -4);
    // dd($request);
        // dd($uniqueId,$tbiilid,$workid);

    $getdataRecovery=DB::table('recoveries')
    ->where('unique_id',$uniqueId)
    ->get();
    // dd($getdataRecovery);

    $DBrecoveriesGet = DB::table('recoveries')
    ->where('t_bill_id', $tbiilid)
    ->get();
    // dd($DBrecoveriesGet);
    $countDBrecoveriesGet=$DBrecoveriesGet->count();
// dd($countDBrecoveriesGet);

    // return response('viewRecoveryStatement',compact('getdataRecovery','countDBrecoveriesGet','workid','tbiilid','DBrecoveriesGet'));
    return response()->json([
        'getdataRecovery' => $getdataRecovery,
    ]);


}


public function updateRecovery(Request $request)
{
    // dd($request->all());
    $updateData=$request->all();
    // Log the entire array to your Laravel log
    Log::info('Update Data:', $updateData);
    $unique_id = $updateData['uniqueId'];
    $tbillid = $updateData['tbillid'];
    $material = $updateData['updatedMaterial'];

    $asperQty = $updateData['updatedAsperQty'];
    $asperRt = $updateData['updateAsperRt'];
    $asperAmt = $updateData['UpdateAsperAmt'];

    $UptodateQty = $updateData['Update_uptodateQty'];
    $UptodateAmt = $updateData['Update_UptodateAmt'];

    $AllreadyQty = $updateData['Update_allreadyQty'];
    $AllreadyAmt = $updateData['Update_allreadyAmt'];

    $proQty = $updateData['Update_PropoQty'];
    $ProAmt = $updateData['Update_PropoAmt'];

    $BalQty = $updateData['Update_balQty'];
    $BalAmt = $updateData['Update_balAmt'];

    $Remark = $updateData['Update_Remark'];

    // dd($asperQty,$asperRt,$asperAmt,$UptodateQty, $UptodateAmt,$AllreadyQty,$AllreadyAmt,$proQty,$ProAmt,$BalQty,$BalAmt);
    
    // Update the recovery data in the database
  $updateddata=  DB::table('recoveries')
        ->where('unique_id', $unique_id)
        ->update([
            'Material' => $material,
            'Mat_Qty'=>$asperQty,
            'Mat_Rt' => $asperRt,
            'Mat_Amt' => $asperAmt,
            'UptoDt_m_Qty' => $UptodateQty,
            'UptoDt_m_Amt'=>$UptodateAmt ,
            'pre_m_Qty'=> $AllreadyQty,
            'pre_M_Amt' =>$AllreadyAmt ,
            'Cur_M_Qty' => $proQty,
            'Cur_M_Amt' => $ProAmt,
            'Bal_M_Qty'=> $BalQty,
            'Bal_M_Amt' => $BalAmt ,
            'Remark'=> $Remark
            ]);
// dd($updateddata);
$DBrecoveriesGet=DB::table('recoveries')
->where('t_bill_id', $tbillid)
->get();
// dd($DBrecoveriesGet);

$updatedRow = DB::table('recoveries')
    ->where('unique_id', $unique_id) // Replace with the appropriate condition
    ->first();
    // dd($updatedRow);
$countDBrecoveriesGet=$DBrecoveriesGet->count();

$DBrecoveriesGet = DB::table('recoveries')
->where('t_bill_id', $tbillid)
->get();


// dd($DeleteDBrecoveriesGet->count());
// dd($DeleteDBrecoveriesGet);
$sumCurMAmt = "0.00"; // Manually set to 0.00 if collection is empty
if ($DBrecoveriesGet->count() > 0) 
{
    // Collection is not empty
    // dd('ok');
    // $sumCurMAmt = $DeleteDBrecoveriesGet->sum('Cur_M_Amt');
    // $sumCurMAmt = number_format(round($DBrecoveriesGet->sum('Cur_M_Amt'), 1), 2);
    
                    $commonHelper = new CommonHelper();
                // Call the customRound function to round the sum of 'Cur_M_Amt' values
                $sumCurMAmt = $commonHelper->customRound($DBrecoveriesGet->sum('Cur_M_Amt'));

} 



return response()->json([
    'DBrecoveriesGet' => $DBrecoveriesGet,
    'sumCurMAmt' => $sumCurMAmt
]);



        }

        public function FunDeleteRecovery(Request $request)   
        {

            // dd($request);

            $UniqueId = $request->input('itemId');
            $tbiilid = $request->input('tbillId');
            $workid = substr($tbiilid, 0, -4);

            // dd($UniqueId,$tbiilid);
            $deleteREcovery=DB::table('recoveries')
            ->where('unique_id',$UniqueId)
            ->delete();
            // dd($deleteREcovery);
            $DeleteDBrecoveriesGet=DB::table('recoveries')
            ->where('t_bill_id', $tbiilid)
            ->get();
            // dd($DeleteDBrecoveriesGet->count());
        // dd($DeleteDBrecoveriesGet);
            $sumCurMAmt = "0.00"; // Manually set to 0.00 if collection is empty
            if ($DeleteDBrecoveriesGet->count() > 0) 
            {
                // Collection is not empty
                // dd('ok');
               // $sumCurMAmt = $DeleteDBrecoveriesGet->sum('Cur_M_Amt');
                $commonHelper = new CommonHelper();
                // Call the customRound function to round the sum of 'Cur_M_Amt' values
                $sumCurMAmt = $commonHelper->customRound($DeleteDBrecoveriesGet->sum('Cur_M_Amt'));
            } 
            
 //dd($sumCurMAmt);


    return response()->json([
        'DeleteDBrecoveriesGet' => $DeleteDBrecoveriesGet,
        'sumCurMAmt'=> $sumCurMAmt,
    ]);
    
        }

        public function FunclosepageRecovery(Request $request)
        {
             $workid=$request->workid;
        //    dd($workid);
                $t_bill_Id=$request->tbiilid;
        // dd($workid,$t_bill_Id);
        $mbstatusSo=DB::table('bills')->where('t_bill_Id',$t_bill_Id)->value('mbstatus_so');
        // dd($mbstatusSo);
        if ($mbstatusSo <= 2)
        {
            $UpdatembstatusSO=DB::table('bills')
        ->where('t_bill_Id',$t_bill_Id)->where('work_id',$workid)
        ->update(['mbstatus_so'=>2]);
        // dd($UpdatembstatusSO);
        }

            return redirect()->route('billlist', ['workid' => $workid]);

        }


}
