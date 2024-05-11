<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        /* return $request->file('file'); */
        //Mueve a la carpeta public/storage/imagenes
        return $request->file('file')->store('public/imagenes');
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
