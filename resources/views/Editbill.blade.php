@extends('layouts.header')
@section('content')
<!-- Moment.js Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<style>
      /* Increase font weight of labels */
 .form-group label {
      font-weight: bold;
    }

    .enlarged-image-modal {
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

.enlarged-image-content {
    display: block;
    margin: auto;
    max-width: 90%;
    max-height: 90%;
}

.close-enlarged-image {
    position: absolute;
    top: 15px;
    right: 25px;
    font-size: 35px;
    font-weight: bold;
    color: #f1f1f1;
    cursor: pointer;
}

</style>

<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $lastBill->work_id ?? '') }}">Bill</a></li>
        </ul>


  <a href="{{ url('billlist', $lastBill->work_id ?? '')}}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a>

<div class=" row offset-5"> 
    <h4>EDIT BILL</h4>
</div>
@include('sweetalert::alert')
<div class="container border py-2 col-md-12" style="margin">
<div class="d-flex justify-content-end align-items-center">
        <button type="button" class="btn ml-2 btn-primary" onclick="uploadimages();" id="imgButton" title="UPLOAD IMG DOC VDO"><i class="fa fa-upload" aria-hidden="true"></i> Insert/Edit Documents</button>
 </div>

<form  id="newBillForm" action="{{ url('updatebill' , ['id' =>$lastBill->t_bill_Id ])}}" method="POST" class="row">
        @csrf

        <!-- Previous bill date -->
        <div class="row offset-7" style="margin-top:10px;">
            <div class="col-6">
                <div class="form-group">
                    <label for="pbilldt">Previous Bill Date:</label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="date" class="form-control" id="pbilldt" name="pbilldt" value="{{$lastBill->previousbilldt ?? ''}}" disabled>
                </div>
            </div>
        </div>

        <!-- R.A.Bill Id -->
        <div class="form-group col-6">
            <label for="rabillid">R.A.Bill Id:</label>
            <input type="text" class="form-control" id="newrabillid" name="t_bill_Id" value="{{$lastBill->t_bill_Id ?? ''}}" disabled>
        </div>

        <!-- R.A.Bill No -->
        <div class="form-group col-6">
            <label for="rabillno">R.A.Bill No:</label>
            <input type="text" class="form-control" id="newrabillno" name="t_bill_No" value="{{$lastBill->t_bill_No ?? ''}}" disabled>
        </div>

        <!-- Date -->
        <div class="form-group col-md-6">
            <label for="date">Bill Date:</label>
            <input type="date" class="form-control" id="newbilldate" name="Bill_Dt" value="{{$lastBill->Bill_Dt ?? ''}}" onchange="updateMeasurementDate()">
        </div>

        <!-- Bill Amt -->
        <div class="form-group col-md-6">
            <label for="rabmino">Bill Amt:</label>
            <input type="text" class="form-control" id="newbillamt" name="bill_amt" value="{{$lastBill->bill_amt ?? ''}}" disabled>
        </div>

        <!-- Rec Amt -->
        <div class="form-group col-md-6">
            <label for="recamt">Rec Amt:</label>
            <input type="text" class="form-control" id="newrecamt" name="rec_amt" value="{{$lastBill->rec_amt ?? ''}}" disabled>
        </div>

        <!-- Net Amt -->
        <div class="form-group col-md-6">
            <label for="netamt">Net Amt:</label>
            <input type="text" class="form-control" id="newnetamt" name="net_amt" value="{{$lastBill->net_amt ?? ''}}" disabled>
        </div>

        <!-- Measdate from -->
        <div class="form-group col-md-6">
            <label for="measdtfr">Measurement Date From:</label>
            <input type="date" class="form-control" id="measdtfr" name="measdtfr" value="{{$lastBill->meas_dt_from ?? ''}}">
        </div>

        <!-- Measdate upto -->
        <div class="form-group col-md-6">
            <label for="measdtupto">Measurement Date Upto:</label>
            <input type="date" class="form-control" id="measdtupto" name="measdtupto" value="{{$lastBill->meas_dt_upto ?? ''}}">
        </div>

        <!-- Gst rate -->
        <div class="form-group col-md-4">
            <label for="gstrate">GST Rate:</label>
            <input type="text" class="form-control" id="gstrate" name="gstrate" value="{{$lastBill->gst_rt ?? ''}}">
        </div>

        <!-- CV No -->
        <div class="form-group col-md-4">
            <label for="cvno">CV No:</label>
            <input type="text" class="form-control ISMinput" id="newcvno" name="cv_no" value="{{$lastBill->cv_no ?? ''}}">
        </div>

        <!-- CV Date -->
        <div class="form-group col-md-4">
            <label for="cvdate">CV Date:</label>
            <input type="date" class="form-control" id="newcvdate" name="cv_dt" value="{{$lastBill->cv_dt ?? '' }}">
        </div>

        <!-- Bill Type -->
        <div class="form-group col-md-6">
            <label for="billtype">Bill Type:</label>
            <select class="form-control form-select" id="myselect" name="bill_type">
                <option value="Normal" {{ isset($lastBill) && $lastBill->bill_type === 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="WDBNM" {{ isset($lastBill) && $lastBill->bill_type === 'WDBNM' ? 'selected' : '' }}>WDBNM</option>
                <option value="Sec_Adv" {{ isset($lastBill) && $lastBill->bill_type === 'Sec_Adv' ? 'selected' : '' }}>Secured Advance</option>
                <option value="Mob_Adv" {{ isset($lastBill) && $lastBill->bill_type === 'Mob_Adv' ? 'selected' : '' }}>Mobilization Advance</option>
            </select>
        </div>

        <!-- Final Bill -->
        <!-- <div class="form-group col-md-6">
            <label for="finalbill">Final Bill:</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="finalbill" name="final_bill" value="1" {{ isset($lastBill) && $lastBill->final_bill == 1 ? 'checked' : '' }} onchange="updateFinalBill(this)">
                <label class="form-check-label" for="finalbill">Check if final bill</label>
            </div>
        </div> -->

       
           
        <!-- Submit button -->
        <div class="col-sm-12 text-center mt-2">
            <button type="submit" id="newbillsubmit" class="btn btn-primary" onclick="submitnewbillForm(event)">Submit</button>
        </div>
<br>
<br>
<br>
<br>
        <!-- hidden inputs -->
        <input type="hidden" name="previousbilldt" value="{{ $lastBill->previousbilldt }}">
<input type="hidden" name="t_bill_Id" value="{{ $lastBill->t_bill_Id }}">
<input type="hidden" name="t_bill_No" value="{{ $lastBill->t_bill_No }}">
<input type="hidden" name="bill_amt" value="{{ $lastBill->bill_amt }}">
<input type="hidden" name="rec_amt" value="{{ $lastBill->rec_amt }}">
<input type="hidden" name="net_amt" value="{{ $lastBill->net_amt }}">
<!-- Add other hidden fields for disabled inputs here -->

    </form>
    <!-- <div class="d-flex justify-content-end align-items-center">
        <button type="button" class="btn ml-2 btn-primary" onclick="uploadimages();" id="imgButton" title="UPLOAD IMG DOC VDO"><i class="fa fa-upload" aria-hidden="true"></i> show Uploaded Photo</button>
 </div> -->

</div>



<!-- Upload images document and videos -->
<div class="modal fade" id="uploadimgmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 90%;" role="document">
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
                              <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 form-group">
 <!-- Hidden input for t_bill_Id -->
                  <input type="hidden" id="rabillid" name="t_bill_Id" value="{{$lastBill->t_bill_Id ?? ''}}">

                                <label for="photo1" class="font-weight-bold">Photo 1:</label>
                                <input type="file" class="form-control image-input" id="newphoto1" name="photo1" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto1" src="" alt="Previous Photo" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo1" data-preview="#previewPhoto1" onclick="deleteFile(this)">❌</span>

                            </div> 

                            <div class="col-md-3 form-group">
                            <label for="photo2" class="font-weight-bold">Photo 2:</label>
                                <input type="file" class="form-control image-input" id="newphoto2" name="photo2" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto2" src="" alt="Previous Photo2" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo2" data-preview="#previewPhoto2" onclick="deleteFile(this)">❌</span>

                            </div>
                            <div class="col-md-3 form-group">
                            <label for="photo3" class="font-weight-bold">Photo 3:</label>
                                <input type="file" class="form-control image-input" id="newphoto3" name="photo3" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto3" src="" alt="Previous Photo3" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo3" data-preview="#previewPhoto3" onclick="deleteFile(this)">❌</span>

                            </div>
                            <div class="col-md-3 form-group">
                            <label for="photo4" class="font-weight-bold">Photo 4:</label>
                                <input type="file" class="form-control image-input" id="newphoto4" name="photo4" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto4" src="" alt="Previous Photo4" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo4" data-preview="#previewPhoto4" onclick="deleteFile(this)">❌</span>

                            </div>
                            <div class="col-md-3 form-group">
                            <label for="photo5" class="font-weight-bold">Photo 5:</label>
                                <input type="file" class="form-control image-input" id="newphoto5" name="photo5" accept="image/jpeg, image/jpg">                               
                                    <img id="previewPhoto5" src="" alt="Previous Photo5" style="max-width: 100px; max-height: 100px;">
                                    <span class="delete-btn" style="cursor: pointer;" data-target="photo5" data-preview="#previewPhoto5" onclick="deleteFile(this)">❌</span>

                          </div>
                        </div>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="documents1" class="font-weight-bold">Document 1:</label>
            <input type="file" class="form-control document-input" id="newdocuments1" name="documents1" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
            <a href="#" class="document-link" target="_blank" id="documentLink1">View Document</a>
            <span class="delete-btn" style="cursor: pointer;" data-target="doc1" data-preview="#documentLink1" onclick="deleteFile(this)">❌</span>
        </div>

        <div class="col-md-3 form-group">
            <label for="documents2" class="font-weight-bold">Document 2:</label>
            <input type="file" class="form-control document-input" id="newdocuments2" name="documents2" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
            <a href="#" class="document-link" target="_blank" id="documentLink2">View Document</a>
            <span class="delete-btn" style="cursor: pointer;" data-target="doc2" data-preview="#documentLink2" onclick="deleteFile(this)">❌</span>

        </div>

        <div class="col-md-3 form-group">
           <label for="documents3" class="font-weight-bold">Document 3:</label>
           <input type="file" class="form-control document-input" id="newdocuments3" name="documents3" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
           <a href="#" class="document-link" target="_blank" id="documentLink3">View Document</a>
           <span class="delete-btn" style="cursor: pointer;" data-target="doc3" data-preview="#documentLink3" onclick="deleteFile(this)">❌</span>

         </div>

    </div>

    <div class="row">
    <!-- Additional Document Row 1 -->

    <div class="col-md-3 form-group">
        <label for="documents4" class="font-weight-bold">Document 4:</label>
        <input type="file" class="form-control document-input" id="newdocuments4" name="documents4" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink4">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc4" data-preview="#documentLink4" onclick="deleteFile(this)">❌</span>

    </div>

    <div class="col-md-3 form-group">
        <label for="documents5" class="font-weight-bold">Document 5:</label>
        <input type="file" class="form-control document-input" id="newdocuments5" name="documents5" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink5">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc5" data-preview="#documentLink5" onclick="deleteFile(this)">❌</span>

    </div>

    <div class="col-md-3 form-group">
        <label for="documents6" class="font-weight-bold">Document 6:</label>
        <input type="file" class="form-control document-input" id="newdocuments6" name="documents6" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink6">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc6" data-preview="#documentLink6" onclick="deleteFile(this)">❌</span>

    </div>
    
    <div class="col-md-3 form-group">
        <label for="documents7" class="font-weight-bold">Document 7:</label>
        <input type="file" class="form-control document-input" id="newdocuments7" name="documents7" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink7">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc7" data-preview="#documentLink7" onclick="deleteFile(this)">❌</span>

    </div>

</div>

<div class="row">
    <!-- Additional Document Row 2 -->

    <div class="col-md-3 form-group">
        <label for="documents8" class="font-weight-bold">Document 8:</label>
        <input type="file" class="form-control document-input" id="newdocuments8" name="documents8" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink8">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc8" data-preview="#documentLink8" onclick="deleteFile(this)">❌</span>

    </div>

    <div class="col-md-3 form-group">
        <label for="documents9" class="font-weight-bold">Document 9:</label>
        <input type="file" class="form-control document-input" id="newdocuments9" name="documents9" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink9">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc9" data-preview="#documentLink9" onclick="deleteFile(this)">❌</span>

    </div>

    <div class="col-md-3 form-group">
        <label for="documents6" class="font-weight-bold">Document 10:</label>
        <input type="file" class="form-control document-input" id="newdocuments10" name="documents10" accept=".pdf, .jpeg, .jpg, .png, .xlsx, .xls, .doc, .docx">
        <a href="#" class="document-link" target="_blank" id="documentLink10">View Document</a>
        <span class="delete-btn" style="cursor: pointer;" data-target="doc10" data-preview="#documentLink10" onclick="deleteFile(this)">❌</span>

    </div>


    <div class="col-md-3 form-group">
              <label for="video" class="font-weight-bold">Video:</label>
              <input type="file" class="form-control video-input" id="newvideo" name="video" accept="video/*">
            <div class="video-container" style="width: 250px; height: 240px; overflow: hidden;">
               <video id="videoPreview" controls style="width: 100%; height: 100%;"></video>
           </div>
           <span class="delete-btn" style="cursor: pointer;" data-target="vdo" data-preview="#videoPreview" onclick="deleteFile(this)">❌</span>

        </div>
</div>
                    </div>
                </div>
                <div class="modal-footer1">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="enlarged-image-modal">
    <span class="close-enlarged-image">&times;</span>
    <img class="enlarged-image-content" src="" alt="Enlarged Image">
</div>
<script>

    //delete image documents and video function
  
    function deleteFile(element) {
        var targetInput = $(element).data("target");
        var previewElement = $(element).data("preview");

        // Get the identifier from the target input
        var identifier = targetInput;

        // Clear the file input
        $(targetInput).val('');

        // Clear the preview element (if it's an image or video)
        if ($(previewElement).is("img") || $(previewElement).is("video") || $(previewElement).is("a")) {
    // Set the appropriate attribute to clear the preview
    if ($(previewElement).is("img") || $(previewElement).is("video")) {
        $(previewElement).attr("src", "");
    } else if ($(previewElement).is("a")) {
        // Assuming the document link is an anchor (<a>) tag
        $(previewElement).attr("href", "");
        $(previewElement).text("No Document"); // Optionally change the text
    }
}

        // Delete the record from the database
        var billId = $("#rabillid").val(); // Get the t_bill_Id from the hidden input

        // Assuming you are using jQuery.ajax for making an AJAX request to the server
        $.ajax({
            url: '/delete-imgdoc', // Replace with the actual URL for your delete route
            method: 'POST',
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            data: {
                identifier: identifier,
                billId: billId
            },
            success: function (response) {
                // Handle success
                console.log("Deleted: " + identifier);
            },
            error: function (error) {
                // Handle error
                console.error("Error deleting: " + identifier);
            }
        });
    }
    
    
    
function uploadimages() {
    var tbillid = $('#newrabillid').val();

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

  // Check if photo1 path is not null before updating the image source
  if (paths.photo1 !== null) {
    $('#previewPhoto1').attr('src', paths.photo1);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto1').attr('src', '');
  }
  if (paths.photo2 !== null) {
    $('#previewPhoto2').attr('src', paths.photo2);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto2').attr('src', '');
  }
  if (paths.photo3 !== null) {
    $('#previewPhoto3').attr('src', paths.photo3);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto3').attr('src', '');
  }
  if (paths.photo4 !== null) {
    $('#previewPhoto4').attr('src', paths.photo4);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto4').attr('src', '');
  }
  if (paths.photo5 !== null) {
    $('#previewPhoto5').attr('src', paths.photo5);
  } else {
    // Handle the case when the photo1 path is null, e.g., display a placeholder image
    $('#previewPhoto5').attr('src', '');
  }


  if (document.doc1 !== null) {
    // If document path exists, update the link href
    $('#documentLink1').attr('href', document.doc1);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink1').attr('href', '#');
}

if (document.doc2 !== null) {
    // If document path exists, update the link href
    $('#documentLink2').attr('href', document.doc2);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink2').attr('href', '#');
}

if (document.doc3 !== null) {
    // If document path exists, update the link href
    $('#documentLink3').attr('href', document.doc3);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink3').attr('href', '#');
}

if (document.doc4 !== null) {
    // If document path exists, update the link href
    $('#documentLink4').attr('href', document.doc4);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink4').attr('href', '#');
}
if (document.doc5 !== null) {
    // If document path exists, update the link href
    $('#documentLink5').attr('href', document.doc5);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink5').attr('href', '#');
}
if (document.doc6 !== null) {
    // If document path exists, update the link href
    $('#documentLink6').attr('href', document.doc6);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink6').attr('href', '#');
}

if (document.doc7 !== null) {
    // If document path exists, update the link href
    $('#documentLink7').attr('href', document.doc7);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink7').attr('href', '#');
}
if (document.doc8 !== null) {
    // If document path exists, update the link href
    $('#documentLink8').attr('href', document.doc8);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink8').attr('href', '#');
}
if (document.doc9 !== null) {
    // If document path exists, update the link href
    $('#documentLink9').attr('href', document.doc9);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink9').attr('href', '#');
}
if (document.doc10 !== null) {
    // If document path exists, update the link href
    $('#documentLink10').attr('href', document.doc10);
} else {
    // If document path is null, you can handle it as needed
    // For example, disable the link or set a placeholder
    $('#documentLink10').attr('href', '#');
}

if (videoPath !== null)
 {
                // If video path exists, update the video source
                $('#videoPreview').attr('src', videoPath);
            } else {
                // If video path is null, you can handle it as needed
                // For example, disable the video or set a placeholder
                $('#videoPreview').attr('src', ''); // Set an empty source or a placeholder
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


function imagedocupload() {
    var tbillid = $('#rabillid').val();
    var formData = new FormData($('#uploadForm')[0]);

    // Get the name of the uploaded file
    var photo1Name = $('#newphoto1').val().split('\\').pop();

    // Append the file name to FormData
    formData.append('photo1Name', photo1Name);
    formData.append('tbillid', tbillid);
    formData.append('_token', "{{ csrf_token() }}");
console.log(formData);
    // Perform an Ajax request to upload the files and retrieve the modal content
    $.ajax({
        url: "{{ url('uploadimgdocvdo') }}",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            // Inject the loaded content into the modal
            // ...

            // Show the modal
            $('#uploadimgmodal').modal('hide');
        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.error(xhr, status, error);
        }
    });
}
// function uploadimages() {
//     var tbillid = $('#newrabillid').val();
//   // Perform an Ajax request to load the modal content
//   $.ajax({
//     url: "{{url('uploadimages')}}", // Replace with the actual URL for your modal content
//     type: 'POST',
//     data: { tbillid: tbillid , _token: "{{ csrf_token() }}", },
//     success: function (data) {
//       var paths = data.paths;
//       console.log(paths.photo1);
//       // Inject the loaded content into the modal
//       var assetBaseUrl = "{{ asset('storage/') }}";

//       $('#previewPhoto1').attr('src', assetBaseUrl + '/' + paths.photo1);

//     $('#previewPhoto2').attr('src', assetBaseUrl + '/' + paths.photo2);
//     $('#previewPhoto3').attr('src', assetBaseUrl + '/' + paths.photo3);
//     $('#previewPhoto4').attr('src', assetBaseUrl + '/' + paths.photo4);
//     $('#previewPhoto5').attr('src', assetBaseUrl + '/' + paths.photo5);
// console.log(assetBaseUrl + '/' + paths.photo2);
//     // Set the href attribute for document links
//     $('#documentLink1').attr('href', assetBaseUrl + '/' + paths.doc1).text('View Document');
//     $('#documentLink2').attr('href', assetBaseUrl + '/' + paths.doc2).text('View Document');

//     // Set the src attribute for the video preview
//     $('#videoPreview').attr('src', assetBaseUrl + '/' + paths.vdo);
      
//       // Show the modal
//       $('#uploadimgmodal').modal('show');
//     },
//     error: function (xhr, status, error) {
//       // Handle errors here
//       console.error(xhr, status, error);
//     }
//   });
// }

// function imagedocupload() {
//     var tbillid = $('#newrabillid').val();
//     var formData = new FormData();

//     var assetBaseUrl = "{{ asset('') }}";
//   // Append individual image files with specific keys
//   formData.append('photo1', $('#newphoto1')[0].files[0]);
//     formData.append('photo2', $('#newphoto2')[0].files[0]);
//     formData.append('photo3', $('#newphoto3')[0].files[0]);
//     formData.append('photo4', $('#newphoto4')[0].files[0]);
//     formData.append('photo5', $('#newphoto5')[0].files[0]);

//     // Append individual document files with specific keys
//     formData.append('document1', $('#newdocuments1')[0].files[0]);
//     formData.append('document2', $('#newdocuments2')[0].files[0]);

//     // Append individual video files with specific keys
//     formData.append('video', $('#newvideo')[0].files[0]);

//     // Append other data as needed
//     formData.append('tbillid', tbillid);
//     formData.append('_token', "{{ csrf_token() }}");

//     // Perform an Ajax request to upload the files and retrieve the modal content
//     $.ajax({
//         url: "{{ url('uploadimgdocvdo') }}",
//         type: 'POST',
//         data: formData,
//         contentType: false,
//         processData: false,
//         success: function (data) {
//             // Inject the loaded content into the modal
           

//             // Show the modal
//             $('#uploadimgmodal').modal('hide');
//         },
//         error: function (xhr, status, error) {
//             // Handle errors here
//             console.error(xhr, status, error);
//         }
//     });
// }

  // Your existing code
 
  // Your existing code
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
        hideMediaPreviews();
        //hideVideoPreview(); // Hide video when the modal is closed
    }
});

