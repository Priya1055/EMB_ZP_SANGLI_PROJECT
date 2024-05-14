
    <style>
   .btn{
      margin-right:10px;
   }

     /* header */

/* new find btn */
.btns{
  background: #04AA6D;
  margin-right:10px;
  color: white;

}
 </style>


@extends('layouts.header')

@section('content')


<br>
<br>
<br>



 <div class="container-fluid mt-3  table-responsive-sm">

<div style="display: flex; align-items: center;">
<h2 style="flex: 1;"> Fundhead List</h2>
<div class="btn-group" style="text-align: right;">

  <a href="{{ url('fundhead') }}" class="btn btn-sm btn-success"><i class="fas fa-plus" title="New"></i></a>

  <a href="{{ url('#') }}" class="btn btn-sm" style="background-color: orange; color: white;">
    <i class="fas fa-search" title="Find"></i>
</a>
</div>
</div>

 <table class="table table-striped  table-hover">
     <tr>
        <th>Fund Head Code</th>
        <th>Fund Head</th>
        <th>Fund Head <sub>marathi</sub> </th>
        <th colspan='3' style="text-align:center">Action</th>
     </tr>
     @foreach ($listfundhead as $dsfh)
     <tr >
        <td>{{ $dsfh->F_H_CODE }}</td>
        <td>{{ $dsfh->Fund_Hd }}</td>
        <td>{{ $dsfh->Fund_Hd_M }}</td>


            <td>
            <a href="{{ url('view_fundhead/' . $dsfh->F_H_CODE) }}" class="btn btn-info btn-sm"><i class="fas fa-eye" title="View"></i></a>
            </td>
            <td>
           <a href="{{ url('editfundhead/' . $dsfh->F_H_CODE) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" title="Edit"></i></a>
            </td>
            <td>
        <form method="POST" action="{{ route('deletefundhead', $dsfh->F_H_CODE) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash" title="Delete"></i></button>
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
