<?php

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case Abonne = 'abonne';
    case Responsable = 'responsable';

    
    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }


}
