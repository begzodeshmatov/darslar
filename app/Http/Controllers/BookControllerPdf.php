<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use PDF;




class BookControllerPdf extends Controller
{
    public function exportpdf($id)
    {
        $kitob = Books::where('id', $id)->first();
       

        $pdf = PDF::loadView('generatePDF', [
            'books'=>$kitob,
  
        ]);
        return $pdf->download('lesson.pdf');
        // dd($kitob);
    }
}
