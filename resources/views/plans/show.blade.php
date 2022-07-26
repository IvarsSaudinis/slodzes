<x-app-layout>
    <x-slot name="header">
             {{ $plan->name }}
    </x-slot>

    <div class="py-2">
        <div class=" mx-auto sm:px-6 lg:px-8">

            <x-message>{{ session('message') }}</x-message>

            <div class="flex flex-col pt-4">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase ">

                                    </th>
                                    <th scope="col" colspan="4" class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dalījums pa kursiem
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Kopā
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Labot</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase ">
                                        Moduļa nosaukums
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">1. kurss</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">2. kurss</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">3. kurss</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">4. kurss</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider"></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <!-- tests -->
                                @foreach($plan->data as $data)
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="#">{{ $data->modulename->name }}</a>
                                            </div>

                                        </td>


                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">
                                            @foreach($data->distribution as $d)
                                                @if($d->course == 1)
                                                      {{  $d->theory + $d->practice  }}
                                                 @endif
                                            @endforeach
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                @foreach($data->distribution as $d)
                                                    @if($d->course == 2)
                                                        {{  $d->theory + $d->practice  }}
                                                     @endif
                                                @endforeach</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                @foreach($data->distribution as $d)
                                                    @if($d->course == 3)
                                                        {{  $d->theory + $d->practice  }}
                                                      @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                @foreach($data->distribution as $d)
                                                    @if($d->course == 4)
                                                        {{  $d->theory + $d->practice  }}
                                                     @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        <!-- Kopā -->
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                @php
                                                  $total = 0;
                                                @endphp

                                                @foreach($data->distribution as $d)
                                                    @php
                                                        $total = $total + $d->theory + $d->practice
                                                    @endphp

                                                @endforeach
                                                {{ $total ?? ''}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{--Labot--}}</td>
                                    </tr>

                                @endforeach

                                <!-- -->


                                <tr>
                                    <td colspan="7" class="px-6 py-4 whitespace-nowrap"><x-link-button href="{{ route('plans.edit', $plan->id) }}">Pievienot</x-link-button></td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
