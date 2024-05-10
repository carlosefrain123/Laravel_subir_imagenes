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
