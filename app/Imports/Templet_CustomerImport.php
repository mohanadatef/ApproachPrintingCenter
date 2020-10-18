<?php

namespace App\Imports;

use App\Models\Templet_Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class Templet_CustomerImport implements ToModel
{
    public function model(array $row)
    {
        return new Templet_Customer([
            'name'       => $row[0],
            'email'      => $row[1],
            'phone'       => $row[2],
            'place'       => $row[3],
        ]);
    }
    public function headings(): array
    {
        return ['name','email','phone','place'];
    }
}
