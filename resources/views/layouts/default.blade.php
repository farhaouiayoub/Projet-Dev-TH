
{{-- @dd($articles); --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css','resources/css/static.css'])


    <title> {{ $title }} </title>
    <script>
        function submitLogoutForm(event) { // explication : cet fonction permet de soumettre le formulaire de logout
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    </script>

</head>
<body class="body">
    {{-- Conteneur global --}}
    <div class="container">
        <!-- Header -->
        <header class="header">
            <!-- Logo -->

        @auth
            <a href="{{ route('index') }}" class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                <h2>Tech Horizons</h2>
            </a>
        @endauth
        @guest
            <a href="{{ route('guest.themes') }}" class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                <h2>Tech Horizons</h2>
            </a>
        @endguest


            <!-- Search -->
            <form class="search-bar" action="{{ route('index') }}" >
                <input type="search" value="{{ request()->search }}" name="search" placeholder="Rechercher un article">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                </button>
            </form>

            <!-- Navigation -->
            <nav>
                @auth
                    <a href="{{ route('home') }}" class="nav-link">Mon Compte</a>


                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.articles.index') }}" class="nav-link">Gestion des articles</a></li>
                    <a href="{{ route('admin.static') }}" class="nav-link">static</a></li>
                    @endif
                    <a href="{{ route('logout') }}" onclick="submitLogoutForm(event)" class="nav-link">Déconnexion </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Connexion</a>
                    <a href="{{ route('register') }}" class="nav-link">Inscription →</a>
                @endauth
                @guest
                    <a class="hidden" href="{{ route('login') }}" class="nav-link" >Connexion</a>
                @endguest
            </nav>
        </header>



        @if (session('status'))
        <div class="notification">
            <div class="icon-container">
                <svg class="icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="message">
                <p class="text">{{ session('status') }}</p>
            </div>
        </div>
        @endif


        <!-- Main Content -->
        <main class="main">

        {{ $slot }}  {{-- ici on affiche le contenu de chaque  la page --}}

        </main>

    </div>
</body>
</html>
