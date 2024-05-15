<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $files=File::paginate(4);
        return view('welcome',compact('files'));
    }
}
