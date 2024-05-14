


@extends('layouts.header')
@section('content')






@include('sweetalert::alert')

    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class ="panel-heading text-center">
                    <h3>SubDivision </h3>
</div>
<div class=" panel-body">
<form action="{{ url('update/'.$user->Sub_Div_Id) }}"  method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$user->Sub_Div_Id}}">

        <div class="form-group">
        <label class="" for="divname" >Division Name:</label>
        <select class="form-control" name="division_name" id="divname">
    @foreach ($div as $division)
        <option value="{{ $division->div }}">{{ $division->div }}</option>
    @endforeach
</select>

            <div class="form-group">
            <label class="mrg1" for="subdivname"> Sub Division Name:</label>
            <select class="form-control" name="subdivision_name" id="subdivname" required>
</select>
<!-- <div class="form-group">
            <label class="mrg1" for="subdivname"> Sub Division Marathi:</label>
            <select class="form-control" name="subdivision_nameM" id="subdivnameM" required>
</select>
 -->



            <div class="form-group">
            <label class="" for="add1">Address 1:</label>
            <input type="text"  class="form-control" name="address1" id="add1" required  value="{{$user->address1 ?? ''}}">


            <div class="form-group">
            <label class="mrg1" for="add2">Address 2:</label>
            <input type="text"  class="form-control" name="address2" required  value="{{$user->address2 ?? ''}}"  >


            <div class="form-group">
             <label class="" for="place">Place:</label>
            <input type="text"  name="place" class="form-control" id="place" required value="{{$user->place ?? ''}}" >



            <div class="form-group">
            <label class="mrg" for="mail">Email:</label>
            <input type="email"  name="email" class="form-control" id="mail" required  value="{{$user->email ?? ''}}"   >



            <div class="form-group">
            <label class="mrg" for="phone">Phone No:</label>
            <input type="tel"  name="phone_no"  class="form-control" id="phone" required  value="{{$user->phone_no ?? ''}}"  >


            <div class="form-group ">
            <label class="" for="des">Designation:</label>
            <input type="text"  name="designation" placeholder="Deputy Engineer" id="des" class="form-control"
            required value="{{$user->designation ?? ''}}" >

            <input type="submit" class="btn btn-primary" value="Update">

            <a href="{{url('listsubdivisions')}}" class="btn btn-primary btn-sm">Exit</a>
</div>


</div>
</form>
</div>
<div class=" panel-footer text-right">
    <small>&copy;sis infotech sangli</small>
</div>
</div>
</div>
</div>
@endsection








































































<!-- <body>

    <div class="container">
    <div class="row col-md-6  col-md-offset-3">

            <div class="panel panel-primary">
        <div class="m-2">

        <div class="panelbody">

            <form action="subdivision"  method="post">
                <div class="form-group">
