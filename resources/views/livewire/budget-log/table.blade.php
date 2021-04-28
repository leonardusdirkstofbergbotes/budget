<table class="w-full bg-white my-10 border shadow-md rounded">
    <thead class="border-b-2">
        <x-table.row>
            <x-table.head>Item</x-table.head>

            <x-table.head>Amount</x-table.head>

            <x-table.head>Left To pay</x-table.head>

            <x-table.head>Payment Date</x-table.head>

            <x-table.head class="text-right">Actions</x-table.head>
        </x-table.row>
    </thead>

    <tbody>
    @foreach($records as $record)
        <x-table.row>
            <x-table.cell>{{ $record->item->name }}</x-table.cell>
            <x-table.cell>R {{ $record->amount }}</x-table.cell>
            <x-table.cell>R {{ $record->remains() }}</x-table.cell>
            <x-table.cell>{{ $record->payment_date }}</x-table.cell>
            <x-table.cell>
                <div class="flex justify-end space-x-4 items-center">
                    <x-table.action.view></x-table.action.view>
                    <x-table.action.edit wire:click="edit({{ $record->id }})"></x-table.action.edit>
                    <x-table.action.delete wire:click="delete({{ $record->id }})"></x-table.action.delete>
                </div>
            </x-table.cell>
        </x-table.row>
    @endforeach
    </tbody>
</table>

<div>
    {{ $records->links('components.table.custom_paginate') }}
</div>


