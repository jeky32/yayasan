<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProgramController extends Controller
{
    /**
     * Display a listing of programs.
     */
    public function index(): View
    {
        // Get all active programs
        $programs = DB::table('programs')
            ->leftJoin('locations', 'programs.location_id', '=', 'locations.location_id')
            ->leftJoin('staff', 'programs.coordinator_id', '=', 'staff.staff_id')
            ->select(
                'programs.*',
                'locations.location_name',
                'staff.full_name as coordinator_name'
            )
            ->where('programs.status', 'Active')
            ->orderBy('programs.start_date', 'desc')
            ->get();

        // Group programs by type
        $groupedPrograms = [
            'education' => $programs->filter(function($program) {
                return stripos($program->program_name, 'pendidikan') !== false ||
                       stripos($program->program_name, 'edukasi') !== false ||
                       stripos($program->program_name, 'belajar') !== false;
            }),
            'skills' => $programs->filter(function($program) {
                return stripos($program->program_name, 'keterampilan') !== false ||
                       stripos($program->program_name, 'skill') !== false ||
                       stripos($program->program_name, 'pelatihan') !== false;
            }),
            'counseling' => $programs->filter(function($program) {
                return stripos($program->program_name, 'konseling') !== false ||
                       stripos($program->program_name, 'pendampingan') !== false ||
                       stripos($program->program_name, 'psikologi') !== false;
            }),
            'health' => $programs->filter(function($program) {
                return stripos($program->program_name, 'kesehatan') !== false ||
                       stripos($program->program_name, 'medis') !== false;
            }),
            'other' => $programs->filter(function($program) {
                return stripos($program->program_name, 'pendidikan') === false &&
                       stripos($program->program_name, 'keterampilan') === false &&
                       stripos($program->program_name, 'konseling') === false &&
                       stripos($program->program_name, 'kesehatan') === false;
            }),
        ];

        // Get program statistics
        $stats = [
            'total_programs' => $programs->count(),
            'active_programs' => $programs->where('status', 'Active')->count(),
            'total_participants' => DB::table('programs')->sum('actual_participants'),
            'locations_covered' => DB::table('programs')
                ->distinct('location_id')
                ->count('location_id'),
        ];

        return view('programs.index', compact('programs', 'groupedPrograms', 'stats'));
    }

    /**
     * Display the specified program.
     */
    public function show($id): View
    {
        // Get program details
        $program = DB::table('programs')
            ->leftJoin('locations', 'programs.location_id', '=', 'locations.location_id')
            ->leftJoin('staff', 'programs.coordinator_id', '=', 'staff.staff_id')
            ->select(
                'programs.*',
                'locations.location_name',
                'locations.address',
                'locations.city',
                'locations.province',
                'staff.full_name as coordinator_name',
                'staff.email as coordinator_email',
                'staff.phone as coordinator_phone'
            )
            ->where('programs.program_id', $id)
            ->first();

        if (!$program) {
            abort(404);
        }

        // Get program participants
        $participants = DB::table('activity_participants')
            ->join('activities', 'activity_participants.activity_id', '=', 'activities.activity_id')
            ->join('beneficiaries', 'activity_participants.beneficiary_id', '=', 'beneficiaries.beneficiary_id')
            ->select(
                'beneficiaries.full_name',
                'beneficiaries.gender',
                DB::raw('COUNT(*) as participation_count'),
                DB::raw('AVG(activity_participants.performance_rating) as avg_rating')
            )
            ->where('activities.activity_type', 'LIKE', '%' . $program->program_name . '%')
            ->groupBy('beneficiaries.beneficiary_id', 'beneficiaries.full_name', 'beneficiaries.gender')
            ->get();

        // Get related programs
        $relatedPrograms = DB::table('programs')
            ->leftJoin('locations', 'programs.location_id', '=', 'locations.location_id')
            ->select('programs.*', 'locations.location_name')
            ->where('programs.status', 'Active')
            ->where('programs.location_id', $program->location_id)
            ->where('programs.program_id', '!=', $id)
            ->limit(3)
            ->get();

        return view('programs.show', compact('program', 'participants', 'relatedPrograms'));
    }

    /**
     * Display education programs.
     */
    public function education(): View
    {
        $programs = DB::table('programs')
            ->leftJoin('locations', 'programs.location_id', '=', 'locations.location_id')
            ->select('programs.*', 'locations.location_name')
            ->where('programs.status', 'Active')
            ->where(function($query) {
                $query->where('programs.program_name', 'LIKE', '%pendidikan%')
                      ->orWhere('programs.program_name', 'LIKE', '%edukasi%')
                      ->orWhere('programs.program_name', 'LIKE', '%belajar%');
            })
            ->orderBy('programs.start_date', 'desc')
            ->get();

        return view('programs.education', compact('programs'));
    }

    /**
     * Display skills training programs.
     */
    public function skills(): View
    {
        $programs = DB::table('programs')
            ->leftJoin('locations', 'programs.location_id', '=', 'locations.location_id')
            ->select('programs.*', 'locations.location_name')
            ->where('programs.status', 'Active')
            ->where(function($query) {
                $query->where('programs.program_name', 'LIKE', '%keterampilan%')
                      ->orWhere('programs.program_name', 'LIKE', '%skill%')
                      ->orWhere('programs.program_name', 'LIKE', '%pelatihan%');
            })
            ->orderBy('programs.start_date', 'desc')
            ->get();

        return view('programs.skills', compact('programs'));
    }

    /**
     * Display counseling programs.
     */
    public function counseling(): View
    {
        $programs = DB::table('programs')
            ->leftJoin('locations', 'programs.location_id', '=', 'locations.location_id')
            ->select('programs.*', 'locations.location_name')
            ->where('programs.status', 'Active')
            ->where(function($query) {
                $query->where('programs.program_name', 'LIKE', '%konseling%')
                      ->orWhere('programs.program_name', 'LIKE', '%pendampingan%')
                      ->orWhere('programs.program_name', 'LIKE', '%psikologi%');
            })
            ->orderBy('programs.start_date', 'desc')
            ->get();

        return view('programs.counseling', compact('programs'));
    }
}
