<button {{ $attributes }} wire:loading.attr="disabled" type="button" style="padding: 10px;" class="text-lg px-6 text-blue-400 border-2 border-blue-400 rounded hover:text-blue-500 hover:shadow-md hover:scale-125">
    {{ $slot }}
</button>