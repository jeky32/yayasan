<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display contact page
     */
    public function index()
    {
        // Get all active locations
        $locations = DB::table('locations')
            ->where('is_active', true)
            ->orderBy('location_name')
            ->get();

        return view('contact.index', compact('locations'));
    }

    /**
     * Store contact message
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|max:20',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        DB::table('contact_messages')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'Unread',
            'created_at' => now(),
        ]);

        return redirect()->route('contact.index')
            ->with('success', 'Pesan Anda berhasil dikirim!');
    }

    /**
     * Display requirements/terms page
     */
    public function requirements()
    {
        return view('contact.requirements');
    }
}
