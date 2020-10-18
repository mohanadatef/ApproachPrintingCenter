<?php

namespace App\Imports;

use App\Models\Templet_Price;
use App\Models\TempletItem;
use Maatwebsite\Excel\Concerns\ToModel;

class Templet_PriceImport implements ToModel
{
    public function model(array $row)
    {
        return new Templet_Price([
            'machine'       => $row[0],
            'size'       => $row[1],
            'color'       => $row[2],
            'type'       => $row[3],
            'price'       => $row[4],
            ]);
    }
}
