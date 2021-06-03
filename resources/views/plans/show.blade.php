<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mācību plāni') }}: Elektortehniķis (2019)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">3624</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektroenerģētikas pamatprocesi un elektrotehnisko darbu veidi
                                        </div>

                                     </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">124</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">124</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektroietaišu montāžas atslēdznieka darbi
                                        </div>

                                     </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">124</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">124</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>


                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektroietaišu montāžas palīgdarbi
                                        </div>

                                     </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">124</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">124</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektrotehnikas pamati un elektriskie mērījumi
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">210</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">150</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">420</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektrodrošība elektroietaišu tehniskās ekspuatācijas un elektromontāžas darbos
                                        </div>

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">124</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">124</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektrisko mašīnu un iekārtu pieslēgšana
                                        </div>

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">0</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">132</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">132</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Spēka un apgaismes elektrotīklu ierīkošana
                                        </div>

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">0</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">262</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">262</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900 ">
                                            Elektroenerģijas pārvades līniju izbūve
                                        </div>

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">124</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">124</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Sadales ietaišu izbūve
                                        </div>

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">124</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">124</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektromontāžas darbu organizēšana
                                        </div>

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">0</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">72</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">72</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektrotehniskās dokumentācija
                                        </div>

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">0</div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">72</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">72</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Preču un pakalpojumu izvēle elektromontāžas darbiem
                                        </div>

                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">72</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">72</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Ārējo elektrotīklu tehniskās ekspluatācijas
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">100</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>

                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">100</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Ēku iekšējo elektrotīklu tehniskā ekspluatācija
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">36</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">72</div></td>

                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">108</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektrisko mašīnu un iekārtu iestatīšana un ekspluatācija
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">102</div></td>

                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">102</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Elektrotehniķa prakse
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">0</div></td>
                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">560</div></td>

                                    <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">560</div></td>
                                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Labot</td>
                                </tr>

                                <tr>
                                    <td colspan="7" class="px-6 py-4 whitespace-nowrap"><x-link-button>Pievienot</x-link-button></td>
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
