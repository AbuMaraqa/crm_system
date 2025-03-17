<div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
    <div class="relative col-span-12 xl:col-span-3">
        <x-core::layouts.user-management-sidebar :user="$this->user" />
    </div>

    <div class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
        <x-core::layouts.user-personal-info :user="$this->user" />

        <form wire:submit="save">
            <div class="space-y-6">

                {{ $this->form }}

                <x-core::form.control-buttons saveButton cancelButton/>
            </div>
        </form>
    </div>
</div>
