<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;


    public function option()
    {
        return $this->belongsTo(Option::class);
    }


    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
