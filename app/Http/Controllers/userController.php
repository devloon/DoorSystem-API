<?php

namespace App\Http\Controllers;

use App\Models\user;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class userController extends Controller
{
    public function add(Request $req){
        try{
            $req->validate([
                'name'=>['required', 'string',  'min:3', 'max:100'],
                'email'=>['required', 'string',  'min:3', 'max:100'],
                'password'=> ['required', 'string',  'min:6', 'max:100']
            ]);
        }catch(ValidationException $err){return $err->getMessage(); }
    
        if(user::where('email',$req->email)->first() != null){
            return ("Email already in use!");
        }

        user::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);
        return 201;
    }

    public function authenticate(Request $req){
        try{
        $req->validate([
            'email'=>['required', 'string',  'min:3', 'max:100'],
            'password'=> ['required', 'string',  'min:6', 'max:100']
        ]);
        }catch(ValidationException $err){return $err->getMessage(); }

        $user = user::firstwhere('email', $req->email);

        if($user == null or !(Hash::check($req->password, $user->password))){
            return [false, 'Incorrect username or password'];
        }else{
            return true;
        }
    }

    public function update(Request $req){
        try{
            $req->validate([
                'name'=>['required', 'string',  'min:3', 'max:100'],
                'email'=>['required', 'string',  'min:3', 'max:100'],
                'password'=> ['required', 'string',  'min:6', 'max:100']
            ]);
        }catch(ValidationException $err){return $err->getMessage(); }
    
        $user = user::where('email',$req->email)->first();

        if($user == null){ return false;}

        $user->name = $req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        return true;
    }

    public function delete(Request $req){
        $user = user::where('email',$req->email)->first();
        if($user == null){ return false;}
        $user->delete();
        return true;
    }
}
