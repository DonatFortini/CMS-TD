<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    protected $primaryKey = 'idPage';

    public $timestamps = false;

    protected $fillable = [
        'dns',
        'idSite',
        'nom'
    ];

    public function site()
    {
        return $this->belongsTo(Site::class, 'idSite', 'idSite');
    }
}
