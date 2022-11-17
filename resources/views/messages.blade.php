<x-app-layout>
    <x-slot name="styles">
        <style>
            .chat-area {
                min-height: calc(100vh - 18rem);
            }

            .messages {
                max-height: 450px;
            }

            .sidebar {
                max-height: 590px;
            }

            .active {
                background-color: cornflowerblue;
            }

            ::-webkit-scrollbar {
                width: 5px;
                height: 5px;
            }

            ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                -webkit-border-radius: 10px;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
                -webkit-border-radius: 10px;
                border-radius: 10px;
                background: rgba(255, 255, 255, 0.3);
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
            }

            ::-webkit-scrollbar-thumb:window-inactive {
                background: rgba(255, 255, 255, 0.3);
            }

            .error{
                color: red;
            }
            .chat-heading{
                /* border-bottom: 1px solid #157eab;                  */
            }
        </style>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12" id="app">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-solid border-2 border-blue-800 border-gray-200">
                    <div class="main flex-1 flex flex-col">
                        <div class="flex-1 flex h-full">
                            <div
                                class="sidebar hidden lg:flex w-1/3 flex-2 flex-col pr-3 border-solid border-r-2 border-gray-400 mr-4">
                                <div class="flex-1 h-full overflow-auto px-4 bg-gray-300">
                                    @foreach ($users as $key=>$user)
                                        @if($key == 0)
                                            <input type="hidden" id="first_user" value="{{ $user->id }}" />
                                            <input type="hidden" id="first_user_name" value="{{ $user->name }}" />
                                        @endif
                                        <div data-id="{{ $user->id }}" class="user-cell entry cursor-pointer transform bg-white mb-4 rounded-xl p-4 flex shadow-md items-center">
                                            <div class="flex-2">
                                                <div class="w-12 h-12 relative">
                                                    <img class="w-12 h-12 rounded-full mx-auto"
                                                        src="{{ asset('images/user.png') }}"
                                                        alt="chat-user" />
                                                </div>
                                            </div>
                                            <div class="flex-1 px-2">
                                                <div class="w-32">
                                                    <span class="text-gray-800 user_name_{{$user->id}}">{{ $user->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="chat-area flex-1 flex flex-col">
                                <div class="flex-3">
                                    <h2 class="text-xl shadow-lg shadow-lg py-1 mb-8 border-b-2 border-gray-200 chat-heading"><p class="flex items-center"><img class="mr-2 w-12 h-12 rounded-full"
                                        src="{{ asset('images/user.png') }}"
                                        alt="chat-user" /><b id="chatting_with_name" class="capitalize"> </b></p></h2>
                                </div>
                                <div id="all_messages" class="messages flex-1 overflow-auto">
                                    
                                    
                                </div>                                
                                <div class="flex-2 pt-4 ">
                                    <div class="write bg-white shadow flex rounded-lg">                                        
                                        <div class="flex-1">
                                            <textarea name="message" id="message_box" class="w-full block outline-none py-1 px-4 h-10 bg-transparent message-content rounded-xl" rows="1"
                                                placeholder="Type a message..." autofocus  style="resize: none"></textarea>
                                        </div>
                                        
                                        <div class="flex-2 w-25 flex content-center items-center pl-3">
                                            <div class="flex-1">
                                                <button class="bg-blue-400 h-10 inline-block send-messsage px-4 rounded-lg text-white">
                                                    SEND
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>                                    
                                </div>                                
                                <p class="error"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            $(document).ready(function(){
                const base_url = '{{ url('/') }}';

                var first_user = $('#first_user').val();
                var first_user_name = $('#first_user_name').val();
                $('#chatting_with_name').text(first_user_name);                

                checkNewMessages();
                viewMessages(first_user,true);

                $(document).on('click','.user-cell',function(){
                    var chat_with_user_id = $(this).attr('data-id');
                    var chat_with_user_name = $('.user_name_'+chat_with_user_id).text();
                    $('#chatting_with_name').text(chat_with_user_name);
                    $('#first_user_name').val(chat_with_user_name);
                    $('#first_user').val(chat_with_user_id);
                                
                    viewMessages(chat_with_user_id,true);
                });

                $('.send-messsage').on('click',function(){
                    var text_message = $('#message_box').val();
                    var chat_with_user = $('#first_user').val();                    
                    sendMessage(text_message,chat_with_user);                    
                });

                $(document).on('click','.delete-message',function(){
                    var message_id = $(this).attr('data-message-id');
                    if(message_id){
                        var conf = confirm('Do yo really want to delete this message?');
                        if(conf == true){
                            deleteMessages(message_id);
                        }                        
                    }
                });

                function checkNewMessages(){
                    const interval = setInterval(function() {
                        var current_chat_user_id = $('#first_user').val();
                        viewMessages(current_chat_user_id,false);
                    }, 3000);
                }

                function sendMessage(message,to_id){
                    $.ajax({
                        type: "post",
                        url: base_url + "/messages/",
                        data: {
                            _token: "{{ @csrf_token() }}",
                            to_id: to_id,
                            message: message
                        },
                        success:function(response){
                            if(response.status == 1){                                
                                viewMessages(to_id,true);
                                $('#message_box').val('');
                                $('.error').text('');
                            } else{                                
                                $('.error').text(response.errors[0].message);
                            }
                        }
                    });   
                }

                function deleteMessages(id){
                    $.ajax({
                        type: "delete",
                        url: base_url + "/messages/" + id,
                        data: {
                            _token: "{{ @csrf_token() }}",
                        },
                        success:function(response){
                            if(response.status == 1){
                                var to_do = $('#first_user').val();
                                viewMessages(to_do,false);
                            }
                        }
                    });
                }

                function viewMessages(id,scroll=true){
                    $.ajax({
                        type: "get",
                        url: base_url + "/messages/" + id,                        
                        success:function(response){
                            if(response.status == 1){
                                $('#all_messages').html(response.data);                                
                                if(scroll == true){                                    
                                    $("#all_messages").animate({ scrollTop: ( $(window).height() + $(document).height() ) }, 500);
                                }                                
                            }
                        }
                    });                    
                }

            });            
        </script>       
    </x-slot>
</x-app-layout>
