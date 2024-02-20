<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'site';
    protected $primaryKey = 'idSite';

    protected $fillable = [
        'nom', 'dns', 'idUtilisateur', 'pathNavbar', 'pathFooter', 'pathBody', 'couleurBackground', 'couleurPolicy', 'fontPolicy', 'logo', 'auteur', 'description1', 'description2'
    ];

    public $timestamps = false;

    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', 'idUtilisateur');
    }
}
