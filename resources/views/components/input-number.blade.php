<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="number" class="form-control @error($name) is-invalid @enderror no-arrows" id="{{ $name }}"
        name="{{ $name }}" value="{{ old($name, $value) }}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<style>
    .no-arrows::-webkit-inner-spin-button,
    .no-arrows::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .no-arrows {
        -moz-appearance: textfield;
    }
</style>
