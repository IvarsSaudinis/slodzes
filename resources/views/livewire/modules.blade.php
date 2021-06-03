<div>
    <div class="flex justify-between">
        <div class="mt-1 justify-self-start rounded-md shadow-sm">
            <input wire:model="searchTerm" type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Meklēt...">
        </div>
        <x-link-button href="{{ route('modules.create') }}" class="mr-0">Pievienot moduli</x-link-button>
    </div>

    <div class="flex flex-col pt-4">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase ">
                               Modulis
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Teorija
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Prakse
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Labot</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($modules as $module)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $module->name }}
                                            </div>
                                            <div class="text-sm text-gray-400">
                                                {{ $module->type->name ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $module->theory }} </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $module->practice }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form action="{{ route('modules.destroy', $module->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                            <a href="{{ route('modules.edit', $module->id) }}" class="text-gray-600 hover:text-indigo-900">Labot</a>
                                            <button onclick="return confirm('Tiešām vēlaties dzēst?')" type="submit" class="bg-gray-100 hover:bg-grey-200 text-red-400 font-bold py-2 px-2 mx-2 rounded inline-flex items-center">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <div class=" px-4 py-3 justify-between border-t border-gray-200 sm:px-6">
                    {{ $modules->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
