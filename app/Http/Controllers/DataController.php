<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
    {
        public function publicData()
        {
            return response()->json(['message' => 'This data is public and accessible without a token'], 200);
        }

        public function privateData()
        {
            if (Auth::check()) {
                return response()->json(['message' => 'Sucessfully show private data with valid token '], 200);
            } else {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
        }
    }
