@extends("layouts.header")
@section('content')



  <!-- //tab link -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- dropdown icon link -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> -->

    <style>
    .total-table {
            float: right;
            margin-top: 20px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 10px;
        }
        .container-fluid
        {
          border: 1px solid #ccc;
          padding: 20px;
          border-radius: 5px;


        }


        .zp_btn_tab 
        {
                  padding: 10px 20px;
                  margin-right: 10px; /* Add a right margin between the buttons */
                  border-radius: 20px;
            }

            .zp_btn_tab.active
             {
                      background-color: #EDBB99 !important;
                      color: #fff;
              }

.zp_btn_tab:not(.active) {
  background-color: #f8f9fa;
  color: #000;
  border: 1px solid #ced4da;
}

.zp_btn_tab:not(.active):hover 
{
  background-color: #e9ecef;
}


.tab-content {
      background-color: #f8f9fa; /* Tab panel background color */
      color: #000000; /* Text color */
      margin:15px;
    }


.custom-btn {
    background-color: transparent;
    color: inherit;
    border: none;
}



/* check box css */
.form-check-input {
    width: 24px;
    height: 24px;
    position: relative;
    border: 2px solid #ccc;
    border-radius: 5px;
  }
  .container-fluid {
    border: 2px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
  }

  /* Style the custom checkbox when checked */
  .form-check-input:checked {
    background-color: blue;
    border-color: blue;
  }

  /* Hide the default checkbox label text */
  .form-check-label {
    display: inline-block;
    margin-left: 5px;
  }
  /* //checkbox css complete */
   /* Item description cell in tnditem table adjest cell   */
  .padded-cell {
    text-align: justify;
    width:500px;
}

.padded-content {
    padding: 0 30px; /* Add space on left and right sides */
    display: inline-block; /* Keeps the container inline without expanding */
    overflow: hidden;
    /* width:300px; Hide overflow content if needed */
}
   /* Item description cell in tnditem table adjest cell   */
   .pndQtyRate
    {
    width:50px;
    }
    .tndAmt
    {
    width:200px;
    }

    .ItemNoUnit
    {
    width:20px;
    }
    .row-with-border {
    border-bottom: 5px solid black; /* Adjust thickness as needed */
    }
/* footer */
html, body {
  height: 85%;
  margin: 0;
  padding: 0;
}
/* // numbering pagination styleapply */
.pagination .page-link 
{
        display: inline-block;
        margin-right: 5px; /* Adjust the spacing between buttons and numbers */
        font-size: 14px; /* Set a fixed font size */
        white-space: nowrap; /* Prevent text from wrapping */
        cursor: pointer;
    }

    .pagination .page-link.selected 
    {
        background-color: #007bff; /* Set your desired background color for the selected page */
        color: #ffffff; /* Set the text color for the selected page */
    }
  /* // nombering pagination styleapply */
  
    
    </style>

@include('sweetalert::alert')

<!-- <div class="container"> -->
<h2 style="text-align: center;"><b>Work Master</b></h2>
<div class="container-fluid">

        
    
<form action="{{url('workmaster')}}"  id="my-form"  method="post">
    @csrf
              <div class="row m-2">
                                  <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                      <label for="div_name" class="font-weight-bold">Division Name:</label>
                                  </div>
                                  <div class="col-12 col-sm-4 col-md-4 col-lg-4 ">
     <input type="text" class="form-control"  value="{{$workData->div}}"  name="Div" readonly>

           <!--<select id="divisionDropdown" class="form-control" style="max-width: 280px;" name="Div"></select>                 -->
                         </div>
                                  <div class="col-sm-2 col-md-2 col-lg-2">
            <label for="" class="font-weight-bold">Work Id:</label>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-4">
            <!-- <input type="text" id="workIdInput" class="form-control" name="work_Id"> -->
            <input type="text" id="workIdInput" class="form-control" name="work_id" value="{{ $workData->Work_Id }}">

        </div>
              </div>

            <div class="row m-2">
            <div class="col-12 col-sm-3 col-md-3 col-lg-2">
        <label for="sub_div_name" class="font-weight-bold">Sub Division Name:</label>
    </div>
    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
              <input type="text" class="form-control" value="{{$workData->Sub_Div}}"  name="Sub_Div" readonly>

        <!--<select id="subDivisionDropdown" class="form-control" style="max-width: 280px;" name="Sub_Div" readonly>-->
        <!--    @foreach($Subdivisions as $subdivision)-->
        <!--        <option value="{{ $subdivision->Sub_Div }}">{{ $subdivision->Sub_Div }}</option>-->
        <!--    @endforeach-->
        <!--</select>-->
    </div>                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                        <label for="" class="font-weight-bold">Fund Head:</label>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
                                    <input type="text" id="" class="form-control" name="FH_Code" value="{{$workData->F_H_Code }}">                                    </div>
            </div>

            <div class="row m-2">
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                        <label for="" class="font-weight-bold">Name of Work:</label>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <textarea name="Work_Nm" class="form-control" rows="3" cols="53">{{$workData->Work_Nm }}</textarea>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                    <label for="" class="font-weight-bold">name of work Marathi</label>

                                    <!-- <label for="" class="font-weight-bold"><small>Amount Put to Tender:</small></label> -->
                                  </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
                                    <textarea name="Work_Nm_M" class="form-control" rows="3" cols="53">{{$workData->Work_Nm_M }}</textarea>

                                    <!-- <input type="text" id="" class="form-control" name=""  > -->

                                        <!-- <input type="text" id="Amount_Put_to_Tender" class="form-control" name="Tnd_Amt" value="{{$workData->Tnd_Amt }}" > -->
                                    </div>
            </div>

            <div class="row m-2">
            <div class="col-12 col-sm-3 col-md-3 col-lg-2">
    <label for="workType" class="font-weight-bold">Type of Work</label>
</div>
<div class="col-12 col-sm-4 col-md-4 col-lg-4">
<select id="workType" class="form-control" style="max-width: 280px;" name="workType">
    <option value="Road" {{ $workData->Work_Type == "Road" ? 'selected' : '' }}>Road</option>
    <option value="Building" {{ $workData->Work_Type == "Building" ? 'selected' : '' }}>Building</option>
    <option value="Bridge" {{ $workData->Work_Type == "Bridge" ? 'selected' : '' }}>Bridge</option>
    <option value="CD" {{ $workData->Work_Type == "CD" ? 'selected' : '' }}>CD</option>
