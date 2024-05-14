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
    border-color: green; /*
     background-color: #2db112; /* Set the background color for the disabled state */

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
    .statement{
        margin-left:60%;
    }
</style>
<ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
    <li><a href="{{ url('billlist', $WorkId ?? '') }}">Bill</a></li>
    <li><a href="{{ url('emb', $tbillid ?? '') }}">EMB</a></li>
    <li><a href="javascript:void(0)">Deputy Engineer</a></li>
</ul>


<a href="{{ url('emb', $tbillid ?? '')}}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a> 
{{-- Common part --}}
@include('sweetalert::alert')
<form action="{{url('Checkdeputysave')}}" id="saveForm" method="post">
    @csrf
<div class="container1" style="padding-top: 100px;" >
<div class="row">
    <div class="col-lg-12">
      <div class="form-group form-row align-items-center">
            <label for="division" class="col-md-2">Division:</label>
            <div class="col-md-4">
              <input type="text" class="form-control" id="Div" name="Div "value="{{$divNm ?? ''}}" disabled>
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
                <input type="text" name="WorkId" class="form-control" id="WorkId"   value="{{$workDetails1->Work_Id  ?? ''}}"  disabled>
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
              <input type="text" class="form-control" id="dateInput" name="dateInput" value="{{  date('d/m/Y', strtotime($workDetails1->Wo_Dt ?? ''))}}" disabled>
          </div>
</div>
  <div class="form-group form-row align-items-center">
      <label for="subdision" class="col-md-2">Period :</label>
  <div class="col-md-4">
      <input type="text" name="Period" class="form-control" id="Period" disabled value="{{$workDetails1->Period ?? '' }}">
  </div>
  <label for="subdivision" class="col-md-2">Stipulated Date Of Complition:</label>
  <div class="col-md-4">
      <input type="text" name="Subiv" class="form-control" id="Subv" disabled value="{{ date('d/m/Y', strtotime($workDetails1->Stip_Comp_Dt ?? '' ))}}">
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
        <div class="tab-pane fade show active" id="Recordentrywise" role="tabpanel" aria-labelledby="Recordentrywise-tab" style="border:none;">
                <table class="table table-responsive" class="table table-responsive" style="border:none;">
                    <tr>
                        <th>Record Entry No:</th>
                        <td>
                            <select id="Check1RecDropdown" name="recnovalues">
                                <option value="">Select Record Entry No</option>
                                    @foreach ($Recordeno as $recno)
                                            <option @if(isset($recnovalues) && $recnovalues ==$recno->Record_Entry_No )  selected @endif value="{{ $recno->Record_Entry_No }}" >{{ $recno->Record_Entry_No }}
                                            </option>
                                    @endforeach
                            </select>
                        </td>
                        <th id="recnochngdtid">Date:</th>
                        <td id="recnochngdt1id">
                          <input type="text" class="form-control"id="dateid" value="" name="RecdateInput" disabled>
                        </td>

                        <th id="reccheckid"> Check:</th>
                        <td style="width: 5%; padding-left: 30px;">
                            <input class="RecWCheck form-check-input form-check custom-checkbox" type="checkbox" id="selectAllCheckboxRS" name="je_check_Steel_Heading[' . $recno->Record_Entry_No . ']" onclick="sellectAllCheckBoxS('.$SIheadcnt.');">
                        </td>

                        {{-- <th  style="width: 5%;" id="chkdtlabel">Check Date:</th> --}}
                        <td style="width: 5%; padding-left: 30px;">
                            <input type="date" class="form-control" id="defaultDateS" name="dateInputSellectAllS[]" onchange="RDropdownChangeDtS();" min="{{$embsmaxdt}}" max="{{$BillDt}}">
                        </td>

                        {{-- <td style="width: 5%; padding-left: 50px;" id="checkbox">
                            <input class="form-check-input form-check custom-checkbox" id="selectAll" type="checkbox" name="selectCheckbox" onclick="()">
                        </td> --}}
                        <td style="width: 5%; padding-left: 30px;" id="checkboxdt">
                            <input type="date" class="form-control"  name=""  id="defaultDate" onchange="">
                        </td>
                    </tr>
                </table>

                    <div id="html"></div>
                    <div id="RecHeading"></div>
                    <div id="test"></div>
                    <div id="test2"></div>
                    <div id="test3"></div>

        </div>

