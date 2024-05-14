@extends('layouts.header')

@section('content')
<!-- Include select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
    a{
        cursor: pointer;
    }
  datalist {
  position: absolute;
  max-height: 20em;
  border: 0 none;
  overflow-x: hidden;
  overflow-y: auto;
}

datalist option {
  font-size: 0.8em;
  padding: 0.3em 1em;
  background-color: #ccc;
  cursor: pointer;
}

/* option active styles */
datalist option:hover, datalist option:focus {
  color: #fff;
  background-color: #036;
  outline: 0 none;
}
.detialscard{
    margin-top:15px;
    margin-bottom:15px;
    padding-left: 10px;
    padding-bottom: 10px;
}
</style>
<style>
    /* *{
      padding: 2px;
      margin: 2px;
    } */
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  #th1{
      color: #6c757d; text-align: center;text-transform: uppercase;
}
  .border {
  border: 2px indigo dashed;
      }
      .d-table {
       display:table;
      }
      .d-table-cell {
          display:table-cell;
      }

      .w-100 {
        width: 100%;
      }

      .tar {
        text-align: right;
      }
      /* .btn{
       color: white; background: royalblue; height: 60px; width: 160px; font-weight: bold; font-size: 20px; border-radius: 7px
      } */
  </style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                @if(session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                @endif
                <div class="card-header"><i class="fa fa-lock" aria-hidden="true"></i> {{ __('User Permission') }}</div>

                <div class="card-body">
                    <form  action="addpermission" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name" class="col-md-4 col-form-label">{{ __('User') }}</label>
                                <select id="select2dropdownuserid" name="User_Id" class="form-control" aria-label="Default select example" tabindex="1" autofocus required onchange="callSelectedUserPermissionList(this.value);" >
                                <option value="" {{ session('User_Id') ? '' : 'selected' }}>-SELECT-</option>
                                    @foreach($rsUser as $AllUsers)
                                        <option value="{{ $AllUsers['id'] }}" {{ session('User_Id') == $AllUsers['id'] ? 'selected' : '' }}>
                                            {{ $AllUsers['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-12" id="strhtmlPermissionDtls"  >
                            </div>
                        </div>
                        <section class="card detialscard">
                        <div class="row">
                        {{--Add More Form  --}}

                            <div class="col-lg-4">
                                <label for="F_H_CODE" class="col-form-label">{{ __('Fund HD') }}</label>
                                <input type="text" name="F_H_CODE[]" value="ALL" class="form-control" onkeyup="callFundedList(this.value,0);" autocomplete="off" onblur="myHideDropdownPanel(0);checkValuePresentOrNot(this.value);" tabindex="2" required="">
                                @error('F_H_CODE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4">
                                <label for="Sub_Div_Id" class="col-form-label">{{ __('Sub Div') }}</label>
                                <select name="Sub_Div_Id[]" id="select2subdivid0" class="form-control" aria-label="Default select example" tabindex="3" required>
                                    <option value="all" selected>ALL</option>
                                    @foreach($rsSubDiv as $Allsubdiv)
                                    <option value="{{ $Allsubdiv->Sub_Div_Id}}">{{ $Allsubdiv->Sub_Div_M}}</option>
                                    @endforeach
                                </select>
                                @error('Sub_Div_Id')
                                         <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="col-lg-3">
                                <label for="Work_Id" class="col-form-label">{{ __('Work ID') }}</label>

                                <select name="Work_Id[]" id="select2workid0" class="form-control" aria-label="Default select example" tabindex="4" required>
                                    <option value="all" selected>ALL</option>
                                    @foreach($rsWorkMaster as $AllWorkid)
                                    <option  value="{{ $AllWorkid->Work_Id}}">{{ $AllWorkid->Work_Id}}</option>
                                    @endforeach
                                </select>

                                @error('mobileno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                        {{--Add More Form  --}}

                        <div class="col-lg-1">
                            <a type="button" class="add-button" style="font-size: 25px;" ><i class="fa fa-plus-circle"></i></a>
                        </div>

                        <div class="col-12" id="strhtmlFundedDtls0"  >
                            <ul class="list-group">
                            </ul>
                        </div>
                        </div>

                        <div class="form-wrapper"></div>
                    </section>

                        <div class="row">

                        <div class="col-md-12" style="margin-top:15px;">
                            <button type="submit" class="btn btn-primary" tabindex="5" id="btnGrantPermission">
                                {{ __('Allow User Permission') }}
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   $('#select2dropdownuserid').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
    });

    $('#select2subdivid0').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
    });
    $('#select2workid0').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
    });


