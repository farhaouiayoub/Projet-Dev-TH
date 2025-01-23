<div class="select-container">
    <label for="{{ $id }}" class="select-label">{{ $label }}</label>
    <div class="select-input-container">
        <select
            id="{{ $id }}"
            name="{{ $name . ($multiple ? '[]' : '') }}"
            @class([
                'select-element',
                'select-error' => $errors->has($name),
            ])
            @if ($multiple) multiple @endif
        >
            @foreach ($list as $item)
            <option
                value="{{ $item->$optionsValues }}"
                @selected($valueIsCollection ? $value->contains($item->$optionsValues) : $item->$optionsValues == $value)
            >
                {{ $item->$optionsTexts }}
            </option>
            @endforeach
        </select>
    </div>

    @error($name)
    <p class="error-message">{{ $message }}</p>
    @enderror

    @if ($help)
    <p class="help-text">{{ $help }}</p>
    @endif
</div>
