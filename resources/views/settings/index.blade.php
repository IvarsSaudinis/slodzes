<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Konfigurācija') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message>{{ session('message') }}</x-message>
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Lomu pārvadlība</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Lomu kategorijas izveide, jaunu tiesību piešķiršana
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2 mb-4">
                            <div class="shadow overflow-hidden sm:rounded-md">

                                    <div class="px-4 py-5 bg-white sm:p-6 ">
                                        <a href="{{ route('roles.index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Atvērt lomu pārvaldības sadaļu
                                        </a>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>

                <x-simple-divider/>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Datubāzes jēlattēla lejupielāde</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Lejupielādēt saarhivētu datubāzes atlējumu
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2 mb-4">
                            <div class="shadow overflow-hidden sm:rounded-md">

                                <div class="px-4 py-5 bg-white sm:p-6 ">
                                    <a href="{{ route('settings.backup') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                       Lejupielādēt
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


</x-app-layout>
