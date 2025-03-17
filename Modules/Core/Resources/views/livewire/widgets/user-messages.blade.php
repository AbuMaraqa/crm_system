<div class="alert flex overflow-hidden rounded-lg bg-info/10 text-info dark:bg-info/15 mt-4 mb-4">
    <div class="flex flex-1 items-center space-x-3 p-2">
        @svg('clarity-alert-line', 'h-6 w-6')

        <div class="flex flex-col justify-center">
            <span class="font-medium">
                {{ $this->message->title }}
            </span>
            <div>
                {!! $this->message->message !!}
            </div>
        </div>
    </div>

    <div class="w-1.5 bg-info"></div>
</div>
