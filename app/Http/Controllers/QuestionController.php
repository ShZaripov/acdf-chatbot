<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetQuestionRequest;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();

        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionStoreRequest $request)
    {
        // Initialize an array to store the image paths
        $images = [
            'uz' => [],
            'ru' => [],
        ];
        // Store new images
        foreach ($request->file('images_uz') as $file) {
            $filename       = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path           = $file->storeAs('public/images/question/uz', $filename);
            $images['uz'][] = Storage::url($path); // Save the public path
        }

        foreach ($request->file('images_ru') as $file) {
            $filename       = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path           = $file->storeAs('public/images/question/ru', $filename);
            $images['ru'][] = Storage::url($path); // Save the public path
        }

        // Save the question to the database
        Question::create([
            'question_uz' => $request->input('question_uz'),
            'question_ru' => $request->input('question_ru'),
            'images'      => $images, // Save as JSON
        ]);

        return redirect()->route('questions.index')->with('success', 'Savol muvafaqqiyatli qo\'shildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateRequest $request, Question $question)
    {
        if (!$request->has('images_uz') && !$request->has('images_ru')) {
            $question->question_uz = $request->input('question_uz');
            $question->question_ru = $request->input('question_ru');
            $question->save();
        } else {
            // Initialize an array to store the image paths
            $images = $this->initializeAnArrayToStoreTheImagePaths($request, $question);

            // Save the question to the database
            $question->update([
                'question_uz' => $request->input('question_uz'),
                'question_ru' => $request->input('question_ru'),
                'images'      => $images, // Save as JSON
            ]);
        }

        return redirect()->route('questions.index')->with('success', 'Savol muvafaqqiyatli o\'zgartirildi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $this->deleteImages($question, ['uz', 'ru']);
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Savol muvaffaqiyatli o\'chirildi!');
    }

    /**
     * @param \App\Http\Requests\QuestionUpdateRequest $request
     * @param \App\Models\Question $question
     * @return array|array[]
     */
    public function initializeAnArrayToStoreTheImagePaths(QuestionUpdateRequest $request, Question $question): array
    {
        $images = [
            'uz' => [],
            'ru' => [],
        ];
        if ($request->hasFile('images_uz')) {
            // Delete old images
            $this->deleteImages($question, ['uz']);
            // Store new images
            foreach ($request->file('images_uz') as $file) {
                $filename       = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path           = $file->storeAs('public/images/question/uz', $filename);
                $images['uz'][] = Storage::url($path); // Save the public path
            }
        } else {
            $images['uz'] = $question->images['uz'];
        }

        if ($request->hasFile('images_ru')) {
            // Delete old images
            $this->deleteImages($question, ['ru']);
            // Store new images
            foreach ($request->file('images_ru') as $file) {
                $filename       = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path           = $file->storeAs('public/images/question/ru', $filename);
                $images['ru'][] = Storage::url($path); // Save the public path
            }
        } else {
            $images['ru'] = $question->images['ru'];
        }

        return $images;
    }

    /**
     * @param \App\Models\Question $question
     * @param array $locales
     * @return void
     */
    public function deleteImages(Question $question, array $locales)
    {
        foreach ($locales as $locale) {
            foreach ($question->images[$locale] as $oldImagePath) {
                // Remove the '/storage' prefix from the path to get the relative path
                $path = str_replace('/storage', '', $oldImagePath);

                // Delete from the public disk
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }
    }

    /**
     * Get question by word(keyword)
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $lang    = $request->input('lang');

        $questions = Question::where('question_' . $lang, 'like', "%{$keyword}%")
            ->get();

        return response()->json([
            'questions' => $questions,
            'count'     => count($questions),
            'status'    => 200,
        ]);
    }

    public function getQuestion(Request $request)
    {
        $column = 'question_' . app()->getLocale();
        $questions = Question::where($column, $request->input('question'))->get();

        return view('welcome', compact('questions'));
    }

}
