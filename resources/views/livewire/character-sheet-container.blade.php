<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="ml-16 flex flex-col items-center justify-start">
    <p class="self-start ml-12 text-3xl text-blue-400"> Your characters</p>

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
                            <td onclick="window.location='/characters/{{$character->id}}'" class="hover:bg-green-300">
                                {{$character->name}}
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
                                    
                            <button class="flex bg-blue-500  :bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mb-12">
                                Create a new character
                            </button>
            
                        </td>
                        <td></td>
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