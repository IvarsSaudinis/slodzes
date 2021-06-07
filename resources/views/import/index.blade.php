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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Moduļu importēšana </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Moduļu importēšana no Excel datnes ar vērtībām <em>nosaukums</em>, <em>teorija</em>, <em>prakse</em>. Ja moduļa nosaukums sakritīs ar jau esošu moduli, tad sistēmā tiks nomainīti esošie dati un jauns modulis netiks izveidots. <br/>
                                </p>
                                <p class="mt-1 text-sm text-blue-600">
                                    <a href="files/module_import_example.xlsx">Lejupielādēt importa faila piemēru</a>
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <form action="{{ route('import.modules') }}" method="post" enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="module_import" class="block text-sm font-medium text-gray-700">Datu fails</label>
                                                <input type="file" name="module_import" id="module_import" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Importēt
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <x-simple-divider/>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Lietotāju importēšana </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Lietotāju importēšana no Excel datnes ar vērtībām <em>vārds</em>, <em>uzvārds</em>, <em>e-pasts</em>. Ja e-pasts sakritīs ar jau esoša lietotāja e-pastu, tad sistēmā tiks nomainīti esošie dati un jauns lietotājs netiks izveidots. <br/>
                                </p>
                                <p class="mt-1 text-sm text-blue-600">
                                    <a href="files/user_import_example.xlsx">Lejupielādēt importa faila piemēru</a>
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <form action="{{ route('import.users') }}" method="post" enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="user_import" class="block text-sm font-medium text-gray-700">Datu fails</label>
                                                <input type="file" name="user_import" id="user_import" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 ">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="street_address" class="block text-sm font-medium text-gray-700">Lomas piešķiršana jauniem lietotājiem:</label>
                                                <div class="mt-4 space-y-4">
                                                    @foreach($roles as $role)
                                                        <div class="flex items-start">
                                                            <div class="flex items-center h-5">
                                                                <input id="role" name="role[]" value="{{ $role->name }}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                            </div>
                                                            <div class="ml-3 text-sm">
                                                                <label for="role" class="font-medium text-gray-700">{{ $role->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Importēt
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>






            </div>
        </div>

    </div>


</x-app-layout>
