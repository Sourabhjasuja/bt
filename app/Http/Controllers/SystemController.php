<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash; use Auth;

class SystemController extends Controller
{
	public function index() {
        return view('frontend.system.system');
    }

    public function users() {
    	$userData = Auth::user();
    	$data['users'] = $userData->users()->with('user_group')->get();
        return view('frontend.system.users')->with($data);
    }

    public function usersAdd(Request $request){
    	$userData = Auth::user();
    	if($request->input()){
    		$request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'User successfully Added!');
	        return redirect('system/users/add');
    	}
    	$data['user_groups'] = $userData->user_groups;

    	return view('frontend.system.userAdd')->with($data);
    }

    public function usersGroup() {
    	$userData = Auth::user();
    	$data['userGroups'] = $userData->user_groups;
        return view('frontend.system.usersGroup')->with($data);
    }

    public function usersGroupAdd(Request $request){
    	$userData = Auth::user();
    	if($request->input()){
    		\App\Models\UserGroup::create(['company_id'=>$userData->user_company_id, 'name'=>$request->input('name'), 'description'=>$request->input('description')]);
    		$request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'User Group successfully Added!');
	        return redirect('system/users/group/add');
    	}
    	return view('frontend.system.usersGroupAdd');
    }

    public function usersActivity() {
        return view('frontend.system.usersActivity');
    }

    public function branches(){
    	$userData = Auth::user();
    	$data['branches'] = $userData->branches;
        return view('frontend.system.branches')->with($data);
    }
    public function branchAdd(){
        $userData = Auth::user();
        $data = [];
        return view('frontend.system.branchAdd')->with($data);
    }
}