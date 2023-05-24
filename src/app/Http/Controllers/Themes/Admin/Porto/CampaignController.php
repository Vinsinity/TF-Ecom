<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Campaign\Code\StoreRequest;
use App\Models\DiscountCode;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function product()
    {
        return view('campaigns.product.list');
    }

    public function cart()
    {
        return view('campaigns.campaign.cart');
    }

    public function category()
    {
        return view('campaigns.campaign.category');
    }

    public function brand()
    {
        return view('campaigns.campaign.brand');
    }

    public function code()
    {
        $discountCodes = DiscountCode::all();
        return view('campaigns.code.list', compact('discountCodes'));
    }

    public function codeAdd()
    {
        return view('campaigns.code.add');
    }

    public function codeAddPost(StoreRequest $request)
    {
        DiscountCode::create($request->validated());
        return redirect()->route('admin.campaigns.code.list')->with('success','Success');
    }

    public function cargo()
    {
        return view('campaigns.cargo');
    }
}
