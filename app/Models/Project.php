<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Model
{
    protected $guarded = ['id', 'create_at', 'updated_at'];

    public function tasks(){
       return $this->hasMany(Task::class);
    }

    public function addTask($fields){
        $this->tasks()->create($fields);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

}
