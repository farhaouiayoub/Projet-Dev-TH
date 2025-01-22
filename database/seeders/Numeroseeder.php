<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Numeroseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numero = new \App\Models\Numero();
        $numero->description = 'Numero 1';
        $numero->status_Num = 'Public';
        $numero->save();

        $numero = new \App\Models\Numero();
        $numero->description = 'Numero 2';
        $numero->status_Num = 'Privé';
        $numero->save();

        $numero = new \App\Models\Numero();
        $numero->description = 'Numero 3';
        $numero->status_Num = 'Public';
        $numero->save();

        $numero = new \App\Models\Numero();
        $numero->description = 'Numero 4';
        $numero->status_Num = 'Privé';
        $numero->save();

        $numero = new \App\Models\Numero();
        $numero->description = 'Numero 5';
        $numero->status_Num = 'Public';
        $numero->save();
    }
}
