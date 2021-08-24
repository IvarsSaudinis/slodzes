<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

class UsersImport implements OnEachRow,  WithHeadingRow
{
    use Importable;

    private $roles;

    private $rows = 0;

    public function  __construct($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @param Row $row
     * @return User
     */
    public function onRow(Row $row)
    {
        $row = $row->toArray();

        /*
         * Note: Excel faila pirmā rinda tiek pārkonvertēta masīva vērtībā at atslēgu, kas konvertēta ar str_slug();
         * Piemēram: E-pasts => e_pasts, Uzvārds => uzvards, šķūņa adrese => skuna_adrese
        */
        $user = User::updateOrCreate(['email'=>$row['e_pasts']],
            ['name'     => $row['vards'],
            'surname'   => $row['uzvards'],
            'job_title'  => $row['amats'] ?? ' ',
            'password'  => isset($row['parole']) ?  \Hash::make($row['parole']) : ' '
        ]);

        // pieškiram jaunam lietotājam lomu, ja tāda ir
        if($user->wasRecentlyCreated && isset($this->roles) )
        {
            $user->assignRole($this->roles);
        }

    }

    public function startRow(): int
    {
        return 1;
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }


}
