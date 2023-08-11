<div wire:key='{{ $todo->id }}'
    class="todo mb-5 card px-5 py-6 bg-white col-span-1 border-t-2 border-blue-500 hover:shadow duration-300">
    <div class="flex justify-between space-x-2">

        <div class="flex items-center">
            @if ($todo->completed)
            <input wire:click='toggle({{ $todo->id }})' class="mr-2" type="checkbox" checked>
            @else
            <input wire:click='toggle({{ $todo->id }})' class="mr-2" type="checkbox">
            @endif

            @if ($EditingTodoId === $todo->id)
            <div>
                <input wire:model='EditingName' type="text" placeholder="Todo.."
                    class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                @error('EditingName')
                <span class="mt-1 text-red-500 text-xs block">{{ $message }}</span>
                @enderror
            </div>
            @else
            <h3 class="text-lg text-semibold text-gray-800">{{ $todo->name }}</h3>
            @endif
        </div>


        <div class="flex items-center space-x-2">
            {{-- <button wire:click='edit({{ $todo->id }})'
                class="text-sm text-teal-500 font-semibold rounded hover:text-teal-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </button> --}}
            {{-- delete button --}}
            <button wire:click="delete({{ $todo->id }})"
                class="text-3xl text-red-500 font-semibold rounded hover:text-teal-800 mr-1">
                <svg style="color: red;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-x text-2xl outline-none" viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                        fill="red"></path>
                </svg>
            </button>
        </div>
    </div>
    {{-- <span class="text-xs text-gray-500"> {{ Carbon\Carbon::parse($todo->created_at)->diffForHumans() }} </span>
    --}}
    {{-- <div class="mt-3 text-xs text-gray-700">
        @if ($EditingTodoId === $todo->id)
        <button wire:click='update'
            class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Update</button>
        <button wire:click='cancelEdit'
            class="mt-3 px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600">Cancel</button>
        @endif

    </div> --}}
</div>