<?php

namespace App\Http\Controllers\CRMControllers;

use App\Http\Controllers\Controller;
use App\Models\Pipeline;
use App\Models\Stage;
use Illuminate\Http\Request;

class PipelineController extends Controller {

    public function index(){
        $pipelines = Pipeline::all();
        return view('admin.pipelines', compact('pipelines'));
    }

    public function store(Request $request) {
        $pipeline = new Pipeline();
        $pipeline->name = $request->pipeline_name;
        $pipeline->type = $request->type;
        $pipeline->save();
        if (!empty($request->stage_names) && !empty($request->stage_percentages)) {
            foreach ($request->stage_names as $index => $stageName) {
                $percentage = $request->stage_percentages[$index] ?? 0;
                $stage = new Stage();
                $stage->pipeline_id = $pipeline->id;
                $stage->name = $stageName;
                $stage->percentage = $percentage;
                $stage->save();
            }
        }
        return redirect()->back()->with('success', 'Pipeline created successfully!');
    }

    public function update(Request $request, $id){
        $pipeline       = Pipeline::findOrFail($id);
        $pipeline->name = $request->pipeline_name;
        $pipeline->type = $request->type;
        $pipeline->save();
        // $existingStages = $pipeline->stages->pluck('id');
        foreach ($request->stages as $key_stage => $stage) {
            $ex_stage = Stage::find($stage['id']);
            if($ex_stage){
                $ex_stage->name = $stage['name'];
                $ex_stage->percentage = $stage['percentage'];
                $ex_stage->place = $stage['place'];
                $ex_stage->save();
            }else{
                $new_stage = new Stage();
                $new_stage->pipeline_id = $pipeline->id;
                $new_stage->name = $stage['name'];
                $new_stage->percentage = $stage['percentage'];
                $new_stage->place = $stage['place'];
                $new_stage->save();
            }
        }
        // // Delete stages that were removed
        // $stagesToDelete = $existingStages->keys()->diff($updatedStageIds);
        // if ($stagesToDelete->isNotEmpty()) {
        //     Stage::whereIn('id', $stagesToDelete)->delete();
        // }
        // Redirect back with success message
        return redirect()->back()->with('success', 'Pipeline updated successfully!');
    }



    public function destroy($id){
        $pipeline = Pipeline::findOrFail($id);
        $pipeline->delete();

        $pipelines = Pipeline::all();
        return redirect()->back();
    }


    public function getStages($pipelineId){
        $stages = Stage::where('pipeline_id', $pipelineId)->get();
        return response()->json($stages);
    }

}
