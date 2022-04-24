<div>
    <form wire:submit.prevent="createCharacter">

        <div>

            @if (session()->has('message'))
                <p class="text-green-700">
                    {{ session('message') }}
                </p>
            @endif
            @if (session()->has('max'))
                <p class="text-red-700">
                    {{ session('max') }}
                </p>
            @endif

        </div>

        <input type="text" placeholder="Name your hero.." wire:model="name">
        @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror

        <button type="submit" class="flex bg-blue-500  :bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mb-12 cursor-copy">
            Create
        </button>
    </form>
</div>
