<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="ml-16 flex flex-col items-center justify-start">
        <p class="self-start ml-12 text-3xl text-blue-400"> Your characters</p>
        <a class="underline hover:text-red-500 hover:bg-green-500" href="https://media.wizards.com/2016/downloads/DND/SRD-OGL_V5.1.pdf" target="_blank">Click here to view the offical 5e SRD</a>
            <table class="table-fixed border-double border-4 border-sky-500 m-5 text-left">
                <thead>
                    <tr>
                        <th class="w-11/12">Character Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($characters as $character)
                    <tr class="h-16">
                            <td class="hover:bg-green-300 cursor-pointer" onclick="window.location='/characters/{{$character->id}}'">
                                {{$character->name}} - {{$character->race->name ?? ''}} 
                                @foreach($character->guilds as $guild)
                                <span>{{$guild->name}} {{$guild->pivot?->level}}</span>
                                @endforeach
                            </td>
                        <td>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mr-5 rounded" wire:click="delete({{$character->id}})">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach

                    <tr>

                        <td>
                            <livewire:create-character />

                        </td>
                    </tr>
                    <tr>
                        <td>
                        {{$characters->links()}}
                            
                        </td>
                    </tr>
                </tbody>

            </table>


        </div>
</div>