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

    public function store(Request $request){;

        //STORAGE classique via input FILE
            // if ($request->file('img') != null) {
                Storage::put('public/img/', $request->file('img'));
        
                //db
                $file = new File();
                $file->img = $request->file('img')->hashName();
                $file->save();
            // } 
            
            return redirect()->route('admin');

        //STORAGE en LIGNE URL
        // récupération du fichier
        // $content = file_get_contents($request->img2);

        // //rename le fichier, on coupe et recupere ce qu'il y a après le '/'
        // $name = substr($request->img2, strrpos($request->img2, '/') +1);

        // //DD qui montre chaque étape pour bien comprendre
        // // dd($request->img2, $content, substr($request->img2, strrpos($request->img2, '/') +1), substr($request->img2, strrpos($request->img2, '/')), strrpos($request->img2, '/'));

        // //Partie STORAGE (1er parametre, on donne le chemin + on donne le nom du fichier. 2eme par c'est le CONTENU du fichier)
        // Storage::put('public/img/'.$name , $content);
        // //Partie DB
        // $file = new File();
        // $file->img = $name;
        // $file->save();
        // return redirect()->route('admin');
    }

    public function destroy(File $id)
    {
        // dd($id->img);
        Storage::delete('public/img/'. $id->img );

        $id->delete();
        return redirect()->back();
    }

    public function edit(File $id){
        $file = $id;
        return view('admin.editFile', compact('file'));
    }

    public function update(File $id, Request $request){
        $file = $id;
        if ($request->file('img') != null) {
            //STORAGE
            Storage::delete('public/img/'. $file->img);
            Storage::put('public/img/', $request->file('img'));
            //DB
            $file->img = $request->file('img')->hashName();
            $file->save();
        }
        return redirect()->route('admin');
    }


    public function download(File $id){
        return Storage::download('public/img/' . $id->img);
    }


}
