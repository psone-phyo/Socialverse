<?php

namespace App\Http\Controllers\client;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $UserData = User::select('id')->find(Auth::user()->id);
        $FriendList = User::select('users.id', 'users.name','users.profile')
                    ->leftjoin('friendships', 'friendships.user_id', 'users.id')
                    ->where([
                        ['friendships.user_id', Auth::user()->id],
                        ['friendships.status', '!=' ,'friends'],
                    ])
                    ->orWhereNull('friendships.id')
                    ->get();
        $PostData = Post::select('users.id as poster_id', 'users.name as poster_name', 'users.profile as poster_profile' ,'posts.id as post_id', 'posts.content', 'posts.privacy', 'posts.created_at', 'posts.updated_at')
                    ->leftjoin('friendships', 'friendships.friend_id', 'posts.user_id')
                    ->leftjoin('users', 'users.id', 'posts.user_id')
                    ->where([
                        ['friendships.user_id', Auth::user()->id],
                        ['friendships.status', 'friends'],
                        ['posts.privacy', '!=' , 'private']
                    ])
                    ->orderby('posts.created_at', 'desc')
                    ->get();

        $likes = Like::where('user_id', Auth::user()->id)->get();
        $Files = File::select('files.id', 'files.file_path', 'files.file_type' ,'files.post_id')
                        ->leftjoin('posts', 'posts.id', 'files.post_id')
                        ->leftjoin('friendships', 'friendships.friend_id', 'posts.user_id')
                        ->where([
                            ['friendships.user_id', Auth::user()->id],
                            ['friendships.status', 'friends'],
                            ['posts.privacy', '!=' , 'private']
                        ])
                        ->get();
        // dd($Images->toArray());
        return Inertia::render('index', [
            'FriendList' => $FriendList,
            'PostData' => $PostData,
            'LikePost' => $likes,
            'UserData' => $UserData,
            'FileData' => $Files
        ]);
    }
}
