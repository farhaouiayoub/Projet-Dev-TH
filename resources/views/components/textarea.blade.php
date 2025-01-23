<div class="textarea-container">
    <label for="{{ $id }}" class="textarea-label">{{ $label }}</label>
    <div class="textarea-group">
        <textarea
            id="{{ $id }}"
            name="{{ $name }}"
            rows="10"
            @class([
                'textarea-element',
                'textarea-error' => $errors->has($name)
            ])
        >{{ old($name) ?? $slot }}</textarea>
    </div>

    @error($name)
    <p class="error-message">{{ $message }}</p>
    @enderror

    @if ($help)
    <p class="help-text">{{ $help }}</p>
    @endif
</div>
