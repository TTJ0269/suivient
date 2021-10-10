
<div class="content">

            <form action="{{ route('commentaires.store') }}" method="POST" enctype="multipart/form-data">
            @include('commentaires.form')

            <div class="text-center">
                <button type="submit"  class="btn btn-warning">
                <i class="fas fa-comments"></i>
                <span>Ajouter un commentaire</span>
                </button>
            </div>
            </form>     
</div>
