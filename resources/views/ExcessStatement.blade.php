
@extends("layouts.header")
@section('content')

        <ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $workid ?? '') }}">Bill</a></li>
            <li><a href="{{ url('ExcessStatement', $tbiilid ?? '') }}">Excess Saving</a></li>

        </ul>
        
        <a href="{{ url('billlist', $workid ?? '')}}" id="backButton" style="margin-bottom:10px;">
                    <i class="fa fa-chevron-left" aria-hidden="true"> </i>  
                             <b>Back</b>
        </a>

        <div class="card" id="backbglogo" >
                            <div class="card-header" >
                                    <h3>EXCESS SAVING STATEMENT</h3>
                            </div>
                                            <!-- <h5>Name of Work: {{$DBWorkName}}</h5> -->
                            <div class="container-fluid">
                                <div class="row mt-2">
                                            <div class="col-md-4 form-group">
                                                    <span style="font-weight: bold; font-size: 20px;">
                                                        Bill No: 
                                                        {{ app('App\Helpers\CommonHelper')->formatTItemNo($DBTbillNO->t_bill_No) }}
                                                        {{ app('App\Helpers\CommonHelper')->getBillType($DBTbillNO->final_bill) }}
                                                        <input type="hidden" name="tbillid" value="{{ $tbiilid }}">
                                                        <input type="hidden" name="tbillid" value="{{ $workid }}">
                                                    </span>
                                            </div>
                                            <div class="col-md-1 form-group">
                                                                                <b>Name of Work: </b>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                                                            <textarea style="width: 100%;" class="form-control">{{$DBWorkName}}</textarea>
                                            </div>
                
                                </div> 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                        <table class="table table-bordered table-striped">
                                                        <thead class="custom-header">
                                                                <tr class="table-success text-center" style="border: 1px solid black;">

                                                                                            <th>Sr.</th>
                                                                                            <th>Item of Work</th>
                                                                                            <th>Unit</th>
                                                                                            <th>Tendered Quantity</th>
                                                                                            <th>Tendered Rate</th>
                                                                                            <th>Tendered Amount</th>
                                                                                            <th>Update Quantity</th>
                                                                                            <th>Bill Rate</th>
                                                                                            <th>Upto Date Amount</th>

                                                                                            <th colspan="2" class="text-center">EXCESS</th>
                                                                                            <th colspan="2" class="text-center">SAVING</th>
                                                                                            <th>Remark</th>
                                                                </tr>

                                                                <tr class="table-success" style="border: 1px solid black;">
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th>Quantity</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Quantity</th>
                                                                                    <th>Amount</th>
                                                                                    <th></th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                    @forelse($tndItems as $item)
                                                                        <tr>
                                                                            <td style="text-align:right;">{{ $item->t_item_no . $item->sub_no }}</td>
                                                                            <td style="width: 350px;">{{ $item->exs_nm }}</td>
                                                                            <td>{{ $item->item_unit }}</td>
                                                                            <td style="text-align: right;">{{ $item->tnd_qty }}</td>
                                                                            <td style="text-align:right;">{{ $item->tnd_rt }}</td>
                                                                            <td style="text-align:right;">{{ $item->t_item_amt }}</td>
                                                                            <td style="text-align:right;">{{ $item->exec_qty }}</td>
                                                                            <td style="text-align:right;">{{ $item->bill_rt }}</td>
                                                                            <td style="text-align:right;">{{ $item->b_item_amt }}</td>
                                                                            <td style="text-align:right;">{{ number_format($excessQuantities[$item->b_item_id] ?? 0, 3) }}</td>
                                                                            <td style="text-align:right;">{{ number_format($excessAmounts[$item->b_item_id] ?? 0, 2) }}</td>
                                                                            <td style="text-align:right;">{{ number_format($savingQuantities[$item->b_item_id] ?? 0, 3) }}</td>
                                                                            <td style="text-align:right;">{{ number_format($savingAmounts[$item->b_item_id] ?? 0, 2) }}</td>

                                                                            <td>
                                                                                    <input type="hidden" name="b_item_ids[]" value="{{ $item->b_item_id }}">
                                                                                    <textarea name="remarks[{{ $item->b_item_id }}]" rows="4" cols="20" placeholder="Enter your remark here" style="width: 400px;">{{$item->exsave_Remks}}</textarea>
                                                                            </td>

                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="14">No data available</td>
                                                                        </tr>
                                                                    @endforelse
                                                                            <tr >
                                                                                <th colspan="2">Total Tendered Amount Rs.</th>
                                                                                <th  colspan="5">Total Excess Amount Rs.</th>
                                                                                <th colspan="5">Total Saving Amount Rs.</th>
                                                                                <th colspan="4" >Net Effect Rs.</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                    <input type="text" class="form-control" value="{{ $totalTItemAmt }}" readonly>
                                                                                </td>
                                                                                <td colspan="5">
                                                                                    <input type="text" class="form-control" value="{{ $totalExcessAmount }}" readonly>
                                                                                </td>
                                                                                <td colspan="5">
                                                                                    <input type="text" class="form-control" value="{{ $totalSavingAmount }}" readonly>
                                                                                </td>
                                                                                <td colspan="4">
                                                                                    <input type="text" class="form-control" value="{{ $netEffect }}" readonly>
                                                                                </td>
                                                                            </tr>

                                                        </tbody>
                                        </table>




                                                            <!-- <div class="container-fluid mt-3">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Total Tendered Amount Rs.</th>
                                                                            <th>Total Excess Amount Rs.</th>
                                                                            <th>Total Saving Amount Rs.</th>
                                                                            <th>Net Effect Rs.</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="text" class="form-control" value="{{ $totalTItemAmt }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" value="{{ $totalExcessAmount }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" value="{{ $totalSavingAmount }}" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" value="{{ $netEffect }}" readonly>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div> -->

                                        <div>
                                                {{ $tndItems->links('pagination::bootstrap-4') }}
                                        </div>
                                </div>


                                    <!-- //save remark going to  form action=""//  -->
                                    <!-- <button type="submit" class="btn btn-primary" value="Submit">Submit</button> -->
                                    <form action ="{{ url('RouteCloseRecovery') }}" method="post" >
                                                    @csrf
                                                    <input type="hidden"  name="workid" value="{{ $workid }}">
                                                    <input type="hidden" name="tbiilid"   value="{{ $tbiilid }}">
                                                    <button type="submit"  class="btn btn-primary">Close</button>
                                    </form>
                                    <!-- </form> -->
                            </div>
                                    <!-- //cardbody div -->
        </div>
                                        <!-- //cardbody div -->

                                            <!-- //card div -->
                                <!-- //card div -->

                    <br>



