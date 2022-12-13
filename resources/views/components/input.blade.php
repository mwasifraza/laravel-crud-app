<div class="mb-2">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control">
    <small class="text-danger">
        @error($name) {{ $message }} @enderror
    </small>
</div>