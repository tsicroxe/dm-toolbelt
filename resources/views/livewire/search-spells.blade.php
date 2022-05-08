<div class="w-full">
    <input type="text" wire:model="searchTerm" placeholder="Fireball" />

    <ul class="flex flex-col items-center mt-5">

        <div class="flex flex-col items-start">
            <table class="w-full text-center">
                <th>Level</th>
                <th>Spell</th>
                <th>School</th>
                <th>Damage Type</th>
                <th>Action</th>

                @foreach($spells as $spell)
                <tr class="h-12">
                    
                    <td>{{$spell->level}}</td>
                    <td class="hover:underline hover:bg-green-400">
                        <a href="/spells/{{$spell->id}}">
                            <p>{{$spell->name}}</p>
                        </a>
                    </td>
                    <td>
                        {{$spell->school}}
                    </td>
                    <td>{{$spell->damage_type ?? ''}}</td>
                    <td>{{$spell->cast_time}}</td>
                </tr>
            @endforeach
            </table>

            {{$spells->links()}}
        </div>

    </ul>
</div>