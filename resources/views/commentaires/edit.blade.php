@extends('layouts.app')

@section('content')

<form action="{{ route('commentaires.update', ['commentaire' => $commentaire->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('commentaires.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection