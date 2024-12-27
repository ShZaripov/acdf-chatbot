<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read string $question
 * @property-read array $images_uz  // Getter for 'uz' images
 * @property-read array $images_ru  // Getter for 'ru' images
 */
class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_ru', 'question_uz', 'images'];

    protected $table = 'questions';

    protected $casts = [
        'question_uz' => 'string',
        'question_ru' => 'string',
        'images'      => 'array',
    ];


    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    /**
     * Accessor for question attribute based on locale
     * @return string
     */
    public function getQuestionAttribute()
    {
        return $this['question_' . app()->getLocale()];
    }

    public function scopeWhereLocalizedQuestion($query, $value)
    {
        return $query->where('question_' . app()->getLocale(), $value);
    }
}
