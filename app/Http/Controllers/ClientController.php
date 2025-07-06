<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use App\Models\Subscription;

class ClientController extends Controller {

// ------------------------- Backend Functions -------------------------
    public function index(){
        $clients = Client::all();
        return view('admin.clients', compact('clients'));
    }
    /**
     * Store a newly created client in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'country' => ['nullable', 'string', 'max:100'],
            'zip' => ['nullable', 'string', 'max:20'],
            'title' => ['nullable', 'string', 'max:100'],
            'company_size' => ['nullable', 'string', 'max:50'],
            'website' => ['nullable', 'string', 'url', 'max:255'],
            'facebook' => ['nullable', 'string', 'url', 'max:255'],
            'linkedin' => ['nullable', 'string', 'url', 'max:255'],
            'instagram' => ['nullable', 'string', 'url', 'max:255'],
            'youtube' => ['nullable', 'string', 'url', 'max:255'],
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $client = Client::create($validated);
        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }
    /**
     * Update the specified client in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $client = Client::findOrFail($id);
        $validationRules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients,email,'.$id],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'country' => ['nullable', 'string', 'max:100'],
            'zip' => ['nullable', 'string', 'max:20'],
            'title' => ['nullable', 'string', 'max:100'],
            'company_size' => ['nullable', 'string', 'max:50'],
            'website' => ['nullable', 'string', 'url', 'max:255'],
            'facebook' => ['nullable', 'string', 'url', 'max:255'],
            'linkedin' => ['nullable', 'string', 'url', 'max:255'],
            'instagram' => ['nullable', 'string', 'url', 'max:255'],
            'youtube' => ['nullable', 'string', 'url', 'max:255'],
        ];
        // Only validate password if it's present in the request
        if ($request->filled('password')) {
            $validationRules['password'] = ['string', 'min:8'];
        }
        $validated = $request->validate($validationRules);
        // Hash the password if it's being updated
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }
        $client->update($validated);
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }
    /**
     * Remove the specified client from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
    /**
     * Remove multiple clients from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request){
        $ids = $request->ids;
        Client::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Clients deleted successfully."]);
    }
    /**
     * Display a listing of the trashed clients.
     * @return \Illuminate\Http\Response
     */
    public function trashed(){
        $clients = Client::onlyTrashed()->get();
        return view('admin.clients.trashed', compact('clients'));
    }
// ------------------------- Backend Functions -------------------------

// ------------------------- Frontend Functions -------------------------
    /**
     * Display the client profile page.
     */
    public function profile(){
        $user = auth('client')->user();
        return view('web.profile-details', compact('user'));
    }
    /**
     * Update client profile basic information
     */
    public function updateProfile(Request $request){
        $user = auth('client')->user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'company_size' => 'nullable|string|max:255',
            'is_company' => 'nullable|boolean',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);
        // Handle profile picture upload if provided
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($user->hasMedia('profile')) {
                $user->clearMediaCollection('profile');
            }
            // Add new profile picture
            $user->addMedia($request->file('profile_picture'))->toMediaCollection('profile');
        }
        // Handle cover photo upload if provided
        if ($request->hasFile('cover_photo')) {
            // Delete old cover photo if it exists
            if ($user->hasMedia('cover')) {
                $user->clearMediaCollection('cover');
            }
            // Add new cover photo
            $user->addMedia($request->file('cover_photo'))->toMediaCollection('cover');
        }
        // Remove the file fields from the validated data before updating
        unset($validated['profile_picture']);
        unset($validated['cover_photo']);
        // Update the client model
        Client::where('id', $user->id)->update($validated);
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    /**
     * Update client address information
     */
    public function updateAddress(Request $request){
        $user = auth('client')->user();
        $validated = $request->validate([
            'address' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'map' => 'nullable|string',
        ]);
        // Update the client model
        Client::where('id', $user->id)->update($validated);
        return redirect()->back()->with('success', 'Address updated successfully!');
    }
    /**
     * Update client social media information
     */
    public function updateSocial(Request $request){
        $user = auth('client')->user();
        $validated = $request->validate([
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);
        // Update the client model
        Client::where('id', $user->id)->update($validated);
        return redirect()->back()->with('success', 'Social links updated successfully!');
    }
    /**
     * Update client password
     */
    public function updatePassword(Request $request){
        $user = auth('client')->user();
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }
        // Update the client model
        Client::where('id', $user->id)->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success', 'Password updated successfully!');
    }
    /**
     * Update client profile picture
     */
    public function updateProfilePicture(Request $request){
        $user = auth('client')->user();
        $request->validate([
            'profile_picture' => 'required|image|max:5120', // Max 5MB
        ]);
        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            // Clear existing profile pictures
            $user->clearMediaCollection('profile');
            // Add the new profile picture
            $user->addMediaFromRequest('profile_picture')->toMediaCollection('profile');
            return redirect()->back()->with('success', 'Profile picture updated successfully!');
        }
        return redirect()->back()->with('error', 'Failed to upload profile picture.');
    }
    /**
     * Delete client account
     */
    public function deleteAccount(Request $request){
        $user = auth('client')->user();
        $request->validate([
            'confirm_delete' => 'required|accepted',
        ]);
        // Perform any cleanup needed before deletion
        // Delete the client account
        Client::where('id', $user->id)->delete();
        return redirect()->route('home')->with('success', 'Your account has been deleted.');
    }
    /**
     * Log the user out of the application.
     */
    public function logout(Request $request){
        auth('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
// ------------------------- Frontend Functions -------------------------

    public function projects(){
        // Redirect to the client's project applications view in our new project module
        return redirect()->route('client.projects.applications');
    }

    public function portfolio(){
        $user = auth('client')->user();
        $portfolios = $user->portfolios()->with(['media', 'services'])->latest()->get();
        $services = \App\Models\Service::all();
        return view('web.portfolio.profile-portfolio', compact('user', 'portfolios', 'services'));
    }

    public function services(){
        $user = auth('client')->user();
        $services = $user->services()->with('subcategories')->latest()->paginate(10);
        $subcategories = \App\Models\Subcategory::all();
        return view('web.profile-services', compact('user', 'services', 'subcategories'));
    }

    public function projectRequests(){
        $user          = auth('client')->user();
        $all_seats     = Seat::where('client_id', $user->id)->get();
        $pending_seats = Seat::where('client_id', $user->id)->where('is_accepted',0)->where('is_rejected',0)->get();
        $won_seats     = Seat::where('client_id', $user->id)->where('is_accepted',1)->get();
        $lost_seats    = Seat::where('client_id', $user->id)->where('is_rejected',1)->get();
        // return ['all_seats'=>$all_seats,'pending_seats'=>$pending_seats, 'won_seats'=>$won_seats, 'lost_seats'=>$lost_seats];
        return view('web.profile-project-requests', compact('user', 'all_seats','pending_seats', 'won_seats', 'lost_seats'));
    }

    public function material(){
        $user = auth('client')->user();
        return view('web.profile-material', compact('user'));
    }

    public function subscription(){
        $user = auth('client')->user();
        return view('web.profile-subscription', compact('user'));
    }

    public function companyInfo(){
        $user = auth('client')->user();
        return view('web.profile-company', compact('user'));
    }
    /**
     * Update the company information for the authenticated client
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCompanyInfo(Request $request) {
        $user = auth('client')->user();
        $rules = [
            'company_size' => 'nullable|string',
            'founding_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'is_decision_maker' => 'nullable|boolean',
        ];
        // Only add validation for company_documents if files were actually uploaded
        if ($request->hasFile('company_documents')) {
            $rules['company_documents.*'] = 'file|max:10240'; // 10MB max file size
        }
        $validated = $request->validate($rules);
        // Update company info fields
        $user->company_size = $validated['company_size'] ?? $user->company_size;
        $user->founding_year = $validated['founding_year'] ?? $user->founding_year;
        $user->is_decision_maker = $validated['is_decision_maker'] ?? $user->is_decision_maker;
        // Handle company documents upload if files are provided
        if ($request->hasFile('company_documents')) {

            // use spatie media library
            $docName = $request->input('document_name');
            foreach ($request->file('company_documents') as $file) {
                $media = $user->addMedia($file)->toMediaCollection('company_documents');
                if ($docName) {
                    $media->setCustomProperty('display_name', $docName);
                    $media->save();
                }
            }
        }
        $user->save();
        return redirect()->back()->with('success', 'Company information updated successfully!');
    }
    /**
     * Delete a company document
     *
     * @param  \Spatie\MediaLibrary\MediaCollections\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function deleteCompanyDocument($media){
        $user = auth('client')->user();
        $mediaItem = \Spatie\MediaLibrary\MediaCollections\Models\Media::findOrFail($media);
        // Make sure the media belongs to the authenticated user
        if ($mediaItem->model_id != $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this document.');
        }
        // Delete the media
        $mediaItem->delete();
        return redirect()->back()->with('success', 'Document deleted successfully!');
    }
    
    /**
     * Display the public profile of a client
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function publicView(Client $client){
        // Load related data
        $client->load(['portfolios', 'services']);
        
        // Get top services with highest ratings
        $topServices = $client->services()->orderBy('level', 'desc')->take(5)->get();
        
        // Get the featured portfolios
        $portfolios = $client->portfolios()->with('media')->latest()->take(6)->get();
        
        // Load projects with batches and available seats
        $projects = $client->hasMany('App\\Models\\Project', 'client_id')
            ->with(['batches' => function($query) {
                $query->where('is_active', 1);
                $query->with(['seats' => function($query) {
                    $query->with('client');
                }]);
            }, 'media'])
            ->where('status', '!=', 'cancelled')
            ->latest()
            ->get();
        
        return view('web.clients.profile1', compact('client', 'topServices', 'portfolios', 'projects'));
    }
    
    public function subscribePlan(Request $request){
        $request->validate([
            'plan' => 'required',
            'price' => 'required',
        ]);
        if( $request->plan != 'monthly' && $request->plan != 'annual' && $request->plan != 'semi-annual' ){
            return redirect()->back()->with('error','Invalid plan!')->withInput();
        }
        $client = auth('client')->user();
        if($client->hasActiveSubscription()){
            return redirect()->back()->with('error','You already have an active subscription!');
        }
        if($request->plan == 'monthly'){
            $ends_at   = now()->addMonths(1);
            $billing_cycle = 'monthly';
        }elseif($request->plan == 'annual'){
            $ends_at   = now()->addMonths(12);
            $billing_cycle = 'annual';
        }elseif($request->plan == 'semi-annual'){
            $ends_at   = now()->addMonths(6);
            $billing_cycle = 'semi-annual';
        }else{
            return redirect()->back()->with('error','Invalid plan!')->withInput();
        }
        $subscription                = new Subscription();
        $subscription->client_id     = $client->id;
        $subscription->starts_at     = now();
        $subscription->ends_at       = $ends_at;
        $subscription->price         = $request->price;
        $subscription->billing_cycle = $billing_cycle;
        $subscription->is_active     = 1;
        $subscription->is_paid       = 1;
        if($subscription->save()){
            return redirect()->back()->with('success', 'Plan subscribed successfully!');
        }
        return redirect()->back()->with('error', 'Failed to subscribe plan!');
    }
}
