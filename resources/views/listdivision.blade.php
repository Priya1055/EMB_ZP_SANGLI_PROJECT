
 <style>
 .custom-btn {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin-right: 10px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
    margin-right: 5px;
    background-color: #3e8e41; /* Active Green */
    outline: none;
    /* box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.2); */
    margin-right: 5px; /* Adjust the spacing between the icon and text */

}



@font-face {
        font-family: myFirstFont !important;
        src: url('/public/fonts/DV-TTSurekhEN-Normal.ttf') !important;
    }

    .ISMinput {
        font-family: myFirstFont !important;
    }
 </style>

@extends('layouts.header')

@section('content')


<br>
<br>
<br>


    <div class="container-fluid mt-3  table-responsive-sm">

    <div style="display: flex; align-items: center;">
  <h2 style="flex: 1;"> Division List </h2>
  <div class="btn-group" style="text-align: right;">
    <!-- <a href="{{ url('division') }}" class="btns btn-sm">NEW</a> -->
                    <a href="{{ url('#') }}" class="btn btn-sm" style="background-color: orange; color: white;">
                    <i class="fas fa-search" title="Find"></i>
                </a>
  </div>
</div>

     <table class="table table-striped  table-hover">
         <tr>
            <th>Region</th>
            <th>Circle</th>
            <th>Division name</th>
            <th>Address 1</th>
            <th>Address 2</th>
            <th>Place</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Designation</th>
            <th>Settings</th>
         </tr>
         @foreach ($users as $user)
         <tr >
            <td> {{ $user->Region }}</td>
            <td>{{ $user->Circle }}</td>
            <td>{{ $user->div}}</td>
            <td>{{ $user->address1 }}</td>
            <td>{{ $user->address2 }}</td>
            <td>{{ $user->place }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phoneno }}</td>
            <td>{{ $user->designation }}</td>
            <td>
               <div class="btn-group">

{{-- <a href="{{ url('view_division/'.$user->div_id) }}" class="btns  btn-sm btn-flat custom-btn"><i class="fas fa-eye"></i></a>
<a href="{{ url('editdivision/' . $user->div_id) }}" class="btns  btn-sm btn-flat custom-btn"><i class="fas fa-edit"></i></a>
<button type="submit" class="btns btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button> --}}
<a href="{{ url('view_division/'.$user->div_id) }}" class="btn btn-info btn-sm btn-flat custom-btn" title="View"><i class="fas fa-eye"></i></a>
<a href="{{ url('editdivision/' . $user->div_id) }}" class="btns btn-primary btn-sm btn-flat custom-btn" title="Edit"><i class="fas fa-edit"></i></a>



<form method="POST" action="{{ route('delete_division', $user->div_id) }}">
    @csrf
    @method('DELETE')
    {{-- <button type="submit" class="btns btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button> --}}
</form>
<button type="submit" class="btns btn-sm btn-flat custom-btn btn-danger show-alert-delete-box" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>


               </div>
            </td>
         </tr>
         @endforeach
      </table>
      </div>

<!-- confirm-delete.blade.php -->
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

