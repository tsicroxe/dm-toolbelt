<div>
    <ul class="flex flex-col space-y-4 items-center">

        @foreach($classes as $class)
        <li>
            <a href="/classes/{{$class->name}}">
                <p>{{$class->name}}</p>
            </a>
        </li>
        @endforeach

    </ul>
</div>