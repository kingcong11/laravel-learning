<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];

    public function project(){
       return $this->belongsTo(Project::class);
    }

    public function complete($completed = true){
       $this->update(compact('completed'));
    }

    public function incomplete(){
        $this->complete(false);
    }
}
