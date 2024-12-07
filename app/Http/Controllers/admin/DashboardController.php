<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = User::get()->count();
        $activeuser = User::select('name', 'gender', 'dob')->where('status', 'online')->get();
        $activecount = User::where('status', 'online')->count();
        $postcount = Post::count();
        $feedbacks = Feedback::select('users.name', 'feedback.feedback')
                    ->leftjoin('users', 'users.id', 'feedback.user_id')
                    ->get();
        return view('dashboard', compact(['user', 'activeuser', 'activecount','postcount', 'feedbacks']))->with(['pageSlug' => 'dashboard']);
        // dd('hi');
    }
}
