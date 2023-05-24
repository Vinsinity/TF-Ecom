<?php

namespace App\Http\Controllers\Themes\Frontend\Molla;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Account\Address\StoreRequest;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = User::where('id',Auth::id())->with('addresses')->first();
        return view('account.index', compact('user'));
    }

    public function addresses()
    {
        $user = User::whereId(Auth::id())->with('addresses')->first();
        return view('account.addresses.list',compact('user'));
    }

    public function addressAdd()
    {
        return view('account.addresses.add');
    }

    public function addressAddPost(StoreRequest $request)
    {
        $address = $request->validated();
        $user = User::whereId(Auth::id())->first();
        $address['user_id'] = $user->id;
        UserAddress::create($address);
        return redirect()->route('account.addresses.list')->with('success','Success');
    }

    public function orders()
    {
        $user = User::whereId(Auth::id())
            ->with(['orders' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }, 'orders.orderStatus'])
            ->first();
        return view('account.orders.index',compact('user'));
    }

    public function orderDetail()
    {

    }
}
