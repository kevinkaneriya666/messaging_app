<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

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

    public function postStoreUsers(Request $request){
        if($request->ajax()){            
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();

            return response()->json([
                'status' => 1,
                'response' => [
                    'name' => $user->name,
                    'email' => $user->email
                ]
            ]);
        }
    }
}
