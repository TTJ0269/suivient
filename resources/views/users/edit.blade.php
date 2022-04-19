@extends('layouts.app')

@section('content')

<h1>Modifier le profil: {{ $user->nomutilisateur }}</h1>
<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('users.formmodif')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection