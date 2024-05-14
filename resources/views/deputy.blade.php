
<script src="https://kit.fontawesome.com/2b9cdc1c9a.js" crossorigin="anonymous"></script>

@extends('layouts.header')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row col-md-6 col-md-offset-3">
                <h3>Deputy Engineer</h3>
            </div>

            <div class="card">
                <div class="card-header">
                    <a href="{{ url('listdeputy') }}" class="btn float-end"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i> </a>
                    <div class="container m-2">

<form action="Deputy_Eng"  method="POST" >
        @csrf

        <div class="row m-2">
        <div class="col-md-5">
        <label class="" for="divname" >Division Name:</label></div>
        <div class="col-md-6">
        <select class="form-control" name="divname" id="divname" required>
        <option value="">Select Division</option>
        @isset($DBDivlist)
            <option value="{{ $DBDivlist }}">{{ $DBDivlist }}</option>
        @endisset
    </select>
    </div>
     </div>


    <div class="row m-2">
                        <div class="col-md-5">
        <label class="" for="divname" >Sub Division Name:</label></div>
        <div class="col-md-6">

            <select class="form-control" name="Subdivname" id="subdivname" required>
        <option value="">Select Division</option>
        @isset($DBSubDivlist)
            @foreach($DBSubDivlist as $division)
                <option value="{{ $division->Sub_Div }}">{{ $division->Sub_Div }}</option>
            @endforeach
        @endisset
    </select> 
    </div>
                    </div>





    <div class="row m-2">
                        <div class="col-md-5">
            <label class="" for="exe_name"> Deputy Engineer Name:  <span id="dpnm_error"></span></label></div>
            <div class="col-md-6">
            <select class="form-control" name="dename_categary" id="" style='width:100px;' required>
            <option value="Mr">Mr</option>
                                <option value="Miss">Miss</option>
                                <option value="Mrs">Mrs</option>
              </select>

            <!-- <input type="text" class="form-control" name="dpt_name" id="dpname" required
            onkeyup="validatename()"></div> -->
            <input type="text" class="form-control" name="dpt_name" id="dpname" >
            </div>
                    </div>


                    <div class="row m-2">
                        <div class="col-md-5">
                        <label class="" for="exe_name"> Deputy Engineer Name Marathi:  <span id="dpnm_error"></span></label>
                    </div>
                        <div class="col-md-6">

            <select class="form-control" name="dename_categary" id="" style='width:100px;' required>
            <option value="Mr">Mr</option>
                                <option value="Miss">Miss</option>
                                <option value="Mrs">Mrs</option>
              </select>

            <!-- <input type="text" class="form-control" name="dpt_name" id="dpname" required
            onkeyup="validatename()"></div> -->

            <input type="text" class="form-control" name="dpt_name_marathi" id="dpname" >
            </div>
            </div>







            <div class="row m-2">
                        <div class="col-md-5">
            <label class="" for="des">Designation:   <span id="designation_error"></span></label></div>
            <!-- <input type="text"  name="designation" placeholder="Deputy Engineer" class="form-control" id="des" onkeyup="validatedesig()"  > -->
            <div class="col-md-6">

            <span id="designation_error"></span>
            <select class="form-control" name="designation" id="designation" required>
        <option value="">Select designation</option>
        @isset($DBDesignation)
            @foreach($DBDesignation as $designation)
                <option value="{{ $designation->Designation }}">{{ $designation->Designation }}</option>
            @endforeach
        @endisset
    </select> 
    </div>
                    </div>






    <div class="row m-2">
                        <div class="col-md-5">
            <label class="" for="">Charge From:    <span id="add_error"></span></label></div>
            <!-- <input type="date"  class="form-control" name="charge_from"  id="from_date" onkeyup="validatedate()" > -->
            <div class="col-md-6">

            <input type="date"  class="form-control" name="charge_from"  id="from_date" required >
            </div>
                    </div>


            <div class="row m-2">
                        <div class="col-md-5">
            <label class="" for="">charge Upto:  <span id="add2_error"></span></label></div>
            <div class="col-md-6">

            <input type="date"  class="form-control" name="charge_upto"  >
            <!-- <input type="date"  class="form-control" name="charge_upto"  id="charge_upto" onkeyup="validatedateupto()"> -->
            </div>
                    </div>



            <div class="row m-2">
                        <div class="col-md-5">
            <label class="mrg" for="phone">Phone No:   <span id="phone_error"></span></label></div>
            <div class="col-md-6">

            <!-- <input type="tel"  name="phone_no"  class="form-control"  placeholder="123 456 7890"  id="phone" onkeyup="validatephone()"  > -->
            <input type="tel"  name="phone_no"  class="form-control"  placeholder="123 456 7890"  id="phone" required >
            </div>
                    </div>







            <div class="row m-2">
                        <div class="col-md-5">
            <label class="mrg" for="mail">Email id:      <span id="email_error"></span></label>
