@extends("layouts.header")
@section('content')
<style>
/* Hide the first row on devices other than mobile */
@media (min-width: 768px) {
    .mobile-first {
        display: none;
    }
}

/* Hide the second row on mobile devices */
@media (max-width: 767px) {
    .non-mobile-second {
        display: none;
    }

    .mobile-separate td {
        display: block;
    }

    .mobile-separate .card {
        margin-bottom: 10px; /* Adjust margin as needed */
    }

    .mobile-separate .card-body p {
        margin-bottom: 5px; /* Adjust margin as needed */
    }
}
</style>

<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $work_id ?? '') }}">Bill</a></li>
            <!-- <li><a href="{{ url('RouteCheckListAB', $t_bill_id ?? '') }}">Check List AB</a></li> -->
        </ul>

            <div class="avatar"> 

<a href="{{ url('billlist', $work_id ?? '') }}" style="margin-bottom:10px;">
            <i class="fa-solid fa-circle-arrow-left ml-3 mb-1" style="color: black; font-size: 35px;"></i>
  </a>
            <span class="tip" style="font-size:15px;">BACK</span></div>

  
        <form  action="{{ url('SaveChklstAB') }}" method="post">
@csrf
    <input type="hidden" name="t_bill_id" value="{{$t_bill_id}}">
    <input type="hidden" name="work_id" value="{{$work_id}}">


<div class="container-fluid">
    <div class="card" id="backbglogo">
                <div class="card-header">
                    <h3>CHECKLIST OF AUDITOR</h3>
                </div>

    <!--<h4 style="margin-top:100px; text-align:center;">CHECKLIST OF AUDITOR</h4>-->
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead class="table-success">
      <tr class="mobile-first">

<th colspan="3">
            <div class="card">
                <div class="card-body">
                    <p>- SR.NO</p>
                    <p>- Name</p>
                    <p>- Description</p>
                </div>
            </div>
 </th>
       
</tr>

<!-- Responsive for the other then mobile -->

<tr class="non-mobile-second">
        <th>SR.NO</th>
        <th>Name</th>
        <th >Description</th>
