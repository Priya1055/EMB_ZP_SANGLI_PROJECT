<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- header -->
  <link rel="stylesheet" href="{{ asset('path/to/styles.css') }}">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- nav bar bootstrap cdn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-o50SzAgov2v0vPEIr80p/3hlfJTN2q8MVeJZ9R1qVSwcUQ/fIBIbkuFJUnSeMrXCebHfhpGQlsd1VxqkVdNlg==" crossorigin="anonymous" /> --}}

    <!-- new button popup alert links -->
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- Include SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <!-- Lightbox2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <!-- Include jQuery UI CSS and JavaScript from CDN -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <style>
        .custom-navbar {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Add a shadow */

            }

            .custom-navbar .navbar-nav .nav-item {

                border-radius: 10px; /* Add rounded corners */
                    color: white;
                margin-right: 10px; /* Adjust the margin as needed */
            }
            .custom-navbar .navbar-nav .nav-item a {
                color: white;
                font-weight: bold;
            }

            .custom-navbar {
                /* position: fixed; */
                width: 100%;
                z-index: 1000; /* Ensure the header is on top of other content */
            }

            .custom-navbar .dropdown-menu div {
                background-color: white;
                color: white;

            }
            #emb {
                /* margin-top: 100px; Adjust this value to set the space between header and page */
            }
            .custom-navbar .navbar-nav .nav-item .dropdown-item {
                color: #64748b; /* Set dropdown item text color to black */
            }
                /* Add striped background to dropdown items */
                .custom-navbar .navbar-nav .nav-item .dropdown-item:nth-child(odd) {
                background-color: #f5f5f5; /* Light gray shade for odd items */
            }

            .custom-navbar .navbar-nav .nav-item .dropdown-item:nth-child(even) {
                background-color: #ffffff; /* White background for even items */
            }

        #name{
            font-size: 20px;
            font-weight: bold;
        }
        footer {
            margin-top: 20px;
      
        bottom: 0;
        width: 100%;
        }
        
                /* // photo Doc Vdo css */
        /* when click on that image image make it lage  */
        .enlarged-image-modal 
        {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

.enlarged-image-content 
{
    display: block;
    margin: auto;
    max-width: 90%;
    max-height: 90%;
}

.close-enlarged-image 
{
    position: absolute;
    top: 15px;
    right: 25px;
    font-size: 35px;
    font-weight: bold;
    color: #f1f1f1;
    cursor: pointer;
}
        /* when click on that image image make it lage  */
/* Make the modal full screen */
.modal-fullscreen 
{
width: 100%;
max-width: 100%;
height: 100%;
max-height: 100%;
margin: 0;
top: 0;
left: 0;
right: 0;
bottom: 0;
border: none;
background: transparent;
box-shadow: none;
position: fixed;
}

        /* // photo Doc Vdo css */
        
        
            /* Back button css */

#backButton {
    background-color: #b8d7d5; /* Light background color */
    color: black; /* Dark black color for text */
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    display: inline-block;
    text-decoration: none;
}

#backButton .fa-chevron-left {
    margin-right: 5px;
    color: #000; /* Dark black color for the arrow */
}

#backButton:hover {
    background-color: #66948f; /* Lighter background color on hover */
}

/* //nav display at mobile device in list page responsive */

.custom-toggler {
    background: none; /* Remove background color */
    border: none; /* Remove border */
    padding: 0; /* Remove padding */
}

.custom-toggler .navbar-toggler-icon {
    width: 1.5em; /* Set the width of the icon */
    height: 1.5em; /* Set the height of the icon */
    background-color: transparent; /* Make the background transparent */
    border: none; /* Remove border */
    outline: none; /* Remove outline */
}

.custom-toggler .navbar-toggler-icon::before {
    content: "\2630"; /* Unicode character for a horizontal list icon (☰) */
    color: white; /* Set the color of the icon */
    font-size: 1.5em; /* Set the font size */

}

/* //nav display at mobile device in list page responsive */




    </style>
