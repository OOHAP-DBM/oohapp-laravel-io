 {{--@foreach ($attributes as $attribute)
    @php $translate = $attribute->translate(app_get_locale()); @endphp
    <div class="panel">
        <div class="panel-title"><strong>{{__('Attribute: :name',['name'=>$translate->name])}}</strong></div>
        <div class="panel-body">
            <div class="terms-scrollable">
                @foreach($attribute->terms as $term)
                    @php $term_translate = $term->translate(app_get_locale()); @endphp
                    <label class="term-item">
                        <input @if(!empty($selected_terms) and $selected_terms->contains($term->id)) checked @endif type="checkbox" name="terms[]" value="{{$term->id}}">
                        <span class="term-name">{{$term_translate->name}}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
@endforeach --}}

 {{--@foreach ($attributes as $attribute) 
    @php 
        $translate = $attribute->translate(app_get_locale()); 
        $inputType = $attribute->types_of_attribute == 0 ? 'radio' : 'checkbox';
    @endphp
    <div class="panel">
        <div class="panel-title">
            <strong>{{ __('Attribute: :name', ['name' => $translate->name]) }}</strong>
        </div>
        <div class="panel-body">
            <div class="terms-scrollable">
                @foreach($attribute->terms as $term)
                    @php $term_translate = $term->translate(app_get_locale()); @endphp
                    <label class="term-item">
                        <input 
                            @if(!empty($selected_terms) and $selected_terms->contains($term->id)) checked @endif 
                            type="{{ $inputType }}" 
                            name="term{{ $attribute->id }}[]"
                            value="{{ $term->id }}">
                        <span class="term-name">{{ $term_translate->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
@endforeach--}} 

  {{-- @foreach ($attributes as $attribute)  
    @php 
        $translate = $attribute->translate(app_get_locale()); 
        $inputType = $attribute->types_of_attribute == 0 ? 'radio' : 'checkbox'; // Determine input type
    @endphp
    <div class="panel">
        <div class="panel-title">
            <strong>
                {{ __('Attribute: :name', ['name' => $translate->name]) }}
                @if($attribute->is_mandatory)
                    <span style="color: red;">*</span> <!-- Add mandatory star -->
                @endif
            </strong>
        </div>
        <div class="panel-body">
            <div class="terms-scrollable">
                @foreach($attribute->terms as $term)
                    @php 
                        $term_translate = $term->translate(app_get_locale());
                        $selected = !empty($selected_terms[$attribute->id]) && is_array($selected_terms[$attribute->id]) && in_array($term->id, $selected_terms[$attribute->id]);
                    @endphp
                    <label class="term-item">
                        <input 
                            @if($selected) checked @endif 
                            type="{{ $inputType }}" 
                            id="terms_{{ $attribute->id }}" 
                            name="terms[{{  $attribute->id }}]"  
                            value="{{ $term->id }}"
                            @if($attribute->is_mandatory) required @endif
                            data-attribute-id="{{ $attribute->id }}"> 
                        <span class="term-name">{{ $term_translate->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
@endforeach --}}
{{--@foreach ($attributes as $attribute)   
    @php 
        $translate = $attribute->translate(app_get_locale()); 
        $inputType = $attribute->types_of_attribute == 0 ? 'radio' : 'checkbox'; // Determine input type
    @endphp
    <div class="panel">
        <div class="panel-title">
            <strong>
                {{ __('Attribute: :name', ['name' => $translate->name]) }}
                @if($attribute->is_mandatory)
                    <span style="color: red;">*</span> <!-- Add mandatory star -->
                @endif
            </strong>
        </div>
        <div class="panel-body">
            <div class="terms-scrollable">
                @foreach($attribute->terms as $term)
                    @php 
                        $term_translate = $term->translate(app_get_locale());
                        $selected = !empty($selected_terms[$attribute->id]) && is_array($selected_terms[$attribute->id]) && in_array($term->id, $selected_terms[$attribute->id]);
                    @endphp
                    <label class="term-item">
                        <input 
                            @if($selected) checked @endif 
                            type="{{ $inputType }}" 
                            id="terms_{{ $attribute->id }}" 
                            name="terms[{{ $attribute->id }}]{{ $inputType === 'checkbox' ? '[]' : '' }}"  
                            value="{{ $term->id }}"
                            @if($attribute->is_mandatory) required @endif
                            data-attribute-id="{{ $attribute->id }}"> 
                        <span class="term-name">{{ $term_translate->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
@endforeach--}}

{{--@foreach ($attributes as $attribute)   
    @php 
        $translate = $attribute->translate(app_get_locale()); 
        $inputType = $attribute->types_of_attribute == 0 ? 'radio' : 'checkbox'; // Determine input type
    @endphp
    <div class="panel">
        <div class="panel-title">
            <strong>
                {{ __('Attribute: :name', ['name' => $translate->name]) }}
                @if($attribute->is_mandatory)
                    <span style="color: red;">*</span> 
                @endif
            </strong>
        </div>
      <div class="panel-body">
            <div class="terms-scrollable">
                @foreach($attribute->terms as $term)
                    @php 
                        $term_translate = $term->translate(app_get_locale());

                        
                        if ($inputType === 'checkbox') {
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        } else { 
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        }

                       
                        $inputName = $inputType === 'checkbox' 
                            ? "terms[{$term->id}]" 
                            : "terms[{$attribute->id}]"; 
                    @endphp
                    <label class="term-item">
                        <input 
                            type="{{ $inputType }}" 
                            id="terms_{{ $attribute->id }}_{{ $term->id }}" 
                            name="{{ $inputName }}"  
                            value="{{ $term->id }}"
                            @if($selected) checked @endif
                            @if($attribute->is_mandatory) required @endif
                            data-attribute-id="{{ $attribute->id }}"> 
                        <span class="term-name">{{ $term_translate->name }}</span>
                    </label>
                @endforeach
            </div>
        </div> 
    </div>

@endforeach--}}


<!-- @foreach ($attributes as $attribute)
    @php 
        $translate = $attribute->translate(app_get_locale()); 
        $inputType = $attribute->types_of_attribute == 0 ? 'radio' : 'checkbox'; // Determine input type
    @endphp
    <div class="panel">
        <div class="panel-title">
            <strong>
                {{ __('Attribute: :name', ['name' => $translate->name]) }}
                @if($attribute->is_mandatory)
                    <span style="color: red;">*</span> 
                @endif
            </strong>
        </div>
        <div class="panel-body">
            <div class="terms-scrollable">
                @foreach($attribute->terms as $term)
                    @php 
                        $term_translate = $term->translate(app_get_locale());
                        if ($inputType === 'checkbox') {
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        } else { 
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        }

                        $inputName = $inputType === 'checkbox' 
                            ? "terms[{$term->id}]" 
                            : "terms[{$attribute->id}]"; 
                    @endphp
                    <label class="term-item">
                        <input 
                            type="{{ $inputType }}" 
                            id="terms_{{ $attribute->id }}_{{ $term->id }}" 
                            name="{{ $inputName }}"  
                            value="{{ $term->id }}"
                            @if($selected) checked @endif
                            @if($attribute->is_mandatory && $inputType === 'checkbox') 
                                class="checkbox-required"
                            @endif
                            data-attribute-id="{{ $attribute->id }}"> 
                        <span class="term-name">{{ $term_translate->name }}</span>
                    </label>
                @endforeach
            </div>
        </div> 
    </div>
@endforeach

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
@foreach ($attributes as $attribute)
    @php 
        $translate = $attribute->translate(app_get_locale()); 
        $inputType = $attribute->types_of_attribute == 0 ? 'radio' : 'checkbox'; // Determine input type
    @endphp
    <div class="panel">
        <div class="panel-title">
            <strong>
                {{ __(' :name', ['name' => $translate->name]) }}
                @if($attribute->is_mandatory)
                    <span style="color: red;">*</span> 
                @endif
            </strong>
        </div>
        <div class="panel-body">
            <div class="terms-scrollable">
                @foreach($attribute->terms as $term)
                    @php 
                        $term_translate = $term->translate(app_get_locale());
                        if ($inputType === 'checkbox') {
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        } else { 
                            $selected = !empty($selected_terms) && $selected_terms->contains($term->id);
                        }

                        $inputName = $inputType === 'checkbox' 
                            ? "terms[{$term->id}]" 
                            : "terms[{$attribute->id}]"; 
                    @endphp
                    <label class="term-item">
                        <input 
                            type="{{ $inputType }}" 
                            id="terms_{{ $attribute->id }}_{{ $term->id }}" 
                            name="{{ $inputName }}"  
                            value="{{ $term->id }}"

                            @if($selected) checked @endif
                            @if($attribute->is_mandatory && $inputType === 'checkbox') 
                                class="checkbox-required"
                            @endif
                            @if($attribute->is_mandatory && $inputType === 'radio') 
                                class="radio-required"
                            @endif
                            data-attribute-id="{{ $attribute->id }}"> 
                        <span class="term-name">{{ $term_translate->name }}</span>
                    </label>
                @endforeach
            </div>
        </div> 
    </div>
@endforeach

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









