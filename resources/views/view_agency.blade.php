
 <!-- form first -->
     <!-- Bootstrap CSS -->

      <!-- Bootstrap CSS for tabs -->


    <style>

.container {
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
}
.title{
        font-weight: bold;
        font-size: 24px;
        line-height: 1.5;
        text-align: center;
        margin-top: 20px;
    }


    /* Tabs */
    /* Customize tab button colors */
    .nav-pills .nav-link {
      color: #17202A ; /* Text color */
      background-color: #D5DBDB ; /* Background color */
      font-weight: bold; /* Make the tab buttons bold */
    }

    .zp_btn_tab {
  padding: 10px 20px;
  margin-right: 10px; /* Add a right margin between the buttons */
  border-radius: 20px;
}

.zp_btn_tab.active {
  background-color: #EDBB99 !important;
  color: #fff;
}

.zp_btn_tab:not(.active) {
  background-color: #f8f9fa;
  color: #000;
  border: 1px solid #ced4da;
}

.zp_btn_tab:not(.active):hover {
  background-color: #e9ecef;
}

    /* .zp_btn_tab.active{
      background-color: #EDBB99 !important;
    } */
    .nav-pills .nav-link.active {
      background-color: #D8ACA2; /* Active tab background color */
    }

    /* Customize tab panel colors */
    .tab-content {
      background-color: #f8f9fa; /* Tab panel background color */
      color: #000000; /* Text color */
    }

    /* Make tab content text bold */
    .tab-content p,
    .tab-content label {
      font-weight: bold;
      margin-bottom: 0.5rem;
    }

    /* Improve input field appearance */
    .tab-content input[type="text"],
    .tab-content input[type="number"],
    .tab-content input[type="email"],
    .tab-content input[type="tel"],
    .tab-content select{
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ced4da;
      width: 100%;
      box-sizing: border-box;
      margin-bottom: 1rem;
    }

    .tabcontent {
    padding: 15px; /* Adjust the padding value as needed */
    margin-top: 15px; /* Adjust the top margin value as needed */
    margin-bottom: 15px; /* Adjust the bottom margin value as needed */
  }


    /* Submit button */
    .custom-button {
      background-color: #5dbea3; /* Replace with your desired color */
      color: white; /* Replace with the desired text color */
      margin-bottom:20px;
       padding: 10px 40px; /* Adjust padding as needed */
      border: none;
      border-radius: 5px;
      font-size: 16px;
      width: 400px;

    }


/* .bg-custom {
  background-color: #e3f2fd;
} */

/* Custom text color */
.navbar-dark .navbar-brand,
.navbar-dark .navbar-nav .nav-link {
  color: black;
  font-weight: bold;
}
.navbar-brand {
  margin-right: auto;
}
.bg-custom {
  background-color: #e3f2fd;
}
.navbar-nav .nav-link:hover {
  color: lightgray;
  text-decoration: none;
  background-color: transparent;
}
</style>

@extends('layouts.header')

@section('content')

       <div class="card-body">
        <a href="{{ url('listagencies') }}" class="btn float-end text-align:left"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i> </a>

<br>
    <div class="title">AGENCY</div>

    <form action="" method="get">
          @csrf
          @method('PUT')

<div class="container">
        <div class="m-3">
            <div class="row align-items-center">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="name" class="col-form-label fw-bold fs-5">Name:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-10" id="dropdown">
                    <div class="row g-2">
                        <div class="col-sm-1">
                            <select class="form-select" disabled>
                                <option>Mr.</option>
                                <option>Ms.</option>
                                <option>M/s.</option>

                            </select>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="text" name="agency_nm" value="{{$users->agency_nm ?? ''}}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="address1" class="col-form-label fw-bold fs-5">Address 1:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-6">
                    <input type="text" class="form-control" id="addinp1" name="Agency_Ad1" value="{{$users->Agency_Ad1 ?? ''}}" disabled>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="address2" class="col-form-label fw-bold fs-5">Address 2:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-5">
                    <input type="text" class="form-control" id="addinp2" name="Agency_Ad2" value="{{$users->Agency_Ad2 ?? ''}}" disabled>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-1">
                    <label for="place" class="col-form-label fw-bold fs-5">Place:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-4">
                    <input type="text" class="form-control" id="placedata" name="Agency_Pl" value="{{$users->Agency_Pl ?? ''}}" disabled>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="email" class="col-form-label fw-bold fs-5">Email:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-5">
                    <input type="email" class="form-control" id="email" name="Agency_Mail"  value="{{$users->Agency_Mail ?? ''}}" disabled>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-1">
                    <label for="phone" class="col-form-label fw-bold fs-5">Phone:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-4">
                    <input type="tel" class="form-control" id="phonedata" name="Agency_Phone" pattern="[0-9]{10}" disabled value="{{$users->Agency_Phone ?? ''}}">
                </div>
            </div>
            <br>
            <!-- <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="username" class="col-form-label fw-bold fs-5">User Name:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-5">
                    <input type="text" class="form-control" id="usernamedata" name="User_Name"  value="{{$users->User_Name ?? ''}}" disabled>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-1">
                    <label for="password" class="col-form-label fw-bold fs-5">Password:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-4">
                    <input type="password" class="form-control" name="Password" id="passworddata" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{7,}$" title="Minimum of 7 characters. Should have at least one special character, one number, and one uppercase letter."  minlength="7"  value="{{$users->Password ?? ''}}" disabled>
                </div>
            </div> -->
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>





