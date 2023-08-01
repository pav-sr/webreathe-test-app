<?php

namespace App\Http\Requests;

use App\Enums\ModuleType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModulePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $types = array_map(function (ModuleType $type) {
            return $type->value;
        }, ModuleType::cases());

        return [
            'name' => 'required|max:255',
            'type' => ['required', Rule::in($types)],
        ];
    }

    public function messages()
    {
        $types = array_map(function (ModuleType $type) {
            return $type->value;
        }, ModuleType::cases());

        return [
            'name.required' => 'Name is required',
            'type.required' => 'Type is required',
            'type.in' => 'Type must be on of '.implode(', ', $types),
        ];
    }
}
