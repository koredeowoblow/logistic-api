<?php

namespace App\Enums;

enum LogisticBookingEnums
{
    //
    const DRAFT = "draft";
    const CONFIRMED = 'confirmed';
    const SHIPPED = 'shipped';
    const ARRIVED = 'arrived';
    const DELIVERED = 'delivered';
    const CANCEL = 'cancelled';
    public static function values(): array
    {
        return [
            self::DRAFT,
            self::CONFIRMED,
            self::SHIPPED,
            self::ARRIVED,
            self::DELIVERED,
            self::CANCEL,
        ];
    }
}
