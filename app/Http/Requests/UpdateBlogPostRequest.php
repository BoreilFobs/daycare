<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogPostRequest extends FormRequest
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
        $blogPost = $this->route('blogPost');
        $blogPostId = $blogPost instanceof \App\Models\BlogPost ? $blogPost->id : $blogPost;

        return [
            'title' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('blog_posts', 'slug')->ignore($blogPostId),
            ],
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:5120',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'is_published' => 'nullable|boolean',
            'allow_comments' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
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
            'image' => 'featured image',
            'published_at' => 'publish date',
            'is_published' => 'published status',
            'allow_comments' => 'allow comments',
            'is_featured' => 'featured status',
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
            'slug.regex' => 'The slug must contain only lowercase letters, numbers, and hyphens.',
            'slug.unique' => 'This slug is already in use. Please choose a different one.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Only auto-generate slug if explicitly cleared and title is provided
        // On update, preserve the existing slug if no new one is provided
        if ($this->has('slug') && empty($this->slug) && !empty($this->title)) {
            $blogPost = $this->route('blogPost');
            if ($blogPost instanceof \App\Models\BlogPost && !empty($blogPost->slug)) {
                // Keep the existing slug
                $this->merge(['slug' => $blogPost->slug]);
            } else {
                $this->merge(['slug' => \Illuminate\Support\Str::slug($this->title)]);
            }
        }
    }
}
