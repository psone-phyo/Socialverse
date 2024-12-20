<?php

namespace App\Http\Controllers\client;

use App\Models\File;
use App\Models\Like;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        return Inertia::render('post/create');
    }

    public function store(Request $request){
        $data  = Post::create([
            'user_id' => Auth::user()->id,
            'content' => $request->description,
            'privacy' => 'public'
        ]);
        foreach($request->input('files') as $file){
            $file = $file["data"];
            $fileStart = strpos($file, ':') + 1;
            $fileEnd = strpos($file, '/');
            $fileType = substr($file, $fileStart, $fileEnd - $fileStart);
            // dd($fileType);

            if ($fileType == 'video'){
                $videostart = strpos($file, '/') + 1;
                $videoend = strpos($file, ';');
                $format = substr($file, $videostart, $videoend - $videostart);
                // dd($videoType);
            }elseif ($fileType == 'image'){
                $imageStart = strpos($file, '/') + 1;
                $imageEnd = strpos($file, ';');
                $format = substr($file, $imageStart, $imageEnd - $imageStart);
                // dd($imageType);
            }

            // Remove the "data:image/jpeg;base64," part if it exists
            $file = str_replace("data:{$fileType}/{$format};base64,", '', $file);
            $file = str_replace(' ', '+', $file); // Replace spaces with "+" to make it valid
            // Decode the Base64 string into binary data
            $fileData = base64_decode($file);

            // Generate a unique filename
            $fileName = uniqid('sv63_') . '.'.$format;  // You can adjust the extension depending on the image type

            // Save the image to the storage (public disk or another disk as needed)
            Storage::disk('public')->put('posts/' . $fileName, $fileData);

            // Store the file path in the database
            File::create([
                'file_path' => '/storage/posts/'.$fileName,
                'file_type' => $fileType,
                'post_id' => $data->id
            ]);
        }
        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    public function like(Request $request){
        Like::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id
        ]);
    }

    public function unlike(Request $request){
        Like::where([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id
        ])->delete();
    }
}
