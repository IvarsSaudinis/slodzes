<x-app-layout>
    <x-slot name="header">
        {{ __('Mācību plāni') }}
    </x-slot>

    <div class="py-2">
        <div class=" mx-auto sm:px-6 lg:px-8  ">
            <x-message>{{ session('message') }}</x-message>

        </div>
    </div>
</x-app-layout>