<br>
<div class="container">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active btn zp_btn_tab"  id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Registration Details</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link btn zp_btn_tab" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bank Details</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link btn zp_btn_tab" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Key Person Details</a>
    </li>
  </ul>

  <div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <!-- registration form -->

  <div id="Registrationdetails" class="tabcontent">
    <br>
    <div class="m-5">
    <!-- <form action=""> -->
        <div class="row">
            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
               <label for="" id="reg">Registration No :</label>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
                <input type="number" name="Regi_No_Local" placeholder="Please give the no" class="databox" maxlength="10"  value="{{$users->Regi_No_Local ?? ''}}" disabled>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
                <label for="" id="gstno">GST No :</label>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-2 col-lg-5">
            <input type="text" name="Gst_no" id="gstno" maxlength="15" required class="databoxright" value="{{$users->Gst_no ?? ''}}" disabled>            </div>
         </div>
    <br>

    <div class="row">
        <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
          <label for="" id="registrationclass">Registration class :</label>
        </div>

        <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
        <select name="Regi_Class" class="databox" disabled>
  <option value="I" @if($users->Regi_Class =='I')selected @endif>I</option>
  <option value="II" @if($users->Regi_Class =='II')selected @endif>II</option>
  <option value="III" @if($users->Regi_Class =='III')selected @endif>III</option>
  <option value="IV" @if($users->Regi_Class =='IV')selected @endif>IV</option>
  <option value="V" @if($users->Regi_Class =='V')selected @endif>V</option>
  <option value="VI" @if($users->Regi_Class =='VI')selected @endif>VI</option>
  <option value="VI-A" @if($users->Regi_Class =='VI-A')selected @endif>VI-A</option>
  <option value="VI-B" @if($users->Regi_Class =='VI-B')selected @endif>VI-B</option>
  <option value="VI-C" @if($users->Regi_Class =='VI-C')selected @endif>VI-C</option>
</select>

        </div>

        <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
             <label for="" id="panno">PAN No :</label>
        </div>

        <div class="col-xs-2 col-sm-9 col-md-2 col-lg-3">
        <input type="text" name="Pan_no" id="panno" maxlength="10" required class="databoxright" value="{{$users->Pan_no ?? ''}}" disabled>
        </div>
    </div>

    <br>
    <div class="row">

        <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
               <label for="" id="registrationupto">Regestration upto :</label>
        </div>

         <div class="col-xs-2 col-sm-9 col-md-4 col-lg-5">
             <input type="date" name="Regi_Dt_Local" id="" class="databox" value="{{$users->Regi_Dt_Local ?? ''}}" disabled >
        </div>

    </div>
  </div>
 </div>

  </div>

  <!-- bank details -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- bank details -->

  <div id="Bankdetails" class="tabcontent">
    <br>
    <div class="m-5">
        <div class="row">
            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
                <label for="" id="bankname">Bank Name :</label>
            </div>

            <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
                <input type="text"  name="Bank_nm" id="banknamedetails" required value="{{$users->Bank_nm ?? ''}}" disabled>
            </div>

            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
                <label for="" id="ifscno">IFSC No :</label>
            </div>

            <div class="col-xs-2 col-sm-9 col-md-2 col-lg-5">
                <input type="text" name="Ifsc_no"  class="databoxright" required value="{{$users->Ifsc_no ?? ''}}" disabled>
            </div>

        </div>

        <br>


          <div class="row">
               <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
                    <label for="" id="bankbranch">Bank Branch :</label>
               </div>

                <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
                      <input type="text" name="Bank_br" id="bankbranchdetails" required value="{{$users->Bank_br ?? ''}}" disabled>
                </div>

                <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
                      <label for="" id="micrno">MICR No :</label>
                </div>

                 <div class="col-xs-2 col-sm-9 col-md-2 col-lg-5">
                      <input type="text" name="Micr_no" class="databoxright" required value="{{$users->Micr_no ?? ''}}" disabled>
                 </div>

             </div>

            <br>

          <div class="row">
                  <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
                     <label for="" id="accno">ACC No :</label>
                 </div>

                <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
                   <input type="text" name="Bank_acc_no" id="accdetails" required value="{{$users->Bank_acc_no ?? ''}}" disabled>
                </div>

          </div>
   </div>
  </div>
  </div>

