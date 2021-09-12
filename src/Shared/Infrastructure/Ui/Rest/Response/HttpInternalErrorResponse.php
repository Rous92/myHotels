<?php

namespace MyHotels\Shared\Infrastructure\Ui\Rest\Response;

use Symfony\Component\HttpFoundation\Response;

final class HttpInternalErrorResponse extends HttpResponse
{
    public function __construct($data = 'Something went wrong', array $headers = [])
    {
        parent::__construct($data, Response::HTTP_INTERNAL_SERVER_ERROR, $headers);
    }
}