</select>
</div>                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                    <label for="" class="font-weight-bold">Area of Work</label>

                                    <!-- <label for="" class="font-weight-bold"><small>Amount Put to Tender:</small></label> -->
                                  </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
        <input type="text" id="" class="form-control" name="workarea" value="{{$workData->Work_Area }}">

                                    <!-- <input type="text" id="" class="form-control" name=""  > -->

                                        <!-- <input type="text" id="Amount_Put_to_Tender" class="form-control" name="Tnd_Amt" value="{{$workData->Tnd_Amt }}" > -->
                                    </div>
            </div>





            <div class="row m-2">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                            <label for="" class="font-weight-bold ">SSR Year:</label>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <!-- <input type="text" id="" class="form-control" name="DSR_year"> -->
                            <input type="text" id="" class="form-control form-select" style="max-width: 280px;" name="SSR_year" value="{{$workData->SSR_Year }}">

                            <!-- <select id="" class="form-control form-select" style="max-width: 280px;" name="DSR_year">
                                            <option></option>
                                        </select> -->
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                        <label for="" class="font-weight-bold">Amount Put to Tender:</label>
                                  </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
                                    <input type="text" id="Amount_Put_to_Tender" class="form-control" name="Tnd_Amt" value="{{$workData->Tnd_Amt}}">                                    </div>

            </div>

            <div class="row m-2">
            <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                <label for="" class="font-weight-bold">Agency Name</label>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
    <select id="agencyDropdown" class="form-control" name="agency" required>
      <!-- <option id="Agencyfindname"></option> -->
      @foreach($DBagengieslist as $agencyOption)
            <option value="{{ $agencyOption->agency_nm }}" 
                {{ in_array($agencyOption->agency_nm, $DBagencies->pluck('Agency_Nm')->toArray()) ? 'selected' : '' }}>
                {{ $agencyOption->agency_nm }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-sm-1 col-md-1 col-lg-1">
    <a href="#" class="btn btn-primary" id="findAgencyId" data-toggle="modal" data-target="#agencySearchModal">Find Agency</a>
</div>


                                    
            </div>

            <!-- <div class="d-flex justify-content-center">
                        <input type="submit" value="Submit" class="btn btn-primary" id="submit-btn">
            </div> -->

</div>
                       



      <div class="container-fluid">

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <!-- <li class="nav-item nav-item"> -->
            <li class="nav-item" role="presentation">
        <a class="nav-link active btn zp_btn_tab " data-toggle="pill" href="#home">Work information</a>
            </li>
            <li class="nav-item" role="presentation">
        <a class="nav-link btn zp_btn_tab " data-toggle="pill" href="#menu1">BoQ</a>
          </li>
</ul>














<div class="tab-content">
  <div id="home" class="tab-pane fade show active">

     <div class="row">
    <!-- Column 1 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_No">AA. No:</label>
            <input type="text" id="AA_No" name="AA_No" class="form-control" placeholder="Enter A.A. No" value="{{$workData->AA_No }}" required>
        </div>
    </div>
    <!-- Column 2 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Date">AA. Date:</label>
            <input type="date" id="AA_Date" name="AA_Date" class="form-control" placeholder="Enter A.A. Date"  value="{{ $workData->AA_Dt ?? '' }}" required readonly
            Max="{{$workData->TS_Dt}}">
        </div>
    </div>
    <!-- Column 3 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Amount">AA. Amount:</label>
            <input type="text" id="AA_Amount" name="AA_Amount" class="form-control" placeholder="Enter A.A. Amount" value="{{$workData->AA_Amt }}" required>
        </div>
    </div>
    <!-- Column 4 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Authority">AA. Authority:</label>
            <input type="text" id="AA_Authority" name="AA_Authority" class="form-control"
             placeholder="Enter A.A. Authority"  value="{{$workData->AA_Authority }}" required>
        </div>
    </div>
</div>




<div class="row">
    <!-- Column 1 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_No">TS. No:</label>
            <input type="text" id="TS_No" name="TS_No" class="form-control" placeholder="Enter TS. No:"
            value="{{$workData->TS_No }}"  >
        </div>
    </div>
    <!-- Column 2 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Date">TS. Date:</label>{{$workData->TS_Dt}}
            <input type="date" id="TS_Date" name="TS_Date" class="form-control" 
            placeholder="Enter TS. Date" value="{{ $workData->TS_Dt }}"  
            min="{{$workData->AA_Dt}}" Max="{{$workData->Wo_Dt}}">
        </div>
    </div>
    <!-- Column 3 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Amount">TS Amount:</label>
            <input type="text" id="TS_Amount" name="TS_Amount" class="form-control"
             placeholder="Enter TS Amount" value="{{$workData->TS_Amt }}"  >
        </div>
    </div>
    <!-- Column 4 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Authority">TS Authority:</label>
            <input type="text" id="TS_Authority" name="TS_Authority"
             class="form-control" placeholder="Enter TS Authority" value="{{$workData->TS_Authority }}"  >
        </div>
    </div>
</div>








<div class="row">
    <!-- Column 1 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
        <label for="WO_No">Work Order No:</label>
        <input type="text" id="WO_No" name="WO_No" placeholder="Enter Work Order No"
         class="form-control"   value="{{$workData->WO_No }}" required>
        </div>
    </div>
    <!-- Column 2 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
        <label for="Wo_Dt" class="wk_info2">Work Order Date:</label>
        <input type="date" id="Wo_Dt" name="Wo_Dt" placeholder="Enter Work Order Date"
         class="form-control"  value="{{$workData->Wo_Dt }}" required  Min="{{$workData->TS_Dt}}">
        </div>
    </div>
    <!-- Column 3 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
  <label for="">Work Order Amount</label>
  <input type="text" id="WO_Amt" name="WO_Amt" placeholder="Enter Work Order Amount"
  class="form-control wk_info1" value="{{$workData->WO_Amt}}">        </div>
    </div>

    <div class="col-12 col-md-3">
        <div class="form-group">
  <label for="">Above bellow effect</label>
  <input type="text" id="a_b_effect" name="a_b_effect" placeholder="Enter Above bellow effect"
   class="form-control wk_info1" readonly required>
        </div>
    </div>


</div>
<div class="row">

<div class="col-12 col-md-3">
        <div class="form-group">
        <label for="Agree_No">Agreement No:</label>
        <input type="text" id="Agree_No" name="Agree_No" placeholder="Enter Agreement No."
         class="form-control"   value="{{$workData->Agree_No }}" required  >
        </div>
    </div>
    <!-- Column 2 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
        <label for="Agree_Dt" class="wk_info2">Agreement Date:</label>
        <input type="date" id="Agree_Dt" name="Agree_Dt" placeholder="Enter Agreement Date."
         class="form-control"  value="{{$workData->Agree_Dt }}" Min="{{$workData->Wo_Dt }}" >
        </div>
    </div>
  </div>



<div class="row">
      <div class="col-12 col-md-3">
      <div class="form-group">
  <label for="Above_Below">Below/Above percentage </label>
  <input type="text" id="Above_Below" name="Above_Below" placeholder="Enter Below/Above percentage"
   class="form-control" onchange="calculateAmount()" value="{{$workData->A_B_Pc }}" required  >
</div>
 </div>
 <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="a_b" class="ml-1">Below/Above:</label>
            <select id="a_b" name="A_B_Pc" class="form-control form-select" style="max-width: 250px;" onchange="calculateAmount()" required>
                <option name="A_B_Pc">Below</option>
                <option>Above</option>
                <option>At Per</option>
            </select>
        </div>     
    </div>      
    <div class="col-12 col-md-3">
  <div class="form-group">
    <label for="">Time Limit:</label>
    <input type="number" id="Period" step="any" name="Period"  placeholder="Enter Time Limit"
     class="form-control wk_info1" onkeyup="calculateCompletionDate()" required value="{{ isset($workData->Period) ? $workData->Period : '' }}" >
  </div>
</div>
<div class="col-12 col-md-3">
  <div class="form-group">
    <label for=""></label>
    <select id="Perd_Unit" name="Perd_Unit" class="form-control" style="max-width:250px;" onchange="calculateCompletionDate()" required>
  <!--<option>Day</option>-->
  <!--<option>Month</option>-->
  <!--<option>Year</option>-->
    <option {{ $workData->Perd_Unit == 'Day' ? 'selected' : '' }}>Day</option>
  <option {{ $workData->Perd_Unit == 'Month' ? 'selected' : '' }}>Month</option>
  <option {{ $workData->Perd_Unit == 'Year' ? 'selected' : '' }}>Year</option>

</select>

  </div>
</div>


</div>




    <div class="row">
      <!-- <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="">Time Limit:</label>
          <input type="text" id="Period" name="Period" class="form-control wk_info1">
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for=""></label>
          <select id="Perd_Unit" name="Perd_Unit" class="form-control" style="max-width:250px;">
    <option selected>Day</option>
    <option>Month</option>
    <option>Year</option>
  </select>
        </div>
      </div> -->
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="Stip_Comp_Dt" class="wk_info4">Stipulated Date of Completion:</label>
          <input type="date" id="Stip_Comp_Dt"  placeholder="Enter Stipulated Date "
          name="Stip_Comp_Dt" class="form-control" required>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="tm_lm_extension">Time Limit Extension:</label>
          <!-- <select id="" name="tm_lm_extension" class="form-control">
            <option selected>122</option>
            <option></option>
            <option></option>
          </select> -->

          <input type="text" id="tm_lm_extension" name="tm_lm_extension"  placeholder="Enter Time Limit Extension "
           class="form-control wk_info1">
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="form-group">
          <!-- <label for="" class="ml-1">Days</label> -->
          <label for="" class="ml-3 wk_info3">Revised Date of Completion:</label>
          <input type="date" id="rs_dt_comp"  placeholder="Enter Revised Date of Completion"
          name="rs_dt_comp" class="form-control">
        </div>
      </div>

    </div>

    

    <div class="row">
    <!-- Taluka Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
        <label for="Taluka">Taluka:</label>
        <select id="Taluka" name="Taluka" class="form-control" required>

        <option value="">-choose-</option>

@if(!empty($DBtalselected) && count($DBtalselected) > 0)
    <option value="{{ $DBtalselected[0]->Tal }}" selected>{{ $DBtalselected[0]->Tal }}</option>
@endif

    @foreach ($DBtal as $tal)
        <option value="{{ $tal->Tal }}" {{ $tal->Tal == $workData->Tal ? 'selected' : '' }}>
            {{ $tal->Tal }}
        </option>
    @endforeach
</select>
    </div>
</div>

    <!-- Village Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
        <label for="village">Village:</label>
        <select id="village" name="village" class="form-control" required>
        <!-- @if($DBvillage->isNotEmpty())
                <option value="{{ $DBvillage->first()->Village }}" selected>{{ $DBvillage->first()->Village }}</option>
            @endif -->
            <option value="">-choose-</option>

@if(!empty($DBvillage) && count($DBvillage) > 0)
    <option value="{{ $DBvillage[0]->Village }}" selected>{{ $DBvillage[0]->Village }}</option>
@endif

        @foreach($villagelist as $village)
                <option value="{{ $village->Village }}">{{ $village->Village == $workData->Village_ID ? 'selected' : ''  }}
                {{ $village->Village}}
                </option>
        @endforeach
            <!-- @foreach($DBvillage as $village)
        <option value="{{ $village->Village }}">{{ $village->Village }}</option>
    @endforeach -->
</select>
    </div>
</div>




<div class="col-12 col-md-3">
    <div class="form-group">
    <label for="PO_Name">MP:</label>
    <select type="text" id="mp" name="mp" class="form-control" required>
    <option value="">-choose-</option>

    @if(!$DBMPselect->isEmpty())
        <option value="{{ $DBMPselect[0]->MP_Con }}" selected>{{ $DBMPselect[0]->MP_Con }}</option>
    @endif
    <option value="">Select MP</option>
    @foreach ($DBMP as $item)
        <option value="{{ $item->MP_Con }}">{{ $item->MP_Con }}</option>
    @endforeach
</select>
</div>
    </div>

    <!-- Auditor Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="mla_Name">MLA:</label>
    <select type="text" id="mla" name="mla_Name" class="form-control" required>
    <option value="">-choose-</option>

    @if(!$DBMLAselect->isEmpty())
        <option value="{{ $DBMLAselect[0]->MLA_Con }}" selected>{{ $DBMLAselect[0]->MLA_Con }}</option>
    @endif

    <option value="">Select MLA</option>
    @foreach ($DBMLA as $item)
        <option value="{{ $item->MLA_Con }}">{{ $item->MLA_Con }}</option>
    @endforeach
</select>      
</div>
</div>
</div>

<div class="row">
<div class="col-12 col-md-3">
        <div class="form-group">
            <label for="ZP_Constituency">ZP Constituency:</label>
            <select id="ZP_Consti" name="ZP_Constituency" class="form-control" required>
            <option value="">-choose-</option>

            @if(!$DBZPselect->isEmpty())
        <option value="{{ $DBZPselect[0]->ZP_Con }}" selected>{{ $DBZPselect[0]->ZP_Con }}</option>
    @endif

    @foreach($DBzp as $zp)
        <option value="{{ $zp->ZP_Con }}">{{ $zp->ZP_Con }}</option>
    @endforeach

</select>
        </div>
    </div>



    <!-- P.O. Name Dropdown -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="PS_Constituency">PS Constituency:</label>
            <select id="PS_Consti" name="PS_Constituency" class="form-control" required>
            <option value="">-choose-</option>

            @if(!$DBPSselect->isEmpty())
        <option value="{{ $DBPSselect[0]->PS_Con }}" selected>{{ $DBPSselect[0]->PS_Con }}</option>
    @endif

    @foreach($DBps as $ps)
        <option value="{{ $ps->PS_Con }}">{{ $ps->PS_Con }}</option>
    @endforeach
</select>
        </div>
    </div>

    <!-- ZP Constituency Dropdown -->

        </div>





<div class="row">
    <!-- E.E. Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="EE_Name">E.E. Name:</label>
    <select id="EE_Name" name="EE_Name" class="form-control" required>
    <option value="">-choose-</option>

@if(!empty($EEexcel) && count($EEexcel) > 0)
    <option value="{{ $EEexcel[0]->name }}" selected>{{ $EEexcel[0]->name }}</option>
@endif

@if(is_array($DBEE) || is_object($DBEE))
    @foreach ($DBEE as $ee)
        <option value="{{ $ee->name }}">{{ $ee->name }}</option>
    @endforeach
@endif

</select>
</div>
    </div>

    <!-- Dy.E. Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="DyE_Name">Dy.E. Name:</label>
    <select id="DyE_Name" name="DyE_Name" class="form-control" required>
    <option value="">-choose-</option>
    @if(!empty($DYEexcel) && count($DYEexcel) > 0)
        <option value="{{ $DYEexcel[0]->name }}" selected>{{ $DYEexcel[0]->name }}</option>
    @endif

    @if(is_array($DBDYE) || is_object($DBDYE))
        @foreach ($DBDYE as $dye)
            <option value="{{ $dye->name }}">{{ $dye->name }}</option>
        @endforeach
    @endif  
  </select>
</div>
    </div>

    <!-- S.O. Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="SO_Name">S.O. Name:</label>
    <select id="SO_Name" name="SO_Name" class="form-control" required>
    <option value="">-choose-</option>

@if(!empty($SOexcel) && count($SOexcel) > 0)
    <option value="{{ $SOexcel[0]->name }}" selected>{{ $SOexcel[0]->name }}</option>
@endif

@if(is_array($DBSO) || is_object($DBSO))
    @foreach ($DBSO as $so)
        <option value="{{ $so->name }}">{{ $so->name }}</option>
    @endforeach
@endif

</select>
</div>
    </div>

    <!-- S.D.C. Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="SDC_Name">S.D.C. Name:</label>
    <select id="SDC_Name" name="SDC_Name" class="form-control" required>
    <option value="">-choose-</option>

@if(!empty($SDCexcel) && count($SDCexcel) > 0)
    <option value="{{ $SDCexcel[0]->name }}" selected>{{ $SDCexcel[0]->name }}</option>
@endif

@if(is_array($DBSDC) || is_object($DBSDC))
    @foreach ($DBSDC as $sdc)
        <option value="{{ $sdc->name }}">{{ $sdc->name }}</option>
    @endforeach
@endif

</select>
</div>
    </div>
</div>


<div class="row">
    <!-- P.O. Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="PO_Name">P.O. Name:</label>
    <select id="PO_Name" name="PO_Name" class="form-control" required>
    @if(is_array($DBPO) || is_object($DBPO))
        @foreach ($DBPO as $po)
            <option value="{{ $po->name }}">{{ $po->name }}</option>
        @endforeach
        @endif
    </select>
</div>
    </div>


    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="panm">P.A. Name:</label>
    <select id="panm" name="panm" class="form-control" required>
        @foreach ($DBPA as $po)
            <option value="{{ $po->name }}">{{ $po->name }}</option>
        @endforeach

    </select>
</div>
    </div>




    <!-- Auditor Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="DAO_Name">Accountant Name:</label>
    <select id="DAO_Name" name="DAO_Name" class="form-control" required>
    <!-- @if(isset($DBDAO) )
                <option value="">- Choose -</option> -->
                <option value="">-choose-</option>

@if(!empty($DAOexcel) && count($DAOexcel) > 0)
    <option value="{{ $DAOexcel[0]->name }}" selected>{{ $DAOexcel[0]->name }}</option>
@endif

@if(is_array($DBDAO) || is_object($DBDAO))
    @foreach ($DBDAO as $dao)
        <option value="{{ $dao->name }}">{{ $dao->name }}</option>
    @endforeach
@endif

<!-- @endif -->
    </select>
</div>
    </div>

    <!-- Accountant Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="AB_Name">Auditor Name:</label>
    <select id="AB_Name" name="AB_Name" class="form-control" required>
    <option value="">-choose-</option>

@if(!empty($Auditorexcel) && count($Auditorexcel) > 0)
    <option value="{{ $Auditorexcel[0]->name }}" selected>{{ $Auditorexcel[0]->name }}</option>
@endif

@if(is_array($DBAB) || is_object($DBAB))
    @foreach ($DBAB as $ab)
        <option value="{{ $ab->name }}">{{ $ab->name }}</option>
    @endforeach
@endif    </select>
</div>
    </div>
</div>







    <div class="row">
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="Tot_Exp">Total Expenses:</label>
          <input type="text" id="Tot_Exp" disabled name="Tot_Exp" placeholder="Enter Total Expenses"
          class="form-control wk_info1">
        </div>
      </div>
      <div class="col-12 col-md-3 py-5">
              <div class="form-group">
                  <div class="form-check">
                      <input type="checkbox" id="work_comp" name="work_comp" class="form-check-input">
                      <label class="form-check-label" for="work_comp">Work Complete</label>
                  </div>
              </div>
      </div>
      <div class="col-12 col-md-3">
          <div class="form-group">
              <label for="actual_complete_date" class="wk_info2">Actual Date Completion:</label>
              <input type="date" id="actual_complete_date" name="actual_complete_date" class="form-control" disabled>
          </div>
      </div>

<!-- //submit button  -->
<!-- //submit button  -->
</div>
                      <div class="row">
                        <input type="submit" value="Submit"  class="btn btn-primary" id="submit-btn">
                      </div>

  </div><br><br><br>




  


         <!-- <div id="w_detail" class="tabcontent"> -->
         <div id="menu1" class="tab-pane fade">
                            <!-- <h3>Work Detail</h3> -->
                            <div class="col-md-12">
                            @if(count($errors))
        <div class="alert alert-danger">
            Upload validation error<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if($message = Session::get('success'))
        <strong>{{ $message }}</strong>
    @endif
    
                            </div>
                            
  <form id="excelForm" action="#" method="POST" enctype="multipart/form-data">
    
    <div id="responseDisplay" style="white-space: pre-wrap;"></div>

    <!-- <div class="row g-3">
        <div class="col-auto ms-auto">
            <label for="excel_File_id" class="visually-hidden">Excel file upload</label>
            <div class="col">
                <input type="file" name="excel_file" accept=".xls, .xlsx" id="excel_File_id">
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mb" id="importBtn">Import</button>
                 <button type="button" class="btn btn-primary mb" >Import</button> -->

            <!-- </div>
        </div>
    </div> --> 
</form>


<div id="loader" style="display: none;">Loading...</div>

                        @error('excel_file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror



                                        <div style="text-align: center;font-weight: bold ; color: red;">
                                                <label >Bill Of Quantities</label>
                                        </div> 
                                        <div id="contentContainer"></div>

                                        <!-- <div style="text-align: right;">
                                            <input type="submit" value="Import" class="btn btn-success">
                                        </div> -->




 <!-- <div class="container"> -->
                      <div class="table-responsive" id="tableContainer">           
          <table class="table table-bordered table-hover" id="myTable">
  <thead>
    <tr> 
    <th scope="col" class="text-center font-weight-bold">Item No</th>
          <th scope="col">Sub NO</th>
      <th scope="col">Descroption of Item</th>
      <th scope="col">Tendered Quantity</th>
      <th scope="col">Unit</th>
      <th scope="col">Tendered Rate</th>
      <th scope="col">Amount</th>
    </tr>
  </thead> 
  <tbody id="tableBody">
  @foreach ($DStnditems as $item)
      <tr>
        <td class="text-right ItemNoUnit">{{ $item->t_item_no }}</td>
        <td  class='ItemNoUnit'>{{ $item->sub_no }}</td>
        <td class="padded-cell">
          <div class="padded-content">{{ $item->item_desc }}</div>
        </td>
        <td class="ItemNoUnit text-right">{{ $item->tnd_qty }}</td>
        <td class='ItemNoUnit'>{{ $item->item_unit }}</td>
        <td class="ItemNoUnit text-right">{{ $item->tnd_rt }}</td>
        <td class="ItemNoUnit text-right">{{ $item->t_item_amt }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

<div class="pagination" id="pagination">
    <button id="prevPage" class="page-link">&lt;&lt;</button>
    <span class="pagination-list"></span>
    <button id="nextPage" class="page-link">&gt;&gt;</button>
</div>
<br><br>


<!-- <div class="pagination" ></div>
<button id="prevPage">Previous</button>
        <button id="nextPage">Next</button>
    </div>
 -->
        </div>
        </div>
        </div>          
      </form>          
        </div>
        </div>
</div>
</div>

<!-- amount put to tender calculation -->
<script>
  function calculateAmount() 
  {
    var amountInput = document.getElementById("Amount_Put_to_Tender");
    var aboveBelowInput = document.getElementById("Above_Below");
    var selectInput = document.getElementById("a_b");
    var woAmountInput = document.getElementById("WO_Amt");
    

    var originalAmount = parseFloat(amountInput.value);
    var percentage = parseFloat(aboveBelowInput.value);

    if (isNaN(originalAmount)) {
      amountInput.value = "";
      woAmountInput.value = "";
      return;
    }

    if (selectInput.value === "Above") {
      var calculatedAmount = originalAmount + (originalAmount * percentage) / 100;
      woAmountInput.value = calculatedAmount.toFixed(2);
    } else if (selectInput.value === "Below") {
      var calculatedAmount = originalAmount - (originalAmount * percentage) / 100;
      woAmountInput.value = calculatedAmount.toFixed(2);
    } else if (selectInput.value === "At Per") {
      woAmountInput.value = originalAmount.toFixed(2);
    }
  }
    // Add event listeners for input changes
    document.getElementById("Amount_Put_to_Tender").addEventListener("input", calculateAmount);
  document.getElementById("Above_Below").addEventListener("input", calculateAmount);
  document.getElementById("a_b").addEventListener("change", calculateAmount);


  // Call the function after the page has finished loading
  document.addEventListener("DOMContentLoaded", function() {
    calculateAmount();
  });
</script>
<!-- amount put to tender calculation -->

<!-- //import ajax -->
<div id="loader" style="display: none;">Loading...</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#importBtn").click(function() {
        $("#importBtn").prop("disabled", true);
        $("#loader").show();

        var formData = new FormData();
        formData.append("excel_file", $("#excel_File_id")[0].files[0]);

        $.ajax({
            type: 'POST',
            url: '{{ route("upload.excel") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                var importedData = response.importedData;
                var rowsWithWorkId = response.rowsWithWorkId;
                console.log(response);
                console.log(response.dataSheet4);

                $("#importBtn").prop("disabled", false);
                $("#loader").hide();

                if (response.errorssheet1) {
                    var errorMessages = '';

                    for (var field in response.errorssheet1) {
                        if (response.errorssheet1.hasOwnProperty(field)) 
                        {
                            errorMessages += response.errorssheet1[field].join('\n') + '\n';
                        }
                    }
                    alert("Validation Errors:\n" + errorMessages);
                } else if (importedData) {
                    // Process imported data
        //             if (importedData && importedData.length > 0) {
        //     var workId = importedData[0].work_Id;
        //     console.log(workId) // Assuming the work_Id is in the first row
        //     $("#workIdInput").val(workId); // Update the value of the input field
        // }
                    console.log(importedData);
                    alert("Data imported successfully!");

                    // Display imported data in the table
                    var tableBody = $("#tableBody");
                    tableBody.empty(); // Clear existing data

                    $.each(importedData, function(index, row) {
                        tableBody.append(
                            "<tr class='row-with-border'>" +
                            "<td class='text-right ItemNoUnit '>" + row.t_item_no + "</td>" +
                            "<td class='ItemNoUnit'>" + row.sub_no + "</td>" +
                            "<td class='padded-cell'><div class='padded-content'>" + row.item_desc + "</div></td>" +
                            "<td class='tndAmt text-right'>" + row.tnd_qty + "</td>" +
                            "<td class='ItemNoUnit'>" + row.item_unit + "</td>" +
                            "<td class='tndAmt text-right'>" + row.tnd_rt + "</td>" +
                            "<td class='tndAmt text-right'>" + row.t_item_amt + "</td>" +
                            "</tr>"
                        );
                    });
//check record is exist then hide import button 
                    if (importedData.length > 1) {
                        $("#importBtn").hide(); // Hide the Import button
                    } else {
                        $("#importBtn").show(); // Show the Import button
                    }
//check record is exist then hide import button 
                    // Pagination setup
                    var currentPage = 1;
                    var recordsPerPage = 10;
                    var totalRecords = importedData.length;
                    var totalPages = Math.ceil(totalRecords / recordsPerPage);
                    
  function updatePaginationButtons() {
    if (currentPage === 1) {
        $("#prevPage").prop("disabled", true);
    } else {
        $("#prevPage").prop("disabled", false);
    }

    if (currentPage === totalPages) {
        $("#nextPage").prop("disabled", true);
    } else {
        $("#nextPage").prop("disabled", false);
    }
}

                    function displayPage(pageNumber) {
                        var startIndex = (pageNumber - 1) * recordsPerPage;
                        var endIndex = Math.min(startIndex + recordsPerPage, totalRecords);
                        var pageData = importedData.slice(startIndex, endIndex);

                        tableBody.empty(); // Clear existing data

                        $.each(pageData, function(index, row) {
                            tableBody.append(
                                "<tr class='row-with-border'>" +
                                "<td class='text-right ItemNoUnit '>" + row.t_item_no + "</td>" +
                                "<td class='ItemNoUnit'>" + row.sub_no + "</td>" +
                                "<td class='padded-cell'><div class='padded-content'>" + row.item_desc + "</div></td>" +
                                "<td class='tndAmt text-right'>" + row.tnd_qty + "</td>" +
                                "<td class='ItemNoUnit'>" + row.item_unit + "</td>" +
                                "<td class='tndAmt text-right'>" + row.tnd_rt + "</td>" +
                                "<td class='tndAmt text-right'>" + row.t_item_amt + "</td>" +
                                "</tr>"
                            );
                        });

                        updatePaginationButtons();
                    }

                    // Pagination buttons
                    $("#prevPage").click(function() {
                        if (currentPage > 1) {
                            currentPage--;
                            displayPage(currentPage);
                        }
                    });

                    $("#nextPage").click(function() {
                        if (currentPage < totalPages) {
                            currentPage++;
                            displayPage(currentPage);
                        }
                    });

                    // Initial page display
                    displayPage(currentPage);
                }
            },
            error: function(xhr, status, error) {
                alert("An error occurred during the request.");
                $("#importBtn").prop("disabled", false);
                $("#loader").hide();
            }
        });
    });
});
</script>





