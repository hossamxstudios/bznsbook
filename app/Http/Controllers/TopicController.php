<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    public function index(){
        $topics = Topic::all();
        return view('admin.topics', compact('topics'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = Str::slug($request->name);
        $topic->save();

        return redirect()->back()->with('success', 'Topic created successfully.');
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $topic = Topic::findOrFail($id);
        $topic->name = $request->name;
        $topic->slug = Str::slug($request->name);
        $topic->save();

        return redirect()->back()->with('success', 'Topic updated successfully.');
    }

    public function destroy($id){
        $topic = Topic::findOrFail($id);
        $topic->delete();
        
        return redirect()->back()->with('success', 'Topic deleted successfully.');
    }
}