<!-- Add this script after including jQuery -->
<script>
    // Wait for the DOM to be ready
    console.log('jQuery is loaded');
    $(document).ready(function() {
        // Attach a focus event handler to all textareas with the name attribute starting with "remarks"

// Attach a focusout event handler to all textareas with the name attribute starting with "remarks"
$('textarea[name^="remarks"]').on('focusout', function() {
    var remarkValue = $(this).val();
    var tbiilid = $('input[name="tbillid"]').val();

    var bItemId = $(this).attr('name').match(/\d+/)[0];
    console.log('Current Value:', remarkValue);
    console.log('b_item_id:', bItemId);
    console.log('tbillid:', tbiilid);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
// remark message display 
    
    $.ajax({
        url: '/saveremark/' + tbiilid,
        type: 'POST',
        data: {
            b_item_id: bItemId,
            remark: remarkValue,
            tbiilid:tbiilid,
            _token: csrfToken,
        },
        success: function(response) {
            // Handle success if needed
            console.log(response);

            Swal.fire({
    icon: 'success',
    title: 'Update Successful',
    text: 'The update was successful!',
    showConfirmButton: false,
    timer: 600 // Set the duration in milliseconds (e.g., 3000 for 3 seconds)
});

},
        
        error: function(error) {
            // Handle error if needed
            console.error(error);
        },
    });
});
});
</script>



@endsection()

