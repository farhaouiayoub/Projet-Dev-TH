
@props(['theme' , 'list' => false])  {{--  Définition des propriétés de theme }}
{{-- Début du post --}}
<theme class="theme-card">
    <!-- Image -->
    <div class="divimage">
        <img src="https://images.unsplash.com/photo-1528360983277-13d401cdc186?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
    </div>

    <!-- Article Details -->
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
