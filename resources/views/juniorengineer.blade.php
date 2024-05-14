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

</div>
  @include('sweetalert::alert')
  <div class="title">JUNIOR ENGINEER </div>
  <a href="{{ url('listjuniorengineer') }}" class="btn float-end"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i> </a>

    <div class="container">
        <div class="m-2">
        <form action="insertjuniorengineer" method="post" onsubmit="return validateForm()">
    @csrf
    <div class="row m-2">
        <div class="col-md-2">
            <label for="division_name">Division Name:</label>
        </div>
        <div class="col-md-4">
        <select class="form-control" name="divname" id="divname" required>
        <option value="">Select Division</option>
        @isset($DBDivlist)
            <option value="{{ $DBDivlist }}">{{ $DBDivlist }}</option>
        @endisset
    </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="subdivision_name">SubDivision Name:</label>
        </div>
        <div class="col-md-4">
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
        <div class="col-md-2">
            <label for="designation">Designation:</label>
        </div>
        <div class="col-md-4">
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
        <div class="col-md-2">
            <label for="name"> Name:</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="chargefrom">Charge-From:</label>
        </div>
        <div class="col-md-4">
            <input type="date" name="chargefrom" id="chargefrom" class="form-control" required>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="chargeupto">Charge-Upto:</label>
        </div>
        <div class="col-md-4">
            <input type="date" name="chargeupto" id="chargeupto" class="form-control" >
        </div>
    </div>
    <div class="row m-2">
      <div class="col-md-2">
        <label for="has_pf_number">PF Number:</label>
     </div>
    <div class="col-md-4">
             <input type="checkbox" name="has_pf_number" id="has_pf_number">
            <label for="has_pf_number">Yes</label>
            <input type="hidden" name="pf_number_value" id="pf_number_value" value="0">
            <input type="text" name="pf_number" id="pf_number" class="form-control" disabled>
    </div>
</div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="mobileno">Mobile No:</label>
        </div>
        <div class="col-md-4">
            <input type="tel" name="mobileno" id="mobileno" class="form-control" required>
            <span id="mobile-error-message" class="error-message"></span>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="email">Email:</label>
        </div>
        <div class="col-md-4">
            <input type="email" name="email" id="email" class="form-control" required>
            <span id="email-error-message" class="error-message"></span>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="username">User Name:</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
            <label for="password">Password :</label>
        </div>
        <div class="col-md-4">
            <input type="password" class="form-control" name="password" id="password" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{7,}$" title="Minimum of 7 characters. Should have at least one special character, one number, and one uppercase letter." required minlength="7">
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
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

// Event listener for division selection
document.getElementById('division_name').addEventListener('change', function () {
    var selectedDivision = this.value;
    var subdivisionSelect = document.getElementById('subdivision_name');

    // Clear the SubDivision dropdown
    subdivisionSelect.innerHTML = '';

    if (selectedDivision) {
        fetchDataAndPopulateSelect('/get-subdivisions?division=' + selectedDivision, 'subdivision_name');
    }
});

// Fetch divisions and subdivisions on page load
fetchDataAndPopulateSelect('/get-divisions', 'division_name');
fetchDataAndPopulateSelect('/get-subdivisions', 'subdivision_name');\
</script>
</body>
</html>




