<div>
    <ul class="flex flex-col space-y-4 items-center">

        @foreach($races as $race)
        <li>
            <a href="/race/{{$race->name}}">
                <p>{{$race->name}}</p>
            </a>
        </li>
        @endforeach
    </ul>
</div>