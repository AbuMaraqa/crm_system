@php
    use function Filament\Support\prepare_inherited_attributes;$gridDirection = $getGridDirection() ?? 'column';
@endphp

@props(['category', 'level' => 0])

<div
    wire:key="{{ $this->getId() }}.{{ $statePath }}.{{ $field::class }}.category.{{ $category['id'] }}"
    class="tree-category"
    x-data="{
        selected: false,
        toggleChildren(event) {
            this.selected = event.target.checked;

            // Update child checkboxes only if this.$refs.children is defined
            if (this.$refs.children) {
                this.$refs.children.querySelectorAll('input[type=checkbox]').forEach(childCheckbox => {
                    if (childCheckbox.checked !== this.selected) {
                        childCheckbox.checked = this.selected;
                        // Optionally trigger change event only if necessary
                        childCheckbox.dispatchEvent(new Event('change'));
                    }
                });
            }
        }
    }"
    style="padding-left: {{ $level > 0 ? '12px' : '0' }};"
>
    <label class="fi-fo-checkbox-list-option-label flex gap-x-3">
        <x-filament::input.checkbox
            :valid="! $errors->has($statePath)"
            :attributes="
                prepare_inherited_attributes($getExtraInputAttributeBag())
                    ->merge([
                        'disabled' => $isDisabled || $isOptionDisabled($category['id'], $category['title']),
                        'value' => $category['id'],
                        'wire:loading.attr' => 'disabled',
                        $applyStateBindingModifiers('wire:model') => $statePath,
                        'x-on:change' => 'toggleChildren($event)',
                    ], escape: false)
                    ->class(['mt-1'])
            "
        />

        <div class="grid text-sm leading-6">
            <span
                class="fi-fo-checkbox-list-option-label overflow-hidden break-words font-medium text-gray-950 dark:text-white">
                {{ $category['title'] }}
            </span>

            @if (isset($category['description']))
                <p class="fi-fo-checkbox-list-option-description text-gray-500 dark:text-gray-400">
                    {{ $category['description'] }}
                </p>
            @endif
        </div>
    </label>

    @if (!empty($category['children']))
        <div class="tree-children" x-ref="children">
            @foreach ($category['children'] as $child)
                @include('core::components.filament.forms.components.tree-checkbox-field', ['category' => $child, 'level' => $level + 1])
            @endforeach
        </div>
    @endif
</div>
