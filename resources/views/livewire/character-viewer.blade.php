<div class="flex flex-col min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">

    <div class="flex mb-4 ml-16">
        <div class="w-1/2 bg-gray-400">


            <div class="w-full max-w-lg text-gray-700 p-5">
                <div class="flex flex-wrap -mx-3 mb-6 mt-5">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Character
                        </label>
                        <input class="appearance-none block w-full text-gray-700 border focus:border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Character McStabbypants" wire:model.debounce.500ms="character.name">
                        @error('character.name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3 focus:border-green-50">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Race
                        </label>
                        <select class='w-auto' name="race" wire:model="character.race_id" class="border shadow p-2 bg-white">
                            @if(!$character->race)
                            <option value=''>Choose your race</option>
                            @endif
                            @foreach($races as $race)
                            <option value="{{ $race->id }}">{{ $race->name }}</option>
                            @endforeach
                        </select>
                        @error('character.race') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror

                    </div>

                </div>

                <div class="flex flex-col justify-start">
                    <label class="inline-block w-32 font-bold">Classes:</label>

                    @foreach($character->guilds as $guild)

                    <div class="flex items-center border-b border-teal-500 py-2">
                        <p class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">{{$guild->name}} {{$guild->pivot?->level}}</p>
                        <button wire:click="deleteGuild({{$guild->id}})" class="bg-red-300 hover:bg-red-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            X
                        </button>
                    </div>

                    @endforeach


                    <form wire:submit.prevent="addGuildAndLevel">

                        <select name="guild" wire:model="guildForm.guild" class="border shadow p-2 bg-white">
                            <option value="">Select a Class</option>

                            @foreach($guilds as $guild)
                            <option value="{{ $guild->id }}">{{ $guild->name }}</option>
                            @endforeach
                        </select>

                        <select name="level" wire:model="guildForm.level" class="border shadow p-2 bg-white">
                            <option value="">Choose level</option>

                            @for ($i = 1; $i <= 20; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>

                        @error('guildForm.guild') <span class="error">{{ $message }}</span> @enderror
                        @error('guildForm.level') <span class="error">{{ $message }}</span> @enderror

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Class/Level
                        </button>

                    </form>

                    <div class="flex flex-row mt-5">
                        <label><strong>Hit Points: </strong>
                            <input class="w-12" type="text" wire:model.debounce.500ms="character.current_hp" />
                            /
                            <input class="w-12" type="text" wire:model.debounce.500ms="character.max_hp" />

                            @error('character.max_hp') <span class="error text-red-500">{{ $message }}</span> @enderror
                            @error('character.current_hp') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </label>
                    </div>

                    <div class="flex flex-col gap-x-8 mt-5">
                        <ps><strong>Armor Class:</strong> {{ $armor_class }}</p>
                            <ps><strong>Proficiency:</strong> {{ $prof_bonus }}</p>
                                <ps><strong>Initiative:</strong> {{ $initiative }}</p>
                    </div>
                </div>

                <div id="ability_scores" class="mt-5">

                    <table class="table-auto text-center">
                        <thead>
                            <th>Attribute</th>
                            <th>Score</th>
                            <th class='ml-4'>Modifier</th>

                        </thead>
                        <tr>
                            <td>Strength:</td>
                            <td><input class="w-12" type="text" wire:model.debounce.500ms="character.str_score" />
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
                            <td>Intelligence:</td>
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

                <livewire:spells-container character="{{ $character->id }}"/>


            </div>



        </div>
        <div class="w-1/2 bg-gray-500 p-5">

            <div id="skills" class="mt-5">

                <table class="w-full text-center">
                    <thead>
                        <th>Expertise</th>
                        <th>Total</th>
                        <th>Skill</th>
                    </thead>
                    <tr class="border">
                        <td>
                            <select name="acrobatics" wire:model="character.acrobatics" class="border shadow p-2 bg-white">
                                @foreach($skill_options as $option)
                                <option value="{{ $option}}">{{ $option }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{ $total_acrobatics}}</td>

                        <td>Acrobatics (Dex)</td>
                    </tr>

                    <tr class="border">
                    <td>
                        <select name="animal_handling" wire:model="character.animal_handling" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_animal_handling}}</td>

                    <td>Animal Handling (Wis)</td>
                    </tr>

                    <tr class="border">
                    <td>
                        <select name="arcana" wire:model="character.arcana" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_arcana}}</td>

                    <td>Arcana (Int)</td>
                    </tr>

                    <tr class="border">
                    <td>
                        <select name="athletics" wire:model="character.athletics" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_athletics}}</td>

                    <td>Athletics (Str)</td>
                    </tr>

                    <tr class="border">
                    <td>
                        <select name="deception" wire:model="character.deception" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_deception}}</td>

                    <td>Deception (Dex)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="history" wire:model="character.history" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_history}}</td>

                    <td>History (Int)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="insight" wire:model="character.insight" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_insight}}</td>

                    <td>Insight (Wis)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="intimidation" wire:model="character.intimidation" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_intimidation}}</td>

                    <td>Intimidation (Cha)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="investigation" wire:model="character.investigation" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_investigation}}</td>

                    <td>Investigation (Int)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="medicine" wire:model="character.medicine" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_medicine}}</td>

                    <td>Medicine (Wis)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="nature" wire:model="character.nature" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_nature}}</td>

                    <td>Nature (Int)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="perception" wire:model="character.perception" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_perception}}</td>

                    <td>Perception (Wis)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="performance" wire:model="character.performance" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_performance}}</td>

                    <td>Performance (Cha)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="persuasion" wire:model="character.persuasion" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_persuasion}}</td>

                    <td>Persuasion (Cha)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="religion" wire:model="character.religion" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_religion}}</td>

                    <td>Religion (Int)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="sleight_of_hand" wire:model="character.sleight_of_hand" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_sleight_of_hand}}</td>

                    <td>Sleight of Hand (Dex)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="stealth" wire:model="character.stealth" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_stealth}}</td>

                    <td>Stealth (Dex)</td>
                    </tr>

                    <tr class="border">

                    <td>
                        <select name="survival" wire:model="character.survival" class="border shadow p-2 bg-white">
                            @foreach($skill_options as $option)
                            <option value="{{ $option}}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $total_survival}}</td>

                    <td>Survival (Wis)</td>
                    </tr>

                </table>

            </div>


            <div class="flex flex-col w-full items-start gap-10 mt-5">

    <p class="text-4xl">Equipment</p>

    <table class="w-full text-center">
        <th>Name</th>
        <th>Quantity</th>
        <th>Action</th>

        @foreach($character->equipment as $item)

        <tr class="h-12">
            <td><a href="/equipment/{{$item->id}}" target="_blank">{{$item->name}}</a></td>
            <td>{{$item->pivot?->quantity}}</td>
            <td>
                <button wire:click="deleteItem({{$item->id}})" class="bg-red-300 hover:bg-red-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    X
                </button>
            </td>
        </tr>
        @endforeach
    </table>

    <form wire:submit.prevent="addItemAndQuantity">

        <select name="name" wire:model="itemForm.id" class="border shadow p-2 bg-white">
            <option value="">Select an item</option>

            @foreach($equipment as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <select name="quantity" wire:model="itemForm.quantity" class="border shadow p-2 bg-white">
            <option value="">Select quantity</option>

            @for ($i = 1; $i <= 20; $i++) <option value="{{ $i }}">{{ $i }}</option>
                @endfor
        </select>

        @error('itemForm.name') <span class="error">{{ $message }}</span> @enderror
        @error('itemForm..quantity') <span class="error">{{ $message }}</span> @enderror

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Item
        </button>

    </form>

</div>

        </div>




    </div>

</div>