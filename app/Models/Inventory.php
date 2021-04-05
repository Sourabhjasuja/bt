<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function activity(){
        return $this->hasMany('App\Models\InventoryActivity');
    }
    public function package(){
    	return $this->hasMany('App\Models\InventoryPackage');
    }
    public function documents(){
    	return $this->hasMany('App\Models\InventoryDocument');
    }
    public function pricing(){
    	return $this->hasMany('App\Models\InventoryPrice');
    }
}
