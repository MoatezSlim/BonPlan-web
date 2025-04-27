<div class="dark:bg-gray-800">
    <div class="bg-white rounded-lg p-4 max-w-sm mx-auto">
        <div class="flex items-center space-x-4">
            
            <div class="flex flex-col">
                <a href="{{ url('/') }}">
                <!-- Remplacer le texte "Chat" par votre logo -->
                <img src="storage/images/bon.jpg" alt="" class="h-8">
            </a>
            </div>
        </div>
        <div class="border-t-2 border-gray-200 px-2 pt-4 mb-2 sm:mb-0 message-list">
            <div class="flex flex-col space-y-2 h-[70svh]">
                @foreach ($chats->reverse() as $chat)
                    <div class="flex items-center space-x-4">
                        <div class="flex flex-col items-end w-full">
                            <div class="text-gray-600 text-sm">
                                {{ $chat['user'] }}
                            </div>
                            <div class="message {{ auth()->id() === $chat['user_id'] ? 'sent' : 'received' }}">
                                {{ $chat['message'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        
        
        <div x-data="{
            message: '',
            sendMessage() {
                if (this.message.trim() === '') return;
                $wire.sendMessage(this.message);
                this.message = '';
            }
        }" class="relative flex justify-end mt-4 message-input">
        
            <input type="text" placeholder="Write Something" x-model="message" x-on:keydown.enter="sendMessage"
                class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pr-12 bg-gray-200 rounded-full py-3">
               
            <span class="absolute inset-x-100 flex items-center">
                <button type="button" x-on:click="sendMessage"  
                class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-blue-500 text-white hover:bg-blue-400 focus:outline-none">
                Envoyer
            </button>
            

                <button>
                <a href="{{ url('/') }}"  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-blue-500 text-white hover:bg-blue-400 focus:outline-none " style="color: white !important;">Retour au tableau de bord
                    </a>
                    
                </button>
                
            </span>
        </div>
    </div>
</div>
