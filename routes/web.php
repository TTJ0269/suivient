<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login'); //c'est le welcome qui doit etre là normalement 
});

Route::get('/dashboard', 'AccueilController@dash')->middleware(['auth'])->name('dashboard');

Auth::routes();
//require __DIR__.'/auth.php';      

/*** changement de mot de passe a la connection ***/
Route::get('/passwordchangement', 'NewPasswordController@PasswordChangement')->middleware(['auth'])->name('passwordchangement');
Route::post('/passwordchangement', 'NewPasswordController@PasswordChangementPost')->name('passwordchangementpost');


/*** routes generales pour type utilisateur ***/
Route::resource('/type_utilisateurs', 'TypeUtilisateurController');

/*** routes generales pour utilisateur ***/
Route::resource('/users', 'UserController');

/*** route generer un mouveau mot de passe pour utilisateur ***/
Route::post('/generationnewpassword', 'UserController@GenerationNewPassword')->name('generationnewpassword');

/*** route generer compte utilisateur ***/
Route::post('/activecompte', 'UserController@ActiveCompte')->name('activecompte');
Route::post('/bloquercompte', 'UserController@BloquerCompte')->name('bloquercompte');

/*** routes generales pour ifad ***/
Route::resource('/ifads', 'IFADController');

/*** routes generales pour fonction ***/
Route::resource('/fonctions', 'FonctionController');

/*** routes generales pour ifad_moniteur ***/
Route::resource('/ifad_moniteurs', 'IfadMoniteurController');

/*** routes generales pour rapport ***/
Route::resource('/rapports', 'RapportController');
Route::post('/rapportficher', 'RapportController@RapportFicher')->name('rapport_ficher');

/*** routes generales pour type activite ***/
Route::resource('/type_activites', 'TypeActiviteController');

/*** routes generales pour activite ***/
Route::resource('/activites', 'ActivityController');

/** Route generale type_evaluation **/
Route::resource('/type_evaluations', 'TypeEvaluationController');

/** Route generale evaluation **/
Route::resource('/evaluations', 'EvaluationController');

/*** routes generales pour ficher ***/
Route::resource('/fichers', 'FicherController');
Route::get('/ficher_activite_saisies/{activite_saisy}', 'FicherController@create')->name('fichier');
Route::get('/fichers/download/{file}','FicherController@Telecharger'); 

/*** routes generales pour commentaire ***/
Route::resource('/commentaires', 'CommentaireController');
Route::get('/commentaires/create/{activite_saisie_id}', 'CommentaireController@create')->name('commentaire_create');

/** Route generale livret de positionnment **/
Route::resource('/livret_positionnements', 'LivretPositionnementController');

/** Route generale positionnment **/
Route::resource('/positionnements', 'PositionnementController');
Route::post('/positionnements/create', 'PositionnementController@create')->name('semaine_livret_create');

/** Route generale temps_types **/
Route::resource('/temps_types', 'TempsTypeController');

/** Route generale placement **/
Route::resource('/placements', 'PlacementController');
Route::post('/placements_create', 'PlacementController@create')->name('placement_create_user');
Route::get('/placements/show/{placement_ifad_moniteur}/{placement_date}', 'PlacementController@show')->name('placement_show');

/** Route generale activite_saisie **/
Route::resource('/activite_saisies', 'ActiviteSaisieController');
Route::get('/activitesaisie_rapport/{rapport_id}', 'ActiviteSaisieController@create')->name('activitesaisie');
Route::get('/activitesaisie_semaine_rapport', 'ActiviteSaisieController@index')->name('activite_saisies_index_rapport');
Route::post('/activitesaisie_semaine_rapport', 'ActiviteSaisieController@create_rapport')->name('activite_saisies_create_rapport');

/*** routes generales pour le profil de l'utilisateur ***/
Route::get('/profil', 'ProfilController@show')->name('profilshow');
Route::post('/profil', 'ProfilController@changeemail')->name('profilemailchange');
Route::post('/profilpassword', 'ProfilController@changepassword')->name('profilpasswordchange');
Route::post('/profilphoto', 'ProfilController@changephoto')->name('profilphotochange');


/** Visualisation **/
Route::get('/rapportsvalider','ResultatController@RapportValider')->name('rapport_valider'); 
Route::get('/rapportsnonvalider','ResultatController@RapportnonValider')->name('rapport_non_valider'); 


/** Statistiques **/
Route::get('/statistiques', 'StatistiqueController@index')->name('statistique_index');
Route::get('/get_statistique_index', 'StatistiqueController@getLivret')->name('get_statistique_index');
Route::post('/statistiques', 'StatistiqueController@StatistiqueGenerale')->name('positionnement');
Route::post('/statistiques_mois_general', 'StatistiqueMoisController@StatistiqueMoisGeneral')->name('mois_general');

/** Impressions **/
//Route::get('/statistique_impression/{livret_id}', 'ImpressionController@ImpressionStatistiqueGenerale')->name('statistique_impression');


/** Historique des actions **/
Route::get('/historique','HistoriqueController@index')->name('historique_index');

/** Erreur **/
Route::get('/erreur','AccueilController@Erreur')->name('page_erreur'); 

/** page test **/
Route::get('/template','AccueilController@template')->name('template');
//Route::get('/insertion', 'FirstEnregistrementController@insertion')->name('insertion');

/** route de notification **/
Route::get('/shownotification/{commentaire}/{notification}','CommentaireController@ShowNotification')->name('notification_commentaire'); 

/*** routes generales pour recherche ***/
/*Route::get('/rechercheficher', 'RechercheController@Rechercheficher')->name('rechercheficher');
Route::get('/rechercheuser', 'RechercheController@Rechercheuser')->name('rechercheuser');
Route::get('/rechercheactivite', 'RechercheController@Rechercheactivite')->name('rechercheactivite');
Route::get('/rechercherapport', 'RechercheController@Rechercherapport')->name('rechercherapport');
Route::get('/recherchetypeactivite', 'RechercheController@Recherchetypeactivite')->name('recherchetypeactivite');
Route::get('/rechercheifad', 'RechercheController@Rechercheifad')->name('rechercheifad');
Route::get('/recherchefonction', 'RechercheController@Recherchefonction')->name('recherchefonction');
Route::get('/recherchetypeutilisateur', 'RechercheController@Recherchetypeutilisateur')->name('recherchetypeutilisateur');
Route::get('/recherchecommentaire', 'RechercheController@Recherchecommentaire')->name('recherchecommentaire');*/



/** Enregistrement des activites comment cela se faisait avant **/
/*Route::get('/lastactivites', 'ActivityLastController@index')->name('lastactivites_index');
Route::post('/lastactivites', 'ActivityLastController@store')->name('lastactivites_store');
Route::get('/lastactivites/{lastactivite}/edit','ActivityLastController@edit')->name('lastactivites_edit');
Route::patch('/lastactivites/{lastactivite}','ActivityLastController@update')->name('lastactivites_update');
Route::delete('/lastactivites/{lastactivite}','ActivityLastController@destroy')->name('lastactivites_destroy');
Route::get('/update_type', 'ActivityLastController@modifier')->name('update_type');*/