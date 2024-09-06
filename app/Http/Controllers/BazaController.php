<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baza;
use App\User;
use App\Exports\ExportUser;
use App\Exports\exportBooks;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class BazaController extends Controller
{
    // baza
    public function baza() {

        $get = Baza::paginate(5);
        $count = 1;

        return view('baza', [
            'baza'=>$get,
            'count'=>$count
        ]);
    }
    public function bazaSave(Request $request) {
        // dd($request);

        $get = new Baza();

        $get->name = $request->name;
        $get->muallif = $request->muallif;

        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);
        $get->image=$imageName;

        $get->save();
        return redirect('/baza');
    }
    public function bazaDelete($id) {

        Baza::where('id', $id)->delete();
        return back();
    }
    public function bazaEdit($id, Request $request) {
        // dd($request);

        $data = [
            'name'=>$request->name,
            'muallif'=>$request->muallif,
        ];
        if ($request->hasFile('image')) {
            $imageName = time().$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Baza::where('id', $id)->update($data);
        return back();
    }
    


    // excel

    public function export(Request $request){
        return Excel::download(new ExportUser, 'baza.xlsx');
    }

    public function import(Request $request){
        Excel::import(new ImportUser, 
                      $request->file('file')->store('files'));
        return redirect()->back();
    }




    // pdf export

    public function exportPDF()
    {
        $baza = Baza::all();

        $pdf = PDF::loadView('pdf.users', compact('baza'));
        return $pdf->download('users.pdf');
    }



    // word export
    public function exportWord()
    {
        // PhpWord obyekti yaratamiz
        $phpWord = new PhpWord();

        // Yangi hujjat sahifasi yaratamiz
        $section = $phpWord->addSection();

        // Jadval uslubi
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 50,
        ];

        // Jadvalni uslublash
        $phpWord->addTableStyle('myTable', $tableStyle);

        // Jadval yaratamiz
        $table = $section->addTable('myTable');

        // Hujayra uslubi
        $cellStyle = [
            'borderSize' => 6,
            'borderColor' => '000000',
            'valign' => 'center',
        ];

        // Jadvalning ustun sarlavhalarini qo'shamiz
        $table->addRow();
        $table->addCell(2000, $cellStyle)->addText('ID');
        $table->addCell(4000, $cellStyle)->addText('Name');
        $table->addCell(6000, $cellStyle)->addText('Muallif');

        // Ma'lumotlarni bazadan olamiz
        $bazas = Baza::all();

        // Har bir foydalanuvchini jadvalga qo'shamiz
        foreach ($bazas as $b) {
            $table->addRow();
            $table->addCell(2000, $cellStyle)->addText($b->id);
            $table->addCell(4000, $cellStyle)->addText($b->name);
            $table->addCell(6000, $cellStyle)->addText($b->muallif);
        }

        // Word faylni saqlash uchun ob'ekt yaratamiz
        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        // Faylni chiqish oqimiga (output) yozamiz
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="baza.docx"');
        $writer->save("php://output");
    }



    
    public function contact() {

        $get = Books::all();

        return view('contact', [
            'contact'=>$get,
        ]);
    }

}
