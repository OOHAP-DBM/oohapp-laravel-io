{{-- @php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
@endphp
@if(!empty($terms_ids) and !empty($attributes))
    @foreach($attributes as $attribute )
        @php $translate_attribute = $attribute['parent']->translate() @endphp
        @if(empty($attribute['parent']['hide_in_single']))
            <div class="g-attributes {{$attribute['parent']->slug}} attr-{{$attribute['parent']->id}}">
                <h3>{{ $translate_attribute->name }}</h3>
                @php $terms = $attribute['child'] @endphp
                <div class="list-attributes">
                    @foreach($terms as $term )
                        @php $translate_term = $term->translate() @endphp
                        <div class="item {{$term->slug}} term-{{$term->id}}">
                            @if(!empty($term->image_id))
                                @php $image_url = get_file_url($term->image_id, 'full'); @endphp
                                <img src="{{$image_url}}" class="img-responsive" alt="{{$translate_term->name}}">
                            @else
                                <i class="{{ $term->icon ?? "icofont-check-circled icon-default" }}"></i>
                            @endif
                            {{$translate_term->name}}</div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif --}}
@php
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
@endphp
<h3 style="font-size: 1.5rem;"> Hoarding Attributes </h3>
@if(!empty($terms_ids) and !empty($attributes))
    {{-- Display attributes with types_of_attribute = 0 in grid view --}}
    @if(!empty($grouped_attributes[0]))
        <div class="grid-view">
            @foreach($grouped_attributes[0] as $attribute)
                @php $translate_attribute = $attribute['parent']->translate() @endphp
                @if(empty($attribute['parent']['hide_in_single']))
                    <div class="g-attributes {{$attribute['parent']->slug}} attr-{{$attribute['parent']->id}}"style="margin-right: 100px !important;margin-left: 0px !important;">
                        <h3 style="font-size: 14px;color: #1A2B48;">{{ $translate_attribute->name }}</h3>
                        @php $terms = $attribute['child'] @endphp
                        <div class="list-attributes grid-layout">
                            @foreach($terms as $term)
                                @php $translate_term = $term->translate() @endphp
                                <div class="item {{$term->slug}} term-{{$term->id}}"style="font-size: 14px;color: #5E6D77;">
                                    @if(!empty($term->image_id))
                                        @php $image_url = get_file_url($term->image_id, 'full'); @endphp
                                        <img src="{{$image_url}}" class="img-responsive" alt="{{$translate_term->name}}">
                                    @else
                                        <i class="{{ $term->icon ?? "icofont-check-circled icon-default" }}"></i>
                                    @endif
                                    {{$translate_term->name}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

   
    @if(!empty($grouped_attributes[1]))
        @foreach($grouped_attributes[1] as $attribute)
            @php $translate_attribute = $attribute['parent']->translate() @endphp
            @if(empty($attribute['parent']['hide_in_single']))
                <div class="g-attributes {{$attribute['parent']->slug}} attr-{{$attribute['parent']->id}}"style="margin-right: 100px !important;margin-left: 0px !important;">
                    <h3 style="font-size: 14px;color: #1A2B48;">{{ $translate_attribute->name }}</h3>
                    @php $terms = $attribute['child'] @endphp
                    <div class="list-attributes">
                        @foreach($terms as $term)
                            @php $translate_term = $term->translate() @endphp
                            <div class="item {{$term->slug}} term-{{$term->id}}" style="font-size: 14px;color: #5E6D77;">
                                @if(!empty($term->image_id))
                                    @php $image_url = get_file_url($term->image_id, 'full'); @endphp
                                    <img src="{{$image_url}}" class="img-responsive" alt="{{$translate_term->name}}">
                                @else
                                    <i class="{{ $term->icon ?? "icofont-check-circled icon-default" }}"></i>
                                @endif
                                {{$translate_term->name}}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    @endif
@endif
<style>
.grid-layout {
    display: grid;
    grid-template-columns: repeat(3, 1fr); 
    gap: 20px; 
} 


</style>

