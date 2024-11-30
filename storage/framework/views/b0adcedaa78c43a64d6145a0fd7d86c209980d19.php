
<?php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
    $grouped_attributes = [
        0 => [], // for types_of_attribute = 0
        1 => []  // for types_of_attribute = 1
    ];

    foreach ($attributes as $attribute) {
        $type = $attribute['parent']->types_of_attribute ?? 1; // Default to 1 if not set
        $grouped_attributes[$type][] = $attribute;
    }
?>
<h3 style="font-size: 1.5rem;"> Hoarding Attributes </h3>
<?php if(!empty($terms_ids) and !empty($attributes)): ?>
    
    <?php if(!empty($grouped_attributes[0])): ?>
        <div class="grid-view">
            <?php $__currentLoopData = $grouped_attributes[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $translate_attribute = $attribute['parent']->translate() ?>
                <?php if(empty($attribute['parent']['hide_in_single'])): ?>
                    <div class="g-attributes <?php echo e($attribute['parent']->slug); ?> attr-<?php echo e($attribute['parent']->id); ?>"style="margin-right: 100px !important;margin-left: 0px !important;">
                        <h3 style="font-size: 14px;color: #1A2B48;"><?php echo e($translate_attribute->name); ?></h3>
                        <?php $terms = $attribute['child'] ?>
                        <div class="list-attributes grid-layout">
                            <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $translate_term = $term->translate() ?>
                                <div class="item <?php echo e($term->slug); ?> term-<?php echo e($term->id); ?>"style="font-size: 14px;color: #5E6D77;">
                                    <?php if(!empty($term->image_id)): ?>
                                        <?php $image_url = get_file_url($term->image_id, 'full'); ?>
                                        <img src="<?php echo e($image_url); ?>" class="img-responsive" alt="<?php echo e($translate_term->name); ?>">
                                    <?php else: ?>
                                        <i class="<?php echo e($term->icon ?? "icofont-check-circled icon-default"); ?>"></i>
                                    <?php endif; ?>
                                    <?php echo e($translate_term->name); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

   
    <?php if(!empty($grouped_attributes[1])): ?>
        <?php $__currentLoopData = $grouped_attributes[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $translate_attribute = $attribute['parent']->translate() ?>
            <?php if(empty($attribute['parent']['hide_in_single'])): ?>
                <div class="g-attributes <?php echo e($attribute['parent']->slug); ?> attr-<?php echo e($attribute['parent']->id); ?>"style="margin-right: 100px !important;margin-left: 0px !important;">
                    <h3 style="font-size: 14px;color: #1A2B48;"><?php echo e($translate_attribute->name); ?></h3>
                    <?php $terms = $attribute['child'] ?>
                    <div class="list-attributes">
                        <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $translate_term = $term->translate() ?>
                            <div class="item <?php echo e($term->slug); ?> term-<?php echo e($term->id); ?>" style="font-size: 14px;color: #5E6D77;">
                                <?php if(!empty($term->image_id)): ?>
                                    <?php $image_url = get_file_url($term->image_id, 'full'); ?>
                                    <img src="<?php echo e($image_url); ?>" class="img-responsive" alt="<?php echo e($translate_term->name); ?>">
                                <?php else: ?>
                                    <i class="<?php echo e($term->icon ?? "icofont-check-circled icon-default"); ?>"></i>
                                <?php endif; ?>
                                <?php echo e($translate_term->name); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>
<style>
.grid-layout {
    display: grid;
    grid-template-columns: repeat(3, 1fr); 
    gap: 20px; 
} 


</style>

<?php /**PATH C:\xampp\htdocs\oohapp-laravel-io\themes/BC/Space/Views/frontend/layouts/details/space-attributes.blade.php ENDPATH**/ ?>