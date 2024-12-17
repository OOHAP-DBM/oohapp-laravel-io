@extends('layouts.user')
@section('content')
@if($message = Session::get('warning'))

<h2 class="title-bar">
        {{__("Awaiting Approval Confirmation")}}
    </h2>
@else
    <h2 class="title-bar">
        {{__("Profile Info")}}
        <a href="{{route('user.change_password')}}" class="btn-change-password">{{__("Change Password")}}</a>
    </h2>
    @endif
 
    @if($message = Session::get('warning'))

    @include('admin.message')
@else
    <form action="{{route('user.profile.update')}}" method="post" class="input-has-icon">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-title">
                    <strong>{{__("Personal Information")}}</strong>
                </div>
                @if($is_vendor_access)
                    <!-- <div class="form-group">
                        <label>{{__("Business name")}}</label>
                        <input type="text" value="{{old('business_name',$dataUser->business_name)}}" name="business_name" placeholder="{{__("Business name")}}" class="form-control">
                        <i class="fa fa-user input-icon"></i>
                    </div> -->
                @endif
                <div class="form-group">
                    <label>{{__("User name")}} <span class="text-danger">*</span></label>
                    <input type="text" required minlength="4" name="user_name" value="{{old('user_name',$dataUser->user_name)}}" placeholder="{{__("User name")}}" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("E-mail")}} <span class="text-danger">*</span> </label>
                    <input type="email" required name="email" value="{{old('email',$dataUser->email)}}" placeholder="{{__("E-mail")}}" class="form-control">
                    <i class="fa fa-envelope input-icon"></i>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__("First name")}} <span class="text-danger">*</span> </label>
                            <input type="text" required value="{{old('first_name',$dataUser->first_name)}}" name="first_name" placeholder="{{__("First name")}}" class="form-control">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__("Last name")}} <span class="text-danger">*</span> </label>
                            <input type="text" required value="{{old('last_name',$dataUser->last_name)}}" name="last_name" placeholder="{{__("Last name")}}" class="form-control">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                         <div class="form-group">
                           <label>{{__("Phone Number")}} <span class="text-danger">*</span> </label>
                           <input type="text" required value="{{old('phone',$dataUser->phone)}}" name="phone" placeholder="{{__("Phone Number")}}" class="form-control">
                          <i class="fa fa-phone input-icon"></i>
                         </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                             <label>{{__("Birthday")}}</label>
                            <input type="text" value="{{ old('birthday',$dataUser->birthday? display_date($dataUser->birthday) :'') }}" name="birthday" placeholder="{{__("Birthday")}}" class="form-control date-picker">
                            <i class="fa fa-birthday-cake input-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("About Yourself")}}</label>
                    <textarea name="bio" rows="5" class="form-control">{{old('bio',$dataUser->bio)}}</textarea>
                </div>
                <div class="form-group">
                    <label>{{__("Avatar")}}</label>
                    <div class="upload-btn-wrapper">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    {{__("Browse")}}… <input type="file">
                                </span>
                            </span>
                            <input type="text" data-error="{{__("Error upload...")}}" data-loading="{{__("Loading...")}}" class="form-control text-view" readonly value="{{ get_file_url( old('avatar_id',$dataUser->avatar_id) ) ?? $dataUser->getAvatarUrl()?? __("No Image")}}">
                        </div>
                        <input type="hidden" class="form-control" name="avatar_id" value="{{ old('avatar_id',$dataUser->avatar_id)?? ""}}">
                        <img class="image-demo" src="{{ get_file_url( old('avatar_id',$dataUser->avatar_id) ) ??  $dataUser->getAvatarUrl() ?? ""}}"/>
                    </div>
                </div>
                <hr>
                <div class="form-title">
                    <strong>{{__("Location Information")}}</strong>
                </div>
                <div class="form-group">
                    <label>{{__("Address Line 1")}}</label>
                    <input type="text" value="{{old('address',$dataUser->address)}}" name="address" placeholder="{{__("Address")}}" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Address Line 2")}}</label>
                    <input type="text" value="{{old('address2',$dataUser->address2)}}" name="address2" placeholder="{{__("Address2")}}" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("Pin Code")}}</label>
            <input type="text" value="{{old('zip_code',$dataUser->zip_code)}}" name="zip_code" placeholder="{{__("Zip Code")}}" class="form-control" id="zip_code">
            <i class="fa fa-map-pin input-icon"></i>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("City")}}</label>
            <input type="text" value="{{old('city',$dataUser->city)}}" name="city" placeholder="{{__("City")}}" class="form-control" id="city">
            <i class="fa fa-street-view input-icon"></i>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("State")}}</label>
            <input type="text" value="{{old('state',$dataUser->state)}}" name="state" placeholder="{{__("State")}}" class="form-control" id="state">
            <i class="fa fa-map-signs input-icon"></i>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("Country")}}</label>
            <select name="country" class="form-control" id="country">
                <option value="">{{__('-- Select --')}}</option>
                @foreach(get_country_lists() as $id=>$name)
                    <option value="{{$id}}" @if((old('country',$dataUser->country ?? '')) == $id) selected @endif>{{$name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
             {{--   <div class="form-group">
                    <label>{{__("State")}}</label>
                    <input type="text" value="{{old('state',$dataUser->state)}}" name="state" placeholder="{{__("State")}}" class="form-control">
                    <i class="fa fa-map-signs input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Country")}}</label>
                    <select name="country" class="form-control">
                        <option value="">{{__('-- Select --')}}</option>
                        @foreach(get_country_lists() as $id=>$name)
                            <option @if((old('country',$dataUser->country ?? '')) == $id) selected @endif value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>{{__("Zip Code")}}</label>
                    <input type="text" value="{{old('zip_code',$dataUser->zip_code)}}" name="zip_code" placeholder="{{__("Zip Code")}}" class="form-control">
                    <i class="fa fa-map-pin input-icon"></i>
                </div>--}}
            </div>
        {{--    <div class="col-md-6">
                <div class="form-title">
                    <strong>{{__("Location Information")}}</strong>
                </div>
                <div class="form-group">
                    <label>{{__("Address Line 1")}}</label>
                    <input type="text" value="{{old('address',$dataUser->address)}}" name="address" placeholder="{{__("Address")}}" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Address Line 2")}}</label>
                    <input type="text" value="{{old('address2',$dataUser->address2)}}" name="address2" placeholder="{{__("Address2")}}" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("City")}}</label>
                    <input type="text" value="{{old('city',$dataUser->city)}}" name="city" placeholder="{{__("City")}}" class="form-control">
                    <i class="fa fa-street-view input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("State")}}</label>
                    <input type="text" value="{{old('state',$dataUser->state)}}" name="state" placeholder="{{__("State")}}" class="form-control">
                    <i class="fa fa-map-signs input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Country")}}</label>
                    <select name="country" class="form-control">
                        <option value="">{{__('-- Select --')}}</option>
                        @foreach(get_country_lists() as $id=>$name)
                            <option @if((old('country',$dataUser->country ?? '')) == $id) selected @endif value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>{{__("Zip Code")}}</label>
                    <input type="text" value="{{old('zip_code',$dataUser->zip_code)}}" name="zip_code" placeholder="{{__("Zip Code")}}" class="form-control">
                    <i class="fa fa-map-pin input-icon"></i>
                </div>

            </div>
            --}}
            <!-- for vendor penal  -->
            {{-- @if($is_vendor_access) --}} 
            <div class="col-md-6">  
    <div class="form-title">
        <strong>{{__("Business details")}}</strong>
    </div>
    <div class="form-group">
        <label>{{__("Business name")}}</label>
        <input type="text" value="{{old('business_name', $dataUser->business_name)}}" name="business_name" placeholder="{{__("Business name")}}" class="form-control" id="business_name">
        <i class="fa fa-user input-icon"></i>
    </div>  

    <div class="form-group">
        <label>{{__("PAN Number")}}</label>
        <input type="text" value="{{old('business_pan_number', $dataUser->business_pan_number)}}" name="business_pan_number" placeholder="{{__("Business PAN Number")}}" class="form-control" id="business_pan_number">
        <i class="fa fa-id-card input-icon"></i>
    </div>

    <div class="form-group">
        <label>{{__("GST Number")}}</label>
        <input type="text" value="{{old('business_gst_number', $dataUser->business_gst_number)}}" name="business_gst_number" placeholder="{{__("Business GST Number")}}" class="form-control" id="business_gst_number">
        <i class="fa fa-money input-icon"></i>
    </div>

    <div class="form-group">
        <label>{{__("Business Address")}}</label>
        <input type="text" value="{{old('business_address', $dataUser->business_address)}}" name="business_address" placeholder="{{__("Business Address")}}" class="form-control" id="business_address">
        <i class="fa fa-address-card input-icon"></i>
    </div>