</head>
<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="navbar-header background-color: rgb(55, 55, 55)">
                <a class="navbar-brand text-white font-weight-bold" href="{{ url('report', $embsection2->t_bill_Id ?? '') }}"><i class="fas fa-folder-open" aria-hidden="true"></i> REPORTS</a>
            </div>
                        <!-- Toggle button for mobile -->
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- MB Dropdown -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white font-weight-bold navbar-brand" href="#" id="dropdownMenu3" role= "button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"> MB</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu3" style="background-color: #343a40">
                    <a class="nav-link text-white font-weight-bold" href="{{ url('Mb', $embsection2->t_bill_Id ?? '') }}">MB</a>
                    <!--<a class="nav-link text-white font-weight-bold" href="{{ url('abstractrep', $embsection2->t_bill_Id ?? '') }}">Abstract</a>-->
                </div>
            </li>
            
                        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white font-weight-bold navbar-brand" href="#" id="dropdownMenu3" role= "button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"> Photo</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu3" style="background-color: #343a40">
                    <a id="viewPhotoDocLink" class="nav-link text-white font-weight-bold"  onclick="uploadimages();"  style="cursor: pointer;" >View Photo/Doc</a>

                </div>
            </li>

            
        @if($embsection2->mb_status >= 7)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white font-weight-bold navbar-brand" href="#" id="dropdownMenu3" role= "button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="nav-link text-white font-weight-"> CheckList</a>
                <div class="dropdown-menu"whitearia-labelledby="dropdownMenu3" style="background-color: #343a40; width:290px">
                @if($embsection2->mb_status >= 7)
                <a class="nav-link text-white font-weight-bold width:30px" href="{{ url('deputychecklist', $embsection2->t_bill_Id ?? '') }}">SUBDIVISION</a>
                @endif
                @if($embsection2->mb_status > 9  && $embsection2->mb_status <= 13)
                <a class="nav-link text-white font-weight-bold" href="{{ url('DivisionChecklist', $embsection2->t_bill_Id ?? '') }}">DIVISION</a>
                @endif
                </div>
            </li>
            @endif

           
            @if($embsection2->mb_status >= 6)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white font-weight-bold navbar-brand" href="#" id="dropdownMenu3" role= "button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="nav-link text-white font-weight-"> BILL</a>
                <div class="dropdown-menu"whitearia-labelledby="dropdownMenu3" style="background-color: #343a40; width:290px">
                    <a class="nav-link text-white font-weight-bold width:30px" href="{{ url('BILL', $embsection2->t_bill_Id ?? '') }}">BILL</a>

                    <a class="nav-link text-white font-weight-bold" href="{{ url('Materialconsstmt', $embsection2->t_bill_Id ?? '') }}">Material Consumption Statement</a>

                    <a class="nav-link text-white font-weight-bold" href="{{ url('Recovertstmt', $embsection2->t_bill_Id ?? '') }}">Recovery Statement</a>

                    <a class="nav-link text-white font-weight-bold" href="{{ url('Excesssavestmt', $embsection2->t_bill_Id ?? '') }}">Excess Saving Statement</a>

                    <a class="nav-link text-white font-weight-bold" href="{{ url('Royaltystmt', $embsection2->t_bill_Id ?? '') }}">Royalty Statement</a>
               @if($embsection2->final_bill == 1)
                    <a class="nav-link text-white font-weight-bold" href="{{ url('Compcertf', $embsection2->t_bill_Id ?? '') }}">Work Completion Certificate</a>
                 @if($embsection2->WHOCdocument != null)
                    <a class="nav-link text-white font-weight-bold" href="{{ url('Workhandcertf', $embsection2->t_bill_Id ?? '') }}">Work-Hand Over Certificate</a>
                   @endif
                    @endif
                    <a class="nav-link text-white font-weight-bold" href="{{ url('form_xiv', $embsection2->t_bill_Id ?? '') }}">Form XIV</a>
                  
                </div>
            </li>
            @endif
                            </ul>
            </div>

        </nav>
    </header>

    @yield('content')

    <footer class="bg-light text-center text-lg-start" id="">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-dark" href="https://www.standardinfosys.in//">STANDARD INFOSYS.IN</a>
    </div>
    <!-- Copyright -->
    </footer>


    </body>
    
    
    <!-- Upload images document and videos -->
