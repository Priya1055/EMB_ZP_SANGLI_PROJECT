@extends("layouts.header")
@section('content')

    
    <style>
  th {
        background: pink;
        width: 80px; /* Set a common width for all th cells */
        text-align: center;
        padding:10px; /* Center the content horizontally */
    }      
      .padded-content {
    padding: 0 30px; 
    /* display: inline-block;  */
 overflow: hidden;
     width:380px;
 }  
/* .padded-subdiv {
    padding: 0 50px; 

     overflow: hidden;
    width:260px; 

    /* width:300px; 
/* } */ */ */
.padded-actual_complete_date
 {
    padding: 0 30px; /* Add space on left and right sides */
    overflow: hidden;
    width:100px; */
    }  
    
    .padded-content_stipu 
    {
     width:-100px;
    }  

      
</style>
    
   
    
<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
        </ul>
   
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Work-Master Records</h3>
                    <div  style="text-align: right; font-size: 20px; font-weight:bold;">

                        <a href="{{url('viewfindworkmaster')}}" class="btn"><i class="fa-solid fa-magnifying-glass fa-2xl" style="color: #63E6BE;"></i><b>FIND</b></a>
                        <!-- //new button ajax -->
                        <!-- <a class="btn btn-primary btn-lg" id="newButton">New</a> -->
                        @if(auth()->user()->usertypes === "SO")

                        <a class="btn" style="bgcolor: #5783db;" id="newButton"><i class="fa-solid fa-plus fa-2xl" style="color: #B197FC;"></i><b>NEW</b></a>
                        @endif
                        <!-- //new button ajax -->

        </div>
                </div>
              

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>Work Id</th>
                              <th>Sub Division Name</th>
                              <th>Fund Head</th>
                              <th>Name of Work</th>
                              <th>Amount Put to Tender</th>
                              <th> Work Order No</th>
                              <th>Stipulated Date of Completion</th>
                              <th>Total Expenses</th>
                              <th colspan='3' style="text-align:center ">Action</th>
                         </tr>
                         <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Agency</th>
                              <th></th>
                              <th>Work Order Date</th>
                              <th></th>
                              <th></th>
                              <th></th>
                         </tr>
                         <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Work Order Amount</th>
                              <th></th>
                              <th></th>
                              <th></th>
                         </tr>

                        </thead>
                        <tbody>
                            @foreach  ($users as $user)
                            <tr>
                            <td>{{ $user->Work_Id }}</td>
                           <td class="padded-subdiv">{{ $user->Sub_Div }}</td> 
                           <td>{{ $user->F_H_Code }}</td>
                           <td class="padded-content">{{ $user->Work_Nm }}<br><br><hr>{{ $user->Agency_Nm }}<br> </td>
                           <td>{{ $user->Tnd_Amt }}</td>
                           <td>{{ $user->WO_No }}<br><hr>{{ date('d/m/Y', strtotime($user->Wo_Dt)) }}<br> <hr>{{ $user->WO_Amt }}<br><hr> </td>
                           <td class="padded-content_stipu">{{ date('d/m/Y', strtotime($user->Stip_Comp_Dt)) }}</td>
                           <td>{{ $user->Tot_Exp }}</td>





                                <td>
                                <form method="GET" action="{{ url('showworkmaster/' . $user->Work_Id) }}">
                                @csrf
    <button type="submit" class="btn btn-info"   data-toggle="tooltip" title="View Workmaster">
        <i class="fa fa-eye custom-icon" aria-hidden="true"></i>
    </button>
</form>

@auth
@if(auth()->user()->usertypes=='SO')

<form method="GET" action="{{ url('editworkmasterroute/'.$user->Work_Id) }}">
@csrf
    <button type="submit" class="btn btn-primary"   data-toggle="tooltip" title="Edit Workmaster">
        <i class="fa fa-pencil" style="color:white;"></i>
    </button>
</form>

@endif
                         <!-- <a href="{{url('listemb/'.$user->Work_Id)}}" class="btn btn-primary btn-sm">EMB</a>
            <a href="{{url('Abstract/'.$user->Work_Id)}}" class="btn btn-primary btn-sm">Abstract</a> 
            - -->

            
            <form method="get" action="{{ route('billlist', $user->Work_Id) }}">
    @csrf
    <button type="submit" class="btn btn-primary"   data-toggle="tooltip" title="BILLS"><b>BILLS</b> <i class="fa-solid fa-file-invoice"></i></button>
</form>

@if(auth()->user()->usertypes=='SO')

            <form method="POST" action="{{ route('users.delete', ['Work_Id' => $user->Work_Id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn  btn-danger show-alert-delete-box"
        data-toggle="tooltip" title="Delete"
        data-work-id="{{ $user->Work_Id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
</form>
@endif
@endauth                          


                                </td>

                                <!-- <td>


                                </td>
                                <td>


                                </td>

                                <td>
                                </td> --> 
                                
                            </tr>
                        </tbody>
                        @endforeach

                    </table>
                    
                  
                    <div class=" text-right">
    <small>&copy;sis infotech sangli</small>
</div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection()


 <!-- Include jQuery -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include Bootstrap JavaScript AFTER jQuery -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
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
                    success: function (response) {
                                Swal.fire({
                                    icon: response.status === 'success' ? 'success' : 'error',
                                    title: response.message,
                                    showConfirmButton: false,  // Hide the "OK" button
                                    timer: 2000,  // Set a timer for 2 seconds (adjust as needed)
                                }).then(() => {
                                    if (response.status === 'success') {
                                        window.location.href = "{{ url('listworkmasters') }}";
                                    }
                                });
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
                    //var workId = response.excel2.DBWork_Id;
                    

                
                    if (response.errorssheet2 && response.errorssheet2.length > 0) 
                    {
                        // Display sheet2 errors
                        let errorMessages = response.errorssheet2.join("\n");
                        alert("Sheet2 Errors:\n" + errorMessages);
                    } else if (response.errorssheet1) {
                        // Display sheet1 errors
                        var errorMessages = '';

                        for (var field in response.errorssheet1) 
                        {
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
console.log(sheet1final);
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

console.log(response.excel1.Work_Id);
console.log(response.excel2.Work_Id);
console.log(response.excel2.Work_Id);
console.log(workId);


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
});

</script>
<!-- //apply new button ajax and error display in alert  -->




















   <!-- </body>
</html> -->







