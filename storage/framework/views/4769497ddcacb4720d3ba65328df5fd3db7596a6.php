<form action="<?php echo e(url( app_get_locale(false,false,'/').config('space.space_route_prefix') )); ?>" class="form bravo_form d-flex justify-content-start" method="get" onsubmit="return false;">
    <?php $space_map_search_fields = setting_item_array('space_map_search_fields');

    $space_map_search_fields = array_values(\Illuminate\Support\Arr::sort($space_map_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));

    ?>
    <?php if(!empty($space_map_search_fields)): ?>
        <?php $__currentLoopData = $space_map_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php switch($field['field']):
                case ('location'): ?>
                    <?php echo $__env->make('Space::frontend.layouts.search-map.fields.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
                <?php case ('attr'): ?>
                    <?php echo $__env->make('Space::frontend.layouts.search-map.fields.attr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
                <?php case ('date'): ?>
                    <?php echo $__env->make('Space::frontend.layouts.search-map.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
                <?php case ('price'): ?>
                    <?php echo $__env->make('Space::frontend.layouts.search-map.fields.price', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
                <?php case ('advance'): ?>
                    <div class="filter-item filter-simple">
                        <div class="form-group">
                            <span class="filter-title toggle-advance-filter" data-target="#advance_filters"><?php echo e(__('More filters')); ?> <i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>
                <?php break; ?>

            <?php endswitch; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>



</form>

<style>
    
    .loginx{
            
  /*          background-color: #DB1F48;*/
  /*color: #fff;*/
       padding:15px;
       transition: background-color 1s;
       border-radius: 30px;
    margin-top: 28%;
    height: 50px;
    position: fixed;
    z-index: 1100 !important;
    background: #dfd6d6;
    box-shadow: 0px 2px 3px 1px grey;
    margin-left: -64px;
        }
        
        
       .loginx:hover {
           
           background-color: #5191FA;
           height:55px;
           padding:15px;
           transition:0.7s;
           
       }
       
.loginx:focus,
.loginx:active {
  background-color: #5191FA;;
  transition: none;
}

</style>

<center><a href="https://oohapp.io" class="loginx btn btn-light" style="">show list	<img style="height:20px;width:20px;" src="<?php echo e(asset('images/Listed.png')); ?>"></a></center>
<?php /**PATH C:\xampp\htdocs\oohapp-laravel-io\themes/BC/Space/Views/frontend/layouts/search-map/form-search-map.blade.php ENDPATH**/ ?>