<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTransactionItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function item(){
    	return $this->hasOne('App\Models\Inventory', 'id', 'item_id');
    }
    public function serial_numbers(){
    	return $this->hasMany('App\Models\InventorySerialNumber', 'transaction_item_id', 'id');
    }
}