<!-- //pagination on pre and next button when database throght get BOQ data -->
<script>
    $(document).ready(function() {
        var table = $('#myTable');
        var rowsPerPage = 10; // Number of rows to display per page
        var currentPage = 0; // Current page index

        // Calculate the total number of pages based on the number of rows and rows per page
        var totalPages = Math.ceil(table.find('tbody tr').length / rowsPerPage);

        // Generate pagination links dynamically
        generatePagination();

        // Show the first page and hide the rest of the rows
        showPage(0);

        // Function to show rows for the specified page index
        function showPage(pageIndex) {
            table.find('tbody tr').hide();
            var startIndex = pageIndex * rowsPerPage;
            var endIndex = startIndex + rowsPerPage;

            table.find('tbody tr').slice(startIndex, endIndex).show();

            // Update the current page index
            currentPage = pageIndex;

            // Disable/enable previous and next buttons based on the current page
            $('#prevPage').prop('disabled', currentPage === 0);
            $('#nextPage').prop('disabled', currentPage === totalPages - 1);

            // Update the selected page styling
            $('.page-link').removeClass('selected');
            $('.pagination-list button').eq(currentPage).addClass('selected');
        }

        // Function to generate pagination links dynamically
        function generatePagination() {
            var paginationContainer = $('.pagination-list');
            paginationContainer.empty();

            for (var i = 0; i < totalPages; i++) {
                var pageNumber = i + 1;
                var button = $('<button>').text(pageNumber).addClass('page-link');

                button.on('click', function() {
                    var selectedPage = parseInt($(this).text()) - 1;
                    showPage(selectedPage);
                });

                paginationContainer.append(button);
            }

            // Add event listeners to the previous and next buttons
            $('#prevPage').on('click', function() {
                if (currentPage > 0) {
                    currentPage--;
                    showPage(currentPage);
                }
            });

            $('#nextPage').on('click', function() {
                if (currentPage < totalPages - 1) {
                    currentPage++;
                    showPage(currentPage);
                }
            });

            // Set the initial styling for the first page
            $('.pagination-list button:first').addClass('selected');
        }
    });
