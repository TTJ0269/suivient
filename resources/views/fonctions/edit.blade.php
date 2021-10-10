@extends('layouts.app')

@section('content')

<form action="{{ route('fonctions.update', ['fonction' => $fonction->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('fonctions.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection