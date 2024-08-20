<div class="mb-4">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
        name="{{ $name }}" value="{{ old($name, $value) }}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


