<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash; use Auth;
use App\Models\UserGroup;
use App\Models\Inventory;


class InventoryController extends Controller
{
	public function list() {
		$userData = Auth::user();
		$data['inventory'] = $userData->inventory;
        return view('frontend.inventory.list')->with($data);
    }

    public function add(Request $request) {
		$userData = Auth::user();
		if($request->input()){
			$this->validate(request(), [
                'proc_code' => 'required|unique:inventories',
                'sku' => 'required|unique:inventories',
                'name' => 'required',
            ]);
            Inventory::create(['sku'=>$request->input('sku'), 'name'=>$request->input('name'), 'description'=>$request->input('description'), 'item_type'=>$request->input('item_type'), 'item_group'=>$request->input('item_group'), 'sale_type'=>$request->input('sale_type'), 'status'=>$request->input('status'), 'user_1'=>$request->input('user_1'), 'user_2'=>$request->input('user_2'), 'user_3'=>$request->input('user_3'), 'user_4'=>$request->input('user_4'), 'proc_code'=>$request->input('proc_code'), 'rental_amount'=>$request->input('rental_amount'), 'purchase_amount'=>$request->input('purchase_amount'), 'default_multiplier'=>$request->input('default_multiplier'), 'company_id'=>$userData->user_company_id]);
            $request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'Inventory successfully Added!');
	        return redirect('inventory');
		}
		$data['inventory'] = [];
        return view('frontend.inventory.add')->with($data);
    }
}