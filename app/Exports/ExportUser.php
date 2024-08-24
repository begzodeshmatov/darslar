<?php

namespace App\Exports;

use App\Baza;
use App\Books;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Baza::all();
    }
}
