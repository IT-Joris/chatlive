<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('partials.chat')
        </div>
    </div>

    <x-slot name="script">
        @vite('resources/js/echo/chat.js')
        @vite('resources/js/echo/file.js')
    </x-slot>

</x-app-layout>
