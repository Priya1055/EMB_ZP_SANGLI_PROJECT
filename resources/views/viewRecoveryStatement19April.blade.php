@extends("layouts.header")
@section('content')
<style>
  .custom-modal {
    max-width: 50%;
}
</style>

<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $workid ?? '') }}">Bill</a></li>
        </ul>

<a href="{{ url('billlist', $workid ?? '')}}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a>

    <!-- <h3> Recovery statement</h3>
    <br> -->
    <h3 style="font-weight: bold; text-align: center; margin-top: 10px;">Recovery Statement</h3>
<div class="container-fluid">


@if ($countDBrecoveriesGet == 0)
<form action="{{ url('billitemrecordinsert') }}" method="post">
    @csrf
    
    <input type="hidden" name="workid" value="{{ $workid }}">
    <input type="hidden" name="tbiilid" value="{{ $tbiilid }}">
    <button type="submit"class="btn btn-primary" style="margin-left: 20px;">New</button>
</form>
@else
        <div>
        <input type="hidden" name="tbiilid" value="{{ $tbiilid }}">
            <a href="#" class="btn btn-primary" style="margin-left: 20px;" data-toggle="modal" data-target="#myModal" >New</a>
        </div>
@endif


  <br>
<input type="hidden" name="workid" value="{{ $workid }}">
<input type="hidden" name="tbiiiid" value="{{ $tbiilid }}">

<table class="table table-bordered table-striped">
<thead class="custom-header">
        <tr class="table-success text-center" style="border: 1px solid black;">

      <th>Sr.</th>
      <th>Material</th>
      <th colspan="3" class="text-center">As per Tender (Schedule-A)</th>
      <th colspan="2" class="text-center">Up-to-date Issue </th>
      
      <th colspan="2" class="text-center">AlReady Recovered</th>

      <th colspan="2" class="text-center" id="proposed-recovered-now">Proposed to be  recovered Now</th>
      <th colspan="2" class="text-center">Balance to be Recovered</th>
      <th>Remark</th>
      <th>Action</th>
    </tr>

    <tr class="table-success" style="border: 1px solid black;">
                  <th></th>
                  <th></th>
                  <th >Quantity</th>
                  <th>Rate</th>
                  <th>Amount</th>
                  <th >Quantity</th>
                  <th>Amount</th>
                  <th >Quantity</th>
                  <th>Amount</th>
                  <th >Quantity</th>
                  <th>Amount</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                  <th></th>
                  <th></th>

</tr>
  </thead>
  <tbody id="recovery_tbody">
  @foreach($DBrecoveriesGet as $item)
        <tr>
        <input type="hidden" value="{{ $item->unique_id }}" name="unique_id[]" id="unique_id">
            <td style="text-align:right;">{{ $item->Sr_no }}</td>
            <td style="width: 750px;">{{ $item->Material }}</td>
            <!-- <td style="width: 100px; text-align:right">{{ $item->Mat_Qty}}</td>
            <td style="width: 100px; text-align:right">{{ $item->Mat_Rt}}</td>
            <td style="width: 100px; text-align:right">{{ $item->Mat_Amt}}</td>

            <td style="width: 100px; text-align:right">{{ $item->UptoDt_m_Qty}}</td>
            <td style="width: 100px; text-align:right">{{ $item->UptoDt_m_Amt}}</td>

            <td style="width: 100px; text-align:right">{{ $item->pre_m_Qty }}</td>
            <td style="width: 100px; text-align:right">{{ $item->pre_M_Amt}}</td>

            <td style="width: 100px; text-align:right" >{{ $item->Cur_M_Qty}}</td>
            <td style="width: 100px; text-align:right" class="proposed-recovered-now-amount" data-unique-id="{{ $item->unique_id }}" id="proposed-recovered-now-row-{{ $item->unique_id }}">{{ $item->Cur_M_Amt}}</td>

            <td style="width: 100px; text-align:right">{{ $item->Bal_M_Qty}}</td>
            <td style="width: 100px; text-align:right">{{ $item->Bal_M_Amt}}</td> -->

        <td style="width: 100px; text-align:right">{{ isset($item->Mat_Qty) ? $item->Mat_Qty : '0.00' }}</td>
        <td style="width: 100px; text-align:right">{{ isset($item->Mat_Rt) ? $item->Mat_Rt : '0.00' }}</td>
        <td style="width: 100px; text-align:right">{{ isset($item->Mat_Amt) ? $item->Mat_Amt : '0.00' }}</td>

        <td style="width: 100px; text-align:right">{{ isset($item->UptoDt_m_Qty) ? $item->UptoDt_m_Qty : '0.00' }}</td>
        <td style="width: 100px; text-align:right">{{ isset($item->UptoDt_m_Amt) ? $item->UptoDt_m_Amt : '0.00' }}</td>

        <td style="width: 100px; text-align:right">{{ isset($item->pre_m_Qty) ? $item->pre_m_Qty : '0.00' }}</td>
        <td style="width: 100px; text-align:right">{{ isset($item->pre_M_Amt) ? $item->pre_M_Amt : '0.00' }}</td>

        <td style="width: 100px; text-align:right">{{ isset($item->Cur_M_Qty) ? $item->Cur_M_Qty : '0.00' }}</td>
        <td style="width: 100px; text-align:right" class="proposed-recovered-now-amount" data-unique-id="{{ $item->unique_id }}" id="proposed-recovered-now-row-{{ $item->unique_id }}">{{ isset($item->Cur_M_Amt) ? $item->Cur_M_Amt : '0.00' }}</td>

        <td style="width: 100px; text-align:right">{{ isset($item->Bal_M_Qty) ? $item->Bal_M_Qty : '0.00' }}</td>
        <td style="width: 100px; text-align:right">{{ isset($item->Bal_M_Amt) ? $item->Bal_M_Amt : '0.00' }}</td>

            <td style="width: 650px;">{{ $item->Remark}}</td>
            <td>
 <a href="#" class="btn btn-primary" onclick="openviewModel('{{ $item->unique_id }}', '{{ $tbiilid }}')" data-toggle="modal" data-target="#ViewModal{{ $item->unique_id }}" data-item-id="{{ $item->unique_id }}" data-tbillid="{{ $tbiilid }}" style="margin-bottom: 10px; text-align: right;">
    <i class="fa fa-eye custom-icon" aria-hidden="true"></i>
</a>

<a href="#" class="btn btn-primary " onclick="openUpdateModal('{{ $item->unique_id }}', '{{ $tbiilid }}')" data-item-id="{{ $item->unique_id }}" data-tbillid="{{ $tbiilid }}" style="margin-bottom: 10px; text-align: right;">
    <i class="fa fa-pencil" style="color:white;"></i>
</a>

                <!-- Delete Button -->
                <button class="btn btn-lg btn-danger btn-flat show-alert-delete-box btn-sm" style="width: 70px;" data-target="#DeleteConfirmModal" onclick="confirmDelete('{{ $item->unique_id }}', '{{ $tbiilid }}')">
    <i class="fa fa-trash" aria-hidden="true"></i>
</button>
        
        </td>
</tr>

<!-- Update Model -->
<form action="{{url('UpdateRecovery')}}" method="post" id="UpdateRecoveryForm" class="update-recovery-form">
    @csrf<!-- //when new button click that time open model -->
<input type="hidden" name="workid" id="workid" value="{{ $workid }}">
<input type="hidden" name="tbillid" value="{{ $tbiilid }}">
<!-- <input type="hidden" name="unique_id" class="update-unique-id" > -->
<!-- <h3>update</h3> -->
<div class="modal fade" id="UpdateModal{{ $item->unique_id }}">
        <div class="modal-dialog custom-modal">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Recovery</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Add your content for the modal body here -->
                <!-- For example, you can add a form or any other HTML content -->
                <div class="row mt-3"> <!-- Adding margin top (mt-3) for some spacing -->
    <label for="textareaField" class="col-form-label col-md-2 ml-5  font-weight-bold">Material :</label>
    <div class="col-md-8 mb-5">
    <input type="text" name="unique_id" id="unique_id_{{ $item->unique_id }}" value="{{ $item->unique_id }}">
        <textarea class="form-control" id="UpdateMaterial{{$item->unique_id}}" name="UpdateMaterial" rows="4" placeholder="Enter text..."></textarea>
    </div>
