<?php

namespace App\Imports;

use App\User;
use App\Baza;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
   {
       return new Baza([
           'name' => $row[1],
           'muallif' => $row[2],
           'image' =>$row[3],
       ]);
   }
}
