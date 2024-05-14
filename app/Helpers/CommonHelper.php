<?php
// app/Helpers/CommonHelper.php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;


class CommonHelper
{
    public static function formatTItemNo($t_item_no)
    {
        if ($t_item_no % 10 == 1 && $t_item_no != 11) {
            return '1st';
        }
        elseif ($t_item_no % 10 == 2 && $t_item_no != 12) {
            return '2nd';
        }
        elseif ($t_item_no % 10 == 3 && $t_item_no != 13) {
            return '3rd';
        }
        elseif ($t_item_no >= 4) {
            return $t_item_no . 'th';
        }
        else {
            return $t_item_no;
        }

    }

    public static function getBillType($final_bill)
    {
        return $final_bill == 1 ? '& Final Bill' : 'R.A. Bill';
    }

    public static function formatNumbers($RBBillNo)
    {

        if ($RBBillNo == 1) {
            return '1st';
        }
        elseif ($RBBillNo == 2) {
            return '2nd';
        }
        elseif ($RBBillNo == 3 ) {
            return '3rd';
        }
        elseif ($RBBillNo >= 4) {
            return $RBBillNo . 'th';
        }
        else {
            return $RBBillNo;
        }

    }


    function customRound($value) {
        // Separate the integer part and the decimal part
        $integerPart = floor($value);
        $decimalPart = $value - $integerPart;

        // Round the decimal part
        if ($decimalPart >= 0.5) {
            $roundedDecimalPart = 1;
        } else {
            $roundedDecimalPart = 0;
        }

        // Combine the integer and rounded decimal parts
        $roundedValue = $integerPart + $roundedDecimalPart;

// Format the rounded value to two decimal places without thousands separators
    return number_format($roundedValue, 2, '.', '');

}


// function convertAmountToWords($amount)
// {
//     $units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
//     $teens = ['', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
//     $tens = ['', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
//     $thousands = ['', 'Thousand', 'Lakh', 'Million', 'Billion', 'Trillion'];

//     $num = number_format($amount, 2, '.', '');
//     list($dollars, $cents) = explode('.', $num);

//     $dollars = intval($dollars);
//     $words = [];

//     if ($dollars == 0) {
//         $words[] = 'Zero';
//     } else {
//         $groups = array_reverse(str_split(str_pad($dollars, ceil(strlen($dollars) / 3) * 3, '0', STR_PAD_LEFT), 3));
//         foreach ($groups as $groupIndex => $group) {
//             $group = intval($group);
//             if ($group > 0) {
//                 $groupWords = [];
//                 $hundreds = floor($group / 100);
//                 $remainder = $group % 100;

//                 if ($hundreds > 0) {
//                     $groupWords[] = $units[$hundreds] . ' Hundred';
//                 }

//                 if ($remainder > 0) {
//                     if ($remainder < 10) {
//                         $groupWords[] = $units[$remainder];
//                     } elseif ($remainder < 20) {
//                         $groupWords[] = $teens[$remainder - 10];
//                     } else {
//                         $tensDigit = floor($remainder / 10);
//                         $unitDigit = $remainder % 10;
//                         if ($tensDigit > 0) {
//                             $groupWords[] = $tens[$tensDigit];
//                         }
//                         if ($unitDigit > 0) {
//                             $groupWords[] = $units[$unitDigit];
//                         }
//                     }
//                 }

//                 $groupWords[] = $thousands[$groupIndex];
//                 $words = array_merge($groupWords, $words);
//             }
//         }
//     }

//     $result = implode(' ', array_filter($words));
//     $result = ucfirst($result);

//     if ($cents > 0) {
//         $cents = intval($cents);
//         $centsWord=$this->convertAmountToWords($cents);
//         $result .= " and Paise $cents";
//     } else {
//         $result .= " and Paise";
//     }

//     return $result;
// }


function convertAmountToWords($fig)
{
    if (empty($fig) || !is_numeric($fig) || ($fig > 999999999.99)) {
        return "";
    }
    if ($fig == 0) {
        return "Rupees Nil and Paise Nil Only";
    }
    $fig =round($fig,2);
    // dd($fig);

  // Initialize variables
  $word = "Rupees ";  // Start with the Rupees prefix
  $lnFInt = intval($fig);  // Get the integer part of the figure
  $lnDcml = round(($fig - $lnFInt) * 100, 0);  // Calculate the decimal part in paise
  $lnFInt1 = $lnFInt;  // Store the integer part in another variable
//   dd($fig,$lnFInt,$lnDcml,$lnFInt1);
if ($lnFInt1 > 9999999 && $lnFInt1 <= 999999999) {
    $lnNum = intval($lnFInt1 / 10000000);
    $word .= DB::table('f2w')->where('fig', $lnNum)->value('wrd') . " Crore ";
    $lnFInt1 -= ($lnNum * 10000000);
}

if ($lnFInt1 > 99999 && $lnFInt1 <= 9999999) {
    $lnNum = intval($lnFInt1 / 100000);
    $word .= DB::table('f2w')->where('fig', $lnNum)->value('wrd') . " Lakh ";
    $lnFInt1 -= ($lnNum * 100000);
}

if ($lnFInt1 > 999 && $lnFInt1 <= 99999) {
    $lnNum = intval($lnFInt1 / 1000);
    $word .= DB::table('f2w')->where('fig', $lnNum)->value('wrd') . " Thousand ";
    $lnFInt1 -= ($lnNum * 1000);
}

if ($lnFInt1 > 99 && $lnFInt1 <= 999) {
    $lnNum = intval($lnFInt1 / 100);
    $word .= DB::table('f2w')->where('fig', $lnNum)->value('wrd') . " Hundred ";
    $lnFInt1 -= ($lnNum * 100);
}

if ($lnFInt1 > 0 && $lnFInt1 <= 99) {
    $word .= DB::table('f2w')->where('fig', $lnFInt1)->value('wrd');
}

$word .= " and Paise ";

if ($lnDcml > 0) {
    $word .= DB::table('f2w')->where('fig', $lnDcml)->value('wrd');
} else {
    $word .= "Nil";
}
$word .= " Only.";
return $word;
}


function DeductionSummaryDetails($tbillid) 
{
    // dd($tbillid);
    $sammarydata=DB::table('bills')->where('t_bill_Id' , $tbillid)->first();
    // dd($sammarydata);
    $C_netAmt= $sammarydata->c_netamt;
    $chqAmt= $sammarydata->chq_amt;
    $commonHelper = new CommonHelper();
    $amountInWords = $commonHelper->convertAmountToWords($C_netAmt);
    // dd($amountInWords);

    $SecDepositepc = DB::table('dedmasters')->where('Ded_M_Id', 2)->value('Ded_pc') ?: '';
    $CGSTpc = DB::table('dedmasters')->where('Ded_M_Id', 3)->value('Ded_pc') ?: '';
    $SGSTpc = DB::table('dedmasters')->where('Ded_M_Id', 4)->value('Ded_pc') ?: '';
    $Incomepc = DB::table('dedmasters')->where('Ded_M_Id', 5)->value('Ded_pc') ?: '';
    $Insurancepc = DB::table('dedmasters')->where('Ded_M_Id', 7)->value('Ded_pc') ?: '';
    $Labourpc = DB::table('dedmasters')->where('Ded_M_Id', 8)->value('Ded_pc') ?: '';
    $AdditionalSDpc = DB::table('dedmasters')->where('Ded_M_Id', 9)->value('Ded_pc') ?: '';
    $Royaltypc = DB::table('dedmasters')->where('Ded_M_Id', 10)->value('Ded_pc') ?: '';
    $finepc = DB::table('dedmasters')->where('Ded_M_Id', 11)->value('Ded_pc') ?: '';
    $Recoverypc = DB::table('dedmasters')->where('Ded_M_Id', 13)->value('Ded_pc') ?: '';

// Check if any value is 0 and assign an empty string
$SecDepositepc = $SecDepositepc != 0 ? $SecDepositepc . '%' : '';
$CGSTpc = $CGSTpc != 0 ? $CGSTpc . '%' : '';
$SGSTpc = $SGSTpc != 0 ? $SGSTpc . '%' : '';
$Incomepc = $Incomepc != 0 ? $Incomepc . '%' : '';
$Insurancepc = $Insurancepc != 0 ? $Insurancepc . '%' : '';
$Labourpc = $Labourpc != 0 ? $Labourpc . '%' : '';
$AdditionalSDpc = $AdditionalSDpc != 0 ? $AdditionalSDpc . '%' : '';
$Royaltypc = $Royaltypc != 0 ? $Royaltypc . '%' : '';
$finepc = $finepc != 0 ? $finepc . '%' : '';
$Recoverypc = $Recoverypc != 0 ? $Recoverypc . '%' : '';



    $deductionAmount=DB::table('billdeds')->where('T_Bill_Id' ,$tbillid)->get();
    // dd($deductionAmount);
    $additionalSDAmt=DB::table('billdeds')->where('T_Bill_Id' ,$tbillid)->where('Ded_Head','Additional S.D')->value('Ded_Amt');
    $additionalSDAmt = $additionalSDAmt ? $additionalSDAmt : '0.00';
    // dd($additionalSDAmt);
    $Security=DB::table('billdeds')
    ->where('T_Bill_Id' ,$tbillid)
    ->where('Ded_Head','Security Deposite')
    ->value('Ded_Amt');
    $Security = $Security ? $Security : '0.00';
    // dd($Security);
    $Income=DB::table('billdeds')
    ->where('T_Bill_Id' ,$tbillid)
    ->where('Ded_Head','Income Tax')
    ->value('Ded_Amt');
    $Income = $Income ? $Income : '0.00';
    // dd($Income);
    $CGST=DB::table('billdeds')
    ->where('T_Bill_Id' ,$tbillid)
    ->where('Ded_Head','CGST')
    ->value('Ded_Amt');
    $CGST = $CGST ? $CGST : '0.00';
    // dd($CGST);
    $SGST=DB::table('billdeds')
    ->where('T_Bill_Id' ,$tbillid)
    ->where('Ded_Head','SGST')
    ->value('Ded_Amt');
    $SGST = $SGST ? $SGST : '0.00';
    // dd($SGST);
    $Insurance=DB::table('billdeds')
    ->where('T_Bill_Id' ,$tbillid)
    ->where('Ded_Head','Work Insurance')
    ->value('Ded_Amt');
    $Insurance = $Insurance ? $Insurance : '0.00';
    // dd($Insurance);
    $Labour=DB::table('billdeds')
    ->where('T_Bill_Id' ,$tbillid)
    ->where('Ded_Head','Labour cess')
    ->value('Ded_Amt');
    $Labour = $Labour ? $Labour : '0.00';
    // dd($Labour);
    $Royalty=DB::table('billdeds')
    ->where('T_Bill_Id' ,$tbillid)
    ->where('Ded_Head','Royalty Charges')
    ->value('Ded_Amt');
    $Royalty = $Royalty ? $Royalty : '0.00';
    // dd($Royalty);
    $fine=DB::table('billdeds')
    ->where('T_Bill_Id' ,$tbillid)
    ->where('Ded_Head','fine')
    ->value('Ded_Amt');
    $fine = $fine ? $fine : '0.00';
    // dd($fine);
    $Recovery=DB::table('billdeds')
    ->where('T_Bill_Id' ,$tbillid)
    ->where('Ded_Head','Audit Recovery')
    ->value('Ded_Amt');
    $Recovery = $Recovery ? $Recovery : '0.00';
    // dd($Recovery);

    $htmlDeduction='';
    $htmlDeduction .= '<div style="text-align: center; margin-top: 20px;">'; 
    $htmlDeduction .= '<table style="border: 1px solid black; border-collapse: collapse; margin: auto;">';        
    $htmlDeduction .= '<thead>';
    $htmlDeduction .= '<tr>'; // Open a table row within the thead section
    $htmlDeduction .= '<th style="border: 1px solid black; padding: 8px;">Amount</th>';
    $htmlDeduction .= '<th style="border: 1px solid black; padding: 8px;">Details</th>';
    $htmlDeduction .= '</tr>'; // Close the table row within the thead section
    $htmlDeduction .= '</thead>';
    $htmlDeduction .= '<tbody>';
    
    $htmlDeduction .='<tr >';
    $htmlDeduction .= '<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $additionalSDAmt.'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">Additional S.D: &nbsp;&nbsp;&nbsp; '.$AdditionalSDpc.'</td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr >';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $Security .'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;">Security Deposite: &nbsp;&nbsp;&nbsp; '.$SecDepositepc.'</td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr >';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $Insurance .'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">Insurance: &nbsp;&nbsp;&nbsp; '.$Insurancepc.'</td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr >';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $Labour .'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">Labour Cess: &nbsp;&nbsp;&nbsp; '. $Labourpc.'</td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr >';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $Income .'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">Income Tax: &nbsp;&nbsp;&nbsp; '. $Incomepc.'</td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr >';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $CGST .'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">CGST: &nbsp;&nbsp;&nbsp; '.$CGSTpc.'</td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr >';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $SGST .'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">SGST: &nbsp;&nbsp;&nbsp; '. $SGSTpc.'</td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr >';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $Royalty .'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">Royalty:  charges &nbsp;&nbsp;&nbsp;'. $Royaltypc.'</td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr >';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $fine .'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">Fine:  &nbsp;&nbsp;&nbsp; '. $finepc.'</td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr >';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> ' . $Recovery .'</td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">Audit Recovery:  &nbsp;&nbsp;&nbsp; '. $Recoverypc.'</td>';
    $htmlDeduction .='</tr>';
    
    $htmlDeduction .='<tr>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right;"> '. $chqAmt.' </td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">Cheque Amount &nbsp;&nbsp;&nbsp;  </td>';
    $htmlDeduction .='</tr>';
    $htmlDeduction .='<tr>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:right; "> '. $C_netAmt.' </td>';
    $htmlDeduction .='<td style="border: 1px solid black; padding: 8px;text-align:left;">Total &nbsp;&nbsp;&nbsp;</td>';
    
    $htmlDeduction .='</tr>';


    $htmlDeduction .= '</tbody>';
    $htmlDeduction .= '</table>';
    $htmlDeduction .= '</div>';
    return $htmlDeduction;
}






}
