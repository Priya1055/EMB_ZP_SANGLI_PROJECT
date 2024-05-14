@extends("layouts.header")
@section('content')

  <style>

.title
    {
        font-weight: bold;
        font-size: 24px;
        line-height: 1.5;
        text-align: center;
         margin-top: 20px; 
    }
  .container-fluid 
  {
    border: 1px solid #555;
    border-radius: 10px;
    padding: 10px;
    margin-bottom: 20px;
  }
  
  /* table {
    border: 1px solid #ddd;
    border-collapse: collapse;
  }
  
  th, td {
    border: 1px solid #ddd;
    padding: 8px;
  } */
  .custom-button {
    margin-top: 10px; /* Adjust the margin as needed to align the button */
    background: #04AA6D;
    color: white;
  }


 /* header */
          .bg-custom {
  background-color: #e3f2fd;
}
/* Custom text color */
/* .navbar-dark .navbar-brand,
.navbar-dark .navbar-nav .nav-link {
  color: #333;
  font-weight: bold;
}
.navbar-brand {
  margin-right: auto;
} */
 /* Increase font weight of labels */
 .form-group label {
      font-weight: bold;
    }
/* total div table */
.total-table {
            float: right;
            margin-top: 20px;
            border-radius: 4px;
            padding: 10px;
        }


        /* Emb pop up modal style */
  .modal-backdrop {
    opacity: 1 !important;
    background-color: rgba(0, 0, 0, 0.1) !important;
    pointer-events: none;
  }
  .modal-dialog {
  margin-top: 15% !important;
    max-width: 1200px;
    max-height: 1000px;
    margin: 1.75rem auto;
  }

  body.modal-open {
    overflow: hidden;
  }
  /* EMB button css */
  .emb-button {
    background-color: #B09FCA;
    color: white;
  }

  .emb-button:hover {
    background-color: #967BB6;
    color: white;
  }

  .emb-button:focus {
    outline: none;
    box-shadow: none;
  }

  .emb-button-inactive {
    background-color: gray;
    color: white;
  }

  /* Add custom styles for the TND ITEM button container */
.button-container {
  position: relative;
  text-align: right;
  margin-bottom: 10px;
}


  /* Custom styles for checkboxes */
  .row-checkbox {
    transform: scale(1.5); /* Increase the size of the checkbox */
    border: 2px solid #2196F3; /* Change the border color */
    border-radius: 5px; /* Round the edges */
  }

  /* Change the color of the checked checkbox */
  .row-checkbox:checked {
    background-color: #2196F3; /* Change the background color */
  }
  .red-row {
  background-color: red;
  color: white; /* You can set the text color to white for better visibility on a red background. */
}


</style>
<style>
 .thead-red th 
 {
        background-color: #F5DEB3; /* Red */
        color: black; /* White text on red background for better visibility */
  }
    </style>

      <ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $DBEMBdetails->Work_Id ?? '') }}">Bill</a></li>
            <li><a href="{{ url('Abstract', $t_bill_Id ?? '') }}">Abstract</a></li>

      </ul>

      <a href="{{ url('billlist', $DBEMBdetails->Work_Id ?? '')}}" id="backButton" style="margin-bottom:10px;">
                    <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
      </a>
      <div class="card" id="backbglogo">
                            <div class="card-header" >
                                    <h3>Abstract</h3>
                            </div>


    <!-- <div class="title">E-MB</div> -->

    <!-- <div class="container-fluid"> -->

  
<form id="deductionForm" action="{{ url('Deduction') }}" method="get"> <!-- Use the named route 'deduction' -->
  @csrf <!-- Add CSRF token if needed -->

  <input type="hidden" name="net_amt" id="net_amt_input" value="">
  <!-- Hidden input fields to store workid and t_billid -->
  <input type="hidden" name="workid" value="{{ $DBEMBdetails->Work_Id ?? '' }}">
  <!-- <input type="text" id="" name="" value="{{ $bill_id ?? ''}}" >-->
 <input type="hidden" id="hidden_t_bill_Id" name="tBillId" value="{{ $t_bill_Id ?? ''}}" > 
  <input type="hidden" name="worknm" value="{{ $DBEMBdetails->Work_Nm ?? '' }}">
  <input type="hidden" id="hidden_t_bill_No" name="tBillNo" value="{{ $latestBill->t_bill_No ?? '' }}">
  <input type="hidden" id="hiddeniscurrent" name="iscurrent" value="{{ $latestBill->is_current ?? '' }}"> 
  <input type="hidden" id="totdedu" name="total" value="{{ $totalDeduction ?? '' }}"> 
  <input type="hidden" id="check" name="checkamt" value="{{ $chequeAmount ?? '' }}">


  <!-- <div class="text-right">
    <button type="button" id="addDedButton" style="font-weight: bold; margin-right: 100px; font-size: 20px;">Add Ded</button>
  </div> -->
</form>
<td colspan="2"></td>
  <!--<div class="container-fluid">-->
    <div class="row">
      <!-- Form Section -->
      <div class="col-lg-12">
        <!-- <h2>Form</h2> -->
       
        <form action="" method="post">
          @csrf
            <div class="form-group form-row align-items-center">
              <label for="name" class="col-md-2">Work Id:</label>
              <div class="col-md-4">
              <input type="text" name="workid" class="form-control mt-2" id="workid"  value="{{$DBEMBdetails->Work_Id ?? ''}}" required >
              </div>
              
                            <label for="sectionengineer" class="col-md-2">Section Engineer:</label>
              <div class="col-md-4">
              <input type="text" class="form-control mt-2" id="sectionengineer" name="name" value="{{ $DBSectionEngNames ? $DBSectionEngNames : '' }}" disabled>
              </div>

            </div>
  
            <div class="form-group form-row align-items-center">
              <label for="division" class="col-md-2">Division:</label>
              <div class="col-md-4">
              <input type="text" name="Sub_Div" class="form-control" id="Sub_Div" value="{{$DBEMBdetails->Sub_Div ?? ''}}" disabled>         
              </div>
              <label for="subdivision" class="col-md-2">Sub Division:</label>
              <div class="col-md-4">
                <input type="text" name="Sub_Div" class="form-control" id="Sub_Div" value="{{$DBEMBdetails->Sub_Div ?? ''}}"disabled>
              </div>
            </div>
  
            <div class="form-group form-row align-items-center">
              <label for="fundhead" class="col-md-2">Fund Head:</label>
              <div class="col-md-4">
              <input type="text" class="form-control" id="fundhead" name="Fund_Hd_M" value="{{$DBFHcode_M ?? ''}}" disabled>             
              </div>
                            <label for="agency" class="col-md-2">Agency:</label>
              <div class="col-md-4">
                <input type="text" name="Agency_Nm" class="form-control" id="Agency_Nm" value="{{$DBEMBdetails->Agency_Nm ?? ''}}"disabled>
              </div>

            </div>
  
            <div class="form-group form-row align-items-center">
                            <label for="nameofwork" class="col-md-2">Name Of Work:</label>
              <div class="col-md-4">
              <textarea class="form-control" name="worknm" id="Work_Nm" disabled>{{$DBEMBdetails->Work_Nm ?? ''}}</textarea>             
              </div>

            </div>
        
          <!-- <div>
            <input type="submit" value="Submit">
          </div> -->
      <!--</div>-->
    </div>
  </div>


