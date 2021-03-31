<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupHasPermission extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = 'GroupHasPermissions';
     protected $fillable = ['group_id','permission_id','access'];

    public function permission(){
        return $this->hasOne('App\Models\Permission', 'permission_id', 'permission_id');
    }
}
