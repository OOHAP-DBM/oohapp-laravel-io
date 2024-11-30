

<div class="g-header">
    <div class="left">
        <h1><?php echo e($translation->title); ?></h1>
        <?php if($translation->address): ?>
            <p class="address"><i class="fa fa-map-marker"></i>
                <?php echo e($translation->address); ?>

            </p>
        <?php endif; ?>
    </div>
    <div class="right">
        <?php if($row->getReviewEnable()): ?>
            <?php if($review_score): ?>
                <div class="review-score">
                    <div class="head">
                        <div class="left">
                            <span class="head-rating"><?php echo e($review_score['score_text']); ?></span>
                            <span class="text-rating"><?php echo e(__("from :number reviews",['number'=>$review_score['total_review']])); ?></span>
                        </div>
                        <div class="score">
                            <?php echo e($review_score['score_total']); ?><span>/5</span>
                        </div>
                    </div>
                    <div class="foot">
                     
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<div class="g-space-feature">
    <div class="row">
        <?php if(!empty($row->bed)): ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-hotel"></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("No. Bed")); ?></h4>
                        <p class="value">
                            <?php echo e($row->bed); ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
       
        <?php if($row->hoarding_type): ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon"style="margin-right: 0px !important;">
                    <?php if($row->hoarding_type == 1): ?>
                    <i class=""><?php echo $__env->make('Space::frontend.layouts.details.svg.ooh', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></i>
<?php else: ?>
<i class="">
<i class=""><?php echo $__env->make('Space::frontend.layouts.details.svg.dooh', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></i></i>
                    <?php endif; ?>
                    <!-- <i class="icofont-barricade"></i> -->
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("Hoarding Type")); ?></h4>
                        <p class="value">
                        <?php if($row->hoarding_type == 1): ?>
                             <?php echo e(__('OOH')); ?>

                        <?php elseif($row->hoarding_type == 2): ?>
                             <?php echo e(__('DOOH')); ?>

                        <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($row->category_id): ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                <div class="icon" style=" margin-right: 0px !important;">
                             <i class=""><?php echo $__env->make('Space::frontend.layouts.details.svg.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></i>
                    </div>
                    <div class="info">
                    <h4 class="name">
                    <?php echo e(__("Category")); ?>

                    </h4>
                        <p class="value">
                        <?php
                        $category = Modules\Space\Models\SpaceCategory::find($row->category_id);
                    ?>
                   
                    <?php if($category): ?>
                        <?php echo e(str_repeat('—', $category->depth)); ?> 
                        <?php echo e($category->name); ?> 
                    <?php else: ?>
                        <?php echo e(__('Unknown Category')); ?>

                    <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
            <?php if($row->size_preview): ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon" style="margin-right: 5px !important;">
                        <i class=""><?php echo $__env->make('Space::frontend.layouts.details.svg.size', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("Size (sq.ft)")); ?></h4>
                        <p class="value">
                    <?php $y= $row->width * $row->height?>
                        <?php echo e(($y)); ?>

                        (<?php echo e(($row->width)); ?>x<?php echo e(($row->height)); ?>)
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(!empty($row->location->name)): ?>
                <?php $location =  $row->location->translate() ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon"   style="margin-right: 0px !important;">
                         <i class=""><?php echo $__env->make('Space::frontend.layouts.details.svg.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("Location")); ?></h4>
                        <p class="value">
                            <?php echo e($location->name ?? ''); ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php if($row->getGallery()): ?>
    <div class="g-gallery">
        <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
            <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($item['large']); ?>" data-thumb="<?php echo e($item['thumb']); ?>" data-alt="<?php echo e(__("Gallery")); ?>"></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="social">
            <div class="social-share">
                <span class="social-icon">
                    <i class="icofont-share"></i>
                </span>
                <ul class="share-wrapper">
                    <li>
                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Facebook")); ?>">
                            <i class="fa fa-facebook fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Twitter")); ?>">
                            <i class="fa fa-twitter fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                <i class="fa fa-heart-o"></i>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($translation->content): ?>
    <div class="g-overview">
        <h3><?php echo e(__("Description")); ?></h3>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
<?php endif; ?>



<?php if($translation->facing): ?>
    <div class="g-overview">
        <h3><?php echo e(__("Facing")); ?></h3>
        <div class="description">
            <?php echo $translation->facing ?>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Space::frontend.layouts.details.space-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if ($__env->exists("Hotel::frontend.layouts.details.hotel-surrounding")) echo $__env->make("Hotel::frontend.layouts.details.hotel-surrounding", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($row->map_lat && $row->map_lng): ?>
<div class="g-location">
    <h3><?php echo e(__("Location")); ?></h3>
    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
<?php endif; ?>
<?php if($translation->faqs): ?>
<div class="g-faq">
    <h3> <?php echo e(__("FAQs")); ?> </h3>
    <?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <div class="header">
                <i class="field-icon icofont-support-faq"></i>
                <h5><?php echo e($item['title']); ?></h5>
                <span class="arrow"><i class="fa fa-angle-down"></i></span>
            </div>
            <div class="body">
                <?php echo e($item['content']); ?>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

<?php /**PATH G:\xampp\htdocs\oohapp-laravel-io\themes/BC/Space/Views/frontend/layouts/details/space-detail.blade.php ENDPATH**/ ?>