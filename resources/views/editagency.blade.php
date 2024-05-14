



    <!-- form first -->

       <!-- Bootstrap CSS for tabs -->

     <!-- <link rel="stylesheet" href="agency.css">  -->

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




/* validattion error msg */
.error-message {
            color: red;
   }

    </style>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            var emailInput = document.getElementById("email");
            var placeInput = document.getElementById("placedata");
            var phonenoInput = document.getElementById("phonedata");
            var gstInput = document.getElementById("gstno");
            var panInput= document.getElementById("panno");
            var ifscInput=document.getElementById("ifscno");
            var micrInput=document.getElementById("micrno");
            var personemailInput = document.getElementById("personemail");
            var personphoneInput = document.getElementById("personphone");

            emailInput.addEventListener('input', function() {
                validateEmail();
            });

            placeInput.addEventListener('input', function() {
                validatePlace();
            });

            phonenoInput.addEventListener('input', function() {
                validatePhoneNumbers();
            });

            gstInput.addEventListener('input', function() {
               validateGST();
               convertToUpperCase();

            });

            panInput.addEventListener('input', function(){
              validatePAN();
              convertToUpperCase();

            });
            ifscInput.addEventListener('input', function(){
              validateIFSC();
              convertToUpperCase();

            });

            micrInput.addEventListener('input', function(){
             validateMICR();
            });

            personemailInput.addEventListener('input', function() {
                validatePersonEmail();
            });

            personphoneInput.addEventListener('input', function() {
                validatePersonPhone();
            });


            function validateEmail() {
                var email = emailInput.value;
                var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var emailErrorMessage = document.getElementById("email-error-message");
                if (!email.match(emailRegex)) {
                    emailErrorMessage.innerText = "Please enter a valid email address.";
                } else {
                    emailErrorMessage.innerText = "";
                }
            }

            function validatePlace() {
                var place = placeInput.value;
                var placeErrorMessage = document.getElementById("place-error-message");
                if (place.trim() === "") {
                    placeErrorMessage.innerText = "Please enter a place.";
                } else {
                    placeErrorMessage.innerText = "";
                }
            }

            function validatePhoneNumbers() {
                var phoneno = phonenoInput.value;
                var phoneRegex = /^\d{10}$/;
                var phoneNumbers = phoneno.split(",");
                var phoneErrorMessage = document.getElementById("phone-error-message");
                for (var i = 0; i < phoneNumbers.length; i++) {
                    var number = phoneNumbers[i].trim();
                    if (!number.match(phoneRegex)) {
                        phoneErrorMessage.innerText = "Please enter valid 10-digit phone numbers separated by a comma.";
                        return;
                    }
                }
                phoneErrorMessage.innerText = "";
            }

            function convertToUpperCase() {
  var gstInput = document.getElementById("gstno");
  gstInput.value = gstInput.value.toUpperCase();
  var panInput= document.getElementById("panno");
  panInput.value=panInput.value.toUpperCase();
  var ifscInput=document.getElementById("ifscno");
  ifscInput.value=ifscInput.value.toUpperCase();

}



            function validateGST() {
              var gst = gstInput.value;
              var gstRegex = /^\d{2}[A-Z]{5}\d{4}[A-Z]{1}\d[Z]{1}[A-Z\d]{1}$/;
                      var gstErrorMessage = document.getElementById("gst-error-message");
              if (!gst.match(gstRegex)) {
                gstErrorMessage.innerText = "Please enter a valid GST number.";
              } else {
                gstErrorMessage.innerText = "";
              }
            }

            function validatePAN() {
              var pan = panInput.value;
              // var panRegex = /^[A-Z]{5}\d{4}[A-Z]{1}$/;
              var panRegex = /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/;
              var panErrorMessage = document.getElementById("pan-error-message");
              if(!pan.match(panRegex))
              {
                panErrorMessage.innerText = "Please enter a valid PAN number"
              }
              else{
                panErrorMessage.innerText="";
              }
            }

            function validateIFSC(){
              var ifsc=ifscInput.value;
              var ifscRegex= /^[A-Za-z]{4}\d{7}$/;
              var ifscErrorMessage= document.getElementById("ifsc-error-message")
              if(!ifsc.match(ifscRegex))
              {
                ifscErrorMessage.innerText="Please Enter valid IFSC code"
              }
              else{
                ifscErrorMessage.innerText="";
              }
            }

            function validateMICR(){
              var micr=micrInput.value;
              var micrRegex= /^\d{9}$/;
              var micrErrorMessage= document.getElementById("micr-error-message");
              if(!micr.match(micrRegex))
              {
                micrErrorMessage.innerText="Please Enter valid MICR number"
              }
              else{
                micrErrorMessage.innerText="";
              }
            }

            function validatePersonEmail() {
                var personemail = personemailInput.value;
                var personemailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var personemailErrorMessage = document.getElementById("personemail-error-message");
                if (!personemail.match(personemailRegex)) {
                    personemailErrorMessage.innerText = "Please enter a valid email address.";
                } else {
                    personemailErrorMessage.innerText = "";
                }
            }

            function validatePersonPhone() {
    var personphoneInput = document.getElementById("personphone");
    var personphone = personphoneInput.value;
    var personphoneRegex = /^\d{10}$/;
    var personphoneErrorMessage = document.getElementById("personphone-error-message");

    if (!personphone.match(personphoneRegex)) {
        personphoneErrorMessage.innerText = "Please enter a valid 10-digit phone number.";
    } else {
        personphoneErrorMessage.innerText = "";
    }
}

        });


