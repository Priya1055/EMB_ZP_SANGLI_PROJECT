@extends('layouts.header')
@section('content')
<style>
    /* Increase font weight of labels */
 .form-group label {
      font-weight: bold;
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
#workid{
    font-weight: bold;
}

.line {
    border-top: 1px solid #FF0000; /* Adjust the style of the line as needed */
    margin: 5px 0; /* Add spacing above and below the line */
    width: 90%; /* Adjust the width of the line as needed */
}

.line1 {
    border-top: 1px solid #0000FF;/* Adjust the style of the line as needed */
    margin: 5px 0; /* Add spacing above and below the line */
    width: 90%; /* Adjust the width of the line as needed */
}

.custom-button {
    margin-top: 10px; /* Adjust the margin as needed to align the button */
    background: #04AA6D;
    color: white;
  }

  .button-container {
    display: flex;
    align-items: flex-start;
}

.vertical-inline {
    display: flex;
    flex-direction: column;
}

.inline {
    margin-left: 10px; /* Adjust margin to position the fourth button */
}
.wizard-progress {
  display: table;
  width: 100%;
  table-layout: fixed;
  position: relative;
}

.wizard-progress .step {
  display: table-cell;
  text-align: center;
  vertical-align: top;
  overflow: visible;
  position: relative;
  font-size: 17px;
  font-weight: bold;
}

.wizard-progress .step:not(:last-child):after {
  content: '';
  position: absolute;
  left:50%;
  top: 37px;
  background-color: #ffb09c;
  width: 100%;
  height: 12px; /* Increase the height of the line */
  margin-left: 15px;

}

.wizard-progress .step .node {
  display: inline-block;
  border: 6px solid #fff;
  background-color: #fff;
  border-radius: 18px;
  height: 18px;
  width: 20px;
  position: absolute;
  top: 25px;
  left: 50%;
  margin-left: -17px;
}

.wizard-progress .step.less-than-target:after {
  background-color: #07c;
  /* width: 50%; */
}

.wizard-progress .step.complete .node {
  border-color: #07c;
  
}

.wizard-progress .step.complete .node::after {
  content: '\2713'; /* Unicode for checkmark symbol */
  display: block;
  color: white;
  font-size: 16px;
  text-align: center;
  line-height: 18px;
  position: absolute;
  top: 50%; /* Position at vertical center */
  left: 50%; /* Position at horizontal center */
  transform: translate(-50%, -50%); /* Center the symbol */
}

/* Adjust border for the circle */
.wizard-progress .step .node {
  border: 17px solid #ffb09c; /* Increase border width for the circle */
  border-radius: 30px; /* Adjust border-radius to maintain the circle shape */
}


.modal-fullscreen {
  
    max-width: 95%;
  }
  
  
    /* //so Progressbar */
  .wizard-progressSO {
  display: table;
  width: 100%;
  table-layout: fixed;
  position: relative;
}

.wizard-progressSO .step {
  display: table-cell;
  text-align: center;
  vertical-align: top;
  overflow: visible;
  position: relative;
  font-size: 17px;
  font-weight: bold;
}

.wizard-progressSO .step:not(:last-child):after {
  content: '';
  position: absolute;
  left:50%;
  top: 37px;
  background-color: #ffb09c;
  width: 100%;
  height: 12px; /* Increase the height of the line */
  margin-left: 15px;

}

.wizard-progressSO .step .node {
  display: inline-block;
  border: 6px solid #fff;
  background-color: #fff;
  border-radius: 18px;
  height: 18px;
  width: 20px;
  position: absolute;
  top: 25px;
  left: 50%;
  margin-left: -16px;
}

.wizard-progressSO .step.less-than-target:after {
  background-color: #07c;
  /* width: 50%; */
}

.wizard-progressSO .step.complete .node {
  border-color: #07c;
  
}

.wizard-progressSO .step.complete .node::after {
  content: '\2713'; /* Unicode for checkmark symbol */
  display: block;
  color: white;
  font-size: 16px;
  text-align: center;
  line-height: 18px;
  position: absolute;
  top: 50%; /* Position at vertical center */
  left: 50%; /* Position at horizontal center */
  transform: translate(-50%, -50%); /* Center the symbol */
}

/* Adjust border for the circle */
.wizard-progressSO .step .node 
{
  border: 17px solid #ffb09c; /* Increase border width for the circle */
  border-radius: 30px; /* Adjust border-radius to maintain the circle shape */
}
/* //so Progressbar */

</style>
<!-- //when photot click that time display photo big size -->
<style>
      /* Increase font weight of labels */
 .form-group label 
 {
      font-weight: bold;
    }

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

.material-symbols-outlined {
      font-variation-settings:
        'FILL' 0,
        'wght' 900,
        'GRAD' 0,
        'opsz' 56;
        font-size: 30px; 
        /* Adjust the font size to make the icon larger */
    }
</style>
<!-- //when photot click that time display photo big size -->

        <ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $embsection1->Work_Id ?? '') }}">Bill</a></li>
        </ul>
        
        <a href="{{ url('/listworkmasters')}}" id="backButton" style="margin-bottom:10px;">
              <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
        </a>
        <div style="background-image: url('Uploads/Photos/logo.png');">

</div>


@auth
<div class="card" id="backbglogo">
                <div class="card-header">
                    <h3>WORK DETAILS</h3>
                </div>
    <div class="container-fluid" >
        <div class="row">
          <!-- Form Section -->
          <div class="col-lg-12">
            <!-- <h2>Form</h2> -->
            @include('sweetalert::alert')
            <form action="" method="get">
              @csrf
                        <input type="hidden" value="{{$tbillid}}" name="phtoT_bill_id" id="phtoT_bill_id">

                <div class="form-group form-row align-items-center mt-2">
                  <label for="name" class="col-md-2">Work Id:</label>
                  <div class="col-md-4">
                    <input type="text" name="workid" class="form-control" id="workid"  value="{{$embsection1->Work_Id ?? ''}}" disabled>
                  </div>
                  <label for="sectionengineer" class="col-md-2">Section Engineer:</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="sectionengineer" name="name" value="{{$embsection1->name ?? ''}}" disabled>
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
                  <label for="tenderamount" class="col-md-2">Tender Amount:</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control ISMinput" id="tenderamount" name="tenderamount" value="{{$embsection1->Tnd_Amt ?? ''}}" disabled>
                  </div>
                  <label for="abpercent" class="col-md-2">Above/Below Percentage:</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control ISMinput" id="abpercent" name="abpercent" value="{{$embsection1->A_B_Pc ?? ''}}" disabled>
                  </div>
                </div>



                <div class="form-group form-row align-items-center">
                    <label for="woamount" class="col-md-2">WorkOrder Amount:</label>
                      <div class="col-md-4">
                        <input type="text" class="form-control ISMinput" id="woamount" name="woamount" value="{{$embsection1->WO_Amt ?? ''}}" disabled>
                      </div>
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
                  <label for="nameofwork" class="col-md-2">Name Of Work:</label>
                  <div class="col-md-4">
                    <textarea class="form-control" name="worknm" id="Work_Nm" disabled>{{$embsection1->Work_Nm ?? ''}}</textarea>
                  </div>

                </div>
            
              <!-- <div>
                <input type="submit" value="Submit">
              </div> -->
            </form>   

          </div>
        </div>
    </div>
                              
