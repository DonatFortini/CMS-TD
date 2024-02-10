<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'site';
    protected $primaryKey = 'idSite';
    public $incrementing = true;

    protected $fillable = [
        'nom', 'dns', 'idUtilisateur', 'pathNavbar', 'pathFooter', 'pathBody', 'couleur'
    ];

    public $timestamps = false;

    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', 'idUtilisateur');
    }
}
