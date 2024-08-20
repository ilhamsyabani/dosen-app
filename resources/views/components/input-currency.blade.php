<!-- resources/views/components/input-currency.blade.php -->
<div class="form-group mb-4">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="input-group">
        <span class="input-group-text">{{ $currencySymbol ?? 'Rp' }}</span>
        <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
            class="form-control {{ $class ?? '' }}" {{ $attributes }}>
        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
