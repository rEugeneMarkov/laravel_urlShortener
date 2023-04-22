<?php

namespace App\Http\Requests;

use App\Rules\LinkErrorRule;
use Illuminate\Foundation\Http\FormRequest;

class LinkUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $linkError = new LinkErrorRule();

        return [
            'title' => ['required', 'string', 'min:5'],
            'link' => ['required', 'url', 'min:10', $linkError],
        ];
    }
}
