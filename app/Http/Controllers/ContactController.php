<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function send(Request $request)
    {
       
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        // Create a new contact record in the database
        Contact::create($validated);

        return response()->json(['message' => 'Contact form submitted successfully.']);
    }
}
