<!-- This example requires Tailwind CSS v2.0+ -->
<div x-show="showModal" class="fixed z-10 inset-0 overflow-y-auto">
  <div class="hidden text-green-400 text-red-400 text-blue-400"></div>
  <div x-show="showModal" class="flex items-center min-h-screen h-full pt-4 px-4 pb-20 text-center sm:p-0"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"    

  >
    <div x-on:click="showModal = false" class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    
    <div x-show="showModal" class="mx-auto bg-white w-auto max-w-2xl rounded-lg p-10 pt-4 text-left overflow-hidden shadow-xl transform transition-all align-middle" role="dialog" aria-modal="true" aria-labelledby="modal-headline"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"  
    >
      <div>
        <div class="mt-3 text-center flex flex-col space-y-10">
            <div class="flex flex-col space-y-2">
                <i class="{{ $icon }} text-{{ $color }}-300" style="font-size: 50px;"></i>
                <h1 class="font-medium text-gray-700 text-xl" id="modal-headline">
                    {{ $headerText }}
                </h1>
            </div>
           
          <div class="mt-2">
            <p class="text-sm text-gray-500">
                {{$subText}}
            </p>
          </div>
        </div>
      </div>
      <div class="mt-6">
        {{ $modalContent }}
      </div>

        <!-- modal footer -->

      <div class="mt-14 flex items-center jusitfy-between">
        <button class="mr-auto text-gray-500 hover:text-gray-700" x-on:click="showModal = false">Cancel</button>

        {{ $modalFooter }}
      </div>
    </div>
  </div>
</div>
