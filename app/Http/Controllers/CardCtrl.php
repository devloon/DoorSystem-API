<?php

namespace App\Http\Controllers;

use App\Models\RfidCard;
use Error;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpMqtt\Client\Facades\MQTT;

class CardCtrl extends Controller
{
    public function getall(){return RfidCard::all();}
    
    public function add(Request $req){
        try{ $req->validate([ 'uid'=>['required', 'string',  'min:3', 'max:100']]); }
        catch(ValidationException $err){return $err->getMessage(); }

        if($card = RfidCard::where('uid',$req->uid)->first() != null){
            return ("Card exists already!");
        }
        RfidCard::create(['uid'=>$req->uid]);
        return 201;
    }

    public function update(Request $req){
        try{ 
            $req->validate([ 
                'oldUid'=>['required', 'string',  'min:8', 'max:24'],
                'newUid'=>['required', 'string',  'min:8', 'max:24']
            ]); 
        }catch(ValidationException $err){return $err->getMessage(); }

        $card = RfidCard::where('uid',$req->oldUid)->first();
        if($card == null){return ("Card not found!");}
        $card->uid = $req->newUid;
        $card->save();
        return ("Success!");
    }

    public function delete(Request $req){
        try{ $req->validate([ 'uid'=>['required', 'string',  'min:3', 'max:100']]); }
        catch(ValidationException $err){return $err->getMessage(); }
        $card = RfidCard::where('uid',$req->uid)->first();
        if($card == null){return ("Card not found!");}
        $card->delete();
        return ("Success!");
    }
}