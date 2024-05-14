    <style>
        .container {
            margin-top: 30px;
        }
        .btn-back {
            font-size: 14px; /* Adjust the font size as needed */
            background-color: #b82298; /* Set the background color */
            color: #27b9d37e; /* Set the text color */
            padding: 5px 10px; /* Adjust padding as needed */
            border-radius: 5px; /* Add rounded corners */
        }

        .btn-back i {
            margin-right: 5px; /* Adjust the spacing between the icon and text */
            font-size: 35px; /* Adjust the font size as needed */
            margin-right: 5px; /* Adjust the spacing between the icon and text */
        }

        .m-2 {
            margin: 10px;
        }

        .m-2 label {
            font-weight: bold;
        }

        .mrg {
            margin-top: 10px;
        }

        .mrg1 {
            margin-top: 20px;
        }

        .text-input {
            margin-bottom: 10px;
        }
        .m-2{
            justify-content:center;
        }
        .container {
            margin-top: 30px;
        }

        .m-2 {
            margin: 10px;
        }

        .m-2 label {
            font-weight: bold;
        }

        .mrg {
            margin-top: 10px;
        }

        .mrg1 {
            margin-top: 20px;
        }

        .text-input {
            margin-bottom: 10px;
        }

        /* Add border styles */
        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .title{
            font-weight: bold;
            font-size: 24px;
            line-height: 1.5;
            text-align: center;
            margin-top: 10px;
        }
        .error-message {
                color: red;
        }

</style>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            var emailInput = document.getElementById("email");
            var placeInput = document.getElementById("place");
            var phonenoInput = document.getElementById("phoneno");

            emailInput.addEventListener('input', function() {
                validateEmail();
            });

            placeInput.addEventListener('input', function() {
                validatePlace();
            });

            phonenoInput.addEventListener('input', function() {
                validatePhoneNumbers();
            });

            function validateEmail() {
                var email = emailInput.value;
                var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var emailErrorMessage = document.getElementById("email-error-message");
                if (!email.match(emailRegex)) {
                    emailErrorMessage.innerText = "Please enter a valid email address.";
                } else {
                    emailErrorMessage.innerText = "";
                }
            }

            function validatePlace() {
                var place = placeInput.value;
                var placeErrorMessage = document.getElementById("place-error-message");
                if (place.trim() === "") {
                    placeErrorMessage.innerText = "Please enter a place.";
                } else {
                    placeErrorMessage.innerText = "";
                }
            }

            function validatePhoneNumbers() {
                var phoneno = phonenoInput.value;
                var phoneRegex = /^\d{10}$/;
                var phoneNumbers = phoneno.split(",");
                var phoneErrorMessage = document.getElementById("phone-error-message");
                for (var i = 0; i < phoneNumbers.length; i++) {
                    var number = phoneNumbers[i].trim();
                    if (!number.match(phoneRegex)) {
                        phoneErrorMessage.innerText = "Please enter valid 10-digit phone numbers separated by a comma.";
                        return;
                    }
                }
                phoneErrorMessage.innerText = "";
            }
        });
</script>
@extends('layouts.header')

@section('content')


<br>
<br>
<br>


@include('sweetalert::alert')
@if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
<div class="card">
                {{-- <div class="card-header"> --}}
                    <div class="card-body">
                        <a href="{{ url('listdivision') }}" class="btn float-end btn-back" title="back"><i class="fa-solid fa-circle-left"></i> </a>
                {{-- </div> --}}
                {{-- <div class="card-body"> --}}

    <div class="container">
        {{-- <div class="m-2"> --}}
            <form action="" method="post" onsubmit="return validateForm()">
                @csrf
                @method('PUT')
              <div class="title">VIEW DIVISION LIST</div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="region">Region:</label>
                    </div>
                    @foreach ($users as $user)
                    <div class="col-md-3">
                        <select name="region" id="region" class="form-control" disabled >
                        <option value="{{ $user->Region }}" @if($user->Region) selected @endif>{{ $user->Region }}</option>
                        </select>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="circle">Circle:</label>
                    </div>
                    <div class="col-md-3">

                        <select name="circle" id="circle" class="form-control" disabled>
                        <option value="{{ $user->Circle }}" @if($user->Circle) selected @endif>{{ $user->Circle }}</option>
                        </select>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="division-name">Division Name:</label>
                    </div>
                    <div class="col-md-3">
                        <select name="division_name" id="division-name" class="form-control" disabled >
                        <option value="{{ $user->div }}" @if($user->div) selected @endif>{{ $user->div }}</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="row m-2">
                    <div class="col-md-2">
                        <label for="sub-division">Sub Division:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="sub_division" id="sub-division" class="form-control" required>
                    </div>
                </div> -->
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="address1">Address 1:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="address1" id="address1" class="form-control"  disabled value="{{$user->address1 ?? ''}}">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="address2">Address 2:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="address2" id="address2" class="form-control"  disabled  value="{{$user->address2 ?? ''}}">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="place">Place:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="place" id="place" class="form-control" disabled value="{{$user->place ?? ''}}">
                        <span id="place-error-message" class="error-message"></span>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="email">Email:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="email" name="email" id="email" class="form-control" disabled value="{{$user->email ?? ''}}">
                        <span id="email-error-message" class="error-message"></span>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="phoneno">Phone No:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="tel" name="phoneno" id="phoneno" class="form-control" disabled value="{{$user->phoneno ?? ''}}">
                        <span id="phone-error-message" class="error-message"></span>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="designation">Designation:</label>

                    </div>
                    <div class="col-md-3">
                        <input type="text" name="designation" id="designation" class="form-control" disabled value="{{$user->designation ?? ''}}">
                    </div>
                </div>
                <br>
                <div class="row m-2">

                </div>
            </form>
        {{-- </div> --}}
    </div>
    @endforeach
@endsection
