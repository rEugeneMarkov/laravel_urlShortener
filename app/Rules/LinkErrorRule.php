<?php

namespace App\Rules;

use Closure;
use App\Http\Helpers\UrlChecker;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class LinkErrorRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!UrlChecker::check($value)) {
            $fail('validation.link_error')->translate([
                'value' => $value,
            ]);
        }
    }
}
