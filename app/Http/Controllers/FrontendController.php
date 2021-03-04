<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash; use Auth;

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
}