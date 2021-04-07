<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function inventory_items(){
    	return $this->hasMany('App\Models\InventoryTransactionItem', 'transaction_id', 'id');
    }
}