</script>
<!-- //pagination on pre and next button when database throght get BOQ data -->





<!-- //division dropdown -->
<!--<script>-->
<!--    document.addEventListener('DOMContentLoaded', function () {-->
        <!--var divisions = @json($divisions); // Get the Division data from the Blade template-->
<!--        var divisionDropdown = document.getElementById('divisionDropdown');-->

        <!--// Loop through the divisions and add options to the dropdown-->
<!--        divisions.forEach(function (division) {-->
<!--            var option = document.createElement('option');-->
            <!--option.value = division.div; // Set the value to the Division's div field-->
            <!--option.textContent = division.div; // Set the display text for the option-->
<!--            divisionDropdown.appendChild(option);-->
<!--        });-->

        <!--// Set the selected option based on the value from $workData-->
<!--        divisionDropdown.value = @json($workData->div);-->
<!--    });-->
<!--</script>-->
<!-- //division dropdown -->
<!-- //subdivision dropdown -->
<!--<script>-->
<!--    document.addEventListener('DOMContentLoaded', function () {-->
        <!--var subdivisions = @json($Subdivisions); // Get the Sub Division data from the Blade template-->
<!--        var subDivisionDropdown = document.getElementById('subDivisionDropdown');-->

        <!--// Loop through the subdivisions and add options to the dropdown-->
<!--        subdivisions.forEach(function (subdivision) {-->
<!--            var option = document.createElement('option');-->
            <!--option.value = subdivision.Sub_Div; // Set the value to the Sub Division name-->
            <!--option.textContent = subdivision.Sub_Div; // Set the display text for the option-->
<!--            subDivisionDropdown.appendChild(option);-->
<!--        });-->

        <!--// Set the selected option based on the value from $workData-->
<!--        subDivisionDropdown.value = @json($workData->Sub_Div);-->
<!--    });-->
<!--</script>-->

