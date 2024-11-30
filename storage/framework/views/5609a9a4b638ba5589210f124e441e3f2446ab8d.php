<?php
$user = auth()->user();
?>
<div class="modal fade" tabindex="-1" role="dialog" id="enquiry_form_modal" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content enquiry_form_modal_form">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Enquiry")); ?></h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--    <span aria-hidden="true">&times;</span>-->
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="service_id" value="<?php echo e($row->id); ?>">
                <input type="hidden" name="service_type" value="<?php echo e($service_type ?? ''); ?>">
                <div class="form-group" >
                    
                    <label for="enquiry_name"><?php echo e(__('Name *')); ?></label>
                    <!--<input type="text" class="form-control" value="<?php echo e($user->display_name ?? ''); ?>" name="enquiry_name" placeholder="<?php echo e(__("Name *")); ?>">-->
                    <input type="text" class="form-control" value="" name="enquiry_name" placeholder="<?php echo e(__('Name *')); ?>" maxlength="20">

                </div>
                <div class="form-group">
                    
                    <label for="enquiry_email"><?php echo e(__('Email *')); ?></label>
                    <!--<input type="text" class="form-control" value="<?php echo e($user->email ?? ''); ?>" name="enquiry_email" placeholder="<?php echo e(__("Email *")); ?>">-->
                    <input id="email" type="email" class="form-control" value="" name="enquiry_email" placeholder="<?php echo e(__('Email *')); ?>">

                </div>
                <div class="form-group" v-if="!enquiry_is_submit">
                <label for="enquiry_phone"><?php echo e(__('Phone')); ?></label>
                    <!--<input type="text" class="form-control" value="<?php echo e($user->phone ?? ''); ?>" name="enquiry_phone" placeholder="<?php echo e(__("Phone")); ?>">-->
                    <!-- <input type="text" class="form-control" value="" name="enquiry_phone"
                        placeholder="<?php echo e(__('Phone')); ?>"> -->
                         <input type="text" class="form-control" value="" name="enquiry_phone" placeholder="<?php echo e(__('Phone')); ?>" oninput="this.value = this.value.replace(/[^0-9+]/g, '').slice(0, 15);">
                        </div>
                
                <label for="enquiry_note"><?php echo e(__('Note')); ?></label>
                <div class="form-group" v-if="!enquiry_is_submit">
                    <textarea class="form-control" placeholder="<?php echo e(__("Note")); ?>" name="enquiry_note"  maxlength="250"></textarea>
                </div>
                <?php if(setting_item("booking_enquiry_enable_recaptcha")): ?>
                    <div class="form-group">
                        <?php echo e(recaptcha_field('enquiry_form')); ?>

                    </div>
                <?php endif; ?>
                <div class="message_box"></div>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>-->
                <button type="button" class="btn btn-secondary btn-close-enquiry"><?php echo e(__('Close')); ?></button>
                <button type="button" class="btn btn-primary btn-submit-enquiry"><?php echo e(__("Send now")); ?>

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
<?php /**PATH C:\xampp\htdocs\oohapp-laravel-io\themes/BC/Booking/Views/frontend/global/enquiry-form.blade.php ENDPATH**/ ?>