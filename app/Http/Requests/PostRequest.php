<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class PostRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug ?? $this->title),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(Request $request): array
    {
        return [
            'title' => ['required', 'string', 'between:3,255'],
            'slug' => ['required', 'string', 'between:3,255', Rule::unique('articles')->ignore($this->article)],
            'content' => ['required', 'string', 'min:10'],
            'image' => [$this->article ? 'nullable' : 'required','image','mimes:jpeg,png,jpg,webp','max:2048'],
            // 'image' => [Rule::requiredIf($request->isMethod('article')), 'image'],
            'theme_id' => ['required', 'integer', 'exists:themes,id'],
            'numero_id' => ['required', 'integer', 'exists:numeros,id'],
            'tag_ids' => ['array', 'exists:tags,id'],
        ];
    }
}


