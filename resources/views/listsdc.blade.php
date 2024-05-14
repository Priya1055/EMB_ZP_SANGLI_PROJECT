<style>
       #table{
            margin-top: 100px;

        }
        .button-container {
    display: flex; /* Display children in a row */
}

.btn i {
    font-size: 16px;

}
</style>

@extends('layouts.header')

@section('content')


<br>
<br>
<br>

 <div  class="container-fluid  table-responsive-sm">

<div style="display: flex; align-items: center;" >
<h2 style="flex: 1;">SDC Master</h2>
<div class="btn-group" style="text-align: right;">

{{-- <a href="" class="btns btn-sm"><i class="fas fa-search" title="Find"></a> --}}
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
     @foreach ($users as $key => $user)
    <tr>
        {{-- {{$user->SDC_id}} --}}
        <td>{{ $divNames[$key] }}</td>
        <td>{{ $SubdivNames[$key] }}</td>
        <td>{{ $user->designation }}</td>
        <td>{{ $user->period_from }}</td>
        <td>{{ $user->period_upto }}</td>
        <td>{{ $user->phone_no }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->username }}</td>

        <td>
            {{-- <div class="button-container"> --}}
                <a href="{{ url('viewSdc/' . $user->SDC_id) }}" class="btn btn-info btn-sm btn-flat me-1">
                    <i class="fas fa-eye" title="View"></i>
                </a>
            </td>
            <td>
                <a href="{{ url('editSDCengineer/' . $user->SDC_id) }}" class="btn btn-primary btn-sm btn-flat me-1">
                    <i class="fa fa-pencil" title="Edit"></i>
                </a>

            </td>  <td><form method="POST" action="{{ route('deletesdc', ['SDC_id' => $user->SDC_id]) }}">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-flat btn-sm show-alert-delete-box" data-toggle="tooltip" title='Delete'>
                        <i class="fas fa-trash" title="Delete"></i>
                    </button>
                </form>
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
