@extends("layouts.header")
@section('content')
<style>
    /* Define custom color for checked radio button */
    .form-check-input:checked {
        color: red; /* Change this to the desired color */
    }
</style>
<form  action="{{ url('SaveChklstJe') }}" method="post">
@csrf
    <input type="hidden" name="tbill_id" value="{{$CTbillid}}">
    <input type="hidden" name="T_billno" value="{{$CTbillno}}">               
   <input type="hidden" name="JEId" value="{{ $DBjeId }}">
   <input type="hidden" name="CFinalbill" value="{{ $CFinalbill }}">


   <input type="hidden" name="mesurmentDT" value="{{ $DBMESUrementDate }}">



<div class="container">
    <h4>Check List</h4>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead class="table-success">
        <tr>
            <th>SR.NO</th>
          <th>Name</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>1</td>
          <td>Name of Work</td>
          <input type="hidden" name="work_nm" value="{{ $workNM }}">
          <td >{{$workNM}}</td>
        </tr>
        <tr>
            <td>2</td>
          <td>Agency / Contractor</td>
          <input type="hidden" name="AgencyId" value="{{ $DBAgencyId }}">
          <input type="hidden" name="AgencyNM" value="{{ $DBAgencyName }}">
          <input type="hidden" name="Agency_PL" value="{{ $DBagency_pl }}">
          <td>{{$DBAgencyName}}   {{$DBagency_pl}}</td>
        </tr>
        <tr>
        <td>3</td>
        <td>Name of Officer recording measurements </td>
        <input type="hidden" name="JeName" value="{{$DBJeName}}">
        <td name="JeName">{{$DBJeName}}</td>
            </tr>
        <tr>
        <td>4</td>

          <td>Bill No</td>
          <input type="hidden" name="concateresultbillno" value="{{$concateresult}}">
          <td >{{$concateresult}}</td>
        </tr>
        <tr>
        <td>5</td>

          <td>Agreement No & Date</td>
          <input type="hidden" name="AgreeNO" value="{{$DBAgreeNO}}">       
        <input type="hidden" name="AgreeDT" value="{{$DBAgreeDT}}">       
          <td > {{$DBAgreeNO}}  {{ $DBAgreeDT ? date('d/m/Y', strtotime($DBAgreeDT)) : '' }}</td>
        </tr>
        <tr>
        <td>6</td>

        <td>Quoted Above / Below percent</td>
        <input type="hidden" name="A_B_Pc" value="{{$A_B_Pc}}">       
       <input type="hidden" name="Above_Below" value="{{$Above_Below}}">       
        <td name="Above_Below">{{$A_B_Pc}}   {{$Above_Below}}</td>
            </tr>
            <tr>
            <td>7</td>

          <td>Stipulated Date of Completion</td>
          <input type="hidden" name="Stip_Comp_Dt" value="{{$Stip_Comp_Dt}}">       
          <td>{{ $Stip_Comp_Dt ? date('d/m/Y', strtotime($Stip_Comp_Dt)) : '' }}</td>
        </tr>
        <tr>
        <td>8</td>

          <td> Actual Date of Completion</td>
          <input type="hidden" name="Act_Comp_Dt" value="{{$Act_Comp_Dt}}">       

          <td>{{ $Act_Comp_Dt ? date('d/m/Y', strtotime($Act_Comp_Dt)) : '' }}</td>
        </tr>
        <tr>
        <td>9</td>

          <td>M.B. No & Date of Recording</td>
          <input type="hidden" name="MBNO" value="{{$CTbillid}}">       
         <input type="hidden" name="MBDT" value="{{$DBMESUrementDate}}">   

          <td name="MBNO">{{$CTbillid}}     Date: {{ $DBMESUrementDate ? date('d/m/Y', strtotime($DBMESUrementDate)) : ''}}</td>
        </tr>



