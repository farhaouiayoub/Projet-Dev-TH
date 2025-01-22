
# Commandes principales de PHP Artisan

1. **`php artisan list`**  
   Affiche toutes les commandes disponibles.


3. **`php artisan make:model <NomDuModel>`**  
   Crée un nouveau modèle Eloquent.

4. **`php artisan make:controller <NomDuController>`**  
   Crée un nouveau contrôleur.

5. **`php artisan make:migration <NomDeLaMigration>`**  
   Crée un fichier de migration pour la base de données.

6. **`php artisan migrate`**  
   Exécute les migrations pour créer ou modifier des tables dans la base de données.

7. **`php artisan migrate:rollback`**  
   Annule la dernière migration exécutée.

8. **`php artisan make:seeder <NomDuSeeder>`**  
   Crée une classe pour insérer des données dans la base de données.

9. **`php artisan db:seed`**  
   Exécute les classes de Seeder pour insérer des données dans la base.

10. **`php artisan make:middleware <NomDuMiddleware>`**  
    Crée un middleware pour intercepter les requêtes HTTP.

11. **`php artisan make:request <NomDuRequest>`**  
    Crée une classe de validation pour les requêtes HTTP.

12. **`php artisan make:command <NomDeLaCommand>`**  
    Crée une commande artisan personnalisée.

13. **`php artisan route:list`**  
    Affiche la liste des routes enregistrées dans l'application.

14. **`php artisan cache:clear`**  
    Efface les données mises en cache.

15. **`php artisan config:cache`**  
    Met en cache les fichiers de configuration.

16. **`php artisan config:clear`**  
    Efface les fichiers de configuration mis en cache.

17. **`php artisan view:clear`**  
    Supprime les fichiers de cache des vues Blade.

18. **`php artisan queue:work`**  
    Traite les jobs en attente dans la file d'attente.

19. **`php artisan serve`**  
    Lance un serveur de développement local sur `http://localhost:8000`.

20. **`php artisan optimize`**  
    Optimise les performances en mettant en cache les fichiers de configuration et de routes.

21. **`php artisan key:generate`**  
    Génère une nouvelle clé d'application pour le fichier `.env`.

22. **`php artisan tinker`**  
    Lance une console interactive pour exécuter du code Laravel.

23. **`php artisan storage:link`**  
    Crée un lien symbolique entre `storage/app/public` et `public/storage`.

24. **`php artisan test`**  
    Exécute les tests unitaires et fonctionnels de l'application.

25. **`php artisan schedule:run`**  
    Exécute les tâches planifiées.

26. **`php artisan make:modele -m <NomDuModel>`**
    Crée un modèle Eloquent et un fichier de migration pour le modèle.

27. **`php artisan make:factory <Nom>Factory`**
    Crée un facteur pour générer des données de test.

28. **`php artisan migrate:reset`**
Réinitialise la base de données en supprimant toutes les tables et les données.

29. **`php artisan migrate --seed`**
Exécute les migrations et les seeders pour initialiser la base de données.

30. **`php artisan migrate:refresh --seed`**
Réinitialise la base de données et exécute les seeders pour initialiser la base de données en utilisant la methode downet up.

31. **`php artisan migrate:fresh --seed`**
Réinitialise la base de données et exécute les seeders pour initialiser la base de données sans utilisant la methode down et up ----- DROP.

32. **`php artisan db:seed --clas=<NomDuseeder>`**
Exécute un seeder spécifique.

33. **`Composer require laravel-lang/common --dev `** / **`Php artisan lang:add fr`**
Ajoute le support de la langue française. (pagination).

34. **`Php artisan vendor:publish //// 16`**
Publie les ressources de Laravel.(pagination dossier style).


35. **`php artisan make:controller AdminController --resource --model=article `**
Crée un contrôleur pour gérer les articles, avec les méthodes CRUD.


36. **` php artisan route:list `**
Affiche la liste des routes de l'application.

-----------------------------------------------------------------------------------------------------------------------
# les liens utiles :
- [Laravel documentation](https://laravel.com/docs/8.x)
- [site icons : ](https://heroicons.com/)
- [site img : ](https://picsum.photos/)
-----------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------composer create-project laravel/laravel Projet1






-----------------------------------------------------------------------------------------------------------------------
