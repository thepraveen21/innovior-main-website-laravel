<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:150',
            'service' => 'nullable|string|max:50',
            'message' => 'required|string|max:5000',
        ]);

        Mail::to('innoviorinfo@gmail.com')->send(new ContactMessage($data));

        return back()->with('status', 'Your message has been sent.');
    }
}
