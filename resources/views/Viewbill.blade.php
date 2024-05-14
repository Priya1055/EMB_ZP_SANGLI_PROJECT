@extends('layouts.header')

@section('content')

       <style>
      .custom-navbar {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Add a shadow */

        }

        .custom-navbar .navbar-nav .nav-item {

            border-radius: 10px; /* Add rounded corners */
             color: white;
            margin-right: 10px; /* Adjust the margin as needed */
        } 
        .custom-navbar .navbar-nav .nav-item a {
            color: white;
            font-weight: bold;
        }

        .custom-navbar {
            width: 100%;
            z-index: 1000; /* Ensure the header is on top of other content */
        }
        /* .custom-navbar .navbar-nav .nav-link:hover {
            color: #ff5733; /* Change the hover color as desired
        } */

        .custom-navbar .dropdown-menu div {
            background-color: white;
            color: white;all

        }
        #emb {
            margin-top: 100px; /* Adjust this value to set the space between header and page */
        }
        .custom-navbar .navbar-nav .nav-item .dropdown-item {
            color: #64748b; /* Set dropdown item text color to black */
        }
         /* Add striped background to dropdown items */
         .custom-navbar .navbar-nav .nav-item .dropdown-item:nth-child(odd) {
            background-color: #f5f5f5; /* Light gray shade for odd items */
        }

        .custom-navbar .navbar-nav .nav-item .dropdown-item:nth-child(even) {
            background-color: #ffffff; /* White background for even items */
        }

        #name{
    font-size: 20px;
    color: #9ec2f2;
    font-weight: bold;
}

</style>

  <style>

/* .title{
        font-weight: bold;
        font-size: 24px;
        line-height: 1.5;
        text-align: center;
         margin-top: 20px;
    } */
  .container-fluid {

  }


  .custom-button {
    margin-top: 10px; /* Adjust the margin as needed to align the button */
    background: #04AA6D;
    color: white;
  }


 .bg-custom {
  background-color: #e3f2fd;
}
/* Custom text color */
.navbar-dark .navbar-brand,
.navbar-dark .navbar-nav .nav-link {
  color: #333;
  font-weight: bold;
}
.navbar-brand {
  margin-right: auto;
}
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

/* Make the modal full screen */
.modal-fullscreen {
  width: 100%;
  max-width: 100%;
  height: 100%;
  max-height: 100%;
  margin: 0;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border: none;
  background: transparent;
  box-shadow: none;
  position: fixed;
}

/* Make the modal body scrollable */
.modal-body {
  max-height: 57vh; /* Adjust the value as needed */
  overflow-y: auto;
}


.modal-bodyview {
  max-height: 57vh; /* Adjust the value as needed */
  overflow-y: auto;
}

    #sr-no {
        width: 2%;
    }

    #particulars {
        width: 15%;
    }

    #no {
        width: 5%;
    }

    #length {
        width: 5%;
    }

    #breadth {
        width: 5%;
    }

    #height {
        width: 5%;
    }

    #formula {
        width: 15%;
    }

    #quantity {
        width: 8%;
    }

    #date-of-measurement {
        width: 5%;
    }

    #not-for-payment {
        width: 4%;
    }

    #action-column {
        width: 5%;
    }



  /* Style the checkbox label (text) */
  .form-check-label {
    font-weight: bold;
    color: green; /* Default text color */
  }

  /* Style the specific checkbox when checked */
  #alltenderitem:checked {
    border: 2px solid green; /* Border color when checked */
    background-color: green; /* Fill color when checked */
  }


  .line {
    border-top: 1px solid #FF0000; /* Adjust the style of the line as needed */
    margin: 5px 0; /* Add spacing above and below the line */
    width: 90%; /* Adjust the width of the line as needed */
}
#workdetail{
  background: #DCC7AA;
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
}

.btn-large {
    font-weight: bold;
    font-size: 20px;
    padding: 10px 20px;
    background-color: #D7A8B6; /* Set the custom color */
}

@font-face {
        font-family: myFirstFont !important;
        src: url('/public/fonts/DVOTSurekh_N_Ship.ttf') !important;
    }

    .ISMinput {
        font-family: myFirstFont !important;
    }

</style>

<script>
window.onload = function() {
  // Load the page at the previous mouse position
  var previousMouseX = sessionStorage.getItem('previousMouseX');
  var previousMouseY = sessionStorage.getItem('previousMouseY');
  
  if (previousMouseX !== null && previousMouseY !== null) {
    window.scrollTo(previousMouseX, previousMouseY);
  }
}

document.addEventListener('mousemove', function(event) {
  // Store the current mouse position in sessionStorage
  sessionStorage.setItem('previousMouseX', event.clientX);
  sessionStorage.setItem('previousMouseY', event.clientY);
});
</script>

<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $embsection2->work_id ?? '') }}">Bill</a></li>
            <li><a href="{{ url('emb', $embsection2->t_bill_Id ?? '') }}">EMB</a></li>
        </ul>

 <a href="{{ url('billlist', $embsection2->work_id ?? '')}}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a>

  <div class="container-fluid" id="emb">
    <div class="row">
      <!-- Form Section -->
      <div class="col-lg-12">
        <!-- <h2>Form</h2> -->

        <form action="{{url('listemb')}}" method="get">
          @csrf
          <!-- <div class="d-flex justify-content-end align-items-center">
              <button type="submit" class="btn ml-2 custom-button">FIND</button>
            </div> -->
            <div class="form-group form-row align-items-center mt-4">
              <label for="name" class="col-md-2">Work Id:</label>
              <div class="col-md-4">
                <input type="text" name="workid" class="form-control font-weight-bold" id="workid"  value="{{$embsection1->Work_Id ?? ''}}" disabled>
              </div>
              <label for="nameofwork" class="col-md-2">Name Of Work:</label>
              <div class="col-md-4">
                <textarea class="form-control" name="worknm" id="Work_Nm" disabled>{{$embsection1->Work_Nm ?? ''}}</textarea>
              </div>
            </div>

            <div class="form-group form-row align-items-center">
              <label for="division" class="col-md-2">Division:</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="div" name="div" value="{{$embsection1->div ?? ''}}"disabled>
              </div>
              <label for="subdivision" class="col-md-2">Sub Division:</label>
              <div class="col-md-4">
                <input type="text" name="Sub_Div" class="form-control" id="Sub_Div" value="{{$embsection1->Sub_Div ?? ''}}"disabled>
              </div>
            </div>

            <div class="form-group form-row align-items-center">
              <label for="fundhead" class="col-md-2">Fund Head:</label>
              <div class="col-md-4">
                <input type="text" class="form-control ISMinput" id="fundhead" name="Fund_Hd_M" value="{{$embsection1a->Fund_Hd_M ?? ''}}" disabled>
              </div>
            </div>

            <div class="form-group form-row align-items-center">
              <label for="agency" class="col-md-2">Agency:</label>
              <div class="col-md-4">
                <input type="text" name="Agency_Nm" class="form-control" id="Agency_Nm" value="{{$embsection1->Agency_Nm ?? ''}}"disabled>
              </div>
              <label for="sectionengineer" class="col-md-2">Section Engineer:</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="sectionengineer" name="name" value="{{$embsection1->name ?? ''}}" disabled>
              </div>
            </div>

          <!-- <div>
            <input type="submit" value="Submit">
          </div> -->
      </div>
    </div>
  </div>


  <div class="container-fluid card bg-light mb-3">
  <div class="row">
    <div class="col-lg-12">
    <div class="d-flex justify-content-end align-items-center">
        <button type="button" class="btn ml-2 btn-primary" onclick="uploadimages();" id="imgButton" title="UPLOAD IMG DOC VDO"><i class="fa fa-upload" aria-hidden="true"></i> View Uploaded Documents</button>
 </div>

      <!-- <div class="d-flex justify-content-end align-items-center">
        <button type="button" class="btn ml-2 custom-button" onclick="showNewBillModal(); enableNewButton();" id="newButton"  title="NEW BILL CREATE"> <i class="fa fa-plus-circle fa-2x custom-icon" aria-hidden="true"></i></button>
      </div> 
      <br>
      <form>Form content here </form>-->
      <div id="section2-wrapper" class="htmlbillwrapper" style="margin-top:20px;">


            <div id="section2">

        <div class="form-group form-row">
           <div class="row offset-md-9">
           @if($embsection2->previousbilldt !==null) 
                <div class="col-md-6">
                   <div class="form-group ">
                         <label for="pbilldt">Previous Bill Date:</label>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                        <input type="date" class="form-control" id="previousbilldt" name="previousbilldt" value="{{$embsection2->previousbilldt ?? ''}}" disabled>
                  </div>
               </div>
              @endif
           </div>
          <div class="col-md-6 text-left">
            <h2>R.A.Bill Information</h2>
          </div>
          <br>
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
            <select class="form-control" id="rabillno" name="t_bill_No" onchange="handleOptionChange()" disabled>
            @if(isset($billNos))
              @foreach($billNos as $t_bill_id => $t_bill_No)
                <option value="{{ $t_bill_id }}" {{ isset($embsection2) && $embsection2->t_bill_No == $t_bill_No ? 'selected' : '' }}>{{ $t_bill_No }}</option>
              @endforeach
              @endif
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
                  <?php
                  $finalBillValue = isset($embsection2) ? $embsection2->final_bill : 0;
                  ?>
                  <?php if ($finalBillValue == 1) : ?>
                  <label class="form-check-label" for="final-bill-yes" style="color: green;">Yes</label>
                  <?php else : ?>
                  <label class="form-check-label" for="final-bill-no" style="color: red;">No</label>
                  <?php endif; ?>
              </div>
        </div>
             </div>


             </div>
    </div>
  </div>

 {{-- <div class="d-flex justify-content align-items-center">
        <button type="button" class="btn ml-2 btn-primary" onclick="uploadimages();" id="imgButton" title="UPLOAD IMG DOC VDO"><i class="fa fa-upload" aria-hidden="true"></i> Upload Documents</button>
 </div>  --}}
</div>

 @auth 

<!--@if(auth()->user()->usertypes === "SO" &&  $mbstatus===2) -->

<!--<div class="d-flex justify-content-center align-items-center" >-->
<!--    <form id="yourFormId" method="post" action="{{ url('JuniorEngineerEMB') }}">-->
<!--        @csrf-->
<!--        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->
<!--        <div class="d-flex justify-content-center align-items-center" id="mbbutton">-->
<!--            <button type="submit" class="btn btn-info btn-large goToEMBBtn" id="goToEMBBtn">-->
<!--                View E MB-->
<!--            </button>-->
<!--        </div>-->
<!--    </form></div>-->
<!--</div>-->
<!-- @endif-->


<!--@if(auth()->user()->usertypes === "DYE"  &&  $mbstatus===3)-->
<!--  <form method="post" action="{{ url('DeputyCheck') }}">-->
<!--     @csrf-->
<!--     <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--     <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--     <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--     <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->
<!--     <div class="d-flex justify-content-center align-items-center" id="">-->
<!--         <button type="submit" class="btn btn-info btn-large " id="">-->
<!--             View E MB-->
<!--         </button>-->
<!--     </div>-->
<!--  </form>-->
<!--@endif -->

<!--@if(auth()->user()->usertypes === "EE" &&  $mbstatus===4              )   -->
<!--  <form method="post" action="{{ url('ExecutiveEngineerEMB') }}" >-->
<!--      @csrf-->
<!--      <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--      <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--      <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--      <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->
<!--      <div class="d-flex justify-content-center align-items-center" id="">-->
<!--          <button type="submit" class="btn btn-info btn-large " id="">-->
<!--              View E MB-->
<!--          </button>-->
<!--      </div>-->
<!--  </form>-->
<!-- @endif -->
<!--@if(auth()->user()->usertypes === "Agency" &&  $mbstatus===5) -->
<!--<div class="d-flex justify-content-center align-items-center" >-->
<!--    <form id="yourFormId" method="post" action="{{ url('AgencyCheck') }}">-->
<!--        @csrf-->
<!--        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->

<!--        <div class="d-flex justify-content-center align-items-center" id="">-->
<!--            <button type="submit" class="btn btn-info btn-large " id="">-->
<!--                View E MB-->
<!--            </button>-->
<!--        </div>-->
<!--    </form></div>-->
<!--</div>-->
<!--@endif -->


<!--@if(auth()->user()->usertypes === "SO" &&  $mbstatus===6) -->

<!--<div class="d-flex justify-content-center align-items-center">-->
<!--    <form id="yourFormId" method="post" action="{{ url('RouteCheckListSO') }}">-->
<!--        @csrf-->
<!--        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->
<!--        <div class="d-flex justify-content-center align-items-center" id="mbbutton">-->
<!--            <button type="submit" class="btn btn-info btn-large goToEMBBtn" id="goToEMBBtn">-->
<!--                Check list-->
<!--            </button>-->
<!--        </div>-->
<!--    </form></div>-->
<!--</div>-->
<!-- @endif-->


<!-- @if(auth()->user()->usertypes === "SDC" &&  $mbstatus===7) -->
<!--<div class="d-flex justify-content-center align-items-center" >-->
<!--    <form id="yourFormId" method="post" action="{{ url('RouteCheckListSDC') }}">-->
<!--        @csrf-->
<!--        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->

<!--        <div class="d-flex justify-content-center align-items-center" id="">-->
<!--            <button type="submit" class="btn btn-info btn-large " id="">-->
<!--                Check List-->
<!--            </button>-->
<!--        </div>-->
<!--    </form></div>-->
<!--</div>-->
<!--@endif -->




 @endauth
 <!-- <input type="hidden" name="t_bill_Id" value="{{$mbstatusP ?? ''}}"> -->

<div class="container-fluid">
  <div class="row">
    <!-- Table Section -->
    <div class="col-lg-12">
      <!-- <h2>Table</h2> -->
      <div class="table-container">

  <!-- Button for EMB (Top right position) -->
  @auth 

<!--@if(auth()->user()->usertypes === "SO") -->
<!--  <div class="button-container">-->
<!--    <div style="display: inline-block;">-->
<!--        <button type="button" class="btn btn-primary" onclick="openModaltnditem()" title="ADD TENDER ITEM" id="addtender">-->
<!--        <i class="fa fa-plus"></i> ADD TENDER ITEM-->
<!--        </button>-->
<!--    </div>-->
<!--    <div style="display: inline-block;">-->
<!--        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AllmeasexcelModal" id="allmeasurement" title="ADD ALL MEASUREMENT">-->
<!--        <i class="fa fa-plus"></i> Add All MEASUREMENT-->
<!--      </button>-->
<!--    </div>-->
<!--</div>-->
<!--@endif-->
@endauth

        <!-- Table -->
        <div id="bill-item-table">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
            <th>Tender Item No</th>
            <th>Item</th>
            <th>Tender Quantity</th>
            <th>Bill Rate</th> <!-- Span two columns for Rate -->
            <th>Rate Code</th>
            <th>Upto Date Qty</th>
            <th>Current Amt</th>
            <th>Previous Amt</th>
            <th>Unit</th>
            <th>Uptodate Amount</th>
            <th>Action</th>
        </tr>
        <tr>
            <th></th> <!-- Empty cell for Tender Item No -->
            <th></th> <!-- Empty cell for Item -->
            <th></th> <!-- Empty cell for Tender Quantity -->
            <th>Tender Rate</th> <!-- First heading -->
            <th></th> <!-- Second heading -->
            <th></th> <!-- Empty cell for Rate Code -->
            <th></th> <!-- Empty cell for Upto Date Qty -->
            <th></th> <!-- Empty cell for Unit -->
            <th></th> <!-- Empty cell for Amount -->
            <th></th> <!-- Empty cell for Action -->
        </tr>
            </thead>




            <tbody id="billitemtbody">
           
      @foreach($embsection3 as $item)
     
            <tr>
            <td>{{ $item->t_item_no }} {{ $item->sub_no ? $item->sub_no : '' }}</td>
        <td>{{ $item->item_desc }}</td>
        <td>{{ $item->tnd_qty }}</td>
        <td>{{ $item->bill_rt }}<br><br> <div class="line"></div><br>{{ $item->tnd_rt }}</td>
        <td>{{ $item->ratecode }}</td>
        <td>{{ $item->exec_qty }}</td>
        <td>{{ $item->cur_amt }}</td>
        <td>{{ $item->previous_amt }}</td>
        <td>{{ $item->item_unit }}</td>
        <td>{{ $item->b_item_amt }}</td>
            <td>
            <div class="Action">
            <button type="button" class="btn emb-button mb-2" data-toggle="modal" data-target="#embview{{ $item->b_item_id }}" onclick="openModal('{{ $item->b_item_id }}')" title="VIEW MEASUREMENTS">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>           
                <!--@auth-->
                <!--    @if(auth()->user()->usertypes === "SO")-->
                <!--        <button type="button" class="btn btn-primary mb-2" onclick="openedittender('{{ $item->b_item_id }}')" {{ $embsection2->is_current === 0 ? 'disabled' : '' }} title="EDIT TENDER ITEM">-->
                <!--            <i class="fa fa-pencil-square" aria-hidden="true" id="icon"></i>-->
                <!--        </button>-->
                <!--        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#embeditbutton{{ $item->b_item_id }}" onclick="openeditbutton('{{ $item->b_item_id }}')" {{ $embsection2->is_current === 0 ? 'disabled' : '' }} title="ADD AND EDIT MEASUREMENTS">-->
                <!--            <i class="fa fa-pencil" style="color:white;"></i>-->
                <!--        </button>-->
                  
                <!--<button type="button" class="btn btn-danger mb-2" onclick="deletebillitem('{{ $item->b_item_id }}')" {{ $item->is_previous === 0 ? 'disabled' : '' }} {{ $embsection2->is_current === 0 ? 'disabled' : '' }} title="DELETE TENDER ITEM">-->
                <!--    <i class="fa fa-trash" aria-hidden="true"></i>-->
                <!--</button>-->
                <!--@endif-->
                <!--@endauth-->
            </div>
        </td>
    </tr>
   
     <script>
        // Call your JavaScript function here
        createUniqueModal('{{$item->b_item_id}}'); 
        // Apply CSS to modals after they have been created
        applyCssToModals();
        //editsteelmodal({{ $item->b_item_id }}); // Not sure what this function is for
        
        function applyCssToModals() {
  var uniqueModalSelector = '.modal-fullscreen';

  // Find the modals with the specified classes
  var modals = document.querySelectorAll(uniqueModalSelector);

  // Loop through the modals and apply CSS to each one
  for (var i = 0; i < modals.length; i++) {
    var modal = modals[i];

    // Apply CSS styles to the modal
    modal.style.width = "100%";
      modal.style.maxWidth = "100%";
      modal.style.height = "100%";
      modal.style.maxHeight = "100%";
      modal.style.margin = "0";
      modal.style.top = "0";
      modal.style.left = "0";
      modal.style.right = "0";
      modal.style.bottom = "0";
      modal.style.border = "none";
      modal.style.background = "transparent";
      modal.style.boxShadow = "none";
      modal.style.position = "fixed";

      var modalBody = modal.querySelector('.modal-body');
    if (modalBody) {
      modalBody.style.maxHeight = "80vh"; // Adjust the value as needed
      modalBody.style.overflowY = "auto";
    }
  }


}

        function createUniqueModal(billitem) {



var modal = `
<div class="modal fade" id="embeditbutton${billitem}" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabeledit${billitem}" data-modal-type="parent" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabeledit${billitem}">Edit Measurement</h5>
                  <a href="#" class="close" data-modal-type="parent"  onclick="embeditbuttonclosemain('${billitem}')" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </a>
                 
              </div>
              <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetail${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                              <label for="itemNo" class="font-weight-bold pl-3">Item No:</label>
                              <div id="itemNo1${billitem}" class="pl-3"></div>
                          </div>
                      </div>

                  </div>
                  <div class="form-group">
                      <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
                      <div id="itemDesc1${billitem}" class="pl-3"></div>
                  </div>
                  <!-- Add the New button here -->
                  <button type="button" class="btn btn-primary btn-md ml-auto mr-2" data-toggle="modal"  onclick="newmeasurement('${billitem}')">New</button>
                  <div class="modal-body" id="normaldata${billitem}">
                      <div class="table-responsive">
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                  <th id="sr-no">Sr_No</th>
                                  <th id="particulars">Particulars</th>
                                  <th id="Number">Number</th>
                                  <th id="length">Length</th>
                                  <th id="breadth">Breadth</th>
                                  <th id="height">Height</th>
                                  <th id="formula">Formula</th>
                                  <th id="quantity">Quantity</th>
                                  <th id="date-of-measurement">Date of Measurement</th>
                                  <th id="not-for-payment">Not for Payment</th>
                                  <th id="action-column">Action</th>

                                  </tr>
                              </thead>
                              <tbody id="modal-table-body2${billitem}">
                                  <!-- Table rows will be populated using AJAX response -->
                              </tbody>
                          </table>
                      </div>

              <div class="row mt-4">
                  <div class="col-3 offset-md-8">
                      <div class="form-group" >
                          <label for="currentQty" class="font-weight-bold">Current Quantity:</label>
                          <input type="text" class="form-control" id="currentQty${billitem}" name="currentQty"  disabled>
                      </div>
                  </div>
              </div>

              <div class="row mt-4">
                  <div class="col-3 offset-md-8">
                      <div class="form-group" >
                          <label for="previousQty" class="font-weight-bold">Previous bill Quantity:</label>
                          <input type="text" class="form-control" id="previousQty${billitem}" name="previousQty"  disabled>
                      </div>
                  </div>
              </div>

                      <div class="row mt-3">
                          <div class="col-md-3 offset-md-2">
                              <div class="form-group">
                                  <label for="tndqty" class="font-weight-bold">Tender Quantity Of Item:</label>
                                  <input type="text" class="form-control" id="tndqty${billitem}" name="tndqty" disabled>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="percentage" class="font-weight-bold">Percentage Utilised:</label>
                                  <input type="text" class="form-control" id="percentage${billitem}" name="percentage" disabled>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="totalQty" class="font-weight-bold">Total Uptodate Quantity:</label>
                                  <input type="text" class="form-control" id="totalQty${billitem}" name="totalQty" disabled>
                              </div>
                          </div>
                      </div>
                      <div class="row mt-3">
                          <div class="col-md-3 offset-md-2">
                              <div class="form-group">
                                  <label for="tndcost" class="font-weight-bold">Tender Cost Of Item:</label>
                                  <input type="text" class="form-control" id="tndcost${billitem}" name="tndcost" disabled>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="costdifference" class="font-weight-bold">Excess/Saving:</label>
                                  <input type="text" class="form-control" id="costdifference${billitem}" name="costdifference" disabled>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="totalcost" class="font-weight-bold">Total Uptodate Amount:</label>
                                  <input type="text" class="form-control" id="totalcost${billitem}" name="totalcost" disabled>
                              </div>
                          </div>
                      </div>
                    </div>
                      <div class="modal-body" id="table-container4${billitem}">
                          <!-- Modal body content when data condition 2 is met -->
                          <!-- You can customize the content here -->
                      </div>
                      <div class="modal-footer3">
                          <!-- Removed the 'New' button -->
                          <a href="{{ URL::full() }}" class="close-button btn btn-secondary" onclick="embeditbuttonclose('${billitem}')" data-close-modal="parentModal">Close</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- New modal for Excel upload and manual entry -->
<div class="modal fade" id="newmodal${billitem}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="newModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" style="max-width: 500px;" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="newModalLabel${billitem}">New Measurement</h5>
      <button type="button" class="close" data-dismiss="modal" data-close-id="${billitem}" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p><h5>Select how you want to add a new measurement:</h5></p>
      <button type="button" class="btn btn-primary" id="uploadExcelButton${billitem}" data-toggle="modal"  onclick="uploadExcel('${billitem}')">Upload Excel</button>
      <button type="button" class="btn btn-primary" data-toggle="modal"   onclick="manualEntry('${billitem}')">Manual Entry</button>
    </div>
  </div>
</div>
</div>


<!-- Excel upload data modal open -->
<div class="modal fade" id="uploadexcel${billitem}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="uploadModalLabel">Upload Excel File</h5>
      <button type="button" class="close"  data-close-id="${billitem}" data-modal-type="child" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <form id="uploadForm">
        <div class="form-group">
          <label for="excelFile">Select Excel File:</label>
          <input type="file" class="form-control-file" id="excelFile${billitem}" name="excelFile" accept=".xls, .xlsx">
        </div>
      </form>
    </div>
    <div class="modal-footer4">
    <button type="button" class="close-button btn btn-secondary" data-dismiss="modal" onclick="uploadexcelclose('${billitem}')">Close</button>
      <button type="button" class="btn btn-primary" onclick="submitUploadExcel('${billitem}')">Upload</button>
    </div>
  </div>
</div>
</div>


<!-- Manual entry form for the measurement -->
<style>

// .modal-dialog-custom {
//   max-width: 1300px;
//   display: flex;
// flex-direction: column;
// align-items: center;
// justify-content: flex-start;
// margin-top: 10vh; /* Adjust this value for the vertical positioning */
// }

/* Add this to your existing CSS or in a <style> tag in your HTML */
.enlarged-image-modal {
  display: none;
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.8);
}

.enlarged-image-content {
  display: block;
  margin: auto;
  max-width: 90%;
  max-height: 90%;
}

.close-enlarged-image {
  position: absolute;
  top: 15px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
  color: #f1f1f1;
  cursor: pointer;
}



</style>
<!-- Manual entry modal -->
<div class="modal fade" id="manualEntryModal${billitem}"  data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog  modal-fullscreen" id="modal-top" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="manualEntryModalLabel${billitem}">MB Form</h5>
      <button type="button" class="close" data-dismiss="modal" data-close-id="${billitem}" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetailNM${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
    <div class="form-group">
          <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
          <!-- Updated item description ID to 'itemDesc1' -->
       <div id="itemDescmb${billitem}" class="pl-3"></div>
    </div>
    <div class="modal-body">
      <!-- Add your manual entry form here -->
      <form id="manualEntryForm${billitem}">
      <div class="row">
          <div class="col-md-3 form-group">
            <label for="particulars" class="font-weight-bold">Particulars:</label>
            <input type="text" class="form-control" id="newparticulars${billitem}" name="Particulars">
          </div>
          <div class="col-md-2 form-group">
            <label for="number" class="font-weight-bold">Number:</label>
            <input type="number" class="form-control"  id="newnumber${billitem}"  oninput="newupdateQuantity('${billitem}')" name="Number">
          </div>
          <div class="col-md-2 form-group">
            <label for="len" class="font-weight-bold">Length:</label>
            <input type="number" class="form-control"  id="newlength${billitem}"  oninput="newupdateQuantity('${billitem}')" name="Length">
          </div>
          <div class="col-md-2 form-group">
            <label for="brea" class="font-weight-bold">Breadth:</label>
            <input type="number" class="form-control"  id="newbreadth${billitem}"  oninput="newupdateQuantity('${billitem}')" name="Breadth">
          </div>
          <div class="col-md-2 form-group">
            <label for="hei" class="font-weight-bold">Height:</label>
            <input type="number" class="form-control"  id="newheight${billitem}"  oninput="newupdateQuantity('${billitem}')" name="Height">
          </div>
          <div class="col-md-1 form-group">
            <label for="Quantity" class="font-weight-bold">Quantity:</label>
            <input type="text" class="form-control"  id="newquantity${billitem}"  oninput="newupdateQuantity('${billitem}')" name="Quantity" disabled>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 form-group">
            <label for="formula" class="font-weight-bold">Formula:</label>
            <input type="text" class="form-control" data-id="${billitem}" id="newformula${billitem}" oninput="newupdateQuantity('${billitem}')" name="Formula">
          </div>
        </div>

        <div class="row">
          <div class="col-md-2 form-group">
            <label for="dom" class="font-weight-bold">Date of Measurement:</label>
            <input type="date" class="form-control" id="newdom${billitem}" name="dom" data-provide="datepicker" data-date-format="yyyy-mm-dd">
          </div>
          <div class="col-md-2 form-group">
             <label class="font-weight-bold">Not for Payment:</label>
             <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="newnotforpaymentCheckbox${billitem}" name="newnotforpayment" value="1">
                  <label class="form-check-label" for="notforpaymentCheckbox">Not for Payment</label>
              </div>
          </div>
        </div>
</form>
    </div>
    <div class="modal-footer-manual">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="manualEntryModalclose('${billitem}')">close</button>
      <button type="button" class="btn btn-primary" onclick="submitManualEntry('${billitem}')">Submit</button>
    </div>
  </div>
</div>
</div>



<!-- New steel measurement by manually modal  -->
<div class="modal fade" id="manualnewtsteelmodal${billitem}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog  modal-fullscreen" id="modal-top" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="manualEntryModalLabel">MB STEEL Form</h5>
      <button type="button" class="close"  data-close-id="${billitem}" data-modal-type="child" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetailSM${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
    <div class="form-group">
          <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
          <!-- Updated item description ID to 'itemDesc1' -->
       <div id="itemDessteelnew${billitem}" class="pl-3"></div>
    </div>
    <div class="modal-body">
      <!-- Add your manual entry form here -->
      <form id="newsteelform">
      <div class="row">
      <div class="col-md-1">
          <div class="form-group">
              <label for="sr_no">Sr No</label>
              <input type="text" class="form-control" id="sr_nonew${billitem}" name="sr_nonew" value="" >
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="rcc_member">RCC Member</label>
              <select class="form-control form-select" name="rcc_membernew" id="rcc_membernew${billitem}">

              </select>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="member_particular">Member Particular</label>
              <input type="text" class="form-control" id="member_particularnew${billitem}" name="member_particularnew" value="" >
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
               <label for="no_of_members">No Of Members</label>
               <input type="text" class="form-control" id="no_of_membersnew${billitem}" name="no_of_membersnew" value="" >
          </div>
     </div>
  </div>
      <div class="row">
          <div class="col-md-1 form-group">
            <label for="barsrno" class="font-weight-bold">Sr No:</label>
            <input type="text" class="form-control" id="barsrnonew${billitem}" name="barsrnonew">
          </div>
          <div class="col-md-3 form-group">
            <label for="particulars" class="font-weight-bold">Bar-Particulars:</label>
            <input type="text" class="form-control" id="barParticularsnew${billitem}" name="barParticularsnew">
          </div>
          <div class="col-md-2 form-group">
            <label for="number" class="font-weight-bold">No Of Bars:</label>
            <input type="text" class="form-control" id="noofbarsnew${billitem}" name="noofbarsnew">
          </div>
          <div class="col-md-2 form-group">
              <label for="len" class="font-weight-bold ">Bar Length:</label>
               <select class="form-control form-select" id="lengthDropdownnew${billitem}">
                     <option value="ldiam6"> 6mm dia</option>
                     <option value="ldiam8"> 8mm dia</option>
                      <option value="ldiam10"> 10mm dia</option>
                      <option value="ldiam12"> 12mm dia</option>
                      <option value="ldiam16"> 16mm dia</option>
                      <option value="ldiam20"> 20mm dia</option>
                      <option value="ldiam25"> 25mm dia</option>
                      <option value="ldiam28"> 28mm dia</option>
                      <option value="ldiam32"> 32mm dia</option>
                      <option value="ldiam36"> 36mm dia</option>
                      <option value="ldiam40"> 40mm dia</option>
               </select>
          </div>
          <div class="col-md-2 form-group">
               <label for="brea" class="font-weight-bold">Length in dia:</label>
                <input type="text" class="form-control" id="selectedLengthnew${billitem}" name="selectedLengthnew">
          </div>
          <div class="col-md-2 form-group">
            <label for="Quantity" class="font-weight-bold">Total Bar Length:</label>
            <input type="text" class="form-control" id="barlengthnew${billitem}" name="barlengthnew" disabled>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2 form-group">
            <label for="dom" class="font-weight-bold">Date of Measurement:</label>
            <input type="date" class="form-control" id="steelmeasdatenew${billitem}" name="steelmeasdatenew" data-provide="datepicker" data-date-format="yyyy-mm-dd">
          </div>
        </div>

        <!-- Add this inside your modal or wherever you want to display the enlarged image -->
<div class="enlarged-image-modal">
  <span class="close-enlarged-image">&times;</span>
  <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>
</form>
    </div>
    <div class="modal-footer-manual">
    <button type="button" class="close-button btn btn-secondary" data-dismiss="modal" onclick="manualnewtsteelmodalclose('${billitem}')">Close</button>
      <button type="button" id="newsteeldata${billitem}" class="btn btn-primary" >Submit</button>
    </div>
  </div>
</div>
</div>

<!-- modal of edit rcc steel members -->
<div class="modal fade" id="editrccmbr${billitem}" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Edit Member</h4>
              <button type="button" class="close"  data-close-id="${billitem}" data-modal-type="child" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetaileditrcc${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
          <div class="modal-body">
              <div class="container" style="max-width: 2000px;">
                  <div class="row">
                      <div class="col-md-1">
                          <div class="form-group">
                              <label for="member_sr_no">Sr No</label>
                              <input type="text" class="form-control" id="editmember_sr_no${billitem}" name="editmember_sr_no">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="rc_mbr_id">RCC Member</label>
                              <select class="form-control form-select" id="editrccmember${billitem}" name="editrccmember">
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="member_particulars">Member Particular</label>
                              <input type="text" class="form-control" id="editmember_particulars${billitem}" name="editmember_particulars">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="no_of_members">No Of Members</label>
                              <input type="text" class="form-control" id="editno_of_members${billitem}" name="editno_of_members">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footereditmbr">
          <button type="button" class="close-button btn btn-secondary"  onclick="editrccmbrclose('${billitem}')">Close</button>
              <button type="button" class="btn btn-primary" id="saveChangesButton${billitem}">Save changes</button>
          </div>
      </div>

  </div>
</div>

<!-- edit steel measurement modal -->
<div class="modal" id="editsteelmodal${billitem}" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog  modal-fullscreen"  role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="manualEntryModalLabel">MB Form</h5>
      <button type="button" class="close"  data-close-id="${billitem}" data-modal-type="child" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
    <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetaileditsteel${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
    <div class="form-group">
          <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
          Updated item description ID to 'itemDesc1
       <div id="itemDessteel${billitem}" class="pl-3"></div>
    </div>
    <div class="modal-body">
      <!-- Add your manual entry form here -->
      <form id="editsteelform">
      <div class="row">
      <div class="col-md-1">
          <div class="form-group">
              <label for="sr_no">Sr No</label>
              <input type="text" class="form-control" id="sr_noedit${billitem}" name="sr_noedit" value="" disabled>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="rcc_member">RCC Member</label>
              <input type="text" class="form-control" id="rcc_memberedit${billitem}" name="rcc_memberedit" value="" disabled>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="member_particular">Member Particular</label>
              <input type="text" class="form-control" id="member_particularedit${billitem}" name="member_particularedit" value="" disabled>
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
               <label for="no_of_members">No Of Members</label>
               <input type="text" class="form-control" id="no_of_membersedit${billitem}" name="no_of_membersedit" value="" disabled>
          </div>
     </div>
  </div>
      <div class="row">
          <div class="col-md-1 form-group">
            <label for="barsrno" class="font-weight-bold">Sr No:</label>
            <input type="text" class="form-control" id="barsrno${billitem}" name="barsrno">
          </div>
          <div class="col-md-3 form-group">
            <label for="particulars" class="font-weight-bold">Bar-Particulars:</label>
            <input type="text" class="form-control" id="barParticulars${billitem}" name="barParticulars">
          </div>
          <div class="col-md-2 form-group">
            <label for="number" class="font-weight-bold">No Of Bars:</label>
            <input type="text" class="form-control" id="noofbars${billitem}" name="noofbars">
          </div>
          <div class="col-md-2 form-group">
              <label for="len" class="font-weight-bold ">Bar Length:</label>
               <select class="form-control form-select" id="lengthDropdown${billitem}">
                     <option value="ldiam6"> 6mm dia</option>
                     <option value="ldiam8"> 8mm dia</option>
                      <option value="ldiam10"> 10mm dia</option>
                      <option value="ldiam12"> 12mm dia</option>
                      <option value="ldiam16"> 16mm dia</option>
                      <option value="ldiam8"> 20mm dia</option>
                      <option value="ldiam20"> 25mm dia</option>
                      <option value="ldiam28"> 28mm dia</option>
                      <option value="ldiam32"> 32mm dia</option>
                      <option value="ldiam36"> 36mm dia</option>
                      <option value="ldiam40"> 40mm dia</option>
               </select>
          </div>
          <div class="col-md-2 form-group">
               <label for="brea" class="font-weight-bold">Length in dia:</label>
                <input type="text" class="form-control" id="selectedLength${billitem}" name="selectedLength">
          </div>
          <div class="col-md-2 form-group">
            <label for="Quantity" class="font-weight-bold">Total Bar Length:</label>
            <input type="text" class="form-control" id="barlength${billitem}" name="barlength" disabled>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2 form-group">
            <label for="dom" class="font-weight-bold">Date of Measurement:</label>
            <input type="date" class="form-control" id="steelmeasdate${billitem}" name="steelmeasdate" data-provide="datepicker" data-date-format="yyyy-mm-dd">
          </div>
        </div>
        <!-- Add this inside your modal or wherever you want to display the enlarged image -->
<div class="enlarged-image-modal">
  <span class="close-enlarged-image">&times;</span>
  <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>
</form>
    </div>
    <div class="modal-footer-manual">
    <button type="button" class="close-button btn btn-secondary" onclick="editsteelmodalclose('${billitem}')">Close</button>
      <button type="button" id="editsteel" data-bitemid="${billitem}" onclick="steelsubmit('${billitem}')" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
</div>



<!-- view emb modal -->
<!-- Modal pop up -->
<div class="modal" id="embview${billitem}" tabindex="-1" role="dialog"  data-backdrop="static" aria-labelledby="embview${billitem}" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">View Emb</h5>
              <a href="{{ URL::full() }}" onclick="embviewbuttonclosemain('${billitem}')" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </a>
          </div>
          <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetailview${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
          <div class="row">
  <div class="col-md-2">
      <div class="form-group">
          <label for="itemNo" class="font-weight-bold pl-3">Item No:</label>
          <div id="itemNo${billitem}" class="pl-3"></div>
      </div>
  </div>

  <div class="col-md-6">

  </div>
</div>

          <div class="form-group">
                  <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
                  <div id="itemDesc${billitem}" class="pl-3"></div>
              </div>


          <div class="modal-bodyview" id="normalview${billitem}">
              <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                          <th id="sr-no">Sr_No</th>
             <th id="particulars">Particulars</th>
             <th id="Number">Number</th>
             <th id="length">Length</th>
             <th id="breadth">Breadth</th>
             <th id="height">Height</th>
             <th id="formula">Formula</th>
             <th id="quantity">Quantity</th>
             <th id="date-of-measurement">Date of Measurement</th>
                          </tr>
                      </thead>
                      <tbody id="modal-table-body${billitem}">
                          <tr>
                              <!-- Table rows -->
                          </tr>
                      </tbody>
                  </table>
              </div>
              <div class="row mt-4">
                  <div class="col-3 offset-md-9">
                      <div class="form-group" >
                          <label for="previousQty" class="font-weight-bold">Previous bill Quantity:</label>
                          <input type="text" class="form-control" id="viewpreviousQty${billitem}" name="previousQty"  disabled>
                      </div>
                  </div>
              </div>
              <div class="row mt-4">
                  <div class="col-3 offset-md-9">
                      <div class="form-group" >
                          <label for="currentQty" class="font-weight-bold">Current Quantity:</label>
                          <input type="text" class="form-control" id="viewcurrentQty${billitem}" name="currentQty"  disabled>
                      </div>
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-3 offset-md-3">
                      <div class "form-group">
                          <label for="tndqty" class="font-weight-bold">Tender Quantity Of Item:</label>
                          <input type="text" class="form-control" id="viewtndqty${billitem}" name="tndqty"  disabled>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="percentage" class="font-weight-bold">Percentage:</label>
                          <input type="text" class="form-control" id="viewpercentage${billitem}" name="percentage"  disabled>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="totalQty" class="font-weight-bold">Total Uptodate Quantity:</label>
                          <input type="text" class="form-control" id="viewtotalQty${billitem}" name="totalQty"  disabled>
                      </div>
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-3 offset-md-3">
                      <div class="form-group">
                          <label for="tndcost" class="font-weight-bold">Tende Cost Of Item:</label>
                          <input type="text" class="form-control" id="viewtndcost${billitem}" name="tndcost"  disabled>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="costdifference" class="font-weight-bold">Cost Difference:</label>
                          <input type="text" class="form-control" id="viewcostdifference${billitem}" name="costdifference"  disabled>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="totalcost" class="font-weight-bold">Total Cost of Item:</label>
                          <input type="text" class="form-control" id="viewtotalcost${billitem}" name="totalcost"  disabled>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-bodyview" id="table-containerview${billitem}">
              <!-- Modal body content when data condition 2 is met -->
              <!-- You can customize the content here -->
          </div>
          <div class="modal-footer1">
              <button type="button" class="close-button btn btn-secondary" onclick="embviewbuttonclosemain('${billitem}')" data-dismiss="modal" data-close-modal="${billitem}">Close</button>
          </div>
      </div>
  </div>
</div>
</div>

`;

// Append the modal to the body
$('body').append(modal);
}

    </script>
