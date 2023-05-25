<?php

namespace App\Enums;

enum SenderMethods
{
    case Sms;
    case Email;
    case Telegram;

    public static function fromString(string $value): ?self
    {
        foreach (self::cases() as $case) {
            if (strtolower($case->name) === strtolower($value)) {
                return $case;
            }
        }

        return null;
    }
}
