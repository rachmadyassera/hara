<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'longitude',
        'latitude'
    ];

    protected $table = 'opd';

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    public function profil()
    {
        return $this->hasOne(Profil::class);
    }

    public function confrence()
    {
        return $this->hasMany(Confrence::class);
    }


}
