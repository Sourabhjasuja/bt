<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Applicant;
use App\Models\User;
use Hash;
class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    
    function changepass(Request $request){
    	if($request->input()){
    		$validatedData = $request->validate([
		        'old_password' => 'required|min:6',
		        'new_password' => 'required|min:6'
		    ]);
		    $user = Admin::findOrFail(auth()->guard('admin')->id());
		 	if (Hash::check($request->old_password, $user->password)) {
		 		$data=array("password"=>Hash::make($request->input('new_password')), "updated_at"=>date('Y-m-d h:i:s'));
				Admin::where('id', auth()->guard('admin')->id())->update($data);
				
				$request->session()->flash('message.level', 'success');
	        	$request->session()->flash('message.content', 'Password successfully updated!');
	        	return redirect('/admin/changepass');
		 	}else{ 
		 		$request->session()->flash('message.level', 'danger');
	        	$request->session()->flash('message.content', 'Old Password doesnt match!');
	        	return redirect('/admin/changepass');
		 	}
		}
    	$data['class'] = "page-header-fixed";

    	return view('admin.changepassword')->with($data);
    }

    public function applications(Request $request){
    	if($request->input("export")){
            $users = Applicant::orderBy('company_name', 'desc')->get(); // All users
            $csvExporter = new \Laracsv\Export();
            $csvExporter->build($users, ['first_name', 'last_name', 'email', 'company_name'])->download();die;
            //return redirect('/backend/customers/');die;
        }
    	if($request->input('d')){
    		$applicant = Applicant::findOrFail($request->input('d'));
    		$applicant->delete();
    		$request->session()->flash('message.level', 'success');
        	$request->session()->flash('message.content', 'Applicant Successfully deleted!');
        	return redirect('admin/applications');
    	}
    	if($request->input('accept')){
    		$applicant = Applicant::findOrFail($request->input('accept'));
    		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		    $pass = array(); //remember to declare $pass as an array
		    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		    for ($i = 0; $i < 8; $i++) {
		        $n = rand(0, $alphaLength);
		        $pass[] = $alphabet[$n];
		    }
		    $password = implode($pass);
    		User::create(['first_name'=>$applicant->first_name, 'last_name'=>$applicant->last_name, 'email'=>$applicant->email, 'company_name'=>$applicant->company_name, 'address'=>$applicant->address, 'city'=>$applicant->city, 'state'=>$applicant->state, 'phone_no'=>$applicant->phone_no, 'company_id'=>0, 'password'=>Hash::make($password)]);
    		/*
            Mail::send('emailTemplate.newuser', $data, function ($message) use ($email) {
                $message->from('hello@gmail.com', 'RecruiterPm');
                $message->subject('New Registeration');
                $message->to($email);
            });
            */
            $applicant->delete();

            $request->session()->flash('message.level', 'success');
        	$request->session()->flash('message.content', 'New User Created Successfully!');
        	return redirect('admin/applications');
    	}
    	$data['applicants'] = Applicant::all();
    	return view('admin.applications')->with($data);
    }
    public function addApplicant(Request $request){
    	if($request->input()){
    		$validatedData = $request->validate([
		        'email' => 'required|email|max:255|unique:applicants',
		        'company_name' => 'required|max:255',
		        'address' => 'required|max:255',
		        'city' => 'required|max:255',
		        'state' => 'required|max:255',
                'phone_no' => 'required|max:255',
		    ]);
		    $fileName = '';
		    if($request->file_upload){
		    	$fileName = time().'.'.$request->file_upload->getClientOriginalExtension();
				$request->file_upload->move('uploads/applicants/documents', $fileName);
		    }
			
			Applicant::create([
                'email'=>$request->input('email'), 
                "first_name"=>$request->input('first_name'), 
                "last_name"=>$request->input('last_name'), 
                "address"=>$request->input('address'), 
                "city"=>$request->input('city'), 
                "state"=>$request->input('state'), 
                "company_name"=>$request->input('company_name'), 
                "phone_no"=>$request->input('phone_no'),
                "document_file"=>$fileName
            ]);

            $data = $request->input();
            $email = $request->input('email');
            /*
            Mail::send('emailTemplate.newuser', $data, function ($message) use ($email) {
                $message->from('hello@gmail.com', 'RecruiterPm');
                $message->subject('New Registeration');
                $message->to($email);
            });
            */
			$request->session()->flash('message.level', 'success');
        	$request->session()->flash('message.content', 'Applicant Successfully added!');
        	return redirect('admin/applicant/add');
		}
    	return view('admin.addApplicant');
    }

    public function users(Request $request){
    	if($request->input("export")){
            $users = User::orderBy('company_name', 'desc')->get(); // All users
            $csvExporter = new \Laracsv\Export();
            $csvExporter->build($users, ['first_name', 'last_name', 'email', 'company_name'])->download();die;
            //return redirect('/backend/customers/');die;
        }
        if($request->input('d')){
    		$applicant = User::findOrFail($request->input('d'));
    		$applicant->delete();
    		$request->session()->flash('message.level', 'success');
        	$request->session()->flash('message.content', 'User Successfully deleted!');
        	return redirect('admin/users');
    	}
    	$data['users'] = User::where('role', 0)->get();
    	return view('admin.users')->with($data);
    }

    public function editUser($user_id, Request $request){
    	if($request->input('password')){
            $validatedData = $request->validate(['password' => 'required|min:6|confirmed']);
            $data=array('password' => Hash::make($request->input('password')), "updated_at"=>date('Y-m-d h:i:s'));
            User::where('id', $user_id)->update($data);
            
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Password successfully updated!');
            return redirect('/admin/users');
        }
    	if($request->input('first_name')){
    		$validatedData = $request->validate([
		        'first_name' => 'required|max:255',
		        'city' => 'required|max:255',
		        'state' => 'required|max:255',
		        'phone_no' => 'required|max:255',
		    ]);
		 	
			$data=array("first_name"=>$request->input('first_name'), "last_name"=>$request->input('last_name'), "company_name"=>$request->input('company_name'), "address"=>$request->input('address'), "city"=>$request->input('city'), "state"=>$request->input('state'), "phone_no"=>$request->input('phone_no'), "status"=>$request->input('status') , "updated_at"=>date('Y-m-d h:i:s'));
			User::where('id', $user_id)->update($data);
			
			$request->session()->flash('message.level', 'success');
        	$request->session()->flash('message.content', 'User successfully updated!');
        	return redirect('/admin/users');
		}

    	$data['customer'] = User::findOrFail($user_id);

    	return view('admin.editUser')->with($data);
    }
}