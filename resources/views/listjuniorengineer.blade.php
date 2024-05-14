    <style>
       #table{
            margin-top: 100px;

        }
    </style>

@extends('layouts.header')

@section('content')


<br>
<br>
<br>

 <div  class="container-fluid  table-responsive-sm">

<div style="display: flex; align-items: center;" >
<h2 style="flex: 1;">List Junior Engineers</h2>
<div class="btn-group" style="text-align: right;">
<!-- <form method="POST" action="{{ url('juniorengineer') }}">
  @csrf -->
  <a href="{{ url('juniorengineerdropdown') }}" class="btn btn-sm btn-success">
<strong><i class="fas fa-plus"></i></strong>
</a>
  <!-- <button type="submit" class="btns btn-xs btn-flat  btn-sm" data-toggle="tooltip" title='NEW'>NEW</button>
</form> -->
{{-- <a href="{{ url('#') }}" class="btns btn-sm">FIND</a> --}}
</div>
</div>

 <table class="table table-striped  table-hover">
     <tr>
        <th>Division_Name</th>
        <th>Subdivision_Name</th>
        <th>Designation</th>
        <th>Charge-From</th>
        <th>Charge-Upto</th>
        <th>Mobile-No</th>
        <th>Email</th>
        <th>Username</th>
        <th colspan='3' style="text-align:center">Settings</th>
     </tr>
     @foreach ($users as $user)
     <tr >
        <td>{{ $user->division_name}}</td>
        <td>{{ $user->subdivision_name }}</td>
        <td>{{ $user->designation }}</td>
        <td>{{ $user->period_from }}</td>
        <td>{{ $user->period_upto }}</td>
        <td>{{ $user->phone_no }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->username }}</td>

            <td>
                <div class="btn-group">
                    <a href="{{ url('view_juniorengineer/' . $user->jeid) }}" class="btn btn-info btn-sm"><i class="fas fa-eye" title="View"></i></a>

                </td>
                <td><a href="{{ url('editjuniorengineer/' . $user->jeid) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" title="Edit"></i></a>
                </div>
            </td>
            <td>
                <form method="POST" action="{{ route('deletejuniorengineer', $user->jeid) }}">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash" title="Delete"></i></button>
                </form>
            </td>
     </tr>
     @endforeach
  </table>
  </div>


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


@endsection
