<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'firstName' => 'required',
            'lastName' => 'required',
        ]);
        // Save user data to log file
        Log::channel('user')->info('User created', $validatedData);
          // Create user
        $user = User::create($validatedData);

        // Dispatch event after user creation
        event(new UserCreated($user));

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }
}
