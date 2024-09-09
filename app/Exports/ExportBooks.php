<?php

namespace App\Exports;

use App\Books;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportBooks implements FromCollection , WithHeadings
{


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
             // Ma'lumotlarni qaytarish
             return Books::select('id', 'name','surname')->get();
            }
        
            /**
             * @return array
             */
            public function headings(): array
            {
                return [
                  'id', 'name','surname',
                ];
            }
}