@endforeach

            </tbody>


          </table>


        </div>
        <div id="data-container">
    <!-- Data will be populated here -->
    {{ $embsection3->links('pagination::bootstrap-4') }}
</div>
        <div class="total-table form-group row">
  <label for="total" class="col-sm-2 col-form-label">Total:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="total" value="{{$total}}" disabled>
  </div>
</div>
      </div>
    </div>
</div>
</div>

<!--@auth -->

<!--@if(auth()->user()->usertypes === "SO" &&  $mbstatus===2) -->

<!--<div class="d-flex justify-content-center align-items-center" >-->
<!--    <form id="yourFormId" method="post" action="{{ url('JuniorEngineerEMB') }}">-->
<!--        @csrf-->
<!--        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->
<!--        <div class="d-flex justify-content-center align-items-center" id="mbbutton">-->
<!--            <button type="submit" class="btn btn-info btn-large goToEMBBtn" id="goToEMBBtn">-->
<!--                View E MB-->
<!--            </button>-->
<!--        </div>-->
<!--    </form></div>-->
<!--</div>-->
<!-- @endif-->


<!--@if(auth()->user()->usertypes === "DYE"  &&  $mbstatus===3)-->
<!--  <form method="post" action="{{ url('DeputyCheck') }}">-->
<!--     @csrf-->
<!--     <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--     <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--     <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--     <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->
<!--     <div class="d-flex justify-content-center align-items-center" id="">-->
<!--         <button type="submit" class="btn btn-info btn-large " id="">-->
<!--             View E MB-->
<!--         </button>-->
<!--     </div>-->
<!--  </form>-->
<!--@endif -->

<!--@if(auth()->user()->usertypes === "EE" &&  $mbstatus===4  )   -->
<!--  <form method="post" action="{{ url('ExecutiveEngineerEMB') }}" >-->
<!--      @csrf-->
<!--      <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--      <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--      <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--      <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->
<!--      <div class="d-flex justify-content-center align-items-center" id="">-->
<!--          <button type="submit" class="btn btn-info btn-large " id="">-->
<!--              View E MB-->
<!--          </button>-->
<!--      </div>-->
<!--  </form>-->
<!-- @endif -->
<!--@if(auth()->user()->usertypes === "Agency" &&  $mbstatus===5) -->
<!--<div class="d-flex justify-content-center align-items-center" >-->
<!--    <form id="yourFormId" method="post" action="{{ url('AgencyCheck') }}">-->
<!--        @csrf-->
<!--        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->

<!--        <div class="d-flex justify-content-center align-items-center" id="">-->
<!--            <button type="submit" class="btn btn-info btn-large " id="">-->
<!--                View E MB-->
<!--            </button>-->
<!--        </div>-->
<!--    </form></div>-->
<!--</div>-->
<!--@endif -->


<!--@if(auth()->user()->usertypes === "SO" &&  $mbstatus===6) -->

<!--<div class="d-flex justify-content-center align-items-center">-->
<!--    <form id="yourFormId" method="post" action="{{ url('RouteCheckListSO') }}">-->
<!--        @csrf-->
<!--        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->
<!--        <div class="d-flex justify-content-center align-items-center" id="mbbutton">-->
<!--            <button type="submit" class="btn btn-info btn-large goToEMBBtn" id="goToEMBBtn">-->
<!--                Check list-->
<!--            </button>-->
<!--        </div>-->
<!--    </form></div>-->
<!--</div>-->
<!-- @endif-->


<!-- @if(auth()->user()->usertypes === "SDC" &&  $mbstatus===7) -->
<!--<div class="d-flex justify-content-center align-items-center" >-->
<!--    <form id="yourFormId" method="post" action="{{ url('AgencyCheck') }}">-->
<!--        @csrf-->
<!--        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">-->
<!--        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">-->
<!--        <input type="hidden" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">-->

<!--        <div class="d-flex justify-content-center align-items-center" id="">-->
<!--            <button type="submit" class="btn btn-info btn-large " id="">-->
<!--                Check List-->
<!--            </button>-->
<!--        </div>-->
<!--    </form></div>-->
<!--</div>-->
<!--@endif -->




<!-- @endauth-->


      </div>
    </div>
  </div>
</div>

</form>

<!-- Priyanka----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}} -->




<!-- Modal Dialog -->
<!-- Modal Dialog -->
<div class="modal" id="newBillModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="newBillModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBillModalLabel">New R.A.Bill Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-bodynewbill">
        <form id="newBillForm" action="#" method="POST" class="row">
          @csrf

           <!-- Previous bill date -->
           <div class="row offset-9">
    <div class="col-md-6">
        <div class="form-group">
            <label for="pbilldt">Previous Bill Date:</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="date" class="form-control" id="pbilldt" name="pbilldt" value="{{$lastBill->previousbilldt ?? ''}}" disabled>
        </div>
    </div>
</div>


          <!-- R.A.Bill Id -->
          <div class="form-group col-md-6">
            <label for="rabillid">R.A.Bill Id:</label>
            <input type="text" class="form-control" id="newrabillid" name="t_bill_Id" value="{{$lastBill -> t_bill_Id ?? ''}}" disabled>
          </div>

          <!-- R.A.Bill No -->
          <div class="form-group col-md-6">
            <label for="rabillno">R.A.Bill No:</label>
            <input type="text" class="form-control" id="newrabillno" name="t_bill_No" value="{{$lastBill -> t_bill_No ?? ''}}" disabled>
          </div>

          <!-- Date -->
          <div class="form-group col-md-6">
    <label for="date">Bill Date:</label>
    <input type="date" class="form-control" id="newbilldate" name="Bill_Dt" value="{{$lastBill -> Bill_Dt ?? ''}}" onchange="updateMeasurementDate()" disabled>
</div>

          <!-- Bill Amt -->
          <div class="form-group col-md-6">
            <label for="rabmino">Bill Amt:</label>
            <input type="text" class="form-control" id="newbillamt" name="bill_amt" value="{{$lastBill -> bill_amt ?? ''}}" disabled>
          </div>

          <!-- Rec Amt -->
          <div class="form-group col-md-6">
            <label for="recamt">Rec Amt:</label>
            <input type="text" class="form-control" id="newrecamt" name="rec_amt" value="{{$lastBill -> rec_amt ?? ''}}" disabled>
          </div>


          <!-- Net Amt -->
          <div class="form-group col-md-6">
            <label for="netamt">Net Amt:</label>
            <input type="text" class="form-control" id="newnetamt" name="net_amt" value="{{$lastBill -> net_amt ?? ''}}" disabled>
          </div>

          <!-- Measdate from -->
          <div class="form-group col-md-6">
            <label for="measdtfr">Measurement Date From:</label>
            <input type="date" class="form-control" id="measdtfr" name="measdtfr"  value="">
          </div>


           <!-- Measdate upto -->
          <div class="form-group col-md-6">
            <label for="measdtupto">Measurement Date Upto:</label>
            <input type="date" class="form-control" id="measdtupto" name="measdtupto" value="" >
          </div>

          <!-- Gst rate -->
          <div class="form-group col-md-4">
            <label for="gstrate">GST Rate:</label>
            <input type="text" class="form-control" id="gstrate" name="gstrate"  value="">
          </div>

          <!-- CV No -->
          <div class="form-group col-md-4">
            <label for="cvno">CV No:</label>
            <input type="text" class="form-control ISMinput" id="newcvno" name="cv_no" value="{{$lastBill -> cv_no ?? ''}}" >
          </div>

          <!-- CV Date -->
          <div class="form-group col-md-4">
           <label for="cvdate">CV Date:</label>
                <input type="date" class="form-control" id="newcvdate" name="cv_dt" value="{{$lastBill -> cv_dt ?? '' }}">
            </div>


          <!-- Bill Type -->
          <div class="form-group col-md-6">
            <label for="billtype">Bill Type:</label>
            <select class="form-control form-select" id="myselect" name="bill_type">
        <option value="Normal" {{ isset($lastBill) && $lastBill->bill_type === 'Normal' ? 'selected' : '' }}>Normal</option>
        <option value="WDBNM" {{ isset($lastBill) && $lastBill->bill_type === 'WDBNM' ? 'selected' : '' }}>WDBNM</option>
        <option value="Sec_Adv" {{ isset($lastBill) && $lastBill->bill_type === 'Sec_Adv' ? 'selected' : '' }}>Secured Advance</option>
        <option value="Mob_Adv" {{ isset($lastBill) && $lastBill->bill_type === 'Mob_Adv' ? 'selected' : '' }}>Mobilization Advance</option>
    </select>
          </div>

<!-- Final Bill -->
<div class="form-group col-md-6">
  <label for="finalbill">Final Bill:</label>
  <div class="form-check">

  <input type="checkbox" class="form-check-input" id="finalbill" name="final_bill" value="1" {{ isset($embsection2) && $embsection2->final_bill == 1 ? 'checked' : '' }} onchange="updateFinalBill(this)">

    <label class="form-check-label" for="finalbill">Check if final bill</label>
  </div>
</div>
  <!-- Submit button -->
          <div class="col-md-12 text-center">
          <button type="submit" id="newbillsubmit" class="btn btn-primary" onclick="submitForm(event)">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Upload images document and videos -->
<!-- Upload images document and videos -->
<div class="modal fade" id="uploadimgmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal content goes here -->
            <form action="{{ url('uploadimgdocvdo') }}" id="uploadForm" enctype="multipart/form-data" method="post">
            @csrf
                              <div class="modal-bodyimage">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 form-group">
 <!-- Hidden input for t_bill_Id -->
                  <input type="hidden" id="rabillid" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">

                                <!-- <label for="photo1" class="font-weight-bold">Photo 1:</label>
                                <input type="file" class="form-control image-input" id="newphoto1" name="photo1" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto1" src="" alt="Previous Photo1" style="max-width: 100px; max-height: 100px;">
                            </div>

                            <div class="col-md-2 form-group">
                            <!-- <label for="photo2" class="font-weight-bold">Photo 2:</label>
                                <input type="file" class="form-control image-input" id="newphoto2" name="photo2" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto2" src="" alt="Previous Photo2" style="max-width: 100px; max-height: 100px;">
                            </div>
                            <div class="col-md-2 form-group">
                            <!-- <label for="photo3" class="font-weight-bold">Photo 3:</label>
                                <input type="file" class="form-control image-input" id="newphoto3" name="photo3" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto3" src="" alt="Previous Photo3" style="max-width: 100px; max-height: 100px;">
                            </div>
                            <div class="col-md-2 form-group">
                            <!-- <label for="photo4" class="font-weight-bold">Photo 4:</label>
                                <input type="file" class="form-control image-input" id="newphoto4" name="photo4" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto4" src="" alt="Previous Photo4" style="max-width: 100px; max-height: 100px;">
                            </div>
                            <div class="col-md-2 form-group">
                            <!-- <label for="photo5" class="font-weight-bold">Photo 5:</label>
                                <input type="file" class="form-control image-input" id="newphoto5" name="photo5" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto5" src="" alt="Previous Photo5" style="max-width: 100px; max-height: 100px;">
                          </div>
                        </div>
    <div class="row">
        <div class="col-md-3 form-group">
            <!-- <label for="documents1" class="font-weight-bold">Document 1:</label>
            <input type="file" class="form-control document-input" id="newdocuments1" name="documents1" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx"> -->
            <a href="#" class="document-link" target="_blank" id="documentLink1">View Document</a>
        </div>

        <div class="col-md-3 form-group">
            <!-- <label for="documents2" class="font-weight-bold">Document 2:</label>
            <input type="file" class="form-control document-input" id="newdocuments2" name="documents2" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx"> -->
            <a href="#" class="document-link" target="_blank" id="documentLink2">View Document</a>
        </div>

        <div class="col-md-3 form-group">
           <!-- <label for="documents3" class="font-weight-bold">Document 3:</label>
           <input type="file" class="form-control document-input" id="newdocuments3" name="documents3" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx"> -->
           <a href="#" class="document-link" target="_blank" id="documentLink3">View Document</a>
         </div>

    </div>

    <div class="row">
    <!-- Additional Document Row 1 -->

    <div class="col-md-3 form-group">
        <!-- <label for="documents4" class="font-weight-bold">Document 4:</label>
        <input type="file" class="form-control document-input" id="newdocuments4" name="documents4" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx"> -->
        <a href="#" class="document-link" target="_blank" id="documentLink4">View Document</a>
    </div>

    <div class="col-md-3 form-group">
        <!-- <label for="documents5" class="font-weight-bold">Document 5:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink5">View Document</a>
    </div>

    <div class="col-md-3 form-group">
        <!-- <label for="documents6" class="font-weight-bold">Document 6:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink6">View Document</a>
    </div>
    
    <div class="col-md-3 form-group">
        <!-- <label for="documents7" class="font-weight-bold">Document 7:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink7">View Document</a>
    </div>

</div>

<div class="row">
    <!-- Additional Document Row 2 -->

    <div class="col-md-3 form-group">
        <!-- <label for="documents8" class="font-weight-bold">Document 8:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink8">View Document</a>
    </div>

    <div class="col-md-3 form-group">
        <!-- <label for="documents9" class="font-weight-bold">Document 9:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink9">View Document</a>
    </div>

    <div class="col-md-3 form-group">
        <!-- <label for="documents6" class="font-weight-bold">Document 10:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink10">View Document</a>
    </div>


    <div class="col-md-3 form-group">
              <!-- <label for="video" class="font-weight-bold">Video:</label> -->
            <div class="video-container" style="width: 220px; height: 150px; overflow: hidden;">
               <video id="videoPreview" controls style="width: 100%; height: 100%;"></video>
           </div>
        </div>
</div>
                    </div>
                </div>
                <div class="modal-footer1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary" >Upload</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="enlarged-image-modal">
    <span class="close-enlarged-image">&times;</span>
    <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>
<style>
  #alltenderitem {
        width: 20px; /* Adjust the width as needed */
        height: 20px; /* Adjust the height as needed */
    }


</style>

<!-- Ajax modal for add tnd item button -->
<!-- Modal for the AJAX content -->
<!-- Modal for the AJAX content -->
<div class="modal fade" id="tndItemModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tndItemModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tndItemModalLabel">Tender Item Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <div>
        <button type="button" class="btn btn-primary"  id="findtender">FIND</button>
      </div>
      <div class="form-row align-items-center justify-content-end">
  <div class="col-auto">
    <div class="form-check col-10">
      <input type="checkbox" class="form-check-input" id="alltenderitem" name="alltenderitem" value="">
      <label class="form-check-label mr-3" for="alltenderitem" style="margin-left:15px;">  ALL TENDER ITEM</label>
    </div>
  </div>
</div>


        <!-- Table content will be loaded here dynamically using AJAX -->
        <table class="table table-striped table-hover" id="ajaxTable">
          <thead>
            <tr>
              <th class="right-align no-padding">Item No</th>
              <th></th>
              <th>Description</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th>Rate</th>
              <th>Amount</th>
              <th>select Item</th>
              <!-- Add more table headers as needed -->
            </tr>
          </thead>
          <tbody>
            <!-- Table content will be loaded dynamically using AJAX -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  onclick="submitSelectedItems(event)">Submit</button>
        <!-- You can add additional buttons or actions here as needed -->
      </div>
    </div>
  </div>
</div>

<!-- New Find Item Modal -->
<div class="modal fade" id="findItemModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="findItemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="findItemModalLabel">Find Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Your content for the Find Item modal goes here -->
        <p>This is the content of the Find Item modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitFindItem()">Submit</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $("#findtender").on("click", function () {
      $("#findItemModal").modal("show");
    });
  });
</script>

<style>
  #tndItemModal .modal-body {
    max-height: 90vh; /* Set a maximum height as needed */
    overflow-y: auto;
}

#ajaxTable {
    max-height: calc(100% - 100px); /* Adjust the value as needed */
    overflow-y: auto;
}

.modal-footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    background-color: white;
    border-top: 1px solid #e5e5e5;
    padding: 10px 20px;
}

</style>


<!-- Modal for Excel file selection -->
<div class="modal fade" id="AllmeasexcelModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content modal-content1">
      <div class="modal-header modal-header1">
        <h5 class="modal-title">Select Excel File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body1">
        <input type="file" id="excelFileInputallmeas" accept=".xlsx, .xls" />
      </div>
      <div class="modal-footerallmeas1">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitExcel" onclick="addallmeasurement()">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- modal for edit tender  -->
<!-- Modal -->
<div class="modal fade" id="edittenderModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row" id="workdetail">
     <div class="col-md-12">
        <div id="workdetailtender">
        </div>
      </div>
  </div>
<br>
      <div class="modal-body">
        <!-- Form layout with rows and columns -->
        <form id="editForm">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="item">Item</label>
                <textarea class="form-control" id="item" name="item" rows="3"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tenderItemNo">Tender Item No</label>
                <input type="text" class="form-control" id="tenderItemNo" name="tenderItemNo" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="tenderQuantity">Tender Quantity</label>
                <input type="text" class="form-control" id="tenderQuantity" name="tenderQuantity">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="uptoDateQty">Upto Date Qty</label>
                <input type="text" class="form-control" id="uptoDateQty" name="uptoDateQty" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tenderRate">Tender Rate</label>
                <input type="text" class="form-control" id="tenderRate" name="tenderRate" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="billRate">Bill Rate</label>
                <input type="text" class="form-control" id="billRate" name="billRate">
                <div id="error-message" style="color: red;"></div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="rateCode">Rate Code</label>
                <select class="form-control" id="rateCode" name="rateCode">
                  <option value="Part Rate">Part Rate</option>
                  <option value="Full Rate">Full Rate</option>
                  <option value="Actual Rate">Reduced Rate</option>
               </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" class="form-control" id="unit" name="unit" disabled>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" disabled>
              </div>
            </div>
          </div>
        </form>
      </div>      <div class="modal-footeredittender">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<!-- rate analysis modal -->
<!-- Modal for additional information -->
<div class="modal fade" id="rateanalysis" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="additionalInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="additionalInfoModalLabel">PART/REDUCED RATE ANALYSIS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row" id="workdetail">
                                <div class="col-md-12">
                                    <div id="workdetailrateanalysis">
                                    </div>
                                  </div>
                              </div>
                            <br>
      <div class="modal-body">
      <div class="form-group row">
          <label for="tenderItemNo" class="col-sm-2 col-form-label">Tender Item No:</label>
          <div class="col-sm-3">
            <input type="text" id="tenderItemNoModal" class="form-control" readonly>
          </div>
          <label for="tenderRateModal" class="col-sm-2 col-form-label">Tender Rate:</label>
          <div class="col-sm-4">
            <input type="text" id="tenderRateModal" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="itemDesc" class="col-sm-2 col-form-label">Item Description:</label>
          <div class="col-sm-8">
            <input type="text" id="itemDesctender" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="rateCodeModal" class="col-sm-2 col-form-label">Rate Code:</label>
          <div class="col-sm-3">
            <select id="rateCodeModal" class="form-control form-select">
              <option value="Part Rate">Part Rate Analysis</option>
              <option value="Reduced Rate">Reduced Rate Analysis</option>
            </select>
          </div>
          <!-- <div class="col-sm-3">
            <h5>Analysis</h5>
          </div> -->
        </div>

        <div class="form-group row mt-3">
          <div class="col">
            <table class="table">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Particulars about Rate Reduction</th>
                  <th>Formula for Reduced Rate</th>
                  <th>Amount Reduced</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody id="rowdata">
                <!-- Add rows to the table here -->
              </tbody>
            </table>
          </div>
        </div>

        <div class="form-group row mt-3">
                <div class="col text-right"> <!-- Use text-right class to right-align content -->
                    <button type="button" class="btn btn-primary" id="addRowBtn">
                      <i class="fas fa-plus"></i> Add Row
                    </button>
                 </div>
          </div>
          <div class="form-group row mt-4">
        <div class="col-sm-9 text-right">
            <label for="rateReducedBy" class="col-form-label">Rate Reduced By:</label>
        </div>
        <div class="col-sm-3">
            <input type="text" id="rateReducedBy" class="form-control" readonly>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-9 text-right">
            <label for="partReducedRate" class="col-form-label">Part/Reduced Rate:</label>
        </div>
        <div class="col-sm-3">
            <input type="text" id="partReducedRate" class="form-control" readonly>
        </div>
    </div>
    <div class="form-group row mt-4">
          <div class="col text-center">
            <button type="button" class="btn btn-success" id="submitDataBtn">
              Submit
            </button>
          </div>
        </div>
      <div class="modal-footerrateanalysis">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- view emb modal -->
<!-- Modal pop up -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="viewmodal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Measurement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="itemNo" class="font-weight-bold pl-3">Item No:</label>
            <div id="itemNo" class="pl-3"></div>
        </div>
    </div>

    <!-- <div class="col-md-6">
        <div class="form-group">
            <label for="subNo" class="font-weight-bold pl-3">Sub No:</label>
            <div id="subNo" class="pl-3"></div>
        </div>
    </div> -->
</div>

            <div class="form-group">
                    <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
                    <div id="itemDesc" class="pl-3"></div>
                </div>


            <div class="modal-body" id="normalview">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                <th>Sr_No</th>
                <th>Particulars</th>
                <th>No</th>
                <th>Length</th>
                <th>Breadth</th>
                <th>Height</th>
                <th>Formula</th>
                <th>Quantity</th>
                <th>Date of Measurement</th>
                <th>Photo1</th>
                <th>Photo2</th>
                <th>Photo3</th>
                <th>Document</th>
                            </tr>
                        </thead>
                        <tbody id="modal-table-body">
                            <tr>
                                <!-- Table rows -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-body" id="table-containerview">
        <!-- Modal body content when data condition 2 is met -->
          <!-- You can customize the content here -->
               </div>
            <div class="modal-footer1">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<style>
  .modal-lg {
  max-height: 80vh; /* Adjust the value as needed */
  /* Enable vertical scrolling if the content overflows */
}

/* Style the table container to allow for scrolling */
#table-container4 {
  max-height: 80vh; /* Adjust the value as needed for height */
  overflow-y: auto; /* Enable vertical scrolling if the table overflows */
}
/* Override Bootstrap modal styles for the specific modal by ID */
#embeditbutton .modal.fade.show {
    display: flex !important;
    align-items: center;
    justify-content: center;
  }

  /* #embeditbutton .modal-dialog {
    width: 100% !important;
    max-width: 100% !important;
    height: 100% !important;
    margin: 0 !important;
  }

  #embeditbutton .modal-content {
    height: 100% !important;
  } */
</style>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-fullscreen-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabeledit">Edit Measurement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="itemNo" class="font-weight-bold pl-3">Item No:</label>
            <div id="itemNo1" class="pl-3"></div>
        </div>
    </div>

    <!-- <div class="col-md-6">
        <div class="form-group">
            <label for="subNo" class="font-weight-bold pl-3">Sub No:</label>
            <div id="subNo1" class="pl-3"></div>
        </div>
    </div> -->
</div>

        <div class="form-group">
            <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
            <!-- Updated item description ID to 'itemDesc1' -->
         <div id="itemDesc1" class="pl-3"></div>
      </div>
      <!-- Add the New button here -->
      <button type="button"


      class="btn btn-primary btn-md ml-auto mr-2" onclick="newmeasurement()">New</button>
      <div class="modal-body" id="normaldata">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Sr_No</th>
                <th>Particulars</th>
                <th>No</th>
                <th>Length</th>
                <th>Breadth</th>
                <th>Height</th>
                <th>Formula</th>
                <th>Quantity</th>
                <th>Date of Measurement</th>
                <th>Not for Payment</th>
                <!-- <th>Photo1</th>
                <th>Photo2</th>
                <th>Photo3</th>
                <th>Document</th> -->
                <th id="action-column">Action</th> <!-- New column for action buttons -->
              </tr>
            </thead>
            <tbody id="modal-table-body2">
              <!-- Table rows will be populated using AJAX response -->
            </tbody>
          </table>
        </div>
        <div class="row mt-4 marginleft col-md-11" >
  <div class="col-md-5">
    <div class="form-group">
      <label for="previousQty" class="font-weight-bold">Previous bill Quantity:</label>
      <input type="text" class="form-control" id="previousQty" name="previousQty" disabled>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="currentQty" class="font-weight-bold">Current Quantity:</label>
      <input type="text" class="form-control" id="currentQty" name="currentQty" disabled>
    </div>
  </div>
</div>

<div class="row mt-3"  >
<div class="col-md-4">
    <div class="form-group">
      <label for="tndqty" class="font-weight-bold">Tender Quantity Of Item:</label>
      <input type="text" class="form-control" id="tndqty" name="tndqty" disabled>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="percentage" class="font-weight-bold">Percentage:</label>
      <input type="text" class="form-control" id="percentage" name="percentage" disabled>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="totalQty" class="font-weight-bold">Total Uptodate Quantity:</label>
      <input type="text" class="form-control" id="totalQty" name="totalQty" disabled>
    </div>
  </div>
</div>
<div class="row mt-3"  >
<div class="col-md-4">
    <div class="form-group">
      <label for="tndcost" class="font-weight-bold">Tende Cost Of Item:</label>
      <input type="text" class="form-control" id="tndcost" name="tndcost" disabled>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="costdifference" class="font-weight-bold"></label>
      <input type="text" class="form-control" id="costdifference" name="costdifference" disabled>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="totalcost" class="font-weight-bold">Total Cost of Item:</label>
      <input type="text" class="form-control" id="totalcost" name="totalcost" disabled>
    </div>
  </div>
</div>

<div class="modal-body" id="table-container4">
        <!-- Modal body content when data condition 2 is met -->
          <!-- You can customize the content here -->
      </div>
      <div class="modal-footer3">
        <!-- Removed the 'New' button -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

   <!-- New modal for Excel upload and manual entry -->
<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="newModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newModalLabel">New Measurement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><h5>Select how you want to add a new measurement:</h5></p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal" onclick="uploadExcel()">Upload Excel</button>
        <button type="button" class="btn btn-primary" onclick="manualEntry()">Manual Entry</button>
      </div>
    </div>
  </div>
</div>
<!-- Excel upload data modal open -->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">Upload Excel File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="uploadForm">
          <div class="form-group">
            <label for="excelFile">Select Excel File:</label>
            <input type="file" class="form-control-file" id="excelFile" name="excelFile" accept=".xls, .xlsx">
          </div>
        </form>
      </div>
      <div class="modal-footer4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitUploadExcel()">Upload</button>
      </div>
    </div>
  </div>
</div>












<style>
  .marginleft{
    margin-left: 380px; /* You can adjust the margin size as needed */
  }
</style>




<!-- Edit emb button modal open -->
<!-- Modal pop up -->

<!-- Edit button modal for EMB Button  -->
<style>
  /* Custom class to increase modal length */
  .modal-lg-custom {
    max-width: 90%; /* Adjust the percentage as needed */
  }
