

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <div class="input-group">
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"  value="{{ $value }}" >
    </div>

    @error($name)
        <p class="pp">{{ $message }}</p>
    @enderror



    @if($help)
        <p class="pp">{{ $help }}</p>
    @endif



    @if ($type === 'file' && $value)
    <p class="pp">Fichier actuel : {{ $value }}</p>
    @if ($isImage())
    <img class="pp" src="{{ asset('storage/' . $value) }}" alt="Image {{ $value }}">
    @endif
    @endif


</div>
