<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ContainsLetter implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // 英字が含まれていない場合、エラーを発生させる
        if (!preg_match('/[a-zA-Z]/', $value)) {
            $fail(__('validation.contains_letter')); // 英字エラー
        }
    }
}
