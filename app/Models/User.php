<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = array();
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

    public function getUserCompanyIdAttribute(){
       return $this->company_id ? $this->company_id : $this->id;
    }
    public function user_groups(){
        return $this->hasMany('App\Models\UserGroup', 'company_id', 'user_company_id');
    }

    public function users(){
        return $this->hasMany('App\Models\User', 'company_id', 'user_company_id');
    }
    public function user_group_name(){
        return $this->hasOne('App\Models\UserGroup', 'id', 'user_group');
    }
    public function branches(){
        return $this->hasMany('App\Models\Branch', 'company_id', 'user_company_id');
    }
    public function activity(){
        return $this->hasMany('App\Models\UserActivity');
    }
    public function inventory(){
        return $this->hasMany('App\Models\Inventory', 'company_id', 'user_company_id');
    }
}