</style>
<!-- The Modal -->
<div class="modal fade" id="editembModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-lg-custom" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit EMB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editItemForm" class="row">
          @csrf
          <div class="row">
            <div class="col-md-3 form-group">
              <label for="particulars" class="font-weight-bold">Particulars:</label>
              <input type="text" class="form-control" id="particulars" name="Particulars">
            </div>
            <div class="col-md-2 form-group">
              <label for="number" class="font-weight-bold">Number:</label>
              <input type="text" class="form-control"  id="number" name="Number">
            </div>
            <div class="col-md-2 form-group">
              <label for="len" class="font-weight-bold">Length:</label>
              <input type="text" class="form-control"  id="length" name="Length">
            </div>
            <div class="col-md-2 form-group">
              <label for="brea" class="font-weight-bold">Breadth:</label>
              <input type="text" class="form-control"  id="breadth" name="Breadth">
            </div>
            <div class="col-md-2 form-group">
              <label for="hei" class="font-weight-bold">Height:</label>
              <input type="text" class="form-control"  id="height" name="Height">
            </div>
            <div class="col-md-1 form-group">
              <label for="Quantity" class="font-weight-bold">Quantity:</label>
              <input type="text" class="form-control"  id="quantity" name="Quantity">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group">
              <label for="formula" class="font-weight-bold">Formula:</label>
              <input type="text" class="form-control" id="formula" name="Formula">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 form-group">
              <label for="Dom" class="font-weight-bold">Date of Measurement:</label>
              <input type="date" class="form-control" id="dom" name="dom" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
            <div class="col-md-2 form-group">
                       <label class="font-weight-bold">Not for Payment:</label>
                      <div class="form-check">
                         <input type="checkbox" class="form-check-input" id="notforpaymentCheckbox" name="notforpayment" value="1">
                         <label class="form-check-label" for="notforpaymentCheckbox">Not for Payment</label>
                      </div>
            </div>
          </div>

             <!-- Add this inside your modal or wherever you want to display the enlarged image -->
             <div class="enlarged-image-modal">
    <span class="close-enlarged-image">&times;</span>
    <img class="enlarged-image-content" src="" alt="Enlarged Image">
     </div>
        </form>
      </div>
      <div class="modal-footereditemb">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submitEditButton" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>



<!-- Manual entry form for the measurement -->
<style>

  /* .modal-dialog-custom {
    max-width: 1300px;
    display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  margin-top: 10vh; /* Adjust this value for the vertical positioning
  } */

/* Add this to your existing CSS or in a <style> tag in your HTML */
.enlarged-image-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.8);
}

.enlarged-image-content {
    display: block;
    margin: auto;
    max-width: 90%;
    max-height: 90%;
}

.close-enlarged-image {
    position: absolute;
    top: 15px;
    right: 25px;
    font-size: 35px;
    font-weight: bold;
    color: #f1f1f1;
    cursor: pointer;
}



</style>
<!-- Manual entry modal -->
<div class="modal fade" id="manualEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-custom" id="modal-top" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="manualEntryModalLabel">MB Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="form-group">
            <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
            <!-- Updated item description ID to 'itemDesc1' -->
         <div id="itemDescmb" class="pl-3"></div>
      </div>
      <div class="modal-body">
        <!-- Add your manual entry form here -->
        <form id="manualEntryForm">
        <div class="row">
            <div class="col-md-3 form-group">
              <label for="particulars" class="font-weight-bold">Particulars:</label>
              <input type="text" class="form-control" id="newparticulars" name="Particulars">
            </div>
            <div class="col-md-2 form-group">
              <label for="number" class="font-weight-bold">Number:</label>
              <input type="text" class="form-control" id="newnumber" name="Number">
            </div>
            <div class="col-md-2 form-group">
              <label for="len" class="font-weight-bold">Length:</label>
              <input type="text" class="form-control" id="newlength" name="Length" >
            </div>
            <div class="col-md-2 form-group">
              <label for="brea" class="font-weight-bold">Breadth:</label>
              <input type="text" class="form-control" id="newbreadth" name="Breadth">
            </div>
            <div class="col-md-2 form-group">
              <label for="hei" class="font-weight-bold">Height:</label>
              <input type="text" class="form-control" id="newheight" name="Height">
            </div>
            <div class="col-md-1 form-group">
              <label for="Quantity" class="font-weight-bold">Quantity:</label>
              <input type="text" class="form-control" id="newquantity" name="Quantity">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group">
              <label for="formula" class="font-weight-bold">Formula:</label>
              <input type="text" class="form-control" id="newformula" name="Formula">
            </div>
          </div>

          <div class="row">
            <div class="col-md-2 form-group">
              <label for="dom" class="font-weight-bold">Date of Measurement:</label>
              <input type="date" class="form-control" id="newdom" name="dom" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
            <div class="col-md-2 form-group">
               <label class="font-weight-bold">Not for Payment:</label>
               <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="newnotforpaymentCheckbox" name="newnotforpayment" value="1">
                    <label class="form-check-label" for="notforpaymentCheckbox">Not for Payment</label>
                </div>
            </div>
          </div>


          <!-- Add this inside your modal or wherever you want to display the enlarged image -->
<div class="enlarged-image-modal">
    <span class="close-enlarged-image">&times;</span>
    <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>
 </form>
      </div>
      <div class="modal-footer-manual">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="submitButton" class="btn btn-primary" onclick="submitManualEntry()">Submit</button>
      </div>
    </div>
  </div>
</div>



<!-- for large image seen in table -->
<div class="enlarged-image-modal">
  <span class="close-enlarged-image">&times;</span>
  <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>













<div class="modal fade" id="editsteelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-custom" id="modal-top" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="manualEntryModalLabel">MB Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="form-group">
            <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
             Updated item description ID to 'itemDesc1
         <div id="itemDessteel" class="pl-3"></div>
      </div>
      <div class="modal-body">
        <!-- Add your manual entry form here -->
        <form id="editsteelform">
        <div class="row">
        <div class="col-md-1">
            <div class="form-group">
                <label for="sr_no">Sr No</label>
                <input type="text" class="form-control" id="sr_noedit" name="sr_noedit" value="" disabled>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="rcc_member">RCC Member</label>
                <input type="text" class="form-control" id="rcc_memberedit" name="rcc_memberedit" value="" disabled>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="member_particular">Member Particular</label>
                <input type="text" class="form-control" id="member_particularedit" name="member_particularedit" value="" disabled>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                 <label for="no_of_members">No Of Members</label>
                 <input type="text" class="form-control" id="no_of_membersedit" name="no_of_membersedit" value="" disabled>
            </div>
       </div>
    </div>
        <div class="row">
            <div class="col-md-1 form-group">
              <label for="barsrno" class="font-weight-bold">Sr No:</label>
              <input type="text" class="form-control" id="barsrno" name="barsrno">
            </div>
            <div class="col-md-3 form-group">
              <label for="particulars" class="font-weight-bold">Bar-Particulars:</label>
              <input type="text" class="form-control" id="barParticulars" name="barParticulars">
            </div>
            <div class="col-md-2 form-group">
              <label for="number" class="font-weight-bold">No Of Bars:</label>
              <input type="text" class="form-control" id="noofbars" name="noofbars">
            </div>
            <div class="col-md-2 form-group">
                <label for="len" class="font-weight-bold ">Bar Length:</label>
                 <select class="form-control form-select" id="lengthDropdown">
                       <option value="ldiam6"> 6mm dia</option>
                       <option value="ldiam8"> 8mm dia</option>
                        <option value="ldiam10"> 10mm dia</option>
                        <option value="ldiam12"> 12mm dia</option>
                        <option value="ldiam16"> 16mm dia</option>
                        <option value="ldiam8"> 20mm dia</option>
                        <option value="ldiam20"> 25mm dia</option>
                        <option value="ldiam28"> 28mm dia</option>
                        <option value="ldiam32"> 32mm dia</option>
                        <option value="ldiam36"> 36mm dia</option>
                        <option value="ldiam40"> 40mm dia</option>
                 </select>
            </div>
            <div class="col-md-2 form-group">
                 <label for="brea" class="font-weight-bold">Length in dia:</label>
                  <input type="text" class="form-control" id="selectedLength" name="selectedLength">
            </div>
            <div class="col-md-2 form-group">
              <label for="Quantity" class="font-weight-bold">Total Bar Length:</label>
              <input type="text" class="form-control" id="barlength" name="barlength" disabled>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2 form-group">
              <label for="dom" class="font-weight-bold">Date of Measurement:</label>
              <input type="date" class="form-control" id="steelmeasdate" name="steelmeasdate" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
          </div>
          <!-- <div class="row">
             <div class="col-md-3 form-group">
               <label for="photo1" class="font-weight-bold">Photo 1:</label>
               <input type="file" class="form-control image-input" id="newphoto1steel" name="photo1steel" accept="image/jpeg, image/jpg">
               <img id="previewPhoto1steel" src="" alt="Preview Photo 1steel" style="max-width: 100px; max-height: 100px; cursor: pointer;"
                    data-bs-toggle="modal" data-bs-target="#largerImageModal" data-bs-image="previewPhoto1">
             </div>
             <div class="col-md-3 form-group">
               <label for="photo2" class="font-weight-bold">Photo 2:</label>
               <input type="file" class="form-control image-input" id="newphoto2steel" name="photo2steel" accept="image/jpeg, image/jpg">
               <img id="previewPhoto2steel" src="" alt="Preview Photo 2steel" style="max-width: 100px; max-height: 100px; cursor: pointer;"
                    data-bs-toggle="modal" data-bs-target="#largerImageModal" data-bs-image="previewPhoto2">
             </div>
             <div class="col-md-3 form-group">
               <label for="photo3" class="font-weight-bold">Photo 3:</label>
               <input type="file" class="form-control image-input" id="newphoto3steel" name="photo3steel" accept="image/jpeg, image/jpg">
               <img id="previewPhoto3steel" src="" alt="Preview Photo 3"steel style="max-width: 100px; max-height: 100px; cursor: pointer;"
                    data-bs-toggle="modal" data-bs-target="#largerImageModal" data-bs-image="previewPhoto3">
             </div>
             <div class="col-md-3 form-group">
                  <label for="documents" class="font-weight-bold">Documents:</label>
                  <input type="file" class="form-control document-input" id="newdocumentssteel" name="documentssteel" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
                   <a href="#" class="document-link" target="_blank">View Document</a>
              </div>
          </div>
            -->
          <!-- Add this inside your modal or wherever you want to display the enlarged image -->
<div class="enlarged-image-modal">
    <span class="close-enlarged-image">&times;</span>
    <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>
 </form>
      </div>
      <div class="modal-footer-manual">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="steeldata"  class="btn btn-primary" >Submit</button>
      </div>
    </div>
  </div>
</div>




<!-- New steel measurement by manually modal  -->
<div class="modal fade" id="manualnewtsteelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-custom" id="modal-top" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="manualEntryModalLabel">MB STEEL Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="form-group">
            <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
            <!-- Updated item description ID to 'itemDesc1' -->
         <div id="itemDessteel" class="pl-3"></div>
      </div>
      <div class="modal-body">
        <!-- Add your manual entry form here -->
        <form id="newsteelform">
        <div class="row">
        <div class="col-md-1">
            <div class="form-group">
                <label for="sr_no">Sr No</label>
                <input type="text" class="form-control" id="sr_nonew" name="sr_nonew" value="" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="rcc_member">RCC Member</label>
                <select class="form-control form-select" name="rcc_membernew" id="rcc_membernew">

                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="member_particular">Member Particular</label>
                <input type="text" class="form-control" id="member_particularnew" name="member_particularnew" value="" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                 <label for="no_of_members">No Of Members</label>
                 <input type="text" class="form-control" id="no_of_membersnew" name="no_of_membersnew" value="" >
            </div>
       </div>
    </div>
        <div class="row">
            <div class="col-md-1 form-group">
              <label for="barsrno" class="font-weight-bold">Sr No:</label>
              <input type="text" class="form-control" id="barsrnonew" name="barsrnonew">
            </div>
            <div class="col-md-3 form-group">
              <label for="particulars" class="font-weight-bold">Bar-Particulars:</label>
              <input type="text" class="form-control" id="barParticularsnew" name="barParticularsnew">
            </div>
            <div class="col-md-2 form-group">
              <label for="number" class="font-weight-bold">No Of Bars:</label>
              <input type="text" class="form-control" id="noofbarsnew" name="noofbarsnew">
            </div>
            <div class="col-md-2 form-group">
                <label for="len" class="font-weight-bold ">Bar Length:</label>
                 <select class="form-control form-select" id="lengthDropdownnew">
                       <option value="ldiam6"> 6mm dia</option>
                       <option value="ldiam8"> 8mm dia</option>
                        <option value="ldiam10"> 10mm dia</option>
                        <option value="ldiam12"> 12mm dia</option>
                        <option value="ldiam16"> 16mm dia</option>
                        <option value="ldiam20"> 20mm dia</option>
                        <option value="ldiam25"> 25mm dia</option>
                        <option value="ldiam28"> 28mm dia</option>
                        <option value="ldiam32"> 32mm dia</option>
                        <option value="ldiam36"> 36mm dia</option>
                        <option value="ldiam40"> 40mm dia</option>
                 </select>
            </div>
            <div class="col-md-2 form-group">
                 <label for="brea" class="font-weight-bold">Length in dia:</label>
                  <input type="text" class="form-control" id="selectedLengthnew" name="selectedLengthnew">
            </div>
            <div class="col-md-2 form-group">
              <label for="Quantity" class="font-weight-bold">Total Bar Length:</label>
              <input type="text" class="form-control" id="barlengthnew" name="barlengthnew" disabled>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2 form-group">
              <label for="dom" class="font-weight-bold">Date of Measurement:</label>
              <input type="date" class="form-control" id="steelmeasdatenew" name="steelmeasdatenew" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
          </div>
          <!-- <div class="row">
             <div class="col-md-3 form-group">
               <label for="photo1" class="font-weight-bold">Photo 1:</label>
               <input type="file" class="form-control image-input" id="newphoto1steelnew" name="photo1steelnew" accept="image/jpeg, image/jpg">
               <img id="previewPhoto1steelnew" src="" alt="Preview Photo 1steelnew" style="max-width: 100px; max-height: 100px; cursor: pointer;"
                    data-bs-toggle="modal" data-bs-target="#largerImageModal" data-bs-image="previewPhoto1">


             </div>
             <div class="col-md-3 form-group">
               <label for="photo2" class="font-weight-bold">Photo 2:</label>
               <input type="file" class="form-control image-input" id="newphoto2steelnew" name="photo2steelnew" accept="image/jpeg, image/jpg">
               <img id="previewPhoto2steelnew" src="" alt="Preview Photo 2steelnew" style="max-width: 100px; max-height: 100px; cursor: pointer;"
                    data-bs-toggle="modal" data-bs-target="#largerImageModal" data-bs-image="previewPhoto2">
             </div>
             <div class="col-md-3 form-group">
               <label for="photo3" class="font-weight-bold">Photo 3:</label>
               <input type="file" class="form-control image-input" id="newphoto3steelnew" name="photo3steelnew" accept="image/jpeg, image/jpg">
               <img id="previewPhoto3steelnew" src="" alt="Preview Photo 3steelnew"steel style="max-width: 100px; max-height: 100px; cursor: pointer;"
                    data-bs-toggle="modal" data-bs-target="#largerImageModal" data-bs-image="previewPhoto3">
             </div>
             <div class="col-md-3 form-group">
                  <label for="documents" class="font-weight-bold">Documents:</label>
                  <input type="file" class="form-control document-input" id="newdocumentssteelnew" name="documentssteelnew" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
                   <a href="#" class="document-link" target="_blank">View Document</a>
              </div>
          </div> -->

          <!-- Add this inside your modal or wherever you want to display the enlarged image -->
<div class="enlarged-image-modal">
    <span class="close-enlarged-image">&times;</span>
    <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>
 </form>
      </div>
      <div class="modal-footer-manual">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="newsteeldata"  class="btn btn-primary" >Submit</button>
      </div>
    </div>
  </div>
</div>



<!-- modal of edit rcc steel members -->
<div class="modal fade" id="editrccmbr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container" style="max-width: 2000px;">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="member_sr_no">Sr No</label>
                                <input type="text" class="form-control" id="editmember_sr_no" name="editmember_sr_no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rc_mbr_id">RCC Member</label>
                                <select class="form-control form-select" id="editrccmember" name="editrccmember">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="member_particulars">Member Particular</label>
                                <input type="text" class="form-control" id="editmember_particulars" name="editmember_particulars">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="no_of_members">No Of Members</label>
                                <input type="text" class="form-control" id="editno_of_members" name="editno_of_members">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footereditmbr">
            <button type="button" class="close-button btn btn-secondary" data-dismiss="modal" >Close</button>
                <button type="button" class="btn btn-primary" id="saveChangesButton">Save changes</button>
            </div>
        </div>

    </div>
</div>




<script>

function progressbar() {
  var csrfToken = $('meta[name="csrf-token"]').attr('content');
  var workid = $('#workid').val();
  console.log(workid);
  $.ajax({
    url: "{{ url('progressbarmeas') }}",
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN':csrfToken
 // Set the CSRF token in the request headers
    },
    data: { workId: workid },
    success: function(response) {
      // Inject the loaded content into the modal

// Show the modal
    },
    error: function(xhr, status, error) {
      // Handle errors here
      console.error(xhr, status, error);
    }
  });
}

      // Show the modal




function getCurrentPageNumber() {
    // Find the active page link and extract the page number
    var currentPageLink = $('.pagination').find('.page-item.active').children('.page-link');
    if (currentPageLink.length > 0) {
        var currentPageNumber = currentPageLink.data('page');
        console.log(currentPageNumber);
        return currentPageNumber;
    }
    return 1; // Default to page 1 if no active link found
}


// $(document).ready(function () {
//     // Function to load paginated data


//     bindPaginationClick();
//     // Initial load
//     loadPaginatedData();
// });


//  // Function to bind click event to pagination links
//  function bindPaginationClick() {
//         $(document).on('click', '.pagination a', function (e) {
//             e.preventDefault();
//             var page = $(this).attr('href').split('page=')[1];
//             loadPaginatedData(page);
//         });
//     }

// function loadPaginatedData(page = 1) {
//       var rabillidValue = $('#rabillid').val();
//           var workid = $('#workid').val();

//         console.log(rabillidValue);
//             $.ajax({
//                     url: '/get-paginated-data?page=' + page,
//                  method: 'GET',
//                    data: { rabillid: rabillidValue,
//                     workid:workid },
//                 success: function (data) {
//                     // Update data container
//                    // console.log(data);
//                     var newbilitemData = data.embsection3;

//    var gotembbutton=data.gotembbutton;
//    if(gotembbutton == 0)
//    {
//      // console.log('button' +gotembbutton);
//     $('.goToEMBBtn').hide();
//    }

//       // Check if the current bill is in 'is_current' flag
//       var tbillid=data.tbillid;
//    var billdata=data.billdata;
//    console.log(billdata);

//    var total = data.total;
// var formattedTotal = parseFloat(total).toFixed(2);
// $('#total').val(formattedTotal);
//       // Clear the existing table body content



//  var tableHeader = `
//     <table class="table table-striped table-hover">
//         <thead>
//             <tr>
//                 <th>Tender Item No</th>
//                 <th>Item</th>
//                 <th>Tender Quantity</th>
//                 <th>Bill Rate</th> <!-- Span two columns for Rate -->
//                 <th>Rate Code</th>
//                 <th>Upto Date Qty</th>
//                 <th>Current Amt</th>
//                 <th>Previous Amt</th>
//                 <th>Unit</th>
//                 <th>Uptodate Amount</th>
//                 <th>Action</th>
//             </tr>
//             <tr>
//                 <th></th> <!-- Empty cell for Tender Item No -->
//                 <th></th> <!-- Empty cell for Item -->
//                 <th></th> <!-- Empty cell for Tender Quantity -->
//                 <th>Tender Rate</th> <!-- First heading -->
//                 <th></th> <!-- Second heading -->
//                 <th></th> <!-- Empty cell for Rate Code -->
//                 <th></th> <!-- Empty cell for Upto Date Qty -->
//                 <th></th> <!-- Empty cell for Unit -->
//                 <th></th> <!-- Empty cell for Amount -->
//                 <th></th> <!-- Empty cell for Action -->
//             </tr>
//         </thead>
//         <tbody>
// `;

// var tableFooter = `</tbody></table>`;
// var row = '';

// $('#billitemtbody').empty();



//       // Update the table with the new data
//       newbilitemData.data.forEach(function (item) {
//          row += `


//           <tr>
//           <td>${item.t_item_no} ${item.sub_no ? item.sub_no : ''}</td>
//             <td>${item.item_desc}</td>
//             <td>${item.tnd_qty}</td>
//             <td>${item.bill_rt}<br><br> <div class="line"></div><br>${item.tnd_rt}</td>
//             <td>${item.ratecode}</td>
//             <td>${item.exec_qty}</td>
//             <td>${item.cur_amt}</td>
//             <td>${item.previous_amt}</td>
//             <td>${item.item_unit}</td>
//             <td>${item.b_item_amt}</td>
//             <td>
//             <div class="Action">
//             <button type="button" class="btn emb-button mb-2" data-toggle="modal" data-target="#embview${item.b_item_id}" onclick="openModal('${item.b_item_id}')" " title="VIEW MEASUREMENTS" ><i class="fa fa-eye" aria-hidden="true"></i></button>
//             @auth
//                     @if(auth()->user()->usertypes === "SO")
//                             <button type="button" class="btn btn-primary mb-2" onclick="openedittender('${item.b_item_id}')" ${billdata.is_current === 0 ? 'disabled' : ''}   title="EDIT TENDER ITEM"> <i class="fa fa-pencil-square" aria-hidden="true" id="icon"></i></button>
//                             <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#embeditbutton${item.b_item_id}" onclick="openeditbutton('${item.b_item_id}')" ${billdata.is_current === 0 ? 'disabled' : ''}   title="ADD AND EDIT MEASUREMENTS"> <i class="fa fa-pencil" style="color:white;"></i></button>
//                 </div>
//                 <button type="button" class="btn btn-danger mb-2" onclick="deletebillitem('${item.b_item_id}')" ${item.is_previous === 0 ? 'disabled' : ''} ${billdata.is_current === 0 ? 'disabled' : ''}  title="DELETE TENDER ITEM"><i class="fa fa-trash" aria-hidden="true"></i></button>
//                 @endif
//                 @endauth
//             </td>
//           </tr>
//         `;
//         createUniqueModal(item);
//         // Call the function to apply CSS to all modals with the specified classes
//          applyCssToModals();
//         //editsteelmodal(item);

//       });

//       var tableHTML = tableHeader + row + tableFooter;

      

// $('#bill-item-table').html(tableHTML);

// //progressbar();
// $('#data-container').html(data);

// // Update pagination links container
// $('#pagination-links').html(data.links);

// // Rebind the click event for pagination links
// bindPaginationClick();
//                 },
//                 error: function (error) {
//                     console.error('Error loading paginated data:', error);
//                 }
//             });
//     }




    // Function to get the current page number from pagination links
   // Assuming after successful AJAX call and appending new rows, you want to refresh pagination
//    function refreshPagination() {
//     var rabillidValue = $('#rabillid').val(); // Getting the value of #rabillid

// $.ajax({
//     url: '/pagination-route', // Use the new route for pagination
//     method: 'GET',
//     data: { rabillid: rabillidValue }, // Pass the value of rabillid using data
//     success: function (response) {

//        // Update pagination links
//        //$('.pagination-links').html(response.links); // Assuming 'response.links' contains pagination links HTML
//     },
//     error: function (error) {
//         console.error('Error refreshing pagination:', error);
//     }
// });
// }

// // Call the function after updating the data
// refreshPagination();

    // Store the scroll position when the "Previous Page" button is clicked

function formatDate(dateString) {
    if (dateString) {
        var date = new Date(dateString);
        var day = date.getDate();
        var month = date.getMonth() + 1; // Months are 0-based
        var year = date.getFullYear();

        // Ensure that day and month have two digits
        if (day < 10) {
            day = '0' + day;
        }
        if (month < 10) {
            month = '0' + month;
        }

        // Format the date as "d-m-Y"
        return day + '-' + month + '-' + year;
    }

    return '';
}

  // Add an event listener to handle the "Close" button clicks
function manualentryclose(bitemid) {
    // Close the child modal
    $('#manualEntryModal' + bitemid).modal('hide');


}

function uploadexcelclose(bitemid) {
    // Close the child modal
    $('#uploadexcel' + bitemid).modal('hide');

}

function manualnewtsteelmodalclose(bitemid) {
    // Close the child modal
    $('#manualnewtsteelmodal' + bitemid).modal('hide');

}

function editrccmbrclose(bitemid) {
    // Close the child modal
    $('#editrccmbr' + bitemid).modal('hide');

}

function editsteelmodalclose(bitemid) {
    // Close the child modal
    $('#editsteelmodal' + bitemid).modal('hide');

}

function myModalee100close(bitemid) {
    // Close the child modal
    $('#myModalee100' + bitemid).modal('hide');

}

function embeditbuttonclose(bitemid) {
    // Close the child modal
    console.log(bitemid);
    $('#embeditbutton' + bitemid).modal('hide');
    window.location.reload();

    $('.modal-backdrop').remove();

}


function embviewbuttonclosemain(bitemid) {
    // Close the child modal
    console.log(bitemid);
    
    window.location.reload();

    $('.modal-backdrop').remove();

}

function embeditbuttonclosemain(bitemid) {
    // Close the child modal
    console.log('#embeditbutton' + bitemid);
    $('#embeditbutton' + bitemid).modal('hide');

    window.location.reload();

    //$('.modal-parent').hide();

    $('.modal-backdrop').remove();

}

// Add a click handler for the "X" button in the child modal
$('button[data-modal-type="child"].close').click(function() {
    const modalId = $(this).data('close-id');
    $(`#manualEntryModal${modalId}, #newmodal${modalId}, #uploadexcel${modalId}, #manualnewtsteelmodal${modalId}, #editrccmbr${modalId}, #editsteelmodal${modalId}, #myModalee100${modalId}`).modal('hide');
});

$('button[data-modal-type="parent"].close').click(function() {
    const modalpId = $(this).data('parentclose-id');
    $('#embeditbutton' + modalpId).hide();
    $('.modal-backdrop').remove();

});




  //   // Function to close the child modal and remove the backdrop
  //   function closeChildModal(itemID) {
  //       //var modalId = '#manualEntryModal' + itemID;
  //       $(itemID).modal('hide');
  //       var modalType = modal.data('modal-type');

  //  if (modalType === 'child') {
  //   // Handle close for child modal
  //   var modalId = modal.attr('id');
  //   console.log('Closing child modal with ID: ' + modalId);

  //  }
  //       console.log('Closing child modal with ID: ' + itemID);
  //       $('.modal-backdrop').remove();
  //   }

  //   // "X" button click handler for all modals
  //   $('.modal .close').click(function() {
  //       var modal = $(this).closest('.modal');
  //       var modalType = modal.data('modal-type');

  //       if (modalType === 'child') {
  //           // Handle close for child modal
  //           var modalId = modal.attr('id');
  //           console.log('Closing child modal with ID: ' + modalId);
  //           closeChildModal(modalId);
  //       }
  //   });
</script>

<!-- JavaScript code to attach the click event handler -->
<script>
      // Define your steelsubmit function as before
      function steelsubmit(bitemid) {
    // Get the form data
    console.log(bitemid);
    var formData = new FormData();
    var Length = $('#lengthDropdown'+bitemid).val();

    formData.append('barParticulars', $('#barParticulars'+bitemid).val());
        formData.append('noofbars', $('#noofbars'+bitemid).val());
        formData.append('selectedLength', $('#selectedLength'+bitemid).val());
        formData.append('length', Length); // Use the selecte
        formData.append('barlength', $('#barlength'+bitemid).val());
        formData.append('barsrno', $('#barsrno'+bitemid).val());
        formData.append('steelmeasdate', $('#steelmeasdate'+bitemid).val());

       // Event listener for the dropdown menu

    // Add Date of Measurement to formData (replace 'your-date-input-id' with the actual ID)
    formData.append('steelmeasdate', $('#steelmeasdate'+bitemid).val());

    // Add Photo 1 file to formData (replace 'newphoto1steel' with the actual ID)
    // formData.append('photo1steel', $('#newphoto1steel')[0].files[0]);

    // // Add Photo 2 file to formData (replace 'newphoto2steel' with the actual ID)
    // formData.append('photo2steel', $('#newphoto2steel')[0].files[0]);

    // // Add Photo 3 file to formData (replace 'newphoto3steel' with the actual ID)
    // formData.append('photo3steel', $('#newphoto3steel')[0].files[0]);

    // // Add Documents file to formData (replace 'newdocumentssteel' with the actual ID)
    // formData.append('documentssteel', $('#newdocumentssteel')[0].files[0]);

    // Make an AJAX request to submit the form data
    $.ajax({

      type: 'POST', // Change to 'POST' or 'PUT' if needed
      url: "{{ url('steelmeasupdate') }}", // Replace with the actual server endpoint
      data: formData,
      processData: false,
      contentType: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token in the header
    },
      success: function(response) {

        var billdata=response.billdata[0];
$('#rabmino').val(billdata.bill_amt || '');
    $('#netamt').val(billdata.net_amt || '');


    //update the bill item table
   var bitemdata=response.itemdata[0];
   console.log(bitemdata);
    var newbilitemData = response.billitemdata;

   console.log(newbilitemData);

      // Check if the current bill is in 'is_current' flag
      var tbillid=response.lasttbillid;

       var tbillId = tbillid.t_bill_Id;


      // Clear the existing table body content





      var currentPage = $('.pagination .active').text();
// Call loadPaginatedData() with the current page number
 //loadPaginatedData(currentPage);



        var htmldata=response.html;
       // createUniqueModal(item);
      // console.log(htmldata);
      // $('#itemNo1').empty();
      $('#editsteelmodal'+bitemid).modal('hide');
      $('#table-container4'+bitemid).html(htmldata);
      // Clear the content of the modal table body
     // modalTableBody.empty();
      $('#itemDesc1'+bitemid).text(bitemdata.item_desc || '');

      var concatenatedValue = (bitemdata.sub_no !== '') ? (bitemdata.t_item_no + bitemdata.sub_no) : bitemdata.t_item_no;

$('#subNo1' + bitemid).text(concatenatedValue);
$('#itemNo1' + bitemid).text(concatenatedValue);


    var workdetails=response.workdetail;

   $('#workdetail'+bitemid).html(workdetails || '');

     $('#embeditbutton'+bitemid).modal('show');
     $('#normaldata'+bitemid).hide();
     $('#table-container4'+bitemid).html(htmldata);
        // Handle the success response here
        console.log('Form submitted successfully:', response);
        // You can also close the modal or perform other actions as needed

        progressbar();

      },
      error: function(error) {
        // Handle the error response here
        console.error('Error submitting form:', error);
      }
    });
  }




  // Add an event listener to the button
//   $(document).ready(function () {
//     GotoStlEmb(); // Call the function when the page loads
//   });
  // Define the GotoStlEmb function
//   function GotoStlEmb() {
//     // Your Ajax call code here
//     var workId = document.querySelector("input[name='workid']").value;
//             var tBillNo = document.querySelector("input[name='t_bill_No']").value;
//             console.log(tBillNo);

//             var billDate = document.querySelector("input[name='Bill_Dt']").value;
//             var tbillid = document.querySelector("input[name='t_bill_Id']").value;

//     var formData=null;
//     // Replace this comment with your $.ajax or fetch API code
//     $.ajax({
//       type: "POST", // or "GET" depending on your API
//       url: "{{url('STLRecordentry')}}", // Replace with your API endpoint URL
//       data: {workId,tBillNo,billDate,tbillid},
//       headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }, // Ensure that formData is defined or passed as an argument
//       success: function (response) {

//         // Handle the success response from the server
//         console.log("Ajax function GotoStlEmb called successfully.....", response);
//         // Rest of your code...
//         // var url = "{{ url('Recordentry') }}";
//         // window.location.href = url;
//       },
//       error: function (error) {
//         // Handle the error response from the server
//         console.error("Error calling Ajax function GotoStlEmb:", error);
//         // Display an error message if needed
//         // $("#error-message").text("Error: Unable to call GotoStlEmb");
//       },
//     });
//   }
// </script>

<style>

/* Adjust the modal dialog width and max-width */
#viewmodal {
        width: 100%;
        max-width: 100%;
        margin: 0;
    }

</style>

<style>
  .image-preview {
    max-width: 100px; /* Set the maximum width */
    max-height: 100px; /* Set the maximum height */
}

.cursor-pointer {
  cursor: pointer;
}

</style>


<!-- ajax for images upload and documents -->
<script>
function uploadimages() {
    var tbillid = $('#rabillid').val();

    // Perform an Ajax request to load the modal content
    $.ajax({
        url: "{{ url('uploadimages') }}",
        type: 'POST',
        data: { tbillid: tbillid, _token: "{{ csrf_token() }}" },
        success: function (data) {
                      var paths = data.paths;
                      console.log(paths.photo1);
                      var document=data.documentPaths
                      console.log(document.doc1);
                      var videoPath = data.videoPath;
                      console.log(videoPath); // Assuming 'videoPath' is a string


                          // Function to toggle visibility based on data presence
           // Clear existing labels before adding new ones
           clearLabels();

// Function to add a label dynamically
// Function to add a label dynamically above the element
// Function to add a label

// Loop through the photo previews and update sources
for (var i = 1; i <= 5; i++) {
    var photoId = "#previewPhoto" + i;
    if (paths["photo" + i] !== null) {
        $(photoId).attr('src', paths["photo" + i]);
        
        // Add label dynamically and prepend it before the image
        $(photoId).before(addLabel('Photo '));
        
        $(photoId).parent().removeClass('d-none');  // Show the parent container
    } else {
        $(photoId).attr('src', ''); // Set an empty source or a placeholder
        $(photoId).parent().addClass('d-none');  // Hide the parent container
    }
}



// Loop through the document links and update hrefs
for (var i = 1; i <= 10; i++) {
    var docLinkId = "#documentLink" + i;
    if (document["doc" + i] !== null) {
        $(docLinkId).attr('href', document["doc" + i]);
       
        $(docLinkId).before(addLabel('Document '));
        $(docLinkId).parent().removeClass('d-none');  // Show the parent container
    } else {
        $(docLinkId).attr('href', '#'); // Set a placeholder or disable the link
        $(docLinkId).parent().addClass('d-none');  // Hide the parent container
    }
}

// Update video preview
if (videoPath !== null) {
    $('#videoPreview').attr('src', videoPath);
  
    $('#videoPreview').before(addLabel('Video '));
    $('#videoPreview').parent().removeClass('d-none');  // Show the parent container
} else {
    $('#videoPreview').attr('src', ''); // Set an empty source or a placeholder
    $('#videoPreview').parent().addClass('d-none');  // Hide the parent container
}






// Show the modal
  $('#uploadimgmodal').modal('show');
},        error: function (xhr, status, error) 

{
            // Handle errors here
            console.error(xhr, status, error);
        }
    });
}


