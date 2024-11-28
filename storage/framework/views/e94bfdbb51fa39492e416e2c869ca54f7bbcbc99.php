<?php if($row->map_lat && $row->map_lng): ?>
<div class="g-location" style="width: 164%;
    margin-left: -15%;
    margin-top: -20px;">

    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
<?php endif; ?>

<!-- this code is for getting the discount price according to the monthly, daily and weekly -->
<?php
$daily_discount_price = null; 
$monthly_discount_price = null;
$weekly_discount_price = null;
$daily_price = null;
$daily_sale_price = $row->sale_price;
$weekly_price = null;
$weekly_sale_price = $row->weekly_sale_price;
$monthly_price = null;
$monthly_sale_price =$row->monthly_sale_price;

// Calculate Daily Discount
if (
    !empty($row->price) && $row->price > 0 &&
    !empty($row->sale_price) && $row->sale_price > 0 &&
    $row->price > $row->sale_price
) {
    $daily_discount_price = 100 - ceil(($row->sale_price / $row->price) * 100);
}

// Calculate Monthly Discount
if (
    !empty($row->monthly_price) && $row->monthly_price > 0 &&
    !empty($row->monthly_sale_price) && $row->monthly_sale_price > 0 &&
    $row->monthly_price > $row->monthly_sale_price
) {
    $monthly_discount_price = 100 - ceil(($row->monthly_sale_price / $row->monthly_price) * 100);
}

// Calculate Weekly Discount
if (
    !empty($row->weekly_price) && $row->weekly_price > 0 &&
    !empty($row->weekly_sale_price) && $row->weekly_sale_price > 0 &&
    $row->weekly_price > $row->weekly_sale_price
) {
    $weekly_discount_price = 100 - ceil(($row->weekly_sale_price / $row->weekly_price) * 100);
}

// Store discounts in an array
$discounts = [
    'day' => $daily_discount_price,
    'week' => $weekly_discount_price,
    'month' => $monthly_discount_price,
];



if (!empty($row->price) and $row->price > 0 and !empty($row->sale_price) and $row->sale_price > 0 and $row->price > $row->sale_price) {
    $daily_price = $row->price;
   
}
if (!empty($row->weekly_price) and $row->weekly_price > 0 and !empty( $row->weekly_sale_price) and $row->weekly_sale_price > 0 and $row->weekly_price >  $row->weekly_sale_price) {
    $weekly_price = $row->weekly_price;
}
if (!empty($row->monthly_price) and $row->monthly_price > 0 and !empty( $row->monthly_sale_price) and $row->monthly_sale_price > 0 and $row->monthly_price >  $row->monthly_sale_price) {
    $monthly_price =$row->monthly_price;
}

// //selles price 
// if (!empty($row->price) and $row->price > 0 and !empty($row->sale_price) and $row->sale_price > 0 and $row->price > $row->sale_price) {
//     $daily_price = $row->price;

// }
// if (!empty($row->weekly_price) and $row->weekly_price > 0 and !empty($row->weekly_sale_price) and $row->weekly_sale_price > 0 and $row->weekly_price > $row->weekly_sale_price) {
//     $weekly_price = $row->weekly_price;
   

// }  if (!empty($row->monthly_price) and $row->monthly_price > 0 and !empty($row->monthly_sale_price) and $row->monthly_sale_price > 0 and $row->monthly_price > $row->monthly_sale_price) {
//     $monthly_price =$row->monthly_price;
// }


?>



