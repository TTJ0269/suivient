@extends('layouts.app')

@section('content')

<h1>Modification de : {{ $ifad->LibelleIfad }}</h1>
<form action="{{ route('ifads.update', ['ifad' => $ifad->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('ifads.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection