<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('My Profile') }}
                    </h2>
                    <p><span class="font-bold text-gray-500">Name</span> {{ $user->name }}</p>
                    <p><span class="font-bold text-gray-500">Email</span> {{ $user->email }}</p>
                    <p><span class="font-bold text-gray-500">Phone</span> {{ $user->phone ?: '-' }}</p>
                    <p><span class="font-bold text-gray-500">Date of Birth</span> {{ $user->dob ?: '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
