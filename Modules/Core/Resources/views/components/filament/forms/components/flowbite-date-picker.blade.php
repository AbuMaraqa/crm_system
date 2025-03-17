{{-- @push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
@endpush
 --}}


@php
    $datalistOptions = $getDatalistOptions();
    $extraAlpineAttributes = $getExtraAlpineAttributes();
    $id = $getId();
    $isConcealed = $isConcealed();
    $isDisabled = $isDisabled();
    $isPrefixInline = $isPrefixInline();
    $isSuffixInline = $isSuffixInline();
    $mask = $getMask();
    $prefixActions = $getPrefixActions();
    $prefixIcon = $getPrefixIcon();
    $prefixLabel = $getPrefixLabel();
    $suffixActions = $getSuffixActions();
    $suffixIcon = $getSuffixIcon();
    $suffixLabel = $getSuffixLabel();
    $statePath = $getStatePath();
@endphp

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <x-filament::input.wrapper data-te-datepicker-init
    data-te-input-wrapper-init data-te-inline="true" :disabled="$isDisabled" :inline-prefix="$isPrefixInline" :inline-suffix="$isSuffixInline" :prefix="$prefixLabel" :prefix-actions="$prefixActions"
        :prefix-icon="$prefixIcon" :suffix="$suffixLabel" :suffix-actions="$suffixActions" :suffix-icon="$suffixIcon" :valid="!$errors->has($statePath)"
        class="fi-fo-text-input" :attributes="\Filament\Support\prepare_inherited_attributes($getExtraAttributeBag())->class(['overflow-hidden'])">


        {{-- <input

    datepicker 
    datepicker-format="dd/mm/yyyy"
    autocomplete="off"

    {{
                        \Filament\Support\prepare_inherited_attributes($getExtraInputAttributeBag())
                    ->merge($extraAlpineAttributes, escape: false)
                    ->merge([
                        'autocapitalize' => $getAutocapitalize(),
                        'autocomplete' => $getAutocomplete(),
                        'autofocus' => $isAutofocused(),
                        'disabled' => $isDisabled,
                        'id' => $id,
                        'inlinePrefix' => $isPrefixInline && (count($prefixActions) || $prefixIcon || filled($prefixLabel)),
                        'inlineSuffix' => $isSuffixInline && (count($suffixActions) || $suffixIcon || filled($suffixLabel)),
                        'inputmode' => $getInputMode(),
                        'list' => $datalistOptions ? $id . '-list' : null,
                        'max' => (! $isConcealed) ? $getMaxValue() : null,
                        'maxlength' => (! $isConcealed) ? $getMaxLength() : null,
                        'min' => (! $isConcealed) ? $getMinValue() : null,
                        'minlength' => (! $isConcealed) ? $getMinLength() : null,
                        'placeholder' => $getPlaceholder(),
                        'readonly' => $isReadOnly(),
                        'required' => $isRequired() && (! $isConcealed),
                        'step' => $getStep(),
                        'type' => blank($mask) ? $getType() : 'text',
                        $applyStateBindingModifiers('wire:model') => $statePath,
                        'x-data' => (count($extraAlpineAttributes) || filled($mask)) ? '{}' : null,
                        'x-mask' . ($mask instanceof \Filament\Support\RawJs ? ':dynamic' : '') => filled($mask) ? $mask : null,
                    ], escape: false)

    }}
    
    @class([
        'w-full border-none bg-transparent px-3 py-1.5 text-base text-gray-950 outline-none transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6',
    ])
/> --}}
            <x-filament::input data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref
            autocomplete="off"
            
            :attributes="\Filament\Support\prepare_inherited_attributes($getExtraInputAttributeBag())
                ->merge($extraAlpineAttributes, escape: false)
                ->merge(
                    [
                        'autocapitalize' => $getAutocapitalize(),
                        'autocomplete' => $getAutocomplete(),
                        'autofocus' => $isAutofocused(),
                        'disabled' => $isDisabled,
                        'id' => $id,
                        'inlinePrefix' =>
                            $isPrefixInline && (count($prefixActions) || $prefixIcon || filled($prefixLabel)),
                        'inlineSuffix' =>
                            $isSuffixInline && (count($suffixActions) || $suffixIcon || filled($suffixLabel)),
                        'inputmode' => $getInputMode(),
                        'list' => $datalistOptions ? $id . '-list' : null,
                        'max' => !$isConcealed ? $getMaxValue() : null,
                        'maxlength' => !$isConcealed ? $getMaxLength() : null,
                        'min' => !$isConcealed ? $getMinValue() : null,
                        'minlength' => !$isConcealed ? $getMinLength() : null,
                        'placeholder' => $getPlaceholder(),
                        'readonly' => $isReadOnly(),
                        'required' => $isRequired() && !$isConcealed,
                        'step' => $getStep(),
                        'type' => blank($mask) ? $getType() : 'text',
                        $applyStateBindingModifiers('wire:model') => $statePath,
                        'x-data' => count($extraAlpineAttributes) || filled($mask) ? '{}' : null,
                        'x-mask' . ($mask instanceof \Filament\Support\RawJs ? ':dynamic' : '') => filled($mask)
                            ? $mask
                            : null,
                    ],
                    escape: false,
                )" />

    </x-filament::input.wrapper>

    @if ($datalistOptions)
        <datalist id="{{ $id }}-list">
            @foreach ($datalistOptions as $option)
                <option value="{{ $option }}" />
            @endforeach
        </datalist>
    @endif
</x-dynamic-component>
