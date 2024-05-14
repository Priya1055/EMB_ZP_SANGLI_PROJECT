@extends("layouts.header")
@section('content')
<style>
/* Hide the first row on devices other than mobile */
@media (min-width: 768px) {
    .mobile-first {
        display: none;
    }
}

/* Hide the second row on mobile devices */
@media (max-width: 767px) {
    .non-mobile-second {
        display: none;
    }

    .mobile-separate td {
        display: block;
    }

    .mobile-separate .card {
        margin-bottom: 10px; /* Adjust margin as needed */
    }

    .mobile-separate .card-body p {
        margin-bottom: 5px; /* Adjust margin as needed */
    }
}
</style>
<ul class="breadcrumb">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="{{ url('/listworkmasters')}}">Workmaster</a></li>
            <li><a href="{{ url('billlist', $workid ?? '') }}">Bill</a></li>

        </ul>
          <div class="avatar"> 
<a href="{{ url('billlist', $workid ?? '') }}"  style="margin-bottom:10px;">
            <i class="fa-solid fa-circle-arrow-left ml-3 mb-1" style="color: black; font-size: 35px;"></i>
  </a>
          <span class="tip" style="font-size:15px;">BACK</span></div>

  
  

  

  
        <form  action="{{ url('SaveChklstPO') }}" method="post">
@csrf
    <input type="hidden" name="tbill_id" value="{{$t_bill_Id}}">
    <input type="hidden" name="Work_Id" value="{{$workid}}">


<div class="container-fluid">
      <div class="card" id="backbglogo">
                <div class="card-header">
                    <h3>CHECKLIST OF PROJECT OFFICER</h3>
                </div>

  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead class="table-success">
      <tr class="mobile-first">

<th colspan="3">
            <div class="card">
                <div class="card-body">
                    <p>- SR.NO</p>
                    <p>- Name</p>
                    <p>- Description</p>
                </div>
            </div>
 </th>
       
</tr>

<!-- Responsive for the other then mobile -->

<tr class="non-mobile-second">
        <th>SR.NO</th>
        <th>Name</th>
        <th >Description</th>
