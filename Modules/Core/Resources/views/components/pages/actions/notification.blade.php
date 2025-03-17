<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">


    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h1 class="text-lg font-medium text-gray-580">
            @lang($this->notification->data['title'])
        </h1>

    </div>

    <div class="p-6 space-y-6">

        <p>
            @lang($this->notification->data['greeting'])
        </p>

        @foreach ($this->notification->data['databaseLines'] as $line)
            <p>
                @lang($line)
            </p>
        @endforeach

    </div>

    <div>
        <hr class="">

        <div class="flex justify-end">

            <p class="py-3 px-6">
                @lang($this->notification->data['salutation']),<br>
                <span class="text-primary font-bold">
                    {{ config('app.name') }}
                </span>
            </p>
        </div>
    </div>


</div>
