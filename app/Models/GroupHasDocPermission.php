<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupHasDocPermission extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = 'GroupHasDocPermissions';
}
