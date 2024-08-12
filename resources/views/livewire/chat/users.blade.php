<div class="col-span-3 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="mb-2 text-lg font-semibold">Users</h2>

        <ul class="space-y-1">
            @foreach ($this->users as $user)
                <li class="flex items-end justify-between px-3 py-1 space-x-1 bg-gray-700 rounded-lg">
                    <span>{{ $user->name }}</span>

                    <svg @class(['size-4 animate-bounce transition-opacity opacity-0', 'opacity-100' => in_array($user->id, $typingIds)])" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </li>
            @endforeach
        </ul>
    </div>
</div>
