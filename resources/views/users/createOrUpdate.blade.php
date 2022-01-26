<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lietotāji') }}
        </h2>
    </x-slot>

    <div class="py-12">

        @if(isset($user))
            <form name="users" action="{{ route('users.update', $user->id) }}" method="post">
                @method('PATCH')
                @else
                    <form name="users" action="{{ route('users.store') }}" method="post">
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
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profila informācija </h3>
                                                    <p class="mt-1 text-sm text-gray-600">
                                                        Pamatinformācija par lietotāju.
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
                                                            <div class="col-span-6 sm:col-span-3">
                                                                <label for="name" class="block text-sm font-medium text-gray-700">Vārds
                                                                    <span class="text-red-500 required-dot">*</span>
                                                                </label>
                                                                <input type="text" name="name" id="name" value="{{old('name',$user->name ?? '' )}}"
                                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-3">
                                                                <label for="surname" class="block text-sm font-medium text-gray-700">Uzvārds</label>
                                                                <input type="text" name="surname" id="surname" value="{{old('surname',$user->surname ?? '' )}}"
                                                                       autocomplete="surname"
                                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-3">
                                                                <label for="email" class="block text-sm font-medium text-gray-700">E-pasta adrese
                                                                    <span class="text-red-500 required-dot">*</span>
                                                                </label>
                                                                <input type="text" name="email" id="email" value="{{old('email',$user->email ?? '' )}}"
                                                                       autocomplete="email"
                                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-3">
                                                                <label for="job" class="block text-sm font-medium text-gray-700">Amats</label>
                                                                <input type="text" name="job_title" id="job_title"
                                                                       value="{{old('job_title',$user->job_title ?? '' )}}" autocomplete="job"
                                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                            <hr/>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden sm:block" aria-hidden="true">
                                        <div class="py-5">
                                            <div class="border-t border-gray-200"></div>
                                        </div>
                                    </div>

                                    <div class="mt-10 sm:mt-0">
                                        <div class="md:grid md:grid-cols-3 md:gap-6">
                                            <div class="md:col-span-1">
                                                <div class="px-4 sm:px-0">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Parole</h3>
                                                    <p class="mt-1 text-sm text-gray-600">
                                                        Paroles norādīšana ir nepieciešama, ja lietotajam paredzēta autorizācija šajā tīmekļa vietnē.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="mt-5 md:mt-0 md:col-span-2">

                                                <div class="shadow overflow-hidden sm:rounded-md">
                                                    <div class="px-4 py-5 bg-white sm:p-6">
                                                        <div class="grid grid-cols-6 gap-6">

                                                            <div class="col-span-6 sm:col-span-3">
                                                                <label for="password" class="block text-sm font-medium text-gray-700">Parole</label>
                                                                <input type="password" name="password" id="password"
                                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-3">
                                                                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Parole
                                                                    atkārtoti</label>
                                                                <input type="password" name="confirm_password" id="confirm_password"
                                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                            <hr/>
                                                            {{--  <div class="col-span-6 sm:col-span-3">
                                                                  <label for="oauth" class="block text-sm font-medium text-gray-700"></label>
                                                                  <input type="checkbox" name="oauth"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500    shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                      Autorizācijai tiks izmantots oAuth pakalpojums
                                                                  </label>
                                                              </div>--}}
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden sm:block" aria-hidden="true">
                                        <div class="py-5">
                                            <div class="border-t border-gray-200"></div>
                                        </div>
                                    </div>

                                    <div class="mt-10 sm:mt-0">
                                        <div class="md:grid md:grid-cols-3 md:gap-6">
                                            <div class="md:col-span-1">
                                                <div class="px-4 sm:px-0">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Lietotāja lomas</h3>
                                                    <p class="mt-1 text-sm text-gray-600">
                                                        Vienam lietotājam var būt vairākas lomas, bet lielākoties viena loma ir pietiekami, lai realizētu
                                                        autorizācijas funkciju.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="mt-5 md:mt-0 md:col-span-2">
                                                <div class="shadow overflow-hidden sm:rounded-md">
                                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6"> <!-- content -->
                                                        <fieldset>
                                                            <legend class="text-base font-medium text-gray-900">Pieejamās lomas un to tiesības</legend>
                                                            <div class="mt-4 space-y-4">
                                                                @foreach($roles as $role)
                                                                    <div class="flex items-start">
                                                                        <div class="flex items-center h-5">
                                                                            <input id="role" name="roles[]" @if(isset($user) && $user->hasRole($role->name)) checked
                                                                                   @endif value="{{ $role->name }}" type="checkbox"
                                                                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                        </div>
                                                                        <div class="ml-3 text-sm">
                                                                            <label for="comments" class="font-medium text-gray-700">{{ $role->name }}</label>
                                                                            <p class="text-gray-500">
                                                                                @foreach($role->permissions as $permissions )
                                                                                    {{ $permissions->name }} @if(!$loop->last), @endif
                                                                                @endforeach
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </fieldset>

                                                    </div>
                                                </div>

                                                <div class="py-3 pr-0 text-right sm:px-6">
                                                    @if(isset($user))
                                                        @can('update', $user)
                                                            <button type="submit"
                                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                Labot lietotāju!
                                                            </button>
                                                        @endcan
                                                    @else
                                                        @can('create', \App\Models\User::class)
                                                            <button type="submit"
                                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                Izveidot lietotāju!
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
                    </form>
    </div>
</x-app-layout>

