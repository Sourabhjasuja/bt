<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupHasDocPermission extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'GroupHasDocPermissions';
    protected $fillable = ['group_id','doc_permission_id','access'];

     public function permission(){
        return $this->hasOne('App\Models\DocPermission', 'doc_permission_id', 'doc_permission_id');
    }
}