</tr>
      </thead>
      <tbody>
       <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 1</p>
                                        <p><b>- Name of Work</b></p>
                                        <p>- {{$workNM}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                        <td style="text-align: right;">1</td>
                    <td>Name of Work</td>
                    <input type="hidden" name="work_nm" value="{{ $workNM }}">
                    <td >{{$workNM}}</td>
                    </tr>




                    <!-- Responsive for the mobile -->
                            <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 2</p>
                                <p><b>- Whether Check List filled by Sub Division is proper ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="SD_chklst1" value="Yes" {{ $SD_chklst === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile2()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="SD_chklst1" value="No" {{ $SD_chklst === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile2()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="SD_chklst1" value="Not Required" {{ $SD_chklst === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile2()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="SD_chklst1" value="Not Applicable" {{ $SD_chklst === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile2()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                    <td style="text-align: right;">2</td>
                    <td>Whether Check List filled by Sub Division is proper ?</td>
                        <input type="hidden" name="" value="{{$SD_chklst}}">
                    <td>     
                        
                        <label class="btn btn-outline-primary">
                        <input type="radio" name="SD_chklst" value="Yes" checked {{ $SD_chklst === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile2()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="SD_chklst" value="No"  {{ $SD_chklst === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile2()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="SD_chklst" value="Not Required"  {{ $SD_chklst === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile2()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="SD_chklst" value="Not Applicable" {{ $SD_chklst === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile2()"> Not Applicable
                        </label>
                    </td>
        </tr>




           <!-- Responsive for the mobile -->
           <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 3</p>
                                <p><b>- Whether all Q.C. Tests required for the work have been coducted ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_T_Done1" value="Yes" {{ $QC_T_Done === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile3()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_T_Done1" value="No" {{ $QC_T_Done === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile3()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_T_Done1" value="Not Required" {{ $QC_T_Done === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile3()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_T_Done1" value="Not Applicable" {{ $QC_T_Done === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile3()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                <td style="text-align: right;">3</td>
                <td>Whether all Q.C. Tests required for the work have been coducted ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_T_Done" value="Yes"  checked {{ $QC_T_Done === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile3()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_T_Done" value="No" {{ $QC_T_Done === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile3()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_T_Done" value="Not Required" {{ $QC_T_Done === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile3()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_T_Done" value="Not Applicable"  {{ $QC_T_Done === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile3()"> Not Applicable
                        </label>
                </td>
        </tr>


         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 4</p>
                                <p><b>- Whether the number of tests are correct as per standards ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_T_No1" value="Yes" {{ $QC_T_No === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile4()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_T_No1" value="No" {{ $QC_T_No === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile4()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_T_No1" value="Not Required" {{ $QC_T_No === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile4()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_T_No1" value="Not Applicable" {{ $QC_T_No === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile4()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                <td style="text-align: right;">4</td>
                <td>Whether the number of tests are correct as per standards ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_T_No" value="Yes"   {{ $QC_T_No === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile4()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_T_No" value="No" {{ $QC_T_No === 'No' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile4()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_T_No" value="Not Required" {{ $QC_T_No === 'Not Required' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile4()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_T_No" value="Not Applicable" {{ $QC_T_No === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile4()"> Not Applicable
                        </label>
                </td>
        </tr>



         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 5</p>
                                <p><b>- Whether Q.C. Test results are satisfactory ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_Result1" value="Yes" {{ $QC_Result === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile5()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_Result1" value="No" {{ $QC_Result === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile5()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_Result1" value="Not Required" {{ $QC_Result === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile5()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="QC_Result1" value="Not Applicable" {{ $QC_Result === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile5()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                <td style="text-align: right;">5</td>
                <td>Whether Q.C. Test results are satisfactory ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_Result" value="Yes"   {{ $QC_Result === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile5()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_Result" value="No" {{ $QC_Result === 'No' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile5()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_Result" value="Not Required" {{ $QC_Result === 'Not Required' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile5()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="QC_Result" value="Not Applicable" {{ $QC_Result === 'Not Applicable' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile5()"> Not Applicable
                        </label>
                </td>
        </tr>



       <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 6</p>
                                <p><b>- SQM Checking / Third Party Audit carried out For this Work?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="SQM_Chk1" value="Yes" {{ $SQM_Chk === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile6()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="SQM_Chk1" value="No" {{ $SQM_Chk === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile6()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="SQM_Chk1" value="Not Required" {{ $SQM_Chk === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile6()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="SQM_Chk1" value="Not Applicable" {{ $SQM_Chk === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile6()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                <td style="text-align: right;">6</td>
                <td>SQM Checking / Third Party Audit carried out For this Work?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="SQM_Chk" value="Yes" {{ $SQM_Chk === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile6()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="SQM_Chk" value="No"{{ $SQM_Chk === 'No' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile6()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="SQM_Chk" value="Not Required" {{ $SQM_Chk === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile6()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="SQM_Chk" value="Not Applicable"   {{ $SQM_Chk === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile6()"> Not Applicable
                        </label>
                </td>
        </tr>




              <!-- Responsive for the mobile -->
              <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 7</p>
                                <p><b>- Whether Part Rate / Reduced Rate are correct & technically proper ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Part_Red_Rt_Proper1" value="Yes" {{ $Part_Red_Rt_Proper === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile7()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Part_Red_Rt_Proper1" value="No" {{ $Part_Red_Rt_Proper === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile7()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Part_Red_Rt_Proper1" value="Not Required" {{ $Part_Red_Rt_Proper === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile7()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Part_Red_Rt_Proper1" value="Not Applicable" {{ $Part_Red_Rt_Proper === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile7()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">

                <td style="text-align: right;">7</td>
                <td>Whether Part Rate / Reduced Rate are correct & technically proper ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Part_Red_Rt_Proper" value="Yes" {{ $Part_Red_Rt_Proper === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile7()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Part_Red_Rt_Proper" value="No"{{ $Part_Red_Rt_Proper === 'No' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile7()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Part_Red_Rt_Proper" value="Not Required" {{ $Part_Red_Rt_Proper === 'Not Required' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile7()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Part_Red_Rt_Proper" value="Not Applicable"   {{ $Part_Red_Rt_Proper === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile7()"> Not Applicable
                        </label>
                </td>
        </tr>
       
              <!-- Responsive for the mobile -->
              <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 8</p>
                                <p><b>- Whether quantity of any item of work has been exceeded 125% of tender quantity ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Excess_qty_1251" value="Yes" {{ $Excess_qty_125 === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile8()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Excess_qty_1251" value="No" {{ $Excess_qty_125 === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile8()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Excess_qty_1251" value="Not Required" {{ $Excess_qty_125 === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile8()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Excess_qty_1251" value="Not Applicable" {{ $Excess_qty_125 === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile8()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                <td style="text-align: right;">8</td>
                <td>Whether quantity of any item of work has been exceeded 125% of tender quantity ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Excess_qty_125" value="Yes"{{ $Excess_qty_125 === 'Yes' ? 'checked' : '' }}   onclick="synchronizeNonMobileToMobile8()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Excess_qty_125" value="No"   {{ $Excess_qty_125 === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile8()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Excess_qty_125" value="Not Required" {{ $Excess_qty_125 === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile8()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Excess_qty_125" value="Not Applicable" {{ $Excess_qty_125 === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile8()"> Not Applicable
                        </label>
                </td>
        </tr>

         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 9</p>
                                <p><b>- If yes, proposal for effecting Clause-38 has been submitted by Sub Division with proper reasons.</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="CL_38_Prop1" value="Yes" {{ $CL_38_Prop === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile9()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="CL_38_Prop1" value="No" {{ $CL_38_Prop === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile9()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="CL_38_Prop1" value="Not Required" {{ $CL_38_Prop === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile9()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="CL_38_Prop1" value="Not Applicable" {{ $CL_38_Prop === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile9()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                <td style="text-align: right;">9</td>
                <td>If yes, proposal for effecting Clause-38 has been submitted by Sub Division with proper reasons.</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="CL_38_Prop" value="Yes" {{ $CL_38_Prop === 'Yes' ? 'checked' : '' }}   onclick="synchronizeNonMobileToMobile9()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="CL_38_Prop" value="No" {{ $CL_38_Prop === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile9()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="CL_38_Prop" value="Not Required" {{ $CL_38_Prop === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile9()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="CL_38_Prop" value="Not Applicable"  {{ $CL_38_Prop === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile9()"> Not Applicable
                        </label>
                </td>
        </tr>

         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 10</p>
                                <p><b>- Whether Board showing Name of Work, Name of Agency, DLP, etc. is fixed on site of work ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Board1" value="Yes" {{ $CFinalbillBoard === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile10()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Board1" value="No" {{ $CFinalbillBoard === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile10()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Board1" value="Not Required" {{ $CFinalbillBoard === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile10()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Board1" value="Not Applicable" {{ $CFinalbillBoard === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile10()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                <td style="text-align: right;">10</td>
                <td>Whether Board showing Name of Work, Name of Agency, DLP, etc. is fixed on site of work ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Board" value="Yes"  {{ $CFinalbillBoard === 'Yes' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile10()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Board" value="No" {{ $CFinalbillBoard === 'No' ? 'checked' : '' }}   onclick="synchronizeNonMobileToMobile10()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Board" value="Not Required" {{ $CFinalbillBoard === 'Not Required' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile10()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Board" value="Not Applicable" {{ $CFinalbillBoard === 'Not Applicable' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile10()"> Not Applicable
                        </label>
                </td>
        </tr>

        <tr>
        <input type="hidden" name="Rec_Drg" value="{{ $Rec_Drg}}"  > 

                <!-- <td>10</td>
                <td>Whether record drawing is attached ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Rec_Drg" value="Yes"   {{ $Rec_Drg === 'Yes' ? 'checked' : '' }} > Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Rec_Drg" value="No" {{ $Rec_Drg === 'No' ? 'checked' : '' }} > No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Rec_Drg" value="Not Required"  {{ $Rec_Drg === 'Not Required' ? 'checked' : '' }} > Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Rec_Drg" value="Not Applicable" {{ $Rec_Drg === 'Not Applicable' ? 'checked' : '' }}   > Not Applicable
                        </label>
                </td> -->
        </tr>



         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 11A</p>
                                        <p><b>- Uptodate Royalty Charges payable</b></p>
                                        <p><input type="text" class="form-control" id="Tot_Roy1" name="Tot_Roy1" value="{{$TotRoy}}" oninput="updateFields11a('mobile');"></p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                <td style="text-align: right;">11A</td>
                <td>Uptodate Royalty Charges payable</td>
                <td>

                <input type="text" class="form-control" id="Tot_Roy" name="Tot_Roy" value="{{$TotRoy}}" oninput="updateFields11a('desktop');">
                </td>
        </tr>

          <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 11B</p>
                                        <p><b>- Royalty Charges previously paid / recovered</b></p>
                                        <p><input type="text" class="form-control" id="Pre_Bill_Roy1" name="Pre_Bill_Roy1" value="{{$PreTotRoy}}" oninput="updateFields11b('mobile');"></p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


            <tr class="non-mobile-second">
                <td style="text-align: right;">11B</td>
                <td>Royalty Charges previously paid / recovered </td>
                <td>
                <input type="text" class="form-control" id="Pre_Bill_Roy" name="Pre_Bill_Roy" value="{{$PreTotRoy}}"  oninput="updateFields11b('desktop');"> 
                </td>
        </tr>

         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 11C</p>
                                        <p><b>- Royalty Charges paid by contractor for this bil</b></p>
                                        <p><input type="text" class="form-control" id="Cur_Bill_Roy_Paid1" name="Cur_Bill_Roy_Paid1" value="{{$Cur_Bill_Roy_Paid}}" oninput="updateFields11c('mobile');"></p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


            <tr class="non-mobile-second">
                <td style="text-align: right;">11C</td>
                <td>Royalty Charges paid by contractor for this bil</td>
                <td>
                <input type="text" class="form-control" id="Cur_Bill_Roy_Paid" value="{{$Cur_Bill_Roy_Paid}}" name="Cur_Bill_Roy_Paid" oninput="updateFields11c('desktop');"> 
                </td>
        </tr>

          <!-- Responsive for the mobile -->
          <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 11D</p>
                                        <p><b>- Royalty Charges proposed to be recovered from this bill</b></p>
                                        <p><input type="text" class="form-control" id="Roy_Rec1" name="Roy_Rec1" value="{{$Roy_Rec}}" oninput="updateFields11d('mobile');"></p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


            <tr class="non-mobile-second">
                <td style="text-align: right;">11D</td>
                <td>Royalty Charges proposed to be recovered from this bill</td>
                <td>
                <input type="text" class="form-control" id="Roy_Rec" name="Roy_Rec"  value="{{$Roy_Rec}}" oninput="updateFields11d('desktop');"> 
                </td>
        </tr>

         <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 12A</p>
                                        <p><b>- Tender cost of work</b></p>
                                        <p>- {{$Tnd_Amt}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                <td style="text-align: right;">12A</td>
                <td>Tender cost of work</td>
                <input type="hidden" name="Tnd_Amt" value="{{$Tnd_Amt}}"  > 
                <td> {{$Tnd_Amt}}
                </td>
        </tr>

         <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 12B</p>
                                        <p><b>- Uptodate Bill Amount of work</b></p>
                                        <p>- {{$netAmt}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                <td style="text-align: right;">12B</td>
                <td>Uptodate Bill Amount of work</td>
                <input type="hidden" name="Net_Amt" value="{{$netAmt}}"  > 

                <td>{{$netAmt}}
                </td>
        </tr>

         <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 12C</p>
                                        <p><b>- Current Bill Amount</b></p>
                                        <p>- {{$c_netamt}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                <td style="text-align: right;">12C</td>
                <td>Current Bill Amount</td>
                <input type="hidden" name="C_NetAmt" value="{{$c_netamt}}"  > 

                <td>{{$c_netamt}}
                </td>
        </tr>

        <!-- Responsive for the mobile -->
        <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 13</p>
                                        <p><b>- Actual Date of Completion</b></p>
                                        <p>- {{ date('d/m/Y', strtotime($Act_Comp_Dt)) }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                <td style="text-align: right;">13</td>
                <td>Actual Date of Completion </td>
                <input type="hidden" name="Act_Comp_Dt" value="{{$Act_Comp_Dt}}"  > 
                <td>{{ date('d/m/Y', strtotime($Act_Comp_Dt)) }}</td>
                </td>
        </tr>

        <!-- Responsive for the mobile -->
        <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 14</p>
                                        <p><b>- M.B. No & Date of Recording </b></p>
                                        <p>- {{$MB_NO}}   &nbsp; &nbsp;  Date:  {{ $DBMB_Dt ? date('d/m/Y', strtotime($DBMB_Dt)) : '' }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                <td style="text-align: right;">14</td>
                <td>M.B. No & Date of Recording </td>
                <input type="hidden" name="MB_NO" value="{{$MB_NO}}"  >
                <input type="hidden" name="MB_DT" value="{{$DBMB_Dt}}"  > 
                <td> {{$MB_NO}}   &nbsp; &nbsp;  Date:  {{ $DBMB_Dt ? date('d/m/Y', strtotime($DBMB_Dt)) : '' }}
                </td>
        </tr>

        <tr>
        <input type="hidden" name="Mess_ModeMat_Cons" value="{{$Mess_Mode}}"   > 

                <!-- <td>15</td>
                <td>Whether Mode of Measurement are correct ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Mess_ModeMat_Cons" value="Yes"   {{ $Mess_Mode === 'Yes' ? 'checked' : '' }}> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Mess_ModeMat_Cons" value="No" {{ $Mess_Mode === 'No' ? 'checked' : '' }} > No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Mess_ModeMat_Cons" value="Not Required" {{ $Mess_Mode === 'Not Required' ? 'checked' : '' }} > Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Mess_ModeMat_Cons" value="Not Applicable" {{ $Mess_Mode === 'Not Applicable' ? 'checked' : '' }}  > Not Applicable
                        </label>
                </td> -->
        </tr>

        <tr>
        <input type="hidden" name="Mat_Cons" value="{{ $Mat_cons}}"> 

                <!-- <td>16</td>
                <td>Whether consumptions of material are correct ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Mat_Cons" value="Yes" {{ $Mat_cons === 'Yes' ? 'checked' : '' }} > Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Mat_Cons" value="No"  {{ $Mat_cons === 'No' ? 'checked' : '' }} > No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Mat_Cons" value="Not Required" {{ $Mat_cons === 'Not Required' ? 'checked' : '' }} > Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Mat_Cons" value="Not Applicable" {{ $Mat_cons === 'Not Applicable' ? 'checked' : '' }} > Not Applicable
                        </label>
                </td> -->
        </tr>

       <!-- Responsive for the mobile -->
       <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 15</p>
                                <p><b>- Work Completion Certificate (Form-65) attached ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Form_651" value="Yes" {{ $CFinalbillForm65 === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile15()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Form_651" value="No" {{ $CFinalbillForm65 === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile15()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Form_651" value="Not Required" {{ $CFinalbillForm65 === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile15()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Form_651" value="Not Applicable" {{ $CFinalbillForm65 === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile15()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                <td style="text-align: right;">15</td>
                <td>Work Completion Certificate (Form-65) attached ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Form_65" value="Yes" {{ $CFinalbillForm65 === 'Yes' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile15()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Form_65" value="No" {{ $CFinalbillForm65 === 'No' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile15()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Form_65" value="Not Required" {{ $CFinalbillForm65 === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile15()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Form_65" value="Not Applicable"  {{ $CFinalbillForm65 === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile15()"> Not Applicable
                        </label>
                </td>
        </tr>

              <!-- Responsive for the mobile -->
              <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 16</p>
                                <p><b>- Letter / Certificate regarding handover of work attached ?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Handover1" value="Yes" {{ $CFinalbillhandover === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile16()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Handover1" value="No" {{ $CFinalbillhandover === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile16()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Handover1" value="Not Required" {{ $CFinalbillhandover === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile16()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Handover1" value="Not Applicable" {{ $CFinalbillhandover === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile16()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">

                <td style="text-align: right;">16</td>
                <td>Letter / Certificate regarding handover of work attached ?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Handover" value="Yes" {{ $CFinalbillhandover === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile16()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Handover" value="No" {{ $CFinalbillhandover === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile16()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Handover" value="Not Required" {{ $CFinalbillhandover === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile16()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Handover" value="Not Applicable" {{ $CFinalbillhandover === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile16()"> Not Applicable
                        </label>
                </td>
        </tr>



       
              <!-- Responsive for the mobile -->
              <tr class="mobile-first">
                    <td colspan="3">
                        <div class="card">
                            <div class="card-body">
                              
                                <p>- 17</p>
                                <p><b>- Reduced Estimate Prepaired And Submitted For this Work?</b></p> 
                                    <!-- Place where content will be copied -->
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Red_Est1" value="Yes" {{ $Red_Est === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile17()"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Red_Est1" value="No" {{ $Red_Est === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile17()"> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Red_Est1" value="Not Required" {{ $Red_Est === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile17()"> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                    <input type="radio" name="Red_Est1" value="Not Applicable" {{ $Red_Est === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile17()"> Not Applicable          
                                    </label>
                                </div>
                        </div>
                    </td>
                </tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                <td style="text-align: right;">17</td>
                <td>Reduced Estimate Prepaired And Submitted For this Work?</td>
                <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Red_Est" value="Yes" {{ $Red_Est === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile17()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Red_Est" value="No" {{ $Red_Est === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile17()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Red_Est" value="Not Required" {{ $Red_Est === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile17()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="Red_Est" value="Not Applicable" {{ $Red_Est === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile17()"> Not Applicable
                        </label>
                </td>
        </tr>


        
        
 <!-- <tr>
    <td colspan="2">
        <label style="font-weight: bold;">Project officer Checked</label>
        @if($PO_Chk === 1)
            <input  class="checkbox col-md-1" type="checkbox" name="POcheckbox" required checked value="{{$PO_Chk}}">
            @else
            <input  class="checkbox col-md-1" type="checkbox" name="POcheckbox" required value="{{$PO_Chk}}" >
            @endif
    </td>
    <td>
    <div class="row">
        <div class="col-md-7">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-5">
            <input  class="form-control" style="margin-left: -100px;" type="date" name="POdate" 
        required value="{{$PO_Chk_Dt}}" min="{{$lstDYEcheckdate}}" max="{{$stupulatedDate}}">
        </div>
    </div>
</td>
</tr> -->



@if(auth()->user()->usertypes === "PA") 
        <tr>
    <td colspan="2">
        <label style="font-weight: bold;">Deputy Engineer Checked</label>
        @if($SODYEchk===1)
                <input id="DYEcheckbox" class="checkbox col-md-1" type="checkbox" name="SODYEcheckbox" required checked>
                @else
                <input id="DYEcheckbox" class="checkbox col-md-1" type="checkbox" name="SODYEcheckbox" required>
                @endif
    </td>
    <td colspan="3">
    <div class="row">
        <div class="col-md-7">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-5">
            <input style="margin-left: -100px;"  id="DYEdate" class="form-control" type="date" name="SODYEdate"
                 value="{{$SODYEchk_Dt}}" required min="{{$Je_chk_Dt}}" max="{{$stupulatedDate}}">
        </div>
    </div>
    </td>
</tr>

        @endif



        </tbody>
    </table>
  </div>
</div>




<div class="row justify-content-center">
    <div class="col-md-3 col-xl-2">
    @if($DBchklst_POExist !== null)
    <button type="submit" name="action" value="update" class="btn btn-primary mt-5" style="" >Update</button>
    @else
    <button type="submit" name="action" value="save" class="btn btn-primary mt-5" style="" >Submit</button>
@endif
    </div>
</div>



</form>

<br><br><br>
        @endsection()


        <script>
            document.addEventListener("DOMContentLoaded", function() 
            {
        // Call updateField11D function on page load
        updateField11D();
            });
    function updateField11D() {
        var Tot_Roy = parseFloat(document.getElementById('Tot_Roy').value) || 0.00;
        var Pre_Bill_Roy = parseFloat(document.getElementById('Pre_Bill_Roy').value) || 0.00;
        var Cur_Bill_Roy_Paid = parseFloat(document.getElementById('Cur_Bill_Roy_Paid').value) || 0.00;
        var Roy_Rec = Tot_Roy - Pre_Bill_Roy - Cur_Bill_Roy_Paid;
        console.log(Roy_Rec.toFixed(2));
        // Ensure Roy_Rec is never less than 0
        Roy_Rec = Math.max(Roy_Rec, 0);

        document.getElementById('Roy_Rec').value = Roy_Rec.toFixed(2);
        document.getElementById('Roy_Rec1').value = Roy_Rec.toFixed(2);
    }
</script>

<script>

//Input row 2 
    function synchronizeMobileToNonMobile2()
    {
        var selectvalue= $('input[name="SD_chklst1"]:checked').val();
        $('input[name="SD_chklst"][value="'+ selectvalue +'"]').prop('checked' , true);
    }
    function synchronizeNonMobileToMobile2()
    {
        var selectvalue=$('input[name="SD_chklst"]:checked').val();
        $('input[name="SD_chklst1"][value="' + selectvalue + '"]').prop('checked' , true);
    }


//Input row 3

function synchronizeMobileToNonMobile3()
{
    var selectvalue=$('input[name="QC_T_Done1"]:checked').val();
    $('input[name="QC_T_Done"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile3()
{
    var selectvalue=$('input[name="QC_T_Done"]:checked').val();
    $('input[name="QC_T_Done1"][value="' +selectvalue+ '"]').prop('checked' , true);
}
    




//Input row 4

function synchronizeMobileToNonMobile4()
{
    var selectvalue=$('input[name="QC_T_No1"]:checked').val();
    $('input[name="QC_T_No"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile4()
{
    var selectvalue=$('input[name="QC_T_No"]:checked').val();
    $('input[name="QC_T_No1"][value="' +selectvalue+ '"]').prop('checked' , true);
}



//Input row 5

function synchronizeMobileToNonMobile5()
{
    var selectvalue=$('input[name="QC_Result1"]:checked').val();
    $('input[name="QC_Result"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile5()
{
    var selectvalue=$('input[name="QC_Result"]:checked').val();
    $('input[name="QC_Result1"][value="' +selectvalue+ '"]').prop('checked' , true);
}



//Input row 6

function synchronizeMobileToNonMobile6()
{
    var selectvalue=$('input[name="SQM_Chk1"]:checked').val();
    $('input[name="SQM_Chk"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile6()
{
    var selectvalue=$('input[name="SQM_Chk"]:checked').val();
    $('input[name="SQM_Chk1"][value="' +selectvalue+ '"]').prop('checked' , true);
}


//Input row 7

function synchronizeMobileToNonMobile7()
{
    var selectvalue=$('input[name="Part_Red_Rt_Proper1"]:checked').val();
    $('input[name="Part_Red_Rt_Proper"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile7()
{
    var selectvalue=$('input[name="Part_Red_Rt_Proper"]:checked').val();
    $('input[name="Part_Red_Rt_Proper1"][value="' +selectvalue+ '"]').prop('checked' , true);
}




//Input row 8

function synchronizeMobileToNonMobile8()
{
    var selectvalue=$('input[name="Excess_qty_1251"]:checked').val();
    $('input[name="Excess_qty_125"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile8()
{
    var selectvalue=$('input[name="Excess_qty_125"]:checked').val();
    $('input[name="Excess_qty_1251"][value="' +selectvalue+ '"]').prop('checked' , true);
}


//Input row 9

function synchronizeMobileToNonMobile9()
{
    var selectvalue=$('input[name="CL_38_Prop1"]:checked').val();
    $('input[name="CL_38_Prop"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile9()
{
    var selectvalue=$('input[name="CL_38_Prop"]:checked').val();
    $('input[name="CL_38_Prop1"][value="' +selectvalue+ '"]').prop('checked' , true);
}


//Input row 10

function synchronizeMobileToNonMobile10()
{
    var selectvalue=$('input[name="Board1"]:checked').val();
    $('input[name="Board"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile10()
{
    var selectvalue=$('input[name="Board"]:checked').val();
    $('input[name="Board1"][value="' +selectvalue+ '"]').prop('checked' , true);
}


//Input row 11A

// Function to update fields based on device type
function updateFields11a(deviceType) {
    var value;
    if (deviceType === 'mobile') {
        value = $('#Tot_Roy1').val();
        $('#Tot_Roy').val(value);
    } else {
        value = $('#Tot_Roy').val();
        $('#Tot_Roy1').val(value);
    }

    updateField11D();
}



//Input row 11B

// Function to update fields based on device type
function updateFields11b(deviceType) {
    var value;
    if (deviceType === 'mobile') {
        value = $('#Pre_Bill_Roy1').val();
        $('#Pre_Bill_Roy').val(value);
    } else {
        value = $('#Pre_Bill_Roy').val();
        $('#Pre_Bill_Roy1').val(value);
    }

    updateField11D();
}



//Input row 11C

// Function to update fields based on device type
function updateFields11c(deviceType) {
    var value;
    if (deviceType === 'mobile') {
        value = $('#Cur_Bill_Roy_Paid1').val();
        $('#Cur_Bill_Roy_Paid').val(value);
    } else {
        value = $('#Cur_Bill_Roy_Paid').val();
        $('#Cur_Bill_Roy_Paid1').val(value);
    }

    updateField11D();
}



//Input row 11D

// Function to update fields based on device type
function updateFields11d(deviceType) {
    var value;
    if (deviceType === 'mobile') {
        value = $('#Roy_Rec1').val();
        $('#Roy_Rec').val(value);
    } else {
        value = $('#Roy_Rec').val();
        $('#Roy_Rec1').val(value);
    }
    updateField11D();

}



//Input row 15

function synchronizeMobileToNonMobile15()
{
    var selectvalue=$('input[name="Form_651"]:checked').val();
    $('input[name="Form_65"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile15()
{
    var selectvalue=$('input[name="Form_65"]:checked').val();
    $('input[name="Form_651"][value="' +selectvalue+ '"]').prop('checked' , true);
}



//Input row 16

function synchronizeMobileToNonMobile16()
{
    var selectvalue=$('input[name="Handover1"]:checked').val();
    $('input[name="Handover"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile16()
{
    var selectvalue=$('input[name="Handover"]:checked').val();
    $('input[name="Handover1"][value="' +selectvalue+ '"]').prop('checked' , true);
}



//Input row 17

function synchronizeMobileToNonMobile17()
{
    var selectvalue=$('input[name="Red_Est1"]:checked').val();
    $('input[name="Red_Est"][value="' +selectvalue+ '"]').prop('checked' , true);
}

function synchronizeNonMobileToMobile17()
{
    var selectvalue=$('input[name="Red_Est"]:checked').val();
    $('input[name="Red_Est1"][value="' +selectvalue+ '"]').prop('checked' , true);
}

</script>