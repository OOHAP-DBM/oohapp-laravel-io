<?php  $languages = \Modules\Language\Models\Language::getActive();  ?>
@if(is_default_lang())
<div class="panel">
    <div class="panel-title"><strong>{{__("Hoarding Pricing")}}</strong></div>
    <div class="panel-body">
        @if(is_default_lang())
        <!-- <div class="row">

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label">{{ __('Booking Duration Availablity') }}<span
                            class="text-danger">*</span></label>
                    <div>
                        <input type="checkbox" name="booking_duration[]" id="booking_duration" value="1" checked
                            onchange="toggleMonthlyDuration()">
                        <span style="margin-right:100px"> Monthly Available</span>


                        <input type="checkbox" name="booking_duration[]" id="booking_duration_weekly" value="2"
                            {{ $row->booking_duration == 2 ? 'checked' : '' }} onchange="toggleWeeklyDuration()">
                        <span> Weekly Available</span>
                        <input type="checkbox" name="booking_durationses" id="booking_durations_daily" value="3"
                            onchange="toggleDailyDuration()">
                        <span style="margin-right:100px"> Daily Available</span> 
                        <div id="booking-duration-error" style="display: none; color: red;">
                {{ __('Please select at least one option (Monthly or Weekly)') }}
            </div>
                    </div>
                </div>
            </div>
        </div> -->
        <?php $row->booking_duration = json_decode($row->booking_duration, true); ?>
        <label class="control-label"><strong>{{ __('Booking Duration Availability') }}</strong><span class="text-danger">*</span></label>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <div>
                <input type="checkbox" name="booking_duration[]" id="booking_duration" value="1" {{ is_array($row->booking_duration) && in_array("1", $row->booking_duration) ? 'checked' : '' }} checked onchange="toggleMonthlyDuration()">
                <span> Monthly Available</span>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <div>
                <input type="checkbox" name="booking_duration[]" id="booking_duration_weekly" value="2"  {{ is_array($row->booking_duration) && in_array("2", $row->booking_duration) ? 'checked' : '' }} onchange="toggleWeeklyDuration()">
                <span> Weekly Available</span>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <div>
                <input type="checkbox" name="booking_duration[]" id="booking_durations_daily" value="3"  {{ is_array($row->booking_duration) && in_array("3", $row->booking_duration) ? 'checked' : '' }} onchange="toggleDailyDuration()">
                <span> Daily Available</span>
            </div>
            <div id="booking-duration-error" style="display: none; color: red;">
                {{ __('Please select at least one option (Monthly or Weekly or Daily)') }}
            </div>
        </div>
    </div>
