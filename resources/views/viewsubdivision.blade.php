

@extends('layouts.header')
@section('content')
<style>


</style>






<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <!-- @if(\Session::has('success'))
                        <div class="alert alert-danger">
                            <h4>{{ \Session::get('success') }}</h4>
                        </div>
                        <hr>
                        @endif -->
                    <h4>Sub Division </h4>
                </div>
                <div  style="text-align: right; font-size: 20px; font-weight:bold;">
                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-home" title="Home"></i></a>
                {{-- <a href="" ><i class="fas fa-search" title="Find"></a> --}}
                <a href="{{url('subdivision')}}" class="btn btn-success btn-sm "><i class="fas fa-plus" title="New"></i></a>
                                <a href="{{ url('#') }}" class="btn btn-sm" style="background-color: orange; color: white;">
                    <i class="fas fa-search" title="Find"></i>
                </a>
             </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- <th>id</th> -->
                                <th>Division Name</th>
                                <th>Sub-Division Name</th>
                                <th>Address1</th>
                                <th>Address2</th>
                                <th>Place </th>
                                <th>Email</th>
                                <th>Phone-No</th>
                                <th>Designation</th>
                                <th colspan='3' style="text-align:center">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach  ($users as $user)
                            <tr>
                                <td>{{ $user->division_name }}</td>
                                <td>{{ $user->subdivision_name }}</td>
                                <td>{{ $user->address1 }}</td>
                                <td>{{ $user->address2 }}</td>

                                <td>{{ $user->place }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_no }}</td>
                                <td>{{ $user->designation }}</td>


                                <td>
                                <a href="{{ url('showsubdivision/' . $user->Sub_Div_Id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye" title="view"></i></a>
                                 </td>

                                {{-- <td>
                                     {{-- <a href="{{url('EditSubdivisionRoute/'.$user->Sub_Div_Id)}}" class="btn btn-primary btn-sm">Edit</a> --}}

                                {{-- </td>

                <td> --}}
                <!-- <form method="POST" action="{{ url('DeleteSubdivisionRoute', $user->Sub_Div_Id) }}">
                            {{-- @csrf --}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form> -->
                                 </td>





                            </tr>
                        </tbody>
                        @endforeach

                    </table>










                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>



</body>
</html>
