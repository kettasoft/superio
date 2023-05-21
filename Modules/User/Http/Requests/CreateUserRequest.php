<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(RegisterRequest::rules(), [
            'phone' => ['nullable', 'string', 'unique:users'],
            'country_code' => ['nullable', 'string'],
            'website' => ['nullable', 'url'],
            'experience' => ['nullable'],
            'education_level' => ['nullable'],
            'description' => ['nullable', 'string', 'max:10000'],
            'status' => ['nullable', 'boolean'],
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
