<?php

namespace App\Http\Controllers\CRMControllers;
use App\Http\Controllers\Controller;

use App\Models\Industry;
use App\Models\Log;
use App\Models\Note;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index(){
        $industries = Industry::all();
        $notes      = Note::with('notable')->get();
        $logs       = Log::with('loggable')->get();
        return view('admin.industry',compact('industries','logs','notes'));
    }

    public function store(Request $request){
        $Industry               = new Industry();
        $Industry->name         = $request->name;
        $Industry->is_active    = $request->is_active ?1:0;
        $Industry->save();
        return redirect()->back()->with('success', 'Industry created successfully.');
    }

    public function update(Request $request,$id){
        $Industry            = Industry::findOrFail($id);
        $Industry->name      = $request->name;
        $Industry->is_active = $request->is_active ?1:0;
        $Industry->save();
        return redirect()->back()->with('success', 'Industry updated successfully.');
    }

    public function destroy($id){
        $Industry            = Industry::findOrFail($id);
        $Industry->delete();
        return redirect()->back()->with('success', 'Industry deleted successfully.');
    }
}
