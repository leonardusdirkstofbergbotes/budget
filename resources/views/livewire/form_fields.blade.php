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
        <div>
            <x-input.stacked.text field="model.category_id">Category</x-input.stacked.text>
        </div>

        <div>
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