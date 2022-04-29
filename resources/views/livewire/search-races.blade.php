<div>
    <input type="text" wire:model="searchTerm" />

    <ul>

        @foreach($races as $race)
            <li>
                <p>{{$race->name}}</p>
            </li>
        @endforeach

        {{$races->links()}}

    </ul>
</div>
