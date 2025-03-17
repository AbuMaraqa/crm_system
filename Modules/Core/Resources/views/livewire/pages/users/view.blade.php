<div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
    <div class="relative col-span-12 md:col-span-4">
        <x-core::layouts.user-management-sidebar :user="$this->user" />
    </div>

    <div class="col-span-12 flex flex-col gap-y-7 md:col-span-8">
        <x-core::layouts.user-personal-info :user="$this->user" />
    </div>

    <x-filament-actions::modals />
</div>
