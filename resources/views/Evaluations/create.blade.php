@extends('layouts.app')

@section('content')

<div class="content">

            <form action="{{ route('evaluations.store') }}" method="POST" enctype="multipart/form-data">
            @include('Evaluations.form')
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-3"> Valider</button>
                </div>
            </form>     
</div>

@endsection