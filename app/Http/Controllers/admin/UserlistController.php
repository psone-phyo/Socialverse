<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserlistController extends Controller
{
    public function index(){
        $data = User::select('id', 'name', 'email', 'phone', 'dob', 'status', 'gender')->where('status', '!=', 'banned')->get();
        return view('userlist.userlist', compact('data'))->with(['pageSlug' => 'userlist']);
    }

    public function ban($id){
        User::find($id)->update([
            'status' => 'banned'
        ]);
        return to_route('userlist');
    }

    public function banlist(){
        $data = User::select('id', 'name', 'email', 'phone', 'dob', 'status', 'gender')->where('status','banned')->get();
        return view('userlist.banlist', compact('data'))->with(['pageSlug' => 'banlist']);
    }

    public function unban($id){
        User::find($id)->update([
            'status' => 'offline'
        ]);
        return to_route('banlist');
    }

    public function detail($id){
        $data = User::select('id','name', 'email', 'gender', 'phone', 'profile', 'bio' , 'dob', 'status')->where('id', $id)->first();
        return view('userlist.detail', compact('data'))->with(['pageSlug' => 'details']);
    }
}
