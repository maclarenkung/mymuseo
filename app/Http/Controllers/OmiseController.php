<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OmiseCharge;



class OmiseController extends Controller
{
    public function payment(Request $request)
    {

        define('OMISE_PUBLIC_KEY', 'pkey_test_5j56cn0fsfxgsekw6s0');
        define('OMISE_SECRET_KEY', 'skey_test_5j56cn0frbf7hptkhuk');
        $charge = OmiseCharge::create([
            "amount" => $request->amount,
            "currency" => "thb",
            "card" => $request->token
        ]);


        return "success";
    }
}