<!-- //subdivision dropdown -->

<!-- //agencies dropdown list -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var agencies = @json($DBagencies); // Get the Agency data from the Blade template
        var agencyDropdown = document.getElementById('agencyDropdown');

        // Loop through the agencies and add options to the dropdown
        agencies.forEach(function (agency) {
            var option = document.createElement('option');
            option.value = agency.Agency_Nm; // Corrected to match the column name
            option.textContent = agency.Agency_Nm; // Corrected to match the column name
            agencyDropdown.appendChild(option);
        });

    });
</script>
<!-- //agencies dropdown list -->






<!-- //select taluka realated village  -->
<!-- JavaScript code in your Blade view -->
<script>
    // Add an event listener to the Taluka select element
    document.getElementById('Taluka').addEventListener('change', function () {
        var selectedTaluka = this.value;
        console.log(selectedTaluka);

        // Send an AJAX request to fetch villages
        $.ajax({
            url: '{{ route('getVillages') }}', // Use 'route' instead of 'url'
            type: 'GET',
            data: { taluka: selectedTaluka },
            success: function (data) {
                var villageSelect = document.getElementById('village');
                villageSelect.innerHTML = ''; // Clear existing options

                // Populate the Village select element with new options
                data.forEach(function (village) {
                    var option = document.createElement('option');
                    // option.value = village.Village_Id;
                    option.text = village.Village;
                    villageSelect.appendChild(option);
                });
            }
        });
    });
