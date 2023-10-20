<?php

namespace App\Models;

use App\Models\Opd;
use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Confrence extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'opd_id',
        'location_id',
        'judul',
        'keterangan',
        'tanggal',
        'status'
    ];


    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
