<div class="flex flex-col min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="ml-16 flex flex-col items-center justify-start border-2">

    <div id="demographics">
        <form wire:submit.prevent="save">

            <input type="text" wire:model.debounce.500ms="character.name" />
            @error('character.name') <span class="error text-red-500">{{ $message }}</span> @enderror

            <select name="race" wire:model="character.race_id" class="border shadow p-2 bg-white">
                <option value=''>Choose your race</option>
                @foreach($races as $race)
                    <option value="{{ $race->id }}">{{ $race->name }}</option>
                @endforeach
            </select>


            <ul>
                <li>
                    <td>Strength:</td>
                    <td><input type="text" wire:model.debounce.500ms="character.str_score" />
                        @error('character.str_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </td>
                    <td>{{$str_mod}}</td>
                </li>
    
                <li>
                    <td>Dexterity:</td>
                    <td><input type="text" wire:model.debounce.500ms="character.dex_score" />
                        @error('character.dex_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </td>
                    <td>{{$dex_mod}}</td>
                </li>
                
                <li>
                    <td>Constitution:</td>
                    <td><input type="text" wire:model.debounce.500ms="character.con_score" />
                        @error('character.con_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </td>
                    <td>{{$con_mod}}</td>
                </li>

                <li>
                    <td>Intelligence:</td>
                    <td><input type="text" wire:model.debounce.500ms="character.int_score" />
                        @error('character.int_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </td>
                    <td>{{$int_mod}}</td>
                </li>

                <li>
                    <td>Wisdom:</td>
                    <td><input type="text" wire:model.debounce.500ms="character.wis_score" />
                        @error('character.wis_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </td>
                    <td>{{$wis_mod}}</td>
                </li>

                <li>
                    <td>Charisma:</td>
                    <td><input type="text" wire:model.debounce.500ms="character.cha_score" />
                        @error('character.cha_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </td>
                    <td>{{$cha_mod}}</td>
                </li>
            </ul>

        </form>
    </div>
        
    </div>
</div>