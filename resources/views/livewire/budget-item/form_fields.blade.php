<!-- fields wrapper -->
<div class="space-y-6">

    <!-- Name and Amount -->
    <div class="flex space-x-4">
        <div>
            <x-input.stacked.text field="model.name">Name</x-input.stacked.text>
        </div>

        <div>
            <x-input.stacked.text field="model.amount">Amount</x-input.stacked.text>
        </div>
    </div>

    <!-- Category and Payment Date -->
    <div class="flex space-x-4">
               
        <div class="flex-1 space-y-1">
            <label class="space-x-1">
                <span class="text-gray-500 font-medium">Category</span>
                <i data-tippy-content="This is a required field" class="text-red-400">*</i>
            </label>

            @livewire('components.select-with-search', ['model' => 'App\Models\Category', 'field' => 'model["category_id"]'])

            @error('model.category_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex-1">
            <x-input.stacked.text field="model.payment_date">Payment Date</x-input.stacked.text>
        </div>
    </div>

    <!-- Alert and Order -->
    <div class="flex space-x-4">
        <div>
            <x-input.stacked.text field="model.should_alert">Alert</x-input.stacked.text>
        </div>

        <div>
            <x-input.stacked.text field="model.order">Order</x-input.stacked.text>
        </div>
    </div>

</div>