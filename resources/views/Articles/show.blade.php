
<x-default-layout :title="$article->title">

    <div class="divarticle">

        <x-article :$article />

                {{-- Dans la section rating --}}
        <div class="rating-div">
            @auth
            <form action="{{ route('articles.rate', ['article' => $article]) }}" method="POST">
                @csrf
                <div class="rating">
                    {{-- Un seul input hidden pour la valeur --}}
                    <input type="hidden" name="rating" id="selected_rating" value="0">

                    @for($i = 1; $i <= 5; $i++)
                        <button type="button" class="rating-button" data-value="{{ $i }}" onclick="setRating({{ $i }})">
                        <svg class="star" viewBox="0 -10 511.98685 511" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m510.652344 185.902344c-3.351563-10.367188-12.546875-17.730469-23.425782-18.710938l-147.773437-13.417968-58.433594-136.769532c-4.308593-10.023437-14.121093-16.511718-25.023437-16.511718s-20.714844 6.488281-25.023438 16.535156l-58.433594 136.746094-147.796874 13.417968c-10.859376 1.003906-20.03125 8.34375-23.402344 18.710938-3.371094 10.367187-.257813 21.738281 7.957031 28.90625l111.699219 97.960937-32.9375 145.089844c-2.410156 10.667969 1.730468 21.695313 10.582031 28.09375 4.757813 3.4375 10.324219 5.1875 15.9375 5.1875 4.839844 0 9.640625-1.304687 13.949219-3.882813l127.46875-76.183593 127.421875 76.183593c9.324219 5.609376 21.078125 5.097657 29.910156-1.304687 8.855469-6.417969 12.992187-17.449219 10.582031-28.09375l-32.9375-145.089844 111.699219-97.941406c8.214844-7.1875 11.351563-18.539063 7.980469-28.925781zm0 0"
                                fill="currentColor" />
                        </svg>
                        </button>
                    @endfor
                </div>
                <div class="submit-rating">
                    <button type="submit" class="" >Envoyer</button>
                </div>
            </form>
            @endauth


            <script>
                class Rating {
                    constructor(ratingEl) {
                        this.ratingEl = ratingEl;

                        setTimeout(() => {
                            this.ratingEl.classList.add("rating--animatable");
                        }, 0);

                        this.ratingEl.addEventListener("click", this.onClick.bind(this));
                    }

                    get ratingButtons() {
                        return [...this.ratingEl.querySelectorAll(".rating-button")];
                    }

                    get offButtons() {
                        return this.ratingButtons.filter(
                            (button) => !button.classList.contains("rating-button--active")
                        );
                    }

                    onClick(e) {
                        const target = e.target.matches(".rating-button")
                            ? e.target
                            : e.target.closest(".rating-button");
                        if (!target) return;

                        this.ratingButtons.forEach((button) => {
                            button.style.setProperty("--transition-delay", 0);
                        });

                        this.offButtons.forEach((button, index) => {
                            const DELAY_UNIT = 100;
                            button.style.setProperty("--transition-delay", `${DELAY_UNIT * index}ms`);
                        });

                        const clickedButtonIndex = this.ratingButtons.indexOf(target);
                        this.ratingButtons.forEach((button, index) => {
                            if (index <= clickedButtonIndex) {
                                button.classList.add("rating-button--active");
                            } else {
                                button.classList.remove("rating-button--active");
                            }
                        });
                    }
                }

                Array.from(document.querySelectorAll(".rating")).forEach(
                    (ratingEl) => new Rating(ratingEl)
                );


                        function setRating(value) {
                // Met à jour la valeur cachée
                document.getElementById('selected_rating').value = value;

                // Met à jour l'affichage des étoiles
                document.querySelectorAll('.rating-button').forEach((btn, index) => {
                    if(index + 1 <= value) {
                        btn.classList.add('rating-button--active');
                    } else {
                        btn.classList.remove('rating-button--active');
                    }
                });
            }
            </script>
        </div>





            <!-- Formulaire pour ajouter un commentaire -->
        <div class="container">
            @auth
            <form action="{{ route('articles.comment', ['article' => $article]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <input
                        type="text"
                        name="comment"
                        placeholder="Quelque chose à rajouter ? 🎉"
                        autocomplete="off"
                    >
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                    </button>
                </div>
                @error('comment')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </form>
            @endauth

            <!-- Liste des commentaires -->
            <div class="comments">
                @foreach ($article->comments as $comment)
                <div class="comment">

                    <div class="comment-content">
                        <div class="comment-header">
                            <h2>{{ $comment->user->name }}</h2>
                            <time datetime="{{ $comment->created_at }}"> {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y H:i') }} </time>
                        </div>
                        <p>{{ $comment->content }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</x-default-layout>
