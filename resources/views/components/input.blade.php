<div {{ $attributes->merge(['class' => 'w-100 mt-2']) }}>
    <label class="form-label-lg fs-5 mx-3" for="formValidation{{ $label }}">{{ $label }}</label>
    <input type="{{ $type }}" id="formValidation{{ $label }}"
        class="form-control form-control-lg ps-3 @error($name) is-invalid @enderror" @if($required) required @endif
        placeholder="{{ $placeholder }}" value="{{ old($name) ?? $value }}" name="{{ $name }}" />
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
