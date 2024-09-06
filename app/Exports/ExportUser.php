<?php

namespace App\Exports;

use App\Baza;
use App\Books;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection ,WithHeadings
{
    protected $columns = ['id','name','muallif'];

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Baza::select($this->columns)->get();
    }
    /**
     * @return array;
     */

    public function headings():array{
        return $this ->columns;
    }
}
