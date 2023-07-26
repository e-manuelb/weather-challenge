<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'longitude',
        'latitude',
    ];

    public function weather(): HasOne
    {
        return $this->hasOne(Weather::class);
    }
}
