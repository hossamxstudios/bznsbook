<?php

namespace App\Http\Controllers\CRMControllers;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(){
        $logs = Log::with('loggable', 'user')->get();
        return response()->json($logs);
    }

    public function store(Request $request){
        $log                = new Log();
        $log->user_id       = auth()->user()->id;
        $log->loggable_id   = $request->loggable_id;
        $log->loggable_type = $request->loggable_type;
        $log->title         = $request->title;
        $log->details       = $request->details;
        $log->log_date      = $request->log_date ?? now();
        $log->save();
        if($log->loggable_type =='App\Models\Lead'){
           $lead=Lead::find($log->loggable_id);
           $lead->last_contacted_at = $request->log_date ?? now();
            $lead->save();
        }

        return redirect()->back();
    }

    public function show($id){
        $log = Log::with('loggable', 'user')->findOrFail($id);
        return response()->json($log);
    }

    public function update(Request $request, $id){
        $log = Log::findOrFail($id);
        if ($request->has('user_id')) {
            $log->user_id = $request->input('user_id');
        }
        if ($request->has('loggable_id')) {
            $log->loggable_id = $request->input('loggable_id');
        }
        if ($request->has('loggable_type')) {
            $log->loggable_type = $request->input('loggable_type');
        }
        if ($request->has('title')) {
            $log->title = $request->input('title');
        }
        if ($request->has('details')) {
            $log->details = $request->input('details');
        }
        if ($request->has('log_date')) {
            $log->log_date = $request->input('log_date');
        }
        $log->save();
        return response()->json($log);
    }

    public function destroy($id){
        $log = Log::findOrFail($id);
        $log->delete();

        return response()->json(null, 204);
    }
}
