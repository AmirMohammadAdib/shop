<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserPgSql extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $connection ='pgsql';

    protected $table = 'users';
    public $timestamps = false;

    protected $primaryKey = null;
    
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'owner_id',
        'credit',
        'group_id',
        'creation_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

}

