<!-- Component Start -->
<div class="flex flex-col flex-grow w-full max-w-xl bg-white shadow-xl rounded-lg overflow-hidden" style="height: 70vh">
    <div class="flex flex-col flex-grow h-0 p-4 overflow-auto" id="chatAppScroll">
        @forelse($messages as $message)
            @if($message->user_id == auth()->user()->id)
                <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-500 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">{{ $message->content }}</p>
                        </div>
                        <span class="text-xs text-gray-500">{{ $message->user->name }} - {{ $message->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                </div>
            @endif

            @if($message->user_id != auth()->user()->id)
                <div class="flex w-full mt-2 space-x-3 max-w-xs">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                    <div>
                        <div class="bg-gray-500 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">{{ $message->content }}</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">{{ $message->user->name }} - {{ $message->created_at->diffForHumans() }}</span>
                    </div>
                </div>
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

    <div class="bg-gray-300 p-4">
        <form method="POST" class="flex gap-4" id="form-chat">
            <input class="flex items-center h-10 w-full rounded px-3 text-sm" name="content" id="content" type="text" placeholder="Entrer votre message...">
            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                Envoyer
            </button>
        </form>
    </div>
</div>
<!-- Component End  -->
