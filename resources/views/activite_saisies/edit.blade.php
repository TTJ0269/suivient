@extends('layouts.app')

@section('content')

<h4>Modifier l'activité: {{ $activite_saisy->TitreActiviteSaisie }}</h4>
<form action="{{ route('activite_saisies.update', ['activite_saisy' => $activite_saisy->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('activite_saisies.formmodif')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection