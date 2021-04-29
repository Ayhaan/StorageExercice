@extends('layouts.index')

@section('content')
    <form  action="{{ route('file.update', $file->id) }}" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center my-5">
        @csrf
        @method('PUT')
        <h1>Modifier le fichier</h1>
        {{-- <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" class="form-control-file" id="titre" name="titre">
        </div> --}}
        <div class="form-group">
            <label for="img">Votre fichier :</label>
            <input type="file"   class="form-control-file" id="img" name="img">
        </div>
        <button type="submit" class="btn btn-success text-left">Envoyer</button>
    </form>
@endsection