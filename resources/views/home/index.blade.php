<x-default-layout title="Mon compte">

    <div class="form-container-1">
        <form action="{{ route('theme.update') }}" method="POST">
            @csrf
            @method('PATCH')



            <!-- Titre -->
            <div class="section-title-2">
                <h1>Gestion des abonnments</h1>
                <p>Vous pouvez géreé vos abonnments.</p>
            </div>

            <!-- Champs du formulaire -->
            <div class="form-fields-3">
                <div class="form-group">
                    <x-select name="theme_id" label="Thème" :list="$themes" :value="old('theme_id', auth()->user()->theme_id)" multiple class="form-control" />
                </div>
            </div>

            <!-- Bouton -->
            <div class="form-actions-5">
                <button type="submit">Abonnée</button>
            </div>
        </form>
    </div>
















    <div class="form-container-1">
        <form action="{{ route('home') }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Titre -->
            <div class="section-title-2">
                <h1>Mot de passe</h1>
                <p>Vous pouvez modifier votre mot de passe pour vos futures connexions.</p>
            </div>

            <!-- Champs du formulaire -->
            <div class="form-fields-3">
                <label class="input-label-4">
                    Mot de passe actuel
                    <input type="password" name="current_password" required>
                </label>

                <label class="input-label-4">
                    Nouveau mot de passe
                    <input type="password" name="password" required>
                </label>

                <label class="input-label-4">
                    Confirmation du nouveau mot de passe
                    <input type="password" name="password_confirmation" required>
                </label>
            </div>

            <!-- Bouton -->
            <div class="form-actions-5">
                <button type="submit">Modifier</button>
            </div>
        </form>
    </div>

</x-default-layout>




    