<div class="container-fluid">
    <div class="table-responsive">
    <table class="table table-bordered">
    <thead class="thead-red">
      
    <tr>
                    <th style="text-align: center">Tender Item No</th>
                    <th style="text-align: center">Upto date quantity</th>
                    <th style="text-align: center">Description of Item</th>
                    <th style="text-align: center">Bill/Tender Rate</th>
                    <th style="text-align: center">Total Up to date Amount</th>
                    <th style="text-align: center">Now to be paid Amount</th>
                    <th style="text-align: center">Remark</th>
                </tr>
            </thead>
            <tbody id="normalItemsTable">
<!-- Normal table content will be displayed here -->
          </tbody>
        </table>    
      </div>

</div>
<!-- //table data  normal -->
<!-- </div> -->


<script>
  // var tBillNo=0;
//   function loadeddata(tBillNo) 
//   {
//     if(tBillNo)
//     {
//       console.log("output",tBillNo);
//       jQuery.ajax({
//         url: '{{ url("RoutetbillnorelateddataDisplay") }}',
//         type: 'GET',
//         data: {
//           t_bill_No: tBillNo,
//           t_bill_Id: tBillId,
//           isCurrent:isCurrent

//               },
//         success: function (data) {
//             // Clear the existing content in the table body
//             jQuery('#normalItemsTable').empty();
//             jQuery('#royaltyLabTable').empty();

//         var totalRate = 0;
//             var bitemamt=0;
//             var nowpaidAmount = 0; 
//             var ABperValue=0;
//             var roundedPercentage;
//             // var paidAmountResult=0;

//             console.log(data);
//             console.log("t_item_no: " + data.t_item_no);


//         var GrossAmt=data.DBGrossAmount;
//         var usertype = data.usertype;

// var partaAmt=GrossAmt.part_a_amt;
// console.log("Part A amount " +partaAmt);
// var CpartaAmt=GrossAmt.c_part_a_amt;
// console.log("Current Part A amount " +CpartaAmt);
// var ABPC=data.ABPC;
// var abovebellow=ABPC.Above_Below
// console.log("Above bellow " +abovebellow);
// var ABPerce=ABPC.A_B_Pc
// console.log("Above Bellow percentage ",+ABPerce);
// var abeff=GrossAmt.a_b_effect;
// console.log("A B Effect " +abeff);
// var Cabeff=GrossAmt.c_abeffect;
// console.log("Current Ab Effect" +Cabeff);
// var GSTBase=GrossAmt.gst_base;
// console.log("GST Base" +GSTBase);
// var CurreGSTBase=GrossAmt.c_gstbase;
// console.log("Current GST Base" +CurreGSTBase);

// var PreDBGSRate = parseFloat(GrossAmt.gst_rt);
// console.log("previous DBGST Rate: " + PreDBGSRate);
// var DBGSTAmt = parseFloat(GrossAmt.gst_amt);
// console.log("GST Amount: " + DBGSTAmt);
// var CurreGSTAmt=GrossAmt.c_gstamt;
// console.log("Current GST Amount" +CurreGSTAmt);
// var partAGSTAmount=GrossAmt.part_a_gstamt;
// console.log("part A  GST Amount" +partAGSTAmount);
// var CurrePartAGSTAmt=GrossAmt.c_part_a_gstamt;
// console.log("Current part A GST Amount" +CurrePartAGSTAmt);
// var partBAmt=GrossAmt.part_b_amt;
// console.log("Part B amount " +partBAmt);
// var CPartBAmt=GrossAmt.c_part_b_amt;
// console.log("Current Part B amount " +CPartBAmt);
// var billAmtGt = parseFloat(GrossAmt.bill_amt_gt);
// console.log(" Bill Amount Gross Total",billAmtGt);
// var CbillAmtGt = parseFloat(GrossAmt.c_billamtgt);
// console.log(" current Amount GT",CbillAmtGt);
// var bill_amt_ro=parseFloat(GrossAmt.bill_amt_ro);
// console.log("  bill_amt_ro:",bill_amt_ro);
// var c_billamtro=parseFloat(GrossAmt.c_billamtro);
// console.log("Current  bill_amt_ro:",c_billamtro);
// var netamt=parseFloat(GrossAmt.net_amt).toFixed(2);
// console.log("Net Amount",netamt);
// var prenetamt=parseFloat(GrossAmt.p_net_amt).toFixed(2);
// console.log(" previous Net Amount: " + prenetamt);
// var Currrentnetamt=parseFloat(GrossAmt.c_netamt).toFixed(2);
// console.log(" Current Net Amount: " + Currrentnetamt);

// finalnowtobepaide=(netamt - prenetamt).toFixed(2);
// console.log("finalnowtobepaide" +finalnowtobepaide);

// document.getElementById('net_amt_input').value = netamt;
// var previousTotcheckAmt = data.previousTotDeducheckAmt;
// var preTotDed = previousTotcheckAmt && previousTotcheckAmt.tot_ded !== null ? previousTotcheckAmt.tot_ded : "0.00";
// console.log("Previous Total Deduction " + preTotDed);
// var preCheckAmt = previousTotcheckAmt && previousTotcheckAmt.chq_amt !== null ? previousTotcheckAmt.chq_amt : "0.00";
// console.log("Previous check Amount " + preCheckAmt);

// var TotDedcheckAmt = data.DBTotaldeducheckAmt;
// var totalDeduction = TotDedcheckAmt && TotDedcheckAmt.tot_ded !== null ? TotDedcheckAmt.tot_ded : "0.00";
// console.log("Total Deduction " + totalDeduction);
// var checkAmt = TotDedcheckAmt && TotDedcheckAmt.chq_amt !== null ? TotDedcheckAmt.chq_amt : "0.00";
// console.log(" Cheque Amount " + checkAmt);
// var totalDeductionInput = document.getElementById('totdedu');
// var totalDeductionValue = totalDeductionInput.value;
// console.log('Total Deduction Value:', totalDeductionValue);
// var chequeAmountInput = document.getElementById('check');
// var chequeAmountValue = chequeAmountInput.value;
// console.log('Cheque Amount Value:', chequeAmountValue);



// var WOAmtValue = parseFloat(data.WOAmt); // Make sure to define WOAmtValue first
// console.log("Work Order Amount: " +WOAmtValue);




// //normal data print on table 
//     var normalItemsarr = data.normalItemsarr;
//     var normalItemsTable = document.getElementById('normalItemsTable');
//     var royaltylabarr = data.royaltylabarr;
//     var royaltyLabTable = document.getElementById('normalItemsTable');
// // Check if 'normalItemsarr' is defined in 'data'

// if (Array.isArray(normalItemsarr)) 
// {
//     // 'normalItemsarr' is an array; process it
//     var normalItemsTable = document.getElementById('normalItemsTable');
//     normalItemsarr.forEach(function (message, index) {
//         var itemData = message.split(" | ");
//         var itemNo = itemData[0].replace("Item No: ", "").trim();
//         var subNo = itemData[1].replace("Sub No: ", "").trim();
//         var execQtyValue = itemData[2].replace("Exec Qty: ", "").trim();
//         var exs_nmValue = itemData[3].replace("Description: ", "").trim(); // Extract the 'exs_nm' value
//         var DBbillrate = itemData[4].replace("Bill Rate: ", "").trim(); // Extract the 'Bill Rate' value
//         var DBTndrate = itemData[5].replace("Tender Rate: ", "").trim(); // Extract the 'Tender Rate' value
//         var b_item_amt = itemData[6].replace("Bill Item Amount: ", "").trim(); // Extract the 'Bill Item Amount' value
//         var nowToBePaidAmount = itemData[7].replace("Current Amount: ", "").trim(); // Extract the 'Current Amount' value
        
