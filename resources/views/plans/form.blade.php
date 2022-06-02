<x-app-layout>
    <x-slot name="header">
        {{ __('Mācību plāns') }}
    </x-slot>

    <div class="py-2">
        <div class=" mx-auto sm:px-6 lg:px-8  ">
            <x-message>{{ session('message') }}</x-message>

           <strong>todo:</strong>
            <ul>
                <li>Plāna datu izvade (moduļu saraksts)</li>
                <li>Iespēja modulim piesaistīt pasniedzēju</li>
                <li>Iepsēja nodefinēt stundu skaitu nedeļā</li>
            </ul>
        </div>
    </div>
</x-app-layout>
