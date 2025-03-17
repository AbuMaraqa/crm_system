<x-core::layouts.settings>
    <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
        <div class="col-span-12 flex flex-col gap-y-7">
            <form wire:submit="save">
                <div class="space-y-6">

                    {{ $this->form }}

                    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end"
                         wire:key="{{ rand() }}">
                        <x-filament::button type="submit" size="md" wire:target="save" data-tw-merge color="primary"
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary">
                            @lang('Save Changes')
                        </x-filament::button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-core::layouts.settings>
