

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


         <!-- for the R A Bill no jquery ajax -->
    <!-- Include jQuery library
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                     Include Bootstrap JavaScript after jQuery
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->


   <!-- header -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <!-- !-- Include Bootstrap CSS library  for emb popup modal modal-- -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- new button popup alert links -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

<!-- Include SweetAlert JavaScript -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script> -->

<!-- dropdown icon link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Dynamic Field Loading with AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <style>
    hr {
            width: 70%;
            margin-left : 250px;
            align: center;
            border: 1px solid #000000; /* You can adjust the border style and color */
            margin-top: 20px; /* Adjust the margin as needed */
        }

.custom-navbar {
          background-color: #333;
          color: #fff;
      }

      .custom-navbar .navbar-brand {
          color: #fff;
      }

      .custom-navbar .navbar-nav .nav-link {
          color: #fff;
      }

      .custom-navbar .navbar-nav .nav-link:hover {
          color: #ff5733; /* Change the hover color as desired */
      }
  /* .label {
    margin-right: 10px; /* Adjust the value to increase/decrease spacing
 } */

 /* tab script */
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

 /* Pagination Script */
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


.title{
        font-weight: bold;
        font-size: 24px;
        line-height: 1.5;
        text-align: center;
         margin-top: 20px;
         padding-right: 100px;
    }
  .container {
    border: 1px solid #555;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
  }
  .cspan {
  padding: 5px;
}

  .custom-button {
    margin-top: 10px; /* Adjust the margin as needed to align the button */
    background: #04AA6D;
    color: white;
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
 /* Increase font weight of labels */
 .form-group label {
      font-weight: bold;
    }
/* total div table */
.total-table {
            float: right;
            margin-top: 20px;
            border-radius: 4px;
            padding: 10px;
        }


        /* Emb pop up modal style */
  .modal-backdrop {
    opacity: 1 !important;
    background-color: rgba(0, 0, 0, 0.1) !important;
    pointer-events: none;
  }
  .modal-dialog {
  margin-top: 15% !important;
    max-width: 1200px;
    max-height: 1000px;
    margin: 1.75rem auto;
  }

  body.modal-open {
    overflow: hidden;
  }
  /* EMB button css */
  .emb-button {
    background-color: #B09FCA;
    color: white;
  }

  .emb-button:hover {
    background-color: #967BB6;
    color: white;
  }

  .emb-button:focus {
    outline: none;
    box-shadow: none;
  }

  .emb-button-inactive {
    background-color: gray;
    color: white;
  }

</style>
<body>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu1" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                   USERS
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="{{url('listuser')}}">Users</a>
                    <a class="dropdown-item" href="{{url('userpermision')}}">User Permision</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu2" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    MASTERDATA
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="{{url('listsubdivisions')}}">SubDivision</a>
                    <a class="dropdown-item" href="{{url('listexecutive')}}">Executive Engineer</a>
                    <a class="dropdown-item" href="{{url('listdeputy')}}">Deputy Engineer</a>
                    <a class="dropdown-item" href="{{url('listjuniorengineer')}}">Junior Engineer</a>
                    <a class="dropdown-item" href="{{url('listagencies')}}">Agencies</a>
                    <a class="dropdown-item" href="{{url('listfundhead')}}">Fund Head</a>
                    <a class="dropdown-item" href="{{url('listworkmasters')}}">Work Master</a>
                    <a class="dropdown-item" href="{{url('listemb')}}"> EMB</a>

                </div>
            </li>
        </ul>
    </nav>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- E MB container -->
{{-- <div class="container" style="border: none;"> --}}

    <div class="container-fluid" style="border: none;">
        <div class="tabs">
            <div class="d-flex justify-content-end align-items-center">
                <button class="btn ml-2 custom-button" onclick="openForm(event, 'Itemwise1')" id="ItemwiseButton">Itemwisedata</button>
                <button class="btn ml-2 custom-button" onclick="openForm(event, 'Recordentrywise')" id="RecordentrywiseButton">Recordentrywisedata</button>
            </div>
        </div>
    </div>
{{-- </div> --}}
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-12">

        <div class="form-group form-row align-items-center">
              <label for="division" class="col-md-2">Division:</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="Div" name="Div "value="{{$divNm ?? ''}}"disabled>
              </div>
              <label for="subdivision" class="col-md-2">Sub Division:</label>
             <div class="col-md-4">
               <input type="text" name="Sub_Div" class="form-control" id="Sub_Div" disabled
               value="{{$Work_Dtl->Sub_Div ?? '' }}">
              </div>
            </div>
            <div class="form-group form-row align-items-center mt-4">
                <label for="name" class="col-md-2">Work Id:</label>
                <div class="col-md-4">
                  <input type="text" name="workid" class="form-control" id="workid"   value="{{$workDetails->Work_Id  ?? ''}}" required disabled>
                </div>
                <label for="fundhead" class="col-md-2">Fund Head:</label>
                <div class="col-md-4">
                     <input type="text" class="form-control" id="fundhead" name="Fund_Hd" value="{{$fund_Hd->Fund_HD_M ?? '' }}" disabled>
             </div>
              </div>

            </div>
            <div class="form-group form-row align-items-center">
    <label for="division" class="col-md-2">Name Of Work:</label>
    <div class="col-md-10">
        <textarea class="form-control" name="Work_Nm" id="Work_Nm" style="width: 100%;" disabled>
            {{$Work_Dtl->Work_Nm ?? ''}}
        </textarea>
    </div>
</div>
              <div class="form-group form-row align-items-center">
    <label for="division" class="col-md-2">Work Order No:</label>
    <div class="col-md-4">
        <input type="text" class="form-control"name="WO_No"  id="WO_No" value="{{$Work_Dtl->WO_No  ?? ''}}" disabled>
    </div>
    <label for="nameofwork" class="col-md-2">Date:</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="dateInput" name="dateInput" disabled>
            </div>
</div>
    <div class="form-group form-row align-items-center">
        <label for="subdision" class="col-md-2">Period :</label>
    <div class="col-md-4">
        <input type="text" name="Period" class="form-control" id="Period" disabled value="{{$Work_Dtl->Period ?? '' }}">
    </div>
    <label for="subdivision" class="col-md-2">Stipulated Date Of Complition:</label>
    <div class="col-md-4">
        <input type="text" name="Subiv" class="form-control" id="Subv" disabled value="{{$Work_Dtl->Stip_Comp_Dt ?? '' }}">
    </div></div>
<div class="form-group form-row align-items-center">
    <label for="agency" class="col-md-2">Agency:</label>
     <div class="col-md-4">
      <input type="text" name="Agency_Nm" class="form-control" id="Agency_Nm" disabled
      value="{{ $workDetails->Agency_Nm ?? ''}}">
     </div>
    <label for="sectionengineer" class="col-md-2">Eng Incharg:</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="sectionengineer" name="name"
      value="{{ $workDetails->Agency_Nm ?? ''}}" disabled>
    </div>
{{-- </div> --}}
        </div>

</div>
</div>
</div><hr></div>
</div></div></div></div>

{{-- Itemwise----------------------------------------------------------------------------------------------------------------------------------------------- --}}

{{--Itemwise-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

<div class="tab-content" id="PagingItem" >

    <div class="tab-pane fade" id="Itemwise1" role="tabpanel" aria-labelledby="Itemwise-tab">
        @php
        $prevItemNo = null; // Initialize the previous item_no variable
        $lastItemIndex = count($Item1Data) - 1; // Get the index of the last item
    @endphp
{{-- {{$Item1Data}} --}}
{{-- <div id="tItemNosDisplay"></div>
@php
$stlino = $tItemNosDisplay; // Initialize the previous item_no variable
@endphp --}}
    @foreach ($Item1Data as  $index =>  $Item)
        <div id="stldata"></div>
        @php
           $currentItemNo = $Item->t_item_no;// Get the current t_item_no
           $lastitem=0;
        @endphp

    {{-- {{$currentItemNo}} --}}
        @if($prevItemNo === null || $prevItemNo !== $currentItemNo)

         <div class="container-fluid">

                <div class="form-group form-row align-items-center">
                    <label for="name" class="col-md-2">Item No:</label>
                    <div class="col-md-4">
                        <input type="text" name="Item No" class="form-control" id="workiid" value="{{$Item->t_item_no ?? ''}}" disabled>
                    </div>
                </div>
                <div class="form-group form-row align-items-center">
                    <label for="nameofwork" class="col-md-2">Item Description:</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="worknm" id="Work_Nm" style="width: 100%;" disabled>{{$Item->item_desc ?? ''}}</textarea>
                    </div>
                </div>
            </div>
        @endif

                <div class="container-fluid" style="border:none";>
                <div class="row">
                    <div class="col-md-1 form-group">
                        <label for="particulars" class="font-weight-bold">Sr. No:</label>
                        <input type="text" class="form-control" id="newparticulars" name="Particulars" value="{{$Item->sr_no ?? ''}}" disabled>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="particulars" class="font-weight-bold">Particulars:</label>
                        <input type="text" class="form-control" id="newparticulars" name="Particulars" value="{{$Item->parti ?? ''}}" disabled>
                    </div>
                    <div class="col-md-1 form-group">
                        <label for="number" class="font-weight-bold">Number:</label>
                        <input type="text" class="form-control" id="newnumber" name="Number" value="{{$Item->number ?? ''}}" disabled>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="len" class="font-weight-bold">Length:</label>
                        <input type="text" class="form-control" id="newlength" name="Length" value="{{$Item->length ?? ''}}" disabled>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="brea" class="font-weight-bold">Breadth:</label>
                        <input type="text" class="form-control" id="newbreadth" name="Breadth" value="{{$Item->breadth ?? ''}}" disabled>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="hei" class="font-weight-bold">Height:</label>
                        <input type="text" class="form-control" id="newheight" name="Height" value="{{$Item->height ?? ''}}" disabled>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="Quantity" class="font-weight-bold">Quantity:</label>
                        <input type="text" class="form-control" id="newquantity" name="Quantity" value="{{$Item->qty ?? ''}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="formula" class="font-weight-bold">Formula:</label>
                        <input type="text" class="form-control" id="newformula" name="Formula" value="{{$Item->formula ?? ''}}" disabled>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="name" class="font-weight-bold">Record Entry Number:</label>
                        <input type="text" name="woIrkid" class="form-control" id="workiid" value="{{$FinalRecordEntryNo ?? ''}}" disabled>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="dom" class="font-weight-bold">Date :</label>
                        <input type="text" class="form-control" id="newdom" name="dom" value="{{$Item->measurment_dt ?? ''}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="photo1" class="font-weight-bold">Photo 1:</label>
                        <input type="text" class="form-control" id="newphoto1" name="photo1" value="{{$Item->photo1 ?? ''}}" disabled>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="photo2" class="font-weight-bold">Photo 2:</label>
                        <input type="text" class="form-control" id="newphoto2" name="photo2" value="{{$Item->photo2 ?? ''}}" disabled>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="photo3" class="font-weight-bold">Photo 3:</label>
                        <input type="text" class="form-control" id="newphoto3" name="photo3" value="{{$Item->photo3 ?? ''}}" disabled>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="documents" class="font-weight-bold">Documents: </label>
                        <input type="text" class="form-control" id="newdocuments" name="documents" value="{{$Item->drg ?? ''}}" disabled>
                    </div>
                </div>

        </div>

           @php
               $prevItemNo = $currentItemNo; // Update the previous item_no variable
               $lastitem++;
           @endphp
 @if ($index === $lastItemIndex)
 <div class="col-md-3 form-group font-weight-bold">
     <div class="row">
        @foreach ($titemnoRecords as $Item)
        To be paid at {{ $Item->ratecode ?? '' }} of Rs. {{ $Item->bill_rt ?? '' }}
        * {{ $Item->exec_qty ?? '' }} = {{ $Item->bill_rt * $Item->exec_qty }}<br><br>
    @endforeach
   </div>
 </div>
 @endif
             {{-- @if($lastitem=1)(Total amount)
             <div class="col-md-3 form-group">
              <div class="row">
                <div class="font-weight-bold "style="margin-left:250%;">
                       To be paid at {{ $Item->ratecode ?? '' }} of Rs. ({{ $Item->billrate ?? '' }})
                       * ({{ $Item->exec_qty ?? '' }}) = ({{ 'Total amount' }})
                </div>
              </div>
            </div>
            @endif --}}

<hr>
        @endforeach
        {{-- {{$prevItemNo}} --}}
        </div>

{{--  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

 <!-- Recordentrywise Form content goes here -->

 <div class="tab-pane fade" id="Recordentrywise" role="tabpanel" aria-labelledby="Recordentrywise-tab">
    @php
        $Prevdt = null; // Initialize the previous item_no variable
    @endphp
    @foreach($RecordData as $Record)
        @php
            $current_dt = $Record->measurment_dt; // Get the current dt
        @endphp
        {{-- {{"$current_dt"}} --}}
        @if($current_dt !== $Prevdt)
            <div class="container-fluid" id="Recordentrywisecontnr">

            <div class="row">
            <div class="form-group form-row align-items-center mt-2">
                <label for="name" class="col-md-2">Record Entry Number:</label>
                <div class="col-md-4">
                    <input type="text" name="woIrkid" class="form-control" id="workiid" value="{{$FinalRecordEntryNo ?? '' }}" disabled>
                </div>
                <div class="col-md-2 form-group">
                    <label for="nameofwork" class="col-md-2">Date:</label>
               </div>
                <div class="col-md-4">
                     <input type="text" class="form-control" id="dateInput" value="{{$Record->measurment_dt ?? ''}}" name="dateInput" disabled>
                </div>
            </div>
         </div>
            <div class="row">
                    <div class="form-group form-row align-items-center">
                     <label for="name" class="col-md-2"> Item No:</label>
                        <div class="col-md-4">
                            <input type="text" name="Item No" class="form-control" id="workiid" value="{{$Record->t_item_no ?? '' }}" disabled>
                        </div>
                    </div></div>
            <div class="row">
             <div class="form-group form-row align-items-center">
            <label for="nameofwork" class="col-md-2">Item Description:</label>
            <div class="col-md-10">
                <textarea class="form-control" name="worknm" id="Work_Nm" style="width: 100%;" disabled> {{$Record->item_desc ?? ''}} </textarea>
            </div>
        </div>
       </div>
     </div>
    @endif

        <div class="container-fluid" id="Recordentrywisecontnr" style="border:none";>
        <div class="row">
            <div class="col-md-1 form-group">
                <label for="particulars" class="font-weight-bold">Sr. No:</label>
                <input type="text" class="form-control" id="newparticulars" name="Particulars" value="{{$Record->sr_no ?? ''}}" disabled>
            </div>
            <div class="col-md-2 form-group">
              <label for="particulars" class="font-weight-bold">Particulars:</label>
              <input type="text" class="form-control" id="newparticulars" name="Particulars"  value="{{$Record->parti ?? ''}}" disabled>
            </div>
            <div class="col-md-1 form-group">
              <label for="number" class="font-weight-bold">Number:</label>
              <input type="text" class="form-control" id="newnumber" name="Number" value="{{$Record->number ?? ''}}" disabled>
            </div>
            <div class="col-md-2 form-group">
              <label for="len" class="font-weight-bold">Length:</label>
              <input type="text" class="form-control" id="newlength" name="Length" value="{{$Record->length ?? ''}}" disabled>
            </div>
            <div class="col-md-2 form-group">
              <label for="brea" class="font-weight-bold">Breadth:</label>
              <input type="text" class="form-control" id="newbreadth" name="Breadth" disabled value="{{$Record->breadth ?? ''}}">
            </div>
            <div class="col-md-2 form-group">
              <label for="hei" class="font-weight-bold">Height:</label>
              <input type="text" class="form-control" id="newheight" name="Height" value="{{$Record->height ?? ''}}" disabled>
            </div>
            <div class="col-md-2 form-group">
                <label for="Quantity" class="font-weight-bold">Quantity:</label>
                <input type="text" class="form-control" id="newquantity" name="Quantity" value="{{$Record->qty ?? ''}}" disabled>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="formula" class="font-weight-bold">Formula:</label>
              <input type="text" class="form-control" id="newformula" name="Formula"  value="{{$Record->formula ?? ''}}" disabled>
            </div>

             <div class="col-md-3 form-group">
               <label for="photo1" class="font-weight-bold">Photo 1:</label>
               <input type="text" class="form-control" id="newphoto1" name="photo1"  value="{{$Record->photo1 ?? ''}}" disabled>

             </div>
             <div class="col-md-3 form-group">
               <label for="photo2" class="font-weight-bold">Photo 2:</label>
               <input type="text" class="form-control" id="newphoto2" name="photo2" value="{{$Record->photo2 ?? ''}}" disabled>

             </div>
             <div class="col-md-3 form-group">
               <label for="photo3" class="font-weight-bold">Photo 3:</label>
               <input type="text" class="form-control" id="newphoto3" name="photo3" value="{{$Record->photo3 ?? ''}}" disabled>

             </div>
             <div class="col-md-3 form-group">
                  <label for="documents" class="font-weight-bold">Documents:</label>
                  <input type="text" class="form-control " id="newdocuments" name="documents" value="{{$Record->drg ?? ''}}" disabled >
              </div>
          </div>
        </div>
        @php
        $Prevdt = $current_dt; // Update the previous item_no variable
    @endphp
    <hr>
@endforeach
</div>

{{-- {{$prevdt}} --}}
 {{-- <div class="container" style=border:none>
        <button class="btn ml-2 custom-button" id="prevButton">Previous</button>
        <button class="btn ml-2 custom-button" id="nextButton">Next</button>
  </div> --}}


{{--  tab Script==================================================================================================================================================================================================================================================================================================  --}}

<script>
    // Add custom JavaScript to show the selected tab content and hide others
    function openForm(event, formName) {
        event.preventDefault();

        // Hide all tab content
        document.querySelectorAll('.tab-pane').forEach(function (tabPane) {
            tabPane.classList.remove('show', 'active');
        });

        // Show the selected tab content
        document.getElementById(formName).classList.add('show', 'active');
    }

    // Trigger the click event on the "ItemwiseButton" to make "Itemwise1" tab active by default
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('ItemwiseButton').click();
    });
</script>

{{-- Pagination ==========================================================================================================================================--}}


<!-- //pagination for 10 records -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    var contentContainer = $('.PagingItem');
    var itemsPerPage = 2;
    var currentPage = 0;
    var totalPages = Math.ceil(contentContainer.children().length / itemsPerPage);

    showPage(currentPage);

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

    function showPage(pageIndex) {
      contentContainer.children().hide();
      var startIndex = pageIndex * itemsPerPage;
      var endIndex = startIndex + itemsPerPage;

      contentContainer.children().slice(startIndex, endIndex).show();
    }
  });

  var tbillid = {!! json_encode($tbillid) !!};
function GotoStlEmb() {
    // Your Ajax call code here



    var formData=null;
    // Replace this comment with your $.ajax or fetch API code
    $.ajax({
      type: "POST", // or "GET" depending on your API
      url: "{{url('STLRecordentry')}}", // Replace with your API endpoint URL
      data: {tbillid: tbillid},
      headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }, // Ensure that formData is defined or passed as an argument
      success: function (response) {
        // Handle the success response from the server
        console.log("Ajax function GotoStlEmb called successfully.....", response);
        // console.log(tbillid);
        $('#stldata').html(response.html);

        var tItemNos = response.t_item_nos;
        $('#tItemNosDisplay').text(tItemNos);
// Now you can use the tItemNos variable in your JavaScript code
    console.log(tItemNos);
        // Rest of your code...
        // var url = "{{ url('Recordentry') }}";
        //window.location.href = url;
      },
      error: function (error) {
        // Handle the error response from the server
        console.error("Error calling Ajax function GotoStlEmb:", error);
        // Display an error message if needed
        // $("#error-message").text("Error: Unable to call GotoStlEmb");
      },
    });
  }
</script>
<script>
     // Call the GotoStlEmb function when the page loads
     $(document).ready(function () {
            GotoStlEmb();
        });
</script>
{{--
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  var table = $('#tableid');
  var rowsPerPage = 4; // Number of rows to display per page
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
</script> --}}
<!-- //pagination for 10 records -->
</body>
</html>



