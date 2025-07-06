<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Topic;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::with('topic')->get();
        $topics = Topic::all();
        return view('admin.blogs', compact('blogs', 'topics'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'topic_id' => 'required|exists:topics,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $blog = new Blog();
        $blog->topic_id = $request->topic_id;
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->slug = Str::slug($request->title);
        $blog->details = $request->details;
        $blog->save();

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $blog->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }

        return redirect()->back()->with('success', 'Blog created successfully.');
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'topic_id' => 'required|exists:topics,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $blog = Blog::findOrFail($id);
        $blog->topic_id = $request->topic_id;
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->slug = Str::slug($request->title);
        $blog->details = $request->details;
        $blog->save();

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Clear previous media
            $blog->clearMediaCollection('images');
            $blog->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }

        return redirect()->back()->with('success', 'Blog updated successfully.');
    }

    public function destroy($id){
        $blog = Blog::findOrFail($id);
        
        // Clear media before deleting
        $blog->clearMediaCollection('images');
        $blog->delete();
        
        return redirect()->back()->with('success', 'Blog deleted successfully.');
    }
}
