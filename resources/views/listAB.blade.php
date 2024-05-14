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
<h2 style="flex: 1;">Auditor Master</h2>
<div class="btn-group" style="text-align: right;">
<!-- <form method="POST" action="{{ url('juniorengineer') }}">
  @csrf -->
  <!-- <a href="{{ url('juniorengineerdropdown') }}" class="btns btn-sm">NEW</a> -->
<!-- </form>  -->
<a href="{{ url('#') }}" class="btn btn-sm" style="background-color: orange; color: white;">
    <i class="fas fa-search" title="Find"></i>
</a>
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
        <th colspan='2'>Settings</th>
     </tr>
     @foreach ($users as $key => $user)
    <tr>
        <td>{{ $divNames[$key] }}</td>
        <td>{{ $SubdivNames[$key] }}</td> <!-- Use $SubdivNames instead of $userSubDivName -->

        <td>{{ $user->designation }}</td>
        <td>{{ $user->period_from }}</td>
        <td>{{ $user->period_upto }}</td>
        <td>{{ $user->phone_no }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->username }}</td>
        <td>
           <div class="btn-group">
            <a href="{{ url('RouteViewAuditor/' . $user->AB_Id) }}" class="btn btn-info btn-sm" style="margin-left: 10px;"><i class="fas fa-eye" title="View"></i></a>
           </td>
                <td>
            <a href="{{ url('RouteeditAuditor/' . $user->AB_Id) }}" class="btn btn-primary btn-sm ">
                <i class="fa fa-pencil" title="Edit"></i></a>

            </td>
                    <!-- <form method="POST" action="{{ route('deletejuniorengineer', $user->AB_Id) }}">

                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
                    </form> -->
           </div>
        </td>
     </tr>
     @endforeach
  </table>
  </div>

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
