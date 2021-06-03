<?php

namespace App\Imports;

use App\Models\Modules;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class ModulesImport implements OnEachRow, WithHeadingRow
{
    use Importable;

    /**
     * @param Row $row
     */
    public function onRow(Row $row)
    {
        $row = $row->toArray();
        $module = Modules::updateOrCreate(['name' => $row['nosaukums']],
        [
            'name' => $row['nosaukums'],
            'code' => $row['kods'],
            'theory' => $row['teorija'],
            'practice' => $row['prakse']
        ]
        );
    }

    public function startRow(): int
    {
        return 1;
    }
}
