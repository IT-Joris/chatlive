<!-- Component Start -->
<div class="grid grid-cols-1 gap-4">
    <div class="col-span-1 flex flex-col flex-grow w-full max-w-full bg-white dark:bg-gray-700 shadow-xl rounded-lg overflow-hidden" style="height: 70vh">
        <div class="flex flex-col flex-grow h-0 p-4 overflow-auto" id="chatAppScroll">
            @forelse($messages as $message)
                @if($message->user_id == auth()->user()->id)
                    @include('partials.message', ['other' => false, 'file' => false])
                @endif

                @if($message->user_id != auth()->user()->id)
                    @include('partials.message', ['other' => true, 'file' => false])
                @endif
            @empty
                <div class="flex w-full mt-2 space-x-3 max-w-xs">
                    <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                        <p class="text-sm">Aucun message</p>
                    </div>
                </div>
            @endforelse
            <div id="chatApp"></div>
        </div>

        <div class="bg-gray-300 dark:bg-gray-700 p-4">
            <form id="form-chat">
                <label for="chat" class="sr-only">Votre message</label>
                <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
{{--                                    <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">--}}
{{--                                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>--}}
{{--                                        <span class="sr-only">Upload image</span>--}}
{{--                                    </button>--}}
                    {{--                <button type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">--}}
                    {{--                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd"></path></svg>--}}
                    {{--                    <span class="sr-only">Add emoji</span>--}}
                    {{--                </button>--}}
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                    <textarea id="content" name="content" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Votre message..."></textarea>
                    <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                        <span class="sr-only">Send message</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Component End  -->
