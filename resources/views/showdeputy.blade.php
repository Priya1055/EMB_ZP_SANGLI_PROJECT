

    <script src="https://kit.fontawesome.com/2b9cdc1c9a.js" crossorigin="anonymous"></script>




@extends('layouts.header')
@section('content')

@include('sweetalert::alert')
<div class="container">
    <div class="row col-md-6 col-md-offset-3">
                <h3>Show Deputy Engineer</h3>
            </div>

            <div class="card">
                <div class="card-header">
                    <a href="{{ url('listdeputy') }}" class="btn  float-end"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i> </a>
                    <div class="container m-2">
<!-- <form action=""  method="POST"  > -->
        @csrf

        <div class="row m-2">
        <div class="col-md-5">
        <label class="" for="divname" >Division Name:</label>
        </div>

        <div class="col-md-6">
<input type ="text" class="form-control" name="division_name" id="divname" value="{{$Div ?? ''}}" disabled >
            </div>
</div>


            <div class="row m-2">
        <div class="col-md-5">
        <label class="" for="divname" >Sub Division Name:</label>
        </div>

        <div class="col-md-6">

        <input type="text" class="form-control" name="subdivision_name" id="divname" disabled
         value="{{$SubDiv ?? ''}}">
            </div>
</div>




            <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="exe_name"> Deputy Engineer Name:</label>
            </div>

            <div class="col-md-6">
<input class="form-control" name="dename_categary" id="" style='width:60px;' disabled
             value="{{$user->Subname ?? ''}}">
            <input type="text" class="form-control" name="dpt_name" id="name" required  disabled
             value="{{$user->name ?? ''}}"  >
             </div>
</div>





             <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="des">Designation:   <span id="designation_error"></span></label>
            </div>

            <div class="col-md-6">

            <input type="text"  name="designation" placeholder="Deputy Engineer"  disabled
            class="form-control" id="des" onkeyup="validatedesig()"  value="{{$user->designation ?? ''}}" >

            <span id="designation_error"></span>
            </div>
</div>





            <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="">Charge From:    <span id="add_error"></span></label>
            </div>
            <div class="col-md-6">
            <input type="date"  class="form-control" name="charge_from" disabled
             id="from_date" onkeyup="validatedate()"   value="{{$user->charge_from ?? ''}}" >
             </div>
</div>


             <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="">charge Upto:  <span id="add2_error"></span></label>
            </div>

            <div class="col-md-6">

            <input type="date"  class="form-control" disabled
             name="charge_upto" required id="charge_upto" onkeyup="validatedateupto()"   value="{{$user->charge_upto ?? ''}}">
             </div>
</div>


             <div class="row m-2">
        <div class="col-md-5">
            <label class="mrg" for="phone">Phone No:   <span id="phone_error"></span></label>
            </div>

            <div class="col-md-6">

            <input type="tel"  name="phone_no"  class="form-control"  placeholder="123 456 7890"
             id="phone" onkeyup="validatephone()" value="{{$user->phone_no ?? ''}}"  disabled>
             </div>
</div>







             <div class="row m-2">
        <div class="col-md-5">
            <label class="mrg" for="mail">Email id:      <span id="email_error"></span></label>
            </div>
            <div class="col-md-6">
            <input type="email"  name="email" class="form-control" id="mail"
             onkeyup="validateemail()" value="{{$user->email ?? ''}}" disabled >
             </div>
</div>




             <div class="row m-2">
        <div class="col-md-5">
            <label class="mrg" for="phone">User Name:   <span id="phone_error"></span></label>
            </div>

            <div class="col-md-6">
            <input type="tel"  name="user_name"  class="form-control"  placeholder="123 456 7890"
            id="phone" onkeyup="validatephone()" value="{{$user->user_name ?? ''}}"  disabled>
            </div>

</div>



            <div class="row m-2">
        <div class="col-md-5">
            <label class="" for="des">Password:   <span id="designation_error"></span></label>
            </div>
            <div class="col-md-6">
            <input type="text"  name="pwd" placeholder="Deputy Engineer" class="form-control"
             id="des" onkeyup="validatedesig()" value="{{$user->pwd ?? ''}}"  disabled>
            <span id="designation_error"></span>

            </div>

</div>



            <span id="submit_error">  </span>

            <a href="{{url('listdeputy')}}" class="btn btn-primary ">Exit</a>


            </div>

</div>
<!-- </form> -->


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
