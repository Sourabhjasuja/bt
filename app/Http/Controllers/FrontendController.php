<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash; use Auth; use DB;

class FrontendController extends Controller
{
	public function dashboard()
    {
        return view('frontend.dashboard');
    }

    public function profile(Request $request){
    	if($request->input()){
    		$user = Auth::user();
    		$user->first_name = $request->input('first_name');
    		$user->last_name = $request->input('last_name');
    		$user->address = $request->input('address');
    		$user->city = $request->input('city');
    		$user->state = $request->input('state');
    		$user->save();

    		$request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'Profile successfully updated!');
	        return redirect('/profile');
    	}
    	$data['user'] = Auth::user();
    	return view('frontend.profile')->with($data);
    }
    public function deleteEntry(Request $request){
        $type = $request->input('type');
        if($type){
            DB::delete('delete from '.$request->input("table").' where id = ?',[$request->input("id")]);
        }else{
            DB::table($request->input("table"))->where('id', $request->input("id"))->update(['status'=>5]);
        }
    }
}