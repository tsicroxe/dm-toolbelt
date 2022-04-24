<div class="flex flex-col min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="ml-16 flex flex-col items-center justify-start border-2">

    <div id="demographics">
        <form wire:submit.prevent="save">

            <input type="text" wire:model.debounce.500ms="character.name" />
            @error('character.name') <span class="error text-red-500">{{ $message }}</span> @enderror


        </form>
    </div>
        
    </div>
</div>