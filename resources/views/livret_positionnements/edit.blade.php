@extends('layouts.app')

@section('content')

<form action="{{ route('livret_positionnements.update', ['livret_positionnement' => $livret_positionnement->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('livret_positionnements.formmodif')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection
