<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;

trait ApiRequestTrait
{
    protected function failedValidation(Validator $validator)
    {
        return ['message' => $validator->errors()->first()];
    }
}
