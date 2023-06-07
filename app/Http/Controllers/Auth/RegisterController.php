<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create($request->validated());
            $role = Role::find(2);
            $user->assignRole($role);
            return redirect()->route('login')->with('success', 'User created successfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
