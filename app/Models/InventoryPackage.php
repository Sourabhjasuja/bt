<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryPackage extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function inventory(){
    	return $this->hasOne('App\Models\Inventory', 'id', 'item_id');
    }
}
