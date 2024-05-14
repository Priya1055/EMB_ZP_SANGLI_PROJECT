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
<h2 style="flex: 1;">Accountant Master</h2>
<div class="btn-group" style="text-align: right;">
<!-- <form method="POST" action="{{ url('juniorengineer') }}">
  @csrf -->
  <!-- <a href="{{ url('AAOdropdown') }}" class="btns btn-sm">NEW</a> -->
  <!-- <button type="submit" class="btns btn-xs btn-flat  btn-sm" data-toggle="tooltip" title='NEW'>NEW</button>
</form> -->
<a href="{{ url('#') }}" class="btn btn-sm" style="background-color: orange; color: white;">
    <i class="fas fa-search" title="Find"></i>
</a>



    {{-- <i class="fas fa-search-plus" title="Advanced Search"></i> <!-- Assuming you want a different search icon --> --}}
</a>
</div>
</div>

 <table class="table table-striped  table-hover">
     <tr>
        <th>Division_Name</th>
        <!-- <th>Subdivision_Name</th> -->
        <th>Designation</th>
        <th>Charge-From</th>
        <th>Charge-Upto</th>
        <th>Mobile-No</th>
        <th>Email</th>
        <th>Username</th>
        <th colspan='3' style="text-align:center">Settings</th>
     </tr>
     @foreach ($users as $key => $user)
    <tr>
        <td>{{ $divNames[$key] }}</td>
        <!-- <td>{{ $SubdivNames[$key] }}</td> Use $SubdivNames instead of $userSubDivName -->
        <td>{{ $user->designation }}</td>
        <!-- <td>{{ $designationNames[$key] }}</td> -->
        <td>{{ $user->period_from }}</td>
        <td>{{ $user->period_upto }}</td>
        <td>{{ $user->phone_no }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->username }}</td>

            <td>
                <a href="{{ url('showAccount/' . $user->DAO_id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye" title="View"></i></a>
               </div>
            </td>
            <td>
           <a href="{{ url('editAccountant/' . $user->DAO_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" title="Edit"></i></a>
           </td>
           <td>
           <form method="POST" action="{{ route('deleteAccountant', $user->DAO_id) }}">
    @csrf
    @method('DELETE')
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
