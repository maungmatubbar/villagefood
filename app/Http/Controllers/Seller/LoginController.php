<?php

namespace App\Http\Controllers\Seller;

use App\Enum\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    //

    public function login()
    {
        return view('seller.pages.auth.login');
    }

    public function loginStore(Request $request)
    {

       $request->validate([
           'email' => ['required', 'string', 'email'],
           'password' => ['required', 'string'],
       ]);
       $user = User::where('email',$request->email)->firstOrFail();
        if (password_verify($request->password, $user->password) && $user->user_type === UserTypeEnum::SELLER) {
            Auth::login($user);
            return redirect()->route('seller.dashboard');
        }
        else
        {

            return redirect()->back()->withInput($request->only('email','remember'))->withErrors(['email' => 'These credentials do not match our records.']);
        }


    }
    public function register()
    {
        return view('seller.pages.auth.register');
    }
    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'nid_number' => 'required',
            'phone_number' => 'required|max:11',
            'district' => 'required',
            'postal_code' => 'required|numeric',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'user_type' => UserTypeEnum::SELLER,
            'is_approved_seller' => 0
        ]);
        $address = new UserAddress();
        $address->user_id = $user->id;
        $address->nid_number = $request->nid_number;
        $address->district = $request->district;
        $address->sub_district = $request->sub_district;
        $address->postal_code = $request->postal_code;
        $address->address = $request->address;
        $address->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('seller.dashboard', absolute: false));


    }
}
