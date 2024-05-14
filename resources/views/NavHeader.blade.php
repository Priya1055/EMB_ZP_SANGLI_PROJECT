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
        position: fixed;
        bottom: 0;
        width: 100%;
        }
    </style>
</head>
<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="navbar-header background-color: rgb(55, 55, 55)">
                <a class="navbar-brand text-white font-weight-bold" href="{{ url('report', $embsection2->t_bill_Id ?? '') }}"><i class="fas fa-folder-open" aria-hidden="true"></i> REPORTS</a>
            </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white font-weight-bold navbar-brand" href="#" id="dropdownMenu3" role= "button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"> MB</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu3" style="background-color: #343a40">
                    <a class="nav-link text-white font-weight-bold" href="{{ url('Mb', $embsection2->t_bill_Id ?? '') }}">MB</a>
                    <a class="nav-link text-white font-weight-bold" href="{{ url('abstractrep', $embsection2->t_bill_Id ?? '') }}">Abstract</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white font-weight-bold navbar-brand" href="#" id="dropdownMenu3" role= "button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="nav-link text-white font-weight-"> BILL</a>
                <div class="dropdown-menu"whitearia-labelledby="dropdownMenu3" style="background-color: #343a40; width:290px">
                    <a class="nav-link text-white font-weight-bold width:30px" href="{{ url('BILL', $embsection2->t_bill_Id ?? '') }}">BILL</a>

                    <a class="nav-link text-white font-weight-bold" href="{{ url('Materialconsstmt', $embsection2->t_bill_Id ?? '') }}">Material Consumption Statement</a>

                    <a class="nav-link text-white font-weight-bold" href="{{ url('Recovertstmt', $embsection2->t_bill_Id ?? '') }}">Recovery Statement</a>

                    <a class="nav-link text-white font-weight-bold" href="{{ url('Excesssavestmt', $embsection2->t_bill_Id ?? '') }}">Excess Saving Statement</a>

                    <a class="nav-link text-white font-weight-bold" href="">Royalty Statement</a>

                    <a class="nav-link text-white font-weight-bold" href="{{ url('Compcertf', $embsection2->t_bill_Id ?? '') }}">Work Completion Certificate</a>

                    <a class="nav-link text-white font-weight-bold" href="{{ url('Workhandcertf', $embsection2->t_bill_Id ?? '') }}">Work-Hand Over Certificate</a>
                </div>
            </li>
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

</html>
