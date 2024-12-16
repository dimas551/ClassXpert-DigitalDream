<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $contact = Website::first();

        return view('app.contact.index', compact('contact'));
    }

    public function admin()
    {
        $contact = Website::first();
        return view('admin.website.index', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Website::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'phone_number' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'social_media' => 'nullable|string|max:255',
        ]);

        $contact = Website::findOrFail($id);

        $contact->update($request->only('phone_number', 'email', 'social_media'));

        return redirect()->route('admin.website.index')->with('success', 'Contact updated successfully!');
    }
}