<div class="bravo_single_book_wrap">
    <div class="bravo_single_book">
        <div id="bravo_space_book_app" v-cloak>
            <!-- Display Discounts -->
            <div id="discountBox">
                <?php foreach ($discounts as $duration => $discount): ?>
                <?php if ($discount): ?>
                <div class="tour-sale-box discount-box" data-duration="<?= $duration ?>" style="display: none;">
                    <span class="sale_class box_sale sale_small"><?= $discount ?>% </span>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="form-head">
                <div class="price">
                    <span class="label">
                        <?php echo e(__('from')); ?>

                    </span>
                    <span class="value">
                    <span id="priceDisplay" class="onsale">₹<?php echo e($daily_price ?? $weekly_price ?? $monthly_price); ?></span>
                    <span id="salePriceDisplay" class="text-lg">₹<?php echo e($daily_sale_price ?? $weekly_sale_price ?? $monthly_sale_price); ?></span>
                        <!-- <span class="onsale"><?php echo e($row->display_sale_price); ?></span>
                        <span class="text-lg"><?php echo e($row->display_price); ?></span> -->
                    </span>
                </div>
            </div>
            <div class="nav-enquiry" v-if="is_form_enquiry_and_book">
                <div class="enquiry-item active">
                    <span><?php echo e(__('Book')); ?></span>
                </div>
                <div class="enquiry-item" data-toggle="modal" data-target="#enquiry_form_modal">
                    <span><?php echo e(__('Enquiry')); ?></span>
                </div>

            </div>
            <!-- <div class="nav-enquiry" v-if="is_form_enquiry_and_book">
                <button type="button" class="btn btn-outline-success" :class="{ active: booking_duration === 'monthly' }" @click="setBookingDuration('monthly')">
                     <?php echo e(__('Monthly')); ?>

                </button>
                <button type="button" class="btn btn-outline-success" :class="{ active: booking_duration === 'weekly' }" @click="setBookingDuration('weekly')">
                      <?php echo e(__('Weekly')); ?>

                </button>
                <button type="button" class="btn btn-outline-success" :class="{ active: booking_duration === 'daily' }" @click="setBookingDuration('daily')">
                     <?php echo e(__('Daily')); ?>

                </button>
            </div> -->

            <?php $row->booking_duration = json_decode($row->booking_duration); ?>
            <div class="nav-enquiry">
                <?php if(is_array($row->booking_duration) && in_array("1", $row->booking_duration)): ?>
                <button type="button" class="btn btn-outline-success" id="monthlyButton"
                    onclick="setBookingDuration('month')">
                    Monthly
                </button>
                <?php endif; ?>
                <?php if(is_array($row->booking_duration) && in_array("2", $row->booking_duration)): ?>
                <button type="button" class="btn btn-outline-success" id="weeklyButton"
                    onclick="setBookingDuration('week')">
                    Weekly
                </button>
                <?php endif; ?>
                <?php if(is_array($row->booking_duration) && in_array("3", $row->booking_duration)): ?>
                <button type="button" class="btn btn-outline-success" id="dailyButton"
                    onclick="setBookingDuration('day')">
                    Daily
                </button>
                <?php endif; ?>
            </div>

            <div class="form-book" :class="{ 'd-none': enquiry_type != 'book' }">
                <div class="form-content">
                    

                    <div class="form-group form-date-field form-date-search clearfix "
                        data-format="<?php echo e(get_moment_date_format()); ?>">
                        <div class="date-wrapper clearfix" @click="openStartDate">
                            <div class="check-in-wrapper">
                                <label><?php echo e(__('Select dates')); ?> for a <span class="form-group viewMode"
                                        id="viewModeContent">
                                        month
                                        <!-- Content will be updated here -->
                                    </span></label>
                                <div class="render check-in-render" v-html="start_date_html"></div>
                                <?php if(!empty($row->min_day_before_booking)): ?>
                                <div class="render check-in-render">
                                    <small>
                                        <?php if($row->min_day_before_booking > 1): ?>
                                        -
                                        <?php echo e(__('Book :number days in advance', ['number' => $row->min_day_before_booking])); ?>

                                        <?php else: ?>
                                        -
                                        <?php echo e(__('Book :number day in advance', ['number' => $row->min_day_before_booking])); ?>

                                        <?php endif; ?>
                                    </small>
                                </div>
                                <?php endif; ?>
                                <?php if(!empty($row->min_day_stays)): ?>
                                <div class="render check-in-render">
                                    <small>
                                        <?php if($row->min_day_stays > 1): ?>
                                        -
                                        <?php echo e(__('Stay at least :number days', ['number' => $row->min_day_stays])); ?>

                                        <?php else: ?>
                                        -
                                        <?php echo e(__('Stay at least :number day', ['number' => $row->min_day_stays])); ?>

                                        <?php endif; ?>
                                    </small>
                                </div>
                                <?php endif; ?>
                            </div>
                            <i class="fa fa-angle-down arrow"></i>
                        </div>
                        <input type="text" class="start_date" ref="start_date" style="height: 1px; visibility: hidden">
                    </div>
                    <div class="">
                        <div class="form-group form-guest-search">
                            <div class="guest-wrapper d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <label><?php echo e(__('Adults')); ?></label>
                                    <div class="render check-in-render"><?php echo e(__('Ages 12+')); ?></div>
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
                                    <label><?php echo e(__('Children')); ?></label>
                                    <div class="render check-in-render"><?php echo e(__('Ages 2–12')); ?></div>
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
                        <h4 class="form-section-title"><?php echo e(__('Extra prices:')); ?></h4>
                        <div class="form-group " v-for="(type,index) in extra_price">
                            <div class="extra-price-wrap d-flex justify-content-between">
                                <div class="flex-grow-1">
                                    <label><input type="checkbox" true-value="1" false-value="0" v-model="type.enable">
                                        {{ type.name }}</label>
                                    <div class="render" v-if="type.price_type">({{ type.price_type }})</div>
                                </div>
                                <div class="flex-shrink-0">{{ type.price_html }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section-group form-group-padding" v-if="buyer_fees.length">
                        <div class="extra-price-wrap d-flex justify-content-between" v-for="(type,index) in buyer_fees">
                            <div class="flex-grow-1">
                                <label>{{ type.type_name }}
                                    <i class="icofont-info-circle" v-if="type.desc" data-toggle="tooltip"
                                        data-placement="top" :title="type.type_desc"></i>
                                </label>
                                <div class="render" v-if="type.price_type">({{ type.price_type }})</div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="unit" v-if='type.unit == "percent"'>
                                    {{ type.price }}%
                                </div>
                                <div class="unit" v-else>
                                    {{ formatMoney(type.price) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="form-section-total list-unstyled" v-if="total_price > 0">
                    <li>
                        <label><?php echo e(__('Total')); ?></label>
                        <span class="price">{{ total_price_html }}</span>
                    </li>
                    <li v-if="is_deposit_ready">
                        <label for=""><?php echo e(__('Pay now')); ?></label>
                        <span class="price">{{ pay_now_price_html }}</span>
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
                        <span v-if="step == 1"><?php echo e(__('BOOK NOW')); ?></span>
                        <span v-if="step == 2"><?php echo e(__('Book Now')); ?></span>
                        <i v-show="onSubmit" class="fa fa-spinner fa-spin"></i>
                    </a>
                    <div class="alert-text mt10" v-show="message.content" v-html="message.content"
                        :class="{ 'danger': !message.type, 'success': message.type }"></div>
                </div>
            </div>
            <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                    <?php echo e(__('Contact Now')); ?>

                </button>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var discounts = <?= json_encode($discounts) ?>;
</script>
<script>
$(document).ready(function() {
    var discounts = window.discounts || {};


   
    window.setBookingDuration = function(duration) {
      
        $(".btn").removeClass("active");

        // Add active class to the clicked button
        $("#" + duration + "Button").addClass("active");

       
        let content = "";
        if (duration === "month") {
            content = "month";
        } else if (duration === "week") {
            content = "week";
        } else if (duration === "day") {
            content = "day";
        }

        $("#viewModeContent").html(content).show();
    };
});
</script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
$(document).ready(function() {
    // Store prices and sale prices in an object
    var prices = {
        day: { price: <?= $daily_price ?>, salePrice: <?= $daily_sale_price ?> },
        week: { price: <?= $weekly_price ?>, salePrice: <?= $weekly_sale_price ?> },
        month: { price: <?= $monthly_price ?>, salePrice: <?= $monthly_sale_price ?> }
    };

    // Function to handle price updates based on selected duration
    window.setBookingDuration = function(duration) {
        // Hide all discount boxes
        $(".discount-box").hide();
        // Show the discount box for the selected duration
        $(".discount-box[data-duration='" + duration + "']").show();

        // Update price and sale price according to selected duration
        $("#priceDisplay").text("₹" + prices[duration].price);
        $("#salePriceDisplay").text("₹" + prices[duration].salePrice);

        // Update the view mode content
        $("#viewModeContent").text(duration);

        // Add active class to the clicked button
        $(".btn").removeClass("active");
        $("#" + duration + "Button").addClass("active");
    };

    // Set default duration to 'month' on page load
    setBookingDuration('month');
});

</script>

<?php echo $__env->make('Booking::frontend.global.enquiry-form', ['service_type' => 'space'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\oohapp-laravel-io\themes/BC/Space/Views/frontend/layouts/details/space-form-book.blade.php ENDPATH**/ ?>