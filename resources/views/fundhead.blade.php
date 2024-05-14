
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


 /* Submit button */
 .custom-button {
      background-color: #5dbea3; /* Replace with your desired color */
      color: white; /* Replace with the desired text color */
      margin-bottom:20px;
       padding: 10px 40px; /* Adjust padding as needed */
      border: none;
      border-radius: 5px;
      font-size: 16px;
      width: 200px;

    }
    </style>
    @extends('layouts.header')

@section('content')


<br>
<br>
<br>


  <div class="card">
                <div class="card-header">
                        <a href="{{ url('listfundhead') }}" class="btn  float-end"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i> </a>
                </div>
</div>
  @include('sweetalert::alert')
  <div class="title">FUND HEAD </div>
    <div class="container">
        <div class="m-2">
        <form action="insertfundhead" method="post" onsubmit="return validateForm()">
    @csrf

    <div class="row m-2 mb-5">
        <div class="col-md-3">
            <label for="">Fund Head Code:</label>
        </div>
        <div class="col-md-4">
            <input type="text"  name="fhcode" class="form-control" required>
        </div>
    </div>
    <div class="row m-2 mb-5">
        <div class="col-md-3">
            <label for="fundhead">Fund-Head:</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="fundhead"  class="form-control" required>
        </div>
    </div>
    <div class="row m-2 mb-5">
        <div class="col-md-3">
            <label for="fundheadmarathi">Fund-Head <sup>(marathi)</sup> :</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="fundhead_m"  class="form-control" required>
        </div>
    </div>

                <br>
                <div class="row m-2">
                <div class="d-flex justify-content-center mt-3 fs-5">
                  <input type="submit" value="SAVE" class="custom-button p-3">
                     </div>

                </div>
            </form>
        </div>
    </div>
@endsection


