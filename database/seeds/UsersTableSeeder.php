<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_utilisateurs')->insert([
            'libelletype' => 'Administrateur',
            'etatsup' => 0,
        ]);

        
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'tognijoel10@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456789),
            'created_at' => now(),
            'updated_at' => now(),

            'nomutilisateur' => 'TOGNI',
            'prenomutilisateur' => 'Joël',
            'telutilisateur' => 90785263,
            'imageutilisateur' => 'M',
            'type_utilisateur_id' => 1,
            'etat' => 1,
            'etatconnection' => 0,
            'etatsup' => 0,
        ]);

     
          /* Creation ifad */
        DB::table('ifads')->insert([
            'LibelleIfad' => 'Aquaculture',
            'etatsup' => 0,
        ]);

          /* Creation des Fonctions **/
        DB::table('fonctions')->insert([
            'LibelleFonction' => 'Animation et communication pour une meilleure intégration du numérique dans les pratiques',
            'user_id' => '1',
            'etatsup' => 0,
        ]);
      
        DB::table('fonctions')->insert([
            'LibelleFonction' => "Formation et accompagnement des utilisateurs dans l'exploitation des outils numériques et des services de l'ENT",
            'user_id' => '1',
            'etatsup' => 0,
        ]);
        DB::table('fonctions')->insert([
            'LibelleFonction' => 'Gestion des ressources pédagogiques',
            'user_id' => '1',
            'etatsup' => 0,
        ]);
        DB::table('fonctions')->insert([
            'LibelleFonction' => 'Gestion du parc informatique et maintenance du réseau informatique',
            'user_id' => '1',
            'etatsup' => 0,
        ]);
        DB::table('fonctions')->insert([
            'LibelleFonction' => 'Administration et gestion de la plateforme ENT et les différents services numériques',
            'user_id' => '1',
            'etatsup' => 0,
        ]);
         /** Fin Creation des Fonctions **/

         /* Creation des Type_activites **/
         DB::table('type_activites')->insert([
            'LibelleType' => "Sensibilisation et information de l'ensemble du personnel sur les services ENT",
            'fonction_id' => '1',
            'etatsup' => 0,
        ]);
        DB::table('type_activites')->insert([
            'LibelleType' => "Encadrement des apprenants dans les activités d'apprentissage de soutien etc...",
            'fonction_id' => '1',
            'etatsup' => 0,
        ]);
        DB::table('type_activites')->insert([
            'LibelleType' => "Formation des utilisateurs dans la prise en main des outils numériques et des différents services de l'ENT",
            'fonction_id' => '2',
            'etatsup' => 0,
        ]);
        DB::table('type_activites')->insert([
            'LibelleType' => "Conseille et accompagnement des formateurs dans l'intégration et l'exploitation des outils et service numériques",
            'fonction_id' => '2',
            'etatsup' => 0,
        ]);
        DB::table('type_activites')->insert([
            'LibelleType' => "Alimentation et mise à jour en lien avec les formateurs la bibliothéque virtuelle",
            'fonction_id' => '3',
            'etatsup' => 0,
        ]);
        DB::table('type_activites')->insert([
            'LibelleType' => "Assurer une veille documentaire, classer et organiser les ressources trouvées",
            'fonction_id' => '3',
            'etatsup' => 0,
        ]);
        DB::table('type_activites')->insert([
            'LibelleType' => "Tenir à jour un inventaire des équipements informatiques déployés à l'IFAD",
            'fonction_id' => '4',
            'etatsup' => 0,
        ]);
        DB::table('type_activites')->insert([
            'LibelleType' => "Protection et sécurisation des données",
            'fonction_id' => '4',
            'etatsup' => 0,
        ]);
        DB::table('type_activites')->insert([
            'LibelleType' => "Gérer et administrer les bureaux virtuels des utilisateurs",
            'fonction_id' => '5',
            'etatsup' => 0,
        ]);
        DB::table('type_activites')->insert([
            'LibelleType' => "Administrer les services applicatifs de l'ENT",
            'fonction_id' => '5',
            'etatsup' => 0,
        ]);
        /** Fin Creation des Type_activites **/

 
        /**/
        DB::table('ifad_moniteurs')->insert([
            'datedebut' => null,
            'datefin' => null,
            'user_id' => '1',
            'ifad_id' => '1',
            'etatsup' => 0,
        ]);


        DB::table('rapports')->insert([
            'LibelleRapport' => 'Rapport 1',
            'ifad_moniteur_id' => '1',
            'etat' => '0',
            'etatsup' => 0,
        ]);

        DB::table('activites')->insert([
            'LibelleActivite' => 'Activite 1',
            'identifiant_activite' => 120,
            'type_activite_id' => 1,
            'etatsup' => 0,
        ]);

        DB::table('livret_positionnements')->insert([
            'identifiant_fonction' => 1,
            'etatsup' => 0,
        ]);

        DB::table('activite_saisies')->insert([
            'TitreActiviteSaisie' => 'activite_saisie 1',
            'DescriptionActiviteSaisie' => 'Commentaire 1',
            'rapport_id' => '1',
            'etatsup' => 0,
        ]); 
    
        DB::table('fichers')->insert([
            'libelleficher' => 'Photo',
            'urlficher' => '462886.pdf',
            'activite_saisie_id' => '1',
            'etatsup' => 0,
        ]);

        DB::table('commentaires')->insert([
            'DescriptionCommentaire' => 'Commentaire 1',
            'user_id' => '1',
            'activite_saisie_id' => '1',
            'etatsup' => 0,
        ]);
    }  
}
