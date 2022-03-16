<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Slodzes') }}</title>

        <!-- Fonts -->
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
        <script src="//unpkg.com/alpinejs" defer></script>
        @livewireStyles
        @powerGridStyles
        @livewire('livewire-ui-modal')
        @livewire('livewire-toast')
    </head>
    <body class="font-sans antialiased">

    <div  x-data="{ open: false, menuOpen:false, yearsOpen:false }" @keydown.window.escape="open = false" class="h-screen flex overflow-hidden bg-gray-100">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div x-show="open" class="fixed inset-0 flex z-40 md:hidden" role="dialog" aria-modal="true">

            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>


            <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">

                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            @click="open = false">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-shrink-0 flex items-center px-4">
                    <img src="http://lvt.liepu.lv/img/lvt-logo-86.png" alt="LVT Logo">
                </div>
                <div class="mt-5 flex-1 h-0 overflow-y-auto">
                    <!-- Mobile MENU -->
                    @include('layouts.mobile-sidebar')
                </div>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">
                    <div class="flex items-center flex-shrink-0 px-4">
                        <img src="http://lvt.liepu.lv/img/lvt-logo-86.png" alt="LVT logo">
                    </div>
                    <div class="mt-5 flex-grow flex flex-col">
                      @include('layouts.desktop-sidebar')
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="relative z-1 flex-shrink-0 flex h-16 bg-white shadow">
                <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
                        @click="open = true">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu-alt-2 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Meklēt</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="search-field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Meklēt..." type="search" name="search">
                            </div>
                        </form>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                       {{-- <button class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>--}}
                           <div class="relative inline-block text-left">
                               <div>
                                   <button title="Mācību gads" @click="yearsOpen = !yearsOpen"  type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">

                                       @if($schoolYear)
                                            {{$schoolYear}}
                                       @else
                                           Mācību gads
                                       @endif
                                       <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                           <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                       </svg>
                                   </button>
                               </div>

                               <!--
                                 Dropdown menu, show/hide based on menu state.

                                 Entering: "transition ease-out duration-100"
                                   From: "transform opacity-0 scale-95"
                                   To: "transform opacity-100 scale-100"
                                 Leaving: "transition ease-in duration-75"
                                   From: "transform opacity-100 scale-100"
                                   To: "transform opacity-0 scale-95"
                               -->
                               <div :hidden="!yearsOpen"
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                   <div class="py-1" role="none">
                                       <form id="setYear" class=" divide-y divide-gray-100 " method="post" action="{{ route('settings.setYear') }}">
                                           @csrf
                                           <div class="py-1">
                                               <button name="year" value="-1" class="text-gray-700 text-left block px-4 py-2 block" style="width: 100%" role="menuitem" tabindex="-1" id="menu-item-0">Visi gadi</button>
                                           </div>
                                         <div  class="py-1">
                                             @foreach($availableYears as $y)
                                                 <button name="year" value="{{$y}}"  style="width: 100%"  class="text-gray-700 text-left block px-4 py-2 text-sm block @if($y === $schoolYear) bg-gray-100 text-gray-900 @endif" role="menuitem" tabindex="-1" id="menu-item-0">{{$y}}</button>
                                             @endforeach
                                         </div>


                                       </form>
                                   </div>
                               </div>
                           </div>


                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button  @click="menuOpen = !menuOpen" type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Atvērt izvēlni</span>
                                    <img class="h-8 w-8 rounded-full" src="{{ url('images/profile-icon.png') }}" alt="">
                                </button>
                            </div>


                            <div :hidden="!menuOpen"  class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <p class="block px-4 py-2 text-sm text-gray-700 font-bold" > {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>

                                {{--<a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Profils</a>
                               --}} {{--   <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>--}}
                                <form id="logout" method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <a  href="javascript:;" onclick="document.getElementById('logout').submit();"  class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Iziet</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <div x-data="{ open: false }" @keydown.window.escape="open = false" class="h-screen flex overflow-hidden bg-gray-100">

        <!-- Static sidebar for desktop -->
        <main class="flex-1 relative overflow-y-auto focus:outline-none">
            <div class="py-6">
                <div class="mx-auto px-4 sm:px-6 md:px-8 lg:px-14">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $header }}</h1>
                </div>
                <div class=" mx-auto px-4 sm:px-6 md:px-8">
                    <!-- Replace with your content -->
                    <div class="py-2">
                        <!-- subcomponent start -->
                        {{ $slot }}
                        <!-- subcomponent end/ -->
                    </div>
                    <!-- /End replace -->
                </div>
            </div>
        </main>


    </div>
        </div>


</div>

    </body>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts
    @powerGridScripts

</html>

