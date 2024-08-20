<div class="mb-4">
    <label for="inputSelect" class="form-label">{{ $label }}</label>
    <select class="form-select @error($name) is-invalid @enderror" id="inputSelect" name="{{ $name }}">
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $key => $option)
            <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
