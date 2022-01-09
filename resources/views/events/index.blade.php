<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Events') }}
            </h2>

            <div class="">
                <a href="{{ route('events.create') }}" class="text-green-400 border-2 border-green-200 p-2">Create new</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-center items-center flex-col">
                    <h1>A list of all events</h1>

                    <br>

                    @forelse($events as $event)
                        <div class="shadow-md rounded w-3/6 p-4 flex justify-between">
                            <div>
                                <h1 class="text-lg font-bold">{{ $event->title }}</h1>
                                <p class="text-sm text-gray-500">{{ $event->description }}</p>
                            </div>
                            <div class="flex flex-col">
                                <a href="{{ route('events.show', ['event' => $event]) }}"
                                    class="text-pink-400 border-2 border-pink-300 rounded px-2 mb-1 text-center">View Registerants</a>
                                @can('update', $event)
                                    <a href="{{ route('events.edit', ['event' => $event]) }}"
                                        class="text-blue-400 border-2 border-blue-300 rounded px-2 mb-1 text-center">Edit</a>

                                    <form action="{{ route('events.delete', ['event' => $event]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="text-red-400 border-2 border-red-300 rounded px-2 mb-1 text-center w-full">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </div>


                        <br>
                    @empty
                        <h1>No events available currently!</h1>
                    @endforelse

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