//label function for view documents
function addLabel(labelText) {
    var labelHtml = '<label class="font-weight-bold">' + labelText + ':</label>';
    return labelHtml;
}
// Function to clear labels
function clearLabels() {
    $('.font-weight-bold').remove(); // Remove all elements with the 'font-weight-bold' class
}


function imagedocupload() {
    var tbillid = $('#rabillid').val();
    var formData = new FormData();

    var assetBaseUrl = "{{ asset('') }}";
  // Append individual image files with specific keys
  formData.append('photo1', $('#newphoto1')[0].files[0]);
    formData.append('photo2', $('#newphoto2')[0].files[0]);
    formData.append('photo3', $('#newphoto3')[0].files[0]);
    formData.append('photo4', $('#newphoto4')[0].files[0]);
    formData.append('photo5', $('#newphoto5')[0].files[0]);

    // Append individual document files with specific keys
    formData.append('document1', $('#newdocuments1')[0].files[0]);
    formData.append('document2', $('#newdocuments2')[0].files[0]);

    // Append individual video files with specific keys
    formData.append('video', $('#newvideo')[0].files[0]);

    // Append other data as needed
    formData.append('tbillid', tbillid);
    formData.append('_token', "{{ csrf_token() }}");

    // Perform an Ajax request to upload the files and retrieve the modal content
    $.ajax({
        url: "{{ url('uploadimgdocvdo') }}",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            // Inject the loaded content into the modal


            // Show the modal
            $('#uploadimgmodal').modal('hide');
        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.error(xhr, status, error);
        }
    });
}
</script>



<script>
$(document).ready(function() {
  // Delete Image or Document
  $(".delete-image").on("click", function() {
    var imageId = $(this).data("image-id");
    var measid = $(this).data("measid");

    Swal.fire({
      title: 'Confirm Deletion',
      text: 'Are you sure you want to delete this image or document?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "/delete-image-or-doc", // Replace with your actual delete endpoint
          data: { id: imageId, measid: measid, _token: "{{ csrf_token() }}", },
          success: function(response) {
            $("#" + imageId + "_preview").attr("src", "");
             // Reset the document preview link and content
             $("#docLink1").attr("href", ""); // Clear the link
            $("#documentPreview").html(""); // Clear the content
             // If no document, remove download link element
             if (!response.hasDocument) {
              $("#docLink1").attr("href", "");
            }
          },
          error: function(xhr, status, error) {
            // Handle error if necessary
          }
        });
      }
    });
  });
});
</script>

<!-- All measuremet add for all tender items  script for chhose excel file all measurement modal -->
<script>
   const allMeasurementBtn = document.getElementById('allmeasurement');
   const excelModal = document.getElementById('AllmeasexcelModal'); // Updated ID
   const excelFileInput = document.getElementById('excelFileInputallmeas');

  // // When the "ADD ALL MEASUREMENT" button is clicked, open the modal
  // allMeasurementBtn.addEventListener('click', function () {

  //   excelFileInput.value = ''; // Reset the file input
  //   excelModal.style.display = 'block';

  // });

  // // Close the modal when the close button is clicked
  excelModal.addEventListener('click', function (event) {
    if (event.target === excelModal) {
      excelModal.style.display = 'none';
    }
  });

  // // Close the modal when the "Close" button is clicked
  document.querySelector('#AllmeasexcelModal .modal-footerallmeas1 button[data-dismiss="modal"]').addEventListener('click', function () {
    excelModal.style.display = 'none';
  });

  // // Listen for changes to the file input (optional)
  excelFileInput.addEventListener('change', function () {
    // You can access the selected file using excelFileInput.files[0]
    // You can add further handling of the selected file here
    console.log('Selected file:', excelFileInput.files[0]);
  });

</script>


<!-- Section2 if present then display if not then hide -->
<script>
  // Function to populate the form fields with data
  function populateFormFields(data) {
    // Populate fields here...
    var embsection2 = data.embsection2;
     // Set values for each input/select element
  $('#rabillid').val(embsection2.t_bill_Id);
  var rabillnoDropdown = $('#rabillno');

  // Clear existing options
  rabillnoDropdown.empty();

  // Populate with new options from the 'billNos' property
  for (var t_bill_id in data.billNos) {
    var option = new Option(data.billNos[t_bill_id], t_bill_id);
    if (data.t_bill_No == t_bill_id) {
      option.selected = true;
    }
    rabillnoDropdown.append(option);
  }
  $('#date').val(embsection2.Bill_Dt);
  $('#rabillamt').val(embsection2.bill_amt);
  $('#recamt').val(embsection2.rec_amt);
  $('#netamt').val(embsection2.net_amt);
  $('#cvno').val(embsection2.cv_no);
  $('#cvdate').val(embsection2.cv_dt);

   // Populate the 'Bill Type' dropdown directly using conditions
   var billTypeDropdown = $('#billtype');
  billTypeDropdown.empty();

  var billTypeOptions = {
    'Normal': 'Normal',
    'WDBNM': 'WDBNM',
    'Sec_Adv': 'Secured Advance',
    'Mob_Adv': 'Mobilization Advance'
  };

  for (var billTypeValue in billTypeOptions) {
    var option = new Option(billTypeOptions[billTypeValue], billTypeValue);
    if (embsection2.bill_type == billTypeValue) {
      option.selected = true;
    }
    billTypeDropdown.append(option);
  }

  // Handle checkboxes separately
  $('#finalbill').prop('checked', embsection2.final_bill == 1);


  // Call your toggleSectionWrapper function based on data availability
  toggleSectionWrapper(true);

    console.log(data);
  }

  // Function to show or hide the section wrapper
  function toggleSectionWrapper(show) {
    $('#section2-wrapper').toggle(show);
  }

  // // Fetch data using AJAX
  // function fetchData() {
  //   var workidvalue = $('#workid').val();
  //   console.log(workidvalue);
  //   $.ajax({
  //     url: '/get-embsection2-data',
  //     method: 'GET',
  //        data: { work_id: workidvalue },
  //     success: function(response) {
  //       console.log(response);
  //       if (response.embsection2) { // Access the dataAvailable property
  //           populateFormFields(response); // Pass the response object
  //           toggleSectionWrapper(true); // Show the wrapper
  //       } else {
  //           toggleSectionWrapper(false); // Hide the wrapper
  //       }
  //     },
  //     error: function() {
  //       console.error('Failed to fetch data.');
  //     }
  //   });
  // }

  // // Call fetchData when the page loads
  // fetchData();
</script>
<script>
  // Your existing code
$('#newphoto1').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto1').attr('src', e.target.result);
        $('#previewPhoto1').show();
    };
    reader.readAsDataURL(this.files[0]);
});

// Your existing code
$('#newphoto2').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto2').attr('src', e.target.result);
        $('#previewPhoto2').show();
    };
    reader.readAsDataURL(this.files[0]);
});

// Your existing code
$('#newphoto3').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto3').attr('src', e.target.result);
        $('#previewPhoto3').show();
    };
    reader.readAsDataURL(this.files[0]);
});

$('#newphoto4').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto4').attr('src', e.target.result);
        $('#previewPhoto4').show();
    };
    reader.readAsDataURL(this.files[0]);
});

$('#newphoto5').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto5').attr('src', e.target.result);
        $('#previewPhoto5').show();
    };
    reader.readAsDataURL(this.files[0]);
});
// Function to show a larger image when preview image is clicked
$('#previewPhoto1').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});

$('#previewPhoto2').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});

$('#previewPhoto3').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});

$('#previewPhoto4').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});

$('#previewPhoto5').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});
// Function to hide the larger image
function hideLargeImage() {
  $('.enlarged-image-modal').fadeOut();
}

// Close the larger image when the modal background is clicked
$('.enlarged-image-modal').on('click', function(event) {
  if (event.target === this) {
    hideLargeImage();
  }
});

// Close the larger image when the close button is clicked
$('body').on('click', '.close-enlarged-image', function() {
  hideLargeImage();
});

// Function to create a link to view the selected document
function createDocumentLink(fileInput, linkElement) {
  if (fileInput.files && fileInput.files[0]) {
    var fileURL = URL.createObjectURL(fileInput.files[0]);
    $(linkElement).attr('href', fileURL).text('View Document');
  }
}


// Bind the createDocumentLink function to the change event of the document input
$('.document-input').change(function() {
  var linkElement = $(this).siblings('.document-link');
  createDocumentLink(this, linkElement);
});

var initialInputValues = {};
// Store the initial values when the page loads
$('.form-control').each(function() {
    initialInputValues[this.id] = this.value;
  });

  // Reset input values to their initial values
  function resetInputValues() {
    $('.form-control').each(function() {
      this.value = initialInputValues[this.id];
      // Clear previewed images by resetting their src attributes
 $('#previewPhoto1').attr('src', '');
    $('#previewPhoto2').attr('src', '');
    $('#previewPhoto3').attr('src', '');
    $('#previewPhoto4').attr('src', '');
    $('#previewPhoto5').attr('src', '');

   // Clear video preview
   var videoElement = document.getElementById('videoPreview');
        videoElement.src = '';
        videoElement.style.display = 'none';

    // Clear document links by resetting their href attributes and content
    $('.document-link').attr('href', '#');
    $('.document-link').html('View Document');
    });
  }

 // Function to show a video preview when the video input changes
$('#newvideo').change(function() {
    var videoElement = document.getElementById('videoPreview');
    var videoURL = URL.createObjectURL(this.files[0]);
    videoElement.src = videoURL;
    videoElement.style.display = 'block';
});

// Function to hide the video preview
function hideVideoPreview() {
    var videoElement = document.getElementById('videoPreview');
    videoElement.src = '';
    videoElement.style.display = 'none';
}

function hideMediaPreviews() {
    // Hide video
    var videoElement = document.getElementById('videoPreview');
    videoElement.src = '';
    videoElement.style.display = 'none';

    // Clear and hide image previews
    $('.image-input').each(function() {
        var previewID = $(this).data('image');
        $('#' + previewID).attr('src', '');
        $('#' + previewID).hide();
    });
}
// Close the video preview when the modal background is clicked
$('.enlarged-image-modal').on('click', function(event) {
    if (event.target === this) {
        hideLargeImage();
        hideMediaPreviews();
        //hideVideoPreview(); // Hide video when the modal is closed
    }
});

// Close the video preview when the close button is clicked
$('body').on('click', '.close-enlarged-image', function() {
    hideLargeImage();
    hideMediaPreviews();
    //hideVideoPreview(); // Hide video when the modal is closed
});


  // Prevent form submission when the Cancel button is clicked
  $('.modal-footer .btn-secondary, .modal-header .close').click(function(e) {
    e.preventDefault();
    hideLargeImage();
    resetInputValues();
    hideVideoPreview();
  });

</script>
<!-- Modified JavaScript code -->
<!-- <script>
  // Function to handle image preview
  function handleImagePreview(inputId, previewId) {
    $(inputId).change(function() {
      var reader = new FileReader();
      reader.onload = function(e) {
        $(previewId).attr('src', e.target.result);
        $(previewId).show();
      };
      reader.readAsDataURL(this.files[0]);
    });
  }

  // Call the handleImagePreview function for each photo input
  handleImagePreview('#newphoto1steel', '#previewPhoto1steel');
  handleImagePreview('#newphoto2steel', '#previewPhoto2steel');
  handleImagePreview('#newphoto3steel', '#previewPhoto3steel');

  //new steel manually

  handleImagePreview('#newphoto1steelnew', '#previewPhoto1steelnew');
  handleImagePreview('#newphoto2steelnew', '#previewPhoto2steelnew');
  handleImagePreview('#newphoto3steelnew', '#previewPhoto3steelnew');

  // Function to show a larger image when preview image is clicked
  function showLargeImagesteel(previewId) {
    var previewImageSrc = $(previewId).attr('src');
    $('.enlarged-image-content').attr('src', previewImageSrc);
    $('.enlarged-image-modal').fadeIn();
  }

  // Bind the showLargeImage function to the click event of preview images
  $('#previewPhoto1steel, #previewPhoto2steel, #previewPhoto3steel').click(function() {
    showLargeImagesteel(this);
  });

  //New steel manually Bind the showLargeImage function to the click event of preview images
  $('#previewPhoto1steelnew, #previewPhoto2steelnew, #previewPhoto3steelnew').click(function() {
    showLargeImage(this);
  });

  // Function to hide the larger image
  function hideLargeImage() {
    $('.enlarged-image-modal').fadeOut();
  }

  // Close the larger image when the modal background is clicked
  $('.enlarged-image-modal').on('click', function(event) {
    if (event.target === this) {
      hideLargeImage();
    }
  });

  // Close the larger image when the close button is clicked
  $('body').on('click', '.close-enlarged-image', function() {
    hideLargeImage();
  });

  // Function to create a link to view the selected document
  function createDocumentLink(fileInput, linkElement) {
    if (fileInput.files && fileInput.files[0]) {
      var fileURL = URL.createObjectURL(fileInput.files[0]);
      $(linkElement).attr('href', fileURL).text('View Document');
    }
  }

  // Bind the createDocumentLink function to the change event of the document input
  $('.document-input').change(function() {
    var linkElement = $(this).siblings('.document-link');
    createDocumentLink(this, linkElement);
  });

  var initialInputValues = {};

  // Store the initial values when the page loads
  $('.form-control').each(function() {
    initialInputValues[this.id] = this.value;
  });

  // Reset input values to their initial values
  function resetInputValues() {
    $('.form-control').each(function() {
      this.value = initialInputValues[this.id];
    });

    // Clear previewed images by resetting their src attributes
    $('#previewPhoto1steel').attr('src', '');
    $('#previewPhoto2steel').attr('src', '');
    $('#previewPhoto3steel').attr('src', '');

    // Clear document links by resetting their href attributes and content
    $('.document-link').attr('href', '#');
    $('.document-link').html('View Document');
  }

  // Prevent form submission when the Cancel button is clicked
  $('.modal-footer .btn-secondary, .modal-header .close').click(function(e) {
    e.preventDefault();
    hideLargeImage();
    resetInputValues();
  });

</script> -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('billitem-delete-button')) {
                var bitemId = event.target.getAttribute('data-billitem-id');
                deletebillitem(bitemId);
            }
        });
    });
</script>


<script>
function deletebillitem(b_item_id)
{
  var workid = $('#workid').val();
  // Show SweetAlert confirmation dialog
  Swal.fire({
    title: 'Are you sure?',
    text: 'You are about to delete this bill item. This action cannot be undone.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Delete',
    cancelButtonText: 'Cancel'
  }).then((result) => {
    if (result.isConfirmed) {
      // If the user confirms the delete action, make an AJAX request
      $.ajax({
        url: '/delete-bill-item', // Replace with the actual server-side delete URL
        method: 'GET', // Change the method if needed (e.g., 'DELETE' for RESTful APIs)
        data: { b_item_id: b_item_id,
                work_id: workid,
          _token: $('meta[name="csrf-token"]').attr('content') // Include the CSRF token as a parameter
         },
        success: function (response) {
           // Handle the success response here
                       // console.log('Item deleted successfully:', response);
                       window.location.href = response.redirect_url;

                        var billdata=response.billdata[0];
                        //console.log(billdata);
                        var billamt= billdata.bill_amt;
                        var netamt=billdata.net_amt;
                        $('#rabmino').val(billamt || '');
                           $('#netamt').val(netamt || '');


    //update the bill item table
                         var tbillid=response.lasttbillid;
                         var tbillId = tbillid.t_bill_Id;
                         console.log(tbillId);
                        var newbilitemData = response.billitemdata;
                        console.log(newbilitemData);


  // Update pagination links
   // Reset pagination to page 1
   var currentPage = $('.pagination .active').text();
// Call loadPaginatedData() with the current page number
 //loadPaginatedData(currentPage);

   progressbar();

                        // Show a success message
                        Swal.fire('Deleted!', 'The bill item has been deleted.', 'success');
                    },
                    error: function (xhr, status, error) {
                        // Handle the error response here
                        console.error('Error deleting item:', error);

                        // Show an error message
                        Swal.fire('Error!', 'An error occurred while deleting the bill item.', 'error');
                    }
                });
            }
        });
    }

</script>
<script>
</script>
<!-- update the qunantity fields through formula and using multiplication fields -->
<script>

  // Function to update Quantity field based on inputs
  function newupdateQuantity(bitemid) {


    
    console.log(bitemid);

    var number = parseFloat($('#newnumber' + bitemid).val()) || 0;
var length = parseFloat($('#newlength' + bitemid).val()) || 0;
var breadth = parseFloat($('#newbreadth' + bitemid).val()) || 0;
var height = parseFloat($('#newheight' + bitemid).val()) || 0;

    var formula = $('#newformula' + bitemid).val();


    // Clear other fields if formula is filled
    if (formula !== '') {
        $('#newnumber' + bitemid).val('');
        $('#newlength' + bitemid).val('');
        $('#newbreadth' + bitemid).val('');
        $('#newheight' + bitemid).val('');
    }

    var calculatedQuantity = 0;
    var isQuantityValid = true;

    if (formula) {
        try {
            // Calculate quantity based on formula
            calculatedQuantity = eval(formula);

            // Ensure calculatedQuantity is a numeric value
            if (isNaN(calculatedQuantity) || !isFinite(calculatedQuantity)) {
                isQuantityValid = false;
            }
        } catch (error) {
            console.error("Invalid formula:", error);
            isQuantityValid = false;
        }
    } else {
      if (number === 0 && length === 0 && breadth === 0 && height === 0) {
            calculatedQuantity = 0;
        } else {
            // Calculate quantity based on multiplication of values
            calculatedQuantity = (number === 0 ? 1 : number) *
                (length === 0 ? 1 : length) *
                (breadth === 0 ? 1 : breadth) *
                (height === 0 ? 1 : height);
        }

        // For display purposes, set the input value to 0 if it's originally entered as 0
        // $('#newnumber' + bitemid).val(number === 0 ? '0' : number);
        // $('#newlength' + bitemid).val(length === 0 ? '0' : length);
        // $('#newbreadth' + bitemid).val(breadth === 0 ? '0' : breadth);
        // $('#newheight' + bitemid).val(height === 0 ? '0' : height);
    }

    // Round calculatedQuantity to 3 decimal points (you can adjust the number of decimal points)
    calculatedQuantity = calculatedQuantity.toFixed(3);

    // Update Quantity input field and handle validation
    var quantityInput = $('#newquantity' + bitemid);
    if (isQuantityValid) {
      quantityInput.val(calculatedQuantity);
      quantityInput.removeClass('is-invalid');
    } else {
      quantityInput.val('');
      quantityInput.addClass('is-invalid');
    }
  
  }
  // Call updateQuantity initially to set the initial value




// edit and update quantity from edit mb button

</script>

<!-- table link -->



  <footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-dark" href="https://www.standardinfosys.in//">STANDARD INFOSYS.COM</a>
  </div>
  <!-- Copyright -->
</footer>


<!-- check box script for final bill ajax request -->
<script>

    document.addEventListener("DOMContentLoaded", function() {
        var finalBillValue = <?php echo isset($embsection2) ? $embsection2->final_bill : 0; ?>;
        var newButton = document.getElementById('newButton');

        // if (finalBillValue === 1) {
        //     newButton.disabled = true;
        // }
    });

function updateFinalBill(checkbox) {
  // Get the checkbox value (1 if checked, 0 if unchecked)
  var value = checkbox.checked ? 1 : 0;

  // Make an AJAX request to update the database
  $.ajax({
    url: '/update-final-bill',
    method: 'POST',
    data: {
      final_bill: value,
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      // Update the UI with the new final bill value
      $('#finalbill').prop('checked', value);
    },
    error: function(xhr, status, error) {
      // Handle the error, if any
      console.log(error);
    }
  });
}
</script>
<!-- Ajax script for the R A Bill No -->

