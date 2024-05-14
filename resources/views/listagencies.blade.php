<style>
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
/* new find btn */
.btns{
  background: #04AA6D;
  margin-right:10px;
  color: white;

}

.btn{
      margin-right:10px;
   }
</style>

@extends('layouts.header')

@section('content')


<br>
<br>
<br>


    <div class="container-fluid mt-3  table-responsive-sm">
    <div style="display: flex; align-items: center;">
  <h2 style="flex: 1;">Agency List:</h2>
  <div class="btn-group" style="text-align: right;">
    <a href="{{ url('agency') }}" class="btn btn-sm btn-success"><i class="fas fa-plus" title="New"></i></a>
    <a href="{{ url('#') }}" class="btn btn-sm" style="background-color: orange; color: white;">
        <i class="fas fa-search" title="Find"></i>
    </a>
  </div>
</div>




     <table class="table table-striped  table-hover">
         <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Reg No</th>
            <th>Bank Name</th>
            <th>Acc No</th>
            <th>Key Person Name</th>
            <th>Key Person No</th>
            <th colspan='3' style="text-align:center">Action</th>
         </tr>
         @foreach ($users as $user)
         <tr >
            <td>{{ $user->agency_nm }}</td>
            <td>{{ $user->Agency_Mail }}</td>
            <td>{{ $user->Agency_Phone }}</td>
            <td>{{ $user->Regi_No_Local }}</td>
            <td>{{ $user->Bank_nm }}</td>
            <td>{{ $user->Bank_acc_no }}</td>
            <td>{{ $user->Contact_Person1 }}</td>
            <td>{{ $user->C_P1_Phone }}</td>
            <td>
<a href="{{ url('view_agency/' . $user->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye" title="View"></i></a>
               </td>
            <td>
               <a href="{{ url('editagency/' . $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" title="Edit"></i></a>
               </td><td><form method="POST" action="{{ route('deleteagency', $user->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash" title="Delete"></i></button>
                        </form></td>
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





   <!-- <div class="container mt-3">
  <h2>View  Records</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Reg No</th>
        <th>Bank Name</th>
        <th>Acc No</th>
        <th>Key Person Name</th>
        <th>Key Person No</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
         <tr>
            <td>{{ $user->agency_nm }}</td>
            <td>{{ $user->Agency_Mail }}</td>
            <td>{{ $user->Agency_Phone }}</td>
            <td>{{ $user->Regi_No_Local }}</td>
            <td>{{ $user->Bank_nm }}</td>
            <td>{{ $user->Bank_acc_no }}</td>
            <td>{{ $user->Contact_Person1 }}</td>
            <td>{{ $user->C_P1_Phone }}</td>
         </tr>
         @endforeach
    </tbody>
  </table>
</div>  -->






@endsection

