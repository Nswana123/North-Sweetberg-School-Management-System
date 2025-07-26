<?php

namespace App\Http\Controllers;

use App\Models\AcademicCalendar;
use Illuminate\Http\Request;

class AcademicCalendarController extends Controller
{
    public function index()
    {
        $events = AcademicCalendar::orderBy('start_date')
            ->paginate(10);
              $user = auth()->user();
        $permissions = $user->user_group->permissions;

        return view('academic-calendar.calendar', compact('events','permissions'));
    }

    public function create()
    {
          $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('academic-calendar.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:holiday,exam,registration,semester_start,semester_end,event',
            'location' => 'nullable|string|max:255',
        ]);

        AcademicCalendar::create($validated);

        return redirect()->route('academic-calendar.calendar')
            ->with('success', 'Academic calendar event created successfully.');
    }

    public function show(AcademicCalendar $academicCalendar)
    {
          $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('academic-calendar.show', compact('academicCalendar','permissions'));
    }

    public function edit(AcademicCalendar $academicCalendar)
    {
          $user = auth()->user();
        $permissions = $user->user_group->permissions;
        return view('academic-calendar.edit', compact('academicCalendar','permissions'));
    }

    public function update(Request $request, AcademicCalendar $academicCalendar)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:holiday,exam,registration,semester_start,semester_end,event',
            'location' => 'nullable|string|max:255',
        ]);

        $academicCalendar->update($validated);

        return redirect()->route('academic-calendar.show', $academicCalendar)
            ->with('success', 'Academic calendar event updated successfully.');
    }

    public function destroy(AcademicCalendar $academicCalendar)
    {
        $academicCalendar->delete();

        return redirect()->route('academic-calendar.calendar')
            ->with('success', 'Academic calendar event deleted successfully.');
    }


public function calendar()
{
    $events = AcademicCalendar::all()
        ->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date->format('Y-m-d'),
                'end' => $event->end_date->addDay()->format('Y-m-d'), // Add day to make end date inclusive
                'color' => $this->getEventColor($event->type),
                'extendedProps' => [
                    'type' => $event->type,
                    'location' => $event->location,
                    'description' => $event->description,
                    'duration' => $event->duration
                ]
            ];
        });
              $user = auth()->user();
        $permissions = $user->user_group->permissions;

    return view('academic-calendar.calendar', compact('events','permissions'));
}

protected function getEventColor($type)
{
    return match($type) {
        'holiday' => '#f44336',
        'exam' => '#9c27b0',
        'registration' => '#2196f3',
        'semester_start' => '#4caf50',
        'semester_end' => '#ff9800',
        default => '#607d8b',
    };
}
}