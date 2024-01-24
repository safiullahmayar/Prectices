<?php

namespace App\Imports;

// use App\Models\Permission;
use Maatwebsite\Excel\Concerns\ToModel;
use Spatie\Permission\Models\Permission;

class permissionImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Permission([
            'name' => $row[1],
            'gruard_name' => $row[2],
            'group_name' => $row[3]
        ]);
    }
}
