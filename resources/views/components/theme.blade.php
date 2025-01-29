
@props(['theme' , 'list' => false])  {{--  Définition des propriétés de theme }}
{{-- Début du post --}}
<theme class="theme-card">
    <!-- Image -->


    <!-- theme Details -->
    <div class="theme-details">
        <h1>{{ $theme->name }}</h1>
        <p class="descriptiontheme">
            {{ $theme->description }}
        </p>



        @if($theme->created_at)
            <time class="descriptiontheme" datetime="{{ $theme->created_at }}">
                {{ $theme->created_at->format('d/m/Y H:i:s') }}
            </time>
        @else
            <time class="descriptiontheme">
                Date non disponible
            </time>
        @endif

    </div>
</theme>
{{-- Fin du post --}}