</div>


<!-- <div class="row mt-3"> -->
<h5 class="table-success">As per Tender:</h5>
<!-- </div> -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control UpdateAsperQty" onchange="calculateAmount('{{ $item->unique_id }}')" id="UpdateAsperQty{{ $item->unique_id }}" name="UpdateAsperQty"  placeholder="Enter Quantity...">        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Rate:</label>
            <input type="text" class="form-control updateAsperRt" onchange="calculateAmount('{{ $item->unique_id }}')" id="updateAsperRt{{ $item->unique_id }}" name="updateAsperRt" placeholder="Enter Rate..."  >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control UpdateAsperAmt" id="UpdateAsperAmt{{ $item->unique_id }}" name="UpdateAsperAmt" placeholder="Enter Amount...">
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Up-to-date Issue:</h5>
</div>
    <!-- Subheading with Quantity, Rate, and Amount -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control Update_uptodateQty"  onchange="calculateUptodateAmount('{{ $item->unique_id }}');calculateProposedAmount('{{ $item->unique_id }}');calculateBalancedAmount('{{ $item->unique_id }}')"  id="Update_uptodateQty{{ $item->unique_id }}" name="Update_uptodateQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control Update_UptodateAmt" id="Update_UptodateAmt{{ $item->unique_id }}" name="Update_UptodateAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Already Recovered:</h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control Update_allreadyQty" onchange="calculateAllreadyAmount('{{ $item->unique_id }}');calculateProposedAmount('{{ $item->unique_id }}');calculateBalancedAmount('{{ $item->unique_id }}')" id="Update_allreadyQty{{ $item->unique_id }}" name="Update_allreadyQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control Update_allreadyAmt" id="Update_allreadyAmt{{ $item->unique_id }}" name="Update_allreadyAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Proposed to be Recovered Now:</h5>
</div>
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control Update_PropoQty" onchange="calculateProposedAmount('{{ $item->unique_id }}');calculateProposedAmountMannually('{{ $item->unique_id }}');calculateBalancedAmount('{{ $item->unique_id }}');" id="Update_PropoQty{{ $item->unique_id }}" name="Update_PropoQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control"  id="Update_PropoAmt{{ $item->unique_id }}" name="Update_PropoAmt" placeholder="Enter Amount...">
            <!-- <input type="text" class="form-control " id="Update_PropoAmt{{ $item->unique_id }}" name="Update_PropoAmt" placeholder="Enter Amount..."> -->
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Balance to be Recovered: </h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control Update_balQty" id="Update_balQty{{ $item->unique_id }}" name="Update_balQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control Update_balAmt" id="Update_balAmt{{ $item->unique_id }}" name="Update_balAmt" placeholder="Enter Amount...">
        </div>
    </div>
    <div class="row mt-5"> <!-- Adding margin top (mt-3) for some spacing -->
    <label for="textareaField" class="col-form-label col-md-2 ml-5  font-weight-bold">Remark :</label>
    <div class="col-md-8 mb-5">
        <textarea class="form-control" id="Update_Remark{{ $item->unique_id }}" name="Update_Remark" rows="4" placeholder="Enter text..."></textarea>
    </div>
</div>


            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">update</button> -->
                <!-- <button type="button" class="btn btn-primary" id="updateButton">Update</button> -->
                <button type="button" class="btn btn-primary" id="updateButton" onclick="updateButtonClick('{{ $item->unique_id }}', '{{ $tbiilid }}')">Update</button>



              
              </div>
        </div>
    </div>
</div>
</form>
<!-- //when Update button click that time open model -->


<!-- view Model -->
<div class="modal fade" id="ViewModal{{ $item->unique_id }}">
    <div class="modal-dialog custom-modal">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">View Recovery</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Add your content for the modal body here -->
                <!-- For example, you can add a form or any other HTML content -->
                <div class="row mt-3"> <!-- Adding margin top (mt-3) for some spacing -->
    <label for="textareaField" class="col-form-label col-md-2 ml-5  font-weight-bold">Material :</label>
    <div class="col-md-8 mb-5">
    <input type="hidden" name="unique_id" id="unique_id{{ $item->unique_id }}">
    <input type="hidden" name="workid" id="workid{{ $item->unique_id }}" value="{{ $workid }}">

        <textarea class="form-control" id="ViewMaterial{{ $item->unique_id }}" disabled name="ViewMaterial" rows="4" placeholder="Enter text..." readonly></textarea>
    </div>
</div>


<!-- <div class="row mt-3"> -->
<h5 class="table-success">As per Tender:</h5>
<!-- </div> -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="ViewAsperQty{{ $item->unique_id }}" name="ViewAsperQty"  placeholder="Enter Quantity..." disabled>        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Rate:</label>
            <input type="text" class="form-control" id="ViewAsperRt{{ $item->unique_id }}" disabled name="ViewAsperRt" placeholder="Enter Rate..."  >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="ViewAsperAmt{{ $item->unique_id }}" disabled name="ViewAsperAmt" placeholder="Enter Amount...">
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Up-to-date Issue:</h5>
</div>
    <!-- Subheading with Quantity, Rate, and Amount -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="View_uptodateQty{{ $item->unique_id }}" disabled name="View_uptodateQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="view_UptodateAmt{{ $item->unique_id }}" disabled name="view_UptodateAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Already Recovered:</h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="View_allreadyQty{{ $item->unique_id }}" disabled name="View_allreadyQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="view_allreadyAmt{{ $item->unique_id }}" disabled name="view_allreadyAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Proposed to be Recovered Now:</h5>
</div>
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="view_PropoQty{{ $item->unique_id }}" disabled name="view_PropoQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="view_PropoAmt{{ $item->unique_id }}" disabled name="view_PropoAmt" placeholder="Enter Amount...">
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Balance to be Recovered: </h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="view_balQty{{ $item->unique_id }}" disabled name="view_balQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="View_balAmt{{ $item->unique_id }}" disabled name="View_balAmt" placeholder="Enter Amount...">
        </div>
    </div>
    <div class="row mt-5"> <!-- Adding margin top (mt-3) for some spacing -->
    <label for="textareaField" class="col-form-label col-md-2 ml-5  font-weight-bold">Remark :</label>
    <div class="col-md-8 mb-5">
        <textarea class="form-control" id="View_Remark{{ $item->unique_id }}" disabled name="View_Remark" rows="4" placeholder="Enter text..."></textarea>
    </div>
</div>


            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
        </div>
    </div>
</div>
<!-- view Model -->
    @endforeach
<!-- <lable>Total Proposed recovered Amount Rs.</lable> -->

</tbody>
</table>

<form action="{{ url('RouteTotRecovery/' . $tbiilid . '/' . $workid) }}" method="post" >
@csrf
<input type="hidden" name="workid" value="{{ $workid }}">
<input type="hidden" name="tbiilid" value="{{ $tbiilid }}">
Total Recovery: 
<input type="text"   id="TotalproRecovery" name="TotalproRecovery" value="{{$sumCurMAmt}}" readonly><br>
<br>
<button type="submit" class="btn btn-primary" >Submit</button>
</form><br><br>

<form action ="{{ url('RouteCloseRecovery') }}" method="post" >
@csrf
<input type="hidden" name="workid" value="{{ $workid }}">
<input type="hidden" name="tbiilid" value="{{ $tbiilid }}">
<button type="submit" class="btn btn-primary" >Close</button>
</form>

<br><br><br><br>





