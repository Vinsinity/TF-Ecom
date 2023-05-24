<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function typeList()
    {
        $payments = PaymentType::all();
        return view('payment.types.list',compact('payments'));
    }

    public function typeShow($slug)
    {
        $payment = PaymentType::whereSlug($slug)->first();
        return view('payment.types.show',compact('payment'));
    }

    public function methodList($slug)
    {
        $payment = PaymentType::whereSlug($slug)->with('methods')->first();
        return view('payment.method.credit-card',compact('payment'));
    }
}
