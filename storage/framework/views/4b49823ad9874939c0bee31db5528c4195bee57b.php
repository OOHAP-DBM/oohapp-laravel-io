<?php  $languages = \Modules\Language\Models\Language::getActive();  ?>
<?php if(is_default_lang()): ?>
<div class="panel">
    <div class="panel-title"><strong><?php echo e(__("Hoarding Pricing")); ?></strong></div>
    <div class="panel-body">
        <?php if(is_default_lang()): ?>
        <!-- <div class="row">

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Booking Duration Availablity')); ?><span
                            class="text-danger">*</span></label>
                    <div>
                        <input type="checkbox" name="booking_duration[]" id="booking_duration" value="1" checked
                            onchange="toggleMonthlyDuration()">
                        <span style="margin-right:100px"> Monthly Available</span>


                        <input type="checkbox" name="booking_duration[]" id="booking_duration_weekly" value="2"
                            <?php echo e($row->booking_duration == 2 ? 'checked' : ''); ?> onchange="toggleWeeklyDuration()">
                        <span> Weekly Available</span>
                        <input type="checkbox" name="booking_durationses" id="booking_durations_daily" value="3"
                            onchange="toggleDailyDuration()">
                        <span style="margin-right:100px"> Daily Available</span> 
                        <div id="booking-duration-error" style="display: none; color: red;">
                <?php echo e(__('Please select at least one option (Monthly or Weekly)')); ?>

            </div>
                    </div>
                </div>
            </div>
        </div> -->
        <?php $row->booking_duration = json_decode($row->booking_duration, true); ?>
        <label class="control-label"><strong><?php echo e(__('Booking Duration Availability')); ?></strong><span class="text-danger">*</span></label>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <div>
                <input type="checkbox" name="booking_duration[]" id="booking_duration" value="1" <?php echo e(is_array($row->booking_duration) && in_array("1", $row->booking_duration) ? 'checked' : ''); ?> checked onchange="toggleMonthlyDuration()">
                <span> Monthly Available</span>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <div>
                <input type="checkbox" name="booking_duration[]" id="booking_duration_weekly" value="2"  <?php echo e(is_array($row->booking_duration) && in_array("2", $row->booking_duration) ? 'checked' : ''); ?> onchange="toggleWeeklyDuration()">
                <span> Weekly Available</span>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <div>
                <input type="checkbox" name="booking_duration[]" id="booking_durations_daily" value="3"  <?php echo e(is_array($row->booking_duration) && in_array("3", $row->booking_duration) ? 'checked' : ''); ?> onchange="toggleDailyDuration()">
                <span> Daily Available</span>
            </div>
            <div id="booking-duration-error" style="display: none; color: red;">
                <?php echo e(__('Please select at least one option (Monthly or Weekly or Daily)')); ?>

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
                            value="<?php echo e($row->monthly_price); ?>" placeholder="Enter Monthly Price" required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="weekly_price" style="display: none;">
                        <label class="control-label">
                            <?php echo e(__("Weekly Price")); ?><span class="text-danger">*</span>
                        </label>
                        <input type="number" step="any" min="0" name="weekly_price" class="form-control"
                            value="<?php echo e($row->weekly_price); ?>" placeholder="<?php echo e(__("Space Price")); ?>" required>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div id="daily_prices" style="display: none;">
                        <label for="daily_price_input">Daily Price:</label>
                        <input type="number" id="daily_price_input" name="price" class="form-control"
                            value="<?php echo e($row->price); ?>" placeholder="Enter Daily Price">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="montly_sale_price" style="display: none;">
                        <label class="control-label"><?php echo e(__("Monthly Sale Price")); ?></label>
                        <input type="number" step="any" name="monthly_sale_price" class="form-control"
                            value="<?php echo e($row->monthly_sale_price); ?>" placeholder="<?php echo e(__("Space Sale Price")); ?>">
                        <span><i><?php echo e(__("If the regular price is less than the discount, it will show the regular price")); ?></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <div class="weekly_sale_price" style="display: none;">
                        <label class="control-label"><?php echo e(__("Weekly Sale Price")); ?></label>
                        <input type="number" step="any" name="weekly_sale_price" class="form-control"
                            value="<?php echo e($row->weekly_sale_price); ?>" placeholder="<?php echo e(__("Space Sale Price")); ?>">
                        <span>
                            <i><?php echo e(__("If the regular price is less than the discount, it will show the regular price")); ?></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="daily_sale_price" style="display: none;">
                        <label class="control-label"><?php echo e(__("Daily Sale Price")); ?></label>
                        <input type="number" step="any" name="sale_price" class="form-control"
                            value="<?php echo e($row->sale_price); ?>" placeholder="<?php echo e(__("Space Sale Price")); ?>">
                        <span><i><?php echo e(__("If the regular price is less than the discount, it will show the regular price")); ?></i></span>
                    </div>
                </div>
            </div>
            <!--<div class="col-lg-6">-->
            <!--    <div class="form-group">-->
            <!--        <label class="control-label"><?php echo e(__("Max Guests")); ?></label>-->
            <!--        <input type="number" step="any" name="max_guests" class="form-control" value="<?php echo e($row->max_guests); ?>" >-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <hr>

        <?php endif; ?>
        <div class="row">
            <!-- <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Approved from Nagar Nigam ?')); ?><span class="text-danger">*</span></label>
                    <div>
                        <label>
                            <input type="radio" name="approved_nagar_nigam"
                                value="yes"<?php echo e(old('approved_nagar_nigam', $row->approved_nagar_nigam) == 'yes' ? 'checked' : ''); ?>

                                required>
                            <?php echo e(__('Yes')); ?>

                        </label>
                        <label style="margin-left: 20px;">
                            <input type="radio" name="approved_nagar_nigam"
                                value="no"<?php echo e(old('approved_nagar_nigam', $row->approved_nagar_nigam) == 'no' ? 'checked' : ''); ?>

                                required>
                            <?php echo e(__('No')); ?>

                        </label>
                    </div>
                </div>
            </div> -->

            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Grace period includes in your booking')); ?><span
                            class="text-danger">*</span></label>
                    <div>
                        <label>
                            <input type="radio" name="grace_period_included" id="grace_period_yes" value="yes" checked
                                <?php echo e(old('grace_period_included', $row->grace_period_included) == 'yes' ? 'checked' : ''); ?>

                                onchange="toggleDurationInput()">
                            <?php echo e(__('Yes')); ?>

                        </label>
                        <label style="margin-left: 20px;">
                            <input type="radio" name="grace_period_included" id="grace_period_no" value="no"
                                <?php echo e(old('grace_period_included', $row->grace_period_included) == 'no' ? 'checked' : ''); ?>

                                onchange="toggleDurationInput()">
                            <?php echo e(__('No')); ?>

                        </label>
                    </div>


                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <div id="duration_input" style="display: none;">
                        <label for="grace_period_duration"><?php echo e(__('Enter Duration (in days)')); ?></label>
                        <input type="number" name="grace_period_duration" id="grace_period_duration"
                            class="form-control" value="<?php echo e(old('grace_period_duration', $row->grace_period_duration)); ?>"
                            min="1" placeholder="Enter number of days">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group <?php if(!is_default_lang()): ?> d-none <?php endif; ?>">
            <label><input type="checkbox" name="enable_extra_price" <?php if(!empty($row->enable_extra_price)): ?> checked <?php endif; ?>
                value="1"> <?php echo e(__('Enable extra price')); ?>

            </label>
        </div>
        <div class="form-group-item <?php if(!is_default_lang()): ?> d-none <?php endif; ?>" data-condition="enable_extra_price:is(1)">
            <label class="control-label"><?php echo e(__('Extra Price')); ?></label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                    <div class="col-md-3"><?php echo e(__('Price')); ?></div>
                    <div class="col-md-3"><?php echo e(__('Type')); ?></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                <?php if(!empty($row->extra_price)): ?>
                <?php $__currentLoopData = $row->extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$extra_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-number="<?php echo e($key); ?>">
                    <div class="row">
                        <div class="col-md-5">
                            <?php if(!empty($languages) && setting_item('site_enable_multi_lang') &&
                            setting_item('site_locale')): ?>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                            <div class="g-lang">
                                <div class="title-lang"><?php echo e($language->name); ?></div>
                                <input type="text" name="extra_price[<?php echo e($key); ?>][name<?php echo e($key_lang); ?>]" class="form-control"
                                    value="<?php echo e($extra_price['name'.$key_lang] ?? ''); ?>"
                                    placeholder="<?php echo e(__('Extra price name')); ?>">
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <input type="text" name="extra_price[<?php echo e($key); ?>][name]" class="form-control"
                                value="<?php echo e($extra_price['name'] ?? ''); ?>" placeholder="<?php echo e(__('Extra price name')); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <input type="number" <?php if(!is_default_lang()): ?> disabled <?php endif; ?> min="0"
                                name="extra_price[<?php echo e($key); ?>][price]" class="form-control"
                                value="<?php echo e($extra_price['price']); ?>">
                        </div>
                        <div class="col-md-3">
                            <select name="extra_price[<?php echo e($key); ?>][type]" class="form-control" <?php if(!is_default_lang()): ?>
                                disabled <?php endif; ?>>
                                <option <?php if($extra_price['type']=='one_time' ): ?> selected <?php endif; ?> value="one_time">
                                    <?php echo e(__("One-time")); ?></option>
                                <option <?php if($extra_price['type']=='per_hour' ): ?> selected <?php endif; ?> value="per_hour">
                                    <?php echo e(__("Per hour")); ?></option>
                                <option <?php if($extra_price['type']=='per_day' ): ?> selected <?php endif; ?> value="per_day">
                                    <?php echo e(__("Per day")); ?></option>
                            </select>

                            <label>
                                <input <?php if(!is_default_lang()): ?> disabled <?php endif; ?> type="checkbox" min="0"
                                    name="extra_price[<?php echo e($key); ?>][per_person]" value="on" <?php if($extra_price['per_person']
                                    ?? '' ): ?> checked <?php endif; ?>>
                                <?php echo e(__("Price per person")); ?>

                            </label>
                        </div>
                        <div class="col-md-1">
                            <?php if(is_default_lang()): ?>
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="text-right">
                <?php if(is_default_lang()): ?>
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i>
                    <?php echo e(__('Add item')); ?></span>
                <?php endif; ?>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            <?php if(!empty($languages) && setting_item('site_enable_multi_lang') &&
                            setting_item('site_locale')): ?>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                            <div class="g-lang">
                                <div class="title-lang"><?php echo e($language->name); ?></div>
                                <input type="text" __name__="extra_price[__number__][name<?php echo e($key); ?>]" class="form-control"
                                    value="" placeholder="<?php echo e(__('Extra price name')); ?>">
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <input type="text" __name__="extra_price[__number__][name]" class="form-control" value=""
                                placeholder="<?php echo e(__('Extra price name')); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" __name__="extra_price[__number__][price]" class="form-control"
                                value="">
                        </div>
                        <div class="col-md-3">
                            <select __name__="extra_price[__number__][type]" class="form-control">
                                <option value="one_time"><?php echo e(__("One-time")); ?></option>
                                <!-- <option value="per_hour"><?php echo e(__("Per hour")); ?></option> -->
                                <option value="per_day"><?php echo e(__("Per day")); ?></option>
                            </select>

                            <label>
                                <input type="checkbox" min="0" __name__="extra_price[__number__][per_person]"
                                    class="form-control" value="on">
                                <?php echo e(__("Price Per Hoarding")); ?>

                            </label>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(is_default_lang()): ?>
        <hr class="d-none">
        <h3 class="panel-body-title d-none"><?php echo e(__('Discount by number of people')); ?></h3>
        <div class="form-group-item d-none">
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-4"><?php echo e(__("No of people")); ?></div>
                    <div class="col-md-3"><?php echo e(__('Discount')); ?></div>
                    <div class="col-md-3"><?php echo e(__('Type')); ?></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                <?php if(!empty($row->discount_by_people) and is_array($row->discount_by_people)): ?>
                <?php $__currentLoopData = $row->discount_by_people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-number="<?php echo e($key); ?>">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="number" min="0" name="discount_by_people[<?php echo e($key); ?>][from]" class="form-control"
                                value="<?php echo e($item['from']); ?>" placeholder="<?php echo e(__('From')); ?>">
                        </div>
                        <div class="col-md-2">
                            <input type="number" min="0" name="discount_by_people[<?php echo e($key); ?>][to]" class="form-control"
                                value="<?php echo e($item['from']); ?>" placeholder="<?php echo e(__('To')); ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" name="discount_by_people[<?php echo e($key); ?>][amount]"
                                class="form-control" value="<?php echo e($item['amount']); ?>">
                        </div>
                        <div class="col-md-3">
                            <select name="discount_by_people[<?php echo e($key); ?>][type]" class="form-control">
                                <option <?php if($item['type']=='fixed' ): ?> selected <?php endif; ?> value="fixed"><?php echo e(__("Fixed")); ?>

                                </option>
                                <option <?php if($item['type']=='percent' ): ?> selected <?php endif; ?> value="percent">
                                    <?php echo e(__("Percent (%)")); ?></option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="text-right">
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i>
                    <?php echo e(__('Add item')); ?></span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="number" min="0" __name__="discount_by_people[__number__][from]"
                                class="form-control" value="" placeholder="<?php echo e(__('From')); ?>">
                        </div>
                        <div class="col-md-2">
                            <input type="number" min="0" __name__="discount_by_people[__number__][to]"
                                class="form-control" value="" placeholder="<?php echo e(__('To')); ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" __name__="discount_by_people[__number__][amount]"
                                class="form-control" value="">
                        </div>
                        <div class="col-md-3">
                            <select __name__="discount_by_people[__number__][type]" class="form-control">
                                <option value="fixed"><?php echo e(__("Fixed")); ?></option>
                                <option value="percent"><?php echo e(__("Percent")); ?></option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(is_default_lang() and (!empty(setting_item("space_allow_vendor_can_add_service_fee")) or is_admin())): ?>
        <hr>
        <h3 class="panel-body-title app_get_locale"><?php echo e(__('Service fee')); ?></h3>
        <div class="form-group app_get_locale">
            <label><input type="checkbox" name="enable_service_fee" <?php if(!empty($row->enable_service_fee)): ?> checked <?php endif; ?>
                value="1"> <?php echo e(__('Enable service fee')); ?>

            </label>
        </div>
        <div class="form-group-item" data-condition="enable_service_fee:is(1)">
            <label class="control-label"><?php echo e(__('Buyer Fees')); ?></label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                    <div class="col-md-3"><?php echo e(__('Price')); ?></div>
                    <div class="col-md-3"><?php echo e(__('Type')); ?></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                <?php  $languages = \Modules\Language\Models\Language::getActive();?>
                <?php if(!empty($service_fee = $row->service_fee)): ?>
                <?php $__currentLoopData = $service_fee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-number="<?php echo e($key); ?>">
                    <div class="row">
                        <div class="col-md-5">
                            <?php if(!empty($languages) && setting_item('site_enable_multi_lang') &&
                            setting_item('site_locale')): ?>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                            <div class="g-lang">
                                <div class="title-lang"><?php echo e($language->name); ?></div>
                                <input type="text" name="service_fee[<?php echo e($key); ?>][name<?php echo e($key_lang); ?>]" class="form-control"
                                    value="<?php echo e($item['name'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Fee name')); ?>">
                                <input type="text" name="service_fee[<?php echo e($key); ?>][desc<?php echo e($key_lang); ?>]" class="form-control"
                                    value="<?php echo e($item['desc'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Fee desc')); ?>">
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <input type="text" name="service_fee[<?php echo e($key); ?>][name]" class="form-control"
                                value="<?php echo e($item['name'] ?? ''); ?>" placeholder="<?php echo e(__('Fee name')); ?>">
                            <input type="text" name="service_fee[<?php echo e($key); ?>][desc]" class="form-control"
                                value="<?php echo e($item['desc'] ?? ''); ?>" placeholder="<?php echo e(__('Fee desc')); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" step="0.1" name="service_fee[<?php echo e($key); ?>][price]"
                                class="form-control" value="<?php echo e($item['price'] ?? ""); ?>">
                            <select name="service_fee[<?php echo e($key); ?>][unit]" class="form-control">
                                <option <?php if(($item['unit'] ?? "" )=='fixed' ): ?> selected <?php endif; ?> value="fixed">
                                    <?php echo e(__("Fixed")); ?></option>
                                <option <?php if(($item['unit'] ?? "" )=='percent' ): ?> selected <?php endif; ?> value="percent">
                                    <?php echo e(__("Percent")); ?></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="service_fee[<?php echo e($key); ?>][type]" class="form-control d-none">
                                <option <?php if($item['type'] ?? ""=='one_time' ): ?> selected <?php endif; ?> value="one_time">
                                    <?php echo e(__("One-time")); ?></option>
                            </select>
                            <label>
                                <input type="checkbox" min="0" name="service_fee[<?php echo e($key); ?>][per_person]" value="on"
                                    <?php if($item['per_person'] ?? '' ): ?> checked <?php endif; ?>>
                                <?php echo e(__("Price per person")); ?>

                            </label>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="text-right">
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i>
                    <?php echo e(__('Add item')); ?></span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            <?php if(!empty($languages) && setting_item('site_enable_multi_lang') &&
                            setting_item('site_locale')): ?>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                            <div class="g-lang">
                                <div class="title-lang"><?php echo e($language->name); ?></div>
                                <input type="text" __name__="service_fee[__number__][name<?php echo e($key); ?>]" class="form-control"
                                    value="" placeholder="<?php echo e(__('Fee name')); ?>">
                                <input type="text" __name__="service_fee[__number__][desc<?php echo e($key); ?>]" class="form-control"
                                    value="" placeholder="<?php echo e(__('Fee desc')); ?>">
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <input type="text" __name__="service_fee[__number__][name]" class="form-control" value=""
                                placeholder="<?php echo e(__('Fee name')); ?>">
                            <input type="text" __name__="service_fee[__number__][desc]" class="form-control" value=""
                                placeholder="<?php echo e(__('Fee desc')); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" step="0.1" __name__="service_fee[__number__][price]"
                                class="form-control" value="">
                            <select __name__="service_fee[__number__][unit]" class="form-control">
                                <option value="fixed"><?php echo e(__("Fixed")); ?></option>
                                <option value="percent"><?php echo e(__("Percent")); ?></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select __name__="service_fee[__number__][type]" class="form-control d-none">
                                <option value="one_time"><?php echo e(__("One-time")); ?></option>
                            </select>
                            <label>
                                <input type="checkbox" min="0" __name__="service_fee[__number__][per_person]"
                                    value="on">
                                <?php echo e(__("Price Per Hoarding")); ?>

                            </label>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
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
</script><?php /**PATH C:\xampp\htdocs\oohapp-laravel-io\modules/Space/Views/admin/space/pricing.blade.php ENDPATH**/ ?>