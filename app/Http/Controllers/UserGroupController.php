<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash; use Auth;
use App\Models\UserGroup;
use App\Models\Permission;
use App\Models\GroupHasPermission;
use App\Models\GroupHasDocPermission;


class UserGroupController extends Controller
{
    //
    
       public function showUserGroup($groupId)
    {
        $userData = Auth::user();
     
        $userGroupById= UserGroup::select("*")
                        ->where("id", "=", $groupId)
                        ->get();
        
        //$groupHasPermissions = GroupHasPermission :: select ("*") 
        //		  ->where("group_id", "=",$groupId)
        //		  -> get();
        
        //$permissions= Permission::all();
        
        $combined_info_general = GroupHasPermission::join('user_groups', 'user_groups.id', '=', 'GroupHasPermissions.group_id')
    		->join('permissions', 'permissions.permission_id', '=', 'GroupHasPermissions.permission_id')
    		->where('user_groups.id', '=', $groupId)
    		->get();
        
        $combined_info_doc = GroupHasDocPermission::join('user_groups', 'user_groups.id', '=', 'GroupHasDocPermissions.group_id')
    		->join('document_permissions', 'document_permissions.doc_permission_id', '=', 'GroupHasDocPermissions.doc_permission_id')
    		->where('user_groups.id', '=', $groupId)
    		->get();
        
        
       // echo $groupHasPermissions;
        return view('frontend.system.showUsersGroupById',compact(['userGroupById','combined_info_general','combined_info_doc']));
        
       
        echo $userGroupById;
    }
    
    // following should be done by post, but was showing some error so doing get for now
    public function updateGeneralPermission(Request $request,$groupId,$permission_id)
    {
        # code...
        $userData = Auth::user();
        $update = GroupHasPermission::where("group_id","=", $groupId)
                                    ->where("permission_id","=", $permission_id)
                                    -> update([
                                    'access'=> $request->access
                                    ]);
        return redirect()->back();
    }
    
    
      public function updateDocPermission(Request $request,$groupId,$doc_permission_id)
    {
        # code...
        $userData = Auth::user();
        
       $update = GroupHasDocPermission::where("group_id","=", $groupId)
                                    ->where("doc_permission_id","=", $doc_permission_id)
                                    -> update([
                                    'access'=> $request->access
                                    ]);
        
       
        return redirect()->back()->with("success");
     }
    
    public function editUserGroup(Request $request,$groupId)
    {
        # code...
        
       
        
	       
	        $count=Permission::count();
	        for($i=1;$i<=$count;$i++){
			$string1=(string)$i;
			$string='permission'.$string1;
			$access=$request->input($string);
			if($access== null){
			    $access='Denied';
			}
		       $update = GroupHasPermission::where("group_id","=", $groupId)
				                    ->where("permission_id","=", $i)
				                    -> update([
				                    'access'=> $request->access
				                    ]);

		}
			
			
	        $count2=DocPermission::count();
	        for($j=1;$j<=$count2;$j++){
			$string1=(string)$j;
			$string='doc_permission'.$string1;
			$access=$request->input($string);
			if($access== null){
			    $access='Denied';
			}
			
	        }
	        
	         $update = GroupHasDocPermission::where("group_id","=", $groupId)
                                    ->where("doc_permission_id","=", $doc_permission_id)
                                    -> update([
                                    'access'=> $request->access
                                    ]);
      
	        
	        $request->session()->flash('message.level', 'success');
	        $request->session()->flash('message.content', 'User Group successfully Added!');
	        
	        
    	
    	return redirect()->back();
   
        
    }
    
}  


