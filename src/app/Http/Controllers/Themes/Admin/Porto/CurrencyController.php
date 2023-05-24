<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function list()
    {
        $currencies = Currency::all();
        return view('currency.list', compact('currencies'));
    }
}
