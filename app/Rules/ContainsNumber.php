<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ContainsNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // 英字が含まれていない場合、エラーを発生させる
        if (!preg_match('/[0-9]/', $value)) {
            $fail(__('validation.contains_number')); // 数字エラー
        }
    }
}
