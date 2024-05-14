
<style>
    .form-group span
    {
        position:absolute;
        font-size:14px;
        /* bottom:12px; */
        right:17px;
        color:red;
        text-align:center;
        margin-left:150px
    }

    .form-group span i
    {
        color:seagreen;


    }


    </style>


@extends('layouts.header')
@section('content')


@include('sweetalert::alert')


<div class="container">
    <div class="row col-md-6 col-md-offset-3">
                <h3>Show Account Details</h3>
            </div>

            <div class="card">
                <div class="card-header">
                    <a href="{{ url('listAAO') }}" class="btn  float-end"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i> </a>

            <div class="container m-2">

                    <!-- Division Dropdown -->
                    <div class="row m-2">
                        <div class="col-md-5">
                            <label for="divname">Division Name:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text"  class="form-control" value="{{$Div}}" readonly>

                            </div>
                    </div>

                    <!-- Executive Engineer Name -->
                    <div class="row m-2">
                        <div class="col-md-5">
                            <label for="exname_categary">Accountant Name: <span id="nmError"></span></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $user->subname}}" readonly style='width:100px;'>
                                <input type="text" class="form-control" name="ex_name" id="name"  value="{{ $user->name ?? '' }}" readonly>                        </div>
                    </div>

                    <!-- Executive Engineer Name Marathi -->
                    <div class="row m-2">
                        <div class="col-md-5">
                            <label for="ex_name_M">Accountant Name Marathi: <span id="nmError"></span></label>
                        </div>
                        <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ $user->subname}}" readonly style='width:100px;'>
                            <input type="text" class="form-control" name="ee_name_M" id="ee_name_M"  value="{{ $user->name_m ?? '' }}" readonly>
                                                </div>
                    </div>

                    <!-- Designation -->
                    <div class="row m-2">
                        <div class="col-md-5">
                            <label for="designation">Designation: <span id="designation_error"></span></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" value="{{ $user->designation}}"    class="form-control" readonly>
</div>
                    </div>

                    <!-- Charge From -->
                    <div class="row m-2">
                        <div class="col-md-5">
                            <label for="charge_from">Charge From <span id="add_error"></span></label>
                        </div>
                        <div class="col-md-6">
                        <input type="date" class="form-control" name="charge_from" id="addre1" onkeyup="validateName()" value="{{ $user->period_from ?? '' }}" readonly>                        </div>
                    </div>

                    <!-- Charge Upto -->
                    <div class="row m-2">
                        <div class="col-md-5">
                            <label for="charge_upto">Charge Upto: <span id="add2_error"></span></label>
                        </div>
                        <div class="col-md-6">
                        <input type="date" class="form-control" name="charge_upto"  id="addre2" onkeyup="validateadd()" value="{{ $user->period_upto ?? '' }}" readonly>                        </div>
                    </div>

                    <!-- PF No -->
                    <div class="row m-2">
                        <div class="col-md-5">
                        <label for="pf_no">PF No:</label></div>
                        <div class="col-md-6">
                        <input type="text" name="PF_no" class="form-control" id="phone" onkeyup="validatephone()" value="{{ $user->pf_no ?? '' }}" readonly>
                       </div>
                        </div>

                    <!-- Phone No -->
                    <div class="row m-2">
                        <div class="col-md-5">
                            <label for="phone_no">Phone No: <span id="phone_error"></span></label>
                        </div>
                        <div class="col-md-6">
                        <input type="tel" name="phone_no" class="form-control" placeholder="123 456 7890" id="phone" onkeyup="validatephone()" value="{{ $user->phone_no ?? '' }}" readonly>
                      </div>
                    </div>

                    <!-- Email ID -->
                    <div class="row m-2">
                        <div class="col-md-5">
                            <label for="email">Email ID: <span id="email_error"></span></label>
                        </div>
                        <div class="col-md-6">
                        <input type="email" name="email" class="form-control" id="mail" onkeyup="validateemail()" value="{{ $user->email ?? '' }}" readonly>                        </div>
                    </div>

                    <!-- User Name -->
                    <div class="row m-2">
                        <div class="col-md-5">
                            <label for="user_name">User Name: <span id="usnm_error"></span></label>
                        </div>
                        <div class="col-md-6">
                        <input type="tel" name="user_name" class="form-control" placeholder="123 456 7890" id="phone" onkeyup="validatephone()" value="{{ $user->username ?? '' }}" readonly>
                            </div>
                    </div>

                    <!-- Password -->
                    <!-- <div class="row m-2">
                        <div class="col-md-5">
                            <label for="pwd">Password: <span id="pass_error"></span></label>
                        </div>
                        <div class="col-md-6">
                        <input type="text" name="pwd" placeholder="Password" class="form-control" id="des" onkeyup="validatedesig()" value="{{ $user->pwd ?? '' }}" readonly>
                                  <span id="designation_error"></span>
                        </div>
                    </div> -->

                        <div class="row m-2">
                            <div class="col-md-12">
                                <!-- <input type="submit" class="btn btn-primary" value="Update" onclick="return validateform()">
                                <span id="submit_error"></span> -->
                                <a href="{{url('listAAO')}}" class="btn btn-primary">Exit</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>























    <!-- <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class ="panel-heading text-center">
                    <h3>Excecutive Engineer </h3>
