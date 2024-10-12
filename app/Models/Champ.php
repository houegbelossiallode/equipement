<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Champ extends Model
{
    use HasFactory;


    protected $fillable = ['offre_id','type','label','options'];

    protected $casts = [
        'options'=> 'array',
    ];
    public function offre(){
        return $this->belongsTo(Offre::class);
    }

    public function reponses(){
        return $this->hasMany(Reponse::class);
    }


}
