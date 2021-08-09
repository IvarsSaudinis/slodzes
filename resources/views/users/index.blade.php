<x-app-layout>
    <x-slot name="header">
            {{ __('Lietotāji') }}
    </x-slot>
    <div class="py-2">
         <div class=" mx-auto sm:px-6 lg:px-8  ">
             <x-message>{{ session('message') }}</x-message>
             @livewire('users')
        </div>
    </div>
</x-app-layout>