<form action="{{ url('/save-recovery')}}" method="post">
    @csrf<!-- //when new button click that time open model -->
    <input type="hidden" id="workidInput" name="workid" value="{{ $workid }}">
<input type="hidden" id="tbiilidInput" name="tbiilid" value="{{ $tbiilid }}">

<div class="modal fade" id="myModal">
    <div class="modal-dialog custom-modal">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Recovery</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Add your content for the modal body here -->
                <!-- For example, you can add a form or any other HTML content -->
                <div class="row mt-3"> <!-- Adding margin top (mt-3) for some spacing -->
    <label for="textareaField" class="col-form-label col-md-2 ml-5  font-weight-bold">Material :</label>
    <div class="col-md-8 mb-5">
        <textarea class="form-control" id="Materialnew" name="Material" rows="4" placeholder="Enter text..." required></textarea>
    </div>
</div>


<!-- <div class="row mt-3"> -->
<h5 class="table-success">As per Tender:</h5>
<!-- </div> -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="AsperQtynew" name="AsperQty"  placeholder="Enter Quantity...">        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Rate:</label>
            <input type="text" class="form-control" id="AsperRtnew" name="AsperRt" placeholder="Enter Rate..."  >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="AsperAmtnew" name="AsperAmt" placeholder="Enter Amount...">
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Up-to-date Issue:</h5>
</div>
    <!-- Subheading with Quantity, Rate, and Amount -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="uptodateQtynew" name="uptodateQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="UptodateAmtnew" name="UptodateAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Already Recovered:</h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="allreadyQtynew" name="allreadyQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="allreadyAmtnew" name="allreadyAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Proposed to be Recovered Now:</h5>
</div>
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="PropoQtynew" name="PropoQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="PropoAmtnew" name="PropoAmt" placeholder="Enter Amount...">
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Balance to be Recovered: </h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="balQtynew" name="balQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="balAmtnew" name="balAmt" placeholder="Enter Amount...">
        </div>
    </div>
    <div class="row mt-5"> <!-- Adding margin top (mt-3) for some spacing -->
    <label for="textareaField" class="col-form-label col-md-2 ml-5  font-weight-bold">Remark :</label>
    <div class="col-md-8 mb-5">
        <textarea class="form-control" id="Remarknew" name="Remark" rows="4" placeholder="Enter text..."></textarea>
    </div>
</div>


            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary" id="saveDataBtnn">Save</button> -->
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                <button type="button" class="btn btn-primary" onclick="saveRecovery()">Save</button>


              
              </div>
        </div>
    </div>
</div>
</form>
<!-- //when new button click that time open model -->


<!-- //new button calculation -->
<script>
// <!-- Add this script at the end of your HTML body -->
$(document).ready(function () 
{
    //as pe amount calculate
    function calculateAmount() 
    {
            var quantity = parseFloat($('#AsperQty').val()) || 0;
            var rate = parseFloat($('#AsperRt').val()) || 0;
            var amount = quantity * rate;
            $('#AsperAmt').val(amount.toFixed(2));
        }

        // Bind the input event to the quantity and rate fields
        $('#AsperQty, #AsperRt').on('input', function () 
        {
            calculateAmount();
        });

        // Initial calculation on page load
        calculateAmount();

//uptodate amount calculate

        function calculateUptodateAmount() 
        {
            var quantity = parseFloat($('#uptodateQty').val()) || 0;
            var rate = parseFloat($('#AsperRt').val()) || 0;
            var amount = quantity * rate;
            $('#UptodateAmt').val(amount.toFixed(2));
        }

        // Bind the input event to the quantity and rate fields
        $('#uptodateQty, #AsperRt ').on('input', function () 
        {
            calculateUptodateAmount();
        });

        // Initial calculation on page load
        calculateUptodateAmount();

//allreadyamount calculated
        function calculateAllreadyAmount() {
            var quantity = parseFloat($('#allreadyQty').val()) || 0;
            var rate = parseFloat($('#AsperRt').val()) || 0;
            var amount = quantity * rate;
            $('#allreadyAmt').val(amount.toFixed(2));
        }

        // Bind the input event to the quantity and rate fields
        $('#allreadyQty, #allreadyRt').on('input', function () {
            calculateAllreadyAmount();
        });

        // Initial calculation on page load
        calculateAllreadyAmount();


//proposed to be amount calculted
function calculatePropoAmount() 
        {
    var uptodateQty = parseFloat($('#uptodateQty').val()) || 0;
    var allreadyQty = parseFloat($('#allreadyQty').val()) || 0;
    var propoQty = parseFloat($('#PropoQty').val()) || 0;
    var rate = parseFloat($('#AsperRt').val()) || 0;

    // Calculate the total quantity based on propoQty or uptodateQty - allreadyQty
    var totalQty = uptodateQty - allreadyQty;
    $('#PropoQty').val(totalQty.toFixed(2));

        var propoAmt = totalQty * rate;
        $('#PropoAmt').val(propoAmt.toFixed(2));
}

function calculatePropoAmountManually() 
{
    var quantity = parseFloat($('#PropoQty').val()) || 0;
    var rate = parseFloat($('#AsperRt').val()) || 0;

    var amount = quantity * rate;
    $('#PropoAmt').val(amount.toFixed(2));
}

// Bind the input event to the relevant fields for dynamic calculation
$('#uptodateQty, #allreadyQty, #AsperRt').on('input', function () {
    calculatePropoAmount();
});
$('#PropoQty, #AsperRt').on('input', function () {
    calculatePropoAmountManually();
});

calculatePropoAmount();
calculatePropoAmountManually();


        function calculateBalAmount() {
            var uptodateQty = parseFloat($('#uptodateQty').val()) || 0;
            var allreadyQty = parseFloat($('#allreadyQty').val()) || 0;
            var propQnty = parseFloat($('#PropoQty').val()) || 0;

            // var propoQty = parseFloat($('#PropoQty').val()) || 0;

            // Calculate the total quantity
            var totalQty = uptodateQty - allreadyQty - propQnty;
            $('#balQty').val(totalQty.toFixed(2));

            // Use the total quantity to calculate the amount
            var rate = parseFloat($('#AsperRt').val()) || 0; // Assuming you have a rate for calculation
            var BalAmt = totalQty * rate;

            // Update the Proposed to be Recovered Now amount field
            $('#balAmt').val(BalAmt.toFixed(2));
        }

        // Bind the input event to the relevant fields
        $('#uptodateQty, #allreadyQty, #PropoQty').on('input', function () 
        {
            calculateBalAmount();
        });

        // Initial calculation on page load
        calculateBalAmount();
});
</script>





<!-- edit -->
<script>
    // Function to calculate amount based on quantity and rate
    function calculateAmount(uniqueId) {
    var quantityField = document.getElementById('UpdateAsperQty' + uniqueId);
    var rateField = document.getElementById('updateAsperRt' + uniqueId);
    var amountField = document.getElementById('UpdateAsperAmt' + uniqueId);
    // Debugging: Log the uniqueId and check if the fields are found
    console.log('UniqueId:', uniqueId);
    console.log('Quantity Field:', quantityField);
    console.log('Rate Field:', rateField);
    console.log('Amount Field:', amountField);

    // Check if the fields exist
    var quantity = parseFloat(quantityField.value) || 0;
    var rate = parseFloat(rateField.value) || 0;
    var amount = quantity * rate;

    // Update the amount field
    amountField.value = amount.toFixed(2);
}

// Event listener to trigger the calculation when quantity or rate is changed
document.addEventListener('input', function (event) {
    var target = event.target;
    // Check if the changed element is a quantity or rate field
    if (target.classList.contains('UpdateAsperQty') || target.classList.contains('updateAsperRt')) {
        // Extract the uniqueId from the element ID
        var uniqueId = target.id.replace(/\D/g, '');

        // Call the calculateAmount function with the correct uniqueId
        calculateAmount(uniqueId);
    }
});


