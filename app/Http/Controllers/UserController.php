<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function dashboard()
    {
        return view('pages.index');
    }

    public function register(UserRequest $request)
    {
        try {
            $data = $request->validated();

            // Image upload
            $fileNameWithExtension = $request->file('avatar')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

            $extension =  $request->file('avatar')->getClientOriginalExtension();

            $fileNametoStore = $fileName . '_' . time() . '.' . $extension;

            $request->file('avatar')->storeAs('public/profile_images', $fileNametoStore);

            $filePath = public_path('storage/profile_images/' . $fileNametoStore);

            \Tinify\setKey("FRmXrHm89DtsfT1zYvFvmcPKvQwtVFhy");
            $source = \Tinify\fromFile($filePath);
            $source->toFile($filePath);

            $data['avatar'] = $fileName;
            $data['password'] = Hash::make($request->input('password'));

            User::create($data);

            return redirect()->route('login');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function logout()
    {
    }
}
