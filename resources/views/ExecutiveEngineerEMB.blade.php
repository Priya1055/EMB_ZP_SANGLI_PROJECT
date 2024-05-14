@extends('layouts.header')
@section('content')


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
    padding: 0px;
    margin-bottom: 20px;
    margin-left:1%;
    margin-right:3%;
}

.container1 {
    padding: 0px;
    margin: 0px;
}

.custom-button {
    margin-top: 10px; /* Adjust the margin as needed to align the button */
    background: #04AA6D;
    color: white;
    margin-bottom: 10px;
}
.btn{
    margin-top: 20px;
    margin-bottom: 10px;
}

 /* Increase font weight of labels */
.form-group label {
      font-weight: bold;
}

.bg-custom {
  background-color: #e3f2fd;
}

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
        /* padding: 0px; */
}

.custom-checkbox {
    border: 1px solid rgb(136, 135, 135); /* Add your desired border style */
    width: 20px; /* Adjust width as needed */
    height: 20px; /* Adjust height as needed */
    padding: 10px; /* Adjust padding as needed */
}


.je-checkbox {
    width: 20px; /* Adjust width as needed */
    height: 20px; /* Adjust height as needed */
    padding: 10px; /* Adjust padding as needed */
    background-color: rgb(42, 192, 42); /* Set the background color for the checked state */
    border-color: green;
}

.table3 {
border: 1px solid rgb(9, 9, 9);
text-align: center;
margin: 0;
padding: 0px;
}

.table1{
    border: 1px solid #555;
    margin:0px;
    background-color:rgb(185, 251, 228);
    padding: 0px;
}

.table2{
    border: 1px solid #555;
    margin:0px;
    background-color:rgb(240, 206, 224);
    padding: 0px;
}
/* Progress bar css */
.progress-container {
    /* position: fixed; */
    width: 100%;
    background-color: #fbf5f5;
    border: 1px solid #f8f5f5;
    border-radius: 90px;
    margin-top: 20px;
}

.progress-bar {
    height: 25px;
    background-color: #4CAF50;
    text-align: center;
    line-height: 30px;
    color: white;
    border-radius: 90px;
    width:800px;
}

.red-bar {
    background-color: #e12626; /* Red color */
}

.green-bar {
    /* width: 100%; */
    background-color: green;
}
.statement{
        margin-left:60%;
    }
</style>
<ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
    <li><a href="{{ url('billlist', $workDetails1->Work_Id ?? '') }}">Bill</a></li>
    <li><a href="{{ url('emb', $tbillid ?? '') }}">EMB</a></li>
    <li><a href="javascript:void(0)">Executive Engineer</a></li>
</ul>

<a href="{{ url('emb', $tbillid ?? '')}}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a> 


<!-- {{-- Common part --}} -->
@include('sweetalert::alert')
<form action="{{url('ExecutiveEngineerEMBSave')}}" id="saveForm" method="post">
@csrf
<div class="container1" style="padding-top: 100px;" >
<div class="row">
    <div class="col-lg-12">
      <div class="form-group form-row align-items-center">
            <label for="division" class="col-md-2">Division:</label>
            <div class="col-md-4">
              <input type="text" class="form-control" id="Div" name="Div "value="{{$divName1 ?? ''}}"disabled>
            </div>
            <label for="subdivision" class="col-md-2">Sub Division:</label>
           <div class="col-md-4">
             <input type="text" name="Sub_Div" class="form-control" id="Sub_Div" disabled
             value="{{$workDetails1->Sub_Div ?? '' }}">
            </div>
          </div>
          <div class="form-group form-row align-items-center mt-4">
              <label for="name" class="col-md-2">Work Id:</label>
              <div class="col-md-4">
                <input type="text" name="workid" class="form-control" id="workid"   value="{{$workDetails1->Work_Id  ?? ''}}"  disabled>
              </div>
              <label for="fundhead" class="col-md-2">Fund Head:</label>
              <div class="col-md-4">
                   <input type="text" class="form-control" id="fundhead" name="Fund_Hd"  value="{{$fund_Hd1->Fund_HD_M ?? '' }}" disabled>
           </div>
            </div>
        </div>
    </div>
          <div class="form-group form-row align-items-center">
            <label for="division" class="col-md-2">Name Of Work:</label>
            <div class="col-md-10">
                <textarea name="Work_Nm" id="Work_Nm" style="width: 100%;" disabled>
                    {{$workDetails1->Work_Nm ?? ''}}
                </textarea>
            </div>
            </div>
            <div class="form-group form-row align-items-center">
  <label for="division" class="col-md-2">Work Order No:</label>
  <div class="col-md-4">
      <input type="text" class="form-control"name="WO_No"  id="WO_No" value="{{$workDetails1->WO_No  ?? ''}}" disabled>
  </div>
  <label for="nameofwork" class="col-md-2">Date:</label>
          <div class="col-md-4">
              <input type="text" class="form-control" id="dateInput" name="dateInput" value="{{$workDetails1->Wo_Dt ?? ''}}" disabled>
          </div>
