{{-- resources/views/admin/themes/responsables.blade.php --}}
<x-default-layout title="Gestion Responsables">




        <div class="container-1">
            <div class="header-2">
                <div class="header-content-3">
                    <h1>Gestion des Responsables</h1>
                    <h1>Assignation des responsables aux thèmes</h1>
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
                                <th>Thème</th>
                                <th>Responsables assignés</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($themes as $theme)
                            <tr>
                                <td>{{ $theme->name }}</td>
                                <td>
                                    @foreach($theme->responsables as $responsable)
                                        {{ $responsable->name }}@if(!$loop->last), @endif
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{ route('admin.themes.assign', $theme) }}" method="POST">
                                        @csrf
                                        <select name="user_id" class="form-select">
                                            <option value="">Sélectionner un responsable</option>
                                            @foreach($responsables as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="primary">Assigner</button>
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
