@extends('admin.layouts.app')

@section('content')
<form action="{{route('user.admin.store',['id'=>$row->id ?? -1])}}" method="post" class="needs-validation" novalidate>
    @csrf
    <div class="container">
        <div class="d-flex justify-content-between mb20">
            <div class="">
                <h1 class="title-bar">{{$row->id ? 'Edit: '.$row->getDisplayName() : 'Add new user'}}</h1>
            </div>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-9">
                <div class="panel">
                    <div class="panel-title"><strong>{{ __('User Info')}}</strong></div>
                    <div class="panel-body">
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("Business name")}}</label>
                                    <input type="text" value="{{old('business_name',$row->business_name)}}" name="business_name" placeholder="{{__("Business name")}}" class="form-control">
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("Business name")}}</label>
                                    <input type="text" id="business_name" value="{{old('business_name', $row->business_name)}}" name="business_name" placeholder="{{__("Business name")}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('E-mail')}} <span class="text-danger">*</span></label>
                                    <input type="email" required value="{{old('email',$row->email)}}" placeholder="{{ __('Email')}}" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("User name")}}</label>
                                    <input type="text" name="user_name" value="{{old('user_name',$row->user_name)}}" id="user_name"placeholder="{{__("User name")}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("First name")}} <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{old('first_name',$row->first_name)}}" name="first_name" placeholder="{{__("First name")}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("Last name")}} <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{old('last_name',$row->last_name)}}" name="last_name" placeholder="{{__("Last name")}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Phone Number')}} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{old('phone',$row->phone)}}" placeholder="{{ __('Phone')}}" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Birthday')}}</label>
                                    <input type="text" value="{{ old('birthday',$row->birthday ? date("Y/m/d",strtotime($row->birthday)) :'') }}" placeholder="{{ __('Birthday')}}" name="birthday" class="form-control has-datepicker input-group date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Address Line 1')}}</label>
                                    <input type="text" value="{{old('address',$row->address)}}" placeholder="{{ __('Address')}}" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Address Line 2')}}</label>
                                    <input type="text" value="{{old('address2',$row->address2)}}" placeholder="{{ __('Address 2')}}" name="address2" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("Zip Code")}} <span class="text-danger">*</span></label>
                                    <input type="text" required  id="zip_code" value="{{old('zip_code', $row->zip_code)}}" name="zip_code" placeholder="{{__("Zip Code")}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("City")}}</label>
                                    <input type="text" id="city" value="{{old('city', $row->city)}}" name="city" placeholder="{{__("City")}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("State")}}</label>
                                    <input type="text" id="state" value="{{old('state', $row->state)}}" name="state" placeholder="{{__("State")}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("Country")}}</label>
                                    <select name="country" class="form-control" id="country">
                                        <option value="">{{__('-- Select --')}}</option>
                                        @foreach(get_country_lists() as $id => $name)
                                        <option @if($row->country == $id) selected @endif value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="panContainer"style=" margin-bottom: 1rem;">
                                    <label>{{__("PAN Number")}}</label>
                                    <input type="text" value="{{old('business_pan_number', $row->business_pan_number)}}" name="business_pan_number"  id="business_pan_number" placeholder="{{__("Business PAN Number")}}" class="form-control" id="business_pan_number"maxlength ="10">
                                </div>
                                <span id="panError" style="color: red; display: none; margin-top:10px;">Invalid PAN format. Example: ABCDE1234F</span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="gstContainer" style=" margin-bottom: 1rem;">
                                    <label>{{__("GST Number")}}</label>
                                    <input type="text" value="{{old('business_gst_number', $row->business_gst_number)}}" name="business_gst_number" id="business_gst_number" placeholder="{{__("Business GST Number")}}" class="form-control" id="business_gst_number"maxlength ="15">
                                </div>
                                <span id="gstError" style="color: red; display: none; margin-top:10px;">Invalid GST format. Example: 22ABCDE1234F1Z5</span> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__("Business Address")}}</label>
                                    <input type="text" value="{{old('business_address', $row->business_address)}}" name="business_address" placeholder="{{__("Business Address")}}" class="form-control" id="business_address">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">{{ __('Biographical')}}</label>
                            <div class="">
                                <textarea name="bio" class="d-none has-ckeditor" cols="30" rows="10">{{old('bio',$row->bio)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-title"><strong>{{ __('Publish')}}</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>{{__('Status')}}</label>
                            <select required class="custom-select" name="status">
                                <option @if(old('status',$row->status) =='publish') selected @endif value="publish">{{ __('Publish')}}</option>
                                <option @if(old('status',$row->status) =='blocked') selected @endif value="blocked">{{ __('Blocked')}}</option>
                            </select>
                        </div>
                        @if(is_admin())
                        @if(empty($user_type) or $user_type != 'vendor')
                        <div class="form-group">
                            <label>{{__('Role')}} <span class="text-danger">*</span></label>
                            <select required class="form-control" name="role_id" id="role_id">
                                <option value="">{{ __('-- Select --')}}</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}" @if(old('role_id',$row->role_id) == $role->id) selected @elseif(old('role_id') == $role->id ) selected @elseif(request()->input("user_type") == strtolower($role->name) ) selected @endif >{{ucfirst($role->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>{{__('Email Verified?')}}</label>
                            <select class="form-control" name="is_email_verified">
                                <option value="">{{ __('No')}}</option>
                                <option @if(old('is_email_verified',$row->email_verified_at ? 1 : 0)) selected @endif value="1">{{__('Yes')}}</option>
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-title"><strong>{{ __('Vendor')}}</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>{{__('Vendor Commission Type')}}</label>
                            <div class="form-controls">
                                <select name="vendor_commission_type" class="form-control">
                                    <option value="">{{__("Default")}}</option>
                                    <option value="percent" {{old("vendor_commission_type",($row->vendor_commission_type ?? '')) == 'percent' ? 'selected' : ''  }}>{{__('Percent')}}</option>
                                    <option value="amount" {{old("vendor_commission_type",($row->vendor_commission_type ?? '')) == 'amount' ? 'selected' : ''  }}>{{__('Amount')}}</option>
                                    <option value="disable" {{old("vendor_commission_type",($row->vendor_commission_type ?? '')) == 'disable' ? 'selected' : ''  }}>{{__('Disable Commission')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('Vendor commission value')}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="vendor_commission_amount" value="{{old("vendor_commission_amount",($row->vendor_commission_amount ?? '')) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-title"><strong>{{ __('Avatar')}}</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',old('avatar_id',$row->avatar_id)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
            <span></span>
            <button class="btn btn-primary" type="submit">{{ __('Save Change')}}</button>
        </div>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwHMc5ARYhtAdmTMJpYxt3E8-olzKNC7U&libraries=places"></script>
<script>
    function getLocationByZipCode(zipCode) {
        if (zipCode.length < 5) return; 
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({
            'address': zipCode
        }, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK && results.length > 0) {
                let city = '',
                    state = '',
                    country = '';
                results[0].address_components.forEach(component => {
                    if (component.types.includes("locality")) {
                        city = component.long_name;
                    }
                    if (component.types.includes("administrative_area_level_1")) {
                        state = component.long_name;
                    }
                    if (component.types.includes("country")) {
                        country = component.long_name;
                    }
                });
                $('#city').val(city);
                $('#state').val(state);
                $('#country').val(getCountryCodeByName(country));
            } else {
                console.error("Geocode failed: " + status);
            }
        });
    }

    // Autofill fields on zip code change
    $('#zip_code').on('input', function() {
        let zipCode = $(this).val().trim();
        if (zipCode) getLocationByZipCode(zipCode);
    });

    // Map country name to the dropdown value
    function getCountryCodeByName(countryName) {
        let countryCode = '';
        $('#country option').each(function() {
            if ($(this).text().trim() === countryName) {
                countryCode = $(this).val();
            }
        });
        return countryCode;
    }
