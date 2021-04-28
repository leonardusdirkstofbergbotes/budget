<button {{ $attributes }} wire:loading.attr="disabled" type="button" class="text-lg px-8 py-3 bg-blue-400 text-white rounded hover:bg-blue-500 hover:shadow-md hover:scale-125">
    {{ $slot }}
</button>