//         // Concatenate non-empty values
//         var tenderItemNo = (itemNo || subNo) ? (itemNo + subNo) : "";

//         var row = normalItemsTable.insertRow();
        
//         // Populate the "Tender Item No" column with the concatenated value
//         var cell = row.insertCell(0); // 0 corresponds to the first column in the table
//         cell.innerHTML = tenderItemNo;
//         cell.style.textAlign = "right";
//         cell = row.insertCell(1);
//         cell.innerHTML = execQtyValue;
//         cell.style.textAlign = "right";
//         cell = row.insertCell(2);
//         cell.innerHTML = exs_nmValue;
//         cell = row.insertCell(3);
//         if (DBbillrate === DBTndrate) 
//         {
//             cell.innerHTML = DBbillrate;
//         cell.style.textAlign = "right";

//         } 
//         else {
//             cell.innerHTML = DBbillrate + '<hr class="underline">' + DBTndrate;
//         cell.style.textAlign = "right";

//         }

//         cell = row.insertCell(4);
//         cell.innerHTML = b_item_amt;
//         cell.style.textAlign = "right";

//         cell = row.insertCell(5);
//         cell.innerHTML = nowToBePaidAmount;
//         cell.style.textAlign = "right";
//     });
// } 
// else 
// {
//     console.error("'normalItemsarr' is not defined in 'data'");
// }
// var totalRow = '<tr>';
//             // totalRow += '<td colspan="3"></td>'; // Empty cells for the first three columns
//             totalRow += '<td colspan="4" style="text-align: right; font-weight: bold;">Total Part A Amount  </td>'; // Label for the "Rate" total
//             totalRow += '<td style="text-align: right; font-weight: bold;">'+ partaAmt+'</td>'; // Total rate value
//             totalRow += '<td style="text-align: right; font-weight: bold;">' + CpartaAmt + '</td>';
//             totalRow += '<td></td>'; // Empty cells for the remaining columns
//             totalRow += '</tr>';
//             jQuery('#normalItemsTable').append(totalRow);

//             var AbovebelowRow = '<tr>';
//             AbovebelowRow += '<td colspan="4" style="text-align: right; font-weight: bold;">Tender Above bellow Result: <strong><span style="color: red;">' + ABPerce + '</span></strong> <strong><span style="color: red;">' + abovebellow + '</span></strong></td>';
//             AbovebelowRow += '<td style="text-align: right; font-weight: bold;"> ' + abeff +'</td>';
//             AbovebelowRow += '<td style="text-align: right; font-weight: bold;">' + Cabeff +'</td>';
//             AbovebelowRow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
//             AbovebelowRow += '</tr>';
// jQuery('#normalItemsTable').append(AbovebelowRow);

// var TotRow = '<tr>';
//             TotRow += '<td colspan="4" style="text-align: right; font-weight: bold;">GST Base  </td>'; // Label for the new total
//             TotRow += '<td style="text-align: right; font-weight: bold;">'+ GSTBase+' </td>'; // Total amount value
//             TotRow += '<td  style="text-align: right; font-weight: bold;"> '+ CurreGSTBase +'</td>';
//             TotRow += '<td ></td>'; 
//             // TotRow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
//             TotRow += '</tr>';
// jQuery('#normalItemsTable').append(TotRow);


// var finalGSTperROW = '<tr>';
// finalGSTperROW += '<td colspan="4" style="text-align: right; font-weight: bold;"> GST Amount <strong><span style="color: red;">' + PreDBGSRate + '%</span></strong></td>';
//             finalGSTperROW += '<td style="text-align: right; font-weight: bold;">' + DBGSTAmt + '</td>'; // Total amount value
//             finalGSTperROW += '<td  style="text-align: right; font-weight: bold;">'+ CurreGSTAmt +'</td>';
//             finalGSTperROW += '<td ></td>';
//             // GSTROW += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
//             finalGSTperROW += '</tr>';
// jQuery('#normalItemsTable').append(finalGSTperROW);


// var CEROW = '<tr>';
//             CEROW += '<td colspan="4" style="text-align: right; font-weight: bold;"> Total</td>'; // Label for the new total
//             CEROW += '<td style="text-align: right; font-weight: bold;">' + partAGSTAmount + '</td>'; // Total amount value
//             CEROW += '<td  style="text-align: right; font-weight: bold;"> ' + CurrePartAGSTAmt + '</td>';
//                         CEROW += '<td> </td>';
//             CEROW += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
//             CEROW += '</tr>';
// jQuery('#normalItemsTable').append(CEROW);




// //////Rolality data Table //////////////
// // Assuming 'royaltylabarr' is a property of the 'data' object
// var royaltylabarr = data.royaltylabarr;
// var royaltyLabTable = document.getElementById('normalItemsTable');

// if (royaltylabarr.length > 0) 

// {

// var royaltyLabTableHeading = royaltyLabTable.insertRow();


// var cell = royaltyLabTableHeading.insertCell(0);
// cell.innerHTML = "Tender Item No";
// cell.style.textAlign = "center";
// cell.style.fontWeight = "bold";
// cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
// cell.style.color = "black"; // Set 


// cell = royaltyLabTableHeading.insertCell(1);
// cell.innerHTML = "Upto date quantity";
// cell.style.textAlign = "center";
// cell.style.fontWeight = "bold";
// cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
// cell.style.color = "black"; // Set 


// cell = royaltyLabTableHeading.insertCell(2);
// cell.innerHTML = "Description of Item";
// cell.style.textAlign = "center";
// cell.style.fontWeight = "bold";
// cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
// cell.style.color = "black"; // Set 


// cell = royaltyLabTableHeading.insertCell(3);
// cell.innerHTML = "Bill Rate";
// cell.style.textAlign = "center";
// cell.style.fontWeight = "bold";
// cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
// cell.style.color = "black"; // Set 



// cell = royaltyLabTableHeading.insertCell(4);
// cell.innerHTML = "Total Up to date Amount";
// cell.style.textAlign = "center";
// cell.style.fontWeight = "bold";
// cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
// cell.style.color = "black"; // Set 


// cell = royaltyLabTableHeading.insertCell(5);
// cell.innerHTML = "Now to be paid Amount";
// cell.style.textAlign = "center";
// cell.style.fontWeight = "bold";
// cell.style.backgroundColor = "#F5DEB3"; 
// cell.style.color = "black"; // Set 

// cell = royaltyLabTableHeading.insertCell(6);
// cell.innerHTML = "Remark";
// cell.style.textAlign = "center";
// cell.style.fontWeight = "bold";
// cell.style.backgroundColor = "#F5DEB3"; 
// cell.style.color = "black"; // Set 


