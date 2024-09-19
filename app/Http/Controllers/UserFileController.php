<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserFile;
class UserFileController extends Controller
{
    public function userfile()
    {
        $user=UserFile::all();
        return view('userfile',[
            'UserFile'=>$user
        ]);
    }
    public function UserFileSave(Request $request)
    {
        // Validayatsiya qilish
        $request->validate([
            'name' => 'required|string|max:255',
            'docx_file' => 'required|mimes:docx|max:2048', // DOCX faylni tekshirish
        ]);

        // Faylni saqlash
        if ($request->hasFile('docx_file')) {
            $file = $request->file('docx_file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Fayl nomini yaratish
            
            $filePath = $file->storeAs('uploads/docx_files', $fileName, 'public'); // Faylni saqlash
        }

        // Foydalanuvchini bazaga saqlash
        $user = new UserFile();
        $user->name = $request->name;
        $user->docx_file = $filePath; // Fayl yo'lini saqlash
        $user->save();

        return back()->with('success', 'Fayl va ism muvaffaqiyatli saqlandi!');
    }
}
