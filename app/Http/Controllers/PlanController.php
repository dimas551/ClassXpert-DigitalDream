<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $subscribes = Plan::all();

        foreach ($subscribes as $subscribe) {
            $subscribe->pricing_features = is_array($subscribe->pricing_features)
                ? $subscribe->pricing_features
                : json_decode($subscribe->pricing_features, true);
        }

        return view('app.subscribe.index', compact('subscribes'));
    }

    public function admin()
    {
        $subscribes = Plan::all();
        return view('admin.subscribe.index', compact('subscribes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ], [
            'name.required' => 'The subscription name is required.',
            'name.string' => 'The subscription name must be a valid string.',
            'name.max' => 'The subscription name may not exceed 255 characters.',
            'price.required' => 'The price of the subscription is required.',
            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price must be at least 0.',
            'duration.required' => 'The subscription duration is required.',
            'duration.integer' => 'The duration must be an integer.',
            'duration.min' => 'The duration must be at least 1 day.',
        ]);

        Plan::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);

        return redirect()->route('subscribe.index')->with('success', 'Subscription updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}