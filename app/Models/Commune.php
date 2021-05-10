<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $fillable = ['libelle','province_id'];


    
    public function province()
    {
        return $this->belongsTo(Province::class);
    }


    public function teams()
    {
        return $this->hasMany(Team::class);
    }
  
}
