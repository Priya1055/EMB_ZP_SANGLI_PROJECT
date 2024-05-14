@extends("layouts.header")
@section('content')

<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $workid ?? '') }}">Bill</a></li>
            <li><a href="{{ url('Abstract', $t_billid ?? '') }}">Abstract</a></li>
            <!-- <li><a href="{{ url('Deduction' ,$workid ?? '') }}">Deduction</a></li> -->
        </ul>



<style>
.custom-margin3 
{
    margin-left: 550px; /* Adjust this value as needed */
}
</style>

<h3>Bill Deduction </h3>
<div class="container border rounded p-4">
<form action="{{ url('RouteTolDedchequeAmt') }}" id="deduformid" method="POST">
            @csrf
<!-- Row 1: WorkId and Name of Work -->
<!-- Row 1: WorkId and Name of Work -->
<div class="row">
    <div class="form-group col-md-3 text-center">
        <label for="workId">WorkId:</label>
    </div>
    <div class="form-group col-md-3">
        <input type="text" class="form-control mb-3" id="workId" name="workId" value="{{ $workid }}"
        @if ($iscurrrent == 0)
    disabled
@endif
        >
    </div>
    <div class="form-group col-md-2 text-center">
        <label for="nm_work">Name Of Work:</label>
    </div>
    <div class="form-group col-md-3">
    <textarea class="form-control mb-3" id="nm_work" name="nm_work"
    @if ($iscurrrent == 0)
        disabled
    @endif>{{ $worknm }}</textarea>
</div>
    
    </div>

<div class="row">
    <div class="form-group col-md-3 text-center">
        <label for="">Bill No :</label>
    </div>
    <div class="form-group col-md-3">
        <input type="text" class="form-control mb-3 " id="bill_no" name="bill_no" value="{{ $t_bill_no}}"
        @if ($iscurrrent == 0)
    disabled
@endif>
    </div>

</div>

<div class="row">
    <div class="form-group col-md-3 text-center">
        <label for="">Bill Id :</label>
    </div>
    <div class="form-group col-md-3"> <!-- Adjusted column class to col-md-3 -->
        <input type="text" class="form-control mb-3 " id="bill_Id" name="bill_Id" value="{{ $t_billid }}"
        @if ($iscurrrent == 0)
    disabled
@endif>
    </div>
    <div class="form-group col-md-1 text-center">
        <label for="netBillAmount">Net Bill Amount:</label>
    </div>
    <div class="form-group col-md-2"> <!-- Adjusted column class to col-md-3 -->
        <input type="text" class="form-control mb-5" id="netBillAmount" name="netBillAmount" value="{{ $NETAMT }}"
        @if ($iscurrrent == 0)
    disabled
@endif>
    </div>
</div>

<!-- Rest of your form content -->






@if ($iscurrrent == 0)

<table class="table" >
    <thead>
        <tr>
            <th>Deduction Option</th>
            <th>Rate</th>
            <th>Deduction</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dedHead as $index => $head)
        <tr data-tbillid="{{ $tBillIdArray[$index] }}" data-tdedid="{{ $tDedIdArray[$index] }}">
            <td>
            <select class="form-control form-list mb-3 deductionOption" name="dedHead[]" {{ $iscurrrent == 0 ? 'disabled' : '' }}>                  
                  <option value="{{ $head }}">{{ $head }}</option>
                </select>
            </td>
            <td>
            <input type="text" class="form-control deductionrate" name="dedPc[]" value="{{ $dedPc[$index] }}" {{ $iscurrrent == 0 ? 'disabled' : '' }}>       
             </td>
            <td>
            <input type="text" class="form-control calculateded" name="dedAmt[]" value="{{ $dedAmt[$index] }}" {{ $iscurrrent == 0 ? 'disabled' : '' }}>           
         </td>
        </tr>
        @endforeach
        <tr>
            <td>Total Deduction</td>
            <td></td>
            <td>
            <input type="text" class="form-control totalDeduction" name="totalDeduction" value="{{ $DBtotaldedcheckamt->tot_ded ?? '' }}" {{ $iscurrrent == 0 ? 'disabled' : '' }}>            </td>
            <td></td>
        </tr>

         <!-- Cheque Amount Row  -->
        <tr>
            <td>Cheque Amount</td>
            <td></td>
            <td>
            <input type="text" class="form-control chequeAmount" name="chequeAmount" value="{{ $DBtotaldedcheckamt->chq_amt ?? '' }}" {{ $iscurrrent == 0 ? 'disabled' : '' }}>            </td>
            <td></td>
        </tr> 
    </tbody>
