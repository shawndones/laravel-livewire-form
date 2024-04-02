@props(['country', 'label'])

<div class="flex flex-col">
    <label class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $label }}</label>

    <select wire:model="{{ $country }}">
        <option value="">Select Country</option>
        <option value="US">United States</option>
        <option value="CA">Canada</option>
        <option value="MX">Mexico</option>
        <!-- Add more North American countries as needed -->
    </select>
</div>
