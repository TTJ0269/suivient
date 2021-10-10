@csrf

    <!-- /.content-header -->
<div class="content">
    <div class="container-fluid">                    
        <div class="form-group row">
            <label for="text" > Commentaire de l'activité: {{ $activite->LibelleActivite }} </label>
            <input type="number" hidden  name="activite_id" value="{{$activite->id}}" >
            <input type="number" hidden  name="rapport_id" value="{{$rapport->id}}" >
            <input type="text" hidden  name="activite_name" value="{{$activite->LibelleActivite}}" >
            <textarea cols="10" class="form-control @error('DescriptionCommentaire') is-invalid @enderror" name="DescriptionCommentaire" placeholder="Rentrez un commentaire..." autofocus  required></textarea>
            @error('DescriptionCommentaire')
                <div class="invalid-feedback">
                    {{ $errors->first('DescriptionCommentaire')}}
                </div>   
            @enderror
        </div>
    </div>
</div>