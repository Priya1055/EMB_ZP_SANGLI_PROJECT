@extends("layouts.header")
@section('content')
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- Include Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<!-- //new button click model open link -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<!-- //new button click model open link -->

    <style>
        /* Additional styles for one-line layout */
        .modal-content {
            display: flex;
            flex-direction: column; /* Change to column layout */
            padding: 15px;
        }
        /* Add spacing between elements */
        .modal-content label,
        .modal-content input[type="checkbox"],
        .modal-content input[type="text"] {
            margin-bottom: 20px; /* Adjust margin bottom for spacing */
        }
        /* Increase width of the input text box */
        .modal-content input[type="text"] {
            width: 250px; /* Adjust the width as needed */
        }
        /* Style the checkbox */
        .modal-content .custom-checkbox {
            width: 20px;
            height: 20px;
            background-color: white;
            border: 2px solid blue; /* Default color */
            border-radius: 3px;
            margin-right: 5px;
            cursor: pointer;
        }
        /* Change border and background color when checkbox is checked */
        .modal-content input[type="checkbox"]:checked + .custom-checkbox {
            border-color: blue;
            background-color: blue;
        }
        
        /* Style the "Search" button */
        .find-button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

<br>
<br>
<br>
<div class="text-right">
    <a class="btn btn-primary btn-sm mr-4" id="newButton">New</a>
</div>

<!-- <a href="#" class="btn btn-sm btn-primary float-right mt-2 mr-3 mb-5">New</a> -->
    <div class="full-screen-modal d-flex justify-content-center align-items-center" style=padding:30px id="modal">
        <div class="modal-content p-4">

            <form id="search-form" class="form-inline container" action="{{ url('viewfindworkmaster') }}" method="get">  
                        <div class="form-group col-lg-12">
            <div class="form-group col-lg-2">
    <label for="work_id">WorkId:</label>
</div>
<div class="form-group col-lg-1">
<input type="checkbox" name="work_id_checkbox" class="form-check-input"  id="work_id_checkbox" >
</div>
<div class="form-group col-lg-5">
<input type="text" id="work_id_value" name="work_id_value" class="form-control" placeholder="Enter WorkId" style="width: 500px;"> 
</div>
                </div>
                <div class="form-group col-lg-12">
                <div class="form-group col-lg-2">
                    <label for="work_id">FHCode:</label>
                    </div>
                    <div class="form-group col-lg-1">
                    <input type="checkbox"  name="fhcode_checkbox"  class="form-check-input">
                    </div>
                    <div class="form-group col-lg-5">
                    <select name="fhcode_value" class="form-control" style="width:600px">
            <option value="">Select FHCode</option>
            @foreach($DSfundhdms as $fundhdms)
                <option value="{{ $fundhdms->Fund_Hd_M }}">{{ $fundhdms->Fund_Hd_M }}</option>
            @endforeach
        </select>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <div class="form-group col-lg-2">
                    <label for="work_id" >SubDiv:</label>
                    </div>
                    <div class="form-group col-lg-1">
                    <input type="checkbox" name="subdiv_checkbox" class="form-check-input">
                    </div>
                    <div class="form-group col-lg-5">
                    <select name="subdiv_value" class="form-control" style="width:600px">
            <option value="">Select SubDiv</option>
            @foreach($DSsubdiv as $subdiv)
                <option value="{{ $subdiv->Sub_Div }}">{{ $subdiv->Sub_Div }}</option>
            @endforeach
        </select>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                <div class="form-group col-lg-2">
                    <label for="work_id" >Agency:</label>
                    </div>
                    <div class="form-group col-lg-1">
                    <input type="checkbox" name="agency_checkbox"class="form-check-input">
                    </div>
                    <div class="form-group col-lg-5">
                    <select name="agency_value" class="form-control" style="width:600px">
        <option value="">Select Agency</option>
        @foreach($DSagencies as $agency)
            <option value="{{ $agency->agency_nm }}">{{ $agency->agency_nm }}</option>
        @endforeach
    </select>
                </div>
                </div>
                <div class="form-group col-lg-12">
            <div class="form-group col-lg-2">
    <label for="Workname">Name of Work:</label>
