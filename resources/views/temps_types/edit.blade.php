@extends('layouts.app')

@section('content')

@foreach ($temps_types as $temps_type)
<form action="{{ route('temps_types.update', ['temps_type' => $temps_type->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('temps_types.form')
      <div class="text-center">
         <button type="submit" class="btn btn-primary my-3">Sauvegarder</button>
      </div>
</form>
@endforeach

@endsection