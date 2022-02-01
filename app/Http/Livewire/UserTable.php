<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

final class UserTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('Lietotaji', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Builder
    {
        return User::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('surname')
            ->addColumn('name_surname', function (User $model) {
                return $model->name . ' ' . $model->surname . '  <div class="text-sm text-gray-500">' . $model->email . '</div>';
            })
            ->addColumn('password_rule', function (User $model) {
                return strlen($model->password) < 3 ? ' <i class="fas fa-lock text-xs font-medium text-gray-500"></i>' : '';
            })
            ->addColumn('job_title')
            ->addColumn('created_at')
            ->addColumn('roles', function (User $model) {
                $roles = $model->getRoleNames();
                $results = [];
                if ($roles) {
                    foreach ($roles as $role) {
                        $results[] = '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-50 text-gray-800">' . $role . '</span>';
                    }
                }
                return implode(' ', $results);
            })
            ->addColumn('created_at_formatted', function (User $model) {
                return Carbon::parse($model->created_at)->format('Y.m.d H:i');
            });
    }

    /**
     * @return array
     */
    public function header(): array
    {
        return [
            Button::add('create-user')
                ->caption('Pievienot lietotāju/mācībspēku')
                ->class('inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md text-sm mx-2 text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-0')
                ->route('users.create', []),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::add()
                ->title('ID')
                ->field('id')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title('Vārds')
                ->field('name')
                ->searchable()
                ->makeInputText('name')
                ->sortable()
                ->hidden(),

            Column::add()
                ->title('Vārds, Uzvārds')
                ->field('name_surname')
                ->makeInputText('name')
                ->makeInputText('surname')
                ->makeInputText('email')
                ->sortable(),

            Column::add()
                ->field('password_rule'),

            Column::add()
                ->title('Uzvārds')
                ->field('surname')
                ->searchable()
                ->makeInputText('surname')
                ->sortable()
                ->hidden(),

            Column::add()
                ->title('E-pasts')
                ->field('email')
                ->searchable()
                ->makeInputText('email')
                ->sortable()
                ->hidden(),

            Column::add()
                ->title('Amats')
                ->field('job_title')
                ->searchable()
                ->makeInputText('job_title')
                ->sortable(),

            Column::add()
                ->title('Autorizācijas lomas')
                ->field('roles'),

            Column::add()
                ->title('Izveidošana')
                ->field('created_at')
                ->hidden(),

            Column::add()
                ->title('Izveides laiks')
                ->field('created_at_formatted')
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */


    public function actions(): array
    {

        return [
            Button::add('edit')
                ->caption('Labot')
                ->class('text-gray-600 hover:text-indigo-900')
                ->route('users.edit', ['user' => 'id']),

            Button::add('destroy')
                ->caption('<i class="fas fa-trash"></i>')
                ->class('bg-gray-100 hover:bg-grey-400 text-red-400 font-bold py-2 px-2 mx-2 rounded inline-flex items-center')
                ->route('users.destroy', ['user' => 'id'])
                ->method('delete'),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid User Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\Rule>
     */


    public function actionRules(): array
    {
        return [
            Rule::button('edit')
                ->when(function ($model) {
                    return request()->user()->can('update', $model) === false;
                })
                ->hide(),

            Rule::button('destroy')
                ->when(function ($model) {
                    return request()->user()->can('delete', $model) === false;
                })
                ->hide(),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

    /**
     * PowerGrid User Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = User::query()
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
    */
}