function calculateUptodateAmount(uniqueId) {
    var quantityField = document.getElementById('Update_uptodateQty' + uniqueId);
    var rateField = document.getElementById('updateAsperRt' + uniqueId);
    var amountField = document.getElementById('Update_UptodateAmt' + uniqueId);
    // Debugging: Log the uniqueId and check if the fields are found
    console.log('UniqueId:', uniqueId);
    console.log('Quantity Field:', quantityField);
    console.log('Rate Field:', rateField);
    console.log('Amount Field:', amountField);

    // Check if the fields exist
    var quantity = parseFloat(quantityField.value) || 0;
    var rate = parseFloat(rateField.value) || 0;
    var amount = quantity * rate;

    // Update the amount field
    amountField.value = amount.toFixed(2);
}

// Event listener to trigger the calculation when quantity or rate is changed
document.addEventListener('input', function (event) {
    var target = event.target;
    // Check if the changed element is a quantity or rate field
    if (target.classList.contains('Update_uptodateQty') || target.classList.contains('updateAsperRt')) {
        // Extract the uniqueId from the element ID
        var uniqueId = target.id.replace(/\D/g, '');

        // Call the calculateAmount function with the correct uniqueId
        calculateUptodateAmount(uniqueId);
    }
});

function calculateAllreadyAmount(uniqueId) {
    var quantityField = document.getElementById('Update_allreadyQty' + uniqueId);
    var rateField = document.getElementById('updateAsperRt' + uniqueId);
    var amountField = document.getElementById('Update_allreadyAmt' + uniqueId);
    // Debugging: Log the uniqueId and check if the fields are found
    console.log('UniqueId:', uniqueId);
    console.log('Quantity Field:', quantityField);
    console.log('Rate Field:', rateField);
    console.log('Amount Field:', amountField);

    // Check if the fields exist
    var quantity = parseFloat(quantityField.value) || 0;
    var rate = parseFloat(rateField.value) || 0;
    var amount = quantity * rate;

    // Update the amount field
    amountField.value = amount.toFixed(2);
}

// Event listener to trigger the calculation when quantity or rate is changed
document.addEventListener('input', function (event) {
    var target = event.target;
    // Check if the changed element is a quantity or rate field
    if (target.classList.contains('Update_allreadyQty') || target.classList.contains('updateAsperRt')) {
        // Extract the uniqueId from the element ID
        var uniqueId = target.id.replace(/\D/g, '');

        // Call the calculateAmount function with the correct uniqueId
        calculateAllreadyAmount(uniqueId);
    }
});


function calculateProposedAmount(uniqueId) {
    var Update_uptodateQty = document.getElementById('Update_uptodateQty' + uniqueId);
    var Update_allreadyQty = document.getElementById('Update_allreadyQty' + uniqueId);

    var uptodateQtyValue = parseFloat(Update_uptodateQty.value) || 0;
    var allreadyQtyValue = parseFloat(Update_allreadyQty.value) || 0;

    var quantityField = uptodateQtyValue - allreadyQtyValue;
    console.log("Update_PropoQty", quantityField);

    document.getElementById('Update_PropoQty' + uniqueId).value = quantityField.toFixed(2);

    var rateField = document.getElementById('updateAsperRt' + uniqueId);
    var givinrate = parseFloat(rateField.value);
    console.log("updateAsperRt", givinrate);

    var amountField = document.getElementById('Update_PropoAmt' + uniqueId);

    // Debugging: Log the uniqueId and check if the fields are found
    console.log('UniqueId:', uniqueId);
    console.log('Quantity Field:', quantityField);
    console.log('Rate Field:', rateField);
    console.log('Amount Field:', amountField);

    // Check if the fields exist
    var quantity = parseFloat(quantityField) || 0;
    console.log(quantity);
    var rate = parseFloat(givinrate) || 0;
    var amount = quantity * rate;

    // Log the calculated amount to the console
    console.log('Calculated Amount:', quantity, rate, amount);

    // Update the amount field
    amountField.value = amount.toFixed(2);
}

// Event listener to trigger the calculation when quantity or rate is changed
document.addEventListener('input', function (event) {
    var target = event.target;
    // Check if the changed element is a quantity or rate field
    if (target.classList.contains('Update_allreadyQty') ||target.classList.contains('Update_uptodateQty')|| target.classList.contains('updateAsperRt')) {
        // Extract the uniqueId from the element ID
        var uniqueId = target.id.replace(/\D/g, '');

        // Call the calculateAmount function with the correct uniqueId
        calculateProposedAmount(uniqueId);
    }
});

function calculateProposedAmountMannually(uniqueId) {
    var quantityField = document.getElementById('Update_PropoQty' + uniqueId);
    var rateField = document.getElementById('updateAsperRt' + uniqueId);
    var amountField = document.getElementById('Update_PropoAmt' + uniqueId);
    // Debugging: Log the uniqueId and check if the fields are found
    console.log('UniqueId:', uniqueId);
    console.log('Quantity Field:', quantityField);
    console.log('Rate Field:', rateField);
    console.log('Amount Field:', amountField);

    // Check if the fields exist
    var quantity = parseFloat(quantityField.value) || 0;
    var rate = parseFloat(rateField.value) || 0;
    var amount = quantity * rate;

    // Update the amount field
    amountField.value = amount.toFixed(2);
}

document.addEventListener('input', function (event) 
{
    var target = event.target;
    // Check if the changed element is a quantity or rate field
    if (target.classList.contains('Update_PropoQty') || target.classList.contains('updateAsperRt'))
     {
        // Extract the uniqueId from the element ID
        var uniqueId = target.id.replace(/\D/g, '');
        // Call the calculateAmount function with the correct uniqueId
        calculateProposedAmountMannually(uniqueId);
    }
});


function calculateBalancedAmount(uniqueId) {
    var Update_uptodateQty = document.getElementById('Update_uptodateQty' + uniqueId);
    var Update_allreadyQty = document.getElementById('Update_allreadyQty' + uniqueId);
    var Update_PropoQty = document.getElementById('Update_PropoQty' + uniqueId);


    var uptodateQtyValue = parseFloat(Update_uptodateQty.value) || 0;
    var allreadyQtyValue = parseFloat(Update_allreadyQty.value) || 0;
    var propQtyValue = parseFloat(Update_PropoQty.value) || 0;


    var quantityField = uptodateQtyValue - allreadyQtyValue - propQtyValue;
    console.log("Update_balQty", quantityField);

    document.getElementById('Update_balQty' + uniqueId).value = quantityField.toFixed(2);

    var rateField = document.getElementById('updateAsperRt' + uniqueId);
    var givinrate = parseFloat(rateField.value);
    console.log("updateAsperRt", givinrate);

    var amountField = document.getElementById('Update_balAmt' + uniqueId);

    // Debugging: Log the uniqueId and check if the fields are found
    console.log('UniqueId:', uniqueId);
    console.log('Quantity Field:', quantityField);
    console.log('Rate Field:', rateField);
    console.log('Amount Field:', amountField);

    // Check if the fields exist
    var quantity = parseFloat(quantityField) || 0;
    console.log(quantity);
    var rate = parseFloat(givinrate) || 0;
    var amount = quantity * rate;

    // Log the calculated amount to the console
    console.log('Calculated Amount:', quantity, rate, amount);

    // Update the amount field
    amountField.value = amount.toFixed(2);
}

document.addEventListener('input', function (event) {
    var target = event.target;
    // Check if the changed element is a quantity or rate field
    if (target.classList.contains('Update_allreadyQty') ||target.classList.contains('Update_uptodateQty')|| target.classList.contains('Update_PropoQty') || target.classList.contains('updateAsperRt')) {
        // Extract the uniqueId from the element ID
        var uniqueId = target.id.replace(/\D/g, '');

        // Call the calculateAmount function with the correct uniqueId
        calculateBalancedAmount(uniqueId);
    }
});
</script>

<!-- edit -->


