@extends('layouts.app')

@section('content')

<h2>Modification</h2>
<form action="{{ route('evaluations.update', ['evaluation' => $evaluation->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('Evaluations.form')
    <div class="text-center">
      <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
    </div>
</form>

@endsection