</div>
<div class=" panel-body">
<form action=""  method="post"  required>
        @csrf


        <div class="form-group">
        <label class="" for="divname" >Division Name:</label>
        <select class="form-control" name="division_name" id="divname"
        value="{{$user->division_name ?? ''}}" disabled>
                <option value="pune">Pune</option>
              <option value="sangli">Sangli</option>
              <option value="satara">Satara</option>
              <option value="solapur">Solapur</option>
            </select>


            <div class="form-group">
            <label class="" for="exe_name"> Excecutive Engineer Name:</label>
            <div>
            <select class="form-control" name="exname_categary" id="" style='width:60px;'
            value="{{$user->exname_categary ?? ''}}" disabled>
                <option value="mr">mr</option>
              <option value="miss">miss</option>
              <option value="mis">mis</option>
              </select>

            <input type="text" class="form-control" name="ex_name" id="name"
            required  value="{{$user->ex_name ?? ''}}"  disabled></div>




            <div class="form-group">
            <label class="" for="add1">Charge From:    <span id="add_error"></span></label>
            <input type="date"  class="form-control" name="charge_from"  id="addre1"
            onkeyup="validateName()"   value="{{$user->charge_from ?? ''}}" disabled>


            <div class="form-group">
            <label class="mrg1" for="add2">charge Upto:  <span id="add2_error"></span></label>
            <input type="date"  class="form-control" name="charge_upto"
            required id="addre2" onkeyup="validateadd()"
            value="{{$user->charge_upto ?? ''}}" disabled>




            <div class="form-group">
            <label class="mrg" for="phone">Phone No:   <span id="phone_error"></span></label>
            <input type="tel"  name="phone_no"  class="form-control"
              placeholder="123 456 7890"  id="phone" onkeyup="validatephone()"
              value="{{$user->phone_no ?? ''}}"  disabled>







            <div class="form-group">
            <label class="mrg" for="mail">Email id:      <span id="email_error"></span></label>
            <input type="email"  name="email" class="form-control" id="mail"
             onkeyup="validateemail()"  value="{{$user->email ?? ''}}"  disabled>




            <div class="form-group">
            <label class="mrg" for="phone">User Name:   <span id="phone_error"></span></label>
            <input type="tel"  name="user_name"  class="form-control"  placeholder="123 456 7890"
            id="phone" onkeyup="validatephone()"   value="{{$user->user_name ?? ''}}" disabled >



            <div class="form-group ">
            <label class="" for="des">Password:   <span id="designation_error"></span></label>
            <input type="text"  name="pwd" placeholder="Deputy Engineer"
            class="form-control" id="des" onkeyup="validatedesig()"  value="{{$user->pwd ?? ''}}"  disabled>
            <span id="designation_error"></span>




</div>



</div>

</div>

            <a href="{{url('listexecutive')}}" class="btn btn-primary ">Exit</a>



</div>
<div>
    <small>&copy;sis infotech sangli</small>
</div>
</form>


</div>
</div> -->

@endsection








<script>
    var nmError=document.getElementById('add_error');
    var add2Error=document.getElementById('add2_error');
    var placeError=document.getElementById('place_error');
    var emailError=document.getElementById('email_error');
    var phoneError=document.getElementById('phone_error');
    var desError=document.getElementById('designation_error');
    var submitError=document.getElementById('submit_error');
// function validateName()
// {
//     var nm=document.getElementById('name').value;
//     if (nm.length==0 )
//     {
//         nmError.innerHTML='Name is Required';
//         return false;

//     }
//     nmError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
//     return true;
// }

// function validateadd()
// {
//     var addrr=document.getElementById('addre2').value;
//     if (addrr.length==0 )
//     {
//         add2Error.innerHTML='Address is Required must';
//         return false;

//     }
//     add2Error.innerHTML='<i class="fa-solid fa-circle-check"></i>';
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






































































