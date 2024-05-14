@extends('layouts.NavHeader')
@section('content')


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

</head>


<div class="container-fluid" >

        <ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $workdata->work_id ?? '') }}">Bill</a></li>
            <li><a href="{{ url('report', $tbillid ?? '') }}">Report</a></li>
            <li><a href="{{ url('BILL', $tbillid ?? '') }}">Bill Report</a></li>
        </ul>


        {{-- <h2>Bill Statement</h2>  --}}
          <div class="d-flex justify-content-end mb-4 " style="text-align:right; ">
            <a class="btn btn-primary" style="background-color: #ffb7b5; color:black; font-weight:bold; box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);" href="{{ url('form_xiv_Pdf', $tbillid ?? '') }}">Export to PDF</a>
            </div>

{{-- {{$tbillid}} --}}
        </div>

        <div>
        {!! $htmlreport !!}
        </div>

</body>
@endsection
