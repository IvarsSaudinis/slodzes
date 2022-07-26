<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="sm:flex sm:items-start p-7" x-data="{accept:false}">
        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Pievienot mācību plānam jaunu moduli?
            </h3>
            <div class="mt-2">
                <form name="modulesform" wire:submit.prevent="addModule">
                    <div class="mt-2">
                        <label for="plan" class="block text-sm font-medium text-gray-700">Izvēlētais plāns</label>
                        <select disabled id="plan" name="plan" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 text-gray-500 sm:text-sm rounded-md">

                            <option>{{ $plan['name'] }}</option>
                        </select>
                        <label for="module" class="block text-sm font-medium text-gray-700">Modulis</label>
                        <select wire:model="module" id="module" name="module" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 sm:text-sm rounded-md">
                            <option value="0">Izvēlēties moduli...</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{$module->name }}</option>
                            @endforeach
                        </select>

                        <hr class="my-3.5"/>

                        <div class="grid grid-cols-3 gap-2">
                            <div class="sm:col-span-1">
                                <label for="course1" class="block text-sm font-medium text-gray-700">
                                    Kurss
                                </label>
                                <div class="mt-1">
                                    <input readonly value="1" type="number" name="course[]" id="course[]"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <label for="theory1" class="block text-sm font-medium text-gray-700">
                                    Teorija
                                </label>
                                <div class="mt-1">
                                    <input wire:model="theory1" type="number" name="theory1" id="theory1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="sm:col-span-1">
                                <label for="practice1" class="block text-sm font-medium text-gray-700">
                                    Prakse
                                </label>
                                <div class="mt-1">
                                    <input wire:model="practice1" type="number" name="practice1" id="practice1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                        </div>

                        <div class="grid grid-cols-3 gap-2">
                            <div class="sm:col-span-1">
                                <label for="course1" class="block text-sm font-medium text-gray-700">
                                    Kurss
                                </label>
                                <div class="mt-1">
                                    <input readonly value="2" type="number" name="course[]" id="course[]"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <label for="theory2" class="block text-sm font-medium text-gray-700">
                                    Teorija
                                </label>
                                <div class="mt-1">
                                    <input wire:model="theory2" type="number" name="theory2" id="theory2" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="sm:col-span-1">
                                <label for="practice2" class="block text-sm font-medium text-gray-700">
                                    Prakse
                                </label>
                                <div class="mt-1">
                                    <input wire:model="practice2" type="number" name="practice2" id="practice2" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                        </div>

                        <div class="grid grid-cols-3 gap-2">
                            <div class="sm:col-span-1">
                                <label for="course1" class="block text-sm font-medium text-gray-700">
                                    Kurss
                                </label>
                                <div class="mt-1">
                                    <input readonly value="3" type="number" name="course[]" id="course[]"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <label for="theory3" class="block text-sm font-medium text-gray-700">
                                    Teorija
                                </label>
                                <div class="mt-1">
                                    <input wire:model="theory3" type="number" name="theory3" id="theory3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="sm:col-span-1">
                                <label for="practice1" class="block text-sm font-medium text-gray-700">
                                    Prakse
                                </label>
                                <div class="mt-1">
                                    <input wire:model="practice3" type="number" name="practice1" id="practice3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                        </div>

                        <div class="grid grid-cols-3 gap-2">
                            <div class="sm:col-span-1">
                                <label for="course" class="block text-sm font-medium text-gray-700">
                                    Kurss
                                </label>
                                <div class="mt-1">
                                    <input readonly value="4" type="number" name="course[]" id="course[]"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <label for="theory4" class="block text-sm font-medium text-gray-700">
                                    Teorija
                                </label>
                                <div class="mt-1">
                                    <input wire:model="theory4" type="number" name="theory4" id="theory4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="sm:col-span-1">
                                <label for="practice4" class="block text-sm font-medium text-gray-700">
                                    Prakse
                                </label>
                                <div class="mt-1">
                                    <input wire:model="practice4" type="number" name="practice4" id="practice1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                        </div>



                       {{-- <label for="course" class="block text-sm font-medium text-gray-700">Kurss</label>
                        <select wire:model="course" id="course" name="course" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="1">1. kurss </option>
                            <option value="2">2. kurss </option>
                            <option value="3">3. kurss </option>
                            <option value="4">4. kurss </option>
                        </select>

                        <label for="theory" class="block text-sm font-medium text-gray-700">Teorija</label>
                        <input wire:model="theory" type="number" id="theory" name="theory" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                        <label for="practice" class="block text-sm font-medium text-gray-700">Prakse</label>
                        <input wire:model="practice" type="number" id="practice" name="practice" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
--}}
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse p-7">
        <button wire:click="addModule" x-on:click="closeModal()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Pievienot
        </button>
        <button x-on:click="closeModalOnEscape()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" >
            Atcelt
        </button>
    </div>

</div>

