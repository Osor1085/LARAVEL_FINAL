<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
Use Iluminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Definicion de relaciones

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
    
    
    //Defincion de funciones para los accesors

    public function getListOfProjectsAttribute()
    {
        if($this->role == 1)//soporte
            return $this->projects;

        return Project::all();
    }

    public function getIsAdminAttribute()
    {
        return $this->role == 0;
    }

    public function getIsSupportAttribute()
    {
        return $this->role == 1;
    }

    public function getIsClientAttribute()
    {
        return $this->role == 2;
    }
}
