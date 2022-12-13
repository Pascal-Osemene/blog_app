<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Fortify\CreateNewUser;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = (new CreateNewUser)->create($request->all());
        if ($user){
            return response()->json([
                'success' => true,
                'message' => 'User registered successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'failed to create account'
        ], 400);
    }
}
