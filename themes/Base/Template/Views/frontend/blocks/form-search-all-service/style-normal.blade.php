 @if(!empty($style) and $style == "carousel" and !empty($list_slider))
            <div class="effect">
                <div class="owl-carousel">
                    @foreach($list_slider as $item)
                        @php

                         $img = get_file_url($item['bg_image'],'full') 

                        @endphp
                        <div class="item">
                            <div class="item-bg" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{$img}}') !important"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif   
        
        
        
                           
                           
                         <div class="tab-content">
                                @if(!empty($service_types))
                                    @php $number = 0; @endphp
                                    @foreach ($service_types as $service_type)
                                        @php
                                            $allServices = get_bookable_services();
                                            if(empty($allServices[$service_type])) continue;
                                            $module = new $allServices[$service_type];
                                        @endphp
                                        <div role="tabpanel" class="tab-pane @if($number == 0) active @endif" id="bravo_{{$service_type}}" >
    
                                            @include(ucfirst($service_type).'::frontend.layouts.search.form-search')
                                             
                                            
                                        </div>
                                        @php $number++; @endphp
                                    @endforeach
                                @endif
                            </div>
                            
                             <center><a href="{{asset('/hoarding?_layout=map')}}" class="loginx btn btn-light" >{{__('Show Map')}} <img style="height:20px;width:20px;" src="{{asset('images/MapViewIcon.png')}}"></a></center>