</div>
<div class="col-md-6">

            <!-- <input type="email"  name="email" class="form-control" id="mail" onkeyup="validateemail()" > -->
            <input type="email"  name="email" class="form-control" id="mail" required >
            </div>
                    </div>




            <div class="row m-2">
                        <div class="col-md-5">
            <label class="mrg" for="phone">User Name:   <span id="usnm_error"></span></label>
</div>
<div class="col-md-6">

            <!-- <input type="tel"  name="user_name"  class="form-control"  placeholder="123 456 7890"
             id="unm" onkeyup="validateusername()"  > -->
             <input type="tel"  name="user_name"  class="form-control"  placeholder="123 456 7890"
             id="unm"  required>
             </div>
                    </div>




             <div class="row m-2">
                        <div class="col-md-5">
            <label class="" for="des">Password:   <span id="pass_error"></span></label>
</div>
<div class="col-md-6">

            <!-- <input type="text"  name="pwd" placeholder="Deputy Engineer" class="form-control" id="pass"
             onkeyup="validatepwd()"  > -->
             <input type="text"  name="pwd" placeholder="Deputy Engineer" class="form-control" id="pass" required>
             </div>
                    </div>






</div>



<!-- <input type="submit" class="btn btn-primary" value="Save" onclick="return validateform()"> -->
<input type="submit" class="btn btn-primary" value="Save" >

            <span id="submit_error">  </span>

            <a href="{{url('listdeputy')}}" class="btn btn-primary ">Exit</a>



</div>
</form>
</div>

</div>


</div>
</div>
</div>

</div>

@endsection








<script>
    var dpnameError=document.getElementById('dpnm_error');
    var fmdtError=document.getElementById('add_error');
    var uptodtError=document.getElementById('add2_error');
    var placeError=document.getElementById('place_error');
    var emailError=document.getElementById('email_error');
    var phoneError=document.getElementById('phone_error');
    var unameError=document.getElementById('usnm_error');
    var passError=document.getElementById('pass_error');
    var desError=document.getElementById('designation_error');
    var submitError=document.getElementById('submit_error');



function validatename()
    {
    var deputyname=document.getElementById('dpname').value;
    if (deputyname.length==0 )
    {
        dpnameError.innerHTML='Please Enter Deputy Eng. Name';
        return false;

    }
    // dpnameError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
    return true;
}


function validateplace()
{
    var place1=document.getElementById('place').value;
    if (place1.length==0 )
    {
        placeError.innerHTML='Place is Required';
        return false;

    }
    // placeError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
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

    // emailError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
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
        // phoneError.innerHTML='Phone no should be 10 Digits';
        return false;


    }
    // if(!phonee.match(/^[0-9]{10}$s/))
    // {
    //     phoneError.innerHTML='only Digits Please';
    //     return false;
    // }
    // phoneError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
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
    // desError.innerHTML='<i class="fa-solid fa-circle-check"></i>';


    return true;

}


function validateusername()
{
    var uname=document.getElementById('unm').value;
    if (uname.length==0 )
    {
        unameError.innerHTML='Enter Username  ';
        return false;

    }
    // unameError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
    return true;
}



function validatepwd()
{
    var pass=document.getElementById('pass').value;
    if (pass.length==0 )
    {
        passError.innerHTML='Enter Password';

        return false;

    }
    // passError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
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
