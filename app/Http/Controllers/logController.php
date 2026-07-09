<?php

namespace App\Http\Controllers;

use App\Models\log;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class logController extends Controller
{
    public function add(Request $req){
        try{
            $req->validate([
                'cardUid' => ['required', 'string', 'min:3', 'max:100'],
                'doorId' => ['required', 'string', 'min:3', 'max:100'],
            ]);
        }catch(ValidationException $err){return $err->getMessage(); }
        
        log::create([
            'cardUid' => $req->cardUid,
            'doorId' => $req->doorId
        ]);
        return 201;
    }

    public function getAll(){
        return log::join('Doors', 'Logs.doorId', '=', 'Doors.id')
            ->join('RfidCards', 'Logs.cardId', '=', 'RfidCards.id')
            ->select('Doors.name as doorName', 'RfidCards.uid as cardUid', 'Logs.created_at as time', 'Logs.accessGranted')
            ->orderBy('time','desc')
            ->get();
    }

    public function getPastDay(){
        return log::join('Doors', 'Logs.doorId', '=', 'Doors.id')
            ->join('RfidCards', 'Logs.cardId', '=', 'RfidCards.uid')
            ->select('Doors.name as doorName', 'RfidCards.uid as cardUid', 'Logs.created_at as time', 'Logs.accessGranted')
            ->where('Logs.created_at', '>=', now()->subDay())
            ->orderBy('time','desc')
            ->get();
    }

    public function getPastWeek(){
        return log::join('Doors', 'Logs.doorId', '=', 'Doors.id')
            ->join('RfidCards', 'Logs.cardId', '=', 'RfidCards.uid')
            ->select('Doors.name as doorName', 'RfidCards.uid as cardUid', 'Logs.created_at as time', 'Logs.accessGranted')
            ->where('Logs.created_at', '>=', now()->subWeek())
            ->orderBy('time','desc')
            ->get();
    }

    public function getPastMonth(){
        return log::join('Doors', 'Logs.doorId', '=', 'Doors.id')
            ->join('RfidCards', 'Logs.cardId', '=', 'RfidCards.uid')
            ->select('Doors.name as doorName', 'RfidCards.uid as cardUid', 'Logs.created_at as time', 'Logs.accessGranted')
            ->where('Logs.created_at', '>=', now()->subMonth())
            ->orderBy('time','desc')
            ->get();
    }

    public function getPastYear(){
        return log::join('Doors', 'Logs.doorId', '=', 'Doors.id')
            ->join('RfidCards', 'Logs.cardId', '=', 'RfidCards.uid')
            ->select('Doors.name as doorName', 'RfidCards.uid as cardUid', 'Logs.created_at as time', 'Logs.accessGranted')
            ->where('Logs.created_at', '>=', now()->subYear())
            ->orderBy('time','desc')
            ->get();
    }
}
