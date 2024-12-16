<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\Submission;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    public function index()
    {
        $quizz = Quiz::with('course')->get();
        return view('quiz.index', compact('quizz'));
    }

    public function show($id)
    {
        $quiz = Quiz::with(['material.course'])->findOrFail($id);

        return view('quiz.show', compact('quiz'));
    }

    public function submitQuiz(Request $request, $slug, $quizId)
    {
        $quiz = Quiz::whereHas('course', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->findOrFail($quizId);

        $questions = json_decode($quiz->question, true);
        $score = 0;
        $userAnswers = [];

        foreach ($questions as $index => $question) {
            $correctAnswer = $question['answer'];
            $userAnswer = $request->input('question_' . $index);
            $userAnswers[] = $userAnswer;

            if ($userAnswer == $correctAnswer) {
                $score += 100;
            }
        }

        Submission::create([
            'user_id' => auth()->id(),
            'quiz_id' => $quiz->id,
            'score' => $score,
            'answers' => json_encode($userAnswers),
        ]);

        return view('app.quiz.result', compact('quiz', 'score', 'userAnswers'));
    }

    public function result($slug, $quizId)
    {
        $quiz = Quiz::whereHas('course', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->findOrFail($quizId);

        $submission = Submission::where('user_id', auth()->id())
            ->where('quiz_id', $quiz->id)
            ->first();

        if (!$submission) {
            return redirect()->route('quiz.show', ['slug' => $slug, 'quiz' => $quizId]);
        }

        $userAnswers = json_decode($submission->answers, true);

        $score = $submission->score;

        return view('app.quiz.result', compact('quiz', 'score', 'userAnswers'));
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'questions' => 'required|array|min:1|max:5',  // Pastikan ada soal
        'questions.*.question' => 'required|string|max:255',  // Soal harus ada
        'questions.*.options' => 'required|array|min:2|max:6',  // Opsi harus ada
        'questions.*.options.*' => 'required|string|max:255',  // Setiap opsi harus string
        'questions.*.answer' => 'required|string|max:255',  // Jawaban harus ada
    ]);

    // Menyusun array soal dalam format yang benar
    $questions = array_map(function ($question) {
        return [
            'question' => $question['question'],
            'options' => $question['options'],
            'answer' => $question['answer'],
        ];
    }, $request->questions);

    // Menyimpan quiz dalam tabel
    $quiz = new Quiz();
    $quiz->title = $request->title;
    $quiz->question = json_encode($questions);  // Menyimpan soal dalam format JSON
    $quiz->save();

    // Redirect dengan pesan sukses
    return redirect()->route('quiz.index')->with('success', 'Quiz created successfully!');
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'questions' => 'required|array|min:1|max:5',
        'questions.*.question' => 'required|string|max:255',
        'questions.*.options' => 'required|array|min:2|max:6',
        'questions.*.options.*' => 'required|string|max:255',
        'questions.*.answer' => 'required|string|max:255',
    ]);

    // Temukan quiz berdasarkan ID
    $quiz = Quiz::findOrFail($id);
    $quiz->title = $request->title;

    // Menyusun array soal dalam format yang benar
    $questions = array_map(function ($question) {
        return [
            'question' => $question['question'],
            'options' => $question['options'],
            'answer' => $question['answer'],
        ];
    }, $request->questions);

    $quiz->question = json_encode($questions);  // Update soal dalam format JSON
    $quiz->save();

    // Redirect dengan pesan sukses
    return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully!');
}


}
