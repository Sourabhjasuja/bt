<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash; use Auth;
use App\Models\UserGroup;
use App\Models\Permission;
use App\Models\Security;
use App\Models\DocPermission;


class SystemController extends Controller
{
	public function index() {
        return view('frontend.system.system');
    }

    public function users(Request $request) {
    	$userData = Auth::user();
        if($request->input('del')){
            \App\Models\User::find($request->input('del'))->update(['status'=>5]);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'User Group successfully Deleted!');
            return redirect('system/users/group');
        }
    	$data['users'] = $userData->users()->with('user_group_name')->get(); 
        
        return view('frontend.system.users')->with($data);
    }

    public function usersAdd(Request $request){
    	$userData = Auth::user();
    	if($request->input()){ 
            $this->validate(request(), [
                'email' => 'required|unique:users',
                'login_name' => 'required|unique:users',
                'password' => 'required|confirmed|min:6',
            ]);
    	    $user = \App\Models\User::create(['first_name'=>$request->input('first_name'),'middle_name'=>$request->input('middle_name'),'last_name'=>$request->input('last_name'), 'login_name'=>$request->input('login_name'),'email'=>$request->input('email'), 'user_group'=>$request->input('user_group'), 'password'=>Hash::make($request->input('password')),'company_id'=>$userData->user_company_id, 'company_name'=>$userData->company_name, 'activity_manager'=>$request->input('activity_manager')?1:0, 'document_manager'=>$request->input('document_manager')?1:0]);
    		\App\Models\UserActivity::create(['user_id'=>$user->id, 'changed_by'=>$userData->id, 'activity'=>'User created.']);
    		$request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'User successfully Added!');
	        return redirect('system/users/add');
    	}
    	$data['user_groups'] = $userData->user_groups;

    	return view('frontend.system.userAdd')->with($data);
    }
    public function usersEdit($id, Request $request){
        $userData = Auth::user();
        $data['user'] = $userData->users()->with('activity')->findOrFail($id);
        if($request->input()){ 
            $this->validate(request(), [
                'email' => 'required|unique:users,email,'.$data['user']->id,
                'login_name' => 'required|unique:users,login_name,'.$data['user']->id
            ]);
            $data['user']->fill(['first_name'=>$request->input('first_name'),'middle_name'=>$request->input('middle_name'),'last_name'=>$request->input('last_name'), 'login_name'=>$request->input('login_name'),'email'=>$request->input('email'), 'user_group'=>$request->input('user_group'),'company_id'=>$userData->user_company_id, 'company_name'=>$userData->company_name, 'activity_manager'=>$request->input('activity_manager')?1:0, 'document_manager'=>$request->input('document_manager')?1:0]);
            $dirty = $data['user']->getDirty();
            //print_r($dirty);die;
            foreach ($dirty as $key => $value) {
                \App\Models\UserActivity::create(['user_id'=>$data['user']->id, 'changed_by'=>$userData->id, 'activity'=> ucwords(str_replace('_', ' ', $key)).' changed to '.$value]);
            }
            $data['user']->save();

            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'User successfully Updated!');
            return redirect('system/users/edit/'.$id);
        }
        $data['user_groups'] = $userData->user_groups;

        return view('frontend.system.userEdit')->with($data);
    }

    public function usersGroup(Request $request) {
    	$userData = Auth::user();
        if($request->input('del')){
            \App\Models\UserGroup::find($request->input('del'))->update(['status'=>5]);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'User Group successfully Deleted!');
            return redirect('system/users/group');
        }
    	$data['userGroups'] = $userData->user_groups;	
        return view('frontend.system.usersGroup')->with($data);
    }

    public function usersGroupAdd(Request $request){
    	$userData = Auth::user();
    	if($request->input()){ 
    		$userGroup = \App\Models\UserGroup::create(['company_id'=>$userData->user_company_id, 'name'=>$request->input('name'), 'description'=>$request->input('description'), 'alert_eclaim'=>$request->input('eclaims')?1:0, 'alert_billing'=>$request->input('billing')?1:0, 'alert_cmn'=>$request->input('cmn')?1:0, 'ip_address'=>$request->input('ip_address'), 'monday_time'=>serialize(['start'=>$request->input('monday_starttime'), 'end'=>$request->input('monday_endtime')]), 'tuesday_time'=>serialize(['start'=>$request->input('tuesday_starttime'), 'end'=>$request->input('tuesday_endtime')]), 'wednesday_time'=>serialize(['start'=>$request->input('wednesday_starttime'), 'end'=>$request->input('wednesday_endtime')]), 'thursday_time'=>serialize(['start'=>$request->input('thursday_starttime'), 'end'=>$request->input('thursday_endtime')]), 'friday_time'=>serialize(['start'=>$request->input('friday_starttime'), 'end'=>$request->input('friday_endtime')]), 'saturday_time'=>serialize(['start'=>$request->input('saturday_starttime'), 'end'=>$request->input('saturday_endtime')]), 'sunday_time'=>serialize(['start'=>$request->input('sunday_starttime'), 'end'=>$request->input('sunday_endtime'), 'status'=>0])]);
    		if($userGroup->id){
                foreach ($request->input('permissions') as $key => $value) {
                    \App\Models\GroupHasPermission::create(['group_id'=>$userGroup->id, 'permission_id'=>$key, 'access'=>$value]);
                }
                foreach ($request->input('doc_permissions') as $key => $value) {
                    \App\Models\GroupHasDocPermission::create(['group_id'=>$userGroup->id, 'doc_permission_id'=>$key, 'access'=>$value]);
                }
                if($request->input('security')){
                    foreach ($request->input('security') as $key => $value) {
                        \App\Models\GroupSecurity::create(['group_id'=>$userGroup->id, 'security_id'=>$key, 'access'=>$value]);
                    }
                }
                \App\Models\UserGroupActivity::create(['group_id'=>$userGroup->id, 'changed_by'=>$userData->id, 'activity'=>'Group created.']);
            }
            
	        $request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'User Group successfully Added!');
	        
	        return redirect('system/users/group/add');
    	}
        $securities = Security::all();
    	$permissions = Permission::all();
    	$doc_permissions = DocPermission::all();
    	return view('frontend.system.usersGroupAdd', compact('permissions','doc_permissions','securities'));
    }
    public function showUserGroup($groupId){
        $userData = Auth::user();
        $data['group'] = $userData->user_groups()->with('group_permissions.permission', 'doc_permissions.permission', 'security.security', 'activity.user')->findOrFail($groupId);
        //print_r($data['group']->security);die;
        $data['securities'] = Security::all();

        return view('frontend.system.showUsersGroupById')->with($data);
    }
    public function editUserGroup(Request $request,$groupId){ //print_r($request->input());die;
        $userData = Auth::user();
        $userGroup = $userData->user_groups()->find($groupId)->fill(['company_id'=>$userData->user_company_id, 'name'=>$request->input('name'), 'description'=>$request->input('description'), 'alert_eclaim'=>$request->input('eclaims')?1:0, 'alert_billing'=>$request->input('billing')?1:0, 'alert_cmn'=>$request->input('cmn')?1:0, 'ip_address'=>$request->input('ip_address'), 'monday_time'=>serialize(['start'=>$request->input('monday_starttime'), 'end'=>$request->input('monday_endtime')]), 'tuesday_time'=>serialize(['start'=>$request->input('tuesday_starttime'), 'end'=>$request->input('tuesday_endtime')]), 'wednesday_time'=>serialize(['start'=>$request->input('wednesday_starttime'), 'end'=>$request->input('wednesday_endtime')]), 'thursday_time'=>serialize(['start'=>$request->input('thursday_starttime'), 'end'=>$request->input('thursday_endtime')]), 'friday_time'=>serialize(['start'=>$request->input('friday_starttime'), 'end'=>$request->input('friday_endtime')]), 'saturday_time'=>serialize(['start'=>$request->input('saturday_starttime'), 'end'=>$request->input('saturday_endtime')]), 'sunday_time'=>serialize(['start'=>$request->input('sunday_starttime'), 'end'=>$request->input('sunday_endtime')])]);
        $dirty = $userGroup->getDirty();
        //print_r($dirty);die;
        foreach ($dirty as $key => $value) {
            \App\Models\UserGroupActivity::create(['group_id'=>$groupId, 'changed_by'=>$userData->id, 'activity'=> ucwords(str_replace('_', ' ', $key)).' changed to '.$value]);
        }
        foreach ($request->input('permissions') as $key => $value) {
            \App\Models\GroupHasPermission::where('group_id',$groupId)->where('permission_id', $key)->update(['access'=>$value]);
        }
        foreach ($request->input('doc_permissions') as $key => $value) {
            \App\Models\GroupHasDocPermission::where('group_id',$groupId)->where('doc_permission_id', $key)->update(['access'=>$value]);
        }
        \App\Models\GroupSecurity::where('group_id',$groupId)->update(['access'=>0]);
        if($request->input('security')){
            \App\Models\GroupSecurity::where('group_id',$groupId)->delete();
            foreach ($request->input('security') as $key => $value) {
                \App\Models\GroupSecurity::create(['group_id'=>$groupId, 'security_id'=>$key, 'access'=>1]);
            }
        }
        //\App\Models\UserGroupActivity::create(['group_id'=>$groupId, 'changed_by'=>$userData->id, 'activity'=>'Group updated by '.$userData->first_name.' '.$userData->last_name]);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'User Group successfully Updated!');
        
        return redirect('system/users/group');
    }
    
    public function usersActivity(Request $request) {
        $userData = Auth::user();
        if($request->input('logout')){
            \App\SessionDB::where('user_id', $request->input('logout'))->delete();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'User successfully logged out!');
        
            return redirect('/system/users/activity');
        }
        $data['users'] = User::where('company_id', $userData->user_company_id)->orWhere('id', $userData->user_company_id)->with('sessions')->get();
        
        return view('frontend.system.usersActivity')->with($data);
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
