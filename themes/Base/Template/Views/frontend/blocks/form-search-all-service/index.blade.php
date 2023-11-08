 <br>
 <div class="">

@if(in_array($style,['carousel','']))

 @include("Template::frontend.blocks.form-search-all-service.style-normal")
 
 
@endif 
    
    
                                @if(!empty($service_types))
                                    @php $number = 0; @endphp
                                    @foreach ($service_types as $service_type)
                                        @php
                                            $allServices = get_bookable_services();
                                            if(empty($allServices[$service_type])) continue;
                                            $module = new $allServices[$service_type];
                                        @endphp
                                        
                                       @include("Template::frontend.blocks.form-search-all-service.slider")
                                       
                                        @php $number++; @endphp
                                    @endforeach
                                @endif
                           
                        




@if($style == "carousel_v2")

    @include("Template::frontend.blocks.form-search-all-service.style-slider-ver2")

@endif
</div>  


 