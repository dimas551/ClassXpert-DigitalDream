<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('course')->get();
        return view('materials.index', compact('materials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'video' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $course = Course::findOrFail($validated['course_id']);

        $material = new Material();
        $material->course_id = $validated['course_id'];
        $material->title = $validated['title'];
        $material->video = $validated['video'];
        $material->content = $validated['content'];
        $material->save();

        return redirect()->route('admin.course.edit', $course->slug)
            ->with('success', 'Material successfully added.');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return response()->json($material);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'video' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $material = Material::findOrFail($id);

        $material->course_id = $validated['course_id'];
        $material->title = $validated['title'];
        $material->video = $validated['video'];
        $material->content = $validated['content'];
        $material->save();

        return redirect()->route('admin.course.edit', $material->course->slug)
            ->with('success', 'Material successfully updated.');
    }

}