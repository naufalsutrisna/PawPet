<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $table = 'Penggunas'; 

    public $timestamps = false; 

    protected $fillable = [ 
        'name',
        'age',
        'gender',
        'job',
        'username',
        'email',
        'password',
        'phoneNumber',
    ];

    protected $hidden = [
        'password',
    ];

    public function hewans()
    {
        return $this->hasMany(Hewan::class, 'username', 'username');
    }
}