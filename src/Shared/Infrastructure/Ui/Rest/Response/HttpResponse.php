<?php

namespace MyHotels\Shared\Infrastructure\Ui\Rest\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HttpResponse extends JsonResponse
{
    private const MESSAGE_SUCCESS = 'Success';
    private const MESSAGE_FAIL = 'Fail';
    private const MESSAGE_ERROR = 'Error';

    public function __construct($data, $statusCode = Response::HTTP_OK, array $headers = [])
    {
        $this->data = $data;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        parent::__construct($this->data(), $statusCode, $headers);
    }

    public function data()
    {
        return $this->buildData();
    }

    public function statusCode()
    {
        return $this->statusCode;
    }

    public function headers()
    {
        return $this->headers;
    }

    private function buildData(): array
    {
        $data = is_array($this->data) && !empty($this->data['data'])
            ? $this->data['data'] : $this->data;

        return [
            'code' => $this->statusCode(),
            'status' => $this->getStatusMessage(),
            'data' => $data,
        ];
    }

    private function getStatusMessage(): string
    {
        return match ($this->statusCode()) {
            Response::HTTP_OK, Response::HTTP_CREATED, Response::HTTP_ACCEPTED => self::MESSAGE_SUCCESS,
            Response::HTTP_BAD_REQUEST, Response::HTTP_NOT_FOUND, Response::HTTP_NOT_ACCEPTABLE => self::MESSAGE_FAIL,
            Response::HTTP_INTERNAL_SERVER_ERROR => self::MESSAGE_ERROR,
            default => '',
        };
    }
}
