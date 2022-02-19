<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    Protected $fillable = ['name', 'email', 'user_id'];


    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

}