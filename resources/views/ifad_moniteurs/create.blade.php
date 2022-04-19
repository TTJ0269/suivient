@extends('layouts.app')

@section('content')

<div class="content">

            <form action="{{ route('ifad_moniteurs.store') }}" method="POST" enctype="multipart/form-data">
            @include('ifad_moniteurs.form')
                <button type="submit" class="btn btn-primary my-3">Ajouter</button>
            </form>     
</div>

@endsection