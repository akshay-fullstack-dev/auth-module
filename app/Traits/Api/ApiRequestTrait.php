<?php

namespace App\Traits\Api;

use Exception;
use Illuminate\Validation\ValidationException;
use stdClass;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

trait ApiRequestTrait
{
    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([
            'message' => $validator->errors()->first(),
            'data' => new stdClass,
        ], 200);
        throw new ValidationException($validator, $response);
    }
}
