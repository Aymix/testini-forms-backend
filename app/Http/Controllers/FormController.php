<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
    public function store(Request $request)
    {
        // Manual validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'app_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            // Return a JSON response with validation errors
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Create a new record in the database with validated data
        FormData::create($validator->validated());

        // Return a success response
        return response()->json(['message' => 'Form submitted successfully']);
    }
}