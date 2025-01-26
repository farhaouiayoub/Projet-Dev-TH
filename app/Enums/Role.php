<?php

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case Abonne = 'abonne';
    case Responsable = 'responsable';
    //case Guest = 'guest'; // Ajoutez ce rôle


    // Ajoutez cette méthode
    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }


}
