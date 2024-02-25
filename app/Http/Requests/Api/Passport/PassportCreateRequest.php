<?php

namespace App\Http\Requests\Api\Passport;

use Illuminate\Foundation\Http\FormRequest;

class PassportCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'passportNumber' => ['required', 'string', 'min:1', 'max:150'],
            'user_id' => ['required', 'exists:users,id']
        ];
    }
}
