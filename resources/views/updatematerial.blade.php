@extends('layouts.header')

@section('content')


<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $workid ?? '') }}">Bill</a></li>
        </ul>
        
          <a href="{{ url('billlist', $workid ?? '')}}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a>

@include('sweetalert::alert')

<div class="card" id="backbglogo" >
                <div class="card-header">

                        <h3>Material Consumption</h3>
                </div>
<div class="container-fluid " style="margin-top: 20px;"> <!-- Increased container width using Bootstrap's 'container-xl' -->
<form action="" method="POST" class="row">  
@csrf
        <div class="col-md-1 form-group">
            <label for="sr_no"><strong>SR No:</strong></label> <!-- Bold label -->
            <input type="text" name="sr_no" id="sr_no" value="{{ $cons_mdatafirst->sr_no }}"class="form-control" disabled>

        </div>

        <div class="col-md-3 form-group">
            <label for="material"><strong>Material:</strong></label> <!-- Bold label -->
            <select name="material" id="material" class="form-control">
                <!-- Options for Material dropdown -->
                @foreach($cons_mdata as $consdata)

                    <option value="{{ $consdata->b_mat_id }}">{{ $consdata->material }}</option>
                <!-- Add more options as needed -->
                @endforeach

            </select>
        </div>


        <div class="col-md-3 form-group">
            <label for="total_theoretical_quantity"><strong>Total Theoretical Quantity:</strong></label> <!-- Bold label -->
            <input type="text" name="total_theoretical_quantity" id="total_theoretical_quantity" value="{{ $cons_mdatafirst->tot_t_qty }}.{{ $cons_mdatafirst->mat_unit }}" class="form-control text-right" disabled>
        </div>

        <div class="col-md-3 form-group">
            <label for="total_actual_quantity"><strong>Total Actual Quantity:</strong></label> <!-- Bold label -->
            <input type="text" name="total_actual_quantity" id="total_actual_quantity" value="{{ $cons_mdatafirst->tot_a_qty }}{{ $cons_mdatafirst->mat_unit }}" class="form-control text-right" disabled>
        </div>

        <div class="col-md-2 form-group">
            <label for="material_unit"><strong>Material Unit:</strong></label> <!-- Bold label -->
            <input type="text" name="material_unit" id="material_unit" value="{{ $cons_mdatafirst->mat_unit }}"class="form-control" disabled>
        </div>


        </form>    
</div>






<div class="card-body">
 <div class="table-responsive">
    <table class="table table-bordered table-striped" id="additional-material-table">
        <thead>
            <tr class="table-success">
                <th>Item No</th>
                <th>Description of item</th>
                <th>Uptodate Quantity</th>
                <th>theo.consumption per unit</th>
                <th>theo.Material Quantity</th>
                <th>Actual consumption per unit</th>
                <th>Actual_Material Quantity</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
        @foreach($additionalMaterialData as $editmaterial)
            <tr>
             
               <td>{{$editmaterial->t_item_no}}{{$editmaterial->sub_no}}</td>
               <td>{{$editmaterial->exs_nm}}</td>
               <td>{{$editmaterial->exec_qty}}</td>
               <td>{{$editmaterial->pc_qty}}</td>
               <td>{{$editmaterial->mat_qty}}</td>
               <td>{{$editmaterial->A_pc_qty}}</td>
               <td>
                    <input type="text" name="A_mat_qty[]" class="form-control" value="{{$editmaterial->A_mat_qty}}">
                </td>
                <td>
                    <textarea name="remark[]" class="form-control" rows="3">{{$editmaterial->remark}}</textarea>
                </td>
                <td>
                <button type="button" class="btn btn-primary btn-update" data-b_mat_d_id="{{$editmaterial->b_mat_d_id}}">Update</button>
                </td>
             
            </tr>
            @endforeach
                        <tr>
                <td colspan="9">
                    <form action="{{url('CloseMaterialconsumption')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$tbillid}}" name="tbillid">
                        <input type="hidden" value="{{$workid}}" name="workid">
                        <button type="submit" name="action" value="CloseMaterial" class="btn btn-primary">Close</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
