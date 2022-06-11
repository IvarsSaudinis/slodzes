<?php

namespace App\Imports;

use App\Models\Modules;
use App\Models\Plan;
use App\Models\PlanData;
use App\Models\PlanDistribution;
use Illuminate\Database\Eloquent\Model;
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

    private $rows = 0;

    public function __construct($plan)
    {
        $this->plan = $plan;
    }

    /**
     * Importa faila galvene: Moduļa nosaukums  | Kods  | 1. kurss  | 2. kurss  | 3. kurss  | 4. kurss | Kopā   | Teorija | Prakse
     *
     * @param Row $row
     */
    public function onRow(Row $row)
    {
        $row = $row->toArray();

        // moduļa koda labošana/jauna moduļa pievienošana
        $module = Modules::updateOrCreate(
            ['name' => $row['modula_nosaukums']],
            [
            'name' => $row['modula_nosaukums'], 'code' => $row['kods']
            ]
        );

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

        $kopaa = $teorija + $prakse;


        if ($row['1_kurss']>0) {
             $pd = new PlanDistribution();
             $pd->plan_data_id = $data->id;
             $pd->course = 1;
             //1 = tikai viens ieraksts
            if ($row['1_kurss']==($prakse + $teorija)) {
                $pd->theory = $teorija ?? 0 ;
                $pd->practice = $prakse ?? 0;

                $teorija = 0;
                $prakse = 0;
            }
             // ir kaut kas cits
            else {
                // atlikuma rēķināšana praksei
                if ($row['1_kurss'] > $teorija) {
                    $pd->theory = $teorija;
                    $pd->practice = $row['1_kurss'] - $teorija;
                    // atlikušā prakse
                    $teorija = 0;
                    $prakse =  $prakse - $pd->practice;
                }

                if ($row['1_kurss'] < $teorija) {
                    $pd->theory = $row['1_kurss'];
                    $pd->practice = 0;
                    // atlikušā teorija
                    $teorija = $teorija - $pd->theory ;
                }
            }

             $pd->save();
        }

        if ($row['2_kurss']>0) {
            $pd = new PlanDistribution();
            $pd->plan_data_id = $data->id;
            $pd->course = 2;
            //1 = tikai viens ieraksts
            if ($row['2_kurss']==($prakse + $teorija)) {
                $pd->theory = $teorija ?? 0 ;
                $pd->practice = $prakse ?? 0;

                $teorija = 0;
                $prakse = 0;
            }
            // ir kaut kas cits
            else {
                // atlikuma rēķināšana praksei
                if ($row['2_kurss'] > $teorija) {
                    $pd->theory = $teorija;
                    $pd->practice = $row['2_kurss'] - $teorija;
                    // atlikušā prakse
                    $teorija = 0;
                    $prakse =  $prakse - $pd->practice;
                }

                if ($row['2_kurss'] < $teorija) {
                    $pd->theory = $row['2_kurss'];
                    $pd->practice = 0;
                    // atlikušā teorija
                    $teorija = $teorija - $pd->theory ;
                }
            }

            $pd->save();
        }

        if ($row['3_kurss']>0) {
            $pd = new PlanDistribution();
            $pd->plan_data_id = $data->id;
            $pd->course = 3;
            //1 = tikai viens ieraksts
            if ($row['3_kurss']==($prakse + $teorija)) {
                $pd->theory = $teorija ?? 0 ;
                $pd->practice = $prakse ?? 0;

                $teorija = 0;
                $prakse = 0;
            }
            // ir kaut kas cits
            else {
                // atlikuma rēķināšana praksei
                if ($row['3_kurss'] > $teorija) {
                    $pd->theory = $teorija;
                    $pd->practice = $row['3_kurss'] - $teorija;
                    // atlikušā prakse
                    $teorija = 0;
                    $prakse =  $prakse - $pd->practice;
                }
                if ($row['3_kurss'] < $teorija) {
                    $pd->theory = $row['3_kurss'];
                    $pd->practice = 0;
                    // atlikušā teorija
                    $teorija = $teorija - $pd->theory ;
                }
            }

            $pd->save();
        }

        if ($row['4_kurss']>0) {
            $pd = new PlanDistribution();
            $pd->plan_data_id = $data->id;
            $pd->course =4;
            //1 = tikai viens ieraksts
            if ($row['4_kurss']==($prakse + $teorija)) {
                $pd->theory = $teorija ?? 0 ;
                $pd->practice = $prakse ?? 0;

                $teorija = 0;
                $prakse = 0;
            }
            // ir kaut kas cits
            else {
                // atlikuma rēķināšana praksei
                if ($row['4_kurss'] > $teorija) {
                    $pd->theory = $teorija;
                    $pd->practice = $row['4_kurss'] - $teorija;
                    // atlikušā prakse
                    $teorija = 0;
                    $prakse =  $prakse - $pd->practice;
                }

                if ($row['4_kurss'] < $teorija) {
                    $pd->theory = $row['4_kurss'];
                    $pd->practice = 0;
                    // atlikušā teorija
                    $teorija = $teorija - $pd->theory ;
                }
            }

            $pd->save();
        }

         \Log::info("--------------------");
         \Log::info($row['modula_nosaukums']);
         \Log::info("1. kurss: " . $row['1_kurss']);
         \Log::info("2. kurss: " . $row['2_kurss']);
         \Log::info("3. kurss: " . $row['3_kurss']);
         \Log::info("4. kurss: " . $row['4_kurss']);
         \Log::info("Teorija: "  . $row['teorija']);
         \Log::info("Prakse: "   . $row['prakse']);

        ++$this->rows;
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

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
