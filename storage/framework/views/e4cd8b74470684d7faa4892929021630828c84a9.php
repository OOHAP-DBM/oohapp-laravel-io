<div class="panel">
    <div class="panel-title"><strong><?php echo e(__('Fill Hoarding Info ')); ?></strong></div>
    <div class="panel-body">

        
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label><?php echo e(__('Hoarding Title')); ?><span class="text-danger">*</span></label>
                    <input type="text" value="<?php echo clean($translation->title); ?>"
                        placeholder="<?php echo e(__('Name of the space')); ?>" maxlength="42" name="title" class="form-control"
                        required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Hoarding Type')); ?><span class="text-danger">*</span></label>
                    <div>
                        <select name="hoarding_type" id="hoarding_type" class="form-control" required
                            onchange="selectHoardingType()">
                            <option value=""><?php echo e(__('-- Please Select --')); ?></option>
                            <option value="1" <?php echo e($row->hoarding_type == 1 ? 'selected' : ''); ?>><?php echo e(__('OOH')); ?></option>
                            <option value="2" <?php echo e($row->hoarding_type == 2 ? 'selected' : ''); ?>><?php echo e(__('DOOH')); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <?php if(is_default_lang()): ?>
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Hoarding Category')); ?> <span class="text-danger">*</span></label>
                    <div class="">
                        
                      
                        <select name="category_id" class="form-control"  required>
                            <option value=""><?php echo e(__('-- Please Select Category --')); ?></option>
                             <?php if(!empty($categories) && is_iterable($categories)): ?>
                               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($category->id); ?>" <?php echo e((old('category_id', $selectedCategoryId ?? '') == $category->id) ? 'selected' : ''); ?>>
                               <?php echo e(str_repeat('—', $category->depth)); ?> <?php echo e($category->name); ?>

                             </option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php else: ?>
                            <option value=""><?php echo e(__('No Categories Available')); ?></option>
                              <?php endif; ?>
                        </select>

                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- <select name="category_id" class="form-control">
    <option value=""><?php echo e(__('Select Category')); ?></option>
    <?php if(!empty($categories) && is_iterable($categories)): ?>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>">
                <?php echo e(str_repeat('—', $category->depth)); ?> <?php echo e($category->name); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <option value=""><?php echo e(__('No Categories Available')); ?></option>
    <?php endif; ?>
