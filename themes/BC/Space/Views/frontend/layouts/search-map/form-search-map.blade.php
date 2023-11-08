<form action="{{url( app_get_locale(false,false,'/').config('space.space_route_prefix') )}}" class="form bravo_form d-flex justify-content-start" method="get" onsubmit="return false;">
    @php $space_map_search_fields = setting_item_array('space_map_search_fields');

    $space_map_search_fields = array_values(\Illuminate\Support\Arr::sort($space_map_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));

    @endphp
    @if(!empty($space_map_search_fields))
        @foreach($space_map_search_fields as $field)
            @switch($field['field'])
                @case ('location')
                    @include('Space::frontend.layouts.search-map.fields.location')
                @break
                @case ('attr')
                    @include('Space::frontend.layouts.search-map.fields.attr')
                @break
                @case ('date')
                    @include('Space::frontend.layouts.search-map.fields.date')
                @break
                @case ('price')
                    @include('Space::frontend.layouts.search-map.fields.price')
                @break
                @case ('advance')
                    <div class="filter-item filter-simple">
                        <div class="form-group">
                            <span class="filter-title toggle-advance-filter" data-target="#advance_filters">{{__('More filters')}} <i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>
                @break

            @endswitch
        @endforeach
    @endif



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

<center><a href="https://oohapp.io" class="loginx btn btn-light" style="">show list	<img style="height:20px;width:20px;" src="{{asset('images/Listed.png')}}"></a></center>
