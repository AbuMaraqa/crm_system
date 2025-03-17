<div class="sticky bottom-0 mt-6">
    <div class="card rounded-2xl border border-slate-150 shadow-none dark:border-navy-600">
        <div class="flex p-3 md:justify-end">
            @if ($saveButton)
                <x-filament::button wire:key="{{ rand() }}" type="submit" size="md"
                                    color="info" wire:target="save" data-tw-merge
                                    class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 ml-2">
                    @lang('Save Changes')
                </x-filament::button>
            @endif

            @if ($saveAndContinueButton)
                <x-filament::button wire:key="{{ rand() }}" wire:click="saveAndContinue" type="button" size="md"
                                    color="success"  wire:target="saveAndContinue" data-tw-merge
                                    class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90 ml-2">
                    @lang('Create & create another')
                </x-filament::button>
            @endif

            @if ($cancelButton)
                <x-filament::button wire:key="{{ rand() }}" wire:click="cancel" type="button" size="md"
                                    color="secondary"  wire:target="cancel" data-tw-merge
                                    class="btn bg-slate-150 font-medium !text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90 ml-2">
                    @lang('Cancel')
                </x-filament::button>
            @endif
        </div>
    </div>
</div>
