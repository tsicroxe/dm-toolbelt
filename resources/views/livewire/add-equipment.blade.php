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