<div class="flex flex-col min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="ml-16 flex flex-col items-start justify-start border-2">

        <form wire:submit.prevent="save">
            <div id="demographics" class="m-5">

            <div class="flex flex-row">
                <label>Character: </label>
                    
                    <input type="text" wire:model.debounce.500ms="character.name" />
                    @error('character.name') <span class="error text-red-500">{{ $message }}</span> @enderror
        
            </div>
            <div class="flex flex-row justify-start">
                <label>Race: </label>
                <select class='w-auto' name="race" wire:model="character.race_id" class="border shadow p-2 bg-white">
                    @if(!$character->race)
                        <option value=''>Choose your race</option>
                    @endif
                    @foreach($races as $race)
                        <option value="{{ $race->id }}">{{ $race->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-row">
                <label>Level: <input type="text" wire:model.debounce.500ms="character.level" />
                @error('character.level') <span class="error text-red-500">{{ $message }}</span> @enderror</label>
            </div>

            <div class="flex flex-row">
                <label>Hit Points<input type="text" wire:model.debounce.500ms="character.current_hp" />
                 /
                <input type="text" wire:model.debounce.500ms="character.max_hp" />

                @error('character.max_hp') <span class="error text-red-500">{{ $message }}</span> @enderror
                @error('character.current_hp') <span class="error text-red-500">{{ $message }}</span> @enderror
                </label>
            </div>

            <div class="flex flex-row">
                <p>Armor Class: {{ $armor_class }}</p>
            </div>

        <p>Proficiency bonus: {{ $prof_bonus }} </p>
        <p>Initiative: {{ $initiative }} </p>

        <div id="ability_scores">

                <table class="table-auto">
                    <thead>
                        <th>Attribute</th>
                        <th>Score</th>
                        <th>Modifier</th>

                    </thead>
                    <tr>
                        <td>Strength:</td>
                        <td ><input class="w-12" type="text" wire:model.debounce.500ms="character.str_score" />
                        </td>
                        <td>{{$str_mod}}</td>
                        <td>
                            @error('character.str_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </td>
                    </tr>
        
                    <tr>
                        <td>Dexterity:</td>
                        <td><input class="w-12" type="text" wire:model.debounce.500ms="character.dex_score" />
                        </td>
                        <td>{{$dex_mod}}</td>
                        <td>
                            @error('character.dex_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Constitution:</td>
                        <td><input class="w-12" type="text" wire:model.debounce.500ms="character.con_score" />
                        </td>
                        <td>{{$con_mod}}</td>
                        <td>
                            @error('character.con_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>Inteltrgence:</td>
                        <td><input class="w-12" type="text" wire:model.debounce.500ms="character.int_score" />
                        </td>
                        <td>{{$int_mod}}</td>
                        <td>
                            @error('character.int_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>Wisdom:</td>
                        <td><input class="w-12" type="text" wire:model.debounce.500ms="character.wis_score" />
                        </td>
                        <td>{{$wis_mod}}</td>
                        <td>
                            @error('character.wis_score') <span class="error text-red-500">{{ $message }}</span> @enderror

                        </td>
                    </tr>

                    <tr>
                        <td>Charisma:</td>
                        <td><input class="w-12" type="text" wire:model.debounce.500ms="character.cha_score" />
                        </td>
                        <td>{{$cha_mod}}</td>
                        <td>
                            @error('character.cha_score') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                </table>
        </div>

        <div id="skills" class="flex">

                <table class="table-auto text-center">
                    <thead>
                        <th>Expertise</th>
                        <th>Total</th>
                        <th>Skill</th>
                    </thead>
                    <tr>
                        <td>
                        <select name="race" wire:model="character.acrobatics" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_acrobatics}}</td>

                        <td>Acrobatics (Dex}</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.animal_handling" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_animal_handling}}</td>

                        <td>Animal Handling (Wis)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.arcana" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_arcana}}</td>

                        <td>Arcana (Int)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.athletics" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_athletics}}</td>

                        <td>Athletics (Str)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.deception" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_deception}}</td>

                        <td>Deception (Dex)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.history" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_history}}</td>

                        <td>History (Int)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.insight" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_insight}}</td>

                        <td>Insight (Wis)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.intimidation" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_intimidation}}</td>

                        <td>Intimidation (Cha)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.investigation" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_investigation}}</td>

                        <td>Investigation (Int)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.medicine" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_medicine}}</td>

                        <td>Medicine (Wis)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.nature" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_nature}}</td>

                        <td>Nature (Int)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.perception" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_perception}}</td>

                        <td>Perception (Wis)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.performance" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_performance}}</td>

                        <td>Performance (Cha)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.persuasion" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_persuasion}}</td>

                        <td>Persuasion (Cha)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.religion" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_religion}}</td>

                        <td>Religion (Int)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.sleight_of_hand" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_sleight_of_hand}}</td>

                        <td>Sleight of Hand (Dex)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.stealth" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_stealth}}</td>

                        <td>Stealth (Dex)</td>
                    </tr>

                    <td>
                        <select name="race" wire:model="character.survival" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>{{ $total_survival}}</td>

                        <td>Survival (Wis)</td>
                    </tr>

                </table>

            </form>
        </div>
        
    </div>
</div>