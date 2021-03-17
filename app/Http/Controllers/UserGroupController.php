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
    		->join('permissions', 'permissions.id', '=', 'GroupHasPermissions.permission_id')
    		->where('user_groups.id', '=', $groupId)
    		->get();
        
        $combined_info_doc = GroupHasDocPermission::join('user_groups', 'user_groups.id', '=', 'GroupHasDocPermissions.group_id')
    		->join('document_permissions', 'document_permissions.id', '=', 'GroupHasDocPermissions.doc_permission_id')
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
}
