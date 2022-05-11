<div class="flex flex-col w-full items-start gap-10 mt-5">

    <p class="text-4xl">Spells</p>

    <table class="w-full text-center">
        <th>Name</th>
        <th>Quantity</th>
        <th>Action</th>

    </table>

    <form wire:submit.prevent="removeSpell(null)">

        @foreach($character->spells as $spell)


        @endforeach
        <table>
            <th>Cantrips</th>

            <tr>
                <td></td>
            </tr>

        </table>

        <table>
            <th>Level 0</th>
            <th>Prepared</th>
            <th>Actions</th>

            @foreach($cantrips as $cantrip)
            <tr>
                <td>{{$cantrip->name}}</td>
                <td><input type="checkbox" value="{{$cantrip->pivot?->prepared}}"></input></td>
                <td>
                    <button wire:click="removeSpell({{$cantrip->id}})" class="bg-red-300 hover:bg-red-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        X
                    </button>
                </td>

            </tr>

            @endforeach
        </table>

    </form>

</div>