<div class="container-fluid"  >
    <div class="row">
        <div class="col-lg-12">
            <!-- <div class="card" id="backbglogo" > -->
                <!-- <div class="card-header">
                    <h3>BILLS DATA</h3>
                </div> -->
                <div  style="text-align: right; font-size: 20px; font-weight:bold;">

                <!-- <a href="" class="btn btn-primary btn-sm">Find</a>
                <a class="btn btn-primary btn-sm" id="newButton">New</a> -->
                <!-- //new button ajax -->

                        </div>
                       
              @auth 
                       
                  @if(auth()->user()->usertypes === "SO" && (int)$mbstatus === 2) 
                        
                          <div class="wizard-progressSO">  
                                <div class="step complete" data-step-value="1">Mat Cons  
                                <div class="node"></div></div>  
                                <div class="step complete" data-step-value="2">Recovery
                                <div class="node"></div></div>
                                <div class="step complete" data-step-value="3">Ex
                                <div class="node"></div></div>
                                <div class="step complete" data-step-value="4"> Royalty
                                <div class="node"></div></div>
                                <div class="step complete" data-step-value="5">Upload
                                <div class="node"></div></div>
                                <div class="step complete" data-step-value="6"> Abstract
                                <div class="node"></div></div>
                                <div class="step complete" data-step-value="7">MB Chk
                                <div class="node"></div></div>
                          </div>
                          <br>

                  @else
                          <div class="wizard-progress mb-2">
                                          <div class="step complete" data-step-value="1">
                                            Bill
                                            <div class="node"></div>
                                          </div>

                                          <div class="step complete" data-step-value="2">
                                            MB
                                            <div class="node"></div>
                                          </div>

                                          <div class="step complete" data-step-value="3">
                                          SO
                                            <div class="node"></div>
                                          </div>

                                          <div class="step complete" data-step-value="4">
                                            DE 
                                            <div class="node"></div>
                                          </div>


                                          <div class="step complete" data-step-value="5">
                                            EE
                                            <div class="node"></div> 
                                          </div>

                                          <div class="step complete" data-step-value="6">
                                            Agcy
                                            <div class="node"></div>
                                            </div>


                                            <div class="step complete" data-step-value="7">
                                            SO
                                            <div class="node"></div>
                                          </div>

                                          <div class="step complete" data-step-value="8">
                                            SDC
                                            <div class="node"></div>
                                          </div>

                                          <div class="step complete" data-step-value="9">
                                            DE 
                                            <div class="node"></div>
                                          </div>


                                          <div class="step complete" data-step-value="10">
                                            PO
                                            <div class="node"></div>
                                          </div>

                                          <div class="step complete" data-step-value="11">
                                            Audt
                                            <div class="node"></div>
                                          </div>


                                          <div class="step complete" data-step-value="12">
                                            AAO
                                            <div class="node"></div> 
                                          </div>

                                          <div class="step complete" data-step-value="13">
                                            EE
                                            <div class="node"></div> 
                                          </div>
                            
                          </div></br>
                  @endif

              @endauth 
<!-- {{$BillshaveNotExist}}   {{$Billshaveexist}} -->
@auth 
  @if(auth()->user()->usertypes === "SO"  ) 
  @if($latestbillid->isNotEmpty() || $workbills->isEmpty())
  @if(is_null($Billshaveexist) || $Billshaveexist !== null)

  <!-- && $mbstatus <= 3 -->
    @if($finalbill != 1)

    <div class="d-flex justify-content-end align-items-center" style="margin-top:20px;">
      <label for="newbutton" class="m-0" style="font-weight: bold; font-size: 1.25rem;">NEW BILL</label>
        <button type="button" class="btn ml-2 custom-button" onclick="showNewBill(); enableNewButton();" id="newButton" title="NEW BILL CREATE">
          <i class="fa fa-plus-circle fa-2x custom-icon" aria-hidden="true"></i>
      </button>
    </div>
        @endif

    @endif
  @endif
@endif
@endauth 



<!-- @auth 
  @if(auth()->user()->usertypes === "SO"  ) 
  @if($latestbillid->isNotEmpty() || $workbills->isEmpty())

    <div class="d-flex justify-content-end align-items-center" style="margin-top:20px;">
      <label for="newbutton" class="m-0" style="font-weight: bold; font-size: 1.25rem;">NEW BILL</label>
        <button type="button" class="btn ml-2 custom-button" onclick="showNewBill(); enableNewButton();" id="newButton" title="NEW BILL CREATE">
          <i class="fa fa-plus-circle fa-2x custom-icon" aria-hidden="true"></i>
      </button>
    </div>
  @endif
@endif
@endauth  -->
                        <!-- <div class="d-flex justify-content-end align-items-center" style="margin-top:20px;">
                            <label for="newbutton" class="m-0" style="font-weight: bold; font-size: 1.25rem;">NEW BILL</label>
                            <button type="button" class="btn ml-2 custom-button" onclick="showNewBill(); enableNewButton();" id="newButton" title="NEW BILL CREATE">
                                          <i class="fa fa-plus-circle fa-2x custom-icon" aria-hidden="true"></i>
                            </button>
                       </div> -->

                     
                       
                <div class="card-body" >
                <div class="table-responsive">
                    <table class="table table-striped"  >
                        <thead style="text-align:center;">
                            <tr class="table-success" >
                              <th>R.A.Bill Id</th>
                              <th>R.A.Bill No</th>
                              <th>Total Bill Amt</th>
                              <th>Rec Amt</th>                            
                              <th>Total Net Amt</th>
                              <th>Measurement Dt From</th>                            
                              <th>CV No</th>                             
                              <th>CV Date</th>
                              <th>Previousbill Date</th>                           
                              <th>Final Bill</th>
                              <th>Action</th>                           
                         </tr>
                         <tr class="table-success">
                              <th></th>
                              <th>Date</th>
                              <th>Current Bill Amt</th>
                              <th></th>
                              <th>Current Net Amt</th>                            
                              <th>Measurement Dt Upto</td>
                              <th></th>                            
                              <th></th>
                              <th></th>                             
                              <th></th>
                              <th></th>                           
                             
                                
                         </tr>
                         <tr class="table-success">
                              <th></th>
                              <th></th>
                              <th>Previous Bill Amt</th>
                              <th></th>
                              <th>Previous Net Amt</th>                            
                              <th></td>
                              <th></th>                            
                              <th></th>
                              <th></th>                             
                              <th></th>
                              <th></th>                           
                         </tr>
                        </thead>
                        <tbody id="billsbody">
                        @if(isset($billdata)) 
                        @foreach($billdata as $bill)
                    
                            <tr>
                           <td style=" font-weight: bold;">{{$bill->t_bill_Id}}<br></div></td>
                           <td><div style=" font-weight: bold;">{{$bill->t_bill_No}}</div><br>{{ date('d-m-Y', strtotime($bill->Bill_Dt)) }}</td>
                           <td>{{$bill->bill_amt}}<br><br>{{$bill->c_billamt}}<br><br>{{$bill->p_bill_amt}}</td>
                           <td>{{$bill->rec_amt}}</td>
                           <td>{{$bill->net_amt}}<br><br>{{$bill->c_netamt}}<br><br>{{$bill->p_net_amt}}</td>
                           <td>{{ date('d-m-Y', strtotime($bill->meas_dt_from)) }}<br><br>{{ date('d-m-Y', strtotime($bill->meas_dt_upto)) }}</td>
                           <td>{{$bill->cv_no}}</td>
                           <td>{{ date('d-m-Y', strtotime($bill->cv_dt)) }}</td>
                           <td>{{ date('d-m-Y', strtotime($bill->previousbilldt)) }}</td>
                           <td> <input type="checkbox" {{ $bill->final_bill == 1 ? 'checked' : '' }} disabled></td>
                           <td class="button-container">
                              <div class="vertical-inline">
                           <form action="{{ url('viewbill' , ['id' =>$bill->t_bill_Id ])}}" method="GET">
                                    @csrf
                                  <button type="submit" class="emb-button mb-2"  title="VIEW BILL" style="border: none; background: none;">
                                      <i class="fa fa-eye" aria-hidden="true" style="color:black;font-size:25px;"></i>
                                  </button>
                                  <!-- <button type="button" class="btn emb-button mb-2" data-toggle="modal" data-target="#embview${item.b_item_id}" onclick="openModal('${item.b_item_id}')" title="VIEW MEASUREMENTS">
                                      <i class="fa fa-eye" aria-hidden="true"></i>
                                  </button> -->
                                  </form>
                              
                                  @if(auth()->user()->usertypes === "SO" &&  $mbstatus <= 4 &&  (int)$bill->is_current == 1)
                                  <form action="{{ url('editbill' , ['id' =>$bill->t_bill_Id ])}}" method="get">
                                    @csrf
                                                                   

                                  <button type="submit" class=" mb-2"    title=" EDIT BILL" style="border: none; background: none;">
                                      <i class="fa fa-pencil"  style="color: black; font-size: 25px;"></i>
                                  </button>
                                 

                                  </form> 
                            
                           
                                  <!-- <a href="{{ url('/delete-bill', ['id' =>$bill->t_bill_Id]) }}" class="btn btn-danger mb-2" 
   {{ $bill->is_current === 0 ? 'disabled' : '' }} title="DELETE BILL">
    <i class="fa fa-trash" aria-hidden="true"></i>
