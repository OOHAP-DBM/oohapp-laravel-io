<style>
      /* Style for when a valid value is selected */
  .form-control:valid {
    border-color: #008000;
  }

    </style>
<div class="panel">
    <div class="panel-title"><strong>{{ __('Fill Hoarding Info ') }}</strong>
<br> <label class="control-label">Provide essential details about the hoarding for a clear and concise listing.</label>

</div>
    <div class="panel-body">

        {{-- Add New Filed 15/11/2024 Start --}}
        <div class="row">
            <!-- <div class="col-lg-6">
                <div class="form-group">
                    <label>{{ __('Hoarding Title') }}<span class="text-danger">*</span></label>
                    <input type="text" value="{!! clean($translation->title) !!}"
                        placeholder="{{ __('Name of the hoarding') }}" maxlength="42" name="title" class="form-control form-input"
                        required>
                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">{{ __('Hoarding Type') }}<span class="text-danger">*</span></label>
                    <div>
                        <select name="hoarding_type" id="hoarding_type" class="form-control" required
                            onchange="selectHoardingType()">
                            <option value="">{{ __('-- Please Select --') }}</option>
                            <option value="1" {{ $row->hoarding_type == 1 ? 'selected' : '' }}>{{ __('OOH') }}</option>
                            <option value="2" {{ $row->hoarding_type == 2 ? 'selected' : '' }}>{{ __('DOOH') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                @if (is_default_lang())
                <div class="form-group">
                    <label class="control-label">{{ __('Hoarding Category') }} <span class="text-danger">*</span></label>
                    <div class="">
                        {{--  <select name="category_id" class="form-control">
                            <option value="">{{ __('-- Please Select --') }}</option>
                        <?php
                                $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
                                    foreach ($categories as $category) {
                                        $selected = '';
                                        if ($row->category_id == $category->id) {
                                            $selected = 'selected';
                                        }
                                        printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                                        $traverse($category->children, $prefix . '-');
                                    }
                                };
                              
                                ?>
                        </select>--}}
                      
                        <select name="category_id" class="form-control"  required>
                            <option value="">{{ __('-- Please Select Category --') }}</option>
                             @if(!empty($categories) && is_iterable($categories))
                               @foreach($categories as $category)
                              <option value="{{ $category->id }}" {{ (old('category_id', $selectedCategoryId ?? '') == $category->id) ? 'selected' : '' }}>
                               {{ str_repeat('—', $category->depth) }} {{ $category->name }}
                             </option>
                             @endforeach
                             @else
                            <option value="">{{ __('No Categories Available') }}</option>
                              @endif
                        </select>

                    </div>
                </div>
                @endif
            </div>
            <!-- <select name="category_id" class="form-control">
    <option value="">{{ __('Select Category') }}</option>
    @if(!empty($categories) && is_iterable($categories))
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ str_repeat('—', $category->depth) }} {{ $category->name }}
            </option>
        @endforeach
    @else
        <option value="">{{ __('No Categories Available') }}</option>
    @endif
