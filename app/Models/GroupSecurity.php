<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSecurity extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function security(){
        return $this->hasOne('App\Models\Security', 'id', 'security_id');
    }
}
