 

  

  





<!-- <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php 
        $translate = $attribute->translate(app_get_locale()); 
        $inputType = $attribute->types_of_attribute == 0 ? 'radio' : 'checkbox'; // Determine input type
    ?>
    <div class="panel">
        <div class="panel-title">
            <strong>
                <?php echo e(__('Attribute: :name', ['name' => $translate->name])); ?>

                <?php if($attribute->is_mandatory): ?>
                    <span style="color: red;">*</span> 
                <?php endif; ?>
            </strong>
        </div>
        <div class="panel-body">
            <div class="terms-scrollable">
                <?php $__currentLoopData = $attribute->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $term_translate = $term->translate(app_get_locale());
                        if ($inputType === 'checkbox') {
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        } else { 
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        }

                        $inputName = $inputType === 'checkbox' 
                            ? "terms[{$term->id}]" 
                            : "terms[{$attribute->id}]"; 
                    ?>
                    <label class="term-item">
                        <input 
                            type="<?php echo e($inputType); ?>" 
                            id="terms_<?php echo e($attribute->id); ?>_<?php echo e($term->id); ?>" 
                            name="<?php echo e($inputName); ?>"  
                            value="<?php echo e($term->id); ?>"
                            <?php if($selected): ?> checked <?php endif; ?>
                            <?php if($attribute->is_mandatory && $inputType === 'checkbox'): ?> 
                                class="checkbox-required"
                            <?php endif; ?>
                            data-attribute-id="<?php echo e($attribute->id); ?>"> 
                        <span class="term-name"><?php echo e($term_translate->name); ?></span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div> 
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.checkbox-required');
        
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Check if any checkbox is checked
                let isChecked = false;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isChecked = true;
                    }
                });

                // If no checkbox is checked, add the 'required' attribute
                checkboxes.forEach(function(checkbox) {
                    if (!isChecked) {
                        checkbox.setAttribute('required', true);
                    } else {
                        checkbox.removeAttribute('required');
                    }
                });
            });
        });
    });
</script> -->
<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php 
        $translate = $attribute->translate(app_get_locale()); 
        $inputType = $attribute->types_of_attribute == 0 ? 'radio' : 'checkbox'; // Determine input type
    ?>
    <div class="panel">
        <div class="panel-title">
            <strong>
                <?php echo e(__(' :name', ['name' => $translate->name])); ?>

                <?php if($attribute->is_mandatory): ?>
                    <span style="color: red;">*</span> 
                <?php endif; ?>
            </strong>
        </div>
        <div class="panel-body">
            <div class="terms-scrollable">
                <?php $__currentLoopData = $attribute->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $term_translate = $term->translate(app_get_locale());
                        if ($inputType === 'checkbox') {
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        } else { 
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        }

                        $inputName = $inputType === 'checkbox' 
                            ? "terms[{$term->id}]" 
                            : "terms[{$attribute->id}]"; 
                    ?>
                    <label class="term-item">
                        <input 
                            type="<?php echo e($inputType); ?>" 
                            id="terms_<?php echo e($attribute->id); ?>_<?php echo e($term->id); ?>" 
                            name="<?php echo e($inputName); ?>"  
                            value="<?php echo e($term->id); ?>"

                            <?php if($selected): ?> checked <?php endif; ?>
                            <?php if($attribute->is_mandatory && $inputType === 'checkbox'): ?> 
                                class="checkbox-required"
                            <?php endif; ?>
                            <?php if($attribute->is_mandatory && $inputType === 'radio'): ?> 
                                class="radio-required"
                            <?php endif; ?>
                            data-attribute-id="<?php echo e($attribute->id); ?>"> 
                        <span class="term-name"><?php echo e($term_translate->name); ?></span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div> 
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // For each panel (group of checkboxes or radio buttons for each attribute)
        const panels = document.querySelectorAll('.panel');
        
        panels.forEach(function(panel) {
            const checkboxes = panel.querySelectorAll('.checkbox-required');
            const radios = panel.querySelectorAll('.radio-required');
            
            // Function to handle the 'required' attribute for checkboxes within a specific attribute group
            function updateRequiredAttribute() {
                // For checkboxes
                const isCheckboxChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                checkboxes.forEach(function(checkbox) {
                    if (!isCheckboxChecked) {
                        checkbox.setAttribute('required', 'required');
                    } else {
                        checkbox.removeAttribute('required');
                    }
                });

                // For radio buttons
                const isRadioChecked = Array.from(radios).some(radio => radio.checked);
                radios.forEach(function(radio) {
                    if (!isRadioChecked) {
                        radio.setAttribute('required', 'required');
                    } else {
                        radio.removeAttribute('required');
                    }
                });
            }

            // Initialize the function to set 'required' if no checkbox/radio is checked
            updateRequiredAttribute();

            // Add event listeners to checkboxes/radios in this group to update the 'required' attribute on change
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', updateRequiredAttribute);
            });

            radios.forEach(function(radio) {
                radio.addEventListener('change', updateRequiredAttribute);
            });
        });
    });
</script>









<?php /**PATH C:\xampp\htdocs\oohapp-laravel-io\modules/Space/Views/admin/space/attributes.blade.php ENDPATH**/ ?>