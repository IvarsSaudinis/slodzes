<?php

namespace App\Imports;

use App\Models\Modules;
use App\Models\Plan;
use App\Models\PlanData;
use App\Models\PlanDistribution;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Row;

class ModulesImport implements OnEachRow, WithHeadingRow, SkipsEmptyRows, WithValidation
{
    use Importable;

    private $plan;

    public function  __construct($plan)
    {
        $this->plan = $plan;
    }

    /**
     * Importa faila galvene: Moduļa nosaukums	| Kods	| 1. kurss	| 2. kurss	| 3. kurss	| 4. kurss | Kopā	| Teorija |	Prakse
     *
     * @param Row $row
     */
    public function onRow(Row $row)
    {
        $row = $row->toArray();

        // moduļa koda labošana/jauna moduļa pievienošana
        $module = Modules::updateOrCreate(['name' => $row['modula_nosaukums']],
        [
            'name' => $row['modula_nosaukums'], 'code' => $row['kods']
        ]);

        // importējot moduļu sarakstu planam, izveidojam plāna struktūras atsauci
        $data = new PlanData();
        $data->plan_id = $this->plan[0];
        $data->module_id = $module->id;
        $data->code = $module->code;
        $data->save();

        // loģika veidojot plāna datu stuktūru (manuāla validācija, teorētisks sadalīums pa teoriju un praksi)

        /*
         * 1. nolasa laukus "teorija" un "prakse"
         * 2. Salīdzina šos datus ar 1. kursu,
         */
        $teorija = $row['teorija'];
        $prakse  = $row['prakse'];

         \Log::info("--------------------");
         \Log::info($row['modula_nosaukums']);
         \Log::info("1. kurss: " . $row['1_kurss']);
         \Log::info("2. kurss: " . $row['2_kurss']);
         \Log::info("3. kurss: " . $row['3_kurss']);
         \Log::info("4. kurss: " . $row['4_kurss']);
         \Log::info("Teorija: "  . $row['teorija']);
         \Log::info("Prakse: "   . $row['prakse']);


         

    }
    /**
    * @return array
    */
    public function startRow(): int
    {
        return 1;
    }

    /**
     * Validācijas nosacījumi katrai importa datnes kolonai
     * @return array
     */
    public function rules(): array
    {
        return [
            'modula_nosaukums' => [
                'required', 'string'
            ]
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'modula_nosaukums.required' => 'Šajā kolonā nepieciešami dati :attribute.',
        ];
    }

}
