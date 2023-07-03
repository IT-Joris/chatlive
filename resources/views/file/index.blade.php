<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('File') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form class="flex items-center justify-center w-full" action="{{ route('dashboard.file.post') }}" method="POST" id="form-dropzone-file" enctype="multipart/form-data">
                    @csrf
                    <label for="dropzone-file"
                           class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-4">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                    class="font-semibold">Appuyez</span> ou faites glisser vos fichiers ici</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                        </div>
                        <input id="dropzone-file" type="file" name="file" class="hidden"/>
                    </label>
                </form>
            </div>

            <button type="submit" form="form-dropzone-file"
                    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mt-3">
                Enregistrer
            </button>

        </div>
    </div>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Taille
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($files as $file)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $file->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $file->size }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $file->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('dashboard.file.download', $file->id) }}" target="_blank"
                                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Download</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Aucun fichier
                                </th>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <x-slot name="script">
        @vite('resources/js/echo/file.js')
    </x-slot>

</x-app-layout>