</select> -->





        </div>
        <div class="control-label d-flex justify-content-between align-items-center mb-3">
            <strong><?php echo e(__('Hoarding Size')); ?></strong>
            <strong class="" style="padding-right: 200px;"><?php echo e(__('Hoarding License Validity')); ?></strong>
        </div>


        <div class="row">
            <!-- Hoarding Size Section -->
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Measurement In')); ?></label>
                    <input type="text" id="measurement_in" class="form-control"
                        value="<?php echo e(old('measurement_in', $row->measurement_in ?? 'Sq.ft')); ?>"
                        placeholder="<?php echo e(__('Measurement In')); ?>" readonly>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Width')); ?><span class="text-danger">*</span></label>
                    <input type="number" id="width" name="width" class="form-control"
                        value="<?php echo e(old('width', $row->width)); ?>" placeholder="<?php echo e(__('Width')); ?>" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Height')); ?><span class="text-danger">*</span></label>
                    <input type="number" id="height" name="height" class="form-control"
                        value="<?php echo e(old('height', $row->height)); ?>" placeholder="<?php echo e(__('Height')); ?>" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Size Preview (Sq.ft)')); ?></label>
                    <input type="text" id="size_preview" name="size_preview" class="form-control"
                        value="<?php echo e(old('size_preview', $row->size_preview)); ?>" placeholder="<?php echo e(__('Size Preview')); ?>"
                        readonly>
                </div>
            </div>

            <!-- Hoarding License Validity Section -->
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Hoarding Expired on')); ?></label>
                    <div class="position-relative">
                        <input type="text" name="valid_till" class="form-control has-datepicker"
                            value="<?php echo e(old('valid_till', $row->valid_till)); ?>" placeholder="<?php echo e(__('Valid till')); ?>">
                        <i class="fa fa-calendar position-absolute" aria-hidden="true"
                            style="right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="control-label"><strong><?php echo e(__('Visibility & Traffic')); ?></strong></div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Ooh Daily Traffic')); ?><span class="text-danger">*</span></label>
                    <input type="number" id="ooh_daily_traffic" name="ooh_daily_traffic" class="form-control"
                        value="<?php echo e(old('ooh_daily_traffic', $row->ooh_daily_traffic)); ?>"
                        placeholder="<?php echo e(__('Ooh Daily Traffic')); ?>" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Angle of Visibility')); ?><span class="text-danger">*</span></label>
                    <div class="">
                        <select name="angle_of_visibility" class="form-control" required>
                            <option value=""><?php echo e(__('-- Please Select --')); ?></option>
                            <option value="1"<?php echo e($row->angle_of_visibility == 1 ? 'selected' : ''); ?>>
                                <?php echo e(__('Front Facing')); ?></option>
                            <option value="2"<?php echo e($row->angle_of_visibility == 2 ? 'selected' : ''); ?>>
                                <?php echo e(__('Side View')); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Illumination')); ?><span class="text-danger">*</span></label>
                    <div class="">
                        <select name="illumination" class="form-control" required>
                            <option value=""><?php echo e(__('-- Please Select --')); ?></option>
                            <option value="1" <?php echo e($row->illumination == 1 ? 'selected' : ''); ?>>
                                <?php echo e(__('Day light')); ?></option>
                            <option value="2" <?php echo e($row->illumination == 2 ? 'selected' : ''); ?>>
                                <?php echo e(__('Night Visibility')); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
             <div class="form-group">
                <div id="digitalmetrics" style="display: none;">
                     <label class="control-label"><?php echo e(__('Digital Metrics')); ?></label>
                     <input type="number" id="digital_metrics" class="form-control" name="digital_metrics"
                         value="<?php echo e(old('digital_metrics', $row->digital_metrics)); ?>"
                         placeholder="<?php echo e(__('Digital Metrics')); ?>">
                </div>
             </div>
            </div>
        </div> -->
        <!-- <div class="row"> -->
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
        <!-- <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Grace period includes in your booking')); ?><span class="text-danger">*</span></label>
                    <div>
                        <label>
                            <input type="radio" name="grace_period_included" id="grace_period_yes" value="yes"
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
                            class="form-control"
                            value="<?php echo e(old('grace_period_duration', $row->grace_period_duration)); ?>" min="1"
                            placeholder="Enter number of days">
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="control-label"><strong><?php echo e(__('Hoarding License Validity')); ?></strong></div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label"><?php echo e(__('Hoarding Expired on')); ?></label>
                        <input type="text" name="valid_till" class="form-control has-datepicker input-group date"
                            value="<?php echo e(old('valid_till', $row->valid_till)); ?>" placeholder="<?php echo e(__('Valid till')); ?>">
                    </div>
                </div> -->
       <!-- <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__('Booking Duration')); ?><span class="text-danger">*</span></label>
                    <div>
                        <select name="booking_duration" class="form-control" required>
                            <option value=""><?php echo e(__('-- Please Select --')); ?></option>
                            <option value="1" <?php echo e($row->booking_duration == 1 ? 'selected' : ''); ?>>
                                <?php echo e(__('Weekly')); ?></option>
                            <option value="2" <?php echo e($row->booking_duration == 2 ? 'selected' : ''); ?>>
                                <?php echo e(__('Monthly')); ?></option>
                            
                        </select>
                    </div>
                </div>
            </div>--> 
        <!-- </div> -->
        

        <div class="form-group">
            <label class="control-label"><?php echo e(__('Hoarding Description')); ?></label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10"
                    oninput="validateTextarea(this)"><?php echo e($translation->content); ?></textarea>
            </div>
        </div>



        <!-- <div class="form-group">
            <label><?php echo e(__('Size By Pexels')); ?></label>
            <input type="text" value="<?php echo clean($translation->sizeByPexel); ?>" placeholder="<?php echo e(__('Size By Pexels')); ?>"
                name="sizeByPexel" class="form-control">
        </div> -->


        <!-- <div class="form-group">
            <label><?php echo e(__('Footfall Daily')); ?></label>
            <input type="text" value="<?php echo clean($translation->footfall); ?>" placeholder="<?php echo e(__('Footfall Daily')); ?>"
                name="footfall" class="form-control">
        </div> -->

        




    <?php if(is_default_lang()): ?>
    <div class="form-group">
        <label class="control-label"><?php echo e(__('Banner Image')); ?></label>
        <div class="form-group-image">
            <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id', $row->banner_image_id); ?>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label"><?php echo e(__('Upload Images Into Your Gallery')); ?></label>
        <?php echo \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery', $row->gallery); ?>

    </div>
    <?php endif; ?>
    <?php if(is_default_lang()): ?>
    <div class="form-group">
        <label class="control-label"><?php echo e(__('Youtube Video')); ?></label>
        <input type="text" name="video" class="form-control" value="<?php echo e($row->video); ?>"
            placeholder="<?php echo e(__('Youtube link video')); ?>">
    </div>
    <?php endif; ?>
    <div class="form-group-item">
        <label class="control-label"><?php echo e(__('FAQs')); ?></label>
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-5"><?php echo e(__('Title')); ?></div>
                <div class="col-md-5"><?php echo e(__('Content')); ?></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            <?php if(!empty($translation->faqs)): ?>
            <?php
            if (!is_array($translation->faqs)) {
            $translation->faqs = json_decode($translation->faqs);
            }
            ?>
            <?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" data-number="<?php echo e($key); ?>">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="faqs[<?php echo e($key); ?>][title]" class="form-control"
                            value="<?php echo e($faq['title']); ?>" placeholder="<?php echo e(__('Eg: When and where does the tour end?')); ?>">
                    </div>
                    <div class="col-md-6">
                        <textarea name="faqs[<?php echo e($key); ?>][content]" class="form-control"
                            placeholder="..."><?php echo e($faq['content']); ?></textarea>
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
                        <input type="text" __name__="faqs[__number__][title]" class="form-control"
                            placeholder="<?php echo e(__('Eg: Can I bring my pet?')); ?>">
                    </div>
                    <div class="col-md-6">
                        <textarea __name__="faqs[__number__][content]" class="form-control" placeholder=""></textarea>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php if(is_default_lang()): ?>
