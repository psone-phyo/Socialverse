<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\Image;
use App\models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
    public function index(){
        $data = Report::select('reports.id as report_id', 'reports.user_id', 'users.name', 'reports.post_id')
                    ->leftjoin('users', 'users.id', 'reports.user_id')
                    ->get();
        return view('report.reports', compact('data'))->with(['pageSlug' => 'report']);
    }

    public function viewpost($id){
        $data = Post::select('posts.user_id', 'posts.id', 'posts.content', 'users.name')
                    ->leftjoin('users','users.id', 'posts.user_id')
                    ->where('posts.id', $id)
                    ->first();
        $images = Image::select('image')->where('post_id', $id)->get();
                    // dd($data->toArray(), $images->toArray());
        return view('report.posts', compact('data', 'images'))->with(['pageSlug' => 'posts']);
    }
}

