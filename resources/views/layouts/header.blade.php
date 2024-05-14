<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- font awesome cdn -->
  <!-- for the R A Bill no jquery ajax -->
  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- tooltip -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script> -->
  <!-- tooltip -->

  <!-- header -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- nav bar bootstrap cdn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- new button popup alert links -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

<!-- Include SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

  <!-- Lightbox2 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

 <!-- Include jQuery UI CSS and JavaScript from CDN -->
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="crossorigin="anonymous" referrerpolicy="no-referrer" />  
       
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- //Button Icon -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
       <!-- //Button Icon -->
 
       <style>
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
        /* .custom-navbar .navbar-nav .nav-link:hover {
            color: #ff5733; /* Change the hover color as desired 
        } */

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
  position: fixed;
  bottom: 0;
  width: 100%;
}        

/* //bresdcum */
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
    ul.breadcrumb li a:hover
    {
    color: #01447e;
    text-decoration: underline;
    }
        /* Back button css */

#backButton 
{
    background-color: #b8d7d5; /* Light background color */
    color: black; /* Dark black color for text */
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    display: inline-block;
    text-decoration: none;
}

#backButton .fa-chevron-left 
{
    margin-right: 5px;
    color: #000; /* Dark black color for the arrow */
}

#backButton:hover 
{
    background-color: #66948f; /* Lighter background color on hover */
}

/* //BGLogo Image appy all Pages */
#backbglogo
    {
      background-image: url('{{ asset('Uploads/Photos/zplogo.png') }}');
      background-size: auto 100%;
      background-repeat: no-repeat;
        /* width:200px; */
        /* Z-index:-1; */
      background-position:center;
    }
    /* //BGLogo Image appy */
    body 
    {
  overflow-x: hidden;
  overflow-y: auto;
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

    /* Tooltip container all button apply */
    .avatar {
  position: relative;
  display: inline-block;

}

/* Tooltip text */
.tip {
  visibility: hidden;
  width: auto;
  background-color: #000;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 10px;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 40%;  /* Center horizontally */
  bottom: calc(100% + 15px); /* Position the tooltip above the button */
  transform: translateX(-50%); /* Center horizontally */
  opacity: 0;
  transition: opacity 0.3s;
}

/* Tooltip arrow */
.tip::after {
  content: "";
  position: absolute;
  top: 10px;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #000 transparent transparent transparent;
}

/* Show the tooltip text when hovering over the tooltip container */
.avatar:hover .tip {
  visibility: visible;
  opacity: 1;
}
/* Tooltip container */

</style>
</head>
<body>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-- Bootstrap JavaScript and jQuery -->



<header>
<!-- //<p>Global Tbill ID: {{ session('global_tbillid') }}</p> -->
@auth
<nav class="navbar navbar-expand-lg custom-navbar container-fluid bg-dark ">
<button class="navbar-toggler custom-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

    <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(auth()->user()->usertypes === "EE" || auth()->user()->usertypes === "PA" || auth()->user()->usertypes === "DYE")
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu1" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    USERS
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="{{url('userslist')}}">Users</a>
                    <a class="dropdown-item" href="{{url('addperm')}}">User Permission</a>
                </div>
            </li>
            @endif

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu2" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    MASTER-DATA
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="{{url('listdivision')}}">Division</a>
                    <a class="dropdown-item" href="{{url('listsubdivisions')}}">SubDivision</a>
                    <a class="dropdown-item" href="{{url('listexecutive')}}">Executive Engineer</a>
                    <a class="dropdown-item" href="{{url('listdeputy')}}">Deputy Engineer</a>
                    <a class="dropdown-item" href="{{url('listSDC')}}">SDC Engineer</a>
                    <a class="dropdown-item" href="{{url('listjuniorengineer')}}">Junior Engineer</a>
                    <a class="dropdown-item" href="{{url('listAAO')}}">AAO(Accountant)</a>
                    <a class="dropdown-item" href="{{url('listAB')}}">AB(Auditor)</a>
                    <a class="dropdown-item" href="{{url('listagencies')}}">Agencies</a>
                    <a class="dropdown-item" href="{{url('listfundhead')}}">Fund Head</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu3" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    TRANSACTIONS
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                    <a class="dropdown-item" href="{{url('listworkmasters')}}">Work Master</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu4" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" cla">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

        <!-- Move "WMS" list item to the right -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('')}}">WMS</a>
            </li>
        </ul>
    </div>
</nav>



@endauth
  <!-- Bootstrap JS for header --> 
<!-- Ensure you have jQuery, Popper.js, and Bootstrap JS included in your HTML -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  </header>
  @yield('content')

 


  <footer class="bg-light text-center text-lg-start" id="">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      Copyright 2023:
    <a class="text-dark" href="https://www.standardinfosys.in//">Standard InfoSystems</a>
  </div>
  <!-- Copyright -->
</footer>


  </body>
</html>

