<?php

namespace App\Http\Controllers;

use App\Models\access;
use App\Models\door;
use App\Models\Log;
use App\Models\keycard;
use Error;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\MqttClient;

class accessController extends Controller
{
    public function getAll(){return access::all();}

    public function add(Request $req)
    {
        try {
            $req->validate([
                'cardUid' => ['required', 'string', 'min:3', 'max:100'],
                'doorName' => ['required', 'string', 'min:3', 'max:100'],
            ]);
        }catch(ValidationException $err){return $err->getMessage(); }

        $card = keycard::where('uid', $req->cardUid)->first();
        $door = door::where('name', $req->doorName)->first();

        if($card==null or $door==null){
            return ("card or door unknown");
        }

        if(access::where('cardId', $card->id)->where('doorId', $door->id)->first() != null){
            return ("access exists already!");
        }

        access::create([
            'cardId' => $card->id,
            'doorId' => $door->id,
        ]);
        return 201;
    }

    public function check(Request $req)
    {
        try {
            $req->validate([
                'cardUid' => ['required', 'string', 'min:3', 'max:100'],
                'doorName' => ['required', 'string', 'min:3', 'max:100'],
            ]);
        }catch(ValidationException $err){return $err->getMessage(); }

        $card = keycard::where('uid', $req->cardUid)->first();
        $door = door::where('name', $req->doorName)->first();
        if($card==null or $door==null){return ("access not found!");}
        $access = access::where('cardId', $card->id)->where('doorId', $door->id)->first();

        if ($access==null){
            Log::create([
                'cardId' => $card->id,
                'doorId' => $door->id,
                'accessGranted' => false,
            ]);
            return 0;
        }

        Log::create([
            'cardId' => $card->id,
            'doorId' => $door->id,
            'accessGranted' => true,
        ]);
        return 1;
    }

    public function delete(Request $req)
    {
        try {
            $req->validate([
                'cardUid' => ['required', 'string', 'min:3', 'max:100'],
                'doorName' => ['required', 'string', 'min:3', 'max:100'],
            ]);
        }catch(ValidationException $err){return $err->getMessage(); }

        $card = keycard::where('uid', $req->cardUid)->first();
        $door = door::where('name', $req->doorName)->first();
        if($card==null or $door==null){return ("access not found!");}

        $access = access::where('cardId', $card->id)->where('doorId', $door->id)->first();
        if($access == null){return ("access not found!");}
        $access->delete();
        return("Success!");
    }

}
