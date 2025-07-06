<?php

namespace App\Http\Controllers\CRMControllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\Pipeline;
use App\Models\Stage;
use App\Models\Log;
use App\Models\Industry;
use Illuminate\Http\Request;
class LeadController extends Controller {

    public function index(){
        $leads      = Lead::with('company','contact')->paginate(50);
        $companies  = Company::all();
        $contacts   = Contact::all();
        $industries = Industry::all();
        $pipelines  = Pipeline::with('stages')->where('type', 'lead')->get();
        $stages     = Stage::all();
        return view('admin.leads', compact('leads', 'companies', 'contacts', 'pipelines', 'industries', 'stages'));
    }

    public function store(Request $request){
        $lead                       = new Lead();
        $lead->pipeline_id          = $request->pipeline_id ?? null;
        $lead->stage_id             = $request->stage_id ?? null;
        $lead->name                 = $request->name;
        $lead->company_id           = $request->company_id ?? null;
        $lead->contact_id           = $request->contact_id ?? null;
        $lead->email                = $request->contact_email ?? null;
        $lead->phone                = $request->phone ?? null;
        $lead->title                = $request->title ?? null;
        $lead->industry_id          = $request->industry_id ?? null;
        $lead->label                = $request->label ?? null;
        $lead->last_contacted_at    = $request->last_contacted_at ?? null;
        $lead->type                 = $request->type ?? null;
        $lead->source               = $request->source ?? null;
        if ($lead->save()) {
            $log                    = new Log();
            $log->user_id           = $request->user()->id;
            $log->loggable_type     = 'App\Models\Lead';
            $log->loggable_id       = $lead->id;
            $log->title             = 'Created Lead';
            $log->details           = 'Lead "' . $lead->name . '" has been created';
            $log->log_date          = now();
            $log->save();
            if ($request->company_email) {
                $check                      = Company::where('email', $request->company_email)->first();
                if (!$check) {
                    $company                = new Company();
                    $company->name          = $request->company_name ?? null;
                    $company->email         = $request->company_email ?? null;
                    $company->industry_id   = $request->industry_id ?? null;
                    $company->capacity      = $request->capacity ?? null;
                    if ($company->save()) {
                        $log                = new Log();
                        $log->user_id       = $request->user()->id;
                        $log->loggable_type = 'App\Models\Company';
                        $log->loggable_id   = $company->id;
                        $log->title         = 'Created Company';
                        $log->details       = 'Company "' . $company->name . '" has been created';
                        $log->log_date      = now();
                        $log->save();
                    }
                }
            }
            if ($request->contact_email) {
                $company                    = Company::where('email', $request->company_email)->first();
                $check                      = Contact::where('email', $request->contact_email)->first();
                if (!$check) {
                    $contact                = new Contact();
                    $contact->company_id    = $company->id ?? null;
                    $contact->name          = $request->name ?? null;
                    $contact->email         = $request->contact_email ?? null;
                    $contact->phone         = $request->phone ?? null;
                    $contact->title         = $request->title ?? null;
                    $contact->status        = 'new';
                    if ($contact->save()) {
                        $log = new Log();
                        $log->user_id       = $request->user()->id;
                        $log->loggable_type = 'App\Models\Contact';
                        $log->loggable_id   = $contact->id;
                        $log->title         = 'Created Contact';
                        $log->details       = 'Contact "' . $contact->name . '" has been created';
                        $log->log_date      = now();
                        $log->save();
                    }
                }
            }
            return redirect()->back();
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    public function update(Request $request, $id){
        $lead       = Lead::findOrFail($id);
        $pipeline   = Pipeline::findOrFail($request->pipeline_id);
        $stage      = Stage::findOrFail($request->stage_id);
        $company    = Company::findOrFail($request->company_id);
        $contact    = Contact::findOrFail($request->contact_id);
        $changes    = [];
        if ($request->pipeline_id && $request->pipeline_id != $lead->pipeline_id) {
            $changes[] = 'Pipeline changed from ' . $lead->pipeline?->name . ' to ' . $pipeline->name;
            $lead->pipeline_id = $request->pipeline_id;
        }
        if ($request->stage_id && $request->stage_id != $lead->stage_id) {
            $changes[] = 'Stage changed from ' . $lead->stage?->name . ' to ' . $stage->name;
            $lead->stage_id = $request->stage_id;
        }
        if ($request->name && $request->name !== $lead->name) {
            $changes[] = 'Name changed from ' . $lead->name . ' to ' . $request->name;
            $lead->name = $request->name;
        }
        if ($request->contact_email && $request->contact_email !== $lead->email) {
            $changes[] = 'Email changed from ' . $lead->email . ' to ' . $request->contact_email;
            $lead->email = $request->contact_email;
        }
        if ($request->phone && $request->phone !== $lead->phone) {
            $changes[] = 'Phone changed from ' . $lead->phone . ' to ' . $request->phone;
            $lead->phone = $request->phone;
        }
        if ($request->title && $request->title !== $lead->title) {
            $changes[] = 'Title changed from ' . $lead->title . ' to ' . $request->title;
            $lead->title = $request->title;
        }
        if ($request->company_id && $request->company_id != $lead->company_id) {
            $changes[] = 'Company changed from ' . $lead->company?->name . ' to ' . $company->name;
            $lead->company_id = $request->company_id;
        }
        if ($request->contact_id && $request->contact_id != $lead->contact_id) {
            $changes[] = 'Contact changed from ' . $lead->contact?->name . ' to ' . $contact->name;
            $lead->contact_id = $request->contact_id;
        }
        if ($request->label && $request->label !== $lead->label) {
            $changes[] = 'Label changed from ' . $lead->label . ' to ' . $request->label;
            $lead->label = $request->label;
        }
        if ($request->type && $request->type !== $lead->type) {
            $changes[] = 'Type changed from ' . $lead->type . ' to ' . $request->type;
            $lead->type = $request->type;
        }
        if ($request->source && $request->source !== $lead->source) {
            $changes[] = 'Source changed from ' . $lead->source . ' to ' . $request->source;
            $lead->source = $request->source;
        }
        if (count($changes) > 0) {
            $lead->save();
            $log                = new Log();
            $log->user_id       = $request->user()->id;
            $log->loggable_type = 'App\Models\Lead';
            $log->loggable_id   = $lead->id;
            $log->title         = 'Updated Lead';
            $log->details       = implode(',<br>', $changes) ;
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $lead                   = Lead::findOrFail($id);
        if ($lead->delete()) {
            $log                = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Lead';
            $log->loggable_id   = $lead->id;
            $log->title         = 'Deleted Lead ';
            $log->details       = 'Lead "' . $lead->name . '" has been deleted';
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function assignCompany(Request $request, $id)
    {
        $lead =Lead::findOrFail($id);
        $lead->company_id       = $request->company_id;

        if ($lead->save()) {
            $log                = new Log();
            $log->user_id       = $request->user()->id;
            $log->loggable_type = 'App\Models\Lead';
            $log->loggable_id   = $lead->id;
            $log->title         = 'Assigned Company To Lead ';
            $log->details       = 'Lead "' . $lead->name . '" has been assigned to company "' . $lead->company->name . '" ';
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back()->with('success', 'Company assigned successfully!');
    }

    public function assignContact(Request $request, $id)
    {
        $lead =Lead::findOrFail($id);
        $lead->contact_id       = $request->contact_id;
        if ($lead->save()) {
            $log                = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Lead';
            $log->loggable_id   = $lead->id;
            $log->title         = 'Assigned Contact To Lead';
            $log->details       = 'Lead "' . $lead->name . '" has been assigned to contact "' . $lead->contact?->name . '" ';
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back()->with('success', 'Contact assigned successfully!');
    }

    public function getStages($pipelineId)
    {
        $stages = Stage::where('pipeline_id', $pipelineId)->get();
        return response()->json($stages);
    }
}
