<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class FileController extends Controller
{
    public function index(){
        return view('admin.files.index');
    }
    public function create(){
        return view('admin.files.create');
    }
    public function store(Request $request){

        $nombre=$request->file('file')->getClientOriginalName();
        return $nombre;
        $ruta=storage_path().'\app\public\imagenes';
        return $ruta;
        ImageManager::make($request->file('file'))->save();
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
