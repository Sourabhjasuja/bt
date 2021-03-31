<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupActivity extends Model
{
    use HasFactory;
    protected $table = 'user_groups_activity';
    protected $guarded = [];  

    public function user(){
    	return $this->hasOne('App\Models\User', 'id', 'changed_by');
    }
}
