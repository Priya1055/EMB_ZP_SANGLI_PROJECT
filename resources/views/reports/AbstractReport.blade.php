@extends('layouts.NavHeader')
@section('content')
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- nav bar bootstrap cdn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
<style>
    /* Increase font weight of labels */
 .form-group label {
      font-weight: bold;
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


<!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('report', $embsection2->t_bill_Id ?? '') }}"><i class="fa fa-folder-open-o" aria-hidden="true"></i> REPORTS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="{{ url('Mb', $embsection2->t_bill_Id ?? '') }}">MB</a></li>
      <li><a href="{{ url('abstractrep', $embsection2->t_bill_Id ?? '') }}">Abstract</a></li>
      <li><a href="{{ url('BILL', $embsection2->t_bill_Id ?? '') }}">BILL</a></li>
      <li><a href="{{ url('Recovertstmt', $embsection2->t_bill_Id ?? '') }}">Recovery Statement</a></li>
      <li><a href="{{ url('Materialconsstmt', $embsection2->t_bill_Id ?? '') }}">Material Consumption Statement</a></li>
      <li><a href="{{ url('Excesssavestmt', $embsection2->t_bill_Id ?? '') }}">Excess Saving Statement</a></li>
      <li><a href="{{ url('Compcertf', $embsection2->t_bill_Id ?? '') }}">Completion Certificate</a></li>
      <li><a href="{{ url('Workhandcertf', $embsection2->t_bill_Id ?? '') }}">Work-Hand Over Certificate</a></li>
    </ul>
  </div>
</nav> -->



<div class="container-fluid" >

        <ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $embsection2->work_id ?? '') }}">Bill</a></li>
            <li><a href="{{ url('report', $embsection2->t_bill_Id ?? '') }}">Report</a></li>
            <li><a href="{{ url('abstractrep', $embsection2->t_bill_Id ?? '') }}">Abstract Report</a></li>
        </ul>

        <!-- Report Tabluler Body -->

            <h2>Abstract Report</h2>

            <div class="d-flex justify-content-end mb-4 " style="text-align:right; ">
            <a class="btn btn-primary" style="background-color: #ffb7b5; color:black; font-weight:bold; box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);" href="{{ url('abstractreport/pdf', $embsection2->t_bill_Id ?? '') }}">Export to PDF</a>
        </div>
            <!-- <table class="table">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                </tr>
                <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
                </tr>
                <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                </tr>
            </tbody>
            </table>-->


        </div>
        <div>
        {!! $abstractreport !!}
        </div>
</body>
@endsection
