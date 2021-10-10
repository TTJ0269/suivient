@extends('layouts.app')

@section('content')

<h1>Modifier le rapport: {{ $rapport->LibelleRapport }}</h1>
<form action="{{ route('rapports.update', ['rapport' => $rapport->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('rapports.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection