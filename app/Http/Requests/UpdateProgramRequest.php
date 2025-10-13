<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgramRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'age_range' => 'nullable|string|max:100',
            'duration' => 'nullable|string|max:100',
            'class_size' => 'nullable|integer|min:1',
            'schedule' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'price_unit' => 'nullable|string|max:50',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'teacher_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1024',
            'order' => 'nullable|integer|min:0',
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'age_range' => 'age range',
            'class_size' => 'class size',
            'price_unit' => 'price unit',
            'is_featured' => 'featured status',
            'teacher_image' => 'teacher image',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'image.image' => 'The program file must be an image.',
            'teacher_image.image' => 'The teacher file must be an image.',
        ];
    }
}
