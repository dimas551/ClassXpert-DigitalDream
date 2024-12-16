<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();
        return view('app.faq.index', compact('faqs'));
    }

    public function admin()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ created successfully!');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return response()->json($faq);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faqs = Faq::findOrFail($id);
        $faqs->update($request->only(['question', 'answer']));
        return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully!');
    }

    public function destroy($id)
    {
        $faqs = Faq::findOrFail($id);
        $faqs->delete();

        return redirect()->route('admin.faq.index')->with('success', 'Faq deleted successfully!');
    }
}
