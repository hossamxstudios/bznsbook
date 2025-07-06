<?php

namespace App\Http\Controllers\CRMControllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Log;
use App\Models\Note;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;
class ContactController extends Controller
{
    public function index(){
        $contacts       = Contact::with('company')->paginate(10);
        $all_contacts   = Contact::count();
        $companies  = Company::all();
        $notes      = Note::with('notable')->get();
        $logs       = Log::with('loggable')->get();
        return view('admin.contacts',compact('contacts','companies','logs','notes','all_contacts'));
    }

    public function store(Request $request){
        $contact                = new Contact();
        $contact->company_id    = $request->company_id;
        $contact->name          = $request->name;
        $contact->email         = $request->email;
        $contact->country_code  = $request->country_code;
        $contact->phone         = $request->phone;
        $contact->title         = $request->title;
        $contact->status        = $request->status ?? 'new';
        // return $contact;
        if($contact->save()){
            $log = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Contact';
            $log->loggable_id   = $contact->id;
            $log->title         = 'Created "'.$contact->name.'" Contact';
            $log->details	    = 'New Contact has been created "' . $contact->name . '" ';
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $contact = Contact::findOrFail($id);
        $company = Company::findOrFail($contact->company_id);
        $changes = [];
        if ($request->company_id && $request->company_id !== $contact->company_id) {
            $changes[] = 'Company changed from ' . $contact->company->name . ' to ' . $company->name;
            $contact->company_id = $request->company_id;
        }
        if ($request->name && $request->name !== $contact->name) {
            $changes[] = 'Name changed from ' . $contact->name . ' to ' . $request->name;
            $contact->name = $request->name;
        }
        if ($request->email && $request->email !== $contact->email) {
            $changes[] = 'Email changed from ' . $contact->email . ' to ' . $request->email;
            $contact->email = $request->email;
        }
        if ($request->phone && $request->phone !== $contact->phone) {
            $changes[] = 'Phone changed from ' . $contact->phone . ' to ' . $request->phone;
            $contact->phone = $request->phone;
        }
        if ($request->title && $request->title !== $contact->title) {
            $changes[] = 'Title changed from ' . $contact->title . ' to ' . $request->title;
            $contact->title = $request->title;
        }
        if ($request->status && $request->status !== $contact->status) {
            $changes[] = 'Status changed from ' . $contact->status . ' to ' . $request->status;
            $contact->status = $request->status;
        }
        if (count($changes) > 0) {
            $contact->save();
            $log                = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Contact';
            $log->loggable_id   = $contact->id;
            $log->title         = 'Updated Contact';
            $log->details       = implode(' <br> ', $changes) ;
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function destroy($id){
        $contact                = Contact::findOrFail($id);
        if($contact->delete()){
            $log = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Contact';
            $log->loggable_id   = $contact->id;
            $log->title         = 'Deleted Contact';
            $log->details       = 'Contact "' . $contact->name . '" has been deleted ';
            $log->log_date      = now();
            $log->save();
        }
        return redirect()->back();
    }

    public function assignCompany(Request $request, $id){
        $contact                = Contact::findOrFail($id);
        $contact->company_id    = $request->company_id;
        $contact->company_name  = Company::find($request->company_id)->name;
        if($contact->save());
            $log                = new Log();
            $log->user_id       = auth()->user()->id;
            $log->loggable_type = 'App\Models\Contact';
            $log->loggable_id   = $contact->id;
            $log->title         = 'Assigned Company "'.  $contact->company->name.' " To Contact "'.$contact->name .'" ';
        return redirect()->back()->with('success', 'Company assigned successfully!');
    }

    public function getContacts($company_id){
        $contacts = Contact::where('company_id', $company_id)->get();
        return response()->json($contacts);
    }

    public function bulkImport(Request $request){
        // Step 1: Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx|max:2048', // Accept only XLSX files
        ]);
        // Step 2: Store the uploaded Excel file temporarily
        $file = $request->file('file');
        $filePath = $file->storeAs('uploads', 'contacts_' . time() . '.xlsx'); // Save in storage/app/uploads
        $fullFilePath = storage_path('app/' . $filePath);

        try {
            // Step 3: Load the Excel file using PhpSpreadsheet
            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true); // Read data only
            $spreadsheet = $reader->load($fullFilePath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true); // Convert rows to array
            $data = []; // Temporary array for batch insert
            $batchSize = 300; // Define the chunk size
            $rowCount = 0;
            // Step 4: Process only rows 2 to 602 (601 rows)
            for ($i = 2; $i <= count($rows); $i++) {
                // If the row doesn't exist, break the loop
                if (!isset($rows[$i])) {
                    break;
                }
                $row = $rows[$i];
                // Normalize is_attended to 1 or 0
                $isAttended = isset($row['G']) && in_array(strtolower(trim($row['G'])), ['1', 'yes', 'true']) ? 1 : 0;
                // Prepare row data
                $data[] = [
                    'company_id'        => null,
                    'source'            => "From xlsx",
                    'name'              => $row['A'] ?? null, // Column A
                    'email'             => $row['B'] ?? null, // Column B
                    'phone'             => $row['C'] ?? null, // Column C
                    'title'             => $row['D'] ?? null, // Column D
                    'company_name'      => $row['E'] ?? null, // Column E
                    'attended_courses'  => $row['F'] ?? null, // Column F
                    'is_attended'       => $isAttended,       // Column G
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ];

                // Insert in batches of 300
                if (count($data) >= $batchSize) {
                    DB::table('contacts')->insert($data);
                    $rowCount += count($data);
                    $data = []; // Clear batch data
                }
            }

            // Insert any remaining records
            if (!empty($data)) {
                DB::table('contacts')->insert($data);
                $rowCount += count($data);
            }

            return redirect()->back()->with('success', "contacts imported successfully! Total records: $rowCount");

        } catch (\Exception $e) {
            FacadesLog::error('Error importing contacts: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request){
        Contact::destroy($request->id);
        return redirect()->back();
    }
}

