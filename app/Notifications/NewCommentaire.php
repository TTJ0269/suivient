<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Activite;
use App\Models\Commentaire;

class NewCommentaire extends Notification
{
    use Queueable;

    protected $user;
    protected $commentaire;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Commentaire $commentaire , User $user)
    {
        $this->commentaire = $commentaire;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
 
        /** Recuperation des informations de l'utilisateur a qui le commentaire est destine **/
        $info = DB::table('users')
        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('commentaires','activites.id','=','commentaires.activite_id')
        ->where('commentaires.id','=',$this->commentaire->id)
        ->select('activites.LibelleActivite','users.id','users.telutilisateur','users.nomutilisateur','users.prenomutilisateur')
        ->first();

        return [
            'descriptioncommentaire' => $this->commentaire->DescriptionCommentaire,
            'idcommentaire' => $this->commentaire->id,
            'nameuser_responsable' => $this->user->nomutilisateur,
            'prenomuser_responsable' => $this->user->prenomutilisateur,
            'users_id'=> $info->id,
            'activite_LibelleActivite'=> $info->LibelleActivite,
            'user_tel_a_qui_commentaire_destine'=> $info->telutilisateur,
            'user_nom_a_qui_commentaire_destine'=> $info->nomutilisateur,
            'user_prenom_a_qui_commentaire_destine'=> $info->prenomutilisateur,
        ];
    }
}
