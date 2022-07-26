<?php

namespace App\Http\Livewire;

use App\Models\Plan;
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

final class PlansTable extends PowerGridComponent
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
            ->showExportOption('download', ['excel', 'csv']);
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
        return Plan::query();
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
            ->addColumn('name', function (Plan $model) {
                return '<a href="' . route('plans.show', $model->id ) .'">' . $model->name . '</a>';
            })
            ->addColumn('year')
            ->addColumn('burden', function (Plan $model) {
                return '?';
            })
            ->addColumn('modules_count', function (Plan $model) {
                return $model->data->count();
            })
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', function (Plan $model) {
                return Carbon::parse($model->created_at)->format('Y.m.d H:i');
            });
    }


    /**
     * @return array
     */
    public function header(): array
    {
        return [
            Button::add('import')
                ->caption('Importēt mācību plānu')
                ->class('inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md text-sm mx-2 text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-0')
                ->route('import.index', []),
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
                ->title('Programmas nosaukums')
                ->field('name')
                ->searchable()
                ->makeInputText('name')
                ->sortable(),
            Column::add()
                ->title('Moduļu skaits')
                ->field('modules_count')
            // ->searchable()
            // ->makeInputText('name')
            //   ->sortable()
            ,
            Column::add()
                ->title('Mācību slodze stundās')
                ->field('burden')
            //  ->searchable()
            //  ->makeInputText('name')
            // ->sortable(),
            ,

            Column::add()
                ->title('Izveides datums')
                ->field('created_at')
                ->hidden(),

            Column::add()
                ->title('Izveides laiks')
                ->field('created_at_formatted')
            // ->makeInputDatePicker('created_at')
            // ->searchable()
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
     * PowerGrid Plan Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    public function actions(): array
    {

        return [
            Button::add('edit')
                ->caption('Labot')
                ->class('text-gray-600 hover:text-indigo-900')
                ->route('plans.edit', ['plan' => 'id']),

            Button::add('destroy')
                ->caption('<i class="fas fa-trash"></i>')
                ->class('bg-gray-100 hover:bg-grey-400 text-red-400 font-bold py-2 px-2 mx-2 rounded inline-flex items-center')
                ->route('plans.destroy', ['plan' => 'id'])
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
     * PowerGrid Plan Action Rules.
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
     * PowerGrid Plan Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Plan::query()
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
