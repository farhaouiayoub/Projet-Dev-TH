<?php

namespace Database\Seeders;

use App\Models\theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class themeseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = collect([
            'Intelligence artificielle',
            'Internet des objets',
            'Cybersécurité',
            'Réalité virtuelle et augmentée',
            'Blockchain et cryptomonnaies',
            'Énergie durable et technologies vertes',
            'Biotechnologie et médecine de précision',
            'Cloud computing et edge computing',
            'Robots et automatisation',
            'Technologies spatiales et exploration de l’espace',
            'Big data et analyse prédictive',
            '5G et connectivité avancée',
            'Technologies éducatives (EdTech)',
            'Impression 3D et fabrication additive',
            'Technologies de reconnaissance vocale et faciale',
            'Neurotechnologies et interfaces cerveau-machine',
            'Technologies de la mobilité intelligente (voitures autonomes, drones)',
            'Cryptographie quantique et informatique quantique',
            'Technologies immersives pour l’art et la culture'
        ]);

        $themes->each(fn ($theme) => theme::create ([
                'name' => $theme,
                'slug' => str::slug($theme),
                'description' => fake()->paragraphs(asText: true), // Générez un paragraphe de texte aléatoire

















            ]));
    }
}
