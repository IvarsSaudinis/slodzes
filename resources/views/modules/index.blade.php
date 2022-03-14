<x-app-layout>
    <x-slot name="header">
        {{ __('Moduļi') }}
    </x-slot>

    <div class="py-2">
        <div class="mx-auto sm:px-6 lg:px-8">

            <x-message>{{ session('message') }}</x-message>

            <livewire:modules-table/>

        </div>
    </div>
</x-app-layout>

