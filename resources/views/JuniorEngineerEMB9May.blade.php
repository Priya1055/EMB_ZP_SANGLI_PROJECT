@extends('layouts.header')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

 <style>
.title{
        font-weight: bold;
        font-size: 24px;
        line-height: 1.5;
        text-align: center;
         margin-top: 20px;
         padding-right: 100px;
    }
  .container {
    border: 1px solid #555;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
  }

  .container1 {

  }
  .cspan {
  padding: 1px;
    }

  .custom-button {
    margin-top: 10px; /* Adjust the margin as needed to align the button */
    background: #04AA6D;
    color: white;
    }
 /* Increase font weight of labels */
 .form-group label {
      font-weight: bold;
 }

 /* header */
 .bg-custom {
  background-color: #e3f2fd;
}
/* Custom text color */

.body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.nav-tabs .nav-item .nav-link.active {
        background-color: rgb(156, 61, 7); /* Change this to your desired color */
        color: white; /* Change this to a suitable text color for contrast */
        font-weight: bold;
    }

    /* Style for the inactive tab buttons */
    .nav-tabs .nav-item .nav-link {
      /*  background-color: lightblue;  Change this to your desired color */
        color: black; /* Change this to a suitable text color for contrast */
        font-weight: bold;
    }
    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .th, .td {

        padding: 1px;
        text-align: left;
    }

    .th {
        background-color: #5d1919; /* Gray background for header */
    }

    .tr:nth-child(even) {
        background-color: #381c7c; /* Alternate row color */
    }

    .tr:hover {
        background-color: #d8d528; /* Hover effect */
    }

    .table {
    border: 1px solid rgb(9, 9, 9);
    text-align: center;
    margin: 0;
    padding: 0px;
}
.table2{
        border: 1px solid #555;
        margin:0px;
        background-color:rgb(240, 206, 224);
        padding: 0px;
    }
    .statement{
        margin-left:60%;
    }
</style>

<ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
    <li><a href="{{ url('billlist', $WorkId ?? '') }}">Bill</a></li>
    <li><a href="{{ url('emb', $tbillid ?? '') }}">EMB</a></li>
    <li><a href="javascript:void(0)">Junior Engineer</a></li>
</ul>

<a href="{{ url('emb', $tbillid ?? '') }}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a>
{{-- Common part --}}

<div class="container1" style="padding-top: 100px;" >
<div class="row">
    <div class="col-lg-12">
      <div class="form-group form-row align-items-center">
            <label for="division" class="col-md-2">Division:</label>
            <div class="col-md-4">
              <input type="text" class="form-control" id="Div" name="Div "value="{{$divNm ?? ''}}"disabled>
            </div>
            <label for="subdivision" class="col-md-2">Sub Division:</label>
           <div class="col-md-4">
             <input type="text" name="Sub_Div" class="form-control" id="Sub_Div" disabled
             value="{{$workDetails->Sub_Div ?? '' }}">
            </div>
          </div>
          <div class="form-group form-row align-items-center mt-4">
              <label for="name" class="col-md-2">Work Id:</label>
              <div class="col-md-4">
                <input type="text" name="workid" class="form-control" id="workid"   value="{{$workDetails->Work_Id  ?? ''}}" required disabled>
              </div>
              <label for="fundhead" class="col-md-2">Fund Head:</label>
              <div class="col-md-4">
                   <input type="text" class="form-control" id="fundhead" name="Fund_Hd" value="{{$fund_Hd->Fund_HD_M ?? '' }}" disabled>
           </div>
            </div>
        </div>

          <div class="form-group form-row align-items-center">
            <label for="division" class="col-md-2">Name Of Work:</label>
            <div class="col-md-10">
                <textarea name="Work_Nm" id="Work_Nm" style="width: 100%;" disabled>
                    {{$workDetails->Work_Nm ?? ''}}
                </textarea>
            </div>
            </div>
            <div class="form-group form-row align-items-center">
  <label for="division" class="col-md-2">Work Order No:</label>
  <div class="col-md-4">
      <input type="text" class="form-control"name="WO_No"  id="WO_No" value="{{$workDetails->WO_No  ?? ''}}" disabled>
  </div>
  <label for="nameofwork" class="col-md-2">Date:</label>
          <div class="col-md-4">
              <input type="text" class="form-control" id="dateInput" name="dateInput" value="{{ date('d/m/Y', strtotime($workDetails->Wo_Dt ?? ''))}}" disabled>
          </div>
                                                                            {{-- {{ date('d/m/Y', strtotime($user->Agree_Dt)) }} --}}
