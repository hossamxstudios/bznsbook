<?php

namespace App\Http\Controllers\CRMControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Industry;
use App\Models\Log;
use App\Models\Note;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\DB;




class CompanyController extends Controller {

    public function updateServices(Request $request) {
        $company = Company::findOrFail($request->id);
        $company->sections()->sync($request->sections);
        // Log the change
        $log                = new Log();
        $log->user_id       = $request->user()->id;
        $log->loggable_id   = $company->id;
        $log->loggable_type = Company::class;
        $log->title         = 'Updated Sections';
        $log->details       = 'Sections updated: ' . implode(', ', $request->sections);
        $log->log_date      = now();
        $log->save();
        return redirect()->back()->with('success', 'Company sections updated successfully');
    }

    public function index(){
        $industries  = Industry::all();
        $notes       = Note::with('notable')->get();
        $logs        = Log::with('loggable')->get();
        $companies   = Company::with('industry')->get();
        return view('admin.companies',compact('companies','logs','notes','industries'));
    }

    public function store(Request $request){
        $company                 = new Company();
        $company->industry_id    = $request->industry_id;
        $company->name           = $request->name;
        $company->website        = $request->website;
        $company->capacity       = $request->capacity;
        $company->source         = $request->source;
        $company->decision_maker = $request->decision_maker;
        $company->email          = $request->email;
        $company->social_media   = $request->social_media;
        if($company->save()){
            $log = new Log();
            $log->user_id        = $request->user()->id;
            $log->loggable_type  = 'App\Models\Company';
            $log->loggable_id    = $company->id;
            $log->title          = 'Created "'.$company->name.'" Company';
            $log->details	     = 'New company has been created "' . $company->name . '" created ';
            $log->log_date       = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $company    = Company::findOrFail($id);
        $industry   = Industry::findOrFail($request->industry_id);
        $changes = [];
        if ($request->name && $request->name !== $company->name) {
            $changes[] = 'Name changed from ' . $company->name . ' to ' . $request->name;
            $company->name = $request->name;
        }
        if ($request->email && $request->email !== $company->email) {
            $changes[] = 'Email changed from ' . $company->email . ' to ' . $request->email;
            $company->email = $request->email;
        }
        if ($request->decision_maker && $request->decision_maker !== $company->decision_maker) {
            $changes[] = 'Decision Maker changed from ' . $company->decision_maker . ' to ' . $request->decision_maker;
            $company->decision_maker = $request->decision_maker;
        }
        if ($request->website && $request->website !== $company->website) {
            $changes[] = 'Domain changed from ' . $company->website . ' to ' . $request->website;
            $company->website = $request->website;
        }
        if ($request->industry_id && $request->industry_id != $company->industry_id) {
            $changes[] = 'Industry changed from ' . ($company->industry?->name ?? 'null') . ' to ' . $industry->name;
            $company->industry_id = $request->industry_id;
        }
        if ($request->capacity && $request->capacity !== $company->capacity) {
            $changes[] = 'Headcount changed from ' . $company->capacity . ' to ' . $request->capacity;
            $company->capacity = $request->capacity;
        }
        if ($request->social_media && $request->social_media !== $company->social_media) {
            $changes[] = 'Linked in changed from ' . $company->social_media . ' to ' . $request->social_media;
            $company->social_media = $request->social_media;
        }
        if ($request->source && $request->source !== $company->source) {
            $changes[] = 'Source changed from ' . $company->source . ' to ' . $request->source;
            $company->source = $request->source;
        }
        if ( $company->save() && count($changes) > 0) {
            $log                = new Log();
            $log->user_id       = $request->user()->id;
            $log->loggable_type = 'App\Models\Company';
            $log->loggable_id   = $company->id;
            $log->title         = 'Updated "' . $company->name . '" Company';
            $log->details       = implode(',<br> ', $changes);
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function destroy($id){
        $company                = Company::findOrFail($id);
        if($company->delete()){
            return redirect()->back();
        }
    }

    public function bulkImport(Request $request){
        $file = $request->file('file');
        $filePath = $file->storeAs('uploads', 'contacts_' . time() . '.xlsx'); // Save in storage/app/uploads
        $fullFilePath = storage_path('app/' . $filePath);
        try {
            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true); // Read data only
            $spreadsheet = $reader->load($fullFilePath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true); // Convert rows to array
            $data = []; // Temporary array for batch insert
            $rowCount = 0;
            for ($i = 2; $i <= count($rows); $i++) {
                $row = $rows[$i];
                if (!isset($rows[$i]) && $row['A'] == null ) {
                    continue;
                }
                if ( $row['A'] == null){
                    continue;
                }
                $data[] = [
                    'name'              => $row['A'] ?? null, // Column A
                    'email'             => $row['B'] ?? null, // Column B
                    'decision_maker'    => $row['C'] ?? null, // Column C
                    'website'           => $row['D'] ?? null, // Column D
                    'capacity'          => $row['E'] ?? null, // Column E
                    'social_media'      => $row['F'] ?? null, // Column F
                    'source'            => $row['G'] ??"From xlsx",
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ];
            }
            $insert_data = collect($data); // Make a collection to use the chunk method
            $chunks = $insert_data->chunk(300);
            foreach ($chunks as $chunk) {
                DB::table('companies')->upsert(
                    $chunk->toArray(), // Data to insert
                    ['name', 'website'], // Unique keys for conflict detection
                    [ // Columns to update on conflict
                        'email',
                        'decision_maker',
                        'capacity',
                        'social_media',
                        'source',
                        'updated_at',
                    ]
                );
            }
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
            return redirect()->back()->with('success', "contacts imported successfully! Total records: $rowCount");
        } catch (\Exception $e) {
            FacadesLog::error('Error importing contacts: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request){
        Company::destroy($request->id);
        return redirect()->back();
    }

    // public function trashed(){
    //     $companies = Company::onlyTrashed()->get();
    //     return redirect()->back();
    // }

    // public function restore($id){
    //     $company = Company::onlyTrashed()->findOrFail($id);
    //     $company->restore();

    //     return redirect()->back();
    // }

    // public function search(Request $request){
    //     $query = $request->input('query');
    //     $companies = Company::where('name', 'LIKE', "%{$query}%")->orWhere('email', 'LIKE', "%{$query}%")->orWhere('industry', 'LIKE', "%{$query}%")->get();

    //     return redirect()->back();
    // }
}
