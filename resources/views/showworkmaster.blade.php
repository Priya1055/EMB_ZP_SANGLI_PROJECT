@extends("layouts.header")
@section('content')


  <!-- //tab link -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
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

.zp_btn_tab:not(.active) 
{
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
  .container-fluid
   {
    border: 2px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
  }

  /* Style the custom checkbox when checked */
  .form-check-input:checked
   {
    background-color: blue;
    border-color: blue;
  }

  /* Hide the default checkbox label text */
  .form-check-label {
    display: inline-block;
    margin-left: 5px;
  }
  /* //checkbox css complete */

  /* //paggination number appy */
/* .pagination-btn {
        background-color: #f5f5f5;
        color: #333;
        border: 1px solid #ddd;
        padding: 5px 10px;
        margin: 2px;
        cursor: pointer;
    }

    .pagination-btn.active {
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
    } */
/* //paggination number appy style  */

    </style>
    <!-- <link rel="stylesheet" href="work_master.js"> -->
@include('sweetalert::alert')


        <ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $DSWorkmaster->Work_Id ?? '') }}">Bill</a></li>
        </ul>


          <div class="avatar"> 
  <a href="{{ url('/listworkmasters')}}"  style="margin-bottom:10px;">
            <i class="fa-solid fa-circle-arrow-left ml-3 mb-1" style="color: black; font-size: 35px;"></i>
  </a>
          <span class="tip" style="font-size:15px;">BACK</span></div>

  
  


<!-- <div class="container"> -->
      <div class="card" id="backbglogo">
                            <div class="card-header" >
                                    <h3>Work Master</h3>
                            </div>

