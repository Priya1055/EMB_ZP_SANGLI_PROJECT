@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- dropdown symbol.  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}

    {{-- tab script
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> --}}


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
    /* border: 1px solid #555; */
    /* border-radius: 10px; */
    /* padding: 5px; */
   margin-bottom: 2px;
    /* padding: 30px; */
    margin-left:1%;
    margin-right:1%;
    /* padding-right: 50px;
    padding-left: 50px; */
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
</style>


{{-- Common part --}}
{{-- <form method="POST" action="/submitForm" input >
    @csrf --}}
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
             value="{{$Work_Dtl->Sub_Div ?? '' }}">
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
                    {{$Work_Dtl->Work_Nm ?? ''}}
                </textarea>
            </div>
            </div>
            <div class="form-group form-row align-items-center">
  <label for="division" class="col-md-2">Work Order No:</label>
  <div class="col-md-4">
      <input type="text" class="form-control"name="WO_No"  id="WO_No" value="{{$Work_Dtl->WO_No  ?? ''}}" disabled>
  </div>
  <label for="nameofwork" class="col-md-2">Date:</label>
          <div class="col-md-4">
              <input type="text" class="form-control" id="dateInput" name="dateInput" value="{{$workDetails->Wo_Dt ?? ''}}" disabled>
          </div>
