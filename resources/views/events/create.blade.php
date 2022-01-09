<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create an Event') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Create</h1>

                    <br>

                    <form class="flex flex-col" action="{{ route('events.store') }}" method="POST">
                        @csrf
                        <label for="title">Title</label>
                        <input type="text" name="title" required>

                        <label for="description">Description</label>
                        <textarea name="description" id="" cols="5" rows="3" required></textarea>

                        <br>

                        <button type="submit" class="rounded text-green-500 border-2 border-green-200 w-1/12 self-end">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