</a> -->
                                  <form  id="deleteBillForm_{{ $bill->t_bill_Id }}" action="{{ url('/delete-bill', ['id' =>$bill->t_bill_Id]) }}" method="get">
                                      @csrf
                                                                           

                                  <button type="submit" class="btn btn-danger mb-2"   title="DELETE BILL" style="border: none; background: none;">
                                      <i class="fa fa-trash" aria-hidden="true" style="color:red;font-size:25px;"></i>
                                  </button>
                              
                                  </form>
                                  @endif
                                
                                  <!-- @if(auth()->user()->usertypes === "EE" || auth()->user()->usertypes === "DE")
                                  <form action="{{ url('viewdocument' , ['id' =>$bill->t_bill_Id ])}}" method="get">
                                    @csrf
                                  <button type="submit" class="btn btn-primary mb-2"   title="View document">
                                      <i class="fa fa-eye" style="color:white;"></i>View Document
                                  </button>

                                  </form> 
                                  @endif -->
                                  </div>
                                  </div>
                                  
                                  
                                  
                                  
                                  <div class="inline">
                                  <!-- <a href="{{ url('report', ['id' => $bill->t_bill_Id]) }}" class="btn btn-primary mb-2" title="REPORT">
                                    REPORT <i class="fa-solid fa-file fa-beat-fade" style="color: #f0f0f0;"></i>
                                  </a> -->
                                  @if(auth()->user()->usertypes === "SO" && in_array($mbstatusSo, [0,1,2, 3, 4,5,6,7] ) && $mbstatus == 2)
                                <form method="post" action="{{ url('updatematerialcon') }}" >
                                    @csrf
                                                                          @if((int)$bill->is_current !== 0)

                                    <input type="hidden" name="t_bill_Id" value="{{ $bill->t_bill_Id }}">
                                    <input type="hidden" name="workid" id="workid"  value="{{$embsection1->Work_Id ?? ''}}">
                                    <button type="submit" style="border: none;" class=" material-symbols-outlined" data-toggle="tooltip" title="Material Consumption">stacks 
                                    </button>
                                    @endif
                                </form>
                                @endif

                                  @if(auth()->user()->usertypes === "SO" && in_array($mbstatusSo, [1,2, 3, 4,5,6,7]) && $mbstatus == 2)
                                  <form method="get" action="{{ url('ListRecoveryStatement') }}" >
                                    @csrf
                                                                          @if((int)$bill->is_current !== 0)

                                    <input type="hidden" name="t_bill_Id" value="{{ $bill->t_bill_Id }}">
                                    <button type="submit" class="material-symbols-outlined" style="border:none;" data-toggle="tooltip" title="Recovery" >move_up
                                      </button>
                                    @endif
                                  </form>
                                  @endif

                                  @if(auth()->user()->usertypes === "SO" && in_array($mbstatusSo, [ 2,3,4,5,6,7]) && $mbstatus == 2)
                                  <form action="{{ url('ExcessStatement' , ['id' =>$bill->t_bill_Id ])}}" method="GET">
                                     @csrf
                                                                           @if((int)$bill->is_current !== 0)

                                   <button type="submit" class="material-symbols-outlined" style="border:none;"  title="EXCESS">
                                    savings
                                   </button>
                                   @endif
                                   </form>
                                   @endif


                                  @if(auth()->user()->usertypes === "SO" && in_array($mbstatusSo, [3,4,5,6,7]) && $mbstatus == 2)

                            <form method="post" action="{{ url('royaltycons') }}" >
                                @csrf
                                                                      @if((int)$bill->is_current !== 0)

                                <input type="hidden" name="t_bill_Id" value="{{ $bill->t_bill_Id }}">
                                <input type="hidden" name="workid" id="workid"  value="{{$embsection1->Work_Id ?? ''}}">
                                <button type="submit" class="material-symbols-outlined" style="border:none;" data-toggle="tooltip" title="Royalty Charges" >payments</button>
                                @endif
                              </div>
                            </form>
                            @endif
                        </div>

                        <div class="inline">
                        @if(auth()->user()->usertypes === "SO" && in_array($mbstatusSo, [4,5,6,7])&& $mbstatus == 2)

      <!--<form action="{{ url('editbill' , ['id' =>$bill->t_bill_Id ])}}" method="get">-->
      <!--    @csrf-->
      <!--    <input type="hidden" name="t_bill_Id" value="{{ $bill->t_bill_Id }}">-->
      <!--    <input type="hidden" name="workid" id="workid"  value="{{$embsection1->Work_Id ?? ''}}">-->
      <!--    <button type="submit" class="btn btn-primary btn-sm mb-2">Photos/Doc</button>-->
      <!--</form>-->
      
                <div class="d-flex justify-content-end align-items-center" >
                                                          @if((int)$bill->is_current !== 0)

        <!-- <button type="button" class="btn btn-primary btn-sm mb-2 material-symbols-outlined" onclick="uploadimages();" id="imgButton"  title="UPLOAD IMG DOC VDO"> upload_file
      </button> -->
      <a href="#" class="material-symbols-outlined" style="color:black;" onclick="uploadimages();" id="imgButton" title="UPLOAD IMG DOC VDO">upload_file</a>

        @endif
         </div>
      @endif
      <div style="margin-bottom: 10px; margin-left: 5px;" >

@if (in_array($mbstatusSo, [5,6,7]) && ($mbstatus >= 2 && $mbstatus < 5 && !($mbstatusSo == 7 && $mbstatus == 6)) || ( auth()->user()->usertypes === "audit" && $mbstatus >= 10 ) || $mbstatus >= 11)   

<form action="{{ url('Abstract' , ['id' =>$bill->t_bill_Id ])}}" method="GET">
                                     @csrf
                                                          @if((int)$bill->is_current !== 0)


                                   <button type="submit" class="material-symbols-outlined"  title="Abstract" style="border:none;">
                                   credit_card_gear</button>
                                   @endif
                                   </form>
                                   @endif
                                   @if($mbstatus >= 1 && $mbstatus < 6)

<div class="inline">
<!-- <form action="{{ url('emb' , ['id' =>$bill->t_bill_Id ])}}" method="GET">
  @csrf
<button type="submit" class="btn btn-primary mb-2"   ${tbillid.is_current === 0 ? 'disabled' : ''} title=" EDIT BILL">
    EMB<i class="fa fa-pencil" style="color:white;"></i>
</button>

</form> -->
<a href="{{ url('emb', ['id' => $bill->t_bill_Id]) }}" style="border:none;color:black"  class="material-symbols-outlined {{$bill->is_current === 0 ? 'disabled' : ''}}"  title="EDIT BILL">
    analytics
</a>


@endif






</div>

<div class="vertical-inline">


<div style="margin-bottom: 10px; margin-left: 10px;">
        <a href="{{ url('report', ['id' => $bill->t_bill_Id]) }}" class="material-symbols-outlined" title="REPORT">
             <i class="fa-solid fa-file fa-beat-fade" style="color: black;border:none;"></i>
        </a>