</div>
<div class="form-group col-lg-1">
<input type="checkbox" name="work_NM_checkbox" class="form-check-input"  id="work_NM_checkbox" >
</div>
<div class="form-group col-lg-5">
<input type="text" id="work_NM_value" name="work_NM_value" class="form-control" placeholder="Enter WorkId" style="width: 500px;"> 
</div>
                </div>

                <button type="submit" class="btn btn-primary btn-sm col-lg-1" id="search-button">Search</button>
                        </form>
                        <div id="search-results"></div>
        </div>
    </div>
    <div class="container-fluid">
     <table id="tableid" class="table table-bordered">
        <thead>
            <tr>
                <th>Work ID</th>
                <th>Sub Division</th>
                <th>Fund Head</th>
                <th>Name of Work</th>
                <th>Amount Put to Tender</th>
                <th>Agency Name</th>
                <th> Work Order No</th>
                              <th>Work Order Date</th>
                              <!-- <td>Below/Above:</td> -->
                              <th>a/b</td>
                              <th>Work Order Amount</th>
                              <!-- <td>Time Limit</td>
                              <td>Perd_Unit</td> -->
                              <th>Stipulated Date of Completion</th>
                              <th>Total Expenses</th>
                              <!-- <th>actual_complete_date</th> -->
                              <th colspan='2' style="text-align:center">Action</th>

            </tr>
        </thead>
        <tbody id="findworkid">
    @if(isset($filteredData) && count($filteredData) > 0)
        @foreach($filteredData as $workmaster)
            <tr>
                <td>{{ $workmaster->Work_Id }}</td>
                <td>{{ $workmaster->Sub_Div }}</td>
                <td>{{ $workmaster->F_H_Code }}</td>
                <td>{{ $workmaster->Work_Nm }}</td>
                <td>{{ $workmaster->Tnd_Amt }}</td>
                <td>{{ $workmaster->Agency_Nm }}</td>
                <td>{{ $workmaster->WO_No }}</td>
                <td>{{ $workmaster->Wo_Dt }}</td>
                <td>{{ $workmaster->A_B_Pc }}</td>
                <td>{{ $workmaster->WO_Amt }}</td>
                <td>{{ $workmaster->Stip_Comp_Dt }}</td>
                <td>{{ $workmaster->Tot_Exp }}</td>
                <!-- <td>{{ $workmaster->actual_complete_date }}</td> -->
                <td>
                                <form method="GET" action="{{ url('showworkmaster/' . $workmaster->Work_Id) }}">
                                @csrf
    <button type="submit" class="btn btn-info btn-sm"   data-toggle="tooltip" title="View Workmaster">
        <i class="fa fa-eye custom-icon" aria-hidden="true"></i>
    </button>
</form>

<form method="GET" action="{{ url('editworkmasterroute/'.$workmaster->Work_Id) }}">
@csrf
    <button type="submit" class="btn btn-primary btn-sm"   data-toggle="tooltip" title="Edit Workmaster">
        <i class="fa fa-pencil" style="color:white;"></i>
    </button>
</form>

            
            <form method="get" action="{{ route('billlist', $workmaster->Work_Id) }}">
    @csrf
    <button type="submit" class="btn btn-primary"   data-toggle="tooltip" title="BILLS">BILLS <i class="fa-solid fa-file-invoice"></i></button>
</form>
            <form method="POST" action="{{ route('users.delete', ['Work_Id' => $workmaster->Work_Id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn  btn-danger show-alert-delete-box btn-sm"
        data-toggle="tooltip" title="Delete"
        data-work-id="{{ $workmaster->Work_Id }}"><i class="fa fa-trash" aria-hidden="true"></i</button>
</form>

                                </td>





            </tr>
        @endforeach
    @endif
</tbody>
 </table>
 
 <button id="prevButton">Previous</button>
<button id="nextButton">Next</button>


<!-- //when checkbox is active that time active dropdown  -->
<script>
    document.addEventListener("DOMContentLoaded", function()
     {
        // Get all checkbox and select elements
        const checkboxes = document.querySelectorAll(".form-check-input");
        const selects = document.querySelectorAll(".form-control");

        checkboxes.forEach(function(checkbox, index) 
        {
            const select = selects[index];

            checkbox.addEventListener("change", function() 
            {
                select.disabled = !this.checked;
            });

            // Trigger initial state based on checkbox
            select.disabled = !checkbox.checked;
        });
    });
</script>


<!-- // previous code  when checkbox is active that time active dropdown  -->

    <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll(".custom-checkbox");
        const selects = document.querySelectorAll(".form-control");

        checkboxes.forEach(function(checkbox, index) {
            const select = selects[index];

            checkbox.addEventListener("change", function() {
                select.disabled = !this.checked;
            });

            // Trigger initial state based on checkbox
            select.disabled = !checkbox.checked;
        });
    });
</script> -->
<!-- //when checkbox is active that time active dropdown  -->