</script>
<!-- //select taluka realated village  -->

<!-- select vilage the return value -->
<script>
// Add an event listener to the Village select element
document.getElementById('village').addEventListener('change', function () {
    var selectedVillage = this.value;
    console.log(selectedVillage);

    // Send an AJAX request to fetch related IDs based on the selected Village
    $.ajax({
        url: '/get-related-ids-by-village', // Use the direct URL path here
        type: 'GET',
        data: { village: selectedVillage },
        success: function (data) {
            // Handle the data returned from the server
            console.log(data);

            // Assuming the data returned is an object with properties DBMLAname, DBMPname, DBpsname, and DBZPname
            var DBMLAname = data.DBMLAname;
            var DBMPname = data.DBMPname;
            var DBpsname = data.DBpsname;
            var DBZPname = data.DBZPname;

            // You can use these values as needed, for example, update form inputs
            // document.getElementById('PS_Consti').value = DBpsname;
            // document.getElementById('ZP_Consti').value = DBZPname;
            // document.getElementById('mla').value = DBMLAname;
            // document.getElementById('mp').value = DBMPname;

            $('#PS_Consti').val(DBpsname);
                $('#ZP_Consti').val(DBZPname);
                $('#mla').val(DBMLAname);
                $('#mp').val(DBMPname);
        }
    });
});
</script>
 <!-- select vilage the return value -->


<!-- //select mp then get related all mla all data -->
<script>
document.getElementById('mp').addEventListener('change', function () {
    var selectedMP = this.value;
    console.log(selectedMP);

    // Send an AJAX request to fetch related MLA data based on the selected MP
    $.ajax({
        url: '{{ route('getMLAByMP') }}', // Use 'route' instead of 'url'
        type: 'GET',
        data: { mp: selectedMP },
        success: function (data) {
            // Handle the data returned from the server
            console.log(data);

            // Assuming the data returned is an array of MLA data
            // Clear existing options in the "MLA" dropdown
            var mlaSelect = document.getElementById('mla');
            mlaSelect.innerHTML = '';

            // Populate the "MLA" dropdown with new options
            data.forEach(function (mla) {
                var option = document.createElement('option');
                option.value = mla.MLA_Con;
                option.text = mla.MLA_Con;
                mlaSelect.appendChild(option);
            });
        }
    });
});
</script>
<!-- //select mp then get related all mla all data -->




<!-- //when work completed checkbox is select that time actual date visible otherwise disabled -->
<script>
// Add an event listener to the "Work Complete" checkbox
document.getElementById('work_comp').addEventListener('change', function () {
  // Get the actual complete date input element
  var actualCompleteDateInput = document.getElementById('actual_complete_date');

  // Check if the checkbox is checked
  if (this.checked) {
    // If checked, enable the date input
    actualCompleteDateInput.disabled = false;
  } else {
    // If not checked, disable and clear the date input
    actualCompleteDateInput.disabled = true;
    actualCompleteDateInput.value = ''; // Clear the value
  }
});
</script>
<!-- //when work completed checkbox is select that time actual date visible otherwise disabled -->


<!-- //create stipulated date  -->
<script>
 function calculateCompletionDate() {
    var defaultperiod = $("#Perd_Unit").val();
    console.log(defaultperiod);
    var period = $('#Period').val();
    console.log(period);
        var StipCompDt = $('#Stip_Comp_Dt').val();
        var workorderdt= $('#Wo_Dt').val();
        if(defaultperiod == 'Day'){
            var date = new Date(workorderdt);
            date.setDate(date.getDate() + parseInt(period));
            var dateFormat1 = moment(date).format('YYYY-MM-DD');
            console.log(dateFormat1);
            $('#Stip_Comp_Dt').val(dateFormat1);
        }else if(defaultperiod == 'Month'){
            var date = new Date(workorderdt);
            date.setMonth(date.getMonth() + parseInt(period));
            date.setDate( date.getDate() - 1 );
            var dateFormatMonth = moment(date).format('YYYY-MM-DD');
            $('#Stip_Comp_Dt').val(dateFormatMonth);
        }
        else if(defaultperiod == 'Year')
        {
          var years = parseInt(period); // Extract integer part of years
          console.log(years);
        var months = Math.round((period - years) * 12); // Convert fractional part to months
        console.log(months);
        var date = new Date(workorderdt);
        console.log(date);
        date.setFullYear(date.getFullYear() + years);
        console.log(date);
        date.setMonth(date.getMonth() + months);
        console.log(date);
        date.setDate(date.getDate() - 1);
        console.log(date);
        var dateFormatYear = moment(date).format('YYYY-MM-DD');
        console.log("Value being set to #Stip_Comp_Dt:", dateFormatYear); 
        $('#Stip_Comp_Dt').val(dateFormatYear);
      }
        else{
            var date = new Date(workorderdt);
            var dateFormatSameAsDate = moment(date).format('YYYY-MM-DD');
            $('#Stip_Comp_Dt').val(dateFormatSameAsDate);
        }

  }
  $(document).ready(function () {
            // Set the default period to 'Day' and call the function
            //$("#Perd_Unit").val('Day');
            calculateCompletionDate();
        });

