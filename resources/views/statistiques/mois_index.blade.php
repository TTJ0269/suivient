<div class="card card-info collapsed-card">
    <div class="card-header">
        <h3 class="card-title">Statistique des Livrets de positionnement par mois</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
     <div class="card-body"> 
     <div class="container-fluid"> 
        <form action="{{ route('mois_general') }}"  method="POST" enctype="multipart/form-data">
        @csrf
            <br>
            <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Utilisateur</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <select class="form-select form-select-lg" name="user_id" id="user">
                            <option selected disabled>Sélectionner l'utilisateur</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nomutilisateur }} {{ $user->prenomutilisateur }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-6 chart">
                <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Mois à évaluation</label>
                    <div class="col-sm-8">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                            <select class="form-control select  @error('mois') is-invalid @enderror" name="mois" id="mois">
                                <option value="01" selected="selected">Janvier</option>
                                <option value="02">Février</option>
                                <option value="03">Mars</option>
                                <option value="04">Avril</option>
                                <option value="05">Mai</option>
                                <option value="06">Juin</option>
                                <option value="07">juillet</option>
                                <option value="08">Août</option>
                                <option value="09">Septembre</option>
                                <option value="10">Octobre</option>
                                <option value="11">Novembre</option>
                                <option value="12">Décembre</option>
                            </select>
                            @error('mois')
                            <div class="invalid-feedback">
                                {{ $errors->first('mois')}}
                            </div>   
                            @enderror
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-6 chart">
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Année</label>
                    <div class="col-sm-8">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-week"></i></span>
                        </div>
                            <select class="form-control select2bs4 @error('annee') is-invalid @enderror" name="annee" id="annee">
                                <option value="2022" selected="selected">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                            </select>
                            @error('annee')
                            <div class="invalid-feedback">
                                {{ $errors->first('annee')}}
                            </div>   
                            @enderror
                    </div>
                    </div>
                </div>
            </div>
        </div>


            <div class="text-center">
            <button type="submit" class="btn btn-success my-2"> <i class="fas fa-check"></i> Valider</button>
            </div>

        </form>
    </div> 
    </div>
</div>                      