<!-- //pagination for table display one page 10 record -->
<script>
$(document).ready(function() {
  var table = $('#tableid');
  var rowsPerPage = 10; // Number of rows to display per page
  var currentPage = 0; // Current page index

  // Calculate the total number of pages based on the number of rows and rows per page
  var totalPages = Math.ceil(table.find('tbody tr').length / rowsPerPage);

  // Show the first page and hide the rest of the rows
  showPage(0);

  // Add event listeners to the custom buttons
  $('#prevButton').on('click', function() {
    if (currentPage > 0) {
      currentPage--;
      showPage(currentPage);
    }
  });

  $('#nextButton').on('click', function() {
    if (currentPage < totalPages - 1) {
      currentPage++;
      showPage(currentPage);
    }
  });

  // Function to show rows for the specified page index
  function showPage(pageIndex) {
    table.find('tbody tr').hide();
    var startIndex = pageIndex * rowsPerPage;
    var endIndex = startIndex + rowsPerPage;

    table.find('tbody tr').slice(startIndex, endIndex).show();
  }
});
</script>
<!-- //pagination for table display one page 10 record --> 




 <!-- Include jQuery -->

 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- //On new button Click come one popup -->
<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose Input Method</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>How would you like to input the data?</p>
                <button type="button" class="btn btn-primary" id="manualInputBtn">Manual Input</button>
                <button type="button" class="btn btn-primary" id="excelUploadBtn">Upload Excel File</button>

                <!-- Manual Input Form (hidden by default) -->
                <form id="manualInputForm" style="display: none;">
                    <!-- Your manual input fields here -->
                    <input type="text" name="field1" placeholder="Field 1">
                    <input type="text" name="field2" placeholder="Field 2">
                    <!-- Add more fields as needed -->
                    <button type="button"  class="btn btn-primary" id="manualSubmitBtn">Submit</button>
                </form>

                <!-- File Upload Input (hidden by default) -->
                <form id="fileUploadForm" style="display: none;">
                    <input type="file" name="excel_file" accept=".xls, .xlsx">
                    <button type="button" class="btn btn-primary" id="fileSubmitBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //On new button Click come one popup -->
<!-- //apply new button ajax and error display in alert  -->
<script>
$(document).ready(function() {

    // Show the modal when the "New" button is clicked
    $("#newButton").click(function() {
        $("#myModal").modal('show');
    });

    // Handle "Manual Input" button click
    $("#manualInputBtn").click(function() {
        // Hide the file upload form and show the manual input form
        $("#fileUploadForm").hide();
        $("#manualInputForm").show();
    });

    // Handle "Upload Excel File" button click
    $("#excelUploadBtn").click(function() {
        // Hide the manual input form and show the file upload form
        $("#manualInputForm").hide();
        $("#fileUploadForm").show();
    });

    // Handle "Submit" button click for manual input
    $("#manualSubmitBtn").click(function() {
        // Process the manual input data here
        // Example: Retrieve the values from the input fields
        let field1Value = $("input[name='field1']").val();
        let field2Value = $("input[name='field2']").val();

        // Do something with the data (e.g., AJAX call to server)
        console.log("Manual Input Data:");
        console.log("Field 1:", field1Value);
        console.log("Field 2:", field2Value);

        // Close the modal
        $("#myModal").modal('hide');
    });

    // Handle "Submit" button click for file upload
    $("#fileSubmitBtn").click(function() {
        // Process the uploaded Excel file here
        // Example: Send the file to the server using AJAX
        let fileInput = $("input[name='excel_file']")[0];

        if (fileInput.files && fileInput.files[0]) {
            let formData = new FormData();
            formData.append("excel_file", fileInput.files[0]);

            // Perform your AJAX call here
            $.ajax({
                type: 'POST',
                url: '{{ route("newbtnajax") }}',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response.errorssheet2);
                    console.log(response.excel4);
                    console.log(response.excel2);
                    

                
                    if (response.errorssheet2 && response.errorssheet2.length > 0) {
                        // Display sheet2 errors
                        let errorMessages = response.errorssheet2.join("\n");
                        alert("Sheet2 Errors:\n" + errorMessages);
                    } else if (response.errorssheet1) {
                        // Display sheet1 errors
                        var errorMessages = '';

                        for (var field in response.errorssheet1) {
                            if (response.errorssheet1.hasOwnProperty(field)) {
                                errorMessages += response.errorssheet1[field].join('\n') + '\n';
                            }
                        }

                        alert("Sheet1 Validation Errors:\n" + errorMessages);
                    } 
                    else 
                    {

 console.log(response.excel1);
var sheet1final = response.excel1;

for (var i = 0; i < sheet1final.length; i++) {
    for (var j = 0; j < sheet1final[i].length; j++) {
        var workId = sheet1final[i][j].work_Id;
        console.log(`workid: ${sheet1final[i][j].work_Id}`);
     console.log(`Item No: ${sheet1final[i][j].t_item_no}`);
        console.log(`Sub No: ${sheet1final[i][j].sub_no}`);
        console.log(`Description of Item: ${sheet1final[i][j].item_desc}`);
        console.log(`Tendered Quantity: ${sheet1final[i][j].tnd_qty}`);
        console.log(`Unit: ${sheet1final[i][j].item_unit}`);
        console.log(`Tendered Rate: ${sheet1final[i][j].tnd_rt}`);
        console.log(`Amount: ${sheet1final[i][j].t_item_amt}`);
    }
}
// console.log("Extracted Work Ids:", workId);
// var workId = sheet1final[i][j].work_Id; // Adjust this line based on where you are obtaining the workId
// console.log("Extracted Work Ids:", workId);

console.log(response.excel2);
console.log(response.excel2.Work_Id);


// Navigating to the 'workmaster' URL with the workId parameter
// window.location.href = 'workmaster/' + workId

Swal.fire({
    title: 'Congratulation..',
    text: 'Work Id ' + response.excel2.Work_Id + ' Generated successfully!',
    icon: 'success',
    // showCancelButton: true,
    confirmButtonText: 'ok',
    // cancelButtonText: 'No'
}).then((result) => {
    if (result.isConfirmed) {
        // Display the success message
        Swal.fire({
            icon: 'info',
            title: 'Reloading...',
            showConfirmButton: false
        });

        setTimeout(function () 
        {
            window.location.href = 'workmaster/' + response.excel2.Work_Id;
        }, 200); // Redirect after 3 seconds (adjust as needed)


        // Delay the redirection
    }
    // User clicked "No" or closed the dialog
});
                        
                        // window.location.href = 'workmaster/'+ sheet2Data.Work_Id;
                        // window.location.href = 'workmaster/'+excel2.Work_Id ;      
                        // window.location.href = 'workmaster/' + response.excel2.Work_Id;
           
                    
                    }
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX call
                    console.error(error);
                    alert("Selected Excel file Not Matched for Standed formate.");
                }
            });
        }

        // Close the modal
        $("#myModal").modal('hide');
    });
});</script>
<!-- //apply new button ajax and error display in alert  -->




