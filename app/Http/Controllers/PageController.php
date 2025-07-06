<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Deal;
use App\Models\Lead;
use App\Models\Pipeline;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Section;
use App\Models\Category;
use App\Models\Service;

class PageController extends Controller{

    public function firstPage(){
        return view('admin.first');
    }

    public function adminIndex(Request $request){
        $pipeline_select          = $request->pipeline_select;
        if($pipeline_select != 'all' && $pipeline_select != null){
            $the_pipeline         = Pipeline::where('id',$pipeline_select)->get('id');
            $pipeline_select      = Pipeline::find($pipeline_select)->id;
        }elseif($pipeline_select == 'all'){
            $the_pipeline         = Pipeline::get('id');
            $pipeline_select      = 0;
        }else{
            $the_pipeline         = Pipeline::get('id');
            $pipeline_select      = 0;
        }
        $pipelines            = Pipeline::all();
        $startDate            = $request->start_date?? date('Y-m-d', strtotime('first day of january this year'));
        $endDate              = $request->end_date ??now();
        $leads                = Lead::count();
        $contacts             = Contact::count();
        $companies            = Company::count();
        $latest_deals         = Deal::latest()->take(10)->get();
        $latest_companies     = Company::latest()->take(10)->get();
        // Total deals
        $total_deals          = Deal::count();
        // Lost deals
        $lost_deals           = Deal::with('stage')->whereIn('pipeline_id',$the_pipeline)->whereBetween('created_at', [$startDate, $endDate])->whereRelation('stage','percentage', 0)->get();
        $total_lost_amount    = $lost_deals->sum('amount');
        $total_lost_deals     = $lost_deals->count();
        // Won deals
        $won_deals            = Deal::with('stage')->whereIn('pipeline_id',$the_pipeline)->whereBetween('created_at', [$startDate, $endDate])->whereRelation('stage','percentage', 100)->get();
        $total_won_amount     = $won_deals->sum('amount');
        $total_won_deals      = $won_deals->count();
        // Pending deals
        $pending_deals        = Deal::with('stage')->whereIn('pipeline_id',$the_pipeline)->whereBetween('created_at', [$startDate, $endDate])->whereHas('stage', function ($query) {$query->where('percentage', '>', 0)->where('percentage', '<', 100);})->get();
        $total_pending_amount = $pending_deals->sum('amount');
        $total_pending_deals  = $pending_deals->count();
        // Paid and unpaid deals
        $paid_deals           = Deal::with('stage')->whereIn('pipeline_id',$the_pipeline)->whereBetween('created_at', [$startDate, $endDate])->where('is_paid', 1)->count();
        $unpaid_deals         = Deal::with('stage')->whereIn('pipeline_id',$the_pipeline)->whereBetween('created_at', [$startDate, $endDate])->where('is_paid', 0)->count();

        return view('admin.home1', compact('leads','contacts','companies','total_deals','total_lost_deals',
                                    'total_won_deals','total_pending_deals','paid_deals','unpaid_deals','latest_deals',
                                    'latest_companies','total_lost_amount','total_won_amount','total_pending_amount','startDate','endDate','pipelines','pipeline_select','the_pipeline'));

    }

    public function leadForm(){
        $services = Service::all();
        return view('admin.leadForm', compact('services'));
    }

    public function applyLeadForm(Request $request){
        $lead = Lead::where('email', $request->personal_email)->first();
        if (!$lead) {
            $lead = new Lead();
        }
        if($request->personal_email){
            $contact = Contact::where('email', $request->personal_email)->first();
            if (!$contact) {
                $contact    = new Contact();
            }
            $lead->type = "b2c";
            $contact->name  = $request->name;
            $contact->email = $request->personal_email;
            $contact->country_code = $request->country_code;
            $contact->phone = $request->phone;
            $contact->title = $request->job_title;
            $contact->save();
        }
        if($request->company_website && $request->company_name){
            $company = Company::where('website', $request->company_website)->first();
            if (!$company){
                $company      = new Company();
            }
            $lead->type = "b2b";
            $company->name    = $request->company_name;
            $company->website = $request->company_website;
            $company->save();
        }
        $lead->contact_id      = $contact->id;
        $lead->company_id      = $company->id ?? null;
        $lead->name            = $request->name;
        $lead->email           = $request->personal_email;
        $lead->phone           = $request->phone;
        $lead->title           = $request->job_title;
        $lead->source          = 'form';
        $lead->company_name    = $request->company_name;
        $lead->save();
        if($request->services){
            $lead->services()->attach($request->services);
        }
        if($lead->save()){
            return back()->with('success', 'Lead has been submitted successfully');
        }
        return back()->with('error', 'An error occurred while submitting your lead');

    }

    public function homePage(){
        $services = Section::all();
        return view('web.home', compact('services'));
    }

    public function pricingPage(){
        return view('web.pricing');
    }

    public function aboutPage(){
        return view('web.about');
    }

    public function contactPage(){
        return view('web.contact');
    }

    public function companiesPage(Request $request){
        $query = Client::query();
        // Apply search if provided (only if user is logged in and has active subscription)
        if ($request->has('search') && !empty($request->search)) {
            // Only apply search filter if user has an active subscription
            if (auth('client')->check() && auth('client')->user()->hasActiveSubscription()) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
        }
        // Apply subcategory filter if provided
        if ($request->has('subcategory') && !empty($request->subcategory)) {
            $subcategory = $request->subcategory;
            $query->whereHas('subcategories', function($q) use ($subcategory) {
                $q->where('name', $subcategory);
            });
        }
        // Apply service filter if provided (only if user is logged in and has active subscription)
        if ($request->has('service') && !empty($request->service)) {
            // Only apply service filter if user has an active subscription
            if (auth('clients')->check() && auth('clients')->user()->hasActiveSubscription()) {
                $serviceName = $request->service;
                $clientIds = Service::where('name', $serviceName)->pluck('client_id')->toArray();
                $query->whereIn('id', $clientIds);
            }
        }
        $clients    = $query->paginate(10)->appends($request->except('page'));
        $categories = Category::all();
        $services   = Service::select('name')->distinct()->get();
        return view('web.companies', compact('clients', 'categories', 'services', 'request'));
    }

    public function libraryBusinessGuide(){
        return view('web.guides.business');
    }

    public function libraryShippingGuide(){
        return view('web.guides.shipping');
    }

    public function libraryMiddleEastGuide(){
        return view('web.guides.middle-east');
    }

    public function selectPlan(){
        return view('web.select-plan');
    }

}
