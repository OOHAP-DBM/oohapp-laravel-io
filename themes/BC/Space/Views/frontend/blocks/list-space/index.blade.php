

<style>
   .hellotop
   {
       margin-top:-41px;
       
       
   }
   @media screen and (max-width:600px)
   {
      
        .hellotop
   {
       margin-top:-51px;
       
       
   } 
       
   }
    
</style>



<div class="container hellotop" >
    <div class="bravo-list-space layout_{{$style_list}}">
        @if($title)
        <div class="title">
            {{$title}}
        </div>
        @endif
        @if($desc)
            <div class="sub-title">
                {{$desc}}
            </div>
        @endif
        <div class="list-item">
            @if($style_list === "normal")
                <div class="row">
                    @foreach($rows as $row)
                        <div class="col-lg-{{$col ?? 4}} col-md-6">
                            @include('Space::frontend.layouts.search.loop-grid')
                        </div>
                    @endforeach
                </div>
            @endif
            @if($style_list === "carousel")
                <div class="owl-carousel">
                    @foreach($rows as $row)
                        @include('Space::frontend.layouts.search.loop-grid')
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>