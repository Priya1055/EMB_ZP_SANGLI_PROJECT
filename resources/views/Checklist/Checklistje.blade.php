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
            <li><a href="javascript:void(0)">Check List SO</a></li>
            <!-- <li><a href="">Check List SO</a></li> -->

        </ul>
<a href="{{ url('billlist', $workid ?? '') }}" id="backButton" style="margin-bottom:10px;">
        <i class="fa fa-chevron-left" aria-hidden="true"> </i>   <b>Back</b>
  </a>


<div class="container-fluid">
<div class="card" id="backbglogo"  >
    <div class="card-header">
        <h5 class="card-title" style="text-align:center;">CHECKLIST FOR SECTIONAL ENGINEER</h5>
    </div>
<form  action="{{ url('SaveChklstJe') }}" method="post">
@csrf
    <input type="hidden" name="tbill_id" value="{{$CTbillid}}">
    <input type="hidden" name="T_billno" value="{{$CTbillno}}">               
    <input type="hidden" name="JEId" value="{{ $DBjeId }}">
    <input type="hidden" name="CFinalbill" value="{{ $CFinalbill }}">
    <input type="hidden" name="mesurmentDT" value="{{ $DBMESUrementDate }}">



    
<div class="card-body" style="padding: 0;">
    <div class="container-fluid" style="margin: 0; padding: 0;">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-success">

         <!-- Responsive for the mobile -->

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
                                        <p><b>- Agency / Contractor</b></p>
                                        <p>- {{$DBAgencyName}}   {{$DBagency_pl}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

         <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                        <td style="text-align: right;">2</td>
                    <td>Agency / Contractor</td>
                    <input type="hidden" name="AgencyId" value="{{ $DBAgencyId }}">
                    <input type="hidden" name="AgencyNM" value="{{ $DBAgencyName }}">
                    <input type="hidden" name="Agency_PL" value="{{ $DBagency_pl }}">
                    <td>{{$DBAgencyName}}   {{$DBagency_pl}}</td>
                    </tr>


            <!-- Responsive for the mobile -->
            <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 3</p>
                                        <p><b>- Name of Officer recording measurements </b></p>
                                        <p>- {{$DBJeName}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                        <td style="text-align: right;">3</td>
                        <td>Name of Officer recording measurements </td>
                        <input type="hidden" name="JeName" value="{{$DBJeName}}">
                        <td name="JeName">{{$DBJeName}}</td>
                    </tr>


        <!-- Responsive for the mobile -->
            <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 4</p>
                                        <p><b>- Bill No </b></p>
                                        <p>- {{$concateresult}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
                    <tr class="non-mobile-second">
                    <td style="text-align: right;">4</td>
                    <td>Bill No</td>
                    <input type="hidden" name="concateresultbillno" value="{{$concateresult}}">
                    <td >{{$concateresult}}</td>
                    </tr>

            <!-- Responsive for the mobile -->
            <tr class="mobile-first">
                                    <td colspan="3">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>- 5</p>
                                                <p><b>- Agreement No & Date </b></p>
                                                <p>- {{$DBAgreeNO}} &nbsp;&nbsp; {{$DBAgreeDT ? ' Date: ' . date('d/m/Y', strtotime($DBAgreeDT)) : ''}}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                <!-- Responsive for the other then mobile -->

                    <tr class="non-mobile-second">
                        <td style="text-align: right;">5</td>

                    <td>Agreement No & Date</td>
                    <input type="hidden" name="AgreeNO" value="{{$DBAgreeNO}}">       
                        <input type="hidden" name="AgreeDT" value="{{$DBAgreeDT}}">       
                    <!--<td > {{$DBAgreeNO}}  {{ $DBAgreeDT ? date('d/m/Y', strtotime($DBAgreeDT)) : '' }}</td>-->
                    <td > {{$DBAgreeNO}} &nbsp;&nbsp; {{$DBAgreeDT ? ' Date: ' . date('d/m/Y', strtotime($DBAgreeDT)) : ''}}</td>

                    </tr>


        <!-- Responsive for the mobile -->
              <tr class="mobile-first">
                                    <td colspan="3">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>- 6</p>
                                                <p><b>- Quoted Above / Below percent </b></p>
                                                <p>- {{$A_B_Pc}}%  {{$Above_Below}}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                <!-- Responsive for the other then mobile -->
     

                    <tr class="non-mobile-second">
                        <td style="text-align: right;">6</td>

                        <td>Quoted Above / Below percent</td>
                        <input type="hidden" name="A_B_Pc" value="{{$A_B_Pc}}">       
                        <input type="hidden" name="Above_Below" value="{{$Above_Below}}">       
                        <td name="Above_Below">{{$A_B_Pc}}%  {{$Above_Below}}</td>
                    </tr>


                <!-- Responsive for the mobile -->
                <tr class="mobile-first">
                                    <td colspan="3">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>- 7</p>
                                                <p><b>- Stipulated Date of Completion </b></p>
                                                <p>- {{ $Stip_Comp_Dt ? date('d/m/Y', strtotime($Stip_Comp_Dt)) : '' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                <!-- Responsive for the other then mobile -->


                    <tr class="non-mobile-second">
                        <td style="text-align: right;">7</td>

                        <td>Stipulated Date of Completion</td>
                        <input type="hidden" name="Stip_Comp_Dt" value="{{$Stip_Comp_Dt}}">       
                        <td>{{ $Stip_Comp_Dt ? date('d/m/Y', strtotime($Stip_Comp_Dt)) : '' }}</td>
                    </tr>


                    

                <!-- Responsive for the mobile -->
                <tr class="mobile-first">
                                    <td colspan="3">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>- 8</p>
                                                <p><b>- Actual Date of Completion </b></p>
                                                <p>- {{ $Act_Comp_Dt ? date('d/m/Y', strtotime($Act_Comp_Dt)) : '' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                <!-- Responsive for the other then mobile -->

                    <tr class="non-mobile-second">
                        <td style="text-align: right;">8</td>

                    <td> Actual Date of Completion</td>
                    <input type="hidden" name="Act_Comp_Dt" value="{{$Act_Comp_Dt}}">       

                    <td>{{ $Act_Comp_Dt ? date('d/m/Y', strtotime($Act_Comp_Dt)) : '' }}</td>
                    </tr>


             <!-- Responsive for the mobile -->
             <tr class="mobile-first">
                                    <td colspan="3">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>- 9</p>
                                                <p><b>- M.B. No & Date of Recording</b></p>
                                                <p>- {{$workid}} &nbsp; &nbsp; Date:{{ $DBMESUrementDate ? date('d/m/Y', strtotime($DBMESUrementDate)) : ''}}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                <!-- Responsive for the other then mobile -->       

                    <tr class="non-mobile-second">
                        <td style="text-align: right;">9</td>

                    <td>M.B. No & Date of Recording</td>
                    <input type="hidden" name="MBNO" value="{{$workid}}">       
                    <input type="hidden" name="MBDT" value="{{$DBMESUrementDate}}">   

                    <td name="MBNO">{{$workid}} &nbsp; &nbsp; Date:{{ $DBMESUrementDate ? date('d/m/Y', strtotime($DBMESUrementDate)) : ''}}</td>
                    </tr>

         
            <!-- Responsive for the mobile -->
            <tr class="mobile-first">
    <td colspan="3">
        <div class="card">
            <div class="card-body">
                <p></p>
                <p>- 10</p>
                <p><b>- Whether Contractor has signed in token of acceptance of measurements ?</b></p> 
                    <!-- Place where content will be copied -->
                    <label class="btn btn-outline-primary">
                    <input type="radio" name="radio_Contractorsigned1" value="Yes" {{ $Agency_MB_Accept === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile()"> Yes
                    </label>
                    <label class="btn btn-outline-primary">
                    <input type="radio" name="radio_Contractorsigned1" value="No" {{ $Agency_MB_Accept === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile()"> No
                    </label>
                    <label class="btn btn-outline-primary">
                    <input type="radio" name="radio_Contractorsigned1" value="Not Required" {{ $Agency_MB_Accept === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile()"> Not Required
                    </label>
                    <label class="btn btn-outline-primary">
                    <input type="radio" name="radio_Contractorsigned1" value="Not Applicable" {{ $Agency_MB_Accept === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile()"> Not Applicable          
                    </label>
                </div>
        </div>
    </td>
</tr>
                <!-- Responsive for the other then mobile -->               
                    <tr class="non-mobile-second">
                        <td style="text-align: right;">10</td>

                            <td>Whether Contractor has signed in token of acceptance of measurements ?</td>
                            <td>
                        <!-- Content will be copied here -->
                  
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_Contractorsigned" value="Yes" {{ $Agency_MB_Accept === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile()"> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_Contractorsigned" value="No" {{ $Agency_MB_Accept === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile()"> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_Contractorsigned" value="Not Required" {{ $Agency_MB_Accept === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile()"> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_Contractorsigned" value="Not Applicable" {{ $Agency_MB_Accept === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile()"> Not Applicable
                        </label>
                        </td>
                     
                    </tr>



               <!-- Responsive for the mobile -->
               <tr class="mobile-first">
                                    <td colspan="3">
                                        <div class="card">
                                            <div class="card-body">
                                    <p>- 11</p>
                                        <p><b>- Part Rate / Reduced Rate Analysis</b></p>
                                    <p>
                                                    <div>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_Analysis1" value="Yes" {{ $partrtAnalysis === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile11()"> Yes
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_Analysis1" value="No" {{ $partrtAnalysis === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile11()"> No
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_Analysis1" value="Not Required" {{ $partrtAnalysis === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile11()"> Not Required
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_Analysis1" value="Not Applicable" {{ $partrtAnalysis === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile11()"> Not Applicable
                            </label>
                        </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                <!-- Responsive for the other then mobile -->


                        <tr class="non-mobile-second">
                            <td style="text-align: right;">11</td>

                            <td>Part Rate / Reduced Rate Analysis</td>
                                <td>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_Analysis" value="Yes" {{ $partrtAnalysis === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile11()"> Yes
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_Analysis" value="No" {{ $partrtAnalysis === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile11()"> No
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_Analysis" value="Not Required" {{ $partrtAnalysis === 'Not Required' ? 'checked' : '' }}  onclick="synchronizeNonMobileToMobile11()"> Not Required
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_Analysis" value="Not Applicable" {{ $partrtAnalysis === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile11()"> Not Applicable
                            </label>
                            </td>  

                          


                            <!-- Responsive for the mobile -->
            <tr class="mobile-first">
    <td colspan="3">
        <div class="card">
            <div class="card-body">
              
                 <p>- 12</p>
                <p><b>- If Reduced Rate, permission of compitent authority is obtained ?</b></p> 
                         <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_authority1" value="Yes" {{ $Part_Red_per === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile12()"> Yes
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_authority1" value="No" {{ $Part_Red_per === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile12()"> No
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_authority1" value="Not Required" {{ $Part_Red_per === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile12()"> Not Required
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_authority1" value="Not Applicable" {{ $Part_Red_per === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile12()"> Not Applicable
                          </label>
            </div>
        </div>
    </td>
</tr>
                <!-- Responsive for the other then mobile -->   

                        </tr>
                    <tr class="non-mobile-second">
                        <td style="text-align: right;">12</td>

                        <td>If Reduced Rate, permission of compitent authority is obtained ?</td>
                        <td>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_authority" value="Yes" {{ $Part_Red_per === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile12()"> Yes
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_authority" value="No" {{ $Part_Red_per === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile12()"> No
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_authority" value="Not Required" {{ $Part_Red_per === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile12()"> Not Required
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="radio_authority" value="Not Applicable" {{ $Part_Red_per === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile12()"> Not Applicable
                            </label>
                            </td>

                    </tr>

                                <!-- <tr>
                                <td>13</td>

                            <td>Any excess quantity is occurred over the tender quantity ?</td>
                            <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="ExcessQty" value="Yes" {{ $Excess_Qty === 'Yes' ? 'checked' : '' }}> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="ExcessQty" value="No" {{ $Excess_Qty === 'No' ? 'checked' : '' }}> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="ExcessQty" value="Not Required" {{ $Excess_Qty === 'Not Required' ? 'checked' : '' }}> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="ExcessQty" value="Not Applicable" {{ $Excess_Qty === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
                        </label>
                    </td>

                            </tr> -->
                            <!-- <tr>
                            <td>14</td>

                            <td> If Yes, whether details of excess quantity with reason for excess is mentioned in Excess - Saving Statement ?</td>
                            <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_ExcessSaving" value="Yes" {{ $Ex_qty_det === 'Yes' ? 'checked' : '' }}> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_ExcessSaving" value="No" {{ $Ex_qty_det === 'No' ? 'checked' : '' }}> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_ExcessSaving" value="Not Required" {{ $Ex_qty_det === 'Not Required' ? 'checked' : '' }}> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_ExcessSaving" value="Not Applicable" {{ $Ex_qty_det === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
                        </label>
                    </td>

                            </tr> -->



            <!-- Responsive for the mobile -->
                                                    <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 13</p>
                                        <p><b>- Whether Results of Q.C. Tests are satisfactory ?</b></p> 
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C_Results1" value="Yes" {{ $Qc_Result === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile13()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C_Results1" value="No" {{ $Qc_Result === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile13()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C_Results1" value="Not Required" {{ $Qc_Result === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile13()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C_Results1" value="Not Applicable" {{ $Qc_Result === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile13()"> Not Applicable
                                </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <!-- Responsive for the other then mobile --> 




                        <tr class="non-mobile-second">
                            <td style="text-align: right;">13</td>

                            <td>Whether Results of Q.C. Tests are satisfactory ?</td>
                            <td>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C_Results" value="Yes" {{ $Qc_Result === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile13()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C_Results" value="No" {{ $Qc_Result === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile13()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C_Results" value="Not Required" {{ $Qc_Result === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile13()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C_Results" value="Not Applicable" {{ $Qc_Result === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile13()"> Not Applicable
                                </label>
                            </td>

                        </tr>



                         <!-- Responsive for the mobile -->
                         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 14</p>
                                        <p><b>- Is Material Consumption Statement attached ?</b></p> 
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Material1" value="Yes" {{ $materialconsu === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile14()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Material1" value="No" {{ $materialconsu === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile14()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Material1" value="Not Required" {{ $materialconsu === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile14()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Material1" value="Not Applicable" {{ $materialconsu === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile14()"> Not Applicable
                                </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <!-- Responsive for the other then mobile --> 



                        <tr class="non-mobile-second">
                            <td style="text-align: right;">14</td>
                            <td>Is Material Consumption Statement attached ?</td>
                            <td>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Material" value="Yes" {{ $materialconsu === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile14()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Material" value="No" {{ $materialconsu === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile14()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Material" value="Not Required" {{ $materialconsu === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile14()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Material" value="Not Applicable" {{ $materialconsu === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile14()"> Not Applicable
                                </label>
                            </td>  
                        </tr>




                        
                         <!-- Responsive for the mobile -->
                         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 15</p>
                                        <p><b>- Is Recovery Statement attached ?</b></p> 
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Recovery1" value="Yes" {{ $Recoverystatement === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile15()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Recovery1" value="No" {{ $Recoverystatement === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile15()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Recovery1" value="Not Required" {{ $Recoverystatement === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile15()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Recovery1" value="Not Applicable" {{ $Recoverystatement === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile15()"> Not Applicable
                                </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <!-- Responsive for the other then mobile --> 

                        <tr class="non-mobile-second">
                            <td style="text-align: right;">15</td>

                            <td>Is Recovery Statement attached ?</td>
                            <td>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Recovery" value="Yes" {{ $Recoverystatement === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile15()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Recovery" value="No" {{ $Recoverystatement === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile15()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Recovery" value="Not Required" {{ $Recoverystatement === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile15()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Recovery" value="Not Applicable" {{ $Recoverystatement === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile15()"> Not Applicable
                                </label>
                            </td>  

                        </tr>





                        <!-- Responsive for the mobile -->
                        <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 16</p>
                                        <p><b>- Is Excess Saving Statement attached ?</b></p> 
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Excess1" value="Yes" {{ $Excesstatement === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile16()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Excess1" value="No" {{ $Excesstatement === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile16()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Excess1" value="Not Required" {{ $Excesstatement === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile16()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Excess1" value="Not Applicable" {{ $Excesstatement === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile16()"> Not Applicable
                                </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <!-- Responsive for the other then mobile --> 

                        <tr class="non-mobile-second">
                            <td style="text-align: right;">16</td>

                            <td>Is Excess Saving Statement attached ?</td>
                            <td>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Excess" value="Yes" {{ $Excesstatement === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile16()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Excess" value="No" {{ $Excesstatement === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile16()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Excess" value="Not Required" {{ $Excesstatement === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile16()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Excess" value="Not Applicable" {{ $Excesstatement === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile16()"> Not Applicable
                                </label>
                            </td>  

                        </tr>



                          <!-- Responsive for the mobile -->
                          <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 17</p>
                                        <p><b>- Is Royalty Statement attached ?</b></p> 
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Royalty1" value="Yes" {{ $Royaltystatement === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile17()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Royalty1" value="No" {{ $Royaltystatement === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile17()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Royalty1" value="Not Required" {{ $Royaltystatement === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile17()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Royalty1" value="Not Applicable" {{ $Royaltystatement === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile17()"> Not Applicable
                                </label>
                                    </div>
                                </div>
                            </td>
                        </tr>


                <!-- Responsive for the other then mobile --> 
                        <tr class="non-mobile-second">
                                <td style="text-align: right;">17</td>
                            <td>Is Royalty Statement attached ?</td>
                            <td>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Royalty" value="Yes" {{ $Royaltystatement === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile17()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Royalty" value="No" {{ $Royaltystatement === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile17()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Royalty" value="Not Required" {{ $Royaltystatement === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile17()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Royalty" value="Not Applicable" {{ $Royaltystatement === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile17()"> Not Applicable
                                </label>
                            </td>  
                        </tr>



                         <!-- Responsive for the mobile -->
                         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 18</p>
                                        <p><b>- Necessary Photographs of work / site attached ?</b></p> 
                                        <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_photo1" value="Yes" {{ $Jephoto === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile18()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_photo1" value="No"  {{ $Jephoto === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile18()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_photo1" value="Not Required" {{ $Jephoto === 'Not Required'  ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile18()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_photo1" value="Not Applicable" {{ $Jephoto === 'Not Applicable'  ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile18()"> Not Applicable
                                </label><br>
                                <!-- <lable>Total Photo : {{$countphoto}} Total Documents : {{$countdoc}} Video : {{$countvideo}}</lable> -->
                                @if($countphoto > 0)
                                    <label>Total Photo : {{$countphoto}}</label>
                                @endif
                                @if($countdoc > 0)
                                    <label>Total Documents : {{$countdoc}}</label>
                                @endif
                                @if($countvideo > 0)
                                    <label>Video : {{$countvideo}}</label>
                                @endif

                                    </div>
                                </div>
                            </td>
                        </tr>


                <!-- Responsive for the other then mobile --> 

                        <tr class="non-mobile-second">
                            <td style="text-align: right;">18</td>

                            <td> Necessary Photographs of work / site attached ?</td>
                            <td>
                            <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_photo" value="Yes" {{ $Jephoto === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile18()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_photo" value="No"  {{ $Jephoto === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile18()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_photo" value="Not Required" {{ $Jephoto === 'Not Required'  ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile18()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_photo" value="Not Applicable" {{ $Jephoto === 'Not Applicable'  ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile18()"> Not Applicable
                                </label><br>
                                <!-- <lable>Total Photo : {{$countphoto}} Total Documents : {{$countdoc}} Video : {{$countvideo}}</lable> -->
                                @if($countphoto > 0)
                                    <label>Total Photo : {{$countphoto}}</label>
                                @endif
                                @if($countdoc > 0)
                                    <label>Total Documents : {{$countdoc}}</label>
                                @endif
                                @if($countvideo > 0)
                                    <label>Video : {{$countvideo}}</label>
                                @endif

                                        </td>  
                            

                        </tr>





                         <!-- Responsive for the mobile -->
                         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 19</p>
                                        <p><b>- Challen of Royalty paid by Contractor attached ?</b></p> 
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_RoyaltyChallen1" value="Yes" {{ $Roy_Challen === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile19()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_RoyaltyChallen1" value="No" {{ $Roy_Challen === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile19()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_RoyaltyChallen1" value="Not Required" {{ $Roy_Challen === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile19()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_RoyaltyChallen1" value="Not Applicable" {{ $Roy_Challen === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile19()"> Not Applicable
                                </label>

                                    </div>
                                </div>
                            </td>
                        </tr>


                <!-- Responsive for the other then mobile --> 

                        <tr class="non-mobile-second">
                            <td style="text-align: right;">19</td>

                            <td>Challen of Royalty paid by Contractor attached ?</td>
                            <td>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_RoyaltyChallen" value="Yes" {{ $Roy_Challen === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile19()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_RoyaltyChallen" value="No" {{ $Roy_Challen === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile19()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_RoyaltyChallen" value="Not Required" {{ $Roy_Challen === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile19()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_RoyaltyChallen" value="Not Applicable" {{ $Roy_Challen === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile19()"> Not Applicable
                                </label>
                            </td>


                        </tr>
                            <!-- <tr>
                            <td>22</td>
                            <td>Bitumen Challen / Invoice attached ?</td>
                            <td>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_Bitumen" value="Yes" {{ $Bitu_Challen === 'Yes' ? 'checked' : '' }}> Yes
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_Bitumen" value="No" {{ $Bitu_Challen === 'No' ? 'checked' : '' }}> No
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_Bitumen" value="Not Required" {{ $Bitu_Challen === 'Not Required' ? 'checked' : '' }}> Not Required
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="radio_Bitumen" value="Not Applicable" {{ $Bitu_Challen === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
                        </label>
                    </td>

                    </tr> -->






                    <!-- Responsive for the mobile -->
                    <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 20</p>
                                        <p><b>- Q.C. Test Reports attached ?</b></p> 
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C1" value="Yes" {{ $Qc_Reports === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile20()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C1" value="No" {{ $Qc_Reports === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile20()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C1" value="Not Required"  {{ $Qc_Reports === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile20()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C1" value="Not Applicable" {{ $Qc_Reports === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile20()"> Not Applicable
                                </label>

                                    </div>
                                </div>
                            </td>
                        </tr>


                <!-- Responsive for the other then mobile --> 
                        <tr class="non-mobile-second">
                            <td style="text-align: right;">20</td>
                            <td>Q.C. Test Reports attached ?</td>
                            <td>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C" value="Yes" {{ $Qc_Reports === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile20()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C" value="No" {{ $Qc_Reports === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile20()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C" value="Not Required"  {{ $Qc_Reports === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile20()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Q_C" value="Not Applicable" {{ $Qc_Reports === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile20()"> Not Applicable
                                </label>
                            </td>
                        </tr>




                           <!-- Responsive for the mobile -->
                    <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 21</p>
                                        <p><b>- Whether Board showing Name of Work, Name of Agency, DLP, etc. is fixed on site of work ?</b></p> 
                                        <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Board1" value="Yes" {{ $Board === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile21()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Board1" value="No" {{ $Board === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile21()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Board1" value="Not Required" {{ $Board === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile21()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Board1" value="Not Applicable" {{ $Board === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile21()"> Not Applicable
                                </label>

                                    </div>
                                </div>
                            </td>
                        </tr>


                <!-- Responsive for the other then mobile --> 

                        <tr class="non-mobile-second">
                            <td style="text-align: right;">21</td>
                            <td>Whether Board showing Name of Work, Name of Agency, DLP, etc. is fixed on site of work ?</td>
                            <td>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Board" value="Yes" {{ $Board === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile21()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Board" value="No" {{ $Board === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile21()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Board" value="Not Required" {{ $Board === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile21()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Board" value="Not Applicable" {{ $Board === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile21()"> Not Applicable
                                </label>
                            </td>

                        </tr>



                              <!-- Responsive for the mobile -->
                    <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p>- 22</p>
                                        <p><b>- Work Completion Certificate (Form-65) attached ?</b></p> 
                                        <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Form_651" value="Yes" {{ $CFinalbillForm65 === 'Yes' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile22()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Form_651" value="No"  {{ $CFinalbillForm65 === 'No' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile22()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Form_651" value="Not Required" {{ $CFinalbillForm65 === 'Not Required' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile22()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Form_651" value="Not Applicable" {{ $CFinalbillForm65 === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeMobileToNonMobile22()"> Not Applicable
                                </label>

                                    </div>
                                </div>
                            </td>
                        </tr>


                <!-- Responsive for the other then mobile --> 
                        <tr class="non-mobile-second">
                            <td style="text-align: right;">22</td>
                            <td>Work Completion Certificate (Form-65) attached ?</td>
                            <td>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Form_65" value="Yes" {{ $CFinalbillForm65 === 'Yes' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile22()"> Yes
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Form_65" value="No"  {{ $CFinalbillForm65 === 'No' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile22()"> No
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Form_65" value="Not Required" {{ $CFinalbillForm65 === 'Not Required' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile22()"> Not Required
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="radio_Form_65" value="Not Applicable" {{ $CFinalbillForm65 === 'Not Applicable' ? 'checked' : '' }} onclick="synchronizeNonMobileToMobile22()"> Not Applicable
                                </label>
                            </td>
                        </tr>


                                        <!-- <tr>
                                        <td>26</td>
                                        <td>Letter / Certificate regarding handover of work attached ?</td>
                                        <td>
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="radio_handover" value="Yes" {{ $CFinalbillhandover === 'Yes' ? 'checked' : '' }}> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="radio_handover" value="No" {{ $CFinalbillhandover === 'No' ? 'checked' : '' }}> No
                                    </label>
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="radio_handover" value="Not Required" {{ $CFinalbillhandover === 'Not Required' ? 'checked' : '' }}> Not Required
                                    </label>
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="radio_handover" value="Not Applicable" {{ $CFinalbillhandover === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
                                    </label>
                                </td>
                                        </tr>
                                -->

                                        <!-- <tr>
                                        <td>27</td>
                                        <td>Whether record drawing is attached ?</td>
                                        <td>
                                        <label class="btn btn-outline-primary">
                                        <input type="radio" name="radio_drawing" id="radioYes" value="Yes" {{ $Rec_Drg === 'Yes' ? 'checked' : '' }}>Yes
                                </label>
                                    <label class="btn btn-outline-primary">
                                        <input  type="radio" name="radio_drawing" id="radioNo" value="No" {{ $Rec_Drg === 'No' ? 'checked' : '' }}>No
                                        </label>
                                    <label class="btn btn-outline-primary">
                                        <input  type="radio" name="radio_drawing" id="radioNotRequired" value="Not Required" {{ $Rec_Drg === 'Not Required' ? 'checked' : '' }}>Not Required

                                        </label>
                                    <label class="btn btn-outline-primary">
                                        <input  type="radio" name="radio_drawing" id="radioNotApplicable" value="Not Applicable" {{ $Rec_Drg === 'Not Applicable' ? 'checked' : '' }}>Not Applicable
                                        </label>
                                </td>

                                <tr> -->
                                    <!-- <td colspan="2">
                                        <label style="font-weight: bold;">Sectional office/Engineer Checked</label>
                                        @if($Je_Chk === 1)
                                            <input class="checkbox col-md-2 form-control-md" style="margin-left: 20px;" type="checkbox" name="JEcheckbox"  checked>
                                        @else
                                            <input class="checkbox col-md-2 form-control-md" style="margin-left: 20px;" type="checkbox" name="JEcheckbox" >
                                        @endif
                                    </td>
                                    <td>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label style="font-weight: bold;">Date of Checking</label>
                                            </div>
                                            <div class="col-md-5">
                                            <input style="" class="form-control" type="date" name="JEdate" value="{{$Je_chk_Dt}}" min="{{$Agencychedate}}" max="{{$stupulatedDate}}" >
                                        </div>
                                    </div>
                                </td>
                                </tr> -->





            <!-- Responsive for the mobile -->
            @if(auth()->user()->usertypes === "DYE")
                    <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <p><label style="font-weight: bold;">Deputy Engineer Checked</label>
                            @if($Je_Chk === 1)
                                <input style="margin-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required checked>
                            @else
                                <input style="margin-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required>
                            @endif</p>
                                        <p> <label style="font-weight: bold;">Date of Checking</label>
                                <input style="margin-left: 20px;" class="form-control" type="date" name="DYEdate"></p> 

                              
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endif

                <!-- Responsive for the other then mobile --> 
                    @if(auth()->user()->usertypes === "DYE")
                        <tr class="non-mobile-second">
                            <td>
                            <label style="font-weight: bold;">Deputy Engineer Checked</label>
                            @if($Je_Chk === 1)
                                <input style="margin-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required checked>
                            @else
                                <input style="margin-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required>
                            @endif
                            </td>
                            <td colspan="3">
                                <label style="font-weight: bold;">Date of Checking</label>
                                <input style="margin-left: 20px;" class="form-control" type="date" name="DYEdate">
                            </td>
                        </tr>

                    @endif

            


                </tbody>
            </table>
        </div>
    </div>
</div>







<!-- <div class="row" style="margin-left: 80px;">
    <div class="col-md-2 col-xl-2 col-lg-2">
<label style="font-weight: bold;">JE Check </label>
        @if($Je_Chk === 1)
<input  class="checkbox col-md-1" style="margin-left: 20px;" type="checkbox" name="JEcheckbox" required checked>
        @else
<input  class="checkbox col-md-1" style="margin-left: 20px;" type="checkbox" name="JEcheckbox" required >
        @endif
        </div>
        <div class="col-md-3 col-xl-2 col-lg-6">
<input style="margin-left: -100px;" class="form-control" type="hidden" name="JEdate" value="{{$Agencychedate}}">
<input style="margin-left: -100px;" class="form-control" type="hidden" name="stupulatedDate" value="{{$stupulatedDate}}">

<input style="" class="form-control" type="date" name="JEdate"
 value="{{$Je_chk_Dt}}" min="{{$Agencychedate}}" max="{{$stupulatedDate}}">
</div>
</div>




@if(auth()->user()->usertypes === "DYE") 
<div class="col-md-4 col-lg-8  col-xl-2" style="margin-left: 80px;">
<label style="margin-left: 380px;  font-weight: bold;">DYE Check </label>
        @if($Je_Chk === 1)
<input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required checked>
        @else
<input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required >
        @endif
<input style="margin-left: 100px;" type="date" name="DYEdate" >
</div>
@endif -->


<div class="row justify-content-center">
    <div class="col-md-3 col-xl-2">
        @if ($DBchklst_jeExist !== null)
            <button type="submit" name="action" value="update" class="btn btn-primary mt-5">Update</button>
        @else
            <button type="submit" name="action" value="save" class="btn btn-primary mt-5">Submit</button>
        @endif
    </div>
</div>

</form>

</div>
</div>




<br><br><br>


@endsection()
<!-- <script>
    // for thge mobile responsive value bind  of the all radio box
    document.addEventListener("DOMContentLoaded", function() {


        // first radio box table row 10
        var radioButtonValue1 = "{{ $Agency_MB_Accept }}"; // Assuming this is how you get the value

        // Get the radio input element
        var radioInput1 = document.querySelector('input[name="radio_Contractorsigned"][value="' + radioButtonValue1 + '"]');

        // Check the radio input
        if (radioInput1) {
            radioInput1.checked = true;
        } else {
            // Handle case where radio input with given value is not found
            console.error("Radio input with value '" + radioButtonValue1 + "' not found.");
        }



                // second radio box table row 11
                var radioButtonValue2 = "{{ $partrtAnalysis }}"; // Assuming this is how you get the value

                // Get the radio input element
                var radioInput2 = document.querySelector('input[name="radio_Analysis"][value="' + radioButtonValue2 + '"]');

                // Check the radio input
                if (radioInput2) {
                radioInput2.checked = true;
                } else {
                // Handle case where radio input with given value is not found
                console.error("Radio input with value '" + radioButtonValue2 + "' not found.");
                }
    });
</script> -->


<script>
// // Function to copy content from mobile version to non-mobile version
// function copyContent() {
//     // Get the content from mobile version
//     var mobileContent = document.querySelector('.mobile-first .mobile-content').innerHTML;
//     // Set the content to non-mobile version
//     document.querySelector('.non-mobile-second .non-mobile-content').innerHTML = mobileContent;
// }

// // Call the function on page load
// document.addEventListener("DOMContentLoaded", function(event) {
//     copyContent(); // Copy content initially
// });

// // Call the function whenever the screen size changes
// window.addEventListener('resize', function(event){
//     copyContent(); // Copy content when screen size changes
// });
// Function to enable or disable radio inputs based on screen size
// function toggleRadioInputs() {
//     var isMobile = window.matchMedia("(max-width: 767px)").matches;

//     // Mobile version
//     if (isMobile) {
//         $('input[name="radio_Contractorsigned1"]').prop('disabled', false);
//         $('input[name="radio_Contractorsigned"]').prop('disabled', true);
//     } 
//     // Other than mobile
//     else {
//         $('input[name="radio_Contractorsigned1"]').prop('disabled', true);
//         $('input[name="radio_Contractorsigned"]').prop('disabled', false);
//     }
// }

// // Call the function on page load and when the window is resized
// $(document).ready(function() {
//     toggleRadioInputs(); // Call on page load
//     $(window).resize(function() {
//         toggleRadioInputs(); // Call on window resize
//     });
// });

// </script>
<script>
// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile() {
    var selectedValue = $('input[name="radio_Contractorsigned1"]:checked').val();
    $('input[name="radio_Contractorsigned"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile() {
    var selectedValue = $('input[name="radio_Contractorsigned"]:checked').val();
    $('input[name="radio_Contractorsigned1"][value="' + selectedValue + '"]').prop('checked', true);
}

// Input row no 11

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile11() {
    var selectedValue = $('input[name="radio_Analysis1"]:checked').val();
    $('input[name="radio_Analysis"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile11() {
    var selectedValue = $('input[name="radio_Analysis"]:checked').val();
    $('input[name="radio_Analysis1"][value="' + selectedValue + '"]').prop('checked', true);
}



// Input row no 12

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile12() {
    var selectedValue = $('input[name="radio_authority1"]:checked').val();
    $('input[name="radio_authority"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile12() {
    var selectedValue = $('input[name="radio_authority"]:checked').val();
    $('input[name="radio_authority1"][value="' + selectedValue + '"]').prop('checked', true);
}


// Input row no 13

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile13() {
    var selectedValue = $('input[name="radio_Q_C_Results1"]:checked').val();
    $('input[name="radio_Q_C_Results"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile13() {
    var selectedValue = $('input[name="radio_Q_C_Results"]:checked').val();
    $('input[name="radio_Q_C_Results1"][value="' + selectedValue + '"]').prop('checked', true);
}



// Input row no 14

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile14() {
    var selectedValue = $('input[name="radio_Material1"]:checked').val();
    $('input[name="radio_Material"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile14() {
    var selectedValue = $('input[name="radio_Material"]:checked').val();
    $('input[name="radio_Material1"][value="' + selectedValue + '"]').prop('checked', true);
}



// Input row no 15

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile15() {
    var selectedValue = $('input[name="radio_Recovery1"]:checked').val();
    $('input[name="radio_Recovery"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile15() {
    var selectedValue = $('input[name="radio_Recovery"]:checked').val();
    $('input[name="radio_Recovery1"][value="' + selectedValue + '"]').prop('checked', true);
}


// Input row no 16

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile16() {
    var selectedValue = $('input[name="radio_Excess1"]:checked').val();
    $('input[name="radio_Excess"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile16() {
    var selectedValue = $('input[name="radio_Excess"]:checked').val();
    $('input[name="radio_Excess1"][value="' + selectedValue + '"]').prop('checked', true);
}



// Input row no 17

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile17() {
    var selectedValue = $('input[name="radio_Royalty1"]:checked').val();
    $('input[name="radio_Royalty"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile17() {
    var selectedValue = $('input[name="radio_Royalty"]:checked').val();
    $('input[name="radio_Royalty1"][value="' + selectedValue + '"]').prop('checked', true);
}


// Input row no 18

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile18() {
    var selectedValue = $('input[name="radio_photo1"]:checked').val();
    $('input[name="radio_photo"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile18() {
    var selectedValue = $('input[name="radio_photo"]:checked').val();
    $('input[name="radio_photo1"][value="' + selectedValue + '"]').prop('checked', true);
}


// Input row no 19

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile19() {
    var selectedValue = $('input[name="radio_RoyaltyChallen1"]:checked').val();
    $('input[name="radio_RoyaltyChallen"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile19() {
    var selectedValue = $('input[name="radio_RoyaltyChallen"]:checked').val();
    $('input[name="radio_RoyaltyChallen1"][value="' + selectedValue + '"]').prop('checked', true);
}




// Input row no 20

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile20() {
    var selectedValue = $('input[name="radio_Q_C1"]:checked').val();
    $('input[name="radio_Q_C"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile20() {
    var selectedValue = $('input[name="radio_Q_C"]:checked').val();
    $('input[name="radio_Q_C1"][value="' + selectedValue + '"]').prop('checked', true);
}


// Input row no 21

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile21() {
    var selectedValue = $('input[name="radio_Board1"]:checked').val();
    $('input[name="radio_Board"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile21() {
    var selectedValue = $('input[name="radio_Board"]:checked').val();
    $('input[name="radio_Board1"][value="' + selectedValue + '"]').prop('checked', true);
}



// Input row no 22

// Function to synchronize radio inputs from mobile to non-mobile
function synchronizeMobileToNonMobile22() {
    var selectedValue = $('input[name="radio_Form_651"]:checked').val();
    $('input[name="radio_Form_65"][value="' + selectedValue + '"]').prop('checked', true);
}

// Function to synchronize radio inputs from non-mobile to mobile
function synchronizeNonMobileToMobile22() {
    var selectedValue = $('input[name="radio_Form_65"]:checked').val();
    $('input[name="radio_Form_651"][value="' + selectedValue + '"]').prop('checked', true);
}

</script>