<?php

namespace App\Http\Controllers\admin;

use App\Models\Violence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViolenceController extends Controller
{
    public function index(){
        $data = Violence::get();
        return view('violenceRule.violencerule', compact('data'))->with(['pageSlug' => 'violence']);
    }

    public function store(Request $request){
        $request->validate([
            'violence' => 'required'
        ]);

        Violence::create([
            'violence' => $request->violence
        ]);
        return back();
    }

    public function delete($id){
        Violence::find($id)->delete();
        return back();
    }

    public function edit(Request $request, $id){
        if ($request->violence != null){
            Violence::find($id)->update([
                'violence' => $request->violence
            ]);
        }
        return to_route('violence');
    }

    public function editForm($id){
        $data = Violence::get();
        return view('violenceRule.violenceruleEdit', compact('data', 'id'))->with(['pageSlug' => 'violence']);
    }
}
