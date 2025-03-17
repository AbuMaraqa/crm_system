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
    $showIcon = $getShowIcon();
    $hideIcon = $getHideIcon();

$stylecode = '';
    $x = 0;
    if ($isRevealable() || $isGeneratable() || $isCopyable())
     {
        $x += $isRevealable() ? 2 : 0;
        $x += $isGeneratable() ? 2 : 0;
        $x += $isCopyable() ? 2 : 0;
        $stylecode = 'isRtl ? \'padding-left: '.$x.'rem\' : \'padding-right: '.$x.'rem\'';
     }

    $generatePassword = '
                    let chars = \''. $getPasswChars().'\';
                    let minLen = '. $getPasswLength(). ';


                    let password = [];
                    while(password.length <= minLen){
                        password.push(chars.charAt(Math.floor(Math.random() * 26)));
                        password.push(chars.charAt(Math.floor(Math.random() * 26) +26));
                        if(chars.length > 52 && password.length > 4){
                            password.push(chars.charAt(Math.floor(Math.random() * 10) +52));
                        }
                        if(chars.length > 62 && password.length > 4){
                            password.push(chars.charAt(Math.floor(Math.random() * 10) +62));
                        }
                    }
                    password = password.slice(0, minLen).sort(() => Math.random() - 0.5).join(\'\')

                    $wire.set(\'' . $getStatePath() . '\', password);
                ';
        if($shouldNotifyOnGenerate()){
            $generatePassword .= 'new FilamentNotification()
                            .title(\'' . $getGenerateText() . '\')
                            .seconds(3)
                            .success()
                            .send();';
        }

    $copyPassword = ' copyPassword: function() {
                    navigator.clipboard.writeText( $wire.get(\'' . $getStatePath() . '\'));
                    ';
                    if($shouldNotifyOnCopy() || true) {
                       $copyPassword .= "new FilamentNotification()
                            .title('" . $getCopyText() . "')
                            .seconds(3)
                            .success()
                            .send();";
                    }
                $copyPassword .= '}';

    $xdata = '{ show: true,
            isRtl: false,
            generatePasswd: function() {

                ' . $generatePassword . '
                },
                ' . $copyPassword . '
                }';
@endphp

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <x-filament::input.wrapper
        :disabled="$isDisabled"
        :inline-prefix="$isPrefixInline"
        :inline-suffix="$isSuffixInline"
        :prefix="$prefixLabel"
        :prefix-actions="$prefixActions"
        :prefix-icon="$prefixIcon"
        :suffix="$suffixLabel"
        :suffix-actions="$suffixActions"
        :suffix-icon="$suffixIcon"
        :valid="! $errors->has($statePath)"
        class="fi-fo-text-input"
        :attributes="
            \Filament\Support\prepare_inherited_attributes($getExtraAttributeBag())
                ->class(['overflow-hidden relative'])
        "
        x-data="{{ $xdata }}"
    >
        <x-filament::input
            :attributes="
                \Filament\Support\prepare_inherited_attributes($getExtraInputAttributeBag())
                    ->merge($extraAlpineAttributes, escape: false)
                    ->merge([
                        'autocapitalize' => $getAutocapitalize(),
                        'autocomplete' => $getAutocomplete(),
                        'autofocus' => $isAutofocused(),
                        'disabled' => $isDisabled,
                        'id' => $id,
                        'inlinePrefix' => $isPrefixInline && (count($prefixActions) || $prefixIcon || filled($prefixLabel)),
                        'inlineSuffix' => true,
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
                        ':type' => 'show ? \'password\' : \'text\'',
                        ':style' => $stylecode,
                        $applyStateBindingModifiers('wire:model') => $statePath,
                        'x-data' => (count($extraAlpineAttributes) || filled($mask)) ? '{}' : null,
                        'x-mask' . ($mask instanceof \Filament\Support\RawJs ? ':dynamic' : '') => filled($mask) ? $mask : null,
                    ], escape: false)

            "
             x-init="$nextTick(() => { isRtl = document.documentElement.dir === 'rtl' })"
             x-ref="{{ $getXRef() }}"

        />

        @if ($isRevealable() || $isGeneratable() || $isCopyable())

<div
            @class([
                'flex items-center gap-x-2 px-2',
                // 'ps-1',
                'border-s border-gray-200 ps-1 dark:border-white/10',
                'absolute top-0  height-100'
            ])
            :style="isRtl ? 'left:0;height:100%' : 'right:0;height:100%'"
        >
        @if ($isRevealable())
        <button type="button" class="flex hidden inset-y-0 right-0 justify-self-end items-center" @click="show = !show" :class="{'hidden': !show, 'block': show }">
           
            @svg($hideIcon,'w-5 h-5 text-gray-300 dark:text-gray-600')

        </button>
        <button type="button" class="flex hidden inset-y-0 right-0 items-center" @click="show = !show" :class="{'block': !show, 'hidden': show }">
            @svg($showIcon,'w-5 h-5 text-gray-300 dark:text-gray-600')

        </button>
        @endif
         @if ($isGeneratable())
                    <button
                        type="button"
                        x-on:click.prevent="generatePasswd()"
                    >
                    @svg('heroicon-m-key','w-5 h-5 text-gray-300 dark:text-gray-600')

                    </button>
                @endif

                @if ($isCopyable())
                    <button
                        type="button"
                        x-on:click.prevent="copyPassword()"
                    >
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
</svg>

                    </button>
                @endif
</div>
                @endif

    </x-filament::input.wrapper>

    @if ($datalistOptions)
        <datalist id="{{ $id }}-list">
            @foreach ($datalistOptions as $option)
                <option value="{{ $option }}" />
            @endforeach
        </datalist>
    @endif
</x-dynamic-component>
