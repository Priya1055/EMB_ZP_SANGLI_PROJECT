@extends("layouts.header")
@section('content')

<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $workid ?? '') }}">Bill</a></li>
        </ul>




<form  action="{{ url('SaveChklstSDC') }}" method="post">
@csrf
    <input type="hidden" name="tbill_id" value="{{$CTbillid}}">

<div class="container">
    <h4 style="margin-top:100px;">Check List SDC</h4>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead class="table-success">
        <tr>
            <th>SR.NO</th>
          <th>Name</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>1</td>
          <td>Name of Work</td>
          <input type="hidden" name="work_nm" value="{{$workNM}}">
          <td >{{$workNM}}</td>
        </tr>
        <tr>
            <td>2</td>
          <td>Fund Head</td>
          <input type="hidden" name="F_H_Code" value="{{$F_H_Code}}">
          <td> {{$F_H_Code}}</td>
        </tr>
        <tr>
<td>3</td>

        <td>Whether arithmatic check is done ?</td>
        <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="Yes"  {{ $Arith_chk === 'Yes' ? 'checked' : '' }} > Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="No" {{ $Arith_chk === 'No' ? 'checked' : '' }} > No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="Not Required" {{ $Arith_chk === 'Not Required' ? 'checked' : '' }} > Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="Not Applicable" {{ $Arith_chk === 'Not Applicable' ? 'checked' : '' }} > Not Applicable
    </label>
</td>
        </tr>




        </tbody>
    </table>
  </div>
</div>

<div class="row">
        <div class="col-md-4">
            <label style="margin-left: 380px;  font-weight: bold;">SDC Check </label>
            @if($Sdc_chk === 1)
            <input  class="checkbox col-md-2" type="checkbox" name="SDCcheckbox" required checked>
            @else
            <input  class="checkbox col-md-2" type="checkbox" name="SDCcheckbox" required >
            @endif
      </div>
      <div class="col-md-2">
      <input class="form-control"  type="hidden" name="lastJechkDate" value="{{$Jechecklast}}">
        <input class="form-control" type="date" name="SDCdate" required value="{{$Sdc_chk_dt}}" min="{{$Jechecklast}}">
    </div>
  </div>



@if(auth()->user()->usertypes === "DYE") 
<div>
<label style="margin-left: 380px;  font-weight: bold;">DYE Check </label>
        @if($Je_Chk === 1)
<input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required checked>
        @else
<input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required >
        @endif
<input style="margin-left: 100px;" type="date" name="DYEdate" >
</div>
@endif



@if ($DBchklst_sdcExist !== null)
<button type="submit" name="action" value="update" class="btn btn-primary mt-5" style="margin-left:370px;">Update</button>
@else
    <button type="submit" name="action" value="save" class="btn btn-primary mt-5" style="margin-left:370px;">Save</button>
@endif

</form>







<br><br><br>

@endsection()