</div>


        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <div id="monthly_price" style="display: none;">
                        <label for="monthly_price_input">Monthly Price:<span class="text-danger">*</span></label>
                        <input type="number" id="monthly_price_input" name="monthly_price" class="form-control"
                            value="{{ $row->monthly_price }}" placeholder="Enter Monthly Price" required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="weekly_price" style="display: none;">
                        <label class="control-label">
                            {{ __("Weekly Price") }}<span class="text-danger">*</span>
                        </label>
                        <input type="number" step="any" min="0" name="weekly_price" class="form-control"
                            value="{{ $row->weekly_price }}" placeholder="{{ __("Space Price") }}" required>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div id="daily_prices" style="display: none;">
                        <label for="daily_price_input">Daily Price:</label>
                        <input type="number" id="daily_price_input" name="price" class="form-control"
                            value="{{$row->price}}" placeholder="Enter Daily Price">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="montly_sale_price" style="display: none;">
                        <label class="control-label">{{ __("Monthly Sale Price") }}</label>
                        <input type="number" step="any" name="monthly_sale_price" class="form-control"
                            value="{{ $row->monthly_sale_price }}" placeholder="{{ __("Space Sale Price") }}">
                        <span><i>{{ __("If the regular price is less than the discount, it will show the regular price") }}</i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <div class="weekly_sale_price" style="display: none;">
                        <label class="control-label">{{ __("Weekly Sale Price") }}</label>
                        <input type="number" step="any" name="weekly_sale_price" class="form-control"
                            value="{{ $row->weekly_sale_price }}" placeholder="{{ __("Space Sale Price") }}">
                        <span>
                            <i>{{ __("If the regular price is less than the discount, it will show the regular price") }}</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="daily_sale_price" style="display: none;">
                        <label class="control-label">{{ __("Daily Sale Price") }}</label>
                        <input type="number" step="any" name="sale_price" class="form-control"
                            value="{{ $row->sale_price }}" placeholder="{{ __("Space Sale Price") }}">
                        <span><i>{{ __("If the regular price is less than the discount, it will show the regular price") }}</i></span>
                    </div>
                </div>
            </div>
            <!--<div class="col-lg-6">-->
            <!--    <div class="form-group">-->
            <!--        <label class="control-label">{{__("Max Guests")}}</label>-->
            <!--        <input type="number" step="any" name="max_guests" class="form-control" value="{{$row->max_guests}}" >-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <hr>

        @endif
        <div class="row">
            <!-- <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Approved from Nagar Nigam ?') }}<span class="text-danger">*</span></label>
                    <div>
                        <label>
                            <input type="radio" name="approved_nagar_nigam"
                                value="yes"{{ old('approved_nagar_nigam', $row->approved_nagar_nigam) == 'yes' ? 'checked' : '' }}
                                required>
                            {{ __('Yes') }}
                        </label>
                        <label style="margin-left: 20px;">
                            <input type="radio" name="approved_nagar_nigam"
                                value="no"{{ old('approved_nagar_nigam', $row->approved_nagar_nigam) == 'no' ? 'checked' : '' }}
                                required>
                            {{ __('No') }}
                        </label>
                    </div>
                </div>
            </div> -->

            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Grace period includes in your booking') }}<span
                            class="text-danger">*</span></label>
                    <div>
                        <label>
                            <input type="radio" name="grace_period_included" id="grace_period_yes" value="yes" checked
                                {{ old('grace_period_included', $row->grace_period_included) == 'yes' ? 'checked' : '' }}
                                onchange="toggleDurationInput()">
                            {{ __('Yes') }}
                        </label>
                        <label style="margin-left: 20px;">
                            <input type="radio" name="grace_period_included" id="grace_period_no" value="no"
                                {{ old('grace_period_included', $row->grace_period_included) == 'no' ? 'checked' : '' }}
                                onchange="toggleDurationInput()">
                            {{ __('No') }}
                        </label>
                    </div>


                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <div id="duration_input" style="display: none;">
                        <label for="grace_period_duration">{{ __('Enter Duration (in days)') }}</label>
                        <input type="number" name="grace_period_duration" id="grace_period_duration"
                            class="form-control" value="{{ old('grace_period_duration', $row->grace_period_duration) }}"
                            min="1" placeholder="Enter number of days">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group @if(!is_default_lang()) d-none @endif">
            <label><input type="checkbox" name="enable_extra_price" @if(!empty($row->enable_extra_price)) checked @endif
                value="1"> {{__('Enable extra price')}}
            </label>
        </div>
        <div class="form-group-item @if(!is_default_lang()) d-none @endif" data-condition="enable_extra_price:is(1)">
            <label class="control-label">{{__('Extra Price')}}</label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5">{{__("Name")}}</div>
                    <div class="col-md-3">{{__('Price')}}</div>
                    <div class="col-md-3">{{__('Type')}}</div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                @if(!empty($row->extra_price))
                @foreach($row->extra_price as $key=>$extra_price)
                <div class="item" data-number="{{$key}}">
                    <div class="row">
                        <div class="col-md-5">
                            @if(!empty($languages) && setting_item('site_enable_multi_lang') &&
                            setting_item('site_locale'))
                            @foreach($languages as $language)
                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                            <div class="g-lang">
                                <div class="title-lang">{{$language->name}}</div>
                                <input type="text" name="extra_price[{{$key}}][name{{$key_lang}}]" class="form-control"
                                    value="{{$extra_price['name'.$key_lang] ?? ''}}"
                                    placeholder="{{__('Extra price name')}}">
                            </div>
                            @endforeach
                            @else
                            <input type="text" name="extra_price[{{$key}}][name]" class="form-control"
                                value="{{$extra_price['name'] ?? ''}}" placeholder="{{__('Extra price name')}}">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <input type="number" @if(!is_default_lang()) disabled @endif min="0"
                                name="extra_price[{{$key}}][price]" class="form-control"
                                value="{{$extra_price['price']}}">
                        </div>
                        <div class="col-md-3">
                            <select name="extra_price[{{$key}}][type]" class="form-control" @if(!is_default_lang())
                                disabled @endif>
                                <option @if($extra_price['type']=='one_time' ) selected @endif value="one_time">
                                    {{__("One-time")}}</option>
                                <option @if($extra_price['type']=='per_hour' ) selected @endif value="per_hour">
                                    {{__("Per hour")}}</option>
                                <option @if($extra_price['type']=='per_day' ) selected @endif value="per_day">
                                    {{__("Per day")}}</option>
                            </select>

                            <label>
                                <input @if(!is_default_lang()) disabled @endif type="checkbox" min="0"
                                    name="extra_price[{{$key}}][per_person]" value="on" @if($extra_price['per_person']
                                    ?? '' ) checked @endif>
                                {{__("Price per person")}}
                            </label>
                        </div>
                        <div class="col-md-1">
                            @if(is_default_lang())
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="text-right">
                @if(is_default_lang())
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i>
                    {{__('Add item')}}</span>
                @endif
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            @if(!empty($languages) && setting_item('site_enable_multi_lang') &&
                            setting_item('site_locale'))
                            @foreach($languages as $language)
                            <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                            <div class="g-lang">
                                <div class="title-lang">{{$language->name}}</div>
                                <input type="text" __name__="extra_price[__number__][name{{$key}}]" class="form-control"
                                    value="" placeholder="{{__('Extra price name')}}">
                            </div>
                            @endforeach
                            @else
                            <input type="text" __name__="extra_price[__number__][name]" class="form-control" value=""
                                placeholder="{{__('Extra price name')}}">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" __name__="extra_price[__number__][price]" class="form-control"
                                value="">
                        </div>
                        <div class="col-md-3">
                            <select __name__="extra_price[__number__][type]" class="form-control">
                                <option value="one_time">{{__("One-time")}}</option>
                                <!-- <option value="per_hour">{{__("Per hour")}}</option> -->
                                <option value="per_day">{{__("Per day")}}</option>
                            </select>

                            <label>
                                <input type="checkbox" min="0" __name__="extra_price[__number__][per_person]"
                                    class="form-control" value="on">
                                {{__("Price Per Hoarding")}}
                            </label>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(is_default_lang())
        <hr class="d-none">
        <h3 class="panel-body-title d-none">{{__('Discount by number of people')}}</h3>
        <div class="form-group-item d-none">
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-4">{{__("No of people")}}</div>
                    <div class="col-md-3">{{__('Discount')}}</div>
                    <div class="col-md-3">{{__('Type')}}</div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                @if(!empty($row->discount_by_people) and is_array($row->discount_by_people))
                @foreach($row->discount_by_people as $key=>$item)
                <div class="item" data-number="{{$key}}">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="number" min="0" name="discount_by_people[{{$key}}][from]" class="form-control"
                                value="{{$item['from']}}" placeholder="{{__('From')}}">
                        </div>
                        <div class="col-md-2">
                            <input type="number" min="0" name="discount_by_people[{{$key}}][to]" class="form-control"
                                value="{{$item['from']}}" placeholder="{{__('To')}}">
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" name="discount_by_people[{{$key}}][amount]"
                                class="form-control" value="{{$item['amount']}}">
                        </div>
                        <div class="col-md-3">
                            <select name="discount_by_people[{{$key}}][type]" class="form-control">
                                <option @if($item['type']=='fixed' ) selected @endif value="fixed">{{__("Fixed")}}
                                </option>
                                <option @if($item['type']=='percent' ) selected @endif value="percent">
                                    {{__("Percent (%)")}}</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="text-right">
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i>
                    {{__('Add item')}}</span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="number" min="0" __name__="discount_by_people[__number__][from]"
                                class="form-control" value="" placeholder="{{__('From')}}">
                        </div>
                        <div class="col-md-2">
                            <input type="number" min="0" __name__="discount_by_people[__number__][to]"
                                class="form-control" value="" placeholder="{{__('To')}}">
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" __name__="discount_by_people[__number__][amount]"
                                class="form-control" value="">
                        </div>
                        <div class="col-md-3">
                            <select __name__="discount_by_people[__number__][type]" class="form-control">
                                <option value="fixed">{{__("Fixed")}}</option>
                                <option value="percent">{{__("Percent")}}</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(is_default_lang() and (!empty(setting_item("space_allow_vendor_can_add_service_fee")) or is_admin()))
        <hr>
        <h3 class="panel-body-title app_get_locale">{{__('Service fee')}}</h3>
        <div class="form-group app_get_locale">
            <label><input type="checkbox" name="enable_service_fee" @if(!empty($row->enable_service_fee)) checked @endif
                value="1"> {{__('Enable service fee')}}
            </label>
        </div>
        <div class="form-group-item" data-condition="enable_service_fee:is(1)">
            <label class="control-label">{{__('Buyer Fees')}}</label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5">{{__("Name")}}</div>
                    <div class="col-md-3">{{__('Price')}}</div>
                    <div class="col-md-3">{{__('Type')}}</div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                <?php  $languages = \Modules\Language\Models\Language::getActive();?>
                @if(!empty($service_fee = $row->service_fee))
                @foreach($service_fee as $key=>$item)
                <div class="item" data-number="{{$key}}">
                    <div class="row">
                        <div class="col-md-5">
                            @if(!empty($languages) && setting_item('site_enable_multi_lang') &&
                            setting_item('site_locale'))
                            @foreach($languages as $language)
                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                            <div class="g-lang">
                                <div class="title-lang">{{$language->name}}</div>
                                <input type="text" name="service_fee[{{$key}}][name{{$key_lang}}]" class="form-control"
                                    value="{{$item['name'.$key_lang] ?? ''}}" placeholder="{{__('Fee name')}}">
                                <input type="text" name="service_fee[{{$key}}][desc{{$key_lang}}]" class="form-control"
                                    value="{{$item['desc'.$key_lang] ?? ''}}" placeholder="{{__('Fee desc')}}">
                            </div>

                            @endforeach
                            @else
                            <input type="text" name="service_fee[{{$key}}][name]" class="form-control"
                                value="{{$item['name'] ?? ''}}" placeholder="{{__('Fee name')}}">
                            <input type="text" name="service_fee[{{$key}}][desc]" class="form-control"
                                value="{{$item['desc'] ?? ''}}" placeholder="{{__('Fee desc')}}">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" step="0.1" name="service_fee[{{$key}}][price]"
                                class="form-control" value="{{$item['price'] ?? ""}}">
                            <select name="service_fee[{{$key}}][unit]" class="form-control">
                                <option @if(($item['unit'] ?? "" )=='fixed' ) selected @endif value="fixed">
                                    {{ __("Fixed") }}</option>
                                <option @if(($item['unit'] ?? "" )=='percent' ) selected @endif value="percent">
                                    {{ __("Percent") }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="service_fee[{{$key}}][type]" class="form-control d-none">
                                <option @if($item['type'] ?? ""=='one_time' ) selected @endif value="one_time">
                                    {{__("One-time")}}</option>
                            </select>
                            <label>
                                <input type="checkbox" min="0" name="service_fee[{{$key}}][per_person]" value="on"
                                    @if($item['per_person'] ?? '' ) checked @endif>
                                {{__("Price per person")}}
                            </label>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="text-right">
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i>
                    {{__('Add item')}}</span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            @if(!empty($languages) && setting_item('site_enable_multi_lang') &&
                            setting_item('site_locale'))
                            @foreach($languages as $language)
                            <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                            <div class="g-lang">
                                <div class="title-lang">{{$language->name}}</div>
                                <input type="text" __name__="service_fee[__number__][name{{$key}}]" class="form-control"
                                    value="" placeholder="{{__('Fee name')}}">
                                <input type="text" __name__="service_fee[__number__][desc{{$key}}]" class="form-control"
                                    value="" placeholder="{{__('Fee desc')}}">
                            </div>

                            @endforeach
                            @else
                            <input type="text" __name__="service_fee[__number__][name]" class="form-control" value=""
                                placeholder="{{__('Fee name')}}">
                            <input type="text" __name__="service_fee[__number__][desc]" class="form-control" value=""
                                placeholder="{{__('Fee desc')}}">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" step="0.1" __name__="service_fee[__number__][price]"
                                class="form-control" value="">
                            <select __name__="service_fee[__number__][unit]" class="form-control">
                                <option value="fixed">{{ __("Fixed") }}</option>
                                <option value="percent">{{ __("Percent") }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select __name__="service_fee[__number__][type]" class="form-control d-none">
                                <option value="one_time">{{__("One-time")}}</option>
                            </select>
                            <label>
                                <input type="checkbox" min="0" __name__="service_fee[__number__][per_person]"
                                    value="on">
                                {{__("Price Per Hoarding")}}
                            </label>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endif
<script>
function toggleMonthlyDuration() {
    const bookingDurationCheckbox = document.getElementById('booking_duration');
    const monthlyPriceDiv = document.getElementById('monthly_price');
    const monthlySalePriceDiv = document.querySelector('.montly_sale_price');


    const isChecked = bookingDurationCheckbox.checked;

    // Toggle visibility
    monthlyPriceDiv.style.display = isChecked ? 'block' : 'none';
    monthlySalePriceDiv.style.display = isChecked ? 'block' : 'none';
    var monthlyCheckbox = document.getElementById('booking_duration');
    var weeklyCheckbox = document.getElementById('booking_duration_weekly');
    var dailyCheckbox = document.getElementById('booking_durations_daily');

    // Check if both checkboxes are unchecked
    if (!monthlyCheckbox.checked && !weeklyCheckbox.checked && !dailyCheckbox.checked) {
        // Show error message
        document.getElementById('booking-duration-error').style.display = 'block';
    } else {
        // Hide error message if either checkbox is checked
        document.getElementById('booking-duration-error').style.display = 'none';
    }
}

function toggleWeeklyDuration() {
    const weeklyCheckbox = document.getElementById('booking_duration_weekly');
    const weeklyPriceDiv = document.querySelector('.weekly_price');
    const weeklySalePriceDiv = document.querySelector('.weekly_sale_price');
    const isChecked = weeklyCheckbox.checked;

    // Toggle visibility for weekly price and sale price
    weeklyPriceDiv.style.display = isChecked ? 'block' : 'none';
    weeklySalePriceDiv.style.display = isChecked ? 'block' : 'none';
    var monthlyCheckbox = document.getElementById('booking_duration');
    var dailyCheckbox = document.getElementById('booking_durations_daily');


    // Check if both checkboxes are unchecked
    if (!monthlyCheckbox.checked && !weeklyCheckbox.checked && !dailyCheckbox.checke ) {
        // Show error message
        document.getElementById('booking-duration-error').style.display = 'block';
    } else {
        // Hide error message if either checkbox is checked
        document.getElementById('booking-duration-error').style.display = 'none';
    }
}

function toggleDailyDuration() {
    const dailyCheckbox = document.getElementById('booking_durations_daily');
    const dailyPriceDiv = document.getElementById('daily_prices');
    const dailySalePriceDiv = document.querySelector('.daily_sale_price');
    const isChecked = dailyCheckbox.checked;

    // Toggle visibility for daily price and sale price
    dailyPriceDiv.style.display = isChecked ? 'block' : 'none';
    dailySalePriceDiv.style.display = isChecked ? 'block' : 'none';

    var monthlyCheckbox = document.getElementById('booking_duration');
    var weeklyCheckbox = document.getElementById('booking_duration_weekly');

    // Check if all checkboxes are unchecked
    if (!monthlyCheckbox.checked && !weeklyCheckbox.checked && !dailyCheckbox.checked) {
        // Show error message
        document.getElementById('booking-duration-error').style.display = 'block';
    } else {
        // Hide error message if at least one checkbox is checked
        document.getElementById('booking-duration-error').style.display = 'none';
    }
}

// Initialize visibility on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleMonthlyDuration();
    toggleWeeklyDuration();
    toggleDailyDuration();
});
</script>