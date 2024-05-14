@extends('layouts.header')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> {{ __('User') }}</div>

                <div class="card-body">
                <form method="POST" action="adduser" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="usertypes" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}<strong style="color:red;" >*</strong></label>
                                    <div class="col-md-6">
                                        <select name="usertypes" class="form-control selectpicker" required tabindex="1" autofocus autocomplete="usertypes" >
                                            <option value="" selected >-Select-</option>
                                            @if(auth()->user()->usertypes === "EE" || auth()->user()->usertypes === "PA")

                                            <option value="EE">EE</option>
                                            <option value="PA">PA</option>
                                            <option value="DYE">DYE</option>
                                            <!-- <option value="SDC">SDC</option> -->
                                            <option value="PO">PO</option>
                                             <option value="AAO">AAO</option>
                                            <option value="audit">Auditor</option>
                                            <option value="Agency">Agency</option>


                                            @endif
                                            @if(auth()->user()->usertypes === "DYE" )

                                            <option value="SO">SO</option>
                                            <option value="SDC">SDC</option>
                                            <option value="Agency">Agency</option>


                                            @endif
                                        </select>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" tabindex="2" >
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobileno" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}<strong style="color:red;" >*</strong></label>

                                    <div class="col-md-6">
                                        <select name="Div_id" class="form-control selectpicker" required tabindex="3" autocomplete="Div_id" >
                                            {{-- <option value="" selected >-Select-</option> --}}
                                            @foreach($rsDiv as $AllRs)
                                                <option selected value="{{ $AllRs->div_id}}">{{ $AllRs->div}}</option>
                                            @endforeach
                                             </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="subDivisionField">
                                    <label for="mobileno" class="col-md-4 col-form-label text-md-right">{{ __('Sub Division') }}</label>

                                    <div class="col-md-6">
                                        <select name="Sub_Div_id" class="form-control selectpicker" tabindex="4" autocomplete="Sub_Div_id" >
                                            <option value="" selected >-Select-</option>
                                            @foreach($rsSubDiv as $AllRs)
                                                <option value="{{ $AllRs->Sub_Div_Id}}">{{ $AllRs->Sub_Div}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>
                                <div class="form-group row">
                                    <label for="Designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                                    <div class="col-md-6">
                                        <select name="Designation" class="form-control selectpicker" required tabindex="5" autocomplete="Designation">
                                            <option value="" selected >-Select-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
    <label for="period_from" class="col-md-4 col-form-label text-md-right">{{ __('Period From') }}</label>

    <div class="col-md-6">
        <input id="period_from" type="date" class="form-control @error('period_from') is-invalid @enderror" name="period_from" value="{{ old('period_from') }}" tabindex="13">

        @error('period_from')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<strong style="color:red;">*</strong></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" tabindex="6">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobileno" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}<strong style="color:red;">*</strong></label>

                                    <div class="col-md-6">
                                        <input id="mobileno" type="tel"  class="form-control @error('mobileno') is-invalid @enderror" name="mobileno" value="{{ old('mobileno') }}" required autocomplete="mobileno" tabindex="7" >

                                        @error('mobileno')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Usernm" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}<strong style="color:red;">*</strong></label>

                                    <div class="col-md-6">
                                        <input id="Usernm" type="text" class="form-control @error('Usernm') is-invalid @enderror" name="Usernm" required autocomplete="Usernm" tabindex="8">

                                        @error('Usernm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<strong style="color:red;">*</strong></label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" tabindex="9">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" tabindex="10">
                                   </div>
                                </div>
                                <div class="form-group row">
                                    <label for="signature" class="col-md-4 col-form-label text-md-right">{{ __('Upload Signature') }}</label>

                                    <div class="col-md-6">
                                        <input id="signature" type="file" class="form-control-file @error('signature') is-invalid @enderror" name="signature" tabindex="12" accept=".jpg, .jpeg">
                                        <small class="form-text text-muted">Upload your signature (JPG, JPEG).</small>


                                        <div id="selected-file-info"></div>
                                        <div id="selected-file-preview"></div>

                                        @error('signature')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                             
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" tabindex="11  ">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Add this script at the end of your HTML body or in the header section -->
<script>
    $(document).ready(function() {
        // Event listener for the change event on the usertypes dropdown
        $('select[name="usertypes"]').change(function() {
            // Get the selected usertypes value
            var selectedUsertypes = $(this).val();
            console.log(selectedUsertypes);

            // Make an AJAX request to fetch designations based on usertypes
            $.ajax({
                type: 'POST',
                url: '/AddUsersgetDesignations', // Update the URL to your Laravel route
                data: {
                    usertypes: selectedUsertypes,
                    _token: $('input[name="_token"]').val()
                },
                success: function(data) {
                    // Clear existing options in the Designation dropdown
                    $('select[name="Designation"]').empty();

                    // Add default option
                    $('select[name="Designation"]').append('<option value="" selected>-Select-</option>');

                    // Add options based on the response
                    $.each(data.designations, function(index, value) {
                        $('select[name="Designation"]').append('<option value="' + value.Designation + '">' + value.Designation + '</option>');
                    });
                },
            });
        });
    });
</script>



<!-- //when signature are upload that uploaded image display on UI -->
<script>
    // Listen for file input change
    $('#signature').change(function() {
        // Get the selected file
        var file = $(this)[0].files[0];

        // Display file information
        if (file) {
            var fileInfo = 'File Name: ' + file.name + '<br>';
            fileInfo += 'File Size: ' + file.size + ' bytes<br>';
            fileInfo += 'File Type: ' + file.type;

            $('#selected-file-info').html(fileInfo);

            // Display the image preview
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#selected-file-preview').html('<img src="' + e.target.result + '" width="100" height="80" />');
            };
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, clear the displayed information
            $('#selected-file-info').html('');
            $('#selected-file-preview').html('');
        }
    });
</script>
<!-- //when signature are upload that uploaded image display on UI -->


<!-- //when EE is Usertype that time subdivId  Hide -->
<script>
    $(document).ready(function () {
        // Hide the Sub Division field initially
        $('#subDivisionField').hide();

        // Handle the change event of the usertypes dropdown
        $('select[name="usertypes"]').change(function () {
            // Retrieve the selected value
            var selectedRole = $(this).val();
            
            // Display the selected value in the console for testing
            console.log("Selected Role: " + selectedRole);

            // Show/hide the Sub Division field based on the selected role
            if (selectedRole === "EE" || selectedRole === "PA" || selectedRole === "PO" || selectedRole === "AAO" || selectedRole === "audit" || selectedRole === "Agency" ) {
                $('#subDivisionField').hide();
            } else {
                $('#subDivisionField').show();
            }
        });
    });
</script>
<!-- //subdiv hide -->
<!-- //when EE is Usertype that time subdivId  Hide -->

@endsection
