<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function ok($data = []): JsonResponse
    {
        return response()->json($data, 200);
    }

    protected function bad_request($message): JsonResponse
    {
        return response()->json(['message' => $message], 400);
    }

    protected function error($message): JsonResponse
    {
        return response()->json(['message' => $message], 500);
    }
    protected function not_found($message): JsonResponse
    {
        
        return response()->json(['message' => $message], 404);
    }
}
