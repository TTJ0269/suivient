@extends('layouts.app')

@section('content')

<div class="content">

            <form action="{{ route('fichers.store') }}" method="POST" enctype="multipart/form-data">
            @include('fichers.form')
                <button type="submit" class="btn btn-primary my-3">Ajouter un fichier</button>
            </form>     
</div>

@endsection