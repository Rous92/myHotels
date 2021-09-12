<?php

namespace MyHotels\Shared\Infrastructure\Ui\Rest\Response;

use Symfony\Component\HttpFoundation\Response;

final class HttpBadRequest extends HttpResponse
{
    public function __construct($data = 'Data is invalid', array $headers = [])
    {
        parent::__construct($data, Response::HTTP_BAD_REQUEST, $headers);
    }
}
