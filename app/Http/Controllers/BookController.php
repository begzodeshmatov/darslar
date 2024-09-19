<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Imports\ImportBooks;
use App\Exports\exportBooks;
use Maatwebsite\Excel\Facades\Excel;
use App\Books;
use PDF; // Barryvdh\DomPDF\Facade


class BookController extends Controller
{



    

    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('book_name');
            $table->string('tel_raqam');
            $table->timestamps();
        });

    /**
     * Run the migrations.
     *
     * @return void
     */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }


    public function kitoblar() {

        $get = Books::paginate(10);
        $count = 1;

        return view('kitoblar', [
            'kitoblar'=>$get,
            'count' => $count
        ]);
    }

    public function bookdelete($id) {
        Books::where('id', $id)->delete();
        return back();
    }

    public function booksEditSave($id, Request $request) {
        // dd($request);

        $data = [
            'name'=>$request->name,
            'surname'=>$request->surname,
            'email'=>$request->email,
            'book_name'=>$request->book_name,
            'tel_raqam'=>$request->tel_raqam,
        ];

        Books::where('id', $id)->update($data);
        return back();
    }

    public function bookSave(Request $request) {
        // dd($request);

        $get = new Books();

        $get->name = $request->name;
        $get->surname = $request->surname;
        $get->email = $request->email;
        $get->book_name = $request->book_name;
        $get->tel_raqam = $request->tel_raqam;

        $get->save();
        return back();
    }
    public function exportBooks(Request $request){
        return Excel::download(new ExportBooks, 'Murojaatlar.xlsx');
    }
    
    public function importBooks(Request $request){
        Excel::import(new ImportBooks, 
                      $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function bookfilter(Request $request)
    {
        // Formadan kelgan tanlangan kitoblar
        $kitoblar = $request->input('kitoblar'); // 'kitoblar' o'rniga to'g'ri ustun nomini qo'ying
    
        // Agar kitoblar mavjud bo'lsa
        if ($kitoblar && is_array($kitoblar)) {
            // Ustun nomini to'g'rilang
            $tekshir = Books::whereIn('surname', $kitoblar)->paginate(10); // 'title' ustuni bo'lsa
        } 
        else {
            // Hech narsa tanlanmasa, barcha ma'lumotlarni olish
            $tekshir = Books::all();
            
        }
    
        $count = 1;
    
        return view('kitoblar', [
            'kitoblar' => $tekshir,
            'count' => $count
        ]);
    }
    


    
}
