<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'goal_amount' => 'required|numeric|min:1',
            'category' => 'required|string|max:100',
            'deadline' => 'required|date|after:today',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules = array_map(function ($rule) {
                return str_replace('required|', 'sometimes|', $rule);
            }, $rules);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Project title is required',
            'description.required' => 'Project description is required',
            'description.min' => 'Project description must be at least 10 characters',
            'goal_amount.required' => 'Goal amount is required',
            'goal_amount.numeric' => 'Goal amount must be a number',
            'goal_amount.min' => 'Goal amount must be greater than 0',
            'deadline.required' => 'Deadline is required',
            'deadline.after' => 'Deadline must be a future date',
            'image.image' => 'File must be an image',
            'image.mimes' => 'Image must be jpeg, png, jpg or gif',
            'image.max' => 'Image size must not exceed 2MB',
        ];
    }
}
