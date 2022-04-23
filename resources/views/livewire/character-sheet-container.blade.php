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
                    <li wire:key="{{ $character->id }}">{{$character->name}}: {{$character->id}}</lI>
                @endforeach
                    {{ $characters->links() }}
                </div>

            </ul>

        </div>

        </div>
</div>