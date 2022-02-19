<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'number', 'client_id'];

    public function client() 
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function tarefas() 
    {
        return $this->belongsToMany('App\Models\Tarefa');
    }
}