</table>
<!-- <a href="Abstract" class="btn btn-primary">Close</a> -->
@else
<div class="container border rounded pb-3">
    <h3>Total Deduction </h3>
    <div class="row">
        @foreach ($dedHead as $key => $deductionOption)
        @if ($deductionOption !== null && $deductionOption !== '')
        <div class="row" data-row-id="{{ $key }}">
        <div class="form-group col-md-3 text-center" >
            </div>
            <div class="form-group col-md-3" style="margin-left: 10px;">
                <select class="form-control form-list mb-3 deductionOption" name="deductionOption[]" >
                    <option>{{ $deductionOption }}</option>
                    <option>With held Amount </option>
                    <option>Security Deposite</option>
                    <option>CGST</option>
                    <option>SGST</option>
                    <option>Income Tax</option>
                    <option>Surcharge On IT</option>
                    <option>Work Insurance</option>
                    <option>Labour cess</option>
                    <option>Additional S.D</option>
                    <option>Royalty Charges</option>
                    <option>Fine</option>
                    <option>Audit Recovery</option>
                    <option>Held For Objection</option>
                    <option>other</option>
                </select>

            </div>
            <div class="form-group col-md-1" style="margin-left: 10px; width: 690px;">
                <input type="text" class="form-control deductionrate" name="deductionRate[]" value="{{ $dedPc[$key] }}">
            </div>
            <div class="form-group col-md-2" style="margin-left: -10px; width: 200px;">
                <input type="text" class="form-control calculateded" name="calculatedDeduction[]" value="{{ $dedAmt[$key] }}">
            </div>

            <input type="hidden" name="tBillIdArray[]" value="{{ $tBillIdArray[$key] }}">
            <input type="hidden" name="tDedIdArray[]" value="{{ $tDedIdArray[$key] }}">

            <div class="form-group col-md-1">
            <!-- <button type="button" class="btn btn-primary editRow">Edit</button> -->
            <!-- <button class="deleteRow" data-index="{{ $loop->index }}" data-tDedId="{{ $tDedIdArray[$key] }}">Delete</button> -->
            <button class="deleteRow btn  btn-danger show-alert-delete-box btn-sm"  data-index="{{ $loop->index }}" data-tDedId="{{ $tDedIdArray[$key] }}" data-tBillId="{{ $tBillIdArray[$key] }}">
            <i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>       

                                    <!-- //after select other option that time this div open  -->
          <div class="form-group col-md-3 mb-2" style="display: none; margin-left: 320px;">
                <input type="text" class="form-control customDeductionName" name="customDeductionName[]">
            </div>
                    <!-- //after select other option that time this div open  -->

        </div>
        @endif
        @endforeach
    </div>
<!-- </div> -->