<!-- Upload images document and videos -->
<div class="modal fade" id="uploadimgmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal content goes here -->
            <form action="{{ url('uploadimgdocvdo') }}" id="uploadForm" enctype="multipart/form-data" method="post">
            @csrf
                              <div class="modal-bodyimage">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 form-group">
 <!-- Hidden input for t_bill_Id -->
                  <input type="hidden" id="rabillid" name="t_bill_Id" value="{{$embsection2->t_bill_Id ?? ''}}">

                                <!-- <label for="photo1" class="font-weight-bold">Photo 1:</label>
                                <input type="file" class="form-control image-input" id="newphoto1" name="photo1" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto1" src="" alt="Previous Photo1" style="max-width: 100px; max-height: 100px;">
                            </div>

                            <div class="col-md-2 form-group">
                            <!-- <label for="photo2" class="font-weight-bold">Photo 2:</label>
                                <input type="file" class="form-control image-input" id="newphoto2" name="photo2" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto2" src="" alt="Previous Photo2" style="max-width: 100px; max-height: 100px;">
                            </div>
                            <div class="col-md-2 form-group">
                            <!-- <label for="photo3" class="font-weight-bold">Photo 3:</label>
                                <input type="file" class="form-control image-input" id="newphoto3" name="photo3" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto3" src="" alt="Previous Photo3" style="max-width: 100px; max-height: 100px;">
                            </div>
                            <div class="col-md-2 form-group">
                            <!-- <label for="photo4" class="font-weight-bold">Photo 4:</label>
                                <input type="file" class="form-control image-input" id="newphoto4" name="photo4" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto4" src="" alt="Previous Photo4" style="max-width: 100px; max-height: 100px;">
                            </div>
                            <div class="col-md-2 form-group">
                            <!-- <label for="photo5" class="font-weight-bold">Photo 5:</label>
                                <input type="file" class="form-control image-input" id="newphoto5" name="photo5" accept="image/jpeg, image/jpg">                                -->
                                    <img id="previewPhoto5" src="" alt="Previous Photo5" style="max-width: 100px; max-height: 100px;">
                          </div>
                        </div>
    <div class="row">
        <div class="col-md-3 form-group">
            <!-- <label for="documents1" class="font-weight-bold">Document 1:</label>
            <input type="file" class="form-control document-input" id="newdocuments1" name="documents1" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx"> -->
            <a href="#" class="document-link" target="_blank" id="documentLink1">View Document</a>
        </div>

        <div class="col-md-3 form-group">
            <!-- <label for="documents2" class="font-weight-bold">Document 2:</label>
            <input type="file" class="form-control document-input" id="newdocuments2" name="documents2" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx"> -->
            <a href="#" class="document-link" target="_blank" id="documentLink2">View Document</a>
        </div>

        <div class="col-md-3 form-group">
           <!-- <label for="documents3" class="font-weight-bold">Document 3:</label>
           <input type="file" class="form-control document-input" id="newdocuments3" name="documents3" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx"> -->
           <a href="#" class="document-link" target="_blank" id="documentLink3">View Document</a>
         </div>

    </div>

    <div class="row">
    <!-- Additional Document Row 1 -->

    <div class="col-md-3 form-group">
        <!-- <label for="documents4" class="font-weight-bold">Document 4:</label>
        <input type="file" class="form-control document-input" id="newdocuments4" name="documents4" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx"> -->
        <a href="#" class="document-link" target="_blank" id="documentLink4">View Document</a>
    </div>

    <div class="col-md-3 form-group">
        <!-- <label for="documents5" class="font-weight-bold">Document 5:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink5">View Document</a>
    </div>

    <div class="col-md-3 form-group">
        <!-- <label for="documents6" class="font-weight-bold">Document 6:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink6">View Document</a>
    </div>
    
    <div class="col-md-3 form-group">
        <!-- <label for="documents7" class="font-weight-bold">Document 7:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink7">View Document</a>
    </div>

</div>

