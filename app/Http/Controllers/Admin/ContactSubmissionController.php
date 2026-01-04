<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index()
    {
        $submissions = ContactSubmission::latest()->paginate(20);

        return view('admin.contact-submissions.index', compact('submissions'));
    }

    public function show(ContactSubmission $contactSubmission)
    {
        // Mark as read when viewing
        if (!$contactSubmission->is_read) {
            $contactSubmission->update(['is_read' => true]);
        }

        return view('admin.contact-submissions.show', compact('contactSubmission'));
    }

    public function destroy(ContactSubmission $contactSubmission)
    {
        $contactSubmission->delete();

        return redirect()->route('admin.contact-submissions.index')
            ->with('success', 'Contact submission deleted successfully.');
    }
}
