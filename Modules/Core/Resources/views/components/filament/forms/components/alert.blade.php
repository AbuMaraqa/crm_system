<div
    class="alert flex overflow-hidden rounded-lg bg-{{ $getState()['type'] }}/10 text-{{ $getState()['type'] }} dark:bg-{{ $getState()['type'] }}-light/15 dark:text-{{ $getState()['type'] }}-light">
    <div class="w-1.5 bg-{{ $getState()['type'] }}"></div>

    <div class="p-4 flex items-center">
        {{ svg($getState()['icon'], 'h-8 w-8 me-2') }}
        {{ $getState()['message'] }}
    </div>
</div>
