<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Fonction;
use App\Models\Activite;

class FirstEnregistrementController extends Controller
{
    public function insertion()
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
           'etatconnection' => 1,
           'etatsup' => 0,
       ]);
 
       DB::table('users')->insert([
         'name' => 'ZZZ',
         'email' => 'agotoujerome@gmail.com',
         'email_verified_at' => now(),
         'password' => Hash::make(123456789),
         'created_at' => now(),
         'updated_at' => now(),
 
         'nomutilisateur' => 'AGOTOU',
         'prenomutilisateur' => 'Jerome',
         'telutilisateur' => 91254789,
         'imageutilisateur' => 'M',
         'type_utilisateur_id' => 1,
         'etat' => 1,
         'etatconnection' => 1,
         'etatsup' => 0,
     ]);
 
 
         /* Creation ifad */
       DB::table('ifads')->insert([
           'LibelleIfad' => 'Aquaculture',
           'etatsup' => 0,
       ]);
 
         /* Creation des Fonctions **/
       DB::table('fonctions')->insert([
           'LibelleFonction' => 'Animation et communication',
           'user_id' => '1',
           'etatsup' => 0,
       ]);
 
       DB::table('fonctions')->insert([
           'LibelleFonction' => "Formation et Accompagnement des utilisateurs dans l’exploitation des différents outils de l’ENT",
           'user_id' => '1',
           'etatsup' => 0,
       ]);
       DB::table('fonctions')->insert([
           'LibelleFonction' => 'Organisation et gestion des ressources logicielles et matérielles',
           'user_id' => '1',
           'etatsup' => 0,
       ]);
       DB::table('fonctions')->insert([
           'LibelleFonction' => 'Maintenance du réseau et du parc informatique',
           'user_id' => '1',
           'etatsup' => 0,
       ]);
       DB::table('fonctions')->insert([
           'LibelleFonction' => 'Administration et gestion au quotidien des services ENT',
           'user_id' => '1',
           'etatsup' => 0,
       ]);
       /** Fin Creation des Fonctions **/
 
       /* Creation des Type_activites **/
       DB::table('type_activites')->insert([
           'LibelleType' => "Préparer l accueil",
           'fonction_id' => '1',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
           'LibelleType' => "Accueillir et accompagner les élèves et les professeurs",
           'fonction_id' => '1',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
           'LibelleType' => "Favoriser l utilisation du numérique",
           'fonction_id' => '1',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
           'LibelleType' => "Assurer le reporting du suivi des activités",
           'fonction_id' => '1',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
           'LibelleType' => "Définir ses séances d accompagnement",
           'fonction_id' => '2',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
           'LibelleType' => "Concevoir et réaliser des supports, séquences et des exercices pour la formation",
           'fonction_id' => '2',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
           'LibelleType' => "Préparer ses séances d’accompagnement",
           'fonction_id' => '2',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
           'LibelleType' => "Animer ses séances de formation",
           'fonction_id' => '2',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
           'LibelleType' => "Accompagnement des apprenants ou personnel",
           'fonction_id' => '2',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
           'LibelleType' => "Participer à la planification des activités de mise à disposition des outils",
           'fonction_id' => '3',
           'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Accompagner les activités pédagogiques",
         'fonction_id' => '3',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Prospecter et faire de la veille technologique et pédagogique en fonction des projets et des usages",
         'fonction_id' => '3',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Gérer les ressources pédagogiques",
         'fonction_id' => '3',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Gérer les équipements informatiques et logiciels",
         'fonction_id' => '3',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Gérer les réservations et les prêts de matériels",
         'fonction_id' => '3',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Installer le parc informatique",
         'fonction_id' => '4',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Maintenir et dépanner les équipements",
         'fonction_id' => '4',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Maintenir l architecture du réseau",
         'fonction_id' => '4',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Veiller à la sécurité des données",
         'fonction_id' => '4',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Assurer une maintenance permanente du réseau",
         'fonction_id' => '4',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Administrer le serveur ENT",
         'fonction_id' => '5',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Gérer et administrer les bureaux virtuels des utilisateurs",
         'fonction_id' => '5',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Administrer des services applicatifs de l’ENT",
         'fonction_id' => '5',
         'etatsup' => 0,
       ]);
       DB::table('type_activites')->insert([
         'LibelleType' => "Gérer des alertes générées par le système",
         'fonction_id' => '5',
         'etatsup' => 0,
       ]);
       /** Fin Creation des Type_activites **/
 
       /** Debut Creation des activites **/
         /** Fonction 1 **/
        DB::table('activites')->insert([
         'LibelleActivite' => "Faire appliquer la charte d’utilisation de l’ENT",
         'identifiant_activite' => 100,'type_activite_id' => 1,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Pré-affecter des postes aux apprenants et vérifier le respect des consignes",
         'identifiant_activite' => 110,'type_activite_id' => 1,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "S’assurer de la disponibilité des ressources",
         'identifiant_activite' => 120,'type_activite_id' => 1,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "S’assurer de l’autonomie des apprenants dans l’utilisation des outils de l’ENT pour la réalisation de leurs travaux",
         'identifiant_activite' => 130,'type_activite_id' => 2,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Adapter son accompagnement dans les différentes situations",
         'identifiant_activite' => 140,'type_activite_id' => 2,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Participer au SNAVE et aux différentes réunions de coordination pour présenter et expliquer les nouvelles ressources et les nouveaux services de l'ENT",
         'identifiant_activite' => 150,'type_activite_id' => 3,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Mener des actions de communication (réunion, affiches…) pour la promotion de l'ENT auprès des usagers",
         'identifiant_activite' => 160,'type_activite_id' => 3,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Communiquer avec les différents acteurs en utilisant les différents services de l’ENT",
         'identifiant_activite' => 170,'type_activite_id' => 3,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Concevoir des questionnaires pour évaluer l'utilisation de l'ENT et le niveau de satisfaction des utilisateurs",
         'identifiant_activite' => 180,'type_activite_id' => 3,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Rendre compte de ces activités (rapport d’activité), selon le calendrier établi",
         'identifiant_activite' => 190,'type_activite_id' => 4,'etatsup' => 0,
        ]);
 
        /** Fonction 2 **/
        DB::table('activites')->insert([
         'LibelleActivite' => "Analyser les besoins en formation des utilisateurs",
         'identifiant_activite' => 200,'type_activite_id' => 5,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Déterminer l’objectif pédagogique en tenant compte des besoins et du contexte",
         'identifiant_activite' => 210,'type_activite_id' => 5,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Choisir le contenu de Formation",
         'identifiant_activite' => 220,'type_activite_id' => 5,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Choisir la méthode et les outils selon le public",
         'identifiant_activite' => 230,'type_activite_id' => 5,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Définir les objectifs en tenant compte des besoins des utilisateurs",
         'identifiant_activite' => 240,'type_activite_id' => 5,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Concevoir et réaliser des supports de formation, s’il n’existent pas",
         'identifiant_activite' => 250,'type_activite_id' => 6,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Utiliser la plateforme de formation pour concevoir les séquences de formation",
         'identifiant_activite' => 260,'type_activite_id' => 6,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Organiser et planifier les groupes pour la formation",
         'identifiant_activite' => 270,'type_activite_id' => 7,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Vérifier les installations matérielles nécessaires pour la formation",
         'identifiant_activite' => 280,'type_activite_id' => 7,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Inscrire les utilisateurs aux séquences de formation créées sur la plateforme",
         'identifiant_activite' => 290,'type_activite_id' => 7,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Utiliser les outils de l'ENT pour animer ses formations",
         'identifiant_activite' => 300,'type_activite_id' => 8,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Utiliser la plateforme de formation pour suivre et évaluer ses séquences de formation",
         'identifiant_activite' => 310,'type_activite_id' => 9,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Assister et accompagner les utilisateurs dans la réalisation des projets administratifs et pédagogiques (projet collectif ou individuel)",
         'identifiant_activite' => 320,'type_activite_id' => 9,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Assister et accompagner les enseignants dans la création des ressources (si elles n’existent pas) avec les outils bureautiques existants",
         'identifiant_activite' => 330,'type_activite_id' => 9,'etatsup' => 0,
        ]);
 
        /** Fonction 3 **/
        DB::table('activites')->insert([
         'LibelleActivite' => "Participer à la planification de l’utilisation de l’espace multimédia :  heures réservées pour les cours et heures d’accès libre",
         'identifiant_activite' => 340,'type_activite_id' => 10,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Organiser les relations avec les professeurs dans le cadre du travail personnel des apprenants",
         'identifiant_activite' => 350,'type_activite_id' => 10,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Mettre en place et utiliser les outils permettant de recueillir les besoins des utilisateurs",
         'identifiant_activite' => 360,'type_activite_id' => 11,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Identifier les besoins des professeurs et des apprenants en matière de ressources (matière, programmes…)",
         'identifiant_activite' => 370,'type_activite_id' => 12,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Établir la fiche descriptive de la ressource",
         'identifiant_activite' => 380,'type_activite_id' => 12,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Informer sur les nouveautés en matière de ressources",
         'identifiant_activite' => 390,'type_activite_id' => 12,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Proposer des ressources pédagogiques pour validation (fiche d'évaluation",
         'identifiant_activite' => 400,'type_activite_id' => 13,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Tenir à jour l'inventaire des équipements et logiciel",
         'identifiant_activite' => 410,'type_activite_id' => 14,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Tenir à jour les fiches descriptives de chaque matériel",
         'identifiant_activite' => 420,'type_activite_id' => 14,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer le stock de consommables (papier, cartouches d'encre, toner etc...)",
         'identifiant_activite' => 430,'type_activite_id' => 14,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer les réservations des ordinateurs (chariots, ordinateurs portables, etc..)",
         'identifiant_activite' => 440,'type_activite_id' => 15,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer les réservations des tablettes numériques",
         'identifiant_activite' => 450,'type_activite_id' => 15,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer les prets de livres",
         'identifiant_activite' => 460,'type_activite_id' => 15,'etatsup' => 0,
        ]);
 
        /** Fonction 4 **/
        DB::table('activites')->insert([
         'LibelleActivite' => "Installer ou réinstaller un poste de travail (Windows 7, 8, Pack office, antivirus, pilotes)",
         'identifiant_activite' => 470,'type_activite_id' => 16,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Connecter un poste de travail au réseau et l’intégrer dans le domaine",
         'identifiant_activite' => 480,'type_activite_id' => 16,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Installer des périphériques en local ou réseau (imprimante, scanner…)",
         'identifiant_activite' => 490,'type_activite_id' => 16,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Planifier et assurer une maintenance préventive sur l’ensemble des équipements du parc informatique",
         'identifiant_activite' => 500,'type_activite_id' => 17,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Assurer le diagnostic des pannes (matériel et logiciel)",
         'identifiant_activite' => 510,'type_activite_id' => 17,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Organiser et assurer le dépannage de 1er niveau (matériel et logiciel)",
         'identifiant_activite' => 520,'type_activite_id' => 17,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Assurer la première maintenance sur les différents périphériques : écran, imprimantes, scanner, vidéoprojecteurs, onduleurs…",
         'identifiant_activite' => 530,'type_activite_id' => 17,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer le trafic des données sur le réseau en mettant en place les outils et les paramétrages adaptés",
         'identifiant_activite' => 540,'type_activite_id' => 18,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Veiller au compromis entre sécurité du réseau et convivialité d’utilisation",
         'identifiant_activite' => 550,'type_activite_id' => 18,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Proposer et/ou participer au choix du matériel à utiliser",
         'identifiant_activite' => 560,'type_activite_id' => 18,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Prévoir une redondance des matériels critiques",
         'identifiant_activite' => 570,'type_activite_id' => 18,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Mettre en place les systèmes de protection et de sécurisation des données : antivirus, Firewall,  règles de sécurité nécessaires",
         'identifiant_activite' => 580,'type_activite_id' => 19,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Mettre en place et gérer les systèmes d’alerte",
         'identifiant_activite' => 590,'type_activite_id' => 19,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Sensibiliser les utilisateurs aux risques et règles de sécurité",
         'identifiant_activite' => 600,'type_activite_id' => 19,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Veiller à la réalisation périodique des mises à jour",
         'identifiant_activite' => 610,'type_activite_id' => 19,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Créer des tableaux de bord pour veiller à la bonne marche du réseau et des serveurs",
         'identifiant_activite' => 620,'type_activite_id' => 20,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Prévoir les montées en charge du réseau",
         'identifiant_activite' => 630,'type_activite_id' => 20,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Tester la compatibilité des nouveaux équipements susceptibles d’être connectés au réseau",
         'identifiant_activite' => 640,'type_activite_id' => 20,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Planifier les évolutions ou remplacements nécessaires à apporter au réseau ou aux serveurs,  en relation avec cellule support",
         'identifiant_activite' => 650,'type_activite_id' => 20,'etatsup' => 0,
        ]);
 
        /** Fonction 5 **/
        DB::table('activites')->insert([
         'LibelleActivite' => "Créer et gérer les comptes et groupes d'utilisateurs",
         'identifiant_activite' => 660,'type_activite_id' => 21,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer les partages et les droits d'accès",
         'identifiant_activite' => 670,'type_activite_id' => 21,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer les imprimantes en réseau",
         'identifiant_activite' => 680,'type_activite_id' => 21,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Assurer la sauvegarde des données selon la stratégie définie",
         'identifiant_activite' => 690,'type_activite_id' => 21,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Assurer la sécurité des données sur le réseau (antivirus, Firewall)",
         'identifiant_activite' => 700,'type_activite_id' => 21,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Définir les différents paramètres de personnalisation du portail",
         'identifiant_activite' => 710,'type_activite_id' => 22,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Définir les paramètres des services applicatifs",
         'identifiant_activite' => 720,'type_activite_id' => 22,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer l'accès aux différents services applicatifs (fichiers élèves, gestion des absences, gestion des notes, cahier de textes, gestion de ressources pédagogiques…)",
         'identifiant_activite' => 730,'type_activite_id' => 22,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer la synchronisation entre le Portail et les différents services applicatifs",
         'identifiant_activite' => 740,'type_activite_id' => 22,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Gérer les espaces de stockage de chaque utilisateur et définir les quotas disques",
         'identifiant_activite' => 750,'type_activite_id' => 22,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Organiser les services applicatifs suivant les profiles d'utilisateur",
         'identifiant_activite' => 760,'type_activite_id' => 23,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Définir les paramétrages spécifiques à chaque service applicatif",
         'identifiant_activite' => 770,'type_activite_id' => 23,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Vérifier le bon fonctionnement des services applicatifs : fichiers élèves, gestion des absences, cahier de texte, emploi du temps, gestion de ressources pédagogique…",
         'identifiant_activite' => 780,'type_activite_id' => 23,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Savoir identifier les problèmes de fonctionnement des différents services et apporter les solutions nécessaires",
         'identifiant_activite' => 790,'type_activite_id' => 23,'etatsup' => 0,
        ]);
        DB::table('activites')->insert([
         'LibelleActivite' => "Analyser les alertes générées et déterminer les éventuelles actions à mener",
         'identifiant_activite' => 800,'type_activite_id' => 24,'etatsup' => 0,
        ]);
        /** Fin Creation des activites **/
 
 
       /**/
      /* DB::table('ifad_moniteurs')->insert([
           'datedebut' => null,
           'datefin' => null,
           'user_id' => '1',
           'ifad_id' => '1',
           'etatsup' => 0,
       ]);*/
 
 
      /* DB::table('rapports')->insert([
           'LibelleRapport' => 'Rapport 1',
           'ifad_moniteur_id' => '1',
           'etat' => '0',
           'etatsup' => 0,
       ]);*/
 
       /*DB::table('livret_positionnements')->insert([
           'LibelleLivret' => 'Livret 1',
           'rapport_id' => 1,
           'etatsup' => 0,
       ]);*/
 
      /* DB::table('activite_saisies')->insert([
           'TitreActiviteSaisie' => 'activite_saisie 1',
           'DescriptionActiviteSaisie' => 'Commentaire 1',
           'rapport_id' => '1',
           'fonction_id' => 1,
           'etatsup' => 0,
       ]); */
 
       /*DB::table('fichers')->insert([
           'libelleficher' => 'Photo',
           'urlficher' => '462886.pdf',
           'activite_saisie_id' => '1',
           'etatsup' => 0,
       ]);*/
 
      /* DB::table('commentaires')->insert([
           'DescriptionCommentaire' => 'Commentaire 1',
           'user_id' => '1',
           'activite_saisie_id' => '1',
           'etatsup' => 0,
       ]);*/

       /** type evaluation **/
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Implication','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Combativité','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Adaptabilité','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Autonomie','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => "Esprit d'équipe",'etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Ecoute','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Capacité à manager','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Sens des responsabilités','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Initiative','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Analyse','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => 'Méthode et rigueur','etatsup' => 0,
       ]);
       DB::table('type_evaluations')->insert([
        'LibelleEvaluation' => "Sens de l'organisation",'etatsup' => 0,
       ]);
       /** fin type evaluation **/

       /** evaluation **/
       DB::table('evaluations')->insert([
        'LibelleEval' => "Manque d'intérêt pour son travail",'valeur' => 1,'type_evaluation_id' => 1,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Réalise son travail s'il y est incité par son supérieur",'valeur' => 2,'type_evaluation_id' => 1,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Réalise son travail consciencieusement",'valeur' => 3,'type_evaluation_id' => 1,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "S'investit complètement dans son travail avec le souci d'aller jusqu'au bout",'valeur' => 4,'type_evaluation_id' => 1,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "Renonce dès qu'une difficulté se présente",'valeur' => 1,'type_evaluation_id' => 2,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "A tendance à baisser les bras face aux difficultés",'valeur' => 2,'type_evaluation_id' => 2,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Fait des efforts renouvelés pour surmonter les obstacles",'valeur' => 3,'type_evaluation_id' => 2,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Trouve sa pleine mesure dans les situations d'adversité",'valeur' => 4,'type_evaluation_id' => 2,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "Incapable d'adapter son comportement ou sa méthode de travail",'valeur' => 1,'type_evaluation_id' => 3,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Doit être incité à modifier son comportement ou sa méthode de travail",'valeur' => 2,'type_evaluation_id' => 3,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Adapte graduellement son comportement ou sa méthode de travail",'valeur' => 3,'type_evaluation_id' => 3,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Passe simplement à une autre méthode ou adapte son comportement",'valeur' => 4,'type_evaluation_id' => 3,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "Ne travaille que quand il est guidé",'valeur' => 1,'type_evaluation_id' => 4,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "A souvent besoin d'aide pour effectuer son travail",'valeur' => 2,'type_evaluation_id' => 4,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Effectue le travail sous surveillance, peut avoir besoin d'aide",'valeur' => 3,'type_evaluation_id' => 4,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Effectue le travail sans aide ni surveillance",'valeur' => 4,'type_evaluation_id' => 4,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "Ne sait pas travailler en groupe",'valeur' => 1,'type_evaluation_id' => 5,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Est plus à l'aise dans le travail individuel que dans le travail en groupe",'valeur' => 2,'type_evaluation_id' => 5,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Collabore avec les autres au sein de l'équipe",'valeur' => 3,'type_evaluation_id' => 5,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Impulse un esprit d'équipe au sein du groupe",'valeur' => 4,'type_evaluation_id' => 5,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "N'accorde aucun intérêt aux autres",'valeur' => 1,'type_evaluation_id' => 6,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Ne prête pas toujours suffisamment d'intérêt aux autres",'valeur' => 2,'type_evaluation_id' => 6,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Accueille avec intérêt et bienveillance ce qui lui vient des autres",'valeur' => 3,'type_evaluation_id' => 6,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Fait preuve d'une grande disponibilité et d'une large ouverture d'esprit face aux autres",'valeur' => 4,'type_evaluation_id' => 6,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "N'a aucune assurance quand il doit diriger les autres",'valeur' => 1,'type_evaluation_id' => 7,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "A quelques difficultés à dire aux autres ce qu'il attend d'eux",'valeur' => 2,'type_evaluation_id' => 7,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Sait dire aux autres ce qu'il attend d'eux",'type_evaluation_id' => 7,'valeur' => 3,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Sait s'imposer par son autorité naturelle, son charisme",'valeur' => 4,'type_evaluation_id' => 7,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "Manque de fiabilité, s'acquitte rarement de ses responsabilités",'valeur' => 1,'type_evaluation_id' => 8,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Ne s'acquitte pas toujours de ses responsabilités",'valeur' => 2,'type_evaluation_id' => 8,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Veille généralement à s'acquitter de ses responsabilités",'valeur' => 3,'type_evaluation_id' => 8,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Veille toujours à s'acquitter de ses responsabilités envers les autres et envers l'entreprise",'valeur' => 4,'type_evaluation_id' => 8,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "Incapable de faire preuve d'initiative",'valeur' => 1,'type_evaluation_id' => 9,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Est peu disposé à proposer des démarches nouvelles",'valeur' => 2,'type_evaluation_id' => 9,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Est capable de proposer une démarche nouvelle",'valeur' => 3,'type_evaluation_id' => 9,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Est capable d'entreprendre une démarche nouvelle",'valeur' => 4,'type_evaluation_id' => 9,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "Faible",'type_evaluation_id' => 10,'valeur' => 1,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Moyenne",'type_evaluation_id' => 10,'valeur' => 2,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Bonne",'type_evaluation_id' => 10,'valeur' => 3,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Très bonne",'type_evaluation_id' => 10,'valeur' => 4,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "Faible",'type_evaluation_id' => 11,'valeur' => 1,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Moyenne",'type_evaluation_id' => 11,'valeur' => 2,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Bonne",'type_evaluation_id' => 11,'valeur' => 3,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Très bonne",'type_evaluation_id' => 11,'valeur' => 4,'etatsup' => 0,
       ]);

       DB::table('evaluations')->insert([
        'LibelleEval' => "Incapable d'organiser son travail",'valeur' => 1,'type_evaluation_id' => 12,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Manque souvent d'organisation dans son travail",'valeur' => 2,'type_evaluation_id' => 12,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Organise son travail personnel afin d'en améliorer l'efficacité",'valeur' => 3,'type_evaluation_id' => 12,'etatsup' => 0,
       ]);
       DB::table('evaluations')->insert([
        'LibelleEval' => "Coordonne les activités et les tâches d'une équipe afin d'améliorer l'efficacité du travail",'valeur' => 4,'type_evaluation_id' => 12,'etatsup' => 0,
       ]);

    }
}
