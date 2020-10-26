<?php

namespace App\Http\Requests\Admin\Ot;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateOt extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.ot.edit', $this->ot);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'client_id' => ['sometimes', 'string'],
            'date' => ['sometimes', 'date'],
            'seller' => ['sometimes', 'string'],
            'motor_id' => ['sometimes', 'string'],
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

    public function getModifiedData()
    {
        $data = $this->only(collect($this->rules())->keys()->all());
        if (is_array($data["client_id"]))
            $data["client_id"] = $data["client_id"]["id"];
        if (is_array($data["motor_id"]))
            $data["motor_id"] = $data["motor_id"]["id"];

        return $data;
    }
}
