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
            <li><a href="{{ url('billlist', $workID ?? '') }}">Bill</a></li>
        </ul>

          <div class="avatar"> 

        <a href="{{ url('billlist', $workID ?? '')}}"  style="margin-bottom:10px;">
            <i class="fa-solid fa-circle-arrow-left ml-3 mb-1" style="color: black; font-size: 35px;"></i>
  </a>
          <span class="tip" style="font-size:15px;">BACK</span></div>




        <style>
    /* Define custom color for checked radio button */
    .form-check-input:checked {
        color: blue; /* Change this to the desired color */
    }
    
</style>
<!-- <form  action="{{ url('SaveChklstJe') }}" method="post"> -->
@csrf
    <input type="hidden" name="tbill_id" value="{{$CTbillid}}">
   <input type="hidden" name="JEId" value="{{ $DBjeId }}">
   <input type="hidden" name="CFinalbill" value="{{ $CFinalbill }}">


   <input type="hidden" name="mesurmentDT" value="{{ $DBMESUrementDate }}">



<div class="container-fluid">
    <div class="card"  id="backbglogo">

                            <div class="card-header" >
                                    <h6>CHECKLIST FOR SECTIONAL ENGINEER</h6>
                            </div>

    <!--<h4 style="text-align: center;">CHECKLIST FOR SECTIONAL ENGINEER</h4>-->
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
          <th>Description</th>
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
                                        <p><b>- Name of Officer recording measurements</b></p>
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
                                        <p><b>- Bill No</b></p>
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
                                        <p><b>- Agreement No & Date</b></p>
                                        <p>- {{$DBAgreeNO}}  {{ $DBAgreeDT ? date('d/m/Y', strtotime($DBAgreeDT)) : '' }}</p>
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
          <td > {{$DBAgreeNO}}  {{ $DBAgreeDT ? date('d/m/Y', strtotime($DBAgreeDT)) : '' }}</td>
        </tr>



       <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 6</p>
                                        <p><b>- Quoted Above / Below percent</b></p>
                                        <p>- {{$A_B_Pc}}%   {{$Above_Below}}</p>
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
        <td name="Above_Below">{{$A_B_Pc}}%   {{$Above_Below}}</td>
            </tr>



             <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 7</p>
                                        <p><b>- Stipulated Date of Completion</b></p>
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
                                        <p><b>- Actual Date of Completion</b></p>
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
                                        <p>- {{$workID}}     Date:   {{ $DBMESUrementDate ? date('d/m/Y', strtotime($DBMESUrementDate)) : ''}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
        <td style="text-align: right;">9</td>

          <td>M.B. No & Date of Recording</td>
          <input type="hidden" name="MBNO" value="{{$CTbillid}}">       
         <input type="hidden" name="MBDT" value="{{$DBMESUrementDate}}">   

          <td name="MBNO">{{$workID}}     Date:   {{ $DBMESUrementDate ? date('d/m/Y', strtotime($DBMESUrementDate)) : ''}}</td>
        </tr>



<!-- Responsive for the mobile -->
<tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 10</p>
                                        <p><b>- Whether Contractor has signed in token of acceptance of measurements ?</b></p>
                                        <p>- {{ $Agency_MB_Accept}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
<td style="text-align: right;">10</td>

        <td>Whether Contractor has signed in token of acceptance of measurements ?</td>
        <td> {{ $Agency_MB_Accept}}
</td>
        </tr>



      <!-- Responsive for the mobile -->
<tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 11</p>
                                        <p><b>- Part Rate / Reduced Rate Analysis</b></p>
                                        <p>- {{ $partrtAnalysis}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">

        <td style="text-align: right;">11</td>

          <td>Part Rate / Reduced Rate Analysis</td>
                <td> {{ $partrtAnalysis}}
        </td>  


</tr>
         <!-- Responsive for the mobile -->
<tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 12</p>
                                        <p><b>- If Reduced Rate, permissin of compitent authority is obtained ?</b></p>
                                        <p>- {{ $Part_Red_per}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
        <td style="text-align: right;">12</td>

        <td>If Reduced Rate, permissin of compitent authority is obtained ?</td>
        <td> {{ $Part_Red_per}}
</td>

            </tr>

            <!-- <tr>
            <td>13</td>
          <td>Any excess quantity is occurred over the tender quantity ?</td>
          <td> {{ $Excess_Qty}}
        </td>
        </tr> -->

        <!-- <tr>
        <td>14</td>

          <td> If Yes, whether details of excess quantity with reason for excess is mentioned in Excess - Saving Statement ?</td>
          <td> {{ $Ex_qty_det}}
</td>
        </tr> -->


       <!-- Responsive for the mobile -->
<tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 13</p>
                                        <p><b>- Whether Results of Q.C. Tests are satisfactory ?</b></p>
                                        <p>- {{ $Qc_Result}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
        <td style="text-align: right;">13</td>

          <td>Whether Results of Q.C. Tests are satisfactory ?</td>
          <td> {{ $Qc_Result}}
        </td>
        </tr>





        
       <!-- Responsive for the mobile -->
<tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 14</p>
                                        <p><b>- Is Material Consumption Statement attached ?</b></p>
                                        <p>- {{ $materialconsu}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
        <td style="text-align: right;">14</td>
        <td>Is Material Consumption Statement attached ?</td>
        <td>{{ $materialconsu}}
        </td>  
        </tr>


         <!-- Responsive for the mobile -->
    <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 15</p>
                                        <p><b>- Is Recovery Statement attached ?</b></p>
                                        <p>- {{ $Recoverystatement}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
        <td style="text-align: right;">15</td>

          <td>Is Recovery Statement attached ?</td>
          <td>{{ $Recoverystatement}}
        </td>  

        </tr>


        <!-- Responsive for the mobile -->
    <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 16</p>
                                        <p><b>- Is Excess Saving Statement attached ?</b></p>
                                        <p>- {{ $Excesstatement}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
        <td style="text-align: right;">16</td>

        <td>Is Excess Saving Statement attached ?</td>
        <td> {{ $Excesstatement}}
        </td>  

            </tr>



                 <!-- Responsive for the mobile -->
    <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 17</p>
                                        <p><b>- Is Royalty Statement attached ?</b></p>
                                        <p>- {{ $Royaltystatement}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
            <td style="text-align: right;">17</td>
          <td>Is Royalty Statement attached ?</td>
          <td> {{ $Royaltystatement}}
        </td>  

        </tr>


         <!-- Responsive for the mobile -->
    <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 18</p>
                                        <p><b>- Necessary Photographs of work / site attached ?</b></p>
                                        <p>- {{ $photo}} </p>
                                            <p>
                                            @if($countphoto > 0)
                                                <label>Total Photo : {{$countphoto}}</label>
                                            @endif
                                            @if($countdoc > 0)
                                                <label>Total Documents : {{$countdoc}}</label>
                                            @endif
                                            @if($countvideo > 0)
                                                <label>Video : {{$countvideo}}</label>
                                            @endif</p>
                                         
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
        <td style="text-align: right;">18</td>

          <td> Necessary Photographs of work / site attached ?</td>
          <td> {{ $photo}}
<br>
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
                                        <p>- {{ $Roy_Challen}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
        <td style="text-align: right;">19</td>

        <td>Challen of Royalty paid by Contractor attached ?</td>
        <td>{{ $Roy_Challen}}
</td>


        </tr>

        <!-- <tr>
        <td>22</td>
          <td>Bitumen Challen / Invoice attached ?</td>
          <td>{{ $Bitu_Challen}}
        </td>
        </tr> -->

            <!-- Responsive for the mobile -->
            <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 20</p>
                                        <p><b>- Q.C. Test Reports attached ?</b></p>
                                        <p>- {{ $Qc_Reports}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
        <td style="text-align: right;">20</td>
          <td>Q.C. Test Reports attached ?</td>
          <td>{{ $Qc_Reports}}
        </td>
        </tr>


       <!-- Responsive for the mobile -->
            <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 21</p>
                                        <p><b>- Whether Board showing Name of Work, Name of Agency, DLP, etc. is fixed on site of work ?</b></p>
                                        <p>- {{ $Board}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
      <tr class="non-mobile-second">
        <td style="text-align: right;">21</td>
          <td>Whether Board showing Name of Work, Name of Agency, DLP, etc. is fixed on site of work ?</td>
          <td> {{ $Board}}
        </td>
      </tr>


         <!-- Responsive for the mobile -->
         <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 22</p>
                                        <p><b>- Work Completion Certificate (Form-65) attached ?</b></p>
                                        <p>- {{ $CFinalbill}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
      <tr class="non-mobile-second">
        <td style="text-align: right;">22</td>
          <td>Work Completion Certificate (Form-65) attached ?</td>
          <td>{{ $CFinalbill}}
</td>
        </tr>


        <!-- <tr>
        <td>26</td>
          <td>Letter / Certificate regarding handover of work attached ?</td>
          <td>{{ $Handover}}
</td>
        </tr> -->


        <!-- <tr>
        <td>27</td>
          <td>Whether record drawing is attached ?</td>
          <td>{{ $Rec_Drg}}
</td>

        </tr> -->
        
        
        <!-- <tr>
    <td colspan="2">
        <label style="font-weight: bold;">Sectional office/Engineer Checked</label>
        @if($Je_Chk === 1)
        <input class="checkbox col-md-2" disabled type="checkbox" name="JEcheckbox" required checked>
        @else
        <input class="checkbox col-md-2" disabled type="checkbox" name="JEcheckbox" required>
        @endif
    </td>
    <td>
    <div class="row">
        <div class="col-md-7">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-5">
            <input style="margin-left: -100px;" type="date" class="form-control" readonly id="JEdate" name="JEdate" value="{{$Je_chk_Dt}}">
        </div>
    </div>
</td>
</tr> -->

@if(auth()->user()->usertypes === "DYE")
<form id="dyeForm" action="{{ url('submitDyeChkAndDate') }}" method="POST">
@csrf
        <!-- <tr>
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
</tr> -->

        <!-- @endif -->
      </tbody>
    </table>
  </div>
<!--</div>-->


<!-- <div class="row" style="margin-left: 80px;">
  <div class="col-md-2 col-xl-2 col-lg-3">
        <label style="font-weight: bold;">JE Check</label>
        @if($Je_Chk === 1)
        <input class="checkbox col-md-2" disabled type="checkbox" name="JEcheckbox" required checked>
        @else
        <input class="checkbox col-md-2" disabled type="checkbox" name="JEcheckbox" required>
        @endif
    </div>
    <div class="col-md-3 col-xl-2 col-lg-6">
        <input style="margin-left: -100px;" type="date" class="form-control" readonly id="JEdate" name="JEdate" value="{{$Je_chk_Dt}}">
    </div>
</div>





@if(auth()->user()->usertypes === "DYE") 
<form id="dyeForm" action="{{ url('submitDyeChkAndDate') }}" method="POST">
    @csrf

    <input type="hidden" name="tbill_id" value="{{$CTbillid}}">
    <div class="row" style="margin-left: 80px;">
  <div class="col-md-2 col-xl-2 col-lg-3">
        <label style="font-weight: bold;">DYE Check</label>
                @if($SODYEchk===1)
                <input id="DYEcheckbox" class="checkbox col-md-1" type="checkbox" name="SODYEcheckbox" required checked>
                @else
                <input id="DYEcheckbox" class="checkbox col-md-1" type="checkbox" name="SODYEcheckbox" required>
                @endif
            </div>
            <div class="col-md-3 col-xl-2 col-lg-6">

                <input style="margin-left: -100px;"  id="DYEdate" class="form-control" type="date" name="SODYEdate"
                 value="{{$SODYEchk_Dt}}" required min="{{$Je_chk_Dt}}" max="{{$stupulatedDate}}">
            </div>
    </div>
@endif -->


<!-- //SDC check List Start  form start UI-->
<input type="hidden" name="tbill_id" value="{{$SDCTbillId}}">
<div class="container-fluid mt-4">
    <div class="card"  >

                            <div class="card-header" >
                                    <h6>CHECKLIST OF SUB DIVISIONAL CLERK</h6>
                            </div>

    <!--<h4 style="margin-top:100px; text-align: center;">CHECKLIST OF SUB DIVISIONAL CLERK</h4>-->
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
          <th>Description</th>
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
          <input type="hidden" name="work_nm" value="{{$SDCWork_Nm}}">
          <td >{{$SDCWork_Nm}}</td>
        </tr>



        <!-- Responsive for the mobile -->
        <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 2</p>
                                        <p><b>- Fund Head</b></p>
                                        <p>- {{$SDCFHCODE}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
          <td style="text-align: right;">2</td>
          <td>Fund Head</td>
          <input type="hidden" name="F_H_Code" value="{{$SDCFHCODE}}">
          <td> {{$SDCFHCODE}}</td>
        </tr>

          <!-- Responsive for the mobile -->
          <tr class="mobile-first">
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>- 3</p>
                                        <p><b>- Whether arithmatic check is done ?</b></p>
                                        <p>- {{$SDCArith_chk }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

        <!-- Responsive for the other then mobile -->
        <tr class="non-mobile-second">
            <td style="text-align: right;">3</td>
            <td>Whether arithmatic check is done ?</td>
        <td> {{$SDCArith_chk }}
    <!-- <label>
        <input type="text" class="form-control" value="{{$SDCArith_chk }}" > 
    </label> -->
    <!-- <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="{{ $SDCArith_chk  }}" >
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="{{ $SDCArith_chk  }}" > Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="Arith_chk" value="{{ $SDCArith_chk  }}"> Not Applicable
    </label> -->
</td>
        </tr>

        <!-- <tr>
    <td colspan="2">
    <label style="font-weight: bold;">Sub Divisional Clerk Checked</label>
    @if($SDCSdc_chk === 1)
        <input  class="checkbox col-md-1" disabled type="checkbox" name="SDCcheckbox" required checked>
        @else
        <input  class="checkbox col-md-1" disabled type="checkbox" name="SDCcheckbox" required >
        @endif
    </td>
    <td>
    <div class="row">
        <div class="col-md-5">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-5">
            <input style="margin-left: -100px;" class="form-control" type="date" name="SDCdate" readonly value="{{$SDCSdc_chk_Dt}}">
        </div>
    </div>
</td>
</tr> -->

@if(auth()->user()->usertypes === "DYE")
        <!-- <tr>
    <td colspan="2">
        <label style="font-weight: bold;">Deputy Engineer Checked</label>
        @if($SDCDye_chk === 1)
            <input  class="checkbox col-md-2" type="checkbox" name="SDCDYEcheckbox" required checked >
                    @else
            <input  class="checkbox col-md-2" type="checkbox" name="SDCDYEcheckbox" required  >
            @endif  
    </td>
    <td colspan="3">
    <div class="row">
        <div class="col-md-5">
            <label style="font-weight: bold;">Date of Checking :</label>
            </div>
            <div class="col-md-5">
            <input style="margin-left: -100px;"  type="date" class="form-control"
             name="SDCDYEdate" required value="{{$SDCDye_chk_Dt}}" min="{{$SDCSdc_chk_Dt}}" max="{{$stupulatedDate}}" >
        </div>
    </div>
    </td> -->
<!-- </tr> -->
@endif
        </tbody>
    </table>
  </div>
</div>
</div>
</div>



<div class="row justify-content-center">
    <div class="col-md-3 col-xl-2">
    <button type="submit"  class="btn btn-primary " style="">Submit</button>
    </div>
</div>


</form>

<br><br><br>

      @endsection()
<!-- <script>
// Function to compare dates and display alert if DYE date is not greater than JE date
function compareDates() {
    var JEDate = new Date(document.getElementById("JEdate").value);
    var DYEDate = new Date(document.getElementById("DYEdate").value);
    console.log(JEDate,DYEDate);

    if (DYEDate <= JEDate) 
    {
        alert("DYE Check date must be greater than JE Check date");
        return false;
        document.getElementById("DYEdate").value = ''; // Clear DYE date field
    }
}

// Add event listeners to JE date and DYE date inputs
// document.getElementById("JEdate").addEventListener("change", compareDates);
// document.getElementById("DYEdate").addEventListener("change", compareDates);
</script> -->