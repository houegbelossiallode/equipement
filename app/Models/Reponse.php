<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;


    protected $fillable = ['offre_id','valeurs'];

    protected $casts = [
        'valeurs'=> 'array',  
    ];

   
   

    public function offre(){
        return $this->belongsTo(Offre::class);
    }



}