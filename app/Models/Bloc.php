<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    use HasFactory;

    protected $table = 'bloc';
    protected $primaryKey = 'idBloc';
    public $timestamps = false;

    protected $fillable = [
        'type',
        'ordre',
        'hauteur',
        'idPage',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'idPage', 'idPage');
    }
}