function callFundedList(pFoundedVal,rowid){
    event.preventDefault();
    $("#strhtmlFundedDtls"+rowid). css("display", "block");
    var _token = $("input[name='_token']").val();
    var fundeda = pFoundedVal;
    $.ajax({
        url: "{{ route('ajaxaddpermission') }}",
        type:'POST',
        dataType: 'JSON',
        data: {_token:_token, fundeda:fundeda},
        success: function(data) { //console.log(data.msg);
            var strhtml = '';
            if(data != ''){
                strhtml+='<ul class="list-group">';
                data.msg.forEach(function(number) {
                    strhtml+='<li class="list-group-item list-group-item-light">'+number.Fund_Hd_M+'</li>';
                });
                strhtml+='</ul>';
                $("#strhtmlFundedDtls"+rowid).html(strhtml);
            }else{
                $("#strhtmlFundedDtls"+rowid).html(strhtml);
            }

        }
    });
}

function callSelectedUserPermissionList(puid){
    var _token = $("input[name='_token']").val();
    var puid = puid;
    $.ajax({
        url: "{{ route('ajaxUserPermission') }}",
        type:'POST',
        dataType: 'JSON',
        data: {_token:_token, puid:puid},
        success: function(data) { //console.log(data.msg);
           // strhtmlPermissionDtls
            var strhtml = '';
            if(data != ''){
                strhtml+='<table class="table" style="margin-top:10px;"><thead class="thead-dark"><tr><th id="th1" style="text-align: center !important;" >Fund HD</th><th id="th1" style="text-align: center !important;" >Sub Div</th><th id="th1" style="text-align: center !important;" >Work ID</th><th id="th1">Action</th></tr></thead>';
                data.msg.forEach(function(number) {
                    var subdivid;
                    if(number.Sub_Div_Id == 'all'){
                        subdivid = number.Sub_Div_Id;
                    }else{
                        subdivid = number.Sub_Div_M;
                    }
                    console.log(number.Unique_Id);
                    strhtml+='<tr><td style="text-align: center !important;">'+number.F_H_CODE+'</td><td style="text-align: center !important;">'+subdivid+'</td><td style="text-align: center !important;">'+number.Work_Id+'</td><td style="text-align: center !important;"><a data-toggle="tooltip" title="Delete" onclick="callUserPermissionremove('+number.Unique_Id+','+number.User_Id+')" > <i class="fa fa-fw fa-trash" style="font-size:24px; color:red;"></i></a></td></tr>';
                });
                strhtml+='</table>';
                $("#strhtmlPermissionDtls").html(strhtml);
            }else{
                $("#strhtmlPermissionDtls").html(strhtml);
            }

        }
    });
}

$(document).ready(function() {
    var puid = "{{ session('User_Id') }}";

        if (!puid) {
            console.log('puid is null or empty, function not called');
        } else {
            console.log(puid);
            callSelectedUserPermissionList(puid);
        }
    });
