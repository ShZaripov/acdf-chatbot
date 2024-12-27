<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SiteController;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['uz', 'ru'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('set-locale');

// Route::get('language/{locale}', function ($locale) {
//     App::setLocale($locale);
//     return redirect()->back();
// })->name('locale');

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/question/get', [QuestionController::class, 'getQuestion'])->name('question.get');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Dashboard
        Route::get('/', function () {
            $questionsCount = Question::count();
            $answersCount   = Answer::count();

            return view('admin.index', compact('questionsCount', 'answersCount'));
        })->name('admin.index');

        // Questions
        Route::resource('questions', QuestionController::class);

        // Answers
        Route::resource('answers', AnswerController::class);
    });
});

require __DIR__ . '/auth.php';
