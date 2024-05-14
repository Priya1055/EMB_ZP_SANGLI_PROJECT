@extends('layouts.header')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> User</div>

                <div class="card-body">
                <form method="POST" action="{{ url('/Edituser') }}" enctype="multipart/form-data">
                    
                @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                <label for="usertypes" class="col-md-4 col-form-label text-md-right">Role<strong style="color:red;" >*</strong></label>
                                    <div class="col-md-6">
                                        <select name="usertypes" class="form-control selectpicker" required tabindex="1" autofocus autocomplete="usertypes">
                                            <option value="">-Select-</option>
                                            @if(auth()->user()->usertypes === "EE" || auth()->user()->usertypes === "PA")
                                                <option value="EE" {{ ($user->usertypes === 'EE') ? 'selected' : '' }}>EE</option>
                                                <option value="PA" {{ ($user->usertypes === 'PA') ? 'selected' : '' }}>PA</option>
                                                <option value="AAO" {{ ($user->usertypes === 'AAO') ? 'selected' : '' }}>AAO</option>
                                                <option value="PO" {{ ($user->usertypes === 'PO') ? 'selected' : '' }}>PO</option>
                                                <option value="audit" {{ ($user->usertypes === 'audit') ? 'selected' : '' }}>Auditor</option>
                                                <option value="DYE" {{ ($user->usertypes === 'DYE') ? 'selected' : '' }}>DYE</option>
                                                <!-- <option value="Agency" {{ ($user->usertypes === 'Agency') ? 'selected' : '' }}>Agency</option> -->
                                            @elseif(auth()->user()->usertypes === "DYE")
                                                <option value="SO" {{ ($user->usertypes === 'SO') ? 'selected' : '' }}>SO</option>
                                                <option value="SDC" {{ ($user->usertypes === 'SDC') ? 'selected' : '' }}>SDC</option>
                                                <!-- <option value="Agency" {{ ($user->usertypes === 'Agency') ? 'selected' : '' }}>Agency</option> -->
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autocomplete="name" tabindex="2">
                                     
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobileno" class="col-md-4 col-form-label text-md-right">Division<strong style="color:red;" >*</strong></label>

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
                                        <select name="Sub_Div_id" class="form-control selectpicker" tabindex="4" autocomplete="Sub_Div_id">
                                            <option value="" selected>-Select-</option>
                                            @foreach($rsSubDiv as $AllRs)
                                                <option value="{{ $AllRs->Sub_Div_Id }}" {{ ($user->Sub_Div_id == $AllRs->Sub_Div_Id) ? 'selected' : '' }}>
                                                    {{ $AllRs->Sub_Div }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                <label for="Designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>
                                    <div class="col-md-6">
                                        <select name="Designation" class="form-control selectpicker" required tabindex="5" autocomplete="Designation">
                                            <option value="" selected> -Select- </option>
                                            @foreach($designationlist as $designation)
                                                    <option value="{{ $designation->Designation }}" {{ $selectedDesignationname == $designation->Designation ? 'selected' : '' }}>
                                                        {{ $designation->Designation }}
                                                    </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="period_from" class="col-md-4 col-form-label text-md-right">Period From</label>

                                    <div class="col-md-6">
                                        <input id="period_from" type="date" class="form-control" name="period_from" value="{{$user->period_from}}" tabindex="13">

                                
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email<strong style="color:red;">*</strong></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control " name="email" value="{{$user->email }}" required autocomplete="email" tabindex="6">
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobileno" class="col-md-4 col-form-label text-md-right">Mobile no<strong style="color:red;">*</strong></label>

                                    <div class="col-md-6">
                                        <input id="mobileno" type="tel"  class="form-control" name="mobileno" value="{{  $user->mobileno }}" required autocomplete="mobileno" tabindex="7" >

                                            @if(old('mobileno', $user->mobileno) !== $user->mobileno && $errors->has('mobileno'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mobileno') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Usernm" class="col-md-4 col-form-label text-md-right">Username<strong style="color:red;">*</strong></label>

                                    <div class="col-md-6">
                                        <input id="Usernm" type="text" class="form-control" name="Usernm" value="{{$user->Usernm}}" required autocomplete="Usernm" tabindex="8">

                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                    
                                    </div>

                                <div class="form-group row">
                                <label for="signature" class="col-md-4 col-form-label text-md-right">{{ __('Update Signature') }}</label>

                                    <div class="col-md-6">
                                        <input id="signature" type="file" class="form-control-file @error('signature') is-invalid @enderror" name="signature" tabindex="12" accept=".jpg, .jpeg" onchange="previewSignature()">
                                        <small class="form-text text-muted">Update your signature (JPG, JPEG).</small>



                                        @error('signature')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p>Image Path: {{ $imagePath }}</p>

                                        <img id="image-preview" src="{{ $imagePath }}" alt="Preview" style="max-width: 100px; max-height: 100px;">
                                        <!-- @if($imagePath)
            <div class="mt-2">
                <p>Current Signature Path: {{ $imagePath }}</p>
                <p>Current Signature:</p>
                <img src="{{ asset($imagePath) }}" alt="Current Signature" style="max-width: 200px;">
            </div>
        @else
            <p>No signature found for this user.</p>
        @endif -->
    
    
    
    </div>
                                </div>

                             
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" tabindex="11  ">
                                           Update
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
    function previewSignature() {
        // Get the file input and the image preview elements
        var fileInput = document.getElementById('signature');
        var imagePreview = document.getElementById('image-preview');

        // Check if a file is selected
        if (fileInput.files.length > 0) {
            // Get the selected file
            var file = fileInput.files[0];

            // Create a URL for the selected file and update the image source
            var imageUrl = URL.createObjectURL(file);
            imagePreview.src = imageUrl;
        }
    }
</script>
<!-- //when signature are upload that uploaded image display on UI -->




<!-- //when EE is Usertype that time subdivId  Hide -->
<script>
    $(document).ready(function () {
        // Function to show/hide the Sub Division field based on the selected role
        function toggleSubDivisionField(selectedRole) {
            if (selectedRole === "EE" || selectedRole === "PA" || selectedRole === "PO" || selectedRole === "AAO" || selectedRole === "audit" || selectedRole === "Agency") {
                $('#subDivisionField').hide();
            } else {
                $('#subDivisionField').show();
            }
        }

        // Hide the Sub Division field initially
        // $('#subDivisionField').hide();

        // Store the initial selected role
        var initialSelectedRole = $('select[name="usertypes"]').val();
        console.log("Initial Selected Role: " + initialSelectedRole);

        // Show/hide on initial load
        toggleSubDivisionField(initialSelectedRole);

        // Handle the change event of the usertypes dropdown
        $('select[name="usertypes"]').change(function () {
            // Retrieve the selected value
            var selectedRole = $(this).val();
            console.log("Selected Role: " + selectedRole);

            // Show/hide the Sub Division field based on the selected role
            toggleSubDivisionField(selectedRole);
        });
    });
</script>
<!-- //subdiv hide -->
<!-- //when EE is Usertype that time subdivId  Hide -->


@endsection
