@extends("layouts.header")
@section('content')
<style>
      /* .custom-navbar {
            background-color: #333;
            color: #fff;
        }

        .custom-navbar .navbar-brand {
            color: #fff;
        }

        .custom-navbar .navbar-nav .nav-link {
            color: #fff;
        }

        .custom-navbar .navbar-nav .nav-link:hover {
            color: #ff5733; /* Change the hover color as desired */
        /* }  */



    
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
        .nav-pills .nav-link 
        {
                  color: #17202A ; /* Text color */
                  background-color: #D5DBDB ; /* Background color */
                  font-weight: bold; /* Make the tab buttons bold */
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

.zp_btn_tab:not(.active):hover {
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
  .container {
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

/* Remove border from the last row */
/* .row-with-border:last-child {
    border-bottom: none;
} */
/* Remove border from the last <td> element in each row */



/* //paggination number appy */
.pagination-btn {
    /* Your default button styling here */
    background-color: #f5f5f5;
    color: #007bff; /* Blue color for text */
    border: 1px solid #ddd;
    padding: 5px 10px;
    margin: 2px;
    cursor: pointer;
}

.pagination-btn.active {
    /* Styling for the active button */
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
}
/* //paggination number appy style  */

   </style>
  
@include('sweetalert::alert')

<!-- <div class="container"> -->
<h2 style="text-align: center;"><b>Work Master</b></h2>
<div class="container-fluid">

        

    <form action="{{ url('updateworkroute/'.$DSWorkmaster->Work_Id) }}"  id="my-form"  method="post">
    @csrf
              <div class="row m-2">
              <div class="col-12 col-sm-3 col-md-3 col-lg-2">
    <label for="div_name" class="font-weight-bold">Division Name:</label>
</div>
<div class="col-12 col-sm-4 col-md-4 col-lg-4">
    <select id="Div" class="form-control" style="max-width: 280px;" name="Div">
        @foreach($divisions as $division)
            <option value="{{ $division->div }}">{{ $division->div }}</option>
        @endforeach
    </select>
</div>
                                  <div class="col-sm-2 col-md-2 col-lg-2">
            <label for="" class="font-weight-bold">Work Id:</label>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-4">
            <!-- <input type="text" id="workIdInput" class="form-control" name="work_Id"> -->
            <input type="text" id="workIdInput" class="form-control" name="work_id" value="{{$DSWorkmaster->Work_Id ?? ''}}">

        </div>
              </div>

            <div class="row m-2">
            <div class="col-12 col-sm-3 col-md-3 col-lg-2">
    <label for="div_name" class="font-weight-bold">Sub Division Name:</label>
</div>
<div class="col-12 col-sm-4 col-md-4 col-lg-4">
<input type="text" class="form-control" value="{{ $Subdivisions }}" name="Sub_Div" readonly>
    <!-- <select id="Sub_Div" class="form-control" style="max-width: 280px;" name="Sub_Div">

    @if (!empty($Subdivisions))
      <option value="{{ $Subdivisions }}" selected>{{ $Subdivisions }}</option>
    @endif

    @foreach($Subdivisionslist as $Subdivlist)
        <option value="{{ $Subdivlist->Sub_Div }}">{{ $Subdivlist->Sub_Div }}</option>
    @endforeach
    </select> -->
</div>
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                        <label for="" class="font-weight-bold">Fund Head:</label>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
                                        <input type="text" id="" class="form-control" name="FH_code" value="{{$DSWorkmaster->F_H_Code ?? ''}}">
                                    </div>
            </div>


            <div class="row m-2">
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                        <label for="" class="font-weight-bold">Name of Work:</label>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <textarea name="Work_Nm" class="form-control" rows="3" cols="53">{{$DSWorkmaster->Work_Nm }}</textarea>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                    <label for="" class="font-weight-bold">name of work Marathi</label>

                                    <!-- <label for="" class="font-weight-bold"><small>Amount Put to Tender:</small></label> -->
                                  </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
                                    <textarea name="Work_Nm_M" class="form-control" rows="3" cols="53">{{$DSWorkmaster->Work_Nm_M }}</textarea>

                                    <!-- <input type="text" id="" class="form-control" name=""  > -->

                                        <!-- <input type="text" id="Amount_Put_to_Tender" class="form-control" name="Tnd_Amt" value="{{$DSWorkmaster->Tnd_Amt }}" > -->
                                    </div>
            </div>





            <div class="row m-2">
            <div class="col-12 col-sm-3 col-md-3 col-lg-2">
    <label for="workType" class="font-weight-bold">Type of Work</label>
</div>
<div class="col-12 col-sm-4 col-md-4 col-lg-4">
    <select id="workType" class="form-control" style="max-width: 280px;" name="workType" >
        <!-- <option value="Road">Road</option>
        <option value="Building">Building</option>
        <option value="Bridge">Bridge</option>
        <option value="CD">CD</option> -->
        <option value="Below" {{ $DSWorkmaster->Work_Type == 'Road' ? 'selected' : '' }}>Road</option>
    <option value="Above" {{ $DSWorkmaster->Work_Type == 'Building' ? 'selected' : '' }}>Building</option>
    <option value="At Per" {{ $DSWorkmaster->Work_Type == 'Bridge' ? 'selected' : '' }}>Bridge</option>
    <option value="At Per" {{ $DSWorkmaster->Work_Type == 'CD' ? 'selected' : '' }}>CD</option>
    </select>
</div>                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                    <label for="" class="font-weight-bold">Area of Work</label>

                                    <!-- <label for="" class="font-weight-bold"><small>Amount Put to Tender:</small></label> -->
                                  </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
        <input type="text" id="" class="form-control" name="workarea" value="{{$DSWorkmaster->Work_Area }}">

                                    <!-- <input type="text" id="" class="form-control" name=""  > -->

                                        <!-- <input type="text" id="Amount_Put_to_Tender" class="form-control" name="Tnd_Amt" value="{{$DSWorkmaster->Tnd_Amt }}" > -->
                                    </div>
            </div>




            <div class="row m-2">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                            <label for="" class="font-weight-bold ">SSR Year:</label>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <!-- <input type="text" id="" class="form-control" name="DSR_year"> -->
                            <input type="text" id="" class="form-control form-select" style="max-width: 280px;" name="SSR_year" value="{{$DSWorkmaster->SSR_Year }}">

                            <!-- <select id="" class="form-control form-select" style="max-width: 280px;" name="DSR_year">
                                            <option></option>
                                        </select> -->
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                        <label for="" class="font-weight-bold">Amount Put to Tender:</label>
                                  </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
                                    <input type="text" id="Amount_Put_to_Tender" class="form-control" name="Tnd_Amt" value="{{$DSWorkmaster->Tnd_Amt }}" >
                                    </div>

            </div>


            <div class="row m-2">
            <div class="col-12 col-sm-3 col-md-3 col-lg-2">
    <label for="" class="font-weight-bold">Agency Name</label>
</div>
<div class="col-12 col-sm-4 col-md-4 col-lg-4">
    <select id="agencyDropdown" class="form-control" name="agency">
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
            <input type="text" id="AA_No" name="AA_No" class="form-control" placeholder="Enter A.A. No" 
            value="{{$DSWorkmaster->AA_No }}">
        </div>
    </div>
    <!-- Column 2 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Date">AA. Date:</label>
            <!-- <input type="text" id="AA_Date" name="AA_Date" class="form-control"
             placeholder="Enter A.A. Date" value="{{$DSWorkmaster->AA_Dt }}"> -->
             <input type="text" id="AA_Date" name="AA_Date" class="form-control" placeholder="Enter A.A. Date"
       value="{{ \Carbon\Carbon::parse($DSWorkmaster->AA_Dt)->format('d/m/Y') }}">

        </div>
    </div>
    <!-- Column 3 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Amount">AA. Amount:</label>
            <input type="text" id="AA_Amount" name="AA_Amount" class="form-control"
             placeholder="Enter A.A. Amount" value="{{$DSWorkmaster->AA_Amt }}">
        </div>
    </div>
    <!-- Column 4 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Authority">AA. Authority:</label>
            <input type="text" id="AA_Authority" name="AA_Authority" class="form-control"
             placeholder="Enter A.A. Authority"  value="{{$DSWorkmaster->AA_Authority }}">
        </div>
    </div>
</div>




<div class="row">
    <!-- Column 1 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_No">TS. No:</label>
            <input type="text" id="TS_No" name="TS_No" class="form-control"
             placeholder="Enter A.A. No"
            value="{{$DSWorkmaster->TS_No }}">
        </div>
    </div>
    <!-- Column 2 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Date">TS. Date:</label>
            <!-- <input type="text" id="TS_Date" name="TS_Date" class="form-control" 
            placeholder="Enter A.A. Date" value="{{$DSWorkmaster->TS_Dt }}"> -->
            <input type="date" id="TS_Date" name="TS_Date" class="form-control" 
       placeholder="Enter TS Date" value="{{$DSWorkmaster->TS_Dt }}">

        </div>
    </div>
    <!-- Column 3 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Amount">TS Amount:</label>
            <input type="text" id="TS_Amount" name="TS_Amount" class="form-control"
             placeholder="Enter A.A. Amount" value="{{$DSWorkmaster->TS_Amt }}">
        </div>
    </div>
    <!-- Column 4 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="AA_Authority">TS Authority:</label>
            <input type="text" id="TS_Authority" name="TS_Authority"
             class="form-control" placeholder="Enter A.A. Authority" 
             value="{{$DSWorkmaster->TS_Authority }}">
        </div>
    </div>
</div>

    <div class="row">
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="WO_No">Work Order No:</label>
          <input type="text" id="WO_No" name="WO_No" class="form-control" value="{{$DSWorkmaster->WO_No ?? ''}}">
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="Wo_Dt" class="wk_info2">Work Order Date:</label>
          <input type="date" id="Wo_Dt" name="Wo_Dt" class="form-control" value="{{$DSWorkmaster->Wo_Dt ?? ''}}">
        </div>
      </div>
      <div class="col-12 col-md-3">
      <div class="form-group">
  <label for="">Work Order Amount</label>
  <input type="text" id="WO_Amt" name="WO_Amt" class="form-control wk_info1" value="{{$DSWorkmaster->WO_Amt ?? ''}}">
</div>
      </div>

      <div class="col-12 col-md-3">
        <div class="form-group">
  <label for="">Above bellow effect</label>
  <input type="text" id="a_b_effect" name="a_b_effect" class="form-control wk_info1"
  value="{{$DSWorkmaster->abeffect ?? ''}}" readonly >
        </div>
    </div>

    </div>


  <div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
                <label for="Agree_No">Agreement No:</label>
                <input type="text" id="Agree_No" name="Agree_No" placeholder="Enter Agreement No."
                class="form-control"   value="{{$DSWorkmaster->Agree_No }}" readonly>
        </div>
    </div>
    <!-- Column 2 -->
    <div class="col-12 col-md-3">
        <div class="form-group">
                <label for="Agree_Dt" class="wk_info2">Agreement Date:</label>
                <input type="date" id="Agree_Dt" name="Agree_Dt" placeholder="Enter Agreement Date."
                class="form-control"  value="{{$DSWorkmaster->Agree_Dt }}" readonly >
        </div>
    </div>
  </div>






    <div class="row">
      <div class="col-12 col-md-3">
      <div class="form-group">
  <label for="Above_Below">Below/Above percentage :</label>
  <input type="text" id="Above_Below" name="Above_Below" class="form-control" value="{{$DSWorkmaster->A_B_Pc ?? ''}}"
  onchange="calculateAmount()">
</div>
 </div>
 <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="a_b" class="ml-1">Below/Above</label>
            <select id="a_b" class="form-control form-select" name="A_B_Pc" style="max-width: 250px;" onchange="calculateAmount()">
    <option value="Below" {{ $DSWorkmaster->Above_Below == 'Below' ? 'selected' : '' }}>Below</option>
    <option value="Above" {{ $DSWorkmaster->Above_Below == 'Above' ? 'selected' : '' }}>Above</option>
    <option value="At Per" {{ $DSWorkmaster->Above_Below == 'At Per' ? 'selected' : '' }}>At Per</option>
</select>
        </div>     
    </div>   
    <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="">Time Limit:</label>
          <!-- <input type="text" id="Period" name="Period" class="form-control wk_info1" onkeyup="calculateCompletionDate()" > -->

          <input type="text" id="Period" name="Period" class="form-control wk_info1"
           value="{{$DSWorkmaster->Period ?? ''}}"  onkeyup="calculateCompletionDate()">
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for=""></label>
<!-- <select id="Perd_Unit" name="Perd_Unit" class="form-control" style="max-width:250px;" onchange="calculateCompletionDate()"> -->
<!-- {{$DSWorkmaster->Perd_Unit}} -->
<select id="Perd_Unit" name="Perd_Unit" class="form-control" onchange="calculateCompletionDate()" style="max-width:250px;">
    @if(isset($DSWorkmaster->Perd_Unit) && !empty($DSWorkmaster->Perd_Unit))   
    <option value="{{ $DSWorkmaster->Perd_Unit }}" selected>{{ $DSWorkmaster->Perd_Unit }}</option>
    @endif

    <option value="" selected>-Choose-</option>
    <option value="Day">Day</option>
    <option value="Month">Month</option>
    <option value="Year">Year</option>
</select>
        </div>
      </div>

     </div>

    <div class="row">
      <!-- <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="">Time Limit:</label>
          <input type="text" id="Period" name="Period" class="form-control wk_info1" value="{{$DSWorkmaster->Period ?? ''}}">
        </div>
      </div> -->
      <!-- <div class="col-12 col-md-3">
        <div class="form-group">
          <label for=""></label>
          <select id="Perd_Unit" name="Perd_Unit" class="form-control"  style="max-width:250px;">
            <option selected>Day</option>
            <option>Month</option>
            <option>Year</option>
          </select>
        </div>
      </div> -->
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="Stip_Comp_Dt" class="wk_info4">Stipulated Date of Completion:</label>
          <input type="date" id="Stip_Comp_Dt" name="Stip_Comp_Dt" class="form-control" value="{{$DSWorkmaster->Stip_Comp_Dt ?? ''}}">
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="tm_lm_extension">Time Limit Extension:</label>
          <input type="text" id="tm_lm_extension" name="tm_lm_extension" class="form-control wk_info1" value="{{$DSWorkmaster->tm_lm_extension ?? ''}}">
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="form-group">
          <!-- <label for="" class="ml-1">Days</label> -->
          <label for="" class="ml-3 wk_info3">Revised Date of Completion:</label>
          <input type="date" id="rs_dt_comp" name="rs_dt_comp" class="form-control" value="{{$DSWorkmaster->rs_dt_comp ?? ''}}">
        </div>
      </div>

    </div>

    <!-- <div class="row">
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="tm_lm_extension">Time Limit Extension:</label>
          <input type="text" id="tm_lm_extension" name="tm_lm_extension" class="form-control wk_info1" value="{{$DSWorkmaster->tm_lm_extension ?? ''}}">
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="" class="ml-1">Days</label>
          <label for="" class="ml-3 wk_info3">Revised Date of Completion:</label>
          <input type="date" id="rs_dt_comp" name="rs_dt_comp" class="form-control" value="{{$DSWorkmaster->rs_dt_comp ?? ''}}">
        </div>
      </div>
    </div> -->

    <div class="row">
    <!-- Taluka Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
        <label for="Taluka">Taluka:</label>
<!-- Select for Taluka -->
    <select id="Taluka" name="Taluka" class="form-control">
        
        @foreach ($DBTalukalist as $taluka)
            <option value="{{ $taluka->Tal }}" {{ in_array($taluka->Tal, $DBTal->pluck('Tal')->toArray()) ? 'selected' : '' }}>
                {{ $taluka->Tal }}
            </option>
        @endforeach
    </select>
    </div>
</div>

    <!-- Village Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
        <label for="village">Village:</label>
    <select id="village" name="village" class="form-control">
    @if ($dbvillagename->isNotEmpty())
    <option value="{{ $dbvillagename->first()->Village }}" selected>{{ $dbvillagename->first()->Village }}</option>
    @endif

    @foreach($dbVillagelis as $village)
                <option value="{{ $village->Village }}">{{ $village->Village }}</option>
    @endforeach

    </select>
    </div>
</div>


<div class="col-12 col-md-3">
    <div class="form-group">
    <label for="PO_Name">MP:</label>
    <select id="mp" name="mp" class="form-control">
    @foreach ($DBMPlist as $mp)
            <option value="{{ $mp->MP_Con }}">{{ $mp->MP_Con }}</option>
        @endforeach
    </select>
  </div>
    </div>

    <!-- Auditor Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="mla_Name">MLA:</label>
    <select id="mla" name="mla_Name" class="form-control">
    @foreach ($DBMLAlist as $mla)
            <option value="{{ $mla->MLA_Con }}">{{ $mla->MLA_Con }}</option>
        @endforeach
    </select>
      </div>
        </div>



    <!-- PS Constituency Dropdown -->
</div>



<div class="row">

    <!-- ZP Constituency Dropdown -->
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="ZP_Constituency">ZP Constituency:</label>
            <select id="ZP_Constituency" name="ZP_Constituency" class="form-control">
        @foreach ($DBZPname as $zp)
            <option value="{{ $zp->ZP_Con }}" selected>{{ $zp->ZP_Con }}</option>
        @endforeach
        @foreach ($DBZPconstlist as $zpconst)
            <option value="{{ $zpconst->ZP_Con }}">{{ $zpconst->ZP_Con }}</option>
        @endforeach
    </select>       
   </div>
    </div>

    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="PS_Constituency">PS Constituency:</label>
    <select id="PS_Constituency" name="PS_Constituency" class="form-control">
        @foreach ($psName as $ps)
            <option value="{{ $ps->PS_Con }}" selected>{{ $ps->PS_Con }}</option>
        @endforeach
        @foreach ($DBpsconstlist as $psconst)
            <option value="{{ $psconst->PS_Con }}">{{ $psconst->PS_Con }}</option>
        @endforeach
    </select>
</div>
</div>



</div>





<div class="row">
    <!-- E.E. Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="EE_Name">E.E. Name:</label>

    <!-- <select id="EE_Name" name="EE_Name" class="form-control">
    <option value="">-choose-</option>
    @if(!empty($PreviousselectedEE))
        <option value="{{ $PreviousselectedEE }}" selected>{{ $PreviousselectedEE }}</option>
        @endif

        @if(is_array($DBEElist) || is_object($DBEElist))
            @foreach ($DBEElist as $EE)
                <option value="{{ $EE->name }}">{{ $EE->name }}</option>
            @endforeach
        @endif
  
  </select> -->
  <select id="EE_Name" name="EE_Name" class="form-control">
    <option value="">-choose-</option>
    @if(!empty($PreviousselectedEE))
        @php $selectedValue = $PreviousselectedEE; @endphp
        <option value="{{ $selectedValue }}" selected>{{ $selectedValue }}</option>
    @endif

    @if(is_array($DBEElist) || is_object($DBEElist))
        @foreach ($DBEElist as $EE)
            @if(empty($PreviousselectedEE) || $EE->name != $PreviousselectedEE)
                <option value="{{ $EE->name }}">{{ $EE->name }}</option>
            @endif
        @endforeach
    @endif
</select>
  </div>
    </div>

    <!-- Dy.E. Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="DyE_Name">Dy.E. Name:</label>
    <select id="DyE_Name" name="DyE_Name" class="form-control">
    <option value="">-choose-</option>

@if(!empty($preselectDYE))
<option value="{{ $preselectDYE }}" selected>{{ $preselectDYE }}</option>
@endif

@if(is_array($DBDYElist) || is_object($DBDYElist))
    @foreach ($DBDYElist as $dye)
    @if(empty($preselectDYE) || $dye->name != $preselectDYE)
        <option value="{{ $dye->name }}">{{ $dye->name }}</option>
        @endif
    @endforeach
@endif
    </select>
  </div>
    </div>

    <!-- S.O. Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="SO_Name">S.O. Name:</label>
    <select id="SO_Name" name="SO_Name" class="form-control">
      
    <option value="">-choose-</option>
    @if(!empty($PreviousseleSO) )
    <option value="{{ $PreviousseleSO }}" selected>{{ $PreviousseleSO }}</option>
@endif

@if(is_array($DBSOlist) || is_object($DBSOlist))
    @foreach ($DBSOlist as $so)
        @if(empty($PreviousseleSO) || $so->name != $PreviousseleSO)
        <option value="{{ $so->name }}">{{ $so->name }}</option>
        @endif

    @endforeach
@endif


</select></div>
    </div>

    <!-- S.D.C. Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="SDC_Name">S.D.C. Name:</label>
    <select id="SDC_Name" name="SDC_Name" class="form-control">

    <option value="">-choose-</option>
    @if(!empty($PreviousSDC) )
    <option value="{{ $PreviousSDC }}" selected>{{ $PreviousSDC }}</option>
    @endif


      @if(is_array($DBSDClist) || is_object($DBSDClist))
            @foreach ($DBSDClist as $sdc)
                    @if(empty($PreviousSDC) || $sdc->name != $PreviousSDC)
                        <option value="{{ $sdc->name }}">{{ $sdc->name }}</option>
                    @endif
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
    <select id="PO_Name" name="PO_Name" class="form-control">
    @if(!empty($previousPOselected) )
    <option value="{{ $previousPOselected }}" selected>{{ $previousPOselected }}</option>
    @endif


    @if(is_array($DBPOlist) || is_object($DBPOlist))
            @foreach ($DBPOlist as $PO)
                  @if(empty($previousPOselected) || $PO->name != $previousPOselected)
                    <option value="{{ $PO->name }}">{{ $PO->name }}</option>
                  @endif
            @endforeach
    @endif

    </select>
</div>
    </div>


    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="panm">P.A. Name:</label>
    <select id="panm" name="panm" class="form-control">
    @if(!empty($PApreviousselected) )
    <option value="{{ $PApreviousselected }}" selected>{{ $PApreviousselected }}</option>
    @endif


    @if(is_array($DBPAlist) || is_object($DBPAlist))
            @foreach ($DBPAlist as $PA)
                    @if(empty($PApreviousselected) || $PA->name != $PApreviousselected)
                          <option value="{{ $PA->name }}">{{ $PA->name }}</option>
                    @endif

                @endforeach
    @endif

</select>
</div>
    </div>



    <!-- Auditor Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="DAO_Name">Accountant Name:</label>
    <select id="DAO_Name" name="DAO_Name" class="form-control">
    @if(!empty($DAOprevious) )
    <option value="{{ $DAOprevious }}" selected>{{ $DAOprevious }}</option>
    @endif

    @if(is_array($DBDAOlist) || is_object($DBDAOlist))
            @foreach ($DBDAOlist as $DAO)
                    @if(empty($DAOprevious) || $DAO->name != $DAOprevious)
                        <option value="{{ $DAO->name }}">{{ $DAO->name }}</option>
                    @endif
            @endforeach
    @endif


    </select>
  </div>
    </div>

    <!-- Accountant Name Dropdown -->
    <div class="col-12 col-md-3">
    <div class="form-group">
    <label for="AB_Name">Auditor Name:</label>
    <select id="AB_Name" name="AB_Name" class="form-control">
    @if(!empty($Previous_AB) )
    <option value="{{ $Previous_AB }}" selected>{{ $Previous_AB }}</option>
    @endif

    @if(is_array($DBABlist) || is_object($DBABlist))
            @foreach ($DBABlist as $AB)
                    @if(empty($Previous_AB) || $AB->name != $Previous_AB)
                          <option value="{{ $AB->name }}">{{ $AB->name }}</option>
                    @endif

            @endforeach
    @endif


</select> 

</div>
    </div>
</div>




    <div class="row">
      <div class="col-12 col-md-3">
        <div class="form-group">
          <label for="Tot_Exp">Total Expenses:</label>
          <input type="text" id="Tot_Exp" name="Tot_Exp" class="form-control wk_info1" value="{{$DSWorkmaster->Tot_Exp ?? ''}}">
        </div>
      </div>
      <div class="col-12 col-md-3 py-5">
        <div class="form-group">
    <div class="form-check">
      <input type="checkbox" id="" name="work_comp" class="form-check-input" value="{{$DSWorkmaster->work_comp ?? ''}}">
      <label class="form-check-label" for="Tot_Exp">Work Complete</label>
    </div>
  </div>
      </div>
      <div class="col-12 col-md-3">
  <div class="form-group">
          <label for="actual_complete_date" class="wk_info2">Actual Date Completion:</label>
          <input type="date" id="actual_complete_date" name="actual_complete_date" class="form-control" value="{{$DSWorkmaster->actual_complete_date ?? ''}}">
        </div>

</div> 
</div>
<!-- //button  Update and Exist  -->
<div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary  pl-4 pr-4 mr-2" value="Update">
            <a href="{{url('listworkmasters')}}" class="btn btn-primary pl-4 pr-4 ml-10">Exit</a>
</div>
<!-- //button  Update and Exist  -->



  </div>




  


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

    <div class="row g-3">
        <div class="col-auto ms-auto">
            <!-- <label for="excel_File_id" class="visually-hidden">Excel file upload</label> -->
            <div class="col">
                <!-- <input type="file" name="excel_file" accept=".xls, .xlsx" id="excel_File_id"> -->
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex justify-content-end">
                <!-- <button type="button" class="btn btn-primary mb" id="importBtn">Import</button> -->

            </div>
        </div>
    </div>
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
          <th scope="col">Sub No</th>
      <th scope="col">Descroption of Item</th>
      <th scope="col">Tendered Quantity</th>
      <th scope="col">Unit</th>
      <th scope="col">Tendered Rate</th>
      <th scope="col">Amount</th>
      <th colspan="2" style="text-align: center;">Action</th>


    </tr>
  </thead> 
  <tbody id="tableBody">
  @if(isset($DStnditems))
                            @foreach($DStnditems as $DStnditem )
                            <tr>
                              <td class="item-no">{{ $DStnditem->t_item_no }}</td>
                              <td class="item-subno">{{ $DStnditem->sub_no }}</td>
                              <td class="item-description">{{ $DStnditem->item_desc }}</td>
                              <td class="item-tndQty">{{ $DStnditem->tnd_qty }}</td>
                              <td class="item-Unit">{{ $DStnditem->item_unit }}</td>
                              <td class="item-tndrt">{{ $DStnditem->tnd_rt }}</td>
                              <td class="item-Amount">{{ $DStnditem->t_item_amt }}</td>
                              <td>
        <!-- <a href="{{url('editworkmasterroute/'.$DStnditem->t_item_id )}}" class="btn btn-primary btn-sm">Edit</a> -->
         <button class="btn btn-primary edit-button" data-row-id="{{ $DStnditem->t_item_id }}">Edit</button>
      </td>
      <td>
    <button class="btn btn-danger delete-button" data-item-id="{{ $DStnditem->t_item_id }}">Delete</button>
</td>

                            </tr>
                          </tbody>
                          @endforeach
                          @endif

  </tbody>
</table>
<!-- //tnditem record Edit button click come that model -->
<div id="updateModal" class="modal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-body">
            <form id="updateForm">
               <div class="form-group">
                  <label for="updateItemNo">Item No</label>
                  <input type="text" class="form-control" id="updateItemNo"  name="itemNo">
               </div>
               <div class="form-group">
                  <label for="updateItemDescription">Item Description</label>
                  <textarea class="form-control" id="updateItemDescription" rows="4" name="itemDescription"></textarea>
               </div>
                              <div class="form-group">
                  <label for="updateTenderedQty">Tendered Quantity</label>
                  <input type="text" class="form-control" id="updateTenderedQty" name="tenderedQty">
               </div>
               <div class="form-group">
                  <label for="updateItemUnit">Unit</label>
                  <input type="text" class="form-control" id="updateItemUnit" name="itemUnit">
               </div>
               <div class="form-group">
                  <label for="updateTenderedRate">Tendered Rate</label>
                  <input type="text" class="form-control" id="updateTenderedRate" name="tenderedRate">
               </div>
               <div class="form-group">
                  <label for="updateItemAmount">Amount</label>
                  <input type="text" class="form-control" id="updateItemAmount" name="itemAmount">
               </div>
               <!-- Other input fields for updating data -->
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="updateButton">Update</button>
         </div>
      </div>
   </div>
</div>
<!-- //update tnditem -->
<script>
$(document).ready(function() {
   var selectedRow; // Store the clicked row

   $(".edit-button").click(function() {
      selectedRow = $(this).closest("tr");
      var tItemId = $(this).data('row-id');
      console.log(tItemId);
     var itemNo = selectedRow.find(".item-no").text();
      var subNo = selectedRow.find(".item-subno").text();
      var itemDescription = selectedRow.find(".item-description").text();
      var tenderedQty = selectedRow.find(".item-tndQty").text();
      var itemUnit = selectedRow.find(".item-Unit").text();
      var tenderedRate = selectedRow.find(".item-tndrt").text();
      var itemAmount = selectedRow.find(".item-Amount").text();

      // Populate the modal with data
      $("#updateButton").data('t_item_id', tItemId);
      $("#updateItemNo").val(itemNo);
      $("#updateSubNo").val(subNo);
      $("#updateItemDescription").val(itemDescription);
      $("#updateTenderedQty").val(tenderedQty);
      $("#updateItemUnit").val(itemUnit);
      $("#updateTenderedRate").val(tenderedRate);
      $("#updateItemAmount").val(itemAmount);

      // Show the modal
      $("#updateModal").modal("show");
   });

   // Close the modal when the "Close" button is clicked
   $("#updateModal").on("hidden.bs.modal", function() {
      $(this).find("form")[0].reset(); // Reset the form
   });

   // Manually hide the modal when the "Close" button is clicked
   document.querySelector('.btn-secondary[data-dismiss="modal"]').addEventListener('click', function() {
      var modal = document.getElementById('updateModal');
      $(modal).modal('hide'); // Manually hide the modal
   });

   // Update table cell values when the "Update" button is clicked
   $("#updateButton").click(function() {
      // Update the selected row's values
    var roundedTenderedQty = parseFloat($("#updateTenderedQty").val()).toFixed(3);
    var roundedTenderedRate = parseFloat($("#updateTenderedRate").val()).toFixed(2);
    var roundedItemAmount = parseFloat($("#updateItemAmount").val()).toFixed(2);

      // Update the selected row's values
      selectedRow.find(".item-no").text($("#updateItemNo").val());
      selectedRow.find(".item-description").text($("#updateItemDescription").val());
      selectedRow.find(".item-tndQty").text(roundedTenderedQty);
      selectedRow.find(".item-Unit").text($("#updateItemUnit").val());
      selectedRow.find(".item-tndrt").text(roundedTenderedRate);
    selectedRow.find(".item-Amount").text(roundedItemAmount);//call ajax fun to update  t_item table 

//call ajax fun to update  t_item table 
var updatedData = {
      itemNo: $("#updateItemNo").val(),
      itemDescription: $("#updateItemDescription").val(),
      tenderedQty: $("#updateTenderedQty").val(),
      itemUnit: $("#updateItemUnit").val(),
      tenderedRate: $("#updateTenderedRate").val(),
      itemAmount: $("#updateItemAmount").val()
   };
// console.log(updatedData);
   // Call the AJAX function to update the database
   var ajaddata = {
    tItemId: $(this).data('t_item_id'),
      itemNo: $("#updateItemNo").val(),
      itemDescription: $("#updateItemDescription").val(),
      tenderedQty: $("#updateTenderedQty").val(),
      itemUnit: $("#updateItemUnit").val(),
      tenderedRate: $("#updateTenderedRate").val(),
      itemAmount: $("#updateItemAmount").val()
   };
   updateitem(ajaddata);
      // Close the modal
      $("#updateModal").modal("hide");
   });
});

//Only Update tendor Item table data
function updateitem(updatedData) 
{
  $.ajax({
    url: "{{ url('RouteUpdatedtnditem') }}", // Use the named route
    method: "POST",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
    data: updatedData,
    success: function(response) {
      console.log("Updated Data:", updatedData);
      console.log("Update success:", response);
      // Handle success, if needed
    },
    error: function(xhr, status, error) {
      // Handle error, if needed
      console.error("Error updating data:", error);
    }
  });
}
</script>
<!-- //Update tnditem -->

<!-- //delete TndItem -->
<script>
$(document).ready(function() {
   $(".delete-button").click(function() {
      var clickedButton = $(this);
      var tItemId = clickedButton.data('item-id'); // Get the unique identifier from data attribute
console.log(tItemId);
      // Show a confirmation dialog using Swal
      Swal.fire({
        title: 'Are you sure you want to delete item ' + tItemId + '?',
      text: 'You won\'t be able to revert this!',
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!',
         cancelButtonText: 'No, cancel',
      }).then((result) => {
         if (result.isConfirmed) {
            // User clicked "Yes," proceed with the deletion
            deleteItemFromDatabase(tItemId, clickedButton);
         }
      });
   });
});

// Function to delete an item from the database via AJAX
function deleteItemFromDatabase(tItemId, clickedButton) {
   $.ajax({
      url: "{{ url('deleteTndItem', ['t_item_id' => '']) }}/" + tItemId,
      method: "DELETE", // Use DELETE method for deletion
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) 
      {
         console.log("Deleted Item ID:", tItemId);
         console.log("Delete success:", response);

         // Check if the deletion was successful based on the response
         if (response.message === 'Item deleted successfully') {
            // Display a success message using Swal with the deleted item ID
            Swal.fire({
               icon: 'success',
               title: 'Success!',
               text: 'Item with ID ' + tItemId + ' deleted successfully',
            }).then((result) => {
               if (result.isConfirmed) {
                  // Remove the row from the UI
                  var rowToDelete = clickedButton.closest("tr");
                  rowToDelete.remove();
               }
            });
         } else {
            // Display an error message using Swal
            Swal.fire({
               icon: 'error',
               title: 'Error!',
               text: 'Item could not be deleted because it is in use in bills.',
            });
         }         
         // Handle success, if needed
      },
      error: function(xhr, status, error) 
      {
         // Handle error, if needed
         Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Error deleting item',
         });
         console.error("Error deleting item:", error);
      }
   });
}
</script>
<!-- //delete TndItem -->

                <div class="pagination">
                    <button id="prevPage">Previous</button>
                    <button id="nextPage">Next</button>
                </div>
