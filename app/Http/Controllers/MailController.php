<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function admin()
    {
        $mails = Mail::orderBy('created_at', 'desc')->get();

        return view('admin.mail.index', compact('mails'));
    }

    public function show($id)
    {
        $mail = Mail::findOrFail($id);
        return response()->json($mail);
    }

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

    public function destroy($id)
    {
        $mail = Mail::findOrFail($id);

        $mail->delete();

        return redirect()->route('admin.mail.index')->with('success', 'Mail deleted successfully!');
    }
}