{{-- Itemwise commonpart --}}
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
                                        {{-- {{$itemnov->combined_value}} --}}
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
                                            <textarea style="width: 100%;" class="form-control" rows="5" id="itemnm" name="itemnamem" disabled></textarea>
                                        </td>
                                        <td style="width: 10%;">
                                            <input style="width: 100%;" class="form-control" id="totalqty" name="totalquty" disabled>
                                        </td>
                                        <td style="width: 10%;">
                                            <input style="width: 100%;" class="form-control" id="unit" name="unit1" disabled>
                                        </td>
                                    </tr>
                                </table>
                                <div id="containerItemNormalHtml"></div>
                                <div id="containerItemSteelHtml"></div>
                                <div id="htmlItemRecord"></div>
                                <div id="containerSummary"></div>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
 <!-- {{--HIDDEN VALUES ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}} -->
 <input type="hidden" name="tbillid" id="tbillid" value="{{ $tbillid }}">
<input type="hidden" name="WorkId" id="WorkId" value="{{ $WorkId  }}">
<input type="hidden" name="BillDt" id="BillDt" value="{{ $BillDt  }}">
@if(isset($recnovalues))
    <input type="hidden" name="recnovaluesave" id="recnovaluesave" value="{{ $recnovalues }}">
@endif


<div class="d-flex justify-content-center align-items-center" >
    <div class="row">
        <button type="submit" class="btn btn-info btn-sm " value="save" style="background-color: rgb(188, 136, 33); border-color: rgb(188, 136, 33)" name="btnsave">Save</button>

        <button type="submit" class="btn btn-info btn-sm" value="all" id="submitBtn" style="margin-left: 10px; background-color:rgb(188, 136, 33); border-color:rgb(188, 136, 33)" name="btnall">Submit</button>

        <button type="submit" class="btn btn-info btn-sm" value="revert" id="Revert" style="margin-left: 10px; background-color:rgb(188, 136, 33); border-color:rgb(188, 136, 33)" name="BtnRevert">Revert</button>
    </div>
