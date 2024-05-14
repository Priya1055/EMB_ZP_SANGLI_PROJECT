    

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
    .error-message {
            color: red;
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
<div class="card">
                <div class="card-header">
                    <h4>List Division
                        <a href="{{ url('listdivision') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
<div class="title">DIVISION </div>
    <div class="container">
        <div class="m-2">
            <form action="divisioncreate" method="post" onsubmit="return validateForm()">
                @csrf
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="region">Region:</label>
                    </div>
                    <div class="col-md-4">
                        <select name="region" id="region" class="form-control form-select">
                        <option value="">Select Region</option>   
                        </select>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="circle">Circle:</label>
                    </div>
                    <div class="col-md-4">
                        <select name="circle" id="circle" class="form-control form-select">
                        <option value="" class="form-select">Select Circle</option>
                        </select>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="division-name">Division Name:</label>
                    </div>
                    <div class="col-md-4">
                        <select name="division_name" id="division-name" class="form-control form-select">
                            <option value="">Select Division</option>
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
                    <div class="col-md-4">
                        <input type="text" name="address1" id="address1" class="form-control" required>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="address2">Address 2:</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="address2" id="address2" class="form-control" required>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="place">Place:</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="place" id="place" class="form-control" required>
                        <span id="place-error-message" class="error-message"></span>
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
                        <label for="phoneno">Phone No:</label>
                    </div>
                    <div class="col-md-4">
                        <input type="tel" name="phoneno" id="phoneno" class="form-control" required>
                        <span id="phone-error-message" class="error-message"></span>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-2">
                        <label for="designation">Designation:</label>
                        
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="designation" id="designation" class="form-control" required>
                    </div>
                </div>
                <br>
                <div class="row m-2">
                    <!-- <div class="col-md-1">
                        <input type="submit" name="NEW" value="NEW" class="btn btn-primary">
                    </div>
                    <div class="col-md-1">
                        <input type="submit" name="NEW" value="EDIT" class="btn btn-primary">
                    </div> -->

                    <!-- <div class="col-md-1">
                        <input type="submit" name="NEW" value="SAVE" class="btn btn-primary">
                    </div> -->
                    <div class="d-flex justify-content-center mt-3 fs-5">
                  <input type="submit" value="SAVE" class="custom-button p-3">
                     </div>

                    <!-- <div class="col-md-1">
                        <input type="submit" name="NEW" value="EXIT" class="btn btn-primary">
                    </div> -->
                </div>
            </form>
        </div>
    </div>

<script>
    // Function to populate a select element with options
    function populateSelect(selectId, data) {
        var select = document.getElementById(selectId);
        select.innerHTML = ''; // Clear existing options
        
        // Add a default option
        var defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.text = 'Select ' + selectId.charAt(0).toUpperCase() + selectId.slice(1);
        select.appendChild(defaultOption);

        // Populate the select with data
        for (var item of data) {
            var option = document.createElement('option');
            if (item.Region) {
                option.value = item.Region;
                option.text = item.Region;
            } else if (item.Circle) {
                option.value = item.Circle;
                option.text = item.Circle;
            } else if (item.div) {
                option.value = item.div;
                option.text = item.div;
            }
            select.appendChild(option);
        }
    }

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

    // Event listener for region selection
    document.getElementById('region').addEventListener('change', function () {
        var selectedRegion = this.value;
        if (selectedRegion) {
            fetchDataAndPopulateSelect('/get-circles?region=' + selectedRegion, 'circle');
        }

    //    / / Clear the Circle and Division Name dropdowns
    circleSelect.innerHTML = '';
    divisionSelect.innerHTML = '';
    });

    // Event listener for circle selection
    document.getElementById('circle').addEventListener('change', function () {
        var selectedCircle = this.value;
        if (selectedCircle) {
            fetchDataAndPopulateSelect('/get-divisions?circle=' + selectedCircle, 'division-name');
        }
         // Clear the Division Name dropdown

    });

    // Fetch regions on page load
    fetchDataAndPopulateSelect('/get-regions', 'region');
</script>

@endsection


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="d-flex justify-content-end align-items-center">
        <button type="button" class="btn ml-2 custom-button" onclick="showNewBillModal(); enableNewButton();" id="newButton">NEW</button>
      </div>
      <form><!-- Form content here --></form>

            <div id="section2-wrapper">
            <div id="section2">

        <div class="form-group form-row align-items-center">
          <div class="col-md-5">
            <h2>R.A.Bill Information</h2>
          </div>
          <div class="col-md-1">
            <label for="rabillid">R.A.Bill Id:</label>
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" id="rabillid" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="rabmino" class="col-md-2">R.A.Bill No:</label>
          <div class="col-md-4 ajaxrabillhtml">
            <select class="form-control form-select" id="rabillno" name="t_bill_No" onchange="handleOptionChange()">
              @foreach($billNos as $t_bill_id => $t_bill_No)
                <option value="{{ $t_bill_id }}" {{ isset($embsection2) && $embsection2->t_bill_No == $t_bill_No ? 'selected' : '' }}>{{ $t_bill_No }}</option>
              @endforeach
            </select>
          </div>
          <label for="date" class="col-md-2">Date:</label>
          <div class="col-md-4">
            <input type="date" class="form-control" id="date" name="Bill_Dt" value="{{$embsection2->Bill_Dt ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="rabmino" class="col-md-2">Bill Amt:</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="rabmino" name="bill_amt" value="{{$embsection2->bill_amt ?? ''}}" disabled>
          </div>
          <label for="recamt" class="col-md-2">Rec Amt:</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="recamt" name="rec_amt" value="{{$embsection2->rec_amt ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="recamt" class="col-md-2">Net Amt:</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="netamt" name="net_amt" value="{{$embsection2->net_amt ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="cvno" class="col-md-2">CV No:</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="cvno" name="cv_no" value="{{$embsection2->cv_no ?? ''}}" disabled>
          </div>
          <label for="cvdate" class="col-md-2">CV Date:</label>
          <div class="col-md-4">
            <input type="date" class="form-control" id="cvdate" name="cv_dt" value="{{$embsection2->cv_dt ?? ''}}" disabled>
          </div>
        </div>

        <div class="form-group form-row align-items-center">
          <label for="billtype" class="col-md-2">Bill Type:</label>
          <div class="col-md-4">
            <select class="form-control form-select" id="billtype" name="bill_type" disabled>
              <option value="Normal" {{ $embsection2 && $embsection2->bill_type == 'Normal' ? 'selected' : '' }}>Normal</option>
              <option value="WDBNM" {{ $embsection2 && $embsection2->bill_type == 'WDBNM' ? 'selected' : '' }}>WDBNM</option>
              <option value="Sec_Adv" {{ $embsection2 && $embsection2->bill_type == 'Sec_Adv' ? 'selected' : '' }}>Secured Advance</option>
              <option value="Mob_Adv" {{ $embsection2 && $embsection2->bill_type == 'Mob_Adv' ? 'selected' : '' }}>Mobilization Advance</option>
            </select>
          </div>
          <label for="cvdate" class="col-md-2">Final Bill:</label>
          <div class="col-md-4">
            <div class="form-check">
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <input type="checkbox" class="form-check-input" id="finalbill" name="final_bill" disabled value="1" {{ $embsection2 && $embsection2->final_bill == 1 ? 'checked' : '' }} onchange="updateFinalBill(this)">
              <label class="form-check-label" for="cvdate">Check if final bill</label>
            </div>
          </div>
        </div>
             </div>
             </div>
    </div>
  </div>
</div>
<!-- Section2 if present then display if not then hide -->
<script>
  // Function to populate the form fields with data
  function populateFormFields(data) {
    // Populate fields here...
    console.log(data);
  }

  // Function to show or hide the section wrapper
  function toggleSectionWrapper(show) {
    const sectionWrapper = document.getElementById('section2-wrapper');
    sectionWrapper.style.display = show ? 'block' : 'none';
  }

  // Fetch data using AJAX
  function fetchData() {
    var workidvalue = $('#workid').val();
    console.log(workidvalue);
    $.ajax({
      url: '/get-embsection2-data',
      method: 'GET',
         data: { work_id: workidvalue }, 
      success: function(response) {
        console.log(response);
        if (response) { // Access the dataAvailable property
            populateFormFields(response); // Pass the response object
            toggleSectionWrapper(true); // Show the wrapper
        } else {
            toggleSectionWrapper(false); // Hide the wrapper
        }
      },
      error: function() {
        console.error('Failed to fetch data.');
      }
    });
  }

  // Call fetchData when the page loads
  fetchData();
</script>
<script>
function enableNewButton() {
  var selectedBillNo = $('#rabillno').val();
  var firstBillNo = $('#rabillno option:first').val();

  var optionCount = $('#rabillno option').length;

  if (selectedBillNo === firstBillNo || optionCount === 0 ||) {
    $('#newButton').prop('disabled', false);
  } else {
    $('#newButton').prop('disabled', true);
  }
}

// Call the function initially and whenever the dropdown selection changes
enableNewButton();
$('#rabillno').change(enableNewButton);
</script>