</div>                                 
     
    <!-- work hand over certificate button  -->
    @auth 
   @if($bill->final_bill == 1 && $mbstatus == 13 && auth()->user()->usertypes === "SO")
    <div style="margin-top: 10px;"> <!-- Add margin-top to move the button to the next line -->
        <button class="btn btn-group-lg btn-outline-dark btn-close-white btn-dark text-white text-bold" id="WHOCm0dal" data-toggle="modal" data-target="#uploadModal"><b>Upload Work HandOver Certificate</b></button>
    </div>
    @endif
    @endauth

  </div>








                                                            @auth 
                                    @if(auth()->user()->usertypes === "SO" && (int)$mbstatus===6 )

                          <div class="d-flex justify-content-center align-items-center">
                              <form id="yourFormId" method="post" action="{{ url('RouteCheckListSO') }}">
                                  @csrf
                                  <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">
                                  <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">
                                  <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">
                                  <input type="hidden" name="t_bill_Id" value="{{$bill->t_bill_Id ?? ''}}">
                                  <div class="d-flex justify-content-center align-items-center" id="mbbutton">
                                                                            @if((int)$bill->is_current !== 0)

                                      <button type="submit" class="goToEMBBtn material-symbols-outlined" style="border:none;font-size: 35px;"
                                       id="goToEMBBtn" data-toggle="tooltip" title="CheckList">
                                          fact_check
                                      </button>
                                      @endif
                                  </div>
                              </form></div>
                          </div>
                          @endif


                          @if(auth()->user()->usertypes === "SDC" &&  (int)$mbstatus===7) 
                          <div class="d-flex justify-content-center align-items-center" >
                              <form id="yourFormId" method="post" action="{{ url('RouteCheckListSDC') }}">
                                  @csrf
                                  <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">
                                  <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">
                                  <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">
                                  <input type="hidden" name="t_bill_Id" value="{{$bill->t_bill_Id ?? ''}}">

                                  <div class="d-flex justify-content-center align-items-center" id="">
                                                                            @if((int)$bill->is_current !== 0)
                                      <button type="submit" class="material-symbols-outlined" style="border:none;font-size: 35px;" id="" title="CheckList">
                                          fact_check
                                      </button>
                                      @endif
                                  </div>
                              </form></div>
                          </div>
                          @endif 

                          <!-- {{$bill->t_bill_Id}} -->
                          @if(auth()->user()->usertypes === "DYE" &&  (int)$mbstatus===8) 
                          <div class="d-flex justify-content-center align-items-center" >
                              <form id="yourFormId" method="post" action="{{ url('RouteCheckListDYE') }}">
                                  @csrf
                                  <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">
                                  <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">
                                  <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">
                                  <input type="hidden" name="t_bill_Id" value="{{$bill->t_bill_Id ?? ''}}">

                                  <div class="d-flex justify-content-center align-items-center" id="">
                                                                            @if((int)$bill->is_current !== 0)

                                      <button type="submit" class="material-symbols-outlined" style="border:none;font-size: 35px;" id="" title="CheckList">
                                          fact_check
                                      </button>
                                      @endif
                                  </div>
                              </form></div>
                          </div>
                          @endif 


                          @if(auth()->user()->usertypes === "PO" &&  (int)$mbstatus===9) 
                          <div class="d-flex justify-content-center align-items-center" >
                              <form id="yourFormId" method="post" action="{{ url('RouteCheckListPO') }}">
                                  @csrf
                                  <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">
                                  <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No  ?? ''}}">
                                  <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">
                                  <input type="hidden" name="t_bill_Id" value="{{$bill->t_bill_Id ?? ''}}">

                                  <div class="d-flex justify-content-center align-items-center" id="">
                                                                            @if((int)$bill->is_current !== 0)

                                      <button type="submit" class="material-symbols-outlined" style="border:none;font-size: 35px;" id="" title="CheckList">
                                          fact_check
                  
                                      </button>
                                      @endif
                                  </div>
                              </form></div>
                          </div>
                          @endif 

                          @if(auth()->user()->usertypes === "audit" &&  (int)$mbstatus===10) 
                          <div class="d-flex justify-content-center align-items-center">
                              <form id="yourFormId" method="post" action="{{ url('RouteCheckListAB/') }}">
                                  @csrf
                                  <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">
                                  <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No ?? ''}}">
                                  <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">
                                  <input type="hidden" name="t_bill_Id" value="{{$bill->t_bill_Id ?? ''}}">

                                  <div class="d-flex justify-content-center align-items-center">
                                                                            @if((int)$bill->is_current !== 0)

                                      <button type="submit" class="material-symbols-outlined" style="border:none;font-size: 35px;" title="CheckList">
                                         fact_check
                                      </button>
                                      @endif
                                  </div>
                              </form>
                          </div>
                          @endif 

                @if(auth()->user()->usertypes === "AAO" &&  (int)$mbstatus===11) 
                <div class="d-flex justify-content-center align-items-center">
                    <form id="yourFormId" method="get" action="{{ url('RouteCheckListAAO') }}">
                        @csrf
                        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">
                        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No ?? ''}}">
                        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">
                        <input type="hidden" name="t_bill_Id" value="{{$bill->t_bill_Id ?? ''}}">
                
                        <div class="d-flex justify-content-center align-items-center">
                                                                  @if((int)$bill->is_current !== 0)

                            <button type="submit" class="material-symbols-outlined" style="border:none;font-size: 35px;" title="CheckList">
                                fact_check
                            </button>
                            @endif
                        </div>
                    </form>
                </div>
                @endif 
                
                @if(auth()->user()->usertypes === "EE" &&  (int)$mbstatus===12) 
                <div class="d-flex justify-content-center align-items-center">
                    <form id="yourFormId" method="get" action="{{ url('RouteCheckListEE') }}">
                        @csrf
                        <input type="hidden" name="workid" value="{{$embsection1->Work_Id ?? ''}}">
                        <input type="hidden" name="t_bill_No" value="{{$embsection2->t_bill_No ?? ''}}">
                        <input type="hidden" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}">
                        <input type="hidden" name="t_bill_Id" value="{{$bill->t_bill_Id ?? ''}}">
                
                        <div class="d-flex justify-content-center align-items-center">
                                                                  @if((int)$bill->is_current !== 0)

                            <button type="submit" class="material-symbols-outlined" style="border:none;font-size: 35px;" title="CheckList">
                                fact_check
                            </button>
                            @endif
                        </div>
                    </form>
                </div>
                @endif 







                          @endauth

                                  <!-- <form method="post" action="{{ url('ExecutiveEngineerEMB') }}" >
                                    @csrf
                                    <input type="hidden" name="t_bill_Id" value="{{ $bill->t_bill_Id }}">
                                    <input type="hidden" name="workid" id="workid"  value="{{$embsection1->Work_Id ?? ''}}">
                                    <button type="submit" class="btn btn-primary btn-sm">Executive Engineeer</button>
                                  </div>
                                </form> -->


                                <!-- <form method="post" action="{{ url('materialcon') }}" >
                                    @csrf
                                    <input type="hidden" name="t_bill_Id" value="{{ $bill->t_bill_Id }}">
                                    <input type="hidden" name="workid" id="workid"  value="{{$embsection1->Work_Id ?? ''}}">
                                    <button type="submit" class="btn btn-primary btn-sm mb-2">Material Cons</button>
                                  </div>
                                </form> -->

                               <!-- @if(auth()->user()->usertypes === "SO" && $mbstatus <= 3)-->
                               <!-- <form method="post" action="{{ url('updatematerialcon') }}" >-->
                               <!--     @csrf-->
                               <!--     <input type="hidden" name="t_bill_Id" value="{{ $bill->t_bill_Id }}">-->
                               <!--     <input type="hidden" name="workid" id="workid"  value="{{$embsection1->Work_Id ?? ''}}">-->
                               <!--     <button type="submit" class="btn btn-primary btn-sm mb-2">Material consumption</button>-->
                               <!--   </div>-->
                               <!-- </form>-->


                               <!-- <form method="post" action="{{ url('royaltycons') }}" >-->
                               <!--     @csrf-->
                               <!--     <input type="hidden" name="t_bill_Id" value="{{ $bill->t_bill_Id }}">-->
                               <!--     <input type="hidden" name="workid" id="workid"  value="{{$embsection1->Work_Id ?? ''}}">-->
                               <!--     <button type="submit" class="btn btn-primary btn-sm mb-2">Royalty charges</button>-->
                               <!--   </div>-->
                               <!-- </form>-->
                               <!--@endif-->
                                </div>
                            </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
</div>

@endauth

<!-- New bill create modal -->


<div class="modal" id="newBillModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="newBillModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBillModalLabel">New R.A.Bill Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!-- <div class="d-flex justify-content align-items-center">
        <button type="button" class="btn ml-2 btn-primary" onclick="uploadimages();" id="imgButton" title="UPLOAD IMG DOC VDO"><i class="fa fa-upload" aria-hidden="true"></i> Upload Documents</button>
         <button type="button" class="btn ml-2 btn-primary" onclick="uploadimages();" id="imgButton">View Documents</button> 
 </div>  -->
      <div class="modal-bodynewbill">
        <form id="newBillForm" action="#" method="POST" class="row">
          @csrf

           <!-- Previous bill date -->
           <div class="row offset-8">
    <div class="col-6">
        <div class="form-group">
            <label for="pbilldt">Previous Bill Date:</label>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <input type="date" class="form-control" id="pbilldt" name="pbilldt" value="{{$lastBill->previousbilldt ?? ''}}" disabled>
        </div>
    </div>
</div>

       
          <!-- R.A.Bill Id -->
          <div class="form-group col-5 ml-5">
            <label for="rabillid">R.A.Bill Id:</label>
            <input type="text" class="form-control" id="newrabillid" name="t_bill_Id" value="{{$lastBill -> t_bill_Id ?? ''}}" disabled>
          </div>

          <!-- R.A.Bill No -->
          <div class="form-group col-5 ml-5">
            <label for="rabillno">R.A.Bill No:</label>
            <input type="text" class="form-control" id="newrabillno" name="t_bill_No" value="{{$lastBill -> t_bill_No ?? ''}}" disabled>
          </div>

          <!-- Date -->
          <div class="form-group col-5 ml-5">
    <label for="date">Bill Date:</label>
    <input type="date" class="form-control" id="newbilldate" name="Bill_Dt" value="{{$lastBill -> Bill_Dt ?? ''}}" onchange="updateMeasurementDate()" disabled>