</div>
</form>
<br>
<br>
<br>




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

            var WorkId_valuer = $('#WorkId').val();
            console.log(WorkId_valuer);

            var tbillid_valuer = $('#tbillid').val();
            console.log(tbillid_valuer);

            var BillDt = $('#BillDt').val();
            consolelog=$('#selectAllCheckboxS').val();
            // console.log("consolelog",consolelog)

            $.ajax({
                type: "POST",
                url: "Checkdeputy1",
                data: {
                    Record_Entry_Nor: Record_Entry_Nor,
                    // itemid_valuer: itemid_valuer,
                    tbillid_valuer: tbillid_valuer,
                    WorkId_valuer: WorkId_valuer,
                    SelectDtAllS:SelectDtAllS,
                    BillDt:BillDt
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                var dtinfo = response.RecDate;

                var htmldata=response.strhtml;
                //console.log(htmldata)
                var htmlformla=response.strhtmlformula;
                //console.log(htmlformla);

                var strhtmlsteel=response.strhtmlsteel;

                var html=response.html;
                //console.log(normaldesc);
                var Count_Chked_Emb_Stl=response.Count_Chked_Emb_Stl;
                console.log(Count_Chked_Emb_Stl)

                var measdatacount=response.measdatacount;
                console.log("measdatacount",measdatacount);
                var steeldesc=response.steeldesc;
                // console.log("OK Ok Ok Ok Ok")
                var steelid=response.steelid;
                console.log("steelid",steelid)
                var RecordNormalHTMLheading="";

                        $('#RecHeading').html(RecordNormalHTMLheading);
                        // Set the value of the input with class Recdtvalue
                        // document.querySelector('.Recdtvalue').value = dtinfo;
                        $('#dateid').val(dtinfo);

                        $('#html').html(html);
                        $('#test').html(htmldata);
                        $('#RFormula').html(htmlformla);
                        $('#test2').html(steeldesc);
                        $('#test3').html(strhtmlsteel);
                        console.log("In Ajaxxxxxxxxxxxxx....");
                        var recentryno = response.FinalRecordEntryNo;
                        var RecordData = response.dData1;
                        // console.log(RecordData);
                        var itemids = response.bitemsid;
                    },
                    error: function (xhr, status, error) {
                    }
                });

    }

    //$(document).ready(function() {

        // $('#recnochngdt').hide();
        // $('#recnochngdt1').hide();
        // $('#reccheck').hide();
        // $('#reccheckdt').hide();
        // $('#reccheck1').hide();
        // $('#reccheckdt1').hide();
        // var recnovaluesave = $('#recnovaluesave').val();

        // if(recnovaluesave){
        //     RDropdownChangeDt(recnovaluesave);
        // }
        // else{
        //     RDropdownChangeDt(null);
        // }

    // });

    //Normal Data-----------------------------------------------____________---------------------------------------------------------------------------------------------------------------
    // Normal data Checked Date.....
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
        $('#defaultDate').hide();

        // Get the selected value from the dropdown
        if(recnovaluesave){
            var Record_Entry_Nor = recnovaluesave;
        }else{
            var Record_Entry_Nor = $('#Check1RecDropdown').val();
        }
        var WorkId_valuer = $('#WorkId').val();
        console.log(WorkId_valuer);

        var tbillid_valuer = $('#tbillid').val();
        console.log(tbillid_valuer);

        var BillDt = $('#BillDt').val();

        $.ajax({
            type: "POST",
            url: "Checkdeputy1",
            data: {
                Record_Entry_Nor: Record_Entry_Nor,
                // itemid_valuer: itemid_valuer,
                tbillid_valuer: tbillid_valuer,
                WorkId_valuer: WorkId_valuer,
                SelectDtAll:SelectDtAll,
                BillDt:BillDt
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                var measdatacount=response.measdatacount;
                console.log("measdatacount",measdatacount);
            var measidsno=response.measidsnormal;
            console.log("measidsn",measidsno)
            var dtinfo = response.RecDate;
            var steelid=response.steelid;
            console.log("steelid",steelid)
            var measCountNormal=response.measdatacount;
            console.log("measCountNormal count",measCountNormal);
            var Count_Chked_Emb_Stl=response.Count_Chked_Emb_Stl;
            // console.log("OK Ok Ok Ok Ok")
            console.log(Count_Chked_Emb_Stl);

            if (measCountNormal === Count_Chked_Emb_Stl) {
                console.log("Printing Checked..................")
                // Do something if the condition is true
                $("#selectAllCheckboxRS").prop("checked", true);
            } else {
                // Do something else if the condition is false
                $("#selectAllCheckboxRS").prop("checked", false);
            }

            //console.log(dtinfo);
            var htmldata=response.strhtml;
            //console.log(htmldata)
            var htmlformla=response.strhtmlformula;
            //console.log(htmlformla);

            var strhtmlsteel=response.strhtmlsteel;

            var html=response.html;
            //console.log(normaldesc);
            var SteelSummary=response.SteelSummary;
            console.log(SteelSummary)
            var steeldesc=response.steeldesc;
            var RecordNormalHTMLheading="";

                    $('#RecHeading').html(RecordNormalHTMLheading);
                    $('#dateid').val(dtinfo);
                    // $('#recordmscheckeddata').val(recordmscheckeddata);
                    $('#html').html(html);
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
                }
            });

    }

    $('#Check1RecDropdown').change(function() {
            console.log("RDropdownChangeDt Changed");
            RDropdownChangeDt();
            sellectAllCheckBoxRecord();
    });

