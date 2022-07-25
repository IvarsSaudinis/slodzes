<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jauna mācību gada izveide') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Mācību gads</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Vienkārša mācību gada izveide un automātisks nedēļu sadalījums. Brīvdienu nedēļu atzīmēšana notiek manuāli
                            citā skatā.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">


                    <form action="{{ route('settings.time-settings.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="shadow overflow-hidden sm:rounded-md">
                            @if ($errors->any())
                                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                                    <p class="font-bold">
                                        Uzmanību!
                                    </p>
                                    <p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    </p>
                                </div>
                            @endif
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Mācību gada nosaukums</label>
                                        <input placeholder="{{ date('y') . '/' . date('y')+1 }}" type="text" name="name" id="name" value="{{ old('name') ?? '' }}" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="start_date" class="block text-sm font-medium text-gray-700">Mācību gada sākuma datums</label>
                                        <input type="date" name="start_date" id="start_date" autocomplete="start_date" value="{{ old('start_date') ?? '' }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="weeks_count" class="block text-sm font-medium text-gray-700">Nedēļu skaits</label>
                                        <input type="number" value="{{ old('weeks_count') ?? '43' }}" name="weeks_count" id="weeks_count" autocomplete="weeks_count" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>


                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Izveidot</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</x-app-layout>

