<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('vue');
    }

    public function second(){
        return view('second');
    }

    public function third(){
        return view('third');
    }

    public function postFetchUsers(Request $request){
        if($request->ajax()){            
            $user = User::limit(5)->get()->toArray();

            return response()->json($user);
        }
    }
}
