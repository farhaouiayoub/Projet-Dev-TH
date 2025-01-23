@props(['article' , 'list' => false])  {{--  Définition des propriétés de l'article }}

{{-- Début du post --}}
<article class="article-card">
    <!-- Image -->
    <div class="divimage">
        <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" alt="Image Placeholder">
    </div>

    <!-- Article Details -->
    <div class="article-details">
        @if($article->theme)
        <a href="{{ route('Articles.byTheme' , [ 'theme' => $article->theme ] ) }}" class="category">{{ $article->theme->name }}</a>
        @endif
        <div></div>
        @if($article->Numero)
        <a href="{{ route('Articles.byNumero' , [ 'Numero' => $article->Numero ] ) }}" class="Numeros">{{ $article->Numero->description }}</a>
        @endif
        <h1>{{ $article->title }}</h1>
            <div class="tags">
                @if($article->tags->isNotEmpty())
                <ul>
                    @foreach($article->tags as $tag)
                    <li><a href="{{ route('Articles.byTag' , [ 'tag' => $tag ] ) }}" class="tag">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
                @endif
            </div>
        <p class="description">


            @if($list)
            {{ $article->excerpt }}
            @else
            {!! nl2br(e($article->content)) !!}
            @endif


        </p>



        @if($list)
        <a href="{{ route('Articles.show', ['article' => $article]) }}" class="read-more">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"></path>
            </svg>
            Lire l'article
        </a>
        @else
        <time class="description" datetime="{{ $article->created_at }}">
            {{ $article->created_at->format('d/m/Y H:i:s') }}
        </time>
        @endif



        {{ $slot }}




    </div>
</article>
{{-- Fin du post --}}
