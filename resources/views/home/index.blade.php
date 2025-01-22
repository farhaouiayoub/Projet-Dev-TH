<x-default-layout title="Mon compte">
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
