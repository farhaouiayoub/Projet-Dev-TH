
<x-default-layout >
    <div class="divarticle">

        @forelse($articles as $article)
        <x-article :$article list /> <!-- Afficher les articles -->

        @empty

        <p class="aucun">Aucun article trouvé</p>

        @endforelse

    </div>

    <div> <!-- Afficher les liens de pagination -->
        {{ $articles->links() }}
    </div>


</x-default-layout>
