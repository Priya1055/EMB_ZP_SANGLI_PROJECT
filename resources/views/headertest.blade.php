<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/admin') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/admin') }}" rel="stylesheet">

    {{-- Select2 Example --}}
    {{-- <link href="{{ url('./css/select2.min.css') }}" >
    <link href="{{ url('./css/select2-bootstrap.min.css') }}" >
    <link href="{{ url('./css/select2-bootstrap.css') }}" > --}}

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    {{-- Datatable InBuilt Theam --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    {{-- <script src="{{ url('js/select2.min.js') }}" ></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .container{
            margin-top: 10px !important;
        }
    </style>
</head>
<body class="h-screen font-sans antialiased leading-none bg-gray-100">
    <div id="app">
    {{-- <header class="py-4 bg-gray-700"> --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
                <a class="navbar-brand" href="#">MH</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav navbar-inverse">
                    {{-- <li class="nav-item active">
                      <a class="nav-link" href="#" title="Home" ><i class="fa fa-home" aria-hidden="true"></i><span class="sr-only">(current)</span></a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        @guest('admin')
                        {{-- <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                    @if (Route::has('register'))
                        {{-- <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                    @endif
                    @else
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-database" aria-hidden="true"></i> Masters
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/admin/talm/list') }}">{{ __('Taluka Master') }}</a>
                        <a class="dropdown-item" href="{{ url('/admin/dism/list') }}">{{ __('Districts Master') }}</a>
                        <a class="dropdown-item" href="{{ url('/admin/region/list') }}">{{ __('Region Master') }}</a>
                        <a class="dropdown-item" href="{{ url('/admin/circle/list') }}">{{ __('Circle Master') }}</a>
                        <a class="dropdown-item" href="{{ url('/admin/eemaster/list') }}">{{ __('EE Master') }}</a>
                        <a class="dropdown-item" href="{{ url('/admin/jemaster/list') }}">{{ __('JE Master') }}</a>
                        <a class="dropdown-item" href="{{ url('/admin/dyemaster/list') }}">{{ __('DYE Master') }}</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i> Users
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"  href="{{ url('/admin/users/list') }}"><i class="fa fa-user" aria-hidden="true"></i>
                                {{ __('User') }}</a>
                            {{-- <a class="dropdown-item" href="{{ url('/admin/permission/add') }}"><i class="fa fa-key" aria-hidden="true"></i>
                                {{ __('Permissions') }}</a> --}}
                      </li>
                      <li><a class="nav-link" href="#"><i class="fa  fa-download" aria-hidden="true"></i>  {{ "Export" }}</a></li>
                      <li><a class="nav-link" href="#"><i class="fa  fa-upload" aria-hidden="true"></i>  {{ "Import" }}</a></li>
                      <li><a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i>  {{ admin()->name }}</a></li>
                      <li><a class="nav-link" href="{{ route('admin.logout') }}" class="no-underline hover:underline"
                        onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}</a></li>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
    {{ csrf_field() }}
</form>
@endguest
                  </ul>

                </div>

              </nav>


    <div class="container flex items-center justify-between px-6 mx-auto">
                <div>
                    <div>
                        <a href=""> <img class="img-fluid" src="{{url('/Images/header1.png')}}" alt="" /></a>
                    </div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">

                    </a>
                </div>

            </div>
        {{-- </header> --}}

        @yield('content')
    </div>
</body>
</html>







<!-- where we can use that page -->

@extends('layouts.app')

  @section('content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/admin/home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{url('/admin/dyemaster/list')}}">DYE List</a></li>
      <li class="breadcrumb-item active" aria-current="page">New JE</li>
    </ol>
  </nav>
  <main class="sm:container sm:mx-auto sm:mt-10">
      <div class="w-full sm:px-6">
          <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
              <div class="container mt-4">
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                <!-- <div class="card"> -->
                  <div class="card-header text-center font-weight-bold">
                    <h2><i class="fa fa-fw fa-plus-circle"></i> DYE </h2>
                  </div>
                  <div class="card-body">
                    <form  method="post"  action="add">
                     @csrf
                     <div class="form-group">
                        <label>Division <strong style="color:red">*</strong></label>
                        <select class="form-select form-control" aria-label="Default select example" tabindex="1" name="div_id" required autofocus >
                            {{-- <option value="">-select-</option> --}}
                            @foreach($rsDivision as $divs)
                            <option value="{{$divs->div_id}}">{{$divs->div_m}}</option>
                            @endforeach
                            </select>
                    </div>
                     <div class="form-group">
                        <label>Sub Division <strong style="color:red">*</strong></label>
                        <select class="form-select form-control" aria-label="Default select example" tabindex="2" name="subdiv_id" required >
                            <option value="">-select-</option>
                            @foreach($rssubdivisions as $Subdivs)
                            <option value="{{$Subdivs->Sub_Div_Id}}">{{$Subdivs->Sub_Div_M}}</option>
                            @endforeach
                            </select>
                     </div>
                     <div class="form-group">
                      <label>Name / English<strong style="color:red">*</strong></label>
                      <input type="text" class="form-control"  placeholder="Name" name="name" tabindex="3" required >
                     </div>
                    <div class="form-group">
                        <label>Name / Marathi <strong style="color:red">*</strong></label>
                        <input type="text" class="form-control"  placeholder="Name / Marathi" name="name_m" tabindex="4" >
                    </div>
                    <div class="form-group">
                        <label>Period From</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control"  placeholder="Period From Date" name="period_from" tabindex="5">
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control"  placeholder="Period Upto Date" name="period_upto" tabindex="6">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label>PF Number</label>
                        <input type="text" class="form-control"  placeholder="PF Number" name="pf_no" tabindex="7">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control"  placeholder="Phone" name="phone_no" maxlength="10" tabindex="8">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control"  placeholder="Email Address" name="email" tabindex="9">
                    </div>
                    <div class="form-group">
                        <label for="username">{{ __('Username') }}</label>
                        <input id="Usernm" type="text" class="form-control @error('Usernm') is-invalid @enderror" name="Usernm" required autocomplete="Usernm" tabindex="10">
                        @error('Usernm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="password" class="block mb-2 text-sm font-bold text-gray-700">
                            {{ __('Password') }}
                        </label>
                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password" tabindex="11">

                        @error('password')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="block mb-2 text-sm font-bold text-gray-700">
                            {{ __('Confirm Password') }}
                        </label>
                            <input id="password-confirm" type="password" class="w-full form-input"
                            name="password_confirmation" required autocomplete="new-password" tabindex="12">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" tabindex="13">Submit</button>
                    </div>
                    
                    </form>

                  </div>
                <!-- </div> -->
              </div>


          </section>
      </div>
  </main>
  @endsection