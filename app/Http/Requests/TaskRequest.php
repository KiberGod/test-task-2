<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required|max:150',
            'description' => 'required|max:500'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Назва не може бути порожньою',
            'title.max' => 'Назва задачі занадто довга',
            'description.required' => 'Задача має містити опис',
            'description.max' => 'Опис задачі занадто довгий',
        ];
    }
}
