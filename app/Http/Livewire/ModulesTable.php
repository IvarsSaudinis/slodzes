<?php

namespace App\Http\Livewire;

use App\Models\Modules;
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

final class ModulesTable extends PowerGridComponent
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
            ->showExportOption('modules', ['excel', 'csv'], ['class' => 'red-100']);
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
        return Modules::query()->with('type');
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
            ->addColumn('name', function (Modules $model) {
                return $model->name . (!empty($model->type) ? ' <div class="text-sm text-gray-400">' . $model->type->name . '</div>' : '');
            })
            ->addColumn('code')
            ->addColumn('theory')
            ->addColumn('practice')
            ->addColumn('created_at_formatted', function (Modules $model) {
                return Carbon::parse($model->created_at)->format('Y.m.d H:i');
            })
            ->addColumn('updated_at_formatted', function (Modules $model) {
                return Carbon::parse($model->updated_at)->format('Y.m.d H:i');
            });
    }


    /**
     * @return array
     */
    public function header(): array
    {
        return [
            Button::add('create-module')
                ->caption('Pievienot moduli')
                ->class('inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md text-sm mx-2 text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-0')
                ->route('modules.create', []),

            Button::add('add-to-module')
                ->caption('Plāna piesaiste')
                ->class('cursor-pointer inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500')
                ->emit('openModalPlans', []),
        ];
    }


    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(), [
            'openModalPlans',
        ]);
    }

    public function openModalPlans(): void
    {
        if (count($this->checkboxValues) == 0) {
            $this->dispatchBrowserEvent('showAlert', ['message' => 'Nepieciešams atlasīt vismaz vienu moduli!']);

            return;
        }

        $ids = implode(',', $this->checkboxValues);

        $this->dispatchBrowserEvent('showModal',
            [
                'message' => 'Atlasītie moduļi: ' . $ids,
                'modules' =>  $ids,
                'count' => count($this->checkboxValues)
            ]);


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
                ->makeInputRange(),

            Column::add()
                ->title('Modulis')
                ->field('name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('Kods')
                ->field('code')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('Teorija')
                ->field('theory')
                ->makeInputRange(),

            Column::add()
                ->title('Prakse')
                ->field('practice')
                ->makeInputRange(),

            Column::add()
                ->title('Izveidošana')
                ->field('created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('created_at'),

            Column::add()
                ->title('Labošana')
                ->field('updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('updated_at'),

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
     * PowerGrid Modules Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */


    public function actions(): array
    {
        return [
            Button::add('edit')
                ->caption('Labot')
                ->class('text-gray-600 hover:text-blue-900')
                ->route('modules.edit', ['module' => 'id']),

            Button::add('destroy')
                ->caption('<i class="fas fa-trash"></i>')
                ->class('bg-gray-100 hover:bg-grey-400 text-red-400 font-bold py-2 px-2 mx-2 rounded inline-flex items-center')
                ->route('modules.destroy', ['module' => 'id'])
                ->method('delete')
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
     * PowerGrid Modules Action Rules.
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
     * PowerGrid Modules Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Modules::query()->findOrFail($data['id'])
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
