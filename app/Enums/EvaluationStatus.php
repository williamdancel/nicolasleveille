<?php

namespace App\Enums;

enum EvaluationStatus: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in-progress';
    case AWAITING_CUSTOMER = 'awaiting_customer';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}