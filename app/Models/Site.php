<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'site'; // Remplacez 'votre_nom_de_table' par le nom réel de votre table dans la base de données

    protected $primaryKey = 'idSite'; // Laravel utilise 'id' comme clé primaire par défaut, donc nous devons spécifier la vôtre

    public $incrementing = true; // Mettez cela à true si votre clé primaire est auto-incrémentée

    protected $fillable = [
        'nom', 'dns', 'idUtilisateur'
    ];

    // Si vous utilisez les timestamps Laravel (created_at et updated_at), assurez-vous que votre table les inclut.
    // Sinon, désactivez-les avec la propriété suivante :
    public $timestamps = false;

    // Relation avec l'Utilisateur (si vous avez un modèle Utilisateur et une relation établie dans votre base de données)
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', 'idUtilisateur');
    }
}
