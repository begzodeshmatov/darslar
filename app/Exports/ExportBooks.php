<?php

namespace App\Exports;

use App\Books;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportBooks implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Books::all();
    }
}
