<?php

namespace App\Http\Controllers;

use App\Models\keycard;
use Error;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpMqtt\Client\Facades\MQTT;

class keycardController extends Controller
{
    public function getall(){return keycard::all();}
    
    public function add(Request $req){
        try{ $req->validate([ 'uid'=>['required', 'string',  'min:3', 'max:100']]); }
        catch(ValidationException $err){return $err->getMessage(); }

        if($card = keycard::where('uid',$req->uid)->first() != null){
            return ("Card exists already!");
        }
        keycard::create(['uid'=>$req->uid]);
        return 201;
    }

    public function update(Request $req){
        try{ 
            $req->validate([ 
                'oldUid'=>['required', 'string',  'min:8', 'max:24'],
                'newUid'=>['required', 'string',  'min:8', 'max:24']
            ]); 
        }catch(ValidationException $err){return $err->getMessage(); }

        $card = keycard::where('uid',$req->oldUid)->first();
        if($card == null){return ("Card not found!");}
        $card->uid = $req->newUid;
        $card->save();
        return ("Success!");
    }

    public function delete(Request $req){
        try{ $req->validate([ 'uid'=>['required', 'string',  'min:3', 'max:100']]); }
        catch(ValidationException $err){return $err->getMessage(); }
        $card = keycard::where('uid',$req->uid)->first();
        if($card == null){return ("Card not found!");}
        $card->delete();
        return ("Success!");
    }
}