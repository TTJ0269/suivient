@extends('layouts.app')

@section('content')

<div class="content">

            <form action="{{ route('fonctions.store') }}" method="POST" enctype="multipart/form-data">
            @include('fonctions.form')
                <button type="submit" class="btn btn-primary my-3">Ajouter une fonction</button>
            </form>     
</div>

@endsection