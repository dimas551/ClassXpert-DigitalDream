<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contact-name' => 'required|string|max:255',
            'contact-phone' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'contact-message' => 'required|string',
        ]);

        Mail::create([
            'name' => $request->input('contact-name'),
            'email' => $request->input('contact-phone'),
            'subject' => $request->input('subject'),
            'message' => $request->input('contact-message'),
        ]);

        return redirect()->route('contact.index')
            ->with('success', 'Mail sent successfully!');
    }
}