<tr>
<td>10</td>

        <td>Whether Contractor has signed in token of acceptance of measurements ?</td>
        <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Contractorsigned" value="Yes" {{ $Agency_MB_Accept === 'Yes' ? 'checked' : '' }}> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Contractorsigned" value="No" {{ $Agency_MB_Accept === 'No' ? 'checked' : '' }}> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Contractorsigned" value="Not Required" {{ $Agency_MB_Accept === 'Not Required' ? 'checked' : '' }} > Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Contractorsigned" value="Not Applicable" {{ $Agency_MB_Accept === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
    </label>
</td>
        </tr>
        <tr>
        <td>11</td>

          <td>Part Rate / Reduced Rate Analysis</td>
                <td>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Analysis" value="Yes" {{ $partrtAnalysis === 'Yes' ? 'checked' : '' }}> Yes
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Analysis" value="No" {{ $partrtAnalysis === 'No' ? 'checked' : '' }} > No
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Analysis" value="Not Required" {{ $partrtAnalysis === 'Not Required' ? 'checked' : '' }}  > Not Required
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Analysis" value="Not Applicable" {{ $partrtAnalysis === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
            </label>
        </td>  


</tr>
        <tr>
        <td>12</td>

        <td>If Reduced Rate, permissin of compitent authority is obtained ?</td>
        <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_authority" value="Yes" {{ $Part_Red_per === 'Yes' ? 'checked' : '' }}> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_authority" value="No" {{ $Part_Red_per === 'No' ? 'checked' : '' }}> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_authority" value="Not Required" {{ $Part_Red_per === 'Not Required' ? 'checked' : '' }}> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_authority" value="Not Applicable" {{ $Part_Red_per === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
    </label>
</td>

            </tr>
            <tr>
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

        </tr>
        <tr>
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

        </tr>
        <tr>
        <td>15</td>

          <td>Whether Results of Q.C. Tests are satisfactory ?</td>
          <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Q_C_Results" value="Yes" {{ $Qc_Result === 'Yes' ? 'checked' : '' }}> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Q_C_Results" value="No" {{ $Qc_Result === 'No' ? 'checked' : '' }}> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Q_C_Results" value="Not Required" {{ $Qc_Result === 'Not Required' ? 'checked' : '' }}> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Q_C_Results" value="Not Applicable" {{ $Qc_Result === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
    </label>
</td>

        </tr>



        <tr>
        <td>16</td>
        <td>Is Material Consumption Statement attached ?</td>
        <td>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Material" value="Yes" {{ $materialconsu === 'Yes' ? 'checked' : '' }}> Yes
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Material" value="No" {{ $materialconsu === 'No' ? 'checked' : '' }}> No
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Material" value="Not Required" {{ $materialconsu === 'Not Required' ? 'checked' : '' }}> Not Required
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Material" value="Not Applicable" {{ $materialconsu === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
            </label>
        </td>  

        </tr>
        <tr>
        <td>17</td>

          <td>Is Recovery Statement attached ?</td>
          <td>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Recovery" value="Yes" {{ $Recoverystatement === 'Yes' ? 'checked' : '' }}> Yes
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Recovery" value="No" {{ $Recoverystatement === 'No' ? 'checked' : '' }}> No
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Recovery" value="Not Required" {{ $Recoverystatement === 'Not Required' ? 'checked' : '' }}> Not Required
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Recovery" value="Not Applicable" {{ $Recoverystatement === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
            </label>
        </td>  

        </tr>
        <tr>
        <td>18</td>

        <td>Is Excess Saving Statement attached ?</td>
        <td>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Excess" value="Yes" {{ $Excesstatement === 'Yes' ? 'checked' : '' }}> Yes
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Excess" value="No" {{ $Excesstatement === 'No' ? 'checked' : '' }}> No
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Excess" value="Not Required" {{ $Excesstatement === 'Not Required' ? 'checked' : '' }}> Not Required
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Excess" value="Not Applicable" {{ $Excesstatement === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
            </label>
        </td>  

            </tr>
            <tr>
            <td>19</td>
          <td>Is Royalty Statement attached ?</td>
          <td>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Royalty" value="Yes" {{ $Royaltystatement === 'Yes' ? 'checked' : '' }}> Yes
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Royalty" value="No" {{ $Royaltystatement === 'No' ? 'checked' : '' }}> No
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Royalty" value="Not Required" {{ $Royaltystatement === 'Not Required' ? 'checked' : '' }}> Not Required
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="radio_Royalty" value="Not Applicable" {{ $Royaltystatement === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
            </label>
        </td>  

        </tr>
        <tr>
        <td>20</td>

          <td> Necessary Photographs of work / site attached ?</td>
          <td>
          <label class="btn btn-outline-primary">
    <input type="radio" name="radio_photo" value="Yes" {{ $photo === 'Yes' ? 'checked' : '' }}> Yes
</label>
<label class="btn btn-outline-primary">
    <input type="radio" name="radio_photo" value="No"  {{ $photo === 'No' ? 'checked' : '' }}> No
</label>
<label class="btn btn-outline-primary">
    <input type="radio" name="radio_photo" value="Not Required" {{ $photo === 'Not Required'  ? 'checked' : '' }}> Not Required
</label>
<label class="btn btn-outline-primary">
    <input type="radio" name="radio_photo" value="Not Applicable" {{ $photo === 'Not Applicable'  ? 'checked' : '' }}> Not Applicable
</label><br>
<lable>Total Photo : {{$countphoto}} Total Documents : {{$countdoc}} Video : {{$countvideo}}</lable>
        </td>  
        

        </tr>


        <tr>
        <td>21</td>

        <td>Challen of Royalty paid by Contractor attached ?</td>
        <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_RoyaltyChallen" value="Yes" {{ $Roy_Challen === 'Yes' ? 'checked' : '' }}> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_RoyaltyChallen" value="No" {{ $Roy_Challen === 'No' ? 'checked' : '' }}> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_RoyaltyChallen" value="Not Required" {{ $Roy_Challen === 'Not Required' ? 'checked' : '' }}> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_RoyaltyChallen" value="Not Applicable" {{ $Roy_Challen === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
    </label>
</td>


        </tr>
        <tr>
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

        </tr>

        <tr>
        <td>23</td>
          <td>Q.C. Test Reports attached ?</td>
          <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Q_C" value="Yes" {{ $Qc_Reports === 'Yes' ? 'checked' : '' }}> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Q_C" value="No" {{ $Qc_Reports === 'No' ? 'checked' : '' }} > No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Q_C" value="Not Required"  {{ $Qc_Reports === 'Not Required' ? 'checked' : '' }}> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Q_C" value="Not Applicable" {{ $Qc_Reports === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
    </label>
</td>

        </tr>

        <tr>
        <td>24</td>
          <td>Whether Board showing Name of Work, Name of Agency, DLP, etc. is fixed on site of work ?</td>
          <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Board" value="Yes" {{ $Board === 'Yes' ? 'checked' : '' }}> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Board" value="No" {{ $Board === 'No' ? 'checked' : '' }}> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Board" value="Not Required" {{ $Board === 'Not Required' ? 'checked' : '' }}> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Board" value="Not Applicable" {{ $Board === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
    </label>
</td>

        </tr>


        <tr>
        <td>25</td>
          <td>Work Completion Certificate (Form-65) attached ?</td>
          <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Form_65" value="Yes" {{ $CFinalbill === 'Yes' ? 'checked' : '' }}> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Form_65" value="No"  {{ $CFinalbill === 'No' ? 'checked' : '' }}> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Form_65" value="Not Required" {{ $CFinalbill === 'Not Required' ? 'checked' : '' }}> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_Form_65" value="Not Applicable" {{ $CFinalbill === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
    </label>
</td>
        </tr>


        <tr>
        <td>26</td>
          <td>Letter / Certificate regarding handover of work attached ?</td>
          <td>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_handover" value="Yes" {{ $CFinalbill === 'Yes' ? 'checked' : '' }}> Yes
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_handover" value="No" {{ $CFinalbill === 'No' ? 'checked' : '' }}> No
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_handover" value="Not Required" {{ $CFinalbill === 'Not Required' ? 'checked' : '' }}> Not Required
    </label>
    <label class="btn btn-outline-primary">
        <input type="radio" name="radio_handover" value="Not Applicable" {{ $CFinalbill === 'Not Applicable' ? 'checked' : '' }}> Not Applicable
    </label>
</td>
        </tr>


        <tr>
        <td>27</td>
          <td>Whether record drawing is attached ?</td>
          <td>
          <label class="btn btn-outline-primary">
        <input type="radio" name="radio_drawing" id="radioYes" value="Yes" {{ $Rec_Drg === 'Yes' ? 'checked' : '' }}>Yes
        <!-- <label class="form-check-label text-dark" for="radioYes">Yes</label> -->
    <!-- </div> --></label>
    <label class="btn btn-outline-primary">
        <input  type="radio" name="radio_drawing" id="radioNo" value="No" {{ $Rec_Drg === 'No' ? 'checked' : '' }}>No
        <!-- <label class="form-check-label text-dark" for="radioNo">No -->
        </label>
    <!-- </div> -->
    <label class="btn btn-outline-primary">
        <input  type="radio" name="radio_drawing" id="radioNotRequired" value="Not Required" {{ $Rec_Drg === 'Not Required' ? 'checked' : '' }}>Not Required
        <!-- <label class="form-check-label text-dark" for="radioNotRequired">Not Required -->

        </label>
    <!-- </div> -->
    <label class="btn btn-outline-primary">
        <input  type="radio" name="radio_drawing" id="radioNotApplicable" value="Not Applicable" {{ $Rec_Drg === 'Not Applicable' ? 'checked' : '' }}>Not Applicable
        <!-- <label class="form-check-label text-dark" for="radioNotApplicable">Not Applicable -->
        </label>
    <!-- </div> -->
</td>

        </tr>
      </tbody>
    </table>
  </div>
</div>







  <div class="row">
        <div class="col-md-4">
<label style="margin-left: 380px;  font-weight: bold;">JE Check </label>
        @if($Je_Chk === 1)
<input  class="checkbox col-md-2" type="checkbox" name="JEcheckbox" required checked>
        @else
<input  class="checkbox col-md-2" type="checkbox" name="JEcheckbox" required >
        @endif
        </div>
      <div class="col-md-2">
<input style="margin-left: 100px;" class="form-control" type="date" name="JEdate" value="{{$Je_chk_Dt}}">
</div>
</div>



@if(auth()->user()->usertypes === "DYE") 
<div>
<label style="margin-left: 380px;  font-weight: bold;">DYE Check </label>
        @if($Je_Chk === 1)
<input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required checked>
        @else
<input style="margin-left: 80px; padding-left: 20px;" class="form-check-input" type="checkbox" name="DYEcheckbox" required >
        @endif
<input style="margin-left: 100px;" type="date" name="DYEdate" >
</div>
@endif



@if ($DBchklst_jeExist !== null)
    <button type="submit" name="action" value="update" class="btn btn-primary mt-5" style="margin-left:370px;" >Update</button>
@else
    <button type="submit" name="action" value="save" class="btn btn-primary mt-5" style="margin-left:370px;" >Save</button>
@endif

</form>






<br><br><br>

@endsection()
