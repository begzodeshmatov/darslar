<?php

namespace App\Imports;

use App\Books;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBooks implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
   {
       return new Books([
           'name' => $row[1],
           'surname' => $row[2],
           'email' => $row[3],
           'book_name' => $row[4],
           'tel_raqam' => $row[5],
       ]);
   }
}
