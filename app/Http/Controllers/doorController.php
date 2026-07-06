<?php

namespace App\Http\Controllers;

use App\Models\door;
use Error;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class doorController extends Controller
{
    public function getall(){ return Door::all();}
    
    public function add(Request $req)
    {
        try {
            $req->validate([
                'name' => ['required', 'string', 'min:3', 'max:100'],
                'location' => ['required', 'string', 'min:3', 'max:100'],
                'description' => ['required', 'string', 'min:3', 'max:100'],
            ]);
        }catch(ValidationException $err){return $err->getMessage(); }

        if(door::where('name',$req->name)->first() != null){
            return ("Door already exists!");
        }

        door::create([
            'name' => $req->name,
            'location' => $req->location,
            'description' => $req->description,
        ]);
        return 201;
    }

    public function update(Request $req)
    {
        try {
            $req->validate([
                'name' => ['required', 'string', 'min:3', 'max:100'],
                'description' => ['required', 'string', 'min:3', 'max:100'],
                'location' => ['required', 'string', 'min:3', 'max:100'],
            ]);
        }catch(ValidationException $err){return $err->getMessage(); }

        $door = door::where('name',$req->name)->first();
        if($door == null){return ("Door not found!");}
        $door->description = $req->description;
        $door->location = $req->location;
        $door->save();
        return ("Success!");
    }

    public function delete(Request $req)
    {
        try {
            $req->validate([
                'name' => ['required', 'string', 'min:3', 'max:100']
            ]);
        }catch(ValidationException $err){return $err->getMessage(); }
        $door = door::where('name',$req->name)->first();
        if($door == null){return ("Door not found!");}
        $door->delete();
        return ("Success!");
    }

}