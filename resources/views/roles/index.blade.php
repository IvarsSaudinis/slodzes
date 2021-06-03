<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lomas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white max-w-full shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                       Lomu saraksts
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                       Lomu saraksts un tām piešķirtās tiesības
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        @foreach($roles as $role)
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <strong>{{ $role->name }}</strong>
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    @foreach($role->permissions as $p)
                                         {{ $p->name }} @if(!$loop->last), @endif
                                    @endforeach
                                </dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>

            {{--

                       @can('users-list')
                           Var aplūkot lietotājus                   @endcan

                      {{-- <ul>
                       @foreach($roles as $role)
                           <li>
                              <strong>{{ $role->name }}</strong>
                               <ul>
                               @foreach($role->permissions as $p)
                                   <li>{{ $p->name }}</li>
                               @endforeach
                               </ul>
                           </li>
                       @endforeach
                       </ul>
                       {{  Auth::user()->getRoleNames() }}--}}
        </div>
    </div>
</x-app-layout>

