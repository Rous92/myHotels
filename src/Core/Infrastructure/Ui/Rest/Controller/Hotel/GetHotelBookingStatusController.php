<?php

namespace MyHotels\Core\Infrastructure\Ui\Rest\Controller\Hotel;

use MyHotels\Core\Domain\Model\HotelRepository;
use MyHotels\Shared\Infrastructure\Ui\Rest\Controller\AbstractController;
use MyHotels\Shared\Infrastructure\Ui\Rest\Response\HttpOkResponse;
use Symfony\Component\HttpFoundation\Request;

final class GetHotelBookingStatusController extends AbstractController
{
    public function __construct(private HotelRepository $repository)
    {
    }

    protected function exceptions(): array
    {
        return [];
    }

    public function __invoke(Request $request)
    {
        $hotelId = $request->attributes->get('id');
        $hotel = $this->repository->find($hotelId);
        return new HttpOkResponse(['message' => 'WIP call', 'data' => $hotel->toArray()]);
    }
}
