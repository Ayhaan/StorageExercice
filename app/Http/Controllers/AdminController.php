<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $files = File::all();
        return view('admin.admin', compact('files'));
    }
}
