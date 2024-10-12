<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = ['titre','description'];


    public function champs()
    {
        return $this->hasMany(Champ::class);
    }

    public function reponses(){
        return $this->hasMany(Reponse::class);
    }

}