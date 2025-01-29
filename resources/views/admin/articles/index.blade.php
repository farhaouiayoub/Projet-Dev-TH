<x-default-layout title="Gestion des articles">

    <div class="container-1">
        <!-- En-tête -->
        <div class="header-2">
            <div class="header-content-3">
                <h1>GESTION DES ARTICLES </h1>
                <p>Interface d'administration du blog..!</p>
            </div>
            <div class="header-action-4 plus">
                <a href="{{ route('admin.articles.create') }}">Partager Articles </a>
                
                <p class="cl"> Rédigez votre article maintenant ! </p>
                
            </div>
        </div>

        <!-- Table des articles -->
        <div class="table-wrapper-5">
            <div class="table-container-6">
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Article</th>
                            <th>Edition</th>
                            <th>Suppression</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>
                                <a href="{{ route('Articles.show', ['article' => $article]) }}" target="_blank">Afficher</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.articles.edit', ['article' => $article]) }}">Editer</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.articles.destroy', ['article' => $article]) }}" onclick="event.preventDefault(); this.nextElementSibling.submit();">
                                    Supprimer
                                </a>
                                <form action="{{ route('admin.articles.destroy', ['article' => $article]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>







</x-default-layout>
