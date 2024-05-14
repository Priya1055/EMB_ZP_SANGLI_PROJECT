<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <script src="https://kit.fontawesome.com/2b9cdc1c9a.js" crossorigin="anonymous"></script> 


    <link rel="stylesheet" href="connnection_tableformate.php">


<style>
body 
{
  margin:0;
  font-family:Arial;
  /* background:pink; */

}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
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
</head>



<body>
<header><div class="text-left p-4 text-reset fw-bold" style="background-color: rgba(0, 0, 0, 0.05); padding:20px; text-align:center">
    Header:
    <!-- <a class="text-reset fw-bold" href="https://mdbootstrap.com/">sisinfotech.com</a> -->
  </div>
  <!-- Copyright -->
</header>

    
<div class="topnav" id="myTopnav">
  <div class="dropdown">
    <button class="dropbtn">Users 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="{{url('listuser')}}">Users </a>
      <a href="{{url('userpermision')}}">User Permision</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Master Data
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    
      <a href="{{url('listsubdivisions')}}">SubDivision</a>
      <a href="{{url('listexecutive')}}">Executive Engineer</a>
      <a href="{{url('listdeputy')}}">Deputy Engineer</a>
      <a href="{{url('listjuniorengineer')}}">Junior Engineer</a>
      <a href="{{url('listagencies')}}">Agencies</a>
      <a href="{{url('listfundhead')}}">Fund Head</a>
      <a href="{{url('listworkmasters')}}">Work Master</a>
      <a href="{{url('listemb')}}">EMB</a>
</div>
</div>
</div>
</div>

      







<div style="padding-left:16px">
</div>
<div class="wrapper">
  <!-- Your page content here -->
  <footer class="footer">
    <div class="text-center">
      © 2021 All rights reserved.
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">sisinfotech.com</a>
    </div>
  </footer>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>

</html>