</div>

          <!-- Bill Amt -->
          <div class="form-group col-5 ml-5">
            <label for="rabmino">Bill Amt:</label>
            <input type="text" class="form-control" id="newbillamt" name="bill_amt" value="{{$lastBill -> bill_amt ?? ''}}" disabled>
          </div>

          <!-- Rec Amt -->
          <div class="form-group col-5 ml-5">
            <label for="recamt">Rec Amt:</label>
            <input type="text" class="form-control" id="newrecamt" name="rec_amt" value="{{$lastBill -> rec_amt ?? ''}}" disabled>
          </div>


          <!-- Net Amt -->
          <div class="form-group col-5 ml-5">
            <label for="netamt">Net Amt:</label>
            <input type="text" class="form-control" id="newnetamt" name="net_amt" value="{{$lastBill -> net_amt ?? ''}}" disabled>
          </div>

          <!-- Measdate from -->
          <div class="form-group col-5 ml-5">
            <label for="measdtfr">Measurement Date From:</label>
            <input type="date" class="form-control" id="measdtfr" name="measdtfr"  value="">
          </div>


           <!-- Measdate upto -->
          <div class="form-group col-5 ml-5">
            <label for="measdtupto">Measurement Date Upto:</label>
            <input type="date" class="form-control" id="measdtupto" name="measdtupto" value="" >
          </div>

          <!-- Gst rate -->
          <div class="form-group col-3  ml-5">
            <label for="gstrate">GST Rate:</label>
            <input type="text" class="form-control" id="gstrate" name="gstrate"  value="">
          </div>

          <!-- CV No -->
          <div class="form-group col-3">
            <label for="cvno">CV No:</label>
            <input type="text" class="form-control ISMinput" id="newcvno" name="cv_no" value="{{$lastBill -> cv_no ?? ''}}" >
          </div>

          <!-- CV Date -->
          <div class="form-group col-3">
           <label for="cvdate">CV Date:</label>
                <input type="date" class="form-control" id="newcvdate" name="cv_dt" value="{{$lastBill -> cv_dt ?? '' }}">
            </div>


          <!-- Bill Type -->
          <div class="form-group col-5 ml-5">
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
          <div class="col-md-12 text-center mt-4 mb-5">
          <button type="submit" id="newbillsubmit" class="btn btn-primary" onclick="submitnewbillForm(event)">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Upload images document and videos -->
<div class="modal fade" id="uploadimgmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 90%;" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal content goes here -->
            <form action="{{ url('uploadimgdocvdo') }}" id="uploadForm" enctype="multipart/form-data" method="post">
            @csrf
                              <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 form-group">
 <!-- Hidden input for t_bill_Id -->
                  <input type="hidden" id="rabillid" name="t_bill_Id" value="{{$tbillid}}">

                                <label for="photo1" class="font-weight-bold">Photo 1:</label>
                                <input type="file" class="form-control image-input" id="newphoto1" name="photo1" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto1" src="" alt="Previous Photo" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo1" data-preview="#previewPhoto1" onclick="deleteFile(this)">❌</span>

                            </div> 

                            <div class="col-md-3 form-group">
                            <label for="photo2" class="font-weight-bold">Photo 2:</label>
                                <input type="file" class="form-control image-input" id="newphoto2" name="photo2" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto2" src="" alt="Previous Photo2" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo2" data-preview="#previewPhoto2" onclick="deleteFile(this)">❌</span>

                            </div>
                            <div class="col-md-3 form-group">
                            <label for="photo3" class="font-weight-bold">Photo 3:</label>
                                <input type="file" class="form-control image-input" id="newphoto3" name="photo3" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto3" src="" alt="Previous Photo3" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo3" data-preview="#previewPhoto3" onclick="deleteFile(this)">❌</span>

                            </div>
                            <div class="col-md-3 form-group">
                            <label for="photo4" class="font-weight-bold">Photo 4:</label>
                                <input type="file" class="form-control image-input" id="newphoto4" name="photo4" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto4" src="" alt="Previous Photo4" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo4" data-preview="#previewPhoto4" onclick="deleteFile(this)">❌</span>

                            </div>
                            <div class="col-md-3 form-group">
                            <label for="photo5" class="font-weight-bold">Photo 5:</label>
                                <input type="file" class="form-control image-input" id="newphoto5" name="photo5" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto5" src="" alt="Previous Photo5" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo5" data-preview="#previewPhoto5" onclick="deleteFile(this)">❌</span>

                          </div>
                        </div>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="documents1" class="font-weight-bold">Document 1:</label>
            <input type="file" class="form-control document-input" id="newdocuments1" name="documents1" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
            <a href="#" class="document-link" target="_blank" id="documentLink1">View Document</a>
            <span class="delete-btn" style="cursor: pointer;" data-target="doc1" data-preview="#documentLink1" onclick="deleteFile(this)">❌</span>
        </div>

        <div class="col-md-3 form-group">
            <label for="documents2" class="font-weight-bold">Document 2:</label>
            <input type="file" class="form-control document-input" id="newdocuments2" name="documents2" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
            <a href="#" class="document-link" target="_blank" id="documentLink2">View Document</a>
            <span class="delete-btn" style="cursor: pointer;" data-target="doc2" data-preview="#documentLink2" onclick="deleteFile(this)">❌</span>

        </div>

        <div class="col-md-3 form-group">
           <label for="documents3" class="font-weight-bold">Document 3:</label>
           <input type="file" class="form-control document-input" id="newdocuments3" name="documents3" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
           <a href="#" class="document-link" target="_blank" id="documentLink3">View Document</a>
           <span class="delete-btn" style="cursor: pointer;" data-target="doc3" data-preview="#documentLink3" onclick="deleteFile(this)">❌</span>

         </div>

    </div>

    <div class="row">
    <!-- Additional Document Row 1 -->

    <div class="col-md-3 form-group">
        <label for="documents4" class="font-weight-bold">Document 4:</label>
        <input type="file" class="form-control document-input" id="newdocuments4" name="documents4" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink4">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc4" data-preview="#documentLink4" onclick="deleteFile(this)">❌</span>

    </div>

    <div class="col-md-3 form-group">
        <label for="documents5" class="font-weight-bold">Document 5:</label>
        <input type="file" class="form-control document-input" id="newdocuments5" name="documents5" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink5">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc5" data-preview="#documentLink5" onclick="deleteFile(this)">❌</span>

    </div>

    <div class="col-md-3 form-group">
        <label for="documents6" class="font-weight-bold">Document 6:</label>
        <input type="file" class="form-control document-input" id="newdocuments6" name="documents6" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink6">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc6" data-preview="#documentLink6" onclick="deleteFile(this)">❌</span>

    </div>
    
    <div class="col-md-3 form-group">
        <label for="documents7" class="font-weight-bold">Document 7:</label>
        <input type="file" class="form-control document-input" id="newdocuments7" name="documents7" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink7">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc7" data-preview="#documentLink7" onclick="deleteFile(this)">❌</span>

    </div>

</div>

<div class="row">
    <!-- Additional Document Row 2 -->

    <div class="col-md-3 form-group">
        <label for="documents8" class="font-weight-bold">Document 8:</label>
        <input type="file" class="form-control document-input" id="newdocuments8" name="documents8" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink8">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc8" data-preview="#documentLink8" onclick="deleteFile(this)">❌</span>

    </div>

    <div class="col-md-3 form-group">
        <label for="documents9" class="font-weight-bold">Document 9:</label>
        <input type="file" class="form-control document-input" id="newdocuments9" name="documents9" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink9">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc9" data-preview="#documentLink9" onclick="deleteFile(this)">❌</span>

    </div>

    <div class="col-md-3 form-group">
        <label for="documents6" class="font-weight-bold">Document 10:</label>
        <input type="file" class="form-control document-input" id="newdocuments10" name="documents10" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink10">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc10" data-preview="#documentLink10" onclick="deleteFile(this)">❌</span>

    </div>


    <div class="col-md-3 form-group">
              <label for="video" class="font-weight-bold">Video:</label>
              <input type="file" class="form-control video-input" id="newvideo" name="video" accept="video/*">
            <div class="video-container" style="width: 250px; height: 240px; overflow: hidden;">
               <video id="videoPreview" controls style="width: 100%; height: 100%;"></video>
           </div>
           <span class="delete-btn" style="cursor: pointer;" data-target="vdo" data-preview="#videoPreview" onclick="deleteFile(this)">❌</span>

        </div>
