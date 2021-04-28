<div x-data="{ showOptions : @entangle('showOptions') }">
    
    <div x-on:click.away="showOptions = false" class="flex items-center justify-between w-full bg-white rounded-md border relative">
        <input x-on:click="showOptions = !showOptions" placeholder="{{ $placeHolder }}" class="w-full p-4 focus:outline-none focus:ring-2 rounded-t-md focus:ring-blue-400 focus:border-transparent" wire:model.debounce="search">
        @if ($search)
            <i title="Click to clear search" wire:click="clearSearch" class="w-10 absolute right-0 z-2 mr-4 pl-4 cursor-pointer text-md far fa-times-circle text-gray-400 hover:text-gray-500"></i>
        @else
            @if ($helperText)
                <x-input.field-hover-helper class="mr-4 absolute right-0" text="{{ $helperText }}"></x-input.field-hover-helper>
            @endif
        @endif
        
    </div>

    <div x-show="showOptions" class="relative z-40">
        <div class="absolute top-0 bg-white w-full border rounded-b-md">
            @forelse($options as $option)
                @if ($loop->iteration > $limit)
                    @break
                @endif
                <div x-on:click="showOptions = false" wire:click="selectOption({{ $option->id ?? null }}, '{{ $option->full_name ?? $option->name ?? $option->first_name ?? $this->loadRelationship($option) ?? 'No Valid Name' }}')" class="p-4 hover:bg-gray-100 cursor-pointer" value="{{ $option->id ?? null }}">{{ $option->full_name ?? $option->name ?? $option->first_name ?? $this->loadRelationship($option) ?? 'No Valid Name' }}</div>
            @empty
                <div wire:click="clearSearch" class="p-4 text-center font-semibold">
                    No Results Found
                </div>
            @endforelse
            
            <div class="p-3 bg-gray-200 border-t text-center text-sm">start typing to see more results</div>
        </div>
    </div>
</div>