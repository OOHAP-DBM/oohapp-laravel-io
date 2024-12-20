<!-- <style>
    
    .daterangepicker{
        top: 136px ;
    right: 141px !important;
    left: auto;
    
    }
    
    @media screen and (max-width: 600px)
    {
.bravo_wrap .bravo_form {
    height: 132px !important;
    background: #FFFFFF;
    box-shadow: 0 1px 10px 0 rgba(0, 0, 0, 0.2);
    border-radius: 19px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.daterangepicker {
    top: 111px !important;
    right: auto !important;
    left: 60px !important;
}
}
    
</style> -->

<style>
    .highlight-range .ui-state-default {
            background-color: #FFDD99 !important;
            /* Highlight color */
            color: #000 !important;
            /* Text color */
        }
</style>

{{-- <div class="form-group lllxxx">
    <i class="field-icon icofont-wall-clock gghhh"></i>
    <div class="form-content">
        <div class="form-date-search">
            <div class="date-wrapper">
                <div class="check-in-wrapper">
                    <label>{{ $field['title'] ?? "" }}</label>
<div class="render check-in-render">{{Request::query('start',display_date(strtotime("today")))}}</div>
<span> - </span>
<div class="render check-out-render">{{Request::query('end',display_date(strtotime("+1 day")))}}</div>
</div>
</div>
<input type="hidden" class="check-in-input" value="{{Request::query('start',display_date(strtotime("today")))}}" name="start">
<input type="hidden" class="check-out-input" value="{{Request::query('end',display_date(strtotime("+1 day")))}}" name="end">
<input type="text" class="check-in-out" name="date" value="{{Request::query('date',date("Y-m-d")." - ".date("Y-m-d",strtotime("+1 day")))}}">
</div>
</div>
</div> --}}

<div class="form-group" style="height: 100%;display: flex;align-items: center;">
    <i class="field-icon icofont-wall-clock"></i>
    <div class="form-content">
        <div class="form-date-search" id="dateSearch" onClick="dateClick('month')">
            <div class="date-wrapper">
                <input type="text" class="custom-date-input" name="date">    
                <!-- <div class="check-in-wrapper">
                    <label>{{ $field['title'] ?? "" }}</label>
                    <div class="render check-in-render">{{Request::query('start',display_date(strtotime("today")))}}</div>
                    <span> - </span>
                    <div class="render check-out-render">{{Request::query('end',display_date(strtotime("+1 day")))}}</div>
                </div> -->
            </div>
            <input type="hidden" class="check-in-input home-search-check-in-input" value="{{Request::query('start',display_date(strtotime("today")))}}" name="start">
            <input type="hidden" class="check-out-input home-search-check-out-input" value="{{Request::query('end',display_date(strtotime("+1 day")))}}" name="end">
            <!-- <input type="hidden" class="check-out-input" id="bookingduration" value="month" name="bookingduration">
            <input type="text" class="check-in-out" name="date" value="{{Request::query('date',date("Y-m-d")." - ".date("Y-m-d",strtotime("+1 day")))}}"> -->
        </div>
    </div>
</div>
<!-- <script src="{{asset('libs/daterange/moment.min.js')}}"></script>
<script src="{{asset('libs/daterange/daterangepicker.min.js?_ver='.config('app.asset_version'))}}"></script>
<script src="{{asset('libs/fullcalendar-4.2.0/core/main.js')}}"></script>
<script src="{{asset('libs/fullcalendar-4.2.0/interaction/main.js')}}"></script>
<script src="{{asset('libs/fullcalendar-4.2.0/daygrid/main.js')}}"></script> -->

<script>
    function dateClick(req) {
        getViewModeFromBookingDuration();
        console.log(dateSearch);
    }
</script>


{{-- <div class="form-group">
    <i class="field-icon icofont-wall-clock"></i>
    <div class="form-content">
        <div class="form-date-search">
            <div class="date-wrapper">
                <div class="check-in-wrapper">
                    <label>{{ $field['title'] ?? "" }}</label>
<div class="render check-in-render">{{Request::query('start',display_date(strtotime("today")))}}</div>
<span> - </span>
<div class="render check-out-render">{{Request::query('end',display_date(strtotime("+1 day")))}}</div>
</div>
</div>
<input type="hidden" class="check-in-input" value="{{Request::query('start',display_date(strtotime("today")))}}" name="start">
<input type="hidden" class="check-out-input" value="{{Request::query('end',display_date(strtotime("+1 day")))}}" name="end">
<input type="text" class="check-in-out" name="date" value="{{Request::query('date',date("Y-m-d")." - ".date("Y-m-d",strtotime("+1 day")))}}">
</div>
</div>
</div> --}}