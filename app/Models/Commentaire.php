<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaire';
    protected $primaryKey = 'idCommentaire';
    public $timestamps = false;

    protected $fillable = [
        'contenu',
        'date_creation',
        'idPage'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'idPage', 'idPage');
    }
}