</div>
                    </div>
                </div>
                <div class="modal-footer1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="enlarged-image-modal">
    <span class="close-enlarged-image">&times;</span>
    <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>


<!-- Modal for the  Upload work hand over certificate  -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Work HandOver Certificate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="certificate_file">Choose File:</label>
                        <input type="hidden" id="billid" name="t_bill_Id" value="{{ $lastbillid }}">
                        <input type="file" class="form-control-file" id="certificate_file" name="certificate_file" accept=".jpeg, .jpg, .pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="uploadWHOC()">Upload</button>
                </div>
        </div>
    </div>
</div>


<!--  these pop up alert for when photos/image/document uploads  -->
@if(Session::has('success'))
    <script>
         swal({
            title: "Success",
            text: "Files Uploaded Succesfully",
            icon: "success",
            button: "OK",
            closeOnClickOutside: false,
            closeOnEsc: false,
        });
    </script>
@endif


<!--  -->
@if(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ Session::get('error') }}'
        });
    </script>
@endif<!-- Your form and other content -->



<script>
      
  function showNewBill() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    // Retrieve the selected option value
    var selectedOption = $('#mySelect').val();
    // Retrieve the value of the workid input element
    var workidValue = $('#workid').val();
    var billtype =$('#billtype').val();
    $.ajax({
      url: '/Newbills', // Replace with your actual route for creating a new bill
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

        var date180daysAgo=response.date180DaysAgo;
        console.log(date180daysAgo);
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
  var maxDate=Newbilldata.measdtToo;
 var billdate= Newbilldata.Bill_Dt;
 console.log(minDate,maxDate);
 var maxParts = maxDate.split("-");
if (maxParts.length === 3) {
    var maxDay = maxParts[0];
    var maxMonth = maxParts[1];
    var maxYear = maxParts[2];

    var formattedMaxDate = maxYear + "-" + maxMonth + "-" + maxDay;

    // Set the maximum attribute of the input element
    $('#newbilldate').attr('max', formattedMaxDate);
    $('#measdtfr').attr('max', formattedMaxDate);
}


 var parts = minDate.split("-");
if (parts.length === 3) {
    var day = parts[0];
    var month = parts[1];
    var year = parts[2];

    // Convert the date to "yyyy-MM-dd" format
    var formattedDate = year + "-" + month + "-" + day;

    console.log(formattedDate);
    // Set the minimum attribute of the input element
  
    var minDateCondition = formattedDate;
    var mindate = minDateCondition.split("-");
    mindate.length === 3;
    var day1 = mindate[0];
    var month1 = mindate[1];
    var year1 = mindate[2];
    var mdate=year1 + "-" + month1 + "-" + day1;
    $('#newbilldate').attr('min', formattedDate);
$('#measdtfr').attr('min', formattedDate);

//$('#measdtupto')


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


  
   
  $('#newrabillno').removeAttr('disabled');
  $('#newbilldate').removeAttr('disabled');
  $('#newbillamt').removeAttr('disabled');
  $('#newrecamt').removeAttr('disabled');
  //$('#newnetamt').removeAttr('disabled');
}
else{

  var miinDate = response.lastbill.Bill_Dt;
  var minbildate=Newbilldata.measdtfrom;
  var maxBillDate=Newbilldata.measdtToo;

  console.log(minbildate,maxBillDate);
  var parts = maxBillDate.split("-");
if (parts.length === 3) {
    var day = parts[0];
    var month = parts[1];
    var year = parts[2];

    // Convert the date to "yyyy-MM-dd" format
    var formattedDate = year + "-" + month + "-" + day;

    // Set the maximum attribute of the input element
    $('#newbilldate').attr('max', formattedDate);
    $('#measdtfr').attr('max', formattedDate);
}

  var parts = minbildate.split("-");
if (parts.length === 3) {
    var day = parts[0];
    var month = parts[1];
    var year = parts[2];

    // Convert the date to "yyyy-MM-dd" format
    var formattedDate = year + "-" + month + "-" + day;

    // Set the minimum attribute of the input element
    $('#newbilldate').attr('min', formattedDate);
    $('#measdtfr').attr('min', formattedDate);

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
  //$('#measdtfr').val(Newbilldata.measdtfrom);
  //$('#measdtfr').attr('min', miinDate);
 // $('#measdtfr').attr('min', date180daysAgo);
  $('#gstrate').val(Newbilldata.gst_rt);
  $('#pbilldt').val(Newbilldata.p_bill_dt);
  // Combine both conditions by selecting the minimum of the two dates
//var mindatecondition = miinDate < date180daysAgo ? miinDate : date180daysAgo;
var mindatecondition = miinDate;

console.log(minDateCondition);
var minndate = mindatecondition.split("-");
    minndate.length === 3;
    var day2 = minndate[0];
    var month2 = minndate[1];
    var year2 = minndate[2];
    var midate=year2 + "-" + month2 + "-" + day2;
  


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

  //measurement dt upto greatere then measurement date from
  // Assuming this code is executed after the document is ready
$(document).ready(function () {
    // Assuming #measdtfr and #measdtupto are input elements with type 'date'
    $('#measdtfr').on('change', function () {
        var selectedDate = $(this).val(); // Get the selected date from #measdtfr

        if (selectedDate) {
            // Update the minimum date for #measdtupto
            $('#measdtupto').attr('min', selectedDate);
        }
    });
});


  //enable new button function
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

//measuremant date upto update
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

// Call the function initially and whenever the dropdown selection changes
enableNewButton();
$('#rabillno').change(enableNewButton);




// <!-- new bill submit ajax -->
// <!-- submit new bill ajax script -->
  
  

      // Function to handle the form submission
      // Function to handle the form submission
function submitnewbillForm(event) {
    event.preventDefault(); // Prevent form submission


  



    // Serialize the form data
    var formData = $('#newBillForm').serialize();
   console.log(formData);
    // Add the workidValue to the formData


    // Display a confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to create a new bill?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, create it!'
    }).then((result) => {
        if (result.isConfirmed) {

             // Perform your desired actions here
      // For example, you can retrieve the form data and perform an AJAX request
          // Disable the submit button to prevent multiple submissions
          $('#newbillsubmit').prop('disabled', false);

$('#newrabillno').prop('disabled', false);
$('#newbillamt').prop('disabled', false);
$('#newnetamt').prop('disabled', false);

            // User clicked "Yes, create it!" button
            // Continue with the AJAX request

            // ... your existing code for disabling elements goes here ...
           // var sweetAlertConfig; // Declaration of sweetAlertConfig
            // Serialize the form data
            var formData = $('#newBillForm').serialize();

              // Perform the AJAX request
      $.ajax({
        url: '/Newbillsubmit', // Replace with your actual endpoint URL
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
         $('#billsbody').empty();

         var row = '';
response.billdata.forEach(function(bill) {
    // Format dates using JavaScript Date object methods
    var billDate = new Date(bill.Bill_Dt);
    var measDtFrom = new Date(bill.meas_dt_from);
    var measDtUpto = new Date(bill.meas_dt_upto);
    var cvDate = new Date(bill.cv_dt);

    function formatDate(dateString) {
    if (!dateString) {
        return ''; // If dateString is empty or null, return empty string
    }

    var date = new Date(dateString);

    if (isNaN(date.getTime())) {
        return ''; // If date is invalid, return empty string
    }

    var day = ('0' + date.getDate()).slice(-2);
    var month = ('0' + (date.getMonth() + 1)).slice(-2); // Month is zero-based
    var year = date.getFullYear();

    return day + '-' + month + '-' + year;
}    row +=
        `<tr>
            <td style="font-weight: bold;">${bill.t_bill_Id}<br></td>
            <td><div style="font-weight: bold;">${bill.t_bill_No}</div><br>${formatDate(bill.Bill_Dt)}</td>
            <td>${bill.bill_amt}<br><br>${bill.c_billamt || 0.00}<br><br>${bill.p_bill_amt || 0.00}</td>
            <td>${bill.rec_amt || 0.00}</td>
            <td>${bill.net_amt || 0.00}<br><br>${bill.c_netamt || 0.00}<br><br>${bill.p_net_amt || 0.00}</td>
            <td>${formatDate(bill.meas_dt_from)}<br><br>${formatDate(bill.meas_dt_upto)}</td>
            <td>${bill.cv_no || ''}</td>
            <td>${formatDate(bill.cv_dt)}</td>
            <td>${formatDate(bill.previousbilldt)}</td>
            <td><input type="checkbox" ${bill.final_bill == 1 ? 'checked' : ''} disabled></td>
            <td class="button-container">
            <div class="vertical-inline">
                <form action="/viewbill/${bill.t_bill_Id}" method="GET">
                    <button type="submit" class="btn emb-button mb-2" title="VIEW BILL">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </form>

                @if(auth()->user()->usertypes === "SO")
                <form action="/editbill/${bill.t_bill_Id}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-primary mb-2" ${bill.is_current === 0 ? 'disabled' : ''} title=" EDIT BILL">
                        <i class="fa fa-pencil" style="color:white;"></i>
                    </button>
                </form>

                <form id="deleteBillForm_${bill.t_bill_Id}" action="/delete-bill/${bill.t_bill_Id}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-danger mb-2" ${bill.is_current === 0 ? 'disabled' : ''} title="DELETE BILL">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </form>
                @endif
            </div>

            <div class="inline">
                <form action="/emb/${bill.t_bill_Id}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary mb-2" ${bill.is_current === 0 ? 'disabled' : ''} title=" EDIT BILL">
                        EMB<i class="fa fa-pencil" style="color:white;"></i>
                    </button>
                </form>
                 @if(auth()->user()->usertypes === "SO" && in_array($mbstatusSo, [ 2,3,4,5,6,7]) && $mbstatus == 2)

                <form action="ExcessStatement/${bill.t_bill_Id}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary mb-2" ${bill.is_current === 0 ? 'disabled' : ''} title="EXCESS">
                    Excess<i class="fa fa-pencil" style="color:white;"></i>
                    </button>
                </form>
                @endif
                @if (in_array($mbstatusSo, [5,6,7]) && ($mbstatus >= 2 && $mbstatus < 5 && !($mbstatusSo == 7 && $mbstatus == 6)) || ($mbstatus >= 11 && $mbstatus <= 13))   

                 <form action="Abstract/${bill.work_id}" method="GET">
                                     @csrf
                                   <button type="submit" class="btn btn-primary mb-2" ${bill.is_current === 0 ? 'disabled' : ''} title="Abstract">
                                   Abstract<i class="fa fa-pencil" style="color:white;"></i>
                                   </button>
                                   </form>
                                   @endif

              

            </div>
            <div class="inline">
            <a href="/report/${bill.t_bill_Id}" class="btn btn-primary mb-2" title="REPORT">
    REPORT <i class="fa-solid fa-file fa-beat-fade" style="color: #f0f0f0;"></i>
</a>
                                  @if(auth()->user()->usertypes === "SO" && in_array($mbstatusSo, [1,2, 3, 4,5,6,7]) && $mbstatus == 2)

<form method="get" action="/ListRecoveryStatement" >
                                    @csrf
                                    <input type="hidden" name="t_bill_Id" value="${bill.t_bill_Id}">
                                    <button type="submit" class="btn btn-primary btn-sm mb-2" ${bill.is_current === 0 ? 'disabled' : ''}>Recovery</button>
                                  </form>
                                  @endif

                                  @if(auth()->user()->usertypes === "SO" && in_array($mbstatusSo, [0,1,2, 3, 4,5,6,7] ) && $mbstatus == 2)

                                  <form method="post" action="/updatematerialcon" >
                                    @csrf
                                    <input type="hidden" name="t_bill_Id" value="${bill.t_bill_Id}">
                                    <input type="hidden" name="workid" id="workid" value="${bill.work_id}">
                                    <button type="submit" class="btn btn-primary btn-sm mb-2" ${bill.is_current === 0 ? 'disabled' : ''}>Material consumption</button>
                                  </div>
                                </form>
                                @endif

                                  @if(auth()->user()->usertypes === "SO" && in_array($mbstatusSo, [3,4,5,6,7]) && $mbstatus == 2)

                                <form method="post"  action="/royaltycons" >
                                    @csrf
                                    <input type="hidden" name="t_bill_Id" value="${bill.t_bill_Id}">
                                    <input type="hidden" name="workid" id="workid" value="${bill.work_id}">
                                    <button type="submit" class="btn btn-primary btn-sm mb-2" ${bill.is_current === 0 ? 'disabled' : ''}>Royalty charges</button>
                                  </div>
                                </form>
                                @endif
                                  </div>
          </td>
        </tr>`;
});

$('#billsbody').html(row);

          // Close the modal after initiating the AJAX request
          $('#newBillModal').modal('hide');
          progressbar() ;
                    progressbarSO();
                    
 var workid = response.workId; // Assuming you receive the workid from the server
      window.location.href = "/billlist/" + workid;
         },
                error: function (xhr, status, error) {
                    // Handle the error response here
                }
            });

            
        }
        else {
            // User clicked "Cancel" in the confirmation dialog
            // Close the modal without initiating the AJAX request
            $('#newBillModal').modal('hide');
        }
        
       
         // Refresh the page after the modal is closed
        //   location.reload();
    });
}


//update the final bill
function updateFinalBill(checkbox) {
  // Get the checkbox value (1 if checked, 0 if unchecked)
  var value = checkbox.checked ? 1 : 0;
  var workid = $('#workid').val(); // Get the value of t_bill_Id
  if (value === 1) {
    // Display confirmation dialog
    Swal.fire({
      title: 'Are you sure?',
      text: 'Do you want to mark this as the final bill?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        // Show input dialog for work completion
        
         var measdtfr = document.getElementById('measdtfr').value;
         var billdt = document.getElementById('newbilldate').value;

        Swal.fire({
          title: 'Work Completion',
          html: `
            <div class="form-group">
              <label for="workCompleted">Work is Completed:</label>
              <input style="margin-left: 10px; transform: scale(2);" type="checkbox" id="workCompleted" class="form-check-input" >
            </div>
            <div class="form-group">
              <label for="workCompletedDate">Work Complete Date:</label>
              <input type="date" id="workCompletedDate" class="form-control">
            </div>
          `,
          showCancelButton: true,
          confirmButtonText: 'Submit',
          cancelButtonText: 'Cancel',
           didOpen: () => {
           // Set the minimum date for the Work Completed Date input
            document.getElementById('workCompletedDate').min = measdtfr;
              // Set the maximum date for the Work Completed Date input
            document.getElementById('workCompletedDate').max = billdt;
        },
          preConfirm: () => {
            return {
              workCompleted: document.getElementById('workCompleted').checked,
              workCompletedDate: document.getElementById('workCompletedDate').value
            }
          }
        }).then((result) => {
          // Handle submission
          if (result.isConfirmed) {
            // Make an AJAX request to update the database
            $.ajax({
              url: '/update-final-bill',
              method: 'POST',
              data: {
                final_bill: value,
                work_completed: result.value.workCompleted ? 1 : 0,
                work_completed_date: result.value.workCompletedDate,
                workid: workid, // Include t_bill_Id in the data
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
          } else {
            // User clicked Cancel, uncheck the checkbox
            $('#finalbill').prop('checked', false);
          }
        });
      } else {
        // User clicked No, uncheck the checkbox
        $('#finalbill').prop('checked', false);
      }
    });
  } else {
    // Make an AJAX request to update the database directly
    $.ajax({
      url: '/update-final-bill',
      method: 'POST',
      data: {
        final_bill: value,
        workid: workid, // Include t_bill_Id in the data
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
}


//delete bill function 

// Event delegation to handle form submissions
document.addEventListener('submit', function(event) {
    if (event.target && event.target.id.startsWith('deleteBillForm_')) {
        event.preventDefault(); // Prevent default form submission

        const formId = event.target.id;
        const billId = formId.split('_')[1]; // Extract the bill ID from the form ID

        Swal.fire({
            title: 'Confirmation',
            text: 'Are you sure you want to delete the bill?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form if confirmed
                document.getElementById(formId).submit();
            }
        });
    }
});

 
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




$(document).ready(function() {
  progressbar();
            progressbarSO();

});

function progressbar() {
  var csrfToken = $('meta[name="csrf-token"]').attr('content');
  var workid = $('#workid').val();
  console.log(workid);
  $.ajax({
    url: "{{ url('progressbar') }}",
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN':csrfToken
 // Set the CSRF token in the request headers
    },
    data: { workId: workid },
    success: function(response) {
      // Inject the loaded content into the modal
console.log(response);
var stepvalue=response.mbstatus;
console.log(stepvalue);

// Retrieve the step value from your database or user input
const targetStepValue = stepvalue; // Change this to your desired step value

// Get all steps with their associated values
const steps = document.querySelectorAll('.wizard-progress .step');

// Loop through each step
steps.forEach(step => {
  const stepValue = parseInt(step.getAttribute('data-step-value'));

  // Get the node associated with the step
  const node = step.querySelector('.node');

  // Check if the current step value matches or is less than the target step value
  if (stepValue <= targetStepValue) {
    step.classList.add('complete');
    node.classList.add('complete');
    // node.classList.add('complete');

  } else {
    step.classList.remove('complete');
    node.classList.remove('complete');
  }

  // Additional logic specifically for the node
  if (stepValue < targetStepValue) {
    step.classList.add('less-than-target');
  } else {
    step.classList.remove('less-than-target');
  }
});      // Show the modal
    },
    error: function(xhr, status, error) {
      // Handle errors here
      console.error(xhr, status, error);
    }
  });
}


function progressbarSO() {
  var csrfToken = $('meta[name="csrf-token"]').attr('content');
  var workid = $('#workid').val();
  console.log(workid);
  $.ajax({
    url: "{{ url('progressbarSO') }}",
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN':csrfToken
 // Set the CSRF token in the request headers
    },
    data: { workId: workid },
    success: function(response) {
      // Inject the loaded content into the modal
console.log(response);
var stepvalue=response.mbstatus;
console.log("mbstatus",stepvalue);

// Retrieve the step value from your database or user input
const targetStepValue = stepvalue; // Change this to your desired step value

// Get all steps with their associated values
const steps = document.querySelectorAll('.wizard-progressSO .step');

// Loop through each step
steps.forEach(step => {
  const stepValue = parseInt(step.getAttribute('data-step-value'));

  // Get the node associated with the step
  const node = step.querySelector('.node');

  // Check if the current step value matches or is less than the target step value
  if (stepValue <= targetStepValue) {
    step.classList.add('complete');
    node.classList.add('complete');
    // node.classList.add('complete');

  } else {
    step.classList.remove('complete');
    node.classList.remove('complete');
  }

  // Additional logic specifically for the node
  if (stepValue < targetStepValue) {
    step.classList.add('less-than-target');
  } else {
    step.classList.remove('less-than-target');
  }
});      // Show the modal
    },
    error: function(xhr, status, error) {
      // Handle errors here
      console.error(xhr, status, error);
    }
  });
}




function uploadimages() {
  console.log('ok');
    var tbillid = $('#phtoT_bill_id').val();
    console.log(tbillid);

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

  // Check if photo1 path is not null before updating the image source
  if (paths.photo1 !== null) {
    $('#previewPhoto1').attr('src', paths.photo1);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto1').attr('src', '');
  }
  if (paths.photo2 !== null) {
    $('#previewPhoto2').attr('src', paths.photo2);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto2').attr('src', '');
  }
  if (paths.photo3 !== null) {
    $('#previewPhoto3').attr('src', paths.photo3);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto3').attr('src', '');
  }
  if (paths.photo4 !== null) {
    $('#previewPhoto4').attr('src', paths.photo4);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto4').attr('src', '');
  }
  if (paths.photo5 !== null) {
    $('#previewPhoto5').attr('src', paths.photo5);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto5').attr('src', '');
  }


  if (document.doc1 !== null) {
    // If document path exists, update the link href
    $('#documentLink1').attr('href', document.doc1);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink1').attr('href', '#');
}

if (document.doc2 !== null) {
    // If document path exists, update the link href
    $('#documentLink2').attr('href', document.doc2);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink2').attr('href', '#');
}

if (document.doc3 !== null) {
    // If document path exists, update the link href
    $('#documentLink3').attr('href', document.doc3);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink3').attr('href', '#');
}

if (document.doc4 !== null) {
    // If document path exists, update the link href
    $('#documentLink4').attr('href', document.doc4);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink4').attr('href', '#');
}
if (document.doc5 !== null) {
    // If document path exists, update the link href
    $('#documentLink5').attr('href', document.doc5);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink5').attr('href', '#');
}
if (document.doc6 !== null) {
    // If document path exists, update the link href
    $('#documentLink6').attr('href', document.doc6);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink6').attr('href', '#');
}

if (document.doc7 !== null) {
    // If document path exists, update the link href
    $('#documentLink7').attr('href', document.doc7);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink7').attr('href', '#');
}
if (document.doc8 !== null) {
    // If document path exists, update the link href
    $('#documentLink8').attr('href', document.doc8);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink8').attr('href', '#');
}
if (document.doc9 !== null) {
    // If document path exists, update the link href
    $('#documentLink9').attr('href', document.doc9);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink9').attr('href', '#');
}
if (document.doc10 !== null) {
    // If document path exists, update the link href
    $('#documentLink10').attr('href', document.doc10);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink10').attr('href', '#');
}

if (videoPath !== null)
 {
                // If video path exists, update the video source
                $('#videoPreview').attr('src', videoPath);
            } else {
                // If video path is null, you can handle it as needed
                // For example, disable the video or set a placeholder
                $('#videoPreview').attr('src', ''); // Set an empty source or a placeholder
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

//this code is here after photo/doc make it not uploaded but only click that button that time here using ajax so page is not refrashaed mbstatus_so not updated so bellow code make it page refrash
// Event listener for modal hidden event
$('#uploadimgmodal').on('hidden.bs.modal', function (e) {
    // Reload the page after the modal is completely hidden
    window.location.reload();
});
//this code is here after photo/doc make it not uploaded but only click that button that time here using ajax so page is not refrashaed mbstatus_so not updated so bellow code make it page refrash




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
        //hideMediaPreviews();
        //hideVideoPreview(); // Hide video when the modal is closed
    }
});

// Close the video preview when the close button is clicked
$('body').on('click', '.close-enlarged-image', function() {
    hideLargeImage();
    //hideMediaPreviews();
    //hideVideoPreview(); // Hide video when the modal is closed
});


  // Prevent form submission when the Cancel button is clicked
  $('.modal-footer .btn-secondary, .modal-header .close').click(function(e) {
    e.preventDefault();
    hideLargeImage();
    resetInputValues();
    //hideVideoPreview();
  });



function deleteFile(element) {
        var targetInput = $(element).data("target");
        var previewElement = $(element).data("preview");

        // Get the identifier from the target input
        var identifier = targetInput;

        // Clear the file input
        $(targetInput).val('');

        // Clear the preview element (if it's an image or video)
        if ($(previewElement).is("img") || $(previewElement).is("video") || $(previewElement).is("a")) {
    // Set the appropriate attribute to clear the preview
    if ($(previewElement).is("img") || $(previewElement).is("video")) {
        $(previewElement).attr("src", "");
    } else if ($(previewElement).is("a")) {
        // Assuming the document link is an anchor (<a>) tag
        $(previewElement).attr("href", "");
        $(previewElement).text("No Document"); // Optionally change the text
    }
}

        // Delete the record from the database
        var billId = $("#rabillid").val(); // Get the t_bill_Id from the hidden input

        // Assuming you are using jQuery.ajax for making an AJAX request to the server
        $.ajax({
            url: '/delete-imgdoc', // Replace with the actual URL for your delete route
            method: 'POST',
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            data: {
                identifier: identifier,
                billId: billId
            },
            success: function (response) {
                // Handle success
                console.log("Deleted: " + identifier);
                Swal.fire({
            icon: 'success',
            title: 'Deleted successfully!',
            showConfirmButton: false,
            timer: 1500 // Close the alert after 1.5 seconds
        });
            },
            error: function (error) {
                // Handle error
                console.error("Error deleting: " + identifier);
            }
        });
    }








// upload function for work hand over certificate 
function uploadWHOC() {
    console.log('og');

    var file = $('#certificate_file').prop('files')[0];
    console.log(file);

    var billId = $("#billid").val(); // Get the t_bill_Id from the hidden input

    console.log(billId);
    var formData = new FormData();
    formData.append('tbillid', billId);
    formData.append('File', file);

    $.ajax({
        url: '/uploadworkhandovercertfi',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // Handle success
            Swal.fire({
    icon: 'success',
    title: 'Upload Work handover Certificate successfully!',
    showConfirmButton: true,
    confirmButtonText: 'OK',
    timer: 5000 // Close the alert after 5 seconds
});


$('#uploadModal').modal('hide');

        

$('#certificate_file').val('');
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error("upload document not possible");
        }
    });
}




</script>

@endsection
