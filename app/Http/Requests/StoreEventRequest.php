<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'event_date' => 'required|date|after_or_equal:today',
            'event_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:event_time',
            'location' => 'nullable|string|max:255',
            'location_url' => 'nullable|url|max:500',
            'max_attendees' => 'nullable|integer|min:1',
            'registration_deadline' => 'nullable|date|before_or_equal:event_date',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
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
            'event_date' => 'event date',
            'event_time' => 'start time',
            'end_time' => 'end time',
            'location_url' => 'location URL',
            'max_attendees' => 'maximum attendees',
            'registration_deadline' => 'registration deadline',
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
            'event_date.after_or_equal' => 'The event date must be today or in the future.',
            'end_time.after' => 'The end time must be after the start time.',
            'registration_deadline.before_or_equal' => 'The registration deadline must be on or before the event date.',
        ];
    }
}
