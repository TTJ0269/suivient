@extends('layouts.app')

@section('content')

<div class="content">

            <form action="{{ route('type_evaluations.store') }}" method="POST" enctype="multipart/form-data">
            @include('TypeEvaluations.form')
                <button type="submit" class="btn btn-primary my-3"> Valider</button>
            </form>     
</div>

@endsection