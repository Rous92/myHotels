<?php

namespace MyHotels\Shared\Infrastructure\Ui\Rest\Response;

use Symfony\Component\HttpFoundation\Response;

final class HttpNotFoundResponse extends HttpResponse
{
    public function __construct($data = 'Not found', array $headers = [])
    {
        parent::__construct($data, Response::HTTP_NOT_FOUND, $headers);
    }
}
