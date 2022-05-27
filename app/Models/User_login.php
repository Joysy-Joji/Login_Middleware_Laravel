<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_login extends Model
{
    use HasFactory;

    protected $primaryKey = 'login_id';
    protected  $table = 'user_logins';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


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
