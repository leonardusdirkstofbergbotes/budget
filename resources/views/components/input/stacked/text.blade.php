<div class="space-y-1">
    <label class="space-x-1">
        <span class="text-gray-500 font-medium">{{ $slot }}</span>
        <i data-tippy-content="This is a required field" class="text-red-400">*</i>
    </label>

    <input {{ $attributes }} class="p-4 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" placeholder="{{ $placeholder }}" wire:model.defer="{{ $field }}">

    @error($field)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>