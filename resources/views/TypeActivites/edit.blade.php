@extends('layouts.app')

@section('content')

<h2>Modification</h2>
<form action="{{ route('type_activites.update', ['type_activite' => $type_activite->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('TypeActivites.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection