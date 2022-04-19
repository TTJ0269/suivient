@extends('layouts.app')

@section('content')

<h1>Modifier l'activité: {{ $activite->LibelleActivite }}</h1>
<form action="{{ route('activites.update', ['activite' => $activite->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('activites.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection