<div class="w-full">
    <input type="text" wire:model="searchTerm" placeholder="Longsword" />

    <ul class="flex flex-col items-center mt-5">

        <div class="flex flex-col items-start">

            @foreach($equipment as $item)
            <li class="flex h-12">
                <a href="/equipment/{{$item->id}}">
                    <p>{{$item->name}}</p>
                </a>
            </li>
            @endforeach

            {{$equipment->links()}}
        </div>

    </ul>
</div>