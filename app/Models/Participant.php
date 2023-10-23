<?php

namespace App\Models;

use App\Models\Confrence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'confrence_id',
        'nama',
        'instansi',
        'nohp',
        'tandatangan',
        'status'
    ];


    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    public function confrence()
    {
        return $this->belongsTo(Confrence::class);
    }
}
