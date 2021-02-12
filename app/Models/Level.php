<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Iluminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory;
    protected $fillable = ['name','project_id',];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