<script>
function handleOptionChange() {
    var selectedrabillno = document.getElementById("rabillno").value;
     // Retrieve the value of the workid input element
     var workidvalue = $('#workid').val();
    var _token = $("input[name='_token']").val();
    $.ajax({
        url: "{{ url('billnodropdown') }}",
        type: 'POST',
        dataType: 'JSON',
        data: { _token: _token,
          selectrabill: selectedrabillno,
             workid: workidvalue, },
        success: function (data) {
            console.log(data);
            var tbilldata=data.embsection2;
            var tbillId=tbilldata.t_bill_Id;
console.log(tbillId);

            if (data.embsection2) {
                var embsection2 = data.embsection2;
                $('#rabillid').val(embsection2.t_bill_Id || '');
                $('#date').val(embsection2.Bill_Dt || '');
                $('#rabmino').val(embsection2.bill_amt || '');
                $('#recamt').val(embsection2.rec_amt || '');
                $('#netamt').val(embsection2.net_amt || '');
                $('#cvno').val(embsection2.cv_no || '');
                $('#cvdate').val(embsection2.cv_dt || '');
                $('#finalbill').prop('checked', embsection2.final_bill == 1);
                $('#billtype').val(embsection2.bill_type || '');
                $('#previousbilldt').val(embsection2.previousbilldt || '');


                $('#measdf').val(data.newmeasdtfr || '');

                $('#measdu').val(data.newmessupto || '');
            }

            if (data && data.isCurrentBill) {
        // If isCurrentBill is true, enable the edit button
        $('button.edit-button').prop('disabled', false);
    } else {
        // If isCurrentBill is false, disable the edit button
        $('button.edit-button').prop('disabled', true);
    }

    var tableHeader = `
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Tender Item No</th>
                <th>Item</th>
                <th>Tender Quantity</th>
                <th>Bill Rate</th> <!-- Span two columns for Rate -->
                <th>Rate Code</th>
                <th>Upto Date Qty</th>
                <th>Current Amt</th>
                <th>Previous Amt</th>
                <th>Unit</th>
                <th>Uptodate Amount</th>
                <th>Action</th>
            </tr>
            <tr>
                <th></th> <!-- Empty cell for Tender Item No -->
                <th></th> <!-- Empty cell for Item -->
                <th></th> <!-- Empty cell for Tender Quantity -->
                <th>Tender Rate</th> <!-- First heading -->
                <th></th> <!-- Second heading -->
                <th></th> <!-- Empty cell for Rate Code -->
                <th></th> <!-- Empty cell for Upto Date Qty -->
                <th></th> <!-- Empty cell for Unit -->
                <th></th> <!-- Empty cell for Amount -->
                <th></th> <!-- Empty cell for Action -->
            </tr>
        </thead>
        <tbody>
`;

var tableFooter = `</tbody></table>`;
                        // If the deletion was successful, update the table rows
                        var tableBody = $('#billitemtbody');

                        $('#billitemtbody').empty();

    var row = ''; // Initialize row as an empty string outside the loop


    if (data.embsection3) {
    var embsection3 = data.embsection3;
    console.log(embsection3);


    embsection3.forEach(function (sec3) {
    //var tbillId=sec3.t_bill_id;
        row += '<tr>';
        row += '<td>' + sec3.t_item_no + (sec3.sub_no ? ' ' + sec3.sub_no : '') + '</td>';
        row += '<td>' + sec3.item_desc + '</td>';
        row += '<td>' + sec3.tnd_qty + '</td>';

        // Create a combined cell for "Bill Rate" and "Tender Rate"
        row += '<td>' + sec3.bill_rt + '<br><br> <div class="line"></div><br>' + sec3.tnd_rt + '</td>';

        row += '<td>' + sec3.ratecode + '</td>';
        row += '<td>' + sec3.exec_qty + '</td>';
        row += '<td>' + sec3.cur_amt + '</td>';
        row += '<td>' + sec3.previous_amt + '</td>';
        row += '<td>' + sec3.item_unit + '</td>';
        row += '<td>' + sec3.b_item_amt + '</td>';

        // Get the is_current flag for the current embsection3 item
        var isCurrent = embsection2.is_current === 1;
        var isprevious = sec3.is_previous === 1;

        // Create a cell for the buttons
        var actionCell = '<td>';

            // Create the button group container
            var buttonGroup = '<div aria-label="Actions">';

            // Create the "EMB" button
            var embButton = `
                <button type="button" class="btn emb-button mb-2" data-toggle="modal" data-target="#embview${sec3.b_item_id}" onclick="openModal('${sec3.b_item_id}')" data-bitemid="${sec3.b_item_id}" title="VIEW MEASUREMENTS" ><i class="fa fa-eye" aria-hidden="true"></i></button>
            `;

            // Create the "Edit" button
            var edittndButton = `
                <button type="button" class="btn btn-primary mb-2" onclick="openedittender('${sec3.b_item_id}')" ${isCurrent ? '' : 'disabled'} title="EDIT TENDER ITEM">
                <i class="fa fa-pencil-square" aria-hidden="true" id="icon"></i>
                </button>
            `;

            // Create the "Edit" button
            var editButton = `
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#embeditbutton${sec3.b_item_id}" onclick="openeditbutton('${sec3.b_item_id}')" ${isCurrent ? '' : 'disabled'} title="ADD AND EDIT MEASUREMENTS">
                <i class="fa fa-pencil" style="color:white;"></i>
                </button>
            `;

            // Append all buttons to the button group container
            buttonGroup += embButton + edittndButton + editButton;

            // Append the button group container to the actionCell
            actionCell += buttonGroup;

            // Append the "Delete" button outside of the div container
            var deleteButton = `
                <button type="button" class="btn btn-danger mb-2" onclick="deletebillitem('${sec3.b_item_id}')" ${isprevious ? '' : 'disabled'} ${isCurrent ? '' : 'disabled'} title="DELETE TENDER ITEM">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            `;
            actionCell += deleteButton;

            // Close the actionCell and add it to the row
            actionCell += '</div>';
            row += actionCell + '</td>';
            createUniqueModal(sec3);

        // Call the function to apply CSS to all modals with the specified classes
applyCssToModals();

       // Append the row to the tbody

    });


}
console.log(row);
  var tableHTML = tableHeader + row + tableFooter;

  $('#bill-item-table').html(tableHTML);
//$('#test1000').html(row);


progressbar();


        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}
</script>


<!-- edit tender item ajax -->

<script>

var publicbitemId = null;
  // Function to open the modal and load content
  function openedittender(bitemId) {
    // Here, you can make an AJAX request to fetch the content for the modal
    // Replace the following line with your actual AJAX call to fetch content
    publicbitemId = bitemId;
    $.ajax({
      url: '/edittender', // Replace with your actual URL
      type: 'GET',
      data: { bitemId: bitemId },
      success: function(response) {

        var bil_item = response.bill_item[0];
        console.log(bil_item);
        var itemid=bil_item.item_id;
        var suffixesToCheck = ["001991", "002566", "004345", "004596", "004597", "004598", "004599", "004600"];

                if (suffixesToCheck.some(suffix => itemid.endsWith(suffix))) {
                  // Perform your action here when there is a match
                  $('#tenderRate').prop('disabled', false);
                } else {
                      // Perform another action when there is no match
                      $('#tenderRate').prop('disabled', true);
                }
        // Update the modal content with the fetched data
        // Assuming that 'data' contains properties corresponding to the input field names
        $('#item').val(bil_item.item_desc); // Change .val() to .text()
      $('#tenderItemNo').val(bil_item.t_item_no);
      $('#tenderQuantity').val(bil_item.tnd_qty);
      $('#tenderRate').val(bil_item.tnd_rt);
      $('#billRate').val(bil_item.bill_rt);
      $('#rateCode').val(bil_item.ratecode);
      $('#uptoDateQty').val(bil_item.exec_qty);
      $('#unit').val(bil_item.item_unit);
      $('#amount').val(bil_item.b_item_amt);



        // Show the modal
        $('#edittenderModal').modal('show');
        var workdetails=response.workdetail;
        //console.log(workdetails);

   $('#workdetailtender').html(workdetails || '');


        // Event listener for the "Bill Rate" input
  $('#billRate').on('input', function () {
    calculateAmount();
  });

  // Event listener for the "Upto Date Qty" input
  $('#uptoDateQty').on('input', function () {
    calculateAmount();
  });


  //



},
      error: function(error) {
        console.error('Error fetching data:', error);
      }
    });
  }


   // Function to calculate and update the "Amount" input
   function calculateAmount() {
    var billRate = $('#billRate').val();
    var uptoDateQty =$('#uptoDateQty').val();

    if (!isNaN(billRate) && !isNaN(uptoDateQty)) {
      var amount = billRate * uptoDateQty;
      var Amount = parseFloat(amount).toFixed(2);
      $('#amount').val(Amount)
    }
  }

</script>
<script>
  //bill rate is not greater then tender rate


  const tenderRateInput = document.getElementById('tenderRate');
  const billRateInput = document.getElementById('billRate');
  const errorMessage = document.getElementById('error-message');

  // Add an event listener to the "billRate" input
  billRateInput.addEventListener('input', function () {
    // Parse the values as numbers
    const tenderRate = parseFloat(tenderRateInput.value);
    const billRate = parseFloat(billRateInput.value);

    // Check if billRate is greater than tenderRate
    if (billRate > tenderRate) {
      // If billRate is greater, display an error message
      errorMessage.textContent = 'Bill Rate cannot be greater than Tender Rate';
    } else {
      // If the condition is met, clear the error message
      errorMessage.textContent = '';
    }
  });

</script>
<!-- Update the tender item data ajax -->
<!-- Your HTML code remains the same as you provided -->
<script>
// Define the saveChanges function
function saveChangestenders() {
  // Get the data from the form
  var formData = {
    _token: "{{ csrf_token() }}", // Include the CSRF token
    bitemId: publicbitemId, // Include bitemId here
    item: $("#item").val(),
    tenderItemNo: $("#tenderItemNo").val(),
    tenderQuantity: $("#tenderQuantity").val(),
    uptoDateQty: $("#uptoDateQty").val(),
    tenderRate: $("#tenderRate").val(),
    billRate: $("#billRate").val(),
    rateCode: $("#rateCode").val(),
    unit: $("#unit").val(),
    amount: $("#amount").val(),
  };

  // Check if the tender rate is greater than the bill rate
  if (parseFloat(formData.tenderRate) > parseFloat(formData.billRate)) {
    // Use SweetAlert or any other pop-up library to show an alert
    Swal.fire({
      title: "Warning!",
      text: "Bill Rate is Less than Tenser Rate. Are you sure you want to proceed?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Proceed",
      cancelButtonText: "Cancel",
    }).then((result) => {
      if (result.isConfirmed) {
        // User clicked "Proceed," so make the AJAX call
         // Your AJAX call here
      $.ajax({
        type: "POST", // or "GET" depending on your API
        url: "{{url('rateanalysis')}}", // Replace with your API endpoint URL
        data: formData,
        success: function(response) {
          $('#rowdata').empty();
          var tnddata=response.tenderdata[0];
          var itemno = response.tenderItemNo;
          var tndrt = response.tenderRate;
          var reduceddata=response.reduceddata;
          var bitemdata=response.bitemdata[0];

          var partreducedrate=bitemdata.tnd_rt-bitemdata.bill_rt;


          var workdetails=response.workdetail;

     $('#workdetailrateanalysis').html(workdetails || '');
          $('#tenderItemNoModal').val(itemno);
           $('#itemDesctender').val(tnddata.exs_nm);
           $('#tenderRateModal').val(tndrt);
           $('#rateReducedBy').val(partreducedrate);
           $('#partReducedRate').val(bitemdata.bill_rt);
          // Handle the success response from the server
          console.log("AJAX call successful:", response);
          // You can add any additional logic here

          var lastsrno = response.lastsrno || 0;
var lastSRNumber = lastsrno + 1;

console.log(lastSRNumber);

            initialiserow(lastSRNumber);

          reduceddata.forEach(function (row) {
    var newRow = $('<tr>');
    newRow.append('<td><input type="text" class="form-control sr-no-input" value="' + row.sr_no + '" readonly> </td>');
    newRow.append('<td><input type="text" class="form-control particulars-input" value="' + row.red_for + '"></td>');
    newRow.append('<td><input type="text" class="form-control formula-input" value="' + row.formula + '"></td>');
    newRow.append('<td><input type="number" class="form-control amount-reduced-input" value="' + row.amt_red + '" readonly></td>');
    newRow.append('<td><button type="button" class="btn btn-danger remove-row">Remove</button></td>');


    // Append the new row to the table body
    $('#rowdata').append(newRow);

});



        //Attach event listeners to input fields for live updates
        $('.amount-reduced-input, .formula-input').on('input', function () {
            updateRateReducedBy();
            updatePartReducedRate();
        });

        // Attach click event to remove button
        $('.remove-row').on('click', function () {
            $(this).closest('tr').remove();
            updateRateReducedBy();
            updatePartReducedRate();

            // Reset the srNo for the remaining rows
            $('.sr-no-input').each(function (index) {
                $(this).val(index + 1);
            });

            // Update the rowCounter to the next available number
            rowCounter = $('.sr-no-input').length + 1;
        });

    //Function to update "Rate Reduced By" based on "Amount Reduced" inputs
    function updateRateReducedBy() {
        var totalAmountReduced = 0;
        $('.amount-reduced-input').each(function () {
            var amount = parseFloat($(this).val()) || 0;
            totalAmountReduced += amount;
        });

        // Set "Rate Reduced By" to the totalAmountReduced
        $('#rateReducedBy').val(totalAmountReduced.toFixed(2));
    }
        // Function to update "Part/Reduced Rate" based on "Tender Rate" and "Rate Reduced By"
        function updatePartReducedRate() {
        var tenderRate = parseFloat($('#tenderRateModal').val()) || 0;
        var rateReducedBy = parseFloat($('#rateReducedBy').val()) || 0;
        var partReducedRate = tenderRate - rateReducedBy;
        $('#partReducedRate').val(partReducedRate.toFixed(2));

        // Evaluate and update the "Amount Reduced" dynamically based on the formula
        $('.formula-input').each(function () {
            var formulaText = $(this).val();
            var rowIndex = $(this).closest('tr').index(); // Get the row index
            try {
                // Use eval to evaluate the formula
                var result = eval(formulaText);
                if (!isNaN(result)) {
                    // Update the corresponding "Amount Reduced" input

                    $('.amount-reduced-input').eq(rowIndex).val(result.toFixed(2));
                     updateRateReducedBy();
                       var tenderRate = parseFloat($('#tenderRateModal').val()) || 0;
        var rateReducedBy = parseFloat($('#rateReducedBy').val()) || 0;
        var partReducedRate = tenderRate - rateReducedBy;
        $('#partReducedRate').val(partReducedRate.toFixed(2));

                } else {
                    // Clear the "Amount Reduced" input if the formula is invalid
                    $('.amount-reduced-input').eq(rowIndex).val('');
                }
            } catch (error) {
                // Handle any errors that occur during evaluation
                console.error('Formula error:', error);
                // Clear the "Amount Reduced" input in case of an error
                $('.amount-reduced-input').eq(rowIndex).val('');
            }
        });
    }






        },
        error: function(error) {
          // Handle the error response from the server
          console.error("Error in AJAX call:", error);
          // You can add error handling logic here
        }
      });

      // Show the "Rate Analysis" modal
      $('#rateanalysis').modal('show');



       // $('#rateanalysis').modal('show');
        //updatetender(formData);
      } else {
        // User clicked "Cancel," do nothing or handle as needed
         // Tender rate is not greater than bill rate, so make the AJAX call directly
    updatetender(formData);
      }
    });
  } else {
    // Tender rate is not greater than bill rate, so make the AJAX call directly
    updatetender(formData);
  }
}







function updatetender(formData) {
  // Make an AJAX call to save the changes
  $.ajax({
    type: "POST", // or "GET" depending on your API
    url: "{{url('updatetenderitem')}}", // Replace with your API endpoint URL
    data: formData,
    success: function (response) {
      // Handle the success response from the server
      console.log("Changes saved successfully:", response);
      // Close the modal if needed
      $("#edittenderModal").modal("hide");

      var newbilitemData = response.billitems;


      // Check if the current bill is in 'is_current' flag
      var tbillid = response.lasttbillid;

       var tbillId = tbillid.t_bill_Id;

       var currentPage = getCurrentPageNumber();

// Call loadPaginatedData() with the current page number
//loadPaginatedData(currentPage);    progressbar();

    },
    error: function (error) {
      // Handle the error response from the server
      console.error("Error saving changes:", error);
      // Display an error message if needed
      $("#error-message").text("Error: Unable to save changes");
    },
  });
}

// Attach the saveChanges function to the "Save Changes" button click event
$("#saveChanges").click(function () {
  saveChangestenders();
});






//rate analysis ajax  for submitting data
$(document).ready(function () {
  // Function to handle the click event of the submit button
  $('#submitDataBtn').click(function () {
    // Gather your static data
    var workid=$('#workid').val();
    var tbillid=$('#rabillid').val();
    var bitemid=publicbitemId;
    var tenderItemNo = $('#tenderItemNoModal').val();
    var tenderRate = $('#tenderRateModal').val();
    var itemDescription = $('#itemDesctender').val();
    var rateCode = $('#rateCodeModal').val();
    var ratereducedby = $('#rateReducedBy').val();
    var partReducedRate = $('#partReducedRate').val();
    // Create an array to store dynamic row data
    var dynamicRowData = [];

    // Loop through each row in the table
    $('#rowdata tr').each(function () {
      var row = $(this);
      var srNo = row.find('.sr-no-input').val(); // Use .text() for table cell contents
  var particulars = row.find('.particulars-input').val(); // Use .text() for table cell contents
  var formula = row.find('.formula-input').val(); // Use .text() for table cell contents
  var amountReduced = row.find('.amount-reduced-input').val(); // Use .text() for table cell contents

      // Create an object for each row and push it to the dynamicRowData array
      dynamicRowData.push({
        srNo: srNo,
        particulars: particulars,
        formula: formula,
        amountReduced: amountReduced,
      });
    });

    // Prepare the data to send via Ajax
    var data = {
      _token: '{{ csrf_token() }}',
      tenderItemNo: tenderItemNo,
      tenderRate: tenderRate,
      itemDescription: itemDescription,
      rateCode: rateCode,
      dynamicRowData: dynamicRowData,
      ratereducedby: ratereducedby,
      partReducedRate: partReducedRate,
      workid: workid,
      tbillid: tbillid,
      bitemid: bitemid
       // Include the dynamic row data
    };

    // Perform the Ajax request
    $.ajax({
      url: "{{ url('submitratedata') }}", // Replace with the actual URL where you want to send the data
      type: 'POST', // Use POST or another appropriate method
      data: data,
      success: function (response) {
        // Handle the success response here
        console.log('Data submitted successfully:', response);
        // You can close the modal or perform other actions as needed
        $('#rateanalysis').modal('hide');
        $("#edittenderModal").modal("hide");
        $('#rowdata').empty();

        var billitemdata=response.bitemdata;
        console.log(billitemdata);
         // Check if the current bill is in 'is_current' flag
      var tbillid = response.lasttbillid;

    var tbillId = tbillid.t_bill_Id;
    // Clear the existing table body content
    window.location.href = response.redirect_url;
   // var currentPage = $('.pagination .active').text();
// Call loadPaginatedData() with the current page number
 //loadPaginatedData(currentPage);
    progressbar();

      },
      error: function (error) {
        // Handle any errors that occur during the Ajax request
        console.error('Error:', error);
        // You can display an error message or perform other error handling as needed
      }
    });
  });
});
</script>
<script>
function initialiserow(rowno)
{
   var rowCounter = rowno;

    // Attach event listeners to input fields for live updates
    $('#tenderRateModal, .amount-reduced-input, .formula-input').on('input', function () {
        updatePartReducedRate();
    });

    // Add row button click event
    $('#addRowBtn').click(function () {
        // Create a new table row
        var newRow = $('<tr>');
        var srNo = $('<td>').html('<input type="text" class="form-control sr-no-input" value="' + rowCounter + '" readonly />'); // Add Sr No input
        var particulars = $('<td>').html('<input type="text" class="form-control particulars-input" />'); // Add particulars input
        var formula = $('<td>').html('<input type="text" class="form-control formula-input" />'); // Add formula input
        var amountReduced = $('<td>').html('<input type="number" class="form-control amount-reduced-input" readonly />');
        var removeButton = $('<td>').html('<button type="button" class="btn btn-danger remove-row">Remove</button>');

        newRow.append(srNo, particulars, formula, amountReduced, removeButton);

        // Append the new row to the table
        $('#rowdata').append(newRow);

        // Increment the row counter
        rowCounter++;

        // Attach event listeners to input fields for live updates
        $('.amount-reduced-input, .formula-input').on('input', function () {
            updateRateReducedBy();
            updatePartReducedRate();
        });

        // Attach click event to remove button
        $('.remove-row').on('click', function () {
            $(this).closest('tr').remove();
            updateRateReducedBy();
            updatePartReducedRate();

            // Reset the srNo for the remaining rows
            $('.sr-no-input').each(function (index) {
                $(this).val(index + 1);
            });

            // Update the rowCounter to the next available number
            rowCounter = $('.sr-no-input').length + 1;
        });
    });
    // Function to update "Rate Reduced By" based on "Amount Reduced" inputs
    function updateRateReducedBy() {
        var totalAmountReduced = 0;
        $('.amount-reduced-input').each(function () {
            var amount = parseFloat($(this).val()) || 0;
            totalAmountReduced += amount;
        });

        // Set "Rate Reduced By" to the totalAmountReduced
        $('#rateReducedBy').val(totalAmountReduced.toFixed(2));
    }



    // Function to update "Part/Reduced Rate" based on "Tender Rate" and "Rate Reduced By"
    function updatePartReducedRate() {
        var tenderRate = parseFloat($('#tenderRateModal').val()) || 0;
        var rateReducedBy = parseFloat($('#rateReducedBy').val()) || 0;
        var partReducedRate = tenderRate - rateReducedBy;
        $('#partReducedRate').val(partReducedRate.toFixed(2));

        // Evaluate and update the "Amount Reduced" dynamically based on the formula
        $('.formula-input').each(function () {
            var formulaText = $(this).val();
            var rowIndex = $(this).closest('tr').index(); // Get the row index
            try {
                // Use eval to evaluate the formula
                var result = eval(formulaText);
                if (!isNaN(result)) {
                    // Update the corresponding "Amount Reduced" input

                    $('.amount-reduced-input').eq(rowIndex).val(result.toFixed(2));
                     updateRateReducedBy();
                       var tenderRate = parseFloat($('#tenderRateModal').val()) || 0;
        var rateReducedBy = parseFloat($('#rateReducedBy').val()) || 0;
        var partReducedRate = tenderRate - rateReducedBy;
        $('#partReducedRate').val(partReducedRate.toFixed(2));

                } else {
                    // Clear the "Amount Reduced" input if the formula is invalid
                    $('.amount-reduced-input').eq(rowIndex).val('');
                }
            } catch (error) {
                // Handle any errors that occur during evaluation
                console.error('Formula error:', error);
                // Clear the "Amount Reduced" input in case of an error
                $('.amount-reduced-input').eq(rowIndex).val('');
            }
        });
    }
}

$('#rateanalysis').on('hidden.bs.modal', function () {
    $('#rowdata').empty();
});
</script>
<!-- new row data add in rate analysis modal  -->
<script>
  // Get references to the select element and the input element
  const rateCodeSelect = document.getElementById('rateCodeModal');
  const partReducedRateLabel = document.querySelector('label[for="partReducedRate"]');

  // Initialize the label text based on the default selected option
  partReducedRateLabel.textContent = 'Part Rate';
  // Add an event listener to the select element
  rateCodeSelect.addEventListener('change', function () {
    // Get the selected option value
    const selectedOptionValue = rateCodeSelect.value;

    // Update the label text based on the selected option
    if (selectedOptionValue === 'Part Rate') {
      partReducedRateLabel.textContent = 'Part Rate';
    } else if (selectedOptionValue === 'Reduced Rate') {
      partReducedRateLabel.textContent = 'Reduced Rate';
    }
  });
</script>
<!-- emb pop up table ajax request -->
<style>
  .preview-image {
  width: 100px;
  height: 100px;
  cursor: pointer; /* Add this line to set cursor to pointer */
}

</style>
<script>
$(document).ready(function() {
    // Add a click event handler to the button
    $('.emb-button').click(function() {
        // Get the data-target attribute value
        var target = $(this).data('target');

        // Open the modal with the corresponding ID
        $(target).modal('show');
    });
});
</script>
<script>
function openModal(bItemId, billNo) {
  //var billitemid=bItemId;
  //console.log(billitemid);
    $.ajax({
        url: "{{ url('embdatatable') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            b_item_id: bItemId,
            selectrabill: billNo
        },
        success: function (response) {
          var bitemid= response.bitemId;
         var itemdata = response.bitemdata[0];
          var itemno=itemdata.t_item_no;
          console.log(itemno);
          //console.log(response);

            if (response.modalData) {
                var modalData = response.modalData;

                // var image1Urls= response.image1Urls[0];
                // var image2Urls= response.image2Urls[0];
                // var image3Urls= response.image3Urls[0];
                // var documentUrls = response.documentUrls[0];
        //         console.log("Photo 1 URL:", image1Urls);
        // console.log("Photo 2 URL:", image2Urls);
        // console.log("Photo 3 URL:", image3Urls);
        // console.log("Document URL:", documentUrls);
                var tableBody = $('#modal-table-body'+bItemId);
                tableBody.empty();

                // Populate modal header with title
                $('#exampleModalLabel'+bItemId).text('Popup Title');

                // Fetch item_desc from the bil_item table using b_item_id
                $.ajax({
                    url: "{{ url('fetchitemdesc') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        b_item_id: bItemId
                    },
                    success: function (response) {
                      var item = response.itemdata[0];
                        //console.log(item);// Access the first item in the array


                      var bItemId = response.bItemId;
                      if (response && response.itemdata && response.itemdata.length > 0) {

                        console.log(bItemId); // Check the item_desc value in the browser console



                      }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });

                for(i=0; i< modalData.length; i++)
                {
                  var modaldata = modalData[i];
                // Create table row with the fetched modal data
                var row = $('<tr>');
                row.append($('<td>').text(modaldata.sr_no));
                row.append($('<td>').text(modaldata.parti));
                row.append($('<td>').text(modaldata.number));
                row.append($('<td>').text(modaldata.length));
                row.append($('<td>').text(modaldata.breadth));
                row.append($('<td>').text(modaldata.height));
                row.append($('<td>').text(modaldata.formula));
                row.append($('<td>').text(modaldata.qty));
                row.append($('<td>').text(formatDate(modaldata.measurment_dt) || ''));


// Display image and document
 // Display image and document
//  var img1Url = response.image1Urls[i];
//   var img2Url = response.image2Urls[i];
//   var img3Url = response.image3Urls[i];
//   var docUrl = response.documentUrls[i];

//   // Append table cells for images and document
//   row.append($('<td>').append($('<img>').attr('src', img1Url).addClass('preview-image').click(function() {
//   showLargeImage(img1Url);
// })));
// row.append($('<td>').append($('<img>').attr('src', img2Url).addClass('preview-image').click(function() {
//   showLargeImage(img2Url);
// })));
// row.append($('<td>').append($('<img>').attr('src', img3Url).addClass('preview-image').click(function() {
//   showLargeImage(img3Url);
// })));
// row.append($('<td>').html(`<a href="${docUrl}" target="_blank">Download Document</a>`));

// Append the row to the table body
tableBody.append(row);

                tableBody.append(row);


                }

                $('#table-containerview'+bItemId).hide();
                 $("#normalview"+bItemId).show();

                 $('#viewpreviousQty'+bItemId).val(response.previousexecqty);
              $('#viewcurrentQty'+bItemId).val(response.curqty);
             $('#viewtotalQty'+bItemId).val(response.execqty);




             $('#viewtndqty'+bItemId).val(response.tndqty);
             $('#viewpercentage'+bItemId).val(response.percentage);
             $('#viewtndcost'+bItemId).val(response.tndcostitem);

             $('#viewcostdifference'+bItemId).val(response.costdifference);
             $('#viewtotalcost'+bItemId).val(response.totlcostitem);

              }else {

                  // Clear the content of the modal table body
                  // Display an empty structure in the modal
                  // $('#itemDesc1').empty();
                  // $('#subNo1').empty();
                  // $('#itemNo1').empty();
                  // $('#itemDesc').text(itemDesc);
                  //       $('#subNo').text(subno);
                  //         $('#itemNo').text(itemno);
                  var htmldata=response.html;
                   // console.log(htmldata);

                  // console.log(htmldata);
                  // $('#itemNo1').empty();

                  $('#table-containerview'+bItemId).html(htmldata);
                  $("#normalview"+bItemId).hide();

                 }

                 var workdetails=response.workdetail;

   $('#workdetailview'+bItemId).html(workdetails || '');
                  // Update the item_desc in the HTML element with ID 'itemDesc'
                  $('#itemDesc'+bItemId).text(itemdata.item_desc);

                  var concatenatedValue = (itemdata.sub_no !== '') ? (itemno + itemdata.sub_no) : itemno;

$('#subNo' + bItemId).text(concatenatedValue);
$('#itemNo' + bItemId).text(concatenatedValue);


                 $('#embview'+bItemId).modal('show');
             // Show the modal

        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}
</script>

<!-- NEW button confirmation alert script -->
<script>
function confirmNew() {
  Swal.fire({
    title: 'Confirmation',
    text: 'Are you sure you want to proceed with creating a new entry?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
  }).then((result) => {
    if (result.isConfirmed) {
      // Retrieve the CSRF token value from the meta tag
      var csrfToken = $('meta[name="csrf-token"]').attr('content');

      // Perform your desired action using Ajax
      $.ajax({
        url: 'newbills',
        type: 'POST',
        data: {
          _token: csrfToken,
        },
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
           // Update the HTML elements with the updated values from the Ajax response
           $('#rabillid').val(response.newBillId);
          var selectElement = $('#rabillno');


// Clear existing options
selectElement.empty();

// Append the new bill number to the select element options
var newBillNo = response.newBillNo;
var newOption = $('<option></option>').attr('value', 'new').text(newBillNo).prop('selected', true);
selectElement.append(newOption);

// Append the existing bill numbers to the select element options
$.each(response.billNos, function (billId, billNo) {
  // Exclude the new bill number from the list
  if (billNo !== newBillNo) {
    var option = $('<option></option>').attr('value', billId).text(billNo);
    selectElement.append(option);
  }
});

// Hide the existing bill numbers that match the new bill number
selectElement.find('option').filter(function() {
  return $(this).text() === newBillNo;
}).hide();





          // // Fetch other values from the newly created bill and set them in the respective elements
          // $('#date').val(response.lastBill.Bill_Dt);
          // $('#rabmino').val(response.lastBill.bill_amt);
          // $('#recamt').val(response.lastBill.rec_amt);
          // $('#netamt').val(response.lastBill.net_amt);
          // $('#cvno').val(response.lastBill.cv_no);
          // $('#cvdate').val(response.lastBill.cv_dt);
          // $('#finalbill').prop('checked', response.lastBill.final_bill == 1);





          // Show success message
          Swal.fire('Success!', 'New entry created.', 'success');
          enableInputFields();
        },
        error: function (xhr, status, error) {
          // Handle the Ajax error response
          Swal.fire('Error!', 'Something went wrong.', 'error');
        }
      });
    }
  });
}
</script>
<!-- enable inputs when new button click -->
<script>
function enableInputFields() {
  // Enable the input fields
  $('#newcvno').removeAttr('disabled');
  $('#newcvdate').removeAttr('disabled');
  $('#myselect').removeAttr('disabled');
  $('#newfinalbill').removeAttr('disabled');
  $('#newbilldate').removeAttr('disabled');

  $('#newrecamt').removeAttr('disabled');

}
</script>


<script>
function enableNewButton() {
  var selectedBillNo = $('#rabillno').val();
  var firstBillNo = $('#rabillno option:first').val();

  var optionCount = $('#rabillno option').length;

  if (selectedBillNo === firstBillNo || optionCount === 0) {
    $('#newButton').prop('disabled', false);
  } else {
    $('#newButton').prop('disabled', true);
  }
}

// Call the function initially and whenever the dropdown selection changes
enableNewButton();
$('#rabillno').change(enableNewButton);
</script>




<!-- New bill created ajax function -->
<!--
<script>
  //the function for creating new bill

  function showNewBillModal() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    // Retrieve the selected option value
    var selectedOption = $('#mySelect').val();

    $.ajax({
      url: '/newbills', // Replace with your actual route for creating a new bill
      type: 'POST',
      dataType: 'json',
      data: {
        _token: csrfToken, // Include the CSRF token in the request data
        optionValue: selectedOption
      },
      success: function(response) {
  // Show the new bill modal
  $('#newBillModal').modal('show');

  // Update the form fields with the new bill data
  $('#newrabillid').val(response.newBillId);
  $('#newrabillno').val(response.newBillNo);

  // Fetch other values from the newly created bill and set them in the respective elements
  $('#newbilldate').val(response.lastbill.Bill_Dt);
  $('#newbillamt').val(response.lastbill.bill_amt);
  $('#newrecamt').val(response.lastbill.rec_amt);
  $('#newnetamt').val(response.lastbill.net_amt);
  $('#newcvno').val(response.lastbill.cv_no);
  $('#newcvdate').val(response.lastbill.cv_dt);
  $('#myselect').val(response.lastbill.bill_type);
  $('#newfinalbill').prop('checked', response.lastbill.final_bill == 1);



      },
      error: function(xhr, status, error) {
        // Handle the AJAX error here
        console.log(error);
      }
    });
  }
</script> -->



<script>
  //the function for creating new bill

  function showNewBillModal() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    // Retrieve the selected option value
    var selectedOption = $('#mySelect').val();
    // Retrieve the value of the workid input element
    var workidValue = $('#workid').val();
    var billtype =$('#billtype').val();
    $.ajax({
      url: '/newbills', // Replace with your actual route for creating a new bill
      type: 'POST',
      dataType: 'json',
      data: {
        _token: csrfToken, // Include the CSRF token in the request data
        optionValue: selectedOption,
        workid: workidValue,
        Billtype:billtype,
      },
      success: function(response) {
        console.log(response);

        //var date180daysAgo=response.date180DaysAgo;

        var workorderdt=response.workorderdt;
        //console.log(date180daysAgo);
  // Show the new bill modal
  var Newbilldata = response.newBillData;
  console.log(Newbilldata);
  $('#newBillModal').modal('show');

  // Update the form fields with the new bill data
  $('#newrabillid').val(response.newBillId);
  $('#newrabillno').val(response.newBillNo);
 // $('#pbilldt').val(Newbilldata.p_bill_dt);

  // Check if both billno and billid are first, then enable certain inputs
if (response.newBillId === response.firstid) {
  console.log(response.newBillNo);

  var minDate = Newbilldata.measdtfrom;
  console.log(minDate);
 var billdate= Newbilldata.Bill_Dt;

 console.log(minDate);

 var parts = minDate.split("-");
if (parts.length === 3) {
    var day = parts[0];
    var month = parts[1];
    var year = parts[2];

    // Convert the date to "yyyy-MM-dd" format
    var formattedDate = year + "-" + month + "-" + day;

    // Set the minimum attribute of the input element

   
    var minDateCondition = formattedDate;
    var mindate = minDateCondition.split("-");
    mindate.length === 3;
    var day1 = mindate[0];
    var month1 = mindate[1];
    var year1 = mindate[2];
    var mdate=year1 + "-" + month1 + "-" + day1;
    $('#newbilldate').attr('min', mdate);
$('#measdtfr').attr('min', mdate);


//     if (formattedDate < date180daysAgo) {
//     var minDateCondition = formattedDate;
//     var mindate = minDateCondition.split("-");
//     mindate.length === 3;
//     var day1 = mindate[0];
//     var month1 = mindate[1];
//     var year1 = mindate[2];
//     var mdate=year1 + "-" + month1 + "-" + day1;
//     $('#newbilldate').attr('min', mdate);
// $('#measdtfr').attr('min', mdate);
// } else {
//     var minDateCondition = date180daysAgo;
//     var mindate = minDateCondition.split("-");
//     mindate.length === 3;
//     var day1 = mindate[0];
//     var month1 = mindate[1];
//     var year1 = mindate[2];
//     var mdate=year1 + "-" + month1 + "-" + day1;
//     $('#newbilldate').attr('min', mdate);
// $('#measdtfr').attr('min', mdate);
// }




}
// Set the minimum date for the input field

   // Set values of specific elements
   $('#newbilldate').val();
   //$('#newbilldate').attr('min', minDate);
  $('#newbillamt').val();
  $('#newrecamt').val();
  $('#newnetamt').val();
  $('#newcvno').val();
  $('#newcvdate').val();
 // $('#measdtfr').val(Newbilldata.measdtfrom);
 // $('#measdtfr').attr('min', minDate);
 // $('#measdtfr').attr('min', date180daysAgo);
  $('#gstrate').val(Newbilldata.gst_rt);
  // Combine both conditions by selecting the minimum of the two dates


  $('#measdtupto').val();

  $('#newrabillno').removeAttr('disabled');
  $('#newbilldate').removeAttr('disabled');
  $('#newbillamt').removeAttr('disabled');
  $('#newrecamt').removeAttr('disabled');
  //$('#newnetamt').removeAttr('disabled');
}
else{

  var miinDate = response.lastbill.Bill_Dt;
  var minbildate=Newbilldata.Bill_Dt;
  console.log(minbildate);

  var parts = minbildate.split("-");
if (parts.length === 3) {
    var day = parts[0];
    var month = parts[1];
    var year = parts[2];

    // Convert the date to "yyyy-MM-dd" format
    var formattedDate = year + "-" + month + "-" + day;

    // Set the minimum attribute of the input element
    $('#newbilldate').attr('min', formattedDate);
}
  // Fetch other values from the newly created bill and set them in the respective elements
  //$('#newbilldate').val(Newbilldata.Bill_Dt);
  //$('#newbilldate').attr('min', formattedDate);
  $('#newbillamt').val(response.lastbill.bill_amt);
  $('#newrecamt').val(response.lastbill.rec_amt);
  $('#newnetamt').val(response.lastbill.net_amt);
  $('#newcvno').val(response.lastbill.cv_no);
  $('#newcvdate').val(response.lastbill.cv_dt);
  $('#myselect').val(response.lastbill.bill_type);
  $('#newfinalbill').prop('checked', response.lastbill.final_bill == 1);
  $('#measdtfr').val(Newbilldata.measdtfrom);
  $('#measdtfr').attr('min', miinDate);
  $('#measdtfr').attr('min', date180daysAgo);
  $('#gstrate').val(Newbilldata.gst_rt);
  $('#pbilldt').val(Newbilldata.p_bill_dt);
  // Combine both conditions by selecting the minimum of the two dates
var minDateCondition = miinDate < date180daysAgo ? miinDate : date180daysAgo;
$('#measdtfr').attr('min', minDateCondition);



  $('#newbilldate').removeAttr('disabled');

  $('#newrecamt').removeAttr('disabled');

}
      },
      error: function(xhr, status, error) {
        // Handle the AJAX error here
        console.log(error);
      }
    });
  }
</script>

<script>
function updateMeasurementDate() {
    // Get the selected Bill Date
    var billDate = new Date(document.getElementById("newbilldate").value);

    // Get the Measurement Date Upto input element
    var measDateInput = document.getElementById("measdtupto");

    // Get the Measurement Date From input element
    var measDateFromInput = document.getElementById("measdtfr");

    // Set the maximum allowed date for Measurement Date Upto as one day before the Bill Date
    if (!isNaN(billDate.getTime())) {
        var maxMeasDate = billDate.toISOString().split('T')[0];
        measDateInput.setAttribute("max", maxMeasDate);
    } else {
        // If Bill Date is not a valid date, remove the max attribute from Measurement Date Upto
        measDateInput.removeAttribute("max");
    }

    // Set the maximum allowed date for Measurement Date From as the Bill Date
    if (!isNaN(billDate.getTime())) {
        var maxMeasDateFrom = billDate.toISOString().split('T')[0];
        measDateFromInput.setAttribute("max", maxMeasDateFrom);
    } else {
        // If Bill Date is not a valid date, remove the max attribute from Measurement Date From
        measDateFromInput.removeAttribute("max");
    }

    // Reset the value of Measurement Date Upto if it's greater than the new maximum
    var measDate = new Date(measDateInput.value);
    if (!isNaN(measDate.getTime()) && measDate > billDate) {
        measDateInput.value = maxMeasDate;
    }

    // Reset the value of Measurement Date From if it's greater than the new maximum
    var measDateFrom = new Date(measDateFromInput.value);
    if (!isNaN(measDateFrom.getTime()) && measDateFrom > billDate) {
        measDateFromInput.value = maxMeasDateFrom;
    }
}
</script>
<script>
  // Function to update net_amt based on bill_amt and rec_amt
  function updateNetAmt() {
    var billAmt = parseFloat($('#newbillamt').val()) || 0;
    var recAmt = parseFloat($('#newrecamt').val()) || 0;
    var netAmt = billAmt - recAmt;

    // Update the net_amt field
    $('#newnetamt').val(netAmt.toFixed(2)); // You can adjust decimal places as needed
  }

  // Attach event listeners to bill_amt and rec_amt fields
  $('#newbillamt, #newrecamt').on('input', updateNetAmt);
</script>
  <script>
  // Attach an event listener to the input element to handle changes
$('#measdtfr').on('change', function () {
    var selectedDate = new Date(this.value);

    // Set the minimum date for the input field to the selected date
    $(this).attr('min', this.value);
});

</script>
</script>

<script>
    function updateDropdownOptions(billNos) {
      var newDropdown = $('<select class="form-control form-select" id="rabillno" name="t_bill_No" onchange="handleOptionChange()">');
      $.each(billNos, function(t_bill_id, t_bill_No) {
        var option = $('<option></option>').attr('value', t_bill_id).text(t_bill_No);
        newDropdown.append(option);
      });
      $('#rabillno').replaceWith(newDropdown);
    }



// <!-- submit new bill ajax script -->



      // Function to handle the form submission
  function submitForm(event) {

        event.preventDefault(); // Prevent form submission


      // Perform your desired actions here
      // For example, you can retrieve the form data and perform an AJAX request
          // Disable the submit button to prevent multiple submissions
  $('#newbillsubmit').prop('disabled', false);

  $('#newrabillno').prop('disabled', false);
  $('#newbillamt').prop('disabled', false);
  $('#newnetamt').prop('disabled', false);




      // Serialize the form data
      var formData = $('#newBillForm').serialize();
     console.log(formData);
      // Add the workidValue to the formData


      // Perform the AJAX request
      $.ajax({
        url: '/newbillsubmit', // Replace with your actual endpoint URL
        type: 'POST',
        data: formData,

        success: function(response) {
          var tbillid=response.tBillId;
          console.log(tbillid);
          // Handle the success response here
          // Handle the success response here
        // Check if the response contains the sweetAlertConfig script
        var sweetAlertScript = $(response).filter('script:contains("sweetAlertConfig")');

        if (sweetAlertScript.length > 0) {
            // Extract the script content and execute it
            var scriptContent = sweetAlertScript.html();
            $.globalEval(scriptContent);

            // Display the SweetAlert modal
            Swal.fire(sweetAlertConfig);
        } else {
            // Handle other parts of the response if needed
        }
          //console.log(response);
          // Access the inserted row data
          var newBillData = response.newbill;
          console.log(newBillData);
          // Update the respective elements with the response data
         var newbilldatet=response.newbilldt;
         //console.log(newbilldt);
         var newmeasdtfr=response.newmeasdtfr;
         var newmessupto=response.newmessupto;

          toggleSectionWrapper(true);

          $('#rabillid').val(newBillData.t_bill_Id);

          // Update the dropdown with the new billNos
          updateDropdownOptions(response.billNos);

          // Update other fields as needed

          //console.log(newBillData.Bill_Dt);
          $('#billamt').val(newBillData.bill_amt);
          $('#recamt').val(newBillData.rec_amt);
          $('#netamt').val(newBillData.net_amt);
          $('#cvno').val(newBillData.cv_no);
          $('#cvdate').val(newBillData.cv_dt);
          $('#billtype').val(newBillData.bill_type);
          $('#finalbill').prop('checked', newBillData.final_bill == 1);
          $('#measdf').val(newmeasdtfr);
          $('#measdu').val(newmessupto);
          $('#date').val(newBillData.Bill_Dt);
          $('#gstrt').val(newBillData.gst_rt);


          if(newBillData.final_bill === 1)
          {
            $('#newButton').prop('disabled', true);
          }
          var isDataFromAjax = true; // Set this value accordingly
console.log();
// Check if data is from AJAX and handle accordingly

          //$('.container').show();
          var newbilitemData=response.embsection3;
 // Clear the existing table body content
 var tableHeader = `
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Tender Item No</th>
                <th>Item</th>
                <th>Tender Quantity</th>
                <th>Bill Rate</th> <!-- Span two columns for Rate -->
                <th>Rate Code</th>
                <th>Upto Date Qty</th>
                <th>Current Amt</th>
                <th>Previous Amt</th>
                <th>Unit</th>
                <th>Uptodate Amount</th>
                <th>Action</th>
            </tr>
            <tr>
                <th></th> <!-- Empty cell for Tender Item No -->
                <th></th> <!-- Empty cell for Item -->
                <th></th> <!-- Empty cell for Tender Quantity -->
                <th>Tender Rate</th> <!-- First heading -->
                <th></th> <!-- Second heading -->
                <th></th> <!-- Empty cell for Rate Code -->
                <th></th> <!-- Empty cell for Upto Date Qty -->
                <th></th> <!-- Empty cell for Unit -->
                <th></th> <!-- Empty cell for Amount -->
                <th></th> <!-- Empty cell for Action -->
            </tr>
        </thead>
        <tbody>
   `;

   var tableFooter = `</tbody></table>`;
                        // If the deletion was successful, update the table rows
                        var tableBody = $('#billitemtbody');

                        $('#billitemtbody').empty();

                        var row='';


  // Check if the current bill is in 'is_current' flag
  var isCurrentBillId = response.currentBillId;

// Update the table with the new data


newbilitemData.data.forEach(function(item) {
  row += `
    <tr>
      <td>${item.t_item_no} ${item.sub_no ? item.sub_no : ''}</td>
      <td>${item.item_desc}</td>
      <td>${item.tnd_qty}</td>
      <td>${item.bill_rt}<br><br> <div class="line"></div><br>${item.tnd_rt}</td>
      <td>${item.ratecode}</td>
      <td>${item.exec_qty}</td>
      <td>${item.cur_amt}</td>
      <td>${item.previous_amt}</td>
      <td>${item.item_unit}</td>
      <td>${item.b_item_amt}</td>
      <td>
        <div class="Action">
          <button type="button" class="btn emb-button mb-2" data-toggle="modal" data-target="#embview${item.b_item_id}" onclick="openModal('${item.b_item_id}')" title="VIEW MEASUREMENTS" ><i class="fa fa-eye" aria-hidden="true"></i></button>
          <button type="button" class="btn btn-primary mb-2" onclick="openedittender('${item.b_item_id}')" ${isCurrentBillId === item.t_bill_id ? '' : 'disabled'} title="EDIT TENDER ITEM"> <i class="fa fa-pencil-square" aria-hidden="true" id="icon"></i></button>
          <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#embeditbutton${item.b_item_id}" onclick="openeditbutton('${item.b_item_id}')" ${isCurrentBillId === item.t_bill_id ? '' : 'disabled'} title="ADD AND EDIT MEASUREMENTS"> <i class="fa fa-pencil" style="color:white;"></i></button>
        </div>
        <button type="button" class="btn btn-danger mb-2" onclick="deletebillitem('${item.b_item_id}')" ${item.is_previous === 0 ? 'disabled' : ''} ${isCurrentBillId === item.t_bill_id ? '' : 'disabled'} title="DELETE TENDER ITEM"><i class="fa fa-trash" aria-hidden="true"></i></button>

      </td>
    </tr>
  `;
  createUniqueModal(item);
  applyCssToModals();
});

// Append the accumulated rows to the table body after the loop
  var tableHTML = tableHeader + row + tableFooter;

    $('#bill-item-table').html(tableHTML);
   // Enable the submit button after the AJAX request is completed
   $('#newbillsubmit').prop('disabled', false);

// Close the modal after successful submission
$('#newBillModal').modal('hide');

progressbar();

},
error: function(xhr, status, error) {
          // Handle the error response here

        }
      });
    }



</script>
<script>
  var sweetAlertConfig = null;

  // Example JavaScript code to display SweetAlert in the UI
if (sweetAlertConfig !== null) {
    Swal.fire(sweetAlertConfig).then((result) => {
        // Handle any additional actions after the SweetAlert is closed (if needed)
        // For example, you can redirect the user or perform other actions
        sweetAlertConfig = null; // Reset the configuration after displaying the SweetAlert
    });
}

</script>


<style>
    /* Define styles for right-align class */
  .right-align {
    text-align: right;
  }
  /* Define a custom class to remove padding from right-aligned column */
  .right-align.no-padding {
    padding-right: 0;
    margin-right: -5px;
  }
  #left-align {
    text-align: left;
    padding-left: 0; /* Remove left padding to make value touch left edge */
    margin-left: -5px; /* Add negative margin to move value slightly to the right */
  }

  /* Define the width for each table column */
  #ajaxTable th:nth-child(1),
  #ajaxTable td:nth-child(1) {
    width: 80px; /* Adjust the width as needed */
  }

  #ajaxTable th:nth-child(2),
  #ajaxTable td:nth-child(2) {
    width: 20px; /* Adjust the width as needed */
  }

  #ajaxTable th:nth-child(3),
  #ajaxTable td:nth-child(3) {
    width: 600px; /* Adjust the width as needed */
  }

  #ajaxTable th:nth-child(8),
  #ajaxTable td:nth-child(8) {
    width: 120px; /* Adjust the width as needed */
  }
   /* Enforce fixed table layout */

