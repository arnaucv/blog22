<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updatePassword(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'password' => 'required|max:255',
        ]);

        /*
        $data = $request->only(['password']);
        $data['password'] = Hash::make($data['password']);
        */

        $user->update(['password'=>Hash::make($validatedData['password'])]);

        return redirect('/editProfile')->with('success', 'The password is successfully updated');
    }

    public function index()
    {
        $user=Auth::user();

        return view('editProfile', ['user'=>$user]);
    }
}
