<?php

namespace App\Http\Controllers\Frontend;

use App\Enum\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function login(){
        return view('frontend.pages.customer.login');
    }
    public function storeLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user  = User::where('email',$request->email)->first();

        if($user->user_type !== UserTypeEnum::CUSTOMER){
            notyf()->warning('Your are not a customer!.');
            return redirect()->route('home');
        }
        if (isset($user) && password_verify($request->password, $user->password)) {
            Auth::login($user);
            notyf()->success('Your logged in successfully!.');
            return redirect()->intended('/cart');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(){
        return view('frontend.pages.customer.register');
    }

    public function storeAccount(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:users,email',
            'phone_number'=> 'required|unique:users,phone_number|numeric',
           /* 'address'=> 'required',
            'district'=> 'required',
            'postal_code'=> 'required',*/
            'password'=> 'required|min:8',
            'confirm_password'=> 'required|min:8|same:password',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'user_type' => UserTypeEnum::CUSTOMER
        ]);
        notyf()->success('Your account has been created successfully!.');
        return redirect()->route('customer.login');
       /* $address = new UserAddress();
        $address->user_id = $user->id;
        $address->district = $request->district;
        $address->postal_code = $request->postal_code;
        $address->address = $request->address;*/
    }

    public function logout(Request $request)
    {

        Auth::logout();
        return redirect()->route('home');
    }
}
