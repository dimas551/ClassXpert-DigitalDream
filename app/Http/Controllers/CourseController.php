<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Material;
use App\Models\Quiz;
use App\Models\Review;
use App\Models\Submission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Str;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $categoryId = $request->get('category_id');

        $courses = Course::with('category')
            ->published()
            ->byCategory($categoryId)
            ->get();

        return view('app.course.index', compact('courses', 'categories', 'categoryId'));
    }

    public function admin()
    {
        $courses = Course::all();
        $categories = Category::all();

        return view('admin.course.index', compact('courses', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.course.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'level' => 'required|string',
            'language' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video' => 'required|string',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('course', 'public');
        }

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'level' => $request->level,
            'language' => $request->language,
            'thumbnail' => $thumbnailPath,
            'video' => $request->video,
        ]);

        return redirect()->route('admin.course.index')->with('success', 'Course created successfully!');
    }

    public function storeReview(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        $existingReview = Review::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->first();

        if ($existingReview) {
            return redirect()->route('course.show', $slug)
                ->with('error', 'You have already submitted a review for this course.');
        }

        $request->validate([
            'review' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'review' => $request->review,
        ]);

        return redirect()->route('course.show', $slug)
            ->with('success', 'Your review has been posted.');
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)
            ->with(['category', 'materials', 'quizzes', 'reviews'])
            ->withLatestReviews()
            ->firstOrFail();

        $totalReviews = $course->reviews()->count();
        $studentCountText = $course->totalStudents();
        $userReview = $course->reviews()->where('user_id', auth()->id())->first();
        $relatedCourses = Course::getRelatedCourses($slug, $course->category_id);

        $materials = $course->materials;
        $quizzes = $course->quizzes;

        return view('app.course.show', compact(
            'course',
            'relatedCourses',
            'userReview',
            'totalReviews',
            'studentCountText',
            'materials',
            'quizzes'
        ));
    }

    public function showMaterial($slug, $materialId)
    {
        $material = Material::whereHas('course', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->findOrFail($materialId);

        $materials = $material->course->materials;

        $course = $material->course;

        return view('app.material.show', compact('material', 'materials', 'course'));
    }

    public function showQuiz($slug, $quizId)
    {
        $quiz = Quiz::whereHas('course', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->findOrFail($quizId);

        $quiz->question = json_decode($quiz->question, true);

        $submission = Submission::where('user_id', auth()->id())
            ->where('quiz_id', $quiz->id)
            ->first();

        if ($submission) {
            return redirect()->route('quiz.result', ['slug' => $slug, 'quiz' => $quiz->id]);
        }

        $course = $quiz->course;

        return view('app.quiz.show', compact('quiz', 'slug', 'course'));
    }

    public function edit($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $materials = $course->materials;
        $quizzes = $course->quizzes;

        return view('admin.course.edit', compact('course', 'categories', 'materials', 'quizzes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
            'level' => 'required|string',
            'language' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video' => 'required|string',
        ]);

        $course = Course::findOrFail($id);

        $thumbnailPath = $course->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($thumbnailPath) {
                Storage::disk('public')->delete($thumbnailPath);
            }
            $thumbnailPath = $request->file('thumbnail')->store('course', 'public');
        }

        $course->update([
            'title' => $request->title,
            'slug' => $course->slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'level' => $request->level,
            'language' => $request->language,
            'video' => $request->video,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('admin.course.edit', $course->slug)->with('success', 'Course updated successfully!');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.course.index')->with('success', 'Course deleted successfully!');
    }
}
