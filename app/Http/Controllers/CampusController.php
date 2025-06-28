<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function index() {
        $campuses = Campus::paginate(10);
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('campuses.index', compact('campuses','permissions'));
    }

    public function create() {
           $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('campuses.create', compact('permissions'));
    }

    public function store(Request $request) {
        Campus::create($request->all());
        return redirect()->route('campuses.index');
    }
public function show($id)
{
    $user = auth()->user();
    $permissions = $user->user_group->permissions;

    // Eager‑load the necessary relations
    $campus = Campus::with(['schools.departments.programs', 'students'])->findOrFail($id);

    $schoolCount = $campus->schools->count();
    $departmentCount = $campus->schools
        ->flatMap(fn($school) => $school->departments)
        ->unique('id')
        ->count();
    $studentCount = $campus->students->count();

    // Flatten all programs under this campus
    $programs = $campus->schools
        ->flatMap(fn($school) => 
            $school->departments
                  ->flatMap(fn($dept) => $dept->programs)
        )
        ->unique('id') // remove duplicates
        ->values();    // reset keys

    return view('campuses.show', compact(
        'campus', 'schoolCount', 'departmentCount',
        'studentCount', 'programs', 'permissions'
    ));
}


public function detach(Campus $campus, Program $program)
{
    $campus->programs()->detach($program->id);
    return back()->with('success', 'Program removed from campus.');
}
public function edit(Campus $campus) {
    $user = auth()->user();
    $permissions = $user->user_group->permissions;
    return view('campuses.edit', compact('campus', 'permissions'));
}

public function update(Request $request, Campus $campus) {
    $campus->update($request->all());
    return redirect()->route('campuses.index');
}

public function destroy(Campus $campus) {
    $campus->delete();
    return redirect()->route('campuses.index');
}
}
