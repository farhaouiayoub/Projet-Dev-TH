<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); //slug: permet de créer une URL conviviale
            $table->string('excerpt');
            $table->text('content');
            $table->enum('status', ['Refus', 'En cours', 'Retenu', 'Publié']); // enum: permet de définir une liste de valeurs possibles
            $table->string('image'); //nullable: permet de ne pas rendre obligatoire le champ arabe: يسمح بعدم جعل الحقل إلزاميًا
            $table->timestamps(); // timestamps: permet de créer automatiquement les champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('articles');
    }
};

