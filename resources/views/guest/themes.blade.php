

<x-default-layout >
    <div class="divarticle">

        @forelse($themes as $theme)
        <x-theme :$theme list /> <!-- Afficher les themes -->

        @empty

        <p class="aucun">Aucun theme trouvé</p>

        @endforelse

        <div class="linkspagination"> <!-- Afficher les liens de pagination -->
            {{ $themes->links() }}
        </div>

    </div>

</x-default-layout>












