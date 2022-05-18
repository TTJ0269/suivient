@extends('layouts.app')

@section('content')

<form action="{{ route('placements.update', ['placement' => $placement->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('placements.formmodif')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder</button>
</form>

@endsection
