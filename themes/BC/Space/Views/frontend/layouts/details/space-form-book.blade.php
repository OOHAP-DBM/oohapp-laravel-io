@if ($row->map_lat && $row->map_lng)
<div class="g-location" style="width: 164%;
    margin-left: -15%;
    margin-top: -20px;">

    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
@endif




<div class="bravo_single_book_wrap">
    <div class="bravo_single_book">
        <div id="bravo_space_book_app" v-cloak>
            @if ($row->discount_percent)
            <div class="tour-sale-box">
                <span class="sale_class box_sale sale_small">{{ $row->discount_percent }}</span>
            </div>
            @endif
            <div class="form-head">
                <div class="price">
                    <span class="label">
                        {{ __('from') }}
                    </span>
                    <span class="value">
                        <span class="onsale">{{ $row->display_sale_price }}</span>
                        <span class="text-lg">{{ $row->display_price }}</span>
                    </span>
                </div>
            </div>
            <div class="nav-enquiry" v-if="is_form_enquiry_and_book">
                <div class="enquiry-item active">
                    <span>{{ __('Book') }}</span>
                </div>
                <div class="enquiry-item" data-toggle="modal" data-target="#enquiry_form_modal">
                    <span>{{ __('Enquiry') }}</span>
                </div>

            </div>
            <!-- <div class="nav-enquiry" v-if="is_form_enquiry_and_book">
                <button type="button" class="btn btn-outline-success" :class="{ active: booking_duration === 'monthly' }" @click="setBookingDuration('monthly')">
                     {{ __('Monthly') }}
                </button>
                <button type="button" class="btn btn-outline-success" :class="{ active: booking_duration === 'weekly' }" @click="setBookingDuration('weekly')">
                      {{ __('Weekly') }}
                </button>
                <button type="button" class="btn btn-outline-success" :class="{ active: booking_duration === 'daily' }" @click="setBookingDuration('daily')">
                     {{ __('Daily') }}
                </button>
            </div> -->


            <div class="nav-enquiry">
                <button type="button" class="btn btn-outline-success" id="monthlyButton"
                    onclick="setBookingDuration('month')">
                    Monthly
                </button>
                <button type="button" class="btn btn-outline-success" id="weeklyButton"
                    onclick="setBookingDuration('week')">
                    Weekly
                </button>
                <button type="button" class="btn btn-outline-success" id="dailyButton"
                    onclick="setBookingDuration('day')">
                    Daily
                </button>
            </div>
            <div class="form-book" :class="{ 'd-none': enquiry_type != 'book' }">
                <div class="form-content">
                    {{-- @dd($row->booking_duration) --}}

                    <div class="form-group form-date-field form-date-search clearfix "
                        data-format="{{ get_moment_date_format() }}">
                        <div class="date-wrapper clearfix" @click="openStartDate">
                            <div class="check-in-wrapper">
                                <label>{{ __('Select dates') }} for a <span class="form-group viewMode"
                                        id="viewModeContent">
                                        month
                                        <!-- Content will be updated here -->
                                    </span></label>
                                <div class="render check-in-render" v-html="start_date_html"></div>
                                @if (!empty($row->min_day_before_booking))
                                <div class="render check-in-render">
                                    <small>
                                        @if ($row->min_day_before_booking > 1)
                                        -
                                        {{ __('Book :number days in advance', ['number' => $row->min_day_before_booking]) }}
                                        @else
                                        -
                                        {{ __('Book :number day in advance', ['number' => $row->min_day_before_booking]) }}
                                        @endif
                                    </small>
                                </div>
                                @endif
                                @if (!empty($row->min_day_stays))
                                <div class="render check-in-render">
                                    <small>
                                        @if ($row->min_day_stays > 1)
                                        -
                                        {{ __('Stay at least :number days', ['number' => $row->min_day_stays]) }}
                                        @else
                                        -
                                        {{ __('Stay at least :number day', ['number' => $row->min_day_stays]) }}
                                        @endif
                                    </small>
                                </div>
                                @endif
                            </div>
                            <i class="fa fa-angle-down arrow"></i>
                        </div>
                        <input type="text" class="start_date" ref="start_date" style="height: 1px; visibility: hidden">
                    </div>
                    <div class="">
                        <div class="form-group form-guest-search">
                            <div class="guest-wrapper d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <label>{{ __('Adults') }}</label>
                                    <div class="render check-in-render">{{ __('Ages 12+') }}</div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="input-number-group">
                                        <i class="icon ion-ios-remove-circle-outline"
                                            @click="minusPersonType('adults')"></i>
                                        <span class="input"><input type="number" v-model="adults" min="1" /></span>
                                        <i class="icon ion-ios-add-circle-outline" @click="addPersonType('adults')"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-guest-search">
                            <div class="guest-wrapper d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <label>{{ __('Children') }}</label>
                                    <div class="render check-in-render">{{ __('Ages 2–12') }}</div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="input-number-group">
                                        <i class="icon ion-ios-remove-circle-outline"
                                            @click="minusPersonType('children')"></i>
                                        <span class="input"><input type="number" v-model="children" min="0" /></span>
                                        <i class="icon ion-ios-add-circle-outline"
                                            @click="addPersonType('children')"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section-group form-group" v-if="extra_price.length">
                        <h4 class="form-section-title">{{ __('Extra prices:') }}</h4>
                        <div class="form-group " v-for="(type,index) in extra_price">
                            <div class="extra-price-wrap d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <label><input type="checkbox" true-value="1" false-value="0" v-model="type.enable">
                                        @{{ type.name }}</label>
                                    <div class="render" v-if="type.price_type">(@{{ type.price_type }})</div>
                                </div>
                                <div class="flex-shrink-0">@{{ type.price_html }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section-group form-group-padding" v-if="buyer_fees.length">
                        <div class="extra-price-wrap d-flex justify-content-between" v-for="(type,index) in buyer_fees">
                            <div class="flex-grow-1">
                                <label>@{{ type.type_name }}
                                    <i class="icofont-info-circle" v-if="type.desc" data-toggle="tooltip"
                                        data-placement="top" :title="type.type_desc"></i>
                                </label>
                                <div class="render" v-if="type.price_type">(@{{ type.price_type }})</div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="unit" v-if='type.unit == "percent"'>
                                    @{{ type.price }}%
                                </div>
                                <div class="unit" v-else>
                                    @{{ formatMoney(type.price) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="form-section-total list-unstyled" v-if="total_price > 0">
                    <li>
                        <label>{{ __('Total') }}</label>
                        <span class="price">@{{ total_price_html }}</span>
                    </li>
                    <li v-if="is_deposit_ready">
                        <label for="">{{ __('Pay now') }}</label>
                        <span class="price">@{{ pay_now_price_html }}</span>
                    </li>
                </ul>
                <div v-html="html"></div>
                <div class="submit-group">
                    <p><i>

                        </i>
                    </p>
                    <a class="btn btn-large" @click="doSubmit($event)"
                        :class="{ 'disabled': onSubmit, 'btn-success': (step == 2), 'btn-primary': step == 1 }"
                        name="submit">
                        <span v-if="step == 1">{{ __('BOOK NOW') }}</span>
                        <span v-if="step == 2">{{ __('Book Now') }}</span>
                        <i v-show="onSubmit" class="fa fa-spinner fa-spin"></i>
                    </a>
                    <div class="alert-text mt10" v-show="message.content" v-html="message.content"
                        :class="{ 'danger': !message.type, 'success': message.type }"></div>
                </div>
            </div>
            <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                    {{ __('Contact Now') }}
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Function to handle button clicks and content update
    window.setBookingDuration = function(duration) {
        // Remove active class from all buttons
        $(".btn").removeClass("active");

        // Add active class to the clicked button
        $("#" + duration + "Button").addClass("active");

        // Set the content based on the selected duration
        let content = "";
        if (duration === "month") {
            content = "month";
        } else if (duration === "week") {
            content = "week";
        } else if (duration === "day") {
            content = "day";
        }

        // Update the view mode content and show the div
        $("#viewModeContent").html(content).show();
    };
});
</script>
@include('Booking::frontend.global.enquiry-form', ['service_type' => 'space'])