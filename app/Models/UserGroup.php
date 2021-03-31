<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserGroup extends Authenticatable
{
    use Notifiable;

    protected $table = 'user_groups';
    protected $guarded = array();

    public function group_permissions(){
        return $this->hasMany('App\Models\GroupHasPermission', 'group_id', 'id');
    }
    public function doc_permissions(){
        return $this->hasMany('App\Models\GroupHasDocPermission', 'group_id', 'id');
    }
    public function security(){
        return $this->hasMany('App\Models\GroupSecurity', 'group_id', 'id');
    }
    public function activity(){
        return $this->hasMany('App\Models\UserGroupActivity', 'group_id', 'id')->orderBy('id', 'desc');
    }
}
