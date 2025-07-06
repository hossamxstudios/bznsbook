<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    public function index(){
        $sections = Section::all();
        return view('admin.sections',compact('sections'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'icon' => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $section = new Section();
        $section->name = $request->name;
        $section->details = $request->details;
        $section->save();

        // Handle icon upload
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $section->addMediaFromRequest('icon')
                ->toMediaCollection('icons');
        }

        return redirect()->back()->with('success', 'Section created successfully.');
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'icon' => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $section = Section::findOrFail($id);
        $section->name = $request->name;
        $section->details = $request->details;
        $section->save();

        // Handle icon upload
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            // Clear previous media if needed
            $section->clearMediaCollection('icons');
            $section->addMediaFromRequest('icon')
                ->toMediaCollection('icons');
        }

        return redirect()->back()->with('success', 'Section updated successfully.');
    }

    public function destroy($id){
        $section = Section::findOrFail($id);

        // Clear media before deleting
        $section->clearMediaCollection('icons');
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully.');
    }
}
