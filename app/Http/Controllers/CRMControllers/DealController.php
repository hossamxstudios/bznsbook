<?php
namespace App\Http\Controllers\CRMControllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Deal;
use App\Models\Log;
use App\Models\Note;
use App\Models\Pipeline;
use App\Models\Stage;
use Illuminate\Http\Request;

class DealController extends Controller {

    public function index(){
        $pipeline = Pipeline::with('stages.deals')->first();
        return redirect()->route('deals.show', $pipeline->id);
    }

    public function show($id){
        $pipeline    = Pipeline::with('stages.deals')->findOrFail($id);
        $deals       = Deal::with('contacts')->get();
        $pipelines   = Pipeline::with('stages')->get();
        $companies   = Company::all();
        $contacts    = Contact::all();
        $stages_ids  = $pipeline->stages?->pluck('id')->toArray();
        $notes       = Note::with('notable')->get();
        $logs        = Log::with('loggable')->get();
        return view('admin.deals',compact('pipeline','deals','pipelines','companies','contacts','stages_ids','notes','logs'));
    }

    public function store(Request $request){
        $deal                   = new Deal();
        $deal->pipeline_id      = $request->pipeline_id;
        $deal->stage_id         = $request->stage_id;
        $deal->name             = $request->name;
        $deal->amount           = $request->amount;
        $deal->closed_at        = $request->closed_at??null;

        if($deal->save()){
            $deal->companies()->attach($request->company_id);
            $deal->contacts()->attach($request->contact_id);
            $log                = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Deal';
            $log->loggable_id   = $deal->id;
            $log->title         = 'Created Deal';
            $log->details       = 'Deal "' . $deal->name . '" created with amount "' . $deal->amount . '" for company "' . $deal->company?->name . '" and contact "' . $deal->contact?->name ;
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $deal       = Deal::findOrFail($id);
        $pipeline   = Pipeline::findOrFail($request->pipeline_id);
        $stage      = Stage::findOrFail($request->stage_id);
        $changes    = [];
        if ($request->pipeline_id && $request->pipeline_id != $deal->pipeline_id) {
            $changes[] = 'Pipeline changed from ' . $deal->pipelin?->name . ' to ' . $pipeline->name;
            $deal->pipeline_id = $request->pipeline_id;
        }
        if ($request->stage_id && $request->stage_id != $deal->stage_id) {
            $changes[] = 'Stage changed from ' . $deal->stage?->name . ' to ' . $stage->name;
            $deal->stage_id = $request->stage_id;
        }
        if ($request->name && $request->name !== $deal->name) {
            $changes[] = 'Name changed from ' . $deal->name . ' to ' . $request->name;
            $deal->name = $request->name;
        }
        if ($request->amount && $request->amount != $deal->amount) {
            $changes[] = 'Amount changed from ' . $deal->amount . ' to ' . $request->amount;
            $deal->amount = $request->amount;
        }
        if ($request->closed_at && $request->closed_at !== date('Y-m-d', strtotime($deal->closed_at))) {
            $changes[] = 'Closed At changed from ' . $deal->closed_at . ' to ' . $request->closed_at;
            $deal->closed_at = $request->closed_at??null;
        }
        if (count($changes) > 0) {
            $deal->save();
            $log = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Deal';
            $log->loggable_id   = $deal->id;
            $log->title         = 'Updated Deal By ' . auth()->user()->name;
            $log->details       = implode(',<br> ', $changes) ;
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function destroy($id){
        $deal = Deal::findOrFail($id);
        if ($deal->delete()) {
            $log                = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Deal';
            $log->loggable_id   = $deal->id;
            $log->title         = 'Deleted Deal By ' . auth()->user()->name;
            $log->details       = 'Deal "' . $deal->name . '" has been deleted' ;
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function assignCompany(Request $request, Deal $deal){
        $deal->companies()->attach($request->company_id);
        if($deal->save()){
            $log                = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Deal';
            $log->loggable_id   = $deal->id;
            $log->title         = 'Assigned Company To Deal By ' . auth()->user()->name;
            $log->details       = 'Deal "' . $deal->name . '" has been assigned to company "' . $deal->comapny?->name . '" ' ;
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back()->with('success', 'Company assigned successfully!');
    }

    public function assignContact(Request $request, Deal $deal){
        $deal->contacts()->attach($request->contact_id);
        if($deal->save()){
            $log = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Deal';
            $log->loggable_id   = $deal->id;
            $log->title         = 'Assigned Contact To Deal By ' . auth()->user()->name;
            $log->details = 'Deal "' . $deal->name . '" has been assigned to contact "' . $deal->contact?->name . '" ';
            $log->log_date      = now();
            $log->save();
            }

        return redirect()->back()->with('success', 'Contact assigned successfully!');
    }

    public function trashed(){
        $deals = Deal::onlyTrashed()->get();
        return response()->json($deals);
    }

    public function restore($id){
        $deal = Deal::onlyTrashed()->findOrFail($id);
        $deal->restore();
        return response()->json(['message' => 'Deal restored successfully!', 'data' => $deal]);
    }

    public function getStages($pipelineId){
        $stages = Stage::where('pipeline_id', $pipelineId)->pluck('id');
        return response()->json($stages);
    }

    public function getContacts($companyId){
        $contacts = Contact::where('company_id', $companyId)->get();
        return response()->json($contacts);
    }

    public function updateStage(Request $request){
        $deal = Deal::findOrFail($request->input('deal_id'));
        $deal->stage_id = $request->input('stage_id');
        $deal->save();
        return response()->json(['status' => 'success','message' => 'Deal stage updated successfully','deal_id' => $deal->id,'new_stage_id' => $deal->stage_id ]);
    }

    public function markAsPaid( $id){
        $changes    = [];
        $deal = Deal::findOrFail($id);
        $deal->is_paid = 1;
        if ( $deal->save()) {
            $changes[] = 'Deal is Marked as Paid at ';
            if (count($changes) > 0) {
                $log = new Log();
                $log->user_id       = auth()->user()->id;
                $log->loggable_type = 'App\Models\Deal';
                $log->loggable_id   = $deal->id;
                $log->title         = 'Paid Deal By ' . auth()->user()->name;
                $log->details       = implode(',<br> ', $changes) ;
                $log->log_date      = now();
                $log->save();
            }
        }
        return redirect()->back()->with('success', 'Deal marked as paid successfully!');
    }

}
