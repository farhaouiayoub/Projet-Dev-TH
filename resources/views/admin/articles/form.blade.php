<x-default-layout title="Créer un article">
    <form
        action="{{ $article->exists() ? route('admin.articles.update', ['article' => $article]) : route('admin.articles.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="form-container"
    >
        @csrf
        @if ($article->exists())
        @method('PATCH')
        @endif

        <div class="form-section">
            <h1 class="form-title">
                {{ $article->exists() ? 'Modifier un article' : 'Créer un article' }}
            </h1>
            <p class="form-helper">Révélons au Monde nos talents d'écrivains !</p>

            <div class="form-group">
                <x-select name="numero_id" label="Numéro" :value="$article->numero_id" :list="$numeros"  options-values="id" options-texts="description" class="form-control" />
            </div>

            <div class="form-group">
                <x-input name="title" label="Titre" class="form-control" :value="$article->title" />
            </div>
            <div class="form-group">
                <x-textarea name="content" label="Contenu du post" class="form-control">{{ $article->content }}</x-textarea>
            </div>
            <div class="form-group">
                <x-input name="image" type="file" label="Image de couverture" class="form-control" />
            </div>
            <div class="form-group">
                <x-select name="theme_id" label="Thème" :value="$article->theme_id" :list="$themes" class="form-control" />
            </div>
            <div class="form-group">
                <x-select name="tag_ids" label="Étiquettes" :value="$article->tags" :list="$tags" multiple class="form-control" />
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="form-button">{{ $article->exists() ? 'Mettre à jour' : 'Publier' }}</button>
        </div>
    </form>
</x-default-layout>
