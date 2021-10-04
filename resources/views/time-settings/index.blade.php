<x-app-layout>
    <x-slot name="header">
        {{ __('Nedēļu sadalījums 21./22. m.g.') }}
    </x-slot>

    <div class="py-2">
        <div class=" mx-auto sm:px-6 lg:px-8  ">

            <x-message>{{ session('message') }}</x-message>



            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nedēļas numurs
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Periods
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nosaukums
                                    </th>

                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Labošana</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($weeks as $week)
                                <tr >
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $week->id }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                        {{  $week->start->format('d.m.Y') }} - {{  $week->start->addDay(6)->format('d.m.Y')  }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                        {{ $week->name }}
                                    </td>

                                    <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Labot</a>
                                    </td>
                                </tr>
                                @endforeach

                                <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white shadow sm:rounded-lg mt-4">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Mācību gada nedēļu sadalījums,
                    </h3>
                    <div class="mt-2 sm:flex sm:items-start sm:justify-between">
                        <div class="max-w-xl text-sm text-gray-500">
                            <p>
                                Jauna mācību gada nedēļu saraksta tabulas ģenerēšana
                            </p>
                        </div>
                        <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                Izveidot mācību gada sadalījuma tabulu
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
