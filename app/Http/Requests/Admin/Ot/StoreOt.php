<?php

namespace App\Http\Requests\Admin\Ot;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreOt extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.ot.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'client_id' => ['required', 'array'],
            'date' => ['required', 'date'],
            'seller' => ['required', 'string'],
            'motor_id' => ['required', 'array'],
            'status' => ['required', 'boolean'],
            
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
        $data["client_id"] = $data["client_id"]["id"];
        $data["motor_id"] = $data["motor_id"]["id"];
        return $data;
    }
}