</style>
<script>

  var selectedRowsData = []; // Array to store selected row data


  function openModaltnditem() {

    // Get the workid from the input field
    var workid = document.getElementById('workid').value;
    var csrfToken = "{{ csrf_token() }}";

    // Perform the AJAX request to load the table content
    $.ajax({
      url: '/tnditem', // Replace with your actual AJAX endpoint URL that handles the workid parameter
      type: 'GET',
      dataType: 'json',
      data: {
        _token: csrfToken, // Include the CSRF token in the request data (if needed)
        workid: workid, // Pass the workid to the server
      },
      success: function(response) {
        // On success, update the modal body with the loaded content
        var tableBody = '';
        $.each(response, function(index, items) {
          var combinedItemNo = items.t_item_no;
          if (items.sub_no) {
            combinedItemNo += '-' + items.sub_no;
          }

          var t_item_id = items.t_item_id;
          var item_id=items.item_id;
          var sch_item=items.sch_item;
          var item_desc=items.item_desc;
          var exs_nm=items.exs_nm;
          //console.log(exs_nm);


          // Create the table row with the concatenated item number
          tableBody +='<tr data-t_item_id="' + t_item_id + '" data-item_id="' + item_id + '" data-sch_item="' + sch_item + '" data-exs_nm="' + exs_nm + '">' +
            '<td class="right-align no-padding">' + items.t_item_no + '</td>' + // Right-align t_item_no
            '<td id="left-align">' + items.sub_no + '</td>' + // Left-align sub_no
            '<td>' + items.item_desc + '</td>' +
            '<td>' + items.tnd_qty + '</td>' +
            '<td>' + items.item_unit + '</td>' +
            '<td>' + items.tnd_rt + '</td>' +
            '<td>' + items.t_item_amt + '</td>' +
            '<td><input type="checkbox" class="row-checkbox" data-t_item_id="' + t_item_id + '"></td>' + // Add checkbox in the last <td> column
            '</tr>';
        });

        $('#tndItemModal .modal-body #ajaxTable tbody').html(tableBody); // Append the table rows to tbody

        // Show the modal when the AJAX request is complete
        $('#tndItemModal').modal('show');
      // Add event listener to checkboxes

      $(document).off('click', '.row-checkbox').on('click', '.row-checkbox', function () {
        var $row = $(this).closest('tr');
        var t_item_id = $row.data('t_item_id'); // Get the t_item_id from the data attribute
         var item_id = $row.data('item_id');
        var sch_item = $row.data('sch_item');
        var exs_nm = $row.data('exs_nm');



        // Assuming you set the item-id as data attribute
        var rowData = {
          // t_item_no: parseInt($row.find('td:eq(0)').text()),
          // sub_no: $row.find('td:eq(1)').text(),
          // item_desc: $row.find('td:eq(2)').text(),
          // tnd_qty: parseFloat($row.find('td:eq(3)').text()),
          // item_unit: $row.find('td:eq(4)').text(),
          // tnd_rt: parseFloat($row.find('td:eq(5)').text()),
          // t_item_amt: parseFloat($row.find('td:eq(6)').text()),
         t_item_id: t_item_id, // Include the t_item_id in the rowData object
      // item_id: item_id,
      // sch_item: sch_item,
      // exs_nm: exs_nm,
        };
        console.log(rowData);
        if (this.checked) {
    // Checkbox is checked, add the rowData to the selectedRowsData array
    selectedRowsData.push(rowData);

    // Set lastClickedRowData to the rowData of the checked checkbox
    lastClickedRowData = rowData;
  } else {
    //console.log(selectedRowsData);
    // Checkbox is unchecked, remove the rowData from the selectedRowsData array
    var index = selectedRowsData.findIndex(function (item) {
      console.log(item.t_item_id);
      return item.t_item_id === rowData.t_item_id;
    });
    if (index !== -1) {
      selectedRowsData.splice(index, 1);
    }

    // Set lastClickedRowData to null as the checkbox is unchecked
    lastClickedRowData = null;
  }


        // Now you have the updated selectedRowsData array with the selected row data
        console.log(selectedRowsData);
         console.log(selectedRowsData);
        repeatedatahandle(lastClickedRowData);
      });
      },
      error: function(xhr, status, error) {
        // Handle the error response here (if needed)
        console.error(error);
      },
    });
  }



  function repeatedatahandle(singlerowdata) {
   // console.log(selectedRowsData);
   var tbillid = $('#rabillid').val();
  $.ajax({
    url: '/repeatedatatnditem', // Replace with your actual AJAX endpoint URL to handle the data
    type: 'POST', // Use POST method to send data to the server
    data: {
      _token: "{{ csrf_token() }}", // Include the CSRF token in the request data (if needed)
      selectedRowData: singlerowdata, // Pass the selectedRowsData array to the server
      tbillid: tbillid
    },
    success: function (response) {




  // Handle the success response here (if needed)
      console.log('Data submitted successfully.');
      console.log(response); // The response from the server (if any)

      // Show a SweetAlert confirmation if repeated t_item_id values are found
      if (response.message) {
        // Set the flag to indicate that the pop-up has been shown
        Swal.fire({
          title: 'Data is repeated',
          text: response.message,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, proceed',
          cancelButtonText: 'No, cancel',
        }).then((result) => {
          if (result.isConfirmed) {
            // User clicked "Yes, proceed", you can proceed with your logic
            // ...
          } else {
             // User clicked "No, cancel", handle that scenario accordingly
            // Remove the selected row data from selectedRowsData
            selectedRowsData = selectedRowsData.filter(function (item) {
              return item.t_item_id !== singlerowdata.t_item_id;
            });
           // Update the checkboxes in the table
$('input.row-checkbox[data-t_item_id="' + singlerowdata.t_item_id + '"]').prop('checked', false);
          }
        });
      }
    },
    error: function (xhr, status, error) {
      // Handle the error response here (if needed)
      console.error(error);
    }
  });
}

//all item selected
// Function to handle the "Select All" checkbox
$(document).on('change', '#alltenderitem', function () {
  var isChecked = $(this).prop('checked');
  $('input.row-checkbox').prop('checked', isChecked);


  if (isChecked) {
      // Clear the selectedRowsData array before adding all selected rows
      selectedRowsData = [];
var rowDataall=null;
// Add all selected rows to the selectedRowsData array
$('input.row-checkbox:checked').each(function () {
  var $rowall = $(this).closest('tr');
  var t_item_id = $rowall.data('t_item_id');
  // var item_id = $rowall.data('item_id');
  // var sch_item = $rowall.data('sch_item');
  // var exs_nm = $rowall.data('exs_nm');

   rowDataall = {
    // t_item_no: parseInt($rowall.find('td:eq(0)').text()),
    // sub_no: $rowall.find('td:eq(1)').text(),
    // item_desc: $rowall.find('td:eq(2)').text(),
    // tnd_qty: parseFloat($rowall.find('td:eq(3)').text()),
    // item_unit: $rowall.find('td:eq(4)').text(),
    // tnd_rt: parseFloat($rowall.find('td:eq(5)').text()),
    // t_item_amt: parseFloat($rowall.find('td:eq(6)').text()),
    t_item_id: t_item_id,
    // item_id: item_id,
    // sch_item: sch_item,
    // exs_nm: exs_nm,
  };

  selectedRowsData.push(rowDataall);

});

console.log(selectedRowsData);
}  else {
    // Clear the selectedRowsData array when the "Select All" checkbox is unchecked
    selectedRowsData = [];
  }
});






// Function to remove selected rows
$(document).on('click', '#removeSelectedRowsButton', function () {
  var selectedCheckbox = $('input.row-checkbox:checked');
  selectedCheckbox.each(function () {
    var t_item_id = $(this).closest('tr').data('t_item_id');
    // Remove the selected row data from selectedRowsData
    selectedRowsData = selectedRowsData.filter(function (item) {
      return item.t_item_id !== t_item_id;
    });
    // Remove the selected row from the table
    $(this).closest('tr').remove();
  });
});


function submitSelectedItems(event) {
  // Prevent the default form submission behavior
  event.preventDefault();
// Get the value of the rabillid input field
var workid = $('#workid').val();
console.log(selectedRowsData);
    $.ajax({
      url: '/storeSelectedItems', // Replace with your actual endpoint URL to store the data
      type: 'POST', // Use POST method to send data to the server
      data: {
        _token: "{{ csrf_token() }}",
        work_id: workid, // Pass the t_bill_id value to the server// Include the CSRF token in the request data (if needed)
        selectedRowsData: selectedRowsData, // Pass the selected row data to the server
      },
      success: function(response) {
        // Handle the success response here (if needed)
        console.log('Data submitted successfully.');
       // console.log(response); // The response from the server (if any)
 // Parse the is_current value from the response
 var isCurrent = response.is_current;

// Enable or disable the "Edit" button based on the is_current value
if (isCurrent === 1) {
  // If is_current is 1, enable the "Edit" button
  $('.btn.btn-primary').prop('disabled', false);
} else {
  // If is_current is not 1, disable the "Edit" button
  $('.btn.btn-primary').prop('disabled', true);
}


        // Clear the selectedRowsData array after submitting
       selectedRowsData = [];



    // Parse the allbillitems data from the response
  var Allbillitems = response.allbillitems;
console.log(Allbillitems);
var tbillid=response.lasttbillid;

var tbillId = tbillid.t_bill_Id;

//var row='';
 $('#billitemtbody').empty();
///$('#bil-item-tbody'+tbillid).empty();

// Initialize the header section outside of the loop
var tableHeader = `
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Tender Item No</th>
                <th>Item</th>
                <th>Tender Quantity</th>
                <th>Bill Rate</th> <!-- Span two columns for Rate -->
                <th>Rate Code</th>
                <th>Upto Date Qty</th>
                <th>Current Amt</th>
                <th>Previous Amt</th>
                <th>Unit</th>
                <th>Uptodate Amount</th>
                <th>Action</th>
            </tr>
            <tr>
                <th></th> <!-- Empty cell for Tender Item No -->
                <th></th> <!-- Empty cell for Item -->
                <th></th> <!-- Empty cell for Tender Quantity -->
                <th>Tender Rate</th> <!-- First heading -->
                <th></th> <!-- Second heading -->
                <th></th> <!-- Empty cell for Rate Code -->
                <th></th> <!-- Empty cell for Upto Date Qty -->
                <th></th> <!-- Empty cell for Unit -->
                <th></th> <!-- Empty cell for Amount -->
                <th></th> <!-- Empty cell for Action -->
            </tr>
        </thead>
        <tbody>
`;

var tableFooter = `</tbody></table>`;
var row = '';

window.location.href = response.redirect_url;

     // Close the modal after successful submission
     $('#tndItemModal').modal('hide');
     progressbar();


  },
  error: function(xhr, status, error) {
    // Handle the error response here (if needed)
    console.error(error);
  }
});
    }
// Bind the submitSelectedItems function to the "Submit" button click event
$(document).ready(function() {
  $('#submitBtn').click(submitSelectedItems);
});



</script>
<script>

  //for css apply to updated modal
  // Apply CSS to modals with the classes 'modal-dialog' and 'modal-fullscreen':
function applyCssToModals() {
  var uniqueModalSelector = '.modal-fullscreen';

  // Find the modals with the specified classes
  var modals = document.querySelectorAll(uniqueModalSelector);

  // Loop through the modals and apply CSS to each one
  for (var i = 0; i < modals.length; i++) {
    var modal = modals[i];

    // Apply CSS styles to the modal
    modal.style.width = "100%";
      modal.style.maxWidth = "100%";
      modal.style.height = "100%";
      modal.style.maxHeight = "100%";
      modal.style.margin = "0";
      modal.style.top = "0";
      modal.style.left = "0";
      modal.style.right = "0";
      modal.style.bottom = "0";
      modal.style.border = "none";
      modal.style.background = "transparent";
      modal.style.boxShadow = "none";
      modal.style.position = "fixed";

      var modalBody = modal.querySelector('.modal-body');
    if (modalBody) {
      modalBody.style.maxHeight = "80vh"; // Adjust the value as needed
      modalBody.style.overflowY = "auto";
    }
  }


}


function createUniqueModal(billitem) {



var modal = `
<div class="modal fade" id="embeditbutton${billitem}" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabeledit${billitem}" data-modal-type="parent" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabeledit${billitem}">Edit Measurement</h5>
                  <button type="button" class="close" data-modal-type="parent"  onclick="embeditbuttonclosemain('${billitem}')" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetail${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                              <label for="itemNo" class="font-weight-bold pl-3">Item No:</label>
                              <div id="itemNo1${billitem}" class="pl-3"></div>
                          </div>
                      </div>

                  </div>
                  <div class="form-group">
                      <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
                      <div id="itemDesc1${billitem}" class="pl-3"></div>
                  </div>
                  <!-- Add the New button here -->
                  <button type="button" class="btn btn-primary btn-md ml-auto mr-2" data-toggle="modal"  onclick="newmeasurement('${billitem}')">New</button>
                  <div class="modal-body" id="normaldata${billitem}">
                      <div class="table-responsive">
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                  <th id="sr-no">Sr_No</th>
                                  <th id="particulars">Particulars</th>
                                  <th id="Number">Number</th>
                                  <th id="length">Length</th>
                                  <th id="breadth">Breadth</th>
                                  <th id="height">Height</th>
                                  <th id="formula">Formula</th>
                                  <th id="quantity">Quantity</th>
                                  <th id="date-of-measurement">Date of Measurement</th>
                                  <th id="not-for-payment">Not for Payment</th>
                                  <th id="action-column">Action</th>

                                  </tr>
                              </thead>
                              <tbody id="modal-table-body2${billitem}">
                                  <!-- Table rows will be populated using AJAX response -->
                              </tbody>
                          </table>
                      </div>

              <div class="row mt-4">
                  <div class="col-3 offset-md-8">
                      <div class="form-group" >
                          <label for="currentQty" class="font-weight-bold">Current Quantity:</label>
                          <input type="text" class="form-control" id="currentQty${billitem}" name="currentQty"  disabled>
                      </div>
                  </div>
              </div>

              <div class="row mt-4">
                  <div class="col-3 offset-md-8">
                      <div class="form-group" >
                          <label for="previousQty" class="font-weight-bold">Previous bill Quantity:</label>
                          <input type="text" class="form-control" id="previousQty${billitem}" name="previousQty"  disabled>
                      </div>
                  </div>
              </div>

                      <div class="row mt-3">
                          <div class="col-md-3 offset-md-2">
                              <div class="form-group">
                                  <label for="tndqty" class="font-weight-bold">Tender Quantity Of Item:</label>
                                  <input type="text" class="form-control" id="tndqty${billitem}" name="tndqty" disabled>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="percentage" class="font-weight-bold">Percentage Utilised:</label>
                                  <input type="text" class="form-control" id="percentage${billitem}" name="percentage" disabled>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="totalQty" class="font-weight-bold">Total Uptodate Quantity:</label>
                                  <input type="text" class="form-control" id="totalQty${billitem}" name="totalQty" disabled>
                              </div>
                          </div>
                      </div>
                      <div class="row mt-3">
                          <div class="col-md-3 offset-md-2">
                              <div class="form-group">
                                  <label for="tndcost" class="font-weight-bold">Tender Cost Of Item:</label>
                                  <input type="text" class="form-control" id="tndcost${billitem}" name="tndcost" disabled>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="costdifference" class="font-weight-bold">Excess/Saving:</label>
                                  <input type="text" class="form-control" id="costdifference${billitem}" name="costdifference" disabled>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="totalcost" class="font-weight-bold">Total Uptodate Amount:</label>
                                  <input type="text" class="form-control" id="totalcost${billitem}" name="totalcost" disabled>
                              </div>
                          </div>
                      </div>
                    </div>
                      <div class="modal-body" id="table-container4${billitem}">
                          <!-- Modal body content when data condition 2 is met -->
                          <!-- You can customize the content here -->
                      </div>
                      <div class="modal-footer3">
                          <!-- Removed the 'New' button -->
                          <button type="button" class="close-button btn btn-secondary" onclick="embeditbuttonclose('${billitem}')" data-close-modal="parentModal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- New modal for Excel upload and manual entry -->
<div class="modal fade" id="newmodal${billitem}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="newModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" style="max-width: 500px;" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="newModalLabel${billitem}">New Measurement</h5>
      <button type="button" class="close" data-dismiss="modal" data-close-id="${billitem}" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p><h5>Select how you want to add a new measurement:</h5></p>
      <button type="button" class="btn btn-primary" id="uploadExcelButton${billitem}" data-toggle="modal"  onclick="uploadExcel('${billitem}')">Upload Excel</button>
      <button type="button" class="btn btn-primary" data-toggle="modal"   onclick="manualEntry('${billitem}')">Manual Entry</button>
    </div>
  </div>
</div>
</div>


<!-- Excel upload data modal open -->
<div class="modal fade" id="uploadexcel${billitem}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="uploadModalLabel">Upload Excel File</h5>
      <button type="button" class="close"  data-close-id="${billitem}" data-modal-type="child" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <form id="uploadForm">
        <div class="form-group">
          <label for="excelFile">Select Excel File:</label>
          <input type="file" class="form-control-file" id="excelFile${billitem}" name="excelFile" accept=".xls, .xlsx">
        </div>
      </form>
    </div>
    <div class="modal-footer4">
    <button type="button" class="close-button btn btn-secondary" data-dismiss="modal" onclick="uploadexcelclose('${billitem}')">Close</button>
      <button type="button" class="btn btn-primary" onclick="submitUploadExcel('${billitem}')">Upload</button>
    </div>
  </div>
</div>
</div>


<!-- Manual entry form for the measurement -->
<style>

// .modal-dialog-custom {
//   max-width: 1300px;
//   display: flex;
// flex-direction: column;
// align-items: center;
// justify-content: flex-start;
// margin-top: 10vh; /* Adjust this value for the vertical positioning */
// }

/* Add this to your existing CSS or in a <style> tag in your HTML */
.enlarged-image-modal {
  display: none;
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.8);
}

.enlarged-image-content {
  display: block;
  margin: auto;
  max-width: 90%;
  max-height: 90%;
}

.close-enlarged-image {
  position: absolute;
  top: 15px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
  color: #f1f1f1;
  cursor: pointer;
}



</style>
<!-- Manual entry modal -->
<div class="modal fade" id="manualEntryModal${billitem}"  data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog  modal-fullscreen" id="modal-top" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="manualEntryModalLabel${billitem}">MB Form</h5>
      <button type="button" class="close" data-dismiss="modal" data-close-id="${billitem}" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetailNM${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
    <div class="form-group">
          <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
          <!-- Updated item description ID to 'itemDesc1' -->
       <div id="itemDescmb${billitem}" class="pl-3"></div>
    </div>
    <div class="modal-body">
      <!-- Add your manual entry form here -->
      <form id="manualEntryForm${billitem}">
      <div class="row">
          <div class="col-md-3 form-group">
            <label for="particulars" class="font-weight-bold">Particulars:</label>
            <input type="text" class="form-control" id="newparticulars${billitem}" name="Particulars">
          </div>
          <div class="col-md-2 form-group">
            <label for="number" class="font-weight-bold">Number:</label>
            <input type="text" class="form-control"  id="newnumber${billitem}"  oninput="newupdatequantity('${billitem}')" name="Number">
          </div>
          <div class="col-md-2 form-group">
            <label for="len" class="font-weight-bold">Length:</label>
            <input type="text" class="form-control"  id="newlength${billitem}"  oninput="newupdatequantity('${billitem}')" name="Length">
          </div>
          <div class="col-md-2 form-group">
            <label for="brea" class="font-weight-bold">Breadth:</label>
            <input type="text" class="form-control"  id="newbreadth${billitem}"  oninput="newupdatequantity('${billitem}')" name="Breadth">
          </div>
          <div class="col-md-2 form-group">
            <label for="hei" class="font-weight-bold">Height:</label>
            <input type="text" class="form-control"  id="newheight${billitem}"  oninput="newupdatequantity('${billitem}')" name="Height">
          </div>
          <div class="col-md-1 form-group">
            <label for="Quantity" class="font-weight-bold">Quantity:</label>
            <input type="text" class="form-control"  id="newquantity${billitem}"  oninput="newupdatequantity('${billitem}')" name="Quantity" disabled>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 form-group">
            <label for="formula" class="font-weight-bold">Formula:</label>
            <input type="text" class="form-control" data-id="${billitem}" id="newformula${billitem}" oninput="newupdatequantity('${billitem}')" name="Formula">
          </div>
        </div>

        <div class="row">
          <div class="col-md-2 form-group">
            <label for="dom" class="font-weight-bold">Date of Measurement:</label>
            <input type="date" class="form-control" id="newdom${billitem}" name="dom" data-provide="datepicker" data-date-format="yyyy-mm-dd">
          </div>
          <div class="col-md-2 form-group">
             <label class="font-weight-bold">Not for Payment:</label>
             <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="newnotforpaymentCheckbox${billitem}" name="newnotforpayment" value="1">
                  <label class="form-check-label" for="notforpaymentCheckbox">Not for Payment</label>
              </div>
          </div>
        </div>
</form>
    </div>
    <div class="modal-footer-manual">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="manualEntryModalclose('${billitem}')">close</button>
      <button type="button" class="btn btn-primary" onclick="submitManualEntry('${billitem}')">Submit</button>
    </div>
  </div>
</div>
</div>



<!-- New steel measurement by manually modal  -->
<div class="modal fade" id="manualnewtsteelmodal${billitem}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog  modal-fullscreen" id="modal-top" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="manualEntryModalLabel">MB STEEL Form</h5>
      <button type="button" class="close"  data-close-id="${billitem}" data-modal-type="child" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetailSM${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
    <div class="form-group">
          <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
          <!-- Updated item description ID to 'itemDesc1' -->
       <div id="itemDessteelnew${billitem}" class="pl-3"></div>
    </div>
    <div class="modal-body">
      <!-- Add your manual entry form here -->
      <form id="newsteelform">
      <div class="row">
      <div class="col-md-1">
          <div class="form-group">
              <label for="sr_no">Sr No</label>
              <input type="text" class="form-control" id="sr_nonew${billitem}" name="sr_nonew" value="" >
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="rcc_member">RCC Member</label>
              <select class="form-control form-select" name="rcc_membernew" id="rcc_membernew${billitem}">

              </select>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="member_particular">Member Particular</label>
              <input type="text" class="form-control" id="member_particularnew${billitem}" name="member_particularnew" value="" >
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
               <label for="no_of_members">No Of Members</label>
               <input type="text" class="form-control" id="no_of_membersnew${billitem}" name="no_of_membersnew" value="" >
          </div>
     </div>
  </div>
      <div class="row">
          <div class="col-md-1 form-group">
            <label for="barsrno" class="font-weight-bold">Sr No:</label>
            <input type="text" class="form-control" id="barsrnonew${billitem}" name="barsrnonew">
          </div>
          <div class="col-md-3 form-group">
            <label for="particulars" class="font-weight-bold">Bar-Particulars:</label>
            <input type="text" class="form-control" id="barParticularsnew${billitem}" name="barParticularsnew">
          </div>
          <div class="col-md-2 form-group">
            <label for="number" class="font-weight-bold">No Of Bars:</label>
            <input type="text" class="form-control" id="noofbarsnew${billitem}" name="noofbarsnew">
          </div>
          <div class="col-md-2 form-group">
              <label for="len" class="font-weight-bold ">Bar Length:</label>
               <select class="form-control form-select" id="lengthDropdownnew${billitem}">
                     <option value="ldiam6"> 6mm dia</option>
                     <option value="ldiam8"> 8mm dia</option>
                      <option value="ldiam10"> 10mm dia</option>
                      <option value="ldiam12"> 12mm dia</option>
                      <option value="ldiam16"> 16mm dia</option>
                      <option value="ldiam20"> 20mm dia</option>
                      <option value="ldiam25"> 25mm dia</option>
                      <option value="ldiam28"> 28mm dia</option>
                      <option value="ldiam32"> 32mm dia</option>
                      <option value="ldiam36"> 36mm dia</option>
                      <option value="ldiam40"> 40mm dia</option>
               </select>
          </div>
          <div class="col-md-2 form-group">
               <label for="brea" class="font-weight-bold">Length in dia:</label>
                <input type="text" class="form-control" id="selectedLengthnew${billitem}" name="selectedLengthnew">
          </div>
          <div class="col-md-2 form-group">
            <label for="Quantity" class="font-weight-bold">Total Bar Length:</label>
            <input type="text" class="form-control" id="barlengthnew${billitem}" name="barlengthnew" disabled>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2 form-group">
            <label for="dom" class="font-weight-bold">Date of Measurement:</label>
            <input type="date" class="form-control" id="steelmeasdatenew${billitem}" name="steelmeasdatenew" data-provide="datepicker" data-date-format="yyyy-mm-dd">
          </div>
        </div>

        <!-- Add this inside your modal or wherever you want to display the enlarged image -->
<div class="enlarged-image-modal">
  <span class="close-enlarged-image">&times;</span>
  <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>
</form>
    </div>
    <div class="modal-footer-manual">
    <button type="button" class="close-button btn btn-secondary" data-dismiss="modal" onclick="manualnewtsteelmodalclose('${billitem}')">Close</button>
      <button type="button" id="newsteeldata${billitem}" class="btn btn-primary" >Submit</button>
    </div>
  </div>
</div>
</div>

<!-- modal of edit rcc steel members -->
<div class="modal fade" id="editrccmbr${billitem}" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Edit Member</h4>
              <button type="button" class="close"  data-close-id="${billitem}" data-modal-type="child" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetaileditrcc${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
          <div class="modal-body">
              <div class="container" style="max-width: 2000px;">
                  <div class="row">
                      <div class="col-md-1">
                          <div class="form-group">
                              <label for="member_sr_no">Sr No</label>
                              <input type="text" class="form-control" id="editmember_sr_no${billitem}" name="editmember_sr_no">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="rc_mbr_id">RCC Member</label>
                              <select class="form-control form-select" id="editrccmember${billitem}" name="editrccmember">
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="member_particulars">Member Particular</label>
                              <input type="text" class="form-control" id="editmember_particulars${billitem}" name="editmember_particulars">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="no_of_members">No Of Members</label>
                              <input type="text" class="form-control" id="editno_of_members${billitem}" name="editno_of_members">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footereditmbr">
          <button type="button" class="close-button btn btn-secondary"  onclick="editrccmbrclose('${billitem}')">Close</button>
              <button type="button" class="btn btn-primary" id="saveChangesButton${billitem}">Save changes</button>
          </div>
      </div>

  </div>
</div>

<!-- edit steel measurement modal -->
<div class="modal" id="editsteelmodal${billitem}" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog  modal-fullscreen"  role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="manualEntryModalLabel">MB Form</h5>
      <button type="button" class="close"  data-close-id="${billitem}" data-modal-type="child" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
    <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetaileditsteel${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
    <div class="form-group">
          <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
          Updated item description ID to 'itemDesc1
       <div id="itemDessteel${billitem}" class="pl-3"></div>
    </div>
    <div class="modal-body">
      <!-- Add your manual entry form here -->
      <form id="editsteelform">
      <div class="row">
      <div class="col-md-1">
          <div class="form-group">
              <label for="sr_no">Sr No</label>
              <input type="text" class="form-control" id="sr_noedit${billitem}" name="sr_noedit" value="" disabled>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="rcc_member">RCC Member</label>
              <input type="text" class="form-control" id="rcc_memberedit${billitem}" name="rcc_memberedit" value="" disabled>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="member_particular">Member Particular</label>
              <input type="text" class="form-control" id="member_particularedit${billitem}" name="member_particularedit" value="" disabled>
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
               <label for="no_of_members">No Of Members</label>
               <input type="text" class="form-control" id="no_of_membersedit${billitem}" name="no_of_membersedit" value="" disabled>
          </div>
     </div>
  </div>
      <div class="row">
          <div class="col-md-1 form-group">
            <label for="barsrno" class="font-weight-bold">Sr No:</label>
            <input type="text" class="form-control" id="barsrno${billitem}" name="barsrno">
          </div>
          <div class="col-md-3 form-group">
            <label for="particulars" class="font-weight-bold">Bar-Particulars:</label>
            <input type="text" class="form-control" id="barParticulars${billitem}" name="barParticulars">
          </div>
          <div class="col-md-2 form-group">
            <label for="number" class="font-weight-bold">No Of Bars:</label>
            <input type="text" class="form-control" id="noofbars${billitem}" name="noofbars">
          </div>
          <div class="col-md-2 form-group">
              <label for="len" class="font-weight-bold ">Bar Length:</label>
               <select class="form-control form-select" id="lengthDropdown${billitem}">
                     <option value="ldiam6"> 6mm dia</option>
                     <option value="ldiam8"> 8mm dia</option>
                      <option value="ldiam10"> 10mm dia</option>
                      <option value="ldiam12"> 12mm dia</option>
                      <option value="ldiam16"> 16mm dia</option>
                      <option value="ldiam8"> 20mm dia</option>
                      <option value="ldiam20"> 25mm dia</option>
                      <option value="ldiam28"> 28mm dia</option>
                      <option value="ldiam32"> 32mm dia</option>
                      <option value="ldiam36"> 36mm dia</option>
                      <option value="ldiam40"> 40mm dia</option>
               </select>
          </div>
          <div class="col-md-2 form-group">
               <label for="brea" class="font-weight-bold">Length in dia:</label>
                <input type="text" class="form-control" id="selectedLength${billitem}" name="selectedLength">
          </div>
          <div class="col-md-2 form-group">
            <label for="Quantity" class="font-weight-bold">Total Bar Length:</label>
            <input type="text" class="form-control" id="barlength${billitem}" name="barlength" disabled>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2 form-group">
            <label for="dom" class="font-weight-bold">Date of Measurement:</label>
            <input type="date" class="form-control" id="steelmeasdate${billitem}" name="steelmeasdate" data-provide="datepicker" data-date-format="yyyy-mm-dd">
          </div>
        </div>
        <!-- Add this inside your modal or wherever you want to display the enlarged image -->
<div class="enlarged-image-modal">
  <span class="close-enlarged-image">&times;</span>
  <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>
</form>
    </div>
    <div class="modal-footer-manual">
    <button type="button" class="close-button btn btn-secondary" onclick="editsteelmodalclose('${billitem}')">Close</button>
      <button type="button" id="editsteel" data-bitemid="${billitem}" onclick="steelsubmit('${billitem}')" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
</div>



<!-- view emb modal -->
<!-- Modal pop up -->
<div class="modal" id="embview${billitem}" tabindex="-1" role="dialog"  data-backdrop="static" aria-labelledby="embview${billitem}" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">View Emb</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="row" id="workdetail">
                              <div class="col-md-12">
                                  <div id="workdetailview${billitem}">
                                  </div>
                                </div>
                            </div>
                          <br>
          <div class="row">
  <div class="col-md-2">
      <div class="form-group">
          <label for="itemNo" class="font-weight-bold pl-3">Item No:</label>
          <div id="itemNo${billitem}" class="pl-3"></div>
      </div>
  </div>

  <div class="col-md-6">

  </div>
</div>

          <div class="form-group">
                  <label for="itemDesc" class="font-weight-bold pl-3">Description of Item:</label>
                  <div id="itemDesc${billitem}" class="pl-3"></div>
              </div>


          <div class="modal-bodyview" id="normalview${billitem}">
              <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                          <th id="sr-no">Sr_No</th>
             <th id="particulars">Particulars</th>
             <th id="Number">Number</th>
             <th id="length">Length</th>
             <th id="breadth">Breadth</th>
             <th id="height">Height</th>
             <th id="formula">Formula</th>
             <th id="quantity">Quantity</th>
             <th id="date-of-measurement">Date of Measurement</th>
                          </tr>billitem
                      </thead>
                      <tbody id="modal-table-body${billitem}">
                          <tr>
                              <!-- Table rows -->
                          </tr>
                      </tbody>
                  </table>
              </div>
              <div class="row mt-4">
                  <div class="col-3 offset-md-9">
                      <div class="form-group" >
                          <label for="previousQty" class="font-weight-bold">Previous bill Quantity:</label>
                          <input type="text" class="form-control" id="viewpreviousQty${billitem}" name="previousQty"  disabled>
                      </div>
                  </div>
              </div>
              <div class="row mt-4">
                  <div class="col-3 offset-md-9">
                      <div class="form-group" >
                          <label for="currentQty" class="font-weight-bold">Current Quantity:</label>
                          <input type="text" class="form-control" id="viewcurrentQty${billitem}" name="currentQty"  disabled>
                      </div>
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-3 offset-md-3">
                      <div class "form-group">
                          <label for="tndqty" class="font-weight-bold">Tender Quantity Of Item:</label>
                          <input type="text" class="form-control" id="viewtndqty${billitem}" name="tndqty"  disabled>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="percentage" class="font-weight-bold">Percentage:</label>
                          <input type="text" class="form-control" id="viewpercentage${billitem}" name="percentage"  disabled>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="totalQty" class="font-weight-bold">Total Uptodate Quantity:</label>
                          <input type="text" class="form-control" id="viewtotalQty${billitem}" name="totalQty"  disabled>
                      </div>
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-3 offset-md-3">
                      <div class="form-group">
                          <label for="tndcost" class="font-weight-bold">Tende Cost Of Item:</label>
                          <input type="text" class="form-control" id="viewtndcost${billitem}" name="tndcost"  disabled>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="costdifference" class="font-weight-bold">Cost Difference:</label>
                          <input type="text" class="form-control" id="viewcostdifference${billitem}" name="costdifference"  disabled>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="totalcost" class="font-weight-bold">Total Cost of Item:</label>
                          <input type="text" class="form-control" id="viewtotalcost${billitem}" name="totalcost"  disabled>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-bodyview" id="table-containerview${billitem}">
              <!-- Modal body content when data condition 2 is met -->
              <!-- You can customize the content here -->
          </div>
          <div class="modal-footer1">
              <button type="button" class="close-button btn btn-secondary" data-dismiss="modal" data-close-modal="${billitem}">Close</button>
          </div>
      </div>
  </div>
</div>
</div>

`;

// Append the modal to the body
$('body').append(modal);
}