</div>
  <div class="form-group form-row align-items-center">
      <label for="subdision" class="col-md-2">Period :</label>
  <div class="col-md-4">
      <input type="text" name="Period" class="form-control" id="Period" disabled value="{{$workDetails1->Period ?? '' }}">
  </div>
  <label for="subdivision" class="col-md-2">Stipulated Date Of Complition:</label>
  <div class="col-md-4">
      <input type="text" name="Subiv" class="form-control" id="Subv" disabled value="{{$workDetails1->Stip_Comp_Dt ?? '' }}">
  </div></div>
<div class="form-group form-row align-items-center">
  <label for="agency" class="col-md-2">Agency:</label>
   <div class="col-md-4">
    <input type="text" name="Agency_Nm" class="form-control" id="Agency_Nm" disabled
    value="{{ $workDetails1->Agency_Nm ?? ''}}">
   </div>
  <label for="sectionengineer" class="col-md-2">Engineer Incharge:</label>
  <div class="col-md-4">
    <input type="text" class="form-control" id="sectionengineer" name="name"
    value="{{ isset($DBSectionEngNames[0]) ? $DBSectionEngNames[0] : '' }}" disabled>
  </div>
    </div>
</div>
</div>
<!-- {{-- Progress Bar --}}-->
<label><b>EE checked Percentage</label></b>
<input type="text" id="percentageTextBox" name="percentageTextBox" disabled style="font-weight: bold;">
<input type="text" name="AmountTextBox" id="AmountTextBox" disabled style="font-weight: bold;">


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
        <div class="tab-pane fade show active" id="Recordentrywise" role="tabpanel" aria-labelledby="Recordentrywise-tab" style="border:none;">
                <table class="table" style="border:none;">
                    <tr>
                        <th style="width: 10%; padding-left:5px;">Record Entry No:</th>
                        <td style="width: 10%; padding-left:5px;">
                            <select id="Check1RecDropdown" name="recnovalues" >
                                <option value="">Select Record Entry No</option>
                                @foreach ($Recordeno as $recno)
                                    <option value="{{ $recno->Record_Entry_No }}" {{ $recnovalues == $recno->Record_Entry_No ? 'selected' : '' }}>
                                        {{ $recno->Record_Entry_No }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <th id="recnochngdtid" style="width: 10%; padding-left:5px;">Date:</th>
                        <td id="recnochngdt1id" style="width: 10%; padding-left:5px;">
                            <input type="text" class="form-control" id="dateid" value="" name="RecdateInput" disabled>
                        </td>

                        <!--<th id="reccheckid" style="width: 10%; padding-left:5px;"> Check:</th>-->
                        <td style="width: 10%; padding-left:5px;">
                            <input class="RecWCheck form-check-input CheckedSelectAllCls CheckedSelectAll form-check custom-checkbox" type="hidden" id="selectAllCheckboxRS" name="je_check_Steel_Heading[' . $recno->Record_Entry_No . ']" onclick="sellectAllCheckBoxS('.$SIheadcnt.');CheckIndicator(0, 'measid');">
                        </td>

                    </tr>
                </table>

                    <div id="test1"></div>
                    <div id="RecHeading"></div>
                    <div id="test"></div>
                    <div id="test2"></div>
                    <div id="test3"></div>
        </div>

<!-- {{-- Itemwise commonpart --}} -->
   <div class="tab-pane" id="Itemwise1" role="tabpanel" aria-labelledby="Itemwise-tab">
        <div class="container1" id="ItemwiseContainer">
            <table class="table table-responsive">
                <div class="col-lg-12">
                    <div class="row">
                                <table  class="table table-responsive" >
                                    <tr>
                                        <th style="width: 20%;">Item No:</th>
                                        <th style="width: 1%;" id="itemnm1">Item:</th>
                                        <th style="width: 1%;" id="totalqty1">Total Qty:</th>
                                        <th style="width: 1%;" id="unit1">Unit:</th>

                                    </tr>
                                    <tr>
                                        <td style="width: 10%;" >
                                            <select id="DivDropdown" name="titemnovalues" class="form-control" style="width: 100%;">
                                                <option value="">Select Item No</option> <!-- Initial "Select Item No" option -->
                                                @foreach ($titemno as $itemnov)
                                                    <option class="form-control" value="{{ $itemnov->combined_value }}" class="form-control">
                                                        {{ $itemnov->combined_value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                       <td style="width: 60%;">
                                            <textarea style="width: 100%;" class="form-control" rows="3" id="itemnm" name="itemnamem" disabled></textarea>
                                        </td>
                                        <td style="width: 10%;">
                                            <input style="width: 100%;" class="form-control" id="totalqty" name="totalquty" disabled>
                                        </td>
                                        <td style="width: 10%;">
                                            <input style="width: 100%;" class="form-control" id="unit" name="unit1" disabled>
                                        </td>

                                        <td style="width: 5%; padding-left: 30px;" id="checkboxdt">
                                            <input type="date" class="form-control"  name="dateInput"  id="defaultDate" onchange="IDropdownChangeDt();">
                                        </td>
                                    </tr>
                                </table>
                                <div id="Itemhtml"></div>
                                <div id="containerItemNormalHtml"></div>
                                <div id="containerItemSteelHtml"></div>
                                <div id="containerItemNormalHtml"></div>
                                <div id="containerItemSteelHtml"></div>
                                <div id="containerSummary"></div>


                                   <div id="NItem">
                                       <div id="NItemContainer"></div>
                                   </div>
                                   <div id="SItem">
                                       <div id="SItemContainer"></div>
                                   </div>
                    </div>
                </div>
            </div>

    </div>
</div>

 <!-- {{--HIDDEN VALUES ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}} -->
<input type="hidden" name="tbillid" id="tbillid" value="{{ $tbillid }}">
<input type="hidden" name="workid" id="workid" value="{{ $workDetails1->Work_Id  }}">
 <input type="hidden" name="billDate" id="billDate" value="{{$billDate}}">

@if(isset($recnovalues))
    <input type="hidden" name="recnovaluesave" id="recnovaluesave" value="{{ $recnovalues }}">
@endif

<!--
{{-- <input type="text" name="workid" id="workid" value="{{ $subloop->meas_id  }}"> --}} -->

<div class="d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-info btn-sm " value="save" style="background-color: rgb(188, 136, 33); border-color: rgb(188, 136, 33)" name="btnsave">Save</button>
        <!-- <button type="button" id="SubmitBtn" class="btn btn-info btn-sm" value="all" id="submitBtn" style="margin-left: 10px; background-color:rgb(188, 136, 33); border-color:rgb(188, 136, 33)" name="btnall" onclick="submitForm()">Submit</button> -->
        <button type="submit" id="SubmitBtn" class="btn btn-info btn-sm" value="all" id="submitBtn" style="margin-left: 10px; background-color:rgb(188, 136, 33); border-color:rgb(188, 136, 33)" name="btnall">Submit</button>

        <button type="submit" class="btn btn-info btn-sm" value="revert" id="Revert" style="margin-left: 10px; background-color:rgb(188, 136, 33); border-color:rgb(188, 136, 33)" name="BtnRevert">Revert</button>

    </div>
</div>
</form>
<br>
<br>
<br>

 <!-- {{-- Ajax-RecordentryWise  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}} -->
<script>
    function CustomeDtSFun(element, steelId) {
        console.log("In Date function....");
        console.log(element);
        // Accessing the selected date value for the specific input
        var customDtS = element.value;

        // Accessing all elements with the class 'customDt'
        var customDtInputs = document.querySelectorAll('.customDt');

        // Loop through each input to get its value
            customDtInputs.forEach(function(input) {
                console.log(input.value);
            });
    }

    function CustomeDtFunN(element, measid){
        // Accessing the selected date value for the specific input
        console.log("In Normal Date function...")
        var customDtns = element.value;
        console.log(customDtns);

        // Accessing all elements with the class 'customDt'
        var customDtInputN = document.querySelectorAll('.customDtEmb');
        // console.log(customDtInputN )
        // Loop through each input to get its value
            customDtInputN.forEach(function(input) {
            console.log(input.value);
        });
    }

        //Recordentry Steel Checkbox selection Deselection....
    function sellectAllCheckBoxS(measdatacount) {
        // Get the "Select All" checkbox
        var selectAllCheckboxS = document.getElementById("selectAllCheckboxRS");
        console.log("selectAllCheckboxS", selectAllCheckboxS);
        var steelid=steelid;
        console.log("steelid",steelid)
        var customCkeckboxS = document.getElementById("RselectAllS");
        var measdatacount = measdatacount;
        // console.log(measdatacount);
        // console.log("Checkbox() called...");

        if (selectAllCheckboxS.checked == true ) {
        // Get all checkboxes with class 'checkbox'
        // console.log("Checking All Checkboxes")
        var checkboxesS = document.querySelectorAll('.checkboxS');
        checkboxesS.forEach(function (checkboxS) {
            checkboxS.checked = true;
        });
        }
        else {
        // If selectAllCheckboxS is explicitly unchecked, uncheck all checkboxes
        var checkboxesS = document.querySelectorAll('.checkboxS');
            checkboxesS.forEach(function (checkboxS) {
                checkboxS.checked = false;
            });
        }
    }
    // ReverseCheck Steel Recoedentry  wise.
     function CustomeCheckBoxSFun(measdatacount){
          var steelid=steelid;
        console.log("steelid is ",steelid)
        var checkboxesS = document.querySelectorAll('.checkboxS');

        var checkedCount = 0;
        checkboxesS.forEach(function (checkbox) {
            if (checkbox.checked) {
                checkedCount++;
            }
        });
         console.log("checkedCount",checkedCount);

        // Get heading steel checkboxes with class 'SteelHcheckbox'
        var SteelHcheckboxes = document.querySelectorAll('.SteelHcheckbox');
        console.log("measdatacount", measdatacount);
        // console.log("normaldatacount", normaldatacount);
        if (checkedCount === measdatacount ) {
            console.log("Counts are equal....");
            var selectAllCheckboxRS = document.getElementById("selectAllCheckboxRS");
            selectAllCheckboxRS.checked = true;
        }
        else{
            var selectAllCheckboxRS = document.getElementById("selectAllCheckboxRS");
            selectAllCheckboxRS.checked = false;
        }
    }

    // Steel data Checked Date......
    function RDropdownChangeDtS(recnovaluesave){
            var SelectDtAllS = document.getElementById("defaultDateS").value;
            //console.log("SelectDtAll:",SelectDtAll);
            if(SelectDtAllS !=''){
                // console.log("SelectDtAll:",SelectDtAll);
            }
            console.log("Record Entry Dropdown selection changed.....");
            $('#recnochngdt').show();
            $('#recnochngdt1').show();
            $('#reccheck').show();
            $('#reccheckdt').show();
            $('#reccheck1').show();
            $('#reccheckdt1').show();
            // Get the selected value from the dropdown
            // Call the function and store the result in a variable
            if(recnovaluesave){
                var Record_Entry_Nor = recnovaluesave;
            }else{
                var Record_Entry_Nor = $('#Check1RecDropdown').val();
            }
            console.log(Record_Entry_Nor);

            var workid_valuer = $('#workid').val();
            console.log(workid_valuer);

            var tbillid_valuer = $('#tbillid').val();
            console.log(tbillid_valuer);

            consolelog=$('#selectAllCheckboxS').val();
            // console.log("consolelog",consolelog)

            var billDate = $('#billDate').val();

            $.ajax({
                type: "POST",
                url: "ExecutiveEngineerEMB1",
                data: {
                    Record_Entry_Nor: Record_Entry_Nor,
                    // itemid_valuer: itemid_valuer,
                    tbillid_valuer: tbillid_valuer,
                    workid_valuer: workid_valuer,
                    SelectDtAllS:SelectDtAllS,
                    billDate:billDate
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                var CheckedSelectAll=response.CheckedSelectAll;

                var dtinfo = response.RecDate;
                    // console.log(response);
                var htmldata=response.html;
                if(htmldata){
                    console.log(htmldata)
                    $('#test').html(htmldata);
                }

                var htmlformla=response.strhtmlformula;
                //console.log(htmlformla);

                var strhtmlsteel=response.strhtmlsteel;

                var normaldesc=response.normaldesc;
                //console.log(normaldesc);
                var SteelSummary=response.SteelSummary;
                // console.log(SteelSummary)

                var SteelSummary=response.SteelSummary;
                // console.log(SteelSummary);

                var steeldesc=response.steeldesc;

                var steelid=response.steelid;

                var RecordNormalHTMLheading="";

                $('#RecHeading').html(RecordNormalHTMLheading);
                $('#dateid').val(dtinfo);

                $('#CheckedSelectAll').val(CheckedSelectAll);
                $('#test1').html(normaldesc);

                $('#RFormula').html(htmlformla);
                $('#test2').html(steeldesc);
                $('#test3').html(strhtmlsteel);

            // console.log("measCountNormal count",measCountNormal);






                var recentryno = response.FinalRecordEntryNo;
                var RecordData = response.dData1;
                // console.log(RecordData);
                var itemids = response.bitemsid;


            },
            error: function (xhr, status, error) {

            }
                });
    }
    $(document).ready(function() {
        //console.log("Hiiiiiiiii in ready function");
        $('#recnochngdt').hide();
        $('#recnochngdt1').hide();
        $('#reccheck').hide();
        $('#reccheckdt').hide();
        $('#reccheck1').hide();
        $('#reccheckdt1').hide();
        var recnovaluesave = $('#recnovaluesave').val();

        if(recnovaluesave){
            RDropdownChangeDt(recnovaluesave);
        }
        else{
            RDropdownChangeDt(null);
        }

        if (CheckedSelectAll === 1) {
                            console.log("Printing Checked..................")
                            // Do something if the condition is true
                            $("#CheckedSelectAllCls").prop("checked", true);
                        } else {
                            // Do something else if the condition is false
                            $("#CheckedSelectAllCls").prop("checked", false);
                        }


    });

    //Normal Data------------____________----------------________________------------------________-------------____________
    function RDropdownChangeDt(recnovaluesave){
        var SelectDtAll = document.getElementById("defaultDate").value;
        //console.log("SelectDtAll:",SelectDtAll);
        if(SelectDtAll !=''){
            // console.log("SelectDtAll:",SelectDtAll);
        }
        console.log("Record Entry Dropdown selection changed.....");
        $('#recnochngdt').show();
        $('#recnochngdt1').show();
        $('#reccheck').show();
        $('#reccheckdt').show();
        $('#reccheck1').show();
        $('#reccheckdt1').show();
        // Get the selected value from the dropdown
        if(recnovaluesave){
            var Record_Entry_Nor = recnovaluesave;
        }else{
            var Record_Entry_Nor = $('#Check1RecDropdown').val();
        }
        var workid_valuer = $('#workid').val();
        console.log(workid_valuer);

        var tbillid_valuer = $('#tbillid').val();
        console.log(tbillid_valuer);

        var billDate = $('#billDate').val();

        $.ajax({
            type: "POST",
            url: "ExecutiveEngineerEMB1",
            data: {
                Record_Entry_Nor: Record_Entry_Nor,
                // itemid_valuer: itemid_valuer,
                tbillid_valuer: tbillid_valuer,
                workid_valuer: workid_valuer,
                SelectDtAll:SelectDtAll,
                billDate:billDate
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                var htmldata=response.html;
                if(htmldata){
                    // console.log(htmldata)
                    $('#test').html(htmldata);
                }
            console.log(response)
            var CheckedSelectAll=response.CheckedSelectAll;
            console.log("CheckedSelectAll",CheckedSelectAll);
            var dtinfo = response.RecDate;
            var steelid=response.steelid;
            console.log("steelid",steelid)
            var countcombinarrayNormal=response.countcombinarray;
            console.log("countcombinarrayNormal count",countcombinarrayNormal);
            var recordmscheckeddata=response.recordmscheckeddata;
            var Count_Chked_Emb_Stl=response.Count_Chked_Emb_Stl;
             console.log(Count_Chked_Emb_Stl)
            console.log(Count_Chked_Emb_Stl);
            var measdatacount=response.measdatacount;
            console.log("OK Ok Ok Ok Ok")
            console.log(Count_Chked_Emb_Stl,measdatacount);
            if (Count_Chked_Emb_Stl === measdatacount ) {
            console.log("Counts are equal....");
            var selectAllCheckboxRS = document.getElementById("selectAllCheckboxRS");
            selectAllCheckboxRS.checked = true;
        }
        else{
            var selectAllCheckboxRS = document.getElementById("selectAllCheckboxRS");
            selectAllCheckboxRS.checked = false;
        }


            var htmlformla=response.strhtmlformula;
            //console.log(htmlformla);

            var strhtmlsteel=response.strhtmlsteel;

            var normaldesc=response.normaldesc;
            //console.log(normaldesc);
            var SteelSummary=response.SteelSummary;
            console.log(SteelSummary)
            var steeldesc=response.steeldesc;
            var RecordNormalHTMLheading="";

        $('#RecHeading').html(RecordNormalHTMLheading);
        $('#dateid').val(dtinfo);
        $('#recordmscheckeddata').val(recordmscheckeddata);
        $('#test1').html(normaldesc);

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

                }
            });

    }

    $('#Check1RecDropdown').change(function() {
            console.log("RDropdownChangeDt Changed");
            RDropdownChangeDt();
            sellectAllCheckBoxRecord();
            if (checkedCount === measdatacount ) {
            console.log("Counts are equal....");
            var selectAllCheckboxRS = document.getElementById("selectAllCheckboxRS");
            selectAllCheckboxRS.checked = true;
        }
        else{
            var selectAllCheckboxRS = document.getElementById("selectAllCheckboxRS");
            selectAllCheckboxRS.checked = false;
        }

    });

</script>



 <!-- {{-- ItemWise Ajax=================================================================================================== --}} -->
<script>
    function DropdownChange(){
        var CheckedDtDefault = document.getElementById("defaultDate").value;
        if(CheckedDtDefault !=''){
            console.log("CheckedDtDefault:",CheckedDtDefault);
        }
            $('#itemnm').show();
            $('#totalqty').show();
            $('#unit').show();
            $('#itemnm1').show();
            $('#totalqty1').show();
            $('#unit1').show();
            $('#checkb1').show();
            $('#checkdt').show();
            $('#checkbox').show();
            $('#checkboxdt').hide();
            $('#defaultDate').hide();
            $('#checkb1').hide();
            $('#checkdt').hide();
            console.log("Dropdown selection changed.....");
            // Get the selected value from the dropdown
            var combined_value = $('#DivDropdown').val();
            console.log(combined_value)
            var workid_value = $('#workid').val();
            var itemid_value = $('#itemid').val();
            var tbillid_value = $('#tbillid').val();

            // Perform an AJAX request to fetch data based on the selected Record Entry No
            $.ajax({
                type: "POST",
                url: "ExecutiveEngineerEMB2",
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
                    let sizeofnormdata="";
                    var itemd =response.TndData;

                    // var titemno=response.titemno;

                    // Set values to UI elements
                    $('#itemnm').val(itemd.exs_nm);
                    $('#totalqty').val(itemd.tnd_qty);
                    $('#unit').val(itemd.item_unit);
                    $('#defaultDateS').val(response.dyedate);
                    // console.log("display date")
                    // console.log(defaultDateS)
                    // console.log(response.dyedate)
                    commondyeItemwise(response);

                        },
                error: function(xhr, status, error) {
                }

     });

    }
                    $(document).ready(function() {
                        $('#itemnm').hide();
                        $('#totalqty').hide();
                        $('#unit').hide();
                        $('#itemnm1').hide();
                        $('#totalqty1').hide();
                        $('#unit1').hide();
                        $('#recnochngdt').hide();
                        $('#recnochngdt1').hide();
                        $('#containerItemNormalHtml').hide();
                        $('#containerItemSteelHtml').hide();
                        $('#ItemSteelHTML').hide();
                        $('#checkb1').hide();
                        $('#checkdt').hide();
                        $('#checkbox').hide();
                        // $('#defaultDate').hide();
                        DropdownChange();

                        $('#DivDropdown').change(function() {
                            DropdownChange();

                });
            });

   function commondyeItemwise(response)
    {
        console.log(response);
        var itemdata= response.titemno;
        // console.log("itemdata",itemdata.cur_qty);

        var ItemSteeSummaryhtml='';
        var Itemhtml= response.html;
        if(Itemhtml){
            $('#Itemhtml').html(Itemhtml);
            $('#Itemhtml').show();
            $('#ItemNormalHTML').hide();
            $('#containerItemNormalHtml').hide();
            var normaldata = response.Item1Data;
            // console.log(response);


            var SteelSummar=response.titemno;
            console.log("SteelSummar",SteelSummar);
            var SteelSummary=response.titemno[0];
           console.log("SteelSummary",SteelSummary)
             $('#ItemNormalHTML').hide();
        }
       else{

            $('#ItemNormalHTML').show();
            $('#Itemhtml').hide();
            //console.log(normaldata.breadth);

            // console.log(response.Item1Data)
            var normaldata = response.Item1Data;
            // console.log(normaldata);

            var meas_idss = normaldata.meas_id;

            var ItemNormalHTML = '';

            if(normaldata.length>0){
            ItemNormalHTML += '<table class="table table-bordered table-striped" style="border-right: 1px solid black; width:100%; margin:0px"><thead><th style="width: 3%; border-color: black;">Sr. No</th><th style="width: 20%; border-color: black;">Particulars</th><th style="width: 7%; border-color: black;">Number</th><th style="width: 7%; border-color: black;">Length</th><th style="width: 7%; border-color: black;">Breadth</th><th style="width: 7%; border-color: black;">Height</th><th style="width: 7%; border-color: black;">Quantity</th><th style="width: 7%; border-color: black;">Record Entry No</th><th style="width: 7%; border-color: black;">Record Entry Date</th><th style="width: 3%; border-color: black;">Check</th></thead></tbody>';
            }
            normaldata.forEach(function (item, index)
            {
                $('#containerItemNormalHtml').show();
                var meas_idss = item.meas_id;
                //console.log(item);
                const originalDate = new Date(item.measurment_dt);
                const formattedDate = originalDate.toLocaleDateString('en-GB');

                const originalDate1 = new Date(item.dyE_chk_dt);
                const dye_chk_dtformatted = originalDate1.toLocaleDateString('en-GB');// Format the date

                const originalDate2 = new Date(item.ee_chk_dt);
                const ee_dtformatted = originalDate2.toLocaleDateString('en-GB');// Format the date
                // console.log(dye_chk_dtformatted)
                var formulaimtem = item.formula;

                ItemNormalHTML += `
                        <tr>
                            <td colspan="1" style="width: 3%; border-color:black; text-align:left;">${item.sr_no ?? ''}</td>
                            <td colspan="1" style="width: 20%;  border-color:black; text-align:left;">${item.parti ?? ''}</td>`;
                if (item.formula == null) {
                    ItemNormalHTML += `
                            <td colspan="1" style="width: 7%;  border-color:black; text-align:right;">${item.number ?? ''}</td>
                            <td colspan="1" style="width: 7%;  border-color:black; text-align:right;">${item.length ?? ''}</td>
                            <td colspan="1" style="width: 7%;  border-color:black; text-align:right;">${item.breadth ?? ''}</td>
                            <td colspan="1" style="width: 7%;  border-color:black; text-align:right;">${item.height ?? ''}</td>
                            `;
                }
                else {
                    ItemNormalHTML += `
                                    <td colspan="4" style="width: 28%; text-align: center;  border-color:black; text-align:right;">${formulaimtem ?? ''}</td>`;
                }
                ItemNormalHTML += `<td colspan="1" style="width: 7%;  border-color:black; text-align:right;">${item.qty ?? ''}</td>
                                    <td colspan="1" style="width: 7%;  border-color:black; text-align:right;">${item.Record_Entry_No}</td>
                                    <td colspan="1" style="width: 7%;  border-color:black; text-align:right;">${formattedDate ?? ''}</td>`;
                if(item.ee_check==1){
                    ItemNormalHTML += `<td colspan="1" style="width: 3%; padding-left: 50px; border-color:black;"><input id="checkbox" class="form-check-input form-check" type="checkbox" checked disabled ></td>`;
                }
                else{
                    ItemNormalHTML += `<td colspan="1" style="width: 3%; padding-left: 50px; border-color:black;"><input id="checkbox" class="form-check-input form-check" type="checkbox" disabled></td>`;
                }

            });
            ItemNormalHTML += `<tr>
                                    <td colspan="6" style="width: 10%;  text-align: right; border-color:black;"><strong>Total</strong></td>
                                    <td colspan="1" style="width: 10%; text-align: right; border-color:black;"><strong>${itemdata.cur_qty}</strong></td>
                                    <td colspan="3" style="width: 7%;  text-align: right; border-color:black;"></td>
                                    </tr>`;
            ItemNormalHTML += `</tbody></table>`;

        }

        ItemNormalHTML += '<div class="statement form-group font-weight-bold text-right">' +
                                    '<div class="row"> To be paid at ' + itemdata.ratecode + ' of Rs. ' +
                                        itemdata.bill_rt  + '*' + itemdata.cur_qty + '=' + itemdata.cur_amt +
                                    '</div></div>';

        $('#containerSummary').html(ItemSteeSummaryhtml);
        $('#containerItemNormalHtml').html(ItemNormalHTML);

    }


</script>

<!-- {{-- Check Indicator funcion.----------------------------------------------------------------------------------------------------------------------- --}} -->

<script>
    var measidstringArray = [];
    function CheckIndicator(measid)
    {
        if (measid === 0)
        {
        // Your condition when measid is 0
        console.log("measid is 0");
        measid==0;
        // Add your logic here
    } else {
        // Your condition when measid is not 0
        console.log("measid is not 0");
        // Add your logic here
    }
        var workid = $('#workid').val();
        var tbillid = $('#tbillid').val();
        var dateid = $('#dateid').val();
        console.log("Date id get",dateid);
        var prev_amt =$('#progres_bar').val();
        console.log("previous amount" ,prev_amt);
        var amount =$('#AmountTextBox').val();
        console.log("Display Amounty" ,amount);
        var index = measidstringArray.indexOf(measid);

        if (index === -1) {
            measidstringArray.push(measid);
        } else {
            // measidUnchecked=measidstringArray.push(measid);
            measidstringArray.splice(index, 1);
        }

        $.ajax({
            type: "POST",
            url: "ExecutiveEngineerPercentIndicator",
            data: {
                measidstringArray: measidstringArray,
                workid: workid,
                tbillid: tbillid,
                measid:measid,
                dateid:dateid,
                prev_amt:prev_amt,
                amount:amount
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // console.log(response);

                var checked_mead_amt1 = response.Checked_Percentage; // Replace with your actual value

                // Convert to a number and format to have only three digits after the decimal point

                // var checked_mead_amt = parseFloat(checked_mead_amt1).toFixed(2);

                console.log("percentage",checked_mead_amt1);
                var checked_mead_amt = response.checked_mead_amt; // Replace with your actual value
                console.log("Amount",checked_mead_amt);


                document.getElementById('percentageTextBox').value = (checked_mead_amt1 != null) ? checked_mead_amt1 + '%' : '';
                document.getElementById('AmountTextBox').value = checked_mead_amt;

                var percentageTextBox = document.getElementById('percentageTextBox');

                if (checked_mead_amt1 <= 5) {
                    percentageTextBox.style.backgroundColor = 'rgba(255, 0, 0, 0.4)';
                } else {
                    percentageTextBox.style.backgroundColor = 'rgba(0, 128, 0, 0.4)';
                }




            },
            error: function (xhr, status, error) {
                // console.log("Error is raised....:", error);
                // alert('An error occurred while fetching data. Please check the console for details.');
            }
        });
    }
    var checkboxData = []; // Declare checkboxData globally
 // Initialize checkboxData with data from checkeddata when the page loads
 window.onload = function() {
        var checkeddata = <?php echo json_encode($checkeddata); ?>;
        checkboxData = checkeddata.map(function(item) {
            return { id: item.meas_id, eeqty: item.ee_chk_qty };
        });

    };


    console.log(checkboxData);







    function CheckIndicatorinput(measid,hiddenId)
    {


//sendCheckboxDataToBackend();
        var checkbox = document.getElementById("RselectAll");
        var hiddenInput = document.getElementById("hiddenValue");
        var workid = $('#workid').val();
        var tbillid = $('#tbillid').val();


var checkboxes = document.querySelectorAll('input[type=checkbox][name^="je_check_Item"]');
checkboxes.forEach(function(checkbox) {
    var id = checkbox.name.split('[')[1].split(']')[0];
    var eeqty = document.querySelector('#eeqty_' + id).value;

    if (checkbox.checked) { // Check if the checkbox is checked
        // Check if the ID already exists in the checkboxData array
        var existingIndex = checkboxData.findIndex(function(item) {
            return item.id === id;
        });

        // If the ID already exists, update its corresponding entry
        if (existingIndex !== -1) {
            checkboxData[existingIndex].eeqty = eeqty;
        } else {
            // If the ID doesn't exist, add it to the array
            checkboxData.push({ id: id, eeqty: eeqty });
        }
    } else { // If the checkbox is unchecked
        // Find the index of the ID in the checkboxData array
        var removeIndex = checkboxData.findIndex(function(item) {
            return item.id === id;
        });

        // If the ID exists in the array, remove it
        if (removeIndex !== -1) {
            checkboxData.splice(removeIndex, 1);
        }
    }
});



console.log(checkboxData);
        $.ajax({
            type: "POST",
            url: "ExecutiveEngineerPercentIndicatorInputqty",
            data: {
                checkboxData: checkboxData,
                workid: workid,
                tbillid: tbillid,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // console.log(response);

                var checked_mead_amt1 = response.Checked_Percentage; // Replace with your actual value

                // Convert to a number and format to have only three digits after the decimal point

                // var checked_mead_amt = parseFloat(checked_mead_amt1).toFixed(2);

                console.log("percentage",checked_mead_amt1);
                var checked_mead_amt = response.checked_mead_amt; // Replace with your actual value
                console.log("Amount",checked_mead_amt);


                document.getElementById('percentageTextBox').value = (checked_mead_amt1 != null) ? checked_mead_amt1 + '%' : '';
                document.getElementById('AmountTextBox').value = checked_mead_amt.toFixed(2);

                var percentageTextBox = document.getElementById('percentageTextBox');

                if (checked_mead_amt1 <= 5) {
                    // percentageTextBox.style.backgroundColor = 'red';
                    percentageTextBox.style.backgroundColor = 'rgba(255, 0, 0, 0.4)';
                } else {
                    // percentageTextBox.style.backgroundColor = 'green';
                    percentageTextBox.style.backgroundColor = 'rgba(0, 128, 0, 0.4)';
                }




            },
            error: function (xhr, status, error) {
                // console.log("Error is raised....:", error);
                // alert('An error occurred while fetching data. Please check the console for details.');
            }
        });
    }



</script>



 <!-- {{-- Percentage load function............----------------------------------------------------........ --}} -->
 <script>
    $(document).ready(function() {
        console.log("In ready function of Percentage");
        var workid = $('#workid').val();
        console.log(workid);

        var tbillid = $('#tbillid').val();
        console.log(tbillid);

        var dateid = $('#dateid').val();
        console.log(dateid);

        console.log("In Ready functionajax...")

        $.ajax({
            type: "POST", // or "GET" depending on your server-side method
            url: "ExecutiveEngineerPercentLoad", // replace with the actual URL of your controller
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                workid:workid,
                tbillid:tbillid,
                dateid:dateid,
            },
            success: function(response) {
            // console.log(response);

            var checked_mead_amt1 = response.Checked_Percentage;
            console.log(checked_mead_amt1);
             var amount= response.amount.toFixed(2);
             var formattedPercentage =response.formattedPercentage;
             console.log(amount,formattedPercentage);

             document.getElementById('percentageTextBox').value = (formattedPercentage != null) ? formattedPercentage + '%' : '';
            document.getElementById('AmountTextBox').value = amount;


            var percentageTextBox = document.getElementById('percentageTextBox');

            if (formattedPercentage <= 5) {
                percentageTextBox.style.backgroundColor ='rgba(255, 0, 0, 0.4)';
            } else {
                percentageTextBox.style.backgroundColor = 'rgba(0, 128, 0, 0.4)';
            }


            },
            error: function(xhr, status, error) {
                // Handle errors
                // console.error(xhr.responseText);
            }
        });
    });

</script>

<!--  <input type="text" class="form-control" id="dateid" value="" name="RecdateInput" > -->

<script>
 $("#SubmitBtn").click(function(e) {
    var workid = $('#workid').val();
    var tbillid = $('#tbillid').val();
    var  dateid=$('#dateid').val();
    console.log(dateid);
      $.ajax({
                type: "POST",
                url: "yesSubmitview",
                data: {
                      workid  :  workid ,
                      tbillid : tbillid,
                      dateid: dateid

                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                 },
                error: function(xhr, status, error) {
                }

     });
    });
</script>

<script>
    function limitMaxValue(input, maxValue) {
        if (parseInt(input.value) > parseInt(maxValue)) {
            input.value = maxValue;
        }
    }

    // function checkInput(input, maxValue) {
    //     var maxMessage = input.parentNode.querySelector('.max-message');
    //     if (parseInt(input.value) > parseInt(maxValue)) {
    //         maxMessage.style.display = 'inline'; // Display the message
    //     } else {
    //         maxMessage.style.display = 'none'; // Hide the message if value is within range
    //     }
    // }

    </script>

 @endsection

