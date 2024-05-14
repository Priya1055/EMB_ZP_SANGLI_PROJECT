@extends('layouts.header')
@section('content')
<style>


        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px;
        }
        .form-group label {
            font-weight: bold;
        }
        .statement-cell {
            padding-bottom: 30px;
        }
        .checkbox-label {
            display: flex;
            align-items: center;
        }

        .checkbox-label .checkbox-icon {
            margin-right: 5px; /* Adjust the margin as needed */
        }
</style>
<ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
    <li><a href="{{ url('billlist', $WorkId ?? '') }}">Bill</a></li>
    <li><a href="{{ url('emb', $tbillid ?? '') }}">EMB</a></li>
    <li><a href="javascript:void(0)">Agency Engineer</a></li>
</ul>

<a href="{{ url('emb', $tbillid ?? '')}}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a> 

<body>
<div class="container1" style="padding-top: 100px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group form-row align-items-center">
                <label for="division" class="col-md-2">Division:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control " id="Div" name="Div "value="{{$divName ?? ''}}"disabled>
                </div>
                <label for="subdivision" class="col-md-2">Sub Division:</label>
                <div class="col-md-4">
                    <input type="text" name="Sub_Div" class="form-control" id="Sub_Div" disabled value="{{$workDetails->Sub_Div ?? '' }}">
                </div>
            </div>
            <div class="form-group form-row align-items-center mt-4">
                <label for="name" class="col-md-2">Work Id:</label>
                    <div class="col-md-4">
                        <input type="text" name="WorkId" class="form-control" id="WorkId"   value="{{$workDetails->Work_Id  ?? ''}}"  disabled>
                    </div>
                    <label for="fundhead" class="col-md-2">Fund Head:</label>
                     <div class="col-md-4">
                        <input type="text" class="form-control" id="fundhead" name="Fund_Hd"  value="{{$fund_Hd->Fund_HD_M ?? '' }}" disabled>
                     </div>
                </div>
        </div>
    </div>

            <div class="form-group form-row align-items-center">
                <label for="division" class="col-md-2">Name Of Work:</label>
                <div class="col-md-10">
                    <textarea name="Work_Nm" id="Work_Nm" style="width: 100%;" disabled>
                        {{$workDetails->Work_Nm ?? ''}}
                    </textarea>
                </div>
            </div>
            <div class="form-group form-row align-items-center">
                <label for="division" class="col-md-2">Work Order No:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control"name="WO_No"  id="WO_No" value="{{$workDetails->WO_No  ?? ''}}" disabled>
                    </div>
                        <label for="nameofwork" class="col-md-2">Date:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="dateInput" name="dateInput" value="{{$workDetails->Wo_Dt ?? ''}}" disabled>
                    </div>
    </div>
      <div class="form-group form-row align-items-center">
          <label for="subdision" class="col-md-2">Period :</label>
      <div class="col-md-4">
          <input type="text" name="Period" class="form-control" id="Period" value="{{$workDetails->Period ?? '' }}" disabled >
      </div>
      <label for="subdivision" class="col-md-2">Stipulated Date Of Complition:</label>
      <div class="col-md-4">
          <input type="text" name="Subiv" class="form-control" id="Subv" disabled value="{{$workDetails->Stip_Comp_Dt ?? '' }}">
      </div></div>
    <div class="form-group form-row align-items-center">
      <label for="agency" class="col-md-2">Agency:</label>
       <div class="col-md-4">
        <input type="text" name="Agency_Nm" class="form-control" id="Agency_Nm" disabled
        value="{{ $workDetails->Agency_Nm ?? ''}}">
       </div>
      <label for="sectionengineer" class="col-md-2">Engineer Incharge:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="sectionengineer" name="name"
        value="{{ $workDetails->Agency_Nm ?? ''}}" disabled>
      </div>
        </div>
    </div>
    </div>
<div>
    {!!$returnHTML!!}


{{--




     --}}


<form action="{{url('SubmitAgency')}}" id="savorm" method="post">
    @csrf
    <table>
        <tr>
            <td style="zoom: 2.2; vertical-align: top;">
                <input type="checkbox" id="checkbox" name="checkbox" required>
            </td>

            <td  style="zoom: 1.3;" class="statement-cell">
                <b>I have checked all measurements. I accept all measurements...</b>
            </td>

            <th style="zoom: 1.3;">Checked Date:</th>
            <td style="zoom: 1.3;">
                    <input type="date" class="form-control" value="{{$default_agecy_ee_dt ?? $default_agecy_dye_dt }}" id="date" name="date" required min="{{ $default_agecy_ee_dt ?? $default_agecy_dye_dt }}" required max="{{$billdate}}">

            </td>

        </tr>

    </table>

    <div class="d-flex justify-content-center align-items-center" id="">
        <button type="submit" class="btn btn-info btn-large " id="">
            Submit
        </button>
    </div>
    <input type="hidden" name="WorkId" id="WorkId" value="{{ $workDetails->Work_Id  }}">
    <input type="hidden" name="tbillid" id="tbillid" value="{{ $tbillid }}">
</form>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