</div>
        </div>
       {{-- @endif --}}

            <div class="col-md-12">
                <hr>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
            </div>
        </div>
    </form>
@endif
    @if(!empty(setting_item('user_enable_permanently_delete')) and !is_admin())
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-danger">
                {{__("Delete account")}}
            </h4>
            <div class="mb-4 mt-2">
                {!! clean(setting_item_with_lang('user_permanently_delete_content','',__('Your account will be permanently deleted. Once you delete your account, there is no going back. Please be certain.'))) !!}
            </div>
            <a data-toggle="modal" data-target="#permanentlyDeleteAccount" class="btn btn-danger" href="">{{__('Delete your account')}}</a>
        </div>

        <!-- Modal -->
        <div class="modal  fade" id="permanentlyDeleteAccount" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Confirm permanently delete account')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="my-3">
                            {!! clean(setting_item_with_lang('user_permanently_delete_content_confirm')) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <a href="{{route('user.permanently.delete')}}" class="btn btn-danger">{{__('Confirm')}}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwHMc5ARYhtAdmTMJpYxt3E8-olzKNC7U&libraries=places"></script>

<script>
    // Function to get the location details (country, state, city) based on the zip code
    function getLocationByZipCode(zipCode) {
        var geocoder = new google.maps.Geocoder();
        
        geocoder.geocode({ 'address': zipCode }, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                var city = '', state = '', country = '';
                
                for (var i = 0; i < results.length; i++) {
                    for (var j = 0; j < results[i].address_components.length; j++) {
                        var component = results[i].address_components[j];
                        if (component.types.indexOf("locality") !== -1) {
                            city = component.long_name;
                        }
                        if (component.types.indexOf("administrative_area_level_1") !== -1) {
                            state = component.long_name;
                        }
                        if (component.types.indexOf("country") !== -1) {
                            country = component.long_name;
                        }
                    }
                }

                // Set values in the form fields
                $('#city').val(city);
                $('#state').val(state);
                $('#country').val(getCountryCodeByName(country)); // Function to match country name to code

            } else {
                console.log("Geocode was not successful for the following reason: " + status);
                // alert("Could not retrieve location information. Please check the zip code.");
            }
        });
    }

    // Trigger the autofill when the zip code field is typed into (keyup event)
    $('#zip_code').on('keyup', function() {
        var zipCode = $(this).val();
        if (zipCode) {
            getLocationByZipCode(zipCode);
        }
    });

    // Function to convert country name to its corresponding country code
    function getCountryCodeByName(countryName) {
        var countryCode = '';
        $('#country option').each(function() {
            if ($(this).text() === countryName) {
                countryCode = $(this).val();
            }
        });
        return countryCode;
    }
</script>
<script>
    // Function to toggle the required attribute based on Business name
    function toggleRequiredFields() {
        var businessName = $('#business_name').val().trim();
        
        if (businessName) {
            // If Business name has a value, make other fields required
            $('#business_pan_number').attr('required', true);
            $('#business_gst_number').attr('required', true);
            $('#business_address').attr('required', true);
        } else {
            // If Business name is empty, remove the required attribute
            $('#business_pan_number').removeAttr('required');
            $('#business_gst_number').removeAttr('required');
            $('#business_address').removeAttr('required');
        }
    }

    // Trigger the function on input change in Business name field
    $('#business_name').on('keyup', function() {
        toggleRequiredFields();
    });

    // Initial check on page load (in case there is already a value in the Business name field)
    $(document).ready(function() {
        toggleRequiredFields();
    });
</script>
@endsection
