<?php
namespace App\Http\Controllers\CRMControllers;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function index()
    {
        $stages = Stage::all();
        return response()->json($stages);
    }

    public function show($id)
    {
        $stage = Stage::findOrFail($id);
        return response()->json($stage);
    }

    public function store(Request $request)
    {
        $stage = new Stage();
        $stage->pipeline_id = $request->pipeline_id;
        $stage->name = $request->name;
        $stage->stage_percentage = $request->stage_percentage;
        $stage->save();

        return response()->json(['message' => 'Stage created successfully!', 'data' => $stage], 201);
    }

    public function update(Request $request, $id)
    {
        $stage = Stage::findOrFail($id);
        $stage->pipeline_id = $request->pipeline_id ?? $stage->pipeline_id;
        $stage->name = $request->name ?? $stage->name;
        $stage->stage_percentage = $request->stage_percentage ?? $stage->stage_percentage;
        $stage->save();

        return response()->json(['message' => 'Stage updated successfully!', 'data' => $stage]);
    }

    public function destroy($id)
    {
        $stage = Stage::findOrFail($id);
        $stage->delete();

        return response()->json(['message' => 'Stage deleted successfully!']);
    }
}
