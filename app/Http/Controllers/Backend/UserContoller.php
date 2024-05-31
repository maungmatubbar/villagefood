<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    //

    public function index()
    {
        $users = User::all();
        return
            view('backend.pages.user.index',compact('users'));
    }

    public function approved($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved_seller = 1;
        $user->save();
        return redirect()->route('user.index')->with('success', 'User approved successfully.');
    }
}
