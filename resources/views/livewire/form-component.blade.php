<div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
    @if($currentPage === 1)
        <form wire:submit.prevent="goToNextPage">
            <div class="space-y-4">
            <div class="flex flex-col">
                <label  class="text-sm font-semibold text-gray-700 dark:text-gray-200" for="first_name">First Name</label>
                <input type="text" id="first_name" wire:model="first_name" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
            </div>
            <div class="flex flex-col">
                <label  class="text-sm font-semibold text-gray-700 dark:text-gray-200" for="last_name">Last Name</label>
                <input type="text" id="last_name" wire:model="last_name" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
            </div>
            <div class="flex flex-col">
                <label  class="text-sm font-semibold text-gray-700 dark:text-gray-200" for="address">Address</label>
                <input type="text" id="address" wire:model="address" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
            </div>
            <div class="flex flex-col">
                <label  class="text-sm font-semibold text-gray-700 dark:text-gray-200" for="city">City</label>
                <input type="text" id="city" wire:model="city" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
            </div>
             <x-form.country-select country="country" label="Country" />
             <x-form.date-select month="dob_month" day="dob_day" year="dob_year" label="Date of Birth" />
            <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-opacity-75">Next</button>
                </div>
        </form>
    @elseif($currentPage === 2)
        <form wire:submit.prevent="submit">
            <div class="flex flex-col">
                <label  class="text-sm font-semibold text-gray-700 dark:text-gray-200" for="married">Are you married?</label>
                <select id="married" wire:model="married"  wire:change="updateMarried">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            @if($married === 'yes')
                <x-form.date-select month="dom_month" day="dom_day" year="dom_year"  label="Date of Marriage"/>
                <x-form.country-select country="country" label="Country of Marriage" />
            @elseif($married === 'no')
                <div class="flex flex-col">
                    <label  class="text-sm font-semibold text-gray-700 dark:text-gray-200" for="widowed">Are you widowed?</label>
                    <select id="widowed" wire:model="widowed">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>

                        <option value="no">No</option>

                    </select>
                </div>
                <div class="flex flex-col">
                    <label  class="text-sm font-semibold text-gray-700 dark:text-gray-200" for="married_before">Have you ever been married in the past?</label>
                    <select id="married_before" wire:model="married_before">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            @endif
            <button type="button" wire:click="goToPreviousPage" class="px-4 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-opacity-75">Previous</button>
            <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-opacity-75">Submit</button>
        </form>
    @endif
</div>
