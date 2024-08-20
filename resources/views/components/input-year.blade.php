<div class="form-group mb-4">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control ">
        <option value="">{{ $placeholder ?? 'Pilih Tahun' }}</option>
        @foreach (range(date('Y'), 1999) as $year)
            <option value="{{ $year }}" {{ $year == $value ? 'selected' : '' }}>{{ $year }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
