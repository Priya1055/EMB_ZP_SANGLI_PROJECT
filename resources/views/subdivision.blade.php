



    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/2b9cdc1c9a.js" crossorigin="anonymous"></script>
 -->



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
            <div class="panel panel-primary">
                 <div class ="panel-heading text-center">
                    <h3>SubDivision </h3>
</div>
<div class=" panel-body">
<form action="{{ url('subdivision') }}" method="post"  required>
        @csrf

<div class="form-group">
    <label class="" for="divname">Division Name:</label>
    <select class="form-control" name="Div_Id" id="divname">
    </select>

</div>

            <div class="form-group">
            <label class="mrg1" for="subdivname"> Sub Division:</label>
            <select class="form-control" name="Sub_Div_Id" id="subdivname" required>
        </select>




            <label class="" for="add1">Address 1: <span id="add_error"></span></label>
            <input type="text"  class="form-control" name="address1"  id="addre1" onkeyup="validateName()">


            <div class="form-group">
            <label class="mrg1" for="add2">Address 2:  <span id="add2_error"></span></label>
            <input type="text"  class="form-control" name="address2" required id="addre2" onkeyup="validateadd()">


            <div class="form-group">
             <label class="" for="place">Place:     <span id="place_error"></span></label>
            <input type="text"  name="place" class="form-control" id="place" onkeyup="validateplace()" >




            <div class="form-group">
            <label class="mrg" for="mail">Email:      <span id="email_error"></span></label>
            <input type="email"  name="email" class="form-control" id="mail" onkeyup="validateemail()" >




            <div class="form-group">
            <label class="mrg" for="phone">Phone No:   <span id="phone_error"></span></label>
            <input type="tel"  name="phone_no"  class="form-control"  placeholder="123 456 7890"  id="phone" onkeyup="validatephone()"  >



            <div class="form-group ">
            <label class="" for="des">Designation:   <span id="designation_error"></span></label>
            <input type="text"  name="designation	" placeholder="Deputy Engineer" class="form-control" id="des" onkeyup="validatedesig()"  >
            <span id="designation_error"></span>




</div>



</div>

</div>
<input type="submit" class="btn btn-primary" value="Save" onclick="return validateform()">
            <span id="submit_error">  </span>

            <a href="{{url('listsubdivisions')}}" class="btn btn-primary ">Exit</a>



</div>
<div>
    <small>&copy;sis infotech sangli</small>
</div>
</form>


</div>
</div>
@endsection









<script>
    var addError=document.getElementById('add_error');
    var add2Error=document.getElementById('add2_error');
    var placeError=document.getElementById('place_error');
    var emailError=document.getElementById('email_error');
    var phoneError=document.getElementById('phone_error');
    var desError=document.getElementById('designation_error');
    var submitError=document.getElementById('submit_error');
function validateName()
{
    var addd=document.getElementById('addre1').value;
    if (addd.length==0 )
    {
        addError.innerHTML='Address is Required';
        return false;

    }
    addError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
    return true;
}

function validateadd()
{
    var addrr=document.getElementById('addre2').value;
    if (addrr.length==0 )
    {
        add2Error.innerHTML='Address is Required must';
        return false;

    }
    add2Error.innerHTML='<i class="fa-solid fa-circle-check"></i>';
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





<!-- ... Rest of your HTML code ... -->

<!-- ... Rest of your HTML code ... -->

<script>
    // Wrap your JavaScript code in a DOMContentLoaded event listener
    document.addEventListener('DOMContentLoaded', function() {
        // Populate the Sub Division dropdown with data
        function populateSubDivision(data) {
            var select = document.getElementById('subdivname');
            select.innerHTML = ''; // Clear existing options

            // Add a default option
            var defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.text = 'Select Sub Division';
            select.appendChild(defaultOption);

            // Populate the select with data
            for (var item of data) {
                var option = document.createElement('option');
                option.value = item.Sub_Div_M;
                option.text = item.Sub_Div_M;
                select.appendChild(option);
            }
        }

        // Fetch data from the server and populate the Sub Division select element
// Fetch data from the server and populate the Sub Division select element
function fetchSubDivisionAndPopulateSelect() {
    fetch('/get-subdivision')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Fetched Sub Division data:', data);
            populateSubDivision(data);

            // Fetch Division value from the server and set it as the value of the Division input field
        })
        .catch(error => {
            console.error('Error fetching Sub Division data:', error);
        });
}

// Call the function to fetch and populate Sub Division data on page load
fetchSubDivisionAndPopulateSelect();
});

</script>

<!-- ... Rest of your HTML code ... -->


<!-- ... Rest of your HTML code ... -->

































































