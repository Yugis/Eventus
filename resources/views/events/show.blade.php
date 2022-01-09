<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Event Registrants') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    <div>
                        <h1>Event Registrants</h1>
                        <br>
                        <ul>
                            @forelse ($event->registrants as $user)
                                <li>- {{ $user->name }}</li>
                            @empty
                                <p class="text-gray-500">*No registrants for this event</p>
                            @endforelse
                        </ul>
                    </div>

                    @if (auth()->user()->isRegistered($event))
                        <div class="border-2 border-green-200 self-end p-2 text-green-400">
                            Registered!
                        </div>
                    @else
                        <form action="{{ route('eventRegistration.store', ['event' => $event]) }}" method="POST">
                            @csrf
                            <button type="submit" class="border-2 border-indigo-400 self-end p-2 text-indigo-400">
                                Register for this event
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
