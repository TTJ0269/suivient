@extends('layouts.app')

@section('content')

<div class="content">

            <form action="{{ route('placements.store') }}" method="POST" enctype="multipart/form-data">
            @include('placements.form')
              <div class="text-center">
                <button type="submit" class="btn btn-primary col start"> Valider </button>
              </div>
            </form>     
</div>

@endsection