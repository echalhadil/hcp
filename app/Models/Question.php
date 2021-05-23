<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;


    protected $fillable = ['libelle','has_option'];


    public function options()
    {
        
        return $this->hasMany(Option::class);
    }


    // protected $hidden = ['has_option'];

}