<script>
    $(document).ready(function () 
    {
        function updateWorkIdData() 
        {
            var inputText = $('#work_id_value').val();

            // Make an AJAX request to your server
            $.ajax({
                url: "{{ url('Routeindworkid') }}",
                method: "GET",
                data: 
                {
                    work_id_value: inputText
                },
                success: function (data) 
                {
                    // Update the displayed data
                    console.log(data.workidgetdata);
                    $('#findworkid').html('');
                    $.each(data.workidgetdata, function (index, workmaster) {
            // Create a new table row
            var newRow = '<tr>' +
                '<td>' + workmaster.Work_Id + '</td>' +
                '<td>' + workmaster.Sub_Div + '</td>' +
                '<td>' + workmaster.F_H_Code + '</td>' +
                '<td>' + workmaster.Work_Nm + '</td>' +
                '<td>' + workmaster.Tnd_Amt + '</td>' +
                '<td>' + workmaster.Agency_Nm + '</td>' +
                '<td>' + workmaster.WO_No + '</td>' +
                '<td>' + workmaster.Wo_Dt + '</td>' +
                '<td>' + workmaster.A_B_Pc + '</td>' +
                '<td>' + workmaster.WO_Amt + '</td>' +
                '<td>' + workmaster.Stip_Comp_Dt + '</td>' +
                '<td>' + workmaster.Tot_Exp + '</td>' +




                // ... other columns ...
                '<td><a href="{{ url('showworkmaster/') }}/' + workmaster.Work_Id + '" class="btn btn-info btn-sm">View</a></td>' +
                '<td><a href="{{ url('editworkmasterroute/') }}/' + workmaster.Work_Id + '" class="btn btn-primary btn-sm">Edit</a></td>' +
                '<td><button type="button" class="btn btn-danger show-alert-delete-box btn-sm" ' +
    'data-toggle="tooltip" title="Delete" ' +
    'data-work-id="' + workmaster.Work_Id + '">' +
    '<i class="fa fa-trash" aria-hidden="true"></i></button></td>' +
    '<td><button type="button" class="btn btn-primary show-bills-box btn-sm" ' +
    'data-toggle="tooltip" title="BILLS" ' +
    'data-work-id="' + workmaster.Work_Id + '">' +
    'BILLS <i class="fa-solid fa-file-invoice"></i></button></td>' +
                '</tr>';

            // Append the new row to the table body
            $('#findworkid').append(newRow);
        });
                }
            });
        }

        function updateWorkNameData() {
            var inputText = $('#work_NM_value').val();

            // Make an AJAX request to your server
            $.ajax({
                url: "{{ url('Routeindworkid') }}",
                method: "GET",
                data: {
                    work_NM_value: inputText
                },
                success: function (data) {
                    // Update the displayed data
                    console.log(data.workidgetdata);
                    $('#findworkid').html('');
                    $.each(data.workidgetdata, function (index, workmaster) {
                        // Create a new table row
                        var newRow = '<tr>' +
                            '<td>' + workmaster.Work_Id + '</td>' +
                            '<td>' + workmaster.Sub_Div + '</td>' +
                            '<td>' + workmaster.F_H_Code + '</td>' +
                            '<td>' + workmaster.Work_Nm + '</td>' +
                            '<td>' + workmaster.Tnd_Amt + '</td>' +
                            '<td>' + workmaster.Agency_Nm + '</td>' +
                            '<td>' + workmaster.WO_No + '</td>' +
                            '<td>' + workmaster.Wo_Dt + '</td>' +
                            '<td>' + workmaster.A_B_Pc + '</td>' +
                            '<td>' + workmaster.WO_Amt + '</td>' +
                            '<td>' + workmaster.Stip_Comp_Dt + '</td>' +
                            '<td>' + workmaster.Tot_Exp + '</td>' +
                            // '<td>' + workmaster.actual_complete_date + '</td>' +
                            '<td><a href="{{ url('showworkmaster/') }}/' + workmaster.Work_Id + '" class="btn btn-info btn-sm">View</a></td>' +
                            '<td><a href="{{ url('editworkmasterroute/') }}/' + workmaster.Work_Id + '" class="btn btn-primary btn-sm">Edit</a></td>' +
                            '<td><button type="button" class="btn btn-danger show-alert-delete-box btn-sm" ' +
    'data-toggle="tooltip" title="Delete" ' +
    'data-work-id="' + workmaster.Work_Id + '">' +
    '<i class="fa fa-trash" aria-hidden="true"></i></button></td>' +
    '<td><button type="button" class="btn btn-primary show-bills-box btn-sm" ' +
    'data-toggle="tooltip" title="BILLS" ' +
    'data-work-id="' + workmaster.Work_Id + '">' +
    'BILLS <i class="fa-solid fa-file-invoice"></i></button></td>' +
                            '</tr>';

                        // Append the new row to the table body
                        $('#findworkid').append(newRow);
                    });
                }
            });
        }

        // Attach the input event listener to the work_id_value input box
        $('#work_id_value').on('input', function () 
        {
            updateWorkIdData();
        });

        $('#work_NM_value').on('input', function () {
            updateWorkNameData();
        });


    });
