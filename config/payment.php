<?php
return [
    'gateways'=>[
        'offline_payment'=>Modules\Booking\Gateways\OfflinePaymentGateway::class,
        'paypal'=>Modules\Booking\Gateways\PaypalGateway::class,
        'stripe'=>Modules\Booking\Gateways\StripeGateway::class,
        'razorpay'=>Modules\Booking\Gateways\PayrexxGateway::class,
    ],
];
