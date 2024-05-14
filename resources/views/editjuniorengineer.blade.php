
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

                <div class="card-body">
  @include('sweetalert::alert')
  <a href="{{ url('listjuniorengineer') }}" class="btn float-end"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i> </a>

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
            <select name="division_name" id="division_name" class="form-control form-select">


            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="subdivision_name">SubDivision Name:</label>
        </div>
        <div class="col-md-4">
            <select name="subdivision_name" id="subdivision_name" class="form-control form-select" >


            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="designation">Designation:</label>
        </div>
        <div class="col-md-4">
        <select name="designation" id="designation" class="form-control form-select" required>
        <option value="">Select Designation</option>
        @foreach ($designationlist as $designations)
            <option value="{{ $designations->Designation }}" {{ $designations->Designation == $selecteddesignation ? 'selected' : '' }}>
                {{ $designations->Designation }}
            </option>
        @endforeach
        </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="name"> Name:</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="name" id="name" class="form-control" value="{{$users->name ?? ''}}" required>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="chargefrom">Charge-From:</label>
        </div>
        <div class="col-md-4">
            <input type="date" name="chargefrom" id="chargefrom" class="form-control" value="{{$users->period_from ?? ''}}" >
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="chargeupto">Charge-Upto:</label>
        </div>
        <div class="col-md-4">
            <input type="date" name="chargeupto" id="chargeupto" class="form-control" value="{{$users->period_upto ?? ''}}" >
        </div>
    </div>
    <div class="row m-2">
      <div class="col-md-2">
        <label for="has_pf_number">PF Number:</label>
     </div>
    <div class="col-md-4">
            <input type="text" name="pf_number" id="pf_number" class="form-control" value="{{$users->pf_no ?? ''}}" >
    </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="mobileno">Mobile No:</label>
        </div>
        <div class="col-md-4">
            <input type="tel" name="mobileno" id="mobileno" class="form-control" value="{{$users->phone_no ?? ''}}" required>
            <span id="mobile-error-message" class="error-message"></span>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="email">Email:</label>
        </div>
        <div class="col-md-4">
            <input type="email" name="email" id="email" class="form-control" value="{{$users->email ?? ''}}" required>
            <span id="email-error-message" class="error-message"></span>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="username">User Name:</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="username" id="username" class="form-control" value="{{$users->username ?? ''}}" required>
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



<script>
    document.addEventListener("DOMContentLoaded", function() {
        var hasPfNumberCheckbox = document.getElementById('has_pf_number');
        var pfNumberInput = document.getElementById('pf_number');
        var pfNumberValueInput = document.getElementById('pf_number_value');

        hasPfNumberCheckbox.addEventListener('change', function() {
            if (this.checked) {
                pfNumberInput.disabled = false;
                pfNumberValueInput.value = "1"; // Checkbox is checked, set value to 1
            } else {
                pfNumberInput.disabled = true;
                pfNumberValueInput.value = "0"; // Checkbox is unchecked, set value to 0
            }
        });
    });
</script>

<script>
// Function to populate a select element with options
function populateSelect(selectId, data) {
    var select = document.getElementById(selectId);
    select.innerHTML = ''; // Clear existing options

    // Populate the select with data
    for (var item of data) {
        var option = document.createElement('option');
        if (item.div) {
            option.value = item.div;
            option.text = item.div;
        } else if (item.Sub_Div) {
            option.value = item.Sub_Div;
            option.text = item.Sub_Div;
        }
        select.appendChild(option);
    }
}

// Fetch data from the server and populate the select element
 // Fetch data from the server and populate the select element
 function fetchDataAndPopulateSelect(url, selectId) {
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data); // Debugging line
                populateSelect(selectId, data);

                // Set the selected subdivision
                var selectedSubdivision = '<?php echo $subdiv; ?>'; // Replace with your actual variable
                document.getElementById('subdivision_name').value = selectedSubdivision;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    // Fetch subdivisions on page load and populate the subdivision dropdown
    fetchDataAndPopulateSelect('/get-divisions', 'division_name');
    fetchDataAndPopulateSelect('/get-subdivisions?division=YourFixedDivision', 'subdivision_name');
</script></script>

</body>
</html>




