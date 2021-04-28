<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function create(){
        return view('admin.createFile');
    }

    public function store(Request $request){
        // dd($request->file('img'));

        //Storage
        Storage::put('public/img/', $request->file('img'));

        //db
        $file = new File();
        $file->img = $request->file('img')->hashName();
        $file->save();
        return redirect()->route('home');
    }

}
