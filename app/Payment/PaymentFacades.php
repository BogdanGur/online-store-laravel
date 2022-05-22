<?php

namespace App\Payment;

use Illuminate\Support\Facades\Facade;

class PaymentFacades extends Facade {
    public static function getFacadeAccessor()
    {
        return "payment";
    }
}
