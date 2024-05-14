
    <style>
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
        .m-2{
            justify-content:center;
        }
    .container {
        margin-top: 20px;
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
         margin-top: 20px;
    }
           /* header */
    .bg-custom {
  background-color: #e3f2fd;
}

/* Custom text color */
.navbar-dark .navbar-brand,
.navbar-dark .navbar-nav .nav-link {
  color: #333;
  font-weight: bold;
}
.navbar-brand {
  margin-right: auto;
}
    </style>

@extends('layouts.header')

@section('content')


<br>
<br>
<br>



  <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="{{ url('listjuniorengineer') }}" class="btn  float-end"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i> </a>
                    </h4>


@include('sweetalert::alert')
  <div class="title">JUNIOR ENGINEER </div>
    <div class="container">
        <div class="m-2">
        <form action="{{url('updatejuniorengineer/' . $users->jeid)}}" method="post" onsubmit="return validateForm()">
    @csrf
    @method('PUT')
    <div class="row m-2">
        <div class="col-md-2">
            <label for="division_name">Division Name:</label>
        </div>
        <div class="col-md-4">
            <select name="division_name" id="division_name" class="form-control" disabled>
                             <option  value="{{$users->divisionname}}" >{{$users->divisionname}}</option>

            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="subdivision_name">SubDivision Name:</label>
        </div>
        <div class="col-md-4">
            <select name="subdivision_name" id="subdivision_name" class="form-control" disabled>
                            <option value="{{$users->subdivisionname}}" >{{$users->subdivisionname}}</option>

            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="designation">Designation:</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="designation" id="designation" class="form-control" value="{{$users->designation}}" disabled>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="name"> Name:</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="name" id="name" class="form-control" value="{{$users->name}}" disabled>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="chargefrom">Charge-From:</label>
        </div>
        <div class="col-md-4">
            <input type="date" name="chargefrom" id="chargefrom" class="form-control" value="{{$users->period_from}}" disabled>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="chargeupto">Charge-Upto:</label>
        </div>
        <div class="col-md-4">
            <input type="date" name="chargeupto" id="chargeupto" class="form-control" value="{{$users->period_upto ?? ''}}" disabled>
        </div>
    </div>
    <div class="row m-2">
      <div class="col-md-2">
        <label for="has_pf_number">PF Number:</label>
     </div>
    <div class="col-md-4">
            <input type="text" name="pf_number" id="pf_number" class="form-control" value="{{$users->pf_no ?? ''}}" disabled>
    </div>
  </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="mobileno">Mobile No:</label>
        </div>
        <div class="col-md-4">
            <input type="tel" name="mobileno" id="mobileno" class="form-control" value="{{$users->phone_no ?? ''}}" disabled>
            <span id="mobile-error-message" class="error-message"></span>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="email">Email:</label>
        </div>
        <div class="col-md-4">
            <input type="email" name="email" id="email" class="form-control" value="{{$users->email ?? ''}}" disabled>
            <span id="email-error-message" class="error-message"></span>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="username">User Name:</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="username" id="username" class="form-control" value="{{$users->username ?? ''}}" disabled>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="password">Password :</label>
        </div>
        <div class="col-md-4">
            <input type="password" class="form-control" name="password" id="password" value="{{$users->password ?? ''}}" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{7,}$" title="Minimum of 7 characters. Should have at least one special character, one number, and one uppercase letter." disabled minlength="7">
        </div>
    </div>
</div>
                <br>
                <!-- <div class="row m-2">
                    <div class="col-md-1">
                     <input type="submit" name="NEW" value="SAVE" class="btn btn-primary">
                    </div>
                </div> -->
            </form>
        </div>
    </div>

@endsection

