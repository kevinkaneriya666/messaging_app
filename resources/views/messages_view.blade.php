@foreach ($messages as $message)
    @if ($message->from_id == $sender)
        <div class="message me mb-4 flex text-right">
            <div class="flex-1 px-2">
                <div class="flex items-center justify-end">
                    <div
                        class="inline-block bg-blue-800 rounded-full p-2 px-6 text-white">
                        <span>{{ $message->message }}</span>
                    </div>
                    <img class="w-4 ml-1 delete-message" data-message-id="{{ $message->id }}" src="{{ asset('images/delete.png') }}" alt="delete-message" style="cursor: pointer;" />
                </div>
                <div class="pr-4"><small
                        class="text-gray-500">{{ date('Y-m-d H:i',strtotime($message->created_at)) }}</small></div>
            </div>
        </div>
    @else
        <div class="message mb-4 flex">
            <div class="flex-2">
                <div class="w-12 h-12 relative">
                    <img class="w-12 h-12 rounded-full mx-auto"
                        src="{{ asset('images/user.png') }}"
                        alt="chat-user" />
                </div>
            </div>
            <div class="flex-1 px-2">
                <div
                    class="inline-block bg-gray-300 rounded-full p-2 px-6 text-gray-700">
                    <span>{{ $message->message }}</span>
                </div>
                <div class="pl-4"><small
                        class="text-gray-500">{{ date('Y-m-d H:i',strtotime($message->created_at)) }}</small></div>
            </div>
        </div>
    @endif
        
@endforeach
    