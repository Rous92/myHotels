<?php

namespace MyHotels\Core\Infrastructure\Ui\Rest\Controller\Hotel;

use DomainException;
use Exception;
use MyHotels\Core\Application\GetHotelBookingStatus;
use MyHotels\Core\Application\HotelBookingStatusFinder;
use MyHotels\Core\Application\Transformers\HotelBookingStatusTransformer;
use MyHotels\Shared\Infrastructure\Ui\Rest\Controller\AbstractController;
use MyHotels\Shared\Infrastructure\Ui\Rest\Response\HttpBadRequest;
use MyHotels\Shared\Infrastructure\Ui\Rest\Response\HttpInternalErrorResponse;
use MyHotels\Shared\Infrastructure\Ui\Rest\Response\HttpNotFoundResponse;
use MyHotels\Shared\Infrastructure\Ui\Rest\Response\HttpOkResponse;
use Symfony\Component\HttpFoundation\Request;

final class GetHotelBookingStatusController extends AbstractController
{
    public function __construct(
        private HotelBookingStatusFinder $service,
        private HotelBookingStatusTransformer $transformer)
    {
    }

    public function __invoke(Request $request)
    {
        $hotelId = intval($request->attributes->get('id'));

        try {
            $hotel = $this->service->__invoke(new GetHotelBookingStatus($hotelId));
        } catch (DomainException $e) {
            return new HttpBadRequest($e->getMessage());
        } catch (Exception $e) {
            return new HttpInternalErrorResponse($e->getMessage());
        }

        if (is_null($hotel)) {
            return new HttpNotFoundResponse();
        }

        $hotelBookingStatus = $this->transformer->write($hotel)->read();

        return new HttpOkResponse(['data' => $hotelBookingStatus]);
    }
}
