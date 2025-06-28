<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Campus;
use App\Models\Program;
use App\Models\Department;
use App\Models\Course;
use App\Models\Fee;
class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::with('program')->paginate(10);
          $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('fees.index', compact('fees','permissions'));
    }

    public function create()
    {
        $programs = Program::all();
          $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('fees.create', compact('programs','permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'year_of_study' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
        ]);

        Fee::create($request->all());
        return redirect()->route('fees.index')->with('success', 'Fee added');
    }

    public function edit(Fee $fee)
    {
        $programs = Program::all();
          $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('fees.edit', compact('fee', 'programs','permissions'));
    }

    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'year_of_study' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
        ]);

        $fee->update($request->all());
        return redirect()->route('fees.index')->with('success', 'Fee updated');
    }

    public function destroy(Fee $fee)
    {
        $fee->delete();
        return redirect()->route('fees.index')->with('success', 'Fee deleted');
    }
}
