<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Iluminate\Database\Eloquent\SoftDeletes;



class Project extends Model
{
    use HasFactory;

    
    public static $rules = [
        'name'=>'required',
        'description'=>'',
        'start'=>'date'
    ];

    public static $messages = [
        'name.required'=>'Es necesario ingresar  nombre de proyecto',
        'start.date'=>'La fecha tiene un formato inadecuado'
    ];

    protected $fillable = [
        'name',
        'description',
        'start',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function levels()
    {
        return $this->hasMany('App\Models\Level');
    }

    //accesor

    
    public function getFirstLevelIdAttribute()
    {
        return $this->levels->first()->id;
    }
}
