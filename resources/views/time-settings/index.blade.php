<x-app-layout>
    <x-slot name="header">
        {{ __('Semestru nedēļu sadalījums: ' . $year->name) }}
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
                                        Mācību nedēļas numurs
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kalendāra nedēļas numurs
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Periods
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tips
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
                                        {{ $week->number }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $week->calendar_week_number }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                        {{  $week->start_date->format('d.m.Y') }} - {{  $week->start_date->addDay(6)->format('d.m.Y')  }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                        {{ $week->week_type->name }}
                                    </td>

                                    <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
                                      {{--  <a href="#" class="text-indigo-600 hover:text-indigo-900">Labot</a>--}}
                                    </td>
                                </tr>
                                @endforeach

                                <!-- More weeks... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white shadow sm:rounded-lg mt-4">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Jauna mācību gada izveide
                    </h3>
                    <div class="mt-2 sm:flex sm:items-start sm:justify-between">
                        <div class="max-w-xl text-sm text-gray-500">
                            <p>
                                Jauna mācību gada izveide un tā nedēļu saraksta tabulas ģenerēšana
                            </p>
                        </div>
                        <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                            <a href="{{ route('settings.time-settings.create') }}" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                Izveidot jaunu mācību gadu
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
