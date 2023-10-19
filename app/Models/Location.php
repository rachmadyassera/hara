<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'nama',
        'alamat',
        'status'
    ];

    protected $table = 'locations';

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

}
