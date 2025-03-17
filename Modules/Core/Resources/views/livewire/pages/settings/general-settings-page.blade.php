<x-core::layouts.settings>
    <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
        <div class="col-span-12 flex flex-col gap-y-7">
            {{ $this->generalSettingsInfolist }}
            <form wire:submit="save">
                <div class="space-y-6">

                    {{ $this->form }}

                    <x-core::form.control-buttons saveButton cancelButton/>
                </div>
            </form>
        </div>
    </div>
</x-core::layouts.settings>
