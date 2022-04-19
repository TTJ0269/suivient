@extends('layouts.app')

@section('content')

<div class="content">

            <form action="{{ route('livret_positionnements.store') }}" method="POST" enctype="multipart/form-data">
            @include('livret_positionnements.form')
                <button type="submit" class="btn btn-primary my-3">Valider</button>
            </form>     
</div>

@endsection