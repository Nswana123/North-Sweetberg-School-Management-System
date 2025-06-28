<?php
namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Campus;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index() {
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
       $schools = School::with('campuses')->paginate(10);
        return view('schools.index', compact('schools','permissions'));
    }

    public function create() {
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        $campuses = Campus::all();
        return view('schools.create', compact('campuses','permissions'));
    }
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'campus_ids' => 'required|array',
        'campus_ids.*' => 'exists:campuses,id'
    ]);

    // Create the school
    $school = School::create([
        'name' => $request->name,
    ]);

    // Attach selected campuses
    $school->campuses()->attach($request->campus_ids);

    return redirect()->route('schools.index')->with('success', 'School added successfully.');
}
  public function edit($id)
{
    $school = School::with('campuses')->findOrFail($id);
    $campuses = Campus::all(); // Get all available campuses
    $permissions = auth()->user()->user_group->permissions;

    return view('schools.edit', compact('school', 'campuses', 'permissions'));
}

  public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'campus_ids' => 'required|array',
        'campus_ids.*' => 'exists:campuses,id',
    ]);

    $school = School::findOrFail($id);
    $school->update(['name' => $request->name]);

    // Sync campus assignments
    $school->campuses()->sync($request->campus_ids);

    return redirect()->route('schools.index')->with('success', 'School updated successfully.');
}

    public function destroy(School $school) {
        $school->delete();
        return redirect()->route('schools.index');
    }
}
