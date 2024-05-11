<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(){
        return view('admin.files.index');
    }
    public function create(){
        return view('admin.files.create');
    }
    public function store(Request $request){
        $request->validate(
            [
                'file'=>'required|image|max:2048'
            ]
        );
        //Almacenar la utrl en la Base de datos
        $imagenes=$request->file('file')->store('public/imagenes');
        $url=Storage::url($imagenes);
        File::create([
            'url'=>$url
        ]);
        return redirect()->route('admin.files.index');
    }
    public function show($file){
        return view('admin.files.show');
    }
    public function edit($file){
        return view('admin.files.edit');
    }
    public function destroy($file){
        return view('admin.files.destroy');
    }
}
