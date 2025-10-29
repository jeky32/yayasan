<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * Display a listing of activities.
     */
    public function index(Request $request): View
    {
        $query = DB::table('activities')
            ->leftJoin('locations', 'activities.location_id', '=', 'locations.location_id')
            ->leftJoin('staff', 'activities.instructor_id', '=', 'staff.staff_id')
            ->select(
                'activities.*',
                'locations.location_name',
                'staff.full_name as instructor_name'
            )
            ->orderBy('activities.activity_date', 'desc');

        // Filter by type
        if ($request->has('type') && $request->type) {
            $query->where('activities.activity_type', $request->type);
        }

        // Filter by date
        if ($request->has('date') && $request->date) {
            $query->whereDate('activities.activity_date', $request->date);
        }

        $activities = $query->paginate(12);

        // Get activity types for filter
        $types = ['Education', 'Recreation', 'Health', 'Skills', 'Counseling', 'Other'];

        return view('activities.index', compact('activities', 'types'));
    }

    /**
     * Display the specified activity with participants.
     */
    public function show($id): View
    {
        $activity = DB::table('activities')
            ->leftJoin('locations', 'activities.location_id', '=', 'locations.location_id')
            ->leftJoin('staff', 'activities.instructor_id', '=', 'staff.staff_id')
            ->select(
                'activities.*',
                'locations.location_name',
                'locations.address',
                'staff.full_name as instructor_name',
                'staff.phone as instructor_phone'
            )
            ->where('activities.activity_id', $id)
            ->first();

        if (!$activity) {
            abort(404);
        }

        // Get participants
        $participants = DB::table('activity_participants')
            ->join('beneficiaries', 'activity_participants.beneficiary_id', '=', 'beneficiaries.beneficiary_id')
            ->select(
                'activity_participants.*',
                'beneficiaries.full_name',
                'beneficiaries.nickname',
                'beneficiaries.gender'
            )
            ->where('activity_participants.activity_id', $id)
            ->get();

        // Get statistics
        $stats = [
            'total_registered' => $participants->count(),
            'attended' => $participants->where('participation_status', 'Attended')->count(),
            'absent' => $participants->where('participation_status', 'Absent')->count(),
            'cancelled' => $participants->where('participation_status', 'Cancelled')->count(),
            'attendance_rate' => $participants->count() > 0 
                ? round(($participants->where('participation_status', 'Attended')->count() / $participants->count()) * 100, 2)
                : 0
        ];

        return view('activities.show', compact('activity', 'participants', 'stats'));
    }

    /**
     * Get upcoming activities.
     */
    public function upcoming(): View
    {
        $activities = DB::table('activities')
            ->leftJoin('locations', 'activities.location_id', '=', 'locations.location_id')
            ->leftJoin('staff', 'activities.instructor_id', '=', 'staff.staff_id')
            ->select(
                'activities.*',
                'locations.location_name',
                'staff.full_name as instructor_name'
            )
            ->where('activities.activity_date', '>=', now()->format('Y-m-d'))
            ->orderBy('activities.activity_date', 'asc')
            ->get();

        return view('activities.upcoming', compact('activities'));
    }
}