function callUserPermissionremove(puid,puserid){
    console.log(puid , puserid);
    event.preventDefault();
    var _token = $("input[name='_token']").val();
    // var puid = puid;

    Swal.fire({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {

        $.ajax({
        url: "{{ route('ajaxRemovePermission') }}",
        type:'POST',
        dataType: 'JSON',
        data: {_token:_token, puid:puid, puserid:puserid},
        success: function(data) { //console.log(data.msg);
           // strhtmlPermissionDtls
            var strhtml = '';
            if(data != ''){
                strhtml+='<table class="table"><thead class="thead-dark"><tr><th id="th1" style="text-align: center !important;" >Fund HD</th><th id="th1" style="text-align: center !important;" >Sub Div</th><th id="th1" style="text-align: center !important;" >Work ID</th><th id="th1">Action</th></tr></thead>';
                data.msg.forEach(function(number) {
                    strhtml+='<tr><td style="text-align: center !important;">'+number.F_H_CODE+'</td><td style="text-align: center !important;">'+number.Sub_Div_M+'</td><td style="text-align: center !important;">'+number.Work_Id+'</td><td style="text-align: center !important;"><a data-toggle="tooltip" title="Delete" onclick="callUserPermissionremove('+number.Unique_Id+','+number.User_Id+')"> <i class="fa fa-fw fa-trash" style="font-size:24px; color:red;"></i></a></td></tr>';
                });
                strhtml+='</table>';
                $("#strhtmlPermissionDtls").html(strhtml);
            }else{
                $("#strhtmlPermissionDtls").html(strhtml);
            }

        }
    });
    }
});


}

function checkValuePresentOrNot(pval){
    if(pval != ''){
        $("#btnGrantPermission").css({display: "block"});
    }
}

jQuery(document).ready(function(){
       // $("#btnGrantPermission").css({display: "none"});

        var maxLimit = 5;
        var x = 1;

        jQuery('.add-button').on('click',function(e){
	    	e.preventDefault();
            // jQuery('#select2subdivid'+x).select2('destroy');
            // jQuery('#select2workid'+x).select2('destroy');
            var appendHTML = `<div class="row">
    <div class="col-lg-4">
        <label for="F_H_CODE" class="col-form-label"></label>
        <input type="text" name="F_H_CODE[]" value="ALL" class="form-control" onkeyup="callFundedList(this.value,${x});" autocomplete="off" onblur="myHideDropdownPanel(${x})" tabindex="${x}1">
    </div>
    <div class="col-lg-4">
        <label for="Sub_Div_Id" class="col-form-label"></label>
        <select name="Sub_Div_Id[]" id="select2subdivid${x}" class="form-control s2subdivid${x}" required tabindex="${x}2">
            <option value="all" selected>ALL</option>
            @foreach($rsSubDiv as $Allsubdiv)
                <option value="{{ $Allsubdiv->Sub_Div_Id }}">{{ $Allsubdiv->Sub_Div_M }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-3">
        <label for="Work_Id" class="col-form-label"></label>
        <select name="Work_Id[]" id="select2workid${x}" class="form-control" tabindex="${x}3" required>
            <option value="all" selected>ALL</option>
            @foreach($rsWorkMaster as $AllWorkid)
                <option value="{{ $AllWorkid->Work_Id }}">{{ $AllWorkid->Work_Id }}</option>
            @endforeach
        </select>
    </div>
    <a class="remove-button" style="font-size: 25px;color:red;"><i class="fa fa-close"></i></a>
    <div class="col-12" id="strhtmlFundedDtls${x}">
        <ul class="list-group"></ul>
    </div>
</div>`;
            // jQuery('#select2subdivid'+x).select2();
            // jQuery('#select2workid'+x).select2();
            if(x < maxLimit){
                jQuery('.form-wrapper').append(appendHTML);
                x++;
                appendHTML = "";
	        }
	    });



	    // for deletion
	    jQuery('.form-wrapper').on('click', '.remove-button', function(e){
	        e.preventDefault();
	        jQuery(this).parent('div').remove();
	        x--;
	    });
	});

    function myHideDropdownPanel(phide) {
      $("#strhtmlFundedDtls"+phide). css("display", "none");
    }
</script>


@endsection
