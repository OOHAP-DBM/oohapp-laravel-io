{{--@if($row->map_lat && $row->map_lng)
<div class="g-location" style="width: 164%;
    margin-left: -15%;
    margin-top: -20px;">
    
    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
@endif --}}

<div class="g-header">
    <div class="left">
        <h1>{{$translation->title}}</h1>
        @if($translation->address)
            <p class="address"><i class="fa fa-map-marker"></i>
                {{$translation->address}}
            </p>
        @endif
    </div>
    <div class="right">
        @if($row->getReviewEnable())
            @if($review_score)
                <div class="review-score">
                    <div class="head">
                        <div class="left">
                            <span class="head-rating">{{$review_score['score_text']}}</span>
                            <span class="text-rating">{{__("from :number reviews",['number'=>$review_score['total_review']])}}</span>
                        </div>
                        <div class="score">
                            {{$review_score['score_total']}}<span>/5</span>
                        </div>
                    </div>
                    <div class="foot">
                     
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
<div class="g-space-feature">
    <div class="row">
        @if(!empty($row->bed))
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-hotel"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("No. Bed")}}</h4>
                        <p class="value">
                            {{$row->bed}}
                        </p>
                    </div>
                </div>
            </div>
        @endif
       {{-- @if($row->hoarding_type)
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                    <i class="icofont-flag"></i>
                   
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("Hoarding Type")}}</h4>
                        <p class="value">
                        @if($row->hoarding_type == 1)
                             {{ __('OOH') }}
                        @elseif($row->hoarding_type == 2)
                             {{ __('DOOH') }}
                        @endif
                        </p>
                    </div>
                </div>
            </div>
        @endif --}}
        @if($row->hoarding_type)
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon"style="margin-right: 0px !important;">
                    @if($row->hoarding_type == 1)
                    <i class="">@include('Space::frontend.layouts.details.svg.ooh')</i>
@else
<i class="">
<i class="">@include('Space::frontend.layouts.details.svg.dooh')</i></i>
                    @endif
                    <!-- <i class="icofont-barricade"></i> -->
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("Hoarding Type")}}</h4>
                        <p class="value">
                        @if($row->hoarding_type == 1)
                             {{ __('OOH') }}
                        @elseif($row->hoarding_type == 2)
                             {{ __('DOOH') }}
                        @endif
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if($row->category_id)
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                <div class="icon" style=" margin-right: 0px !important;">
                             <i class="">@include('Space::frontend.layouts.details.svg.category')</i>
                    </div>
                    <div class="info">
                    <h4 class="name">
                    {{__("Category")}}
                    </h4>
                        <p class="value">
                        @php
                        $category = Modules\Space\Models\SpaceCategory::find($row->category_id);
                    @endphp
                   
                    @if($category)
                        {{ str_repeat('—', $category->depth) }} 
                        {{ $category->name }} 
                    @else
                        {{ __('Unknown Category') }}
                    @endif
                        </p>
                    </div>
                </div>
            </div>
        @endif
            @if($row->size_preview)
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon" style="margin-right: 5px !important;">
                        <i class="">@include('Space::frontend.layouts.details.svg.size')</i>
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("Size (sq.ft)")}}</h4>
                        <p class="value">
                    <?php $y= $row->width * $row->height?>
                        {{($y) }}
                        ({{($row->width) }}x{{($row->height) }})
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($row->location->name))
                @php $location =  $row->location->translate() @endphp
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon"   style="margin-right: 0px !important;">
                         <i class="">@include('Space::frontend.layouts.details.svg.location')</i>
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("Location")}}</h4>
                        <p class="value">
                            {{$location->name ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@if($row->getGallery())
    <div class="g-gallery">
        <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
            @foreach($row->getGallery() as $key=>$item)
                <a href="{{$item['large']}}" data-thumb="{{$item['thumb']}}" data-alt="{{ __("Gallery") }}"></a>
            @endforeach
        </div>
        <div class="social">
            <div class="social-share">
                <span class="social-icon">
                    <i class="icofont-share"></i>
                </span>
                <ul class="share-wrapper">
                    <li>
                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">
                            <i class="fa fa-facebook fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
                            <i class="fa fa-twitter fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                <i class="fa fa-heart-o"></i>
            </div>
        </div>
    </div>
@endif
@if($translation->content)
    <div class="g-overview">
        <h3>{{__("Description")}}</h3>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
@endif



@if($translation->facing)
    <div class="g-overview">
        <h3>{{__("Facing")}}</h3>
        <div class="description">
            <?php echo $translation->facing ?>
        </div>
    </div>
@endif
@include('Space::frontend.layouts.details.space-attributes')
@includeIf("Hotel::frontend.layouts.details.hotel-surrounding")
@if($row->map_lat && $row->map_lng)
<div class="g-location">
    <h3>{{__("Location")}}</h3>
    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
@endif
@if($translation->faqs)
<div class="g-faq">
    <h3> {{__("FAQs")}} </h3>
    @foreach($translation->faqs as $item)
        <div class="item">
            <div class="header">
                <i class="field-icon icofont-support-faq"></i>
                <h5>{{$item['title']}}</h5>
                <span class="arrow"><i class="fa fa-angle-down"></i></span>
            </div>
            <div class="body">
                {{$item['content']}}
            </div>
        </div>
    @endforeach
</div>
@endif

