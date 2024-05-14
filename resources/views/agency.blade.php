


    <!-- form first -->
     <!-- Bootstrap CSS -->

      <!-- Bootstrap CSS for tabs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

  <!-- header links -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <script src="https://kit.fontawesome.com/2b9cdc1c9a.js" crossorigin="anonymous"></script> 

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
    /* Navbar */
    #nav {
      background-color: lightgray;
      margin-top: 20px;
      background-size: cover; 
      padding-top: 20px;
      padding-bottom: 20px;
      display: flex;
    }

    .navb {
      border: 2px solid; 
      border-radius: 25px;
      padding: 10px;
      margin: 10px;
      cursor: pointer;
    }

    .bg-custom {
      background-color: #fde3e9;
    }

    .navb:hover {
      background-color: lightblue;
    }

    #navbox {
      padding: 20px;
      border-top-right-radius: 25px;
      border-bottom-right-radius: 25px;
      background-color: lightblue;
    }

    /* Tabs */
    /* Customize tab button colors */
    .nav-pills .nav-link {
      color: #17202A; /* Text color */
      background-color: #D5DBDB; /* Background color */
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
  .tab-content select,
  .tab-content textarea {
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

    /* Validation error message */
    .error-message {
      color: red;
    }
   .nav-link
   {
    background-color: #D8ACA2;
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


    //         var gstInput = document.getElementById("gstno");
    // var anotherGstInput = document.getElementById("anotherGstInput");

    // gstInput.addEventListener('input', function () {
    //   convertToUpperCase(gstInput);
    //   validateGST();
    // });


    // function convertToUpperCase(inputElement) {
    //   inputElement.value = inputElement.value.toUpperCase();
    // }


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
  var gstInput = document.getElementById("gstno"); // Get the input field by ID
  var gst = gstInput.value; // Do not convert to uppercase
  var gstRegex = /^\d{2}[A-Za-z]{5}\d{4}[A-Za-z]{1}\d[Zz]{1}[A-Za-z\d]{1}$/; // Make the regex case-insensitive
  var gstErrorMessage = document.getElementById("gst-error-message");

  if (!gst.match(gstRegex)) {
    gstErrorMessage.innerText = "Please enter a valid GST number.";
  } else {
    gstErrorMessage.innerText = "";
  }
}









function validatePAN() {
              var pan = panInput.value;
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
    
 



  <div class="card">
        <div class="card-header">
    <h4>List Agencies
        <a href="{{ url('listagencies') }}" class="btn btn-danger float-end">BACK</a>
    </h4>
</div>
</div>
   <!-- Nav bar -->
   @include('sweetalert::alert')
   

    <!-- nav box -->
       <!-- <div id="navbox"></div> -->
       <!-- </div> -->
        <br>
        
        <div class="title">AGENCY</div>

        <div>
    <form  class="border-form" action="agencycreate" method="post" onsubmit="return validateForm()">
          @csrf
   
        <!-- form -->
    <!-- <div class="m-3"> -->
   
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
                            <select class="form-select">
                                <option>Mr.</option>
                                <option>Ms.</option>
                                <option>M/s.</option>
                            </select>
                        </div> -->
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="text" name="agency_nm">
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
                    <input type="text" class="form-control" id="addinp1" name="Agency_Ad1">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="address2" class="col-form-label fw-bold fs-5">Address 2:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-5">
                    <input type="text" class="form-control" id="addinp2" name="Agency_Ad2">
                </div>
                <div class="col-sm-4 col-md-3 col-lg-1">
                    <label for="place" class="col-form-label fw-bold fs-5">Place:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-4">
                    <input type="text" class="form-control" id="placedata" name="Agency_Pl">
                    <span id="place-error-message" class="error-message"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="email" class="col-form-label fw-bold fs-5">Email:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-5">
                    <input type="email" class="form-control" id="email" name="Agency_Mail">
                    <span id="email-error-message" class="error-message"></span>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-1">
                    <label for="phone" class="col-form-label fw-bold fs-5">Phone:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-4">
                    <input type="tel" class="form-control" id="phonedata" name="Agency_Phone" pattern="[0-9]{10}" >
                    <span id="phone-error-message" class="error-message"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <label for="username" class="col-form-label fw-bold fs-5">User Name:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-5">
                    <input type="text" class="form-control" id="usernamedata" name="User_Name">
                </div>
                <div class="col-sm-4 col-md-3 col-lg-1">
                    <label for="password" class="col-form-label fw-bold fs-5">Password:</label>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-4">
                    <input type="password" class="form-control" name="Password" id="passworddata" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{7,}$" title="Minimum of 7 characters. Should have at least one special character, one number, and one uppercase letter." required minlength="7">
                </div>
            </div>
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
                <input type="number" name="Regi_No_Local" placeholder="Please give the no" class="databox" maxlength="10"   required>
            </div> 
            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
                <label for="gstno">GST No :</label>
            </div> 
          <div class="col-xs-2 col-sm-9 col-md-2 col-lg-5">
            <input type="text" name="Gst_no" id="gstno" maxlength="15" class="databoxright">
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
             
         <option value="">I</option>
                    <option value="">II</option>
                    <option value="">III</option>
                    <option value="">IV</option>
                    <option value="">V</option>
                    <option value="VI">VI</option>
                    <option value="">VI-A</option>
                    <option value="">VI-B</option>
                    <option value="">VI-C</option>
          </select>
      
        </div>

        <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
             <label for="panno">PAN No :</label>
        </div>

        <div class="col-xs-2 col-sm-9 col-md-2 col-lg-3">
            <input type="text" name="Pan_no" id="panno" maxlength="10"  class="databoxright"  required>
            <div id="pan-error-message" class="error-message"></div>
        </div>
    </div>

    <br>
    <div class="row">

    <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
          <label for="registrationupto">Regestration upto :</label>
        </div>

        <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
          <input type="date" name="Regi_Dt_Local" id="" class="databoxright" required>
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
                <input type="text"  name="Bank_nm" id="banknamedetails" required >
            </div>

            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
                <label for="ifscno">IFSC No :</label>
            </div>

            <div class="col-xs-2 col-sm-9 col-md-2 col-lg-5">
                <input type="text"id="ifscno" name="Ifsc_no"  class="databoxright" maxlength="11"  >
                <div id="ifsc-error-message" class="error-message"></div>
            </div>

        </div>

        <br>


          <div class="row">  
               <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
                    <label for="" id="bankbranch">Bank Branch :</label>
               </div>

                <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
                      <input type="text" name="Bank_br" id="bankbranchdetails"  >
                </div>

                <div class="col-xs-2 col-sm-9 col-md-4 col-lg-1">
                      <label for="" >MICR No:</label>
                </div>

                 <div class="col-xs-2 col-sm-9 col-md-2 col-lg-5">     
                      <input type="text" id="micrno" name="Micr_no" class="databoxright" maxlength="9" >
                      <div id="micr-error-message" class="error-message"></div>
                 </div>

             </div> 

            <br>  

          <div class="row">
                  <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
                     <label for="" id="accno">ACC No :</label>
                 </div>

                <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
                   <input type="text" name="Bank_acc_no" id="accdetails" required >
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
              <input type="text" name="Contact_Person1" class="databox" maxlength="50" required>
            </div> 
            <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
              <label for="personphone">Key Person Phone:</label>
            </div>
            <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
              <input type="tel" id="personphone" name="C_P1_Phone" class="databox"  maxlength="10" pattern="[0-9]{10}"  required>
              <div id="personphone-error-message" class="error-message"></div>
            </div> 
            
          </div>
          <br>

          <div class="row">
          <div class="col-xs-2 col-sm-9 col-md-4 col-lg-2">
              <label for="personemail">Key Person Email:</label>
            </div> 
            <div class="col-xs-2 col-sm-9 col-md-7 col-lg-3">
              <input type="email" id="personemail" name="C_P1_Mail" class="databoxright" maxlength="50"  required>
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
</div>
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-dark" href="https://www.standardinfosys.in//">STANDARD INFOSYS.COM</a>
  </div>
  <!-- Copyright -->
</footer>
@endsection()<!-- tabs -->







<!-- 
                      <option value="">I</option>
                    <option value="">II</option>
                    <option value="">III</option>
                    <option value="">IV</option>
                    <option value="">V</option>
                    <option value="VI">VI</option>
                    <option value="">VI-A</option>
                    <option value="">VI-B</option>
                    <option value="">VI-C</option> -->


<!-- old form -->
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
             
                 <input type="text" id="text" name="agency_nm">
           </div>
 
       </div>
  <br>
  <div class="row ">

      <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3 col-form-label">
        <label for="" id="address1">Address 1 :</label>
      </div>

       <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
           <input type="text" id="addinp1" name="Agency_Ad1">
       </div>
       
       
 </div>

 <br>

 <div class="row ">
     
    <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
       <label for="" id="address2">Address 2 :</label>
    </div>   
       <div class="col-xs-2 col-sm-9 col-md-9 col-lg-7"> 
       <input type="text" id="addinp2" name="Agency_Ad2">
       </div> 
    
      
     
         
             <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
               <label for="" id="place">Place :</label>
                 </div>
            <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">   
               <input type="text" id="placedata" name="Agency_Pl">
      
          </div> 
     
    
       
   
   </div>  


   
 <br>

        <div class="row">

           <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">

           <label for="" id="email">Email :</label>
          </div>
   
           <div class="col-xs-2 col-sm-9 col-md-9 col-lg-7">
           <input type="email" name="Agency_Mail" id="email">
            </div>
            <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
           <label for="" id="phone">Phone :</label>
            </div>
             <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
             <input type="tel" name="Agency_Phone" id="phonedata" pattern="[0-9]{10}" required>
           </div>
      </div>      
           


 <br>

 <div class="row">
         <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
          <label for="" id="username">User Name :</label>
          </div>
          <div class="col-xs-2 col-sm-9 col-md-9 col-lg-7">
         <input type="text" id="usernamedata" name="User_Name">
          </div>
          <div class="col-xs-2 col-sm-9 col-md-3 col-lg-3">
         <label for=""id="password">Password :</label>
       </div>
        <div class="col-xs-2 col-sm-9 col-md-3 col-lg-5">
           <input type="password" name="Password" id="passworddata" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{7,}$" title="Minimum of 7 characters. Should have at least one special character and one number and one UpperCase Letter." required minlength="7" ></div>
         </div>
       </div>   
 </form> 
</div> -->
<!-- #name{
     padding-left: 10px; 
    font-size: large;
}
  /* #dropdown{
      /* margin-top: 10px; 
    }   */
    #text{
    height: 30px;
    width: 400px;
    padding-left: 5px;
}
#address1{
    /* padding-left: 10px; */
    font-size: large;
}
#addinp1{
    /* margin-top: 10px; */
    height: 30px;
    width: 400px;
    padding-left: 5px;
}
#email{
  margin-top: 10px;
    font-size: large;
}
#emaildata{
    margin-top: 10px;
    height: 30px;
    width: 300px;
    padding-left: 5px;
}
#phone{
    margin-top: 25px;
    font-size: large;  
}
#phonedata{
    margin-top: 25px;
    height: 30px;
    width: 300px;
    padding-left: 5px;
}
#address2{
    /* padding-left: 10px; */
    font-size: large;
}
#addinp2{
    /* margin-top: 10px; */
    height: 30px;
    width: 400px;
    padding-left: 5px;
}
#place{
    margin-top: 25px;
    font-size: large;  
}
#placedata{
    margin-top: 25px;
    height: 30px;
    width: 300px;
   
}

#username{
  margin-top: 10px;
    font-size: large;
}
#usernamedata{
    margin-top: 10px;
    height: 30px;
    width: 300px;
    padding-left: 5px;
}
#password{
  margin-top: 25px;
    font-size: large; 
}
  
#passworddata{
    margin-top: 25px;
    height: 30px;
    width: 300px;  
} -->
<!-- <script>
        function convertToUppercase() {
            // Get the input element
            var inputElement = document.getElementById("anotherGstInput");

            // Convert the input value to uppercase
            var inputValue = inputElement.value.toUpperCase();

            // Update the input value with the uppercase version
            inputElement.value = inputValue;
        }
    </script> -->
