<?php

namespace MyHotels\Shared\Infrastructure\Ui\Rest\Response;

use Symfony\Component\HttpFoundation\Response;

final class HttpOkResponse extends HttpResponse
{
    public function __construct($data = null, array $headers = [])
    {
        parent::__construct($data, Response::HTTP_OK, $headers);
    }
}
