


@extends('layouts.header')
@section('content')


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
                    <h2>Deputy Engineer </h2>
                </div>
                <div  style="text-align: right; font-size: 20px; font-weight:bold;">
                <a href="{{url('homepage')}}" class="btn btn-primary btn-sm"><i class="fas fa-home" title="Home"></i></a>

                                <a href="{{url('Deputy_EngDivSubdivList')}}" class="btn  btn-sm  btn-success"><i class="fas fa-plus" title="New"></i></a>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                              <th>Division Name:</th>
                                              <th>Sub-Division Name:</th>
                                <!-- <th colspan=2> -->
                                    <th>Deputy Engineer Name</th>
                                    <th>Designation Name</th>
                                    <th>Charge From:</th>
                                    <th>charge Upto</th>
                                    <th>pf_no Name </th>
                                    <th>Phone No</th>
                                    <th>Email id</th>
                                <th colspan='3' style="text-align:center">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach  ($users as $user)
                            <tr>
                            <td>{{ $user->division_name }}</td>
                            <td>{{ $user->subdivision_name }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->designation }}</td>
                                <td>{{ $user->period_from }}</td>
                                <td>{{ $user->period_upto }}</td>
                                <td>{{ $user->pf_no }}</td>
                                <td>{{ $user->phone_no }}</td>
                                <td>{{ $user->email }}</td>

                    <td>
                    <a href="{{ url('ShowDeputyRoute/' . $user->dye_id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye" title="View"></i></a>
                        </td>

                    <td>
                        <a href="{{url('editdeputyRoute/'.$user->dye_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" title="Edit"></i></a>

                    </td>
                <td>
                <form method="POST" action="{{ url('deletedpt', $user->dye_id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash" title="Delete"></i></button>
                        </form>
                                 </td>





                            </tr>
                        </tbody>
                        @endforeach

                    </table>


            </div>
        </div>
    </div>
</div>

@endsection


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