</script>
<!-- //create stipulated date  -->

<!-- //calculate above bellow effect workoder-amonount put to tender -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Get references to the input fields and the dropdown
        var woAmtInput = $('#WO_Amt');
        var tndAmtInput = $('#Amount_Put_to_Tender');
        var abEffectInput = $('#a_b_effect');
        var abDropdown = $('#a_b');
        var abPercentageInput = $('#Above_Below'); // Add this line

        // Function to calculate and update the "Above Bellow Effect" based on the dropdown selection and percentage
        function calculateABEffect() {
            var woAmt = parseFloat(woAmtInput.val()) || 0;
            var tndAmt = parseFloat(tndAmtInput.val()) || 0;
            var abSelection = abDropdown.val();
            var abPercentage = parseFloat(abPercentageInput.val()) || 0; // Get the percentage

            if (abSelection === 'Below') {
                var abEffect =  - (tndAmt * abPercentage / 100);
            } else if (abSelection === 'Above') {
                var abEffect =  + (tndAmt * abPercentage / 100);
            } else if (abSelection === 'At Per') {
                var abEffect = 0;
            } else {
                var abEffect = 0;
            }

            // Display the result in the console
            console.log("Work Order Amount (woAmt):", woAmt);
            console.log("Amount Put to Tender (tndAmt):", tndAmt);
            console.log("Above/Below Effect (abEffect):", abEffect);

            // Update the "Above Bellow Effect" input field with the calculated value
            abEffectInput.val(abEffect.toFixed(2));
        }

        // Attach the calculateABEffect function to the input fields' input events
        woAmtInput.on('input', calculateABEffect);
        tndAmtInput.on('input', calculateABEffect);
        abPercentageInput.on('input', calculateABEffect); // Add this line

        // Attach the calculateABEffect function to the dropdown's change event
        abDropdown.on('change', calculateABEffect);

        // Initial calculation when the page loads
        calculateABEffect();
    });
</script>


<!-- //calculate above bellow effect workoder-amonount put to tender -->

<!-- //agency find  button click model open -->
<div class="modal fade" id="agencySearchModal" tabindex="-1" role="dialog" aria-labelledby="agencySearchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!-- Remove the modal-header section -->
      <div class="modal-body">
        <form id="agencySearchForm">
          @csrf
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Agency Name:</label>
            <div class="col-sm-1">
              <input type="checkbox" id="agencyCheckbox" class="form-check-input">
            </div>

            <div class="col-sm-8">
              <input type="text" class="form-control" id="agencyName" placeholder="Enter agency name">
              <div id="agencyResults" style="position: absolute; z-index: 1000; background-color: white; width: 500px;  border: 1px solid #ccc;"></div>
            </div>
          </div>
          <div class="form-group row">
            <label for="placeName" class="col-sm-3 col-form-label">Place:</label>
            <div class="col-sm-1">
              <input type="checkbox" id="placeCheckbox" class="form-check-input">
            </div>

            <div class="col-sm-8">
              <input type="text" class="form-control" id="placeName" placeholder="Enter place">
              <div id="placeResults" style="position: absolute; z-index: 1000; background-color: white; width: 500px;  border: 1px solid #ccc;"></div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Contact No:</label>
            <div class="col-sm-1">
              <input type="checkbox" id="contactCheckbox" class="form-check-input">
            </div>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="contact" placeholder="Enter agency name">
              <div id="contactResults" style="position: absolute; z-index: 1000; background-color: white; width: 500px;  border: 1px solid #ccc;"></div>
            </div>
          </div>

          <div class="form-group row">
  <label for="pancard" class="col-sm-3 col-form-label">Pan Card NO:</label>
  <div class="col-sm-1">
    <input type="checkbox" id="pancardCheckbox" class="form-check-input">
  </div>
  <div class="col-sm-8">
    <input type="text" class="form-control" id="pancard" placeholder="Enter agency name">
    <div id="panResults" style="position: absolute; z-index: 1000; background-color: white; width: 500px; border: 1px solid #ccc;"></div>
  </div>
</div>
          <!-- Add more form groups for additional fields if needed -->
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <div class="table-responsive">
          <table id="agencyTable" class="table">
            <thead>
              <tr>
                <th>Agency Name</th>
                <th>Place</th>
                <th>Contact No</th>
                <th>PanCard No</th>
                <th>Checkbox</th>
                <!-- Add more table headers as needed -->
              </tr>
            </thead>
            <!-- Table rows will be dynamically added here -->
            <tbody id="tablebody">
              <!-- Table rows will be dynamically added here -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- find agency  -->
<script>
$(document).ready(function() {
   var agencyNameInput = $('#agencyName');
   var placeNameInput = $('#placeName');
   var contactInput = $('#contact');
   var panInput = $('#pancard');
   console.log(panInput);
      var agencyResults = $('#agencyResults');
   var placeResults = $('#placeResults');
   var contactResults = $('#contactResults');
   var panResult = $('#panResults');
   $(document).click(function(event) {
   var target = $(event.target);
   if (
      !target.is(agencyResults) && !target.is(agencyNameInput) &&
      !target.is(placeResults) && !target.is(placeNameInput) &&
      !target.is(contactResults) && !target.is(contactInput) &&
      !target.is(panResult) && !target.is(panInput)
   ) {
      agencyResults.empty();
      placeResults.empty();
      contactResults.empty();
      panResult.empty();
   }
});
   // Create a function to handle the search for agency names
   function performAgencySearch(searchQuery) {
      $.ajax({
         url: '{{ url('searchAgencyName') }}',
         method: 'GET',
         data: { agencyName: searchQuery },
         dataType: 'json',
         success: function(data) {
            console.log(data);
            displayResults(data.DBagencyname, agencyResults);
         },
         error: function() {
            console.error('Error performing agency name search');
         }
      });
    }
   // Create a function to handle the search for place names
   function performPlaceSearch(searchQuery) {
      $.ajax({
         url: '{{ url('searchPlaceName') }}',
         method: 'GET',
         data: { placeName: searchQuery },
         dataType: 'json',
         success: function(data) {
            console.log(data);
            displayResults(data.DBplace, placeResults);
         },
         error: function() {
            console.error('Error performing place name search');
         }
      });
   }
   // Create a function to handle the search for contacts
   function performContactSearch(searchQuery) {
      $.ajax({
         url: '{{ url('searchContact') }}',
         method: 'GET',
         data: { contact: searchQuery },
         dataType: 'json',
         success: function(data) {
            console.log(data);
            displayResults(data.DBcontact, contactResults);
         },
         error: function() {
            console.error('Error performing contact search');
         }
      });
   }

   function performPanSearch(searchQuery) {
      $.ajax({
         url: '{{ url('searchpanno') }}',
         method: 'GET',
         data: { pancard: searchQuery },
         dataType: 'json',
         success: function(data) {
            console.log(data);
            displayResults(data.DBPan, panResult);
         },
         error: function() {
            console.error('Error performing PAN card search');
         }
      });
   }

   // Create a function to display the search results
   function displayResults(results, resultContainer) {
   resultContainer.empty();

   results.forEach(function(result) {
      var resultElement = $('<div>').addClass('agency-result').text(result.agency_nm);

      if (resultContainer === agencyResults) {
         resultElement.text(result.agency_nm);
      } else if (resultContainer === placeResults) {
         resultElement.text(result.Agency_Pl);
      } else if (resultContainer === contactResults) {
         resultElement.text(result.Contact_Person1);
      }
      else if (resultContainer === panResult) {
         resultElement.text(result.Pan_no);
      }
      resultElement.click(function() {
         if (resultContainer === agencyResults) {
            agencyNameInput.val(result.agency_nm);
         } else if (resultContainer === placeResults) {
            placeNameInput.val(result.Agency_Pl);
         } else if (resultContainer === contactResults) {
            contactInput.val(result.Contact_Person1);
         }
         else if (resultContainer === panResult) {
          panInput.val(result.Pan_no);
         }
         resultContainer.empty();
      });
    resultContainer.append(resultElement);
   });
}   // Listen for input changes in the respective input fields
   agencyNameInput.on('input', function() {
      var searchQuery = agencyNameInput.val();
      performAgencySearch(searchQuery);
   });

   placeNameInput.on('input', function() {
      var searchQuery = placeNameInput.val();
      performPlaceSearch(searchQuery);
   });

   contactInput.on('input', function() {
      var searchQuery = contactInput.val();
      performContactSearch(searchQuery);
   });

   panInput.on('input', function() {
      var searchQuery = panInput.val();
      performPanSearch(searchQuery);
   });
});
</script>
<!-- find agency  -->



