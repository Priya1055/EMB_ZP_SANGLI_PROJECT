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

<h3>Royalty Charges</h3>
@include('sweetalert::alert')

<div class="container-fluid border border-primary rounded p-4" style="margin-top: 20px;"> <!-- Increased container width using Bootstrap's 'container-xl' -->
<form action="" method="POST" class="row">  
@csrf
        <div class="col-md-1 form-group">
            <label for="sr_no"><strong>SR No:</strong></label> <!-- Bold label -->
            <input type="text" name="sr_no" id="sr_no" value="{{ $royalmfirst->sr_no }}"class="form-control" disabled>

        </div>

        <div class="col-md-3 form-group">
            <label for="material"><strong>Material:</strong></label> <!-- Bold label -->
            <select name="material" id="material" class="form-control">
                <!-- Options for Material dropdown -->
                @foreach($royalm as $consdata)

                    <option value="{{ $consdata->b_mat_id }}">{{ $consdata->material }}</option>
                <!-- Add more options as needed -->
                @endforeach

            </select>
        </div>


        <div class="col-md-2 form-group">
            <label for="total_theoretical_quantity"><strong>Total Material Quantity:</strong></label> <!-- Bold label -->
            <input type="text" name="total_theoretical_quantity" id="total_theoretical_quantity" value="{{ $royalmfirst->tot_m_qty }}.{{ $royalmfirst->mat_unit }}" class="form-control text-right" disabled>
        </div>

        <div class="col-md-2 form-group">
            <label for="material_unit"><strong>Material Unit:</strong></label> <!-- Bold label -->
            <input type="text" name="material_unit" id="material_unit" value="{{ $royalmfirst->mat_unit }}"class="form-control" disabled>
        </div>

        <div class="col-md-2 form-group">
            <label for="royaltyrate"><strong>Royalty rate:</strong></label> <!-- Bold label -->
            <input type="text" name="royaltyrate" id="royaltyrate" value="{{ $royalmfirst->royal_rt }}" class="form-control text-right" disabled>
        </div>

        <div class="col-md-2 form-group">
            <label for="royaltyamount"><strong>Royalty Amount:</strong></label> <!-- Bold label -->
            <input type="text" name="royaltyamount" id="royaltyamount" value="{{ $royalmfirst->royal_amt }}"class="form-control text-right" disabled>
        </div>


        </form>    
</div>






<div class="container-fluid border border-primary rounded p-4" style="margin-top: 20px;">
    <table class="table" id="additional-material-table">
        <thead>
            <tr class="table-success">
                <th>Item No</th>
                <th>Description of item</th>
                <th>Uptodate Quantity</th>
                <th>theo.consumption per unit</th>
                <th>theo.Material Quantity</th>
              
            </tr>
        </thead>
        <tbody >
        @foreach($royaldfirst as $editmaterial)

            <tr>
            @if($editmaterial->sub_no == 0 || $editmaterial->sub_no == null || $editmaterial->sub_no == undefined)
        <td>{{$editmaterial->t_item_no}}</td>
    @else
        <td>{{$editmaterial->t_item_no}}{{$editmaterial->sub_no}}</td>
    @endif
               <td>{{$editmaterial->exs_nm}}</td>
               <td class="text-right">{{$editmaterial->exec_qty}}</td>
               <td class="text-right">{{$editmaterial->pc_qty}}</td>
               <td class="text-right">{{$editmaterial->mat_qty}}</td>
             
            </tr>
            @endforeach

            <tr>
                <td colspan="9">
                    <form action="{{url('CloseMaterialconsumption')}}" method="post" >
                        @csrf
                        <input type="hidden" name="workid" value="{{ $workid }}">
                        <input type="hidden" name="tbillid" value="{{ $tbillid }}"> 
                        <button type="submit" name="action" value="CloseRoyalty" class="btn btn-primary">Close</button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
</div>


</form>    


<script>
     $(document).ready(function() {
        $('#material').on('change', function() {
            let selectedMaterialId = $(this).val();
            // Make an AJAX request to fetch data based on the selected material ID
            $.ajax({
                url: '/fetch-Royal-data', // Replace with your endpoint
                method: 'GET',
                data: { material_id: selectedMaterialId },
                success: function(response) {
                    var matdataedit=response.additional_material_data;
                    var materialdata=response.master_material_data;

                   

                    // Update the fields with fetched data
                    $('#material_unit').val(materialdata.mat_unit);
                    $('#total_theoretical_quantity').val(materialdata.tot_m_qty+'.'+materialdata.mat_unit);
                    // $('#total_actual_quantity').val(materialdata.tot_a_qty);
                    $('#sr_no').val(materialdata.sr_no);
                    $('#royaltyrate').val(materialdata.royal_rt);
                    $('#royaltyamount').val(materialdata.royal_amt);
               // Populate the table with additional material data
               var tableBody = $('#additional-material-table tbody');
    tableBody.empty(); // Clear existing rows

    // Loop through the additional material data and create table rows
    matdataedit.forEach(function(item) {
        console.log(item.exec_qty);
        var itemSubNo;

if (item.sub_no == 0 || item.sub_no == null || item.sub_no == undefined) {
    itemSubNo = item.t_item_no;
} else {
    itemSubNo = item.t_item_no + '' + item.sub_no;
}                    console.log(item.sub_no);
        var newRow = '<tr>' +
    '<td>' + itemSubNo + '</td>' +
    '<td>' + item.exs_nm + '</td>' +
    '<td>' + item.exec_qty + '</td>' +
    '<td>' + item.pc_qty + '</td>' +
    '<td>' + item.mat_qty + '</td>' +
    
    '</tr>';
        tableBody.append(newRow);
    });
    
            var closebutton='<tr>'+
                '<td colspan="9">'+
                    '<form action="{{url('CloseMaterialconsumption')}}" method="post" >'+
                        '@csrf'+
                        '<input type="hidden" name="workid" value="{{ $workid }}">'+
                        '<input type="hidden" name="tbillid" value="{{ $tbillid }}">'+
                        '<button type="submit" name="action" value="CloseRoyalty" class="btn btn-primary">Close</button>'+
                    '</form>'+
                '</td>'+
            '</tr>';
            tableBody.append(closebutton);

            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
});
    

</script>
@endsection