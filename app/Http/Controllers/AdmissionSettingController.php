<?php

namespace App\Http\Controllers;

use App\Models\AdmissionSetting;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdmissionSettingController extends Controller
{
    public function index()
    {
        $settings = AdmissionSetting::with('program')->get();
        $programs = Program::all();
            $user = auth()->user();
        $permissions = $user->user_group->permissions;
        
        return view('admission.settingsIndex', compact('settings', 'programs','permissions'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'program_id' => 'required|exists:programs,id|unique:admission_settings,program_id',
        'is_open' => 'required|boolean', // Strict boolean validation
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'closure_message' => 'nullable|string|max:500',
    ]);

    // Force boolean conversion
    $validated['is_open'] = (bool)$validated['is_open'];

    AdmissionSetting::create($validated);

    return redirect()->route('admission.settingsIndex')
        ->with('success', 'Admission setting created successfully.');
}

public function update(Request $request, AdmissionSetting $admissionSetting)
{
    $validated = $request->validate([
        'is_open' => 'required|boolean', // Strict boolean validation
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'closure_message' => 'nullable|string|max:500',
    ]);

    // Force boolean conversion
    $validated['is_open'] = (bool)$validated['is_open'];

    $admissionSetting->update($validated);

    return redirect()->route('admission.settingsIndex')
        ->with('success', 'Admission setting updated successfully.');
}

public function toggle(AdmissionSetting $admissionSetting)
{
    // Explicit boolean toggle
    $admissionSetting->update([
        'is_open' => !(bool)$admissionSetting->is_open
    ]);

    return back()->with('success', 'Admission status toggled successfully.');
}

}