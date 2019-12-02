<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Project;

class User extends Authenticatable
{
    use Notifiable; // $user->notify(new ProjectSubscriptionFailed)

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects(){
       return $this->hasMany(Project::class, 'owner_id');
    }

    public function isVerified(){
        return (bool) $this->email_verified_at;
    }

    public function isNotVerified(){
        return ! $this->isVerified();
    }
}
