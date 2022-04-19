@extends('layouts.app')

@section('content')

<div class="content">

            <form action="{{ route('activite_saisies.store') }}" method="POST" enctype="multipart/form-data">
            @include('activite_saisies.form')
                <button type="submit" class="btn btn-primary my-3">Ajouter une activité</button>
            </form> 

    @foreach ($rapports as $rapport)
     <div class="row my-3">
        <div class="col-12">
           <a href="{{ route('rapports.show', ['rapport' => $rapport->id]) }}" class="btn btn-success"> <i class=""></i><span> Récapitulatif </span> </a>
        </div>
    </div>   
    @endforeach
</div>

@endsection