// Function to handle the modal and its content
function handleModal(currentMeasId) {
    // Your existing modal content creation logic
    let modalContent = `
    <div class="modal" id="myModalee100${currentMeasId}" data-backdrop="static" role="dialog" aria-labelledby="editModalLabel" >
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit EMB</h5>

      </div>
      <div class="row" id="workdetail">
                                <div class="col-md-12">
                                    <div id="workdetailEditmb${currentMeasId}">
                                    </div>
                                  </div>
                              </div>
                            <br>
      <div class="modal-body">
        <form id="editItemForm" class="row">
          @csrf
          <div class="row">
              <div class="col-lg-3 form-group">
                <label for="particulars" class="font-weight-bold">Particulars:</label>
                <input type="text" class="form-control" id="particulars${currentMeasId}" name="Particulars">
              </div>
              <div class="col-lg-1 form-group">
                <label for="number" class="font-weight-bold">Number:</label>
                <input type="number" class="form-control"  id="number${currentMeasId}" name="Number" oninput="updatequantity('${currentMeasId}')">
              </div>
              <div class="col-lg-2 form-group">
                <label for="len" class="font-weight-bold">Length:</label>
                <input type="number" class="form-control"  id="length${currentMeasId}" name="Length" oninput="updatequantity('${currentMeasId}')">
              </div>
              <div class="col-lg-2 form-group">
                <label for="brea" class="font-weight-bold">Breadth:</label>
                <input type="number" class="form-control" id="breadth${currentMeasId}" name="Breadth" oninput="updatequantity('${currentMeasId}')">
              </div>
              <div class="col-lg-2 form-group">
                <label for="hei" class="font-weight-bold">Height:</label>
                <input type="number" class="form-control"  id="height${currentMeasId}" name="Height" oninput="updatequantity('${currentMeasId}')">
              </div>
              <div class="col-lg-2 form-group">
                <label for="Quantity" class="font-weight-bold">Quantity:</label>
                <input type="text" class="form-control"  id="quantity${currentMeasId}" name="Quantity" oninput="updatequantity('${currentMeasId}')" disabled>
              </div>
           </div>


          <div class="row col-9">
              <div class="col-lg-7 form-group">
                <label for="formula" class="font-weight-bold">Formula:</label>
                <input type="text" class="form-control" id="formula${currentMeasId}" name="Formula" oninput="updatequantity('${currentMeasId}')">
              </div>
            </div>
            <div class="row col-6">
              <div class="col-lg-3 form-group">
                <label for="Dom" class="font-weight-bold">Date of Measurement:</label>
                <input type="date" class="form-control" id="dom${currentMeasId}" name="dom" data-provide="datepicker" data-date-format="yyyy-mm-dd">
              </div>
              <div class="col-lg-7 form-group">
                <label class="font-weight-bold">Not for Payment:</label>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="notforpaymentCheckbox${currentMeasId}" name="notforpayment" value="1">
                <label class="form-check-label" for="notforpaymentCheckbox">Not for Payment</label>
              </div>
            </div>
          <!-- Add this inside your modal or wherever you want to display the enlarged image -->
             <div class="enlarged-image-modal">
    <span class="close-enlarged-image">&times;</span>
    <img class="enlarged-image-content" src="" alt="Enlarged Image">
     </div>
     </div>
        </form>
      </div>
      <div class="modal-footereditemb">
      <button type="button" class="close-button btn btn-secondary" onclick="myModalee100close('${currentMeasId}')">Close</button>
        <button type="button" id="submitEditButton${currentMeasId}" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModalee100${currentMeasId}" onclick="embedit('${currentMeasId}')" title="EDIT NORMAL MEASUREMENT"> <i class="fa fa-pencil" style="color:white;"></i></button>
            <button type="button" class="btn btn-danger ms-2" onclick="embdelete('${currentMeasId}')" title="DELETE NORMAL MEASUREMENT"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </div>
    `;

    // Return the generated modal content
    return modalContent;
}

</script>


<!-- Given script for image and pdf file get and view in big size format emb button table modal -->

 <!-- jQuery and Bootstrap JS -->
 <!-- Lightbox2 JS -->
<!-- <script>
// JavaScript code
// JavaScript code
$(document).ready(function () {
    // Function to preview the selected image in an <img> tag
    function previewImage(input, imgElement) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(imgElement).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Function to show a larger image when clicked
function showLargeImage(imgSrc) {
    // Create a unique identifier for the image using a timestamp
    var timestamp = new Date().getTime();

    // Create a new lightbox anchor with the larger image
    var lightboxAnchor = $('<a>').attr('href', imgSrc).attr('data-lightbox', 'image-' + timestamp);

    // Create an image element inside the lightbox anchor
    var largeImage = $('<img>').attr('src', imgSrc).addClass('lightbox-image');

    // Append the image element to the lightbox anchor
    lightboxAnchor.append(largeImage);

    // Append the lightbox anchor to the body to trigger Lightbox2
    $('body').append(lightboxAnchor);

    // Open the Lightbox2 modal for the image
    lightboxAnchor.click();
}



    // Function to create a link to view the selected document
    function createDocumentLink(fileInput, linkElement) {
        if (fileInput.files && fileInput.files[0]) {
            var fileURL = URL.createObjectURL(fileInput.files[0]);
            $(linkElement).attr('href', fileURL).text('View Document').attr('target', '_blank');
        }
    }

    // Bind click event to the file input elements
    $('body').on('change', 'input[type="file"]', function () {
        var fileInput = $(this)[0];
        var parentCell = $(this).closest('td');

        if ($(this).attr('name').includes('photo')) {
            // For image inputs
            var imgElement = $('<img>').addClass('preview-image').css('max-height', '100px');

            // Remove any existing preview image
            parentCell.find('.preview-image').remove();

            // Show the preview of the image
            previewImage(fileInput, imgElement[0]);

            // Append the new preview image
            parentCell.append(imgElement);
        } else if ($(this).attr('name') === 'drg') {
            // For document input
            var documentLink = $('<a>').addClass('document-link').attr('href', '#').attr('target', '_blank').text('View Document');

            // Remove any existing document link
            parentCell.find('.document-link').remove();

            // Create the link to view the document
            createDocumentLink(fileInput, documentLink[0]);

            // Append the new document link
            parentCell.append(documentLink);
        }

        // Disable the file input after selection
        $(this).attr('disabled', true);
    });

    // Bind click event to the preview image to show a larger version
    $('body').on('click', 'img.preview-image', function () {
                var imgSrc = $(this).attr('src');
                showLargeImage(imgSrc);
            });


    // Bind click event to the "View Document" link to open the document
    $('body').on('click', 'a.document-link', function (event) {
        // Prevent the default behavior of the link to avoid navigating away from the page
        event.preventDefault();

        // Get the file input associated with this link
        var fileInput = $(this).siblings('input[type="file"]')[0];

        // Open the document using the object URL
        if (fileInput.files && fileInput.files[0]) {
            var fileURL = URL.createObjectURL(fileInput.files[0]);
            window.open(fileURL, '_blank');
        }
    });
});

</script> -->

<script>
function  addallmeasurement()
{
  var tbillid = $('#rabillid').val();
  const formData = new FormData();
  formData.append('_token', "{{ csrf_token() }}");
  formData.append('tbillid', tbillid);
  formData.append('excelFileInputallmeas', $('#excelFileInputallmeas')[0].files[0]);
  var csrfToken = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
    url:"{{ url('allmeasurements') }}",
    type:"POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(response) {
   console.log(response);

   Swal.fire({
        icon: 'success',
        title: 'All measurements added successfully!',
        showConfirmButton: true,
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            // If OK button is clicked, you can perform additional actions here
            // For example, redirecting to another page or reloading the current page
            // window.location.href = 'your_redirect_url';
            // location.reload(); // To reload the current page
            progressbar();
      var billdata=response.Alldata.billdata[0];
$('#rabmino').val(billdata.bill_amt || '');
    $('#netamt').val(billdata.net_amt || '');

    //update the bill item table

    var newbilitemData = response.billitemdata;


      // Check if the current bill is in 'is_current' flag
    //   var tbillid=response.lasttbillid;

    //  var tbillId = tbillid.t_bill_Id;



     var currentPage = getCurrentPageNumber();

// Call loadPaginatedData() with the current page number
 //loadPaginatedData(currentPage);
      closeModal();
      console.log(response.redirectUrl);
      window.location.href = response.redirectUrl;


    }
    });

    },


    error: function (xhr, status, error) {
      console.log("AJAX error:", xhr.responseText);
    }


  });

}

function closeModal() {
  $('#AllmeasexcelModal').modal('hide');
  $('.modal-backdrop').remove();
}
</script>

<!-- Edit emb button section 3 -->

<script>
  var globalBItemId;
function openeditbutton(bItemId) {
  var csrfToken = $('meta[name="csrf-token"]').attr('content');
  console.log("embeditbutton called with bItemId:", bItemId);

// Store the bitemid value in the global variable
globalBItemId = bItemId;





  // Fetch item_desc from the bil_item table using b_item_id
  $.ajax({
    url: "{{ url('editembbutton') }}",
    type: "POST",
    data: {
      _token: "{{ csrf_token() }}",
      b_item_id: bItemId
    },
    success: function (response) {
    // Extract data from the response

    var itemdata = response.itemdata[0];
    var itemdesc = itemdata.item_desc;
    var itemno = itemdata.t_item_no;
    var subno = itemdata.sub_no;
    var bitemid = itemdata.b_item_id;
    var measid = response.measid;
    var previousbillqty = response.previousexecqty;
    var currqty = response.curqty;
    var totalqty = response.execqty;
    console.log(measid);
    // Store the itemResponse array from the response
    var itemResponseArray = response.itemResponse || [];
console.log(itemResponseArray);


var workdetails=response.workdetail;

   $('#workdetail'+globalBItemId).html(workdetails || '');
    // Set the item_desc in the modal
    $('#itemDesc1'+globalBItemId).text(itemdesc || '');
    var concatenatedValue = (subno !== null) ? (itemno + subno) : itemno;

$('#subNo1' + globalBItemId).text(concatenatedValue);
$('#itemNo1' + globalBItemId).text(concatenatedValue);
    // Get the modal table body element
    var modalTableBody = $('#modal-table-body2'+globalBItemId);
    modalTableBody.empty();
console.log(itemResponseArray.length);
    if (itemResponseArray.length > 0) {

      // Loop through the itemResponseArray and populate the table rows
      for (var i = 0; i < itemResponseArray.length; i++) {
        var itemResponse = itemResponseArray[i];
        var currentMeasId = measid[i].meas_id; // Get the corresponding meas_id for this row



        var newRow = $('<tr>');
        // Populate newRow with data from itemResponse[i]
        newRow.append($('<td>').text(itemResponse.sr_no || ''));
        newRow.append($('<td>').text(itemResponse.parti || ''));
        newRow.append($('<td>').text(itemResponse.number || ''));
        newRow.append($('<td>').text(itemResponse.length || ''));
        newRow.append($('<td>').text(itemResponse.breadth || ''));
        newRow.append($('<td>').text(itemResponse.height || ''));
        newRow.append($('<td>').text(itemResponse.formula || ''));
        newRow.append($('<td>').text(itemResponse.qty || ''));
        newRow.append($('<td>').text(formatDate(itemResponse.measurment_dt) || ''));



          // Add a checkbox in the last column based on notforpayment value
   // Add a checkbox in the last column based on notforpayment value
  var notForPayment = itemResponse.notforpayment || 0;
  console.log(notForPayment);
  var checkbox = $('<input>').attr('type', 'checkbox').prop('disabled', true);

  // Enable and check the checkbox if notforpayment is 1
  if (notForPayment == 1) {
    checkbox.prop('disabled', true);
    checkbox.prop('checked', true);
  }

             $('#previousQty'+bItemId).val(previousbillqty.toFixed(3));
              $('#currentQty'+bItemId).val(currqty.toFixed(3));
             $('#totalQty'+bItemId).val(totalqty.toFixed(3));

             var previousbqty=response.previousexecqty;
  var currqty=response.curqty;
  var totalqty=response.execqty;


             $('#tndqty'+bItemId).val(response.tndqty.toFixed(3));
             $('#percentage'+bItemId).val(response.percentage.toFixed(2));
             $('#tndcost'+bItemId).val(response.tndcostitem);
             $('#costdifference'+bItemId).val(response.costdifference.toFixed(2));
             $('#totalcost'+bItemId).val(response.totlcostitem.toFixed(2));

  newRow.append($('<td>').append(checkbox));

        // Append input file elements for the last four cells
        // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'photo1').attr('accept', 'image/jpeg, image/jpg')));
        // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'photo2').attr('accept', 'image/jpeg, image/jpg')));
        // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'photo3').attr('accept', 'image/jpeg, image/jpg')));
        // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'drg').attr('accept', '.pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx')));

        // Create buttons and append them to the last column
        newRow.append($('<td>').html(handleModal(currentMeasId)));





        // Append the new row to the modal table body
        modalTableBody.append(newRow);






       // $('#table-container4'+bItemId).hide();
       //$("#normaldata"+bItemId).show();
      }


      console.log('ghhghghfhdjdfhgdj');
      $('#embeditbutton'+bItemId).show();
      $('#table-container4'+bItemId).hide();
      $("#normaldata"+bItemId).show();
    } else {
      //  html steel data
      // Clear the content of the modal table body
      // Display an empty structure in the modal
      // $('#itemDesc1').empty();
      // $('#subNo1').empty();
      // $('#itemNo1').empty();
      var htmldata=response.html;




      $('#embeditbutton'+bItemId).modal('show');
      console.log('afb');

      $('#table-container4'+bItemId).html(htmldata);
     $("#normaldata"+bItemId).hide();
      //$('#table-container4').show();


    }

console.log('k');
    // Show the modal

  },
    error: function (xhr, status, error) {
      console.log("AJAX error:", xhr.responseText);
    }
  });
}

  // Function to update Quantity field based on inputs
  function updatequantity(currentMeasId) {
    var number = parseFloat($('#number' + currentMeasId).val()) || 0;
    var length = parseFloat($('#length' + currentMeasId).val()) || 0;
    var breadth = parseFloat($('#breadth' + currentMeasId).val()) || 0;
    var height = parseFloat($('#height' + currentMeasId).val()) || 0;
    var formula = $('#formula' + currentMeasId).val();

    // Clear other fields if formula is filled
    if (formula !== '') {
      $('#number' + currentMeasId).val('');
      $('#length' + currentMeasId).val('');
      $('#breadth' + currentMeasId).val('');
      $('#height' + currentMeasId).val('');
    }

    var calculatedQuantity = 0;
    var isQuantityValid = true;

    if (formula) {
      try {
        // Calculate quantity based on formula
        calculatedQuantity = eval(formula);

        // Ensure calculatedQuantity is a numeric value
        if (isNaN(calculatedQuantity) || !isFinite(calculatedQuantity)) {
          isQuantityValid = false;
        }
      } catch (error) {
        console.error("Invalid formula:", error);
        isQuantityValid = false;
      }
    } else {
      if (number === 0 && length === 0 && breadth === 0 && height === 0) {
            calculatedQuantity = 0;
        } else {
            // Calculate quantity based on multiplication of values
            calculatedQuantity = (number === 0 ? 1 : number) *
                (length === 0 ? 1 : length) *
                (breadth === 0 ? 1 : breadth) *
                (height === 0 ? 1 : height);
        }

    // $('#number' + currentMeasId).val(number === 0 ? '0' : number);
    // $('#length' + currentMeasId).val(length === 0 ? '0' : length);
    // $('#breadth' + currentMeasId).val(breadth === 0 ? '0' : breadth);
    // $('#height' + currentMeasId).val(height === 0 ? '0' : height);



    }


    // Round calculatedQuantity to 3 decimal points (you can adjust the number of decimal points)
    calculatedQuantity = calculatedQuantity.toFixed(3);

    // Update Quantity input field and handle validation
    var quantityInput = $('#quantity' + currentMeasId);
    if (isQuantityValid) {
      quantityInput.val(calculatedQuantity);
      quantityInput.removeClass('is-invalid');
    } else {
      quantityInput.val('');
      quantityInput.addClass('is-invalid');
    }
  }



function newmeasurement(bitemid) {
  // You can now access the globalBItemId variable in any function
   // Open the modal
  //console.log("New button clicked with bItemId:", globalBItemId);
 //var bitemid= globalBItemId;
 $('#newmodal'+bitemid).modal('show'); // Open the modal

  // Additional code for the new measurement process
}

function uploadExcel(bitemid) {
   // Use globalBItemId to perform Excel upload for the specific item
  // Add your Excel upload logic here
  //console.log("Upload Excel for bItemId:", globalBItemId);
  $('#uploadexcel' + bitemid).modal('show');

  $('#newmodal'+bitemid).modal('hide'); // Close the modal
}

//submit the uploaded excel from user selected
function submitUploadExcel(bitemid) {
//var bitemid = globalBItemId;
console.log(bitemid)
  const formData = new FormData();
  formData.append('_token', "{{ csrf_token() }}");
  formData.append('bitem_id', bitemid);
  formData.append('excelFile', $('#excelFile'+bitemid)[0].files[0]);

  $.ajax({
    url: "{{ url('uploadexcel') }}",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(response) {
      console.log("Upload successful:", response);
      // Handle success here, e.g., show a success message
      // Get the modal table body element
       // Set the item_desc in the modal
       var itemdata = response.billitem;
console.log(itemdata);
//console.log(response.billdata);
var billdata=response.billdata[0];
$('#rabmino').val(billdata.bill_amt || '');
    $('#netamt').val(billdata.net_amt || '');


    //update the bill item table

    var newbilitemData = response.billitemdata;
      console.log(newbilitemData);

      // Check if the current bill is in 'is_current' flag
      var tbillid=response.lasttbillid;

       var tbillId = tbillid.t_bill_Id;

       var currentPage = $('.pagination .active').text();
// Call loadPaginatedData() with the current page number
 //loadPaginatedData(currentPage);

 var firstRow = itemdata[0]; // Access the first row object

 var itemdesc=firstRow.item_desc;
 var subno=firstRow.sub_no;
 var itemno=firstRow.t_item_no;

    $('#itemDesc1'+bitemid).text(itemdesc || '');
    var concatenatedValue = (subno !== null) ? (itemno + subno) : itemno;

$('#subNo1' + bitemid).text(concatenatedValue);
$('#itemNo1' + bitemid).text(concatenatedValue);
    var workdetails=response.workdetail;

     $('#workdetail'+bitemid).html(workdetails || '');




    var modalTableBody = $('#modal-table-body2'+bitemid);
    modalTableBody.empty();


    var data=response.measurements;
    console.log(data);

    var steeldata=response.returnstlData;
      console.log(steeldata);



    if (steeldata) {
      // Loop through the itemResponseArray and populate the table rows
      var htmldata=steeldata.html;
      // console.log(htmldata);
      // $('#itemNo1').empty();

      // Clear the content of the modal table body
      modalTableBody.empty();

      $('#embeditbutton'+bitemid).modal('show');
      $("#normaldata"+bitemid).hide();

      $('#table-container4'+bitemid).html(htmldata);


      progressbar();


    } else{
      // Display an empty structure in the modal
      // $('#itemDesc1').empty();
      // $('#subNo1').empty();
      for (var i = 0; i < data.length; i++) {
        var itemResponse = data[i];
       console.log(itemResponse);


        var newRow = $('<tr>');
        // Populate newRow with data from itemResponse[i]
        newRow.append($('<td>').text(itemResponse.sr_no || ''));
        newRow.append($('<td>').text(itemResponse.parti || ''));
        newRow.append($('<td>').text(itemResponse.number || ''));
        newRow.append($('<td>').text(itemResponse.length || ''));
        newRow.append($('<td>').text(itemResponse.breadth || ''));
        newRow.append($('<td>').text(itemResponse.height || ''));
        newRow.append($('<td>').text(itemResponse.formula || ''));
        newRow.append($('<td>').text(itemResponse.qty || ''));
        newRow.append($('<td>').text(formatDate(itemResponse.measurment_dt) || ''));


         // Add a checkbox in the last column based on notforpayment value
  var notForPayment = itemResponse.notforpayment || 0;
  var checkbox = $('<input>').attr('type', 'checkbox').prop('disabled', true);

  // Enable and check the checkbox if notforpayment is 1
  if (notForPayment == 1) {
    checkbox.prop('disabled', true);
    checkbox.prop('checked', true);
  }

  var previousbillqty = response.previousexecqty;
  var curqty = response.curqty;
  var exeqty= response.execqty;

  $('#previousQty'+bitemid).val(previousbillqty.toFixed(3));
              $('#currentQty'+bitemid).val(curqty.toFixed(3));
             $('#totalQty'+bitemid).val(exeqty.toFixed(3));


  newRow.append($('<td>').append(checkbox));
        // Append input file elements for the last four cells
        // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'photo1').attr('accept', 'image/jpeg, image/jpg')));
        // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'photo2').attr('accept', 'image/jpeg, image/jpg'))modal-dialog);
        // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'photo3').attr('accept', 'image/jpeg, image/jpg')));
        // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'drg').attr('accept', '.pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx')));

        // Create buttons and append them to the last column
        newRow.append($('<td>').html(handleModal(itemResponse.meas_id)));


        // Append the new row to the modal table body
        modalTableBody.append(newRow);

      }
      $('#embeditbutton'+bitemid).modal('show');
          //
          $('#tndqty'+bitemid).val(response.tndqty.toFixed(3));
             $('#percentage'+bitemid).val(response.percentage.toFixed(2));
             $('#tndcost'+bitemid).val(response.tndcostitem);

             $('#costdifference'+bitemid).val(response.costdifference.toFixed(2));
             $('#totalcost'+bitemid).val(response.totlcostitem.toFixed(2));

          $("#normaldata"+bitemid).show();
          $('#table-container4'+bitemid).hide();

          progressbar();

    }


     $('#uploadexcel'+bitemid).modal('hide');


    },
    error: function(xhr, status, error) {
      console.error("Upload failed:", error);
      // Handle error here, e.g., show an error message
    }
  });
}





//steel measurement delete and edit function

  document.addEventListener('DOMContentLoaded', function () {


    // Use event delegation to handle edit button clicks
    document.addEventListener("click", function (event) {
    const target = event.target;

    if (target.classList.contains("delete-button")) {
        // Check if the clicked element has the "delete-button" class
        const steelid = target.getAttribute("data-steelid");
        deleteRowsteel(steelid);
    } else if (target.classList.contains("edit-button")) {
        // Check if the clicked element has the "edit-button" class
        const steelid = target.getAttribute("data-steelid");
        console.log(steelid);
        editRowsteel(steelid);
    }
    else if (target.classList.contains("editrcmbr-button")) {
        // Check if the clicked element has the "edit-button" class
        const rcbillid = target.getAttribute("data-rcbillid");

        // Show a SweetAlert confirmation dialog for "Edit-Bill-Mbr"
        showEditBillMbrConfirmation(rcbillid);
    }
});


});


    // Function to edit a row using AJAX
    function editRowsteel(steelid) {
      // Make an AJAX GET request to a Laravel route to fetch the data for editing
      console.log("Edit button clicked with steelid: " + steelid);
      $.ajax({
        url: '/edit-steelmeas/' + steelid, // Replace with your actual Laravel route URL
        method: 'GET',
        dataType: 'json',
        success: function (response) {
          var bitemId=response.bitemid;
          if (response.steeldata) {
            // Handle the response data for editing (e.g., open a modal with the data)
               //console.log(response.steeldata);
              // Open the modal when the Edit button is clicked
            var itemdata=response.billitemdata[0];
           // console.log(itemdata);
             var itemdesc=itemdata.item_desc;
             //console.log(itemdesc);
           var billdata=response.tbilldata;

           $('#steelmeasdate'+bitemId).attr('min' , billdata.meas_dt_from);
           $('#steelmeasdate'+bitemId).attr('max' , billdata.meas_dt_upto);


             var billrcdata=response.billmbrdata[0];
            // console.log(billrcdata);
             var rcmember=billrcdata.rcc_member;
             $('#sr_noedit'+bitemId).val(billrcdata.member_sr_no);
              $('#rcc_memberedit'+bitemId).val(billrcdata.rcc_member);
             $('#member_particularedit'+bitemId).val(billrcdata.member_particulars);
              $('#no_of_membersedit'+bitemId).val(billrcdata.no_of_members);


              var bardata=response.steeldata[0];
              //  console.log(bardata);
              $('#barParticulars'+bitemId).val(bardata.bar_particulars);
              $('#noofbars'+bitemId).val(bardata.no_of_bars);
               var data=response.lengthdata[0];
             //console.log(keyValueArray);
             // Find the <select> element by its ID
var lengthDropdown = document.getElementById("lengthDropdown"+bitemId);

var selectedLengthInput = document.getElementById("selectedLength"+bitemId);
// Iterate through the options and select them if the value is not null
for (var optionValue in data) {
    if (data.hasOwnProperty(optionValue) && data[optionValue] !== null) {
        // Find the option element by its value attribute
        var option = lengthDropdown.querySelector('option[value="' + optionValue + '"]');
        if (option) {
            option.selected = true;
            var selectedLengthInput = document.getElementById("selectedLength"+bitemId);
            selectedLengthInput.value = data[optionValue]; // Update the input's value property
        }
    }

}
              $('#editsteelmodal'+bitemId).modal('show');
              var workdetails=response.workdetail;

         $('#workdetaileditsteel'+bitemId).html(workdetails || '');



            $('#barlength'+bitemId).val(bardata.bar_length);
            $('#steelmeasdate'+bitemId).val(bardata.date_meas);
            $('#barsrno'+bitemId).val(bardata.bar_sr_no);


//barlength multiplication when user edit
    // Assuming you have already obtained references to the input fields
    var noOfBarsInput = document.getElementById("noofbars"+bitemId);
var noOfMembersInput = document.getElementById("no_of_membersedit"+bitemId);
var selectedLengthInput = document.getElementById("selectedLength"+bitemId);
var barLengthInput = document.getElementById("barlength"+bitemId);

// Add event listeners to the input fields
noOfBarsInput.addEventListener("input", updateBarLength);
noOfMembersInput.addEventListener("input", updateBarLength);
selectedLengthInput.addEventListener("input", updateBarLength);

// Function to update the bar length
function updateBarLength() {
    // Get the values from the input fields and convert them to numbers
    var noOfBars = parseFloat(noOfBarsInput.value) || 0;
    var noOfMembers = parseFloat(noOfMembersInput.value) || 0;
    var selectedLength = parseFloat(selectedLengthInput.value) || 0;

    // Calculate the bar length by multiplying the values
    var barLength = noOfBars * noOfMembers * selectedLength;

    // Update the bar length input field with the calculated value
    barLengthInput.value = barLength.toFixed(3); // Displaying the result with two decimal places
}

// Initial calculation (if needed)
updateBarLength();


$('#itemDessteel'+bitemId).html(itemdesc);



           // console.log('Editing data:', response.steeldata);

          } else {
            // Handle the case where editing data is not available or failed
            alert('Failed to retrieve data for editing');
          }
        },
        error: function (xhr, status, error) {
          // Handle AJAX request errors here
          console.error(error);
        }
      });

    }










    // Function to delete a row using AJAX
    function deleteRowsteel(steelid) {
    // Get the CSRF token value from the meta tag
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Show a SweetAlert confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to delete this row. This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            // User confirmed the deletion, proceed with the AJAX request

            // Make an AJAX POST request to a Laravel route for deletion
            $.ajax({
                url: '/delete-steelmeas', // Replace with your actual Laravel route URL
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the request headers
                },
                data: {
                    steelid: steelid,
                },
                dataType: 'json',
                success: function (response) {




                  var billdata=response.billdata[0];
$('#rabmino').val(billdata.bill_amt || '');
    $('#netamt').val(billdata.net_amt || '');


    //update the bill item table

    var newbilitemData = response.billitemdata;

  var bitemid = response.bitemId;
      // Check if the current bill is in 'is_current' flag
      var tbillid = response.lasttbillid;

      var tbillId = tbillid.t_bill_Id;
       // Clear the existing table body content

       var itemdata=response.bitemdata[0];


       var currentPage = $('.pagination .active').text();
// Call loadPaginatedData() with the current page number
 //loadPaginatedData(currentPage);



      $('#itemDesc1'+bitemid).text(itemdata.item_desc || '');
      var concatenatedValue = (itemdata.sub_no !== null) ? (itemdata.t_item_no + itemdata.sub_no) : itemdata.t_item_no;

$('#subNo1' + bitemid).text(concatenatedValue);
$('#itemNo1' + bitemid).text(concatenatedValue);

    var workdetails=response.workdetail;

   $('#workdetail'+bitemid).html(workdetails || '');

      $('#embeditbutton'+bitemid).modal('show');
      $("#normaldata"+bitemid).hide();





                  console.log(response);
                  if (response || (typeof response === 'string' && response === "")) {
                        // Row was successfully deleted, you can update your UI accordingly
                        // For example, remove the deleted row from the table
                        var htmldata=response.html;
                        $('#table-container4'+bitemid).html(htmldata);

                        $(`tr[data-steelid="${steelid}"]`).remove();

                        // Show a success SweetAlert message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Row deleted successfully',
                        });
                    } else {
                        // Handle the case where the deletion was not successful
                        // Show an error SweetAlert message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to delete row',
                        });
                    }

                    progressbar();

                },
                error: function (xhr, status, error) {
                    // Handle AJAX request errors here
                    console.error(error);

                    // Show an error SweetAlert message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your request',
                    });
                },
            });
        }
    });
}



/// rc Bill member  edit ajax

function showEditBillMbrConfirmation(rcmbrid) {
    // Make an AJAX GET request to a Laravel route to fetch edit data for the bill member
    console.log(rcmbrid);
    $.ajax({
        url: '/edit-bill-member/' + rcmbrid, // Replace with your actual Laravel route URL
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            // Handle the response data for editing
            // You can open a modal or perform other editing actions here
            console.log("Edit data:", data);


            var billrcdata=data.billmember;
            var rccmemberList=data.rccmember;
            var bitemid=data.bitemid;
            // Populate the dropdown with rccmember options
            var rccDropdown = $('#editrccmember'+bitemid);
            rccDropdown.empty(); // Clear previous options

            $.each(rccmemberList, function(index, rccmember) {
                rccDropdown.append($('<option>', {
                    value: rccmember.rcc_memb,
                    text: rccmember.rcc_memb,
                }));
            });

            // Set the selected value based on billrcdata.rcc_member
            rccDropdown.val($.trim(billrcdata.rcc_member));

            // Optionally, open a modal for editing with the retrieved data
            $('#editmember_sr_no'+bitemid).val(billrcdata.member_sr_no);   // Assuming the response has a 'length' property
       // $('#editrccmember').val(billrcdata.rcc_member); // Assuming the response has a 'breadth' property
        $('#editmember_particulars'+bitemid).val(billrcdata.member_particulars);
        $('#editno_of_members'+bitemid).val(billrcdata.no_of_members);   // Assuming the response has a 'length' property


        // Listen for changes in the rccmember dropdown
        rccDropdown.on('change', function() {
                // Update the sr_no when the rccmember dropdown changes
                var selectedRccMember = $(this).val();
                var correspondingSrNo = findSrNoByRccMember(data.rccmember, selectedRccMember);
                $('#editmember_sr_no'+bitemid).val(correspondingSrNo);
            });

            $('#editrccmbr'+bitemid).modal('show');
            var workdetails=data.workdetail;

   $('#workdetaileditrcc'+bitemid).html(workdetails || '');



            // Add a click event handler for the "Save changes" button
    $('#saveChangesButton'+bitemid).on('click', function () {
        // Collect the updated data from the modal inputs
        var editedData = {
            rcc_member: $('#editrccmember'+bitemid).val(),
            member_sr_no: $('#editmember_sr_no'+bitemid).val(),
            member_particulars: $('#editmember_particulars'+bitemid).val(),
            no_of_members: $('#editno_of_members'+bitemid).val()
        };

        // Call the saveEditedMember function to save the changes
        saveEditedMember(rcmbrid, editedData);
    });

        },
        error: function (xhr, status, error) {
            // Handle AJAX request errors here
            console.error(error);
        }
    });
}