</div>
  <div class="form-group form-row align-items-center">
      <label for="subdision" class="col-md-2">Period :</label>
  <div class="col-md-4">
      <input type="text" name="Period" class="form-control" id="Period" disabled value="{{$Work_Dtl->Period ?? '' }}">
  </div>
  <label for="subdivision" class="col-md-2">Stipulated Date Of Complition:</label>
  <div class="col-md-4">
      <input type="text" name="Subiv" class="form-control" id="Subv" disabled value="{{$Work_Dtl->Stip_Comp_Dt ?? '' }}">
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
            <div class="container1 offset-12 " id="Recordentrywisecontnr" style="border:none" >
                <table class="table table-responsive">
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

                <div id="test1">
                </div>

                <div id="RecHeading">
                </div>

                <div id="test">
                </div>


                <div id="test2">
                </div>

                <div id="test3">
                </div>

            </div>
        </div>

    <div class="tab-pane" id="Itemwise1" role="tabpanel" aria-labelledby="Itemwise-tab">
        <div class="container1" id="ItemwiseContainer">
            <table class="table table-responsive">
                <div class="col-lg-12">
                    <div class="row">
                                <table class="table table-responsive">
                                    <tr>
                                        <td style="width: 20%;">Item No:</td>
                                        <td style="width: 1%;" id="itemnm1">Item:</td>
                                        <td style="width: 1%;" id="totalqty1">Total Qty:</td>
                                        <td style="width: 1%;" id="unit1">Unit:</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" >
                                            <select id="DivDropdown" name="titemnovalues" class="form-control" style="width: 100%;">
                                                <option value="">Select Item No</option> <!-- Initial "Select Item No" option -->
                                                @foreach ($titemno as $itemno)
                                                    <option  class="form-control" value="{{ $itemno->combined_value }}" class="form-control"> {{ $itemno->combined_value }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td  style="width: 60%;">
                                            <textarea style="width: 100%;" class="form-control" rows="5" id="itemnm" name="itemnamem" disabled></textarea>
                                        </td>
                                        <td  style="width: 10%;">
                                            <input style="width: 100%;" class="form-control" id="totalqty" name="totalquty" disabled>
                                        </td>
                                        <td  style="width: 10%;">
                                            <input style="width: 100%;" class="form-control" id="unit" name="unit1" disabled>
                                        </td>
                                    </tr>

                                </table>

                    <div id="itemheading">
                    </div>

                    <div id="containerItemNormalHtml"></div>

                    <div id="containerItemSteelHtml"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<br>

</form>
{{-- <br><br> --}}
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
<div id="containerRecordNormalHtml"></div>

{{-- Ajax-RecordentryWise  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

<script>
 $(document).ready(function() {
     $('#recnochngdt').hide();
     $('#recnochngdt1').hide();

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

            var dtinfo = response.formattedDate;                                                                ;
            //var dateInput = document.getElementById("dateInput");

            //console.log(dtinfo);
            var htmldata=response.strhtml;
            //console.log(htmldata)
            var htmlformla=response.strhtmlformula;
            //console.log(htmlformla);

            var strhtmlsteel=response.strhtmlsteel;

            // var RecordNormalHTMLhead=response.RecordNormalHTMLheading;

            //console.log(RecHeading)

            var normaldesc=response.normaldesc;
            //console.log(normaldesc);
            var steeldesc=response.steeldesc;
            var RecordNormalHTMLheading="";
            if(normaldesc){
            RecordNormalHTMLheading=`
            <div class="container1" id="NItemContainer" style="border: none;">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" >
                                    <thead>
                                    <tr>
                                            <th style="width: 5%; border-color:black;">Sr. No</th>
                                            <th style="width: 44%; border-color:black;">Particulars</th>
                                            <th style="width: 8%; border-color:black;">Number</th>
                                            <th style="width: 7%; border-color:black;">Length</th>
                                            <th style="width: 7%; border-color:black;">Breadth</th>
                                            <th style="width: 7%; border-color:black">Height</th>
                                            <th style="width: 7%; border-color:black;">Quantity</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>`;

                    }
            $('#RecHeading').html(RecordNormalHTMLheading);
            $('#dateid').val(dtinfo);
            $('#test1').html(normaldesc);
            $('#test').html(htmldata);
            $('#RFormula').html(htmlformla);
            $('#test2').html(steeldesc);
            $('#test3').html(strhtmlsteel);

            console.log("In Ajaxxxxxxxxxxxxx....");
            var recentryno = response.FinalRecordEntryNo;
            var RecordData = response.dData1;
           // console.log(RecordData);
            var itemids = response.bitemsid;
        //console.log(itemids);

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

<div id="containerItemNormalHtml"></div>
<div id="containerItemSteelHtml"></div>
    <div id="NItem">
        <div id="NItemContainer"></div>
    </div>
    <div id="SItem">
        <div id="SItemContainer"></div>
    </div>
    <script>
                $(document).ready(function() {
                // Hide elements on page load
                $('#itemnm').hide();
                $('#totalqty').hide();
                $('#unit').hide();
                $('#itemnm1').hide();
                $('#totalqty1').hide();
                $('#unit1').hide();

                // Handle the change event for the dropdown
                $('#DivDropdown').change(function() {
                    // Show elements when the dropdown value changes
                    $('#itemnm').show();
                    $('#totalqty').show();
                    $('#unit').show();
                    $('#itemnm1').show();
                    $('#totalqty1').show();
                    $('#unit1').show();

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
                        var itemd =response.TndData;
                        //console.log(itemd);
                        // Set values to UI elements
                        $('#itemnm').val(itemd.exs_nm);
                        $('#totalqty').val(itemd.tnd_qty);
                        $('#unit').val(itemd.item_unit);



                        var normaldata = response.Item1Data;
                        console.log(normaldata);
                        var recentryno= response.FinalRecordEntryNo;
                        ItemNormalHTMLheading='';
                        ItemNormalHTML='';
                        $('#containerItemNormalHtml').hide()
                        $('#containerItemSteelHtml').hide();
                        if (Array.isArray(normaldata) && normaldata.length > 0 ) {
                             console.log("Normal data found...");
                        ItemNormalHTMLheading +=`
                        <div class="container1" id="NItemContainer" style="border: none;">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th style="width: 5%; border-color:black;">Sr. No</th>
                                            <th style="width: 44%; border-color:black;">Particulars</th>
                                            <th style="width: 8%; border-color:black;">Number</th>
                                            <th style="width: 7%; border-color:black;">Length</th>
                                            <th style="width: 7%; border-color:black;">Breadth</th>
                                            <th style="width: 7%; border-color:black">Height</th>
                                            <th style="width: 7%; border-color:black;">Quantity</th>
                                            <th style="width: 7%; border-color:black;">Record Entry Number</th>
                                            <th style="width: 7%; border-color:black;">Date</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>`;
                    }
                    $('#itemheading').html(ItemNormalHTMLheading);
                        //console.log(recentryno);
                        if(response.stldata)
                            {
                                $('#containerItemSteelHtml').show();
                                ItemNormalHTML='';
                                //console.log("Ok...In if condition...")
                                var steeldata = response.stldata;
                                //console.log(steeldata);

                                //container.empty();
                                var ItemSteelHTML = '';
                                //console.log('Okkkkkkk before Loop.........')

                                let ldiamColumns = ['ldiam6', 'ldiam8', 'ldiam10', 'ldiam12', 'ldiam16', 'ldiam20', 'ldiam25', 'ldiam28', 'ldiam32', 'ldiam36', 'ldiam40', 'ldiam45'];

                                steeldata.forEach(data => {
                                    if (typeof data === 'object') {
                                        for (let i = 0; i < ldiamColumns.length; i++) {
                                        let ldiamColumn = ldiamColumns[i];
                                        if (data.hasOwnProperty(ldiamColumn) && data[ldiamColumn] !== null && data[ldiamColumn] !== data['bar_length']) {

                                            let temp = data[ldiamColumn];
                                            data[ldiamColumn] = data['bar_length'];
                                            data['bar_length'] = temp;
                                            // console.log(data['bar_length'], data[ldiamColumn]);
                                            break; // Stop checking other ldiam columns if we found a match
                                        }
                                        }
                                    }
                                });
                                steeldata.forEach(function(itemstl,index){

                                    const originalDate = new Date(itemstl.date_meas);
                                    const formattedDate = originalDate.toLocaleDateString('en-GB'); // "16-08-2023"

                                    // You can then display formattedDate on your UI
                                     //console.log(formattedDate); // "16-08-2023"
                                     const properties = ['ldiam6', 'ldiam8', 'ldiam10', 'ldiam12', 'ldiam16', 'ldiam20', 'ldiam25', 'ldiam28', 'ldiam32', 'ldiam36', 'ldiam40'];

                                    // Loop through each property and replace missing values with an empty string
                                    properties.forEach(property => {
                                        if (!itemstl.hasOwnProperty(property) || itemstl[property] === null || itemstl[property] === undefined) {
                                            itemstl[property] = ''; // Set as an empty string if the property is missing or null
                                        }
                                    });

                                    containerItemNormalHtml='';
                                    // ItemSteelHTML='';
                                    ItemSteelHTML += `
                                        <div class="container1" id="NItemContainer" style="border: none;">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: lightgray;">
                                                            <th style="width: 5%;">Sr No:</th>
                                                            <td style="width: 5%;">${itemstl.bar_sr_no}</td>
                                                            <th style="width: 10%;">RCC Member:</th>
                                                            <td style="width: 20%;">${itemstl.rcc_member}</td>
                                                            <th style="width: 15%;">Member Particular:</th>
                                                            <td style="width: 20%;">${itemstl.member_particulars}</td>
                                                            <th style="width: 15%;">No Of Members:</th>
                                                            <td style="width: 20%;">${itemstl.no_of_members}</td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="container1" id="NItemContainer" style="border: none;">
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Bar Particulars</th>
                                            <th>No of Bars</th>
                                            <th>Length of Bars</th>
                                            <th>6mm</th>
                                            <th>8mm</th>
                                            <th>10mm</th>
                                            <th>12mm</th>
                                            <th>16mm</th>
                                            <th>20mm</th>
                                            <th>25mm</th>
                                            <th>28mm</th>
                                            <th>32mm</th>
                                            <th>36mm</th>
                                            <th>40mm</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>${itemstl.bar_sr_no}</td>
                                            <td>${itemstl.bar_particulars}</td>
                                            <td>${itemstl.no_of_bars}</td>
                                            <td>${itemstl.bar_length}</td>
                                            <td>${itemstl.ldiam6}</td>
                                            <td>${itemstl.ldiam8}</td>
                                            <td>${itemstl.ldiam10}</td>
                                            <td>${itemstl.ldiam12}</td>
                                            <td>${itemstl.ldiam16}</td>
                                            <td>${itemstl.ldiam20}</td>
                                            <td>${itemstl.ldiam25}</td>
                                            <td>${itemstl.ldiam28}</td>
                                            <td>${itemstl.ldiam32}</td>
                                            <td>${itemstl.ldiam36}</td>
                                            <td>${itemstl.ldiam40}</td>
                                            <td>${formattedDate}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        `;
                                });
                                var containers = $('#SItemContainer');
                                    $('#containerItemSteelHtml').html(ItemSteelHTML);

                            }

                                else{
                                    var normaldata = response.Item1Data;
                                    //console.log(normaldata.breadth);
                                    var recentryno= response.FinalRecordEntryNo;
                                    //console.log(normaldata);
                                    var container = $('#NItemContainer');
                                    var ItemNormalHTMLheading = '';
                                    var  ItemNormalHTML = '';
                                    var ItemSteelHTML='';
                                    var containers='';
                                    normaldata.forEach(function (item, index) {
                                        var ItemSteelHTML='';
                                            const originalDate = new Date(item.measurment_dt);
                                            const formattedDate = originalDate.toLocaleDateString('en-GB'); // Format the date
                                            //console.log(" Sr no:", item.sr_no);
                                           // console.log(item)
                                            // Initialize formulaimtem and set it as an empty string if it's null
                                            var formulaimtem = item.formula;

                                            // Assuming you want to update the content of the container with the generated HTML
                                            $('#containerItemNormalHtml').show();
                                            $('#containerItemSteelHtml').hide();
                                            $('#ItemSteelHTML').hide();

                                            // Assuming ItemNormalHTML is declared somewhere before this code
                                            if (item.formula == null) {
                                            console.log("Okkkkkkkkkkkkkkk in If");
                                            // Show these columns if formulaimtem is not present
                                            ItemNormalHTML += `
                                            <div class="container1" id="NItemContainer" style="border: black;">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped border-right: 1px solid black">
                                                        <tr>
                                                            <td style="width: 5%; border-color:black;">${item.sr_no}</td>
                                                            <td style="width: 45%;  border-color:black;">${item.parti}</td>
                                                            <td style="width: 9%;  border-color:black;">${item.number}</td>
                                                            <td style="width: 7%;  border-color:black;">${item.length}</td>
                                                            <td style="width: 7%;  border-color:black;">${item.breadth}</td>
                                                            <td style="width: 7%;  border-color:black;">${item.height}</td>
                                                            <td style="width: 7%;  border-color:black;">${item.qty}</td>
                                                            <td style="width: 7%;  border-color:black;">${recentryno}</td>
                                                            <td style="width: 7%;  border-color:black;">${formattedDate}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>`;
                                        }
                                        else {
                                            console.log("Ok in Else");
                                            // Hide columns if formulaimtem has a value
                                            ItemNormalHTML += `
                                            <div class="container1" id="NItemContainer">
                                                <div class="table-responsive ">
                                                    <table class="table table-bordered" style="background-color:pink">
                                                        <tr>
                                                            <td style="width: 5%;  border-color:black;">${item.sr_no}</td>
                                                            <td style="width: 45%;  border-color:black;">${item.parti}</td>
                                                            <td style="width: 29%; text-align: center;  border-color:black;">${formulaimtem}</td>
                                                            <td style="width: 7%;  border-color:black;">${item.qty}</td>
                                                            <td style="width: 7%;  border-color:black;">${recentryno}</td>
                                                            <td style="width: 7%;  border-color:black;">${formattedDate}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>`;

                                        }
                                        // Update the UI by injecting the generated HTML into the container
                                        });
                                        $('#containerItemNormalHtml').html(ItemNormalHTML);
                                        //console.log(ItemNormalHTML);
                                }
                            },
                    error: function(xhr, status, error) {
                        console.log("Error is raised....:", error);
                        alert('An error occurred while fetching data. Please check the console for details.');
                    }
                });
            });
        });
    </script>





    {{-- <script>
        //  function runCustomScript() {
            document.addEventListener("DOMContentLoaded", function() {
                var flag = {{ $flag ?? 1 }};
            console.log(flag);
            console.log("Okkkkkkkkkkkkkkkkkk Rec idsss");



            document.getElementById("Check1Submit").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default behavior of the link

            // Extract values from the form fields using name attributes
            var workId = document.querySelector("input[name='workid']").value;
            var billDate = document.querySelector("input[name='billdatenm']").value;
             var tbillid = document.querySelector("input[name='tbillidv']").value;

             console.log(workId,billDate,tbillid);
            console.log("Okkkkkkkkkkkkkkkkkk");
            // Construct the URL with the extracted values
            var url = "{{ url('DeputyCheck') }}";
            url += "?workId=" + encodeURIComponent(workId);
            url += "&tbillid=" + encodeURIComponent(tbillid);
            url += "&billDate=" + encodeURIComponent(billDate);

            // console.log(url);
            // Redirect to the controller with query parameters
            window.location.href = url;
              });
        });
        // Wait for the document to be ready
        $(document).ready(function() {
            // Directly submit the form when the document is ready
            var flag = {{ $flag ?? 0 }};
            console.log(flag);
            if(flag==1){
            // Extract values from the form fields using name attributes
            var workId = document.querySelector("input[name='workid']").value;
            var billDate = document.querySelector("input[name='billdatenm']").value;
             var tbillid = document.querySelector("input[name='tbillidv']").value;

             console.log(workId,billDate,tbillid);
            console.log("Okkkkkkkkkkkkkkkkkk");
            // Construct the URL with the extracted values
            var url = "{{ url('DeputyCheck') }}";
            url += "?workId=" + encodeURIComponent(workId);
            url += "&tbillid=" + encodeURIComponent(tbillid);
            url += "&billDate=" + encodeURIComponent(billDate);
            // console.log(url);
            // Redirect to the controller with query parameters
            window.location.href = url;
            }

        });

    </script> --}}

    <div class="d-flex justify-content-center align-items-center">
        <form method="post" action="{{ url('DeputyCheck') }}" id="Check1Submitform">
            @csrf
            <input type="hidden" name="itemid" id="itemid" value="{{ $itemid }}">
            <input type="hidden" name="tbillidv" id="tbillid" value="{{ $tbillid }}">
            <input type="hidden" name="WorkId" id="WorkId" value="{{ $workDetails->Work_Id }}">
            <input type="hidden" name="billdatenm" id="billdateid" value="{{ $billDate }}">
            {{-- @if(isset($recnovalues))
                <input type="text" name="recnovalues" id="recnovalues" value="{{ $recnovalues }}">
            @endif --}}



            <div class="container mt-1" style="border: none;">
                <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-info btn-sm submitBtn_cls">Submit</button>
                </div>
            </div>
        </form>
        <br>
        <br>
        <br>
        <br>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var flag = {{ $flag ?? 1 }};
            console.log(flag);

            console.log("Okkkkkkkkkkkkkkkkkk Rec idsss");
        //     if(recnovalues){
        //          console.log(recnovalues);
        //  }

            document.querySelector(".submitBtn_cls").addEventListener("click", function(event) {
                // Your event handling code here
                // For now, let's just submit the form
                document.getElementById("Check1Submitform").submit();
            });
        });

        // //Wait for the document to be ready
        $(document).ready(function() {
            // Directly submit the form when the document is ready

            var flag = {{ $flag ?? 0 }};
                console.log(flag);


                if(flag==1){
                    document.getElementById("Check1Submitform").submit();
                }
        });
    </script>



@endsection
















