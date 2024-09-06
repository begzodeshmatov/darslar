<?php

namespace App\Exports;

use App\Books;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportBooks implements FromCollection , WithHeadings
{

    protected $columns = ['id', 'name', 'surname', 'email', 'book_name','tel_raqam'];

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Books::select($this->columns)->get();
    }

    /**
    * @return array; 
     */
    public function headings(): array
    {
        return $this -> columns;
    }
}
