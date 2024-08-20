<div class="mb-4">
    <label for="inputFile" class="form-label">{{ $label }}</label>
    <input type="file" class="form-control @error($name) is-invalid @enderror" id="inputFile" name="{{ $name }}">
    @if(isset($file))
        <div class="mt-2">
            <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-outline-primary ">Lihat File</a>
        </div>
    @endif
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
