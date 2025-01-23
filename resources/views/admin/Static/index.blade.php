<x-default-layout :titre="'static'">
    <div class="container">
        <div class="header">
            <h1>Statistiques</h1>
        </div>
        <div class="main-content">
            <div class="stats-container">
                <h2>Articles</h2>
                <div class="stats">
                    <div class="stat-card">
                        <h3>Tous Articles</h3>
                        <p>{{ $articles->count() }}</p>
                    </div>
                    <div class="stat-card">
                        <h3>Articles En cours</h3>
                        <p>{{ $articles->where('status','En cours')->count() }}</p>
                    </div>
                    <div class="stat-card">
                        <h3>Articles Publié</h3>
                        <p>{{ $articles->where('status','Publié')->count() }}</p>
                    </div>
                    <div class="stat-card">
                        <h3>Articles Retenus</h3>
                        <p>{{ $articles->where('status','Retenu')->count() }}</p>
                    </div>
                    <div class="stat-card">
                        <h3>Articles Refus</h3>
                        <p>{{ $articles->where('status','Refus')->count()}}</p>
                    </div>
                </div>


                <div class="stat-card">
                    <h3>Tags</h3>
                    <p>{{ $Tags->count() }}</p>
                </div>
                <div class="stat-card">
                    <h3>Utilisateurs</h3>
                    <p>{{ $users->count() }}</p>
                </div>
                <div class="stat-card">
                    <h3>Commentaires</h3>
                    <p>{{ $commentaires->count() }}</p>
                </div>
                <div class="stat-card">
                    <h3>Thèmes</h3>
                    <p>{{ $themes->count() }}</p>
                </div>
                <div class="stat-card">
                    <h3>Numéros</h3>
                    <p>{{ $numeros->count() }}</p>
                </div>
            </div>
        </div>

    </div>
</x-default-layout>
