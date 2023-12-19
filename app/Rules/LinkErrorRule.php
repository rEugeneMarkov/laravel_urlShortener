<?php

namespace App\Rules;

use App\Http\Helpers\UrlChecker;
use Closure;
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
        if (! UrlChecker::check($value)) {
            $fail('validation.link_error')->translate([
                'value' => $value,
            ]);
        }
    }
}
