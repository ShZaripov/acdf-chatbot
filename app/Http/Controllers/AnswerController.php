<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerStoreRequest;
use App\Http\Requests\AnswerUpdateRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answers = Answer::with('question')->get();

        return view('admin.answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions = Question::all();

        return view('admin.answers.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerStoreRequest $request)
    {
        // Initialize an array to store the image paths
        $images = [
            'uz' => [],
            'ru' => [],
        ];
        // Store new images
        foreach ($request->file('images_uz') as $file) {
            $filename       = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path           = $file->storeAs('public/images/answer/uz', $filename);
            $images['uz'][] = Storage::url($path); // Save the public path
        }

        foreach ($request->file('images_ru') as $file) {
            $filename       = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path           = $file->storeAs('public/images/answer/ru', $filename);
            $images['ru'][] = Storage::url($path); // Save the public path
        }

        // Save the question to the database
        Answer::create([
            'question_id' => $request->input('question_id'),
            'answer_uz'   => $request->input('answer_uz'),
            'answer_ru'   => $request->input('answer_ru'),
            'images'      => $images,
        ]);

        return redirect()->route('answers.index')->with('success', 'Javob muvafaqqiyatli qo\'shildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        return view('admin.answers.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        $questions = Question::all();

        return view('admin.answers.edit', compact('answer', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswerUpdateRequest $request, Answer $answer)
    {
        if (!$request->has('images_uz') && !$request->has('images_ru')) {
            $answer->question_id = $request->input('question_id');
            $answer->answer_ru   = $request->input('answer_ru');
            $answer->answer_ru   = $request->input('answer_ru');
            $answer->save();
        } else {
            // Initialize an array to store the image paths
            $images = $this->initializeAnArrayToStoreTheImagePaths($request, $answer);

            // Save the question to the database
            $answer->update([
                'question_id' => $request->input('question_id'),
                'answer_uz'   => $request->input('answer_uz'),
                'answer_ru'   => $request->input('answer_ru'),
                'images'      => $images, // Save as JSON
            ]);
        }

        return redirect()->route('answers.index')->with('success', 'Javob muvafaqqiyatli o\'zgartirildi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        $this->deleteImages($answer, ['uz', 'ru']);
        $answer->delete();

        return redirect()->route('answers.index')->with('success', 'Javob muvaffaqiyatli o\'chirildi!');
    }

    /**
     * @param \App\Http\Requests\AnswerUpdateRequest $request
     * @param \App\Models\Answer $answer
     * @return array|array[]
     */
    public function initializeAnArrayToStoreTheImagePaths(AnswerUpdateRequest $request, Answer $answer): array
    {
        $images = [
            'uz' => [],
            'ru' => [],
        ];
        if ($request->hasFile('images_uz')) {
            // Delete old images
            $this->deleteImages($answer, ['uz']);
            // Store new images
            foreach ($request->file('images_uz') as $file) {
                $filename       = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path           = $file->storeAs('public/images/answer/uz', $filename);
                $images['uz'][] = Storage::url($path); // Save the public path
            }
        } else {
            $images['uz'] = $answer->images['uz'];
        }

        if ($request->hasFile('images_ru')) {
            // Delete old images
            $this->deleteImages($answer, ['ru']);
            // Store new images
            foreach ($request->file('images_ru') as $file) {
                $filename       = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path           = $file->storeAs('public/images/answer/ru', $filename);
                $images['ru'][] = Storage::url($path); // Save the public path
            }
        } else {
            $images['ru'] = $answer->images['ru'];
        }

        return $images;
    }

    /**
     * @param \App\Models\Answer $answer
     * @param array $locales
     * @return void
     */
    public function deleteImages(Answer $answer, array $locales)
    {
        foreach ($locales as $locale) {
            foreach ($answer->images[$locale] as $oldImagePath) {
                // Remove the '/storage' prefix from the path to get the relative path
                $path = str_replace('/storage', '', $oldImagePath);

                // Delete from the public disk
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }
    }
}
