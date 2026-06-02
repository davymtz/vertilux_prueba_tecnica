<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        if ($this->expectsJson()) {
            $errors = Arr::flatten((new ValidationException($validator))->errors());
        
            foreach($errors as &$error)
            {
                $error = trans($error);
            }

            throw new HttpResponseException(
                response()->json([
                    'data' => null,
                    'status' => false,
                    'meta' => $errors,
                    'error' => [
                        'code' => 'parameter_invalid',
                        'message' => implode(', ', $errors),
                        'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                    ]

                ], 422)
            );
        }
        parent::failedValidation($validator);
    }
}
