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
<div class="avatar"> 
<a href="{{ url('emb', $tbillid ?? '')}}"  style="margin-bottom:10px;">
        <i class="fa-solid fa-circle-arrow-left ml-3 mb-1" aria-hidden="true" style="color: black; font-size: 35px;"> </i>  
  </a> 
  <span class="tip" style="font-size:15px;">BACK</span></div>

  <div class="card pb-3" id="backbglogo">
                            <div class="card-header" >
                                    <h3>Agency Check</h3>
                            </div>


        <div class="container-fluid pt-2" >
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
                        </div>
            </div>
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
    {!!$returnHTML!!}


{{--




     --}}


     <form action="{{url('SubmitAgency')}}" id="savorm" method="post">
    @csrf
    <div class="container-fluid">
        <div class="row col-lg-12 mt-2">
            <div class="col-md-2 col-sm-12 col-lg-1 col-2 mb-3">
                <input type="checkbox" id="checkbox" name="checkbox" required>
            </div>
            <div class="col-md-10 col-sm-12 col-lg-6 col-10 mb-3">
                <b>I have checked all measurements. I accept all measurements...</b>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-1 col-4 mb-3">
                <b>Checked Date:</b>
            </div>
            <div class="col-md-8 col-sm-12 col-lg-2 col-8 mb-3">
                <input type="date" class="form-control" value="{{$default_agecy_ee_dt ?? $default_agecy_dye_dt }}" id="date" name="date" required min="{{ $default_agecy_ee_dt ?? $default_agecy_dye_dt }}" required max="{{$billdate}}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-info btn-lg">
                    Submit
                </button>
            </div>
        </div>
        
        <input type="hidden" name="WorkId" id="WorkId" value="{{ $workDetails->Work_Id }}">
        <input type="hidden" name="tbillid" id="tbillid" value="{{ $tbillid }}">
    </div>
</form>

</div>

<br><br><br><br><br><br>

@endsection