</script>
@extends('layouts.header')

@section('content')



   @include('sweetalert::alert')

        <div class="card">
        <div class="card-header">

        <a href="{{ url('listagencies') }}" class="btn  float-end"><i class="fa-solid fa-circle-left" style="font-size: 24px;"></i> </a>

</div>
</div>
<br>

<div class="title">AGENCY</div>

       <!-- <div> -->
    <form action="{{url('update_agency/' . $users->id)}}" method="post">
           @csrf
           @method('PUT')

           <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <div class="container">
        <div class="m-3">
            <div class="row align-items-center">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="name" class="col-form-label fw-bold fs-5">Name:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-10" id="dropdown">
                    <div class="row g-2">
                        <!-- <div class="col-sm-1">
                            <select class="form-select" required>
                                <option>Mr.</option>
                                <option>Ms.</option>
                                <option>M/s.</option>

                            </select>
                        </div> -->
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="text" name="agency_nm" value="{{$users->agency_nm ?? ''}}" required>
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
                    <input type="text" class="form-control" id="addinp1" name="Agency_Ad1" value="{{$users->Agency_Ad1 ?? ''}}" >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="address2" class="col-form-label fw-bold fs-5">Address 2:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-5">
                    <input type="text" class="form-control" id="addinp2" name="Agency_Ad2" value="{{$users->Agency_Ad2 ?? ''}}" >
                </div>
                <div class="col-sm-4 col-md-3 col-lg-1">
                    <label for="place" class="col-form-label fw-bold fs-5">Place:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-4">
                    <input type="text" class="form-control" id="placedata" name="Agency_Pl" value="{{$users->Agency_Pl ?? ''}}" required>
                    <span id="place-error-message" class="error-message"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="email" class="col-form-label fw-bold fs-5">Email:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-5">
                    <input type="email" class="form-control" id="email" name="Agency_Mail"  value="{{$users->Agency_Mail ?? ''}}" required>
                    <span id="email-error-message" class="error-message"></span>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-1">
                    <label for="phone" class="col-form-label fw-bold fs-5">Phone:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-4">
                    <input type="tel" class="form-control" id="phonedata" name="Agency_Phone" pattern="[0-9]{10}" required value="{{$users->Agency_Phone ?? ''}}">
                    <span id="phone-error-message" class="error-message"></span>
                </div>
            </div>
            <br>
            <!-- <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="username" class="col-form-label fw-bold fs-5">User Name:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-5">
                    <input type="text" class="form-control" id="usernamedata" name="User_Name"  value="{{$users->User_Name ?? ''}}" required>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-1">
                    <label for="password" class="col-form-label fw-bold fs-5">Password:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-4">
                    <input type="password" class="form-control" name="Password" id="passworddata" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{7,}$" title="Minimum of 7 characters. Should have at least one special character, one number, and one uppercase letter."  minlength="7"  value="{{$users->Password ?? ''}}" required>
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
                <input type="number" name="Regi_No_Local" placeholder="Please give the no" class="databox" maxlength="10"  value="{{$users->Regi_No_Local ?? ''}}" required>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
                <label for="gstno">GST No :</label>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-2 col-lg-5">
                <input type="text" name="Gst_no" id="gstno" maxlength="15" required class="databoxright" value="{{$users->Gst_no ?? ''}}" required>
                <div id="gst-error-message" class="error-message"></div>
            </div>
         </div>
    <br>

    <div class="row">
        <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
          <label for="" id="registrationclass">Registration class :</label>
        </div>

        <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
         <select name="Regi_Class" id="" class="databox" onchange="showsubdropdown(this)">
            <option value="I" @if($users->Regi_Class =='I')selected @endif>I</option>
            <option  value="II" @if($users->Regi_Class =='II')selected @endif>II</option>
            <option  value="III" @if($users->Regi_Class =='III')selected @endif>III</option>
            <option  value="IV" @if($users->Regi_Class =='IV')selected @endif>IV</option>
            <option  value="V" @if($users->Regi_Class =='V')selected @endif>V</option>
            <option  value="VI" @if($users->Regi_Class =='VI')selected @endif>VI</option>
            <option  value="VI-A" @if($users->Regi_Class =='VI-A')selected @endif>VI-A</option>
            <option value="VI-B" @if($users->Regi_Class =='VI-B')selected @endif>VI-B</option>
            <option value="VI-C" @if($users->Regi_Class =='VI-C')selected @endif>VI-C</option>
          </select>

        </div>

        <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
             <label for="panno">PAN No :</label>
        </div>

        <div class="col-xs-2 col-sm-9 col-md-2 col-lg-3">
            <input type="text" name="Pan_no" id="panno" maxlength="10" required class="databoxright" value="{{$users->Pan_no ?? ''}}" required>
            <div id="pan-error-message" class="error-message"></div>
        </div>
    </div>

    <br>
    <div class="row">

    <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
          <label for="registrationupto">Regestration upto :</label>
        </div>

        <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
          <input type="date" name="Regi_Dt_Local" id="" class="databoxright" value="{{$users->Regi_Dt_Local ?? ''}}" required>
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
                <input type="text"  name="Bank_nm" id="banknamedetails" required value="{{$users->Bank_nm ?? ''}}" required>
            </div>

            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
                <label for="ifscno">IFSC No :</label>
            </div>

            <div class="col-xs-2 col-sm-9 col-md-2 col-lg-5">
                <input type="text"id="ifscno" name="Ifsc_no"  class="databoxright" maxlength="11" required value="{{$users->Ifsc_no ?? ''}}" required>
                <div id="ifsc-error-message" class="error-message"></div>
            </div>

        </div>

        <br>


          <div class="row">
               <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
                    <label for="" id="bankbranch">Bank Branch :</label>
               </div>

                <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
                      <input type="text" name="Bank_br" id="bankbranchdetails" required value="{{$users->Bank_br ?? ''}}" required>
                </div>

                <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
                      <label for="" >MICR No:</label>
                </div>

                 <div class="col-xs-2 col-sm-9 col-md-2 col-lg-5">
                      <input type="text" id="micrno" name="Micr_no" class="databoxright" maxlength="9"  value="{{$users->Micr_no ?? ''}}" required>
                      <div id="micr-error-message" class="error-message"></div>
                 </div>

             </div>

            <br>

          <div class="row">
                  <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
                     <label for="" id="accno">ACC No :</label>
                 </div>

                <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
                   <input type="text" name="Bank_acc_no" id="accdetails" required value="{{$users->Bank_acc_no ?? ''}}" required>
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
              <input type="text" name="Contact_Person1" class="databox" maxlength="50" value="{{$users->Contact_Person1 ?? ''}}" required>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
              <label for="personphone">Key Person Phone:</label>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
              <input type="tel" id="personphone" name="C_P1_Phone" class="databox"  maxlength="10" pattern="[0-9]{10}" value="{{$users->C_P1_Phone ?? ''}}" required>
              <div id="personphone-error-message" class="error-message"></div>
            </div>

          </div>
          <br>

          <div class="row">
          <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
              <label for="personemail">Key Person Email:</label>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
              <input type="email" id="personemail" name="C_P1_Mail" class="databoxright" maxlength="50" value="{{$users->C_P1_Mail ?? ''}}" required>
              <div id="personemail-error-message" class="error-message"></div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>


