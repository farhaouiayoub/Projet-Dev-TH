{{-- resources/views/responsable/abonnes.blade.php --}}

<x-default-layout title="Gestion des abonnés">
    <div class="container-1">
        <div class="header-2">
            <div class="header-content-3">
                <h1>Abonnés à vos thèmes</h1>
                <p>Interface d'administration des utilisateurs.</p>
            </div>
        </div>
        <div class="table-wrapper-5">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-container-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Thèmes suivis</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($abonnes as $abonne)
                        <tr>
                            <td>{{ $abonne->name }}</td>
                            <td>{{ $abonne->email }}</td>
                            <td>
                                @foreach($abonne->subscribedThemes as $theme)
                                    @if(auth()->user()->managedThemes->contains($theme))
                                    <span class="badge bg-primary">
                                        {{ $theme->name }}
                                        <form
                                            method="POST"
                                            action="{{ route('responsable.desabonner', [$abonne, $theme]) }}"
                                            style="display: inline-block;"
                                        >
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btnAB" >
                                                <svg style="width:1.3rem;margin-right:0rem;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </span>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <!-- Autres actions -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-default-layout>
