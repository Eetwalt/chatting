<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ $room->name }}
    </h2>
</x-slot>

<div class="px-6 py-8 mx-auto max-w-7xl">
    <div class="w-full mb-6 border border-gray-500 rounded-lg aspect-video bg-white/10 overflow-clip" id="player"></div>
    <div class="grid grid-cols-12 gap-6">
        <livewire:chat.users :room="$room" />
        <div class="col-span-9 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <livewire:chat.messages :room="$room" />
                <form class="mt-3">
                    <label for="message" class="sr-only">Message</label>
                    <textarea name="message" id="message" rows="4"
                        class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                        placeholder="Type a message" wire:model="body" x-data="{
                            shift: false,
                            typingTimeout: null,
                            handleTypingFinished() {
                                Echo.private('chat.room.{{ $room->id }}')
                                    .whisper('not-typing', {
                                        id: {{ auth()->id()}}
                                    })
                                clearTimeout(this.typingTimeout)
                            }
                        }" x-on:keydown.shift="shift = true"
                        x-on:keyup.shift="shift = false"
                        x-on:keydown.enter="if (!shift || !$event.target.value) { $event.preventDefault() }"
                        x-on:keyup.enter.prevent="if (!shift && $event.target.value) { $wire.submit(); handleTypingFinished() }"
                        x-on:keydown="
                        clearTimeout(typingTimeout)
                        Echo.private('chat.room.{{ $room->id }}')
                            .whisper('typing', {
                                id: {{ auth()->id()}}
                            })
                        typingTimeout = setTimeout(handleTypingFinished, 3000)">
                    </textarea>
                </form>
            </div>
        </div>
    </div>
</div>
