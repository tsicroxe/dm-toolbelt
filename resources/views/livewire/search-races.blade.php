<div>
    <input type="text" wire:model="searchTerm" />

    <ul>

        @foreach($races as $race)
            <li>
                <a href="/race/{{$race->name}}"><p>{{$race->name}}</p></a>
            </li>
        @endforeach

        {{$races->links()}}

    </ul>
</div>
