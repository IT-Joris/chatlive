<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Component Start -->
                <div class="flex flex-col flex-grow w-full max-w-xl bg-white shadow-xl rounded-lg overflow-hidden" style="height: 70vh">
                    <div class="flex flex-col flex-grow h-0 p-4 overflow-auto">
                        <div class="flex w-full mt-2 space-x-3 max-w-xs">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                            <div>
                                <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                                <span class="text-xs text-gray-500 leading-none">Il y a 1 min</span>
                            </div>
                        </div>
                        <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                            <div>
                                <div class="bg-blue-500 text-white p-3 rounded-l-lg rounded-br-lg">
                                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                                </div>
                                <span class="text-xs text-gray-500 leading-none">Il y a 1 min</span>
                            </div>
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                        </div>
                    </div>

                    <div class="bg-gray-300 p-4">
                        <input class="flex items-center h-10 w-full rounded px-3 text-sm" type="text" placeholder="Entrer votre message...">
                    </div>
                </div>
                <!-- Component End  -->
            </div>
        </div>
    </div>
</x-app-layout>
