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
}
