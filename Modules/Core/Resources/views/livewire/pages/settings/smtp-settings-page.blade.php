<x-core::layouts.settings>
    <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
        <div class="col-span-12 flex flex-col gap-y-7">
            <form wire:submit="save">
                <div class="space-y-6">

                    {{ $this->form }}

                    <div class="sticky bottom-0 mt-6">
                        <div class="card rounded-2xl border border-slate-150 shadow-none dark:border-navy-600">
                            <div class="flex p-3 md:justify-end">
                                <x-filament::button wire:key="{{ rand() }}" type="submit" size="md"
                                                    wire:loading.attr="disabled"
                                                    color="info"
                                                    class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 ml-2">
                                    @lang('Save Changes')
                                </x-filament::button>

                                <div wire:key="{{ rand() }}" class="me-2">
                                    {{ $this->sendTestEmail }}
                                </div>

                                <x-filament::button wire:key="{{ rand() }}" wire:click="cancel" type="button" size="md"
                                                    color="secondary" wire:loading.attr="disabled"
                                                    class="btn bg-slate-150 font-medium !text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90 ml-2">
                                    @lang('Cancel')
                                </x-filament::button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-filament-actions::modals />
</x-core::layouts.settings>
