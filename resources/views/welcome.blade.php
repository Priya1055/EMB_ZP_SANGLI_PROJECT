
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script></head>
    <link rel="stylesheet" href="division.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- //font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="connnection_tableformate.php">

    <style>

        *{
            margin:0px;
            padding:0;
        }
        body
        {
         font-size:20px;
        }
       body img {

  width: 100%;
  height: 850px;
}


        </style>

</head>



<body>
<nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
    <li class="nav-item">
      <a href="{{url('subdivision')}}" class="nav-link"> subdivisions</a>
      </li>

      <li class="nav-item">
      <a href="{{url('listsubdivisions')}}" class="nav-link"> ListSubdivisions</a>
      </li>
      <li class="nav-item">
      <a href="{{url('workmaster')}}" class="nav-link"> WorkMasters<br/></a>
      </li>

      <li class="nav-item">
      <a href="{{url('listworkmasters')}}" class="nav-link"> ListMasters<br/></a>
      </li>
    </ul>
  </div>
</nav>
<!-- <img src="imagess/pwd.jpeg" alt=""> -->
<img src={{ asset('imagess/pwd1.jpeg')}} alt="">

</body>
</html>