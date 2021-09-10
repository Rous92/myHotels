<?php

namespace MyHotels\Core\Infrastructure\Ui\Rest\Controller\Hotel;

use MyHotels\Core\Application\GetHotelBookingStatus;
use MyHotels\Core\Application\HotelBookingStatusFinder;
use MyHotels\Shared\Infrastructure\Ui\Rest\Controller\AbstractController;
use MyHotels\Shared\Infrastructure\Ui\Rest\Response\HttpNotFoundResponse;
use MyHotels\Shared\Infrastructure\Ui\Rest\Response\HttpOkResponse;
use Symfony\Component\HttpFoundation\Request;

final class GetHotelBookingStatusController extends AbstractController
{
    public function __construct(private HotelBookingStatusFinder $service)
    {
    }

    public function __invoke(Request $request)
    {
        $hotelId = $request->attributes->get('id');

        $hotel = $this->service->__invoke(new GetHotelBookingStatus($hotelId));

        if (is_null($hotel)) {
            return new HttpNotFoundResponse();
        }

        return new HttpOkResponse(['message' => 'WIP call', 'data' => $hotel->toArray()]);
    }
}