<!-- <div class="container border rounded pt-8 mt-3">
    <h3>Current Data </h3> -->
        <!-- Row 4: Dropdown and Short Textbox -->
        <div class="col-md-12">
        <!-- Table-like heading row -->
        <div class="row">
        <div class="form-group col-md-3 ml-100" style="margin-left: 280px;">
                <label for=""><b> Deduction Option:</b></label>
            </div>
            <div class="form-group col-md-3" style="margin-left: 10px; width: 220px;">
                <label for=""> <b>Rate:</b></label>
            </div>
            <div class="form-group col-md-2 text-left" style="margin-left: -180px; width: 200px;">
                <label for=""><b> Deduction:</b></label>
            </div>
            <div class="form-group col-md-1">
                <!-- Empty cell for alignment -->
            </div>
        <div class="row">
            <div class="form-group col-md-3 text-center">
                <!-- <label for="dropdown">Deduction Option:</label> -->
            </div>
            <div class="form-group col-md-3" style="width: 490px; margin-left: 10px;">
                <select class="form-control form-list mb-3 deductionOption" name="deductionOption[]">
                    <option value="">- Choose Here-</option>
                    <option>With held Amount </option>
                    <option>Security Deposite</option>
                    <option>CGST</option>
                    <option>SGST</option>
                    <option>Income Tax</option>
                    <option>Surcharge On IT</option>
                    <option>Work Insurance</option>
                    <option>Labour cess</option>
                    <option>Additional S.D</option>
                    <option>Royalty Charges</option>
                    <option>Fine</option>
                    <option>Audit Recovery</option>
                    <option>Held For Objection</option>
                    <option>other</option>

                </select>
            </div>
            <div class="form-group col-md-1">
                <input type="text" class="form-control deductionrate"  name="deductionRate[]">
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control calculateded"  name="calculatedDeduction[]">
            </div>
            <div class="form-group col-md-1">
                <button type="button" class="addRow btn btn-success">+</button>
            </div>
            <!-- //after select other option that time this div open  -->
            <div class="form-group col-md-3 mb-2" style="display: none; margin-left: 280px;">
                <input type="text" class="form-control customDeductionName" name="customDeductionName[]">
            </div>
                    <!-- //after select other option that time this div open  -->
</div>
</div>


        <!-- Row 5: Plus Symbol and Additional Textbox (Hidden by default) -->
<!-- Modify the "additional-row" to match the structure of the original row -->
<div class="row additional-row" style="display: none;">
    <div class="col-md-12">
        <div class="row">
            <div class="form-group col-md-1">
                <!-- Empty cell for alignment -->
            </div>
        </div>
        <!-- Input row -->
        <div class="row">
            <div class="form-group col-md-3 ml-100" style="margin-left: 260px;" >
                <select class="form-control form-list mb-3  deductionOption" name="deductionOption[]">
                <option value=""> - Choose Here- </option>
                    <option>With held Amount </option>
                    <option>Security Deposite</option>
                    <option>CGST</option>
                    <option>SGST</option>
                    <option>Income Tax</option>
                    <option>Surcharge On IT</option>
                    <option>Work Insurance</option>
                    <option>Labour cess</option>
                    <option>Additional S.D</option>
                    <option>Royalty Charges</option>
                    <option>Fine</option>
                    <option>Audit Recovery</option>
                    <option>Held For Objection</option>
                    <option>other</option>
                </select>
            </div>
            <div class="form-group col-md-3" >
                            <input type="text" class="form-control   deductionrate" style="Width: 70px;" name="deductionRate[]">
            </div>
            <div class="form-group col-md-2" >
                <input type="text" class="form-control calculateded" name="calculatedDeduction[]" style="Width: 150px; margin-left: -160px;">
            </div>
            <div class="form-group col-md-1 mb-1">
                <button type="button" class="removeRow  btn btn-danger" style="margin-left: -150px;">x</button>
            </div>
            <div class="form-group col-md-3 mb-2" style="display: none; margin-left: 260px;">
            <input type="text" class="form-control customDeductionName" name="customDeductionName[]">
        </div>

        </div>
    </div>
</div>

<div class="row totalDeductionRow">
            <div class="form-group col-md-2 text-center custom-margin3 "> 
                        <label for="totalDeduction">Total Deduction:</label>
             </div>
            <div class="form-group col-md-2"> <!-- Adjusted column class to col-md-3 -->
                <input type="text" class="form-control mb-3" id="totalDeduction" name="totalDeduction" 
                value="{{ $DBtotaldedcheckamt->tot_ded ?? '' }}" readonly>
            </div>
</div>


<div class="row">
    <div class="form-group col-md-2 text-center custom-margin3"> 
        <label for="chequeAmount">Cheque Amount:</label>
    </div>
    <div class="form-group col-md-2 mb-5"> <!-- Adjusted column class to col-md-2 -->
        <input type="text" class="form-control" id="chequeAmount" name="chequeAmount"
        value="{{ $DBtotaldedcheckamt->chq_amt ?? '' }}"  readonly>
    </div>
</div>
</div>

</div>