// Helper function to find sr_no by rcc_member in the bill data
function findSrNoByRccMember(billData, rccMember) {
 //
  //console.log(billData);
    for (var i = 0; i < billData.length; i++) {
        if (billData[i].rcc_memb === rccMember) {
            return billData[i].rcc_mbr_id;
        }
    }
    return ''; // Return an empty string if no match is found
}



//submit the edit bill rcc members
function saveEditedMember(rcmbrid, editedData) {
  var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/save-edited-member/' + rcmbrid, // Replace with your actual Laravel route URL
        method: 'POST',
        dataType: 'json',
        data: editedData,
        headers: {
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
        },
        success: function (response) {


          var billdata=response.billdata[0];
$('#rabmino').val(billdata.bill_amt || '');
    $('#netamt').val(billdata.net_amt || '');

    var bilitemdata=response.itemdata[0];

    //update the bill item table
   var bitemid=response.bitemId;
   console.log(bitemid);
    var newbilitemData = response.billitemdata;


      // Check if the current bill is in 'is_current' flag
      var tbillid = response.lasttbillid;

        var tbillId = tbillid.t_bill_Id;
         // Clear the existing table body content



//loadPaginatedData();



          console.log(response);

          var htmldata=response.html;

      // console.log(htmldata);
      // $('#itemNo1').empty();

      console.log(bitemid);
      // Clear the content of the modal table body
      $('#itemDesc1'+bitemid).text(bilitemdata.item_desc || '');
      var concatenatedValue = (bilitemdata.sub_no !== null) ? (bilitemdata.t_item_no + bilitemdata.sub_no) : bilitemdata.t_item_no;

$('#subNo1' + bitemid).text(concatenatedValue);
$('#itemNo1' + bitemid).text(concatenatedValue);


    var workdetails=response.workdetail;

     $('#workdetail'+bitemid).html(workdetails || '');



    $('#embeditbutton'+bitemid).modal('show');
    $("#normaldata"+bitemid).hide();
    $('#table-container4'+bitemid).html(htmldata);



  //
            // Handle the success response (e.g., close the modal)
            $('#editrccmbr'+bitemid).modal('hide');
            // Optionally, you can perform additional actions like updating the UI
            progressbar();


        },
        error: function (xhr, status, error) {
            // Handle AJAX request errors here
            console.error(error);
        }
    });
}
//empty inputs for excel selection
$(document).ready(function() {
    var selectedFile = null; // To store the selected file

    // Store the selected file when the input changes
    $('#excelFile').on('change', function(event) {
        selectedFile = event.target.files[0];
    });

    $('#uploadModal').on('hide.bs.modal', function() {
        // Clear the file input value
        $('#excelFile').val('');
    });

    $('#uploadModal').on('shown.bs.modal', function() {
        // Set the selected file back to the file input
        if (selectedFile) {
            $('#excelFile')[0].files[0] = selectedFile;
        }
    });
});


//manual entry for measurements
function manualEntry(bitemId) {
    // Fetch CSRF token from meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');




    // Use globalBItemId to manually enter data for the specific item
    // Add your manual entry logic here
    console.log("Manual Entry for bItemId:", globalBItemId);
  var bitemid=globalBItemId;
    // Fetch item description using AJAX
    $.ajax({
        url: "{{ url('fetchItemDescription') }}", // Replace with your server endpoint
        type: 'POST',
        data: {
            bItemId: globalBItemId
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            // Update the item description in the modal
            var itemdata = response.bitemdata;
            console.log(itemdata);
            var billdata=response.tbilldata;
            console.log(billdata);
            var itemdesc=response.itemDescription;
            console.log(itemdesc);
            var itemid=response.itemid;
            var rccbillmember=response.rccbillmember;
            var workdetails=response.workdetail;
            if(itemid)
            {

              $('#steelmeasdatenew'+globalBItemId).attr('min' , billdata.meas_dt_from);
        $('#steelmeasdatenew'+globalBItemId).attr('max' , billdata.meas_dt_upto);


               // Define and use calculateTotalBarLength here
        function calculateTotalBarLength(bitemid) {
            console.log('Calculating total bar length for bitemid: ' + bitemid);

            var noOfMembers = parseFloat($("#no_of_membersnew" + bitemid).val()) || 0;
            var noOfBars = parseFloat($("#noofbarsnew" + bitemid).val()) || 0;
            var lengthInDia = parseFloat($("#selectedLengthnew" + bitemid).val()) || 0;

            var totalBarLength = noOfMembers * noOfBars * lengthInDia;

            // Update the "Total Bar Length" input field
            console.log('Total Bar Length: ' + totalBarLength);
            $("#barlengthnew" + bitemid).val(totalBarLength);
        }

        // Initialize the calculation when the page loads
        calculateTotalBarLength(globalBItemId);

        // Listen for changes in the relevant input fields
        $('#no_of_membersnew' + globalBItemId).on("input", function () {
            calculateTotalBarLength(globalBItemId);
        });
        $('#noofbarsnew' + globalBItemId).on("input", function () {
            calculateTotalBarLength(globalBItemId);
        });
        $('#selectedLengthnew' + globalBItemId).on("input", function () {
            calculateTotalBarLength(globalBItemId);
        });
              var rccmember=rccbillmember.rcc_memb;
              var srNo = rccbillmember.rcc_mbr_id;

               // Populate the dropdown with rccmember options
            var rccDropdown = $('#rcc_membernew'+globalBItemId);
            rccDropdown.empty(); // Clear previous options

            $.each(rccbillmember, function(index, rccmember) {
                rccDropdown.append($('<option>', {
                    value: rccmember.rcc_memb,
                    text: rccmember.rcc_memb,
                }));
            });

          // Set the initial value of sr_no to 1 when the page loads
           $('#sr_nonew'+globalBItemId).val(1);

            // Listen for changes in the rccmember dropdown
        rccDropdown.on('change', function() {
                // Update the sr_no when the rccmember dropdown changes
                var selectedRccMember = $(this).val();
                var correspondingSrNo = findSrNoRccMember(rccbillmember, selectedRccMember);
                $('#sr_nonew'+globalBItemId).val(correspondingSrNo);
            });
              //console.log(rccbillmember);
              // Populate RCC Member dropdown and Sr No input field

              //$('#newmodal'+btemid).modal('hide');
              $('#itemDessteelnew'+globalBItemId).html(itemdesc);
              $('#manualnewtsteelmodal'+globalBItemId).modal('show');


          $('#workdetailSM'+globalBItemId).html(workdetails || '');
          //console.log(workdetails);
              calculateTotalBarLength(globalBItemId);

               // Define a click event handler for the "Submit" button
        $('#newsteeldata'+globalBItemId).on('click', function() {
            // Call your custom function and pass the required data
           // You mentioned passing b-temid
            submitnewsteel(globalBItemId);

        });


               // Call the updateSrNo function with selectedRccMember and srNo

            }
            else
            {
            console.log(itemdesc);
            $('#itemDescmb'+globalBItemId).html(itemdesc);

            // Close the previous modal and open the mb form modal

            $('#manualEntryModal'+globalBItemId).modal('show');


     //console.log(workdetails);
   $('#workdetailNM'+globalBItemId).html(workdetails || '');
   $('#newdom'+globalBItemId).attr('min' , billdata.meas_dt_from);
        $('#newdom'+globalBItemId).attr('max' , billdata.meas_dt_upto);


            }
            $('#newmodal'+globalBItemId).modal('hide');
        },
        error: function(xhr, status, error) {
            console.log("AJAX error:", xhr.responseText);
        }
    });
}

//manual new steel data submit ajax
// Define your custom function that takes btemid as a parameter
function submitnewsteel(btemid) {
  // Collect data from the form fields
  var sr_no = $('#sr_nonew'+btemid).val();
    var rcc_member = $('#rcc_membernew'+btemid).val();
    var member_particular = $('#member_particularnew'+btemid).val();
    var no_of_members = $('#no_of_membersnew'+btemid).val();
    var barsrno = $('#barsrnonew'+btemid).val();
    //console.log(barsrno);
    var barParticulars = $('#barParticularsnew'+btemid).val();
    var noofbars = $('#noofbarsnew'+btemid).val();
    var lengthDropdown = $('#lengthDropdownnew'+btemid).val();
    var selectedLength = $('#selectedLengthnew'+btemid).val();
    var barlength = $('#barlengthnew'+btemid).val();
    var steelmeasdate = $('#steelmeasdatenew'+btemid).val();

    // Create a data object with the collected form data
    var formData = {
        btemid: btemid,
        sr_no: sr_no,
        rcc_member: rcc_member,
        member_particular: member_particular,
        no_of_members: no_of_members,
        barsrno: barsrno,
        barParticulars: barParticulars,
        noofbars: noofbars,
        lengthDropdown: lengthDropdown,
        selectedLength: selectedLength,
        barlength: barlength,
        steelmeasdate: steelmeasdate
    };


  var csrfToken = $('meta[name="csrf-token"]').attr('content');
    // Do something with btemid, for example, make another AJAX call
    $.ajax({
        url: "{{ url('manualsteelnew') }}", // Replace with your server endpoint
        type: 'GET',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {


          var billdata=response.billdata[0];
$('#rabmino').val(billdata.bill_amt || '');
    $('#netamt').val(billdata.net_amt || '');


    var bilitemdata=response.itemdata[0];
console.log(bilitemdata);


    //update the bill item table

    var newbilitemData = response.billitemdata;


      // Check if the current bill is in 'is_current' flag
      var tbillid = response.lasttbillid;

        var tbillId = tbillid.t_bill_Id;
         // Clear the existing table body content




         var currentPage = $('.pagination .active').text();
// Call loadPaginatedData() with the current page number
 //loadPaginatedData(currentPage);

            // Check if the response indicates success
            //console.log(response);
            var htmldata=response.html;
            console.log(htmldata);
            $('#itemDesc1'+btemid).text(bilitemdata.item_desc || '');

            var concatenatedValue = (bilitemdata.sub_no !== null) ? (bilitemdata.t_item_no + bilitemdata.sub_no) : bilitemdata.t_item_no;

$('#subNo1' + btemid).text(concatenatedValue);
$('#itemNo1' + btemid).text(concatenatedValue);


    var workdetails=response.workdetail;

     $('#workdetail'+btemid).html(workdetails || '');


    $('#embeditbutton'+btemid).modal('show');
    $("#normaldata"+btemid).hide();
    $('#table-container4'+btemid).html(htmldata);

    //         $('#embeditbutton'+btemid).modal('show');
    //         $('#itemDesc1'+btemid).text(bilitemdata.item_desc || '');
    // $('#subNo1'+btemid).text(bilitemdata.sub_no);
    // $('#itemNo1'+btemid).text(bilitemdata.t_item_no);
    //         $('#table-container4'+btemid).html(htmldata);

      $('#manualnewtsteelmodal'+btemid).modal('hide');


            // $("#normaldata"+btemid).hide();
         //console.log(htmldata);
      // console.log(htmldata);
      // $('#itemNo1').empty();

      // Clear the content of the modal table body




            if (response.stldata) {
                // Display a SweetAlert success message

                Swal.fire({
                    title: 'Success',
                    text: 'Data inserted successfully!',
                    icon: 'success',
                });
            } else {
                // Handle other response conditions if needed
                Swal.fire({
                    title: 'Error',
                    text: 'Data insertion failed!',
                    icon: 'error',
                });
            }

            progressbar();

        },
        error: function(error) {
            // Handle errors
        }
    });
}


// Helper function to find sr_no by rcc_member in the bill data
function findSrNoRccMember(billData, rccMember) {
    for (var i = 0; i < billData.length; i++) {
        if (billData[i].rcc_memb === rccMember) {
            // Check if rcc_mbr_id is present; if not, set srno to 1
            if (billData[i].rcc_mbr_id === undefined) {
                billData[i].rcc_mbr_id = 1;
            }
            return billData[i].rcc_mbr_id;
        }
    }
    return ''; // Return an empty string if no match is found
  }

//submit thw new measurement data in emb table
function submitManualEntry(bitemid) {
  var csrfToken = $('meta[name="csrf-token"]').attr('content');


 console.log(bitemid);
 // Gather form data
 var formData = new FormData();
  formData.append('Particulars', $('#newparticulars'+bitemid).val());
  formData.append('Number', $('#newnumber'+bitemid).val());
  formData.append('Length', $('#newlength'+bitemid).val());
  formData.append('Breadth', $('#newbreadth'+bitemid).val());
  formData.append('Height', $('#newheight'+bitemid).val());
  formData.append('Quantity', $('#newquantity'+bitemid).val());
  formData.append('Formula', $('#newformula'+bitemid).val());
  formData.append('dom', $('#newdom'+bitemid).val());

  // Append the "notforpayment" checkbox value (1 if checked, 0 if not checked)
var newnotforpaymentValue = $('#newnotforpaymentCheckbox'+bitemid).is(':checked') ? 1 : 0;
formData.append('newnotforpayment', newnotforpaymentValue);

  // Append uploaded files


  // Append Bitemid to the formData
formData.append('Bitemid', bitemid);

  // Perform AJAX POST request
  $.ajax({
    url: "{{ url('submitmb') }}", // Replace with your server endpoint
    type: 'POST',
    data: formData,

    headers: {
      'X-CSRF-TOKEN': csrfToken
    },
    processData: false,
    contentType: false,
    success: function (response) {


      // Handle success response here
      console.log(response);
       var itemdata=response.bitemdata[0];
       console.log(itemdata);

      var billdata=response.billdata[0];
$('#rabmino').val(billdata.bill_amt || '');
    $('#netamt').val(billdata.net_amt || '');


    //update the bill item table

    var newbilitemData = response.billitemdata;
   // Check if the current bill is in 'is_current' flag
   var tbillid = response.lasttbillid;

   var tbillId = tbillid.t_bill_id;
      // Clear the existing table body content



      var currentPage = $('.pagination .active').text();
// Call loadPaginatedData() with the current page number
 ///loadPaginatedData(currentPage);


       $('#manualEntryModal'+bitemid).modal('hide');
  // Clear the input fields using form reset
    // Clear text input fields
    $('#newparticulars'+bitemid).val('');
$('#newnumber'+bitemid).val('');
$('#newlength'+bitemid).val('');
$('#newbreadth'+bitemid).val('');
$('#newheight'+bitemid).val('');
$('#newquantity'+bitemid).val('');
$('#newformula'+bitemid).val('');
$('#newdom'+bitemid).val('');








      var embdata=response.embdata;
      //console.log(embdata);
      var measid=response.newmeasid;

      var previousqty=response.previousexecqty;
      console.log(previousqty);
   var curqty=response.curqty;
   var totalqt=response.execqty;


     // console.log(embdata);
      // Close the modal
       // Set the item_desc in the modal
      //  $('#itemDesc1').text(itemdesc || '');
      //   $('#subNo1').text(subno);
      //   $('#itemNo1').text(itemno);
        // Get the table body element
        // Clear existing table rows
        // Add a checkbox in the last column based on notforpayment value

var modalTableBody = $('#modal-table-body2'+bitemid);
modalTableBody.empty();

// Iterate through each row of data in embdata
for (var i = 0; i < embdata.length; i++) {
  var itemResponse = embdata[i];
console.log(itemResponse);
  // Create a new table row and append it to the table body
  var newRow = $('<tr>');
  newRow.append($('<td>').text(itemResponse.sr_no || ''));
  newRow.append($('<td>').text(itemResponse.parti || ''));
  newRow.append($('<td>').text(itemResponse.number || ''));
  newRow.append($('<td>').text(itemResponse.length || ''));
  newRow.append($('<td>').text(itemResponse.breadth || ''));
  newRow.append($('<td>').text(itemResponse.height || ''));
  newRow.append($('<td>').text(itemResponse.formula || ''));
  newRow.append($('<td>').text(itemResponse.qty || ''));
  newRow.append($('<td>').text(formatDate(itemResponse.measurment_dt) || ''));

  var NotForPayment = itemResponse.notforpayment || 0;

  console.log(NotForPayment);
  var checkbox = $('<input>').attr('type', 'checkbox').prop('disabled', true);

  // Enable and check the checkbox if notforpayment is 1
  if (NotForPayment == 1) {
    checkbox.prop('disabled', true);
    checkbox.prop('checked', true);
  }
  newRow.append($('<td>').append(checkbox));

  // Append input file elements for the last four cells
  // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'photo1').attr('accept', 'image/jpeg, image/jpg')));
  // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'photo2').attr('accept', 'image/jpeg, image/jpg')));
  // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'photo3').attr('accept', 'image/jpeg, image/jpg')));

  // newRow.append($('<td>').append($('<input>').attr('type', 'file').attr('name', 'drg').attr('accept', '.pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx')));
  newRow.append($('<td>').html(handleModal(measid)));

  // Append the new row to the table body
  modalTableBody.append(newRow);



}


// Show the 'embeditbutton' modal that contains the table
$('#newmodal'+bitemid).modal('hide');

$('#itemDesc1'+bitemid).text(itemdata.item_desc || '');

var concatenatedValue = (itemdata.sub_no !== '') ? (itemdata.t_item_no + itemdata.sub_no) : itemdata.t_item_no;

$('#subNo1' + bitemid).text(concatenatedValue);
$('#itemNo1' + bitemid).text(concatenatedValue);


    var workdetails=response.workdetail;

   $('#workdetail'+bitemid).html(workdetails || '');

$('#embeditbutton'+bitemid).modal('show');
$("#normaldata"+bitemid).show();
var previousbqty=response.previousexecqty;
  var currqty=response.curqty;
  var totalqty=response.execqty;

  $('#previousQty'+bitemid).val(previousqty.toFixed(3));
              $('#currentQty'+bitemid).val(curqty.toFixed(3));
             $('#totalQty'+bitemid).val(totalqt.toFixed(3));

  //console.log(response.tndcostitem);
             $('#tndqty'+bitemid).val(response.tndqty.toFixed(3));
             $('#percentage'+bitemid).val(response.percentage.toFixed(2));
             $('#tndcost'+bitemid).val(response.tndcostitem);

             $('#costdifference'+bitemid).val(response.costdifference.toFixed(2));
             $('#totalcost'+bitemid).val(response.totlcostitem.toFixed(2));

             progressbar();



    },
    error: function (xhr, status, error) {
      // Handle error response here
      console.log("AJAX error:", xhr.responseText);
    }
  });
}






// function submitEditForm() {
//   var formData = $('#editForm').serialize();

//   $.ajax({
//     url: "update_emb_data", // Replace with the actual URL to update the item data
//     type: 'POST',
//     dataType: 'JSON',
//     data: formData,
//     success: function (data) {
//       // Handle the server's response here if needed
//       console.log("Form submitted successfully:", data);
//       // Close the modal after successful submission (if desired)
//       $('#editModal').modal('hide');
//     },
//     error: function (xhr, status, error) {
//       console.log("AJAX error:", xhr.responseText);
//     }
//   });
// }

</script>


<!-- for delete bill-items delete function delete button -->

<!-- MB edit button function inside emb edit button -->
<script>

function convertToUrl(urlString) {
  try {
    // Check if the URL starts with "http://" or "https://"
    if (!urlString.startsWith("http://") && !urlString.startsWith("https://")) {
      // Assuming your domain is example.com, modify this accordingly
      urlString = "https://" + urlString;
      console.log(urlString);
    }

    // Attempt to create a valid URL object
    var url = new URL(urlString);

    // If the creation succeeds, return the valid URL
    return url.toString();
  } catch (error) {
    // If there's an error, log it and return the original string
    console.error("Invalid URL:", urlString);
    return urlString;
  }
}


// // Function to handle the "Edit" action
function embedit(measid) {
  //$('#editembModal').modal('show');

 // Perform any additional logic or fetch data related to the item being edited here, if needed
 var measid = measid
 console.log("measid:", measid);
  // Fetch item data based on itemId using AJAX

   // Set the data-measid attribute for delete icons
   $(".delete-image").data("measid", measid);


  $.ajax({
    url: "{{ url('fetch_mb_data') }}", // Replace with your server-side URL to fetch item data based on itemId
    type: "POST",
    data: {
      _token: "{{ csrf_token() }}",
      meas_id: measid
    },
    success: function (response) {
      console.log("Photo 1 URL:", response.photo1Urls[0]);
        console.log("Photo 2 URL:", response.photo2Urls[0]);
        console.log("Photo 3 URL:", response.photo3Urls[0]);
        console.log("Document URL:", response.docUrls[0]);

      if (response) {
        var emb = response.embdata[0];
        var tbilldata = response.tbilldata;
        console.log(tbilldata);
        var photo1url= response.photo1Urls[0];
        var photo2url= response.photo2Urls[0];
        var photo3url= response.photo3Urls[0];
        var docurl = response.docUrls[0];
        console.log(response);
        //console.log(path1);
        // Convert length, breadth, and height to numeric values
        //var measId = emb.meas_id; // Get the value of emb.meas_id
        console.log("Photo 1 URL:", photo1url);
        console.log("Photo 2 URL:", photo2url);
        console.log("Photo 3 URL:", photo3url);
        console.log("Document URL:", docurl);


              // Store the measId variable for later use if needed
    console.log("meas_id:", measid);


        console.log(emb);

        // Set the item_desc in the edit form
          // Set the item_desc in the edit form
          $('#length' + measid).val(emb.length);   // Assuming the response has a 'length' property
        $('#breadth' + measid).val(emb.breadth); // Assuming the response has a 'breadth' property
        $('#height' + measid).val(emb.height);
        $('#formula' + measid).val(emb.formula);   // Assuming the response has a 'length' property
        $('#particulars' + measid).val(emb.parti); // Assuming the response has a 'breadth' property
        $('#number' + measid).val(emb.number);
        $('#quantity' + measid).val(emb.qty);
        $('#dom' + measid).val(emb.measurment_dt);
        $('#dom' + measid).attr('min' , tbilldata.meas_dt_from);
        $('#dom' + measid).attr('max' , tbilldata.meas_dt_upto);

        var notForPaymentValue = emb.notforpayment;

// Check the checkbox if notForPaymentValue is 1, uncheck it if it's 0
if (notForPaymentValue === 1) {
  $('#notforpaymentCheckbox'+measid).prop('checked', true);
} else {
  $('#notforpaymentCheckbox'+measid).prop('checked', false);
}


var workdetails=response.workdetail;

     $('#workdetailEditmb'+measid).html(workdetails || '');



        // Show the 'embeditbutton' modal that contains the edit form

         // Set the onclick event for the submit button
    $('#submitEditButton'+measid).on('click', function() {
      submitEditForm(measid);
      console.log(measid);
    });
      } else {
        console.log("Failed to retrieve item data for editing.");
      }
    },
    error: function (xhr, status, error) {
      console.log("AJAX error:", xhr.responseText);
    }
  });
}


// update the emb data edited

function submitEditForm(meas_Id) {
  // Retrieve the edited data from the form fields
  var csrfToken = $('meta[name="csrf-token"]').attr('content');
  var measid = meas_Id;
  var formData = new FormData(); // Create a FormData object to store files



// Append non-file data directly to formData
formData.append('length', $('#length'+measid).val());
formData.append('breadth', $('#breadth'+measid).val());
formData.append('height', $('#height'+measid).val());
formData.append('formula', $('#formula'+measid).val());
formData.append('particulars', $('#particulars'+measid).val());
formData.append('number', $('#number'+measid).val());
formData.append('quantity', $('#quantity'+measid).val());
formData.append('dom', $('#dom'+measid).val());
formData.append('meas_id', measid); // Assuming 'measId' is the variable containing the meas_id from embedit

// Append the "notforpayment" checkbox value (1 if checked, 0 if not checked)
var notforpaymentValue = $('#notforpaymentCheckbox'+measid).is(':checked') ? 1 : 0;
formData.append('notforpayment', notforpaymentValue);

// Perform AJAX POST request
$.ajax({
    url: "{{ url('update_mb_data') }}", // Replace with your server-side URL to update data
    type: "POST",
    data: formData, // Use the FormData object here
    headers: {
      'X-CSRF-TOKEN': csrfToken
    },
    processData: false,
    contentType: false,
    success: function (response) {


      var bitemid=response.bitemId;
      if (response.updateembrow) {
        console.log("Data updated successfully");


        var billdata=response.billdata[0];
$('#rabmino').val(billdata.bill_amt || '');
    $('#netamt').val(billdata.net_amt || '');


    //update the bill item table

    var newbilitemData = response.billitemdata;
      // Clear the existing table body content


      // Check if the current bill is in 'is_current' flag
      var tbillid = response.lasttbillid;

        var tbillId = tbillid.t_bill_Id;
        console.log(tbillId);
         // Clear the existing table body content


         var currentPage = $('.pagination .active').text();
// Call loadPaginatedData() with the current page number
 //loadPaginatedData(currentPage);



    //  $('#billitemtbody').append(row);

        var updateembrow=response.updateembrow[0];
        console.log(updateembrow);
        // Close the modal after successful update
        //$('#editembModal'+bitemid).modal('hide');

        var bilitemdata=response.billitem[0];
        //console.log(bilitemdata);
        var embdata = response.embdata;


           // Set the item_desc in the modal
           $('#itemDesc1'+bitemid).text(bilitemdata.item_desc || '');

           var concatenatedValue = (bilitemdata.sub_no !== null) ? (bilitemdata.t_item_no + bilitemdata.sub_no) : bilitemdata.t_item_no;

$('#subNo1' + bitemid).text(concatenatedValue);
$('#itemNo1' + bitemid).text(concatenatedValue);

        // Get the table body element
        var modalTableBody = $('#modal-table-body2'+bitemid);

        // Clear existing table rows
        modalTableBody.empty();
        // Create a new table row and append it to the table body
        for(i=0; i < embdata.length; i++)
        {
          var itemResponse = embdata[i];
        var newRow = $('<tr>');
        newRow.append($('<td>').text(itemResponse.sr_no || ''));
        newRow.append($('<td>').text(itemResponse.parti || ''));
        newRow.append($('<td>').text(itemResponse.number || ''));
        newRow.append($('<td>').text(itemResponse.length || ''));
        newRow.append($('<td>').text(itemResponse.breadth || ''));
        newRow.append($('<td>').text(itemResponse.height || ''));
        newRow.append($('<td>').text(itemResponse.formula || ''));
        newRow.append($('<td>').text(itemResponse.qty || ''));
        newRow.append($('<td>').text(formatDate(itemResponse.measurment_dt) || ''));


       // Add a checkbox in the last column based on notforpayment value
  var notForPayment = itemResponse.notforpayment || 0;
  var checkbox = $('<input>').attr('type', 'checkbox').prop('disabled', true);

  // Enable and check the checkbox if notforpayment is 1
  if (notForPayment == 1) {
    checkbox.prop('disabled', true);
    checkbox.prop('checked', true);
  }

  var previousbqty=response.previousexecqty;
  var currqty=response.curqty;
  var totalqty=response.execqty;

  var tndqty=response.tndqty;
  var percentage=response.percentage;
  var tndercostitem=response.tndcostitem;
console.log(currqty)
             $('#previousQty'+bitemid).val(previousbqty.toFixed(3));
             $('#currentQty'+bitemid).val(currqty.toFixed(3));
             $('#totalQty'+bitemid).val(totalqty.toFixed(3));

             $('#tndqty'+bitemid).val(tndqty.toFixed(3));
             $('#percentage'+bitemid).val(percentage.toFixed(2));
             $('#tndcost'+bitemid).val(tndercostitem);

             $('#costdifference'+bitemid).val(response.costdifference.toFixed(2));
             $('#totalcost'+bitemid).val(response.totlcostitem.toFixed(2));


  newRow.append($('<td>').append(checkbox));


        newRow.append($('<td>').html(handleModal(itemResponse.meas_id)));

        modalTableBody.append(newRow);

        }

        $('.modal-backdrop').remove();
        // Show the 'embeditbutton' modal that contains the table
        $('#embeditbutton'+bitemid).modal('show');
        var workdetails=response.workdetail;

   $('#workdetail'+bitemid).html(workdetails || '');



      } else {
        console.log("Failed to update data");
      }

      progressbar();

    },
    error: function (xhr, status, error) {
      console.log("AJAX error:", xhr.responseText);
    }
  });
}
</script>
<script>
function embdelete(Measid) {
  var measid = Measid;

  // Show a confirmation dialog using SweetAlert
  Swal.fire({
    title: 'Delete Item',
    text: 'Are you sure you want to delete this item?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      // If user confirms, send AJAX request to delete the item
      $.ajax({
        url: "{{ url('delete_mb_item') }}", // Replace with your server-side URL to delete the item
        type: "POST",
        data: {
          _token: "{{ csrf_token() }}",
          measid: Measid
        },
        success: function(response) {
          if (response.success) {



            var billdata=response.billdata[0];
$('#rabmino').val(billdata.bill_amt || '');
    $('#netamt').val(billdata.net_amt || '');


    //update the bill item table

    var newbilitemData = response.billitemdata;
    var bitemId = response.bitemid;
    var itemData =response.itemdata[0];
             console.log(itemData);

            // Check if the current bill is in 'is_current' flag
      var tbillid = response.lasttbillid;

      var tbillId = tbillid.t_bill_id;

      // Clear the existing table body content


      var currentPage = $('.pagination .active').text();
// Call loadPaginatedData() with the current page number
 //loadPaginatedData(currentPage);




            var remainingdata = response.remainingData;
            var billitemdata = response.billitemdata;

            var modalTableBody = $('#modal-table-body2'+bitemId);
              modalTableBody.empty();



            if (remainingdata.length > 0) {

              // Iterate through each row of data in remainingdata
              for (var i = 0; i < remainingdata.length; i++) {
                var itemResponse = remainingdata[i];
                // Create a new table row and append it to the table body
  var newRow = $('<tr>');
  newRow.append($('<td>').text(itemResponse.sr_no || ''));
  newRow.append($('<td>').text(itemResponse.parti || ''));
  newRow.append($('<td>').text(itemResponse.number || ''));
  newRow.append($('<td>').text(itemResponse.length || ''));
  newRow.append($('<td>').text(itemResponse.breadth || ''));
  newRow.append($('<td>').text(itemResponse.height || ''));
  newRow.append($('<td>').text(itemResponse.formula || ''));
  newRow.append($('<td>').text(itemResponse.qty || ''));
  newRow.append($('<td>').text(formatDate(itemResponse.measurment_dt) || ''));


  // Add a checkbox in the last column based on notforpayment value
  var notForPayment = itemResponse.notforpayment || 0;
  var checkbox = $('<input>').attr('type', 'checkbox').prop('disabled', true);

  // Enable and check the checkbox if notforpayment is 1
  if (notForPayment == 1) {
    checkbox.prop('disabled', true);
    checkbox.prop('checked', true);
  }

  var previousbqty=response.previousexecqty;
  var currqty=response.curqty;
  var totalqty=response.execqty;

             $('#previousQty'+bitemId).val(previousbqty.toFixed(3));
             $('#currentQty'+bitemId).val(currqty.toFixed(3));
             $('#totalQty'+bitemId).val(totalqty.toFixed(3));

             $('#tndqty'+bitemId).val(response.tndqty.toFixed(3));
             $('#percentage'+bitemId).val(response.percentage.toFixed(2));
             $('#tndcost'+bitemId).val(response.tndcostitem);

             $('#costdifference'+bitemId).val(response.costdifference.toFixed(2));
             $('#totalcost'+bitemId).val(response.totlcostitem.toFixed(2));


  newRow.append($('<td>').append(checkbox));


  newRow.append($('<td>').html(handleModal(itemResponse.meas_id)));


  // Append the new row to the table body
  modalTableBody.append(newRow);
              }
              Swal.fire('Deleted!', 'The item has been deleted', 'success');
              // Show the 'embeditbutton' modal that contains the updated table
               // Set the item_desc, sub_no, and t_item_no in the modal
               $('#itemDesc1'+bitemId).text(itemData.item_desc || '');

               var concatenatedValue = (itemData.sub_no !== '') ? (itemData.t_item_no + itemData.sub_no) : itemData.t_item_no;

$('#subNo1' + bitemId).text(concatenatedValue);
$('#itemNo1' + bitemId).text(concatenatedValue);



              var workdetails=response.workdetail;

             $('#workdetail'+bitemId).html(workdetails || '');

              $('#embeditbutton'+bitemId).modal('show');
            } else {
              // No remaining related data
              Swal.fire('Deleted!', 'The All item has been deleted and not retain it', 'success');
            }
          } else {
            Swal.fire('Error', 'Failed to delete the item.', 'error');
          }
          progressbar();

        },
        error: function(xhr, status, error) {
          console.log("AJAX error:", xhr.responseText);
          Swal.fire('Error', 'An error occurred while deleting the item.', 'error');
        }
      });
    }
  });
}



</script>

<!-- when new bill created in that bill till no measurement add that time come one sweetalert-->
<script>
    // Check if there's an error message
    @if(Session::has('error'))
        // Display SweetAlert for error
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get('error') }}',
            showConfirmButton: false,
            timer: 1500

        });
    @endif
</script>
<!-- when new bill created in that bill till no measurement add that time come one sweetalert-->


@endsection