</form>    
<script>

 $(document).ready(function() {
        $('#material').on('change', function() {
            let selectedMaterialId = $(this).val();
            // Make an AJAX request to fetch data based on the selected material ID
            $.ajax({
                url: '/fetch-material-data', // Replace with your endpoint
                method: 'GET',
                data: { material_id: selectedMaterialId },
                success: function(response) {
                    var matdataedit=response.additional_material_data;
                    var materialdata=response.master_material_data;

                   

                    // Update the fields with fetched data
                    $('#material_unit').val(materialdata.mat_unit);
                    $('#total_theoretical_quantity').val(materialdata.tot_t_qty);
                    $('#total_actual_quantity').val(materialdata.tot_a_qty);
                    $('#sr_no').val(materialdata.sr_no);
                    
               // Populate the table with additional material data
               var tableBody = $('#additional-material-table tbody');
    tableBody.empty(); // Clear existing rows

    // Loop through the additional material data and create table rows
    matdataedit.forEach(function(item) {
        console.log(item.exec_qty);
        var itemSubNo = item.sub_no ? item.t_item_no + '' + item.sub_no : item.t_item_no;
                    
        var newRow = '<tr>' +
    '<td>' + itemSubNo + '</td>' +
    '<td>' + item.exs_nm + '</td>' +
    '<td>' + item.exec_qty + '</td>' +
    '<td>' + item.pc_qty + '</td>' +
    '<td>' + item.mat_qty + '</td>' +
    '<td>' + item.A_pc_qty + '</td>' +
    '<td><input type="text" name="A_mat_qty[]" class="form-control" value="' + item.A_mat_qty + '"></td>';

if (item.remark === null) 
{
    newRow += '<td><textarea name="remark[]" class="form-control" rows="3"></textarea></td>';
} 
else 
{
    newRow += '<td><textarea name="remark[]" class="form-control" rows="3">' + item.remark + '</textarea></td>';
}

newRow += '<td><button type="button" class="btn btn-primary btn-update" data-b_mat_d_id="'+ item.b_mat_d_id +'">Update</button></td>' +
    '</tr>';
        tableBody.append(newRow);
    });


        var closeBtnRow = '<tr>' +
            '<td colspan="9">' +
            '<form action="{{url('CloseMaterialconsumption')}}" method="post">' +
            '@csrf' +
            '<input type="hidden" value="{{$tbillid}}" name="tbillid">' +
            '<input type="hidden" value="{{$workid}}" name="workid">' +
            '<button type="submit" name="action" value="CloseMaterial" class="btn btn-primary">Close</button>' +
            '</form>' +
            '</td>' +
            '</tr>';

        tableBody.append(closeBtnRow);

            },
            error: function(xhr) 
            {
                console.error(xhr.responseText);
            }
        });
    });
});
    


//update the 

$('#additional-material-table').on('click', '.btn-update', function() {
        var row = $(this).closest('tr');
        var b_mat_d_id = $(this).data('b_mat_d_id'); 
        var rowData = {
            t_item_no: row.find('td:nth-child(1)').text(),
            exs_nm: row.find('td:nth-child(2)').text(),
            exec_qty: row.find('td:nth-child(3)').text(),
            pc_qty: row.find('td:nth-child(4)').text(),
            mat_qty: row.find('td:nth-child(5)').text(),
            A_pc_qty: row.find('td:nth-child(6)').text(),
            A_mat_qty: row.find('input[name="A_mat_qty[]"]').val(),
            remark: row.find('textarea[name="remark[]"]').val(),
            b_mat_d_id: b_mat_d_id,
            // Add other columns' data as needed
        };

        // Make an AJAX request to send row data to the controller
        $.ajax({
            url: '/updatematqty',
            method: 'POST',
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            data: rowData,
            success: function(response) {
                console.log(response);
                // Handle success response from the controller if needed

                var matdataedit=response.mateditdata;
                    var materialdata=response.matdata;

                   

                    // Update the fields with fetched data
                    $('#material_unit').val(materialdata.mat_unit);
                    $('#total_theoretical_quantity').val(materialdata.tot_t_qty);
                    $('#total_actual_quantity').val(materialdata.tot_a_qty);
                    $('#sr_no').val(materialdata.sr_no);
                    
                    var tableBody = $('#additional-material-table tbody');
    tableBody.empty(); // Clear existing rows

    // Loop through the additional material data and create table rows
    matdataedit.forEach(function(item) {
        var itemSubNo = item.sub_no ? item.t_item_no + '' + item.sub_no : item.t_item_no;
                    
        var newRow = '<tr>' +
    '<td>' + itemSubNo + '</td>' +
    '<td>' + item.exs_nm + '</td>' +
    '<td>' + item.exec_qty + '</td>' +
    '<td>' + item.pc_qty + '</td>' +
    '<td>' + item.mat_qty + '</td>' +
    '<td>' + item.A_pc_qty + '</td>' +
    '<td><input type="text" name="A_mat_qty[]" class="form-control" value="' + item.A_mat_qty + '"></td>';

if (item.remark === null) {
    newRow += '<td><textarea name="remark[]" class="form-control" rows="3"></textarea></td>';
} else {
    newRow += '<td><textarea name="remark[]" class="form-control" rows="3">' + item.remark + '</textarea></td>';
}

newRow += '<td><button type="button" class="btn btn-primary btn-update" data-b_mat_d_id="'+ item.b_mat_d_id +'">Update</button></td>' +
    '</tr>';

        tableBody.append(newRow);
    });

         // Append the "Close" button after populating the table rows
         var closeBtnRow = '<tr>' +
            '<td colspan="9">' +
            '<form action="{{url('CloseMaterialconsumption')}}" method="post">' +
            '@csrf' +
            '<input type="hidden" value="{{$tbillid}}" name="tbillid">' +
            '<input type="hidden" value="{{$workid}}" name="workid">' +
            '<button type="submit" name="action" value="CloseMaterial" class="btn btn-primary">Close</button>' +
            '</form>' +
            '</td>' +
            '</tr>';

        tableBody.append(closeBtnRow);

                Swal.fire({
                    title: 'Success!',
                    text: 'Material data updated successfully',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    // Optional: Redirect or perform other actions after the user clicks OK
                    if (result.isConfirmed) {
                        // Example: Redirect to a specific URL
                       
                    }
                });
            
            },
            error: function(xhr) {
                // Handle error response if needed
            }
        });
    });


    </script>

@endsection
