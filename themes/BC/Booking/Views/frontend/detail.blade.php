@extends('layouts.app')
@push('css')
    <link href="{{ asset('module/booking/css/checkout.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
@endpush
@section('content')
    <div class="bravo-booking-page padding-content" >
        <div class="container">
            <div class="row booking-success-notice">
                <div class="col-lg-8 col-md-8">
                    <div class="d-flex align-items-center">
                        <img src="{{url('images/ico_success.svg')}}" alt="Payment Success">
                        <div class="notice-success">
                            <p class="line1"><span> Thank you, {{$booking->first_name}},</span>
                                {{__('Your booking has been successfully submitted')}}
                            </p>
                            <p class="line2">{{__('We’ve sent the booking details to')}}   <a href="mailto:{{$booking->email}}">
        <span>{{$booking->email}}</span>
    </a></p>
                            @if($note = $gateway->getOption("payment_note"))
                                <div class="line2">{!! clean($note) !!}</div>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex align-items-center"style="margin-top:10px">
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <!-- <img src="{{url('images/ico_success.svg')}}" alt="Payment Success"> -->
                        <div class="notice-success">
                            <p class="line1"style ="font-size: 20px;">
                            What’s next?
                            </p>
                            <p class="line2"style ="font-size: 14px;">Your request has been routed to the vendor. They will review your booking and contact you directly via phone or email to confirm the details or queries. Please ensure your contact information is active and accessible to avoid delays.
                                We appreciate your trust in our platform and look forward to serving you!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="booking-info-detail">
                        <li><span>{{__('Booking Number')}}:</span> {{$booking->id}}</li>
                        <li><span>{{__('Booking Date')}}:</span> {{display_date($booking->created_at)}}</li>
                        @if(!empty($gateway))
                        <li><span>{{__('Payment Method')}}:</span> {{$gateway->name}}</li>
                        @endif
                        <li><span>{{__('Booking Status')}}:</span> {{ $booking->status_name }}</li>
                    </ul>
                </div>
            </div>
            <div class="row booking-success-detail">
                <div class="col-md-8">
                    @include ($service->booking_customer_info_file ?? 'Booking::frontend/booking/booking-customer-info')
                    <div class="text-center">
                        <a href="{{route('user.booking_history')}}" class="btn btn-primary">{{__('Booking History')}}</a>
                    </div>
                </div>
                <div class="col-md-4">
                    @include ($service->checkout_booking_detail_file ?? '')
                </div>
            </div>
        </div>
    </div>
@endsection
