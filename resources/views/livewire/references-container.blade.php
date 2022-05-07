<div class="flex flex-col mt-6 min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">

    <div class="ml-16 flex flex-col gap-10 items-center justify-center">
        

        <div class="inline-flex rounded-md shadow-sm" role="group">
            <button wire:click="setActive('classes')" type="button" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Classes
            </button>
            <button wire:click="setActive('races')" type="button" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Races
            </button>
            <button wire:click="setActive('backgrounds')" type="button" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Backgrounds
            </button>
            <button wire:click="setActive('features')" type="button" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Features
            </button>
            <button wire:click="setActive('equipment')" type="button" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Equipment
            </button>
        </div>
        <div class="content-start">

        @switch($search)
            @case('classes')
                <p>classes</p>
                @break
            @case('races')
                <livewire:search-races />
                @break
            @case('backgrounds')
                <p>backgrounds</p>
                @break
            @case('features')
                <p>features</p>
                @break
            @case('equipment')
                <p>equipment</p>
                @break
            @default
                <p>It's not you, it's us! Something went wrong..</p>
                @break
        @endswitch
        </div>

    </div>


</div>