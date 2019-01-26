<?php

namespace App\Exports;

use App\Models\Test1;
use Maatwebsite\Excel\Concerns\FromCollection;

class Test1Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Test1::all();
    }
}
