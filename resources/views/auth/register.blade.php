
<div class="container">
    
    <!-- Conteneur Image -->
    <div class="image-container">
        <img src="{{ asset('images/motdepasse.jfif') }}" alt="Login Image">
    </div>

    <!-- Conteneur Formulaire -->
    <div class="form-container">
    
    <x-auth-layout title="Inscription" :action="route('register')" submitMessage="Inscription">
    <p >Necouvrez Nos Articles👆 </p>
<x-input name="name" label="Nom complet" />
<x-input name="email" label="Adresse e-mail" type="email" />
<x-input name="password" label="Mot de passe" type="password" />
<x-input name="password_confirmation" label="Confirmation du mot de passe" type="password" />

</x-auth-layout>
    </div>
</div>