<!--<div class="panel">-->
<!--    <div class="panel-title"><strong><?php echo e(__('Extra Info')); ?></strong></div>-->
<!--    <div class="panel-body">-->
<!--        <div class="row">-->
<!--            <div class="col-md-4">-->
<!--                <div class="form-group">-->
<!--                    <label><?php echo e(__('No. Bed')); ?></label>-->
<!--                    <input type="number" value="<?php echo e($row->bed); ?>" placeholder="<?php echo e(__('Example: 3')); ?>" name="bed" class="form-control">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4">-->
<!--                <div class="form-group">-->
<!--                    <label><?php echo e(__('No. Bathroom')); ?></label>-->
<!--                    <input type="number" value="<?php echo e($row->bathroom); ?>" placeholder="<?php echo e(__('Example: 5')); ?>" name="bathroom" class="form-control">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4">-->
<!--                <div class="form-group">-->
<!--                    <label><?php echo e(__('Square')); ?></label>-->
<!--                    <input type="number" value="<?php echo e($row->square); ?>" placeholder="<?php echo e(__('Example: 100')); ?>" name="square" class="form-control">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <?php if(is_default_lang()): ?>
-->
<!--            <div class="row">-->
<!--                <div class="col-lg-6">-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label"><?php echo e(__('Minimum advance reservations')); ?></label>-->
<!--                        <input type="number" name="min_day_before_booking" class="form-control" value="<?php echo e($row->min_day_before_booking); ?>" placeholder="<?php echo e(__('Ex: 3')); ?>">-->
<!--                        <i><?php echo e(__('Leave blank if you dont need to use the min day option')); ?></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6">-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label"><?php echo e(__('Minimum day stay requirements')); ?></label>-->
<!--                        <input type="number" name="min_day_stays" class="form-control" value="<?php echo e($row->min_day_stays); ?>" placeholder="<?php echo e(__('Ex: 2')); ?>">-->
<!--                        <i><?php echo e(__('Leave blank if you dont need to set minimum day stay option')); ?></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--
<?php endif; ?>-->
<!--    </div>-->
<!--</div>-->
<?php endif; ?>


<script>
function validateTextarea(element) {
    const wordLimit = 10; // Set the desired word limit here
    const editorContent = CKEDITOR.instances[element.name].getData();
    const wordCount = editorContent.split(/\s+/).length;

    if (wordCount > wordLimit) {
        const words = editorContent.trim().split(/\s+/);
        const limitedContent = words.slice(0, wordLimit).join(' ');
        CKEDITOR.instances[element.name].setData(limitedContent);
    }
}
</script>


<script>
function calculateSizePreview() {
    var measurementIn = document.getElementById('measurement_in').value.toLowerCase();
    var width = parseFloat(document.getElementById('width').value);
    var height = parseFloat(document.getElementById('height').value);

    if (measurementIn === 'sq.ft' && !isNaN(width) && !isNaN(height)) {
        var size = width * height;
        document.getElementById('size_preview').value = size.toFixed(2) + ' Sq.ft';
    } else {
        document.getElementById('size_preview').value = 'Invalid Input';
    }
}
document.getElementById('width').addEventListener('input', calculateSizePreview);
document.getElementById('height').addEventListener('input', calculateSizePreview);
</script>
<script>
function toggleDurationInput() {
    const yesRadio = document.getElementById('grace_period_yes');
    const durationInput = document.getElementById('duration_input');
    durationInput.style.display = yesRadio.checked ? 'block' : 'none';
}
document.addEventListener('DOMContentLoaded', function() {
    toggleDurationInput();
});

function selectHoardingType() {
    const hoardingType = document.getElementById('hoarding_type').value;
    const digitalMetricsDiv = document.getElementById('digitalmetrics');
    if (hoardingType == '2') {
        digitalMetricsDiv.style.display = 'block';
    } else {
        digitalMetricsDiv.style.display = 'none';
    }
}
document.addEventListener('DOMContentLoaded', function() {
    selectHoardingType();
});
</script><?php /**PATH C:\xampp\htdocs\oohapp-laravel-io\modules/Space/Views/admin/space/content.blade.php ENDPATH**/ ?>