<?php

namespace MyHotels\Shared\Domain\Model\ValueObject;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DateTimeImmutable;
use DateTimeZone;

class DateTime
{
    public const FORMAT_FULL = 'Y-m-d H:i:s';
    public const FORMAT_SHORT = 'Y-m-d';

    /** @var DateTimeImmutable|DateTime|false */
    protected $value;
    protected string $format = self::FORMAT_FULL;

    public function __construct(?string $time = null, ?DateTimeZone $timezone = null, ?string $format = null)
    {
        if (!empty($time)) {
            $this->format = !empty($format) ? $format : $this->format;
            $this->value = !empty($format)
                ? DateTimeImmutable::createFromFormat($format, $time, $timezone)
                : new DateTimeImmutable($time, $timezone);
        }
    }

    public function shortFormat(): DateTime
    {
        $this->format = self::FORMAT_SHORT;

        return $this;
    }

    public function fullFormat(): DateTime
    {
        $this->format = self::FORMAT_FULL;

        return $this;
    }

    public function dateTime(): DateTimeImmutable
    {
        return $this->value;
    }

    public function toString(): ?string
    {
        if (empty($this->value)) {
            return null;
        }

        return $this->value->format($this->format);
    }

    public static function guardFormatValidation(?string $date, string $format = self::FORMAT_FULL)
    {
        if (!empty($date)) {
            try {
                $date = 'now' === $date ? date($format) : $date;
                Assertion::date($date, $format, 'invalid date');
            } catch (AssertionFailedException $e) {
                throw new \DomainException($e->getMessage());
            }
        }
    }
}