// // Now, loop through royaltylabarr data and add the rows
// royaltylabarr.forEach(function (message) {
//     var itemData = message.split(" | ");
//     var itemNo = itemData[0].replace("Item No: ", "").trim();
//     var subNo = itemData[1].replace("Sub No: ", "").trim();
//     var execQtyValue = itemData[2].replace("Exec Qty: ", "").trim();
//     var exs_nmValue = itemData[3].replace("Description: ", "").trim();
//     var DBbillrate = itemData[4].replace("Bill Rate: ", "").trim();
//     var DBTndrate = itemData[5].replace("Tender Rate: ", "").trim();
//     var b_item_amt = itemData[6].replace("Bill Item Amount: ", "").trim();
//     var nowToBePaidAmount = itemData[7].replace("Current Amount: ", "").trim();

//     var tenderItemNo = (itemNo || subNo) ? (itemNo + subNo) : "";

//     var row = royaltyLabTable.insertRow();
//     var cell = row.insertCell(0);
//     cell.innerHTML = tenderItemNo;
//     cell.style.textAlign = "right";

//     cell = row.insertCell(1);
//     cell.innerHTML = execQtyValue;
//     cell.style.textAlign = "right";

//     cell = row.insertCell(2);
//     cell.innerHTML = exs_nmValue;

//     cell = row.insertCell(3);
//     if (DBbillrate === DBTndrate) {
//         cell.innerHTML = DBbillrate;
//         cell.style.textAlign = "right";
//     } else {
//         cell.innerHTML = DBbillrate + '<hr class="underline">' + DBTndrate;
//         cell.style.textAlign = "right";
//     }

//     cell = row.insertCell(4);
//     cell.innerHTML = b_item_amt;
//     cell.style.textAlign = "right";

//     cell = row.insertCell(5);
//     cell.innerHTML = nowToBePaidAmount;
//     cell.style.textAlign = "right";
// });


// }

// var totalRow = '<tr>';
//             // totalRow += '<td colspan="3"></td>'; // Empty cells for the first three columns
//             totalRow += '<td colspan="4" style="text-align: right; font-weight: bold;">Total Part B Amount</td>'; // Label for the "Rate" total with right alignment
//             totalRow += '<td style="text-align: right; font-weight: bold;">'+ partBAmt+'</td>'; // Total rate value
//             totalRow += '<td style="text-align: right; font-weight: bold;"> ' + CPartBAmt + '</td>';
//             totalRow += '<td></td>'; // Empty cells for the remaining columns
//             totalRow += '</tr>';
//             jQuery('#normalItemsTable').append(totalRow);



//             var totalRow = '<tr>';
//             // totalRow += '<td colspan="3"></td>'; // Empty cells for the first three columns
//             totalRow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Grand Total   </td>'; // Label for the "Rate" total
//             totalRow += '<td style="text-align: right; font-weight: bold;">'+billAmtGt +'</td>'; // Total rate value
//             totalRow += '<td style="text-align: right; font-weight: bold;">' + CbillAmtGt + '</td>';
//             totalRow += '<td></td>'; // Empty cells for the remaining columns
//             totalRow += '</tr>';
//             jQuery('#normalItemsTable').append(totalRow);


//             var dedrow = '<tr>';
//             dedrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Add/Ded for Round Up value </td>'; // Label for the new total
//             dedrow += '<td style="text-align: right; font-weight: bold;">' + bill_amt_ro + '</td>'; // Total amount value
//             dedrow += '<td  style="text-align: right; font-weight: bold;">'+ c_billamtro+'</td>';
//             dedrow += '<td ></td>';
//             // GSTROW += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
//             dedrow += '</tr>';
// jQuery('#normalItemsTable').append(dedrow);



// var FHrow = '<tr>';
//             FHrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Final Total  </td>'; // Label for the new total
//             FHrow += '<td style="text-align: right; font-weight: bold;">'+ netamt+'</td>'; // Total amount value
//             FHrow += '<td style="text-align: right; font-weight: bold;" >'+ Currrentnetamt+ '</td>';
//             FHrow += '<td ></td>';
//             // GSTROW += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
//             FHrow += '</tr>';
// jQuery('#normalItemsTable').append(FHrow);

// var lastpaidAmountrow = '<tr>';
//             lastpaidAmountrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Previously Paid Amount From Per Bill </td>'; // Label for the new total
//             lastpaidAmountrow += '<td style="text-align: right; font-weight: bold;">'+ prenetamt+'</td>'; // Total amount value
//             lastpaidAmountrow += '<td style="text-align: right; font-weight: bold;"></td>';
//             lastpaidAmountrow += '<td ></td>';
//             // GSTROW += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
//             lastpaidAmountrow += '</tr>';
// jQuery('#normalItemsTable').append(lastpaidAmountrow);


// var nowpaidrow = '<tr>';
//             nowpaidrow += '<td colspan="3" style="text-align: right; font-weight: bold; color: red;"> Now to be paid Amount </td>';
//             if (usertype === "audit") {
//     nowpaidrow += '<td colspan="1"><button type="button" onclick="submitDeductionForm()" style="font-weight: bold; font-size: 15px; color: red;">Add Ded</button></td>';
// } else {
//     // Add an extra <td> when the condition is not satisfied
//     nowpaidrow += '<td></td>';
// }

//             // nowpaidrow += '<td colspan="1"><button type="button" onclick="submitDeductionForm()" style="font-weight: bold; font-size: 15px; color: red;">Add Ded</button></td>';
//             nowpaidrow += '<td style="text-align: right; font-weight: bold;" >'+ finalnowtobepaide +'</td>';
//             nowpaidrow += '<td style="text-align: right; font-weight: bold;" >'+ Currrentnetamt +'</td>';
//             nowpaidrow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
//             nowpaidrow += '</tr>';
// jQuery('#normalItemsTable').append(nowpaidrow);


// var Deductionrow = '<tr>';
// Deductionrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Total Deduction </td>';
// Deductionrow += '<td style="text-align: right; font-weight: bold;">'+ preTotDed+'</td>';
// Deductionrow += '<td  style="text-align: right; font-weight: bold;">'+ totalDeduction+'</td>';
// Deductionrow += '<td ></td>';
// // Deductionrow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
// Deductionrow += '</tr>';
// jQuery('#normalItemsTable').append(Deductionrow);



// var checkAmtrow = '<tr>';
// checkAmtrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Cheque Amount </td>';
// checkAmtrow += '<td style="text-align: right; font-weight: bold;">'+ preCheckAmt +'</td>';
// checkAmtrow += '<td style="text-align: right; font-weight: bold;">'+ checkAmt +'</td>';
// checkAmtrow += '<td ></td>';
// // checkAmtrow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
// checkAmtrow += '</tr>';
// jQuery('#normalItemsTable').append(checkAmtrow);


// // if (DBCE > WOAmtValue) 
// // {
// //   jQuery('#relatedDataBody tr:last').addClass('red-row');
// //   jQuery('#relatedDataBody tr:last').show();
// // } 
// // else 
// // {
// //   jQuery('#relatedDataBody tr:last').hide();
// // }



// //////Rolality data Table //////////////





//         },        

//       });
//     }
//     }
    

//     var netamt = 0; // Default value, you can change this if needed

// function updateNetAmt() {
//     // AJAX request to update netamt
//     jQuery.ajax({
//         url: '{{ url("RoutetbillnorelateddataDisplay") }}',
//         type: 'GET',
//         data: {
//           t_bill_No: tBillNo,
//           t_bill_Id: tBillId,
//           isCurrent:isCurrent