<div class="row">
    <!-- Additional Document Row 2 -->

    <div class="col-md-3 form-group">
        <!-- <label for="documents8" class="font-weight-bold">Document 8:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink8">View Document</a>
    </div>

    <div class="col-md-3 form-group">
        <!-- <label for="documents9" class="font-weight-bold">Document 9:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink9">View Document</a>
    </div>

    <div class="col-md-3 form-group">
        <!-- <label for="documents6" class="font-weight-bold">Document 10:</label> -->
        <a href="#" class="document-link" target="_blank" id="documentLink10">View Document</a>
    </div>


    <div class="col-md-3 form-group">
              <!-- <label for="video" class="font-weight-bold">Video:</label> -->
            <div class="video-container" style="width: 220px; height: 150px; overflow: hidden;">
               <video id="videoPreview" controls style="width: 100%; height: 100%;"></video>
           </div>
        </div>
</div>
                    </div>
                </div>
                <div class="modal-footer1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary" >Upload</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="enlarged-image-modal">
    <span class="close-enlarged-image">&times;</span>
    <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>







<!-- ajax for images upload and documents -->
<script>
function uploadimages() {
    var tbillid = $('#rabillid').val();

    // Perform an Ajax request to load the modal content
    $.ajax({
        url: "{{ url('uploadimages') }}",
        type: 'POST',
        data: { tbillid: tbillid, _token: "{{ csrf_token() }}" },
        success: function (data) {
                      var paths = data.paths;
                      console.log(paths.photo1);
                      var document=data.documentPaths
                      console.log(document.doc1);
                      var videoPath = data.videoPath;
                      console.log(videoPath); // Assuming 'videoPath' is a string


                          // Function to toggle visibility based on data presence
           // Clear existing labels before adding new ones
           clearLabels();

// Function to add a label dynamically
// Function to add a label dynamically above the element
// Function to add a label

// Loop through the photo previews and update sources
for (var i = 1; i <= 5; i++) {
    var photoId = "#previewPhoto" + i;
    if (paths["photo" + i] !== null) {
        $(photoId).attr('src', paths["photo" + i]);
        
        // Add label dynamically and prepend it before the image
        $(photoId).before(addLabel('Photo '));
        
        $(photoId).parent().removeClass('d-none');  // Show the parent container
    } else {
        $(photoId).attr('src', ''); // Set an empty source or a placeholder
        $(photoId).parent().addClass('d-none');  // Hide the parent container
    }
}



// Loop through the document links and update hrefs
for (var i = 1; i <= 10; i++) {
    var docLinkId = "#documentLink" + i;
    if (document["doc" + i] !== null) {
        $(docLinkId).attr('href', document["doc" + i]);
       
        $(docLinkId).before(addLabel('Document '));
        $(docLinkId).parent().removeClass('d-none');  // Show the parent container
    } else {
        $(docLinkId).attr('href', '#'); // Set a placeholder or disable the link
        $(docLinkId).parent().addClass('d-none');  // Hide the parent container
    }
}

// Update video preview
if (videoPath !== null) {
    $('#videoPreview').attr('src', videoPath);
  
    $('#videoPreview').before(addLabel('Video '));
    $('#videoPreview').parent().removeClass('d-none');  // Show the parent container
} else {
    $('#videoPreview').attr('src', ''); // Set an empty source or a placeholder
    $('#videoPreview').parent().addClass('d-none');  // Hide the parent container
}
// Show the modal
  $('#uploadimgmodal').modal('show');
},        error: function (xhr, status, error) 

{
            // Handle errors here
            console.error(xhr, status, error);
        }
    });
}
function addLabel(labelText) {
    var labelHtml = '<label class="font-weight-bold">' + labelText + ':</label>';
    return labelHtml;
}
// Function to clear labels
function clearLabels() {
    $('.font-weight-bold').remove(); // Remove all elements with the 'font-weight-bold' class
}



$('#newphoto1').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto1').attr('src', e.target.result);
        $('#previewPhoto1').show();
    };
    reader.readAsDataURL(this.files[0]);
});

// Your existing code
$('#newphoto2').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto2').attr('src', e.target.result);
        $('#previewPhoto2').show();
    };
    reader.readAsDataURL(this.files[0]);
});

// Your existing code
$('#newphoto3').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto3').attr('src', e.target.result);
        $('#previewPhoto3').show();
    };
    reader.readAsDataURL(this.files[0]);
});

$('#newphoto4').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto4').attr('src', e.target.result);
        $('#previewPhoto4').show();
    };
    reader.readAsDataURL(this.files[0]);
});