// Close the video preview when the close button is clicked
$('body').on('click', '.close-enlarged-image', function() {
    hideLargeImage();
    hideMediaPreviews();
    //hideVideoPreview(); // Hide video when the modal is closed
});


  // Prevent form submission when the Cancel button is clicked
  $('.modal-footer .btn-secondary, .modal-header .close').click(function(e) {
    e.preventDefault();
    hideLargeImage();
    resetInputValues();
    hideVideoPreview();
  });





//   if (response.newBillId === response.firstid) {
//     var minDate = Newbilldata.measdtfrom;
//  var billdate= Newbilldata.Bill_Dt;

//  console.log(minDate);

//  var parts = minDate.split("-");
// if (parts.length === 3) {
//     var day = parts[0];
//     var month = parts[1];
//     var year = parts[2];

//     // Convert the date to "yyyy-MM-dd" format
//     var formattedDate = year + "-" + month + "-" + day;

//     console.log(formattedDate);
//     // Set the minimum attribute of the input element
  
//     var minDateCondition = formattedDate;
//     var mindate = minDateCondition.split("-");
//     mindate.length === 3;
//     var day1 = mindate[0];
//     var month1 = mindate[1];
//     var year1 = mindate[2];
//     var mdate=year1 + "-" + month1 + "-" + day1;
//     $('#newbilldate').attr('min', formattedDate);
// $('#measdtfr').attr('min', formattedDate);

