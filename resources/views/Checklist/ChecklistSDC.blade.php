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
            <li><a href="{{ url('billlist', $workid ?? '') }}">Bill</a></li>
        </ul>


<a href="{{ url('billlist', $workid ?? '')}}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a>

<form  action="{{ url('SaveChklstSDC') }}" method="post">
@csrf
    <input type="hidden" name="tbill_id" value="{{$CTbillid}}">

<div class="container-fluid">
    <div class="card"  id="backbglogo">

                            <div class="card-header" >
                                    <h3>CHECKLIST OF SUB DIVISIONAL CLERK</h3>
                            </div>

    <!--<h4 style="margin-top:100px; text-align:center;">CHECKLIST OF SUB DIVISIONAL CLERK</h4>-->
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead class="table-success">
<!-- Responsive for the mobile -->

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
          <th>Description</th>
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
          <input type="hidden" name="work_nm" value="{{$workNM}}">
          <td >{{$workNM}}</td>
        </tr>
        <tr>



        <!-- Responsive for the mobile -->
      <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 2</p>
                                        <p><b>- Fund Head</b></p>
                                        <p><div style="">
                <select name="F_H_Code1" class="form-control" style="" onclick="synchronizeMobileToNonMobilefhcode()">
                             @foreach($fundheadList as $fundhead)
                                    <option value="{{$fundhead->Fund_Hd_M}}" {{$selectedfundhead == $fundhead->Fund_Hd_M ? 'selected' : ''}}>
                                        {{$fundhead->Fund_Hd_M}}
                                    </option>
                             @endforeach        
                </select>
        </div></p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
          <tr class="non-mobile-second">
            <td style="text-align: right;">2</td>
          <td>Fund Head</td>
                <td >
          <div style="width: 720px;">
                <select name="F_H_Code" class="form-control" style="width: 100%;" onclick="synchronizeNonMobileToMobilefhcode()">
                             @foreach($fundheadList as $fundhead)
                                    <option value="{{$fundhead->Fund_Hd_M}}" {{$selectedfundhead == $fundhead->Fund_Hd_M ? 'selected' : ''}}>
                                        {{$fundhead->Fund_Hd_M}}
                                    </option>
                             @endforeach        
                </select>
        </div>
                </td>
        </tr>



  <!-- Responsive for the mobile -->
  <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 3</p>
                                        <p><b>- Whether arithmatic check is done ?</b></p>
                                        <p> <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk1" value="Yes"  {{ $Arith_chk === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile()"> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk1" value="No" {{ $Arith_chk === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile()"> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk1" value="Not Required" {{ $Arith_chk === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile()"> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk1" value="Not Applicable" {{ $Arith_chk === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile()"> Not Applicable
    </label></p>
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
        <input type="radio" name="Arith_chk" value="Yes"  {{ $Arith_chk === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile()"> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="No" {{ $Arith_chk === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile()"> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="Not Required" {{ $Arith_chk === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile()"> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="Not Applicable" {{ $Arith_chk === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile()"> Not Applicable
    </label>
</td>
        </tr>

        <!-- <tr>
    <td colspan="2">
        <label style="font-weight: bold;">Sub Divisional Clerk Checked</label>
        @if($Sdc_chk === 1)
            <input  class="checkbox col-md-2"  style="margin-left: 20px;" type="checkbox" name="SDCcheckbox"  checked>
            @else
            <input  class="checkbox col-md-2"  style="margin-left: 20px;" type="checkbox" name="SDCcheckbox"  >
            @endif
    </td>
    <td>
    <div class="row">
        <div class="col-md-4">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-4">
            <input class="form-control" type="date" name="SDCdate"  value="{{$Sdc_chk_dt}}" min="{{$Jechecklast}}" max="{{$stupulatedDate}}">
        </div>
    </div>
</td>
</tr> -->
        @if(auth()->user()->usertypes === "DYE")
        <tr>
    <td>
        <label style="font-weight: bold;">Deputy Engineer Checked</label>
        @if($Je_Chk === 1)
 <input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required checked>
        @else
 <input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required>
        @endif
    </td>
    <td colspan="3">
        <label style="font-weight: bold;">Date of Checking</label>
        <input style="margin-left: 100px;" type="date" name="DYEdate">
    </td>
</tr>

        @endif



        </tbody>
    </table>
  </div>
</div>

<!-- <div class="row" style="margin-left: 80px;">
     <div class="col-md-2 col-xl-2 col-lg-2">
            <label style="font-weight: bold;">SDC Check </label>
            @if($Sdc_chk === 1)
            <input  class="checkbox col-md-1"  style="margin-left: 20px;" type="checkbox" name="SDCcheckbox" required checked>
            @else
            <input  class="checkbox col-md-1"  style="margin-left: 20px;" type="checkbox" name="SDCcheckbox" required >
            @endif
      </div>
      <div class="col-md-3 col-xl-2 col-lg-6">
      <input class="form-control" style="margin-left: -100px;" type="hidden" name="lastJechkDate" value="{{$Jechecklast}}">
      <input class="form-control" style="margin-left: -100px;" type="hidden" name="stupulatedDate" value="{{$stupulatedDate}}">

        <input style="" class="form-control" type="date" name="SDCdate"
         required value="{{$Sdc_chk_dt}}" min="{{$Jechecklast}}" max="{{$stupulatedDate}}">
    </div>
  </div>



@if(auth()->user()->usertypes === "DYE") 
<div>
 <label style="margin-left: 380px;  font-weight: bold;">DYE Check </label>
        @if($Je_Chk === 1)
 <input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required checked>
        @else
 <input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required>
        @endif
 <input style="margin-left: 100px;" type="date" name="DYEdate">
</div>
@endif -->



<div class="row justify-content-center">
    <div class="col-md-3 col-xl-2">
@if ($DBchklst_sdcExist !== null)
<button type="submit" name="action" value="update" class="btn btn-primary mt-5" >Update</button>
@else
    <button type="submit" name="action" value="save" class="btn btn-primary mt-5" >Submit</button>
@endif
</div>
</div>

</form>







<br><br><br>

@endsection()
<script>

// Input row 3




// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile() {
    var selectedValue = $('input[name="Arith_chk1"]:checked').val();
    $('input[name="Arith_chk"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile() {
    var selectedValue = $('input[name="Arith_chk"]:checked').val();
    $('input[name="Arith_chk1"][value="' + selectedValue + '"]').prop('checked', true);
}



//Input row 2



// Function to synchronize selected value from mobile to non-mobile
function synchronizeMobileToNonMobilefhcode() {
    var selectedValue = $('select[name="F_H_Code1"]').val();
    $('select[name="F_H_Code"]').val(selectedValue).trigger('change');
}

// Function to synchronize selected value from non-mobile to mobile
function synchronizeNonMobileToMobilefhcode() {
    var selectedValue = $('select[name="F_H_Code"]').val();
    $('select[name="F_H_Code1"]').val(selectedValue).trigger('change');
}





</script>