@csrf



    <div class="row m-2" >

        <div class="col-12  col-xs-2 col-sm-6 col-md-5 col-lg-4 col-xl-2">

            <label class="" for="">Region:</label></div>
            <div class="col-12  col-xs-2 col-sm-6 col-md-7 col-lg-4 col-xl-2">

            <select class="" name="region" id="">
                <option value="pune">Pune</option>
              <option value="sangli">Sangli</option>
              <option value="satara">Satara</option>
              <option value="solapur">Solapur</option>
            </select>
        </div>

        </div>

    <div class="row m-2">

    <div class="col-12  col-xs-2 col-sm-3 col-md-5 col-lg-4 col-xl-2">
        <label class="mrg" for="circle-names" >Circle:</label></div>
        <div class="col-12  col-xs-2 col-sm-3 col-md-7 col-lg-4 col-xl-2 " >

        <select class="region" name="circle" id="region-names" >
            <option value="pune">Pune</option>
          <option value="sangli">Sangli</option>
          <option value="satara">Satara</option>
          <option value="solapur">Solapur</option>
        </select>
    </div>


    </div>






    <div class="row m-2">

        <div class="col-12  col-xs-2 col-sm-3 col-md-5 col-lg-4 col-xl-2">
            <label class="mrg" for="circle-names" >Division Name:</label></div>
            <div class="col-12  col-xs-2 col-sm-3 col-md-7 col-lg-8 col-xl-2">

            <select class="region1" name="division_name" id="region-names">
                <option value="pune">Pune</option>
              <option value="sangli">Sangli</option>
              <option value="satara">Satara</option>
              <option value="solapur">Solapur</option>
            </select>
            </div>


        </div>



        <div class="row m-2">

            <div class="col-12  col-xs-2 col-sm-3 col-md-5 col-lg-4 col-xl-2">
                <label class="mrg1" for="circle-names"> Sub Division:</label>
            </div>
                <div class="col-12  col-xs-2 col-sm-3 col-md-7 col-lg-8 col-xl-2">

                <input type="text" class="text1234_wei" name="subdivision_name" required></div>


            </div>


            <div class="row m-2">

                <div class="col-12  col-xs-2 col-sm-3 col-md-5 col-lg-4 col-xl-2">
                    <label class="mrg1" for="circle-names">Address 1:</label></div>
                    <div class="col-12  col-xs-2 col-sm-3 col-md-7 col-lg-4 col-xl-2">

                    <input type="text"  class="text_wei" name="address1" required></div>


                </div>

                <div class="row m-2">

                    <div class="col-12  col-xs-2 col-sm-3 col-md-5 col-lg-4 col-xl-2">
                        <label class="mrg1" for="circle-names">Address 2:</label></div>
                        <div class="col-12  col-xs-2 col-sm-3 col-md-7 col-lg-4 col-xl-2">

                        <input type="text"  class="text_wei" name="address2" required></div>


                    </div>

                    <div class="row m-2">

                        <div class="col-12  col-xs-2 col-sm-3 col-md-5 col-lg-4 col-xl-2">
                            <label class="mrg" for="circle-names">Place:</label></div>
                            <div class="col-12  col-xs-2 col-sm-3 col-md-7 col-lg-4 col-xl-2">

                            <input type="text"  name="place" class="text2_wei" required></div>


                        </div>


                        <div class="row m-2">

                            <div class="col-12  col-xs-2 col-sm-3 col-md-5 col-lg-4 col-xl-2">
                                <label class="mrg" for="circle-names">Email:</label></div>
                                <div class="col-12  col-xs-2 col-sm-3 col-md-7 col-lg-4 col-xl-2">
                                    <input type="email"  name="email" class="text3_wei" required></div>


                            </div>



                            <div class="row m-2">

                                <div class="col-12  col-xs-2 col-sm-3 col-md-5 col-lg-4 col-xl-2">
                                    <label class="mrg" for="circle-names">Phone No:</label></div>
                                    <div class="col-12  col-xs-2 col-sm-3 col-md-7 col-lg-4 col-xl-2">
                                        <input type="tel"  name="phone_no"  class="text22_wei" required></div>


                                </div>

                                <div class="row m-2">

                                    <div class="col-12  col-xs-2 col-sm-3 col-md-5 col-lg-4 col-xl-2">
                                        <label class="mrg  form-control" for="circle-names">Designation:</label>
                                    </div>
                                    <div class="col-12  col-xs-2 col-sm-3 col-md-7 col-lg-4 col-xl-2">

                                    <input type="text"  name="designation" placeholder="Deputy Engineer"  class="text23_wei" required><br><br>
                                    </div>

                                    </div>


                                    <div class="row m-2">

                                        <div class="col-12  col-xs-2 col-sm-1 col-md-1 col-lg-1 col-xl-1 g-1">

                                                 <input type="submit" name="back" value="Back"> -->
                                                <!-- <a href="sub_division.php"> Back</a> -->



                                        <!-- </div> -->
                                        <!-- <div class="col-12  col-xs-2 col-sm-1 col-md-1 col-lg-1 col-xl-1 g-1">
                                            <input type="submit" name="NEW" value="EDIT"/>

                                        </div> -->
                                        <!-- <div class="col-12  col-xs-2 col-sm-1 col-md-1 col-lg-1 col-xl-1 g-1"> -->

                                            <!-- <input type="submit" name="Save" value="SAVE"/> -->


                                        <!-- </div> -->
                                        <!-- <div class="col-12  col-xs-2 col-sm-1 col-md-1 col-lg-1 col-xl-1 g-1"> -->
                                                <!-- <input type="submit" name="Exit" value="EXIT"/> -->

                                                  <!-- <a href="#"></a> -->

                                        <!-- </div> -->
                                        <!-- //row complete -->
                                        <!-- </div> -->
                                        <!-- </div></div>
                                        </div> -->





<!-- </div></div>
                                </form>
                                <div class="panel-footer text-center">
                                                <small>&copy; sis infotech@sangli</small>
                                        </div>

</div>
</div>

 -->



<!-- </body> -->
</html>