// }

// var miinDate = response.lastbill.Bill_Dt;
//   var minbildate=Newbilldata.Bill_Dt;
//   console.log(minbildate);

//   var parts = minbildate.split("-");
// if (parts.length === 3) {
//     var day = parts[0];
//     var month = parts[1];
//     var year = parts[2];

//     // Convert the date to "yyyy-MM-dd" format
//     var formattedDate = year + "-" + month + "-" + day;

//     // Set the minimum attribute of the input element
//     $('#newbilldate').attr('min', formattedDate);
//     $('#measdtfr').attr('min', formattedDate);

// }
//   }
    //measuremant date upto update
function updateMeasurementDate() {
    // Get the selected Bill Date
    var billDate = new Date(document.getElementById("newbilldate").value);
    
    // Get the Measurement Date Upto input element
    var measDateInput = document.getElementById("measdtupto");
    
    // Get the Measurement Date From input element
    var measDateFromInput = document.getElementById("measdtfr");

    // Set the maximum allowed date for Measurement Date Upto as one day before the Bill Date
    if (!isNaN(billDate.getTime())) {
        var maxMeasDate = billDate.toISOString().split('T')[0];
        measDateInput.setAttribute("max", maxMeasDate);
    } else {
        // If Bill Date is not a valid date, remove the max attribute from Measurement Date Upto
        measDateInput.removeAttribute("max");
    }

    // Set the maximum allowed date for Measurement Date From as the Bill Date
    if (!isNaN(billDate.getTime())) {
        var maxMeasDateFrom = billDate.toISOString().split('T')[0];
        measDateFromInput.setAttribute("max", maxMeasDateFrom);
    } else {
        // If Bill Date is not a valid date, remove the max attribute from Measurement Date From
        measDateFromInput.removeAttribute("max");
    }

    // Reset the value of Measurement Date Upto if it's greater than the new maximum
    var measDate = new Date(measDateInput.value);
    if (!isNaN(measDate.getTime()) && measDate > billDate) {
        measDateInput.value = maxMeasDate;
    }

    // Reset the value of Measurement Date From if it's greater than the new maximum
    var measDateFrom = new Date(measDateFromInput.value);
    if (!isNaN(measDateFrom.getTime()) && measDateFrom > billDate) {
        measDateFromInput.value = maxMeasDateFrom;
    }
}

