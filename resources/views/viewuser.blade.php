
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="VinyxDCxDU2uRVlRXXjN3qbzmomZY9czl7oTjNGI">

    <title>WMS</title>

    <!-- Scripts -->
    <script src="/themes/frontend/js/app.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Styles -->
  <link href="/themes/frontend/css/app.css" rel="stylesheet">




<style>
        /* Common Custom CSS  */
        .custom-table-head{
            background-color: #e9ecef;
            color: black;
            font-size: 1em;
        }
        .box-design{
            border-width: 2px;
            border-style: solid;
            border-color: gray;
            margin-top: 5px;
            margin-bottom: 5px;

        }

        /* footer */
html, body {
  height: 85%;
  margin: 0;
  padding: 0;
}

.wrapper {
  min-height: 100%;
  position: relative;
}

.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.05);
  padding: 20px;
  text-align: center;
}
/* //footer complete// */

    </style>
     
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
     


</head>
<body class="h-screen font-sans antialiased leading-none bg-gray-100">
<header><div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); padding:20px; text-align:center">
   
   <a class="text-reset fw-bold" href=""><h3>Header</h3></a>
 </div>
 <!-- Copyright -->
</header>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="">MH</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav navbar-inverse">

                                <li><a class="nav-link" href=" 
                                
                                "><i class="fa fa-dashboard" aria-hidden="true"></i>
                    Dashboard</a></li>
                                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i> Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="https://client.standardinfosys.in/userslist"><i class="fa fa-user" aria-hidden="true"></i>
                            User</a>
                            <a class="dropdown-item" href="https://client.standardinfosys.in/addpermission"><i class="fa fa-key" aria-hidden="true"></i>
                            Permissions</a>
                </li>

                                     <li><a class="nav-link" href="https://client.standardinfosys.in/EstimatesMasterList/h"><i class="fa fa-tasks" aria-hidden="true"></i> Estimate Master</a></li>
                    <li><a class="nav-link" href="https://client.standardinfosys.in/AARegisterList/h"><i class="fa fa-tasks" aria-hidden="true"></i> A.A. Register</a></li>
                    <li><a class="nav-link" href="https://client.standardinfosys.in/TSRegisterList/h"><i class="fa fa-tasks" aria-hidden="true"></i> T.S.Register</a></li>
                    <li><a class="nav-link" href="https://client.standardinfosys.in/DTPRegisterList/h"><i class="fa fa-tasks" aria-hidden="true"></i> DTP Register</a></li>
                    <li><a class="nav-link" href="https://client.standardinfosys.in/WORegisterList/h"><i class="fa fa-tasks" aria-hidden="true"></i> Work Order</a></li> -->
                   

                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-database" aria-hidden="true"></i> Technical branch 
                        </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="https://client.standardinfosys.in/EstimatesMasterList/h">Estimate Master</a>
                        <a class="dropdown-item" href="https://client.standardinfosys.in/AARegisterList/h">A. A.  Registers</a>
                        <a class="dropdown-item" href="https://client.standardinfosys.in/TSRegisterList/h">T. S. Registers</a>
                        <a class="dropdown-item" href="https://client.standardinfosys.in/DTPRegisterList/h">D. T. P.  Registers</a>
                        <a class="dropdown-item" href="https://client.standardinfosys.in/ProgressReports/h">Progress Report</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-money" aria-hidden="true"></i> Account Branch 
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="https://client.standardinfosys.in/WORegisterList/h">Work Order Register</a>
                          <a class="dropdown-item" href="https://client.standardinfosys.in/RABills/h">RA Bills</a>
                        </div>
                    </li>

                    <li><a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i> S M Bele</a></li>
                    <li><a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i>W M S</a></li>

                    <li><a class="nav-link" href="https://client.standardinfosys.in/logout"  class="no-underline hover:underline"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                                <form id="logout-form" action="https://client.standardinfosys.in/logout" method="POST" class="hidden">
                    <input type="hidden" name="_token" value="VinyxDCxDU2uRVlRXXjN3qbzmomZY9czl7oTjNGI">
                </form>
                </ul>

            </div>

          </nav>  

        <main class="py-4">
              <main class="sm:container sm:mx-auto sm:mt-10">
      <div class="w-full sm:px-6">

          <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
            <style>
                /* *{
                padding: 2px;
                margin: 2px;
                } */
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
                #th1{
                color: #6c757d; text-align: center;text-transform: uppercase;
                }
                .border {
                border: 2px indigo dashed;
                }
                .d-table {
                display:table;
                }
                .d-table-cell {
                display:table-cell;
                }

                .w-100 {
                width: 100%;
                }

                .tar {
                text-align: right;
                }
        th
        {
            background:pink;
        }
       

                /* .btn{
                color: white; background: royalblue; height: 60px; width: 160px; font-weight: bold; font-size: 20px; border-radius: 7px
                } */
            </style>

              <div class="card-header text-center font-weight-bold">

                <h2>USERS</h2>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-search"></i> Filter</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                 <input id="text" type="text" class="form-control" name="txtsearch" placeholder="Search">
                                </div>
                             </form>
                        </div>

                      </div>
                    </div>
                  </div>

                <div class="row d-flex flex-row-reverse">
                    <a  style="color:white; text-decoration:none;" class="btn btn-success" href="{{url('InsertUser')}}"><i class="fa fa-plus"></i> New</a>&nbsp;
                    <!-- <a  style="color:white; text-decoration:none;" class="btn btn-success" href=""><i class="fa fa-pencil"></i> Edit</a>&nbsp;
                    <a  style="color:white; text-decoration:none;" href="" class="btn btn-success"><i class="fa fa fa-eye"></i> View</a>&nbsp; -->
                    <a class="btn btn-primary"  style="color:white; text-decoration:none;" data-toggle='modal' data-target='#exampleModal' data-backdrop='static' data-keyboard='false'><i class="fa fa-search"></i> Find</a>&nbsp;
                </div>



                              </div>



            <table>
            <thead>

              <tr>
              <!-- <th id="th1" style="text-align: center !important;" >id</th> -->

                <th id="th1" style="text-align: center !important;" >Name</th>
                <th id="th1" style="text-align: left !important;" >Role</th>
                <th id="th1" style="text-align: left !important;" >Designation</th>
                <th id="th1" style="text-align: left !important;" >Sub Div</th>
                <th id="th1">Action</th>
              </tr>
              </thead>

              <tbody>
                            @foreach  ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->usertypes }}</td>
                                <td>{{ $user->Designation }}</td>
                                <td>{{ $user->Sub_Div_M }}</td>

                    <td style="text-align: center">
                <a  style="color:white; text-decoration:none;" href="" class="btn btn-success"><i class="fa fa fa-eye"></i> View</a>&nbsp;
                    <a  style="color:white; text-decoration:none;" class="btn btn-success" href=""><i class="fa fa-pencil"></i> Edit</a>&nbsp;
            <a  style="color:white; text-decoration:none;" class="btn btn-success" href=""><i class="fa fa-fw fa-trash"></i> Delete</a>&nbsp;


                    </td>
                </tr> 
                </tbody>
                        @endforeach


                                          </table>




            
            <script>
                $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();
                });
                </script>
          </section>
      </div>
  </main>
          </main>
    </div>

    <footer class="footer">
    <div class="text-center">
      © 2021 All rights reserved.
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">sisinfotech.com</a>
    </div>
  </footer>
    

</body>
</html>