<div class="row">
    <div class="form-group col-md-2 text-center custom-margin3 mb-3"> 
        <button type="submit" id="submitForm" class="btn btn-primary mt-3">Submit</button>
    </div>
    <div class="form-group col-md-2"> <!-- Adjusted column class to col-md-2 -->
        <button type="button" class="btn btn-secondary mt-3" onclick="goBack()">Cancel</button>
    </div>
</div>  
</div>

      <!-- Submit Button -->
    </form>
@endif
</div><br><br>
<!-- //When Deduction make cancel that time <button type="button" class="btn btn-secondary mt-3" onclick="goBack()">Cancel</button> -->
<script>
    function goBack() {
        window.history.back();
    }
</script>
<!-- //When Deduction make cancel that time  <button type="button" class="btn btn-secondary mt-3" onclick="goBack()">Cancel</button> -->

<script>
    $(document).ready(function () {
    var allCalculatedDeductions = [];
    var rowCount = 0; // Initialize a counter for row IDs
    var isAddingRow = false; // Flag to prevent multiple clicks
    
    function attachEventListenersToRow(row) 
    {
        row.find('.deductionOption').change(function () 
        {
            handleDropdownChange($(this).val(), row.find('.deductionrate'), row.find('.calculateded'));
        });
    }


$('.addRow').click(function () {
    if (isAddingRow) {
        // If the operation is still in progress, don't allow additional clicks
        return;
    }

    // Disable the button to prevent further clicks
    isAddingRow = true;
    var addButton = $(this);
    addButton.prop('disabled', true);

    // Clone the last "additional-row" and show it
    var newRow = $('.additional-row').first().clone();
    // newRow.css('display', 'flex'); // Use "flex" to display them in a single row
    newRow.css({
    'display': 'flex',
    'margin-top': '-30px' // Set margin-top to 50px
});

    // Clear the values of the cloned row
    newRow.find('input').val('');
    newRow.find('select').val(''); // Clear the select options

    // Attach event listeners to the new row
    attachEventListenersToRow(newRow);

    // Reset the calculated deduction value for the cloned row
    newRow.find('.calculateded').val('');

    $('.additional-row').last().after(newRow);

    // Enable the button after the operation is complete
    isAddingRow = false;
    addButton.prop('disabled', false);
});

$(document).on('click', '.deleteRow', function () {
    var rowToRemove = $(this).closest('.row');

    // Get the calculated deduction value of the row being removed
    var calculatedDeductionToRemove = parseFloat(rowToRemove.find('.calculateded').val()) || 0;

    // If the value is valid, subtract it from the total deduction
    if (!isNaN(calculatedDeductionToRemove)) {
        var currentTotalDeduction = parseFloat($('#totalDeduction').val()) || 0;
        var newTotalDeduction = currentTotalDeduction - calculatedDeductionToRemove;
        $('#totalDeduction').val(newTotalDeduction.toFixed(2));
    }

    // Remove the clicked row
    rowToRemove.remove();

    // Update total deduction after row removal
    updateTotalDedu();
});





$(document).on('click', '.removeRow', function () {
    console.log('Remove Row Clicked');    // Get the additional calculated value of the row being removed
    var calculatedDeductionplus = parseFloat($(this).closest('.additional-row').find('.calculateded').val());
    console.log(calculatedDeductionplus);

    // If the value is valid, subtract it from the total deduction
    if (!isNaN(calculatedDeductionplus)) {
        var currentTotalDeduction = parseFloat($('#totalDeduction').val()) || 0;
        var newTotalDeduction = currentTotalDeduction - calculatedDeductionplus;
        console.log("After Minus getting value" ,newTotalDeduction);
        $('#totalDeduction').val(newTotalDeduction.toFixed(2));
    }

    // Remove the clicked "additional-row"
    $(this).closest('.additional-row').remove();
});

  function handleDropdownChange(selectedOption, deductionRateInput, calculatedDeductionInput, isDefault) {
        $.ajax({
            url: 'Routededudropdown', // Replace with your actual API endpoint URL
            method: 'GET', // You can use 'GET' or 'POST' based on your API setup
            data: {
                selectedOption: selectedOption
            },
            success: function (response) {
                // Handle the response from the server here
                var peroption = response.Ded_pc;
                console.log("selected option DeductionRate:", peroption);
                var DBDed_Head=response.Ded_Head;
                console.log("selected option in DataBase  :", DBDed_Head);

                console.log()
                var netBillAmount = parseFloat($('#netBillAmount').val());
                // var calculatedDeduction = (peroption / 100) * netBillAmount;
                var calculatedDeduction = (Math.round((peroption / 100) * netBillAmount)).toFixed(2);
                console.log(" orignal deduction  :", calculatedDeduction);
                deductionRateInput && deductionRateInput.val(peroption);
                allCalculatedDeductions.push(calculatedDeduction);

                calculatedDeductionInput && calculatedDeductionInput.val(calculatedDeduction);
                if (isDefault) 
                {
                    defaultDeduction = calculatedDeduction; // Store the by default selected deduction value
                }

                updateTotalDedu();
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Error:', errorThrown);
            }
        });
    }

// Event handler for dropdown change
        $(document).on('change', '.deductionOption', function () {
            var selectedOption = $(this).val();
            var row = $(this).closest('.row'); // Get the parent row
            var deductionRateInput = row.find('.deductionrate');
            var calculatedDeductionInput = row.find('.calculateded');
            var customDeductionNameInput = row.find('.customDeductionName');
            console.log("ssssssSelected Option:", selectedOption); // Debug line

// Toggle the custom deduction name input based on the selected option
if (selectedOption.toLowerCase() === "other") {
    customDeductionNameInput.closest('.form-group').css('display', 'block'); // Show the custom deduction name input
} else {
    customDeductionNameInput.closest('.form-group').css('display', 'none'); // Hide the custom deduction name input
}

handleDropdownChange(selectedOption, deductionRateInput, calculatedDeductionInput);
            updateTotalDedu();
        });
// Event handler for dropdown change

 // Event handler for custom deduction name input
// Event handler for custom deduction name input
$(document).on('input', '.customDeductionName', function () {
    var customName = $(this).val();
    console.log("Input Name:", customName); // Debug line

    var row = $(this).closest('.row');
    var deductionOptionSelect = row.find('.deductionOption');

    // Update the value of the option with the "other" value
    deductionOptionSelect.find('option[value="other"]').text(customName);

    // Get the updated selected option
    var selectedOption = deductionOptionSelect.val();
    
    console.log("Updated selected Option:", selectedOption); // Debug line

    // ... Rest of your code
    // Now, call the function to handle dropdown change based on the updated selected option
    handleDropdownChange(selectedOption, row.find('.deductionrate'), row.find('.calculateded'));

    // Update the total deduction
    updateTotalDedu();
});

//when user enter byhand rate in textbox that time make calculation total deduction and check Amount 
        var previousRate = '';
        $(document).on('input', '.deductionrate', function () {
        var row = $(this).closest('.row'); // Get the parent row
        var deductionOptionDropdown = row.find('.deductionOption');
        var calculatedDeductionInput = row.find('.calculateded');

        var inputValue = $(this).val().trim(); // Trim whitespace

if (inputValue === '')
 {
    // If the input is empty, revert to the previous value
    var previousDeduction = parseFloat(calculatedDeductionInput.val()) || 0;
        var totalDeduction = parseFloat($('#totalDeduction').val()) || 0;
        totalDeduction -= previousDeduction;
        $('#totalDeduction').val(totalDeduction.toFixed(2));

    calculatedDeductionInput.val('0');
    $(this).val(previousRate);
    calculateAndBindChequeAmount();
    return; // Exit the function, don't proceed with calculations
}    

    var customRate = parseFloat(inputValue);
    console.log("User write Rate", customRate);

    var selectedOption = deductionOptionDropdown.val();

    if (!isNaN(customRate)) {
        // Use the custom rate for calculation
        var netBillAmount = parseFloat($('#netBillAmount').val());
        var calculatedDeduction = (customRate / 100) * netBillAmount;
        console.log(calculatedDeduction);
        var calculatedDeduction = Math.round((customRate / 100) * netBillAmount);
        console.log(calculatedDeduction);
        calculatedDeductionInput.val(calculatedDeduction.toFixed(2));
    } else {
        // Fetch rate from the server based on the selected option
        handleDropdownChange(selectedOption, $(this), calculatedDeductionInput, true);
    }
    // Update the total deduction when the rate changes
    updateTotalDedu();
});
//when user enter byhand rate in textbox that time make calculation total deduction and check Amount 
$(document).on('input', '.calculateded', function () 
{
    var row = $(this).closest('.row');
    var calculatedDeductionInput = $(this);
    var deductionOptionDropdown = row.find('.deductionOption');
    
    // Handle the case when the user directly enters a calculated deduction
    var calculatedDeduction = parseFloat(calculatedDeductionInput.val()) || 0;

    if (!isNaN(calculatedDeduction)) 
    {
        // Update the total deduction
        updateTotalDedu();

        // Recalculate and bind the cheque amount
        calculateAndBindChequeAmount();
    }
});


// when dropdown change that time doing calculation total deduction and check amount chnge Dropdown 
        $(document).on('change', '.additionalDeductionOption', function () 
        {
    var selectedOption = $(this).val();
    var deductionRateInput = $(this).closest('.row').find('.additionalDeductionRate');
    var calculatedDeductionInput = $(this).closest('.row').find('.additionalCalculatedDeduction');

 var customDeductionNameInput = $(this).closest('.row').find('.additionalcustomDeductionName'); // Corrected this line

    console.log("Selected Option:", selectedOption); // Debug line

    // Toggle the custom deduction name input based on the selected option
    if (selectedOption.toLowerCase() === "other") {
        customDeductionNameInput.closest('.form-group').css('display', 'block'); // Show the custom deduction name input
    } else {
        customDeductionNameInput.closest('.form-group').css('display', 'none'); // Hide the custom deduction name input
    }



    
    handleDropdownChange(selectedOption, deductionRateInput, calculatedDeductionInput);
    
    // Update the total deduction when the dropdown or "additionalDeductionRate" changes
    updateTotalDedu();
    });
    // when dropdown change that time doing calculation total deduction and check amount


//when user put byhand rate that time calculation total deduction and  check amount input additionalRate 
    $(document).on('input', '.additionalDeductionRate', function () {
    var row = $(this).closest('.row'); // Get the parent row
    var deductionOptionDropdown = row.find('.additionalDeductionOption');
    var calculatedDeductionInput = row.find('.additionalCalculatedDeduction');
    var namedDeductionInput = row.find('.additionalcustomDeductionName');
    var inputValue = $(this).val().trim(); // Trim whitespace

    if (inputValue === '') {
        // If the input is empty, subtract the previous calculated value from total deduction
        var previousDeduction = parseFloat(calculatedDeductionInput.val()) || 0;
        var totalDeduction = parseFloat($('#totalDeduction').val()) || 0;
        totalDeduction -= previousDeduction;
        $('#totalDeduction').val(totalDeduction.toFixed(2));

        calculatedDeductionInput.val('0');
        // Calculate and bind the cheque amount here with the updated netBillAmount
        calculateAndBindChequeAmount();
        return; // Exit the function, don't proceed with calculations
    }

    var customRate = parseFloat(inputValue);
    console.log("User write Rate", customRate);

    var selectedOption = deductionOptionDropdown.val();

if (!isNaN(customRate)) {
    // Use the custom rate for calculation
    var netBillAmount = parseFloat($('#netBillAmount').val());
    var calculatedDeduction = (customRate / 100) * netBillAmount;
        console.log(calculatedDeduction);
        var calculatedDeduction = Math.round((customRate / 100) * netBillAmount);
        console.log(calculatedDeduction);
    calculatedDeductionInput.val(calculatedDeduction.toFixed(2));
} else {
        // Fetch rate from the server based on the selected option
        handleDropdownChange(selectedOption, $(this), calculatedDeductionInput, true);
    }
    // Update the total deduction when the rate changes
    updateTotalDedu();
});
//when user put byhand rate that time calculation total deduction and  check amount 
        // Function to  the calculated total deduction
        function updateTotalDedu() {
            var totalDeduction = 0;

            // Iterate through all the "Calculated Deduction" input fields and add their values
            $('.calculateded').each(function () {
                var calculatedDeductionplus = parseFloat($(this).val());
                console.log("bydefault selected deduction",calculatedDeductionplus);
                if (!isNaN(calculatedDeductionplus)) {
                    totalDeduction += calculatedDeductionplus;
                    console.log(" bydefalt total detduction",totalDeduction);
                }
            });
            $('.additionalCalculatedDeduction').each(function () {
                var calculatedDeductionplus = parseFloat($(this).val());
                console.log("bydefault selected deduction",calculatedDeductionplus);
                if (!isNaN(calculatedDeductionplus)) {
                    totalDeduction += calculatedDeductionplus;
                    console.log(" bydefalt total detduction",totalDeduction);
                }
            });
            if (totalDeduction === 0) {
        $('#totalDeduction').val('0');
    } else {
        $('#totalDeduction').val(totalDeduction.toFixed(2));
    }        
        // Calculate and bind the cheque amount here
        calculateAndBindChequeAmount();
    }
    // Function to update the calculated total deduction


    // Function to calculate and bind the cheque amount
    function calculateAndBindChequeAmount() {
        var netBillAmount = parseFloat($('#netBillAmount').val()) || 0;
        var totalDeduction = parseFloat($('#totalDeduction').val()) || 0;
        var chequeAmount = netBillAmount - totalDeduction;
        $('#chequeAmount').val(chequeAmount.toFixed(2));
    }
    // Call the calculateAndBindChequeAmount function whenever the net bill amount or total deduction changes.
    $(document).on('input', '#netBillAmount, #totalDeduction', function() {
        updateTotalDedu();

        var deductionsDiv = $('#deductionsDiv');
    deductionsDiv.empty(); // Clear the div

    allCalculatedDeductions.forEach(function (deduction, index) {
        deductionsDiv.append('<p>Deduction ' + (index + 1) + ': $' + deduction.toFixed(2) + '</p>');
    });
    });
    // Call the function initially to set the initial cheque amount value.
    calculateAndBindChequeAmount();
});
    // Function to calculate and bind the cheque amount