$(document).ready(function () {
    // Assuming #measdtfr and #measdtupto are input elements with type 'date'
    $('#measdtfr').on('change', function () {
        var selectedDate = $(this).val(); // Get the selected date from #measdtfr

        if (selectedDate) {
            // Update the minimum date for #measdtupto
            $('#measdtupto').attr('min', selectedDate);
        }
    });
});

// all the function initially and whenever the dropdown selection changes
//enableNewButton();
//$('#rabillno').change(enableNewButton);


// date rangr function to set

    </script>
    <script>
    
    const maximumdt = "{{$maximumdt}}";
        const minimumdt = "{{$minimumdt}}";

//         var parts = minimumdt.split("-");
// if (parts.length === 3) {
//     var day = parts[0];
//     var month = parts[1];
//     var year = parts[2];

//     // Convert the date to "yyyy-MM-dd" format
//     var formattedDate = year + "-" + month + "-" + day;
//     console.log(formattedDate);

//     document.getElementById('newbilldate').setAttribute('min', formattedDate);
//     document.getElementById('measdtfr').setAttribute('min', formattedDate);

// }

// var parts1 = MinDate.split("-");
// if (parts1.length === 3) {
//     var day = parts1[0];
//     var month = parts1[1];
//     var year = parts1[2];

//     // Convert the date to "yyyy-MM-dd" format
//     var formattedDatemin = year + "-" + month + "-" + day;
//     console.log(formattedDatemin);

   
// }

