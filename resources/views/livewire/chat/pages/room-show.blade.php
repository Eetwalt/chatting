<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ $room->name }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="grid grid-cols-12 gap-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="col-span-3 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                Users
            </div>
        </div>
        <div class="col-span-9 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div>
                    Messages
                </div>

                <form class="mt-3" x-data="{ shift: false }" x-on:keydown.shift="shift = true"
                    x-on:keyup.shift="shift = false"
                    x-on:keydown.enter="if (!shift && $event.target.value) { $event.preventDefault() }"
                    x-on:keyup.enter.prevent="if (!shift && $event.target.value) { $wire.submit() }">
                    <label for="message" class="sr-only">Message</label>
                    <textarea name="message" id="message" rows="4"
                        class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                        placeholder="Type a message" wire:model="body"></textarea>
                </form>
            </div>
        </div>
    </div>
</div>
