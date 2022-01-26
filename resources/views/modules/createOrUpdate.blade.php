<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moduļi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(isset($module))
            <form name="modules" action="{{ route('modules.update', $module->id) }}" method="post">
                @method('PATCH')
                @else
                    <form name="users" action="{{ route('modules.store') }}" method="post">
                        @method('POST')
                        @endif
                        @csrf
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
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


                                </div>
                            </div>
                        </div>
                    </form>
    </div>
</x-app-layout>

