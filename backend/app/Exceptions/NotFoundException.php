<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

/**
 *
 * @OA\Schema(
 *   title="NotFoundException",
 *   description="Not Found Exception for Requests",
 *
 *   @OA\Xml(name="NotFoundException"),
 *
 *   @OA\Property(property="status", type="bool", default=false),
 *   @OA\Property(property="data", type="object", default=null),
 *   @OA\Property(property="meta", type="object", default=null),
 *   @OA\Property(
 *        property="error",
 *        type="object",
 *      @OA\Property(property="message", type="string"),
 *      @OA\Property(property="code", type="string", default=404),
 *      @OA\Property(property="status", type="string"),
 *   )
 * )
 */
class NotFoundException extends GenericException
{
    public function render($request, $code = Response::HTTP_NOT_FOUND)
    {
        return parent::render($request, $code);
    }
}
