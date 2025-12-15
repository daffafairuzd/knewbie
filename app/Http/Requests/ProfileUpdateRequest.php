<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Pastikan user boleh menjalankan request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->user()?->id;

        return [
            // hanya divalidasi kalau field "name" dikirim
            'name' => ['sometimes', 'required', 'string', 'max:255'],

            // hanya divalidasi kalau field "email" dikirim
            'email' => [
                'sometimes',
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($userId),
            ],

            // optional
            'occupation' => ['sometimes', 'nullable', 'string', 'max:255'],

            // file foto, optional
            'photo' => ['sometimes', 'nullable', 'image', 'max:2048'],
        ];
    }
}
