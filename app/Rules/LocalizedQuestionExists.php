<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LocalizedQuestionExists implements Rule
{
    protected $localeColumn;

    public function __construct()
    {
        $this->localeColumn = 'question_' . app()->getLocale();
    }

    public function passes($attribute, $value): bool
    {
        if (!Schema::hasColumn('questions', $this->localeColumn)) {
            return false;
        }

        return DB::table('questions')->where($this->localeColumn, $value)->exists();
    }

    public function message(): string
    {
        return 'Bunday so\'z qatnashgan savol topilmadi, iltimos boshqa so\'zlar yordamida izlab ko\'ring! Agar savolni topa olmasangiz, "Ariza qoldirish" bo\'limi orqali ariza qoldiring! Siz bilan operatorlarimiz tez orada bog\'lanishadi!';
    }
}
