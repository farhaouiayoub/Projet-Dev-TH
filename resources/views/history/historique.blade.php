<x-default-layout>

 <!-- Nouvelle Section Historique -->
 <div class="custom-form-container">
    <h2>Votre historique de navigation</h2>

    <form method="GET" action="{{ route('history') }}" class="custom-mb-4">
        <div class="custom-row custom-g-3">
            <div class="custom-col-md-4">
                <input type="text" name="search" class="custom-form-control"
                       placeholder="Rechercher..." value="{{ request('search') }}">
            </div>

            <div class="custom-col-md-3">
                <select name="theme" class="custom-form-select">
                    <option value="">Tous les thèmes</option>
                    @foreach($themes as $theme)
                        <option value="{{ $theme->id }}"
                            {{ request('theme') == $theme->id ? 'selected' : '' }}>
                            {{ $theme->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="custom-col-md-3">
                <input type="date" name="date" class="custom-form-control"
                       value="{{ request('date') }}">
            </div>

            <div class="custom-col-md-2">
                <button type="submit" class="custom-btn-primary">Filtrer</button>
            </div>
        </div>
    </form>

    <div class="custom-list-group">
        @forelse($history as $entry)
            <a href="{{ route('Articles.show', $entry->article) }}"
               class="custom-list-group-item custom-list-group-item-action">
                <div class="custom-d-flex custom-justify-content-between">
                    <h5>{{ $entry->article->title }}</h5>
                    <small>{{ $entry->viewed_at ? $entry->viewed_at : 'Date inconnue' }}</small>
                </div>
                <div class="custom-text-muted">
                    {{ $entry->article->theme->name }}
                </div>
            </a>
        @empty
            <div class="custom-alert custom-alert-info">Aucun historique trouvé</div>
        @endforelse
    </div>

    <div class="custom">
        {{ $history->appends($filters)->links() }}
    </div>
</div>


</x-default-layout>