// var parts2 = MaxDate.split("-");
// if (parts2.length === 3) {
//     var day = parts2[0];
//     var month = parts2[1];
//     var year = parts2[2];

//     // Convert the date to "yyyy-MM-dd" format
//     var formattedDatemax = year + "-" + month + "-" + day;
//     console.log(formattedDatemax);

    

// }


console.log(maximumdt);

console.log(minimumdt);

document.getElementById('newbilldate').setAttribute('min', maximumdt);
document.getElementById('measdtfr').setAttribute('min', minimumdt);
document.getElementById('measdtupto').setAttribute('min', maximumdt);

        // document.getElementById('newbilldate').setAttribute('max', MaxDate);
        
        // document.getElementById('measdtfr').setAttribute('max', MaxDate);
        // document.getElementById('measdtupto').setAttribute('min', MinDate);
        // document.getElementById('measdtupto').setAttribute('max', MaxDate);
   
//         const maximumdt = "{{$maximumdt}}";
//         const minimumdt = "{{$minimumdt}}";

//         var parts = minimumdt.split("-");
// if (parts.length === 3) {
//     var day = parts[0];
//     var month = parts[1];
//     var year = parts[2];

//     // Convert the date to "yyyy-MM-dd" format
//     var formattedDate = year + "-" + month + "-" + day;
//     console.log(formattedDate);
//     document.getElementById('measdtfr').setAttribute('min', formattedDate);

