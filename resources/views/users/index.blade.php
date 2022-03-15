<x-app-layout>
    <x-slot name="header">
            {{ __('Lietotāji') }}
    </x-slot>

    <div class="py-2">
         <div class="mx-auto sm:px-6 lg:px-8">

             <x-message>{{ session('message') }}</x-message>

             <livewire:user-table/>

        </div>
    </div>
    <script>
        window.addEventListener('showAlert', event => {
            alert(event.detail.message);
        })

        window.addEventListener('showModal', event => {
            Livewire.emit('openModal', 'users-modules', [event.detail.users, event.detail.count]);
        })

    </script>

</x-app-layout>

