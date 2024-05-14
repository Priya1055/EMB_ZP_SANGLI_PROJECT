{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- font awesome cdn -->
<!-- for the R A Bill no jquery ajax -->
<!-- Include jQuery library -->
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- nav bar bootstrap cdn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      --}}

      @extends('layouts.NavHeader')
@section('content')
<style>
    /* Increase font weight of labels */
 .form-group label {
      font-weight: bold;
    }

  /* bread crum css */
    /* Style the list */
    ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
    background-color: #eee;
    }

    /* Display list items side by side */
    ul.breadcrumb li {
    display: inline;
    font-size: 18px;
    }

    /* Add a slash symbol (/) before/behind each list item */
    ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
    }

    /* Add a color to all links inside the list */
    ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
    }

    /* Add a color on mouse-over */
    ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
    }
.nav-item{
  margin-left:20px;
}


</style>

</head>
<body>

<body>
{{-- <nav class="navbar navbar-expand-lg navbar-light bg-dark">

  <div class="navbar-header">
      <a class="navbar-brand text-white font-weight-bold" href="{{ url('report', $embsection2->t_bill_Id ?? '') }}"><i class="fa fa-folder-open-o" aria-hidden="true"></i> REPORTS</a>
    </div>
  <div class="collapse navbar-collapse" id="navbarNav" style="margin-left:70px;">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link text-white font-weight-bold" href="{{ url('Mb', $embsection2->t_bill_Id ?? '') }}">MB</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white font-weight-bold" href="{{ url('abstractrep', $embsection2->t_bill_Id ?? '') }}">Abstract</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white font-weight-bold" href="{{ url('BILL', $embsection2->t_bill_Id ?? '') }}">BILL</a></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white font-weight-bold"href="{{ url('Materialconsstmt', $embsection2->t_bill_Id ?? '') }}">Material Consumption Statement</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white font-weight-bold" href="{{ url('Recovertstmt', $embsection2->t_bill_Id ?? '') }}">Recovery Statement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white font-weight-bold" href="{{ url('Excesssavestmt', $embsection2->t_bill_Id ?? '') }}">Excess Saving Statement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white font-weight-bold" href="{{ url('Compcertf', $embsection2->t_bill_Id ?? '') }}">Completion Certificate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white font-weight-bold" href="{{ url('Workhandcertf', $embsection2->t_bill_Id ?? '') }}">Work-Hand Over Certificate</a>
      </li>

    </ul>
  </div>
</nav> --}}
<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $embsection2->work_id ?? '') }}">Bill</a></li>
            <li><a href="{{ url('report', $embsection2->t_bill_Id ?? '') }}">Report</a></li>
        </ul>
        
        <a href="{{ url('billlist', $embsection2->work_id ?? '')}}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a>
  
<div class="container-fluid card bg-light mb-3">
  <div class="row">
    <div class="col-lg-12">
      <!-- <div class="d-flex justify-content-end align-items-center">
        <button type="button" class="btn ml-2 custom-button" onclick="showNewBillModal(); enableNewButton();" id="newButton"  title="NEW BILL CREATE"> <i class="fa fa-plus-circle fa-2x custom-icon" aria-hidden="true"></i></button>
      </div> -->
      <br>
      <form><!-- Form content here --></form>
      <div id="section2-wrapper" class="htmlbillwrapper">


            <div id="section2">

        <div class="form-group form-row">

          <div class="col-md-6 text-left">
            <h2>Bill Information</h2>
          </div>
          <div class="col-md-6 text-right">
            <div class="row">
              <div class="col-md-4">
            <label for="rabillid">R.A.Bill Id:</label>
            </div>
            <div class="col-md-8 ">
            <input type="text" class="form-control font-weight-bold" id="rabillid" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}" disabled>
            </div>
            </div>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="rabmino" class="col-md-2">R.A.Bill No:</label>
          <div class="col-md-4 ajaxrabillhtml">
            <select class="form-control font-weight-bold" id="rabillno" name="t_bill_No" onchange="handleOptionChange()" disabled>

                <option value="{{$embsection2->t_bill_Id ?? ''}}">{{$embsection2->t_bill_No ?? ''}}</option>

            </select>
          </div>
          <label for="date" class="col-md-2">Date:</label>
          <div class="col-md-4">
            <input type="date" class="form-control" id="date" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="rabmino" class="col-md-2">Bill Amt:</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="rabmino" name="bill_amt" value="{{$embsection2->bill_amt ?? ''}}" disabled>
          </div>
          <label for="recamt" class="col-md-2">Rec Amt:</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="recamt" name="rec_amt" value="{{$embsection2->rec_amt ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="recamt" class="col-md-2">Net Amt:</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="netamt" name="net_amt" value="{{$embsection2->net_amt ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
        <label for="measdf" class="col-md-2">Measurement Dt From:</label>
          <div class="col-md-4">
            <input type="measdf" class="form-control" id="measdf" name="measdf" value="{{$newmeasdtfr ?? ''}}" disabled>
          </div>
          <label for="measdu" class="col-md-2">Measurement Dt Upto:</label>
          <div class="col-md-4">
            <input type="measdu" class="form-control" id="measdu" name="measdu" value="{{$newmessupto ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="cvno" class="col-md-2">CV No:</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="cvno" name="cv_no" value="{{$embsection2->cv_no ?? ''}}" disabled>
          </div>
          <label for="cvdate" class="col-md-2">CV Date:</label>
          <div class="col-md-4">
            <input type="date" class="form-control" id="cvdate" name="cv_dt" value="{{$embsection2->cv_dt ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
         <label for="gstrt" class="col-md-2">GST Rate:</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="gstrt" name="gst_rt" value="{{$embsection2->gst_rt ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="billtype" class="col-md-2">Bill Type:</label>
          <div class="col-md-4">
            <select class="form-control form-select" id="billtype" name="bill_type" disabled>
            <option value="Normal" {{ isset($embsection2) && $embsection2->bill_type == 'Normal' ? 'selected' : '' }}>Normal</option>
            <option value="WDBNM" {{ isset($embsection2) && $embsection2->bill_type == 'WDBNM' ? 'selected' : '' }}>WDBNM</option>
             <option value="Sec_Adv" {{ isset($embsection2) && $embsection2->bill_type == 'Sec_Adv' ? 'selected' : '' }}>Secured Advance</option>
            <option value="Mob_Adv" {{ isset($embsection2) && $embsection2->bill_type == 'Mob_Adv' ? 'selected' : '' }}>Mobilization Advance</option>

            </select>
          </div>
          <label for="cvdate" class="col-md-2">Final Bill:</label>
          <div class="col-md-4">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="finalbill" name="final_bill" disabled value="1" {{ isset($embsection2) && $embsection2->final_bill == 1 ? 'checked' : '' }} onchange="updateFinalBill(this)">
              <label class="form-check-label" for="cvdate">Check if final bill</label>
            </div>
          </div>
        </div>
             </div>


             </div>
    </div>
  </div>
</div>

</body>
@endsection
