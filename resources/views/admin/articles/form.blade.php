
<x-default-layout title="$article->exists() ? 'Modifier un article' : 'Créer un article'">
    <form action="{{ $article->exists() ? route('admin.articles.update', ['article' => $article]) : route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($article->exists())
        @method('PATCH')
        @endif
        <div class="mb-4">
            <h1 class="h5">
                {{ $article->exists() ? 'Modifier un article' : 'Créer un article' }}
            </h1>
            <p class="form-text">Révélons au Monde nos talents d'écrivains !</p>

            <div class="mb-3">
                <x-input name="title" label="Titre" class="form-control" :value="$article->title"  />
            </div>
            <div class="mb-3">
                <x-textarea name="content" label="Contenu du post" class="form-control">{{ $article->content }}</x-textarea>
            </div>
            <div class="mb-33">
                <x-input name="slug" label="Slug"  class="form-control" :value="$article->slug"/>
            </div>
            <div class="mb-3">
                <x-input name="image" type="file" label="Image de couverture" class="form-control"  /> {{-- :value="$article->image" --}}
            </div>
            <div class="mb-3">
                <x-select name="theme_id" label="Thème"  :value="$article->theme_id"  :list="$themes" class="form-control" />
            </div>
            <div class="mb-3">
                <x-select name="tag_ids" label="Étiquettes" :value="$article->tags"  :list="$tags" multiple class="form-control" />
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">{{ $article->exists() ? 'Mettre à jour' : 'Publier' }}</button>
        </div>
    </form>
</x-default-layout>
