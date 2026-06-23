<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactRequestController extends Controller
{
    /**
     * Display a listing of contact & appointment requests.
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $totalContactRequests = ContactRequest::latest();

            return DataTables::of($totalContactRequests)
                ->addIndexColumn()
                ->addColumn('message', function ($row) {
                    $words = explode(' ', $row->message);
                    if (count($words) > 5) {
                        $shortMessage = implode(' ', array_slice($words, 0, 5)) . '...';
                        return '<span title="Click to view full message" class="text-primary view-full-message" style="cursor:pointer;" data-message="' . htmlspecialchars($row->message) . '">' . $shortMessage . '</span>';
                    }
                    return $row->message;
                })
                ->addColumn('total_today', function ($row) {
                    return ContactRequest::where('ip_address', $row->ip_address)
      
                        ->count();
                })
                ->addColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('d F Y (g:i A)');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('contact_requests.show', $row->id) . '" class="btn btn-sm btn-primary">View</a>';
                })
                ->rawColumns(['message', 'action'])
                ->make(true);
        }

        return view('backend.setting_management.contact_requests.index');
    }
    /**
     * Show the form for creating a new request (optional – usually frontend).
     */
    public function create()
    {
        return view(
            'backend.setting_management.contact_requests.create'
        );
    }

    /**
     * Store a newly created contact / appointment request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:50',
            'email'   => 'nullable|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
            'type'    => 'required|in:contact,appointment',
        ]);

        $ip = $request->ip();
        $today = now()->toDateString();

        // 🔥 Count how many times this IP submitted today
        $todayCount = ContactRequest::where('ip_address', $ip)
            ->whereDate('created_at', $today)
            ->count();

        $requestModel = ContactRequest::create([
            'name'        => $request->name,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'subject'     => $request->subject,
            'message'     => $request->message,
            'type'        => $request->type,
            'ip_address'  => $ip,
            'total_count' => $todayCount + 1,
        ]);

        return back()->with('contact_success', [
            'total_count' => $requestModel->total_count,
            'time'        => now()->format('h:i A \\o\\n d F Y'),
        ]);
    }

    /**
     * Display the specified request.
     */
    public function show(ContactRequest $contact_request)
    {
        return view(
            'backend.setting_management.contact_requests.show',
            compact('contact_request')
        );
    }

    /**
     * Show the form for editing the specified request.
     */
    public function edit(ContactRequest $contact_request)
    {
        return view(
            'backend.setting_management.contact_requests.edit',
            compact('contact_request')
        );
    }

    /**
     * Update the specified request.
     */
    public function update(Request $request, ContactRequest $contact_request)
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|string|max:100',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
        ]);

        $contact_request->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()
            ->route('contact_requests.index')
            ->with('success', 'Request updated successfully.');
    }

    /**
     * Remove the specified request.
     */
    public function destroy(ContactRequest $contact_request)
    {
        $contact_request->delete();

        return redirect()
            ->route('contact_requests.index')
            ->with('success', 'Request deleted successfully.');
    }
}
