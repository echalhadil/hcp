<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'option_id', 'value'];

    


    public function option()
    {
        return $this->belongsTo(Option::class);
    }


    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