$('#newphoto5').change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewPhoto5').attr('src', e.target.result);
        $('#previewPhoto5').show();
    };
    reader.readAsDataURL(this.files[0]);
});
// Function to show a larger image when preview image is clicked
$('#previewPhoto1').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});

$('#previewPhoto2').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});

$('#previewPhoto3').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});

$('#previewPhoto4').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});

$('#previewPhoto5').click(function() {
  var previewImageSrc = $(this).attr('src');
  $('.enlarged-image-content').attr('src', previewImageSrc);
  $('.enlarged-image-modal').fadeIn();
});
// Function to hide the larger image
function hideLargeImage() {
  $('.enlarged-image-modal').fadeOut();
}

// Close the larger image when the modal background is clicked
$('.enlarged-image-modal').on('click', function(event) {
  if (event.target === this) {
    hideLargeImage();
  }
});

// Close the larger image when the close button is clicked
$('body').on('click', '.close-enlarged-image', function() {
  hideLargeImage();
});

// Function to create a link to view the selected document
function createDocumentLink(fileInput, linkElement) {
  if (fileInput.files && fileInput.files[0]) {
    var fileURL = URL.createObjectURL(fileInput.files[0]);
    $(linkElement).attr('href', fileURL).text('View Document');
  }
}


// Bind the createDocumentLink function to the change event of the document input
$('.document-input').change(function() {
  var linkElement = $(this).siblings('.document-link');
  createDocumentLink(this, linkElement);
});

var initialInputValues = {};
// Store the initial values when the page loads
$('.form-control').each(function() {
    initialInputValues[this.id] = this.value;
  });

  // Reset input values to their initial values
  function resetInputValues() {
    $('.form-control').each(function() {
      this.value = initialInputValues[this.id];
      // Clear previewed images by resetting their src attributes
 $('#previewPhoto1').attr('src', '');
    $('#previewPhoto2').attr('src', '');
    $('#previewPhoto3').attr('src', '');
    $('#previewPhoto4').attr('src', '');
    $('#previewPhoto5').attr('src', '');

   // Clear video preview
   var videoElement = document.getElementById('videoPreview');
        videoElement.src = '';
        videoElement.style.display = 'none';

    // Clear document links by resetting their href attributes and content
    $('.document-link').attr('href', '#');
    $('.document-link').html('View Document');
    });
  }

 // Function to show a video preview when the video input changes
$('#newvideo').change(function() {
    var videoElement = document.getElementById('videoPreview');
    var videoURL = URL.createObjectURL(this.files[0]);
    videoElement.src = videoURL;
    videoElement.style.display = 'block';
});

// Function to hide the video preview
function hideVideoPreview() {
    var videoElement = document.getElementById('videoPreview');
    videoElement.src = '';
    videoElement.style.display = 'none';
}

function hideMediaPreviews() {
    // Hide video
    var videoElement = document.getElementById('videoPreview');
    videoElement.src = '';
    videoElement.style.display = 'none';

    // Clear and hide image previews
    $('.image-input').each(function() {
        var previewID = $(this).data('image');
        $('#' + previewID).attr('src', '');
        $('#' + previewID).hide();
    });
}
// Close the video preview when the modal background is clicked
$('.enlarged-image-modal').on('click', function(event) {
    if (event.target === this) {
        hideLargeImage();
       // hideMediaPreviews();
        //hideVideoPreview(); // Hide video when the modal is closed
    }
});

// Close the video preview when the close button is clicked
$('body').on('click', '.close-enlarged-image', function() {
    hideLargeImage();
    //hideMediaPreviews();
    //hideVideoPreview(); // Hide video when the modal is closed
});


  // Prevent form submission when the Cancel button is clicked
  $('.modal-footer .btn-secondary, .modal-header .close').click(function(e) {
    e.preventDefault();
    hideLargeImage();
    resetInputValues();
    //hideVideoPreview();
  });
</script>

<!-- //when close that page that time reload page  -->
<script>
        function refreshPage() 
        {
            location.reload();
        }
        // Event listener for modal close
        $('#uploadimgmodal').on('hidden.bs.modal', function (e) 
        {
            // Refresh the page when the modal is closed
            refreshPage();
        });
        
</script>
<!-- //when close that page that time reload page  -->



</html>
