<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moduļi') }}
        </h2>
    </x-slot>

<div class="py-12">

        <form name="modules" action="{{ $module->exists == null ? route('modules.store') : route('modules.update', $module->id) }}" method="POST">

        @if(isset($module->exists))
            @method('PATCH')
        @endif

            @csrf
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Moduļa informācija </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Pamatinformācija par moduli.
                                </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">

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
                                    <div class="col-span-12 sm:col-span-4">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Nosaukums
                                            <span class="text-red-500 required-dot">*</span>
                                        </label>
                                        <input type="text" name="name" id="name" value="{{old('name',$module->name ?? '' )}}"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-12 sm:col-span-2">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Kods</label>
                                        <input type="text" name="code" id="code" value="{{old('code',$module->code ?? '' )}}"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-3 sm:col-span-6 lg:col-span-3">
                                        <x-label>Teorija</x-label>
                                        <input type="text" name="theory" id="theory" value="{{old('theory',$module->theory ?? '' )}}"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                    </div>
                                    <div class="col-span-3 sm:col-span-6 lg:col-span-3">
                                        <x-label>Prakse</x-label>
                                        <input type="text" name="practice" id="practice" value="{{old('practice',$module->practice ?? '' )}}"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>


                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="modules_type_id" class="block text-sm font-medium text-gray-700">Kategorija</label>
                                        <select name="modules_type_id"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <option></option>
                                            @foreach($modules_type as $mt)
                                                <option @if(isset($module->modules_type_id) && $module->modules_type_id==$mt->id) selected
                                                        @endif value="{{ $mt->id }}">{{ $mt->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                @if(isset($module))
                                    @can('update', $module)
                                        <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Labot moduli
                                        </button>
                                    @endcan
                                @else
                                    @can('create', \App\Http\Livewire\Modules::class)
                                        <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Izveidot moduli
                                        </button>
                                    @endcan
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>


            </form>
<!-- ------------------------------ -->
                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
    <!-- ------------------------------ -->
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Mācībspēku sasaiste ar moduli </h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                       Sasaiste ir noderīga, lai paātrinātu datu apstrādi
                                    </p>

                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow overflow-hidden sm:rounded-md">

                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid ">

                                                <div class="px-4 sm:px-6 lg:px-8">
                                                    <div class="sm:flex sm:items-center">
                                                        <a href="{{ route('users.index') }}"  class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Pievienot</a>
                                                    </div>
                                                    <div class="-mx-4 mt-3 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
                                                     {{--   <pre>{{ var_dump($modules_users) }}</pre>--}}
                                                        <table class="min-w-full divide-y divide-gray-300">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Vārds, uzvārds</th>
                                                                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">E-pasts</th>
                                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                                    <span class="sr-only">Noņemt</span>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            @foreach($modules_users as $module_user)
                                                                <tr>
                                                                    <td class="relative py-4 pl-4 sm:pl-6 pr-3 text-sm border-t border-transparent">
                                                                        <div class="font-medium text-gray-900">
                                                                            <a href="#">{{ $module_user->user->name ?? '' }} {{ $module_user->user->surname ?? '' }}</a>
                                                                        </div>
                                                                        <div class="mt-1 flex flex-col text-gray-500 sm:block lg:hidden">
                                                                            <span>{{ $module_user->user->email ?? '-' }}</span>
                                                                        </div>
                                                                        <div class="absolute right-0 left-6 -top-px h-px bg-gray-200"></div>
                                                                    </td>
                                                                    <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell border-t border-gray-200">{{ $module_user->user->email ?? '-' }}</td>
                                                                    <td class="relative py-3.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-medium border-t border-transparent">
                                                                        <button type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Noņemt<span class="sr-only">,  {{ $module_user->user->name ?? '-' }}</span></button>
                                                                        <div class="absolute right-6 left-0 -top-px h-px bg-gray-200"></div>
                                                                    </td>
                                                                </tr>


                                                            @endforeach



                                                            {{--<tr>
                                                                <td class="relative py-4 pl-4 sm:pl-6 pr-3 text-sm border-t border-transparent">
                                                                    <div class="font-medium text-gray-900">
                                                                        <a href="#">X Juris Stiegriņš</a>
                                                                    </div>
                                                                    <div class="mt-1 flex flex-col text-gray-500 sm:block lg:hidden">
                                                                        <span>juris@jur.lv</span>
                                                                    </div>
                                                                    <div class="absolute right-0 left-6 -top-px h-px bg-gray-200"></div>
                                                                </td>
                                                                <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell border-t border-gray-200">juris@jur.lv</td>
                                                                <td class="relative py-3.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-medium border-t border-transparent">
                                                                    <button type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Noņemt<span class="sr-only">, Startup</span></button>
                                                                    <div class="absolute right-6 left-0 -top-px h-px bg-gray-200"></div>
                                                                </td>
                                                            </tr>--}}

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
        <!-- ------------------------------ -->

</div>

</x-app-layout>