</div>
  <div class="form-group form-row align-items-center">
      <label for="subdision" class="col-md-2">Period :</label>
  <div class="col-md-4">
      <input type="text" name="Period" class="form-control" id="Period" disabled value="{{$workDetails->Period ?? '' }}">
  </div>
  <label for="subdivision" class="col-md-2">Stipulated Date Of Complition:</label>
  <div class="col-md-4">
      <input type="text" name="Subiv" class="form-control" id="Subv" disabled value="{{ date('d/m/Y', strtotime($workDetails->Stip_Comp_Dt ?? '' ))}}">
  </div></div>
<div class="form-group form-row align-items-center">
  <label for="agency" class="col-md-2">Agency:</label>
   <div class="col-md-4">
    <input type="text" name="Agency_Nm" class="form-control" id="Agency_Nm" disabled
    value="{{ $workDetails->Agency_Nm ?? ''}}">
   </div>
  <label for="sectionengineer" class="col-md-2">Eng Incharg:</label>
  <div class="col-md-4">
    <input type="text" class="form-control" id="sectionengineer" name="name"
    value="{{ $workDetails->Agency_Nm ?? ''}}" disabled>
  </div>
    </div>
</div>
</div>


{{-- RecordEntry comman Part --}}

<div class="container1" style=" border:none;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="Recordentrywise-tab" data-toggle="tab" href="#Recordentrywise" role="tab" aria-controls="Recordentrywise" aria-selected="true">Record Entry Wise</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Itemwise-tab" data-toggle="tab" href="#Itemwise1" role="tab" aria-controls="Itemwise1" aria-selected="false">Item Wise</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Recordentrywise" role="tabpanel" aria-labelledby="Recordentrywise-tab">
            <div class="container1" id="Recordentrywisecontnr" style="border:none" >
                <table class="table table-responsive" style="border:none;">
                    <tr>
                        <td>Record Entry No:</td>
                            <td>
                                <select id="RecDropdown" name="recnovalues">
                                    <option value="" >Select Record Entry No</option>
                                        @foreach ($Recordwise as $recno)
                                            <option value="{{ $recno->Record_Entry_No }}">{{ $recno->Record_Entry_No }}</option>
                                         @endforeach
                             </select>
                            </td>
                        <td id="recnochngdt">Date:</td>
                        <td id="recnochngdt1">
                            <input type="text" class="form-control"id="dateid" value="" name="dateInput" disabled>
                        </td>
                    </tr>
                </table>

                <div id="itemdesc">
                </div>

                <div id="Normalheading">
                </div>

                <div id="htmlsteel1">
                </div>

                <div id="strhtml">
                </div>

            </div>
        </div>

    <div class="tab-pane" id="Itemwise1" role="tabpanel" aria-labelledby="Itemwise-tab">
        <div class="container1" id="ItemwiseContainer">
                <div class="col-lg-12">
                    <div class="row">
                                <table class="table table-responsive">
                                    <thead>
                                        <b>
                                            <td style="width: 20%; text-align: left;">Item No:</td>
                                            <td style="width: 1%; text-align: left;" id="itemnm1">Item Description:</td>
                                            <td style="width: 1%; text-align: left;" id="totalqty1">Total Qty:</td>
                                            <td style="width: 1%; text-align: left;" id="unit1">Unit:</td>
                                        </b>
                                    </thead>

                                    <tbody>
                                        <td style="width: 10%;" >
                                            <select id="DivDropdown" name="titemnovalues" class="form-control" style="width: 100%;">
                                                <option value="">Select Item No</option> <!-- Initial "Select Item No" option -->
                                                @foreach ($titemno as $itemno)
                                                    <option  class="form-control" value="{{ $itemno->combined_value ?? ''}}" class="form-control"> {{ $itemno->combined_value ??'' }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td class="responsive-row " style="width: 60%;">
                                            <textarea style="width: 100%; height: 50%;" class="form-control" id="itemnm" name="itemnamem" disabled></textarea>
                                        </td>

                                        <td  style="width: 10%;">
                                            <input style="width: 100%;" class="form-control" id="totalqty" name="totalquty" disabled>
                                        </td>
                                        <td  style="width: 10%;">
                                            <input style="width: 100%;" class="form-control" id="unit" name="unit1" disabled>
                                        </td>
                                    </tbody>

                                </table>
                                <div id="ItemNormalHTMLheading"></div>
                    <div id="itemheading">
                    </div>

                    <div id="containerItemNormalHtml"></div>
                    <div id="html"></div>
                    <div id="containerItemSteelHtml"></div>

                <div id="containerSummary"></div>
                <div id="NItem"><div id="NItemContainer"></div></div>
                <div id="SItem"><div id="SItemContainer"></div>
                </div>
                <div id="containerRecordNormalHtml"></div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

</form>

<input type="hidden" name="itemid" id="itemid" value="{{ $itemid }}">
<input type="hidden" name="tbillidv" id="tbillid" value="{{ $tbillid }}">
<input type="hidden" name="workid" id="workid" value="{{ $WorkId }}">
<input type="hidden" name="billdatenm" id="billdateid" value="{{ $billDate }}">
@if(isset($recnovalues))
    <input type="hidden" name="recnovalues" id="recnovalues" value="{{ $recnovalues }}">
@endif

<div class="d-flex justify-content-center align-items-center">
<form method="post" action="{{ url('ReturnListBills/' . $WorkId) }}" id="Check1Submitform">
   @csrf
   <div class="container mt-1" style="border: none;">
   <div class="d-flex justify-content-center align-items-center">
       <button type="button" class="btn btn-info btn-sm submitBtn_cls" id="submitBtn">Submit</button>
   </div>
</div>
</form>
<br><br><br><br><br><br><br><br>

{{-- NItem+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

<script>
    // Add custom JavaScript to show the selected tab content and hide others
    function openForm(event, formName) {
        event.preventDefault();
        // Hide all tab content
        document.querySelectorAll('.tab-pane').forEach(function (tabPane) {
            tabPane.classList.remove('show', 'active');
        });

        // Show the selected tab content
        document.getElementById(formName).classList.add('show', 'active');
    }
</script>


{{-- Ajax-RecordentryWise  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

<script>
 $(document).ready(function() {
     $('#recnochngdt').hide();
     $('#recnochngdt1').hide();
     $('#submitBtn').show();
    $('#RecDropdown').change(function() {
        console.log(" Record Entry Dropdown selection changed.....");
        $('#recnochngdt').show();
        $('#recnochngdt1').show();
        // Get the selected value from the dropdown
        var Record_Entry_Nor = $('#RecDropdown').val();
        //console.log(Record_Entry_Nor);
        var workid_valuer = $('#workid').val();
        var itemid_valuer = $('#itemid').val();
        var tbillid_valuer = $('#tbillid').val();
        $('#submitBtn').show();
        $.ajax({
            type: "POST",
            url: "recordentry1",
            data: {
                Record_Entry_Nor: Record_Entry_Nor,
                itemid_valuer: itemid_valuer,
                tbillid_valuer: tbillid_valuer,
                workid_valuer: workid_valuer
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
            console.log("In Ajaxxxxxxxxxxxxx....");
            var dtinfo = response.RecDate;
            //var dateInput = document.getElementById("dateInput");

            console.log("Printing Steel data.........")
            var htmlsteel1=response.html;
            // console.log(htmlsteel1);
            var steeldesc=response.steeldesc;
            if(htmlsteel1){
                $('#Normalheading').hide();
            }
            else{
                $('#Normalheading').show();
            }

            var Normalheading=response.Normalheading;

            //   console.log(Normalheading)
            $('#dateid').val(dtinfo);

            $('#htmlsteel1').html(htmlsteel1);


                },
                error: function (xhr, status, error) {
                    console.log("Error is raised....:", error);
                    alert('An error occurred while fetching data. Please check the console for details.');
                }
            });
        });
    });
</script>

{{-- ItemWise Ajax======================================================================================================================== --}}


    <script>
                $(document).ready(function() {
                // Hide elements on page load
                $('#itemnm').hide();
                $('#totalqty').hide();
                $('#unit').hide();
                $('#itemnm1').hide();
                $('#totalqty1').hide();
                $('#unit1').hide();
                $('#html').hide();
                $('#itemheading').hide();
                $('#containerItemNormalHtml').hide();
                $('#containerItemSteelHtml').hide();
                $('#totalqty1').hide();
                $('#NItemContainer').hide();
                $('#SItemContainer').hide();
                $('#submitBtn').hide();
                // Handle the change event for the dropdown
                $('#DivDropdown').change(function() {
                    // Show elements when the dropdown value changes
                    $('#itemnm').show();
                    $('#totalqty').show();
                    $('#unit').show();
                    $('#itemnm1').show();
                    $('#totalqty1').show();
                    $('#unit1').show();
                    $('#html').show();
                    $('#itemheading').hide();
                    $('#containerItemNormalHtml').show();
                    $('#containerItemSteelHtml').show();
                    $('#totalqty1').show();
                    $('#NItemContainer').show();
                    $('#SItemContainer').show();
                    $('#submitBtn').hide();

                console.log("Dropdown selection changed.....");
                // Get the selected value from the dropdown
                var combined_value = $('#DivDropdown').val();
                var workid_value = $('#workid').val();
                var itemid_value = $('#itemid').val();
                var tbillid_value = $('#tbillid').val();

                // Perform an AJAX request to fetch data based on the selected Record Entry No
                $.ajax({
                    type: "POST",
                    url: "recordentry",
                    data: {
                        workid_value: workid_value,
                        itemid_value: itemid_value,
                        tbillid_value: tbillid_value,
                        combined_value: combined_value
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        var iteminfo1 =response.iteminfo;

                        // Set values to UI elements
                        var iteminfo=iteminfo1[0];
                        console.log(iteminfo.exs_nm);
                        $('#itemnm').val(iteminfo.exs_nm);
                        $('#totalqty').val(iteminfo.cur_qty);
                        $('#unit').val(iteminfo.item_unit);
                        console.log(iteminfo);
                        // console.log(SteelSummary)
                        var normaldata = response.Item1Data;
                        // console.log(normaldata);
                        var html= response.html;
                        ItemNormalHTMLheading='';
                        ItemNormalHTML='';
                        var ItemSteeSummaryhtml='';
                        $('#containerItemNormalHtml').hide()

                        $('#containerItemSteelHtml').hide();

                    $('#ItemNormalHTMLheading').html(ItemNormalHTMLheading);
                        //console.log(recentryno);

                        if(response.html){
                            $('#html').show();
                            $('#html').html(html);
                         $('#ItemNormalHTMLheading').hide();

                        }
                                else{
                                    var normaldata = response.Item1Data;
                                     var dyeRevert= response.dyeRevert;
                                    var container = $('#NItemContainer');
                                    var  ItemNormalHTML = '';
                                    var ItemSteelHTML='';
                                    var containers='';
                                    $('#html').hide();
                                    if (Array.isArray(normaldata) && normaldata.length > 0 ) {
                            //  console.log("Normal data found...");
                             ItemNormalHTML +=`
                        <table class="table table-bordered table-responsive table-striped" style="border: 1px solid black;">
                                        <thead>
                                            <th colspan="1" style="width: 5%; border-color:black;">Sr. No.</th>
                                            <th colspan="1"  style="width: 26%; border-color:black;">Particulars</th>
                                            <th colspan="1"  style="width: 8%; border-color:black;">Number</th>
                                            <th colspan="1" style="width: 8%; border-color:black;">Length</th>
                                            <th colspan="1" style="width: 8%; border-color:black;">Breadth</th>
                                            <th colspan="1" style="width: 8%; border-color:black">Height</th>
                                            <th colspan="1" style="width: 10%; border-color:black;">Quantity</th>
                                            <th colspan="1" style="width: 10%; border-color:black;">Record Entry Number</th>
                                            <th colspan="1" style="width: 7%; border-color:black;">Date</th>
                                        </thead> </tbody>`;
                    }
                                    normaldata.forEach(function (item, index) {
                                    var dyecheck=item.dye_check;
                                    // console.log(item,dyecheck,dyeRevert);
                            if(dyeRevert == 1 && dyecheck == 0 )
                            {
                                var ItemSteelHTML='';
                                    const originalDate = new Date(item.measurment_dt);
                                    const formattedDate = originalDate.toLocaleDateString('en-GB'); // Format the date

                                    var formulaimtem = item.formula;
                                    $('#containerItemNormalHtml').show();
                                    $('#containerItemSteelHtml').hide();
                                    $('#ItemSteelHTML').hide();
                                    ItemNormalHTML += `
                                                <tr>
                                                    <td colspan="1" style="width: 5%; border-color:black; text-align:left; background-color:#FFD699;">${item.sr_no}</td>
                                                    <td colspan="1"style="width: 43%; text-align: left; border-color:black;background-color:#FFD699;">${item.parti ?? ''}</td>`;
                                    if (item.formula == null)
                                    {
                                    ItemNormalHTML += `
                                                    <td colspan="1" style="width: 7%;  text-align: right; border-color:black;background-color:#FFD699;">${item.number ?? ''}</td>
                                                    <td colspan="1" style="width: 7%;  text-align: right; border-color:black;background-color:#FFD699;">${item.length ?? ''}</td>
                                                    <td colspan="1" style="width: 7%;  text-align: right; border-color:black;background-color:#FFD699;">${item.breadth ?? ''}</td>
                                                    <td colspan="1" style="width: 7%;  text-align: right; border-color:black;background-color:#FFD699;">${item.height ?? ''}</td>`;
                                    }
                                        else
                                        {
                                            console.log("Ok in Else");
                                            ItemNormalHTML += `
                                            <td colspan="4" style=" text-align: right;  border-color:black;background-color:#FFD699;">${formulaimtem }</td>`;
                                        }
                                        ItemNormalHTML += `
                                            <td colspan="1" style="width: 7%;  text-align: right; border-color:black;background-color:#FFD699;">${item.qty ?? ''}</td>
                                            <td colspan="1" style="width: 10%; text-align: right; border-color:black;background-color:#FFD699;">${item.Record_Entry_No ?? ''}</td>
                                            <td colspan="1" style="width: 7%;  text-align: right; border-color:black;background-color:#FFD699;">${formattedDate}</td>
                                            </tr>
                                        `;
                            }
                            else
                            {
                                        var ItemSteelHTML='';
                                            const originalDate = new Date(item.measurment_dt);
                                            const formattedDate = originalDate.toLocaleDateString('en-GB'); // Format the date

                                            var formulaimtem = item.formula;
                                            $('#containerItemNormalHtml').show();
                                            $('#containerItemSteelHtml').hide();
                                            $('#ItemSteelHTML').hide();
                                            ItemNormalHTML += `
                                                        <tr>
                                                            <td colspan="1" style="width: 5%; border-color:black; text-align:left;">${item.sr_no}</td>
                                                            <td colspan="1" style="width: 26%; text-align: left; border-color:black;">${item.parti ?? ''}</td>`;
                                            if (item.formula == null) {
                                            ItemNormalHTML += `
                                                            <td colspan="1" style="width: 8%;  text-align: right; border-color:black;">${item.number ?? ''}</td>
                                                            <td colspan="1"  style="width: 8%;  text-align: right; border-color:black;">${item.length ?? ''}</td>
                                                            <td colspan="1" style="width: 8%;  text-align: right; border-color:black;">${item.breadth ?? ''}</td>
                                                            <td colspan="1" style="width: 8%;  text-align: right; border-color:black;">${item.height ?? ''}</td>`;
                                        }
                                        else {
                                            console.log("Ok in Else");
                                            ItemNormalHTML += `
                                                            <td colspan="4" style="width: 32%; text-align: right;  border-color:black;">${formulaimtem }</td>`;
                                        }
                                        ItemNormalHTML += `
                                            <td colspan="1" style="width: 10%;  text-align: right; border-color:black;">${item.qty ?? ''}</td>
                                            <td colspan="1" style="width: 10%; text-align: right; border-color:black;">${item.Record_Entry_No ?? ''}</td>
                                            <td colspan="1" style="width: 7%;  text-align: right; border-color:black;">${formattedDate}</td>
                                            </tr>
                                        `;

                            }

                                        });


                                            ItemNormalHTML += `<tr>
                                           <td colspan="6" style="width: 10%;  text-align: right; border-color:black;"><strong>Total</strong></td>
                                            <td colspan="1" style="width: 10%; text-align: right; border-color:black;"><strong>${iteminfo.cur_qty}</strong></td>
                                            <td colspan="2" style="width: 7%;  text-align: right; border-color:black;"></td>
                                            </tr>
                                                            </tbody></table> `;
                                            $('#containerItemNormalHtml').html(ItemNormalHTML);
                                }
                                if(iteminfo.cur_amt > 0){

                                    ItemSteeSummaryhtml += '<div class="statement form-group font-weight-bold text-right">' +
                                                                    '<div class="row"> To be paid at ' + iteminfo.ratecode + ' of Rs. ' +
                                                                        iteminfo.bill_rt  + '*' + iteminfo.cur_qty + '=' + iteminfo.cur_amt +
                                                                    '</div></div>';
                                }
                                $('#containerSummary').html(ItemSteeSummaryhtml);
                            },
                    error: function(xhr, status, error) {
                        console.log("Error is raised....:", error);
                        alert('An error occurred while fetching data. Please check the console for details.');
                    }
                });
            });
        });
    </script>


    <script>
        $('#submitBtn').click(function() {
            var tbillid = $('#tbillid').val();
            console.log(tbillid)
            console.log("IN submit function.......");
            $.ajax({
                type: 'POST',
                url: 'submitje', // Update this with the actual endpoint
                data: {
                    tbillid: tbillid
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Handle the response from the server
                    console.log(response);

                    Swal.fire({
                        title: "Warning..",
                        text: "Clicking on Submit button will forward MB to Deputy Engineer for checking. Have you checked all measurements under all Items/Record entries?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If "Yes" is clicked, submit the form
                            $('#Check1Submitform').submit();
                        } else {
                            // If "No" is clicked, do nothing or handle accordingly
                            // You can add additional logic here if needed
                        }
                    });
                },
                error: function(error) {
                    // Handle errors
                    console.error(error);
                }
            });
        });
    </script>

       <!-- {{-- New Junior engineer submit  --}} -->
        <!-- {{-- <script>
               document.querySelector(".submitBtn_cls").addEventListener("click", function (event) {
                    // Prevent the default form submission
                    event.preventDefault();

                    // Show SweetAlert with "Yes" or "No" options
                    Swal.fire({
                        title: "Warning..",
                        text: "Clicking on Submit button will forward MB to Deputy Engineer for checking. Have you checked all measurements under all Items/Record entries?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If "Yes" is clicked, submit the form

                        } else {
                            // If "No" is clicked, do nothing or handle accordingly
                            // You can add additional logic here if needed
                        }
                    });
                });
        // </script> --}} -->


@endsection
