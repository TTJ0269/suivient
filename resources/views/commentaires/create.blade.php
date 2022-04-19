@extends('layouts.app')

@section('content')
<div class="content">

            <form action="{{ route('commentaires.store') }}" method="POST" enctype="multipart/form-data">
            @include('commentaires.form')

            <div class="text-center">
                <button type="submit"  class="btn btn-success">
                  <i class="fas fa-comments"></i><span>Ajouter un commentaire</span>
                </button>
            </div>
            </form>   
            <hr>  
</div>
@endsection
