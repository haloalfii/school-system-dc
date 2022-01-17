<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login-register.register', [
            'class' => SchoolClass::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'number_id' => 'required|max:255|unique:users',
            'email' => 'required|unique:users',
            'school_class' => 'max:255',
            'password' => 'required',
            'role' => 'required',
            'image' => 'image|file|max:4096',
        ]);

        if (preg_match("/T/i", $validatedData['number_id'])) {
            $validatedData['role'] = 'Teacher';
        }

        $img_path = "";
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('upload/profile-pic/', $image_name);

            $img_path = 'upload/profile-pic/' . $image_name;
        }

        $validatedData['image'] = $img_path;
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration Success, Please Login!');
    }
}
