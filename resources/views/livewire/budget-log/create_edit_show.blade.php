<div x-data="{ showModal: @entangle('showForm') }">
    <x-modal.small-center headerText="Add a payment log" 
        subText="Here you can keep create a new payment log in order to get a full summary of what you have spent on which days."
    >
        <x-slot name="modalContent">
            
            @include('livewire.budget-log.form_fields')
            
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