<!-- //search button click that time display table detail related that data -->
<script>
   var selectedAgency = '';
   var checkboxSelections = {};
   var previousCheckbox = null;
$(document).ready(function ()
 {
  // Handle form submission
  $("#agencySearchForm").submit(function (e)
   {
    e.preventDefault(); // Prevent the form from submitting in the traditional way

var agencyName = $("#agencyName").val();
var placeName = $("#placeName").val();
var contact = $("#contact").val();
var pancard = $("#pancard").val(); // Corrected this line
console.log("agencyName:", agencyName);
console.log("placeName:", placeName);
console.log("contact:", contact);
console.log("pancard:", pancard);
var agencyCheckbox = $("#agencyCheckbox").is(":checked");
var placeCheckbox = $("#placeCheckbox").is(":checked");
var contactCheckbox = $("#contactCheckbox").is(":checked");
var pancardCheckbox = $("#pancardCheckbox").is(":checked");
console.log("agencyCheckbox:", agencyCheckbox);
console.log("placeCheckbox:", placeCheckbox);
console.log("contactCheckbox:", contactCheckbox);
console.log("pancardCheckbox:", pancardCheckbox);

    // Make an AJAX request to your backend
    $.ajax({
      url: '{{ url('relatedAgencynameDBDetail') }}',
      method: 'POST',
      data: 
      {
        agencyName: agencyName,
        placeName: placeName,
        contact: contact,
        pancard: pancard,
        agencyCheckbox: agencyCheckbox,
        placeCheckbox: placeCheckbox,
        contactCheckbox: contactCheckbox,
        pancardCheckbox: pancardCheckbox
      },
      headers: 
      {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'json',
      success: function (data) {
        console.log("AJAX request successful");
        console.log("Agency name selected all data display:", data);
        // Clear existing table data
        $("#tablebody").empty();

        // Populate the table with data from the backend
        data.forEach(function (row) {
          var tableRow = $("<tr>");
          tableRow.append($("<td>").text(row.agency_nm));
          tableRow.append($("<td>").text(row.Agency_Pl));
          tableRow.append($("<td>").text(row.Contact_Person1));
          tableRow.append($("<td>").text(row.Pan_no));

          // Create a checkbox with Bootstrap classes
          var checkboxCell = $("<td>");
  var checkbox = $("<input>")
  .attr("type", "checkbox")
  .addClass("form-check-input")
  .attr("value", row.agency_nm); // Set the value of the checkbox



  if (checkboxSelections[row.agency_nm]) 
  {
                        checkbox.prop("checked", true);
  }

            checkbox.on("change", function () 
            {
  // Uncheck the previously selected checkbox
  if (previousCheckbox && previousCheckbox != this) 
  {
    $(previousCheckbox).prop("checked", false);
  }

  // Update the checkboxSelections object when the checkbox state changes
  checkboxSelections[row.agency_nm] = $(this).is(":checked");

  // Log the updated checkboxSelections object
  console.log("Checkbox Selections:", checkboxSelections);

  // Update the selected agency name in the dropdown
  selectedAgency = row.agency_nm;
  $("#agencyDropdown").val(row.agency_nm); // Set the selected value
  console.log("Agency Name:", selectedAgency);

  // Store the current checkbox as the previous checkbox
  previousCheckbox = this;
});
          checkboxCell.append(checkbox);
          tableRow.append(checkboxCell);
          $("#tablebody").append(tableRow);
        });

        $("#agencyDropdown").val(selectedAgency);
      },
      error: function () 
      {
        console.error('Error fetching data from the backend');
      }
    });
  });
});
</script>
<!-- //search button click that time display table detail related that data --> 




<!-- //find agency check box is checked then visible inputtext -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Agency Name
    const agencyCheckbox = document.getElementById("agencyCheckbox");
  const agencyNameInput = document.getElementById("agencyName");

  agencyCheckbox.addEventListener("change", function() {
    if (agencyCheckbox.checked) {
      agencyNameInput.removeAttribute("disabled");
    } else {
      agencyNameInput.setAttribute("disabled", "disabled");
      agencyNameInput.value = ""; // Clear the input field value
    }
  });
  // Set initial state based on checkbox
  if (agencyCheckbox.checked) {
    agencyNameInput.removeAttribute("disabled");
  } else {
    agencyNameInput.setAttribute("disabled", "disabled");
    agencyNameInput.value = ""; // Clear the input field value
  }
  // Place
  const placeCheckbox = document.getElementById("placeCheckbox");
    const placeNameInput = document.getElementById("placeName");

    placeCheckbox.addEventListener("change", function() {
      if (placeCheckbox.checked) {
        placeNameInput.removeAttribute("disabled");
      } else {
        placeNameInput.setAttribute("disabled", "disabled");
        placeNameInput.value = ""; // Clear the input field when unchecked
      }
    });

    // Set initial state based on checkbox
    if (placeCheckbox.checked) 
    {
      placeNameInput.removeAttribute("disabled");
    } else 
    {
      placeNameInput.setAttribute("disabled", "disabled");
    }

    // Contact No
    const contactCheckbox = document.getElementById("contactCheckbox");
    const contactInput = document.getElementById("contact");

    contactCheckbox.addEventListener("change", function() {
      if (contactCheckbox.checked) {
        contactInput.removeAttribute("disabled");
      } else {
        contactInput.setAttribute("disabled", "disabled");
        contactInput.value = ""; // Clear the input field when unchecked
      }
    });

    // Set initial state based on checkbox
    if (contactCheckbox.checked) {
      contactInput.removeAttribute("disabled");
    } else {
      contactInput.setAttribute("disabled", "disabled");
    }

    // Pan Card NO
    const pancardCheckbox = document.getElementById("pancardCheckbox");
    const pancardInput = document.getElementById("pancard");

    pancardCheckbox.addEventListener("change", function() {
      if (pancardCheckbox.checked) {
        pancardInput.removeAttribute("disabled");
      } else {
        pancardInput.setAttribute("disabled", "disabled");
        pancardInput.value = ""; // Clear the input field when unchecked
      }
    });

    // Set initial state based on checkbox
    if (pancardCheckbox.checked) 
    {
      pancardInput.removeAttribute("disabled");
    } else {
      pancardInput.setAttribute("disabled", "disabled");
    }
  });
</script>

<!-- //find agency check box is checked then visible inputtext --> 


   
@endsection()