<!--<h2 style="text-align: center;"><b>Work Master</b></h2>-->
    <div class="container-fluid">
        <form action="workmaster"  id="my-form"  method="post">
            @csrf
              <div class="row m-2">
                                  <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                      <label for="div_name" class="font-weight-bold">Division Name:</label>
                                  </div>
                                  <div class="col-12 col-sm-4 col-md-4 col-lg-4 ">
                                    <input type="text" id="div_name" class="form-control" style="max-width: 280px;" name="Div" readonly value="{{$DSWorkmaster->Div ?? ''}}">
                                  </div>
                                  <div class="col-sm-2 col-md-2 col-lg-2">
                                      <label for="" class="font-weight-bold">Work Id:</label>
                                  </div>
                                  <div class="col-sm-3 col-md-3 col-lg-4">
                                      <input type="number" id="" class="form-control" name="Work_Id" disabled value="{{$DSWorkmaster->Work_Id ?? ''}}">
                                  </div>
              </div>

            <div class="row m-2">
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                        <label for="div_name" class="font-weight-bold">Sub Division Name:</label>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                      <input type="text" id="" class="form-control" style="max-width: 280px;" name="Sub_Div" readonly value="{{$DSWorkmaster->Sub_Div ?? ''}}">

                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                        <label for="" class="font-weight-bold">Fund Head:</label>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
                                        <input type="text" id="" class="form-control" name="'F_H" disabled value="{{$DSWorkmaster->F_H_Code ?? ''}}">
                                    </div>
            </div>

            <div class="row m-2">
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                        <label for="" class="font-weight-bold">Name of Work:</label>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <textarea name="Work_Nm" class="form-control" rows="3" cols="53" disabled >{{$DSWorkmaster->Work_Nm ?? ''}}</textarea>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                      <label for="" class="font-weight-bold"> name of work Marathi </label>

                                    <!-- <label for="" class="font-weight-bold"><small>Amount Put to Tender:</small></label> -->
                                  </div>
                                    <div class="col-sm-3 col-md-3 col-lg-4">
                                        <textarea name="Work_Nm_M" class="form-control" disabled rows="3" cols="53">{{$DSWorkmaster->Work_Nm_M }}</textarea>

                                              <!-- <input type="text" id="" class="form-control" name=""  > -->

                                                <!-- <input type="text" id="Amount_Put_to_Tender" class="form-control" name="Tnd_Amt" value="{{$DSWorkmaster->Tnd_Amt }}" > -->
                                    </div>
            </div>

            <div class="row m-2">
                          <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                    <label for="workType" class="font-weight-bold">Type of Work</label>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <input type="text" id="workType" class="form-control" style="max-width: 280px;" name="workType" 
                            value="{{$DSWorkmaster->Work_Type}}" disabled>
                        </div>           
                         <div class="col-sm-2 col-md-2 col-lg-2">
                                    <label for="" class="font-weight-bold">Area of Work </label>
                                    <!-- <label for="" class="font-weight-bold"><small>Amount Put to Tender:</small></label> -->
                        </div>
                          <div class="col-sm-3 col-md-3 col-lg-4">
                                    <input type="text" id="" class="form-control" name="workarea" value="{{$DSWorkmaster->Work_Area }}" disabled>

                          </div>

            </div>


            <div class="row m-2">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                            <label for="" class="font-weight-bold ">SSR Year:</label>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <!-- <input type="text" id="" class="form-control" name="DSR_year"> -->
                            <input type="text" id="" readonly class="form-control form-select" style="max-width: 280px;" name="SSR_year" value="{{$DSWorkmaster->SSR_Year }}">

                            <!-- <select id="" class="form-control form-select" style="max-width: 280px;" name="DSR_year">
                                            <option></option>
                                        </select> -->
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                          <label for="" class="font-weight-bold">Amount Put to Tender:</label>
                        </div>
                         <div class="col-sm-3 col-md-3 col-lg-4">
                                    <input type="text" id="Amount_Put_to_Tender" readonly class="form-control" name="Tnd_Amt" value="{{$DSWorkmaster->Tnd_Amt }}" >
                        </div>

            </div>

            <div class="row m-2">
                          <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                              <label for="" class="font-weight-bold">Agency Name</label>
                          </div>
                          <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <input type="text" id="" class="form-control" style="max-width: 280px;" name="Agency_Nm" readonly value="{{$DSWorkmaster->Agency_Nm ?? ''}}">


                              <!-- <input type="text" id="" class="form-control" name="Agency_Nm" style="max-width: 420px;" > -->
                          </div>
                          <!-- <div class="col-sm-3 col-md-3 col-lg-2">
                                          <button class="btn btn-primary"disabled>Find Agency</button>
                          </div> -->
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
                          <!-- //tab content whole both tab involved -->
                    <div class="tab-content">
                                      <div id="home" class="tab-pane fade show active">


                                                      <div class="row">
                                                        <!-- Column 1 -->
                                                              <div class="col-12 col-md-3">
                                                                  <div class="form-group">
                                                                      <label for="AA_No">AA. No:</label>
                                                                      <input type="text" id="AA_No" disabled name="AA_No" class="form-control"
                                                                      placeholder="Enter A.A. No" value="{{$DSWorkmaster->AA_No }}">
                                                                  </div>
                                                              </div>
                                                        <!-- Column 2 -->
                                                              <div class="col-12 col-md-3">
                                                                  <div class="form-group">
                                                                      <label for="AA_Date">AA. Date:</label>
                                                                      <input type="text" id="AA_Date" name="AA_Date" class="form-control"
                                                                      placeholder="Enter A.A. Date" disabled value="{{$DSWorkmaster->AA_Dt }}">
                                                                  </div>
                                                              </div>
                                                        <!-- Column 3 -->
                                                            <div class="col-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label for="AA_Amount">AA. Amount:</label>
                                                                    <input type="text" id="AA_Amount" name="AA_Amount" class="form-control" 
                                                                    placeholder="Enter A.A. Amount" disabled value="{{$DSWorkmaster->AA_Amt }}">
                                                                </div>
                                                            </div>
                                                        <!-- Column 4 -->
                                                            <div class="col-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label for="AA_Authority">AA. Authority:</label>
                                                                    <input type="text" id="AA_Authority" name="AA_Authority" class="form-control"
                                                                    placeholder="Enter A.A. Authority" disabled value="{{$DSWorkmaster->AA_Authority }}">
                                                                </div>
                                                            </div>
                                                      </div>

                                                      <div class="row">
                                                        <!-- Column 1 -->
                                                                  <div class="col-12 col-md-3">
                                                                      <div class="form-group">
                                                                          <label for="AA_No">TS. No:</label>
                                                                          <input type="text" id="TS_No" name="TS_No" class="form-control" disabled placeholder="Enter A.A. No"
                                                                          value="{{$DSWorkmaster->TS_No }}">
                                                                      </div>
                                                                  </div>
                                                                  <!-- Column 2 -->
                                                                  <div class="col-12 col-md-3">
                                                                      <div class="form-group">
                                                                          <label for="AA_Date">TS. Date:</label>
                                                                          <input type="text" id="TS_Date" name="TS_Date" class="form-control" 
                                                                          disabled value="{{$DSWorkmaster->TS_Dt }}">
                                                                      </div>
                                                                  </div>
                                                                  <!-- Column 3 -->
                                                                  <div class="col-12 col-md-3">
                                                                      <div class="form-group">
                                                                          <label for="AA_Amount">TS Amount:</label>
                                                                          <input type="text" id="TS_Amount" name="TS_Amount" class="form-control"
                                                                          placeholder="Enter A.A. Amount" disabled value="{{$DSWorkmaster->TS_Amt }}">
                                                                      </div>
                                                                  </div>
                                                                  <!-- Column 4 -->
                                                                  <div class="col-12 col-md-3">
                                                                      <div class="form-group">
                                                                          <label for="AA_Authority">TS Authority:</label>
                                                                          <input type="text" id="TS_Authority" name="TS_Authority"
                                                                          class="form-control" disabled value="{{$DSWorkmaster->TS_Authority }}">
                                                                      </div>
                                                                  </div>
                                                      </div>

                                                      <div class="row">
                                                                <div class="col-12 col-md-3">
                                                                  <div class="form-group">
                                                                    <label for="WO_No">Work Order No:</label>
                                                                    <input type="text" id="WO_No" name="WO_No" class="form-control" disabled value="{{$DSWorkmaster->WO_No ?? ''}}" >
                                                                  </div>
                                                                </div>
                                                                <div class="col-12 col-md-3">
                                                                  <div class="form-group">
                                                                    <label for="Wo_Dt" class="wk_info2">Work Order Date:</label>
                                                                    <input type="date" id="Wo_Dt" name="Wo_Dt" class="form-control" disabled value="{{$DSWorkmaster->Wo_Dt ?? ''}}">
                                                                  </div>
                                                                </div>
                                                                <div class="col-12 col-md-3">
                                                                  <div class="form-group">
                                                                    <label for="">Work Order Amount</label>
                                                                    <input type="text" id="Period" name="WO_Amt" class="form-control wk_info1" disabled value="{{$DSWorkmaster->WO_Amt ?? ''}}">
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
                                                                  <label for="Above_Below">Below/Above Percentage:</label>
                                                                  <input type="text" id="Above_Below" name="Above_Below" class="form-control" disabled value="{{$DSWorkmaster->A_B_Pc ?? ''}}"
                                                                  >
                                                                </div>
                                                              </div>
                                                              <div class="col-12 col-md-3">
                                                                <div class="form-group">
                                                                  <label for="" class="ml-1">Below/Above</label>
                                                                  <input type="text" id="a_b" name="A_B_Pc" class="form-control" disabled value="{{$DSWorkmaster->Above_Below ?? ''}}">
                                                          
                                                                </div>
                                                              </div>
                                                              <div class="col-12 col-md-3">
                                                                <div class="form-group">
                                                                  <label for="">Time Limit:</label>
                                                                  <input type="text" id="Period" name="Period" class="form-control wk_info1" disabled value="{{$DSWorkmaster->Period ?? ''}}">
                                                                </div>
                                                              </div>
                                                              <div class="col-12 col-md-3">
                                                                <div class="form-group">
                                                                  <label for=""></label>
                                                                  <input type="text" id="Perd_Unit" name="Perd_Unit" class="form-control wk_info1" disabled value="{{$DSWorkmaster->Perd_Unit ?? ''}}">

                                                                </div>
                                                              </div>
                                                      </div>

                                                      <div class="row">
                                                        <!-- <div class="col-12 col-md-4">
                                                          <div class="form-group">
                                                            <label for="">Time Limit:</label>
                                                            <input type="text" id="Period" name="Period" class="form-control wk_info1" disabled value="{{$DSWorkmaster->Period ?? ''}}">
                                                          </div>
                                                        </div> -->
                                                        <!-- <div class="col-12 col-md-3">
                                                          <div class="form-group">
                                                            <label for=""></label>
                                                            <input type="text" id="Perd_Unit" name="Perd_Unit" class="form-control wk_info1" disabled value="{{$DSWorkmaster->Perd_Unit ?? ''}}">

                                                          </div>
                                                        </div> -->
                                                        <div class="col-12 col-md-3">
                                                          <div class="form-group">
                                                            <label for="Stip_Comp_Dt" class="wk_info4">Stipulated Date of Completion:</label>
                                                            <input type="date" id="Stip_Comp_Dt" name="Stip_Comp_Dt" class="form-control" disabled value="{{$DSWorkmaster->Stip_Comp_Dt ?? ''}}">
                                                          </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                          <div class="form-group">
                                                            <label for="tm_lm_extension">Time Limit Extension:</label>
                                                            <input type="text" id="tm_lm_extension" name="tm_lm_extension" class="form-control wk_info1" disabled value="{{$DSWorkmaster->tm_lm_extension ?? ''}}">
                                                          </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                          <div class="form-group">
                                                            <!-- <label for="" class="ml-1">Days</label> -->
                                                            <label for="" class="ml-3 wk_info3">Revised Date of Completion:</label>
                                                            <input type="date" id="rs_dt_comp" name="rs_dt_comp" class="form-control" disabled value="{{$DSWorkmaster->rs_dt_comp ?? ''}}">
                                                          </div>
                                                        </div>

                                                      </div>

                                                      <div class="row">
                                                          <!-- Taluka Dropdown -->
                                                            <div class="col-12 col-md-3">
                                                                  <div class="form-group">
                                                                      <label for="Taluka">Taluka:</label>
                                                                      <input type ="text" id="Taluka" name="Taluka" class="form-control" disabled  value="{{ $DSWorkmaster->Tal }}">
                                                                  </div>
                                                            </div>

                                                          <!-- Village Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                                <div class="form-group">
                                                                  <label for="Village">Village:</label>
                                                                  <input type="text" id="village" name="village" class="form-control" readonly value="{{ $DBVIllagename->Village }}">
                                                                </div>
                                                          </div>

                                                          <div class="col-12 col-md-3">
                                                                  <div class="form-group">
                                                                              <label for="PO_Name">MP:</label>
                                                                              <input type="text" id="mp" name="mp" class="form-control" disabled value="{{$DBMPNAME}}">
                                                                  </div>
                                                          </div>

                                                          <!-- Auditor Name Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                                    <div class="form-group">
                                                                              <label for="mla_Name">MLA:</label>
                                                                              <input type="text" id="mla" name="mla_Name" class="form-control" disabled value="{{$DBMLANAME}}">
                                                                    </div>
                                                          </div>
                                                      </div>

                                                      <div class="row">

                                                          <!-- PS Constituency Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                              <div class="form-group">
                                                                  <label for="ZP_Constituency">ZP Constituency:</label>
                                                                  <input type="text" class="form-control"  name="village" disabled value="{{$DBZPCONNAME}}">
                                                              </div>
                                                          </div>

                                                          <!-- ZP Constituency Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                              <div class="form-group">
                                                                  <label for="PS_Constituency">PS Constituency:</label>
                                                                  <input type="text" class="form-control"  name="village" disabled value="{{$DBPSCONNAME}}">

                                                              </div>
                                                          </div>
                                                      </div>

                                                      <div class="row">
                                                          <!-- E.E. Name Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                              <div class="form-group">
                                                                  <label for="EE_Name">E.E. Name:</label>
                                                                  <input type="text" id="EE_Name" disabled name="EE_Name" class="form-control" value="{{$DBEENAME}}">       
                                                              </div>
                                                          </div>

                                                          <!-- Dy.E. Name Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                              <div class="form-group">
                                                                  <label for="DyE_Name">Dy.E. Name:</label>
                                                                  <input type="text" id="DyE_Name" name="DyE_Name" disabled class="form-control" value="{{$DBDYENAME}}">        
                                                                </div>
                                                          </div>

                                                          <!-- S.O. Name Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                              <div class="form-group">
                                                                  <label for="SO_Name">S.O. Name:</label>
                                                                  <input type="text" id="SO_Name" name="SO_Name" disabled class="form-control" value="{{$DBSONAME}}">        
                                                                </div>
                                                          </div>
                                                              

                                                          <!-- S.D.C. Name Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                              <div class="form-group">
                                                                  <label for="SDC_Name">S.D.C. Name:</label>
                                                                  <input type ="text" id="SDC_Name" name="SDC_Name" disabled class="form-control" value="{{$DBSDCNAME}}">
                                                                  </select>
                                                              </div>
                                                          </div>
                                                      </div>

                                                      <div class="row">
                                                          <!-- P.O. Name Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label for="PO_Name">P.O. Name:</label>
                                                                <input type="text" id="PO_Name" name="PO_Name" disabled class="form-control" value="{{$DBPONAME}}">
                                                            </div>
                                                          </div>

                                                          <div class="col-12 col-md-3">
                                                              <div class="form-group">
                                                                    <label for="panm">P.A. Name:</label>
                                                                    <input type="text" id="panm" name="panm" disabled class="form-control" value="{{$DBPANAME}}">
                                                              </div>
                                                          </div>

                                                          <!-- Auditor Name Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                              <div class="form-group">
                                                                  <label for="DAO_Name">Accountant Name:</label>
                                                                  <input type="text" id="DAO_Name" name="DAO_Name" disabled class="form-control" value="{{$DBDAONAME}}">
                                                              </div>
                                                          </div>

                                                          <!-- Accountant Name Dropdown -->
                                                          <div class="col-12 col-md-3">
                                                                  <div class="form-group">
                                                                          <label for="AB_Name">Auditor Name:</label>
                                                                          <input type="text" id="AB_Name" name="AB_Name" disabled class="form-control" value="{{$DBABNAME}}">
                                                                  </div>
                                                          </div>
                                                      </div>

                                                      <div class="row">
                                                                      <div class="col-12 col-md-3">
                                                                          <div class="form-group">
                                                                              <label for="Tot_Exp">Total Expenses:</label>
                                                                              <input type="text" id="Tot_Exp" name="Tot_Exp" class="form-control wk_info1" disabled value="{{$DSWorkmaster->Tot_Exp ?? ''}}">
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-12 col-md-3 py-5">
                                                                        <div class="form-group">
                                                                            <div class="form-check">
                                                                                  <input type="checkbox" id="" name="work_comp" class="form-check-input" disabled value="{{$DSWorkmaster->work_comp ?? ''}}"  {{$DSWorkmaster->work_comp == 1 ? 'checked' : ''}}>
                                                                                  <label class="form-check-label" for="Tot_Exp">Work Complete</label>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                      <div class="col-12 col-md-3">
                                                                          <div class="form-group">
                                                                                  <label for="actual_complete_date" class="wk_info2">Actual Date Completion:</label>
                                                                                  <input type="date" id="actual_complete_date" name="actual_complete_date" class="form-control" 
                                                                                  disabled value="{{$DSWorkmaster->actual_complete_date ?? ''}}">
                                                                          </div>
                                                                      </div> 
                                                      </div>

                            <!-- //first tab completed div -->
                                      </div>
                            <!-- //first tab completed div -->

                        <!-- <div id="w_detail" class="tabcontent"> -->
                          <!-- //tab2 BOQ that id is menu1 -->
                                  <div id="menu1" class="tab-pane fade">
                                                        <!-- <h3>Work Detail</h3> -->
                                                        <div class="col-md-12">
                                                                    @if(Session::has('success'))
                                                                    <div class="alert alert-danger" role="alert">
                                                                    {{Session::has('success')}}
                                                                    </div>
                                                                    @endif
                                                        </div>
                                          <form class="row g-3" action="{{ url('import_user') }}" method="post" enctype="multipart/form-data" id="importForm">
                                                @csrf
                                                  <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="row g-3">
                                                        <div class="col-auto ms-auto">
                                                                              <!-- <label for="staticEmail2" class="visually-hidden">Excel file upload</label> -->
                                                                              <!-- <input type="file" class="form-control-plaintext" disabled name="excel_file" id="excelFile" > -->
                                                        </div>
                                                        <div class="col-auto">
                                                                  <div class="d-flex justify-content-end">
                                                                    <!-- <button type="button" class="btn btn-primary mb" id="importButton" disabled onclick="importtable()">Import</button> -->
                                                                  </div>
                                                        </div>
                                                </div>
                                          </form>


                                                    @error('excel_file')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                                    <div style="text-align: center;font-weight: bold ; color: red;">
                                                                            <label >Bill Of Quantities</label>
                                                                    </div> 
                                                                    <!-- <div style="text-align: right;">
                                                                        <input type="submit" value="Import" class="btn btn-success">
                                                                    </div> -->
                                                <!-- <div class="container"> -->
                                              <div class="table-responsive" id="BOQ">
                                                    <table id="tableid" class="table table-bordered table-hover">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col" >Item No</th>
                                                          <th scope="col">Sub No</th>
                                                          <th scope="col">Descroption of Item</th>
                                                          <th scope="col">Tendered Quantity</th>
                                                          <th scope="col">Unit</th>
                                                          <th scope="col">Tendered Rate</th>
                                                          <th scope="col">Amount</th>
                                                        </tr>
                                                      </thead>
                                                       <tbody id="BOQtbody">
                                                      <!--  @if(isset($DStnditems))-->
                                                      <!--  @foreach($DStnditems as $DStnditem )-->
                                                      <!--  <tr>-->
                                                      <!--    <td class="text-right" style="width: 1%;">{{ $DStnditem->t_item_no }}</td>-->
                                                      <!--    <td class="text-left" style="width: 1%;">{{ $DStnditem->sub_no }}</td>-->
                                                      <!--    <td class="text-left" style="width: 30%;text-align: justify;">{{ $DStnditem->item_desc }}</td>-->
                                                      <!--    <td class="text-right" style="width: 2%;">{{ $DStnditem->tnd_qty }}</td>-->
                                                      <!--    <td class="text-left" style="width: 1%;">{{ $DStnditem->item_unit }}</td>-->
                                                      <!--    <td class="text-right" style="width: 2%;">{{ $DStnditem->tnd_rt }}</td>-->
                                                      <!--    <td class="text-right" style="width: 2%;">{{ $DStnditem->t_item_amt }}</td>-->
                                                      <!--  </tr>-->
                                                      <!--@endforeach-->
                                                      
                                                      <!--@endif -->
                                                      </tbody>

                                                    </table>
                                                    
                                                      <div id="pagination-links">
                                                                {{ $DStnditems->links('pagination::bootstrap-4') }}
                                                      </div>
                                                  <!-- <button id="prevButton">Previous</button>
                                                  <button id="nextButton">Next</button><br><br> -->
                                                            <!-- //tab2 BOQ that id is menu1 -->

                                              </div>

                                  </div>
                                              <!-- //tab2 BOQ that id is menu1 -->

                                    <!-- //tab content whole both tab involved -->

                    </div>   
                                <!-- //tab content whole both tab involved -->
                    
                  </form>
                </div>
        <!-- </div>
</div>
</div> -->
<br>
</div>
<!-- //pagination for 10 records -->
<!-- //pagination for 10 records -->
<script>
$(document).ready(function() {
    // Function to load table data
    function loadTableData(url) {
        $.ajax({
            url: url,
            success: function(response) {
                $('#BOQtbody').empty(); // Clear existing table content
                response.data.forEach(item => {
                    $('#BOQtbody').append(`
                        <tr>
                            <td class="text-right">${item.t_item_no}</td>
                            <td class="text-left">${item.sub_no}</td>
                            <td class="text-left">${item.item_desc}</td>
                            <td class="text-right">${item.tnd_qty}</td>
                            <td class="text-left">${item.item_unit}</td>
                            <td class="text-right">${item.tnd_rt}</td>
                            <td class="text-right">${item.t_item_amt}</td>
                        </tr>
                    `);
                });
                // Update pagination links
                $('#pagination-links').html(response.links);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Load table data when the page loads
    loadTableData('{{ $DStnditems->url(1) }}');

    // Load table data when pagination links are clicked
    $(document).on('click', '#pagination-links a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        loadTableData(url);
    });
});
</script>


@endsection()
