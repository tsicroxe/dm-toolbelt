<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">

    <div class="ml-16 flex flex-col items-center justify-start">
        
        <button class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mb-12">
            Create a new character
        </button>
        
        <div class="flex flex-col items-center">
            <h3>List of characters</h3>

            <ul class="flex flex-col items-center">
                <div>

                @foreach($characters as $character)
                    <div class="flex flex-row content-between">
                        <a href="{{route('character.view', ['character' => $character->id])}}">
                            <li class="leading-loose border-solid border-2 border-sky-500 mb-2 mt-2 hover:bg-green-400" wire:key="{{ $character->id }}">{{$character->name}}</lI>

                        </a>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:click="delete({{$character->id}})">
                            Delete
                        </button>
                    </div>
                @endforeach
                    {{ $characters->links() }}
                </div>

            </ul>

        </div>

        </div>
</div>