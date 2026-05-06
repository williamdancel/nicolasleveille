<?php
namespace App\Enums;

enum EnquiryType: string
{
    case EVALUATION = 'evaluation';
    case ENQUIRY = 'enquiry';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}