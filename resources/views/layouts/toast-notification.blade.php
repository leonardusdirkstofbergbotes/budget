    <!-- succsessfull toast notifications -->
    <div x-data="{show: false, message: 'test message now'}" 
        x-on:success.window="show = true, message = $event.detail; setTimeout(() => { show = false }, 3500)" 
        x-show="show" class="fixed bottom-20 w-auto z-50 flex space-x-6 bg-green-400 flex items-center rounded shadow-md text-white p-6"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
    >
        <div class="capatalize font-semibold rounded-lg" x-text="message">
        </div>

        <i class="fas fa-times text-white cursor-pointer" title="close message" x-on:click="show = false"></i>
        
    </div>

     <!-- Unsuccsessfull toast notifications -->
    <div x-data="{show: false, message: 'test message now'}" 
        x-on:failed.window="show = true, message = $event.detail; setTimeout(() => { show = false }, 3500)" 
        x-show="show" class="fixed bottom-20 w-auto z-50 flex space-x-6 bg-red-400 flex items-center rounded shadow-md text-white p-6"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
    >
        <div class="capatalize font-semibold rounded-lg" x-text="message">
        </div>

        <i class="fas fa-times text-white cursor-pointer" title="close message" x-on:click="show = false"></i>
        
    </div>


    <!-- info toast notifications -->
    <div x-data="{show: false, message: 'test message now'}" 
        x-on:info.window="show = true, message = $event.detail; setTimeout(() => { show = false }, 3500)" 
        x-show="show" class="fixed bottom-20 w-auto z-50 flex space-x-6 bg-blue-400 flex items-center rounded shadow-md text-white p-6"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
    >
        <div class="capatalize font-semibold rounded-lg" x-text="message">
        </div>

        <i class="fas fa-times text-white cursor-pointer" title="close message" x-on:click="show = false"></i>
        
    </div>