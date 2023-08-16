<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Electeur extends Model
{
    use HasFactory;

     protected $fillable = [

        'nom',
        'prenoms',
        'date',
        'etat',
        'code',
        'statut',
        'admin_code',
        'lieuvote',
        'numelecteur',
        'tetepont',
        'tetepontdeclaree',
        'bureauvote',
    ];


   /* public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }*/
}
