<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informationproduit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'informations'];

    protected $casts = [
        'informations' => 'array', // Cast la colonne JSON en tableau PHP
    ];
}