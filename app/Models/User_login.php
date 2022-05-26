<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_login extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    protected  $table = 'user_logins';


    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'email',
        'password',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];
}
