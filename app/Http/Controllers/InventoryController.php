<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash; use Auth;
use App\Models\UserGroup;
use App\Models\Inventory;
use App\Models\ItemGroup;


class InventoryController extends Controller
{
	public function list(Request $request) {
		$userData = Auth::user();
		if($request->input('del')){
            $userData->inventory()->find($request->input('del'))->update(['status'=>5]);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Item successfully Deleted!');
            return redirect('inventory');
        }
		$data['inventory'] = $userData->inventory()->where('status', '!=', 5)->get();
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
            $inventory = Inventory::create(['sku'=>$request->input('sku'), 'name'=>$request->input('name'), 'description'=>$request->input('description'), 'item_type'=>$request->input('item_type'), 'item_group'=>$request->input('item_group'), 'sale_type'=>$request->input('sale_type'), 'status'=>$request->input('status'), 'user_1'=>$request->input('user_1'), 'user_2'=>$request->input('user_2'), 'user_3'=>$request->input('user_3'), 'user_4'=>$request->input('user_4'), 'proc_code'=>$request->input('proc_code'), 'rental_amount'=>$request->input('rental_amount'), 'purchase_amount'=>$request->input('purchase_amount'), 'default_multiplier'=>$request->input('default_multiplier'), 'company_id'=>$userData->user_company_id]);
            $request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'Inventory successfully Added!');
	        return redirect('inventory/edit/'.$inventory->id);
		}
		$data['item_groups'] = ItemGroup::all();
        return view('frontend.inventory.add')->with($data);
    }

    public function edit($id, Request $request) {
    	$userData = Auth::user();
    	$data['inventory'] = $userData->inventory()->with('activity', 'package.inventory', 'documents', 'pricing')->where('status', '!=', 5)->findOrFail($id); 
    	if($request->input('pricing')){
    		if($request->input('id')){
    			\App\Models\InventoryPrice::find($request->input('id'))->update(['price_table'=>$request->input('price_table'), 'proc_code'=>$request->input('proc_code'), 'price_type'=>$request->input('price_type'), 'effective_date_start'=>date('Y-m-d', strtotime($request->input('effective_date_start'))), 'effective_date_end'=>date('Y-m-d', strtotime($request->input('effective_date_end'))), 'periods_start'=>$request->input('periods_start'), 'periods_end'=>$request->input('periods_end'), 'billing_period'=>$request->input('billing_period'), 'billing_interval'=>$request->input('billing_interval'), 'charge'=>$request->input('charge'), 'allow'=>$request->input('allow'), 'modifier_1'=>$request->input('modifier_1'), 'modifier_2'=>$request->input('modifier_2'), 'modifier_3'=>$request->input('modifier_3'), 'modifier_4'=>$request->input('modifier_4'), 'billing_units'=>$request->input('billing_units')]);

    			$request->session()->flash('message.level', 'success');
		        $request->session()->flash('message.content', 'Item Pricing successfully Updated!');
		        return redirect('inventory/edit/'.$id.'#tab-3');
    		}else{
    			\App\Models\InventoryPrice::create(['inventory_id'=>$id, 'price_table'=>$request->input('price_table'), 'proc_code'=>$request->input('proc_code'), 'price_type'=>$request->input('price_type'), 'effective_date_start'=>date('Y-m-d', strtotime($request->input('effective_date_start'))), 'effective_date_end'=>date('Y-m-d', strtotime($request->input('effective_date_end'))), 'periods_start'=>$request->input('periods_start'), 'periods_end'=>$request->input('periods_end'), 'billing_period'=>$request->input('billing_period'), 'billing_interval'=>$request->input('billing_interval'), 'charge'=>$request->input('charge'), 'allow'=>$request->input('allow'), 'modifier_1'=>$request->input('modifier_1'), 'modifier_2'=>$request->input('modifier_2'), 'modifier_3'=>$request->input('modifier_3'), 'modifier_4'=>$request->input('modifier_4'), 'billing_units'=>$request->input('billing_units')]);

    			$request->session()->flash('message.level', 'success');
		        $request->session()->flash('message.content', 'Item Pricing successfully Added!');
		        return redirect('inventory/edit/'.$id.'#tab-3');
    		}
    	}
    	if($request->input('s_item_name')){
    		if(\App\Models\InventoryPackage::where('inventory_id', $id)->where('item_id', $request->input('s_item_id'))->count()){
    			$request->session()->flash('message.level', 'danger');
	        	$request->session()->flash('message.content', 'Package Item already Added!');
	        	return redirect('inventory/edit/'.$id.'#tab-4');
    		}else{
    			\App\Models\InventoryPackage::create(['inventory_id'=>$id, 'item_id'=>$request->input('s_item_id'), 'qty'=>$request->input('qty')]);
    		}

    		$request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'Package Item successfully Added!');
	        return redirect('inventory/edit/'.$id.'#tab-4');
    	}
    	if($request->input()){ 
			$this->validate(request(), [
                'proc_code' => 'required|unique:inventories,proc_code,'.$data['inventory']->id,
                'sku' => 'required|unique:inventories,sku,'.$data['inventory']->id,
                'name' => 'required',
            ]);
            $data['inventory']->fill(['sku'=>$request->input('sku'), 'name'=>$request->input('name'), 'description'=>$request->input('description'), 'item_group'=>$request->input('item_group'), 'sale_type'=>$request->input('sale_type'), 'status'=>$request->input('status'), 'user_1'=>$request->input('user_1'), 'user_2'=>$request->input('user_2'), 'user_3'=>$request->input('user_3'), 'user_4'=>$request->input('user_4'), 'proc_code'=>$request->input('proc_code'), 'rental_amount'=>$request->input('rental_amount'), 'purchase_amount'=>$request->input('purchase_amount'), 'default_multiplier'=>$request->input('default_multiplier'), 'company_id'=>$userData->user_company_id]);
            $dirty = $data['inventory']->getDirty();
            //print_r($dirty);die;
            foreach ($dirty as $key => $value) {
                \App\Models\InventoryActivity::create(['inventory_id'=>$data['inventory']->id, 'changed_by'=>$userData->id, 'activity'=> ucwords(str_replace('_', ' ', $key)).' changed to '.$value]);
            }
            $data['inventory']->save();

            $request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'Inventory successfully Updated!');
	        return redirect('inventory/edit/'.$id);
		}
    	$data['item_groups'] = ItemGroup::all();

    	return view('frontend.inventory.edit')->with($data);
    }

    public function search(Request $request){
    	$userData = Auth::user();
    	$query = 'name LIKE "%'.$request->input('term').'%" OR sku LIKE "%'.$request->input('term').'%"';
    	$inventory = $userData->inventory()->with('activity')->whereRaw($query)->get();
    	foreach ($inventory as $key => $value) {
    		$values[] = ['id'=>$value->id, 'value'=>$value->name];
    	}
    	return response()->json($values, 200); 
    }

    public function getInventory($id, Request $request){
    	$userData = Auth::user();
    	$inventory = $userData->inventory()->with('activity')->where('status', '!=', 5)->findOrFail($id);
    	if($inventory){
    		return response()->json(['info'=>'success', 'data'=>$inventory], 200); 
    	}else{
    		return response()->json(['info'=>'error'], 200); 
    	}
    }
    public function documentUpload(Request $request){
    	$file = $request->file('document');
	    $fileName = $file->getClientOriginalName();
   		
      	//Move Uploaded File
      	$destinationPath = 'uploads/inventory/documents';
      	$file->move($destinationPath,$file->getClientOriginalName());
      	\App\Models\InventoryDocument::create(['inventory_id'=>$request->input('id'), 'uploadedFile'=>$fileName, 'added_by'=>Auth::id()]);

      	$request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Document successfully Uploaded!');
        return redirect('inventory/edit/'.$request->input('id').'#tab-5');
    }
    public function getPricing($id){
    	$data = \App\Models\InventoryPrice::findOrFail($id);
    	return response()->json(['info'=>'success', 'data'=>$data], 200); 
    }
}