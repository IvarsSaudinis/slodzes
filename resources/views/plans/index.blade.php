<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mācību plāni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-todo-alert/>
            <x-message>{{ session('message') }}</x-message>
            @livewire('plans')
        </div>
    </div>
</x-app-layout>
