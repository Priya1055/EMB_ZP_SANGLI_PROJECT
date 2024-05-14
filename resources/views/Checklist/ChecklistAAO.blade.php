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
            <!-- <li><a href="{{ url('RouteCheckListAAO') }}">Check List Accountant</a></li> -->
        </ul>
                  <div class="avatar"> 

<a href="{{ url('billlist', $work_id ?? '') }}"  style="margin-bottom:10px;">
            <i class="fa-solid fa-circle-arrow-left ml-3 mb-1" style="color: black; font-size: 35px;"></i>
  </a>
          <span class="tip" style="font-size:15px;">BACK</span></div>

  




        <form  action="{{ url('submitAAOChkAndDate') }}" method="post">
@csrf
    <input type="hidden" name="t_bill_id" value="{{$t_bill_id}}">
    <input type="hidden" name="work_id" value="{{$work_id}}">


<div class="container-fluid">
    <div class="card" id="backbglogo">
                <div class="card-header">
                    <h3>CHECKLIST OF ACCOUNTANT</h3>
                </div>

    <!--<h4 style="margin-top:100px; text-align:center;">CHECKLIST OF ACCOUNTANT</h4>-->
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
                                        <p>- {{$Arith_chk}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                  <td style="text-align: right;">3</td>

                          <td>Whether arithmatic check is done ?</td>
                          <td> {{$Arith_chk}}</td>
                          </tr>

         <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 4</p>
                                        <p><b>- Whether Work Insurance Policy & Premium Paid Receipt submitted by Contractor ?</b></p>
                                        <p>- {{$Ins_Policy_Agency}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
    <td style="text-align: right;">4</td>

        <td> Whether Work Insurance Policy & Premium Paid Receipt submitted by Contractor ?</td>
        <td>{{$Ins_Policy_Agency}}</td>
        </tr>


       
         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 5</p>
                                        <p><b>-  If Yes, amount of premium paid</b></p>
                                        <p>- {{$Ins_Prem_Amt_Agency}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
        <td style="text-align: right;">5</td>

          <td> If Yes, amount of premium paid</td>
          <td>{{$Ins_Prem_Amt_Agency}}</td>

        </tr>


         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 6</p>
                                        <p><b>-   Does necessary Deductions and Recoveries are considered while preparing bill ?</b></p>
                                        <p>- {{$Bl_Rec_Ded}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
<td style="text-align: right;">6</td>

        <td>  Does necessary Deductions and Recoveries are considered while preparing bill ?</td>
        <td>{{$Bl_Rec_Ded}}</td>
        </tr>


        <!-- Responsive for the mobile -->
        <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 7</p>
                                        <p><b>-   Gross Bill Amount</b></p>
                                        <p>- {{$C_netAmt}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
        <td style="text-align: right;">7</td>

          <td> Gross Bill Amount</td>
          <td>{{$C_netAmt}}</td>
        </tr>

       <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 8</p>
                                        <p><b>-   Total Deductions</b></p>
                                        <p>- {{$tot_ded}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
        <td style="text-align: right;">8</td>

          <td>  Total Deductions</td>
          <td> {{$tot_ded}} </td>
        </tr>



        <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 9</p>
                                        <p><b>-   Cheque Amount</b></p>
                                        <p>- {{$chq_amt}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
            <td style="text-align: right;">9</td>
            <td>  Cheque Amount</td>
            <td> {{$chq_amt}}</td>
        </tr>

        <?php
            $commonHelper = new \App\Helpers\CommonHelper();
        ?>
         <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 10</p>
                                        <p><b>- passed For Rs.</b></p>
                                        <p><input type="text" class="form-control" name="AAOCnetAmt1"  id="AAOCnetAmt1" value="{{$C_netAmt}}" oninput="updateFields10('mobile');"></p>
                                        <b>( {{ $commonHelper->convertAmountToWords($C_netAmt) }} )</b>
                                      </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
        <td style="text-align: right;">10</td>
            <td  style="text-align :Left;font-weight: bold;"> passed For Rs.</td>
            <td style="font-weight: bold;">
            <input type="text" name="AAOCnetAmt" id="AAOCnetAmt" class="form-control" value="{{$C_netAmt}}" oninput="updateFields10('desktop');">
            ( {{ $commonHelper->convertAmountToWords($C_netAmt) }} )</td>
          </tr>

        
        
        <!-- <tr>
    <td colspan="2">
        <label style="font-weight: bold;">Auditor Checked </label>
        @if($Aud_chck === 1)
            <input  class="checkbox col-md-2" type="checkbox" disabled name="ABcheckbox" required checked >
            @else
            <input  class="checkbox col-md-2" type="checkbox" disabled name="ABcheckbox" required >
            @endif
    </td>
    <td>
    <div class="row">
        <div class="col-md-7">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-5">
            <input style="margin-left: -80px;" class="form-control" type="date" readonly name="ABdate" required value="{{$Aud_Chk_Dt}}" min="{{$lastPOdate}} ">
        </div>
    </div>
</td>
</tr> -->


@if(auth()->user()->usertypes === "AAO") 
        <!-- <tr>
    <td colspan="2">
        <label style="font-weight: bold;">Divisional Accountant Checked</label>
        @if($AAO_Chk === 1)
                    <input class="checkbox col-md-2" class="form-check-input" type="checkbox" name="AAOcheckbox" required checked>
                    @else
                    <input class="checkbox col-md-2" class="form-check-input" type="checkbox" name="AAOcheckbox" required >
           @endif
    </td>
    <td colspan="3">
    <div class="row">
        <div class="col-md-6">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-5">
            <input style="margin-left: -50px;" class="form-control" type="date" name="AAOdate" 
               value="{{$AAO_Chk_Dt}}" min="{{$Aud_Chk_Dt}}"  max="{{$stupulatedDate}}">
        </div>
    </div>
    </td>
</tr> -->
@endif






        </tbody>
    </table>
  </div>
</div>



<div class="row justify-content-center">
    <div class="col-md-3 col-xl-2">
    <button type="submit"  class="btn btn-primary mt-5" style="">Submit</button>
</div>
</div>


<!-- <button type="submit"  class="btn btn-primary mt-5" style="">Submit</button> -->

</form>

<br><br><br><br>
 @endsection()
<script>

  //Input row 10

// Function to update fields based on device type
function updateFields10(deviceType) {
    var value;
    if (deviceType === 'mobile') {
        value = $('#AAOCnetAmt1').val();
        $('#AAOCnetAmt').val(value);
    } else {
        value = $('#AAOCnetAmt').val();
        $('#AAOCnetAmt1').val(value);
    }

}

</script>