</script>





<!-- //form submit button click  -->
<script>
  $(document).ready(function () {
    // Select the form by its ID
    const form = document.getElementById('deduformid');
    const totalDeductionValue = $('#totalDeduction').val();
    const chequeAmountValue = $('#chequeAmount').val();
    const t_bill_id=$('#bill_Id').val();
    console.log("t_bill_id",t_bill_id);
    console.log('Total Deduction Value:', totalDeductionValue);
    console.log('Cheque Amount Value:', chequeAmountValue);

    const rowData = [];
    // Function to collect data from changed rows
    function collectDataFromChangedRows() {
    rowData.length = 0; // Clear the array

    $('.row').each(function () {
        const row = $(this);
        const deductionOption = row.find('.deductionOption').val();
        if (deductionOption !== "") {
            const rowObject = {
                deductionOption,
                deductionRate: row.find('.deductionrate').val(),
                calculatedDeduction: row.find('.calculateded').val(),
                customDeductionName: row.find('.customDeductionName').val()
            };
            rowData.push(rowObject);
        }
    });

    // Log the row-wise data to the console
    console.log('Form Data Row-wise:', rowData);
}
    // Trigger data collection when changes are made to the form
    $('select, input').change(collectDataFromChangedRows);

    function collectDataFromAdditionalDeductions() {
    const additionalDeductionData = [];

    $('.additionalDeductionOption').each(function (index) {
        const adddeductionOption = $(this).val();
        if (adddeductionOption !== "") 
        {
            const adddeductionRate = $('.additionalDeductionRate').eq(index).val();
            const addcalculatedDeduction = $('.additionalCalculatedDeduction').eq(index).val();
            const addnameDeduction = $('.additionalcustomDeductionName').eq(index).val();

            additionalDeductionData.push({
                adddeductionOption,
                adddeductionRate,
                addcalculatedDeduction,
                addnameDeduction
            });
        }
    });

    // Log the data for additional deductions
    console.log('Additional Deduction Data:', additionalDeductionData);
}
    

    // Add a submit event listener to the form
    form.addEventListener('submit', function (event) 
    {
        // event.preventDefault(); // Prevent the form from actually submitting

        // Collect and log Deduction Option values
        const deductionOptions = $('.deductionOption').map(function () {
            return $(this).val();
        }).get();

        // Collect and log Deduction Rate values
        const deductionRates = $('.deductionrate').map(function () {
            return $(this).val();
        }).get();

        // Collect and log Calculated Deduction values
        const calculatedDeductions = $('.calculateded').map(function () {
            return $(this).val();
        }).get();

        const nameDeductions = $('.customDeductionName').map(function () {
            return $(this).val();
        }).get();


        console.log('Deduction Options:', deductionOptions);
        console.log('Deduction Rates:', deductionRates);
        console.log('Calculated Deductions:', calculatedDeductions);
        console.log('Other Name Of Deductions:', nameDeductions);


        // Collect data from additional deductions
        collectDataFromAdditionalDeductions();

        

        // Serialize the form data to a string (you can use other methods like FormData if needed)
        const totalDeductionValue = $('#totalDeduction').val();
const chequeAmountValue = $('#chequeAmount').val();

console.log('Total Deduction Value:', totalDeductionValue);
console.log('Cheque Amount Value:', chequeAmountValue);

// Include totalDeduction and chequeAmount in the form data
const formData = $(form).serialize() + `&totalDeduction=${totalDeductionValue}&chequeAmount=${chequeAmountValue}`;

// Log the form data to the console
console.log('Form Data:', formData);

        $.ajax({
            url: '{{ url("RouteTolDedchequeAmt") }}', // Use Laravel's route function to generate the URL
            method: 'POST', // Use the POST method as specified in your route
            data: formData,
               headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token in the request headers
    },
            success: function (response) {
                // Handle the server response here, e.g., display a success message
                console.log('Data submitted successfully.');
            },
            error: function (xhr, textStatus, errorThrown) {
                // Handle errors, e.g., show an error message
                console.error('Error:', errorThrown);
            }
        });
    });
  });