<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
      <!-- Key Person Details -->
      <div id="KeyPersonDetails" class="tabcontent">
        <br>
        <div class="m-5">
          <div class="row">
            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
              <label for="personname"> key Person Name:</label>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
              <input type="text" name="Contact_Person1" class="databox" maxlength="50" value="{{$users->Contact_Person1 ?? ''}}" disabled>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
              <label for="personphone">Key Person Phone:</label>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
              <input type="tel" name="C_P1_Phone" class="databox" pattern="[0-9]{10}" value="{{$users->C_P1_Phone ?? ''}}" disabled>
            </div>

          </div>
          <br>

          <div class="row">
          <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
              <label for="personemail">Key Person Email:</label>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
              <input type="email" name="C_P1_Mail" class="databoxright" maxlength="50" value="{{$users->C_P1_Mail ?? ''}}" disabled>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS tabs-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</form>


@endsection
      <!-- <div class="m-3">

            <div class="row ">

                <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3 col-form-label">
                    <label for="" id="name">Name :</label>
                </div>

                <div class="col-xs-2 col-sm-9 col-md-3 col-lg-4" id="dropdown" >
                    <select disabled >
                        <option >Mr.</option>
                        <option >Ms.</option>
                    </select>

                      <input type="text" id="text" name="agency_nm"  value="{{$users->agency_nm ?? ''}}" disabled>
                </div>

            </div>
       <br>
           <div class="row ">

                  <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3 col-form-label">
                       <label for="" id="address1">Address 1 :</label>
                  </div>

                <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
                     <input type="text" id="addinp1" name="Agency_Ad1" value="{{$users->Agency_Ad1 ?? ''}}" disabled>
                </div>

            </div>

      <br>

      <div class="row ">

               <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
                   <label for="" id="address2">Address 2 :</label>
                </div>

                <div class="col-xs-2 col-sm-9 col-md-9 col-lg-7">
                    <input type="text" id="addinp2" name="Agency_Ad2" value="{{$users->Agency_Ad2 ?? ''}}" disabled>
                </div>

                <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
                    <label for="" id="place">Place :</label>
                </div>

                <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
                  <input type="text" id="placedata" name="Agency_Pl" value="{{$users->Agency_Pl ?? ''}}" disabled>
                </div>

            </div>



      <br>

            <div class="row">

                  <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3" >
                         <label for="" id="email">Email :</label>
                  </div>

                   <div class="col-xs-2 col-sm-9 col-md-9 col-lg-7">
                     <input type="email" name="Agency_Mail" id="email" value="{{$users->Agency_Mail ?? ''}}" disabled>
                   </div>

                  <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
                      <label for="" id="phone">Phone :</label>
                 </div>

                     <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
                         <input type="tel" name="Agency_Phone" id="phonedata" pattern="[0-9]{10}" disabled value="{{$users->Agency_Phone ?? ''}}">
                      </div>
            </div>



      <br>

      <div class="row">

               <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
                   <label for="" id="username">User Name :</label>
               </div>

               <div class="col-xs-2 col-sm-9 col-md-9 col-lg-7">
                    <input type="text" id="usernamedata" name="User_Name" value="{{$users->User_Name ?? ''}}" disabled>
               </div>

               <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
                  <label for=""id="password">Password :</label>
               </div>

               <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
                  <input type="password"   value="{{$users->Password ?? ''}}" name="Password" id="passworddata" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{7,}$" title="Minimum of 7 characters. Should have at least one special character and one number and one UpperCase Letter." disabled minlength="7" >
              </div>

            </div>
 </div> -->

