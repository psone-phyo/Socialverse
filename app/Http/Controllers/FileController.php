<?php

namespace App\Http\Controllers;

use App\Events\PusherEvent;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
       event(new PusherEvent('Hello World'));
       return response()->json(['message' => 'Event has been sent']);
    }
}