//               },
//         success: function (data) {
//             // Clear the existing content in the table body
//             jQuery('#relatedDataBody').empty();
//             var totalRate = 0;
//             var bitemamt=0;
//             var nowpaidAmount = 0; 
//             var ABperValue=0;
//             var roundedPercentage;
//             // var paidAmountResult=0;

//             console.log(data);
//             console.log("t_item_no: " + data.t_item_no);
//         //     console.log(data.DBexs_nm[0]);
//         // var exnm=data.DBexs_nm[0];
//         // var ex=exnm.exs_nm
//         // console.log(ex);
//         var GrossAmt=data.DBGrossAmount;


//       document.getElementById('net_amt_input').value = netamt;
//       var netamt=GrossAmt.net_amt;
//       console.log("Net Amount updateNetAmt function ",netamt);

//             // Continue with the rest of your code that relies on netamt
//         },
//         // ... Your existing code here ...
//     });
// }

  $(document).ready(function() 
  {
  //   var selectedValue = '';
  // var selectedValue = $("#t_bill_No").val();
  // var selectedValuesArray = selectedValue.split('-'); // Split the selected value by '-'
  //   var tBillNo = selectedValuesArray[0]; // Get the t_bill_No
  //   var tBillId = selectedValuesArray[1];
  //   var isCurrent = selectedValuesArray[2];  // Get the t_bill_Id
    // Now you have tBillNo and tBillId in separate variables
    // console.log("t_bill_No: " + tBillNo);
    // console.log("t_bill_Id: " + tBillId);
    // console.log("is_current: " + isCurrent);
    // console.log(selectedValue);

    // var hiddenTBillNo = document.getElementById('hidden_t_bill_No');

    // Retrieve the value of the hidden input
    // var tBillNoValue = hiddenTBillNo.value;

    // Now, you can use the tBillNoValue variable in your JavaScript code
    // console.log('tBillNoValue:', tBillNoValue);


    // loadeddata(tBillNo);


    // updateNetAmt();
// document.getElementById('t_bill_No').addEventListener('change', function () {

    // var selectedTBillId = $('#t_bill_id').val(); 
    // var selectedValue = this.value;
    // var selectedValuesArray = selectedValue.split('-'); // Split the selected value by '-'
    // var tBillNo = selectedValuesArray[0]; // Get the t_bill_No
    // var tBillId = selectedValuesArray[1]; // Get the t_bill_Id
    // var isCurrent = selectedValuesArray[2];
    // // Now you have tBillNo and tBillId in separate variables
    // console.log("t_bill_No: " + tBillNo);
    // console.log("t_bill_Id: " + tBillId);
    // console.log("is_current: " + isCurrent);
    // document.getElementById('hidden_t_bill_No').value = tBillNo;
    // document.getElementById('hidden_t_bill_Id').value = tBillId;
    // document.getElementById('hiddeniscurrent').value = isCurrent;
    // var roundedPercentage;    // Retrieve t_bill_id from the hidden input
    // console.log(selectedValue);
// console.log(selectedTBillId);
    // Make an AJAX request to fetch related data, passing both values
    var netAmt = $('#net_amt_input').val();
        var tBillId = $('#hidden_t_bill_Id').val();
        var tBillNo = $('#hidden_t_bill_No').val();
        var isCurrent = $('#hiddeniscurrent').val();
        var totalDeduction = $('#totdedu').val();
        var chequeAmount = $('#check').val();

        // Log values to the console (or use them as needed)
        console.log('netAmt:', netAmt);
        console.log('tBillId:', tBillId);
        console.log('tBillNo:', tBillNo);
        console.log('isCurrent:', isCurrent);
        console.log('totalDeduction:', totalDeduction);
        console.log('chequeAmount:', chequeAmount);



    jQuery.ajax({
        url: '{{ url("RoutetbillnorelateddataDisplay") }}',
        type: 'GET',
        data: {
          t_bill_No: tBillNo,
          t_bill_Id: tBillId,
          isCurrent:isCurrent
              },
        success: function (data) {
            // Clear the existing content in the table body
            jQuery('#normalItemsTable').empty();
            var totalRate = 0;
            var bitemamt=0;
            var nowpaidAmount = 0; 
            var ABperValue=0;
            var roundedPercentage;
            // var paidAmountResult=0;
            console.log(data);
            console.log("t_item_no: " + data.t_item_no);
        //     console.log(data.DBexs_nm[0]);
        // var exnm=data.DBexs_nm[0];
        // var ex=exnm.exs_nm
        // console.log(ex);
        var GrossAmt = data.DBGrossAmount;
        var usertype = data.usertype;
var usertype=data.usertype;

var partaAmt=GrossAmt.part_a_amt;
console.log("Part A amount " +partaAmt);
var CpartaAmt=GrossAmt.c_part_a_amt;
console.log("Current Part A amount " +CpartaAmt);
var ABPC=data.ABPC;
var abovebellow=ABPC.Above_Below
console.log("Above bellow " +abovebellow);
var ABPerce=ABPC.A_B_Pc
console.log("Above Bellow percentage ",+ABPerce);
var abeff=GrossAmt.a_b_effect;
console.log("A B Effect " +abeff);
var Cabeff=GrossAmt.c_abeffect;
console.log("Current Ab Effect" +Cabeff);
var GSTBase=GrossAmt.gst_base;
console.log("GST Base" +GSTBase);
var CurreGSTBase=GrossAmt.c_gstbase;
console.log("Current GST Base" +CurreGSTBase);

var PreDBGSRate = parseFloat(GrossAmt.gst_rt);
console.log("previous DBGST Rate: " + PreDBGSRate);
var DBGSTAmt = parseFloat(GrossAmt.gst_amt);
console.log("GST Amount: " + DBGSTAmt);
var CurreGSTAmt=GrossAmt.c_gstamt;
console.log("Current GST Amount" +CurreGSTAmt);
var partAGSTAmount=GrossAmt.part_a_gstamt;
console.log("part A  GST Amount" +partAGSTAmount);
var CurrePartAGSTAmt=GrossAmt.c_part_a_gstamt;
console.log("Current part A GST Amount" +CurrePartAGSTAmt);
var partBAmt=GrossAmt.part_b_amt;
console.log("Part B amount " +partBAmt);
var CPartBAmt=GrossAmt.c_part_b_amt;
console.log("Current Part B amount " +CPartBAmt);
var billAmtGt = parseFloat(GrossAmt.bill_amt_gt);
console.log(" Bill Amount Gross Total",billAmtGt);
var CbillAmtGt = parseFloat(GrossAmt.c_billamtgt);
console.log(" current Amount GT",CbillAmtGt);
var bill_amt_ro=parseFloat(GrossAmt.bill_amt_ro);
console.log("  bill_amt_ro:",bill_amt_ro);
var c_billamtro=parseFloat(GrossAmt.c_billamtro);
console.log("Current  bill_amt_ro:",c_billamtro);
var netamt=parseFloat(GrossAmt.net_amt).toFixed(2);
console.log("Net Amount",netamt);
var prenetamt=parseFloat(GrossAmt.p_net_amt).toFixed(2);
console.log(" previous Net Amount: " + prenetamt);
var Currrentnetamt=parseFloat(GrossAmt.c_netamt).toFixed(2);
console.log(" Current Net Amount: " + Currrentnetamt);

// var p_tot_ded=parseFloat(GrossAmt.p_tot_ded).toFixed(2);
// console.log(" p_tot_ded: " + p_tot_ded);

// var tot_ded=parseFloat(GrossAmt.tot_ded).toFixed(2);
// console.log(" tot_ded: " + tot_ded);

var p_tot_ded = parseFloat(GrossAmt.p_tot_ded);
p_tot_ded = isNaN(p_tot_ded) ? "0.00" : p_tot_ded.toFixed(2);
console.log(" p_tot_ded: " + p_tot_ded);

var tot_ded = parseFloat(GrossAmt.tot_ded);
tot_ded = isNaN(tot_ded) ? "0.00" : tot_ded.toFixed(2);
console.log(" tot_ded: " + tot_ded);

var p_tot_recovery = parseFloat(GrossAmt.p_tot_recovery);
if (isNaN(p_tot_recovery)) {
    p_tot_recovery = "0.00";
} else {
    p_tot_recovery = p_tot_recovery.toFixed(2);
}
console.log(" p_tot_recovery: " + p_tot_recovery);

var tot_recovery = parseFloat(GrossAmt.tot_recovery);
tot_recovery = isNaN(tot_recovery) ? "0.00" : tot_recovery.toFixed(2);
console.log(" tot_recovery: " + tot_recovery);

var p_chq_amt = parseFloat(GrossAmt.p_chq_amt);
p_chq_amt = isNaN(p_chq_amt) ? "0.00" : p_chq_amt.toFixed(2);
console.log(" p_chq_amt: " + p_chq_amt);


var chq_amt = parseFloat(GrossAmt.chq_amt);
chq_amt = isNaN(chq_amt) ? "0.00" : chq_amt.toFixed(2);
console.log(" chq_amt: " + chq_amt);





finalnowtobepaide=(netamt - prenetamt).toFixed(2);
console.log("finalnowtobepaide" +finalnowtobepaide);








//jevha total deduction and total recovery not available that time c_netamt is checkAmt deside kele
// var checkAmt=parseFloat(GrossAmt.c_netamt).toFixed(2);
// console.log(" orignnal checkAmount" +checkAmt);

document.getElementById('net_amt_input').value = Currrentnetamt;
var previousTotcheckAmt = data.previousTotDeducheckAmt;
var preTotDed = previousTotcheckAmt && previousTotcheckAmt.tot_ded !== null ? previousTotcheckAmt.tot_ded : "0.00";
console.log("Previous Total Deduction " + preTotDed);
var preCheckAmt = previousTotcheckAmt && previousTotcheckAmt.chq_amt !== null ? previousTotcheckAmt.chq_amt : "0.00";
console.log("Previous check Amount " + preCheckAmt);

var TotDedcheckAmt = data.DBTotaldeducheckAmt;
var totalDeduction = TotDedcheckAmt && TotDedcheckAmt.tot_ded !== null ? TotDedcheckAmt.tot_ded : "0.00";
console.log("Total Deduction " + totalDeduction);


var checkAmtfinal = TotDedcheckAmt && TotDedcheckAmt.chq_amt !== null ? TotDedcheckAmt.chq_amt : "0.00";
console.log(" Cheque Amount " + checkAmt);

var totalRecoveryFinal = TotDedcheckAmt && TotDedcheckAmt.tot_recovery !== null ? TotDedcheckAmt.tot_recovery : "0.00";
console.log("Total Recovery " + totalRecoveryFinal);


var totalDeductionInput = document.getElementById('totdedu');
var totalDeductionValue = totalDeductionInput.value;
console.log('Total Deduction Value:', totalDeductionValue);
var chequeAmountInput = document.getElementById('check');
var chequeAmountValue = chequeAmountInput.value;
console.log('Cheque Amount Value:', chequeAmountValue);

var WOAmtValue = parseFloat(data.WOAmt); // Make sure to define WOAmtValue first
console.log("Work Order Amount: " +WOAmtValue);

// var tot_recovery=parseFloat(GrossAmt.tot_recovery);
// tot_recovery = isNaN(tot_recovery) ? 0.00 : tot_recovery;
// console.log("Total Recovery:",tot_recovery);

// Subtract tot_recovery from checkAmt
// checkAmt = (parseFloat(checkAmt) - parseFloat(tot_recovery)).toFixed(2);
// console.log("Updated Cheque Amount after deducting Total Recovery:", checkAmt);


var checkAmt=parseFloat(GrossAmt.c_netamt).toFixed(2)-totalDeduction-tot_recovery;
checkAmt = checkAmt.toFixed(2);
console.log(" orignnal checkAmount" +checkAmt);



//normal data print on table 
    var normalItemsarr = data.normalItemsarr;
    console.log(data.normalItemsarr);
    var normalItemsTable = document.getElementById('normalItemsTable');
    var royaltylabarr = data.royaltylabarr;
    var royaltyLabTable = document.getElementById('normalItemsTable');
// Check if 'normalItemsarr' is defined in 'data'

if (Array.isArray(normalItemsarr)) 
{
    // 'normalItemsarr' is an array; process it
    var normalItemsTable = document.getElementById('normalItemsTable');
    normalItemsarr.forEach(function (message, index) {
        var itemData = message.split(" | ");
        var itemNo = itemData[0].replace("Item No: ", "").trim();
        var subNo = itemData[1].replace("Sub No: ", "").trim();
        var execQtyValue = itemData[2].replace("Exec Qty: ", "").trim();
        var exs_nmValue = itemData[3].replace("Description: ", "").trim(); // Extract the 'exs_nm' value
        var DBbillrate = itemData[4].replace("Bill Rate: ", "").trim(); // Extract the 'Bill Rate' value
        var DBTndrate = itemData[5].replace("Tender Rate: ", "").trim(); // Extract the 'Tender Rate' value
        var b_item_amt = itemData[6].replace("Bill Item Amount: ", "").trim(); // Extract the 'Bill Item Amount' value
        var nowToBePaidAmount = itemData[7].replace("Current Amount: ", "").trim(); // Extract the 'Current Amount' value
        var Remark = itemData[8].replace("Remarks: ", "").trim(); // Extract the 'Current Amount' value

        // Concatenate non-empty values
        var tenderItemNo = (itemNo || subNo) ? (itemNo + subNo) : "";

        var row = normalItemsTable.insertRow();
        
        // Populate the "Tender Item No" column with the concatenated value
        var cell = row.insertCell(0); // 0 corresponds to the first column in the table
        cell.innerHTML = tenderItemNo;
        cell.style.textAlign = "right";
        cell = row.insertCell(1);
        cell.innerHTML = execQtyValue;
        cell.style.textAlign = "right";
        cell = row.insertCell(2);
        cell.innerHTML = exs_nmValue;
        cell = row.insertCell(3);
        if (DBbillrate === DBTndrate) 
        {
            cell.innerHTML = DBbillrate;
        cell.style.textAlign = "right";

        } 
        else {
            cell.innerHTML = DBbillrate + '<hr class="underline">' + DBTndrate;
        cell.style.textAlign = "right";

        }

        cell = row.insertCell(4);
        cell.innerHTML = b_item_amt;
        cell.style.textAlign = "right";

        cell = row.insertCell(5);
        cell.innerHTML = nowToBePaidAmount;
        cell.style.textAlign = "right";

        cell = row.insertCell(6);
        cell.innerHTML = Remark;
        cell.style.textAlign = "left";

    });
} 
else 
{
    console.error("'normalItemsarr' is not defined in 'data'");
}
var totalRow = '<tr>';
            // totalRow += '<td colspan="3"></td>'; // Empty cells for the first three columns
            totalRow += '<td colspan="4" style="text-align: right; font-weight: bold;">Total Part A Amount  </td>'; // Label for the "Rate" total
            totalRow += '<td style="text-align: right; font-weight: bold;">'+ partaAmt+'</td>'; // Total rate value
            totalRow += '<td style="text-align: right; font-weight: bold;">' + CpartaAmt + '</td>';
            totalRow += '<td></td>'; // Empty cells for the remaining columns
            totalRow += '</tr>';
            jQuery('#normalItemsTable').append(totalRow);

            if(ABPerce > 0.00)
            {
            var AbovebelowRow = '<tr>';
            AbovebelowRow += '<td colspan="4" style="text-align: right; font-weight: bold;">Tender Above bellow Result: <strong><span style="color: red;">' + ABPerce + '</span></strong> <strong><span style="color: red;">' + abovebellow + '</span></strong></td>';
            AbovebelowRow += '<td style="text-align: right; font-weight: bold;"> ' + abeff +'</td>';
            AbovebelowRow += '<td style="text-align: right; font-weight: bold;">' + Cabeff +'</td>';
            AbovebelowRow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
            AbovebelowRow += '</tr>';
jQuery('#normalItemsTable').append(AbovebelowRow);

var TotRow = '<tr>';
            TotRow += '<td colspan="4" style="text-align: right; font-weight: bold;">GST Base  </td>'; // Label for the new total
            TotRow += '<td style="text-align: right; font-weight: bold;">'+ GSTBase+' </td>'; // Total amount value
            TotRow += '<td  style="text-align: right; font-weight: bold;"> '+ CurreGSTBase +'</td>';
            TotRow += '<td ></td>'; 
            // TotRow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
            TotRow += '</tr>';
jQuery('#normalItemsTable').append(TotRow);
            }

var finalGSTperROW = '<tr>';
finalGSTperROW += '<td colspan="4" style="text-align: right; font-weight: bold;"> GST Amount <strong><span style="color: red;">' + PreDBGSRate + '%</span></strong></td>';
            finalGSTperROW += '<td style="text-align: right; font-weight: bold;">' + DBGSTAmt + '</td>'; // Total amount value
            finalGSTperROW += '<td  style="text-align: right; font-weight: bold;">'+ CurreGSTAmt +'</td>';
            finalGSTperROW += '<td ></td>';
            finalGSTperROW += '</tr>';
jQuery('#normalItemsTable').append(finalGSTperROW);


var CEROW = '<tr>';
            CEROW += '<td colspan="4" style="text-align: right; font-weight: bold;"> Total</td>'; // Label for the new total
            CEROW += '<td style="text-align: right;font-weight: bold;">' + partAGSTAmount + '</td>'; // Total amount value
            CEROW += '<td  style="text-align: right; font-weight: bold;"> ' + CurrePartAGSTAmt + '</td>';
            CEROW += '<td> </td>';
            CEROW += '</tr>';
jQuery('#normalItemsTable').append(CEROW);




//////Rolality data Table //////////////
// Assuming 'royaltylabarr' is a property of the 'data' object
var royaltylabarr = data.royaltylabarr;
var royaltyLabTable = document.getElementById('normalItemsTable');

if (royaltylabarr.length > 0) 

{

var royaltyLabTableHeading = royaltyLabTable.insertRow();


var cell = royaltyLabTableHeading.insertCell(0);
cell.innerHTML = "Tender Item No";
cell.style.textAlign = "center";
cell.style.fontWeight = "bold";
cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
cell.style.color = "black"; // Set 


cell = royaltyLabTableHeading.insertCell(1);
cell.innerHTML = "Upto date quantity";
cell.style.textAlign = "center";
cell.style.fontWeight = "bold";
cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
cell.style.color = "black"; // Set 


cell = royaltyLabTableHeading.insertCell(2);
cell.innerHTML = "Description of Item";
cell.style.textAlign = "center";
cell.style.fontWeight = "bold";
cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
cell.style.color = "black"; // Set 


cell = royaltyLabTableHeading.insertCell(3);
cell.innerHTML = "Bill/Tender Rate";
cell.style.textAlign = "center";
cell.style.fontWeight = "bold";
cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
cell.style.color = "black"; // Set 



cell = royaltyLabTableHeading.insertCell(4);
cell.innerHTML = "Total Up to date Amount";
cell.style.textAlign = "center";
cell.style.fontWeight = "bold";
cell.style.backgroundColor = "#F5DEB3"; // Set the background color to black
cell.style.color = "black"; // Set 


cell = royaltyLabTableHeading.insertCell(5);
cell.innerHTML = "Now to be paid Amount";
cell.style.textAlign = "center";
cell.style.fontWeight = "bold";
cell.style.backgroundColor = "#F5DEB3"; 
cell.style.color = "black"; // Set 

cell = royaltyLabTableHeading.insertCell(6);
cell.innerHTML = "Remark";
cell.style.textAlign = "center";
cell.style.fontWeight = "bold";
cell.style.backgroundColor = "#F5DEB3"; 
cell.style.color = "black"; // Set 


// Now, loop through royaltylabarr data and add the rows
royaltylabarr.forEach(function (message) {
    var itemData = message.split(" | ");
    var itemNo = itemData[0].replace("Item No: ", "").trim();
    var subNo = itemData[1].replace("Sub No: ", "").trim();
    var execQtyValue = itemData[2].replace("Exec Qty: ", "").trim();
    var exs_nmValue = itemData[3].replace("Description: ", "").trim();
    var DBbillrate = itemData[4].replace("Bill Rate: ", "").trim();
    var DBTndrate = itemData[5].replace("Tender Rate: ", "").trim();
    var b_item_amt = itemData[6].replace("Bill Item Amount: ", "").trim();
    var nowToBePaidAmount = itemData[7].replace("Current Amount: ", "").trim();
    var Remark = itemData[8].replace("Remarks: ", "").trim();


    var tenderItemNo = (itemNo || subNo) ? (itemNo + subNo) : "";

    var row = royaltyLabTable.insertRow();
    var cell = row.insertCell(0);
    cell.innerHTML = tenderItemNo;
    cell.style.textAlign = "right";

    cell = row.insertCell(1);
    cell.innerHTML = execQtyValue;
    cell.style.textAlign = "right";

    cell = row.insertCell(2);
    cell.innerHTML = exs_nmValue;

    cell = row.insertCell(3);
    if (DBbillrate === DBTndrate) {
        cell.innerHTML = DBbillrate;
        cell.style.textAlign = "right";
    } else {
        cell.innerHTML = DBbillrate + '<hr class="underline">' + DBTndrate;
        cell.style.textAlign = "right";
    }

    cell = row.insertCell(4);
    cell.innerHTML = b_item_amt;
    cell.style.textAlign = "right";

    cell = row.insertCell(5);
    cell.innerHTML = nowToBePaidAmount;
    cell.style.textAlign = "right";

    cell = row.insertCell(6);
    cell.innerHTML = Remark;
    cell.style.textAlign = "left";

});


}

var totalRow = '<tr>';
            // totalRow += '<td colspan="3"></td>'; // Empty cells for the first three columns
            totalRow += '<td colspan="4" style="text-align: right; font-weight: bold;">Total Part B Amount</td>'; // Label for the "Rate" total with right alignment
            totalRow += '<td style="text-align: right; font-weight: bold;">'+ partBAmt+'</td>'; // Total rate value
            totalRow += '<td style="text-align: right; font-weight: bold;"> ' + CPartBAmt + '</td>';
            totalRow += '<td></td>'; // Empty cells for the remaining columns
            totalRow += '</tr>';
            jQuery('#normalItemsTable').append(totalRow);



            var totalRow = '<tr>';
            // totalRow += '<td colspan="3"></td>'; // Empty cells for the first three columns
            totalRow += '<td colspan="4" style="text-align: right; font-weight: bold;">Grand Total(effective Part A + Part B)</td>'; // Label for the "Rate" total
            totalRow += '<td style="text-align: right; font-weight: bold;">'+billAmtGt +'</td>'; // Total rate value
            totalRow += '<td style="text-align: right; font-weight: bold;">' + CbillAmtGt + '</td>';
            totalRow += '<td></td>'; // Empty cells for the remaining columns
            totalRow += '</tr>';
            jQuery('#normalItemsTable').append(totalRow);


            var dedrow = '<tr>';
            dedrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Add/Ded for Round Up value </td>'; // Label for the new total
            dedrow += '<td style="text-align: right; font-weight: bold;">' + bill_amt_ro + '</td>'; // Total amount value
            dedrow += '<td  style="text-align: right; font-weight: bold;">'+ c_billamtro+'</td>';
            dedrow += '<td ></td>';
            // GSTROW += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
            dedrow += '</tr>';
jQuery('#normalItemsTable').append(dedrow);



var FHrow = '<tr>';
            FHrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Final Total  </td>'; // Label for the new total
            FHrow += '<td style="text-align: right;font-weight: bold;">'+ netamt+'</td>'; // Total amount value
            FHrow += '<td style="text-align: right; font-weight: bold;" >'+ Currrentnetamt+ '</td>';
            FHrow += '<td ></td>';
            // GSTROW += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
            FHrow += '</tr>';
jQuery('#normalItemsTable').append(FHrow);

var lastpaidAmountrow = '<tr>';
            lastpaidAmountrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Previously Paid Amount</td>'; // Label for the new total
            lastpaidAmountrow += '<td style="text-align: right; font-weight: bold;">'+ prenetamt+'</td>'; // Total amount value
            lastpaidAmountrow += '<td style="text-align: right; font-weight: bold;"></td>';
            lastpaidAmountrow += '<td ></td>';
            // GSTROW += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
            lastpaidAmountrow += '</tr>';
jQuery('#normalItemsTable').append(lastpaidAmountrow);


var nowpaidrow = '<tr>';
            nowpaidrow += '<td colspan="4" style="text-align: right; font-weight: bold; color: red;"> Now to be paid Amount </td>';
//             if (usertype === "audit") 
//             {
//     nowpaidrow += '<td colspan="1"><button type="button" onclick="submitDeductionForm()" style="font-weight: bold; font-size: 15px; color: red;">Add Ded</button></td>';
// } 
// else
//  {
//     // Add an extra <td> when the condition is not satisfied
//     nowpaidrow += '<td></td>';
// }
            // nowpaidrow += '<td colspan="1"><button type="button" onclick="submitDeductionForm()" style="font-weight: bold; font-size: 15px; color: red;">Add Ded</button></td>';
            nowpaidrow += '<td style="text-align: right;font-weight: bold;" >'+ finalnowtobepaide +'</td>';
            nowpaidrow += '<td style="text-align: right; font-weight: bold;" >'+ Currrentnetamt +'</td>';
            nowpaidrow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
            nowpaidrow += '</tr>';
jQuery('#normalItemsTable').append(nowpaidrow);


// var Deductionrow = '<tr>';
// Deductionrow += '<td colspan="3" style="text-align: right; font-weight: bold;"> Total Deduction </td>';
// Deductionrow += '<td colspan="1"><button type="button" onclick="submitDeductionForm()" style="font-weight: bold; font-size: 15px; color: red;">Add Ded</button></td>';
// Deductionrow += '<td style="text-align: right; font-weight: bold;">'+ p_tot_ded+'</td>';
// Deductionrow += '<td  style="text-align: right; font-weight: bold;">'+ tot_ded+'</td>';
// Deductionrow += '<td ></td>';
// // Deductionrow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
// Deductionrow += '</tr>';

var Deductionrow = '<tr>';
console.log(data.mbstatus);
var mbstatus=data.mbstatus;
console.log(mbstatus);
            if (usertype === "audit" && mbstatus == 10) 

            {
Deductionrow += '<td colspan="3" style="text-align: right; font-weight: bold;"> Total Deduction </td>';
Deductionrow += '<td colspan="1"><button type="button" onclick="submitDeductionForm()" style="font-weight: bold; font-size: 15px; color: red;">Add Ded</button></td>';
Deductionrow += '<td style="text-align: right; font-weight: bold;">'+ p_tot_ded+'</td>';
Deductionrow += '<td  style="text-align: right; font-weight: bold;">'+ tot_ded+'</td>';
Deductionrow += '<td ></td>';
            }
            else
            {
Deductionrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Total Deduction </td>';
Deductionrow += '<td style="text-align: right; font-weight: bold;">'+ p_tot_ded+'</td>';
Deductionrow += '<td  style="text-align: right; font-weight: bold;">'+ tot_ded+'</td>';
Deductionrow += '<td ></td>';
            }
Deductionrow += '</tr>';

jQuery('#normalItemsTable').append(Deductionrow);


// var totalRecovery = '<tr>';
// totalRecovery += '<td colspan="4" style="text-align: right; font-weight: bold;"> Total Recovery </td>';
// totalRecovery += '<td style="text-align: right; font-weight: bold;">'+ p_tot_recovery+'</td>';
// totalRecovery += '<td style="text-align: right; font-weight: bold;"> '+ tot_recovery +'</td>';
// totalRecovery += '<td ></td>';
// totalRecovery += '</tr>';
// jQuery('#normalItemsTable').append(totalRecovery);


var checkAmtrow = '<tr>';
checkAmtrow += '<td colspan="4" style="text-align: right; font-weight: bold;"> Cheque Amount </td>';
checkAmtrow += '<td style="text-align: right; font-weight: bold;"></td>';
checkAmtrow += '<td style="text-align: right; font-weight: bold;">'+ chq_amt +'</td>';
checkAmtrow += '<td ></td>';
// checkAmtrow += '<td ></td>'; // Colspan 4 for the "AS Per Tender" text
checkAmtrow += '</tr>';
jQuery('#normalItemsTable').append(checkAmtrow);


// if (DBCE > WOAmtValue) 
// {
//   jQuery('#relatedDataBody tr:last').addClass('red-row');
//   jQuery('#relatedDataBody tr:last').show();
// } 
// else 
// {
//   jQuery('#relatedDataBody tr:last').hide();
// }



//////Rolality data Table //////////////



        },

      });


    });
// });

</script>


<!-- //table data -->
<script>
  function submitDeductionForm() 
  {
    // Submit the form with the given ID
    document.getElementById('deductionForm').submit();
  }
</script>



@endsection()