</tr>
      </thead>
      <tbody>
       <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 1</p>
                                        <p><b>- Name of Work</b></p>
                                        <p>- {{$workNM}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                        <td style="text-align: right;">1</td>
                    <td>Name of Work</td>
                    <input type="hidden" name="work_nm" value="{{ $workNM }}">
                    <td >{{$workNM}}</td>
                    </tr>

         <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 2</p>
                                        <p><b>- Fund Head</b></p>
                                        <p>- {{$FH_code}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
            <td style="text-align: right;">2</td>
          <td>Fund Head</td>
          <input type="hidden" name="F_H_Code" value="{{$FH_code}}">
          <td>{{$FH_code}} </td>
        </tr>
       <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 3</p>
                                <p><b>- Whether arithmatic check is done ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Arith_chk1" value="Yes" {{ $Arith_chk === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile3()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Arith_chk1" value="No" {{ $Arith_chk === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile3()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Arith_chk1" value="Not Required" {{ $Arith_chk === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile3()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Arith_chk1" value="Not Applicable" {{ $Arith_chk === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile3()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
<td style="text-align: right;">3</td>

        <td>Whether arithmatic check is done ?</td>
        <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="Yes"  {{ $Arith_chk === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile3()"> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="No" {{ $Arith_chk === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile3()"> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="Not Required" {{ $Arith_chk === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile3()"> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="Not Applicable" {{ $Arith_chk === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile3()"> Not Applicable
    </label>
</td>
        </tr>

          <!-- Responsive for the mobile -->
          <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 4</p>
                                <p><b>- Whether Work Insurance Policy & Premium Paid Receipt submitted by Contractor ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Ins_Policy_Agency1" value="Yes" {{ $Ins_Policy_Agency === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile4()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Ins_Policy_Agency1" value="No" {{ $Ins_Policy_Agency === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile4()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Ins_Policy_Agency1" value="Not Required" {{ $Ins_Policy_Agency === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile4()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Ins_Policy_Agency1" value="Not Applicable" {{ $Ins_Policy_Agency === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile4()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
    <td style="text-align: right;">4</td>

        <td> Whether Work Insurance Policy & Premium Paid Receipt submitted by Contractor ?</td>
        <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Ins_Policy_Agency" value="Yes"  {{ $Ins_Policy_Agency === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile4()"> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Ins_Policy_Agency" value="No" {{ $Ins_Policy_Agency === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile4()"> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Ins_Policy_Agency" value="Not Required" {{ $Ins_Policy_Agency === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile4()"> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Ins_Policy_Agency" value="Not Applicable" {{ $Ins_Policy_Agency === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile4()"> Not Applicable
    </label>
</td>
        </tr>


         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 5</p>
                                        <p><b>- If Yes, amount of premium paid</b></p>
                                        <p><input type="text" class="form-control" id="Ins_Prem_Amt_Agency1" name="Ins_Prem_Amt_Agency1" value="{{$Ins_Prem_Amt_Agency}}" oninput="updateFields5('mobile');"> </p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
        <td style="text-align: right;">5</td>

          <td> If Yes, amount of premium paid</td>
          <td>
          <input type="text" class="form-control" id="Ins_Prem_Amt_Agency" name="Ins_Prem_Amt_Agency" value="{{$Ins_Prem_Amt_Agency}}" oninput="updateFields5('desktop');"> 
        </td>

        </tr>


       <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 6</p>
                                <p><b>- Does necessary Deductions and Recoveries are considered while preparing bill ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Bl_Rec_Ded1" value="Yes" {{ $Bl_Rec_Ded === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile6()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Bl_Rec_Ded1" value="No" {{ $Bl_Rec_Ded === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile6()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Bl_Rec_Ded1" value="Not Required" {{ $Bl_Rec_Ded === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile6()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Bl_Rec_Ded1" value="Not Applicable" {{ $Bl_Rec_Ded === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile6()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
<td style="text-align: right;">6</td>

        <td>  Does necessary Deductions and Recoveries are considered while preparing bill ?</td>
        <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Bl_Rec_Ded" value="Yes"  {{ $Bl_Rec_Ded === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile6()"> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Bl_Rec_Ded" value="No" {{ $Bl_Rec_Ded === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile6()"> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Bl_Rec_Ded" value="Not Required" {{ $Bl_Rec_Ded === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile6()"> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Bl_Rec_Ded" value="Not Applicable" {{ $Bl_Rec_Ded === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile6()"> Not Applicable
    </label>
</td>
        </tr>


         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 7</p>
                                        <p><b>- Gross Bill Amount</b></p>
                                        <p><input type="text" class="form-control" name="C_netAmt1" id="C_netAmt1"value="{{$C_netAmt}}" oninput="updateFields7('mobile');"></p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
        <td style="text-align: right;">7</td>

          <td> Gross Bill Amount</td>
          <td>
          <input type="text" class="form-control" name="C_netAmt" id="C_netAmt"value="{{$C_netAmt}}" oninput="updateFields7('desktop');">
        </td>
        </tr>

       <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 8</p>
                                        <p><b>- Total Deductions</b></p>
                                        <p><input type="text" class="form-control" name="tot_ded1"  id="tot_ded1" value="{{$tot_ded}}" oninput="updateFields8('mobile');"></p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
        <td style="text-align: right;">8</td>

          <td>  Total Deductions</td>
          <td>
          <input type="text" class="form-control" name="tot_ded" id="tot_ded" value="{{$tot_ded}}" oninput="updateFields8('desktop');">
            </td>
        </tr>



        <!-- Responsive for the mobile -->
        <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 9</p>
                                        <p><b>- Cheque Amount</b></p>
                                        <p><input type="text" class="form-control" name="chq_amt1"  id="chq_amt1" value="{{$chq_amt}}" oninput="updateFields9('mobile');"></p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


        <tr class="non-mobile-second">
            <td style="text-align: right;">9</td>
            <td>  Cheque Amount</td>
            <td>
            <input type="text" class="form-control" name="chq_amt" id="chq_amt" value="{{$chq_amt}}" oninput="updateFields9('desktop');">
            </td>
        </tr>
        
        
        
        <!-- <tr>
    <td colspan="2">
        <label style="font-weight: bold;">Auditor Checked </label>
        @if($Aud_chck === 1)
            <input  class="checkbox col-md-1" type="checkbox" name="ABcheckbox" required checked >
            @else
            <input  class="checkbox col-md-1" type="checkbox" name="ABcheckbox" required >
            @endif
    </td>
    <td>
    <div class="row">
        <div class="col-md-7">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-5">
            <input style="margin-left: -80px;" class="form-control" type="date" name="ABdate"
             required value="{{$Aud_Chk_Dt}}" min="{{$lastPOdate}}" max="{{$stupulatedDate}}">
        </div>
    </div>
</td>
</tr> -->


@if(auth()->user()->usertypes === "AAO") 
        <!-- <tr>
    <td colspan="2">
        <label style="font-weight: bold;">Divisional Accountant Checked</label>
        <input style="" class="form-check-input col-md-3" type="checkbox" name="AAOcheckbox" required checked>
        <input style="" class="form-check-input col-md-3" type="checkbox" name="AAOcheckbox" required >

    </td>
    <td colspan="3">
    <div class="row">
        <div class="col-md-7">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-5">
            <input  class="form-control" style="margin-left: -200px;" type="date" name="AAOdate" >
        </div>
    </div>
    </td>
</tr> -->

        @endif




        
        </tbody>
    </table>
  </div>
</div>

<!-- <div class="row" style="margin-left: 80px;">
    <div class="col-md-2 col-xl-2 col-lg-3">
            <label style="font-weight: bold;">Auditor Checked </label>
            @if($Aud_chck === 1)
            <input  class="checkbox col-md-1" type="checkbox" name="ABcheckbox" required checked >
            @else
            <input  class="checkbox col-md-1" type="checkbox" name="ABcheckbox" required >
            @endif
        </div>

        <div class="col-md-3 col-xl-2 col-lg-4">
            <input class="form-control"  type="hidden" style="margin-left: -80px;" name="lastPOchkDate" value="{{$lastPOdate}} ">
            <input style="margin-left: -80px;" class="form-control" type="date" name="ABdate"
             required value="{{$Aud_Chk_Dt}}" min="{{$lastPOdate}}" max="{{$stupulatedDate}}">
        </div>
  </div> -->



<!-- @if(auth()->user()->usertypes === "AAO") 
<div class="row" style="margin-left: 80px;">
  <div class="col-md-1 col-xl-3 col-lg-3">
<label style="font-weight: bold;">AAO Check </label>
<input style="" class="form-check-input col-md-3" type="checkbox" name="AAOcheckbox" required checked>
<input style="" class="form-check-input col-md-3" type="checkbox" name="AAOcheckbox" required >
</div>
<div class="col-md-1 col-xl-2 col-lg-6">
<input  class="form-control" style="margin-left: -200px;" type="date" name="AAOdate" >
</div>

</div>
@endif -->

<!-- <div class="col-md-3  col-xl-2">

@if($DBchklst_AudiExist !== null)
<button type="submit" name="action" value="update" class="btn btn-primary mt-5" style="margin-left:370px;">Update</button>
@else
<button type="submit" name="action" value="save" class="btn btn-primary mt-5" style="margin-left:370px;">Save</button>
@endif
</div>
 -->


 <div class="row justify-content-center">
    <div class="col-md-3 col-xl-2">
    @if($DBchklst_AudiExist !== null)
<button type="submit" name="action" value="update" class="btn btn-primary mt-5" style="">Update</button>
@else
<button type="submit" name="action" value="save" class="btn btn-primary mt-5" style="">Submit</button>
@endif
</div>
</div>


</form>









<br><br><br>
 @endsection()
 

 <script>
    //Input row 3

function synchronizeMobileToNonMobile3()
{
    var selectvalue=$('input[name="Arith_chk1"]:checked').val();
    $('input[name="Arith_chk"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile3()
{
    var selectvalue=$('input[name="Arith_chk"]:checked').val();
    $('input[name="Arith_chk1"][value="' +selectvalue+ '"]').prop('checked' , true);
}
    


  //Input row 4

  function synchronizeMobileToNonMobile4()
{
    var selectvalue=$('input[name="Ins_Policy_Agency1"]:checked').val();
    $('input[name="Ins_Policy_Agency"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile4()
{
    var selectvalue=$('input[name="Ins_Policy_Agency"]:checked').val();
    $('input[name="Ins_Policy_Agency1"][value="' +selectvalue+ '"]').prop('checked' , true);
}




//Input row 5

// Function to update fields based on device type
function updateFields5(deviceType) {
    var value;
    if (deviceType === 'mobile') {
        value = $('#Ins_Prem_Amt_Agency1').val();
        $('#Ins_Prem_Amt_Agency').val(value);
    } else {
        value = $('#Ins_Prem_Amt_Agency').val();
        $('#Ins_Prem_Amt_Agency1').val(value);
    }

}



  //Input row 6

  function synchronizeMobileToNonMobile6()
{
    var selectvalue=$('input[name="Bl_Rec_Ded1"]:checked').val();
    $('input[name="Bl_Rec_Ded"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile6()
{
    var selectvalue=$('input[name="Bl_Rec_Ded"]:checked').val();
    $('input[name="Bl_Rec_Ded1"][value="' +selectvalue+ '"]').prop('checked' , true);
}



//Input row 7

// Function to update fields based on device type
function updateFields7(deviceType) {
    var value;
    if (deviceType === 'mobile') {
        value = $('#C_netAmt1').val();
        $('#C_netAmt').val(value);
    } else {
        value = $('#C_netAmt').val();
        $('#C_netAmt1').val(value);
    }

}


//Input row 8

// Function to update fields based on device type
function updateFields8(deviceType) {
    var value;
    if (deviceType === 'mobile') {
        value = $('#tot_ded1').val();
        $('#tot_ded').val(value);
    } else {
        value = $('#tot_ded').val();
        $('#tot_ded1').val(value);
    }

}

//Input row 9

// Function to update fields based on device type
function updateFields9(deviceType) {
    var value;
    if (deviceType === 'mobile') {
        value = $('#chq_amt1').val();
        $('#chq_amt').val(value);
    } else {
        value = $('#chq_amt').val();
        $('#chq_amt1').val(value);
    }

}


 </script>