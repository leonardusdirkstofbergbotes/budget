<div x-data="{ showModal: @entangle('showForm') }">
    <x-modal.small-center headerText="Create a new budget item" 
        subText="Here you can add a new item to your budget. We will calculate based on which category you choose. You can also choose to recieve alerts for this budget item"
    >
        <x-slot name="modalContent">
            
            @include('livewire.form_fields')
            
        </x-slot>    

        <x-slot name="modalFooter">
            <div class="flex items-center space-x-2">
                <x-button.secondary wire:click="saveNewItem(true)">Save and create another</x-button.secondary>
                <x-button.primary wire:click="saveNewItem">Save this item</x-button.primary>
                <x-loader.ring target="saveNewItem" class="text-lg"></x-loader.ring>
            </div>
        </x-slot>
    </x-modal.small-center>
</div>