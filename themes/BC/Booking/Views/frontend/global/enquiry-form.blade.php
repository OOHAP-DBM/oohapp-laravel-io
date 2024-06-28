<?php
$user = auth()->user();
?>
<div class="modal fade" tabindex="-1" role="dialog" id="enquiry_form_modal" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content enquiry_form_modal_form">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Enquiry")}}</h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--    <span aria-hidden="true">&times;</span>-->
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="service_id" value="{{$row->id}}">
                <input type="hidden" name="service_type" value="{{$service_type ?? ''}}">
                <div class="form-group" >
                    
                    <label for="enquiry_name">{{ __('Name *') }}</label>
                    <!--<input type="text" class="form-control" value="{{$user->display_name ?? ''}}" name="enquiry_name" placeholder="{{ __("Name *") }}">-->
                    <input type="text" class="form-control" value="" name="enquiry_name" placeholder="{{ __('Name *') }}" maxlength="20">

                </div>
                <div class="form-group">
                    
                    <label for="enquiry_email">{{ __('Email *') }}</label>
                    <!--<input type="text" class="form-control" value="{{$user->email ?? ''}}" name="enquiry_email" placeholder="{{ __("Email *") }}">-->
                    <input id="email" type="email" class="form-control" value="" name="enquiry_email" placeholder="{{ __('Email *') }}">

                </div>
                <div class="form-group" v-if="!enquiry_is_submit">
                <label for="enquiry_phone">{{ __('Phone') }}</label>
                    <!--<input type="text" class="form-control" value="{{$user->phone ?? ''}}" name="enquiry_phone" placeholder="{{ __("Phone") }}">-->
                    <!-- <input type="text" class="form-control" value="" name="enquiry_phone"
                        placeholder="{{ __('Phone') }}"> -->
                         <input type="text" class="form-control" value="" name="enquiry_phone" placeholder="{{ __('Phone') }}" oninput="this.value = this.value.replace(/[^0-9+]/g, '').slice(0, 15);">
                        </div>
                
                <label for="enquiry_note">{{ __('Note') }}</label>
                <div class="form-group" v-if="!enquiry_is_submit">
                    <textarea class="form-control" placeholder="{{ __("Note") }}" name="enquiry_note"  maxlength="250"></textarea>
                </div>
                @if(setting_item("booking_enquiry_enable_recaptcha"))
                    <div class="form-group">
                        {{recaptcha_field('enquiry_form')}}
                    </div>
                @endif
                <div class="message_box"></div>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>-->
                <button type="button" class="btn btn-secondary btn-close-enquiry">{{ __('Close') }}</button>
                <button type="button" class="btn btn-primary btn-submit-enquiry">{{__("Send now")}}
                <i class="fa icon-loading fa-spinner fa-spin fa-fw" style="display: none"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var $modal = $('#enquiry_form_modal');
        $('.btn-close-enquiry').click(function () {        
        $modal.find('input[type="text"], textarea').val('');
        $modal.modal('hide');   
    });
});
</script>
