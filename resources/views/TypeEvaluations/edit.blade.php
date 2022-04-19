@extends('layouts.app')

@section('content')

<h2>Modification</h2>
<form action="{{ route('type_evaluations.update', ['type_evaluation' => $type_evaluation->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('TypeEvaluations.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection