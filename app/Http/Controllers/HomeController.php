<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Students;
use App\Teachers;
use App\Books;
use App\Library;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('home', compact('users'));
    }

    public function userdelete($id) {

        User::where('id',$id)->delete();
        return back();
    }

    public function userSave(Request $request) {
        // dd($request);

        $get = new User();

        $get->name = $request->name;
        $get->password = Hash::make($request->password);
        $get->email = $request->email;

        $get->save();
        return redirect('/home');
    }

    public function userEditSave($id, Request $request) {

        $data = [
            'name'=>$request->name,
            'password'=>$request->password,
            'email'=>$request->email,
        ];

        User::where('id',$id)->update($data);
        return back();
    }

    public function student() {

        $get = Students::all();

        return view('students', [
            'students'=>$get
        ]);
    }

    public function studentdelete($id) {

        Students::where('id', $id)->delete();
        return back();
    }

    public function studentSave(Request $request) {
        // dd($request);

        $get = new Students();

        $get->name = $request->name;
        $get->surname = $request->surname;
        $get->age = $request->age;
        $get->email = $request->email;

        $get->save();
        return redirect('/students');
    }

    public function studentEditSave($id, Request $request)  {

        $data = [
            'name'=>$request->name,
            'surname'=>$request->surname,
            'age'=>$request->age,
            'email'=>$request->email,
        ];

        Students::where('id', $id)->update($data);
        return back();
    }

    public function teacher() {

        $get = Teachers::all();

        return view('teacher', [
            'teachers'=>$get
        ]);
    }

    public function teacherSave(Request $request) {
        // dd($request);

        $get = new Teachers();

        $get->name = $request->name;
        $get->surname = $request->surname;
        $get->manzil = $request->manzil;
        $get->tel_raqam = $request->tel_raqam;

        // $imageName = time().'.'.$request->image->extension();  
        // $request->image->move(public_path('images'), $imageName);
        // $get->image = $imageName;

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('rasmlar'),$imageName);
        $get->image=$imageName;

        $get->save();
        return redirect('/teacher');
    }

    public function teacherEditSave($id, Request $request) {
        // dd($request);

        $data = [
            'name'=>$request->name,
            'surname'=>$request->surname,
            'manzil'=>$request->manzil,
            'tel_raqam'=>$request->tel_raqam,
        ];

        if(!empty($request->image)) {
            
            $imageName = time().$request->image->getClientOriginalName();
            $a =  $request->image->move(public_path('/rasmlar/'), $imageName);

            $data['image'] = $imageName; 
        }

        Teachers::where('id', $id)->update($data);
        return back();
    }

    public function teacherdelete($id) {

        Teachers::where('id',$id)->delete();
        return back();
    }












































    
    public function library() {

        $get = Library::all();

        return view('library', [
            'library'=>$get
        ]);
    }
    public function librarydelete($id) {

        Library::where('id', $id)->delete();
        return back();
    }

    public function libraryEditSave($id, Request $request) {
        // dd($request);

        $data = [
            'name'=>$request->name,
            'surname'=>$request->surname,
            'email'=>$request->email,
            'book_name'=>$request->book_name,
        ];

        Library::where('id', $id)->update($data);
        return back();
    }

    public function librarySave(Request $request) {
        // dd($request);

        $get = new Library();

        $get->name = $request->name;
        $get->surname = $request->surname;
        $get->email = $request->email;
        $get->book_name = $request->book_name;

        $get->save();
        return redirect('/kitoblar');
    }














    public function kitoblar() {

        $get = Books::all();

        return view('kitoblar', [
            'kitoblar'=>$get
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

        $get->save();
        return redirect('/kitoblar');
    }
  
}
