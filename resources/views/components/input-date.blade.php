<!-- resources/views/components/input-date.blade.php -->
<div class="form-group mb-4">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="date" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
        class="form-control">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