</div>

        </div>
        </div>        

        
        
      </form>           
        </div>
        </div>
</div>
</div><br><br>

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
<!-- <div id="loader" style="display: none;">Loading...</div> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script>
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
</script> -->

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
            document.getElementById('PS_Constituency').value = DBpsname;
            document.getElementById('ZP_Constituency').value = DBZPname;
            document.getElementById('mla').value = DBMLAname;
            document.getElementById('mp').value = DBMPname;
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



<!-- //pagination on pre and next button when database throght get BOQ data -->
<script>
$(document).ready(function() {
    var table = $('#myTable');
    var rowsPerPage = 10; // Number of rows to display per page
    var currentPage = 0; // Current page index

    // Calculate the total number of pages based on the number of rows and rows per page
    var totalPages = Math.ceil(table.find('tbody tr').length / rowsPerPage);

    // Show the first page and hide the rest of the rows
    showPage(currentPage);

    // Add event listeners to the custom buttons
    $(document).on('click', '.pagination-btn', function() {
        var newPage = parseInt($(this).text()) - 1;
        if (newPage >= 0 && newPage < totalPages) {
            currentPage = newPage;
            showPage(currentPage);
        }
    });

    // Function to show rows for the specified page index
    function showPage(pageIndex) {
        table.find('tbody tr').hide();
        var startIndex = pageIndex * rowsPerPage;
        var endIndex = startIndex + rowsPerPage;

        table.find('tbody tr').slice(startIndex, endIndex).show();

        // Update the pagination buttons
        updatePaginationButtons();
    }

    // Function to update the pagination buttons based on the current page
    function updatePaginationButtons() {
        var paginationContainer = $('.pagination');
        paginationContainer.empty();

        for (var i = 0; i < totalPages; i++) {
            var pageNumber = i + 1;
            var button = $('<button class="pagination-btn">' + pageNumber + '</button>');
            if (i === currentPage) {
                button.addClass('active');
            }
            paginationContainer.append(button);
        }
    }
});
</script>
<!-- //pagination on pre and next button when database throght get BOQ data -->


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
        }else if(defaultperiod == 'Year'){
            var date = new Date(workorderdt);
            date.setFullYear(date.getFullYear() + parseInt(period));
            date.setDate( date.getDate() - 1 );
            var dateFormatYear = moment(date).format('YYYY-MM-DD');
            $('#Stip_Comp_Dt').val(dateFormatYear);
        }else{
            var date = new Date(workorderdt);
            var dateFormatSameAsDate = moment(date).format('YYYY-MM-DD');
            $('#Stip_Comp_Dt').val(dateFormatSameAsDate);
        }
  }
  $(document).ready(function () {
            // Set the default period to 'Day' and call the function
            var defaultPeriod = "{{ $DSWorkmaster->Perd_Unit }}";
            $("#Perd_Unit").val(defaultPeriod);
        
            calculateCompletionDate();
        });

</script>
<!-- //create stipulated date  -->



<!-- //calculate above bellow effect workoder-amonount put to tender -->
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
    if (pancardCheckbox.checked) {
      pancardInput.removeAttribute("disabled");
    } else {
      pancardInput.setAttribute("disabled", "disabled");
    }
  });
</script>

<!-- //find agency check box is checked then visible inputtext --> 






   <footer>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); padding:20px; text-align:center">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">sisinfotech.com</a>
  </div>
  <!-- Copyright -->
</footer>
   
<!-- ajax  for import -->
@endsection()