<!-- //DELETE BUTTON -->
<script>
function confirmDelete(uniqueId, tbillId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to delete.... This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log('Unique ID:', uniqueId);
            console.log('Tbill ID:', tbillId);

            // Perform the AJAX call or other delete logic here...
            $.ajax({
                type: 'POST',
                url: '/RouteDeleteRecovery',
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                data: {
                    itemId: uniqueId,
                    tbillId: tbillId
                },
                success: function(response) {
                    console.log('AJAX call successful', response);
                    var afterdelete=response.DeleteDBrecoveriesGet;
                    var sumCurMAmt =response.sumCurMAmt;
                    console.log("After Delete Dipaly record",afterdelete);
                    console.log("Sum of total Current Amount after Delete",sumCurMAmt);
                    var tbody = document.getElementById('recovery_tbody');


// Clear the existing content of tbody
tbody.innerHTML = '';
// var totrecovery=0;


afterdelete.forEach(function (item) {
    var newRow = '<tr>' +
        // '<input type="text" name="unique_id[]" value="' + item.unique_id + '">' +
        '<td style="text-align:right;">' + item.Sr_no + '</td>' +
        '<td style="width: 750px;">' + item.Material + '</td>' +

        '<td style="width: 100px; text-align:right">' + item.Mat_Qty + '</td>' +
        '<td style="width: 100px; text-align:right">' + item.Mat_Rt + '</td>' +
        '<td style="width: 100px; text-align:right">' + item.Mat_Amt + '</td>' +

        '<td style="width: 100px; text-align:right">' + item.UptoDt_m_Qty + '</td>' +
        '<td style="width: 100px; text-align:right">' + item.UptoDt_m_Amt + '</td>' +

        '<td style="width: 100px; text-align:right">' + item.pre_m_Qty + '</td>' +
        '<td style="width: 100px; text-align:right">' + item.pre_M_Amt + '</td>' +

        '<td style="width: 100px; text-align:right">' + item.Cur_M_Qty + '</td>' +
        '<td style="width: 100px; text-align:right">' + item.Cur_M_Amt + '</td>' +
        
        '<td style="width: 100px; text-align:right">' + item.Bal_M_Qty + '</td>' +
        '<td style="width: 100px; text-align:right">' + item.Bal_M_Amt + '</td>' +

        '<td style="width: 750px;">' + item.Remark + '</td>' +
        '<td>' +
        '<a href="#" class="btn btn-primary" onclick="openviewModel(' + item.unique_id + ', ' + item.t_bill_id + ')" data-toggle="modal"  data-item-id="' + item.unique_id + '" data-tbillid="' + item.t_bill_id + '" style="margin-bottom: 10px; text-align: right;">' +
'<i class="fa fa-eye custom-icon" aria-hidden="true"></i>' +
'</a>'+

            '<a href="#" class="btn btn-primary" onclick="openUpdateModal(\'' + item.unique_id + '\', \'' + item.t_bill_id + '\')" data-item-id="' + item.unique_id + '" data-tbillid="' + item.t_bill_id + '" style="margin-bottom: 10px; text-align: right;">' +
            '<i class="fa fa-pencil" style="color:white;"></i>' +
            '</a>' +
            '<button class="btn btn-lg btn-danger btn-flat show-alert-delete-box btn-sm" style="width: 70px;" data-target="#DeleteConfirmModal" onclick="confirmDelete(\'' + item.unique_id + '\', \'' + item.t_bill_id + '\')">' +
            '<i class="fa fa-trash" aria-hidden="true"></i>' +
            '</button>' +
            '</td>' +
            
            '</tr>';

    tbody.innerHTML += newRow;
    recoveryUpdatemodel(item.unique_id,item.t_bill_id);
    recoveryViewemodel(item.unique_id,item.t_bill_id);
    
    // totrecovery =  parseFloat(totrecovery) - parseFloat(item.Cur_M_Amt);
    // $('#TotalproRecovery').val(totrecovery);
});
        $('#TotalproRecovery').val(sumCurMAmt);




                },
                error: function(error) {
                    console.error('AJAX call failed', error);
                }
            });
        }
    });
}
</script>
<!-- //DEKETE BUTTON -->

<!-- //after button model having Update button that button click updated data bind tbody -->
<script>
    $(document).ready(function () {
        // Handle click event for the update button
        var clickedLink; 
//         $("#updateButton").click(function () {
//             // Get form data
//             var formData = $("#UpdateRecoveryForm").serialize();
//             console.log("Update data",formData);

//              // Get unique_id and tbillid from the stored clicked element
//     var uniqueId = clickedLink.data('item-id');
//     var tbillId = clickedLink.data('tbillid');

//     // Add unique_id and tbillid to formData
//     formData += '&unique_id=' + uniqueId + '&tbillid=' + tbillId;


//             // Make an AJAX request
//             $.ajax({
//                 url: "{{ url('UpdateRecovery')}}",
//                 type: "POST",
//                 data: formData,
//                 success: function (response) {
//                     // Handle success, e.g., close the modal or show a success message
//                     console.log(response);
//     var updatedRecoveries = response.DBrecoveriesGet;
//     console.log("After updated all data get related that tbillid", updatedRecoveries);
//                     var tbody = document.getElementById('recovery_tbody');

// // Clear the existing content of tbody
// tbody.innerHTML = '';

// updatedRecoveries.forEach(function (item) {
//     var newRow = '<tr>' +
//         // '<input type="text" name="unique_id[]" value="' + item.unique_id + '">' +
//         '<td style="text-align:right;">' + item.Sr_no + '</td>' +
//         '<td style="width: 750px;">' + item.Material + '</td>' +

//         '<td style="width: 750px;">' + item.Mat_Qty + '</td>' +
//         '<td style="width: 750px;">' + item.Mat_Rt + '</td>' +
//         '<td style="width: 750px;">' + item.Mat_Amt + '</td>' +

//         '<td style="width: 750px;">' + item.UptoDt_m_Qty + '</td>' +
//         '<td style="width: 750px;">' + item.UptoDt_m_Amt + '</td>' +

//         '<td style="width: 750px;">' + item.pre_m_Qty + '</td>' +
//         '<td style="width: 750px;">' + item.pre_M_Amt + '</td>' +

//         '<td style="width: 750px;">' + item.Cur_M_Qty + '</td>' +
//         '<td style="width: 750px;">' + item.Cur_M_Amt + '</td>' +
        
//         '<td style="width: 750px;">' + item.Bal_M_Qty + '</td>' +
//         '<td style="width: 750px;">' + item.Bal_M_Amt + '</td>' +

//         '<td style="width: 750px;">' + item.Remark + '</td>' +
//         '<td>' +
//             '<a href="#" class="btn btn-primary view-link" data-toggle="modal" data-target="#ViewModal" data-item-id="' + item.unique_id + '" data-tbillid="' + item.t_bill_id + '" style="margin-bottom: 10px; text-align: right;">' +
//             '<i class="fa fa-eye custom-icon" aria-hidden="true"></i>' +
//             '</a>' +
//             '<a href="#" class="btn btn-primary edit-link" data-toggle="modal" data-target="#UpdateModal" data-item-id="' + item.unique_id + '" data-tbillid="' + item.t_bill_id + '" style="margin-bottom: 10px; text-align: right;">' +
//             '<i class="fa fa-pencil" style="color:white;"></i>' +
//             '</a>' +
//             '<button class="btn btn-lg btn-danger btn-flat show-alert-delete-box btn-sm" style="width: 70px;" data-target="#DeleteConfirmModal" onclick="confirmDelete(\'' + item.unique_id + '\', \'' + item.t_bill_id + '\')">' +
//             '<i class="fa fa-trash" aria-hidden="true"></i>' +
//             '</button>' +
//             '</td>' +
            
//             '</tr>';

//     tbody.innerHTML += newRow;

// });
// // Hide the modal after updating
// $('#UpdateModal').modal('hide');

//                 },
//                 error: function (error) {
//                     // Handle error, e.g., show an error message
//                     console.error(error);
//                 }
//             });
//         });
    });
