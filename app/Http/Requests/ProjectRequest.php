<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'tags' => 'sometimes|array',
            'site_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'thumbnail' => 'nullable|image',
            'is_test_task' => 'sometimes|accepted',
        ];
    }
}
