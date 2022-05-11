<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">

    <div class="ml-16">
        @if($this->featureFlag)
        <div class="flex mb-4">

            <div class="flex w-4/6 bg-gray-500 h-screen">

                <button wire:click="toggleFeatureFlag" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Close
                </button>

            </div>

            <div class="flex flex-col p-5 items-center w-2/6 bg-gray-400 h-screen">

                <div class="bg-transparent box-content h-16 w-16 md:h-32 md:w-32 lg:h-64 lg:w-64 border-4">
                    <!-- White box -->
                    <div id="content">
                        <img class="absolute h-16 w-16 md:h-32 md:w-32 lg:h-64 lg:w-64" src="{{ asset('photos/default_frame.png') }}">

                        @if ($photo)
                        <img class="rounded-full" src="{{ $photo->temporaryUrl() }}">
                        @endif
                    </div>
                </div>
                <form wire:submit.prevent="upload">
                    <input type="file" wire:model="photo">
                    @error('photo') <span class="error">{{ $message }}</span> @enderror
                    <button type="submit">Save Photo</button>

                </form>
            </div>
        </div>
        @else
        <div class="flex flex-col items-center justify-center">

            <p>Tokenizer coming soon!</p>
            <button wire:click="toggleFeatureFlag" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Preview
            </button>
        </div>

        @endif
    </div>
</div>