</script>
<!-- //after button model having Update button that button click updated data bind tbody -->




<script>
function openUpdateModal(uniqueId, tbillid) {
    // Set the hidden input values in the modal form
    $('#UpdateRecoveryForm input[name="unique_id"]').val(uniqueId);
    $('#UpdateRecoveryForm input[name="tbillid"]').val(tbillid);

    // Log the values to the console
    console.log('Unique ID:', uniqueId);
    console.log('Tbill ID:', tbillid);
    console.log("hello");


    $.ajax({
    url: '/EditRecovery/' + uniqueId + '/' + tbillid,  // Updated URL with both parameters as route parameters
    type: 'GET',
    dataType: 'json',
    
    
    success: function(response) {
        
        var recovery=response.getdataRecovery[0];
                    console.log(recovery);
                    console.log("hello");

                    // Populate the modal fields with the fetched data
                    $('#unique_id_' + recovery.unique_id).val(recovery.unique_id);
                    $('#UpdateMaterial' + recovery.unique_id).val(recovery.Material);                    
                    $('#UpdateAsperQty'+ recovery.unique_id).val(recovery.Mat_Qty);
                    $('#updateAsperRt'+ recovery.unique_id).val(recovery.Mat_Rt);
                    $('#UpdateAsperAmt'+ recovery.unique_id).val(recovery.Mat_Amt);

                    $('#Update_uptodateQty'+ recovery.unique_id).val(recovery.UptoDt_m_Qty);
                    $('#Update_UptodateAmt'+ recovery.unique_id).val(recovery.UptoDt_m_Amt);

                    $('#Update_allreadyQty'+ recovery.unique_id).val(recovery.pre_m_Qty);
                    $('#Update_allreadyAmt'+ recovery.unique_id).val(recovery.pre_M_Amt);

                    $('#Update_PropoQty'+ recovery.unique_id).val(recovery.Cur_M_Qty);
                    $('#Update_PropoAmt'+ recovery.unique_id).val(recovery.Cur_M_Amt);

                    $('#Update_balQty'+ recovery.unique_id).val(recovery.Bal_M_Qty);
                    $('#Update_balAmt'+ recovery.unique_id).val(recovery.Bal_M_Amt);

                    $('#Update_Remark'+ recovery.unique_id).val(recovery.Remark);

                    $('#unique_id'+ recovery.unique_id).val(recovery.unique_id);

                    $('#workid'+ recovery.unique_id).val(recovery.work_Id)

                    $('input[name="tbillid"]'+ recovery.unique_id).val(recovery.t_bill_id);
                    $('input[name="tbiiiid"]'+ recovery.unique_id).val(recovery.unique_id);

                    // Show the modal
                    $('#UpdateModal'+ recovery.unique_id).modal('show');
                },
                error: function() {
                    alert('Error fetching data');
                }
            });

            return false; // Prevent the default link behavior
    

        // Open the corresponding modal
        $('#UpdateModal' + uniqueId).modal('show');
    }

    

    function updateButtonClick(uniqueId, tbillid) 
    {
  // Get form data
  console.log("Update button clicked");
  console.log('Unique ID:', uniqueId);
  console.log('Tbill ID:', tbillid);

  // Create an object to store the values
  var updateData = {
    uniqueId: uniqueId,
    tbillid: tbillid,
    updatedMaterial: $('#UpdateMaterial' + uniqueId).val(),
    updatedAsperQty: $('#UpdateAsperQty' + uniqueId).val(),
    updateAsperRt: $('#updateAsperRt' + uniqueId).val(),
    UpdateAsperAmt: $('#UpdateAsperAmt' + uniqueId).val(),
    Update_uptodateQty: $('#Update_uptodateQty' + uniqueId).val(),
    Update_UptodateAmt: $('#Update_UptodateAmt' + uniqueId).val(),
    Update_allreadyQty: $('#Update_allreadyQty' + uniqueId).val(),
    Update_allreadyAmt: $('#Update_allreadyAmt' + uniqueId).val(),
    Update_PropoQty: $('#Update_PropoQty' + uniqueId).val(),
    Update_PropoAmt: $('#Update_PropoAmt' + uniqueId).val(),
    Update_balQty: $('#Update_balQty' + uniqueId).val(),
    Update_balAmt: $('#Update_balAmt' + uniqueId).val(),
    Update_Remark: $('#Update_Remark' + uniqueId).val()
  };

  // Log the entire object to the console
  console.log('Update Data:', updateData);
  var csrfToken = $('meta[name="csrf-token"]').attr('content');


    // Make an AJAX request
            $.ajax({
                url: "{{ url('UpdateRecovery')}}",
                type: "POST",
                headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                data: updateData,
                
                success: function (response) {
                    // Handle success, e.g., close the modal or show a success message
                    console.log(response);
    var updatedRecoveries = response.DBrecoveriesGet;
    console.log("After updated all data get related that tbillid", updatedRecoveries);
                    var tbody = document.getElementById('recovery_tbody');

// Clear the existing content of tbody
tbody.innerHTML = '';
var totrecovery=0;

updatedRecoveries.forEach(function (item) {
    var newRow = '<tr>' +
        // '<input type="text" name="unique_id[]" value="' + item.unique_id + '">' +
        '<td style="text-align:right;">' + item.Sr_no + '</td>' +
        '<td style="width: 750px;">' + (item.Material ?? '') + '</td>' +

        '<td style="width: 100px; text-align:right">' + (item.Mat_Qty ?? '0.000') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.Mat_Rt ?? '0.00') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.Mat_Amt ?? '0.00') + '</td>' +

        '<td style="width: 100px; text-align:right">' + (item.UptoDt_m_Qty ?? '0.000') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.UptoDt_m_Amt ?? '0.00') + '</td>' +

        '<td style="width: 100px; text-align:right">' + (item.pre_m_Qty ?? '0.000') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.pre_M_Amt ?? '0.00') + '</td>' +

        '<td style="width: 100px; text-align:right">' + (item.Cur_M_Qty  ?? '0.000')+ '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.Cur_M_Amt  ?? '0.00')+ '</td>' +
        
        '<td style="width: 100px; text-align:right">' + (item.Bal_M_Qty ?? '0.000') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.Bal_M_Amt ?? '0.00') + '</td>' +

        '<td style="width: 750px;">' + (item.Remark ?? ' ')+ '</td>' +
        '<td>' +
        '<a href="#" class="btn btn-primary" onclick="openviewModel(' + item.unique_id + ', ' + item.t_bill_id + ')" data-toggle="modal" data-item-id="' + item.unique_id + '" data-tbillid="' + item.t_bill_id + '" style="margin-bottom: 10px; text-align: right;">' +
'<i class="fa fa-eye custom-icon" aria-hidden="true"></i>' +
'</a>'+

            '<a href="#" class="btn btn-primary" onclick="openUpdateModal(\'' + item.unique_id + '\', \'' + item.t_bill_id + '\')" data-item-id="' + item.unique_id + '" data-tbillid="' + item.t_bill_id + '" style="margin-bottom: 10px; text-align: right;">' +
            '<i class="fa fa-pencil" style="color:white;"></i>' +
            '</a>' +
            '<button class="btn btn-lg btn-danger btn-flat show-alert-delete-box btn-sm" style="width: 70px;" data-target="#DeleteConfirmModal" onclick="confirmDelete(\'' + item.unique_id + '\', \'' + item.t_bill_id + '\')">' +
            '<i class="fa fa-trash" aria-hidden="true"></i>' +
            '</button>' +
            '</td>' +
            
            '</tr>';

    tbody.innerHTML += newRow;
    recoveryUpdatemodel(item.unique_id,item.t_bill_id);
    recoveryViewemodel(item.unique_id,item.t_bill_id);

    var totalrecovery=response.sumCurMAmt;
    //totrecovery = parseFloat(totrecovery) + parseFloat(item.Cur_M_Amt);
$('#TotalproRecovery').val(totalrecovery);


    
});
// Hide the modal after updating
$('#UpdateModal' + uniqueId).modal('hide');

},
        error: function (error)
         {
            // Handle error, e.g., show an error message
            console.error(error);
        }
    });
}