</script>
<script> 
    function toggleRequiredFields() {
        var businessName = $('#business_name').val().trim();

        if (businessName) {
            $('#user_name').attr('required', true);
            $('#business_pan_number').attr('required', true);
            $('#business_gst_number').attr('required', true);
            $('#business_address').attr('required', true);
        } else {
            $('#user_name').removeAttr('required');
            $('#business_pan_number').removeAttr('required');
            $('#business_gst_number').removeAttr('required');
            $('#business_address').removeAttr('required');
        }
    }

    
    $('#business_name').on('keyup', function() {
        toggleRequiredFields();
    });

   
    $(document).ready(function() {
        toggleRequiredFields();
    });
</script>
<script>
   
    function toggleBusinessNameRequirement() {
        var selectedRole = $('#role_id option:selected').text().toLowerCase(); 

        if (selectedRole === 'vendor') {
            $('#business_name').attr('required', true); 
        } else {
            $('#business_name').removeAttr('required'); 
        }
    }

    
    $('#role_id').on('change', function () {
        toggleBusinessNameRequirement();
    });

    
    $(document).ready(function () {
        toggleBusinessNameRequirement();
    });
</script>
<script>

    
    function validatePAN() {
        var pan = $('#business_pan_number').val().trim(); 
        var panPattern = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/; 
        
        if (pan === "") {
         
            $('#panError').hide();
            $('#panContainer').css('margin-bottom', '1rem');
        } else if (panPattern.test(pan)) {
          
            $('#panError').hide();
            $('#panContainer').css('margin-bottom', '1rem');
        } else {
           
            $('#panError').show();
            $('#panContainer').css('margin-bottom', '0rem');
        }
    }
    $('#business_pan_number').on('keyup blur', function () {
        validatePAN();
    });
    $(document).ready(function () {
        validatePAN();
    });

</script>
<script>

    function validateGST() {
        var gst = $('#business_gst_number').val().trim(); 
        var gstPattern = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[A-Z0-9]{3}$/; 

        if (gst === "") {
         
            $('#gstError').hide();
            $('#business_gst_number').removeClass('is-invalid').removeClass('is-valid');
            $('#gstContainer').css('margin-bottom', '1rem');
        } else if (gstPattern.test(gst)) {
         
            $('#gstError').hide();
            $('#gstContainer').css('margin-bottom', '1rem');
            $('#business_gst_number').removeClass('is-invalid').addClass('is-valid');
        } else {
        
            $('#gstError').show();
            $('#gstContainer').css('margin-bottom', '0rem');
            $('#business_gst_number').removeClass('is-valid').addClass('is-invalid');
        }
    }


    $('#business_gst_number').on('blur', function () {
        validateGST();
    });


    $(document).ready(function () {
        validateGST();
    });
</script>
@endsection