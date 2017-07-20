<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'ic',
        'alamat',
        'telefon',
        'role',
        'status',
        'jantina'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setAlamatAttribute($value)
    {
      return $this->attributes['alamat'] = trim($value) !== '' ? $value : '';
    }

    public function senaraiPermohonan()
    {
      return $this->hasMany(Permohonan::class, 'user_id');
    }

}