</script>

<script>
    function recoveryUpdatemodel(unique_id, tbiilid) {
        var updateModel = `
            <!-- Update Model -->
            <form action="{{url('UpdateRecovery')}}" method="post" id="UpdateRecoveryForm" class="update-recovery-form">
                @csrf
                <input type="hidden" name="workid" id="workid" value="{{ $workid }}">
                <input type="hidden" name="tbillid" value="{{ $tbiilid }}">
                <input type="hidden" name="unique_id" class="update-unique-id">
                <input type="hidden" name="tbillid" class="update-tbillid">
                <!-- <h3>update</h3> -->
                <div class="modal fade" id="UpdateModal${unique_id}">
                    <div class="modal-dialog custom-modal">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Update Recovery</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <!-- Add your content for the modal body here -->
                                <!-- For example, you can add a form or any other HTML content -->
                                <div class="row mt-3">
                                    <label for="textareaField" class="col-form-label col-md-2 ml-5 font-weight-bold">Material :</label>
                                    <div class="col-md-8 mb-5">
                                        <input type="text" name="unique_id" id="unique_id_${unique_id}">
                                        <textarea class="form-control" id="UpdateMaterial${unique_id}" name="UpdateMaterial" rows="4" placeholder="Enter text..."></textarea>
                                    </div>
                                </div>


<!-- <div class="row mt-3"> -->
<h5 class="table-success">As per Tender:</h5>
<!-- </div> -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="UpdateAsperQty${unique_id}" name="UpdateAsperQty"  placeholder="Enter Quantity...">        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Rate:</label>
            <input type="text" class="form-control" id="updateAsperRt${unique_id}" name="updateAsperRt" placeholder="Enter Rate..."  >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="UpdateAsperAmt${unique_id}" name="UpdateAsperAmt" placeholder="Enter Amount...">
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Up-to-date Issue:</h5>
</div>
    <!-- Subheading with Quantity, Rate, and Amount -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="Update_uptodateQty${unique_id}" name="Update_uptodateQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="Update_UptodateAmt${unique_id}" name="Update_UptodateAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Already Recovered:</h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="Update_allreadyQty${unique_id}" name="Update_allreadyQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="Update_allreadyAmt${unique_id}" name="Update_allreadyAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Proposed to be Recovered Now:</h5>
</div>
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="Update_PropoQty${unique_id}" name="Update_PropoQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="Update_PropoAmt${unique_id}" name="Update_PropoAmt" placeholder="Enter Amount...">
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Balance to be Recovered: </h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="Update_balQty${unique_id}" name="Update_balQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="Update_balAmt${unique_id}" name="Update_balAmt" placeholder="Enter Amount...">
        </div>
    </div>
    <div class="row mt-5"> <!-- Adding margin top (mt-3) for some spacing -->
    <label for="textareaField" class="col-form-label col-md-2 ml-5  font-weight-bold">Remark :</label>
    <div class="col-md-8 mb-5">
        <textarea class="form-control" id="Update_Remark${unique_id}" name="Update_Remark" rows="4" placeholder="Enter text..."></textarea>
    </div>
</div>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="updateButton" onclick="updateButtonClick('${unique_id}', '${tbiilid}')">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        `;
        $('body').append(updateModel);
    }
</script>

<script>
    function recoveryViewemodel(unique_id, tbiilid) {
        var viewModel=`<!-- view Model -->
<div class="modal fade" id="ViewModal${unique_id}">
    <div class="modal-dialog custom-modal">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">View Recovery</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Add your content for the modal body here -->
                <!-- For example, you can add a form or any other HTML content -->
                <div class="row mt-3"> <!-- Adding margin top (mt-3) for some spacing -->
    <label for="textareaField" class="col-form-label col-md-2 ml-5  font-weight-bold">Material :</label>
    <div class="col-md-8 mb-5">
    <input type="hidden" name="unique_id" id="unique_id${unique_id}">
    <input type="hidden" name="workid" id="workid${unique_id}" value="{{ $workid }}">

        <textarea class="form-control" id="ViewMaterial${unique_id}" disabled name="ViewMaterial" rows="4" placeholder="Enter text..." readonly></textarea>
    </div>
</div>


<!-- <div class="row mt-3"> -->
<h5 class="table-success">As per Tender:</h5>
<!-- </div> -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="ViewAsperQty${unique_id}" name="ViewAsperQty"  placeholder="Enter Quantity..." disabled>        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Rate:</label>
            <input type="text" class="form-control" id="ViewAsperRt${unique_id}" disabled name="ViewAsperRt" placeholder="Enter Rate..."  >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="ViewAsperAmt${unique_id}" disabled name="ViewAsperAmt" placeholder="Enter Amount...">
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Up-to-date Issue:</h5>
</div>
    <!-- Subheading with Quantity, Rate, and Amount -->
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="View_uptodateQty${unique_id}" disabled name="View_uptodateQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="view_UptodateAmt${unique_id}" disabled name="view_UptodateAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Already Recovered:</h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="View_allreadyQty${unique_id}" disabled name="View_allreadyQty" placeholder="Enter Quantity..." >
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="view_allreadyAmt${unique_id}" disabled name="view_allreadyAmt" placeholder="Enter Amount...">
        </div>
    </div>


    <div class="row mt-3">
        <h5 class="table-success">Proposed to be Recovered Now:</h5>
</div>
    <div class="row mt-1">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="view_PropoQty${unique_id}" disabled name="view_PropoQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="view_PropoAmt${unique_id}" disabled name="view_PropoAmt" placeholder="Enter Amount...">
        </div>
    </div>

    <div class="row mt-3">
        <h5 class="table-success">Balance to be Recovered: </h5>
</div>
    <div class="row mt-3">
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Quantity:</label>
            <input type="text" class="form-control" id="view_balQty${unique_id}" disabled name="view_balQty" placeholder="Enter Quantity...">
        </div>
        <div class="col-md-3 ml-5">
            <label for="" class="col-form-label font-weight-bold">Amount:</label>
            <input type="text" class="form-control" id="View_balAmt${unique_id}" disabled name="View_balAmt" placeholder="Enter Amount...">
        </div>
    </div>
    <div class="row mt-5"> <!-- Adding margin top (mt-3) for some spacing -->
    <label for="textareaField" class="col-form-label col-md-2 ml-5  font-weight-bold">Remark :</label>
    <div class="col-md-8 mb-5">
        <textarea class="form-control" id="View_Remark${unique_id}" disabled name="View_Remark" rows="4" placeholder="Enter text..."></textarea>
    </div>
</div>


            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
        </div>
    </div>
</div>
<!-- view Model -->

`;
$('body').append(viewModel);
    }
    </script>


