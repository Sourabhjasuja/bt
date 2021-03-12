<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash; use Auth;
use App\Models\UserGroup;
use App\Models\Permission;


class InventoryController extends Controller
{
	public function list() {
		$userData = Auth::user();
		$data['inventory'] = [];
        return view('frontend.inventory.list')->with($data);
    }

    public function add() {
		$userData = Auth::user();
		$data['inventory'] = [];
        return view('frontend.inventory.add')->with($data);
    }
}