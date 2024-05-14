
    <script src="https://kit.fontawesome.com/2b9cdc1c9a.js" crossorigin="anonymous"></script>






@extends('layouts.header')
@section('content')

@include('sweetalert::alert')
<div class="container">
    <div class="row col-md-6 col-md-offset-3">
                <h3>Update Deputy Engineer</h3>
            </div>

            <div class="card">
                <div class="card-header">
                    <a href="{{ url('listdeputy') }}" class="btn  float-end"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i></a>
                    <div class="container m-2">
<form action="{{ url('UpdateDeputyRoute/'.$user->dye_id) }}"  method="POST"  >
        @csrf

        <div class="row m-2">
        <div class="col-md-5">
        <label class="" for="divname" >Division Name:</label></div>
        <div class="col-md-6">

        <select class="form-control" name="division_name" id="divname">
        @foreach ($Div as $division)
        <option value="{{ $division->div }}" selected>{{ $division->div }}</option>
    @endforeach
</select>
</div>
</div>



<div class="row m-2">
        <div class="col-md-5">
        <label class="" for="divname" >Sub Division Name:</label>
</div>
<div class="col-md-6">

        <select class="form-control" name="subdivision_name" id="divname"  >
        @if ($SubDiv->isNotEmpty())
        <option value="{{ $SubDiv->first()->Sub_Div }}" selected>{{ $SubDiv->first()->Sub_Div }}</option>
    @endif

    {{-- Display the list of options from $SubDivList query result --}}
    @foreach ($SubDivList as $option)
        @if (!$SubDiv->isEmpty() && $SubDiv->first()->Sub_Div !== $option->Sub_Div)
            <option value="{{ $option->Sub_Div }}">{{ $option->Sub_Div }}</option>
        @endif
    @endforeach
            </select>
            </div>
</div>





            <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="exe_name"> Deputy Engineer Name:</label>
</div>
<div class="col-md-6">
            <select class="form-control" name="exname_categary" id=""
            value="{{$user->exname_categary ?? ''}}" style='width:100px;' >
            <option value="mr">Mr</option>
                                <option value="miss">Miss</option>
                                <option value="mis">Mrs</option>
              </select>

            <input type="text" class="form-control" name="dpt_name" id="name" required
             value="{{$user->name ?? ''}}"  >
             </div>
</div>






        <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="exe_name"> Deputy Engineer Name Marathi:</label>
</div>
<div class="col-md-6">

<select class="form-control" name="exname_categary" id=""
            value="{{$user->exname_categary ?? ''}}" style='width:100px;' >
            <option value="mr">Mr</option>
                                <option value="miss">Miss</option>
                                <option value="mis">Mrs</option>
              </select>

            <input type="text" class="form-control" name="dpt_name_M" id="name" required
             value="{{$user->name_m ?? ''}}"  >
             </div>
</div>





             <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="des">Designation:   <span id="designation_error"></span></label>
</div>
<div class="col-md-6">

<select name="designation" class="form-control" id="des" onkeyup="validatedesig()">
    @foreach($designationList as $designation)
        <option value="{{ $designation->Designation }}" {{ $designation->Designation == $user->designation ? 'selected' : '' }}>
            {{ $designation->Designation }}
        </option>
    @endforeach
</select>
<span id="designation_error"></span>

</div>
</div>





            <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="">Charge From:    <span id="add_error"></span></label>
</div>
<div class="col-md-6">

            <input type="date"  class="form-control" name="charge_from"
             id="from_date" onkeyup="validatedate()"   value="{{$user->period_from ?? ''}}" >
             </div>
</div>




             <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="">charge Upto:  <span id="add2_error"></span></label>
</div>
<div class="col-md-6">

            <input type="date"  class="form-control"
             name="charge_upto"  id="charge_upto" onkeyup="validatedateupto()"   value="{{$user->period_upto ?? ''}}">
             </div>
</div>





             <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="">PF:  <span id="add2_error"></span></label>
</div>
<div class="col-md-6">

            <input type="text"  class="form-control"
             name="PF" required id="charge_upto"    value="{{$user->pf_no ?? ''}}">
             </div>
