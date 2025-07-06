<?php

namespace App\Http\Controllers\CRMControllers;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        $notes = Note::with('notable', 'user')->get();
        return response()->json($notes);
    }

    public function store(Request $request){
        $note               = new Note();
        $note->user_id      = auth()->user()->id;
        $note->notable_id   = $request->input('notable_id');
        $note->notable_type = $request->input('notable_type');
        $note->details      = $request->input('details');
        $note->save();
        return redirect()->back();
    }

    public function show($id){
        $note = Note::with('notable', 'user')->findOrFail($id);
        return response()->json($note);
    }

    public function update(Request $request, $id){
        $note = Note::findOrFail($id);
        if ($request->has('user_id')) {
            $note->user_id = auth()->user()->id;
        }
        if ($request->has('notable_id')) {
            $note->notable_id = $request->input('notable_id');
        }
        if ($request->has('notable_type')) {
            $note->notable_type = $request->input('notable_type');
        }
        if ($request->has('details')) {
            $note->details = $request->input('details');
        }
        $note->save();
        return response()->json($note);
    }

    public function destroy($id){
        $note = Note::findOrFail($id);
        $note->delete();
        return response()->json(null, 204);
    }
}
