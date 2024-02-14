<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    use HasFactory;

    protected $table = 'bloc'; // Nom de la table dans la base de données
    protected $primaryKey = 'idBloc'; // Clé primaire

    // Définissez les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'codeHtml',
        'ordre',
        'hauteur',
        'idPage',
    ];

    // Définit la relation avec la page
    public function page()
    {
        return $this->belongsTo(Page::class, 'idPage', 'idPage');
    }
}
