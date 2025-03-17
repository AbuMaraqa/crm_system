<div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">

    <div class="col-span-12 mb-4">
        <div class="card rounded-2xl px-4 py-4 sm:px-5">
            <div>
                <h2 class="text-lg font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ $this->activityLog->created_at->translatedFormat('l, F j, Y') }}
                    <span class="text-slate-500">
                        ({{ $this->activityLog->created_at->translatedFormat('h:i A') }})
                    </span>
                </h2>
            </div>
            <div class="pt-2">

                <div class="gap-3.5 px-2 py-1.5 transition-all">
                    <div class="flex items-center justify-between">
                        <div class="flex items-start -mx-2">
                            <div>
                                <div class="image-fit h-12 w-12 overflow-hidden rounded-full border-2 border-slate-200/70">
                                    <img src="{{ asset('images/general/pin.png') }}" alt="Pin" class="p-1.5" width="50px"
                                         height="50px">
                                </div>
                            </div>
                            <div class="mx-2">
                                <div class="truncate font-semibold text-[1rem]">
                                    @lang(\Illuminate\Support\Str::title($this->activityLog->event))
                                </div>
                                <div class="mt-2 text-sm text-slate-500">
                                    {{ $this->activityLog->description }}
                                </div>
                                <div class="mt-2 text-sm text-slate-500">
                                    <span class="font-medium text-gray-800">
                                        {{ __('Added at') }}:
                                    </span>
                                    {{ $this->activityLog->created_at }}
                                </div>
                            </div>
                        </div>


                        @if ($this->activityLog->causer)
                            <div class="text-sm text-slate-500 flex items-center justify-center">
                                <span class="font-medium text-gray-800 me-2">
                                    {{ __('By') }}:
                                </span>
                                {!! $this->activityLog->causer->renderAsTableColumn() !!}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-6 flex items-center px-2">
                    <div class="w-full text-center">
                        <div class="font-semibold">
                            @lang('IP Address'):
                        </div>
                        <div class="mt-1 text-slate-500 ">
                            <span
                                class="rounded-full bg-[#D4F3E2] px-2 py-1 text-gray-600 dark:bg-darkmode-800 dark:text-slate-300 font-normal">
                                {{ $this->activityLog->ip_address ?? __('Unknown') }}
                            </span>
                        </div>
                    </div>
                    <div class="mx-5 h-7 w-px border-l border-dashed border-slate-300/70 sm:mx-7"></div>
                    <div class="w-full text-center">
                        <div class="font-semibold">
                            @lang('User Agents'):
                        </div>
                        <div class="mt-1 text-slate-500">
                            <span
                                class="rounded-full bg-slate-100 px-2 py-1 text-gray-600 dark:bg-darkmode-800 dark:text-slate-300 font-normal">
                                {{ $this->activityLog->getParsedUserAgent() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $changes = $this->activityLog->getChangesAttribute();

        $values = data_get($changes, 'attributes', []);

        if (blank($values)) {
            $values = data_get($changes, 'old', []);
        }
    @endphp

    @if (filled($values))
        <div class="md:col-span-6 col-span-12 mb-4">
            <div class="card rounded-2xl px-4 py-4 sm:px-5">
                <div class="overflow-auto xl:overflow-visible">
                    <table data-tw-merge="" class="w-full text-left">
                        <thead data-tw-merge="" class="">
                            <tr data-tw-merge="" class="">
                                <th data-tw-merge=""
                                    class="px-5 border-b dark:border-darkmode-300 border-slate-200/80 bg-[#7998DB] py-3.5 font-semibold text-white first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem]">
                                    @lang('Field')
                                </th>
                                <th data-tw-merge=""
                                    class="px-5 border-b dark:border-darkmode-300 w-56 border-slate-200/80 bg-[#7998DB] py-3.5 font-semibold text-white first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem]">
                                    @lang('Old')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($values as $field => $change)
                                @php
                                    $oldValue = $changes['old'][$field] ?? null;
                                @endphp
                                <tr data-tw-merge="" class="[&_td]:last:border-b-0">
                                    <td data-tw-merge=""
                                        class="px-4 py-2.5 font-semibold border-b dark:border-darkmode-300 rounded-l-none rounded-r-none border-x-0 border-t-0 border-dashed first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] dark:bg-darkmode-600">
                                        <div class="">
                                            {{ $this->getFieldLabel($field) }}
                                        </div>
                                    </td>
                                    <td width="80%" data-tw-merge=""
                                        class="px-4 py-2.5 border-b dark:border-darkmode-300 rounded-l-none rounded-r-none border-x-0 border-t-0 border-dashed first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] dark:bg-darkmode-600">
                                        <div class="flex items-center">
                                            <div class="ml-1.5 ">
                                                @if (empty($oldValue) || is_null($oldValue))
                                                    <span
                                                        class="rounded-full bg-slate-100 px-2 py-1 text-gray-600 dark:bg-darkmode-800 dark:text-slate-300 font-normal">
                                                        @lang('Empty')
                                                    </span>
                                                @elseif (is_array($oldValue))
                                                    {!! $this->getNestedArrayHTML($oldValue) !!}
                                                @else
                                                    {!! $oldValue !!}
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="md:col-span-6 col-span-12 mb-4">
            <div class="card rounded-2xl px-4 py-4 sm:px-5">
                <div class="overflow-auto xl:overflow-visible">
                    <table data-tw-merge="" class="w-full text-left">
                        <thead data-tw-merge="" class="">
                            <tr data-tw-merge="" class="">
                                <th data-tw-merge=""
                                    class="px-5 border-b dark:border-darkmode-300 border-slate-200/80 bg-[#F76F86] py-3.5 font-semibold text-white first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem]">
                                    @lang('Field')
                                </th>
                                <th data-tw-merge=""
                                    class="px-5 border-b dark:border-darkmode-300 w-56 border-slate-200/80 bg-[#F76F86] py-3.5 font-semibold text-white first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem]">
                                    @lang('New')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($values as $field => $change)
                                @php
                                    $newValue = $changes['attributes'][$field] ?? null;
                                @endphp
                                <tr data-tw-merge="" class="[&_td]:last:border-b-0">
                                    <td data-tw-merge=""
                                        class="px-4 py-2.5 font-semibold border-b dark:border-darkmode-300 rounded-l-none rounded-r-none border-x-0 border-t-0 border-dashed first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] dark:bg-darkmode-600">
                                        <div class="">
                                            {{ $this->getFieldLabel($field) }}
                                        </div>
                                    </td>
                                    <td width="80%" data-tw-merge=""
                                        class="px-4 py-2.5 border-b dark:border-darkmode-300 rounded-l-none rounded-r-none border-x-0 border-t-0 border-dashed first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] dark:bg-darkmode-600">
                                        <div class="flex items-center">
                                            <div class="ml-1.5 ">
                                                @if (empty($newValue) || is_null($newValue))
                                                    <span
                                                        class="rounded-full bg-slate-100 px-2 py-1 text-gray-600 dark:bg-darkmode-800 dark:text-slate-300 font-normal">
                                                        @lang('Empty')
                                                    </span>
                                                @elseif(is_array($newValue))
                                                    {!! $this->getNestedArrayHTML($newValue) !!}
                                                @else
                                                    {!! $newValue !!}
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @else
        <div class="col-span-12 mb-4">
            <div class="flex flex-col gap-x-6 gap-y-10 col-span-12">
                <div class="card rounded-2xl px-4 py-4 sm:px-5 h-full">
                    <img src="{{ asset('images/general/empty-data.png') }}" alt="No Data Image"
                         class="w-full h-96 object-contain">
                    <div class="text-center text-base font-medium text-slate-500">
                        {{ __('No changes were made.')}}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
