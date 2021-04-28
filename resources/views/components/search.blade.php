<div class="flex items-center">
    <div class="bg-white rounded-lg text-md flex items-center px-4 py-4 border">
        <input wire:model="search" class="outline-none" placeholder="Search" id="search_bar" {{ $attributes }} size="25">
        
        <div class="relative flex items-center" wire:loading.remove wire:target="search">
            
            <i class="fas fa-search absolute right-0 text-gray-500  {{ $search == '' ? '' : 'invisible' }}"></i>
           
            <i wire:click="$set('search', '')" class="fas fa-times cursor-pointer absolute right-0 text-gray-500 hover:text-gray-700  {{ $search == '' ? 'invisible' : '' }}" title="Clear search"></i>
        
        </div>
        
        <x-loader.ring target="search"></x-loader.ring>
    </div>
</div>