<!-- Bootstrap JS tabs-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


<div class="d-flex justify-content-center mt-3 fs-5">
  <input type="submit" value="SUBMIT" class="custom-button p-3">
</div>
</form>


  <!-- Bootstrap JS tabs-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>





@endsection

<!-- <div class="m-3">


       <div class="row ">

           <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3 col-form-label">
               <label for="" id="name">Name :</label>
           </div>

           <div class="col-xs-2 col-sm-9 col-md-3 col-lg-4" id="dropdown">
               <select  >
                   <option >Mr.</option>
                   <option >Ms.</option>
               </select>

                 <input type="text" id="text" name="agency_nm"  value="{{$users->agency_nm ?? ''}}" required>
           </div>

       </div>
  <br>
         <div class="row ">

                 <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3 col-form-label">
                    <label for="" id="address1">Address 1 :</label>
                 </div>

               <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
                      <input type="text" id="addinp1" name="Agency_Ad1" value="{{$users->Agency_Ad1 ?? ''}}" required>
                 </div>
           </div>

 <br>

    <div class="row ">

          <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
              <label for="" id="address2">Address 2 :</label>
           </div>

             <div class="col-xs-2 col-sm-9 col-md-9 col-lg-7">
              <input type="text" id="addinp2" name="Agency_Ad2" value="{{$users->Agency_Ad2 ?? ''}}" required>
             </div>




             <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
               <label for="" id="place">Place :</label>
                 </div>

              <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
                 <input type="text" id="placedata" name="Agency_Pl" value="{{$users->Agency_Pl ?? ''}}" required>
               </div>
            </div>



 <br>

       <div class="row">

           <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3" >
                <label for="" id="email">Email :</label>
          </div>

           <div class="col-xs-2 col-sm-9 col-md-9 col-lg-7">
              <input type="email" name="Agency_Mail" id="email" value="{{$users->Agency_Mail ?? ''}}" required>
           </div>


              <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
               <label for="" id="phone">Phone :</label>
              </div>


             <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
                  <input type="tel" name="Agency_Phone" id="phonedata" pattern="[0-9]{10}" required value="{{$users->Agency_Phone ?? ''}}">
             </div>

      </div>



 <br>

 <div class="row">

         <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
             <label for="" id="username">User Name :</label>
         </div>

          <div class="col-xs-2 col-sm-9 col-md-9 col-lg-7">
              <input type="text" id="usernamedata" name="User_Name" value="{{$users->User_Name ?? ''}}" required>
          </div>

          <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
            <label for=""id="password">Password :</label>
          </div>

          <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
           <input type="password"   value="{{$users->Password ?? ''}}" name="Password" id="passworddata" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{7,}$" title="Minimum of 7 characters. Should have at least one special character and one number and one UpperCase Letter." required minlength="7" >
          </div>

         </div>


</div> -->
<!--PART_B ITEMS-->

<!--INLIST(RIGHT(t2.Item_Id, 6), "001992", "003229", "002047", "002048", "004349", "001991", "004345", "002566", "004350", "003940", "003941", "004346", "004348", "004347")-->
