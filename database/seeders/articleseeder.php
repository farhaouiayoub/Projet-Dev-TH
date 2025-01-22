<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\article;
use App\Models\Numero;
use App\Models\Tag;
use App\Models\User;
use App\Models\theme;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class articleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $themes = theme::all();
        $tags = Tag::all();
        $users = User::all();
        $numeros = Numero::all();


        article::factory(20)
            ->sequence(fn() => [
                'theme_id' => $themes->random(),
                'numero_id' => $numeros->random(),
            ])
            ->hasComments(5, fn () => ['user_id' => $users->random()])
            ->create()
            ->each(fn ($article) => $article->tags()->attach($tags->random(rand(0, 3))));

            $image = 'https://picsum.photos/1000/300';


    }
}

