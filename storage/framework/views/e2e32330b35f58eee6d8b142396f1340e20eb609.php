 <?php if(!empty($style) and $style == "carousel" and !empty($list_slider)): ?>
            <div class="effect">
                <div class="owl-carousel">
                    <?php $__currentLoopData = $list_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php

                         $img = get_file_url($item['bg_image'],'full') 

                        ?>
                        <div class="item">
                            <div class="item-bg" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('<?php echo e($img); ?>') !important"></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>   
        
        
        
                           
                           
                         <div class="tab-content">
                                <?php if(!empty($service_types)): ?>
                                    <?php $number = 0; ?>
                                    <?php $__currentLoopData = $service_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $allServices = get_bookable_services();
                                            if(empty($allServices[$service_type])) continue;
                                            $module = new $allServices[$service_type];
                                        ?>
                                        <div role="tabpanel" class="tab-pane <?php if($number == 0): ?> active <?php endif; ?>" id="bravo_<?php echo e($service_type); ?>" >
    
                                            <?php echo $__env->make(ucfirst($service_type).'::frontend.layouts.search.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                             
                                            
                                        </div>
                                        <?php $number++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            
                             <center><a href="<?php echo e(asset('/hoarding?_layout=map')); ?>" class="loginx btn btn-light" ><?php echo e(__('Show Map')); ?> <img style="height:20px;width:20px;" src="<?php echo e(asset('images/MapViewIcon.png')); ?>"></a></center>
<?php /**PATH C:\xampp\htdocs\oohapp.io_8thnov2023\themes/Base/Template/Views/frontend/blocks/form-search-all-service/style-normal.blade.php ENDPATH**/ ?>