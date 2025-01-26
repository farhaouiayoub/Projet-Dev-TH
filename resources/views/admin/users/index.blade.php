{{-- resources/views/admin/users/index.blade.php --}}
<x-default-layout title="Gestion Users">

    <div class="container-1">
        <div class="header-2">
            <div class="header-content-3">
                <h1>Gestion des utilisateurs</h1>
                <p>Interface d'administration des utilisateurs.</p>
            </div>
        </div>
            <!-- Table des utilisateurs -->
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
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-default-layout>
