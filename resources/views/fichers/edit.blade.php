@extends('layouts.app')

@section('content')

<h1>Modifier le ficher: {{ $ficher->libelleficher }}</h1>
<form action="{{ route('fichers.update', ['ficher' => $ficher->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('fichers.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection