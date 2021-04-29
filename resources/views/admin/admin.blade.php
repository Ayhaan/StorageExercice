@extends('layouts.index')

@section('content')
    <h1>DashBoard | back office | partie Admin</h1>
    <a href="{{ route('file.create') }}" class="btn btn-secondary">ajouter un fichier</a>
    <a href="{{ route('home') }}" class="btn btn-primary">Retour sur le site</a>

    <div class="row my-5 py-5">


        @foreach ($files as $file)
            <div class="col-4">
                @if (Str::after($file->img, '.') == 'jpg' || Str::after($file->img, '.') == 'png')
                    <p>image</p>
                    <img width="50%" src="{{ asset('storage/img/' . $file->img) }}" alt="">
                    <form action="{{ route('file.destroy', $file->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('file.edit', $file->id) }}" class="btn btn-primary">edit</a>
                    <a href="{{ route('file.download', $file->id) }}" class="btn btn-success">Télécharger</a>
                @else
                    <p>non image</p>
                    <p class="text-danger">{{$file->img}}</p>
                @endif
            </div>
        @endforeach
    </div>
@endsection