</script>
<!-- //form submit button click  -->

<!-- //delete row in deduction table -->
 <!-- <script>
    document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("deleteRow")) {
        // Get the index, tDedId, and tBillId values from the button's data attributes
        const index = e.target.getAttribute("data-index");
        const tDedId = e.target.getAttribute("data-tDedId");
        const tBillId = e.target.getAttribute("data-tBillId");
        const iscurrent = "{{ $iscurrrent }}";
        const workId = "{{ $workid }}";


        console.log("tDedId being sent in AJAX request:", tDedId);
        console.log("tBillId being sent in AJAX request:", tBillId);
        console.log("Is Current being sent in AJAX request:", iscurrent);
        console.log("Work ID being sent in AJAX request:", workId);


        // Remove the row from the DOM
        const rowToDelete = document.querySelector(`[data-row-id="${index}"]`);
        if (rowToDelete) {
            rowToDelete.remove();

            $.ajax({
                url: "{{ url('RouteShowDedRemoverow') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    tDedID: tDedId,
                    tBillID: tBillId,
                    iscurrent: iscurrent,
                    workId: workId
                },
                success: function (data) {
    if (data.success) {
        console.log('Row deleted successfully.');

        // Display a SweetAlert success message
        Swal.fire({
            title: 'Success',
            text: 'Row deleted successfully!',
            icon: 'success',
            confirmButtonText: 'OK',


        }).then((result) => {
            // You can add additional logic after the user clicks "OK"
            if (result.isConfirmed) {
                // For example, redirect to another page or perform additional actions
            }
        });

        // Optionally, you can update the UI or take other actions
    } else {
        console.error('Error deleting the row.');

        // Display a SweetAlert error message
        Swal.fire({
            title: 'Error',
            text: 'Error deleting the row. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        // Optionally, show an error message or take other actions
    }
},
error: function (error) {
                    // Do nothing or handle the error as needed, but don't log it to console
                }
            });
        }
    }
});
</script> -->
<!-- //delete row in deduction table -->




@endsection()
