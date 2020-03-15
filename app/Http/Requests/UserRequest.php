<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        $user = User::find($this->route('user'));
//        return $user && $this->user()->can('update', $user);
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
            'email' => 'required|email|exists:users',
            'name' => 'required|string|max:255',
            'skype' => 'nullable|alpha_dash',
            'age' => 'required|integer',
            'location' => 'required|string',
            'about' => 'nullable|string',
            'avatar' => 'nullable|image',
            'resetPhoto' => 'sometimes|accepted'
        ];
    }
}
