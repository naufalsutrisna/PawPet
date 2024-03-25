<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'type', 'race', 'age', 'gender', 'health', 'adoptStatus', 'photo', 'username'];

    public function pengguna()
    {
        return $this->belongsTo('App\Models\Pengguna', 'username', 'username');
    }
}