</div>




             <div class="row m-2">
        <div class="col-md-5">
            <label class="mrg" for="phone">Phone No:   <span id="phone_error"></span></label>
</div>
<div class="col-md-6">

            <input type="tel"  name="phone_no"  class="form-control"  placeholder="123 456 7890"
             id="phone" onkeyup="validatephone()" value="{{$user->phone_no ?? ''}}" >
             </div>
</div>







             <div class="row m-2">
        <div class="col-md-5">
            <label class="mrg" for="mail">Email id:      <span id="email_error"></span></label>
</div>
<div class="col-md-6">

            <input type="email"  name="email" class="form-control" id="mail"
             onkeyup="validateemail()" value="{{$user->email ?? ''}}" >
             </div>
</div>




             <div class="row m-2">
        <div class="col-md-5">
            <label class="mrg" for="phone">User Name:   <span id="phone_error"></span></label>
</div>
<div class="col-md-6">

            <input type="tel"  name="user_name"  class="form-control"  placeholder="123 456 7890"
            id="phone" onkeyup="validatephone()" value="{{$user->user_name ?? ''}}" >
            </div>
</div>



            <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="des">Password:   <span id="designation_error"></span></label>
</div>
<div class="col-md-6">

            <input type="text"  name="pwd" placeholder="Deputy Engineer" class="form-control"
             id="des" onkeyup="validatedesig()" value="{{$user->pwd ?? ''}}" >
            <span id="designation_error"></span>
</div>
</div>

</div>
<input type="submit" class="btn btn-primary" value="Update" onclick="return validateform()">
            <span id="submit_error">  </span>

            <a href="{{url('listdeputy')}}" class="btn btn-primary ">Exit</a>



</div>
</form>
</div>
</div>
</div>
</div>


@endsection







<script>
    var fmdtError=document.getElementById('add_error');
    var uptodtError=document.getElementById('add2_error');
    var placeError=document.getElementById('place_error');
    var emailError=document.getElementById('email_error');
    var phoneError=document.getElementById('phone_error');
    var desError=document.getElementById('designation_error');
    var submitError=document.getElementById('submit_error');
// function validatedate()
// {
//     var fmdt=document.getElementById('from_date').value;
//     if (fmdt.length==0 )
//     {
//         fmdtError.innerHTML='Date is Required';
//         return false;

//     }
//     fmdtError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
//     return true;
// }

// function validatedateupto()
// {
//     var uptodt=document.getElementById('charge_upto').value;
//     if (uptodt.length==0 )
//     {
//         uptodtError.innerHTML='date is Required must';
//         return false;

//     }
//     uptodtError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
//     return true;
// }

function validateplace()
{
    var place1=document.getElementById('place').value;
    if (place1.length==0 )
    {
        placeError.innerHTML='Place is Required';
        return false;

    }
    placeError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
    return true;

}

function validateemail()
{
    var mail=document.getElementById('mail').value;
    if (mail.length==0 )
    {
        emailError.innerHTML='Email is Required';
        return false;

    }
    if (!mail.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/))
    {
        emailError.innerHTML='Email invalid';
        return false;

    }

    emailError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
    return true;


}


function validatephone()
{
    var phonee=document.getElementById('phone').value;
    if(phonee.length == 0)
    {
        phoneError.innerHTML='phone is  Required must';
        return false;

    }
    if(phonee.length !==10 )
    {
        phoneError.innerHTML='Phone no should be 10 Digits';
        return false;


    }
    // if(!phonee.match(/^[0-9]{10}$s/))
    // {
    //     phoneError.innerHTML='only Digits Please';
    //     return false;
    // }
    phoneError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
    return true;


}



function validatedesig()
{
    var designation=document.getElementById('des').value;
    if (designation.length==0 )
    {
        desError.innerHTML='Designation Required';
        return false;

    }
    desError.innerHTML='<i class="fa-solid fa-circle-check"></i>';


    return true;

}

function  validateform()
{
    if(!validateName() || ! validateadd() || !validateplace() ||!validateemail() ||!validatephone() ||!validatedesig())
    {
        submitError.style.display='block';
        submitError.innerHTML='please fix error to submit';
        setTimeout(function()
        {
            submitError.style.display='none';}, 3000);
        return false;
    }
}

</script>






































































</html>
