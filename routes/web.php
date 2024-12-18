<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

//Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile/{username}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Course Routes
Route::get('/course', [CourseController::class, 'index'])->name('courses.index');
Route::middleware('auth')->group(function () {
    Route::post('/course/{slug}/review', [CourseController::class, 'storeReview'])->name('course.storeReview');
    Route::get('/course/{slug}', [CourseController::class, 'show'])->name('course.show');
    Route::get('/course/{slug}/material/{material}', [CourseController::class, 'showMaterial'])->name('materials.show');

    Route::get('/course/{slug}/quiz/{quiz}', [CourseController::class, 'showQuiz'])->name('quiz.show');
    Route::post('/course/{slug}/quiz/submit/{quiz}', [QuizzesController::class, 'submitQuiz'])->name('quiz.submit');
    Route::get('/course/{slug}/quiz/result/{quiz}', [QuizzesController::class, 'result'])->name('quiz.result');
});

//Article
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('article.show');

//Faq
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

//Contact
Route::get('/contact', [WebsiteController::class, 'index'])->name('contact.index');
Route::post('/mail', [MailController::class, 'store'])->name('mail.store');

// Admin
Route::middleware(['auth', 'auth.admin'])->group(function () {

    // Course
    Route::get('/admin/course', [CourseController::class, 'admin'])->name('admin.course.index');
    Route::post('/admin/course', [CourseController::class, 'store'])->name('course.store');
    Route::get('/admin/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::get('/admin/course/edit/{slug}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::put('/admin/course/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/admin/course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');

    Route::post('/admin/material', [MaterialController::class, 'store'])->name('material.store');
    Route::get('/admin/material/{slug}/get', [MaterialController::class, 'edit'])->name('material.edit');
    Route::put('/admin/material/{id}', [MaterialController::class, 'update'])->name('material.update');
    Route::delete('/admin/material/{id}', [MaterialController::class, 'destroy'])->name('material.destroy');

    Route::post('/admin/quiz', [QuizzesController::class, 'store'])->name('quiz.store');
    Route::get('/admin/quiz/{slug}/get', [QuizzesController::class, 'edit'])->name('quiz.edit');
    Route::put('/admin/quiz/{id}', [QuizzesController::class, 'update'])->name('quiz.update');

    // Article
    Route::get('/admin/article', [ArticleController::class, 'admin'])->name('admin.article.index');
    Route::post('/admin/article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/admin/article/{slug}/get', [ArticleController::class, 'edit'])->name('article.edit');
    Route::get('/admin/article/create', [ArticleController::class, 'create'])->name('admin.article.create');
    Route::put('/admin/article/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/admin/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');

    // Faq
    Route::get('/admin/faq', [FaqController::class, 'admin'])->name('admin.faq.index');
    Route::post('/admin/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/admin/faq/{id}/get', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/admin/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/admin/faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');

    // Website
    Route::get('/admin/website', [WebsiteController::class, 'admin'])->name('admin.website.index');
    Route::put('/admin/website/{id}', [WebsiteController::class, 'update'])->name('website.update');

    // User
    Route::get('/admin/user', [UserController::class, 'admin'])->name('admin.user.index');
    Route::post('/admin/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/admin/user/{id}/get', [UserController::class, 'show'])->name('user.show');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Admin
    Route::get('/admin/admin', [AdminController::class, 'admin'])->name('admin.admin.index');
    Route::post('/admin/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/admin/{id}/get', [AdminController::class, 'show'])->name('admin.show');
    Route::put('/admin/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Mail
    Route::get('/admin/mail', [MailController::class, 'admin'])->name('admin.mail.index');
    Route::post('/admin/mail', [MailController::class, 'store'])->name('mail.store');
    Route::get('/admin/mail/{id}/get', [MailController::class, 'show'])->name('mail.show');
    Route::delete('/admin//mail/{id}', [MailController::class, 'destroy'])->name('mail.destroy');

});

require __DIR__ . '/auth.php';
