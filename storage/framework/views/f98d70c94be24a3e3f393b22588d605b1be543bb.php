 <br>
 <div class="">

<?php if(in_array($style,['carousel',''])): ?>

 <?php echo $__env->make("Template::frontend.blocks.form-search-all-service.style-normal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
 
<?php endif; ?> 
    
    
                                <?php if(!empty($service_types)): ?>
                                    <?php $number = 0; ?>
                                    <?php $__currentLoopData = $service_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $allServices = get_bookable_services();
                                            if(empty($allServices[$service_type])) continue;
                                            $module = new $allServices[$service_type];
                                        ?>
                                        
                                       <?php echo $__env->make("Template::frontend.blocks.form-search-all-service.slider", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                       
                                        <?php $number++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                           
                        




<?php if($style == "carousel_v2"): ?>

    <?php echo $__env->make("Template::frontend.blocks.form-search-all-service.style-slider-ver2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
</div>  


 <?php /**PATH C:\xampp\htdocs\oohapp.io_8thnov2023\themes/Base/Template/Views/frontend/blocks/form-search-all-service/index.blade.php ENDPATH**/ ?>