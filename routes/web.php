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
    return view('welcome');
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

/*** routes generales pour ficher ***/
Route::resource('/fichers', 'FicherController');
Route::post('/ficheractivite', 'FicherController@create')->name('ficher');
Route::get('/fichers/download/{file}','FicherController@Telecharger'); 

/*** routes generales pour commentaire ***/
Route::resource('/commentaires', 'CommentaireController');

/*** routes generales pour recherche ***/
Route::get('/rechercheficher', 'RechercheController@Rechercheficher')->name('rechercheficher');
Route::get('/rechercheuser', 'RechercheController@Rechercheuser')->name('rechercheuser');
Route::get('/rechercheactivite', 'RechercheController@Rechercheactivite')->name('rechercheactivite');
Route::get('/rechercherapport', 'RechercheController@Rechercherapport')->name('rechercherapport');
Route::get('/recherchetypeactivite', 'RechercheController@Recherchetypeactivite')->name('recherchetypeactivite');
Route::get('/rechercheifad', 'RechercheController@Rechercheifad')->name('rechercheifad');
Route::get('/recherchefonction', 'RechercheController@Recherchefonction')->name('recherchefonction');
Route::get('/recherchetypeutilisateur', 'RechercheController@Recherchetypeutilisateur')->name('recherchetypeutilisateur');
Route::get('/recherchecommentaire', 'RechercheController@Recherchecommentaire')->name('recherchecommentaire');


Route::get('/bord', 'CommentaireController@bord')->name('bord');

/*** routes generales pour le profil de l'utilisateur ***/
Route::get('/profil', 'ProfilController@show')->name('profilshow');
Route::post('/profil', 'ProfilController@changeemail')->name('profilemailchange');
Route::post('/profilpassword', 'ProfilController@changepassword')->name('profilpasswordchange');
Route::post('/profilphoto', 'ProfilController@changephoto')->name('profilphotochange');


/*** Statistiques ***/
Route::get('/pile','ChartController@PieChart')->name('pileChart'); 
Route::get('/donut','ChartController@DonutChart')->name('dountChart'); 
Route::get('/radial','ChartController@RadialChart')->name('radialChart');
Route::get('/line','ChartController@LineChart')->name('lineChart');
Route::get('/area','ChartController@AreaChart')->name('areaChart');
Route::get('/bar','ChartController@BarChart')->name('barChart');
Route::get('/radar','ChartController@RadarChart')->name('radarChart');


/*** Resultats ***/
Route::get('/resultattempsfonctions','TempsActiviteController@TempsFonctionGet')->name('tempsfonctionget'); 
Route::post('/resultattempsfonctions','TempsActiviteController@TempsFonction')->name('temps_fonction');
Route::get('/nombreactivites','NombreActiviteController@NombreActiviteParFonctionGet')->name('nombre_activiteget'); 
Route::post('/nombreactivites','NombreActiviteController@NombreActiviteParFonction')->name('nombre_activite'); 


/** Visualisation **/
Route::get('/rapportsvalider','ResultatController@RapportValider')->name('rapport_valider'); 
Route::get('/rapportsnonvalider','ResultatController@RapportnonValider')->name('rapport_non_valider'); 
Route::get('/bilanformation','ResultatController@indexBilanFormation')->name('indexbilan'); 
Route::get('/bilanformationgeneral','ResultatController@BilanFormationGeneral')->name('bilangeneral'); 
Route::post('/etatfonctionnement','ResultatController@EtatFonctionnementEnvironnement')->name('etatfonctionnement');
Route::post('/bilanformationshow','ResultatController@showBilanFormation')->name('showbilan');

/** Historique des actions **/
Route::get('/historique','HistoriqueController@index')->name('historique_index');

/** Erreur **/
Route::get('/erreur','AccueilController@Erreur')->name('page_erreur'); 