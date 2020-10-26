<?php

namespace App\Http\Requests\Admin\Motor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMotor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.motor.edit', $this->motor);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'description' => ['sometimes', 'string'],
            'code' => ['sometimes', 'string'],
            'brand_id' => ['sometimes', 'string'],
            'model_id' => ['sometimes', 'string'],
            'power_number' => ['sometimes', 'string'],
            'power_measurement' => ['sometimes', 'string'],
            'volt' => ['sometimes', 'string'],
            'speed' => ['sometimes', 'string'],
            'status' => ['sometimes', 'boolean'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