//     // document.getElementById('newbilldate').setAttribute('min', formattedDate);
//     // document.getElementById('measdtfr').setAttribute('min', formattedDate);

// }

// var parts1 = maximumdt.split("-");
// if (parts1.length === 3) {
//     var day = parts1[0];
//     var month = parts1[1];
//     var year = parts1[2];

//     // Convert the date to "yyyy-MM-dd" format
//     var formattedDatemax = year + "-" + month + "-" + day;
//     //console.log(formattedDatemin);
//     document.getElementById('newbilldate').setAttribute('min', formattedDatemax);
// //document.getElementById('measdtfr').setAttribute('min', minimumdt);
// document.getElementById('measdtupto').setAttribute('min', formattedDatemax);


   
// }

// // var parts2 = MaxDate.split("-");
// // if (parts2.length === 3) {
// //     var day = parts2[0];
// //     var month = parts2[1];
// //     var year = parts2[2];

// //     // Convert the date to "yyyy-MM-dd" format
// //     var formattedDatemax = year + "-" + month + "-" + day;
// //     console.log(formattedDatemax);

    

// // }


// console.log(maximumdt);

// console.log(minimumdt);

// // document.getElementById('newbilldate').setAttribute('min', maximumdt);
// // //document.getElementById('measdtfr').setAttribute('min', minimumdt);
// // document.getElementById('measdtupto').setAttribute('min', maximumdt);

//         // document.getElementById('newbilldate').setAttribute('max', MaxDate);
        
//         // document.getElementById('measdtfr').setAttribute('max', MaxDate);
//         // document.getElementById('measdtupto').setAttribute('min', MinDate);
//         // document.getElementById('measdtupto').setAttribute('max', MaxDate);
   


   //update the final bill function
   function updateFinalBill(checkbox) {
  // Get the checkbox value (1 if checked, 0 if unchecked)
  var value = checkbox.checked ? 1 : 0;
console.log(value);
  // Make an AJAX request to update the database
  $.ajax({
    url: '/update-final-bill',
    method: 'POST',
    data: {
      final_bill: value,
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      // Update the UI with the new final bill value
      $('#finalbill').prop('checked', value);
    },
    error: function(xhr, status, error) {
      // Handle the error, if any
      console.log(error);
    }
  });
}




</script>
@if(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ Session::get('error') }}'
        });
    </script>
@endif
@endsection