</script>



 {{-- ItemWise Ajax=================================================================================================== --}}
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
        $('#checkbox').show();
        // $('#defaultDate').hide();
        $('#recnochngdtid').show();
        $('#recnochngdt1id').show();
        // $('#reccheckid').show();
        // $('#selectAllCheckboxRS').show();
        $('#defaultDateS').hide();

        console.log("Dropdown selection changed.....");
        // Get the selected value from the dropdown
        var combined_value = $('#DivDropdown').val();
        console.log(combined_value)
        var WorkId_value = $('#WorkId').val();
        var itemid_value = $('#itemid').val();
        var tbillid_value = $('#tbillid').val();

                            // Perform an AJAX request to fetch data based on the selected Record Entry No
        $.ajax({
            type: "POST",
            url: "Checkdeputy2",
            data: {
                WorkId_value: WorkId_value,
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
                var html = response.html;
                //console.log(itemd);
                $('#itemnm').val(itemd.exs_nm);
                $('#totalqty').val(itemd.tnd_qty);
                $('#unit').val(itemd.item_unit);
                // $('#html').html(html);
                $('#defaultDateS').val(response.dyedate);
                console.log(defaultDateS)
                // console.log(response.dyedate)
                commondyeItemwise(response);
            },
            error: function(xhr, status, error) {
            }
        });

    }

   function commondyeItemwise(response)
    {
        $('#buttons').hide();
        var ItemSteeSummaryhtml='';
        var normaldata = response.Item1Data;
        var recentryno= response.FinalRecordEntryNo;
        ItemNormalHTML='';
        // var SteelSummary=response.titemno;
        var SteelSummary=response.titemno[0];
        var ItemRecord=response.html;
        $('#containerItemNormalHtml').hide();
        $('#containerItemSteelHtml').hide();

        ItemSteeSummaryhtml += '<div class="statement form-group font-weight-bold text-right">' +
                                            '<div class="row"> To be paid at ' + SteelSummary.ratecode + ' of Rs.  ' +
                                            SteelSummary.cur_qty + '*' + SteelSummary.bill_rt + '=' + SteelSummary.cur_amt +'</div>';
                            $('#containerSummary').html(ItemSteeSummaryhtml);

        if(ItemRecord)
        {
            $('#htmlItemRecord').show();
            $('#containerItemNormalHtml').hide();
            $('#ItemNormalHTML').hide();
            // console.log(ItemRecord)
            $('#htmlItemRecord').html(ItemRecord);
            $('#containerSummary').show();

        }
        else{
            ItemRecord='';
            $('#htmlItemRecord').hide();
            $('#ItemNormalHTML').show();
            var htmlItemRecord='';
            var ItemNormalHTML = '';
            var ItemNormalHTMLheading = '';
            //console.log(normaldata.breadth);
            var normaldata = response.Item1Data;
            console.log(response);
            sizeofnormdata=normaldata.length;
            //console.log(sizeofnormdata);
            var meas_idss = normaldata.meas_id;
            //console.log(meas_idss);
            var container = $('#NItemContainer');
            ItemNormalHTML += '<table class="table table-bordered table-striped" style="border-right: 1px solid black; width:100%; margin:0px"><thead><th style="width: 3%; border-color: black;">Sr. No</th><th style="width: 39%; border-color: black;">Particulars</th><th style="width: 7%; border-color: black;">Number</th><th style="width: 7%; border-color: black;">Height</th><th style="width: 7%; border-color: black;">Length</th><th style="width: 7%; border-color: black;">Breadth</th><th style="width: 7%; border-color: black;">Quantity</th><th style="width: 10%; border-color: black;">Record Entry No</th><th style="width: 10%; border-color: black;">Record Entry Date</th><th style="width: 3%; border-color: black;">Check</th></thead><tbody>';

            // console.log("CheckedDtDefault:",CheckedDtDefault);
            normaldata.forEach(function (item, index)
            {
                $('#containerItemNormalHtml').show();
                var meas_idss = item.meas_id;
                console.log(meas_idss);
                const originalDate = new Date(item.measurment_dt);
                const formattedDate = originalDate.toLocaleDateString('en-GB');

                const originalDate1 = new Date(item.dyE_chk_dt);
                const dye_chk_dtformatted = originalDate1.toLocaleDateString('en-GB');// Format the date
                console.log(dye_chk_dtformatted)
                var formulaimtem = item.formula;
    // console.log(item)
                ItemNormalHTML += `
                        <tr>
                            <td colspan="1" style="width: 3%; border-color:black; text-align:left">${item.sr_no}</td>
                            <td colspan="1" style="width: 39%;  border-color:black; text-align:left">${item.parti ?? ''}</td>`;
                if (item.formula == null) {
                    ItemNormalHTML += `
                            <td colspan="1" style="width: 7%;  border-color:black;  text-align:right">${item.number ?? ''}</td>
                            <td colspan="1" style="width: 7%;  border-color:black; text-align:right">${item.length ?? ''}</td>
                            <td colspan="1" style="width: 7%;  border-color:black; text-align:right">${item.breadth ?? ''}</td>
                            <td colspan="1" style="width: 7%;  border-color:black; text-align:right">${item.height ?? ''}</td>`;
                }
                else {
                    ItemNormalHTML += `
                        <td colspan="4" style="width: 28%; text-align: center;  border-color:black; text-align:right">${formulaimtem}</td>`;
                }
                ItemNormalHTML += `<td colspan="1" style="width: 7%;  border-color:black; text-align:right">${item.qty}</td>
                            <td colspan="1" style="width: 10%;  border-color:black; text-align:right">${item.Record_Entry_No}</td>
                            <td colspan="1" style="width: 10%;  border-color:black; text-align:right">${formattedDate}</td>`;
                if(item.dye_check==1){
                    ItemNormalHTML += `<td colspan="1" style="width: 3%; padding-left: 50px; border-color:black;"><input id="checkbox" class="form-check-input form-check" type="checkbox" checked disabled ></td>`;
                }
                else{
                    ItemNormalHTML += `<td colspan="1" style="width: 3%; padding-left: 50px; border-color:black;"><input id="checkbox" class="form-check-input form-check" type="checkbox" disabled></td></tr>`;
                }
                // ItemNormalHTML += `<td style="width: 7%;  border-color:black;"  text-align:right>${dye_chk_dtformatted}</td>`;
                        });
                        ItemNormalHTML += `<tr>
                                           <td colspan="6" style="width: 10%;  text-align: right; border-color:black;"><strong>Total</strong></td>
                                            <td colspan="1" style="width: 10%; text-align: right; border-color:black;"><strong>${SteelSummary.cur_qty}</strong></td>
                                            <td colspan="3" style="width: 7%;  text-align: right; border-color:black;"></td>
                                            </tr></tbody></table>`;

                $('#containerItemNormalHtml').html(ItemNormalHTML);
                $('#containerSummary').show();
                }


    }


</script>



<!-- {{-- Submit buton script........ --}} -->
<script>
    $(document).ready(function() {
        // Attach click event handler to the submit button
        $("#submitBtn").click(function() {
            // Perform AJAX request

            var WorkIdsubmit = $('#WorkId').val();
            console.log(WorkIdsubmit);

            var tbillidsubmit = $('#tbillid').val();
            console.log(tbillidsubmit);


            var RselectAll = $('#RselectAll').val();
            console.log(RselectAll);


            var Check1RecDropdown = $('#Check1RecDropdown').val();
            console.log(Check1RecDropdown);

            console.log("In submitBtn ajax...")
            $.ajax({
                type: "POST", // or "GET" depending on your server-side method
                url: "SubmitDeputy1", // replace with the actual URL of your controller
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                }
            });
        });

        DropdownChange();

        $('#DivDropdown').change(function() {
            DropdownChange();
            $('#buttons').hide();
        });

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

    });
</script>


 @endsection

