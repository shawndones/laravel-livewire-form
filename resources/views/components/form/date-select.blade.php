@props(['month', 'day', 'year','label'])

<div class="flex flex-col">
    <label class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $label  }}</label>
    @if($errors->has('dom'))
        <div style="color: red;">
            {{ $errors->first('dom') }}
        </div>
    @endif
    <select wire:model="{{ $month }}">
        <option value="">Month</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>

    <select wire:model="{{ $day }}">
        <option value="">Day</option>
        @for ($i = 1; $i <= 31; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <select wire:model="{{ $year }}">
        <option value="">Year</option>
        @for ($year = date('Y'); $year >= date('Y') - 100; $year--)
            <option value="{{ $year }}">{{ $year }}</option>
        @endfor
    </select>
</div>