</script>


<!-- //delete show-alert-delete-box -->
<script>
$(document).ready(function() {
    $('.show-alert-delete-box').click(function(event){
        var form = $(this).closest("form");
        var workId = $(this).data("work-id"); // Retrieve the Work_Id

        // Show a confirmation dialog using SweetAlert
        Swal.fire({
            icon: 'warning',
            title: 'Are you sure?',
            text: 'You are about to delete Work_Id ' + workId + '. This action cannot be undone.',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user clicks "OK," submit the form to delete the record
                Swal.showLoading(); // Show a loading indicator

                // Create a new FormData object
                var formData = new FormData(form[0]);
                formData.append('Work_Id', workId);

                // Submit the form with the correct Work_Id
                $.ajax({
                    url: "{{ route('users.delete', ['Work_Id' => ':workId']) }}".replace(':workId', workId), // Use the named route with the updated Work_Id
                    type: "POST", // Use POST to match the Laravel route
                    data: formData, // Use the FormData object
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Set content type to false
                    success: function(response) {
                        // Handle the success and error responses as before
                        if (response.status === 'success') {
                            // Deletion was successful, show a success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.message,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redirect to the appropriate URL if needed
                                    window.location.href = "{{ url('listworkmasters') }}";
                                }
                            });
                        } else if (response.status === 'error') {
                            // Work_Id exists in bills, show an error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error
                        console.error(error);
                    }
                });
            }
        });

        // Prevent the form from submitting immediately
        event.preventDefault();
    });
});
</script>
    




<!-- //delete show-alert-delete-box --> 




@endsection()
