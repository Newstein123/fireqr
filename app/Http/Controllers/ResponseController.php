<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function successMessage($data, $message)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'success' => true,
        ]);
    }

    public function errorMessage()
    {
        return response()->json([
            'message' => 'Something Wrong',
            'success' => false,
        ]);
    }
}
