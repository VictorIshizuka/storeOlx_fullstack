<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MyAccountRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    //  */
    public function rules(): array
    {
        $userId = auth()->user()->id;
        return [
            'name' => 'required|min:6|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
            'state_id' => 'required|numeric|exists:states,id'


        ];
    }
}
