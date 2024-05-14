<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Completion Certificate</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px; /* Increase the overall margin */
    }

    .certificate {
      max-width: 800px; /* Increase the maximum width */
      margin: auto;
      text-align: center;
      border: 1px solid #ccc;
      padding: 30px; /* Increase the padding */
      border-radius: 10px;
    }

    .signature {
      margin-top: 40px;
    }

    label {
      display: inline-block;
      text-align: left;
      width: 40%; /* Adjust the width as needed */
      margin-bottom: 15px; /* Increase the margin */
    }

    input {
      width: 58%; /* Adjust the width as needed */
      box-sizing: border-box;
      margin-bottom: 20px; /* Increase the margin */
      padding: 8px; /* Increase the padding */
    }
  </style>
</head>
<body> -->

<!-- <div class="certificate">
  <h3>Completion Certificate of Original Work</h3>

  <label for="nameOfWork"><strong>Name of Work:</strong></label>
  <input type="text" id="nameOfWork" name="nameOfWork"  value="{{$DBWorkMaster->Work_Nm}}">

  <label for="authority"><strong>Authority:</strong></label>
  <input type="text" id="authority" name="authority"  value="{{$DBWorkMaster->Agree_No}}">

  <label for="estimateNo"><strong>Estimate No.:</strong></label>
  <input type="text" id="estimateNo" name="estimateNo" >

  <label for="planNo"><strong>Plan No.:</strong></label>
  <input type="text" id="planNo" name="planNo" >

  <label for="estimatedCost"><strong>Estimated Cost:</strong></label>
  <input type="text" id="estimatedCost" name="estimatedCost"  value="{{$DBWorkMaster->TS_Amt}}">

  <label for="tenderedCost"><strong>Tendered Cost:</strong></label>
  <input type="text" id="tenderedCost" name="tenderedCost"  value="{{$DBWorkMaster->Tnd_Amt}}">

  <p>Certified that the work mentioned above was completed on {{ \Carbon\Carbon::parse($DBWorkMaster->Stip_Comp_Dt)->format('d/m/Y') }}</p>
  <p>and that there have been no material deviations from the sanctioned plan</p>
  <p>and specifications other than those sanctioned by competent authority.</p>

  <div class="signature">
    <p>Deputy Engineer</p>
    <p>City Engineer</p>
    <p>P.W. Sub Division, P.W. Division, Sangli Miraj</p>
  </div>
</div> -->

<!-- <div>
  
{!! $certificateHTML !!}
  </div>

</body>
</html>
  </div> -->










  @extends('layouts.NavHeader')
@section('content')

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 nav bar bootstrap cdn 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

    <!-- /* Increase font weight of labels */ -->
    <style>
 .form-group label {
      font-weight: bold;
    }

    .custom-navbar {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        position: fixed;
        width: 100%;
        z-index: 1000;
        display: flex;
        justify-content: center;
        background-color: #333;
        padding: 15px 0; /* Increase padding top and bottom */
    }

    .custom-navbar .nav-item {
        color: white;
        margin: 0 15px; /* Adjust margin for spacing */
    }

    .custom-navbar .nav-item a {
        color: white;
        font-weight: bold;
        text-decoration: none;
        line-height: 30px; /* Increase line height for vertical centering */
    }

    .custom-navbar .nav-item a:hover {
        color: gray;
    }

    /* bread crum css */
    /* Style the list */
    ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
    background-color: #eee;
    }

    /* Display list items side by side */
    ul.breadcrumb li {
    display: inline;
    font-size: 18px;
    }

    /* Add a slash symbol (/) before/behind each list item */
    ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
    }

    /* Add a color to all links inside the list */
    ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
    }

    /* Add a color on mouse-over */
    ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
    }
    .maincontainer{

        top: 125px !important;
    }

    .nav-item{
  margin-left:20px;
}

</style>

<!-- </head> -->


<div class="container-fluid" >

        <ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $embsection2->work_id ?? '') }}">Bill</a></li>
            <li><a href="{{ url('report', $embsection2->t_bill_Id ?? '') }}">Report</a></li>
        </ul>


        <!-- <h2>Bill Statement</h2>  -->
          <div class="d-flex justify-content-end mb-4 " style="text-align:right; ">
            <a class="btn btn-primary" style="background-color: #ffb7b5; color:black; font-weight:bold; box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);" href="{{ url('Certificatereportpdf', $embsection2->t_bill_Id ?? '') }}">Export to PDF</a>
            </div>


        </div>

        <div>
        {!! $certificateHTML !!}
        </div>

<!-- </body> -->
@endsection
