<?php

namespace App\Helpers;

use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;
use App\Models\Certificate;
use App\Models\Solution;

class ContentHelper
{
    /**
     * Check if all lessons and quizzes in the course are completed and passed,
     * and generate a certificate for the trainee if both conditions are met.
     *
     * @param Enrollment $enrollment The enrollment object for the trainee and course.
     *
     * @return void
     *
     * Steps:
     * 1. Verify if all lessons in the course are completed by comparing the count of
     *    completed lessons (`lessons_ids`) to the total number of lessons in the course.
     * 2. Verify if all quizzes in the course are passed by comparing the count of
     *    passed quizzes (`is_passed = 1`) to the total number of quizzes in the course.
     * 3. If both conditions are true, call the `generateCertificate` method to create
     *    and save the certificate for the trainee.
     */
    public static function generateCertificate($enrollment_id)
    {

        $enrollment         =   Enrollment::find($enrollment_id);
        $all_lesson_finshed =   count($enrollment->lessons_ids) == $enrollment->course?->lessons?->count();
        $all_quizz_finshed  =   Solution::where('enrollment_id', $enrollment->id)->where('is_passed', 1)->count() == $enrollment->course?->quizzes?->count();
        $status             =   false;
        if ($all_lesson_finshed && $all_quizz_finshed) {
            self::Certificate($enrollment);
            $status = true;
        }
        return [
            'status' => $status
        ];
    }

    /**
     * Generate a certificate for the enrollment.
     */
    public static function Certificate($enrollment)
    {

        $trainee = auth()->guard('trainee')->user();
        $course = Course::find($enrollment->course_id);

        // Render the HTML for the certificate
        $html = View::make('trainee.sections.certificates.course', [
            'trainee' => $trainee,
            'course' => $course,
        ])->render();

        // Generate the PDF using Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Save the PDF to the server
        $output = $dompdf->output();

        // Make the course name a slug
        $courseName = str_replace(' ', '-', $course->name);

        // Define the file paths in the storage/public folder
        $directoryPath = 'public/' . $trainee->email;
        $pdfFilePath = $directoryPath . '/' . $courseName . '_certificate.pdf';
        $pngFilePath = $directoryPath . '/' . $courseName . '_certificate.png';

        // Ensure the directory exists
        if (!Storage::exists($directoryPath)) {
            Storage::makeDirectory($directoryPath);
        }

        // Save the PDF file in storage/public
        Storage::put($pdfFilePath, $output);

        // Generate a PNG image from the HTML using Browsershot
        try {
            Browsershot::html($html)
                ->setOption('args', ['--no-sandbox']) // Add this if needed for restricted environments
                ->windowSize(800, 600) // Optional: Set viewport size
                ->save(storage_path('app/' . $pngFilePath));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate PNG: ' . $e->getMessage()], 500);
        }

        // Check if the certificate already exists in the database
        $existingCertificate = Certificate::where('certifiable_type', Course::class)->where('certifiable_id', $course->id)->where('trainee_id', $trainee->id)->first();

        if ($existingCertificate) {
            return view('trainee.sections.certificates.course', compact('trainee', 'course'));
        }

        // Save the certificate record in the database
        $certificate = new Certificate();
        $certificate->certifiable_type = Course::class;
        $certificate->certifiable_id = $course->id;
        $certificate->trainee_id = $trainee->id;
        $certificate->completed_at = now();
        $certificate->grade = $enrollment->grade ?? null;
        $certificate->save();
    }
}
