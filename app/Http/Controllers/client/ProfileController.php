<?php

namespace App\Http\Controllers\client;

use App\Models\File;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $UserData = User::select('id')->find(Auth::user()->id);
        $UserData = User::select('id')->find(Auth::user()->id);
        $PostData = Post::select('users.id as poster_id', 'users.name as poster_name', 'users.profile as poster_profile' ,'posts.id as post_id', 'posts.content', 'posts.privacy', 'posts.created_at', 'posts.updated_at')
                    ->leftjoin('users', 'users.id', 'posts.user_id')
                    ->where('posts.user_id', Auth::user()->id)
                    ->orderby('posts.created_at', 'desc')
                    ->get();
        $likes = Like::where('user_id', Auth::user()->id)->get();
        $Files = File::select('files.id', 'files.file_path', 'files.file_type' ,'files.post_id')
                ->leftjoin('posts', 'posts.id', 'files.post_id')
                ->where('posts.user_id', Auth::user()->id)
                ->get();
        // dd($PostData->toArray());
        return Inertia::render('profile/index', [
            'PostData' => $PostData,
            'LikePost' => $likes,
            'UserData' => $UserData,
            'FileData' => $Files,
            'UserData' => $UserData
        ]);
    }
}
