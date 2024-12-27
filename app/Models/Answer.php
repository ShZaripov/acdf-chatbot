<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read string $answer
 */
class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'answer_ru', 'answer_uz', 'images'];

    protected $table = 'answers';

    protected $casts = [
        'answer_uz' => 'string',
        'answer_ru' => 'string',
        'images'    => 'array',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Accessor for answer attribute based on locale
     * @return string
     */
    public function getAnswerAttribute()
    {
        return $this['answer_' . app()->getLocale()];
    }
}