</select> -->





        </div>
        <div class="control-label d-flex justify-content-between align-items-center mb-3">
            <strong>{{ __('Hoarding Size') }}</strong>
            <strong class="" style="padding-right: 200px;">{{ __('Hoarding License Validity') }}</strong>
        </div>


        <div class="row">
            <!-- Hoarding Size Section -->
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label">{{ __('Measurement In') }}</label>
                    <input type="text" id="measurement_in" class="form-control"
                        value="{{ old('measurement_in', $row->measurement_in ?? 'Sq.ft') }}"
                        placeholder="{{ __('Measurement In') }}" readonly>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label">{{ __('Width') }}<span class="text-danger">*</span></label>
                    <input type="number" id="width" name="width" class="form-control"
                        value="{{ old('width', $row->width) }}" placeholder="{{ __('Width') }}" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label">{{ __('Height') }}<span class="text-danger">*</span></label>
                    <input type="number" id="height" name="height" class="form-control"
                        value="{{ old('height', $row->height) }}" placeholder="{{ __('Height') }}" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label">{{ __('Size Preview ') }}</label>
                    <input type="text" id="size_preview" name="size_preview" class="form-control"
                        value="{{ old('size_preview', $row->size_preview) }}" placeholder="{{ __('(Sq.ft)') }}"
                        readonly>
                </div>
            </div>

            <!-- Hoarding License Validity Section -->
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label">{{ __('Hoarding Expired on') }}</label>
                    <div class="position-relative">
                        <input type="text" name="valid_till" class="form-control has-datepicker"
                            value="{{ old('valid_till', $row->valid_till) }}" placeholder="{{ __('Valid till') }}">
                        <i class="fa fa-calendar position-absolute" aria-hidden="true"
                            style="right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="control-label"><strong>{{ __('Visibility & Traffic') }}</strong></div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Ooh Daily Traffic') }}<span class="text-danger">*</span></label>
                    <input type="number" id="ooh_daily_traffic" name="ooh_daily_traffic" class="form-control"
                        value="{{ old('ooh_daily_traffic', $row->ooh_daily_traffic) }}"
                        placeholder="{{ __('Ooh Daily Traffic') }}" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Angle of Visibility') }}<span class="text-danger">*</span></label>
                    <div class="">
                        <select name="angle_of_visibility" class="form-control" required>
                            <option value="">{{ __('-- Please Select --') }}</option>
                            <option value="1"{{ $row->angle_of_visibility == 1 ? 'selected' : '' }}>
                                {{ __('Front Facing') }}</option>
                            <option value="2"{{ $row->angle_of_visibility == 2 ? 'selected' : '' }}>
                                {{ __('Side View') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Illumination') }}<span class="text-danger">*</span></label>
                    <div class="">
                        <select name="illumination" class="form-control" required>
                            <option value="">{{ __('-- Please Select --') }}</option>
                            <option value="1" {{ $row->illumination == 1 ? 'selected' : '' }}>
                                {{ __('Day light') }}</option>
                            <option value="2" {{ $row->illumination == 2 ? 'selected' : '' }}>
                                {{ __('Night Visibility') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
             <div class="form-group">
                <div id="digitalmetrics" style="display: none;">
                     <label class="control-label">{{ __('Digital Metrics') }}</label>
                     <input type="number" id="digital_metrics" class="form-control" name="digital_metrics"
                         value="{{ old('digital_metrics', $row->digital_metrics) }}"
                         placeholder="{{ __('Digital Metrics') }}">
                </div>
             </div>
            </div>
        </div> -->
        <!-- <div class="row"> -->
        <!-- <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Approved from Nagar Nigam ?') }}<span class="text-danger">*</span></label>
                    <div>
                        <label>
                            <input type="radio" name="approved_nagar_nigam"
                                value="yes"{{ old('approved_nagar_nigam', $row->approved_nagar_nigam) == 'yes' ? 'checked' : '' }}
                                required>
                            {{ __('Yes') }}
                        </label>
                        <label style="margin-left: 20px;">
                            <input type="radio" name="approved_nagar_nigam"
                                value="no"{{ old('approved_nagar_nigam', $row->approved_nagar_nigam) == 'no' ? 'checked' : '' }}
                                required>
                            {{ __('No') }}
                        </label>
                    </div>
                </div>
            </div> -->
        <!-- <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Grace period includes in your booking') }}<span class="text-danger">*</span></label>
                    <div>
                        <label>
                            <input type="radio" name="grace_period_included" id="grace_period_yes" value="yes"
                                {{ old('grace_period_included', $row->grace_period_included) == 'yes' ? 'checked' : '' }}
                                onchange="toggleDurationInput()">
                            {{ __('Yes') }}
                        </label>
                        <label style="margin-left: 20px;">
                            <input type="radio" name="grace_period_included" id="grace_period_no" value="no"
                                {{ old('grace_period_included', $row->grace_period_included) == 'no' ? 'checked' : '' }}
                                onchange="toggleDurationInput()">
                            {{ __('No') }}
                        </label>
                    </div>


                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <div id="duration_input" style="display: none;">
                        <label for="grace_period_duration">{{ __('Enter Duration (in days)') }}</label>
                        <input type="number" name="grace_period_duration" id="grace_period_duration"
                            class="form-control"
                            value="{{ old('grace_period_duration', $row->grace_period_duration) }}" min="1"
                            placeholder="Enter number of days">
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="control-label"><strong>{{ __('Hoarding License Validity') }}</strong></div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">{{ __('Hoarding Expired on') }}</label>
                        <input type="text" name="valid_till" class="form-control has-datepicker input-group date"
                            value="{{ old('valid_till', $row->valid_till) }}" placeholder="{{ __('Valid till') }}">
                    </div>
                </div> -->
       <!-- <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Booking Duration') }}<span class="text-danger">*</span></label>
                    <div>
                        <select name="booking_duration" class="form-control" required>
                            <option value="">{{ __('-- Please Select --') }}</option>
                            <option value="1" {{ $row->booking_duration == 1 ? 'selected' : '' }}>
                                {{ __('Weekly') }}</option>
                            <option value="2" {{ $row->booking_duration == 2 ? 'selected' : '' }}>
                                {{ __('Monthly') }}</option>
                            {{-- <option value="3" {{ $row->booking_duration == 3 ? 'selected' : '' }}>
                                {{ __('Yearly') }}</option> --}}
                        </select>
                    </div>
                </div>
            </div>--> 
        <!-- </div> -->
        {{-- Add New Filed 15/11/2024 End --}}

        <div class="form-group">
            <label class="control-label"><strong>{{ __('Hoarding Description') }}</strong></label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10"
                    oninput="validateTextarea(this)">{{ $translation->content }}</textarea>
            </div>
        </div>



        <!-- <div class="form-group">
            <label>{{ __('Size By Pexels') }}</label>
            <input type="text" value="{!! clean($translation->sizeByPexel) !!}" placeholder="{{ __('Size By Pexels') }}"
                name="sizeByPexel" class="form-control">
        </div> -->


        <!-- <div class="form-group">
            <label>{{ __('Footfall Daily') }}</label>
            <input type="text" value="{!! clean($translation->footfall) !!}" placeholder="{{ __('Footfall Daily') }}"
                name="footfall" class="form-control">
        </div> -->

        {{-- <div class="form-group">
            <label>{{ __('Size') }}</label>


        <div class="input-group-append">
            <input type="number" value="{!! clean($translation->height) !!}" placeholder="{{ __('Height') }}"
                name="height" class="form-control">
            <input type="number" value="{!! clean($translation->width) !!}" placeholder="{{ __('Width') }}" name="width"
                class="form-control">
        </div>
    </div> --}}




    @if (is_default_lang())
    <div class="form-group">
        <label class="control-label">{{ __('Banner Image') }} (1900*500)</label>
        <div class="form-group-image">
            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id', $row->banner_image_id) !!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">{{ __('Upload Images Into Your Gallery') }}</label>
        {!! \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery', $row->gallery) !!}
    </div>
    @endif
    @if (is_default_lang())
    <div class="form-group">
        <label class="control-label">{{ __('Youtube Video') }}</label>
        <input type="text" name="video" class="form-control" value="{{ $row->video }}"
            placeholder="{{ __('Youtube link video') }}">
    </div>
    @endif
    <!-- <div class="form-group-item">
        <label class="control-label">{{ __('FAQs') }}</label>
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-5">{{ __('Title') }}</div>
                <div class="col-md-5">{{ __('Content') }}</div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            @if (!empty($translation->faqs))
            @php
            if (!is_array($translation->faqs)) {
            $translation->faqs = json_decode($translation->faqs);
            }
            @endphp
            @foreach ($translation->faqs as $key => $faq)
            <div class="item" data-number="{{ $key }}">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="faqs[{{ $key }}][title]" class="form-control"
                            value="{{ $faq['title'] }}" placeholder="{{ __('Eg: When and where does the tour end?') }}">
                    </div>
                    <div class="col-md-6">
                        <textarea name="faqs[{{ $key }}][content]" class="form-control"
                            placeholder="...">{{ $faq['content'] }}</textarea>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="text-right">
            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i>
                {{ __('Add item') }}</span>
        </div>
        <div class="g-more hide">
            <div class="item" data-number="__number__">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" __name__="faqs[__number__][title]" class="form-control"
                            placeholder="{{ __('Eg: Can I bring my pet?') }}">
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
    </div> -->
</div>
</div>
@if (is_default_lang())
<!--<div class="panel">-->
<!--    <div class="panel-title"><strong>{{ __('Extra Info') }}</strong></div>-->
<!--    <div class="panel-body">-->
<!--        <div class="row">-->
<!--            <div class="col-md-4">-->
<!--                <div class="form-group">-->
<!--                    <label>{{ __('No. Bed') }}</label>-->
<!--                    <input type="number" value="{{ $row->bed }}" placeholder="{{ __('Example: 3') }}" name="bed" class="form-control">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4">-->
<!--                <div class="form-group">-->
<!--                    <label>{{ __('No. Bathroom') }}</label>-->
<!--                    <input type="number" value="{{ $row->bathroom }}" placeholder="{{ __('Example: 5') }}" name="bathroom" class="form-control">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4">-->
<!--                <div class="form-group">-->
<!--                    <label>{{ __('Square') }}</label>-->
<!--                    <input type="number" value="{{ $row->square }}" placeholder="{{ __('Example: 100') }}" name="square" class="form-control">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        @if (is_default_lang())
-->
<!--            <div class="row">-->
<!--                <div class="col-lg-6">-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label">{{ __('Minimum advance reservations') }}</label>-->
<!--                        <input type="number" name="min_day_before_booking" class="form-control" value="{{ $row->min_day_before_booking }}" placeholder="{{ __('Ex: 3') }}">-->
<!--                        <i>{{ __('Leave blank if you dont need to use the min day option') }}</i>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6">-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label">{{ __('Minimum day stay requirements') }}</label>-->
<!--                        <input type="number" name="min_day_stays" class="form-control" value="{{ $row->min_day_stays }}" placeholder="{{ __('Ex: 2') }}">-->
<!--                        <i>{{ __('Leave blank if you dont need to set minimum day stay option') }}</i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--
@endif-->
<!--    </div>-->
<!--</div>-->
@endif


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

{{-- Hoarding Size JS to prevent 15/11/2024 Start --}}
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
</script>