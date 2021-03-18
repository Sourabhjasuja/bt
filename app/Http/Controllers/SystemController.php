<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash; use Auth;
use App\Models\UserGroup;
use App\Models\Permission;


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
    		
	        $groupIdLatest= UserGroup::latest('id')->first();
	         
	        $count=Permission::count();
	        for($i=1;$i<=$count;$i++){
	        $string1=(string)$i;
	        $string='permission'.$string1;
	        $access=$request->input($string);
	        if($access== null){
	            $access='Denied';
	        }
	        \App\Models\GroupHasPermission::create(['group_id'=>$groupIdLatest->id, 'permission_id'=>$i, 'access'=>$access]);
    		
	        }
	        
	        
	        $request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'User Group successfully Added!');
	        
	        return redirect('system/users/group/add');
    	}
    	$permissions=Permission::all();
    	
    	return view('frontend.system.usersGroupAdd',compact('permissions'));
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
    
    
        
       public function showUserGroup($groupId)
    {
        $userData = Auth::user();
     
        $userGroupById= UserGroup::select("*")
                        ->where("id", "=", $groupId)
                        ->get();
        
        $permissions= Permission::all();
        return view('frontend.system.showUsersGroupById',compact(['userGroupById','permissions']));
        
       
        echo $userGroupById;
    }

}
