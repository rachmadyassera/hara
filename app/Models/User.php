<?php

namespace App\Models;

use App\Models\Opd;
use App\Models\Location;
use App\Models\Confrence;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'role',
        'password',
    ];

    protected $table = 'users';


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }

    public function confrence()
    {
        return $this->hasMany(Confrence::class);
    }

}
