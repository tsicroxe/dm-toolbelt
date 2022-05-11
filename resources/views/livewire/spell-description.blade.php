<div class="ml-16 p-5 mt-8 items-center">

    <p class="text-2xl mt-5">{{$spell->name}}</p>

    <div class="grid grid-cols-4 gap-4 mt-5">
        <div>
            <p class="font-extrabold">Level</p>
            <p>{{$spell->level ?? ''}}</p>
        </div>
        <div>
            <p class="font-extrabold">Cast Time</p>
            <p>{{$spell->cast_time ?? ''}}</p>
        </div>
        <div>
            <p class="font-extrabold">Range/Area</p>
            <p>{{$spell->range_area ?? ''}}</p>
        </div>
        <div>
            <p class="font-extrabold">Components</p>
            <p>{{$spell->components ?? ''}}</p>
        </div>

        <div>
            <p class="font-extrabold">Duration</p>
            <p>{{$spell->duration ?? ''}}</p>
        </div>
        <div>
            <p class="font-extrabold">School</p>
            <p>{{$spell->school ?? ''}}</p>
        </div>
        <div>
            <p class="font-extrabold">Attack / Save</p>
            <p>{{$spell->attack_save ?? ''}}</p>
        </div>
        <div>
            <p class="font-extrabold">Damage type</p>
            <p>{{$spell->damage_type ?? ''}}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 mt-10">
        <p class="font-extrabold">Description</p>

        <p>
            {{$spell->description}}
        </p>
    </div>

    @if($spell->higher_level)
    <div class="flex flex-row mt-5">
        <p class="font-extrabold">Higher level <span class="font-normal">{{$spell->higher_level}}</span></p>
    </div>
    @endif
</div>