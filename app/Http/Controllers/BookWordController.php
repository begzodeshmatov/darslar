<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use App\Books;

class BookWordController extends Controller
{
    public function exportBookword() {

        // PhpWord obyekti yaratamiz
        $phpWord = new PhpWord();

        // Yangi hujjat sahifasi yaratamiz
        $section = $phpWord->addSection();

        // Jadval uslubi
        $tableStyle = [
            'borderSize' => 16,
            'borderColor' => '000000',
            'cellMargin' => 50,
        ];

        // Jadvalni uslublash
        $phpWord->addTableStyle('myTable', $tableStyle);

        // Jadval yaratamiz
        $table = $section->addTable('myTable');

        // Hujayra uslubi
        $cellStyle = [
            'borderSize' => 16,
            'borderColor' => '000000',
            'valign' => 'center',
        ];

        // Jadvalning ustun sarlavhalarini qo'shamiz
        $table->addRow();
        $table->addCell(2000, $cellStyle)->addText('id');
        $table->addCell(4000, $cellStyle)->addText('name');
        $table->addCell(6000, $cellStyle)->addText('surname');
        $table->addCell(8000, $cellStyle)->addText('email');
        $table->addCell(10000, $cellStyle)->addText('book_name');
        $table->addCell(12000, $cellStyle)->addText('tel_raqam');

        // Ma'lumotlarni bazadan olamiz
        $bazas = Books::all();

        // Har bir foydalanuvchini jadvalga qo'shamiz
        foreach ($bazas as $b) {
            $table->addRow();
            $table->addCell(2000, $cellStyle)->addText($b->id);
            $table->addCell(4000, $cellStyle)->addText($b->name);
            $table->addCell(6000, $cellStyle)->addText($b->surname);
            $table->addCell(8000, $cellStyle)->addText($b->email);
            $table->addCell(10000, $cellStyle)->addText($b->book_name);
            $table->addCell(12000, $cellStyle)->addText($b->tel_raqam);
        }

        // Word faylni saqlash uchun ob'ekt yaratamiz
        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        // Faylni chiqish oqimiga (output) yozamiz
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="baza.docx"');
        $writer->save("php://output");
    }
}