<script>
    function saveRecovery() {
        // Collect data from form fields
        var material = document.getElementById('Materialnew').value;
        var asperQty = document.getElementById('AsperQtynew').value;
        var asperRt = document.getElementById('AsperRtnew').value;
        var asperAmt = document.getElementById('AsperAmtnew').value;
        var uptodateQty = document.getElementById('uptodateQtynew').value;
        var uptodateAmt = document.getElementById('UptodateAmtnew').value;
        var allreadyQty = document.getElementById('allreadyQtynew').value;
        var allreadyAmt = document.getElementById('allreadyAmtnew').value;
        var propoQty = document.getElementById('PropoQtynew').value;
        var propoAmt = document.getElementById('PropoAmtnew').value;
        var balQty = document.getElementById('balQtynew').value;
        var balAmt = document.getElementById('balAmtnew').value;
        var remark = document.getElementById('Remarknew').value;

        var csrf_token = "{{ csrf_token() }}";
        // Create an object with the collected data
        var formData = {
            material: material,
            asperQty: asperQty,
            asperRt: asperRt,
            asperAmt: asperAmt,
            uptodateQty: uptodateQty,
            uptodateAmt: uptodateAmt,
            allreadyQty: allreadyQty,
            allreadyAmt: allreadyAmt,
            propoQty: propoQty,
            propoAmt: propoAmt,
            balQty: balQty,
            balAmt: balAmt,
            remark: remark,
        };
console.log(formData);
        formData.workid = document.getElementById('workidInput').value;
        formData.tbiilid = document.getElementById('tbiilidInput').value;
        // Log the values to the console
        console.log('formData:', formData);
        console.log('workid:', formData.workid);
        console.log('tbiilid:', formData.tbiilid);
        // Perform AJAX request to send data to the server
        $.ajax({
            type: 'POST',
            url: '{{ url('/save-recovery') }}',
            headers: {
        'X-CSRF-TOKEN': csrf_token
    },
            data: formData,
            success: function (response) {
                // Handle success response from the server
                console.log('Data saved successfully:', response);
                var NewRecoveries = response.DBrecoveriesGet;
    console.log("Newly add  data get related that tbillid", NewRecoveries);
                    var tbody = document.getElementById('recovery_tbody');

// Clear the existing content of tbody
tbody.innerHTML = '';
var totrecovery=0;
NewRecoveries.forEach(function (item) {
    var newRow = '<tr>' +
        // '<input type="text" name="unique_id[]" value="' + item.unique_id + '">' +
        '<td style="text-align:right;">' + item.Sr_no + '</td>' +
        '<td style="width: 750px;">' + (item.Material ?? '') + '</td>' +

        '<td style="width: 100px; text-align:right">' + (item.Mat_Qty ?? '0.000') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.Mat_Rt ?? '0.00') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.Mat_Amt ?? '0.00') + '</td>' +

        '<td style="width: 100px; text-align:right">' + (item.UptoDt_m_Qty ?? '0.000') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.UptoDt_m_Amt ?? '0.00') + '</td>' +

        '<td style="width: 100px; text-align:right">' + (item.pre_m_Qty ?? '0.000') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.pre_M_Amt ?? '0.00') + '</td>' +

        '<td style="width: 100px; text-align:right">' + (item.Cur_M_Qty ?? '0.000') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.Cur_M_Amt ?? '0.00') + '</td>' +
        
        '<td style="width: 100px; text-align:right">' + (item.Bal_M_Qty ?? '0.000') + '</td>' +
        '<td style="width: 100px; text-align:right">' + (item.Bal_M_Amt ?? '0.00') + '</td>' +

        '<td style="width: 750px;">' + (item.Remark ?? '') + '</td>' +
        '<td>' +


'<a href="#" class="btn btn-primary" onclick="openviewModel(' + item.unique_id + ', ' + item.t_bill_id + ')" data-toggle="modal"  data-item-id="' + item.unique_id + '" data-tbillid="' + item.t_bill_id + '" style="margin-bottom: 10px; text-align: right;">' +
'<i class="fa fa-eye custom-icon" aria-hidden="true"></i>' +
'</a>'+

            '<a href="#" class="btn btn-primary" onclick="openUpdateModal(\'' + item.unique_id + '\', \'' + item.t_bill_id + '\')" data-item-id="' + item.unique_id + '" data-tbillid="' + item.t_bill_id + '" style="margin-bottom: 10px; text-align: right;">' +
            '<i class="fa fa-pencil" style="color:white;"></i>' +
            '</a>' +
            '<button class="btn btn-lg btn-danger btn-flat show-alert-delete-box btn-sm" style="width: 70px;" data-target="#DeleteConfirmModal" onclick="confirmDelete(\'' + item.unique_id + '\', \'' + item.t_bill_id + '\')">' +
            '<i class="fa fa-trash" aria-hidden="true"></i>' +
            '</button>' 
            '</td>' +
            
            '</tr>';

    tbody.innerHTML += newRow;
    recoveryUpdatemodel(item.unique_id,item.t_bill_id);
    recoveryViewemodel(item.unique_id,item.t_bill_id);
    // calculateAndBindTotal();
    totrecovery = parseFloat(totrecovery) + parseFloat(item.Cur_M_Amt);

    $('#TotalproRecovery').val(totrecovery);

});

                $('#myModal').modal('hide');
                // Clear all input values within the modal
                $('#myModal :input').val('');



            },
            error: function (error) {
                // Handle error response from the server
                console.error('Error saving data:', error);
            }
        });
    }
</script>



<script>
    function openviewModel(uniqueId, tbillid) 
    {
        console.log('Unique ID:', uniqueId);
        console.log('Tbill ID:', tbillid);
        $.ajax({
                url: '/EditRecovery/' + uniqueId + '/' + tbillid,  // Update the URL to include tbillid
                type: 'GET',
                dataType: 'json',  // Expect JSON data
                success: function(response) {
                    var recovery=response.getdataRecovery[0];
                    console.log(recovery);
                    // Populate the modal fields with the fetched data
                    $('#unique_id' + recovery.unique_id).val(recovery.unique_id);
                    $('#workid'+ recovery.unique_id).val(recovery.work_Id)

                    $('#ViewMaterial' + recovery.unique_id).val(recovery.Material);                    
                    $('#ViewAsperQty'+ recovery.unique_id).val(recovery.Mat_Qty);
                    $('#ViewAsperRt'+ recovery.unique_id).val(recovery.Mat_Rt);
                    $('#ViewAsperAmt'+ recovery.unique_id).val(recovery.Mat_Amt);

                    $('#View_uptodateQty'+ recovery.unique_id).val(recovery.UptoDt_m_Qty);
                    $('#view_UptodateAmt'+ recovery.unique_id).val(recovery.UptoDt_m_Amt);

                    $('#View_allreadyQty'+ recovery.unique_id).val(recovery.pre_m_Qty);
                    $('#view_allreadyAmt'+ recovery.unique_id).val(recovery.pre_M_Amt);

                    $('#view_PropoQty'+ recovery.unique_id).val(recovery.Cur_M_Qty);
                    $('#view_PropoAmt'+ recovery.unique_id).val(recovery.Cur_M_Amt);

                    $('#view_balQty'+ recovery.unique_id).val(recovery.Bal_M_Qty);
                    $('#View_balAmt'+ recovery.unique_id).val(recovery.Bal_M_Amt);

                    $('#View_Remark'+ recovery.unique_id).val(recovery.Remark);



                    $('input[name="tbillid"]'+ recovery.unique_id).val(recovery.t_bill_id);
                    $('input[name="tbiiiid"]'+ recovery.unique_id).val(recovery.unique_id);

                    // Show the modal
                    $('#ViewModal' +uniqueId).modal('show');
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
    }
</script>

<!--<script>-->
<!--    document.addEventListener("DOMContentLoaded", function() {-->
<!--function calculateAndBindTotal() {-->
<!--    var amountCells = document.getElementsByClassName('proposed-recovered-now-amount');-->
<!--    var totalAmount = parseFloat(document.getElementById('TotalproRecovery').value) || 0;-->

<!--    for (var i = 0; i < amountCells.length; i++) {-->
<!--        var amount = parseFloat(amountCells[i].innerText);-->
<!--        totalAmount += isNaN(amount) ? 0 : amount;-->
<!--    }-->

    <!--// Log totalAmount to console-->
<!--    console.log('Total Amount:', totalAmount);-->

    <!--// Update the TotalproRecovery input field-->
<!--    var TotproRec = document.getElementById('TotalproRecovery');-->
<!--    if (TotproRec) {-->
<!--        TotproRec.value = totalAmount.toFixed(2);-->
<!--    }-->
<!--}-->
<!--calculateAndBindTotal();-->
<!--});-->
<!--</script>-->

@endsection()



