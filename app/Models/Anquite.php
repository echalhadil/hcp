<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anquite extends Model
{
    use HasFactory;

        /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

     public function getCreatedAtTimeAttribute(){
         return $this->created_at->toDateString();
     }

     public function reponses()
     {
        return $this->hasMany(Reponse::class);
     }


      public function commune()
     {
        return $this->belongsTo(Commune::class,'commune_id');
     }
}
