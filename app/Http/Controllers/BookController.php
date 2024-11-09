<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view("books", compact("books"));
    }

    public function create(){
        return view("dasboard");
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'release_year' => 'required',
            'image_path' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ], [
            'name.required'=> 'Isi isian ini.',
            'description.required'=> 'Isi isian ini.',
            'release_year.required'=> 'Masukkan angka.',
            'image_path.required'=> 'Pilih Berkas.',
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('public/images/'), $fileName);
            $validate['image_path'] = 'public/images/' . $fileName;
        }

        Book::create($validate);

        try {
            return redirect()->route('dashboard')->with('success','Menu Created');
        } catch (\Exception $e) {
            return redirect()->route('dashboard');
        }
    }

    public function destroy($id){
        $books = Book::find($id);
        if($books->image_path){
            $imagePath = public_path($books->image_path);

            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }
        $books->delete();
        return redirect()->route('books.index')->with('success', 'Data Deleted');
    }

}
