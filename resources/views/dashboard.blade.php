<x-app-layout>
    <x-slot name="header">

            {{ __('Darbavirsma') }}

    </x-slot>

    <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

             <div class="grid grid-cols-3 gap-4">

                 <x-dashboard-infobox :title="$users_count">Lietotāji</x-dashboard-infobox>

                 <x-dashboard-infobox :title="$modules_count">Moduļi</x-dashboard-infobox>

             </div>

         </div>

    </div>
</x-app-layout>
