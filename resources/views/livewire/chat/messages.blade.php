<div class="h-64 px-4 py-3 overflow-y-scroll border border-gray-200 rounded-lg">
    <div class="pb-4 space-y-4 sm:[overflow-anchor:none]">
        @foreach ($messages as $message)
            <livewire:chat.message :message="$message" :key="$message->id" />
        @endforeach
    </div>

    <div x-init="$el.scrollIntoView()" class="sm:[overflow-anchor:auto] h-px">
    </div>
</div>
